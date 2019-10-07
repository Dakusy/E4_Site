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
            echo $donnees['numClient'];
            echo $donnees['raisonSociale'];
            echo $donnees['numSIREN'];
            echo $donnees['codeAPE'];
            echo $donnees['adressePostale'];
            echo $donnees['numTelephone'];
            echo $donnees['numTelecopie'];
            echo $donnees['adresseMail'];
            echo $donnees['distanceAgence'];
            echo $donnees['dureeTrajet'];
            echo $donnees['numAgence'];
        }
        ?>
    </body>
    <?php 
    include 'bootstrap.php';
    ?>
</html>