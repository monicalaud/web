<?php
/**
 * Created by PhpStorm.
 * User: monica.laud
 * Date: 5.04.2017
 * Time: 9:18
 */
//lehe id saamine ja teisendamine
$page_id = (int)$http->get('page_id');
//sql lause lehe sisu otsimiseks
$sql = 'SELECT * FROM content WHERE ' .
    'content_id=' . fixDb($page_id);
//saadame andmebaasi
$res = $db->getArray($sql);
if ($res == false) {
    $sql = 'SELECT * FROM  content WHERE ' . 'is_first_page=' . fixDb(1);
    $res = $db->getArray($sql);
}
if ($res !== false) {
    $page = $res[0];
    $http->set('page_id', $page['content_id']);
    $main_tmpl->set('content', $page['content']);
}
?>