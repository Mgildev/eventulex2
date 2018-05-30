<div class="container text-center delante margen">
<?php
	echo $_SESSION['alias'];
	echo "<div class='text-center'>
			<a href='" . site_url() ."/eventulex/proximasEntradas/" . $_SESSION['alias'] . "/' class='btn btn-info'>PROXIMAS ENTRADAS</a>
			<a href='" . site_url() ."/eventulex/historico/" . $_SESSION['alias'] . "/' class='btn btn-info'>HISTORICO ENTRADAS</a></div>";
?>
</div>