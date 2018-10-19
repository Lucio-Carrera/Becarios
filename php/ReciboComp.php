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


        $consulta="SELECT A.ID_Est, A.Ano_Reg, A.ApPaterno_Est, A.ApMaterno_Est, A.Nombre_Est, A.RFC, B.Nombre_Asesor, B.acreedor, B.ccosto, B.pfinanciera, B.ppresupuestario, B.cmayor, B.division, B.eps, B.CcGen, B.fondo FROM datospersonales A, datosarea B WHERE A.ID_Est=$idalumno and B.ID_Estudiante3=$idalumno and A.Ano_Reg=$anoreg";
                    $resid=$conexion->query($consulta);
                    $row=mysqli_fetch_array($resid);

        $date1=explode("-", $row2['felaboracion']);    
        $date2=explode("-", $row2['mespago']);        
        $date3=explode("-", $row2['ftrab1']);  
        $date4=explode("-", $row2['ftrab2']);
        $date5=explode("-", $row2['felacon']);
        $date6=explode("-", $row2['fante']);

        $meses = array('01'=>'Enero', '02'=>'Febrero', '03'=>'Marzo', '04'=>'Abril', '05'=>'Mayo', '06'=>'Junio', '07'=>'Julio',
                   '08'=>'Agosto', '09'=>'Septiembre', '10'=>'Octubre', '11'=>'Noviembre', '12'=>'Diciembre'); 
        $fecha1="Ciudad de M&eacutexico, a ".$date1[2]." de ".$meses[$date1[1]]." de ".$date1[0];     
        $fecha2=$meses[$date2[1]]." / ".$date2[0];              
        $fecha3="".$date3[2]; 
        $fecha4="".$date4[2]." de ".$meses[$date4[1]]." de ".$date4[0];
        $fecha5="".$date5[2]." de ".$meses[$date5[1]]." de ".$date5[0]; 
        $fecha6="Ciudad de M&eacutexico, a ".$date6[2]." de ".$meses[$date6[1]]." de ".$date6[0];      
        $fecha7="".$date3[2]."/".$date3[1]."/".$date3[0];
        $fecha8="".$date4[2]."/".$date4[1]."/".$date4[0];


?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="Content-type" content="text/html; charset=UTF-8">
<script type="text/javascript">
    window.onload = function() { window.print }
</script>
 <style>
table, th, td {
    
}

</style>
</head>
    <img src="images/pemex.png"  width="200" height="45">

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
            <td  colspan ="3" align="justify">La erogaci&oacuten que se efect&uacutee por este concepto afectar&aacute el siguiente trinomio presupuestal: Centro Gestor:  <b><?php echo $row['CcGen'].', Centro de Costo: '.$row['ccosto'].', Posici&oacuten Financiera: '.$row['pfinanciera'].', Programa Presupuestario: '.$row['ppresupuestario'].', Fondo: '.$row['fondo'].', Cuenta Mayor: '.$row['cmayor'].', Division: ' .$row['division'].', EPS: ' .$row['eps'] ?></td></b>
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

    <img src="images/pemex.png"  width="200" height="45">

    
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



<td style=vertical-align:top><font size=1>Antecedentes:<br>  Numero(s): <?php echo $row2['numante'] ?><br> Numero &uacute;nico de expediente:  <?php echo $row2['numexp'] ?><br> Fecha(s):  <?php echo  $fecha6 ?>
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
</style>
<table width="800" border=0>
    <tr>
        <td>
            <br><br><br><br>
Agradeceremos a usted, se sirva gestionar el pago por concepto de Ayuda Econ&oacutemica otorgada al Profesionista en Entrenamiento, contemplada en las Pol&iacuteticas y Procedimientos de Administraci&oacuten de Recursos Humanos y Relaciones Laborales en el numeral III.3. Reclutamiento y Selecci&oacuten, en el apartado III.3.1.4 Personas Candidatas en Formaci&oacuten inciso 383) Para la atenci&oacuten del Programa de Profesionistas en Entrenamiento, 386) El convenio de entrenamiento, comprender&acute una ayuda equivalente, correspondiente al mes de <?php echo $fecha2 ?>
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
        <td width="20%"><b>IMPORTE NETO</b>
        </td>
        <td width="10%"><b>NUM. DE ACREEDOR</b>
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
     /* 


   
        $pdf->MultiCell(80,4,''.$row2['firmaofi'], 0, 'J', false);
        $pdf->SetXY(15, 214);
        $pdf->MultiCell(80,4,''.$row2['cargo'], 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',8); //Arial, negrita, 12 puntos
        $pdf->SetXY(15, 240);


        $pdf->MultiCell(80,4,'Elaboró: CMRM / MMR', 0, 'J', false);
        $pdf->SetXY(15, 244);
        $pdf->MultiCell(80,4,'Ext.- 377-66', 0, 'J', false);
        $pdf->Output();
        }
        else 
        {
        $pdf = new FPDF();
        $pdf->AddPage('P', 'Letter'); //Vertical, Carta
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',9); //Arial, negrita, 12 puntos

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
        

      
        


        $consulta="SELECT A.ID_Est, A.Ano_Reg, A.ApPaterno_Est, A.ApMaterno_Est, A.Nombre_Est, A.RFC, B.Nombre_Asesor, B.Nombre_Asesor, B.acreedor, B.ccosto, B.pfinanciera, B.ppresupuestario, B.cmayor, B.division, B.eps, B.F_Convenio, B.Fondo FROM datospersonales A, datosarea B WHERE A.ID_Est=$idalumno and B.ID_Estudiante3=$idalumno and A.Ano_Reg=$anoreg";
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
        $fecha1="Ciudad de México, a ".$date1[2]." de ".$meses[$date1[1]]." de ".$date1[0];     
        $fecha2=$meses[$date2[1]]." / ".$date2[0];              
        $fecha3="".$date3[2]; 
        $fecha4="".$date4[2]." de ".$meses[$date4[1]]." de ".$date4[0];
        $fecha5="".$date5[2]." de ".$meses[$date5[1]]." de ".$date5[0];  
        $fecha6="Ciudad de México, a ".$date1[2]." de ".$meses[$date1[1]]." de ".$date1[0]; 
        $fecha7="".$date3[2]."/".$date3[1]."/".$date3[0];
        $fecha8="".$date4[2]."/".$date4[1]."/".$date4[0];   


        $pdf->Cell(30,25,'',0,0,'C',$pdf->Image('images/pemex.png', 15,10, 33));
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(15, 28);
        $pdf->MultiCell(217,4,'Dirreción Coorporativa de Administración y Servicios        
Subdirección de Recursos Humanos
Gerencia Operativa de Capital Humano
Subgerencia Regional de Desarrollo Humano Altiplano
Coordinación de Profesionistas en Entrenamiento', 0, 'J', false);
        
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',11); //Arial, negrita, 12 puntos
        $pdf->SetXY(126, 56);
        $pdf->MultiCell(70,4,''.$fecha1, 0, 'R', false);
        

        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',12); //Arial, negrita, 12 puntos        
        $pdf->SetXY(156, 66);
        $pdf->MultiCell(20,4,'PE:', 0, 'R', false);
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',12); //Arial, negrita, 12 puntos
        $pdf->SetXY(176, 66);
        $pdf->MultiCell(20,4,''.$idalumno.' / '.$anoreg, 0, 'R', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',12); //Arial, negrita, 12 puntos        
        $pdf->SetXY(151, 73);
        $pdf->MultiCell(25,4,'Recibo No.', 0, 'R', false);
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',12); //Arial, negrita, 12 puntos
        $pdf->SetXY(176, 73);
        $pdf->MultiCell(20,4,''.$numrecibo, 0, 'R', false);
        $pdf->AddFont('narrow','U','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','U',12); //Arial, negrita, 12 puntos
        $pdf->SetXY(128, 82);
        $pdf->MultiCell(30,4,'Bruto:', 0, 'R', false);
        $pdf->AddFont('narrowb','U','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','U',12); //Arial, negrita, 12 puntos
        $pdf->SetXY(166, 82);
        $pdf->MultiCell(30,4,''.$bruto, 0, 'R', false);
        $pdf->AddFont('narrow','U','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','U',12); //Arial, negrita, 12 puntos
        $pdf->SetXY(128, 90);
        $pdf->MultiCell(30,4,'Impuesto:', 0, 'R', false);
        $pdf->AddFont('narrowb','U','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','U',12); //Arial, negrita, 12 puntos
        $pdf->SetXY(166, 90);
        $pdf->MultiCell(30,4,''.$impuesto, 0, 'R', false);
        $pdf->AddFont('narrow','U','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','U',12); //Arial, negrita, 12 puntos
        $pdf->SetXY(128, 98);
        $pdf->MultiCell(30,4,'Neto:', 0, 'R', false);
        $pdf->AddFont('narrowb','U','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','U',12); //Arial, negrita, 12 puntos
        $pdf->SetXY(166, 98);
        $pdf->MultiCell(30,4,''.$neto, 0, 'R', false);
        $pdf->AddFont('narrow','U','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','U',12); //Arial, negrita, 12 puntos
        $pdf->SetXY(118, 106);
        $pdf->MultiCell(40,4,'Número de Acreedor:', 0, 'R', false);
        $pdf->AddFont('narrowb','U','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','U',12); //Arial, negrita, 12 puntos
        $pdf->SetXY(166, 106);
        $pdf->MultiCell(30,4,''.$row['acreedor'], 0, 'R', false);
        $pdf->AddFont('narrow','U','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','U',12); //Arial, negrita, 12 puntos
        $pdf->SetXY(128, 114);        
        $pdf->MultiCell(30,4,'Mes de Pago:', 0, 'R', false);
        $pdf->AddFont('narrowb','U','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','U',12); //Arial, negrita, 12 puntos
        $pdf->SetXY(151, 114);
        $pdf->MultiCell(45,4,''.$fecha2, 0, 'R', false);


        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',11); //Arial, negrita, 12 puntos        
        $pdf->SetXY(15, 130);
        $pdf->MultiCell(181,4,'RECIBÍ de Petróleos Mexicanos la cantidad de '.$neto.' '.$cantidad.' por concepto de ayuda económica como apoyo para desarrollar las actividades necesarias durante el período del '.$fecha3.' al '.$fecha4.', a favor de C. '.utf8_decode($row['Nombre_Est']).' '.utf8_decode($row['ApPaterno_Est']).' '.utf8_decode($row['ApMaterno_Est']).', con clave del Registro Federal de Contribuyentes '.utf8_decode($row['RFC']).', de conformidad con lo establecido en la cláusula quinta del Convenio de Entrenamiento, de fecha '.$fecha5.'.', 0, 'J', false);
        $pdf->SetXY(15, 155);
        $pdf->MultiCell(181,4,'La erogación que se efectúe por este concepto afectará el siguiente trinomio presupuestal:', 0, 'J', false);
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(15, 159);
        $pdf->MultiCell(181,4,'Centro de Costo: '.$row['ccosto'].', Posición Financiera: '.$row['pfinanciera'].', Programa Presupuestario: '.$row['ppresupuestario']. ', Fondo: '.$row['Fondo'].', Cuenta Mayor: '.$row['cmayor'].', Division: ' .$row['division'].', EPS: ' .$row['eps'], 0, 'J', false);
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(44, 185);
        $pdf->MultiCell(40,4,'AUTORIZA', 0, 'C', false);
        $pdf->SetXY(120, 185);
        $pdf->MultiCell(60,4,'RECIBÍ', 0, 'C', false);
        $pdf->SetXY(30, 212);
        $pdf->MultiCell(70,4,''.utf8_decode($row['Nombre_Asesor']), 0, 'C', false);
        $pdf->SetXY(30, 216);
        $pdf->MultiCell(70,4,'ASESOR TÉCNICO', 0, 'C', false);
        $pdf->SetXY(110, 212);
        $pdf->MultiCell(80,4,''.utf8_decode($row['Nombre_Est']).' '.utf8_decode($row['ApPaterno_Est']).' '.utf8_decode($row['ApMaterno_Est']), 0, 'C', false);
        $pdf->SetXY(110, 216);
        $pdf->MultiCell(80,4,'C. PROFESIONISTA EN ENTRENAMIENTO', 0, 'C', false);
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',8); //Arial, negrita, 12 puntos
        $pdf->SetXY(15, 250);
        $pdf->MultiCell(100,4,'Cuenta con Registro de Cuenta Bancaria en el Sistema SAP-R3', 0, 'J', false);

        $pdf->AddPage('P', 'Letter'); //Vertical, Carta
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',9); //Arial, negrita, 12 puntos

        $pdf->Line(10,28,206,28);
        $pdf->Cell(30,25,'',0,0,'C',$pdf->Image('images/pemex.png', 15,10, 33));
        $pdf->SetXY(15, 32);
        $pdf->MultiCell(15,4,'Remitente', 0, 'J', false);
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 32);
        $pdf->MultiCell(80,4,'Dirección Corporativa de Administración y Servicios
Subdirección de Recursos Humanos
Gerencia Operativa de Capital Humano
Subgerencia Regional de Desarrollo Humano Altiplano
Coordinación de Profesionistas en Entrenamiento', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(120, 14);
        $pdf->MultiCell(64,4,'Oficio', 0, 'J', false);
        $pdf->SetXY(120, 22);

      

        $pdf->MultiCell(64,4,'Fecha', 0, 'J', false);
        $pdf->SetXY(130, 22);
        $pdf->MultiCell(70,4,''.$fecha1, 0, 'R', false);
        $pdf->SetXY(120, 32);
        $pdf->MultiCell(15,4,'Número', 0, 'J', false);
        $pdf->SetXY(144, 32);

         $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',8);
        $pdf->MultiCell(64,4,'DCAS-SRH-GOCH-SRDHA-CPE-'.$ofiremi, 0, 'J', false);
        $pdf->SetXY(120, 40);
        $pdf->MultiCell(32,4,'Número de expediente', 0, 'J', false);
        $pdf->Line(10,54,206,54);
        $pdf->SetXY(15, 60);
        $pdf->MultiCell(20,4,'Destinatario', 0, 'J', false);
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 60);
        $pdf->MultiCell(80,4,''.utf8_decode($nombredest), 0, 'J', false);
        $pdf->SetXY(34, 64);
        $pdf->MultiCell(70,4,''.utf8_decode($cargodest), 0, '', false);
        $pdf->SetXY(34, 72);
        $pdf->MultiCell(80,4,''.utf8_decode($ubicaciondest), 0, 'J', false);
        $pdf->SetXY(34, 76);
        $pdf->MultiCell(80,4,'P r e s e n t e', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(120, 60);
        $pdf->MultiCell(64,4,'Antecedentes', 0, 'J', false);
        $pdf->SetXY(120, 64);
        $pdf->MultiCell(18,4,'Número(s):', 0, 'J', false);
        $pdf->SetXY(144, 64);
        $pdf->MultiCell(64,4,''.$numante, 0, 'J', false);
        $pdf->SetXY(120, 68);
        $pdf->MultiCell(44,4,'Número único de expediente:', 0, 'J', false);
        $pdf->SetXY(162, 68);
        $pdf->MultiCell(44,4,''.$numexp, 0, 'J', false);
        $pdf->SetXY(120, 72);
        $pdf->MultiCell(18,4,'Fecha(s):', 0, 'J', false);
        $pdf->SetXY(130, 72);
        $pdf->MultiCell(70,4,''.$fecha6, 0, 'R', false);
        $pdf->Line(10,82,206,82);
        $pdf->SetXY(15, 88);
        $pdf->MultiCell(15,4,'Asunto', 0, 'J', false);
        $pdf->SetXY(34, 88);
        $pdf->MultiCell(80,4,'RECIBO DE PAGO PROFESIONISTA EN ENTRENAMIENTO', 0, '', false);
        $pdf->SetXY(120, 88);
        $pdf->MultiCell(15,4,'Anexo', 0, 'J', false);
        $pdf->SetXY(140, 88);
        $pdf->MultiCell(4,4,'X', 1, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',11); //Arial, negrita, 12 puntos
        $pdf->SetXY(15, 108);
        $pdf->MultiCell(190,5,'Agradeceremos a usted, se sirva gestionar el pago por concepto de Ayuda Económica otorgada al Profesionista en Entrenamiento, contemplada en las Políticas y Procedimientos de Administración de Recursos Humanos y Relaciones Laborales en el numeral III.3. Reclutamiento y Selección, en el apartado III.3.1.4 Personas Candidatas en Formación inciso 383) Para la atención del Programa de Profesionistas en Entrenamiento, 386) El convenio de entrenamiento, comprenderá una ayuda equivalente, correspondiente al mes de '.$fecha2, 0, 'J', false);
        
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(15, 136);
        $pdf->MultiCell(65,12,'NOMBRE', 1, 'C', false);
        $pdf->SetXY(80, 136);
        $pdf->MultiCell(17,12,'FOLIO', 1, 'C', false);
        $pdf->SetXY(97, 136);
        $pdf->MultiCell(15,12,'RECIBO', 1, 'C', false);
        $pdf->SetXY(112, 136);
        $pdf->MultiCell(20,12,'INICIO', 1, 'C', false);
        $pdf->SetXY(132, 136);
        $pdf->MultiCell(20,12,'TERMINO', 1, 'C', false);
        $pdf->SetXY(152, 136);
        $pdf->MultiCell(24,12,'IMPORTE NETO', 1, 'C', false);
        $pdf->SetXY(176, 136);
        $pdf->MultiCell(26,6,'NUM. DE ACREEDOR', 1, 'C', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',9); //Arial, negrita, 12 puntos
        $pdf->SetXY(15, 148);
        $pdf->MultiCell(65,12,'', 1, 'C', false);
        $pdf->SetXY(17, 150);
        $pdf->MultiCell(65,4,''.utf8_decode($row['Nombre_Est']).' '.utf8_decode($row['ApPaterno_Est']).' '.utf8_decode($row['ApMaterno_Est']), 0, 'C', false);
        $pdf->SetXY(80, 148);
        $pdf->MultiCell(17,12,'PE:'.$idalumno.'/'.$anoreg, 1, 'R', false);
        $pdf->SetXY(97, 148);
        $pdf->MultiCell(15,12,''.$numrecibo, 1, 'C', false);
        $pdf->SetXY(112, 148);
        $pdf->MultiCell(20,12,''.$fecha7, 1, 'C', false);
        $pdf->SetXY(132, 148);
        $pdf->MultiCell(20,12,''.$fecha8, 1, 'C', false);
        $pdf->SetXY(152, 148);
        $pdf->MultiCell(24,12,''.$neto, 1, 'C', false);
        $pdf->SetXY(176, 148);
        $pdf->MultiCell(26,12,''.$row['acreedor'], 1, 'C', false);


        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(15, 168);
        $pdf->MultiCell(190,4,'Para tales efectos, se adjuntan el recibo de pago y la lista de asistencia.', 0, 'J', false);
        $pdf->SetXY(15, 176);
        $pdf->MultiCell(190,4,'Sin otro particular, reciba un cordial saludo.', 0, 'J', false);
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(15, 188);
        $pdf->MultiCell(190,4,'A t e n t a m e n t e ,', 0, 'J', false);
        $pdf->SetXY(15, 210);
        $pdf->MultiCell(80,4,''.$firma, 0, 'J', false);
        $pdf->SetXY(15, 214);
        $pdf->MultiCell(80,4,''.$cargo, 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',8); //Arial, negrita, 12 puntos
        $pdf->SetXY(15, 240);
        $pdf->MultiCell(80,4,'Elaboró: CMRM / MMR', 0, 'J', false);
        $pdf->SetXY(15, 244);
        $pdf->MultiCell(80,4,'Ext.- 377-66', 0, 'J', false); 
        
        $pdf->Output();

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
                
                $query ="UPDATE oficioguardado SET toficio='$toficio', idalumno='$idalumno', anoregistro='$anoreg', felaboracion='$felaboracion', numrecibo='$numrecibo', ofiremi='$ofiremi', nombredest='$nombredest', cargodest='$cargodest', ubicaciondest='$ubicaciondest', numante='$numante', numexp='$numexp', fante='$fante', bruto='$bruto', impuesto='$impuesto', neto='$neto', cantidad='$cantidad', acreedor='$acreedor', mespago='$mespago', ftrab1='$ftrab1', ftrab2='$ftrab2', ccosto='$ccosto', pfinanciera='$pfinanciera', ppresupuestario='$ppresupuestario', fondo='$fondo', cmayor='$cmayor', felacon='$felacon', firmaofi='$firma', cargo='$cargo', Division=$Div,Eps=$EPS WHERE idalumno='$idalumno' AND anoregistro='$anoreg' AND toficio='$toficio'";

                $resultado=mysqli_query($conexion, $query);
                if (!$resultado)
                {
                    echo "error en la consulta".mysqli_error($conexion);                
                }           
            }
            else
            {
                $query = "INSERT INTO OficioGuardado (toficio, idalumno, anoregistro, felaboracion, numrecibo, ofiremi, nombredest, cargodest, ubicaciondest, numante, numexp, fante, bruto, impuesto, neto, cantidad, acreedor, mespago, ftrab1, ftrab2, ccosto, pfinanciera, ppresupuestario, fondo, cmayor, felacon, firmaofi, cargo, division,eps) values ('$toficio', '$idalumno', '$anoreg', '$felaboracion', '$numrecibo', '$ofiremi', '$nombredest', '$cargodest', '$ubicaciondest', '$numante', '$numexp', '$fante', '$bruto', '$impuesto', '$neto', '$cantidad', '$acreedor', '$mespago', '$ftrab1', '$ftrab2', '$ccosto', '$pfinanciera', '$ppresupuestario', '$fondo', '$cmayor', '$felacon', '$firma', '$cargo','$division','$eps')";

                $resultado=mysqli_query($conexion, $query);
                if (!$resultado)
                {
                    echo mysqli_error($conexion);                
                }
            }
        }
*/    }
?>
