<?php
require ('fpdf2.php');
require('../conexion.php');//CONEXION A LA BD

    if (isset($_GET['idalumno']) && isset($_GET['anoreg']) && isset($_GET['toficio']))
        {

        $idalumno=$_GET['idalumno'];
        $anoreg=$_GET['anoreg'];
        $toficio=$_GET['toficio'];
        $consulta2="SELECT * FROM OficioGuardado WHERE idalumno='$idalumno' AND anoregistro='$anoreg' AND toficio='$toficio'";
        $resid2=$conexion->query($consulta2);        
        if (!$resid2) {
                    echo "consulta no ejecutada".mysqli_error($conexion);
                }       
        $row2=mysqli_fetch_array($resid2);

        $consulta="SELECT A.ID_Est, A.Ano_Reg, A.ApPaterno_Est, A.ApMaterno_Est, A.Nombre_Est, A.Egresado, A.Carrera, A.ID_Institucion2, A.Plantel, A.Creditos, A.Doctor, A.Ceduladr, A.Domicilio, A.Colonia, A.Delegacion, A.CP, A.Estado, B.Proyecto, B.ID_Ger3, B.ID_Sub3, B.ID_Dir3, B.Nombre_Asesor, B.Cvedepto, B.F_Inicio, B.F_Final, B.F_Convenio, B.Hr_Inicio, B.Hr_Final, B.Ubicacion, B.Nombre_Gerente, B.CargoGerente, B.H_Especifico FROM datospersonales A, datosarea B WHERE A.ID_Est=$idalumno and B.ID_Estudiante3=$idalumno and A.Ano_Reg=$anoreg";
                    $resid=$conexion->query($consulta);
                    $row=mysqli_fetch_array($resid);
        $date1=explode("-", $row['F_Inicio']);    
        $date2=explode("-", $row['F_Final']);        
        $date3=explode("-", $row['F_Convenio']);  
        $meses = array('01'=>'Enero', '02'=>'Febrero', '03'=>'Marzo', '04'=>'Abril', '05'=>'Mayo', '06'=>'Junio', '07'=>'Julio',
                   '08'=>'Agosto', '09'=>'Septiembre', '10'=>'Octubre', '11'=>'Noviembre', '12'=>'Diciembre');    
        $inicio=$date1[2]." de ".$meses[$date1[1]]." de ".$date1[0];                    
        $final=$date2[2]." de ".$meses[$date2[1]]." de ".$date2[0];              
        $fconvenio="Ciudad de México, a ".$date3[2]." de ".$meses[$date3[1]]." de ".$date3[0]; 

        ?>

<!DOCTYPE html>
<html>
<head>
<script type="text/javascript">
    window.onload = function() { window.print }
</script>
 <style>
table, th, td {
    
}

</style>
</head>
    <body style="margin-left:95px; margin-top:40px; margin-bottom: 50px ">
        <font  face="Arial Narrow", Arial, sans-serif; size="3">

        <p align="right"> <font size="2" face="narrow"></font></p> 
        <table width="800" border=0>
        <tr>
            <td><br><br><br><br></td>
        <td align="center" colspan="2"><b>PETRÓLEOS MEXICANOS<br>
DIRECCIÓN CORPORATIVA DE ADMINISTRACIÓN Y SERVICIOS<br>
SUBDIRECCIÓN DE RECURSOS HUMANOS<br>
GERENCIA DE RECLUTAMIENTO Y SELECCIÓN</b></td>
        <td width="65"></td>
        </tr>
        <tr>
            <td colspan="3">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="3">&nbsp;</td>
        </tr>
        <tr>
        <td align="justify" colspan="2"><b>CONVENIO DE ENTRENAMIENTO QUE CELEBRAN POR UNA PARTE PETRÓLEOS MEXICANOS, REPRESENTADO EN ESTE ACTO POR LA LIC. MONICA WATTY URISTA EN SU CARÁCTER DE GERENTE DE RECLUTAMIENTO Y SELECCION, A QUIEN EN LO SUCESIVO SE LE DENOMINARÁ "PEMEX", Y AL C. <?php echo utf8_decode($row['Nombre_Est']).' '.utf8_decode($row['ApPaterno_Est']).' '.utf8_decode($row['ApMaterno_Est']) ?> QUIEN EN LO SUCESIVO SE LE DENOMINARÁ "PROFESIONISTA EN ENTRENAMIENTO", AL TENOR DE LAS SIGUIENTES DECLARACIONES Y CLÁUSULAS: <br><br></b></td>
        </tr>
      
       
        <td align="center" colspan="2"><b> DECLARACIONES </b></td>
  
        <tr>
            <td colspan="2">&nbsp;</td>
        </tr>
        </tr>

        <tr>
            <td width="40" align="left"><b>1.</b></td>
        <td><b> "PEMEX" DECLARA, A TRAVÉS DE SU APODERADO, QUE:</b> </td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
        <td style=vertical-align:top ><b>1.1</b></td>
        <td align="justify">Petróleos Mexicanos es una empresa productiva del Estado con régimen especial, de propiedad exclusiva del Gobierno Federal, con personalidad jurídica y patrimonio propios, que goza de autonomía técnica, operativa y de gestión, cuyo objeto consiste en llevar a cabo la exploración y extracción del petróleo y de los carburos de hidrógeno sólidos, líquidos o gaseosos, así como su recolección, venta y comercialización, y tiene como fin el desarrollo de actividades empresariales, económicas, industriales y comerciales en términos de dicho objeto, generando valor económico y rentabilidad, para lo cual cuenta con la capacidad para celebrar toda clase de actos jurídicos, entre otros, convenios, contratos, alianzas y asociaciones, con personas físicas o morales de los sectores público, privado o social, nacional o internacional, en términos de la Ley de Petróleos Mexicanos, publicada en Diario Oficial de la Federación el 11 de agosto de 2014.  <br><br></td>
        </tr>

        <tr>
        <td style=vertical-align:top ><b>1.2</b></td>
        <td align="justify">Cuenta con facultades para la firma del presente Convenio, lo cual acredita con el Estatuto Orgánico de Petróleos Mexicanos vigente. <br><br></td>
    
        </tr>
        <tr>
        <td style=vertical-align:top ><b>1.3</b></td>
        <td align="justify">Para todos los efectos legales del presente instrumento, señala como su domicilio el ubicado en Avenida Marina Nacional Número 329, Edificio "B-2" piso 01, Colonia Veronica Anzures, Delegación Miguel Hidalgo, Código Postal 11300, Ciudad de México. <br></td>
        </tr>
        <tr>
        <td colspan="2">&nbsp;</td>
        </tr>
        <td style=vertical-align:top ><b>2.</b></td> 
        <td><b>EL PROFESIONISTA EN ENTRENAMIENTO DECLARA, QUE: </b></td>
        </tr>
        <tr>
        <td colspan="2">&nbsp;</td>
        </tr>   
        <tr>
        <td style=vertical-align:top ><b>2.1</b></td>
        <td align="justify">Tiene interés de ser entrenado por PEMEX para continuar con su desarrollo profesional, a través de la instrucción teórica y práctica requerida para el Proyecto <b>"<?php echo $row['Proyecto'] ?>"</b> a la vez, obtener el beneficio de una ayuda económica.<br> <br></td>
        </tr>
        <tr>
        <td style=vertical-align:top ><b>2.2</b></td>
        <td align="justify">Es <?php echo utf8_decode(strtolower($row['Egresado']))?> en el plan de estudios establecido en la <b><?php echo ucwords(str_replace('\'', '\' ', strtolower(utf8_decode($row['Carrera'])))) ?></b> en el/la <b><?php echo ucwords(str_replace('\'', '\' ', strtolower(utf8_decode($row['ID_Institucion2']))))?> </b> en el/la <b> <?php echo ucwords($row['Plantel']) ?>,</b> con un <b><?php echo utf8_decode($row['Creditos']) ?> </b> de créditos.<br> <br></td>



        </tr>
        <td style=vertical-align:top ><b>2.3</b></td>
        <td align="justify">Entrega una constancia de buena salud expedida por el/la <b> <?php echo ucwords(mb_strtolower($row['Doctor']))?> </b> que emitió el certificado con Cedula Profesional No. <b> <?php echo utf8_decode($row['Ceduladr'])?>. <br> <br></b> </td>
        </tr>
        <tr>
        <td style=vertical-align:top ><b>2.4</b></td>
        <td align="justify">Para los efectos legales del presente instrumento, señala como su domicilio en: <b> <?php echo ucwords(str_replace('\'', '\' ', strtolower(utf8_decode($row['Domicilio'])))). ', Colonia '.ucwords(str_replace('\'', '\' ', strtolower($row['Colonia']))).', C.P. '.$row['CP']. ', Delegación '.ucwords(str_replace('\'', '\' ', strtolower($row['Delegacion']))).', '. $row['Estado'].''?>. </b> </td>
        </tr>
        <tr>
        <td colspan="2">&nbsp;</td>
        </tr> 
        <tr>
        <td colspan=2 style=vertical-align:top >Las partes convienen las siguientes: <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br></td>
        </tr>
         <tr>
        <td colspan="2">&nbsp;</td>
        </tr> 
        <tr>
        <td align="justify" colspan=2><b>PRIMERA.- PEMEX</b> proporcionará al Profesionista en Entrenamiento en la <b><?php echo $row['ID_Ger3'] .' de la '.$row['ID_Sub3'].' de la '.$row['ID_Dir3']?></b> y mediante el personal experto que designe para este propósito, sin detrimento de sus programas de trabajo y funciones básicas, la formación, instrucción, entrenamiento o adiestramiento relacionado con el Proyecto <b>"<?php echo $row['Proyecto']?>".</b> Esta instrucción la recibirá la/el Profesionista en Entrenamiento de manera teórica y práctica, lo que coadyuvará a su formación profesional, designando para tal fin este propósito al (a) <b><?php echo utf8_decode(ucwords(mb_strtolower($row['Nombre_Asesor'])))?></b>, como Asesor Técnico, con cargo presupuestal aplicable a la <b><?php echo $row['ID_Ger3'] ?> de la <?php echo $row['ID_Sub3'] ?> de la <?php echo$row['ID_Dir3']?></b> clave departamental <b><?php echo$row['Cvedepto']?>. <br></b></td>
        </tr>
        <tr>
        <td colspan="2">&nbsp;</td>
        </tr> 
        <tr>
        <td align="justify" colspan=2><b>SEGUNDA.-</b> La vigencia del presente Convenio es del <b><?php echo $inicio.' al '.$final?>. <br></b></td>
        </tr>
        <tr>
        <td colspan="2">&nbsp;</td>
        </tr> 
        <tr>
        <td align="justify" colspan=2><b>TERCERA.- </b>El/La <b>Profesionista en Entrenamiento</b> durante la vigencia del presente Convenio, dispondrá del material bibliográfico y manuales técnicos, que en caso de ser necesario le proporcionará su Asesor Técnico, que le permitan aprovechar en mejor manera la formación teórica y cumplir con sus actividades, asimismo, el <b>Profesionista en Entrenamiento</b> queda obligado(a) a cumplir con los programas teóricos y prácticos que se le asignen, así como con las indicaciones y disposiciones internas que sean parte de su formación, sometiéndose además a los exámenes previos y periódicos de evaluación de conocimientos y habilidades que se consideren necesarios. <br></td>
        </tr>
        <tr>
        <td colspan="2">&nbsp;</td>
        </tr> 
        <tr>
        <td align="justify" colspan=2><b>CUARTA.- PEMEX</b> no será responsable por cualquier situación que afecte al <b>Profesionista en Entrenamiento</b> en sus intereses, derechos y obligaciones académicas ni laborales que pudiera tener con terceros. <br></td>
        </tr>
        <tr>
        <td colspan="2">&nbsp;</td>
        </tr> 
        <tr>
        <td align="justify" colspan=2><b>QUINTA.- PEMEX</b> otorgará una ayuda económica al/la <b>Profesionista en Entrenamiento</b> como apoyo para desarrollar las actividades necesarias, de acuerdo con los proyectos que <b>PEMEX</b> establezca. <br><br>
        El monto de la ayuda económica otorgada por <b>PEMEX</b> será por la cantidad de <b>3.5 </b> salarios mínimos mensuales vigentes en la Ciudad de México que se entregarán al/la
         <b>Profesionista en Entrenamiento</b> en el lugar donde se encuentra realizando las actividades para su desarrollo profesional. Dicha cantidad se otorgará por mes vencido, contra la firma del documento expedido para tal fin, y en caso de faltar a sus actividades se descontará la cantidad proporcional correspondiente a los días de inasistencia. <br>
        </td>
        </tr>
        <tr>
        <td colspan="2">&nbsp;</td>
        </tr> 
        <tr>
        <td align="justify" colspan=2><b>SEXTA.- </b>Las partes aceptan y reconocen que el monto de la ayuda económica señalado en la Cláusula QUINTA, no es un salario u honorario, ni asimilado a dichos conceptos, y no le otorga al <b>Profesionista en Entrenamiento</b> la categoría de trabajador, ya que el presente instrumento no representa un contrato de trabajo ni de prestación de servicios, sino un acuerdo para que <b>PEMEX</b> proporcione dentro de sus instalaciones, a solicitud del interesado, el entrenamiento relacionado con su grado profesional que contribuya a su desarrollo profesional, cumpliendo con los requisitos establecidos en las Políticas y Procedimientos del Proceso de Administración de Recursos Humanos y Relaciones Laborales en el apartado Personas candidatas en Formación por lo que queda expresamente pactado, que este Convenio no implica relación laboral o de intermediación alguna en términos del artículo 13 de la Ley Federal del Trabajo, ni tampoco constituye una promesa o compromisos de contratación entre <b>PEMEX y el Profesionista en Entrenamiento.</b><br>
        </td>
        </tr>
        <tr>
        <td colspan="2">&nbsp;</td>
        </tr> 
        <tr>
        <td align="justify" colspan=2><b>SEPTIMA.- </b>El horario que deberá cubrir el <b>Profesionista en Entrenamiento</b> durante la realización de sus actividades es de <b>
           <?php
        if(isset($row['H_Especifico']) == true && $row['H_Especifico'] != ''){
            echo $row['H_Especifico'].' horas (6 horas diarias).';}
            else{
        } echo substr($row['Hr_Inicio'],0,-3). ' a '.substr($row['Hr_Final'],0,-3).' horas (6 horas diarias), de lunes a viernes.'; ?> <br></b>
        </td>
        </tr>
        <tr>
        <td colspan="2">&nbsp;</td>
        </tr> 
        <tr>
        <td align="justify" colspan=2><b>OCTAVA.- </b>El <b>Profesionista en Entrenamiento</b> recibirá la instrucción y desarrollará sus actividades en la <b><?php echo 
        $row['ID_Ger3'].' de la ' .$row['ID_Sub3'].' de la '.$row['ID_Dir3'].', UBICADA EN '. ucwords($row['Ubicacion']) ?>. <br><br><br><br><br><br><br><br><br><br><br></b>
        </td>
        </tr>
         

        <tr>
        <td colspan="2">&nbsp;</td>
        </tr> 
        <tr>
        <td align="justify" colspan=2><b><br><br><br><br><br><br><br><br><br>NOVENA.- </b>El <b>Profesionista en Entrenamiento</b> acepta que durante el tiempo que dure su formación, deberá cumplir con lo siguiente: </b>
            <ul>

            <li>Realizar actividades inherentes a su entrenamiento durante el periodo autorizado, y cumplir con las actividades de formación teórica y práctica, conforme a las instrucciones del Asesor Técnico;</li>
            <br><li>Conocer y cumplir las normas de seguridad industrial, protección ambiental y salud ocupacional establecidas en el lugar en donde realice las actividades correspondientes a su formación profesional;</li>
            <br><li>Guardar estricta confidencialidad respecto a la información de los asuntos y documentos a los que tenga acceso y darles un uso adecuado conforme a lo instruido por su Asesor Técnico, así como custodiar la documentación y evitar su sustracción, destrucción o reproducción para otros fines que no sean los del área en la que desarrolla su entrenamiento.</li>
            <br><li>Cumplir con las indicaciones y recomendaciones de su Asesor Técnico, quien en su ausencia designará a la persona que le asesorará en las actividades a desarrollar en relación con el presente Convenio;</li>
            <br><li>Conservar en buen estado los instrumentos que utilice en el Proyecto;</li>
            <br><li>Observar buenas costumbres y tratar con respeto a las personas con quienes se relacione durante su entrenamiento;</li>
            <br><li>Realizar y aprobar los exámenes periódicos que se le practiquen, de conformidad con lo establecido por el área usuaria en la cual desarrolla su entrenamiento;</li>
            <br><li>Dar aviso a la brevedad al Asesor Técnico designado, salvo caso fortuito o fuerza mayor, de las causas justificadas que le impidan asistir a desarrollar las actividades propias del Proyecto en el que participa;</li>
            <br><li>Portar el documento de identificación que le permita el acceso al área usuaria donde participará en su entrenamiento, que para tal efecto le proporcionará la Superintendencia de Vigilancia y Control de Accesos,</li>
            <br><li>Elaborar al término de su entrenamiento, un reporte acerca de las actividades realizadas.</li>

        </ul>
        </td>
        </tr>
        

        <tr>
        <td colspan="2">&nbsp;</td>
        </tr> 
        <tr>
        <td align="justify" colspan=2> <b>DÉCIMA.- </b>Son causas de cancelación del presente Convenio: <br>
        <ul>
            <br><li>El incumplimiento de lo dispuesto en el presente documento o las normas técnicas, de seguridad o administrativas necesarias para el funcionamiento del área usuaria en la cual desarrolla su entrenamiento;</li>
            <br><li>Poner en peligro su seguridad o la de los trabajadores, o hacer uso indebido de las instalaciones, equipo, maquinaria, materiales, herramientas y bienes propiedad de <b>PEMEX;</b></li>
            <br><li>Propiciar o participar en el relajamiento de la disciplina y las buenas costumbres en el lugar donde se encuentre participando en su entrenamiento; </li>
            <br><li>Obtener bajo aprovechamiento en las evaluaciones que le aplique el Asesor Tecnico</li>
            <br><li>Presentar documentacion falsa; </li>
            <br><li>Realizar u omitir algún acto que, a juicio del área usuaria, amerite la cancelación del Convenio de entrenamiento.</li>
            <br><li>Tener 1% de inasistencia injustificadas al mes.</li>  
        </ul>
     <br>Adicionalmente, las partes podran terminar anticipadamente este convenio por si convertir a sus intereses. <br> 
        </td>
        </tr>

        <tr>
        <td colspan="2">&nbsp;</td>
        </tr> 
        <tr>
        <td align="justify" colspan=2> <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><b>DÉCIMA PRIMERA.- </b>Son causas de suspensión del presente Convenio de entrenamiento:
        <ul>
            <li> La enfermedad o imposibilidad de poder asistir a desarrollar actividades. Una vez resuelta la causa que imposibilito al <b> Profesionista en Entrenamiento</b> su asistencia, continuará sus actividades hasta por el término de la vigencia del presente instrumento, descontádosele los días que haya faltado, y </li>
            <br><li> La insuficiencia presupuestal </li>
        </ul>
       
        <br>Número de Registro asignado  por la SUBDIRECCIÓN DE RECURSOS HUMANOS DCAS-SRH-GRS-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;      CONVENIO/2018.
        </td>
        </tr>
        <tr>
        <td colspan="2">&nbsp;</td>
        </tr> 
        <tr><td></td><td align="right"><?php echo $fconvenio ?>.</td></tr>
    </table>
</font>
<font face=arial size="2">

    <table width="800" border =0>
        <tr><td colspan="4">&nbsp;</td></tr> 
        <tr><td colspan="4">&nbsp;</td></tr> 
        <tr><td colspan="4">&nbsp;</td></tr> 
        <tr><td colspan="4">&nbsp;</td></tr>
        <tr>
        <font size= "3">
        <td align = center width="300"><b>PETRÓLEOS MEXICANOS</b></td></font>
        <td width="10"></td>
        <td align = center width="300"><b>PROFESIONISTA EN ENTRENAMIENTO</b></td>
        <td align = center width="5"></td>
        </tr>
        <tr><td colspan="4">&nbsp;</td></tr> 
        <tr><td colspan="4">&nbsp;</td></tr>
        <tr><td colspan="4">&nbsp;</td></tr> 
        <tr><td colspan="4">&nbsp;</td></tr> 
        <tr>
        <td align =center width="350"><b>LIC. MONICA WATTY URISTA<br>GERENTE DE RECLUTAMIENTO Y SELECCION</b></td>
        <td align = center width="10"></td>
        <td align = center width="300"><b><?php echo "C. ". utf8_decode($row['Nombre_Est']).' '.utf8_decode($row['ApPaterno_Est']).' '.utf8_decode($row['ApMaterno_Est'])?> </b></td>
        <td align = center width="60"></td>
        </tr>
        <tr><td colspan="4">&nbsp;</td></tr> 
        <tr><td colspan="4">&nbsp;</td></tr>
        <tr><td colspan="4">&nbsp;</td></tr> 
        <tr><td colspan="4">&nbsp;</td></tr> 
        <tr><td colspan="4">&nbsp;</td></tr> 
        <tr><td colspan="4">&nbsp;</td></tr>
        <tr><td colspan="4">&nbsp;</td></tr> 
    </table>
    <table width="800" border =0>
        <tr>
        <td width="200"></td>
        <td colspan = 2 align=" center"><b>AREA USUARIA</b></td>
        <td width="200"></td>
        </tr>
        <tr><td colspan="4">&nbsp;</td></tr> 
        <tr><td colspan="4">&nbsp;</td></tr>
        <tr><td colspan="4">&nbsp;</td></tr> 
        <tr><td colspan="4">&nbsp;</td></tr> 
        <tr>
        <td width="200"></td>
        <td colspan = 2 align=" center"><b><?php echo utf8_decode($row['Nombre_Gerente'])?> </b></td>
        <td></td>
        </tr>
        <tr>
            <td width="200"></td>
        <td colspan = 2 align=" center"><b><?php echo utf8_decode($row['CargoGerente'])?> </b></td>
        <td width="285"></td>
        </tr>
    </table>
    </font>
</font>
</body>
</html>

<?php        
    }
    
    else{
    
        $idalumno=$_POST['idalumno'];    
        $anoreg=$_POST['anoreg'];         
                    $consulta="SELECT A.ID_Est, A.Ano_Reg, A.ApPaterno_Est, A.ApMaterno_Est, A.Nombre_Est, A.Egresado, A.Carrera, A.ID_Institucion2, A.Plantel, A.Creditos, A.Doctor, A.Ceduladr, A.Domicilio, A.Colonia, A.Delegacion, A.CP, A.Estado, B.Proyecto, B.ID_Ger3, B.ID_Sub3, B.ID_Dir3, B.Nombre_Asesor, B.Cvedepto, B.F_Inicio, B.F_Final, B.F_Convenio, B.Hr_Inicio, B.Hr_Final, B.Ubicacion, B.Nombre_Gerente, B.CargoGerente, B.H_Especifico FROM datospersonales A, datosarea B WHERE A.ID_Est=$idalumno and B.ID_Estudiante3=$idalumno and A.Ano_Reg=$anoreg";
                    $resid=$conexion->query($consulta);
                    $row=mysqli_fetch_array($resid);
        $date1=explode("-", $row['F_Inicio']);    
        $date2=explode("-", $row['F_Final']);        
        $date3=explode("-", $row['F_Convenio']);  
        $meses = array('01'=>'Enero', '02'=>'Febrero', '03'=>'Marzo', '04'=>'Abril', '05'=>'Mayo', '06'=>'Junio', '07'=>'Julio',
                   '08'=>'Agosto', '09'=>'Septiembre', '10'=>'Octubre', '11'=>'Noviembre', '12'=>'Diciembre');    
        $inicio=$date1[2]." de ".$meses[$date1[1]]." de ".$date1[0];                    
        $final=$date2[2]." de ".$meses[$date2[1]]." de ".$date2[0];              
        $fconvenio="Ciudad de México, a ".$date3[2]." de ".$meses[$date3[1]]." de ".$date3[0]; 

       ?>

<!DOCTYPE html>
<html>
<head>
<script type="text/javascript">
    window.onload = function() { window.print }
</script>
 <style>
table, th, td {
    
}

</style>
</head>
    <body style="margin-left:95px; margin-top:40px; margin-bottom: 50px ">
        <font  face="Arial Narrow", Arial, sans-serif; size="3">

        <p align="right"> <font size="2" face="narrow"></font></p> 
        <table width="800" border=0>
        <tr>
            <td><br><br><br><br></td>
        <td align="center" colspan="2"><b>PETRÓLEOS MEXICANOS<br>
DIRECCIÓN CORPORATIVA DE ADMINISTRACIÓN Y SERVICIOS<br>
SUBDIRECCIÓN DE RECURSOS HUMANOS<br>
GERENCIA DE RECLUTAMIENTO Y SELECCIÓN</b></td>
        <td width="65"></td>
        </tr>
        <tr>
            <td colspan="3">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="3">&nbsp;</td>
        </tr>
        <tr>
        <td align="justify" colspan="2"><b>CONVENIO DE ENTRENAMIENTO QUE CELEBRAN POR UNA PARTE PETRÓLEOS MEXICANOS, REPRESENTADO EN ESTE ACTO POR LA LIC. MONICA WATTY URISTA EN SU CARÁCTER DE GERENTE DE RECLUTAMIENTO Y SELECCION, A QUIEN EN LO SUCESIVO SE LE DENOMINARÁ "PEMEX", Y AL C. <?php echo utf8_decode($row['Nombre_Est']).' '.utf8_decode($row['ApPaterno_Est']).' '.utf8_decode($row['ApMaterno_Est']) ?> QUIEN EN LO SUCESIVO SE LE DENOMINARÁ "PROFESIONISTA EN ENTRENAMIENTO", AL TENOR DE LAS SIGUIENTES DECLARACIONES Y CLÁUSULAS: <br><br></b></td>
        </tr>
      
       
        <td align="center" colspan="2"><b> DECLARACIONES </b></td>
  
        <tr>
            <td colspan="2">&nbsp;</td>
        </tr>
        </tr>

        <tr>
            <td width="40" align="left"><b>1.</b></td>
        <td><b> "PEMEX" DECLARA, A TRAVÉS DE SU APODERADO, QUE:</b> </td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
        <td style=vertical-align:top ><b>1.1</b></td>
        <td align="justify">Petróleos Mexicanos es una empresa productiva del Estado con régimen especial, de propiedad exclusiva del Gobierno Federal, con personalidad jurídica y patrimonio propios, que goza de autonomía técnica, operativa y de gestión, cuyo objeto consiste en llevar a cabo la exploración y extracción del petróleo y de los carburos de hidrógeno sólidos, líquidos o gaseosos, así como su recolección, venta y comercialización, y tiene como fin el desarrollo de actividades empresariales, económicas, industriales y comerciales en términos de dicho objeto, generando valor económico y rentabilidad, para lo cual cuenta con la capacidad para celebrar toda clase de actos jurídicos, entre otros, convenios, contratos, alianzas y asociaciones, con personas físicas o morales de los sectores público, privado o social, nacional o internacional, en términos de la Ley de Petróleos Mexicanos, publicada en Diario Oficial de la Federación el 11 de agosto de 2014.  <br><br></td>
        </tr>

        <tr>
        <td style=vertical-align:top ><b>1.2</b></td>
        <td align="justify">Cuenta con facultades para la firma del presente Convenio, lo cual acredita con el Estatuto Orgánico de Petróleos Mexicanos vigente. <br><br></td>
    
        </tr>
        <tr>
        <td style=vertical-align:top ><b>1.3</b></td>
        <td align="justify">Para todos los efectos legales del presente instrumento, señala como su domicilio el ubicado en Avenida Marina Nacional Número 329, Edificio "B-2" piso 01, Colonia Veronica Anzures, Delegación Miguel Hidalgo, Código Postal 11300, Ciudad de México. <br></td>
        </tr>
        <tr>
        <td colspan="2">&nbsp;</td>
        </tr>
        <td style=vertical-align:top ><b>2.</b></td> 
        <td><b>EL PROFESIONISTA EN ENTRENAMIENTO DECLARA, QUE: </b></td>
        </tr>
        <tr>
        <td colspan="2">&nbsp;</td>
        </tr>   
        <tr>
        <td style=vertical-align:top ><b>2.1</b></td>
        <td align="justify">Tiene interés de ser entrenado por PEMEX para continuar con su desarrollo profesional, a través de la instrucción teórica y práctica requerida para el Proyecto <b>"<?php echo $row['Proyecto'] ?>" </b> a la vez, obtener el beneficio de una ayuda económica.<br> <br></td>
        </tr>
        <tr>
        <td style=vertical-align:top ><b>2.2</b></td>
        <td align="justify">Es <?php echo utf8_decode(strtolower($row['Egresado']))?> en el plan de estudios establecido en la <b><?php echo ucwords(str_replace('\'', '\' ', strtolower(utf8_decode($row['Carrera'])))) ?></b> en el/la<b> <?php echo ucwords(str_replace('\'', '\' ', strtolower(utf8_decode($row['ID_Institucion2'])))) ?> </b> en el/la <b> <?php echo ucwords(utf8_decode($row['Plantel']))?>,</b> con un <b><?php echo $row['Creditos'] ?> </b> de créditos.<br><br></td>

        </tr>
        <td style=vertical-align:top ><b>2.3</b></td>
        <td align="justify">Entrega una constancia de buena salud expedida por el/la <b> <?php echo ucwords(mb_strtolower($row['Doctor']))?> </b> que emitió el certificado con Cedula Profesional No. <b> <?php echo utf8_decode($row['Ceduladr'])?>. <br> <br></b> </td>
        </tr>
        <tr>
        <td style=vertical-align:top ><b>2.4</b></td>
        <td align="justify">Para los efectos legales del presente instrumento, señala como su domicilio en: <b> <?php echo ucwords(str_replace('\'', '\' ', strtolower(utf8_decode($row['Domicilio'])))). ', Colonia '.ucwords(str_replace('\'', '\' ', strtolower($row['Colonia']))).', C.P. '.ucwords(str_replace('\'', '\' ', strtolower($row['CP']))).', Delegación '.ucwords(str_replace('\'', '\' ', strtolower($row['Delegacion']))).', '.ucwords(str_replace('\'', '\' ', strtolower($row['Estado'])))?>.</b> </td>
        </tr>
        <tr>
        <td colspan="2">&nbsp;</td>
        </tr> 
        <tr>
        <td colspan=2 style=vertical-align:top >Las partes convienen las siguientes: <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br></td>
        </tr>
         <tr>
        <td colspan="2">&nbsp;</td>
        </tr> 
        <tr>
        <td align="justify" colspan=2><b>PRIMERA.- PEMEX</b> proporcionará al Profesionista en Entrenamiento en la <b><?php echo $row['ID_Ger3'] .' de la '.$row['ID_Sub3'].' de la '.$row['ID_Dir3']?></b> y mediante el personal experto que designe para este propósito, sin detrimento de sus programas de trabajo y funciones básicas, la formación, instrucción, entrenamiento o adiestramiento relacionado con el Proyecto <b>"<?php echo $row['Proyecto']?>"</b> Esta instrucción la recibirá la/el Profesionista en Entrenamiento de manera teórica y práctica, lo que coadyuvará a su formación profesional, designando para tal fin este propósito al (a) <b><?php echo utf8_decode(ucwords(mb_strtolower($row['Nombre_Asesor'])))?></b>, como Asesor Técnico, con cargo presupuestal aplicable a la <b><?php echo $row['ID_Ger3'] ?> de la <?php echo $row['ID_Sub3'] ?> de la <?php echo$row['ID_Dir3']?></b> clave departamental <b><?php echo$row['Cvedepto']?>. <br></b></td>
        </tr>
        <tr>
        <td colspan="2">&nbsp;</td>
        </tr> 
        <tr>
        <td align="justify" colspan=2><b>SEGUNDA.-</b> La vigencia del presente Convenio es del <b><?php echo $inicio.' al '.$final?>. <br></b></td>
        </tr>
        <tr>
        <td colspan="2">&nbsp;</td>
        </tr> 
        <tr>
        <td align="justify" colspan=2><b>TERCERA.- </b>El/La <b>Profesionista en Entrenamiento</b> durante la vigencia del presente Convenio, dispondrá del material bibliográfico y manuales técnicos, que en caso de ser necesario le proporcionará su Asesor Técnico, que le permitan aprovechar en mejor manera la formación teórica y cumplir con sus actividades, asimismo, el <b>Profesionista en Entrenamiento</b> queda obligado(a) a cumplir con los programas teóricos y prácticos que se le asignen, así como con las indicaciones y disposiciones internas que sean parte de su formación, sometiéndose además a los exámenes previos y periódicos de evaluación de conocimientos y habilidades que se consideren necesarios. <br></td>
        </tr>
        <tr>
        <td colspan="2">&nbsp;</td>
        </tr> 
        <tr>
        <td align="justify" colspan=2><b>CUARTA.- PEMEX</b> no será responsable por cualquier situación que afecte al <b>Profesionista en Entrenamiento</b> en sus intereses, derechos y obligaciones académicas ni laborales que pudiera tener con terceros. <br></td>
        </tr>
        <tr>
        <td colspan="2">&nbsp;</td>
        </tr> 
        <tr>
        <td align="justify" colspan=2><b>QUINTA.- PEMEX</b> otorgará una ayuda económica al/la <b>Profesionista en Entrenamiento</b> como apoyo para desarrollar las actividades necesarias, de acuerdo con los proyectos que <b>PEMEX</b> establezca. <br><br>
        El monto de la ayuda económica otorgada por <b>PEMEX</b> será por la cantidad de <b>3.5 </b> salarios mínimos mensuales vigentes en la Ciudad de México que se entregarán al/la
         <b>Profesionista en Entrenamiento</b> en el lugar donde se encuentra realizando las actividades para su desarrollo profesional. Dicha cantidad se otorgará por mes vencido, contra la firma del documento expedido para tal fin, y en caso de faltar a sus actividades se descontará la cantidad proporcional correspondiente a los días de inasistencia. <br>
        </td>
        </tr>
        <tr>
        <td colspan="2">&nbsp;</td>
        </tr> 
        <tr>
        <td align="justify" colspan=2><b>SEXTA.- </b>Las partes aceptan y reconocen que el monto de la ayuda económica señalado en la Cláusula QUINTA, no es un salario u honorario, ni asimilado a dichos conceptos, y no le otorga al <b>Profesionista en Entrenamiento</b> la categoría de trabajador, ya que el presente instrumento no representa un contrato de trabajo ni de prestación de servicios, sino un acuerdo para que <b>PEMEX</b> proporcione dentro de sus instalaciones, a solicitud del interesado, el entrenamiento relacionado con su grado profesional que contribuya a su desarrollo profesional, cumpliendo con los requisitos establecidos en las Políticas y Procedimientos del Proceso de Administración de Recursos Humanos y Relaciones Laborales en el apartado Personas candidatas en Formación por lo que queda expresamente pactado, que este Convenio no implica relación laboral o de intermediación alguna en términos del artículo 13 de la Ley Federal del Trabajo, ni tampoco constituye una promesa o compromisos de contratación entre <b>PEMEX y el Profesionista en Entrenamiento.</b><br>
        </td>
        </tr>
        <tr>
        <td colspan="2">&nbsp;</td>
        </tr> 
        <tr>
        <td align="justify" colspan=2><b>SEPTIMA.- </b>El horario que deberá cubrir el <b>Profesionista en Entrenamiento</b> durante la realización de sus actividades es de <b>
        <?php
        if(isset($row['H_Especifico']) == true && $row['H_Especifico'] != ''){
            echo $row['H_Especifico'].' horas (6 horas diarias).';}
            else{
        } echo substr($row['Hr_Inicio'],0,-3). ' a '.substr($row['Hr_Final'],0,-3).' horas (6 horas diarias), de lunes a viernes.'; ?> <br></b>
        </td>
        </tr>
        <tr>
        <td colspan="2">&nbsp;</td>
        </tr> 
        <tr>
        <td align="justify" colspan=2><b>OCTAVA.- </b>El <b>Profesionista en Entrenamiento</b> recibirá la instrucción y desarrollará sus actividades en la <b><?php echo utf8_decode($row['ID_Ger3']).' de la ' .$row['ID_Sub3'].' de la '.$row['ID_Dir3'].', UBICADA EN '. ucwords(($row['Ubicacion'])) ?>. <br><br><br><br><br><br><br><br><br><br><br></b>
        </td>
        </tr>
         

        <tr>
        <td colspan="2">&nbsp;</td>
        </tr> 
        <tr>
        <td align="justify" colspan=2><b><br><br><br><br><br><br><br><br><br>NOVENA.- </b>El <b>Profesionista en Entrenamiento</b> acepta que durante el tiempo que dure su formación, deberá cumplir con lo siguiente: </b>
            <ul>

            <li>Realizar actividades inherentes a su entrenamiento durante el periodo autorizado, y cumplir con las actividades de formación teórica y práctica, conforme a las instrucciones del Asesor Técnico;</li>
            <br><li>Conocer y cumplir las normas de seguridad industrial, protección ambiental y salud ocupacional establecidas en el lugar en donde realice las actividades correspondientes a su formación profesional;</li>
            <br><li>Guardar estricta confidencialidad respecto a la información de los asuntos y documentos a los que tenga acceso y darles un uso adecuado conforme a lo instruido por su Asesor Técnico, así como custodiar la documentación y evitar su sustracción, destrucción o reproducción para otros fines que no sean los del área en la que desarrolla su entrenamiento.</li>
            <br><li>Cumplir con las indicaciones y recomendaciones de su Asesor Técnico, quien en su ausencia designará a la persona que le asesorará en las actividades a desarrollar en relación con el presente Convenio;</li>
            <br><li>Conservar en buen estado los instrumentos que utilice en el Proyecto;</li>
            <br><li>Observar buenas costumbres y tratar con respeto a las personas con quienes se relacione durante su entrenamiento;</li>
            <br><li>Realizar y aprobar los exámenes periódicos que se le practiquen, de conformidad con lo establecido por el área usuaria en la cual desarrolla su entrenamiento;</li>
            <br><li>Dar aviso a la brevedad al Asesor Técnico designado, salvo caso fortuito o fuerza mayor, de las causas justificadas que le impidan asistir a desarrollar las actividades propias del Proyecto en el que participa;</li>
            <br><li>Portar el documento de identificación que le permita el acceso al área usuaria donde participará en su entrenamiento, que para tal efecto le proporcionará la Superintendencia de Vigilancia y Control de Accesos,</li>
            <br><li>Elaborar al término de su entrenamiento, un reporte acerca de las actividades realizadas.</li>

        </ul>
        </td>
        </tr>
        

        <tr>
        <td colspan="2">&nbsp;</td>
        </tr> 
        <tr>
        <td align="justify" colspan=2> <b>DÉCIMA.- </b>Son causas de cancelación del presente Convenio: <br>
        <ul>
            <br><li>El incumplimiento de lo dispuesto en el presente documento o las normas técnicas, de seguridad o administrativas necesarias para el funcionamiento del área usuaria en la cual desarrolla su entrenamiento;</li>
            <br><li>Poner en peligro su seguridad o la de los trabajadores, o hacer uso indebido de las instalaciones, equipo, maquinaria, materiales, herramientas y bienes propiedad de <b>PEMEX;</b></li>
            <br><li>Propiciar o participar en el relajamiento de la disciplina y las buenas costumbres en el lugar donde se encuentre participando en su entrenamiento; </li>
            <br><li>Obtener bajo aprovechamiento en las evaluaciones que le aplique el Asesor Tecnico</li>
            <br><li>Presentar documentacion falsa; </li>
            <br><li>Realizar u omitir algún acto que, a juicio del área usuaria, amerite la cancelación del Convenio de entrenamiento.</li>
            <br><li>Tener 1% de inasistencia injustificadas al mes.</li>             
        </ul>
     <br>Adicionalmente, las partes podran terminar anticipadamente este convenio por si convertir a sus intereses. <br> 
        </td>
        </tr>

        <tr>
        <td colspan="2">&nbsp;</td>
        </tr> 
        <tr>
        <td align="justify" colspan=2> <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><b>DÉCIMA PRIMERA.- </b>Son causas de suspensión del presente Convenio de entrenamiento:
        <ul>
            <li> La enfermedad o imposibilidad de poder asistir a desarrollar actividades. Una vez resuelta la causa que imposibilito al <b> Profesionista en Entrenamiento</b> su asistencia, continuará sus actividades hasta por el término de la vigencia del presente instrumento, descontádosele los días que haya faltado, y </li>
            <br><li> La insuficiencia presupuestal </li>
        </ul>
        <br>Número de Registro asignado  por la SUBDIRECCIÓN DE RECURSOS HUMANOS DCAS-SRH-GRS-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;      CONVENIO/2018.
        </td>
        </tr>
        <tr>
        <td colspan="2">&nbsp;</td>
        </tr> 
        <tr><td></td><td align="right"><?php echo $fconvenio ?>.</td></tr>
    </table>
</font>
<font face=arial size="2">

    <table width="800" border =0>
        <tr><td colspan="4">&nbsp;</td></tr> 
        <tr><td colspan="4">&nbsp;</td></tr> 
        <tr><td colspan="4">&nbsp;</td></tr> 
        <tr><td colspan="4">&nbsp;</td></tr>
        <tr font size=3>
             
        <td align = center width="300"><b>PETRÓLEOS MEXICANOS</b></td></font>
        <td width="10"></td>
        <td align = center width="300"><b>PROFESIONISTA EN ENTRENAMIENTO</b></td>
        <td align = center width="5"></td>
        </tr>
        <tr><td colspan="4">&nbsp;</td></tr> 
        <tr><td colspan="4">&nbsp;</td></tr>
        <tr><td colspan="4">&nbsp;</td></tr> 
        <tr><td colspan="4">&nbsp;</td></tr> 
        <tr>
        <td align =center width="350"><b>LIC. MONICA WATTY URISTA<br>GERENTE DE RECLUTAMIENTO Y SELECCION</b></td>
        <td align = center width="10"></td>
        <td align = center width="300"><b><?php echo "C. ". utf8_decode($row['Nombre_Est']).' '.utf8_decode($row['ApPaterno_Est']).' '.utf8_decode($row['ApMaterno_Est'])?> </b></td>
        <td align = center width="60"></td>
        </tr>
        <tr><td colspan="4">&nbsp;</td></tr> 
        <tr><td colspan="4">&nbsp;</td></tr>
        <tr><td colspan="4">&nbsp;</td></tr> 
        <tr><td colspan="4">&nbsp;</td></tr> 
        <tr><td colspan="4">&nbsp;</td></tr> 
        <tr><td colspan="4">&nbsp;</td></tr>
        <tr><td colspan="4">&nbsp;</td></tr> 
    </table>
    <table width="800" border =0>
        <tr>
        <td width="200"></td>
        <td colspan = 2 align=" center"><b>AREA USUARIA</b></td>
        <td width="200"></td>
        </tr>
        <tr><td colspan="4">&nbsp;</td></tr> 
        <tr><td colspan="4">&nbsp;</td></tr>
        <tr><td colspan="4">&nbsp;</td></tr> 
        <tr><td colspan="4">&nbsp;</td></tr> 
        <tr>
        <td width="200"></td>
        <td colspan = 2 align=" center"><b><?php echo utf8_decode($row['Nombre_Gerente'])?> </b></td>
        <td></td>
        </tr>
        <tr>
            <td width="200"></td>
        <td colspan = 2 align=" center"><b><?php echo utf8_decode($row['CargoGerente'])?> </b></td>
        <td width="285"></td>
        </tr>
    </table>
    </font>
</font>
</body>
</html>    
    <?php
        
        $consulta3="SELECT * FROM OficioGuardado WHERE idalumno='$idalumno' AND anoregistro='$anoreg' AND toficio='CONVENIO'";
        $resid3=$conexion->query($consulta3);        
        if (!$resid3) 
        {
            echo "consulta no ejecutada".mysqli_error($conexion);
        }       
        else
        {   
            $cont=mysqli_num_rows($resid3);
                   
            if ($cont>0) 
            {
                
                $query ="UPDATE oficioguardado SET toficio='CONVENIO', idalumno='$idalumno', anoregistro='$anoreg' WHERE idalumno='$idalumno' AND anoregistro='$anoreg' AND toficio='CONVENIO'";
                $resultado=mysqli_query($conexion, $query);
                if (!$resultado)
                {
                    //echo "datos escolares no insertados".mysqli_error($conexion);             
                    echo "error en la consulta".mysqli_error($conexion);                
                }           
            }
            else
            {
                $query = "INSERT INTO OficioGuardado (toficio, idalumno, anoregistro) values ('CONVENIO', '$idalumno', '$anoreg')";
                $resultado=mysqli_query($conexion, $query);
                if (!$resultado)
                {
                    echo mysqli_error($conexion);                
                }
            }
        }             
    }    
?>