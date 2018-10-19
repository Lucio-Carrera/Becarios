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
		        $nombre=$_POST['nombre'];
		        $appaterno=$_POST['appaterno'];
		        $apmaterno=$_POST['apmaterno'];
		        $consulta="SELECT A.ID_Est, A.Ano_Reg, A.ApPaterno_Est, A.ApMaterno_Est, A.Nombre_Est FROM datospersonales A WHERE A.ApPaterno_Est like '%$appaterno%' and A.ApMaterno_Est like '%$apmaterno%' and A.Nombre_Est like '%$nombre%'";
				$resNom=$conexion->query($consulta);	
				if (!$resNom) {
					echo "consulta no ejecutada".mysqli_error($conexion);
				}		
				else
				{ 	
					$numReg=mysqli_num_rows($resNom);
					if ($numReg==0) {
						?>						
						<div class="container">
						<div style="width:300px;margin:10px auto;" class='alert alert-danger error' role='alert'>
							<strong>El estudiante no existe</strong>
						</div>
						<form method="POST">	
							<div class="row">
								<div class="col">
									<input class="form-control text-upper" type="text" name="nombre" placeholder="Nombre">
								</div>
								<div class="col">
									<input class="form-control text-upper" type="text" name="appaterno" placeholder="Apellido Paterno">		
								</div>
								<div class="col">
									<input class="form-control text-upper" type="text" name="apmaterno" placeholder="Apellido Materno">
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
										<td class="titulo">Nombre</td>
										<td class="titulo">Apellido Paterno</td>
										<td class="titulo">Apellido Materno</td>
										<td class="titulo">Información</td>
									</tr>
						<?php									
						while ($rows=$resNom->fetch_assoc()) 
						{
							?>													
									<tr>
										<td class="filas"><?php echo $rows['ID_Est']; ?></td>
										<td class="filas"><?php echo $rows['Ano_Reg']; ?></td>
										<td class="filas"><?php echo $rows['Nombre_Est']; ?></td>
										<td class="filas"><?php echo $rows['ApPaterno_Est']; ?></td>
										<td class="filas"><?php echo $rows['ApMaterno_Est']; ?></td>
										<td class="filas"><a class="btn btn-success" href="infoAlumno.php?ID_alumno=<?php echo $rows['ID_Est'];?>&anoreg=<?php echo $rows['Ano_Reg']; ?>">Ver</a></td>
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
					<div style="margin-top: 10px;" class="container">
						<?php echo $error; echo $registrado;?>	
						<form method="POST">	
							<div class="row">							
									<div class="col">
									<input class="form-control text-upper" type="text" name="nombre" placeholder="Nombre">
								</div>
								<div class="col">
									<input class="form-control text-upper" type="text" name="appaterno" placeholder="Apellido Paterno">		
								</div>
								<div class="col">
									<input class="form-control text-upper" type="text" name="apmaterno" placeholder="Apellido Materno">
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