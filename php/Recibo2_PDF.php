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
        $date2=explode("-", $row2['mespago']);        
        $date3=explode("-", $row2['ftrab1']);  
        $date4=explode("-", $row2['ftrab2']);
        $date5=explode("-", $row['F_Convenio']);
        $date6=explode("-", $row2['fante']);
        $meses = array('01'=>'Enero', '02'=>'Febrero', '03'=>'Marzo', '04'=>'Abril', '05'=>'Mayo', '06'=>'Junio', '07'=>'Julio',
                   '08'=>'Agosto', '09'=>'Septiembre', '10'=>'Octubre', '11'=>'Noviembre', '12'=>'Diciembre'); 
        $fecha1="Ciudad de M&eacutexico, a ".$date1[2]." de ".$meses[$date1[1]]." de ".$date1[0];     
        $fecha2=$meses[$date2[1]]." / ".$date2[0];              
        $fecha3="".$date3[2]; 
        $fecha4="".$date4[2]." de ".$meses[$date4[1]]." de ".$date4[0];
        $fecha5="".isset($date5[2])." de ".isset($meses[$date5[1]])." de ".isset($date5[0]); 
        
        $fecha6="Ciudad de M&eacutexico, a ".$date6[2]." de ".$meses[$date6[1]]." de ".$date6[0];      
        $fecha7="".$date3[2]."/".$date3[1]."/".$date3[0];
        $fecha8="".$date4[2]."/".$date4[1]."/".$date4[0];


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

    <body style="margin-left:20px; margin-top:40px; margin-bottom: 50px ">
        <font  face="Arial Narrow", Arial, sans-serif; size="3">

        <p align="right"> <font size="2" face="narrow"></font></p> 
        <table width="800" border=0>
        <tr>
            
        <td align="left" colspan="2" width="650"><b>Dirreci&oacuten Coorporativa de Administraci&oacuten y Servicios <br>        
Subdirecci&oacuten de Recursos Humanos <br>
Gerencia Operativa de Capital Humano <br>
Subgerencia Regional de Desarrollo Humano Altiplano <br>
Coordinaci&oacuten de Profesionistas en Entrenamiento</b></td>

        <td width=></td>
        </tr>
        <tr>
            <td colspan="3">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="3">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="3" align="right"><?php echo $fecha1?></td>
        </tr>
                <tr>
            <td colspan="3">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td><td align="right"><b>PE:</b> <b><?php  echo $idalumno.'/'.$anoreg?></td></b>
        </tr>
        <tr><td colspan="3"></td></tr>
        <tr>
            <td colspan="2">&nbsp;</td><td align="right"><b>Recibo No.</b> <b><?php echo $row2['numrecibo']?></td></b>
        </tr>
        <tr><td colspan="3"></td></tr>
        <tr><td colspan="3"></td></tr>
        <tr><td colspan="3"></td></tr>
             <tr>
            <td>&nbsp;</td><td align="right" ><u>Bruto:</u> </td><td align="right"> <b><?php echo $row2['bruto']?></td></b>
        </tr>
        <tr><td colspan="3"></td></tr>
        <tr><td colspan="3"></td></tr>
        <tr><td colspan="3"></td></tr>
             <tr>
            <td>&nbsp;</td><td align="right"><u>Impuesto:</u> </td><td align="right"> <b><?php echo $row2['impuesto']?></td></b>
        </tr>

        <tr><td colspan="3"></td></tr>
        <tr><td colspan="3"></td></tr>
        <tr><td colspan="3"></td></tr>
             <tr>
            <td >&nbsp;</td><td align="right"><u>Neto: </u></td><td align="right"> <b><?php echo $row2['neto']?></td></b>
        </tr>

        <tr><td colspan="3"></td></tr>
        <tr><td colspan="3"></td></tr>
        <tr><td colspan="3"></td></tr>
             <tr>
            <td >&nbsp;</td><td align="right"><u>N&uacutemero de Acreedor:</u> </td><td align="right"> <b><?php echo $row['acreedor']?></td></b>
        </tr>

        <tr><td colspan="3"></td></tr>
        <tr><td colspan="3"></td></tr>
        <tr><td colspan="3"></td></tr>
        <tr>
            <td>&nbsp;</td><td align="right"><u>Mes de Pago:</u> </td><td align="right"> <b><?php echo $fecha2?></td></b>
        </tr>
        <tr><td colspan="3">&nbsp;</td></tr>
        <tr><td colspan="3">&nbsp;</td></tr>
        <tr>
            <td  colspan ="3" align="justify">RECIB&iacute de Petr&oacuteleos Mexicanos la cantidad de <b><?php echo $row2['neto'].' '.$row2['cantidad'] ?></b> por concepto de ayuda econ&oacutemica como apoyo para desarrollar las actividades necesarias durante el per&iacuteodo del <b><?php echo $fecha3.' al '.$fecha4 ?></b>, a favor de <b>C.</b> <b><?php echo utf8_decode($row['Nombre_Est']).' '.utf8_decode($row['ApPaterno_Est']).' '.utf8_decode($row['ApMaterno_Est'])?></b>, con clave del Registro Federal de Contribuyentes <b><?php $row['RFC'] ?></b>, de conformidad con lo establecido en la cl&aacuteusula quinta del Convenio de Entrenamiento, de fecha <b><?php echo $fecha5?></b></td>
        </tr>
        <tr>
            <td  colspan ="3" align="justify">La erogaci&oacuten que se efect&uacutee por este concepto afectar&aacute el siguiente trinomio presupuestal: <b> <?php echo 'Centro Gestor: '. $row['CcGen'].', Centro de Costo: '.$row['ccosto'].', Posici&oacuten Financiera: '.$row[' pfinanciera'].', Programa Presupuestario: '.$row['ppresupuestario'].', Fondo: '.$row['fondo'].', Cuenta Mayor'.$row['cmayor'].', Division: ' .$row['division'].', EPS: ' .$row['eps'] ?></td></b> <!-- QUITAR AREA FUNCIONAL DE AQUI-->
        </tr>
    </table>
 <table width="800" border =0>
        <tr><td colspan="4">&nbsp;</td></tr> 
        <tr><td colspan="4">&nbsp;</td></tr> 
        <tr><td colspan="4">&nbsp;</td></tr> 
        <tr><td colspan="4">&nbsp;</td></tr>
        <tr>
        <td align = center width="300"><b>AUTORIZA</b></td>
        <td width="10"></td>
        <td align = center width="300"><b>RECIB&Iacute</b></td>
        <td align = center width="5"></td>
        </tr>
        <tr><td colspan="4">&nbsp;</td></tr> 
        <tr><td colspan="4">&nbsp;</td></tr>
        <tr><td colspan="4">&nbsp;</td></tr> 
        <tr><td colspan="4">&nbsp;</td></tr> 
        <tr>
        <td align =center width="350"><b><?php echo utf8_decode($row['Nombre_Asesor'])?><br>ASESOR T&EacuteCNICO</b></td>
        <td align = center width="10"></td>
        <td align = center width="300"><b><?php echo "". utf8_decode($row['Nombre_Est']).' '.utf8_decode($row['ApPaterno_Est']).' '.utf8_decode($row['ApMaterno_Est'])?> <br>
        C. PROFESIONISTA EN ENTRENAMIENTO </b></td>
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
    <font  face="Arial Narrow", Arial, sans-serif; size="2">
        Cuenta con Registro de Cuenta Bancaria en el Sistema SAP-R3
    </font>
     <br><br><br><br><br><br><br>

    <img src="images/pemex.png"  width="200" height="60">

    
    <table width="800" border=0>
     <tr>
        <td width="500"></td><td>Oficio</td>

</tr>    
<tr>
        <td width="500"></td><td> <font face="Arial Narrow", Arial, sans-serif; size="2">Fecha &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; <?php echo $fecha1 ?></font></td></tr>
<tr>

<td >
    <hr style="height:0.5px; border:none; color:#000; background-color:#000; width:500">

</td>
<td>
    ________________________________________
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
<td style=vertical-align:top><font size=2>Numero:  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;   DCAS-SRH-GOCH-SRDHA-CPE- <?php echo $row2['ofiremi'] ?><br><br>Numero de Expediente:
</font></td>
</tr>
<table width="800" border=0>
     <tr>
        <td width="500"></td><td></td>

</tr>    
<tr>
        <td width="500"></td><td> <font face="Arial Narrow", Arial, sans-serif; size="2"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; </font></td></tr>
<tr>

<td>
    _________________________________________________________________    
</td>
<td>
    ________________________________________
</td>
</tr>
</table>

<table width="800" border=0>
<tr>
    <td style=vertical-align:top width="70"> <font size=2>Destinatario</font></td>
<td align="left"  width="430"><b><?php echo utf8_decode($row2['nombredest']) ?>         
 <br> <b> <?php echo utf8_decode($row2['cargodest']) ?> </b>
<br> <b> <?php echo utf8_decode($row2['ubicaciondest']) ?> </b></td> 



<td style=vertical-align:top><font size=1>Antecedentes:<br>  Numero(s): <?php echo $row2['numante'] ?><br> Numero &uacute;nico de expediente:  <?php echo $row2['numexp'] ?><br> Fecha(s):  <?php echo  $fecha6?>
</font></td>
</tr>
</table>
<table width="800" border=0>
     <tr>
        <td width="500"></td><td></td>

</tr>    
<tr>
        <td width="500"></td><td> <font face="Arial Narrow", Arial, sans-serif; size="2"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; </font></td></tr>
<tr>

<td style=vertical-align:top >
    _________________________________________________________________    
</td>
<td>
    ________________________________________
</td>
</tr>
</table>

<table width="800" border=0>
<tr>
    <td style=vertical-align:top width="70"> <font size=2>Asunto:</font></td>

<td align="left"  width="430"><b>RECIBO DE PAGO PROFESIONISTA EN ENTRENAMIENTO </td>



<td width="30" style=vertical-align:top"><font size=1>Anexo </font></td><td> <?php if (true){?><font size=2> &#8999; <?php } else{?>&#9633;<?php }?></font>
</font></td>
</tr>
</table>
<style > 
div {
    text-align: justify;
    text-justify: inter-word;
}
</style>
<table width="810" border=0>
    <tr>
        <td>
            <br><br><br><br>
<div>Agradeceremos a usted, se sirva gestionar el pago por concepto de Ayuda Econ&oacutemica otorgada al Profesionista en Entrenamiento, contemplada en las Pol&iacuteticas y Procedimientos de Administraci&oacuten de Recursos Humanos y Relaciones Laborales en el numeral III.3. Reclutamiento y Selecci&oacuten, en el apartado III.3.1.4 Personas Candidatas en Formaci&oacuten inciso 383) Para la atenci&oacuten del Programa de Profesionistas en Entrenamiento, 386) El convenio de entrenamiento, comprender&acute una ayuda equivalente, correspondiente al mes de <?php echo $fecha2 ?>
<br><br>
</div>
       </td>
    </tr>
</table>
<table width="800" border=1px solid black>
    <tr align="center">
        
        <td width="30%"><b> NOMBRE </b>
        </td>
        <td width="10%"><b>FOLIO</b>
        </td>
        <td width="10%"><b>RECIBO</b>
        </td>
        <td width="10%"><b>INICIO</b>
        </td>
        <td width="10%"><b>TERMINO</b>
        </td>
        <td width="16%"><b>IMPORTE NETO</b>
        </td>
        <td width="14%"><b>NUM. DE ACREEDOR</b>
        </td>
    </b>
    </tr>   
    <tr align="center">
        <td height="40">    
            <?php echo ucwords(str_replace('\'', '\' ', strtolower(utf8_decode($row['Nombre_Est'])))).' '.ucwords(str_replace('\'', '\' ', strtolower(utf8_decode($row['ApPaterno_Est'])))).' '.ucwords(str_replace('\'', '\' ', strtolower(utf8_decode($row['ApMaterno_Est'])))) ?>
        </td>
        <td>
            <?php echo 'PE: '.$row2['idalumno'].'/'.$row2['anoregistro'] ?>
        </td>
        <td>
            <?php echo $row2['numrecibo']?>
        </td>
        <td>
            <?php echo $fecha7?>
        </td>
        <td>
            <?php echo $fecha8?>
        </td>
        <td>
            <?php echo $row2['neto']?>
        </td>
        <td>
            <?php echo $row['acreedor'] ?>
        </td>
        </tr>
</table>
<table width="800" border=0>
    <tr><td><br><br><font size=2> Para tales efectos, se adjuntan el recibo de pago y la lista de asistencia. <br><br>Sin otro particular, reciba un cordial saludo.
<br><br>
<b>A t e n t a m e n t e , 
<br><br><br><br><br><br> <br><br>
<?php echo $row2['firmaofi'] ?>
<br>
<?php echo $row2['cargo'] ?>
<br><br><br>
</b>
<br><br>
<font size=1> Elabor&oacute;: CMRM / DMOB
 <br>   
<font size=1>Ext.- (891) 377-66


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
        $numrecibo=$_POST['numrecibo'];
        $toficio=$_POST['toficio'];
        $bruto=$_POST['bruto'];
        $impuesto=$_POST['impuesto'];
        $neto=$_POST['neto'];
        $cantidad=$_POST['cantidad'];
        
        $mespago=$_POST['mespago'];
        $ftrab1=$_POST['ftrab1'];
        $ftrab2=$_POST['ftrab2'];
        
        $ofiremi=$_POST['ofiremi'];
        $nombredest=$_POST['nombredest'];
        $cargodest=$_POST['cargodest'];
        $ubicaciondest=$_POST['ubicaciondest'];
        $numante=$_POST['numante'];
        $numexp=$_POST['numexp'];
        $fante=$_POST['fante'];
        $firma=$_POST['firma'];
        $cargo=$_POST['cargo'];
        
        $consulta="SELECT A.ID_Est, A.Ano_Reg, A.ApPaterno_Est, A.ApMaterno_Est, A.Nombre_Est, A.RFC, B.Nombre_Asesor, B.Nombre_Asesor, B.acreedor, B.ccosto, B.pfinanciera, B.ppresupuestario, B.cmayor, B.division, B.eps, B.F_Convenio, B.fondo, B.CcGen FROM datospersonales A, datosarea B WHERE A.ID_Est=$idalumno and B.ID_Estudiante3=$idalumno and A.Ano_Reg=$anoreg and B.Ano_Reg= $anoreg" ;
                    $resid=$conexion->query($consulta);
                    $row=mysqli_fetch_array($resid);


        $date1=explode("-", $felaboracion);    
        $date2=explode("-", $mespago);        
        $date3=explode("-", $ftrab1);  
        $date4=explode("-", $ftrab2);
        $date5=explode("-", $row['F_Convenio']);
        $date6=explode("-", $fante);

        $meses = array('01'=>'Enero', '02'=>'Febrero', '03'=>'Marzo', '04'=>'Abril', '05'=>'Mayo', '06'=>'Junio', '07'=>'Julio',
                   '08'=>'Agosto', '09'=>'Septiembre', '10'=>'Octubre', '11'=>'Noviembre', '12'=>'Diciembre'); 
        $fecha1="Ciudad de M&eacutexico, a ".$date1[2]." de ".$meses[$date1[1]]." de ".$date1[0];     
        $fecha2=$meses[$date2[1]]." / ".$date2[0];              
        $fecha3="".$date3[2]; 
        $fecha4="".$date4[2]." de ".$meses[$date4[1]]." de ".$date4[0];
        $fecha5="".$date5[2]." de ".$meses[$date5[1]]." de ".$date5[0];  
        //$fecha6="Ciudad de M&eacutexico, a ".isset($date6[2])." de ".isset($meses[$date6[1]])." de ". isset($date6[0]); 
        $fecha6="Ciudad de M&eacutexico, a ".$date6[2]." de ".$meses[$date6[1]]." de ". $date6[0]; 
        $fecha7="".$date3[2]."/".$date3[1]."/".$date3[0];
        $fecha8="".$date4[2]."/".$date4[1]."/".$date4[0];   
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

    <body style="margin-left:20px; margin-top:40px; margin-bottom: 50px ">
        <font  face="Arial Narrow", Arial, sans-serif; size="3">

        <p align="right"> <font size="2" face="narrow"></font></p> 
        <table width="800" border=0>
        <tr>
            
        <td align="left" colspan="2" width="650"><b>Dirreci&oacuten Coorporativa de Administraci&oacuten y Servicios <br>        
Subdirecci&oacuten de Recursos Humanos <br>
Gerencia Operativa de Capital Humano <br>
Subgerencia Regional de Desarrollo Humano Altiplano <br>
Coordinaci&oacuten de Profesionistas en Entrenamiento</b></td>

        <td width=></td>
        </tr>
        <tr>
            <td colspan="3">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="3">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="3" align="right"><?php echo $fecha1?></td>
        </tr>
                <tr>
            <td colspan="3">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td><td align="right"><b>PE:</b> <b><?php  echo $idalumno.'/'.$anoreg?></td></b>
        </tr>
        <tr><td colspan="3"></td></tr>
        <tr>
            <td colspan="2">&nbsp;</td><td align="right"><b>Recibo No.</b> <b><?php echo $numrecibo?></td></b>
        </tr>
        <tr><td colspan="3"></td></tr>
        <tr><td colspan="3"></td></tr>
        <tr><td colspan="3"></td></tr>
             <tr>
            <td>&nbsp;</td><td align="right" ><u>Bruto:</u> </td><td align="right"> <b><?php echo $bruto ?></td></b>
        </tr>
        <tr><td colspan="3"></td></tr>
        <tr><td colspan="3"></td></tr>
        <tr><td colspan="3"></td></tr>
             <tr>
            <td>&nbsp;</td><td align="right"><u>Impuesto:</u> </td><td align="right"> <b><?php echo $impuesto?></td></b>
        </tr>

        <tr><td colspan="3"></td></tr>
        <tr><td colspan="3"></td></tr>
        <tr><td colspan="3"></td></tr>
             <tr>
            <td >&nbsp;</td><td align="right"><u>Neto: </u></td><td align="right"> <b><?php echo $neto ?></td></b>
        </tr>

        <tr><td colspan="3"></td></tr>
        <tr><td colspan="3"></td></tr>
        <tr><td colspan="3"></td></tr>
             <tr>
            <td >&nbsp;</td><td align="right"><u>N&uacutemero de Acreedor:</u> </td><td align="right"> <b><?php echo $row['acreedor'] ?></td></b>
        </tr>

        <tr><td colspan="3"></td></tr>
        <tr><td colspan="3"></td></tr>
        <tr><td colspan="3"></td></tr>
        <tr>
            <td>&nbsp;</td><td align="right"><u>Mes de Pago:</u> </td><td align="right"> <b><?php echo $fecha2?></td></b>
        </tr>
        <tr><td colspan="3">&nbsp;</td></tr>
        <tr><td colspan="3">&nbsp;</td></tr>
        <tr>
            <td  colspan ="3" align="justify">RECIB&iacute de Petr&oacuteleos Mexicanos la cantidad de <b><?php echo $neto.' '.$cantidad ?></b> por concepto de ayuda econ&oacutemica como apoyo para desarrollar las actividades necesarias durante el per&iacuteodo del <b><?php echo $fecha3.' al '.$fecha4 ?></b>, a favor de <b>C.</b> <b><?php echo utf8_decode($row['Nombre_Est']).' '.utf8_decode($row['ApPaterno_Est']).' '.utf8_decode($row['ApMaterno_Est'])?></b>, con clave del Registro Federal de Contribuyentes <b><?php $row['RFC'] ?></b>, de conformidad con lo establecido en la cl&aacuteusula quinta del Convenio de Entrenamiento, de fecha <b><?php echo $fecha5?></b></td>
        </tr>
        <tr>
            <td  colspan ="3" align="justify">La erogaci&oacuten que se efect&uacutee por este concepto afectar&aacute el siguiente trinomio presupuestal: <b>
            	<?php 
            	if (isset($row['CcGen'])){
            	echo 'Centro Gestor: '. $row['CcGen'].', ';
        		}
        		if (isset($row['ccosto'])){
        		echo 'Centro de Costo: '.$row['ccosto'].', ';
        		}
        		if (isset($row['pfinanciera'])){
        		echo 'Posici&oacuten Financiera: '.$row['pfinanciera'].', ';
        		}
        		if (isset($row['ppresupuestario'])){
        		echo 'Programa Presupuestario: '.$row['ppresupuestario'].', ';
        		}
        		if (isset($row['fondo'])){
        		echo 'Fondo: '.$row['fondo'].', ';
        		}
        		if (isset($row['cmayor'])){
        		echo 'Cuenta Mayor y Area Funcional: '.$row['cmayor'].', ';
        		}
        		if (isset($row['division'])){
        		echo 'Division: '.$row['division'].', ';
        		}
        		if (isset($row['eps'])){
        		echo 'EPS: '.$row['eps']; } ?>
        		.</td></b>
        </tr>
    </table>
 <table width="800" border =0>
        <tr><td colspan="4">&nbsp;</td></tr> 
        <tr><td colspan="4">&nbsp;</td></tr> 
        <tr><td colspan="4">&nbsp;</td></tr> 
        <tr><td colspan="4">&nbsp;</td></tr>
        <tr>
        <td align = center width="300"><b>AUTORIZA</b></td>
        <td width="10"></td>
        <td align = center width="300"><b>RECIB&Iacute</b></td>
        <td align = center width="5"></td>
        </tr>
        <tr><td colspan="4">&nbsp;</td></tr> 
        <tr><td colspan="4">&nbsp;</td></tr>
        <tr><td colspan="4">&nbsp;</td></tr> 
        <tr><td colspan="4">&nbsp;</td></tr> 
        <tr>
        <td align =center width="350"><b><?php echo utf8_decode($row['Nombre_Asesor'])?><br>ASESOR T&EacuteCNICO</b></td>
        <td align = center width="10"></td>
        <td align = center width="300"><b><?php echo "". utf8_decode($row['Nombre_Est']).' '.utf8_decode($row['ApPaterno_Est']).' '.utf8_decode($row['ApMaterno_Est'])?> <br>
        C. PROFESIONISTA EN ENTRENAMIENTO </b></td>
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
    <font  face="Arial Narrow", Arial, sans-serif; size="2">
        Cuenta con Registro de Cuenta Bancaria en el Sistema SAP-R3
    </font>
     <br><br><br><br><br><br><br>

    <img src="images/pemex.png"  width="200" height="60">

    
    <table width="800" border=0>
     <tr>
        <td width="500"></td><td>Oficio</td>

</tr>    
<tr>
        <td width="500"></td><td> <font face="Arial Narrow", Arial, sans-serif; size="2">Fecha &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; <?php echo $fecha1 ?></font></td></tr>
<tr>

<td>
    _________________________________________________________________    
</td>
<td>
    ________________________________________
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
<td style=vertical-align:top><font size=2>Numero:  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;   DCAS-SRH-GOCH-SRDHA-CPE- <?php echo $ofiremi ?><br><br>Numero de Expediente:
</font></td>
</tr>
<table width="800" border=0>
     <tr>
        <td width="500"></td><td></td>

</tr>    
<tr>
        <td width="500"></td><td> <font face="Arial Narrow", Arial, sans-serif; size="2"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; </font></td></tr>
<tr>

<td>
    _________________________________________________________________    
</td>
<td>
    ________________________________________
</td>
</tr>
</table>

<table width="800" border=0>
<tr>
    <td style=vertical-align:top width="70"> <font size=2>Destinatario</font></td>
<td align="left"  width="430"><b><?php echo utf8_decode($nombredest) ?>         
 <br> <b> <?php echo utf8_decode($cargodest) ?> </b>
<br> <b> <?php echo utf8_decode($ubicaciondest) ?> </b></td>



<td style=vertical-align:top><font size=1>Antecedentes:<br>  Numero(s): <?php echo $numante ?><br> Numero &uacute;nico de expediente:  <?php echo $numexp ?><br> Fecha(s):  <?php   echo $fecha6?>
</font></td>
</tr>
</table>
<table width="800" border=0>
     <tr>
        <td width="500"></td><td></td>

</tr>    
<tr>
        <td width="500"></td><td> <font face="Arial Narrow", Arial, sans-serif; size="2"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; </font></td></tr>
<tr>

<td>
    _________________________________________________________________    
</td>
<td>
    ________________________________________
</td>
</tr>
</table>

<table width="800" border=0>
<tr>
    <td style=vertical-align:top width="70"> <font size=2>Asunto:</font></td>

<td align="left"  width="430"><b>RECIBO DE PAGO PROFESIONISTA EN ENTRENAMIENTO </td>



<td width="30" style=vertical-align:top"><font size=1>Anexo </font></td><td> <?php if (true){?><font size=2> &#8999; <?php } else{?>&#9633;<?php }?></font>
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
            <br><br><br><br>

<div>Agradeceremos a usted, se sirva gestionar el pago por concepto de Ayuda Econ&oacutemica otorgada al Profesionista en Entrenamiento, contemplada en las Pol&iacuteticas y Procedimientos de Administraci&oacuten de Recursos Humanos y Relaciones Laborales en el numeral III.3. Reclutamiento y Selecci&oacuten, en el apartado III.3.1.4 Personas Candidatas en Formaci&oacuten inciso 383) Para la atenci&oacuten del Programa de Profesionistas en Entrenamiento, 386) El convenio de entrenamiento, comprender&acute una ayuda equivalente, correspondiente al mes de <?php echo $fecha2 ?><br><br> </div>
        </td>
    </tr>
</table>
<table width="800" border=1px solid black>
    <tr align="center">
        
        <td width="30%"><b> NOMBRE </b>
        </td>
        <td width="10%"><b>FOLIO</b>
        </td>
        <td width="10%"><b>RECIBO</b>
        </td>
        <td width="10%"><b>INICIO</b>
        </td>
        <td width="10%"><b>TERMINO</b>
        </td>
        <td width="16%"><b>IMPORTE NETO</b>
        </td>
        <td width="14%"><b>NUM. DE ACREEDOR</b>
        </td>
    </b>
    </tr>   
    <tr align="center">
        <td height="40">    
            <?php echo ucwords(str_replace('\'', '\' ', strtolower(utf8_decode($row['Nombre_Est'])))).' '.ucwords(str_replace('\'', '\' ', strtolower(utf8_decode($row['ApPaterno_Est'])))).' '.ucwords(str_replace('\'', '\' ', strtolower(utf8_decode($row['ApMaterno_Est'])))) ?>
        </td>



        <td>
            <?php echo 'PE: '.$idalumno.'/'.$anoreg ?>
        </td>
        <td>
            <?php echo $numrecibo?>
        </td>
        <td>
            <?php echo $fecha7?>
        </td>
        <td>
            <?php echo $fecha8?>
        </td>
        <td>
            <?php echo $neto?>
        </td>
        <td>
            <?php echo $row['acreedor'] ?>
        </td>
        </tr>
</table>
<table width="800" border=0>
    <tr><td><br><br><font size=2> Para tales efectos, se adjuntan el recibo de pago y la lista de asistencia. <br><br>Sin otro particular, reciba un cordial saludo.
<br><br>
<b>A t e n t a m e n t e , 
<br><br><br><br><br><br> <br><br>
<?php echo $firma ?>
<br>
<?php echo $cargo ?>
<br><br><br>
</b>
<br><br>
<font size=1> Elabor&oacute;: CMRM/<b>DMOB</b>
 <br>   
<font size=1>Ext.- 377-66


    </b></td></tr>


</body>
</html>

<?php

        $consulta3="SELECT * FROM oficioguardado WHERE idalumno='$idalumno' AND anoregistro='$anoreg' AND toficio='$toficio'";
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
                
                $query ="UPDATE oficioguardado SET toficio='$toficio', idalumno='$idalumno', anoregistro='$anoreg', felaboracion='$felaboracion', numrecibo='$numrecibo', ofiremi='$ofiremi', nombredest='$nombredest', cargodest='$cargodest', ubicaciondest='$ubicaciondest', numante='$numante', numexp='$numexp', fante='$fante', bruto='$bruto', impuesto='$impuesto', neto='$neto', cantidad='$cantidad', mespago='$mespago', ftrab1='$ftrab1', ftrab2='$ftrab2', firmaofi='$firma', cargo='$cargo' WHERE idalumno='$idalumno' AND anoregistro='$anoreg' AND toficio='$toficio'";

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
                numrecibo, 
                ofiremi, 
                nombredest,
                cargodest, 
                ubicaciondest,
                numante, 
                numexp, 
                fante, 
                bruto, 
                impuesto, 
                neto, 
                cantidad, 
                 mespago, 
                 ftrab1, 
                 ftrab2, 
                 firmaofi, 
                 cargo) values 
                 
                 ('$toficio', 
                '$idalumno', 
                '$anoreg', 
                '$felaboracion', 
                '$numrecibo', 
                '$ofiremi', 
                '$nombredest', 
                '$cargodest', 
                '$ubicaciondest', 
                '$numante', 
                '$numexp', 
                '$fante', 
                '$bruto', 
                '$impuesto', 
                '$neto', 
                '$cantidad', 
                '$mespago', 
                '$ftrab1', 
                '$ftrab2', 
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