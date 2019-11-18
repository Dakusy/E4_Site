<?php
session_start();
include 'connexion.php';

if(isset($_POST['numIntervention']))
{
$nom = $_POST["numIntervention"]; 
$date = $_POST["date"];
$heure = $_POST["heure"];
$tempsIntervention = $_POST["tempsIntervention"];
$commentaireTechnicien = $_POST["commentaireTechnicien"];
$numClient = $_POST["numClient"];
$numEmploye = $_POST["numEmploye"];
}

$req = $bdd->prepare("INSERT INTO intervention (numIntervention, date, heure, tempsIntervention, commentaireTechnicien, numClient, numEmploye) VALUES (:numIntervention, :date, :heure, :tempsIntervention, :commentaireTechnicien, :numClient, :numEmploye)");
	$req->execute(array(
			"numIntervention" => $nom,
			"date" => $date,
			"heure" => $heure,
			"tempsIntervention" => $tempsIntervention,
			"commentaireTechnicien" => $commentaireTechnicien,
			"numClient" => $numClient,
			"numEmploye" => $numEmploye
			));
 


?>