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
        $this->clearSessions();
        $this->createSession();
        $this->sid = $http->get('sid');
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
        $sql = 'DELETE FROM session WHERE' .
            time() . '- UNIX_TIMESTAMP(changed)>' .
            $this->timeout;
        $this->db->querry($sql);
    }
}//klassi lõpp