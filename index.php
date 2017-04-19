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
//require language control//
require_once('lang.php');

//create and output menu
// import menu file

//valmistame paarid_mallielement =>väärtus
$main_tmpl->set('user', $sess->user_data['username']);
$main_tmpl->set('title', 'pealkiri');
//kutsume menüü tööle
require_once 'menu.php';
//tõstsime vaikimisi degevuse default faili sisse
require_once 'act.php';

//$main_tmpl->set('nav_bar', $sess->user_data['username']);

//kontrollime antud objekti sisu

$main_tmpl->set('site_title', 'Veebiprogrammeerimise kursus');
echo $main_tmpl->parse();
//uuendame sessiooni andmed
$sess->$flush();

?>