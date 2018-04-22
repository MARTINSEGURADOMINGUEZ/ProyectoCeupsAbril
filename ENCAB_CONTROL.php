<?php

include './pdf/fpdf/fpdf.php';
ob_end_clean();   
header("Content-Encoding: None", true);

class PDF extends FPDF
{
    
function Header()
{
    // Logo
    $this->Image('img/logo_unfv.gif',15,5,42,20);
    
    $this->Image('img/logo_ceups.jpg',165,5,35,18);
    
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(50);
    // Title
    $this->Cell(100,30,' CONTROL DEL CURSO '.date("d/m/Y"),0,1,'C');
    // Line break
    //$this->Ln(5);

}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
}
}