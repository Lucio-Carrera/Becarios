<?php
	$error="";
	$registrado="";					
	if (isset($_POST['editar'])) 
	{								
		require("conexion.php");
		$numoficio=$_POST['numoficio'];				
		$ano=$_POST['ano'];
		$ofpara=$_POST['ofpara'];				
		$asunto=$_POST['asunto'];
		$organismo=$_POST['organismo'];
		$folio=$_POST['folio'];
		$fecha=$_POST['fecha'];
		$captura=$_POST['captura'];
		

		$oficio="UPDATE oficiosalida SET Nombre_Oficio_Dirigido='$ofpara', Asunto='$asunto', ID_Org3='$organismo', Folio='$folio', F_Oficio='$fecha', Nombre_Captura_Ofi='$captura' WHERE No_Oficio='$numoficio' AND Ano='$ano'";
		$resultado=mysqli_query($conexion, $oficio);
		if (!$resultado) {
			//echo "datos del area no insertados".myqli_error($conexion);
			$error="<div class='alert alert-danger' role='alert'><strong>"."Hubo un error en la actualización".mysqli_error($conexion)."</strong></div>";
		}
		else
		{
			//echo "datos de area insertados correctamente <br>";
			$registrado="<div style='width:300px; margin:auto;' class='alert alert-success' role='alert'>"."<strong>Datos editados correctamente"."</strong></div>";						
		}
		
	}	
	
	
?>