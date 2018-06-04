<div class="container delante margen">
	<div class="row text-center">
		<?php 
		if(isset($query)) 
		{
			echo "<h2>". $query[0]->nombre . " (" . $query[0]->cat . ")</h2>
			<div class='row text-center'>
			<div class='col-md-6'>
				<img src='" . base_url() . "img/" . $query[0]->logo ."' alt='logo' width='300' >
			</div>
			<div class='col-md-6 text-center'>
        			 <h3>" . $query[0]->lugar . "</h3>
        			 <h3>" .  $query[0]->fecha_ini . " - " . $query[0]->fecha_fin . "</h3>
        			 <h4>" . $query[0]->descripcion . "</h4>
        			 <h4>Entradas desde " . $query2[0]->precio . "€</h4>
        			 <a href='" . site_url() ."/eventulex/compraEntrada/" . $query[0]->id . "/' class='btn btn-info'>PROXIMAS ENTRADAS</a>
			</div>
			
			</div>";
   		}
    	?>
    	
	</div>

</div>  

<div class="container delante margen">
	<?php 
	if( $query[0]->maps !="" && isset($query[0]->maps))
	{
		echo $map['js'];
		echo $map['html']; 
	}
	?>
</div>
