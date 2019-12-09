<?php 
session_start();
include 'connexion.php';
?>
<!DOCTYPE html>
<html lang="fr">
    <body>
        <form action="./insert_validation_intervention.php" method="post">
            <?php
            $_SESSION['numIntervention']=$_POST['numIntervention'];
            $requete=$bdd->prepare('SELECT * FROM Intervention WHERE numIntervention=:numIntervention');
            $requete->bindParam(':numIntervention',$_SESSION['numIntervention']);
            $requete->execute();

            while($donnees=$requete->fetch()){
                echo 'Numéro Intervention: '.$donnees['numIntervention'].'<br>';
                echo 'Date: '.$donnees['date'].'<br>';
                echo 'Heure: '.$donnees['heure'].'<br>';
                echo 'Temps intervention: '?><input type="text" name="Temps" /><br><?php 
                    echo 'Commentaire: '?><input type="text" name="Commentaire" /><br><?php 
                    echo 'Numéro de client: '.$donnees['numClient'].'<br>';
                echo 'Technicien affecté: '.$donnees['numEmploye'].'<br>';
            }

            ?>
            <br>
            <button type="submit" name="Valider">Valider</button>
        </form>
    </body>
    <?php 
    include 'bootstrap.php';
    ?>
</html>