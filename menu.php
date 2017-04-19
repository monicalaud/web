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
$sql = 'SELECT content_id, title FROM content WHERE ' . 'parent_id=' . fixDb(0) . ' AND show_in_menu=' . fixDb(1);
//saame päringu tulemuse
$res = $db->getArray($sql);
//tulemuse sisu kontroll
if ($res != false) {
    foreach ($res as $page) {
        //$item->set('name', tr($page['title']));
        //nimetamemenyy elemendi
        $item->set('name', tr($page['title']));
        //loome menyy elemendi lingi
        $link = $http->getLink(array('page_id' => $page['content_id']));
        //lisame lingi menyyse
        $item->set('link', $link);
        // lisame valmis link menüü objekti sisse
        $menu->add('items', $item->parse());
    }
}
// kontrollime objekti olemasolu ja sisu
// kui soovime pidevat asendamist, siis set funktsioon add asemel
$main_tmpl->add('menu', $menu->parse());
?>