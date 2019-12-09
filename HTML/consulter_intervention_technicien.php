<?php 
session_start();
include 'connexionTechnicien.php';
?>
<!DOCTYPE html>
<html lang="fr">
    <?php

    ?>
    <body>
        <center>
            <div class = "row">
                <section class = "col-lg-4 offset-lg-4">
                    <br><br>
                    <center>
                        <div class = "jumbotron">
                            <form action="./consulter_intervention_technicien.php" method="post">
                                <div class="col-lg-8">
                                    <div class="input-group">
                                        <!-- Reparer cette barre de recherche  pour qu'elle recherche bien le num cherché -->
                                        <label>Numéro d'intervention :  </label>
                                        <input type="text" name="numIntervention" value="" placeholder="...">
                                        <div class="input-group-btn">
                                        </div>
                                    </div>
                                </div>
                            </form>


                            <form action="./traitement_fiche_intervention.php" method="post">
                                <br>
                                <select multiple class="form-control col-12" id="exampleFormControlSelect2" size = 10 style = "width: auto" name="numIntervention">
                                    <?php
                                    $idTech="SELECT numEmploye 
                                            FROM technicien t, users u 
                                            WHERE u.proprietaire=t.numEmploye";
                                    $rqIdTech=$bdd->query($idTech);
                                    $idTech=$rqIdTech->fetch();
                                    $numIntervention="SELECT numIntervention 
                                            FROM intervention i INNER JOIN technicien t ON i.numEmploye=t.numEmploye 
                                            WHERE t.numEmploye=".$idTech['numEmploye']." 
                                            ORDER BY date ASC";
                                    $rqnumIntervention=$bdd->query($numIntervention);
                                    while($result=$rqnumIntervention->fetch()){
                                        echo "<option>".$result['numIntervention']."</option>";
                                    }
                                    ?>
                                </select>
                                <br>
                                <button type="submit" name="Consulter">Consulter</button>
                            </form>
                            <form action="./validation_fiche_intervention.php" method="post">
                                <select multiple class="form-control col-12" id="exampleFormControlSelect2" size = 10 style = "width: auto" name="numIntervention">
                                    <?php
                                    $idTech="SELECT numEmploye 
                                            FROM technicien t, users u 
                                            WHERE u.proprietaire=t.numEmploye";
                                    $rqIdTech=$bdd->query($idTech);
                                    $idTech=$rqIdTech->fetch();
                                    $numIntervention="SELECT numIntervention 
                                            FROM intervention i INNER JOIN technicien t ON i.numEmploye=t.numEmploye 
                                            WHERE t.numEmploye=".$idTech['numEmploye']." 
                                            ORDER BY date ASC";
                                    $rqnumIntervention=$bdd->query($numIntervention);
                                    while($result=$rqnumIntervention->fetch()){
                                        echo "<option>".$result['numIntervention']."</option>";
                                    }
                                    ?>
                                </select>
                                <input type="submit" value="Valider">
                            </form>
                        </div>
                    </center>
                </section>
            </div>
        </center>
        <?php 
        include 'bootstrap.php';
        ?>
    </body>
</html>