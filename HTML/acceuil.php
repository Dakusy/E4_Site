<?php
session_start();
include 'connexion.php';
$_SESSION['login']=$_POST['identifiant'];
$_SESSION['mdp']=$_POST['motdepasse'];
$role=$bdd->prepare("SELECT role FROM users WHERE login=:login AND mdp=:mdp");
$role->execute(array('login'=>$_SESSION['login'],'mdp'=>$_SESSION['mdp']));
$vide=$role->rowCount();
if($vide>0){
    while($resultRole=$role->fetch()){
        if($resultRole["role"]==1){
            echo "technicien";
        }else if($resultRole["role"]==2){
            echo "assistant";
        }else{
?>
<script>
    alert("Erreur : utilisateur invalide \n vous allez être rediriger vers la page de connexion");
    document.location.href="\main.php";
</script>
<?php
        }
    }
}else{
    ?>
<script>
    alert("Erreur : utilisateur innexistant \n vous allez être rediriger vers la page de connexion");
    document.location.href="\main.php";
</script>
<?php
}

?>
