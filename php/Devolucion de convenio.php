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


        $consulta="SELECT A.ID_Est, A.Ano_Reg, A.ApPaterno_Est, A.ApMaterno_Est, A.Nombre_Est, A.RFC, B.Nombre_Asesor, B.acreedor, B.ccosto, B.pfinanciera, B.ppresupuestario, B.cmayor, B.F_Inicio,B.F_Final,
        B.F_Convenio ,B.division, B.eps, B.CcGen, B.fondo FROM datospersonales A, datosarea B WHERE A.ID_Est=$idalumno and B.ID_Estudiante3=$idalumno and A.Ano_Reg=$anoreg and B.Ano_Reg=$anoreg";
                    $resid=$conexion->query($consulta);
                    $row=mysqli_fetch_array($resid);

        $date1=explode("-", $row2['felaboracion']);    
        $date5=explode("-", $row['F_Inicio']);
        $date6=explode("-", $row2['fante']);
        $date3=explode("-", $row['F_Final']);






        $meses = array('01'=>'Enero', '02'=>'Febrero', '03'=>'Marzo', '04'=>'Abril', '05'=>'Mayo', '06'=>'Junio', '07'=>'Julio',
                   '08'=>'Agosto', '09'=>'Septiembre', '10'=>'Octubre', '11'=>'Noviembre', '12'=>'Diciembre'); 
        $fecha1="Ciudad de M&eacutexico, a ".$date1[2]." de ".$meses[$date1[1]]." de ".$date1[0];     
        $fecha3="".$date3[2]; 
        $fecha6="Ciudad de M&eacutexico, a ".$date6[2]." de ".$meses[$date6[1]]." de ".$date6[0]; 
        $fecha7="".$date3[2]."/".$date3[1]."/".$date3[0];
        $fecha4= $date5[2]." de ".$meses[$date5[1]]." de ".$date5[0];
        $fecha5= $date3[2]." de ".$meses[$date3[1]]." de ".$date3[0];
        
    


?>

<!DOCTYPE html>
<html>
<head>
    <script type="text/javascript">
    window.onload = function() { window.print }
</script>
<meta charset="UTF-8">
<meta http-equiv="Content-type" content="text/html; charset=UTF-8">
<script type="text/javascript">
    window.onload = function() { window.print }
</script>
 <style>
table {
    border-collapse: collapse;
}

</style>
</head>
    <img src="images/pemex.png"  width="200" height="60">

    <table width="800" border=0>
        <tr>
        <td width="500"></td><td>Oficio</td>

</tr>    
     <tr>
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
        <td width="500"> <hr style = "height: 1px; border:none; color:#000; background-color:#000; margin-right:20px">   </td><td> <hr style = "height: 1px; border:none; color:#000; background-color:#000; "></td>

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


<td>&nbsp;&nbsp;</td>

<td style=vertical-align:top><font size=2>Antecedentes:<br>  Numero(s): <?php echo $row2['numante'] ?><br> Numero &uacute;nico de expediente:  <?php echo $row2['numexp'] ?><br> Fecha(s):  
    <?php /*  echo $fecha6*/?>
</font></td>
</tr>
</table>
<table width="800" border=0>
     <tr>
        <td width="500"> <hr style = "height: 1px; border:none; color:#000; background-color:#000; margin-right:20px"> </td><td>  <hr style = "height: 1px; border:none; color:#000; background-color:#000;"> </td>

</tr>    
</table>

<table width="800" border=0>
<tr>
    <td style=vertical-align:top width="70"> <font size=2>Asunto:</font></td>

<td  align="left"  width="400" > <font size=2> Notificación de Cancelación Anticipada del Convenio en Entrenamiento de el/la C.<?php echo ucwords(str_replace('\'', '\' ', strtolower(utf8_decode($row['Nombre_Est'])))).' '.ucwords(str_replace('\'', '\' ', strtolower(utf8_decode($row['ApPaterno_Est'])))).' '.ucwords(str_replace('\'', '\' ', strtolower(utf8_decode($row['ApMaterno_Est'])))) ?> </font></td>
<td width="30"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>

<!--<td  align="left"  width="400" > <font size=2> NOTIFICACION DE CANCELACION ANTICIPADA DEL CONVENIO EN ENTRENAMIENTO DE LA C. <?php /*echo ucwords(str_replace('\'', '\' ', strtolower(utf8_decode($row['Nombre_Est'])))).' '.ucwords(str_replace('\'', '\' ', strtolower(utf8_decode($row['ApPaterno_Est'])))).' '.ucwords(str_replace('\'', '\' ', strtolower(utf8_decode($row['ApMaterno_Est'])))) */?>  </font></td>
<td width="25"> </td>-->



<td width="30" style=vertical-align:top"><font size=2>Anexo </font></td><td> <?php if (true){?><font size=3> &#8999; <?php } else{?>&#9633;<?php }?></font>
</font></td>
</tr>
</table>

<style > 
div {
    text-align: justify;
    text-justify: inter-word;
}
</style>
 <font face="Arial Narrow", Arial, sans-serif; size="3">
<table width="800" border=0>
    <tr>
        <td>
            <br><br>

<div>Con relacion a las Politicas de Administracion de Recursos Humanos y Relaciones Laborales en el numeral III.3.1.4 Personas Candidatas en Formacion inciso 383) Para la atencion del Programa de Profesionistas en Entrenamiento, envio a usted dos tantos originales debidamente firmados del Convenio de Entrenamiendo que se otorga al (a) <b>C. <?php echo $row['Nombre_Est'].' '.$row['ApPaterno_Est'].' '.$row['ApMaterno_Est']?></b> con vigencia del<b> <?php echo $fecha4?> al <?php echo $fecha5?></b><br><br></div>

<div>Lo anterior, para un juego de convenio sea entregado al (a) <b>C. <?php echo $row['Nombre_Est'].' '.$row['ApPaterno_Est'].' '.$row['ApMaterno_Est']?></b>, y el otro convenio quede bajo el resguardo de la Gerencia Operativa de Capital Humano.</div>
        </td>
    </tr>

</table></font>
 <font face="Arial Narrow", Arial, sans-serif; size="3">
<table width="800" border=0>
     <br><br>Sin otro particular, reciba un cordial saludo.
<br><br>
<b>A t e n t a m e n t e , 
<br><br><br><br><br><br> <br><br>
<?php echo ucwords(str_replace('\'', '\' ', strtolower($row2['firmaofi']))) ?>
<br>
<?php echo ucwords(str_replace('\'', '\' ', strtolower($row2['cargo']))) ?>
<br><br><br>
</b>
<br><br>
<font size=1> Elabor&oacute;: CMRM / DMOB</b>
 <br>   
<font size=1>Ext.- 377-66


    </b></td></tr>
</font>
</body>
</html>

<?php        
    }
    else
    {

        $idalumno=$_POST['idalumno'];    
        $anoreg=$_POST['anoreg'];   
       $felaboracion=$_POST['felaboracion'];
        $ofiremi=$_POST['ofiremi'];
        $nombredest=$_POST['nombredest'];
        $cargodest=$_POST['cargodest'];
        $ubicaciondest=$_POST['ubicaciondest'];
        $numante=$_POST['numante'];
        $numexp=$_POST['numexp'];
        $fante=$_POST['fante'];
        $firma=$_POST['firma'];
        $cargo=$_POST['cargo'];
        
        $consulta="SELECT A.ID_Est, A.Ano_Reg, A.ApPaterno_Est, A.ApMaterno_Est, A.Nombre_Est, A.RFC, B.Nombre_Asesor, B.Nombre_Asesor, B.acreedor, B.ccosto, B.pfinanciera, B.ppresupuestario, B.cmayor, B.division, B.eps, B.F_Convenio, B.fondo, B.CcGen, B.F_Inicio, B.F_Final FROM datospersonales A, datosarea B WHERE A.ID_Est=$idalumno and B.ID_Estudiante3=$idalumno and A.Ano_Reg=$anoreg and B.Ano_Reg= $anoreg" ;
                    $resid=$conexion->query($consulta);
                    $row=mysqli_fetch_array($resid);


        $date1=explode("-", $felaboracion);    
        $date5=explode("-", $row['F_Inicio']);
        $date6=explode("-", $fante);
        $date3=explode("-", $row['F_Final']);

        $meses = array('01'=>'Enero', '02'=>'Febrero', '03'=>'Marzo', '04'=>'Abril', '05'=>'Mayo', '06'=>'Junio', '07'=>'Julio',
                   '08'=>'Agosto', '09'=>'Septiembre', '10'=>'Octubre', '11'=>'Noviembre', '12'=>'Diciembre'); 
        $fecha1="Ciudad de M&eacutexico, a ".$date1[2]." de ".$meses[$date1[1]]." de ".$date1[0];     
        $fecha3="".$date3[2]; 
        $fecha6="Ciudad de M&eacutexico, a ".$date6[2]." de ".$meses[$date6[1]]." de ".$date6[0]; 
        $fecha7="".$date3[2]."/".$date3[1]."/".$date3[0];
        $fecha4= $date5[2]." de ".$meses[$date5[1]]." de ".$date5[0];
        $fecha5= $date3[2]." de ".$meses[$date3[1]]." de ".$date3[0];
        
?>

<!DOCTYPE html>
<html>
<head>
    <script type="text/javascript">
    window.onload = function() { window.print }
</script>
<meta charset="UTF-8">
<meta http-equiv="Content-type" content="text/html; charset=UTF-8">
<script type="text/javascript">
    window.onload = function() { window.print }
</script>
 <style>
table {
    border-collapse: collapse;
}

</style>
</head>
    <img src="images/pemex.png"  width="200" height="60">


    

    <table width="800" border=0>
        <tr>
        <td width="500"></td><td>Oficio</td>

</tr>    
     <tr>
         
<font face="Arial Narrow", Arial, sans-serif; size="2"> 

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
        <td width="500"> <hr style = "height: 1px; border:none; color:#000; background-color:#000; margin-right:20px">   </td><td> <hr style = "height: 1px; border:none; color:#000; background-color:#000; "></td>

</tr>    
<tr>
       
 </font>      

</table>

<table width="800" border=0>
<tr>

      <td style=vertical-align:top width="70"> <font size=2>Destinatario</font>
    </td>

<td  style="margin-right: 20px"  align="left"  width="410"><b><?php echo ($nombredest) ?></b>   
 <br> <b><?php echo utf8_decode($cargodest) ?> </b>
<br> <b> <?php echo utf8_decode($ubicaciondest) ?></b> 
<br> <b> Presente </b></td>


<td >&nbsp;&nbsp;</td>

<td style=vertical-align:top><font size=2>Antecedentes:<br>  Numero(s): <?php echo $numante ?><br> Numero &uacute;nico de expediente:  <?php echo $numexp ?><br> Fecha(s):  
    <?php /*  echo $fecha6*/?>
</font></td>
</tr>
</table>
<table width="800" border=0>
     <tr>
        <td width="500"> <hr style = "height: 1px; border:none; color:#000; background-color:#000; margin-right:20px"> </td><td>  <hr style = "height: 1px; border:none; color:#000; background-color:#000;"> </td>

</tr>    
</table>

<table width="800" border=0>
<tr>
    <td style=vertical-align:top width="70"> <font size=2>Asunto:</font></td>

<td  align="left"  width="400" > <font size=2> Notificación de Cancelación Anticipada del Convenio en Entrenamiento de el/la C.<?php echo ucwords(str_replace('\'', '\' ', strtolower(utf8_decode($row['Nombre_Est'])))).' '.ucwords(str_replace('\'', '\' ', strtolower(utf8_decode($row['ApPaterno_Est'])))).' '.ucwords(str_replace('\'', '\' ', strtolower(utf8_decode($row['ApMaterno_Est'])))) ?> </font></td>
<td width="30"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>

<!--<td  align="left"  width="400" > <font size=2> NOTIFICACION DE CANCELACION ANTICIPADA DEL CONVENIO EN ENTRENAMIENTO DE LA C. <?php /*echo ucwords(str_replace('\'', '\' ', strtolower(utf8_decode($row['Nombre_Est'])))).' '.ucwords(str_replace('\'', '\' ', strtolower(utf8_decode($row['ApPaterno_Est'])))).' '.ucwords(str_replace('\'', '\' ', strtolower(utf8_decode($row['ApMaterno_Est'])))) */?>  </font></td>
<td width="25"> </td>-->



<td width="30" style=vertical-align:top"><font size=2>Anexo </font></td><td> <?php if (true){?><font size=3> &#8999; <?php } else{?>&#9633;<?php }?></font>
</font></td>
</tr>
</table>

<style > 
div {
    text-align: justify;
    text-justify: inter-word;
}
</style>
 <font face="Arial Narrow", Arial, sans-serif; size="3">
<table width="800" border=0>
    <tr>
        <td>
            <br><br>
<div>Con relacion a las Politicas de Administracion de Recursos Humanos y Relaciones Laborales en el numeral III.3.1.4 Personas Candidatas en Formacion inciso 383) Para la atencion del Programa de Profesionistas en Entrenamiento, envio a usted dos tantos originales debidamente firmados del Convenio de Entrenamiendo que se otorga al (a) <b>C. <?php echo $row['Nombre_Est'].' '.$row['ApPaterno_Est'].' '.$row['ApMaterno_Est']?></b> con vigencia del<b> <?php echo $fecha4?> al <?php echo $fecha5?></b><br><br></div>

<div>Lo anterior, para un juego de convenio sea entregado al (a) <b>C. <?php echo $row['Nombre_Est'].' '.$row['ApPaterno_Est'].' '.$row['ApMaterno_Est']?></b>, y el otro convenio quede bajo el resguardo de la Gerencia Operativa de Capital Humano.</div>
        </td>
    </tr>

</table></font>
 <font face="Arial Narrow", Arial, sans-serif; size="3">
<table width="800" border=0>
     <br><br>Sin otro particular, reciba un cordial saludo.
<br><br>
<b>A t e n t a m e n t e , 
<br><br><br><br><br><br> <br><br>
<?php echo ucwords(str_replace('\'', '\' ', strtolower (utf8_decode($firma)))) ?>
<br>
<?php echo ucwords(str_replace('\'', '\' ', strtolower (utf8_decode($cargo)))) ?>
<br><br><br>
</b>
<br><br>
<font size=1> Elabor&oacute;: CMRM / DMOB
 <br>   
<font size=1>Ext.- 377-66
 </b></td></tr>
</font>
</body>
</html>

<?php

        $consulta3="SELECT * FROM oficioguardado WHERE idalumno='$idalumno' AND anoregistro='$anoreg' AND toficio='DEVOLUCION'";
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
                
                $query ="UPDATE oficioguardado SET toficio='DEVOLUCION', idalumno='$idalumno', anoregistro='$anoreg',felaboracion='$felaboracion', ofiremi='$ofiremi', nombredest='$nombredest', cargodest='$cargodest', ubicaciondest='$ubicaciondest', numante='$numante', numexp='$numexp', fante='$fante', firmaofi='$firma', cargo='$cargo' WHERE idalumno='$idalumno' AND anoregistro='$anoreg' AND toficio='DEVOLUCION'";

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
                firmaofi, 
                 cargo) values 
                 
                 ('DEVOLUCION', 
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
                '$firma', 
                '$cargo')";

                $resultado=mysqli_query($conexion, $query);
                if (!$resultado)
                {
                    echo mysqli_error($conexion);                
                }
            }
        }
    } 
?>