<?php  
	$error="";
	$registrado="";
	require("conexion.php");
	require("navegacion.php");
	if (isset($_POST['enviar'])) 
	{		
		$fecha=getdate();
		$ano=$fecha['year'];		
		$ofpara=$_POST['ofpara'];
		$asunto=$_POST['asunto'];
		$organismo=$_POST['organismo'];
		$folio=$_POST['folio'];		
		$fecha=$_POST['fecha'];
		$captura=$_POST['captura'];

		$consulta="INSERT INTO oficiosalida (Ano, Nombre_Oficio_Dirigido, Asunto, ID_Org3, Folio, F_Oficio, Nombre_Captura_Ofi) VALUES ('$ano', '$ofpara', '$asunto', '$organismo', '$folio', '$fecha', '$captura')";
		$resultado=mysqli_query($conexion, $consulta);
		$ultimoid=$conexion->insert_id;
		if (!$resultado) {
			//echo "datos no insertados".mysqli_error($conexion);			
			$error="<div class='alert alert-danger' role='alert'><strong>"."Hubo un error en el registro".mysqli_error($conexion)."</strong></div>";			
		}
		else
		{
			$registrado="<div class='alert alert-success' role='alert'>"."<strong>Registro hecho"."<br>Número de oficio: ".$ultimoid."</strong></div>";				
		}

	}
	
?>
	<div class="container">
		<h4>Captura de oficios de salida</h4>		
		<form method="POST">
			<div id="error">
				<?php echo $error; echo $registrado;?>
			</div>
			<div class="row">				
				<div class="col">
					<input type="text" class="form-control text-upper" name="ofpara" placeholder="Oficio para" onKeyDown="return limitar(event,this.value,150)" required>
				</div>
				<div class="col">
					<select class="form-control" name="asunto" required>		    				
		    				<option label="ASUNTO"></option>	
		    				<option value="RECIBO DE PAGO">RECIBO DE PAGO</option>
		    				<option value="PASE DE ACCESO">PASE DE ACCESO</option>
		    				<option value="AMPLIACION DE PASE UBICACION ">AMPLIACION DE PASE UBICACION</option>
		    				<option value="REPOSICION DE PASE DE ACCESO">REPOSICION DE PASE DE ACCESO</option>
		    				<option value="Registro DEL SAT">REGISTRO DEL SAT</option>


		    		</select>
				</div>
				<div class="col">
					<select class="form-control" name="organismo" required>		    				
		    				<option label="ORGANISMO"></option>	
		    				<option value="PEMEX CORPORATIVO">PEMEX CORPORATIVO</option>
		    				<option value="PEMEX EXPLORACION Y PRODUCCION">PEMEX EXPLORACION Y PRODUCCION</option>
		    				<option value="PEMEX TRANSFORMACION INDUSTRIAL">PEMEX TRANSFORMACION INDUSTRIAL</option>
		    				<option value="PEMEX ETILENO">PEMEX ETILENO</option>
		    				<option value="PEMEX FERTILIZANTES">PEMEX FERTILIZANTES</option>
		    				<option value="PEMEX LOGISTICA">PEMEX LOGISTICA</option>
		    				<option value="PEMEX PERFORACION Y SERVICIOS">PEMEX PERFORACION Y SERVICIOS</option>	    			
		    				<option value="PEMEX COGENERACION Y SERVICIOS">PEMEX COGENERACION Y SERVICIOS</option>	    			
		    		</select>										
				</div>
			</div>

			<div class="row">
				<div class="col">
					<input type="varchar" class="form-control" name="folio"  placeholder="Folio" onKeyDown="return limitar(event,this.value,10)" required>
				</div>				
				<div class="col">
					<input type="date" class="form-control" name="fecha" placeholder="Fecha" required>
				</div>
				<div class="col">
					<input type="text" class="form-control text-upper" name="captura" placeholder="Quien captura" required>
				</div>
			</div>
			<button type="submit" name="enviar" class="btn btn-primary">Capturar</button>		
			<a class="btn btn-success" href="verOficios.php">Ver oficios</a>	
		</form>

	</div>	

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>			
		<script src="js/jquery-3.2.1.min.js"></script>	
		<script src="js/jquery-ui.js"></script>						
		<script src="js/jquery.mayus.js"></script>
		<script src="js/mayusculas.js"></script>
		<script src="js/direcciones.js"></script>
		<script src="js/ubicacion.js"></script>
		<script src="js/instituto.js"></script>			
	</body>	
</html>