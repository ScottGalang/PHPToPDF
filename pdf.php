<?php
include "vendor/autoload.php";


use Fpdf\Fpdf;

class PDF extends Fpdf
{
    // Page header
    function Header()
    {

        // Arial bold 15
        $this->SetFont('Arial', 'B', 15);
        // Move to the right
        $this->Cell(55);
        // Title
        $this->Cell(90, 10, 'Angeles University Foundation', 1, 0, 'C');
        // Line break
        $this->Ln(20);
    }

    // Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Page number
        $this->Cell(0,10,'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times', '', 12);
$pdf->Cell(0,10,'Scott Rylee C. Galang ',0,1);
$pdf->Cell(0,10,'CCS',0,1);
$pdf->Cell(0,10,'galang.scottrylee@auf.edu.ph ',0,1);
$pdf->Cell(0,10,'20-1382-910 ',0,1);
$pdf->Output();