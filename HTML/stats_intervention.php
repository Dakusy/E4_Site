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
                    <center>
                        <div class = "jumbotron">
                            <?php
                            //Recherche du nombre d'intervention réalisé ce mois ci par le technicien connecté
                            $date=date('m-y');
                            $_SESSION['dateDeb']='01-'.$date;
                            $_SESSION['dateFin']='31-'.$date;
                            $statNbIntervention=$bdd->prepare('SELECT count(*) as nbIntervention
                                    FROM intervention as i, client as c
                                    WHERE numEmploye=:numTechnicien 
                                    AND date BETWEEN :dateDeb AND :dateFin
                                    AND i.numClient=c.numClient');
                            $statNbIntervention->bindParam(':numTechnicien', $_SESSION['numTechnicien']);
                            $statNbIntervention->bindParam(':dateDeb',$_SESSION['dateDeb']);
                            $statNbIntervention->bindParam(':dateFin',$_SESSION['dateFin']);
                            $statNbIntervention->execute();
                            $result=$statNbIntervention->fetch();
                            echo "Nombre d'intervention ce mois ci : ".$result['nbIntervention'].'<br>';

                            //Calcul du nombre de KM parcourus par intervention et somme de ceux-ci sur le mois en cour
                            $statNBkmParcouru=$bdd->prepare('SELECT sum(c.distanceAgence) as nbKM 
                            FROM intervention as i,client as c 
                            WHERE i.numEmploye=:numTechnicien AND i.numClient = c.numClient 
                            AND i.date BETWEEN :dateDeb AND :dateFin ');
                            $statNBkmParcouru->bindParam(':numTechnicien', $_SESSION['numTechnicien']);
                            $statNBkmParcouru->bindParam(':dateDeb',$_SESSION['dateDeb']);
                            $statNBkmParcouru->bindParam(':dateFin',$_SESSION['dateFin']);
                            $statNBkmParcouru->execute();
                            $result=$statNBkmParcouru->fetch();
                            echo "Nombre de KM totaux parcourus pendant les interventions : ".$result['nbKM'].'<br>';

                            //Calcul de la durée totale d'intervention réalisé par le technicien ce mois ci
                            $statDuree=$bdd->prepare('SELECT sum(`tempsIntervention`)as temps 
                                                    FROM intervention
                                                    WHERE numEmploye=:numTechnicien
                                                    AND date BETWEEN :dateDeb AND :dateFin');
                            $statDuree->bindParam(':numTechnicien', $_SESSION['numTechnicien']);
                            $statDuree->bindParam(':dateDeb',$_SESSION['dateDeb']);
                            $statDuree->bindParam(':dateFin',$_SESSION['dateFin']);
                            $statDuree->execute();
                            $result=$statDuree->fetch();
                            echo "Temps total passé en intervention ce mois ci : ".$result['temps'].' min<br>';


                            ?>
                        </div>
                    </center>
                </section>
            </div>
        </center>
    </body>
    <?php
    include 'bootstrap.php';
    ?>
</html>
