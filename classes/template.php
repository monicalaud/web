<?php

/**
 * Created by PhpStorm.
 * User: monica.laud
 * Date: 22.03.2017
 * Time: 12:11
 */
class template
{// classi algus
    //template  klassi omadused-muutujad
    var $file = ''; //template fail(main)
    var $content = false; //sisu veel puudub, html faili sisu
    var $vars = array(); //tyhi massiiv, html vaate sisu, reaalsed väärtused

    // loeme faili sisu html faili  mallist
    function readFile($f)
    {
        $this->content = file_get_contents($f); //html faili sisu , contendid tulid juba valikust
    }//readFile
}

classi lõpp