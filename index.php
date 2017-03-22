<?php
/**
 * Created by PhpStorm.
 * User: monica.laud
 * Date: 15.03.2017
 * Time: 13:08
 */
// kirjutame et võtame confi kasutusele
require_once 'conf.php';
//pealehe sisu sisselugemine
echo '<h1>veebriprogrameerimise esimene leht</h1>';
//valmistame peamalli objekti
$main_tmpl = new template('main.html');
//kontrollime antud objekti sisu
echo '<pre>';
print_r($main_tmpl);
echo '</pre>';
?>