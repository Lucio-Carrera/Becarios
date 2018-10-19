<?php
	
	require("conexion.php");	        
    
	

	$error="";
	$registrado="";
	if (isset($_POST['regis'])) 
	{		
		//$fecha=getdate();
		$apPat=$_POST['ap-pat'];				
		$apMat=$_POST['ap-mat'];
		$nombre=$_POST['nombre'];
		$rfc=$_POST['rfc'];
		$domicilio=$_POST['domicilio'];
		$colonia=$_POST['colonia'];
		$delegacion=$_POST['delegacion'];
		$codigoPos=$_POST['cp'];
		$estado=$_POST['estado'];
		$Curp=$_POST['Curp'];
		$Correo=$_POST['Correo'];
		$institucion=$_POST['institucion'];
		$plantel=$_POST['plantel'];
		$egresado=$_POST['egresado'];
		$carrera=$_POST['carrera'];
		$creditos=$_POST['creditos'];
		$doctor=$_POST['doctor'];
		$ceduladr=$_POST['ceduladr'];
		$organismo=$_POST['organismo'];	
		$direccion=$_POST['direccion'];
		$subdireccion=$_POST['subdireccion'];
		$gerencia=$_POST['gerencia'];
		$nombreAsesor=$_POST['nombreAsesor'];
		$cargoAsesor=$_POST['cargoAsesor'];	
		$extension=$_POST['extension'];
		$cvedepto=$_POST['cvedepto'];
		$acreedor=$_POST['acreedor'];
		$ccosto=$_POST['ccosto'];
		$pfinanciera=$_POST['pfinanciera'];
		$ppresupuestario=$_POST['ppresupuestario'];
		$fondo=$_POST['fondo'];
		$cmayor=$_POST['cmayor'];
		$CcGen=$_POST['CcGen'];
		$division=$_POST['division'];
		$eps=$_POST['eps'];
		$H_Especifico=$_POST['H_Especifico'];
		$ubicacion=$_POST['ubicacion'];	
		$fechaIni=$_POST['fechaInicio'];
		$fecha1 = explode("-", $fechaIni);
		$anoReg = $fecha1[0];
		$fechaTer=$_POST['fechaTermino'];
		$horaIni=$_POST['horaInicio'];
		$horaTer=$_POST['horaSalida'];		
		$proyecto=mysqli_real_escape_string($conexion, $_POST['proyecto']);
		$nombreGerente=$_POST['nombreGerente'];
		$cargoGerente=$_POST['cargoGerente'];
		$FuncionarioNombre=$_POST['FuncionarioNombre'];
		$FuncionarioCargo=$_POST['FuncionarioCargo'];
		$fconvenio=$_POST['fconvenio'];
		$finiren=$_POST['finiren'];
		$ffinren=$_POST['ffinren'];
		$frenconvenio=$_POST['frenconvenio'];
		
		echo 'El año es '.$anoReg;
 $consulta="SELECT ID_DatosArea FROM datosarea WHERE ano = '$anoReg' ORDER BY `datosarea`.`ID_DatosArea` desc limit 1";
				$res1=$conexion->query($consulta);	
				if (!$res1) {
					echo "consulta no ejecutada".mysqli_error($conexion);
				}		
				$row2=mysqli_fetch_array($res1);
				
		$ID_DatosArea=$row2['ID_DatosArea'];
		$ID_DatosArea += 1 ;

 $consulta="SELECT ID_Est FROM datospersonales WHERE Ano_Reg = '$anoReg' ORDER BY `datospersonales`.`ID_Est` desc limit 1";
				$res2=$conexion->query($consulta);	
				if (!$res2) {
					echo "consulta no ejecutada".mysqli_error($conexion);
				}		
				$row2=mysqli_fetch_array($res2);

				$ID_Est=$row2['ID_Est'];

		$ID_Est += 1;

				echo " Despues de hacer ".$ID_Est;




		$queryPer="INSERT INTO datospersonales (ID_est, Ano_Reg, ApPaterno_Est, ApMaterno_Est, Nombre_Est, RFC, Domicilio, Colonia, Delegacion, CP, Estado, Curp, Correo, ID_Institucion2, Plantel, Egresado, Carrera, Creditos, Doctor, Ceduladr) VALUES ('$ID_Est','$anoReg', '$apPat', '$apMat', '$nombre', '$rfc', '$domicilio', '$colonia', '$delegacion', '$codigoPos', '$estado', '$Curp', '$Correo', '$institucion', '$plantel', '$egresado', '$carrera', '$creditos', '$doctor', '$ceduladr')";
		$resultado=mysqli_query($conexion, $queryPer);
		$ultimoid=$conexion->insert_id;
		if (!$resultado) {
			//echo "datos no insertados".mysqli_error($conexion);			
			$error="<div class='alert alert-danger' role='alert'><strong>"."Hubo un error en el registro".mysqli_error($conexion)." la llave es ". $ID_Est."</strong></div>";			
		}

			else
			{
				//echo "datos escolares insertados <br>";
				$queryAr="INSERT INTO datosarea (ID_DatosArea, Ano, ID_Org3, ID_Dir3, ID_Sub3, ID_Ger3, Nombre_Asesor, CargoAsesor, Extension, Cvedepto, Ubicacion, F_Inicio, F_Final, Hr_Inicio, Hr_Final, H_Especifico, Proyecto, Nombre_Gerente, CargoGerente,FuncionarioNombre, FuncionarioCargo ,F_Convenio, F_InicioRen, F_FinalRen, F_RenConvenio, ID_Estudiante3, Ano_Reg, acreedor, ccosto, pfinanciera, ppresupuestario, fondo, cmayor, CcGen, division, eps) VALUES ('$ID_DatosArea', '$anoReg', '$organismo', '$direccion', '$subdireccion', '$gerencia', '$nombreAsesor', '$cargoAsesor', '$extension', '$cvedepto', '$ubicacion', '$fechaIni', '$fechaTer', '$horaIni', '$horaTer', '$H_Especifico', '$proyecto', '$nombreGerente', '$cargoGerente',  '$FuncionarioNombre' ,  '$FuncionarioCargo'  ,'$fconvenio', '$finiren', '$ffinren', '$frenconvenio', '$ID_Est', '$anoReg', 'acreedor','$ccosto','$pfinanciera','$ppresupuestario','$fondo','$cmayor','$CcGen','$division','$eps')";

		
				$resultadoAr=mysqli_query($conexion, $queryAr);
				if(!$resultadoAr)
				{
					//echo "datos del area no insertados";					
					$error="<div class='alert alert-danger' role='alert'><strong>"."Hubo un error en el registro".mysqli_error($conexion)."</strong></div>";					
				}
				
					else
					{
						//echo "datos de area insertados correctamente <br>";
						header("location:registro.php?registrado=<div class='alert alert-success' role='alert'>"."<strong>Alumno registrado correctamente"."<br>Número de folio: ".$ID_Est."</strong></div>");						
						//$registrado="<div class='alert alert-success' role='alert'>"."<strong>Alumno registrado correctamente"."<br>Número de folio: ".$ultimoid."</strong></div>";													
					}					
				}
			}	
?>