<div class='container text-center delante margen'>
<?php
$codigoQR=$query[0]->id . "&" . $query[0]->evento . "&" . $query[0]->fecha_ini . "&" . $query[0]->nombre;

//e.fecha_ini, ev.nombre as evento, e.descripcion, t.id, u.nombre, ev.logo, ev.lugar, e.precio
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
</div>;