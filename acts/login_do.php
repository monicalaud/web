<?php
/**
 * Created by PhpStorm.
 * User: monica.laud
 * Date: 3.05.2017
 * Time: 9:38
 */
// võtame andmed vastu vormist
$username = $http->get('kasutaja');
$passwd = $http->get('parool');
// koostame päringu kasutaja kontrollimiseks andmebaasis
$sql = 'SELECT * FROM user ' .
    'WHERE username=' . fixDb($username) .
    ' AND password=' . fixDb(md5($passwd));
$res = $db->getArray($sql);
// teeme päringu tulemuse kontroll
if ($res == false) {
    // siis tuleb suunata kasutaja sisselogimisvormi tagasi
} else {
    // sisse tuleb avada kasutajale sessiooni
    $sess->createSession($res[0]);
    // tuleb suunata kasutajat pealehele
    // kus ma väljastan kasutajaandmed sessiooni kontrolliks
    $http->redirect();
}