<?php
/**
 * Created by PhpStorm.
 * User: monica.laud
 * Date: 15.03.2017
 * Time: 15:25
 */
// defineerime muutumatud asjad - konstandid
// täiendame jooksvalt
define('CLASSES_DIR', 'classes/'); //classes kataloogi konstant
define('TMPL_DIR', 'tmpl/'); //template konstant. konstandid kirjutatakse alati suurte tähtedega
//võtame kasutusele vajalikud failid
require_once CLASSES_DIR . 'template.php';
require_once CLASSES_DIR . 'http.php';
//LOOME     vajalikud objektid projekti tööks
$http = new http();
//testime http objekti tööd
echo REMOTE_ADDR;
?>

