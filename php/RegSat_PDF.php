<?php
require ('WriteHTML2.php');
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

        $consulta="SELECT A.ID_Est, A.Ano_Reg, A.ApPaterno_Est, A.ApMaterno_Est, A.Nombre_Est, A.Egresado, A.Carrera, A.ID_Institucion2, A.Plantel, A.Creditos, A.Doctor, A.Ceduladr, A.Domicilio, A.Colonia, A.Delegacion, A.CP, A.Estado,A.RFC,A.Curp, A.Correo, B.Proyecto, B.ID_Ger3, B.ID_Sub3, B.ID_Dir3, B.Nombre_Asesor, B.Cvedepto, B.F_Inicio, B.F_Final, B.F_Convenio, B.Hr_Inicio, B.Hr_Final, B.Ubicacion, B.Nombre_Gerente, B.CargoGerente FROM datospersonales A, datosarea B WHERE A.ID_Est=$idalumno and B.ID_Estudiante3=$idalumno and A.Ano_Reg=$anoreg";
                    $resid=$conexion->query($consulta);
                    $row=mysqli_fetch_array($resid);

        $date1=explode("-", $row2['felaboracion']);
        $meses = array('01'=>'Enero', '02'=>'Febrero', '03'=>'Marzo', '04'=>'Abril', '05'=>'Mayo', '06'=>'Junio', '07'=>'Julio',
                   '08'=>'Agosto', '09'=>'Septiembre', '10'=>'Octubre', '11'=>'Noviembre', '12'=>'Diciembre');    
        $fecha1="Ciudad de México, a ".$date1[2]." de ".$meses[$date1[1]]." de ".$date1[0];
       

	    
        $pdf = new PDF_HTML();
	    $pdf->AddPage('P', 'Letter'); //Vertical, Carta
        $pdf->AddFont('narrow','','narrow.php');
        $pdf->SetFont('narrow','',9);
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
    	$pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos

         $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',9); //Arial, negrita, 12 puntos
        $pdf->SetXY(120, 22);
        $pdf->MultiCell(124,4,'                       '.$fecha1, 0, 'J', false);

  



        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',12);
        $pdf->SetXY(35, 32);
        $pdf->MultiCell(65,4,utf8_decode($row2['nombredest']).' 
'.utf8_decode($row2['cargodest']).'
'.utf8_decode($row2['ubicaciondest']).'
P r e s e n t e', 0, 'J', false);

        


       //$Texto='Quien suscribe, <b>' .utf8_decode($row['Nombre_Est']).''.utf8_decode($row['ApPaterno_Est']).''.utf8_decode($row['ApMaterno_Est']).'</b>, con  clave  del  Registro  Federal  De  Contibuyentes                                             <b>'.utf8_decode($row['RFC']).'</b> y Clave Única de Registro de población <b>'.utf8_decode($row['Curp']).'</b> con domicilo                                           fiscal en  <b>'.utf8_decode($row['Domicilio']).' '.utf8_decode($row['Colonia']).',  Delegación '.utf8_decode($row['Delegacion']).',                                         '.utf8_decode($row['Estado']).', '.utf8_decode($row['CP']).'</b>   con  fundamento  en   lo  que  establece los artículos  94  fracción  V                                       de  la  ley del impuesto sobre la renta y 166 del reglameto de la citada ley, me dirijo a usted,                                                   para  solicitarle  que  a partir  de  esta fecha se considere como ingresos asimilados a salarios,                                               los que percibo de esta Empresa como  contraprestación  de  los  servicios  exclusivos  que  por                                             concepto del <b><u>CONVENIO-PROFESIONISTAS EN ENTRENAMIENTO DCAS-SRH-GRS-'.utf8_decode($row2['Num_Conve']).'</u>                                                    <u>-CONVENIO/2018</u> </b>, que  obtendré  durante  la  vigencia del mecionado convenio.<br><br>';
        

        
        $Texto='Quien suscribe, <b>' .utf8_decode($row['Nombre_Est']).' '.utf8_decode($row['ApPaterno_Est']).' '.utf8_decode($row['ApMaterno_Est']).'</b>, con clave del Registro  Federal  De  Contibuyentes  <b>'.utf8_decode($row['RFC']).'</b> y Clave Única de Registro de población <b>'.utf8_decode($row['Curp']).'</b> con domicilo  fiscal en <b>'.utf8_decode($row['Domicilio']).' '.utf8_decode($row['Colonia']).',  Delegación '.utf8_decode($row['Delegacion']).', '.utf8_decode($row['Estado']).', '.utf8_decode($row['CP']).'</b>   con  fundamento  en   lo  que  establece los artículos  94  fracción  V  de  la  ley del  impuesto  sobre  la  renta y 166 del reglamento de la citada ley, me dirijo a usted, para  solicitarle  que  a partir  de  esta  fecha  se  considere  como  ingresos  asimilados a salarios,  los  que  percibo  de  esta  Empresa  como  contraprestación  de  los  servicios  exclusivos  que  por concepto del <b><u>CONVENIO-PROFESIONISTAS EN ENTRENAMIENTO DCAS-SRH-GRS-'.utf8_decode($row2['Num_Conve']).'</u> <u>-CONVENIO/2018</u> </b>, que  obtendré  durante  la  vigencia del mecionado convenio.<br><br>';


        //$pdf->ezText("<b>NOTARIA 150</b>", 16, array('justification'=>'center'));    
       $pdf->setmargins(35,0,21);
        $pdf->SetFont('Arial','',10);
        $pdf->SetXY(35,65);
        $pdf->WriteHTML($Texto,0,'J',false); 
        //$pdf->Justify($Texto,85,4);
        //$pdf->MultiCell(155,4,$Texto, 0, 'J', false); 
        



        $pdf->SetFont('Arial','',10);
        $pdf->SetXY(35,120);
        $pdf->MultiCell(155,4,'Esta Solicitud  no  representa  de  ninguna  manera  un cambio de relación entre la  empresa  y quien suscribe, por la cual manifiesto, por  mi propio derecho y voluntad que relevo a Petróleos Mexicanos  y  Organismos  Subsidiarios  de cualquier responsabilidad de carácter legal  o  laboral; por  lo que, no me reservo cualquier acción presente o futura que ejerce en dichos términos, en contra de Petróleos Mexicanos y Organismos Subsidiarios.', 0, 'J', false); 

        $pdf->SetFont('Arial','',10);
        $pdf->SetXY(35,145);
        $pdf->MultiCell(155,4,'Lo anterior, por así convenir a mis intereses fiscales, perosnales y patrimoniales, tomando el compromiso de ratificar en el mismo sentido de lo  que  expongo, mi  dicisión ante  cualquier  tipo de  autoridad  del  orden  público o privado que así lo requiera.', 0, 'J', false); 







        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(35, 170);
        $pdf->MultiCell(190,4,'A t e n t a m e n t e ,', 0, 'J', false);
        $pdf->SetXY(35, 200);
        $pdf->MultiCell(80,4,utf8_decode($row['Nombre_Est']).' '.utf8_decode($row['ApPaterno_Est']).' '.utf8_decode($row['ApMaterno_Est']), 0, 'J', false);
        $pdf->SetXY(35, 205);
        $pdf->MultiCell(80,4,utf8_decode($row['Correo']), 0, 'J', false);
         
    


     
        
        
        $pdf->Output();       
    }
    
    else{
        
        $pdf = new PDF_HTML();
        $pdf->AddPage('P', 'Letter'); //Vertical, Carta
        $pdf->AddFont('narrow');
        $pdf->SetFont('narrow');
    
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




        
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',9); //Arial, negrita, 12 puntos
        $pdf->SetXY(120, 22);
        $pdf->MultiCell(124,4,'                         '.$fecha1, 0, 'J', false);

        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',12);
        $pdf->SetXY(35, 31);
        $pdf->MultiCell(64,4,$nombredest.'
'.$cargodest.'
'.$ubicaciondest.'
P r e s e n t e.', 0, 'J', false );



        
       $Texto='<p align="center">Quien suscribe, <b>'.utf8_decode($row['Nombre_Est']).' '.utf8_decode($row['ApPaterno_Est']).' '.utf8_decode($row['ApMaterno_Est']).'</b>, con clave del Registro Federal De Contibuyentes<b>'.utf8_decode($row['RFC']).'</b> y Clave Única de Registro de población <b>'.utf8_decode($row['Curp']).' </b>con domicilo fiscal en <b>'.utf8_decode($row['Domicilio']).' '.utf8_decode($row['Colonia']).',  Delegación '.utf8_decode($row['Delegacion']).', '.utf8_decode($row['Estado']).', '.utf8_decode($row['CP']).'</b>   con  fundamento  en   lo  que  establece los artículos  94  fracción  V  de  la  ley del impuesto sobre la renta y 166 del reglameto de la citada ley, me dirijo a usted, para  solicitarle  que  a partir  de  esta fecha se considere como ingresos asimilados a salarios, los que percibo de esta Empresa como  contraprestación  de  los  servicios  exclusivos  que  por  concepto  del   <b><u>CONVENIO-PROFESIONISTAS EN ENTRENAMIENTO DCAS-SRH-GRS- '.$Num_Conve.' -CONVENIO/2018</u> </b>, que  obtendré  durante  la  vigencia del mecionado convenio. <br><br>';


        $pdf->SetFont('Arial','',10);
        $pdf->SetXY(35,65);
        $pdf->WriteHTML($Texto); 
    
        //$pdf->WriteHTML($Texto,0,'J',false); 


   



        $pdf->SetFont('Arial','',10);
        $pdf->SetXY(35,120);
        $pdf->MultiCell(155,4,'Esta Solicitud  no  representa  de  ninguna  manera  un cambio de relación entre la  empresa  y quien suscribe, por la cual manifiesto, por  mi propio derecho y voluntad que relevo a Petróleos Mexicanos  y  Organismos  Subsidiarios  de cualquier responsabilidad de carácter legal  o  laboral; por  lo que, no me reservo cualquier acción presente o futura que ejerce en dichos términos, en contra de Petróleos Mexicanos y Organismos Subsidiarios.', 0, 'J', false); 

        $pdf->SetFont('Arial','',10);
        $pdf->SetXY(35,145);
        $pdf->MultiCell(155,4,'Lo anterior, por así convenir a mis intereses fiscales, perosnales y patrimoniales, tomando el compromiso de ratificar en el mismo sentido de lo  que  expongo, mi  dicisión ante  cualquier  tipo de  autoridad  del  orden  público o privado que así lo requiera.', 0, 'J', false); 


           $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(35, 170);
        $pdf->MultiCell(190,4,'A t e n t a m e n t e ,', 0, 'J', false);
        $pdf->SetXY(35, 200);
        $pdf->MultiCell(80,4,utf8_decode($row['Nombre_Est']).' '.utf8_decode($row['ApPaterno_Est']).' '.utf8_decode($row['ApMaterno_Est']), 0, 'J', false);
        $pdf->SetXY(35, 205);
        $pdf->MultiCell(80,4,utf8_decode($row['Correo']), 0, 'J', false);   

        


        $pdf->Output();  

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
