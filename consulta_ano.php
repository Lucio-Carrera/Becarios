<?php  
	require('conexion.php');		
	require("navegacion.php");	
?>
	<body>
						<div style="width:300px;margin:10px auto;">
						<form method="POST" action="ano_excel.php">	
							<div class="row">
								<div class="col">
									<input style="width: 200px;" class="form-control" type="number" name="ano" placeholder="Ingresa el año de registro" required>				
								</div>
								<div class="col">
									<input class="btn btn-info" type="submit" name="enviar">
								</div>	
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