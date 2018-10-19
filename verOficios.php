<?php 
	require("navegacion.php");
	require("conexion.php");
	require("editOfi.php");
	//$error="";
	//$registrado="";
	$count;	
	if (isset($_POST['anterior'])) 
	{
		$id=$_POST['numoficio']-1;
		$conofcio="SELECT * FROM oficiosalida WHERE No_Oficio=$id";
		$resoficio=$conexion->query($conofcio);
		if (!$resoficio) 
		{
			echo "consulta no ejecutada".mysqli_error($conexion);
		}
		else
		{
			$row=mysqli_fetch_array($resoficio);
		?>
		<div class="container">
				<h4>Captura de oficios de salida</h4>		
				<form method="POST">
					<div id="error">
						<?php echo $error; echo $registrado;?>
					</div>
					<div class="row">
						<div class="col">
							<label>Número de oficio</label>
							<input type="number" class="form-control" name="numoficio" readonly value="<?php echo $row['No_Oficio'] ?>">
						</div>
						<div class="col">
							<label>Año de registro</label>
							<input type="number" class="form-control" name="ano" readonly value="<?php echo $row['Ano'] ?>">
						</div>
						<div class="col">
							<label>Oficio para</label>
							<input type="text" class="form-control text-upper" name="ofpara" value="<?php echo $row['Nombre_Oficio_Dirigido'] ?>" required>
						</div>
						<div class="col">
							<label>Asunto</label>
							<select class="form-control" name="asunto" required>	
							<option value="<?php echo $row['Asunto'] ?>"><?php echo $row['Asunto'] ?></option>	    				
		    				<option value="ACEPTACION SERVICIO SOCIAL">RECIBO DE PAGO</option>
		    				</select>
						</div>
						<div class="col">
							<label>Organismo</label>
							<select class="form-control" name="organismo" required>		    				
				    				<option value="<?php echo $row['ID_Org3'] ?>"><?php echo $row['ID_Org3'] ?></option>
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
							<label>Folio</label>
							<input type="varchar" class="form-control" name="folio" value="<?php echo $row['Folio'] ?>" required>
						</div>				
						<div class="col">
							<label>Fecha de oficio</label>
							<input type="date" class="form-control" name="fecha" value="<?php echo $row['F_Oficio'] ?>">
						</div>
						<div class="col">
							<label>Capturó</label>
							<input type="text" class="form-control text-upper" name="captura" value="<?php echo $row['Nombre_Captura_Ofi'] ?>">
						</div>
					</div>
					<button type="submit" name="anterior" class="btn btn-success">Anterior</button>		
					<button type="submit" name="siguiente" class="btn btn-success">Siguiente</button>	
					<button type="submit" name="editar" class="btn btn-primary">Editar</button>				
				</form>

			</div>	
		<?php
		}

	}

	else if (isset($_POST['siguiente'])) 
	{
		$id=$_POST['numoficio']+1;
		$conofcio="SELECT * FROM oficiosalida WHERE No_Oficio=$id";
		$resoficio=$conexion->query($conofcio);
		if (!$resoficio) 
		{
			echo "consulta no ejecutada".mysqli_error($conexion);
		}
		else
		{
			$row=mysqli_fetch_array($resoficio);
		?>
		<div class="container">
				<h4>Captura de oficios de salida</h4>		
				<form method="POST">
					<div id="error">
						<?php echo $error; echo $registrado;?>
					</div>
					<div class="row">
						<div class="col">
							<label>Número de oficio</label>
							<input type="number" class="form-control" readonly name="numoficio" value="<?php echo $row['No_Oficio'] ?>">
						</div>
						<div class="col">
							<label>Año de registro</label>
							<input type="number" class="form-control" readonly name="ano" value="<?php echo $row['Ano'] ?>">
						</div>
						<div class="col">
							<label>Oficio para</label>
							<input type="text" class="form-control text-upper" name="ofpara" value="<?php echo $row['Nombre_Oficio_Dirigido'] ?>" required>
						</div>
						<div class="col">
							<label>Asunto</label>
							<select class="form-control" name="asunto" required>	
							<option value="<?php echo $row['Asunto'] ?>"><?php echo $row['Asunto'] ?></option>	    				
		    				<option value="ACEPTACION SERVICIO SOCIAL">RECIBO DE PAGO</option>
		    				</select>
						</div>
						<div class="col">
							<label>Organismo</label>
							<select class="form-control" name="organismo" required>		    				
				    				<option value="<?php echo $row['ID_Org3'] ?>"><?php echo $row['ID_Org3'] ?></option>
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
							<label>Folio</label>
							<input type="varchar" class="form-control" name="folio" value="<?php echo $row['Folio'] ?>" required>
						</div>				
						<div class="col">
							<label>Fecha de oficio</label>
							<input type="date" class="form-control" name="fecha" value="<?php echo $row['F_Oficio'] ?>">
						</div>
						<div class="col">
							<label>Capturó</label>
							<input type="text" class="form-control text-upper" name="captura" value="<?php echo $row['Nombre_Captura_Ofi'] ?>">
						</div>
					</div>
					<button type="submit" name="anterior" class="btn btn-success">Anterior</button>		
					<button type="submit" name="siguiente" class="btn btn-success">Siguiente</button>	
					<button type="submit" name="editar" class="btn btn-primary">Editar</button>				
				</form>

			</div>	
		<?php
		}	
	}

	else
	{
		$conofcio="SELECT * FROM oficiosalida ORDER BY No_Oficio DESC";
		$resoficio=$conexion->query($conofcio);
		if (!$resoficio) 
		{
			echo "consulta no ejecutada".mysqli_error($conexion);
		}
		else
		{
			$row=mysqli_fetch_array($resoficio);					
			?>
			<div class="container">
				<h4>Captura de oficios de salida</h4>		
				<form method="POST">
					<div id="error">
						<?php echo $error; echo $registrado;?>
					</div>
					<div class="row">
						<div class="col">
							<label>Número de oficio</label>
							<input type="number" class="form-control" readonly name="numoficio" value="<?php echo $row['No_Oficio'] ?>">
						</div>
						<div class="col">
							<label>Año de registro</label>
							<input type="number" class="form-control" readonly name="ano" value="<?php echo $row['Ano'] ?>">
						</div>
						<div class="col">
							<label>Oficio para</label>
							<input type="text" class="form-control text-upper" name="ofpara" value="<?php echo $row['Nombre_Oficio_Dirigido'] ?>" required>
						</div>
						<div class="col">
							<label>Asunto</label>
							<select class="form-control" name="asunto" required>	
							<option value="<?php echo $row['Asunto'] ?>"><?php echo $row['Asunto'] ?></option>	    				
		    				<option value="ACEPTACION SERVICIO SOCIAL">RECIBO DE PAGO</option>
		    				</select>
						</div>
						<div class="col">
							<label>Organismo</label>
							<select class="form-control" name="organismo" required>		    				
				    				<option value="<?php echo $row['ID_Org3'] ?>"><?php echo $row['ID_Org3'] ?></option>
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
							<label>Folio</label>
							<input type="varchar" class="form-control" name="folio" value="<?php echo $row['Folio'] ?>" required>
						</div>				
						<div class="col">
							<label>Fecha de oficio</label>
							<input type="date" class="form-control" name="fecha" value="<?php echo $row['F_Oficio'] ?>">
						</div>
						<div class="col">
							<label>Capturó</label>
							<input type="text" class="form-control text-upper" name="captura" value="<?php echo $row['Nombre_Captura_Ofi'] ?>">
						</div>
					</div>
					<button type="submit" name="anterior" class="btn btn-success">Anterior</button>		
					<button type="submit" name="siguiente" class="btn btn-success">Siguiente</button>	
					<button type="submit" name="editar" class="btn btn-primary">Editar</button>				
				</form>

			</div>	
			<?php
		}
	}
?>
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>			
		<script src="js/jquery-3.2.1.min.js"></script>	
		<script src="js/jquery-ui.js"></script>						
		<script src="js/jquery.mayus.js"></script>
		<script src="js/mayusculas.js"></script>						
	</body>	
</html>