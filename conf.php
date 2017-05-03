<?php
/**
 * Created by PhpStorm.
 * User: monica.laud
 * Date: 15.03.2017
 * Time: 15:25
 */
// defineerime muutumatud asjad - konstandid
// täiendame jooksvalt
error_reporting(0);
define('CLASSES_DIR', 'classes/'); //classes kataloogi konstant
define('TMPL_DIR', 'tmpl/'); //template konstant. konstandid kirjutatakse alati suurte tähtedega
define('LIB_DIR', 'lib/'); // lib kataloogi nime konst
define('LANG_DIR', 'lang/');
define('ACTS_DIR', 'acts/'); //acts kataloogi konf koostamine

define('DEFAULT_ACT', 'default'); //vaikimisi tegevuste faili nime muutmine
//keele moodul
define('DEFAULT_LANG', 'et');
define('ROLE_NONE', 0);
define('ROLE_ADMIN', 1);
define('ROLE_USER', 2);
//võtame kasutusele abifunktsiooni
require_once LIB_DIR . 'utils.php';
require_once LIB_DIR . 'trans.php';
require_once 'db_conf.php'; //loeme andmebaasi konf sisse
//võtame kasutusele vajalikud failid
require_once CLASSES_DIR . 'template.php';
require_once CLASSES_DIR . 'http.php';
require_once CLASSES_DIR . 'linkobject.php';
require_once CLASSES_DIR . 'mysql.php';
require_once CLASSES_DIR . 'session.php';
//LOOME     vajalikud objektid projekti tööks
$http = new linkobject();  //tegeleb andmete liikumisega
$db = new mysql(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$sess = new session($http, $db);

//keele tugi
//lehel kasutatud keeled

//get lang_id from url
$lang_id = $http->get('lang_id');


$siteLangs = array(
    'et' => 'eesti',
    'en' => 'inglise',
    'ru' => 'vene'
);

if (!isset ($siteLangs[$lang_id])) {
    //if such lang id is not support
    $lang_id = DEFAULT_LANG; //ET
    $http->set('lang_id', $lang_id);
}
define('LANG_ID', $lang_id);
require_once LIB_DIR . 'trans.php';

?>

