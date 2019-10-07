<?php 
require('fpdf/fpdf.php'); 

class PDF extends FPDF 
{ 
//En-tête 
function Header() 
{ 

$this->SetFont('Arial','B',15); 
//Décalage à droite 
$this->Cell(60); 
//Titre 
$this->Cell(60,10, 'Formulaire Intervention',1,0,'C'); 
//Saut de ligne 
$this->Ln(20); 

} 

//Pied de page 
function Footer() 
{ 
//Positionnement à 1,5 cm du bas 
$this->SetY(-15); 
//Police Arial italique 8 
$this->SetFont('Arial','I',8); 

} 
} 

//Instanciation de la classe dérivée 
if(isset($_POST['nom']))
{
$nom = $_POST["nom"]; 
$date = $_POST["date"];
$heure = $_POST["heure"];
$tempsIntervention = $_POST["tempsIntervention"];
$commentaireTechnicien = $_POST["commentaireTechnicien"];
$numClient = $_POST["numClient"];
$numEmploye = $_POST["numEmploye"];
    
    
$pdf=new PDF(); 
$pdf->AliasNbPages(); 
$pdf->AddPage(); 
$pdf->SetFont('Times','',12); 

if (isset($nom)){ 
$pdf->Cell(50,10,"Numero D'intervention : " . $nom,0,1);}
    
if (isset($date)){
$pdf->Cell(50,10,"Date D'intervention : " . $date,0,1);}


if (isset($heure)){
$pdf->Cell(50,10,"Heure D'intervention (hh:mm) : " . $heure,0,1);}


if (isset($tempsIntervention)){
$pdf->Cell(50,10,"Temps D'intervention (hh:mm) : " . $tempsIntervention,0,1);}


if (isset($commentaireTechnicien)){
$pdf->Cell(50,10,"commentaire du technicien : " . $commentaireTechnicien,0,1);}


if (isset($numClient)){
$pdf->Cell(50,10,"Numero de client : " . $numClient,0,1);}


if (isset($numEmploye)){
$pdf->Cell(50,10,"Numero D'employe : " . $numEmploye,0,1);}
}


$pdf->Output(); 


?> 