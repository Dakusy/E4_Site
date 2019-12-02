<?php
session_start();

//Traitement pour la fiche client par rapport au numéro du Client.

$_SESSION['numClient']=$_POST['numClient'];
if(isset($_POST['visualiser'])){
    header('Location: visualiser_fiche_client.php');
}
else{
    header('Location: modifier_fiche_client.php');
}
?>