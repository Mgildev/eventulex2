<div class="container delante margen text-center">
	<div class="row">
		<?php 
		if(isset($query)) 
		{
			echo "<table class='table'>";
			for($i=0;$i<count($query);$i++)
			{
				//e.fecha_ini, ev.nombre, e.descripcion, t.id
				echo "<tr>
				    	<td>" . $query[$i]->fecha_ini . "</td>
				    	<td>" . $query[$i]->nombre . "</td>
						<td>" . $query[$i]->descripcion . "</td>";
			}
			echo "</table>";
		}
		?>
	</div>
</div>