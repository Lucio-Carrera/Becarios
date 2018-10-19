<?php
    include_once('fpdf2.php');
    require("../conexion.php");
        
        $pdf = new FPDF();
        $pdf->AddPage('P', 'Letter'); //Vertical, Carta
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',9);

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
        $consulta="SELECT A.ID_Est, A.Ano_Reg, A.ApPaterno_Est, A.ApMaterno_Est, A.Nombre_Est, B.ID_Ger3, B.ID_Sub3, B.ID_Dir3, B.Extension, B.F_Inicio, B.F_Final, B.Hr_Inicio, B.Hr_Final, B.Ubicacion FROM datospersonales A, datosarea B WHERE B.ID_Estudiante3= $idalumno and A.ID_Est=$idalumno and A.Ano_Reg = $anoreg";

        $resid=$conexion->query($consulta); 
        $row=mysqli_fetch_array($resid);

        $datenew1=explode("-", $row2['F_InicioA']);
        $datenew2=explode("-", $row2['F_Final']);
        $date1=explode("-", $row['F_Inicio']);    
        $date2=explode("-", $row['F_Final']); 
        $meses = array('01'=>'Enero', '02'=>'Febrero', '03'=>'Marzo', '04'=>'Abril', '05'=>'Mayo', '06'=>'Junio', '07'=>'Julio',
                   '08'=>'Agosto', '09'=>'Septiembre', '10'=>'Octubre', '11'=>'Noviembre', '12'=>'Diciembre'); 
        $fecha1=$date1[2]." de ".$meses[$date1[1]]." del ".$date1[0];                   
        $final=$date2[2]." de ".$meses[$date2[1]]." del ".$date2[0]; 

        $inicio=$datenew1[2]." de ".$meses[$datenew1[1]]." del ".$datenew1[0];          
        $fecha2=$datenew2[2]." de ".$meses[$datenew2[1]]." del ".$datenew2[0]; 
        
             
        
       //Arial, negrita, 12 puntos

        $pdf->Line(10,28,115,28);
        $pdf->Line(120,28,206,28);
        $pdf->Cell(30,25,'',0,0,'C',$pdf->Image('images/pemex.png', 15,10, 33));
        $pdf->SetXY(15, 32);
        $pdf->MultiCell(15,4,'Remitente', 0, 'J', false);
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(35, 32);
        $pdf->MultiCell(80,4,'Dirección Corporativa de Administración y Servicios
Subdirección de Recursos Humanos
Gerencia Operativa de Capital Humano
Subgerencia Regional de Desarrollo Humano Altiplano
Coordinación de Profesionistas en Entrenamiento', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(120, 14);
        $pdf->MultiCell(64,4,'Oficio', 0, 'J', false);
     

       $pdf->SetXY(116, 22);
        $fecha=" Fecha                  Ciudad de México, a ".$row2['dia']." de ". $row2['mes']. " de ".$row2['ano'];
        $pdf->MultiCell(85,7,$fecha); //Imprime la fecha
        $pdf->Ln(25);

        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',8);
        $pdf->SetXY(120, 32);
        $pdf->MultiCell(150,4,'Número                        DCAS-SRH-GOCH-SRDHA-CPE-'.$row2['ofisal'], 0, 'J', false);

        $pdf->SetXY(120, 40);
        $pdf->MultiCell(32,4,'Número expediente', 0, 'J', false);
        $pdf->Line(10,54,115,54);
        $pdf->Line(120,54,206,54);

        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10);
        $pdf->SetXY(9, 60);
        $pdf->MultiCell(100,4,'Ing. José Rogelio Ramírez García');

        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(35, 55);
        $pdf->Cell(0,22,'Superintendente de Vigilancia y Control de Accesos');

         $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(35, 59);
        $pdf->Cell(0,22,'Edificio "C" Planta Baja');

        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(15, 60);
        $pdf->MultiCell(20,4,'Destinatario', 0, 'J', false);
        
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(35, 76);
        $pdf->MultiCell(80,4,'P r e s e n t e', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(120, 60);
        $pdf->MultiCell(64,4,'Antecedentes', 0, 'J', false);
        $pdf->SetXY(120, 64);

        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',8); //Arial, negrita, 12 puntos
        $pdf->MultiCell(18,4,'Número(s):', 0, 'J', false);
        $pdf->SetXY(144, 64);
        $pdf->MultiCell(64,4,''.$row2['ORemi'], 0, 'J', false);
        $pdf->SetXY(120, 68);
        $pdf->MultiCell(44,4,'Número único de expediente:', 0, 'J', false);
        $pdf->SetXY(162, 68);
        $pdf->MultiCell(44,4,''/*.$numexp*/, 0, 'J', false);
        $pdf->SetXY(120, 72);
        $pdf->MultiCell(18,4,'Fecha(s):', 0, 'J', false);
        $pdf->SetXY(130, 72);
        $pdf->MultiCell(70,4,''/*.$fecha6*/, 0, 'R', false);
        $pdf->Line(10,82,115,82);
        $pdf->Line(120,82,206,82);
        $pdf->SetXY(15, 88);
        $pdf->MultiCell(15,4,'Asunto', 0, 'J', false);

          $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',9);
        $pdf->SetXY(34, 88);
        $pdf->MultiCell(80,4,'SOLICITUD AMPLIACION DE UBICACION PROFESIONISTA EN ENTRENAMIENTO C. '.utf8_decode($row['Nombre_Est']).' '.utf8_decode($row['ApPaterno_Est']).' '.utf8_decode($row['ApMaterno_Est']), 0, 'L', false);
      


        $pdf->SetXY(120, 88);
        $pdf->MultiCell(15,4,'Anexo', 0, 'J', false);
        $pdf->SetXY(140, 88);
        $pdf->MultiCell(5,4,'X', 1, 'C', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',11); //Arial, negrita, 12 puntos
        $pdf->SetXY(15, 102);
        $pdf->MultiCell(190,5,'Con relación a las Políticas y Procedimientos de Administración de Recursos Humanos y Relaciones Laborales en el numeral III.3. Reclutamiento y Selección, en el Apartado III.3.1.4 Personas Candidatas en Formación inciso 383). Para la Atención del Programa de Profesionstas en Entrenamiento, Agradeceré su Apoyo para que se Realicen las gestiones necesarias y se otorgue una Ampliacion de Ubicacion al Profesionista en Entrenamiento que se detalla a continuación, para concluir con las tareas del proyecto asignado. ', 0, 'J', false);


         $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(15, 130);
        $pdf->MultiCell(40,5,'Nombre:', 1, 'J', false);
        $pdf->SetXY(55, 130);
        $pdf->MultiCell(146,5,'' .utf8_decode($row['Nombre_Est']).' '.utf8_decode($row['ApPaterno_Est']).' '.utf8_decode($row['ApMaterno_Est']), 1, 'J', false); 
        $pdf->SetXY(15, 135);
        $pdf->MultiCell(40,5,'Profesionista E.', 1, 'J', false);
        $pdf->SetXY(55, 135);
        $pdf->MultiCell(146,5,' '.$row2['PE'], 1, 'J', false);      
        $pdf->SetXY(15, 135);
        $pdf->MultiCell(40,15,'', 1, 'J', false);
        $pdf->SetXY(15, 140);
        $pdf->MultiCell(40,5,'Adscripción:', 0, 'J', false);
        $pdf->SetXY(55, 135);
        $pdf->MultiCell(146,15,'', 1, 'J', false);
        $pdf->SetXY(55, 140);
        $pdf->MultiCell(145,5,''.utf8_decode($row['ID_Ger3']).' de la '.utf8_decode($row['ID_Sub3']).' de la '.utf8_decode($row['ID_Dir3']), 0, 'J', false); 
        $pdf->SetXY(15, 150);
        $pdf->MultiCell(40,5,'Extensión:', 1, 'J', false);
        $pdf->SetXY(55, 150);
        $pdf->MultiCell(146,5,''.utf8_decode($row['Extension']), 1, 'J', false); 
        $pdf->SetXY(15, 155);
        $pdf->MultiCell(40,5,'Vigencia:', 1, 'J', false);
        $pdf->SetXY(55, 155);
        $pdf->MultiCell(146,5,'Del ' .$inicio. ' al ' .$final , 1, 'J', false);  
        $pdf->SetXY(15, 160);
        $pdf->MultiCell(40,5,'Horario:', 1, 'J', false);
        $pdf->SetXY(55, 160);
        $pdf->MultiCell(146,5,'Del las ' .substr($row['Hr_Inicio'],0,-3). ' a las '.substr($row['Hr_Final'],0,-3) , 1, 'J', false);  
        $pdf->SetXY(15, 165);
        $pdf->MultiCell(40,16,'', 1, 'J', false);
        $pdf->SetXY(15, 162);
        $pdf->MultiCell(40,12,'Accesos:', 0, 'J', false);
        $pdf->SetXY(55, 165);
        $pdf->MultiCell(146,16,'', 1, 'J', false);
         $pdf->SetXY(55, 165);
        $pdf->MultiCell(146,4,'' .utf8_decode($row['Ubicacion']).'' .utf8_decode($row2['Nubicacion']), 0, 'J', false); 
     
     
        $pdf->SetXY(15, 200);
        $pdf->MultiCell(190,4,'Sin otro particular, reciba un cordial saludo.', 0, 'J', false);
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(15, 210);
        $pdf->MultiCell(190,4,'A t e n t a m e n t e ,', 0, 'J', false);
        $pdf->SetXY(15, 230);
        $pdf->MultiCell(80,4,''.$row2['firmaofi'], 0, 'J', false);
        $pdf->SetXY(15, 234);
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
        $oficio=$_POST['oficio']; 
        $anoreg=$_POST['anoreg'];   
        $dia=$_POST['dia'];
        $mes=$_POST['mes'];
        $anio=$_POST['anio'];
        $firma=$_POST['firma'];
        $cargo=$_POST['cargo'];
        $PE=$_POST['PE'];
        $numoficio=$_POST['numoficio'];
        $Nubicacion=$_POST['Nubicacion'];
        $finicio=$_POST['finicio'];
        $ftermino=$_POST['ftermino'];
    
        $consulta="SELECT A.ID_Est, A.Ano_Reg, A.ApPaterno_Est, A.ApMaterno_Est, A.Nombre_Est, B.ID_Ger3, B.ID_Sub3, B.ID_Dir3, B.Extension, B.F_Inicio, B.F_Final, B.Hr_Inicio, B.Hr_Final, B.Ubicacion FROM datospersonales A, datosarea B WHERE B.ID_Estudiante3= $idalumno and A.ID_Est=$idalumno and A.Ano_Reg = $anoreg";

        $rescon=$conexion->query($consulta);
        if (!$rescon) {
            echo "Consulta no ejecutada".mysqli_error($conexion);
        }

        $row=mysqli_fetch_array($rescon);

        $datenew1=explode("-", $finicio);
        $datenew2=explode("-", $ftermino);

        $date1=explode("-", $row['F_Inicio']);    
        $date2=explode("-", $row['F_Final']); 

        $meses = array('01'=>'Enero', '02'=>'Febrero', '03'=>'Marzo', '04'=>'Abril', '05'=>'Mayo', '06'=>'Junio', '07'=>'Julio',
                   '08'=>'Agosto', '09'=>'Septiembre', '10'=>'Octubre', '11'=>'Noviembre', '12'=>'Diciembre'); 
        $fecha1=$date1[2]." de ".$meses[$date1[1]]." del ".$date1[0];                    
        $final=$date2[2]." de ".$meses[$date2[1]]." del ".$date2[0]; 
        
         
        $fecha="Ciudad de México, a ".$_POST['dia']." de ". $_POST['mes']. " de ".$_POST['anio'];
        $inicio=$datenew1[2]." de ".$meses[$datenew1[1]]." del ".$datenew1[0];                    
        $fecha2=$datenew2[2]." de ".$meses[$datenew2[1]]." del ".$datenew2[0]; 
        
        //Arial, negrita, 12 puntos

        $pdf->Line(10,28,115,28);
        $pdf->Line(120,28,206,28);
        $pdf->Cell(30,25,'',0,0,'C',$pdf->Image('images/pemex.png', 15,10, 33));
        $pdf->SetXY(15, 32);
        $pdf->MultiCell(15,4,'Remitente', 0, 'J', false);
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(35, 32);
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
        

         $pdf->SetXY(118, 23);
        $pdf->MultiCell(80,4,'Fecha                   '.$fecha, 0, 'R', false);        
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',8);
        $pdf->SetXY(120, 32);
        $pdf->MultiCell(15,4,'Número', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',8);
        $pdf->SetXY(144, 32);
        $pdf->MultiCell(64,4,'DCAS-SRH-GOCH-SRDHA-CPE-'.$numoficio, 0, 'J', false);
        


        $pdf->SetXY(120, 40);
        $pdf->MultiCell(32,4,'Número expediente', 0, 'J', false);
        $pdf->Line(10,54,115,54);
        $pdf->Line(120,54,206,54);

        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10);
      $pdf->SetXY(9, 60);
        $pdf->MultiCell(100,4,'Ing. José Rogelio Ramírez García');

        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(35, 55);
        $pdf->Cell(0,22,'Superintendente de Vigilancia y Control de Accesos');

         $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(35, 59);
        $pdf->Cell(0,22,'Edificio "C" Planta Baja');

        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(15, 60);
        $pdf->MultiCell(20,4,'Destinatario', 0, 'J', false);
        
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(35, 76);
        $pdf->MultiCell(80,4,'P r e s e n t e', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(120, 60);
        $pdf->MultiCell(64,4,'Antecedentes', 0, 'J', false);

        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',8); //Arial, negrita, 12 puntos    
        $pdf->SetXY(120, 64);
        $pdf->MultiCell(18,4,'Número(s):', 0, 'J', false);
        $pdf->SetXY(144, 64);
        $pdf->MultiCell(64,4,''.$oficio, 0, 'J', false);
        $pdf->SetXY(120, 68);
        $pdf->MultiCell(44,4,'Número único de expediente:', 0, 'J', false);
        $pdf->SetXY(162, 68);
        $pdf->MultiCell(44,4,''/*.$numexp*/, 0, 'J', false);
        $pdf->SetXY(120, 72);
        $pdf->MultiCell(18,4,'Fecha(s):', 0, 'J', false);
        $pdf->SetXY(130, 72);
        $pdf->MultiCell(70,4,''/*.$fecha6*/, 0, 'R', false);
        $pdf->Line(10,82,115,82);
        $pdf->Line(120,82,206,82);
        $pdf->SetXY(15, 88);
        $pdf->MultiCell(15,4,'Asunto', 0, 'J', false);

          $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',9);
        $pdf->SetXY(34, 88);
        $pdf->MultiCell(80,4,'SOLICITUD AMPLIACION DE UBICACION PROFESIONISTA EN ENTRENAMIENTO C. '.utf8_decode($row['Nombre_Est']).' '.utf8_decode($row['ApPaterno_Est']).' '.utf8_decode($row['ApMaterno_Est']), 0, 'L', false);
      


        $pdf->SetXY(120, 88);
        $pdf->MultiCell(15,4,'Anexo', 0, 'J', false);
        $pdf->SetXY(140, 88);
        $pdf->MultiCell(5,4,'X', 1, 'C', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',11); //Arial, negrita, 12 puntos
        $pdf->SetXY(15, 102);
        $pdf->MultiCell(190,5,'Con relación a las Políticas y Procedimientos de Administración de Recursos Humanos y Relaciones Laborales en el numeral III.3. Reclutamiento y Selección, en el Apartado III.3.1.4 Personas Candidatas en Formación inciso 383). Para la Atención del Programa de Profesionstas en Entrenamiento, Agradeceré su Apoyo para que se Realicen las gestiones necesarias y se otorgue una Ampliacion de Ubicacion al Profesionista en Entrenamiento que se detalla a continuación, para concluir con las tareas del proyecto asignado. ', 0, 'J', false);
        


        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(15, 130);
        $pdf->MultiCell(40,5,'Nombre:', 1, 'J', false);
        $pdf->SetXY(55, 130);
        $pdf->MultiCell(146,5,'' .utf8_decode($row['Nombre_Est']).' '.utf8_decode($row['ApPaterno_Est']).' '.utf8_decode($row['ApMaterno_Est']), 1, 'J', false); 
        $pdf->SetXY(15, 135);
        $pdf->MultiCell(40,5,'Profesionista E.', 1, 'J', false);
        $pdf->SetXY(55, 135);
        $pdf->MultiCell(146,5,' '.$PE, 1, 'J', false);      
        $pdf->SetXY(15, 135);
        $pdf->MultiCell(40,15,'', 1, 'J', false);
        $pdf->SetXY(15, 140);
        $pdf->MultiCell(40,5,'Adscripción:', 0, 'J', false);
        $pdf->SetXY(55, 135);
        $pdf->MultiCell(146,15,'', 1, 'J', false);
        $pdf->SetXY(55, 140);
        $pdf->MultiCell(145,5,''.utf8_decode($row['ID_Ger3']).' de la '.utf8_decode($row['ID_Sub3']).' de la '.utf8_decode($row['ID_Dir3']), 0, 'J', false); 
        $pdf->SetXY(15, 150);
        $pdf->MultiCell(40,5,'Extensión:', 1, 'J', false);
        $pdf->SetXY(55, 150);
        $pdf->MultiCell(146,5,''.utf8_decode($row['Extension']), 1, 'J', false); 
        $pdf->SetXY(15, 155);
        $pdf->MultiCell(40,5,'Vigencia:', 1, 'J', false);
        $pdf->SetXY(55, 155);
        $pdf->MultiCell(146,5,'Del ' .$inicio. ' al ' .$final , 1, 'J', false);  
        $pdf->SetXY(15, 160);
        $pdf->MultiCell(40,5,'Horario:', 1, 'J', false);
        $pdf->SetXY(55, 160);
        $pdf->MultiCell(146,5,'Del las ' .substr($row['Hr_Inicio'],0,-3). ' a las '.substr($row['Hr_Final'],0,-3) , 1, 'J', false);  
        $pdf->SetXY(15, 165);
        $pdf->MultiCell(40,16,'', 1, 'J', false);
        $pdf->SetXY(15, 162);
        $pdf->MultiCell(40,12,'Accesos:', 0, 'J', false);
        $pdf->SetXY(55, 165);
        $pdf->MultiCell(146,16,'', 1, 'J', false);
        $pdf->SetXY(55, 165);
        $pdf->MultiCell(146,4,'' .utf8_decode($row['Ubicacion']).'' .$Nubicacion, 0, 'J', false); 
     

        
       
        $pdf->SetXY(15, 200);
        $pdf->MultiCell(190,4,'Sin otro particular, reciba un cordial saludo.', 0, 'J', false);
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(15, 210);
        $pdf->MultiCell(190,4,'A t e n t a m e n t e ,', 0, 'J', false);
        $pdf->SetXY(15, 230);
        $pdf->MultiCell(80,4,''.$firma, 0, 'J', false);
        $pdf->SetXY(15, 234);
        $pdf->MultiCell(80,4,''.$cargo, 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',8); //Arial, negrita, 12 puntos
        $pdf->SetXY(15, 240);
        $pdf->MultiCell(80,4,'Elaboró: CMRM / MMR', 0, 'J', false);
        $pdf->SetXY(15, 244);
        $pdf->MultiCell(80,4,'Ext.- 377-66', 0, 'J', false);
        $pdf->Output();

        $consulta3="SELECT * FROM oficioguardado WHERE idalumno='$idalumno' AND anoregistro='$anoreg' AND toficio='A. Ubicacion'";
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
                
                $query ="UPDATE OficioGuardado SET toficio='A. Ubicacion', idalumno='$idalumno',anoregistro='$anoreg', dia='$dia', mes='$mes', ano='$anio', ORemi,='$oficio', ofisal='$numoficio', PE='$PE', cargo='$cargo', firmaofi='$firmaofi',  Nubicacion='$Nubicacion' ,F_FinalA='$finicio',F_Final='$ftermino' WHERE idalumno='$idalumno' AND anoregistro='$anoreg' AND toficio='A. Ubicacion' ";

             
            

                $resultado=mysqli_query($conexion, $query);
                if (!$resultado)
                {
                    echo "error en la consulta".mysqli_error($conexion);                
                }           
            }
            else
            {
                $query = "INSERT INTO OficioGuardado (toficio, idalumno, anoregistro, dia, mes, ano, ORemi, ofisal, PE, cargo, firmaofi, Nubicacion, F_InicioA, F_Final) values ('A. Ubicacion', '$idalumno', '$anoreg', '$dia' , '$mes' ,'$anio', '$oficio', '$numoficio', '$PE','$cargo', '$firma', '$Nubicacion', '$finicio','$ftermino')";


                $resultado=mysqli_query($conexion, $query);
                if (!$resultado)
                {
                    echo mysqli_error($conexion);                
                }
            }
        }
    }
?>