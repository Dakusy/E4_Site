<?php 
session_start();
include 'connexion.php';
?>
<!DOCTYPE html>
<html lang="fr">
    <body>
        <form action="traitement_fiche_client.php" method="post">
            <label>Numéro de client: </label><input type="text" name="numClient" value=""><br>
            <input type="submit" value="Visualiser" name="visualiser">
            <input type="submit" value="Modifier" name="modifier">
        </form>
    </body>
    <?php 
    include 'bootstrap.php';
    ?>
</html>