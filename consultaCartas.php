
<?php  

	require('conexion.php');		
		$error="";
		$registrado="";
		$query="SELECT ID_Org, Organismo FROM organismos";
		$result=$conexion->query($query);		

	require("navegacion.php");		
?>
	<body>
		<?php  
			if(isset($_POST['enviar'])) 
			{
				require("conexion.php");		        
		        $folio=$_POST['folio'];
		        $anio=$_POST['anio'];
		        $consulta="SELECT idalumno, anoregistro, toficio FROM oficioguardado WHERE idalumno='$folio' and anoregistro='$anio'";
				$resNom=$conexion->query($consulta);	
				if (!$resNom) {
					echo "consulta no ejecutada".mysqli_error($conexion);
				}		
				else
				{ 	
					$numReg=mysqli_num_rows($resNom);
					if ($numReg==0) {
						?>						
						<div style="width:300px;margin:10px auto;">
						<div class='alert alert-danger error' role='alert'>
							<strong>No hay oficios</strong>
						</div>
						<form method="POST">	
							<div class="row">
								<div class="col">
										<input class="form-control" type="number" min="1" max="1000" name="folio" placeholder="Folio de estudiante" onKeyDown="return limitar(event,this.value,4)" required>
									</div>			
									<div class="col">
										<input class="form-control" type="number" min="2017" max="2100" name="anio" placeholder="Año de registro" onKeyDown="return limitar(event,this.value,4)" required>
									</div>			
								<div class="col">
									<input class="btn btn-info" type="submit" name="enviar">
								</div>	
							</div>						
						</form>			
					</div>

						<?php
					}
					else						
					{	
						?>
						<link rel="stylesheet" type="text/css" href="css/consultaNombre.css">
							<div class="tab-consulta">
								<table>
									<tr>
										<td class="titulo">Número de Folio</td>
										<td class="titulo">Año de Registro</td>
										<td class="titulo">Tipo de Oficio</td>
										<td class="titulo">Ver</td>
									</tr>
						<?php									
						while ($rows=$resNom->fetch_assoc()) 
						{
							?>													
									<tr>
										<td class="filas"><?php echo $rows['idalumno']; ?></td>
										<td class="filas"><?php echo $rows['anoregistro']; ?></td>
										<td class="filas"><?php echo $rows['toficio']; ?></td>						

										<?php  
											if ($rows['toficio']=='CONVENIO') {
												?>
												<td class="filas"><a class="btn btn-success" href="php/Convenio_PDF.php?idalumno=<?php echo $rows['idalumno'];?>&anoreg=<?php echo $rows['anoregistro']; ?>&toficio=<?php echo $rows['toficio']; ?>">Ver</a></td>
												<?php		
											}

											if ($rows['toficio']=='RENOVACION CONVENIO') {
												?>
												<td class="filas"><a class="btn btn-success" href="php/RenovacionConvenio_PDF.php?idalumno=<?php echo $rows['idalumno'];?>&anoreg=<?php echo $rows['anoregistro']; ?>&toficio=<?php echo $rows['toficio']; ?>">Ver</a></td>
												<?php		
											}

											
											if ($rows['toficio']=='PASE DE ACCESO') {
												?>
												<td class="filas"><a class="btn btn-success" href="php/PaseDeAcceso_PDF.php?idalumno=<?php echo $rows['idalumno'];?>&anoreg=<?php echo $rows['anoregistro']; ?>&toficio=<?php echo $rows['toficio']; ?>">Ver</a></td>
												<?php		
											}

											if ($rows['toficio']=='A. Ubicacion') {
												?>
												<td class="filas"><a class="btn btn-success" href="php/PaseAmpliacionUbi_PDF.php?idalumno=<?php echo $rows['idalumno'];?>&anoreg=<?php echo $rows['anoregistro']; ?>&toficio=<?php echo $rows['toficio']; ?>">Ver</a></td>
												<?php		
											}
											if ($rows['toficio']=='PASE DE REPOSICION') {
												?>
												<td class="filas"><a class="btn btn-success" href="php/PaseReposicion2_PDF.php?idalumno=<?php echo $rows['idalumno'];?>&anoreg=<?php echo $rows['anoregistro']; ?>&toficio=<?php echo $rows['toficio']; ?>">Ver</a></td>
												<?php		
											}

											if ($rows['toficio']== 'RECIBO 1') {
												?>
												<td class="filas"><a class="btn btn-success" href="php/Recibo_PDF.php?idalumno=<?php echo $rows['idalumno'];?>&anoreg=<?php echo $rows['anoregistro']; ?>&toficio=<?php echo $rows['toficio']; ?>">Ver</a></td>
												<?php		
											}	

											if ($rows['toficio']== 'RECIBO 2') {
												?>
												<td class="filas"><a class="btn btn-success" href="php/Recibo_PDF.php?idalumno= <?php  echo $rows['idalumno'];?>&anoreg=<?php echo $rows['anoregistro']; ?>&toficio=<?php echo $rows['toficio']; ?>">Ver</a></td>
												<?php		
											}	

											if ($rows['toficio']== 'RECIBO 3') {
												?>
												<td class="filas"><a class="btn btn-success" href="php/Recibo_PDF.php?idalumno=<?php echo $rows['idalumno'];?>&anoreg=<?php echo $rows['anoregistro']; ?>&toficio=<?php echo $rows['toficio']; ?>">Ver</a></td>
												<?php		
											}	

											if ($rows['toficio']== 'RECIBO 4') {
												?>
												<td class="filas"><a class="btn btn-success" href="php/Recibo_PDF.php?idalumno=<?php echo $rows['idalumno'];?>&anoreg=<?php echo $rows['anoregistro']; ?>&toficio=<?php echo $rows['toficio']; ?>">Ver</a></td>
												<?php		
											}		

											if ($rows['toficio']== 'RECIBO 5') {
												?>
												<td class="filas"><a class="btn btn-success" href="php/Recibo_PDF.php?idalumno=<?php echo $rows['idalumno'];?>&anoreg=<?php echo $rows['anoregistro']; ?>&toficio=<?php echo $rows['toficio']; ?>">Ver</a></td>
												<?php		
											}	
											if ($rows['toficio']== 'RECIBO 6') {
												?>
												<td class="filas"><a class="btn btn-success" href="php/Recibo_PDF.php?idalumno=<?php echo $rows['idalumno'];?>&anoreg=<?php echo $rows['anoregistro']; ?>&toficio=<?php echo $rows['toficio']; ?>">Ver</a></td>
												<?php		
											}	
											if ($rows['toficio']== 'RECIBO 7') {
												?>
												<td class="filas"><a class="btn btn-success" href="php/Recibo_PDF.php?idalumno=<?php echo $rows['idalumno'];?>&anoreg=<?php echo $rows['anoregistro']; ?>&toficio=<?php echo $rows['toficio']; ?>">Ver</a></td>
												<?php		
											}	
											if ($rows['toficio']== 'RECIBO 8') {
												?>
												<td class="filas"><a class="btn btn-success" href="php/Recibo_PDF.php?idalumno=<?php echo $rows['idalumno'];?>&anoreg=<?php echo $rows['anoregistro']; ?>&toficio=<?php echo $rows['toficio']; ?>">Ver</a></td>
												<?php		
											}		

											if ($rows['toficio']== 'RECIBO 9') {
												?>
												<td class="filas"><a class="btn btn-success" href="php/Recibo_PDF.php?idalumno=<?php echo $rows['idalumno'];?>&anoreg=<?php echo $rows['anoregistro']; ?>&toficio=<?php echo $rows['toficio']; ?>">Ver</a></td>
												<?php		
											}	

											if ($rows['toficio']== 'RECIBO 10') {
												?>
												<td class="filas"><a class="btn btn-success" href="php/Recibo_PDF.php?idalumno=<?php echo $rows['idalumno'];?>&anoreg=<?php echo $rows['anoregistro']; ?>&toficio=<?php echo $rows['toficio']; ?>">Ver</a></td>
												<?php		
											}
											if ($rows['toficio']== 'RECIBO 11') {
												?>
												<td class="filas"><a class="btn btn-success" href="php/Recibo_PDF.php?idalumno=<?php echo $rows['idalumno'];?>&anoreg=<?php echo $rows['anoregistro']; ?>&toficio=<?php echo $rows['toficio']; ?>">Ver</a></td>
												<?php		
											}
											if ($rows['toficio']== 'RECIBO 12') {
												?>
												<td class="filas"><a class="btn btn-success" href="php/Recibo_PDF.php?idalumno=<?php echo $rows['idalumno'];?>&anoreg=<?php echo $rows['anoregistro']; ?>&toficio=<?php echo $rows['toficio']; ?>">Ver</a></td>
												<?php		
											}

											if ($rows['toficio']== 'RECIBO No. 1') {
												?>
												<td class="filas"><a class="btn btn-success" href="php/ReciboComp.php?idalumno=<?php echo $rows['idalumno'];?>&anoreg=<?php echo $rows['anoregistro']; ?>&toficio=<?php echo $rows['toficio']; ?>">Ver</a></td>
												<?php		
											}	

											if ($rows['toficio']== 'RECIBO No. 2') {
												?>
												<td class="filas"><a class="btn btn-success" href="php/ReciboComp.php?idalumno= <?php  echo $rows['idalumno'];?>&anoreg=<?php echo $rows['anoregistro']; ?>&toficio=<?php echo $rows['toficio']; ?>">Ver</a></td>
												<?php		
											}	

											if ($rows['toficio']== 'RECIBO No. 3') {
												?>
												<td class="filas"><a class="btn btn-success" href="php/ReciboComp.php?idalumno=<?php echo $rows['idalumno'];?>&anoreg=<?php echo $rows['anoregistro']; ?>&toficio=<?php echo $rows['toficio']; ?>">Ver</a></td>
												<?php		
											}	

											if ($rows['toficio']== 'RECIBO No. 4') {
												?>
												<td class="filas"><a class="btn btn-success" href="php/ReciboComp.php?idalumno=<?php echo $rows['idalumno'];?>&anoreg=<?php echo $rows['anoregistro']; ?>&toficio=<?php echo $rows['toficio']; ?>">Ver</a></td>
												<?php		
											}		

											if ($rows['toficio']== 'RECIBO No. 5') {
												?>
												<td class="filas"><a class="btn btn-success" href="php/ReciboComp.php?idalumno=<?php echo $rows['idalumno'];?>&anoreg=<?php echo $rows['anoregistro']; ?>&toficio=<?php echo $rows['toficio']; ?>">Ver</a></td>
												<?php		
											}	
											if ($rows['toficio']== 'RECIBO No. 6') {
												?>
												<td class="filas"><a class="btn btn-success" href="php/ReciboComp.php?idalumno=<?php echo $rows['idalumno'];?>&anoreg=<?php echo $rows['anoregistro']; ?>&toficio=<?php echo $rows['toficio']; ?>">Ver</a></td>
												<?php		
											}	
											if ($rows['toficio']== 'RECIBO No. 7') {
												?>
												<td class="filas"><a class="btn btn-success" href="php/ReciboComp.php?idalumno=<?php echo $rows['idalumno'];?>&anoreg=<?php echo $rows['anoregistro']; ?>&toficio=<?php echo $rows['toficio']; ?>">Ver</a></td>
												<?php		
											}	
											if ($rows['toficio']== 'RECIBO No. 8') {
												?>
												<td class="filas"><a class="btn btn-success" href="php/ReciboComp.php?idalumno=<?php echo $rows['idalumno'];?>&anoreg=<?php echo $rows['anoregistro']; ?>&toficio=<?php echo $rows['toficio']; ?>">Ver</a></td>
												<?php		
											}		

											if ($rows['toficio']== 'RECIBO No. 9') {
												?>
												<td class="filas"><a class="btn btn-success" href="php/ReciboComp.php?idalumno=<?php echo $rows['idalumno'];?>&anoreg=<?php echo $rows['anoregistro']; ?>&toficio=<?php echo $rows['toficio']; ?>">Ver</a></td>
												<?php		
											}	

											if ($rows['toficio']== 'RECIBO No. 10') {
												?>
												<td class="filas"><a class="btn btn-success" href="php/ReciboComp.php?idalumno=<?php echo $rows['idalumno'];?>&anoreg=<?php echo $rows['anoregistro']; ?>&toficio=<?php echo $rows['toficio']; ?>">Ver</a></td>
												<?php		
											}
											if ($rows['toficio']== 'RECIBO No. 11') {
												?>
												<td class="filas"><a class="btn btn-success" href="php/ReciboComp.php?idalumno=<?php echo $rows['idalumno'];?>&anoreg=<?php echo $rows['anoregistro']; ?>&toficio=<?php echo $rows['toficio']; ?>">Ver</a></td>
												<?php		
											}
											if ($rows['toficio']== 'RECIBO No. 12') {
												?>
												<td class="filas"><a class="btn btn-success" href="php/ReciboComp.php?idalumno=<?php echo $rows['idalumno'];?>&anoreg=<?php echo $rows['anoregistro']; ?>&toficio=<?php echo $rows['toficio']; ?>">Ver</a></td>
												<?php		
											}


											if ($rows['toficio']== 'REGISTRO SAT') {
												?>
												<td class="filas"><a class="btn btn-success" href="php/RegSat_PDF2.php?idalumno=<?php echo $rows['idalumno'];?>&anoreg=<?php echo $rows['anoregistro']; ?>&toficio=<?php echo $rows['toficio']; ?>">Ver</a></td>
												<?php		
											}

											if ($rows['toficio']== 'CANCELACION') {
												?>
												<td class="filas"><a class="btn btn-success" href="php/Cancelacion_PDF.php?idalumno=<?php echo $rows['idalumno'];?>&anoreg=<?php echo $rows['anoregistro']; ?>&toficio=<?php echo $rows['toficio']; ?>">Ver</a></td>
												<?php		
											}

											if ($rows['toficio']== 'DEVOLUCION') {
												?>
												<td class="filas"><a class="btn btn-success" href="php/Devolucion de convenio.php?idalumno=<?php echo $rows['idalumno'];?>&anoreg=<?php echo $rows['anoregistro']; ?>&toficio=<?php echo $rows['toficio']; ?>">Ver</a></td>
												<?php		
											}

										?>
										
									</tr>								
							<?php
						}
						?>
								</table>								
							</div>	
						<?php
												
					}
				}
			}
	    	else
	    	{    			

				?>
					<div style="width:600px;margin:10px auto;">
						<?php echo $error; echo $registrado;?>	
						<form method="POST">	
							<div class="row">							
									<div class="col">
										<input class="form-control" type="number" min="1" max="1000" name="folio" placeholder="Folio de estudiante" onKeyDown="return limitar(event,this.value,4)" required>
									</div>			
									<div class="col">
										<input class="form-control" type="number" min="2017" max="2100" name="anio" placeholder="Año de registro" onKeyDown="return limitar(event,this.value,4)" required>
									</div>			
									<div class="col">
									<input class="btn btn-info" type="submit" name="enviar">
								</div>							
							</div>						
						</form>			
					</div>
				<?php 
				
			}	
			?>		


		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
		<script src="js/jquery-3.2.1.min.js"></script>				
		<script src="js/jquery.mayus.js"></script>
		<script src="js/mayusculas.js"></script>	
		<script src="js/direcciones.js"></script>
		<script src="js/ubicacion.js"></script>				
	</body>
</html>