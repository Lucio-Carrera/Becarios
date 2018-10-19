<?php 			
	$usuario = "root";
	$contrasena = "";  
	$servidor = "localhost";
	$baseDatos = "becarios";	
	$conexion=mysqli_connect($servidor, $usuario, $contrasena, $baseDatos);		
	if(mysqli_connect_error())
	{
		echo "Error de conexion en la base de datos";		
		exit();	
	}
	
?>