<?php
    include_once('fpdf.php');
    require("../conexion.php");
        
        $pdf = new FPDF();
        $pdf->AddPage('P', 'Letter'); //Vertical, Carta
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',9); //Arial, negrita, 12 puntos

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

        
        $consulta="SELECT A.ID_Est, A.Ano_Reg, A.ApPaterno_Est, A.ApMaterno_Est, A.Nombre_Est, A.RFC, B.Nombre_Asesor, B.FuncionarioNombre, B.FuncionarioCargo FROM datospersonales A, datosarea B WHERE A.ID_Est=$idalumno and B.ID_Estudiante3=$idalumno and A.Ano_Reg=$anoreg";
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
        $fecha1="Ciudad de México, a ".$date1[2]." de ".$meses[$date1[1]]." de ".$date1[0];     
        $fecha2=$meses[$date2[1]]." / ".$date2[0];              
        $fecha3="".$date3[2]; 
        $fecha4="".$date4[2]." de ".$meses[$date4[1]]." de ".$date4[0];
        $fecha5="".$date5[2]." de ".$meses[$date5[1]]." de ".$date5[0]; 
        $fecha6="Ciudad de México, a ".$date6[2]." de ".$meses[$date6[1]]." de ".$date6[0];      
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
        $pdf->SetFont('narrow','',12); //Arial, negrita, 12 puntos
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
        $pdf->MultiCell(20,4,''.$row2['numrecibo'], 0, 'R', false);
        $pdf->AddFont('narrow','U','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','U',12); //Arial, negrita, 12 puntos
        $pdf->SetXY(138, 82);
        $pdf->MultiCell(30,4,'Bruto:', 0, 'R', false);
        $pdf->AddFont('narrowb','U','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','U',12); //Arial, negrita, 12 puntos
        $pdf->SetXY(166, 82);
        $pdf->MultiCell(30,4,''.$row2['bruto'], 0, 'R', false);
        $pdf->AddFont('narrow','U','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','U',12); //Arial, negrita, 12 puntos
        $pdf->SetXY(138, 90);
        $pdf->MultiCell(30,4,'Impuesto:', 0, 'R', false);
        $pdf->AddFont('narrowb','U','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','U',12); //Arial, negrita, 12 puntos
        $pdf->SetXY(166, 90);
        $pdf->MultiCell(30,4,''.$row2['impuesto'], 0, 'R', false);
        $pdf->AddFont('narrow','U','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','U',12); //Arial, negrita, 12 puntos
        $pdf->SetXY(138, 98);
        $pdf->MultiCell(30,4,'Neto:', 0, 'R', false);
        $pdf->AddFont('narrowb','U','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','U',12); //Arial, negrita, 12 puntos
        $pdf->SetXY(166, 98);
        $pdf->MultiCell(30,4,''.$row2['neto'], 0, 'R', false);
        $pdf->AddFont('narrow','U','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','U',12); //Arial, negrita, 12 puntos
        $pdf->SetXY(128, 106);
        $pdf->MultiCell(40,4,'Número de Acreedor:', 0, 'R', false);
        $pdf->AddFont('narrowb','U','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','U',12); //Arial, negrita, 12 puntos
        $pdf->SetXY(166, 106);
        $pdf->MultiCell(30,4,''.$row2['acreedor'], 0, 'R', false);
        $pdf->AddFont('narrow','U','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','U',12); //Arial, negrita, 12 puntos
        $pdf->SetXY(138, 114);        
        $pdf->MultiCell(30,4,'Mes de Pago:', 0, 'R', false);
        $pdf->AddFont('narrowb','U','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','U',12); //Arial, negrita, 12 puntos
        $pdf->SetXY(166, 114);
        $pdf->MultiCell(30,4,''.$fecha2, 0, 'R', false);


        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',11); //Arial, negrita, 12 puntos        
        $pdf->SetXY(15, 130);
        $pdf->MultiCell(181,4,'RECIBÍ de Petróleos Mexicanos la cantidad de '.$row2['neto'].' '.$row2['cantidad'].' por concepto de ayuda económica como apoyo para desarrollar las actividades necesarias durante el período del '.$fecha3.' al '.$fecha4.', a favor de C. '.utf8_decode($row['Nombre_Est']).' '.utf8_decode($row['ApPaterno_Est']).' '.utf8_decode($row['ApMaterno_Est']).', con clave del Registro Federal de Contribuyentes '.$row['RFC'].', de conformidad con lo establecido en la cláusula quinta del Convenio de Entrenamiento, de fecha '.$fecha5.'.', 0, 'J', false);
        $pdf->SetXY(15, 150);
        $pdf->MultiCell(181,4,'La erogación que se efectúe por este concepto afectará el siguiente trinomio presupuestal:', 0, 'J', false);
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(15, 154);
        $pdf->MultiCell(181,4,'Centro de Costo '.$row2['ccosto'].', Posición Financiera '.$row2['pfinanciera'].', Programa Presupuestario '.$row2['ppresupuestario'].', Fondo '.$row2['fondo'].', Cuenta Mayor '.$row2['cmayor'].', Division ' .$row2['division'].', EPS ' .$row2['eps'], 0, 'J', false);
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 167);
        $pdf->MultiCell(42,4,'AUTORIZA', 0, 'C', false);
        $pdf->SetXY(120, 167);
        $pdf->MultiCell(60,4,'RECIBÍ', 0, 'C', false);
        $pdf->SetXY(20, 192);
        $pdf->MultiCell(70,4,''.utf8_decode($row['Nombre_Asesor']), 0, 'C', false);
        $pdf->SetXY(15, 197);
        $pdf->MultiCell(80,4,'ASESOR TÉCNICO', 0, 'C', false);
        $pdf->SetXY(110, 192);
        $pdf->MultiCell(80,4,''.utf8_decode($row['Nombre_Est']).' '.utf8_decode($row['ApPaterno_Est']).' '.utf8_decode($row['ApMaterno_Est']), 0, 'C', false);
        $pdf->SetXY(110, 197);
        $pdf->MultiCell(80,4,'C. PROFESIONISTA EN ENTRENAMIENTO', 0, 'C', false);
        $pdf->SetXY(70, 216);
        $pdf->MultiCell(60,4,'AUTORIZA', 0, 'C', false);
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',12); //Arial, negrita, 12 puntos
        $pdf->SetXY(60, 240);
        $pdf->MultiCell(80,4,utf8_decode($row['FuncionarioNombre']), 0, 'C', false);
        $pdf->SetXY(60, 245);
        $pdf->MultiCell(80,4,utf8_decode($row['FuncionarioCargo']), 0, 'C', false);





        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',8); //Arial, negrita, 12 puntos
        $pdf->SetXY(15, 255);
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
        $pdf->MultiCell(64,4,'DCAS-SRH-GOCH-SRDHA-CPE-'.$row2['ofiremi'], 0, 'J', false);
        $pdf->SetXY(120, 40);
        $pdf->MultiCell(32,4,'Número de expediente', 0, 'J', false);
        $pdf->Line(10,54,206,54);
        $pdf->SetXY(15, 60);
        $pdf->MultiCell(20,4,'Destinatario', 0, 'J', false);
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 60);
        $pdf->MultiCell(80,4,''.utf8_decode($row2['nombredest']), 0, 'J', false);
        $pdf->SetXY(34, 64);
        $pdf->MultiCell(70,4,''.utf8_decode($row2['cargodest']), 0, '', false);
        $pdf->SetXY(34, 72);
        $pdf->MultiCell(80,4,''.utf8_decode($row2['ubicaciondest']), 0, 'J', false);
        $pdf->SetXY(34, 76);
        $pdf->MultiCell(80,4,'P r e s e n t e', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(120, 60);
        $pdf->MultiCell(64,4,'Antecedentes', 0, 'J', false);
        $pdf->SetXY(120, 64);
        $pdf->MultiCell(18,4,'Número(s):', 0, 'J', false);
        $pdf->SetXY(144, 64);
        $pdf->MultiCell(64,4,''.$row2['numante'], 0, 'J', false);
        $pdf->SetXY(120, 68);
        $pdf->MultiCell(44,4,'Número único de expediente:', 0, 'J', false);
        $pdf->SetXY(162, 68);
        $pdf->MultiCell(44,4,''.$row2['numexp'], 0, 'J', false);
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

        $pdf->SetXY(15, 152);
        $pdf->MultiCell(70,4,''.utf8_decode($row['Nombre_Est']).' '.utf8_decode($row['ApPaterno_Est']).' '.utf8_decode($row['ApMaterno_Est']), 0, 'C', false);
        $pdf->SetXY(80, 148);
        $pdf->MultiCell(17,12,'PE:'.$row2['idalumno'].'/'.$row2['anoregistro'], 1, 'R', false);
        $pdf->SetXY(97, 148);
        $pdf->MultiCell(15,12,''.$row2['numrecibo'], 1, 'C', false);
        $pdf->SetXY(112, 148);
        $pdf->MultiCell(20,12,''.$fecha7, 1, 'C', false);
        $pdf->SetXY(132, 148);
        $pdf->MultiCell(20,12,''.$fecha8, 1, 'C', false);
        $pdf->SetXY(152, 148);
        $pdf->MultiCell(24,12,''.$row2['neto'], 1, 'C', false);
        $pdf->SetXY(176, 148);
        $pdf->MultiCell(26,12,''.$row2['acreedor'], 1, 'C', false);


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
        $acreedor=$_POST['acreedor'];
        $mespago=$_POST['mespago'];
        $ftrab1=$_POST['ftrab1'];
        $ftrab2=$_POST['ftrab2'];
        $ccosto=$_POST['ccosto'];
        $pfinanciera=$_POST['pfinanciera'];
        $ppresupuestario=$_POST['ppresupuestario'];
        $fondo=$_POST['fondo'];
        $cmayor=$_POST['cmayor'];
        $division=$_POST['division'];
        $felacon=$_POST['felacon'];
        $ofiremi=$_POST['ofiremi'];
        $nombredest=$_POST['nombredest'];
        $cargodest=$_POST['cargodest'];
        $ubicaciondest=$_POST['ubicaciondest'];
        $numante=$_POST['numante'];
        $numexp=$_POST['numexp'];
        $fante=$_POST['fante'];
        $firma=$_POST['firma'];
        $cargo=$_POST['cargo'];
        $eps=$_POST['eps'];
        
      
        


        $consulta="SELECT A.ID_Est, A.Ano_Reg, A.ApPaterno_Est, A.ApMaterno_Est, A.Nombre_Est, A.RFC, B.Nombre_Asesor, B.FuncionarioNombre, B.FuncionarioCargo FROM datospersonales A, datosarea B WHERE A.ID_Est=$idalumno and B.ID_Estudiante3=$idalumno and A.Ano_Reg=$anoreg";
                    $resid=$conexion->query($consulta);
                    $row=mysqli_fetch_array($resid);

        $date1=explode("-", $felaboracion);    
        $date2=explode("-", $mespago);        
        $date3=explode("-", $ftrab1);  
        $date4=explode("-", $ftrab2);
        $date5=explode("-", $felacon);
        $date6=explode("-", $fante);

        $meses = array('01'=>'Enero', '02'=>'Febrero', '03'=>'Marzo', '04'=>'Abril', '05'=>'Mayo', '06'=>'Junio', '07'=>'Julio',
                   '08'=>'Agosto', '09'=>'Septiembre', '10'=>'Octubre', '11'=>'Noviembre', '12'=>'Diciembre'); 
        $fecha1="Ciudad de México, a ".$date1[2]." de ".$meses[$date1[1]]." de ".$date1[0];     
        $fecha2=$meses[$date2[1]]." / ".$date2[0];              
        $fecha3="".$date3[2]; 
        $fecha4="".$date4[2]." de ".$meses[$date4[1]]." de ".$date4[0];
        $fecha5="".$date5[2]." de ".$meses[$date5[1]]." de ".$date5[0];  
        $fecha6="Ciudad de México, a ".$date6[2]." de ".$meses[$date6[1]]." de ".$date6[0]; 
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
        $pdf->SetFont('narrow','',12); //Arial, negrita, 12 puntos
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
        $pdf->SetXY(138, 82);
        $pdf->MultiCell(30,4,'Bruto:', 0, 'R', false);
        $pdf->AddFont('narrowb','U','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','U',12); //Arial, negrita, 12 puntos
        $pdf->SetXY(166, 82);
        $pdf->MultiCell(30,4,''.$bruto, 0, 'R', false);
        $pdf->AddFont('narrow','U','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','U',12); //Arial, negrita, 12 puntos
        $pdf->SetXY(138, 90);
        $pdf->MultiCell(30,4,'Impuesto:', 0, 'R', false);
        $pdf->AddFont('narrowb','U','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','U',12); //Arial, negrita, 12 puntos
        $pdf->SetXY(166, 90);
        $pdf->MultiCell(30,4,''.$impuesto, 0, 'R', false);
        $pdf->AddFont('narrow','U','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','U',12); //Arial, negrita, 12 puntos
        $pdf->SetXY(138, 98);
        $pdf->MultiCell(30,4,'Neto:', 0, 'R', false);
        $pdf->AddFont('narrowb','U','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','U',12); //Arial, negrita, 12 puntos
        $pdf->SetXY(166, 98);
        $pdf->MultiCell(30,4,''.$neto, 0, 'R', false);
        $pdf->AddFont('narrow','U','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','U',12); //Arial, negrita, 12 puntos
        $pdf->SetXY(128, 106);
        $pdf->MultiCell(40,4,'Número de Acreedor:', 0, 'R', false);
        $pdf->AddFont('narrowb','U','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','U',12); //Arial, negrita, 12 puntos
        $pdf->SetXY(166, 106);
        $pdf->MultiCell(30,4,''.$acreedor, 0, 'R', false);
        $pdf->AddFont('narrow','U','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','U',12); //Arial, negrita, 12 puntos
        $pdf->SetXY(138, 114);        
        $pdf->MultiCell(30,4,'Mes de Pago:', 0, 'R', false);
        $pdf->AddFont('narrowb','U','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','U',12); //Arial, negrita, 12 puntos
        $pdf->SetXY(166, 114);
        $pdf->MultiCell(30,4,''.$fecha2, 0, 'R', false);


        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',11); //Arial, negrita, 12 puntos        
        $pdf->SetXY(15, 130);
        $pdf->MultiCell(181,4,'RECIBÍ de Petróleos Mexicanos la cantidad de '.$neto.' '.$cantidad.' por concepto de ayuda económica como apoyo para desarrollar las actividades necesarias durante el período del '.$fecha3.' al '.$fecha4.', a favor de C. '.utf8_decode($row['Nombre_Est']).' '.utf8_decode($row['ApPaterno_Est']).' '.utf8_decode($row['ApMaterno_Est']).', con clave del Registro Federal de Contribuyentes '.utf8_decode($row['RFC']).', de conformidad con lo establecido en la cláusula quinta del Convenio de Entrenamiento, de fecha '.$fecha5.'.', 0, 'J', false);
        $pdf->SetXY(15, 150);
        $pdf->MultiCell(181,4,'La erogación que se efectúe por este concepto afectará el siguiente trinomio presupuestal:', 0, 'J', false);
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(15, 154);
        $pdf->MultiCell(181,4,'Centro de Costo '.$ccosto.', Posición Financiera '.$pfinanciera.', Programa Presupuestario '.$ppresupuestario.', Fondo '.$fondo.', Cuenta Mayor '.$cmayor.', Division ' .$division.', EPS ' .$eps, 0, 'J', false);
        $pdf->AddFont('narrowb','','narrowb.php');
        $pdf->SetFont('narrowb','',10);

        $pdf->SetXY(34, 167);
        $pdf->MultiCell(42,4,'AUTORIZA', 0, 'C', false);
        $pdf->SetXY(120, 167);
        $pdf->MultiCell(60,4,'RECIBÍ', 0, 'C', false);
        $pdf->SetXY(20, 192);
        $pdf->MultiCell(70,4,''.utf8_decode($row['Nombre_Asesor']), 0, 'C', false);
        $pdf->SetXY(15, 197);
        $pdf->MultiCell(80,4,'ASESOR TÉCNICO', 0, 'C', false);
        $pdf->SetXY(110, 192);
        $pdf->MultiCell(80,4,''.utf8_decode($row['Nombre_Est']).' '.utf8_decode($row['ApPaterno_Est']).' '.utf8_decode($row['ApMaterno_Est']), 0, 'C', false);
        $pdf->SetXY(110, 197);
        $pdf->MultiCell(80,4,'C. PROFESIONISTA EN ENTRENAMIENTO', 0, 'C', false);

        $pdf->SetXY(70, 216);
        $pdf->MultiCell(60,4,'AUTORIZA', 0, 'C', false);
          $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',12); //Arial, negrita, 12 puntos
        $pdf->SetXY(60, 240);
        $pdf->MultiCell(80,4,utf8_decode($row['FuncionarioNombre']), 0, 'C', false);
        $pdf->SetXY(60, 245);
        $pdf->MultiCell(80,4,utf8_decode($row['FuncionarioCargo']), 0, 'C', false);


        
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',8); //Arial, negrita, 12 puntos
        $pdf->SetXY(15, 255);
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
        $pdf->SetXY(15, 148);
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
        $pdf->MultiCell(26,12,''.$acreedor, 1, 'C', false);


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
    }
?>