<?php
try{
    $bdd = new PDO('mysql:host=localhost;dbname=e4site;charset=utf8', 'assistant', 'assistant', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e){
    die('Erreur : '.$e->getMessage());
}
?>