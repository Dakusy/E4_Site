<?php 
session_start();

//Classe FPDF requise pour le PDF

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
if(isset($_SESSION['numIntervention']))
{
$pdf=new PDF(); 
$pdf->AliasNbPages(); 
$pdf->AddPage(); 
$pdf->SetFont('Times','',12); 

//Affichage des différents champs du formulaire 

if (isset($_SESSION['numIntervention'])){ 
$pdf->Cell(50,10,"Numero D'intervention : " . $_SESSION['numIntervention'],0,1);}
    
if (isset($_SESSION['date'])){
$pdf->Cell(50,10,"Date D'intervention : " . $_SESSION['date'],0,1);}


if (isset($_SESSION['heure'])){
$pdf->Cell(50,10,"Heure D'intervention (hh:mm) : " . $_SESSION['heure'],0,1);}


if (isset($_SESSION['tempsIntervention'])){
$pdf->Cell(50,10,"Temps D'intervention (hh:mm) : " . $_SESSION['tempsIntervention'],0,1);}


if (isset($_SESSION['commentaireTechnicien'])){
$pdf->Cell(50,10,"commentaire du technicien : " . $_SESSION['commentaireTechnicien'],0,1);}


if (isset($_SESSION['numClient'])){
$pdf->Cell(50,10,"Numero de client : " . $_SESSION['numClient'],0,1);}


if (isset($_SESSION['$numEmploye'])){
$pdf->Cell(50,10,"Numero D'employe : " . $_SESSION['$numEmploye'],0,1);}
}

//Affichage du PDF

$pdf->Output(); 


?> 