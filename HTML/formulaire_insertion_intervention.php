<!doctype html> 
<html> 
<head> 
<meta charset="utf-8"> 
        <link rel="stylesheet" href="../CSS/formulaire.css">
<title>test</title> 
</head> 

<!-- Création du formulaire pour l'intervention  -->
<body> 
 
   <h1>Formulaire</h1> 
<br>
    <p><i>Complétez le formulaire. Les champs marqué par </i><em>*</em> sont <em>obligatoires</em></p>
    
<center><fieldset><form ACTION="insertion_intervention_bdd.php" METHOD="post"> 

    <legend><h2>Fiche D'intervention</h2></legend>
    
<em>*</em> Numero : <input type="number" name="numIntervention" required = "">
    
<br>
    
<em>*</em> Date : <input type="date" name = "date" required = "">
    
<br>
    
<em>*</em> Heure : <input type="text" name = "heure" required = "" placeholder = "hh:mm">

<br>
    
<em>*</em> tempsIntervention : <input type = "text" name= "tempsIntervention" required = "" placeholder = "hh:mm">
    
<br>
    
<em>*</em> commentaireTechnicien : <input type = "text" name = "commentaireTechnicien" required = "">
    
<br>
    
<em>*</em> numClient : <input type = "number" name = "numClient" required = "">
    
<br>
    
<em>*</em> numEmploye : <input type = "number" name = "numEmploye" required = "">
    
<br>
    <br>
    <p><input type = "reset" >
    <input type="submit" value="insertion"> </p>
    
    </form> </fieldset></center>
</body> 
</html>