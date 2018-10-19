<!DOCTYPE html>
<html>
	<head>
		<!--<meta charset="utf-8"> -->
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <title>Profesionistas en Entrenamiento</title> 	    	    
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">	    
	    <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">		    			    
	    <link rel="stylesheet" type="text/css" href="css/navegacion.css">		
	    <link rel="stylesheet" type="text/css" href="css/formularios.css">		    	
	    <link rel="stylesheet" type="text/css" href="css/consulta.css">	
	</head>
	<body onpaste="return false">			
		<div class="container-nav">
			<div id="logo"></div>
			<div class="barra">			
				<h3>Dirección Corporativa de Administración y Servicios</h3>			
				<h3>Subdirección de Recursos Humanos</h3>
				<h3>Gerencia Operativa de Capital Humano</h3>
				<h3>Subgerencia Regional de Desarrollo Humano Altiplano</h3>
				<h3>Coordinación de Profesionistas en Entrenamiento</h3>
			</div>		
			</div>
		<ul class="nav justify-content-center">			
		  <li class="nav-item">
		    <a class="nav-link active" href="index.php">Inicio</a>
		  </li>

		  <li class="nav-item">		
		  	<div class="dropdown">
		  		<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Registro</a>
		  		<!--<button class="botones-barnav dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    				Registro
  				</button>-->
  				<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
  					<li><a class="dropdown-item" href="registro.php">Registro de Estudiantes</a></li>
  					<li><a class="dropdown-item" href="oficios.php">Números de Oficios de Salida</a></li>
  				</ul>  					  	
		  	</div>		    
		  </li>

		  <li class="nav-item">
		  	<div class="dropdown">		  		
		  		<a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"  href="#">Oficios</a>		  	
		  		<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
		  			<li class="dropdown-submenu">
		  				<a class="dropdown-item" tabindex="-1" href="#">Cartas para Becarios</a>
		  				<ul class="dropdown-menu">
		  					<li><a class="dropdown-item" tabindex="-1" href="GeneraConvenio.php">Convenio</a></li>
		  					<li><a class="dropdown-item" tabindex="-1" href="GeneraRenovacionConvenio.php">Renovación de Convenio</a></li>			
		  					<li><a class="dropdown-item" tabindex="-1" href="GenerarSAT.php">Registro SAT</a></li>	
		  					<li><a class="dropdown-item" tabindex="-1" href="Cancelacion.php">Cancelación</a></li>
		  					<li><a class="dropdown-item" tabindex="-1" href="Generardevolucion.php">Devolucion de Convenio</a></li>	
		  				</ul>
		  				</li>	

		  				<li class="dropdown-submenu">
		  				<a class="dropdown-item" tabindex="-1" href="#">Accesos</a>
		  				<ul class="dropdown-menu">
		  					<li><a class="dropdown-item" tabindex="-1" href="GenerarPaseAcceso.php">Pase de Acceso</a></li>
		  					<li><a class="dropdown-item" tabindex="-1" href="GenerarReposicion.php">Pase Reposicion</a></li>		  					
		  					<li><a class="dropdown-item" tabindex="-1" href="GenerarAmpliacionUbicacion.php">Pase Ampliacion de Ubicacion</a></li> 
		  						  					
		  				</ul>
		  			</li>

		  			<li class="dropdown-submenu">
		  						<a class="dropdown-item" tabindex="-1" href="#">Recibos</a>
		  					<ul class="dropdown-menu">
		  						<li><a class="dropdown-item" tabindex="-1" href="GenerarRecibo.php">Recibo COORP.</a></li>	
		  						<li><a class="dropdown-item" tabindex="-1" href="GenerarRecibo.php">Recibo TRI</a></li>
		  						<li><a class="dropdown-item" tabindex="-1" href="GenerarReciboComp.php">Recibo PEP</a></li>	
		  						

		  				</ul>
		  				</li>	
		  				<li class="dropdown-submenu">
		  						<a class="dropdown-item" tabindex="-1" href="#">Recibos Antecedentes</a>
		  					<ul class="dropdown-menu">
		  						<li><a class="dropdown-item" tabindex="-1" href="GenerarRecibo.php">Recibo COORP Antecedentes.</a></li>	
		  						<li><a class="dropdown-item" tabindex="-1" href="GenerarRecibo.php">Recibo TRI Antecedentes</a></li>
		  						<li><a class="dropdown-item" tabindex="-1" href="GenerarReciboComp.php">Recibo PEP Antecedentes</a></li>	
		  						

		  				</ul>
		  				</li>	  	  						


		  					  			
		  		</ul>	
		  		</div>		    		    
		  </li>

		  

		  <li class="nav-item">
		  	<div class="dropdown">
		  		<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Consulta</a>		  		
  				<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
  					<li><a class="dropdown-item" href="consulta_nombre.php">Consulta por Nombre</a></li>
  					<li><a class="dropdown-item" href="consultaCartas.php">Consulta de Cartas</a></li> 
  					<li><a class="dropdown-item" href="consulta_ano.php">Consulta por Año</a></li> 
					<li><a class="dropdown-item" href="consulta_mes.php">Consulta por Mes</a></li>  
  					<li class="dropdown-submenu">
		  			</li>				
  				</ul>  					  	
		  	</div>		    		    
		  </li>		  		 
		</ul>
