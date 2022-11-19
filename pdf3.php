<?php
include "vendor/autoload.php";


use Fpdf\Fpdf;

class PDF extends Fpdf
{
    function __construct()
    {
        parent::__construct('P');
    }
    // Page header
    function Header()
    {
        global $title;

        // Arial bold 15
        $this->SetFont('Arial', 'B', 15);
        // Move to the right
        $this->Cell(50);
        // Title
        $this->Cell(95, 10, 'Harry Potter and the Sorcerers Stone', 1, 0, 'C');
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

    function ChapterTitle($num, $label)
    {
        // Arial 12
        $this->SetFont('Arial','',12);
        // Background color
        $this->SetFillColor(200,220,255);
        // Title
        $this->Cell(0,6,"Chapter $num: $label",0,1,'L',true);
        // Line break
        $this->Ln(4);
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

function PrintChapter($num, $title, $file)
{
    $this->AddPage();
    $this->ChapterTitle($num, $title);
    $this->ChapterBody($file);
}
}

$pdf = new PDF();
$title = 'Harry Potter Chapters';
$pdf->SetTitle($title);
$pdf->SetAuthor('S. C. Galang');
$pdf->PrintChapter(1,'','harrychapter1.txt');
$pdf->PrintChapter(2,'','harrychapter2.txt');
$pdf->PrintChapter(3,'','harrychapter3.txt');
$pdf->Output();