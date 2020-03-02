<?php

//Fichier de connexion à la BDD en root

try{
    $bdd = new PDO('mysql:host=localhost;dbname=cashcash;charset=utf8','admin','admin',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e){
    die('Erreur : '.$e->getMessage());
}
?>