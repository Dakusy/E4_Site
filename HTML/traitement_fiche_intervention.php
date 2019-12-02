<?php 
session_start();
include 'connexion.php';
?>
<!DOCTYPE html>
<html lang="fr">
    <body>
	
	 <!-- Traitement pour la fiche intervention  par rapport au numéro d'Intervention. -->
	
        <?php
        $_SESSION['numIntervention']=$_POST['numIntervention'];
        $requete=$bdd->prepare('SELECT * FROM Intervention WHERE numIntervention=:numIntervention');
        $requete->bindParam(':numIntervention',$_SESSION['numIntervention']);
        $requete->execute();

        while($donnees=$requete->fetch()){
            echo 'Numéro Intervention: '.$donnees['numIntervention'].'<br>';
            echo 'Date: '.$donnees['date'].'<br>';
            echo 'Heure: '.$donnees['heure'].'<br>';
            echo 'Temps intervention: '.$donnees['tempsIntervention'].'<br>';
            echo 'Commentaire: '.$donnees['commentaireTechnicien'].'<br>';
            echo 'Numéro de client: '.$donnees['numClient'].'<br>';
            echo 'Technicien affecté: '.$donnees['numEmploye'].'<br>';
        }
        ?>
    </body>
    <?php 
    include 'bootstrap.php';
    ?>
</html>