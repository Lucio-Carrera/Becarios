<?php  
	require('conexion.php');		
	require("navegacion.php");	
?>
	<body>
						<div style="width:300px;margin:10px auto;">
						<form method="POST" action="mes_excel.php">	
							<div class="row">
								<div class="col">
		      						<label>Indica el inicio de la fecha de busqueda:<input type="date" class="form-control text-upper" name="fecha1" placeholder="Fecha 1" required></label>
		    					</div>		    		
		    					<div class="col">
		      						<label>Indica el termino de la fecha de busqueda:<input type="date" class="form-control text-upper" name="fecha2" placeholder="Fecha 2" required></label>
		    					</div>
							</div>	
							<div class="col">
									<input class="btn btn-info" type="submit" name="enviar">
								</div>						
						</form>			
					</div>
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