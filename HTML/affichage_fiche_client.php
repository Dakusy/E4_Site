<?php 
session_start();
include 'connexionAssistant.php';
?>
<!DOCTYPE html>
<html lang="fr">

<!-- Affiche les informations lié à une fiche Client -->

    <body>
        <center>
            <div class = "row">
                <section class = "col-lg-4 offset-lg-4">
                    <br><br>
                    <div class = "jumbotron">
                        <div class= "offset-2">
                            <div class="form-group row">
                                <form action="traitement_fiche_client.php" method="post">
                                    <div class="col-lg-5">
                                        <label>Numéro de client: </label>
                                        <input type="text" name="numClient" value=""><br>

                                        <select multiple class="form-control col-12" id="exampleFormControlSelect2" size = 10 style = "width: auto" name="numCLient">
                                            <?php
                                            $numClient="SELECT numClient FROM Client";
                                            $rqnumClient=$bdd->query($numClient);
                                            while($result=$rqnumClient->fetch()){
                                                echo "<option>".$result['numClient']."</option>";
                                            }
                                            ?>
                                        </select>
                                        <input type="submit" value="Visualiser" name="visualiser">
                                        <input type="submit" value="Modifier" name="modifier">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

        </center>

        <?php 
        include 'bootstrap.php';
        ?>
    </body>
</html>