
<?php

require_once('class.ezpdf.php');
$pdf = new Cezpdf('LEGAL'); //seleccionamos tipo de hoja
$pdf->selectFont('fonts/Times-Roman.afm'); //seleccionamos fuente a utilizar


	$test1['bullet'] = chr(149);	
	$titles=array('Numero Expediente'=>'Numero Expediente', 'Numero Escrituda'=>'Numero Escritura');

	$pdf->ezText("<b>NOTARIA 150</b>", 16, array('justification'=>'center'));
	$pdf->ezText("<b>NOTARIO JOSE LUIS FRANCO VARELA</b>", 16, array('justification'=>'center'));
	$pdf->ezText("", 10);
	$pdf->ezText($nombre_completo, 14, array('justification'=>'center'));
	$pdf->ezText("<b>ANEXO 3 PERSONA FISICA</b>", 10, array('justification'=>'right'));
	$pdf->ezText("", 10);
	$pdf->ezText("", 10);
	$pdf->ezText($test1['bullet']." <b>NUMERO DE ESCRITURA:</b>"." ".$num_escritura, 12); 
	$pdf->ezText("", 10);
	$pdf->ezText($test1['bullet']." <b>TIPO DE OPERACION:</b>"." ".$tip_oper, 12); 
	$pdf->ezText("", 10);
	$pdf->ezText($test1['bullet']." <b>MONTO DE LA OPERACION:</b>"." ".$mont_oper, 12); 
	$pdf->ezText("", 10);
	$pdf->ezText($test1['bullet']." <b>FECHA DE NACIMIENTO:</b>"." ".$fecha_nacimientodia."  DIA      ".$fecha_nacimientomes."  MES      ".$fecha_nacimientoano."  ANO", 12);
	$pdf->ezText("", 10);
	$pdf->ezText($test1['bullet']." <b>PAIS DE NACIMIENTO:</b>"." ".$pais_nacimiento, 12);
	$pdf->ezText("", 10);
	$pdf->ezText($test1['bullet']." <b>NACIONALIDAD:</b>"." ".$nacionalidad, 12);
	$pdf->ezText("", 10);
	$pdf->ezText($test1['bullet']." <b>OCUPACION:</b>"." ".$actividad_profesional, 12);
	$pdf->ezText("", 10);
	$pdf->ezText($test1['bullet']." <b>EN CASO DE SER EXTRANJERO INDICAR SU CONDICION DE ESTANCIA:</b>"." ".$residencia, 12);
	$pdf->ezText("", 10);
	if ($domicilio != NULL){
	$pdf->ezText($test1['bullet']." <b>DOMICILIO (CALLE, NUMERO EXTERIOR, NUMERO INTERIOR, COLONIA, DELEGACION O MUNICIPIO, CODIGO POSTAL, ENTIDAD FEDERATIVA)</b>"." ".$domicilio, 12);
	$pdf->ezText("", 10);
	}
	else {
	$pdf->ezText($test1['bullet']." <b>CALLE, AVENIDA O VIA:</b>"." ".$ext_calle, 12);
	$pdf->ezText("", 10);
	$pdf->ezText($test1['bullet']." <b>NUMERO EXTERIOR:</b>"." ".$ext_numero." <b>NUMERO INTERIOR:</b>"." ".$ext_numero_interior, 12);
	$pdf->ezText("", 10);
	$pdf->ezText($test1['bullet']." <b>COLONIA O URBANIZACION:</b>"." ".$ext_colinia, 12);
	$pdf->ezText("", 10);
	$pdf->ezText($test1['bullet']." <b>DEMARCACION TERRITORIAL, POLITICA O MUNICIPIO:</b>"." ".$ext_calle, 12);
	$pdf->ezText("", 10);
	$pdf->ezText($test1['bullet']." <b>CIUDAD O POBLACION:</b>"." ".$ext_ciudad." <b>ENTIDAD FEDERATIVA:</b>"." ".$ext_entidad, 12);
	$pdf->ezText("", 10);
	$pdf->ezText($test1['bullet']." <b>ESTADO, PROVINCIA, DEPARTAMENTO O DEMARCACION POLITICA:</b>"." ".$ext_estado, 12);
	$pdf->ezText("", 10);
	$pdf->ezText($test1['bullet']." <b>CODIGO POSTAL:</b>"." ".$ext_cP, 12);
	$pdf->ezText("", 10);
	$pdf->ezText($test1['bullet']." <b>PAIS:</b>"." ".$ext_pais, 14);
	$pdf->ezText("", 10);
	}
	$pdf->ezText($test1['bullet']." <b>TELEFONO EN DONDE SE PUEDA LOCALIZAR:</b>   LADA( ".$lada.") ".$telefono, 12);
	$pdf->ezText("", 10);
	$pdf->ezText($test1['bullet']." <b>CORREO ELECTRONICO:</b>"." ".$email, 12);
	$pdf->ezText("", 10);
	$pdf->ezText($test1['bullet']." <b>CURP:</b>"." ".$curp, 12);
	$pdf->ezText("", 10);
	$pdf->ezText($test1['bullet']." <b>RFC:</b>"." ".$rfc, 12);
	$pdf->ezText("", 10);
	$pdf->ezText($test1['bullet']." <b>NOMBRE DE LA IDENTIFICACION:</b>"." ".$datos_idennom, 12);
	$pdf->ezText("", 10);
	$pdf->ezText($test1['bullet']." <b>AUTORIDAD QUE LA EMITE:</b>"." ".$datos_idenaut, 12);
	$pdf->ezText("", 10);
	$pdf->ezText($test1['bullet']." <b>NUMERO:</b>"." ".$datos_idennum, 12);
	$pdf->ezText("", 10);
	$pdf->ezText($test1['bullet']." <b>VIGENCIA(SI LA TIENE):</b>"." ".$identificacionvig, 12);
	$pdf->ezText("", 10);
	$pdf->ezText($test1['bullet']."<b>¿TIENE CONOCIMIENTO DE LA EXISTENCIA DEL DUENO BENEFICIARIO?:</b>"." ".$conocimiento, 12);
	$pdf->ezText("", 10);
	$pdf->ezText($test1['bullet']."<b>¿CUENTA CON LA INFORMACION PARA IDENTIFICAR AL DUENO BENEFICIARIO?:</b>"." ".$conocimiento2, 12);
	$pdf->ezText("", 10);
	$pdf->ezText($test1['bullet']."<b>¿CUENTA CON LOS DOCUMENTOS DE IDENTIFICACION DEL DUENO BENEFICIARIO?:</b>"." ".$conocimiento3, 12);
	$pdf->ezText("", 10);
	$pdf->ezText("", 10);
	$pdf->ezText("", 10);
	$pdf->ezText("", 10);
	$pdf->ezText("_______________________________", 10, array('justification'=>'center'));
	$pdf->ezText("Firma", 10, array('justification'=>'center'));
	$pdf->ezText("", 10);
	$pdf->ezText("", 10);
	$pdf->ezText("<b>NOTA:</b> EN TERMINOS DEL ARTICULO 3 FRACCION III DE LA LEY FEDERAL PARA LA PREVENCION E IDENTIFICACION DE OPERACIONES CON RECURSOS DE PROCEDENCIA ILICITA Y DEL ARTICULO 14 DE SU REGLAMENTO, SE ENTIENDE COMO DUENO BENEFICIARIO O BENEFICIARIO CONTROLADOR, A LA PERSONA O GRUPO DE PERSONAS QUE:
	<b>A)</b> POR MEDIO DE OTRA O DE CUALQUIER ACTO, OBTIENE EL BENEFICIO DERIVADO DE ESTOS Y ES QUIEN, EN ULTIMA INSTANCIA EJERCE LOS DERECHOS DE USO, GOCE, DISFRUTE, APROVECHAMIENTO O DISPOSICION DE UN BIEN O SERVICIO, O
	<b>B)</b> EJERCE EL CONTROL DE AQUELLA PERSONA MORAL QUE, EN SU CARACTER DE CLIENTE O USUARIO, LLEVE A CABO ACTOS U OPERACIONES CON QUIEN REALICE ACTIVIDADES VULNERABLES,  ASI COMO LAS PERSONAS POR CUENTA DE QUIENES CELEBRA ALGUNO DE ELLOS.
	SE ENTIENDE QUE UNA PERSONA O GRUPO DE PERSONAS CONTROLA A UNA PERSONA MORAL CUANDO, A TRAVES DE LA TITULARIDAD DE VALORES, POR CONTRATO O DE CUALQUIER OTRO ACTO, PUEDE:
	<b>I)</b> IMPONER, DIRECTA O INDIRECTAMENTE, DECISIONES EN LAS ASAMBLEAS GENERALES DE ACCIONISTAS, SOCIOS U ORGANOS EQUIVALENTES, O NOMBRAR O DESTITUIR A LA MAYORIA DE LOS CONSEJEROS, ADMINISTRADORES O SUS EQUIVALENTES;
	<b>II)</b> MANTENER LA TITULARIDAD DE LOS DERECHOS QUE PERMITAN, DIRECTA O INDIRECTAMENTE, EJERCER EL VOTO RESPECTO DE MAS DEL CINCUENTA POR CIENTO DEL CAPITAL SOCIAL, O
	<b>III)</b> DIRIGIR, DIRECTA O INDIRECTAMENTE, LA ADMINISTRACION, LA ESTRATEGIA O LAS PRINCIPALES POLITICAS DE LA MISMA.", 10, array('justification'=>'full'));
	$pdf->ezNewPage();
	$pdf->ezStream();

?>