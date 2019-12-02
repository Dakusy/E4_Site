<?php 
session_start();
include 'connexion.php';
?>
<!DOCTYPE html>
<html lang="fr">
    <body>
	<!-- Page permettant la validation d'une fiche intervention par le biais d'une requête et d'une visualisation des données. -->
        <?php
        $_SESSION['numIntervention']=$_POST['numIntervention'];
        $requete=$bdd->prepare('SELECT * FROM Intervention WHERE numIntervention=:numIntervention');
        $requete->bindParam(':numIntervention',$_SESSION['numIntervention']);
        $requete->execute();

        while($donnees=$requete->fetch()){
            echo 'Numéro Intervention: '.$donnees['numIntervention'].'<br>';
            echo 'Date: '.$donnees['date'].'<br>';
            echo 'Heure: '.$donnees['heure'].'<br>';
            echo 'Temps intervention: '?><input type="text" name="Temps" /><?php '<br>';
            echo 'Commentaire: '?><input type="text" name="Commentaire" /><?php '<br>';
            echo 'Numéro de client: '.$donnees['numClient'].'<br>';
            echo 'Technicien affecté: '.$donnees['numEmploye'].'<br>';
        }
        ?>
    </body>
    <?php 
    include 'bootstrap.php';
    ?>
</html>