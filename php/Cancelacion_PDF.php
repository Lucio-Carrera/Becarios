<?php
    include_once('fpdf.php');
    require("../conexion.php");
        

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


        $consulta="SELECT A.ID_Est, A.Ano_Reg, A.ApPaterno_Est, A.ApMaterno_Est, A.Nombre_Est, A.RFC, B.Nombre_Asesor, B.acreedor, B.ccosto, B.pfinanciera, B.ppresupuestario, B.cmayor, 
        B.F_Convenio ,B.division, B.eps, B.CcGen, B.fondo FROM datospersonales A, datosarea B WHERE A.ID_Est=$idalumno and B.ID_Estudiante3=$idalumno and A.Ano_Reg=$anoreg and B.Ano_Reg=$anoreg";
                    $resid=$conexion->query($consulta);
                    $row=mysqli_fetch_array($resid);

        $date1=explode("-", $row2['felaboracion']);    
            
        $date3=explode("-", $row2['fcancelacion']);  
        
        $date6=explode("-", $row2['fante']);

        $meses = array('01'=>'Enero', '02'=>'Febrero', '03'=>'Marzo', '04'=>'Abril', '05'=>'Mayo', '06'=>'Junio', '07'=>'Julio',
                   '08'=>'Agosto', '09'=>'Septiembre', '10'=>'Octubre', '11'=>'Noviembre', '12'=>'Diciembre'); 
        $fecha1="Ciudad de M&eacutexico, a ".$date1[2]." de ".$meses[$date1[1]]." de ".$date1[0];     
        $fecha3="".$date3[2]; 
        $fecha6="Ciudad de M&eacutexico, a ".$date6[2]." de ".$meses[$date6[1]]." de ".$date6[0];      
        $fecha7="".$date3[2]." de ".$meses[$date3[1]]." de ".$date3[0];
   


?>
<!DOCTYPE html>
<html>
<head>
    <script type="text/javascript">
    window.onload = function() { window.print }
    
</script>
<meta charset="UTF-8">
<meta http-equiv="Content-type" content="text/html; charset=UTF-8">
<script src="js/pago3.js"></script>
 <style>
table {
    border-collapse: collapse;
}

</style>
</head>
 

    <img src="images/pemex.png"  width="200" height="60">

    
<table width="800" border=0>
<font face="Arial Narrow", Arial, sans-serif; size="2">    
     <tr>
        <td width="500"></td><td> </td> 

</tr>    
<tr>
        <td width="500"></td><td>   </td></tr>
<tr>

<td>
    <br>
    <hr style = "height: .5px; border:none; color:#000; background-color:#000; margin-right:20px">  
</td>
<td>
    <font face="Arial Narrow", Arial, sans-serif; size="2">  Fecha: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $fecha1 ?> </font>
   
    <hr style = "height: .5px; border:none; color:#000; background-color:#000; ">
</td>
</tr>
</table>

<table width="800" border=0>
<tr>
    <td style=vertical-align:top width="70"> <font size=2>Remitente</font></td>
<td align="left"  width="430"><b>Dirreci&oacuten Coorporativa de Administraci&oacuten y Servicios <br>        
Subdirecci&oacuten de Recursos Humanos <br>
Gerencia Operativa de Capital Humano <br>
Subgerencia Regional de Desarrollo Humano Altiplano <br>
Coordinaci&oacuten de Profesionistas en Entrenamiento</b></td>


<td style=vertical-align:top> Numero: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DCAS-SRH-GOCH-SRDHA-CPE- <?php echo $row2['ofiremi'] ?><br><br>Numero de Expediente:
</td>
</tr>
<table width="800" border=0>
     <tr>
        <td width="500"> <hr style = "height: .5px; border:none; color:#000; background-color:#000; margin-right:20px">   </td><td> <hr style = "height: .5px; border:none; color:#000; background-color:#000; "></td>

</tr>    
<tr>
       
 </font>      

</table>

<table width="800" border=0>
<tr>

      <td style=vertical-align:top width="70"> <font size=2>Destinatario</font>
    </td>
<td style="margin-right: 20px"  align="left"  width="410"><b><?php echo ($row2['nombredest']) ?></b>   
 <br> <b><?php echo utf8_decode($row2['cargodest']) ?> </b>
<br> <b> <?php echo utf8_decode($row2['ubicaciondest']) ?></b> 
<br> <b> Presente </b></td>


<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>

<td style=vertical-align:top><font size=2>Antecedentes:<br>  Numero(s): <?php echo $row2['numante'] ?><br> Numero &uacute;nico de expediente:  <?php echo $row2['numexp'] ?><br> Fecha(s):  
    <?php /*  echo $fecha6*/?>
</font></td>
</tr>
</table>
<table width="800" border=0>
     <tr>
        <td width="500"> <hr style = "height: .5px; border:none; color:#000; background-color:#000; margin-right:20px"> </td><td>  <hr style = "height: .5px; border:none; color:#000; background-color:#000;"> </td>

</tr>    
</table>

<table width="800" border=0>
<tr>
    <td style=vertical-align:top width="70"> <font size=2>Asunto:</font></td>

<td  align="left"  width="400" > <font size=2> Notificación de Cancelación Anticipada del Convenio en Entrenamiento de el/la C.<?php echo ucwords(str_replace('\'', '\' ', strtolower(utf8_decode($row['Nombre_Est'])))).' '.ucwords(str_replace('\'', '\' ', strtolower(utf8_decode($row['ApPaterno_Est'])))).' '.ucwords(str_replace('\'', '\' ', strtolower(utf8_decode($row['ApMaterno_Est'])))) ?> </font></td>
<td width="30"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>

<!--<td  align="left"  width="400" > <font size=2> NOTIFICACION DE CANCELACION ANTICIPADA DEL CONVENIO EN ENTRENAMIENTO DE LA C. <?php /*echo ucwords(str_replace('\'', '\' ', strtolower(utf8_decode($row['Nombre_Est'])))).' '.ucwords(str_replace('\'', '\' ', strtolower(utf8_decode($row['ApPaterno_Est'])))).' '.ucwords(str_replace('\'', '\' ', strtolower(utf8_decode($row['ApMaterno_Est'])))) */?>  </font></td>
<td width="25"> </td>-->



<td width="30" style=vertical-align:top"><font size=2>Anexo </font></td><td> <?php if (true){?><font size=2> &#8999; <?php } else{?>&#9633;<?php }?></font>
</font></td>
</tr>
</table>
<style > 
div {
    text-align: justify;
    text-justify: inter-word;
}
</style>


<table width="800" border=0>
    <tr>
        <td>
            <br><br>

<div>Le informo que, de acuerdo a su solicitud en el apartado de antecedentes, se procede a concluir con la cancelación del convenio en entrenamiento de la C. <?php echo ucwords(str_replace('\'', '\' ', strtolower(utf8_decode($row['Nombre_Est'])))).' '.ucwords(str_replace('\'', '\' ', strtolower(utf8_decode($row['ApPaterno_Est'])))).' '.ucwords(str_replace('\'', '\' ', strtolower(utf8_decode($row['ApMaterno_Est'])))) ?>, a partir de la Fecha, <?php echo $fecha7 ?>. <br><br> </div>
        </td>
    </tr>
</table>

<table width="800" border=0>
    <tr>
        <td>
            <br>
     <div align="justify"> De la suspensión o cancelación de la prestación en el programa:<br><br></div>       
<div>389) Son Causas de Suspensión del Convenio de Entrenamiento <br><br> </div>
<div>390) Son causas de Cancelacion del Convenio de Entrenamiento, por Razones Imputables al Profesionista en Entrenamiento, las Siguientes:  <br><br> </div>
        </td>
    </tr>
</table>


<table width="800" border=0>
    <tr>
        <td>
            <br>

<div> Motivo: <?php echo $row2['mcancel'] ?> <br><br> </div>
        </td>
    </tr>
</table>





<table width="800" border=0 >
    <tr><td><br><font size=2> Se adjunta copia de la solicitud de la cancelación de la Profesionista en Entrenamiento C. <?php echo ucwords(str_replace('\'', '\' ', strtolower(utf8_decode($row['Nombre_Est'])))).' '.ucwords(str_replace('\'', '\' ', strtolower(utf8_decode($row['ApPaterno_Est'])))).' '.ucwords(str_replace('\'', '\' ', strtolower(utf8_decode($row['ApMaterno_Est'])))) ?> para concluir con su expediente.<br><br><br><br>Sin otro particular por el momento, aprovecho para enviarle un cordial saludo.
<br><br>
<b>A t e n t a m e n t e , 
<br><br><br><br><br><br> <br><br></font>
<font   size= 3>  
<?php echo ucwords(str_replace('\'', '\' ', strtolower($row2['firmaofi']))) ?>
<br>
<?php echo ucwords(str_replace('\'', '\' ', strtolower($row2['cargo']))) ?>
<br></font>
</b>
<br><br>
<font size=1> Elaboro: CMRM/DMOB
    <br>
<font size=1> C.c.p.- Lic Aida Vargas Guzmán.- Gerente Operativa de Capital Humano.- Edificio "B-2" Piso 1
 <br>   
<font size=1> C.c.p.- Lic Monica Watty Urista.- Gerente de Reclutamiento y Selección.- Edificio "B-2" Piso 1


    </b></td></tr>


</body>
</html>
<?php        
    }
    else
    {

        $idalumno=$_POST['idalumno'];    
        $anoreg=$_POST['anoreg'];   
        $felaboracion=$_POST['felaboracion'];
        $fcancelacion=$_POST['fcancelacion'];
        $ofiremi=$_POST['ofiremi'];
        $nombredest=$_POST['nombredest'];
        $cargodest=$_POST['cargodest'];
        $ubicaciondest=$_POST['ubicaciondest'];
        $numante=$_POST['numante'];
        $numexp=$_POST['numexp'];
        $fante=$_POST['fante'];
        $firma=$_POST['firma'];
        $cargo=$_POST['cargo'];
        $mcancel=$_POST['mcancel'];

        
        $consulta="SELECT A.ID_Est, A.Ano_Reg, A.ApPaterno_Est, A.ApMaterno_Est, A.Nombre_Est, A.RFC, B.Nombre_Asesor, B.Nombre_Asesor, B.acreedor, B.ccosto, B.pfinanciera, B.ppresupuestario, B.cmayor, B.division, B.eps, B.F_Convenio, B.fondo, B.CcGen FROM datospersonales A, datosarea B WHERE A.ID_Est=$idalumno and B.ID_Estudiante3=$idalumno and A.Ano_Reg=$anoreg and B.Ano_Reg= $anoreg" ;
                    $resid=$conexion->query($consulta);
                    $row=mysqli_fetch_array($resid);


        $date1=explode("-", $felaboracion);    
            
        $date3=explode("-", $fcancelacion);  
        
        $date6=explode("-", $fante);

        $meses = array('01'=>'Enero', '02'=>'Febrero', '03'=>'Marzo', '04'=>'Abril', '05'=>'Mayo', '06'=>'Junio', '07'=>'Julio',
                   '08'=>'Agosto', '09'=>'Septiembre', '10'=>'Octubre', '11'=>'Noviembre', '12'=>'Diciembre'); 
        $fecha1="Ciudad de M&eacutexico, a ".$date1[2]." de ".$meses[$date1[1]]." de ".$date1[0];     
         
        $fecha6="Ciudad de M&eacutexico, a ".isset($date6[2])." de ".isset($meses[$date6[1]])." de ". isset($date6[0]); 
         
        $fecha7="".$date3[2]." de ".$meses[$date3[1]]." de ".$date3[0];
      
?>


<!DOCTYPE html>
<html>
<head>
    <script type="text/javascript">
    window.onload = function() { window.print }
    
</script>
<meta charset="UTF-8">
<meta http-equiv="Content-type" content="text/html; charset=UTF-8">
<script src="js/pago3.js"></script>
 <style>
table {
    border-collapse: collapse;
}

</style>
</head>
 

    <img src="images/pemex.png"  width="200" height="60">

    
<table width="800" border=0>
<font face="Arial Narrow", Arial, sans-serif; size="2">    
     <tr>
        <td width="500"></td><td> </td> 

</tr>    
<tr>
        <td width="500"></td><td>   </td></tr>
<tr>

<td>
    <br>
    <hr style = "height: .5px; border:none; color:#000; background-color:#000; margin-right:20px">  
</td>
<td>
    <font face="Arial Narrow", Arial, sans-serif; size="2">  Fecha: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $fecha1 ?> </font>
   
    <hr style = "height: .5px; border:none; color:#000; background-color:#000; ">
</td>
</tr>
</table>

<table width="800" border=0>
<tr>
    <td style=vertical-align:top width="70"> <font size=2>Remitente</font></td>
<td align="left"  width="430"><b>Dirreci&oacuten Coorporativa de Administraci&oacuten y Servicios <br>        
Subdirecci&oacuten de Recursos Humanos <br>
Gerencia Operativa de Capital Humano <br>
Subgerencia Regional de Desarrollo Humano Altiplano <br>
Coordinaci&oacuten de Profesionistas en Entrenamiento</b></td>


<td style=vertical-align:top> Numero: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DCAS-SRH-GOCH-SRDHA-CPE- <?php echo $ofiremi ?><br><br>Numero de Expediente:
</td>
</tr>
<table width="800" border=0>
     <tr>
        <td width="500"> <hr style = "height: .5px; border:none; color:#000; background-color:#000; margin-right:20px">   </td><td> <hr style = "height: .5px; border:none; color:#000; background-color:#000; "></td>

</tr>    
<tr>
       
 </font>      

</table>

<table width="800" border=0>
<tr>

      <td style=vertical-align:top width="70"> <font size=2>Destinatario</font>
    </td>
<td style="margin-right: 20px"  align="left"  width="410"><b><?php echo ($nombredest) ?></b>   
 <br> <b><?php echo utf8_decode($cargodest) ?> </b>
<br> <b> <?php echo utf8_decode($ubicaciondest) ?></b> 
<br> <b> Presente </b></td>


<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>

<td style=vertical-align:top><font size=2>Antecedentes:<br>  Numero(s): <?php echo $numante ?><br> Numero &uacute;nico de expediente:  <?php echo $numexp ?><br> Fecha(s):  
    <?php /*  echo $fecha6*/?>
</font></td>
</tr>
</table>
<table width="800" border=0>
     <tr>
        <td width="500"> <hr style = "height: .5px; border:none; color:#000; background-color:#000; margin-right:20px"> </td><td>  <hr style = "height: .5px; border:none; color:#000; background-color:#000;"> </td>

</tr>    
</table>

<table width="800" border=0>
<tr>
    <td style=vertical-align:top width="70"> <font size=2>Asunto:</font></td>

<td  align="left"  width="400" > <font size=2> Notificación de Cancelación Anticipada del Convenio en Entrenamiento de el/la C.<?php echo ucwords(str_replace('\'', '\' ', strtolower(utf8_decode($row['Nombre_Est'])))).' '.ucwords(str_replace('\'', '\' ', strtolower(utf8_decode($row['ApPaterno_Est'])))).' '.ucwords(str_replace('\'', '\' ', strtolower(utf8_decode($row['ApMaterno_Est'])))) ?> </font></td>
<td width="30"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>

<!--<td  align="left"  width="400" > <font size=2> NOTIFICACION DE CANCELACION ANTICIPADA DEL CONVENIO EN ENTRENAMIENTO DE LA C. <?php /*echo ucwords(str_replace('\'', '\' ', strtolower(utf8_decode($row['Nombre_Est'])))).' '.ucwords(str_replace('\'', '\' ', strtolower(utf8_decode($row['ApPaterno_Est'])))).' '.ucwords(str_replace('\'', '\' ', strtolower(utf8_decode($row['ApMaterno_Est'])))) */?>  </font></td>
<td width="25"> </td>-->



<td width="30" style=vertical-align:top"><font size=2>Anexo </font></td><td> <?php if (true){?><font size=2> &#8999; <?php } else{?>&#9633;<?php }?></font>
</font></td>
</tr>
</table>
<style > 
div {
    text-align: justify;
    text-justify: inter-word;
}
</style>


<table width="800" border=0>
    <tr>
        <td>
            <br><br>

<div>Le informo que, de acuerdo a su solicitud en el apartado de antecedentes, se procede a concluir con la cancelación del convenio en entrenamiento de la C. <?php echo ucwords(str_replace('\'', '\' ', strtolower(utf8_decode($row['Nombre_Est'])))).' '.ucwords(str_replace('\'', '\' ', strtolower(utf8_decode($row['ApPaterno_Est'])))).' '.ucwords(str_replace('\'', '\' ', strtolower(utf8_decode($row['ApMaterno_Est'])))) ?>, a partir de la Fecha, <?php echo $fecha7 ?>. <br><br> </div>
        </td>
    </tr>
</table>

<table width="800" border=0>
    <tr>
        <td>
            <br>
     <div align="justify"> De la suspensión o cancelación de la prestación en el programa:<br><br></div>       
<div>389) Son Causas de Suspensión del Convenio de Entrenamiento <br><br> </div>
<div>390) Son causas de Cancelacion del Convenio de Entrenamiento, por Razones Imputables al Profesionista en Entrenamiento, las Siguientes:  <br><br> </div>
        </td>
    </tr>
</table>


<table width="800" border=0>
    <tr>
        <td>
            <br>

<div> Motivo: <?php echo $mcancel ?> <br><br> </div>
        </td>
    </tr>
</table>


<table width="800" border=0 >
    <tr><td><br><font size=2> Se adjunta copia de la solicitud de la cancelación de la Profesionista en Entrenamiento C. <?php echo ucwords(str_replace('\'', '\' ', strtolower(utf8_decode($row['Nombre_Est'])))).' '.ucwords(str_replace('\'', '\' ', strtolower(utf8_decode($row['ApPaterno_Est'])))).' '.ucwords(str_replace('\'', '\' ', strtolower(utf8_decode($row['ApMaterno_Est'])))) ?> para concluir con su expediente.<br><br><br><br>Sin otro particular por el momento, aprovecho para enviarle un cordial saludo.
<br><br>
<b>A t e n t a m e n t e , 
<br><br><br><br><br><br> <br><br></font>
<font   size= 3>  
<?php echo ucwords(str_replace('\'', '\' ', strtolower($firma))) ?>
<br>
<?php echo ucwords(str_replace('\'', '\' ', strtolower($cargo))) ?>
<br></font>
</b>
<br><br>
<font size=1> Elaboro: CMRM/DMOB
    <br>
<font size=1> C.c.p.- Lic Aida Vargas Guzmán.- Gerente Operativa de Capital Humano.- Edificio "B-2" Piso 1
 <br>   
<font size=1> C.c.p.- Lic Monica Watty Urista.- Gerente de Reclutamiento y Selección.- Edificio "B-2" Piso 1


    </b></td></tr>


</body>
</html>

<?php

        $consulta3="SELECT * FROM oficioguardado WHERE idalumno='$idalumno' AND anoregistro='$anoreg' AND toficio='CANCELACION'";
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
                
                $query ="UPDATE oficioguardado SET 
                toficio='CANCELACION', 
                idalumno='$idalumno',
                anoregistro='$anoreg', 
                felaboracion='$felaboracion',  
                ofiremi='$ofiremi', 
                nombredest='$nombredest', 
                cargodest='$cargodest', 
                ubicaciondest='$ubicaciondest', 
                numante='$numante', 
                numexp='$numexp', 
                fante='$fante', 
                fcancelacion='$fcancelacion', 
                firmaofi='$firma', 
                cargo='$cargo', 
                mcancel='$mcancel' 
                WHERE idalumno='$idalumno' AND anoregistro='$anoreg' AND toficio='CANCELACION'";

                $resultado=mysqli_query($conexion, $query);
                if (!$resultado)
                {
                    echo "error en la consulta".mysqli_error($conexion);                
                }           
            }
            else
            {
                $query = "INSERT INTO OficioGuardado 
                (toficio, 
                idalumno, 
                anoregistro, 
                felaboracion, 
                
                ofiremi, 
                nombredest,
                cargodest, 
                ubicaciondest,
                numante, 
                numexp, 
                fante, 
                fcancelacion, 
                firmaofi, 
                cargo,
                mcancel) values 
                 
                 ('CANCELACION', 
                '$idalumno', 
                '$anoreg', 
                '$felaboracion', 
                '$ofiremi', 
                '$nombredest', 
                '$cargodest', 
                '$ubicaciondest', 
                '$numante', 
                '$numexp', 
                '$fante', 
                '$fcancelacion', 
                '$firma', 
                '$cargo',
                '$mcancel')";

                $resultado=mysqli_query($conexion, $query);
                if (!$resultado)
                {
                    echo mysqli_error($conexion);                
                }

            }
        }
    } 

?>
