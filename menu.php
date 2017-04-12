<?php
/**
 * Created by PhpStorm.
 * User: monica.laud
 * Date: 22.03.2017
 * Time: 15:26
 */
//loome menüü templaitid
$menu = new template('menu.menu');
$item = new template('menu.item');
//lisame sisu
//sql lause, mis saab menyy jaoks vajalikud andmed
$sql = 'SELECT content_id, title FROM content WHERE' .
    parent =



$item->set('name', 'esimene');
//loome menyy elemendi lingi
$link = $http->getLink(array('act' => 'first'));
//lisame lingi menyyse
$item->set('link', $link);
$menu->set('items', $item->parse());
$item->set('name', 'teine');
$link = $http->getLink(array('act' => 'second'));
$item->set('link', $link);
$menu->add('items', $item->parse());

//kontrollime objekti sisu
//kui soovime asendada siis set funktsioon add asemel, add paneks kõik uuendused otsa
$main_tmpl->add('menu', $menu->parse());
?>