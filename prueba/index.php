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
$consulta = "select distinct id_producto,precioventa, Concat(nombre)as producto from proforma 
inner join producto 
on proforma.id_producto = producto.id;";
$lstproducto = $mysqli->query($consulta);


// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Times','B',12);
    $pdf->Cell(30,10,'foto',1,0,'C',0);
    $pdf->Cell(95,10,'Nombre',1,0,'C',0);
	$pdf->Cell(73,10,'Detalle',1,1,'C',0);

$pdf->SetFont('Times','',12);

while ($row = $lstproducto->fetch_assoc()){
	$pdf->Cell(30,10, /*$pdf->Image("../img/producto/".*/$row['foto']/*, $pdf->GetX(), $pdf->GetY(),15,15)*/,1);
    $pdf->Cell(95,10,$row['nombre'],1,0);
    $pdf->Multicell(73,10,$row['preciocompra'],1,1);

}


/*    $pdf->Image('../plantilla/mediopago.png',10,150,150);
*/
$pdf->Output();
?>