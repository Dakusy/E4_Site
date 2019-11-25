<?php 
session_start();
include 'connexion.php';
?>
<!DOCTYPE html>
<html lang="fr">
    <body>
        <?php
		//Création d'un requête pour récuperer les données de fiche intervention pour les modifiers ensuite
        $requete=$bdd->prepare('SELECT * FROM Intervention WHERE numIntervention=:numIntervention');
        $requete->bindParam(':numIntervention',$_SESSION['numIntervention']);
        $requete->execute();
        $donnees=$requete->fetch();
        ?>
        <form action="update_intervention.php" method="post">
            <input type="hidden" name="numIntervention" value="<?php echo $donnees['numIntervention'];?>"><br>
            <label>Date: </label><input type="date" name="Date" value="<?php echo $donnees['date'];?>"><br>
            <label>Heure: </label><input type="text" name="Heure" value="<?php echo $donnees['heure'];?>"><br>
            <label>TempsIntervention: </label><input type="text" name="tempsIntervention" value="<?php echo $donnees['tempsIntervention'];?>"><br>
            <label>CommentaireTechnicien: </label><input type="text" name="commentaireTechnicien" value="<?php echo $donnees['commentaireTechnicien'];?>"><br>
            <label>Numero de Client: </label><input type="text" name="numClient" value="<?php echo $donnees['numClient'];?>"><br>
            <label>Numero d'employe: </label><input type="text" name="numEmploye" value="<?php echo $donnees['numEmploye'];?>"><br>
            <input type="submit" value="Insertion">
        </form>
    </body>
</html>