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
    echo 'sobivat faili ei ole';
}
?>