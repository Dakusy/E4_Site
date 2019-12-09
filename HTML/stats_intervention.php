<?php
session_start();

$statNbIntervention=$bdd->prepare('SELECT count(*)
                                    FROM intervention 
                                    WHERE technicien=:numTechnicien 
                                    AND date BETWEEN :dateDeb AND :dateFin');
$insertValidation->bindParam(':numTechnicien', $_SESSION['numTechnicien']);
$insertValidation->bindParam(':dateDeb',$_SESSION['dateDeb']);
$insertValidation->bindParam(':dateFin',$_SESSION['dateFin']);
$insertValidation->execute();
?>