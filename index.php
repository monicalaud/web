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
$main_tmpl = new template('main');
//valmistame paarid_mallielement =>väärtus
$main_tmpl->set('user', 'Kasutajanimi');
$main_tmpl->set('title', 'pealkiri');
$main_tmpl->set('lang-bar', 'keeleriba');
$main_tmpl->set('menu', 'lehe peamenüü');
//kutsume menüü tööle
require_once 'menu.php';
$main_tmpl->set('content', 'sisu');

//kontrollime antud objekti sisu

$main_tmpl->set('site_title', 'Veebiprogrammeerimise kursus');
echo $main_tmpl->parse();

?>