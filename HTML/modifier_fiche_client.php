<?php 
session_start();
include 'connexion.php';
?>
<!DOCTYPE html>
<html lang="fr">
    <body>
        <?php
		
		//Création d'un requête pour récuperer les données de fiche client pour les modifiers ensuite
		
		
        $requete=$bdd->prepare('SELECT * FROM Client WHERE numClient=:numClient');
        $requete->bindParam(':numClient',$_SESSION['numClient']);
        $requete->execute();
        $donnees=$requete->fetch();
        ?>
		
		<!-- Formulaire pour modifier à souhait les informations disponible à modification de la fiche client. -->
		
        <form action="update_client_bdd.php" method="post">
            <input type="hidden" name="numClient" value="<?php echo $donnees['numClient'];?>"><br>
            <label>Raison Sociale: </label><input type="text" name="raisonSociale" value="<?php echo $donnees['raisonSociale'];?>"><br>
            <label>Numéro SIREN: </label><input type="text" name="numSIREN" value="<?php echo $donnees['numSIREN'];?>"><br>
            <label>Code APE: </label><input type="text" name="codeAPE" value="<?php echo $donnees['codeAPE'];?>"><br>
            <label>Adresse Postale: </label><input type="text" name="adressePostale" value="<?php echo $donnees['adressePostale'];?>"><br>
            <label>Numéro de Téléphone: </label><input type="text" name="numTelephone" value="<?php echo $donnees['numTelephone'];?>"><br>
            <label>Numéro de Télécopie: </label><input type="text" name="numTelecopie" value="<?php echo $donnees['numTelecopie'];?>"><br>
            <label>Adresse Mail: </label><input type="text" name="adresseMail" value="<?php echo $donnees['adresseMail'];?>"><br>            
            <label>Distance Agence: </label><input type="text" name="distanceAgence" value="<?php echo $donnees['distanceAgence'];?>"><br>
            <label>Durée du trajet: </label><input type="text" name="dureeTrajet" value="<?php echo $donnees['dureeTrajet'];?>"><br>
			
			
			            <label>Numero d'Agence: </label>   
   <select name = "numAgence" id  = "numAgence">  
<?php 
  
$resultat=$bdd->query("SELECT * FROM agence"); 
$resultat->setFetchMode(PDO::FETCH_ASSOC); 
  
foreach ($resultat as $data) 
  
{ 
   echo '<option value="' . $data['numAgence'] . '">' . $data['numAgence'] . '</option>'; 
  
} 

?> 
   </select>	
			
            <input type="submit" value="Insertion">
        </form>
    </body>
</html>
