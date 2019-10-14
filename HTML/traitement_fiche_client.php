<?php
if(isset($_POST['visualiser'])){
    header('Location: visualiser_fiche_client.php');
}
else{
    header('Location: modifier_fiche_client.php');
}
?>