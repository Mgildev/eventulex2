<?php

$prueba="hola";
$logo="'" . base_url() . "img/" . $query[0]->logo ."'";

require('fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Image($logo,10,10,-300);
$pdf->Cell(40,10,$prueba,1);
$pdf->Cell(60,30,'Hecho con FPDF.',0,1,'C');
$pdf->Output();






/*
echo "<div>
	<h2>". $query[0]->evento . "</h2>
	</div>
	<div class='row'>
	<div class='col-md-3'>
		<img src='" . base_url() . "img/" . $query[0]->logo ."' alt='logo' width='200' >
	</div>
	<div class='col-md-6 text-center'>
			 <h3>" . $query[0]->lugar . "</h3>
			 <h3>" . $query[0]->fecha_ini . "</h3>
			 <h4>" . $query[0]->descripcion . " - " . $query[0]->precio . "€</h4>
			 <h4>" . $query[0]->nombre . "</h4>
	</div>
	<div class='col-md-3'>";

	include "phpqrcode-master/qrlib.php";  

	QRcode::png ($codigoQR, "img/test.png") ;

	echo"<img src='" . base_url() . "img/test.png'></div></div>";
?>