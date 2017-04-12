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

    //paringu teostamine
    function query($sql)
    {
        $res = mysqli_query($this->conn, $sql);
        if ($res == false) {
            echo 'viga paringus<br/>';
            echo '<b>' . $sql . '<br/>';
            echo mysqli_errno($this->conn) . '<br/>';
            exit;
        }
        return $res;
    }//query
    //laiend funkt, et hakkame andmeid panema mysqli_fech... annab välja tabelist erinevad kas veerud, read jne

    //andmetega päring

    function getArray($sql)
    {
        $res = $this->query($sql);
        $data = array();
        while ($row = mysqli_fetch_assoc($res)) {
            $data [] = $row;
        }
        if (count($data) == 0) {
            return false;
        }
        return $data;

    }
    //klassi lõpp
}
?>