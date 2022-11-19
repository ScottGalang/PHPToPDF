<?php
include "vendor/autoload.php";

use Fpdf\Fpdf;

class PDF extends Fpdf
{
    function __construct()
    {
      parent::__construct('P');
    }

    // Simple table
    function BasicTable($headers, $data)
    {
        // Header
        foreach($headers as $col)
            $this->Cell(70,7,$col,1);
        $this->Ln();
        // Data
        foreach($data as $row)
        {
            foreach($row as $col)
                $this->Cell(70,6,$col,1);
            $this->Ln();
        }
    }
}

// (A) OPEN CSV FILE
$stream = fopen("country&population.csv", "r");

// (B) EXTRACT ROWS & COLS
$index = 0;
$headers = [];
$data = [];
while (($row = fgetcsv($stream)) !== false) {
  if ($index++ < 1) {
    foreach ($row as $col) {
      array_push($headers, $col);
    }
  } else {
    $line = [];
    foreach ($row as $col) {
      array_push($line, $col);
    }
    array_push($data, $line);
  }
}

// (C) CLOSE CSV FILE
fclose($stream);

$pdf = new PDF();
$pdf->SetFont('Arial','',12);
$pdf->AddPage();
$pdf->BasicTable($headers, $data);
$pdf->Output();