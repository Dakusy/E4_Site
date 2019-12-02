<?php 
session_start();
include 'connexion.php';
?>
<!DOCTYPE html>
<html lang="fr">
    <body>
        <?php
		
		//Création d'un requête pour récuperer les données de fiche intervention pour les modifiers ensuite
		
        $requete=$bdd->prepare('SELECT * FROM Intervention WHERE numIntervention=:numIntervention');
        $requete->bindParam(':numIntervention',$_SESSION['numIntervention']);
        $requete->execute();
        $donnees=$requete->fetch();
        ?>
		
		<!-- Formulaire pour modifier à souhait les informations disponible à modification d'une intervention. -->
		
        <form action="update_intervention.php" method="post">
            <input type="hidden" name="numIntervention" value="<?php echo $donnees['numIntervention'];?>"><br>
			<input type="hidden" name="tempsIntervention" value="<?php echo $donnees['tempsIntervention'];?>"><br>
			<input type="hidden" name="commentaireTechnicien" value="<?php echo $donnees['commentaireTechnicien'];?>"><br>
            <label>Date: </label><input type="date" name="date" value="<?php echo $donnees['date'];?>"><br>
            <label>Heure: </label><input type="text" name="heure" value="<?php echo $donnees['heure'];?>"><br>
			
			
			
            <label>Numero de Client: </label>   
   <select name = "numClient" id  = "numClient">  
<?php 
  
$resultat=$bdd->query("SELECT * FROM client"); 
$resultat->setFetchMode(PDO::FETCH_ASSOC); 
  
foreach ($resultat as $data) 
  
{ 
   echo '<option value="' . $data['numClient'] . '">' . $data['numClient'] . '</option>'; 
  
} 

?> 
   </select>		 
			 
        <label>Numero d'employe: </label> 
	<select name  = "numEmploye"> 
<?php 
  
$resultat1=$bdd->query("SELECT * FROM technicien"); 
$resultat1->setFetchMode(PDO::FETCH_ASSOC); 
  
foreach ($resultat1 as $data1) 
  
{ 
  echo '<option value="' . $data1['numEmploye'] . '">' . $data1['numEmploye'] . '</option>'; 
} 
?>
			</select> 
            <input type="submit" value="insertion">
        </form>
    </body>
</html>