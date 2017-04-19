<?php

/**
 * Created by PhpStorm.
 * User: monica.laud
 * Date: 29.03.2017
 * Time: 13:45
 */
class http
{ //klassi algus
    //klassi muutujad
    var $vars = array(); //http päringute andmed, massiiv
    var $server = array(); //serveri andmed
//klassi konstruktor
    //kutsub initi tööle
    function __construct()
    {
        $this->init();
        $this->initCont();
    }
    //klassi meetodid
    //paneme algandmed paika- initsialiseerimie
    function init()
    {
        $this->vars = array_merge($_GET, $_POST, $_FILES);
        $this->server = $_SERVER;
    }//init

    //defineerime vajalikud konstandid
    function initCont()
    {
        $consts = array('REMOTE_ADDR', 'HTTP_HOST', 'PHP-SELF', 'SCRIPT_NAME');
        //MASSIIVITÖÖTLUSETSYKKEL
        foreach ($consts as $const) {
            if (!defined($const) and isset($this->server [$const])) {
                define($const, $this->server[$const]);
            }
        }
    }//initconst

    //lisame funktsiooni mis võimnaldab veebis olevad anmded kätte saada (nagu $_POST)
    //tegelikult lingi kaudu saadud, emuleerime
    function get($name)
    {
        if ($this->vars[$name]) {
            return $this->vars[$name];
        }
        return false;
    }//get

    //lisame vajaliku väärtused veebi kujul nimi=väärtus
    function set($name, $val)
    {
        $this->vars[$name] = $val;
    }

    //eemaldame ebavajalikud andmed veebist
    function del($name)
    {
        if (isset($this->vars[$name])) {
            unset($this->vars[$name]);
        }
    }
}//klassi lõpp