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
$item->set('name', 'esimene');
$menu->set('item', $item->parse());
$item->set('name', 'teine');
$menu->add('item', $item->parse());

//kontrollime objekti sisu
//kui soovime asendada siis set funktsioon add asemel, add paneks kõik uuendused otsa
$main_tmpl->add('menu', $menu->parse());
?>