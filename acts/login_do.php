<?php
/**
 * Created by PhpStorm.
 * User: monica.laud
 * Date: 3.05.2017
 * Time: 9:38
 */
// võtame andmed vastu vormist
$username = $http->get('kasutaja');
$passwd = $passwd->get('parool');
// koostame päringu andmebaasi

$sql = ' SELECT * FROM USER' . 'WHERE username=' . fixDb($username) .
    'AND password=' . fixDb(md5($passwd));
$res = $db->getArray($sql);

//teeme päriongute kontrolli

if ($res == false) {
    // siis tuleb kasutaja suunata uuetsi logi vormile

} else {
    $sess->createSession($res [0]);
    //tuleb kasutaja suunata pealehele
    //kus ma väljastan kasutaja andmed sessiooni kontrolliks
}