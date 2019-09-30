<?php
try{
    $bdd = new PDO('mysql:host=access799985010.webspace-data.io;dbname=dbs179815;charset=utf8', 'u98724108', 'Hitler59110*', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    echo 'reussie';
}
catch(Exception $e){
    die('Erreur : '.$e->getMessage());
}
?>