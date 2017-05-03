<?php
/**
 * Created by PhpStorm.
 * User: monica.laud
 * Date: 3.05.2017
 * Time: 9:08
 */
//loome sisselogimisvormi objekti
$login = new template('login');
$error = $sess->get('error');
$login->set('error', $error);
//paneme reaalsed väärtused
$login->set('kasutajanimi', tr('Kasutaja'));
$login->set('parool', tr('Parool'));
$login->set('nupp', tr('Logi sisse'));

//loome lingi
$link = $http->getLink(array('act' => 'login_do'));
$login->set('link', $link);
// paneme sinu template sisse
$main_tmpl->set('content', $login->parse());