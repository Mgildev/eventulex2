<div class="container delante margen">
	<div class="row">
		<div class="col-sm-4">
			<h1>LOGIN</h1>
			<?php 
				echo form_open('eventulex/usuarioValida');

				echo form_label('Alias', 'alias');
				echo form_input('alias', set_value('alias', 'Alias'),'class="form-control"'); 
				echo '<br>';
				echo form_label('Contraseña', 'pass');
				echo form_input('pass', set_value('pass', 'Contraseña'),'class="form-control"');
				echo '<br>';
				 
				echo form_submit('botonSubmit', 'Enviar');        
				echo form_close();  
			?>  
		</div>
		<div class="col-sm-8 text-center">
			<img src="<?php echo base_url();?>img/fondos/cuidado.jpg" alt='logo'>
			
		</div>
		<?php echo validation_errors();?>
	</div>
</div>