<?php 
session_start();
include 'connexion.php';
?>
<!DOCTYPE html>
<html lang="fr">
    <body>
        <?php
        $requete=$bdd->prepare('UPDATE Client SET raisonSociale=:raisonSociale,numSIREN=:numSIREN,codeAPE=:codeAPE,adressePostale=:adressePostale,numTelephone=:numTelephone,numTelecopie=:numTelecopie,adresseMail=:adresseMail,distanceAgence=:distanceAgence,dureeTrajet=:dureeTrajet,numAgence=:numAgence WHERE numClient=:numClient')
        $requete->bindParam(':raisonSociale',$_POST['raisonSociale']);
        ?>
    </body>
</html>