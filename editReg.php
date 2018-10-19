<?php
	$error="";
	$registrado="";					
	if (isset($_POST['editar'])) 
	{								
		require("conexion.php");
		$ID_Est=$_POST['ID_Est'];				
		$anoReg=$_POST['anoReg'];
		$apPat=$_POST['ap-pat'];				
		$apMat=$_POST['ap-mat'];
		$nombre=$_POST['nombre'];
		$rfc=$_POST['rfc'];
		$Curp=$_POST['Curp'];
		$Correo=$_POST['Correo'];
		$domicilio=$_POST['domicilio'];
		$colonia=$_POST['colonia'];
		$delegacion=$_POST['delegacion'];
		$codigoPos=$_POST['cp'];
		$estado=$_POST['estado'];
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
		

		$queryPer="UPDATE datospersonales SET ApPaterno_Est='$apPat', ApMaterno_Est='$apMat', Nombre_Est='$nombre', RFC='$rfc', Curp='$Curp', Correo='$Correo', Domicilio='$domicilio', Colonia='$colonia', Delegacion='$delegacion', CP='$codigoPos', Estado='$estado', ID_Institucion2='$institucion', Plantel='$plantel', Egresado='$egresado', Carrera='$carrera', Creditos='$creditos', Doctor='$doctor', Ceduladr='$ceduladr'  WHERE ID_Est='$ID_Est' AND Ano_Reg='$anoReg'";
		$resultado=mysqli_query($conexion, $queryPer);
		$ultimoid=$conexion->insert_id;
		if (!$resultado) {
			//echo "datos no insertados".mysqli_error($conexion);
			$error="<div class='alert alert-danger' role='alert'><strong>"."Hubo un error en el registro".mysqli_error($conexion)."</strong></div>";
		}
			else
			{
				//echo "datos escolares insertados <br>";
				$queryAr="UPDATE datosarea SET ID_Org3='$organismo', ID_Dir3='$direccion', ID_Sub3='$subdireccion', ID_Ger3='$gerencia', Nombre_Asesor='$nombreAsesor', CargoAsesor='$cargoAsesor', Extension='$extension', Cvedepto='$cvedepto', Ubicacion='$ubicacion', F_Inicio='$fechaIni', F_Final='$fechaTer', Hr_Inicio='$horaIni', Hr_Final='$horaTer', H_Especifico='$H_Especifico', Proyecto='$proyecto', Nombre_Gerente='$nombreGerente', CargoGerente='$cargoGerente',      FuncionarioNombre='$FuncionarioNombre', FuncionarioCargo='$FuncionarioCargo',  F_Convenio='$fconvenio', F_InicioRen='$finiren', F_FinalRen='$ffinren', F_RenConvenio='$frenconvenio', acreedor='$acreedor', ccosto='$ccosto',	pfinanciera='$pfinanciera', ppresupuestario='$ppresupuestario', fondo='$fondo', cmayor='$cmayor', CcGen='$CcGen' , division='$division', eps='$eps' WHERE ID_Estudiante3='$ID_Est' AND Ano_Reg='$anoReg'";
				$resultadoAr=mysqli_query($conexion, $queryAr);
				if(!$resultadoAr)
				{
					//echo "datos del area no insertados".myqli_error($conexion);
					$error="<div class='alert alert-danger' role='alert'><strong>"."Hubo un error en la actualización".mysqli_error($conexion)."</strong></div>";
				}
				else
				{
					//echo "datos de area insertados correctamente <br>";
					$registrado="<div style='width:300px; margin:auto;' class='alert alert-success' role='alert'>"."<strong>Datos editados correctamente"."</strong></div>";						
				}
			}					
		
	}	
	
	
?>