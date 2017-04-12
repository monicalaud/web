<?php
/**
 * Created by PhpStorm.
 * User: monica.laud
 * Date: 12.04.2017
 * Time: 12:03
 */
//defineerime eraldaja template abil
$sep = new Template('lang.sep');
$sep = $sep->parse();
$count = 0;
// koik keeled meil on konfis keelemassiivis kujul -et=>nimi
foreach ($siteLangs as $lamg_id => $lang_name) {
    //suurendame keele eraldjatae joonistamiseks
    $count++;
    //kui tegu on aktiivse  keelega, kasutame aktiivset malli
    if ($lang_id == LANG_ID) {
        $item = new Template ('lang.active');
    } //muidu tavaline mall
    else {
        $item = new Template ('lang.item');
    }
    //keelte vajhhel klopsamiseks oleks vaja linkikuhu lahevad massid
    $link = $http->getLink(array('lang_id' => $lang_id), array('act', 'page_id'), array('lang_id'));
    $item->set('link', $link);
    $item->set('name', $lang_name);
    $tmpl->add('lang_bar', $item->parse());

    //keele eraldamiseks paneme separaatori, viimasele ei
    if ($count < $count($siteLang)) {
        $tmpl->add('lang_bar', $sep);

    }
}


