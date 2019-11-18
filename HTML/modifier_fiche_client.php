<?php 
session_start();
include 'connexion.php';
?>
<!DOCTYPE html>
<html lang="fr">
    <body>
        <?php
        $requete=$bdd->prepare('SELECT * FROM Client WHERE numClient=:numClient');
        $requete->bindParam(':numClient',$_SESSION['numClient']);
        $requete->execute();
        $donnees=$requete->fetch();
        ?>
        <form action="" method="post">
            <label>Numéro Client: </label><input type="text" value="<?php echo $donnees['numClient'];?>"><br>
            <label>Raison Sociale: </label><input type="text" value="<?php echo $donnees['raisonSociale'];?>"><br>
            <label>Numéro SIREN: </label><input type="text" value="<?php echo $donnees['numSIREN'];?>"><br>
            <label>Code APE: </label><input type="text" value="<?php echo $donnees['codeAPE'];?>"><br>
            <label>Adresse Postale: </label><input type="text" value="<?php echo $donnees['adressePostale'];?>"><br>
            <label>Numéro de Téléphone: </label><input type="text" value="<?php echo $donnees['numTelephone'];?>"><br>
            <label>Numéro de Télécopie: </label><input type="text" value="<?php echo $donnees['numTelecopie'];?>"><br>
            <label>Adresse Mail: </label><input type="text" value="<?php echo $donnees['adresseMail'];?>"><br>            
            <label>Distance Agence: </label><input type="text" value="<?php echo $donnees['distanceAgence'];?>"><br>
            <label>Durée du trajet: </label><input type="text" value="<?php echo $donnees['dureeTrajet'];?>"><br>
            <label>Numéro d'agence: </label><input type="text" value="<?php echo $donnees['numAgence'];?>"><br>
        </form>
    </body>
</html>
