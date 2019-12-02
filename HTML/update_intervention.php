<?php 
session_start();
include 'connexion.php';
?>
<!DOCTYPE html>
<html lang="fr">
    <body>
        <?php

        //Utilisation de DateFormat pour convertir la date HTML en PHP mais obsolète vu qu'on récupere les données directement depuis la BDD
	/*	class DateFormat {
	public static function alter($date, $before, $after) {
		return DateTime::createFromFormat($before, $date)->format($after);
	}
	public static function toSQL($date, $before = 'd/m/Y') {
		return self::alter($date, $before, 'Y-m-d H:i:s');
	}
	public static function toHTML($date, $before = 'Y-m-d H:i:s') {
		return self::alter($date, $before, 'd/m/Y');
	}
}*/
        $requete=$bdd->prepare('UPDATE Intervention SET date=:date,heure=:heure,tempsIntervention=:tempsIntervention,commentaireTechnicien=:commentaireTechnicien,numClient=:numClient,numEmploye=:numEmploye WHERE numIntervention=:numIntervention');
		$requete->bindParam(':numIntervention',$_POST['numIntervention']);
        $requete->bindParam(':date',$_POST['date']);
        $requete->bindParam(':heure',$_POST['heure']);
        $requete->bindParam(':tempsIntervention',$_POST['tempsIntervention']);
        $requete->bindParam(':commentaireTechnicien',$_POST['commentaireTechnicien']);
		$requete->bindParam(':numClient',$_POST['numClient']);
        $requete->bindParam(':numEmploye',$_POST['numEmploye']);
        
        $requete->execute();
        
        //header('Location: affichage_Intervention.php');
        ?>
    </body>
</html>