<?php
session_start();
include 'connexion.php';
 // Création de variable SESSION pour les informations des interventions pour une simplicité général dans nos pages 
 
if(isset($_POST['numIntervention']))
{
$_SESSION['numIntervention'] = $_POST["numIntervention"]; 
$_SESSION['date'] = $_POST["date"];
$_SESSION['heure'] = $_POST["heure"];
$_SESSION['tempsIntervention'] = $_POST["tempsIntervention"];
$_SESSION['commentaireTechnicien'] = $_POST["commentaireTechnicien"];
$_SESSION['numClient'] = $_POST["numClient"];
$_SESSION['$numEmploye'] = $_POST["numEmploye"];
}
// Appel de 2 requêtes pour préparer et insérer les données d'intervention dans la BDD

$req = $bdd->prepare("SELECT numIntervention FROM Intervention WHERE numIntervention = :numIntervention ");
	$req->execute(array(
			"numIntervention" => $_SESSION['numIntervention']
			));
			
$numInterventionExist = $req->rowCount();

if($numInterventionExist == 0){
$req2 = $bdd->prepare("INSERT INTO Intervention (numIntervention, date, heure, tempsIntervention, commentaireTechnicien, numClient, numEmploye) VALUES (:numIntervention, :date, :heure, :tempsIntervention, :commentaireTechnicien, :numClient, :numEmploye)");
	$req2->execute(array(
			"numIntervention" => $_SESSION['numIntervention'],
			"date" => $_SESSION['date'],
			"heure" => $_SESSION['heure'],
			"tempsIntervention" => $_SESSION['tempsIntervention'],
			"commentaireTechnicien" => $_SESSION['commentaireTechnicien'],
			"numClient" => $_SESSION['numClient'],
			"numEmploye" => $_SESSION['$numEmploye']
			));
}

else{
	
?>

<script>
alert("Erreur : Numéro d'Intervention déjà existant, vous allez être redirigé vers le formulaire");
document.location.href="formulaire_insertion_intervention.php";
</script>

<?php

}
?>

<!DOCTYPE html>
<html lang="fr">

<!-- Demande pour génerer le PDF maintenant ou plus tard -->

    <body>
	<center><form ACTION="pdf.php" METHOD="post">
	<p>Voulez vous génerer un PDF lié à votre Intervention ou ultérieurement ?
	
	<input type="submit" value="Oui" >
	</form>
	
	<form ACTION="modifier_intervention.php" METHOD="post">
	<input type="submit" value="Non"></center></p>
	</form>
	
	</body>
</html>

