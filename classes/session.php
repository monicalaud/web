<?php

/**
 * Created by PhpStorm.
 * User: monica.laud
 * Date: 19.04.2017
 * Time: 8:53
 */
class session
{
    //klassi algus
    var $sid = false;
//sid on session
    var $vars = array(); //sessioni ajal kasutatavad andmed lähevad siia
    var $http = false; //objekt vebeiandmete kasutamiseks
    var $db = false; //objekt andmebaasi kasutamiseks
    var $anonymous = true; //lubame anonyymse kasutajale lehe kuvamise
    //session pikkus
    var $timeout = 1800; //30 minutit
    //klassi meetodid
    //konstruktor
    function __construct(&$http, &$db)
    {
        $this->http =& $http;
        $this->db =& $db;
        //võtame sessioni id kasutusele
        $this->sid = $http->get('sid');
        $this->checkSession();
    }//konstruktor


    //sessioni loomise funktsioon
    function createSession($user = false)
    {
        //kui kasutaja on anonyymne, mis siis tehakse
        if ($user == false) {
            //tekitame andmed session tabeli jaoks andmebaasis
            $user = array(
                'user_id' => 0,
                'role_id' => 0,
                'username' => 'Anonymous'
            );
        }//kas kasutaja on anonyymne -- lõpp
        //loome sessioni idendifikaatori id loomine
        $sid = md5(uniqid(time() . mt_rand(1, 1000), true));
        //pärimg sessioni andmete salvestamiseks
        $sql = 'INSERT INTO session SET ' .
            'sid=' . fixDb($sid) . ', ' .
            'user_id=' . fixDb($user['user_id']) . ', ' .
            'user_data=' . fixDb(serialize($user)) . ', ' .
            'login_ip=' . fixDb(REMOTE_ADDR) . ', ' .
            'created=NOW()';
        //SISESTAME PÄRINGUD ANDMEBAASI
        $this->db->query($sql);
        //määrame sid ka antud klassi muutujale var $sid
        $this->sid = $sid;
        //lisame väärtused veebi
        $this->http->set('sid', $sid);
    }//sessioni loomise lõpp

    //sessiooni tabeli puhastus
    function clearSessions()
    {
        $sql = 'DELETE FROM session WHERE ' .
            time() . '- UNIX_TIMESTAMP(changed)>' .
            $this->timeout;
        $this->db->query($sql);
    }// clearSessions

    //sessioni kontroll
    function checkSession()
    {
        $this->clearSessions();
        //kui sid on puudu ja anonyymne on lubatud
        //tekitame alustamiseks anonyymse sessiooni
        if ($this->sid === false and $this->anonymous) {
            $this->createSession();
        }
        //kui aga sid onm olemas
        if ($this->sid !== false) {
            //võtame andmed sessioni tabelist
            //antud id seotud
            $sql = 'SELECT * FROM session WHERE ' .
                'sid=' . fixDb($this->sid);
            $res = $this->db->getArray($sql);
            if ($res == false) {
                //kui anonyymne lubatud loome uue sessioni
                if ($this->anonymous) {
                    $this->createSession();
                } else {
                    //kui anonyymne session pole lubatud
                    //tuleb veebist kõik andmed maha kustutada
                    $this->sid = false;
                    $this->http->del('sid');
                }
            } else {
                //kui andmebaasisit on võimalik sessiooni andmed
                $vars = unserialize($res[0]['svars']);
                if (!is_array($vars)) {
                    $vars = array();
                }
                $this->vars = $vars;
                //nüüd kasutaja andmed
                $user_data = unserialize($res[0]['user_data']);
                $this->user_data = $user_data;
            }
        } else {
            //hetkel sessioni pole
            echo 'pole sessiooni';
        }
    } //checkSession

    //sessiooni uuendamine
    function flush()
    {
        if ($this->sid !== false) {
            $sql = 'UPDATE session SET changed=NOW(), ' .
                'svars=' . fixDb(serialize($this->vars)) .
                'WHERE sid=' . fixDb($this->sid);
            $this->db->query($sql);
        }
    }


}//klassi lõpp