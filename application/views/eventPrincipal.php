<div class="container">
	<div class="row">
		<?php 
		if(isset($query)) 
		{
			for($i=0;$i<count($query);$i++)
			{
        	//e.id, e.nombre, e.lugar, e.maps, e.fecha_ini, e.fecha_fin, e.aforo, e.descripcion, e.logo, c.nombre

	        	echo "<div class='col-md-6 text-center'> 
				<a href='" . site_url() . "/eventulex/cargaEvento/". $query[$i]->id. "/'>
				<table class='tabla_eventos' id=" . $query[$i]->id . " width='auto'>
				  <tr>
				    <td colspan='2'>" . $query[$i]->nombre .  " (" . $query[$i]->cat . ")</td>
				  </tr>
				  <tr>
				    <td rowspan='2'><img src='" . base_url() . "img/" . $query[$i]->logo ."' alt='logo' width='100' ></td>
				    <td>" . $query[$i]->lugar . "<br>" .  $query[$i]->fecha_ini . " a " . $query[$i]->fecha_fin . "</td>
				  </tr>
				   <tr>
				    <td> " . $query[$i]->descripcion . "</td>
				  </tr>
				</table>
				</a>
	        	</div>";
        	}
    	}
    	?>
	</div>
</div>   