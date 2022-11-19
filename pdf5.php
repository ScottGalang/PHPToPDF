<?php

include "vendor/autoload.php";

use Fpdf\Fpdf;

$pdf = new Fpdf();
$pdf->AddFont('Boleh');
$pdf->AddPage();
$pdf->SetFont('Boleh','',45);
$pdf->Write(10,'My Favorite Quotes');

$pdf->Ln(20);

$pdf->SetFont('Boleh','',40);
$pdf->Write(20,'The greatest glory in living lies not in never falling, but in rising every time we fall.');
$pdf->Write(20,'-Nelson Mandela');

$pdf->Ln(20);
$pdf->cell(0);

$pdf->AddFont('dDamel');
$pdf->SetFont('dDamel','',30);
$pdf->Write(10,'he way to get started is to quit talking and begin doing.');
$pdf->Write(10,'-Walt Disney');

$pdf->Ln(20);
$pdf->cell(0);

$pdf->AddFont('Giants');
$pdf->SetFont('Giants','',35);
$pdf->Write(10,'If life were predictable it would cease to be life, and be without flavor.');
$pdf->Write(10,'-Eleanor Roosevelt');

$pdf->Ln(20);
$pdf->cell(0);
$pdf->Output('D', 'FavoriteQuotes.pdf');





//Run php vendor/fpdf/fpdf/src/Fpdf/makefont/makefont.php fonts/Boleh.ttf