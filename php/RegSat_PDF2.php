
<?php
require ('WriteHTML2.php');
require('../conexion.php');

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

        $consulta="SELECT A.ID_Est, A.Ano_Reg, A.ApPaterno_Est, A.ApMaterno_Est, A.Nombre_Est, A.Egresado, A.Carrera, A.ID_Institucion2, A.Plantel, A.Creditos, A.Doctor, A.Ceduladr, A.Domicilio, A.Colonia, A.Delegacion, A.CP, A.Estado,A.RFC,A.Curp, A.Correo, B.Proyecto, B.ID_Ger3, B.ID_Sub3, B.ID_Dir3, B.Nombre_Asesor, B.Cvedepto, B.F_Inicio, B.F_Final, B.F_Convenio, B.Hr_Inicio, B.Hr_Final, B.Ubicacion, B.Nombre_Gerente, B.CargoGerente FROM datospersonales A, datosarea B WHERE A.ID_Est=$idalumno and B.ID_Estudiante3=$idalumno and A.Ano_Reg=$anoreg";
                    $resid=$conexion->query($consulta);
                    $row=mysqli_fetch_array($resid);

        $date1=explode("-", $row2['felaboracion']);
        $meses = array('01'=>'Enero', '02'=>'Febrero', '03'=>'Marzo', '04'=>'Abril', '05'=>'Mayo', '06'=>'Junio', '07'=>'Julio',
                   '08'=>'Agosto', '09'=>'Septiembre', '10'=>'Octubre', '11'=>'Noviembre', '12'=>'Diciembre');    
        $fecha1="Ciudad de México, a ".$date1[2]." de ".$meses[$date1[1]]." de ".$date1[0];


        ?>
<!DOCTYPE html>
<html>
<head>

<script type="text/javascript">
    window.onload = function() { window.print }
</script>

   <style>
table, th, td {
    border: 0px solid black;
}

</style>


</head>
    <body style="margin-left:80px; margin-right:47px; margin-top:40px  "  >
        <font face="arial" size="2">
        <p align="right"> <font size="2" face="narrow"> <?php echo $fecha1; ?> </font></p> 
        <table width="250">
        <tr><td>&nbsp;</td></tr><tr><td></td></tr>
        <tr><td align ="justify"><b><?php echo utf8_decode($row2['nombredest'])?></b></td></tr>
        <tr><td align ="left" style="line-height:140%"><b><?php echo utf8_decode($row2['cargodest'])?></b></td></tr>
        <tr><td align ="justify"><b><?php echo utf8_decode($row2['ubicaciondest'])?></b></td></tr>
        <tr><td align ="justify"><b>P r e s e n t e</b></td></tr>
    </table>
    <table><tr><td>&nbsp;</td></tr><tr><td>&nbsp;</td><tr></tr></tr></table>
    <table style="line-height:150%" width="600">
    <tr><center><td align ="justify" >Quien suscribe, <b> <u><?php echo utf8_decode($row['Nombre_Est']).' '.utf8_decode($row['ApPaterno_Est']).' '.utf8_decode($row['ApMaterno_Est'])?> </b></u>, con clave del Registro Federal De Contibuyentes <b><u> <?php echo utf8_decode($row['RFC'])?></b></u> y Clave Única de Registro de población <b><u> <?php echo utf8_decode($row['Curp']) ?></b></u> con domicilo fiscal en  <b><u> <?php echo utf8_decode($row['Domicilio']).' '.utf8_decode($row['Colonia']).', Delegación '.utf8_decode($row['Delegacion']).', '.utf8_decode($row['Estado']).', '.utf8_decode($row['CP'])?> </b> </u> con fundamento en lo que establece los artículos 94 fracción V de la ley del impuesto sobre la renta y 166 del reglameto de la citada ley, me dirijo a usted, para solicitarle que a partir de esta fecha se considere como ingresos asimilados a salarios, los que percibo de esta Empresa como contraprestación de los servicios exclusivos que por concepto del <b><u>CONVENIO-PROFESIONISTAS EN ENTRENAMIENTO DCAS-SRH-GRS-' <?php echo utf8_decode($row2['Num_Conve']) ?>-CONVENIO/2018</u></b>, que obtendré durante la vigencia del mecionado convenio.</b></center></td></tr>   
    <tr><td>&nbsp;</td></tr> 
    <tr><td align ="justify" >Esta Solicitud  no  representa  de  ninguna  manera  un cambio de relación entre la  empresa  y quien suscribe, por la cual manifiesto, por  mi propio derecho y voluntad que relevo a Petróleos Mexicanos  y  Organismos  Subsidiarios  de cualquier responsabilidad de carácter legal  o  laboral; por  lo que, no me reservo cualquier acción presente o futura que ejerce en dichos términos, en contra de Petróleos Mexicanos y Organismos Subsidiarios.
    </td></tr>
    <tr><td>&nbsp;</td></tr>
    <tr><td align ="justify" >Lo anterior, por así convenir a mis intereses fiscales, perosnales y patrimoniales, tomando el compromiso de ratificar en el mismo sentido de lo  que  expongo, mi  dicisión ante  cualquier  tipo de  autoridad  del  orden  público o privado que así lo requiera.
    </td></tr>
    <tr><td>&nbsp;</td></tr>
    <tr><td>&nbsp;</td></tr>
     <tr><td align ="justify"  > <b>A t e n t a m e n t e</b>
    </td></tr>
    <tr><td>&nbsp;</td></tr><tr><td>&nbsp;</td></tr><tr><td>&nbsp;</td></tr>
     <tr><td> <b><u> <?php echo utf8_decode($row['Nombre_Est']).' '.utf8_decode($row['ApPaterno_Est']).' '.utf8_decode($row['ApMaterno_Est']); ?> </u></b></td></tr>
        <tr><td><u> <?php echo utf8_decode($row['Correo']); ?>  </u></b> </td></tr>
    </table>
    </font>
    </body>
</html>
        <?php
    }
    else{
        $idalumno=$_POST['idalumno'];    
        $anoreg=$_POST['anoreg']; 
        $Num_Conve=$_POST['Num_Conve'] ;
        $nombredest=$_POST['nombredest'];
        $cargodest=$_POST['cargodest'];
        $ubicaciondest=$_POST['ubicaciondest']; 
        $felaboracion=$_POST['felaboracion'];  


                    $consulta="SELECT A.ID_Est, A.Ano_Reg, A.ApPaterno_Est, A.ApMaterno_Est, A.Nombre_Est, A.Egresado, A.Carrera, A.ID_Institucion2, A.Plantel, A.Creditos, A.Doctor, A.Ceduladr, A.Domicilio, A.Colonia, A.Delegacion, A.CP, A.Estado,A.Correo, A.Curp,A.RFC, B.Proyecto, B.ID_Ger3, B.ID_Sub3, B.ID_Dir3, B.Nombre_Asesor, B.Cvedepto, B.F_Inicio, B.F_Final, B.F_Convenio, B.Hr_Inicio, B.Hr_Final, B.Ubicacion, B.Nombre_Gerente, B.CargoGerente FROM datospersonales A, datosarea B WHERE A.ID_Est=$idalumno and B.ID_Estudiante3=$idalumno and A.Ano_Reg=$anoreg";

        $rescon=$conexion->query($consulta);
        if (!$rescon) {
            echo "Consulta no ejecutada".mysqli_error($conexion);
        }
        $row=mysqli_fetch_array($rescon);


        $date1=explode("-", $felaboracion);
        $meses = array('01'=>'Enero', '02'=>'Febrero', '03'=>'Marzo', '04'=>'Abril', '05'=>'Mayo', '06'=>'Junio', '07'=>'Julio',
                   '08'=>'Agosto', '09'=>'Septiembre', '10'=>'Octubre', '11'=>'Noviembre', '12'=>'Diciembre');    
        $fecha1="Ciudad de México, a ".$date1[2]." de ".$meses[$date1[1]]." de ".$date1[0];
                ?>
<!DOCTYPE html>
<html>
<head>

<script type="text/javascript">
    window.onload = function() { window.print }
</script>
    
    <title>Reg_SatPDF2.php</title>
    <style>
table, th, td {
    border: 0px solid black;
}
</style>
</head>
    <body style="margin-left:80px; margin-right:47px; margin-top:40px  "  >
        <font face="arial" size="2">
        <p align="right"> <font size="2" face="narrow"> <?php echo $fecha1; ?> </font></p> 
        <table width="250">
        <tr><td>&nbsp;</td></tr><tr><td></td></tr>
        <tr><td align ="justify"><b><?php echo $nombredest ?></b></td></tr>
        <tr><td align ="left" style="line-height:140%"><b><?php echo $cargodest ?></b></td></tr>
        <tr><td align ="justify"><b><?php echo $ubicaciondest ?></b></td></tr>
        <tr><td align ="justify"><b>P r e s e n t e</b></td></tr>
    </table>
    <table><tr><td>&nbsp;</td></tr><tr><td>&nbsp;</td><tr></tr></tr></table>
    <table style="line-height:150%" width="600">
    <tr><center><td align ="justify" >Quien suscribe, <b><U> <?php echo utf8_decode($row['Nombre_Est']).' '.utf8_decode($row['ApPaterno_Est']).' '.utf8_decode($row['ApMaterno_Est'])?> </b></U>, con clave del Registro Federal De Contibuyentes <b><u> <?php echo utf8_decode($row['RFC'])?></b> </u>y Clave Única de Registro de población <b> <u><?php echo utf8_decode($row['Curp']) ?></b> </u>con domicilo fiscal en  <b><u> <?php echo utf8_decode($row['Domicilio']).' '.utf8_decode($row['Colonia']).', Delegación '.utf8_decode($row['Delegacion']).', '.utf8_decode($row['Estado']).', '.utf8_decode($row['CP'])?> </u></b> con fundamento en lo que establece los artículos 94 fracción V de la ley del impuesto sobre la renta y 166 del reglameto de la citada ley, me dirijo a usted, para solicitarle que a partir de esta fecha se considere como ingresos asimilados a salarios, los que percibo de esta Empresa como contraprestación de los servicios exclusivos que por concepto del <b><u>CONVENIO-PROFESIONISTAS EN ENTRENAMIENTO DCAS-SRH-GRS-' <?php echo $Num_Conve ?>-CONVENIO/2018</u></b>, que obtendré durante la vigencia del mecionado convenio.</b></center></td></tr>   
    <tr><td>&nbsp;</td></tr> 
    <tr><td align ="justify" >Esta Solicitud  no  representa  de  ninguna  manera  un cambio de relación entre la  empresa  y quien suscribe, por la cual manifiesto, por  mi propio derecho y voluntad que relevo a Petróleos Mexicanos  y  Organismos  Subsidiarios  de cualquier responsabilidad de carácter legal  o  laboral; por  lo que, no me reservo cualquier acción presente o futura que ejerce en dichos términos, en contra de Petróleos Mexicanos y Organismos Subsidiarios.
    </td></tr>
    <tr><td>&nbsp;</td></tr>
    <tr><td align ="justify" >Lo anterior, por así convenir a mis intereses fiscales, perosnales y patrimoniales, tomando el compromiso de ratificar en el mismo sentido de lo  que  expongo, mi  dicisión ante  cualquier  tipo de  autoridad  del  orden  público o privado que así lo requiera.
    </td></tr>
    <tr><td>&nbsp;</td></tr>
    <tr><td>&nbsp;</td></tr>
     <tr><td align ="justify"  > <b>A t e n t a m e n t e</b>
    </td></tr>
    <tr><td>&nbsp;</td></tr><tr><td>&nbsp;</td></tr><tr><td>&nbsp;</td></tr>
     <tr><td> <b><u> <?php echo utf8_decode($row['Nombre_Est']).' '.utf8_decode($row['ApPaterno_Est']).' '.utf8_decode($row['ApMaterno_Est']); ?> </u></b></td></tr>
        <tr><td><u> <?php echo utf8_decode($row['Correo']); ?>  </u></b> </td></tr>
    </table>
    </font>
    </body>
</html>
        <?php
                $consulta3="SELECT * FROM OficioGuardado WHERE idalumno='$idalumno' AND anoregistro='$anoreg' AND toficio='REGISTRO SAT'";
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
                
                $query ="UPDATE oficioguardado SET toficio='REGISTRO SAT', idalumno='$idalumno', anoregistro='$anoreg', felaboracion='$felaboracion', Num_Conve='$Num_Conve', nombredest='$nombredest', cargodest= '$cargodest', ubicaciondest='$ubicaciondest' WHERE idalumno='$idalumno' AND anoregistro='$anoreg' AND toficio='REGISTRO SAT'";
                $resultado=mysqli_query($conexion, $query);
                if (!$resultado)
                {
                    //echo "datos escolares no insertados".mysqli_error($conexion);             
                    echo "error en la consulta".mysqli_error($conexion);                
                }           
            }
            else
            {
               

                $query = "INSERT INTO OficioGuardado (toficio, idalumno, anoregistro,felaboracion, Num_Conve, nombredest, cargodest, ubicaciondest) values ('REGISTRO SAT', '$idalumno', '$anoreg', '$felaboracion','$Num_Conve', '$nombredest', '$cargodest', '$ubicaciondest')";

                $resultado=mysqli_query($conexion, $query);
                if (!$resultado)
                {
                    echo mysqli_error($conexion);                
                }
            }
        }   
    }    
?>
