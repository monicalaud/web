<?php
/**
 * Created by PhpStorm.
 * User: monica.laud
 * Date: 15.03.2017
 * Time: 15:25
 */
// defineerime muutumatud asjad - konstandid
// täiendame jooksvalt
//error_reporting(0);
define('CLASSES_DIR', 'classes/'); //classes kataloogi konstant
define('TMPL_DIR', 'tmpl/'); //template konstant. konstandid kirjutatakse alati suurte tähtedega
define('LIB_DIR', 'lib/'); // lib kataloogi nime konst
define('ACTS_DIR', 'acts/'); //acts kataloogi konf koostamine

define('DEFAULT_ACT', 'default'); //vaikimisi tegevuste faili nime muutmine
//keele moodul
define('DEFAULT_LANG', 'et');
//võtame kasutusele abifunktsiooni
require_once LIB_DIR . 'utils.php';
require_once 'db_conf.php'; //loeme andmebaasi konf sisse
//võtame kasutusele vajalikud failid
require_once CLASSES_DIR . 'template.php';
require_once CLASSES_DIR . 'http.php';
require_once CLASSES_DIR . 'linkobject.php';
require_once CLASSES_DIR . 'mysql.php';
//LOOME     vajalikud objektid projekti tööks
$http = new linkobject();
$db = new mysql(DB_HOST, DB_USER, DB_PASS, DB_NAME);
//keele tugi

//get lang_id from url
$lang_id = $http->get('lang_id');


$siteLangs = array(
    'et' => 'estonian',
    'en' => 'english',
    'ru' => 'russian'
);

if (!isset ($siteLangs[$lang_id])) {
    //if such lang id is not support
    $lang_id = DEFAULT_LANG; //ET
    $http->set('lang_id', $lang_id);
}
define('LANG_ID', $lang_id);

?>

