<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of XMLManager
 *
 * @author dimitry.krychylskyy
 */
class XMLManager {

    private $file;

    //put your code here
    public function aff($arg) {
        print_r($arg);
    }

    public function uploadFile() {
        $uploads_dir = "uploads/";
        $tmp_name = $_FILES["fichierxml"]["tmp_name"];
        $name = $_FILES["fichierxml"]["name"];
        $upload = move_uploaded_file($tmp_name, $uploads_dir.$name);
        
        if($upload){
            echo 'File '.$name.' est ajoutée';
            echo '<br>';
            echo 'Traitement...';
            
            $this->readXML($uploads_dir . $name);
        }
    }

    private function readXML($arg) {
        $file = $arg;
        $xml = simplexml_load_file($file);
        foreach($xml->PRODUCT as $val){
            echo $val;
        }
       
    }

}
