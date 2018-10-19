<?php
require('conexion.php');//CONEXION A LA BD

$ano=$_POST['ano'];


if(isset($_POST['enviar']))
{
	// NOMBRE DEL ARCHIVO Y CHARSET
	header('Content-Type:text/csv; charset=latin1');
	header('Content-Disposition: attachment; filename="Registro_'.$ano.'.csv"');

	// SALIDA DEL ARCHIVO
	$salida=fopen('php://output', 'w');
	// ENCABEZADOS
	fputcsv($salida, array('ID', 'ANO REGISTRO', 'APELLIDO PATERNO', 'APELLIDO MATERNO', 'NOMBRE', 'CORREO', 'DOMICILIO', 'COLONIA', 'DELEGACION', 'CP', 'ASESOR', 'CARGO DEL ASESOR', 'ORGANISMO' ,'DIRECCION', 'SUBDIRECCION','GERENCIA','EXTENSION','FECHA DE INICIO', 'FECHA DE TERMINO', 'HORA DE ENTRADA', 'HORA DE SALIDA'));
	// QUERY PARA CREAR EL REPORTE
	$reporteCsv=$conexion->query("SELECT A.ID_Est, A.Ano_Reg, A.ApPaterno_Est, A.ApMaterno_Est, A.Nombre_Est, A.Correo, A.Domicilio, A.Colonia, A.Delegacion, A.CP, C.ID_Org3, C.ID_Dir3, C.ID_Sub3, C.ID_Ger3, C.Nombre_Asesor, C.CargoAsesor, C.Extension, C.F_Inicio, C.F_Final, C.Hr_Inicio, C.Hr_Final FROM datospersonales A, datosarea C WHERE A.Ano_Reg=$ano and A.ID_Est=C.ID_Estudiante3 and C.Ano_Reg=$ano ORDER BY A.ID_Est");	
	while($filaR= $reporteCsv->fetch_assoc())
	{		
		fputcsv($salida, array($filaR['ID_Est'], 
								$filaR['Ano_Reg'],
								$filaR['ApPaterno_Est'],
								$filaR['ApMaterno_Est'],
								$filaR['Nombre_Est'],
								$filaR['Correo'],
								$filaR['Domicilio'],
								$filaR['Colonia'],
								$filaR['Delegacion'],
								$filaR['CP'],
								$filaR['Nombre_Asesor'],
								$filaR['CargoAsesor'],
								utf8_decode($filaR['ID_Org3']),
								utf8_decode($filaR['ID_Dir3']),
								utf8_decode($filaR['ID_Sub3']),
								utf8_decode($filaR['ID_Ger3']),			
								$filaR['Extension'],
								$filaR['F_Inicio'],
								$filaR['F_Final'],
								$filaR['Hr_Inicio'],
								$filaR['Hr_Final']));
	}
}

?>