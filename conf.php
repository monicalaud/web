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
define('LIB_DIR', 'lib/'); // lib kataloogi nime konst
//võtame kasutusele abifunktsiooni
require_once LIB_DIR . 'utils.php';
//võtame kasutusele vajalikud failid
require_once CLASSES_DIR . 'template.php';
require_once CLASSES_DIR . 'http.php';
require_once CLASSES_DIR . 'linkobject.php';
//LOOME     vajalikud objektid projekti tööks
$http = new linkobject();
//testime LINCobjekti tööd
echo $http->baseUrl . '<br/>';
echo $link = $http->getLink(array('kasutaja' => 'admin', 'pass' => 'qwerty'));

//echo '<pre>':
//print_r($http);
?>

