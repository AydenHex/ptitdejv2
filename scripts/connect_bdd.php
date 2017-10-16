<?php
/**
 * Created by PhpStorm.
 * User: royerq
 * Date: 16/10/2017
 * Time: 10:20
 */

try {
    $bdd = new PDO('mysql:host=localhost;dbname=ptitdej_v1;charset=utf8', 'root', '');
}
catch(Exception $e){
    die('Erreur : '.$e->getMessage());
}