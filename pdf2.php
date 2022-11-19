<?php
include "vendor/autoload.php";


use Fpdf\Fpdf;

class PDF extends Fpdf
{
    // Page header
    function Header()
    {
        $this->Image('images/auf-logo.png', 10, 6, 15);
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



function ChapterBody($file)
{
    // Read text file
    $txt = file_get_contents($file);
    // Times 12
    $this->SetFont('Times','',12);
    // Output justified text
    $this->MultiCell(0,5,$txt);
    // Line break
    $this->Ln();
    // Mention in italics
    $this->SetFont('','I');
    $this->Cell(0,5,'(end of excerpt)');
}

function PrintChapter($title, $file)
{
    $this->AddPage();
    $this->ChapterBody($file);
}
}
$pdf = new PDF();
$title = 'AUF History';
$pdf->SetTitle($title);
$pdf->SetAuthor('A. A. MILNE');
$pdf->PrintChapter(1,'aufhistory.txt');
$pdf->Output();