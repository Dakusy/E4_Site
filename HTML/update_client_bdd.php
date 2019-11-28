<?php 
session_start();
include 'connexion.php';
?>
<!DOCTYPE html>
<html lang="fr">
    <body>
        <?php
        // Preparation d'un requête pour update un client par rapport à la table Client
        $requete=$bdd->prepare('UPDATE Client SET raisonSociale=:raisonSociale,numSIREN=:numSIREN,codeAPE=:codeAPE,adressePostale=:adressePostale,numTelephone=:numTelephone,numTelecopie=:numTelecopie,adresseMail=:adresseMail,distanceAgence=:distanceAgence,dureeTrajet=:dureeTrajet,numAgence=:numAgence WHERE numClient=:numClient');
        
        $requete->bindParam(':raisonSociale',$_POST['raisonSociale']);
        $requete->bindParam(':numSIREN',$_POST['numSIREN']);
        $requete->bindParam(':codeAPE',$_POST['codeAPE']);
        $requete->bindParam(':adressePostale',$_POST['adressePostale']);
        $requete->bindParam(':numTelephone',$_POST['numTelephone']);
        $requete->bindParam(':numTelecopie',$_POST['numTelecopie']);
        $requete->bindParam(':adresseMail',$_POST['adresseMail']);
        $requete->bindParam(':distanceAgence',$_POST['distanceAgence']);
        $requete->bindParam(':dureeTrajet',$_POST['dureeTrajet']);
        $requete->bindParam(':numAgence',$_POST['numAgence']);
        $requete->bindParam(':numClient',$_POST['numClient']);
        
        $requete->execute();
        
        header('Location: affichage_fiche_client.php');
        ?>
    </body>
</html>