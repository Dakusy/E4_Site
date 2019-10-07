<?php 
require('fpdf/fpdf.php'); 

class PDF extends FPDF 
{ 
//En-tête 
function Header() 
{ 

$this->SetFont('Arial','B',15); 
//Décalage à droite 
$this->Cell(80); 
//Titre 
$this->Cell(30,10, 'formulaire',1,0,'C'); 
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

$pdf=new PDF(); 
$pdf->AliasNbPages(); 
$pdf->AddPage(); 
$pdf->SetFont('Times','',12); 

if (isset($nom)){ 
$pdf->Cell(50,10,$nom,0,1);} 
$pdf->Output(); 
}
?> 