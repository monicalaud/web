<?php
/**
 * Created by PhpStorm.
 * User: monica.laud
 * Date: 5.04.2017
 * Time: 9:03
 */
//mootor act tominguteks
$act = $http->get('act'); //kysime oma hetke tegevust
$fn = ACTS_DIR . str_replace('.', '/', $act) . '.php'; //koostame otsitava faili nimed
if (file_exists($fn) and is_file($fn) and is_readable($fn)) {
    //loeme sisu
    require_once $fn;

} else {
    $fn = ACTS_DIR . DEFAULT_ACT . '.php';
    $http->set('act', DEFAULT_ACT); //PANEME DEFAULT VÄÄRTUSEKS  ACT=DEFAULT
    require_once $fn;
}
?>