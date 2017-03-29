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

}//klassi lõpp