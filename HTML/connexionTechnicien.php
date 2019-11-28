<?php
	//Connexion pour le technicien
try{
    $bdd = new PDO('mysql:host=localhost;dbname=e4site;charset=utf8', 'technicien', 'technicien', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e){
    die('Erreur : '.$e->getMessage());
}
?>