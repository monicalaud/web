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

    //klassi konstruktor
    function __construct($f)
    {
        $this->file = $f; //määrame html faili nime
        $this->loadFile(); //loeme määratud failist sisu
    }//konstruktor

    //html faili sisu lugemine
    function loadFile()
    {
        $f = $this->file; // lokaalne asendus
        // kontrollime mallide kausta olemasolu
        if (!is_dir(TMPL_DIR)) {
            echo 'Kataloogi ' . TMPL_DIR . ' ei ole leitud<br />';
            exit;
        }
        // kui fail on olemas ja lugemiseks sobiv
        if (file_exists($f) and is_file($f) and is_readable($f)) {
            // loeme failist malli sisu
            $this->readFile($f);
        }

        // lisame TMPL_DIR KASUTUSELE
        $f = TMPL_DIR . $this->file; //veel yks lokaalne kasutus
        if (file_exists($f) and is_file($f) and is_readable($f)) {
            // loeme failist malli sisu
            $this->readFile($f);
        }
        // lisame .html laienduse kasutuse
        $f = TMPL_DIR . $this->file . '.html'; //veel yks lokaalne kasutus
        if (file_exists($f) and is_file($f) and is_readable($f)) {
            // loeme failist malli sisu
            $this->readFile($f);
        }

        // kui sisu ei olnud võimalik lugeda
        if ($this->content === false) {
            echo 'Ei suutnud lugeda faili ' . $this->file . '<br />';
        }
    }// loadFile
    // loeme faili sisu html faili  mallist
    function readFile($f)
    {
        $this->content = file_get_contents($f); //html faili sisu , contendid tulid juba valikust
    }//readFile

    //koostame paarid malli_element => reaalne_väärtus
    function set($name, $val)
    {
        $this->vars [$name] = $val;
    }//set

    //html malli täitminereaalse sisuga
    function parse()
    {
        $str = $this->content; //lokaalne lyhendus
        //vaatame malli elemente läbi
        foreach ($this->vars as $name => $val) {
            $str = str_replace('{' . $name . '}', $val, $str);
        }
        // tagastame täis täidetud malli sisu
        return $str;
    }// parse
}// klassi lõpp
?>