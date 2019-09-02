<?php
require('../fpdf/fpdf.php');


class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('../plantilla/logo1.png',140,5,70);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(30,10,'Title',1,0,'C');
    // Salto de línea
    $this->Ln(20);

}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    $this->Image('../plantilla/logofooter.png',-1,233,212);

    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}

}

require('cn.php');
$consulta = "SELECT * FROM usuario";
$resultado = $mysqli->query($consulta);


// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Times','B',12);
    $pdf->Cell(90,10,'user',1,0,'C',0);
	$pdf->Cell(90,10,'clave',1,1,'C',0);

$pdf->SetFont('Times','',12);

while ($row = $resultado->fetch_assoc()){
	$pdf->Cell(90,10,$row['user'],1,0,'C',0);
	$pdf->Cell(90,10,$row['clave'],1,1,'C',0);
	$pdf->Cell(40,100,utf8_decode('Condiciones Generales:'));
	$pdf->Ln();
	$pdf->Cell(40,10,utf8_decode('Pago Presencial o Depósito'),1);
	$pdf->Image('../plantilla/mediopago.png',10,150,150);
}

$pdf->Output();
?>