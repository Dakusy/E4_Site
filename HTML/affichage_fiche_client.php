<?php 
session_start();
session_unset();
include 'connexion.php';
?>
<!DOCTYPE html>
<html lang="fr">
    <body>
        <?php
        $requete=$bdd->query('SELECT * FROM Client');

        while($donnees=$requete->fetch()){
            echo $donnees['numClient'].'<br>';
            echo $donnees['raisonSociale'].'<br>';
            echo $donnees['numSIREN'].'<br>';
            echo $donnees['codeAPE'].'<br>';
            echo $donnees['adressePostale'].'<br>';
            echo $donnees['numTelephone'].'<br>';
            echo $donnees['numTelecopie'].'<br>';
            echo $donnees['adresseMail'].'<br>';
            echo $donnees['distanceAgence'].'<br>';
            echo $donnees['dureeTrajet'].'<br>';
            echo $donnees['numAgence'].'<br>'.'<br>';
        }
        ?>
    </body>
    <?php 
    include 'bootstrap.php';
    ?>
</html>