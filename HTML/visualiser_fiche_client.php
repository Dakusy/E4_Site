<?php 
session_start();
include 'connexion.php';
?>
<!DOCTYPE html>
<html lang="fr">
    <body>
        <?php
		
		// préparation d'une requête pour récupérer les données depuis la table Client.
		
        $requete=$bdd->prepare('SELECT * FROM Client WHERE numClient=:numClient');
        $requete->bindParam(':numClient',$_SESSION['numClient']);
        $requete->execute();

		// Visualisation des données de la fiche clien sélectionné.

        while($donnees=$requete->fetch()){
            echo 'Numéro Client: '.$donnees['numClient'].'<br>';
            echo 'Raison Sociale: '.$donnees['raisonSociale'].'<br>';
            echo 'Numéro SIREN: '.$donnees['numSIREN'].'<br>';
            echo 'Code APE: '.$donnees['codeAPE'].'<br>';
            echo 'Adresse Postale: '.$donnees['adressePostale'].'<br>';
            echo 'Numéro de Téléphone: '.$donnees['numTelephone'].'<br>';
            echo 'Numéro de Télécopie: '.$donnees['numTelecopie'].'<br>';
            echo 'Adresse Mail: '.$donnees['adresseMail'].'<br>';
            echo 'Distance Agence: '.$donnees['distanceAgence'].'<br>';
            echo 'Durée du trajet: '.$donnees['dureeTrajet'].'<br>';
            echo 'Numéro d\'agence: '.$donnees['numAgence'].'<br>'.'<br>';
        }
        ?>
    </body>
    <?php 
    include 'bootstrap.php';
    ?>
</html>