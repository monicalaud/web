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

    //klassi meetodid
    //konstruktor
    function __construct(&$http, &$db)
    {
        $this->http =& $http;
        $this->db =& $db;
    }//konstruktor


}//klassi lõpp