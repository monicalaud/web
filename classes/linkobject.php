<?php

/**
 * Created by PhpStorm.
 * User: monica.laud
 * Date: 29.03.2017
 * Time: 14:22
 */
class linkobject extends http
{//klassi algus
    //klassi omadused põhilink on http://138.68.68.130/~monica.laud/web/index.php
    //klassi muutujad - omadused
    var $baseUrl = false;
    var $delim = '&amp;';
    var $eq = '=';
    var $protocol = 'http://';

    //selle klassi konstruktor ja klassi meetodid
    function __construct()
    {
        parent::__construct(); //kutsume tööle http konstruktor
        //loome põhilingi
        $this->baseUrl = $this->protocol . HTTP_HOST . SCRIPT_NAME;
    }//konstruktor
    // andmepaaride koostamine
    // nimi =väärtus&nimi1=väärtus1 jne
    function addToLink($link, $nimi, $val)
    {
        if ($link != '') {
            $link = $link . $this->delim;
        }
        $link = $link .
    }//addToLink
    

}//klassi lõpp