<?php

/**
 * Created by PhpStorm.
 * User: monica.laud
 * Date: 5.04.2017
 * Time: 10:28
 */
class mysql
{//klassi algus
    //klassi omadused: yhendus
    var $conn = false; //yhendus andmebaasi serveriga
    var $host = false; // andmb  serveri host
    var $user = false; //andmeb serveri parool
    var $pass = false;
    var $dbname = false;

} //klassi lõpp
function __construct($h, $u, $p, $dn)
{
    $this->host = $h;
    $this->user = $u;
    $this->pass = $p;
    $this->dbname = $dn;
    $this->connect();
        
}

function connect()
{
    $this->conn = mysqli_connect($this->host, $this->user, $this->pass, $this->dbname);
    if (mysqli_connect_error()) {
        echo 'viga andmebaasiserveriga yhenduses<br/>';
        exit;
    }


}//connect
?>