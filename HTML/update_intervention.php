<?php 
session_start();
include 'connexion.php';
?>
<!DOCTYPE html>
<html lang="fr">
    <body>
        <?php
        $requete=$bdd->prepare('UPDATE Intervention SET date=:date,heure=:heure,tempsIntervention=:tempsIntervention,commentaireTechnicien=:commentaireTechnicien,numClient=:numClient,numEmploye=:numEmploye WHERE numIntervention=:numIntervention');
        
        $requete->bindParam(':date',$_POST['date']);
        $requete->bindParam(':heure',$_POST['heure']);
        $requete->bindParam(':tempsIntervention',$_POST['tempsIntervention']);
        $requete->bindParam(':commentaireTechnicien',$_POST['commentaireTechnicien']);
        $requete->bindParam(':numClient',$_POST['numClient']);
        $requete->bindParam(':numEmploye',$_POST['numEmploye']);
        
        $requete->execute();
        
        header('Location: affichage_Intervention.php');
        ?>
    </body>
</html>