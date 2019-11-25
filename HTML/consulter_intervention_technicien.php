<?php 
session_start();
include 'connexionTechnicien.php';
?>
<!DOCTYPE html>
<html lang="fr">
    <body>
        <center>
            <div class = "row">
                <section class = "col-lg-4 offset-lg-4">
                    <br><br>
                    <div class = "jumbotron">
                        <div class= "offset-2">
                            <div class="form-group row">
                                <form action="traitement_fiche_intervention.php" method="post">
                                    <div class="col-lg-8">
                                        <label>Numéro d'intervention: </label>
                                        <input type="text" name="numIntervention" value=""><br>
                                        <br>
                                        <select multiple class="form-control col-12" id="exampleFormControlSelect2" size = 10 style = "width: auto" name="numCLient">
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
                                        <input type="submit" value="Consulter" name="Consulter">
                                        
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