<?php
session_start();
include 'connexionTechnicien.php';
$_SESSION['Temps']=$_POST['Temps'];
$_SESSION['Commentaire']=$_POST['Commentaire'];


if(isset( $_SESSION['Temps'])&&isset($_SESSION['Commentaire'])){

    $insertValidation=$bdd->prepare('UPDATE intervention 
SET tempsIntervention= :temps
,commentaireTechnicien= :commentaire
WHERE numIntervention ='.$_SESSION['numIntervention']);
    $insertValidation->bindParam(':temps', $_SESSION['Temps']);
    $insertValidation->bindParam(':commentaire',$_SESSION['Commentaire']);
    $insertValidation->execute();

    echo 'Tout a bien été uptade';
}else{
    echo 'Erreur';
}

?>