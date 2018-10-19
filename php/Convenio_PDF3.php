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

        $consulta="SELECT A.ID_Est, A.Ano_Reg, A.ApPaterno_Est, A.ApMaterno_Est, A.Nombre_Est, A.Egresado, A.Carrera, A.ID_Institucion2, A.Plantel, A.Creditos, A.Doctor, A.Ceduladr, A.Domicilio, A.Colonia, A.Delegacion, A.CP, A.Estado, B.Proyecto, B.ID_Ger3, B.ID_Sub3, B.ID_Dir3, B.Nombre_Asesor, B.Cvedepto, B.F_Inicio, B.F_Final, B.F_Convenio, B.Hr_Inicio, B.Hr_Final, B.Ubicacion, B.Nombre_Gerente, B.CargoGerente FROM datospersonales A, datosarea B WHERE A.ID_Est=$idalumno and B.ID_Estudiante3=$idalumno and A.Ano_Reg=$anoreg";
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

	    
        $pdf = new FPDF();
	    $pdf->AddPage('P', 'Letter'); //Vertical, Carta
        $pdf->AddFont('narrow','','narrow.php');
        $pdf->SetFont('narrow','',9);
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
    	$pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(0, 20);
        $pdf->MultiCell(217,4,'PETRÓLEOS MEXICANOS
DIRECCIÓN CORPORATIVA DE ADMINISTRACIÓN Y SERVICIOS
SUBDIRECCIÓN DE RECURSOS HUMANOS
GERENCIA DE RECLUTAMIENTO Y SELECCIÓN', 0, 'C', false);
        $pdf->SetXY(15, 50);
        $pdf->MultiCell(184,4,'CONVENIO DE ENTRENAMIENTO QUE CELEBRAN POR UNA PARTE PETRÓLEOS MEXICANOS, REPRESENTADO EN ESTE ACTO POR LA LIC. MONICA WATTY URISTA EN SU CARÁCTER DE GERENTE DE RECLUTAMIENTO Y SELECCION, A QUIEN EN LO SUCESIVO SE LE DENOMINARÁ "PEMEX", Y AL C. '.utf8_decode($row['Nombre_Est']).' '.utf8_decode($row['ApPaterno_Est']).' '.utf8_decode($row['ApMaterno_Est']).', QUIEN EN LO SUCESIVO SE LE DENOMINARÁ "PROFESIONISTA EN ENTRENAMIENTO", AL TENOR DE LAS SIGUIENTES DECLARACIONES Y CLÁUSULAS:', 0, 'J', false);
        $pdf->SetXY(15, 70);
        $pdf->MultiCell(184,4,'DECLARACIONES', 0, 'C', false);
        $pdf->SetXY(15, 80);
        $pdf->MultiCell(184,4,'1.   "PEMEX" DECLARA, A TRAVÉS DE SU APODERADO, QUE:', 0, 'J', false);
        $pdf->SetXY(15, 90);
        $pdf->MultiCell(10,4,'1.1', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(28, 90);

      $pdf->MultiCell(171,4, "Petróleos Mexicanos es una empresa productiva del Estado con régimen especial, de propiedad exclusiva del Gobierno Federal, con personalidad jurídica y patrimonio propios, que goza de autonomía técnica, operativa y de gestión, cuyo objeto consiste en llevar a cabo la exploración y extracción del petróleo y de los carburos de hidrógeno sólidos, líquidos o gaseosos, así como su recolección, venta y comercialización, y tiene como fin el desarrollo de actividades empresariales, económicas, industriales y comerciales en términos de dicho objeto, generando valor económico y rentabilidad, para lo cual cuenta con la capacidad para celebrar toda clase de actos jurídicos, entre otros, convenios, contratos, alianzas y asociaciones, con personas físicas o morales de los sectores público, privado o social, nacional o internacional, en términos de la Ley de Petróleos Mexicanos, publicada en Diario Oficial de la Federación el 11 de agosto de 2014.", 0, 'J', false);



        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(15, 126);
        $pdf->MultiCell(10,4,'1.2', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(28, 126);
        $pdf->MultiCell(171,4,'Cuenta con facultades para la firma del presente Convenio, lo cual acredita con el Estatuto Orgánico de Petróleos Mexicanos vigente.', 0, 'J', false);
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(15, 138);
        $pdf->MultiCell(10,4,'1.3', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(28, 138);
        $pdf->MultiCell(171,4,'Para todos los efectos legales del presente instrumento, señala como su domicilio el ubicado en Avenida Marina Nacional Número 329, Edificio "B-2" piso 01, Colonia Veronica Anzures, Delegación Miguel Hidalgo, Código Postal 11300, Ciudad de México.', 0, 'J', false);
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(15, 152);
        $pdf->MultiCell(184,4,'2.   EL ROFESIONISTA EN ENTRENAMIENTO DECLARA, QUE:', 0, 'J', false);
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(15, 162);
        $pdf->MultiCell(10,4,'2.1', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(28, 162);
        $pdf->MultiCell(171,4,'Tiene interés de ser entrenado por PEMEX para continuar con su desarrollo profesional, a través de la instrucción teórica y práctica requerida para el Proyecto '.$row['Proyecto'].". y a la vez, obtener el beneficio de una ayuda económica. ", 0, 'J', false);

        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); 
        $pdf->SetXY(15, 182);
        $pdf->MultiCell(10,4,'2.2', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(28, 180);
        $pdf->Write(4,'Es  ', 0, 'J', false);
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos        
        $pdf->Write(4,utf8_decode($row['Egresado']), 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos        
        $pdf->Write(4,' en el  plan  de  estudios  establecido en la ', 0, 'J', false);
           
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos 
        $pdf->SetXY(28,180);  
        $pdf->MultiCell(171,4,'                                                                                                 '.utf8_decode($row['Carrera']).' en el/la '.$row['ID_Institucion2'].' en el/la '.utf8_decode($row['Plantel']).', con un '.utf8_decode($row['Creditos']).' de créditos.', 0, 'J', false);

      $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 punt        
        $pdf->SetXY(15, 194);
        $pdf->MultiCell(10,4,'2.3', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(28, 194);
        $pdf->MultiCell(171,4,'Entrega una constancia de buena salud expedida por el/la ', 0, 'J', false);
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(104, 194);
        $pdf->MultiCell(171,4,$row['Doctor'], 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(153, 194);
        $pdf->MultiCell(171,4,'que emitió el certificado,', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(28, 198);
        $pdf->MultiCell(171,4,'con ', 0, 'J', false);
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 198);
        $pdf->MultiCell(171,4,'Cédula Profesional No.'.utf8_decode($row['Ceduladr']).'.', 0, 'J', false);


         $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(15, 206);
        $pdf->MultiCell(10,4,'2.4', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(28, 206);
        $pdf->MultiCell(171,4,'Para los efectos legales del presente instrumento, señala como su domicilio en: ', 0, 'J', false);

        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(131, 206);
        $pdf->MultiCell(171,4,utf8_decode($row['Domicilio']).',', 0, 'J', false);

        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(28, 210);
        $pdf->MultiCell(171,4,'Colonia '.$row['Colonia'].', Delegación '.$row['Delegacion'].', '.$row['Estado'].', '.$row['CP'], 0, 'J', false);

        $pdf->SetXY(28, 226);
        $pdf->MultiCell(171,4,'Las partes convienen las siguientes:', 0, 'J', false);

        $pdf->AddPage('P', 'Letter'); //Vertical, Carta
        $pdf->SetXY(15, 20);
        $pdf->MultiCell(19,4,'PRIMERA.- ', 0, 'J', false);
         $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 20);
        $pdf->MultiCell(164,4,'PEMEX' , 0, 'J', false);

        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 20);
        $pdf->MultiCell(164,4,'                proporcionará   al ' , 0, 'J', false);

        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 20);
        $pdf->MultiCell(164,4,'                                                Profesionista   en   Entrenamiento  ', 0, 'J', false);

        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 20);
        $pdf->MultiCell(164,4,',                                                                                                            en    la ', 0, 'J', false);




        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 20);
        $pdf->MultiCell(164,4, '                                                                                                               '.$row['ID_Ger3'].' de la ' .$row['ID_Sub3'].' de la '.$row['ID_Dir3'].' y mediante el personal  experto  que  designe  para este propósito, sin  detrimento  de  sus  programas  de  trabajo  y  funciones  básicas,  la formación,  instrucción,  entrenamiento  o  adiestramiento   relacionado  con  el  Proyecto', 0, 'J', false);

        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 32);
        $pdf->MultiCell(164,4,'                                                                             '.$row['Proyecto'].'', 0, 'J', false);


        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 40);
        $pdf->MultiCell(164,4,'Esta instrucción la recibirá la/el Profesionista en Entrenamiento de manera teórica y práctica, lo que coadyuvará a su formación profesional, designando para tal fin este propósito al (a) '.utf8_decode($row['Nombre_Asesor']).', como Asesor Técnico, con cargo presupuestal aplicable a la '.$row['ID_Ger3'].' de la ' .$row['ID_Sub3'].' de la '.$row['ID_Dir3'].' clave departamental '.$row['Cvedepto'].'', 0, 'J', false);

        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(15, 63);
        $pdf->MultiCell(19,4,'SEGUNDA.- ', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 63);
        $pdf->MultiCell(171,4,'La vigencia del presente Convenio es del ', 0, 'J', false);

        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(88, 63);
        $pdf->MultiCell(171,4,$inicio.' al '.$final.'.', 0, 'J', false);

        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(15, 77);
        $pdf->MultiCell(19,4,'TERCERA.- ', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 77);
        $pdf->MultiCell(164,4,'El/La',0, 'J', false);

         $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(42, 77);
        $pdf->MultiCell(164,4,'Profesionista en Entrenamiento', 0, 'J', false);



        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 77);
        $pdf->MultiCell(164,4,'                                                                 durante  la  vigencia  del  presente  Convenio, dispondrá  del  material  bibliográfico y manuales  técnicos, que en caso de ser necesario  le proporcionará su  Asesor Técnico, que  le  permitan aprovechar  en mejor  manera  la  formación  teórica  y  cumplir  con  sus  actividades,  asimismo,  el', 0, 'J', false);

        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(135, 85);
        $pdf->MultiCell(164,4,'           Profesionista en Entrenamiento', 0, 'J', false);

         $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 85);
        $pdf->MultiCell(164,4,'                                                                                                                                                                                               queda obligado(a) a cumplir con los programas teóricos y prácticos que se le asignen, así como con las indicaciones y disposiciones internas que sean parte de su formación, sometiéndose además a los exámenes previos y periódicos de evaluación de conocimientos y habilidades que se consideren necesarios.', 0, 'J', false);



        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(15, 105);
        $pdf->MultiCell(19,4,'CUARTA.- ', 0, 'J', false);
        
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 105);
        $pdf->MultiCell(164,4,'PEMEX', 0, 'J', false);

        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 105);
        $pdf->MultiCell(164,4, '              no  será  responsable  por  cualquier  situación  que  afecte  al ', 0, 'J', false);

            
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(126, 105);
        $pdf->MultiCell(164,4,' Profesionista  en  Entrenamiento' , 0, 'J', false);



            $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 105);
        $pdf->MultiCell(164,4,  '                                                                                                                                                                en sus intereses, derechos y obligaciones académicas ni laborales que pudiera tener con terceros.', 0, 'J', false);




        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(15, 119);
        $pdf->MultiCell(19,4,'QUINTA.- ', 0, 'J', false);
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 119);
        $pdf->MultiCell(164,4,'PEMEX ', 0, 'J', false);


        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 119);
        $pdf->MultiCell(164,4,'              otorgará una ayuda económica al/la' , 0, 'J', false);

           

        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(92, 119);
        $pdf->MultiCell(164,4,'Profesionista en Entrenamiento', 0, 'J', false);

        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 119);
        $pdf->MultiCell(164,4,'                                                                                                                               como apoyo para desarrollar las actividades', 0, 'J', false);

         $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 123);
        $pdf->MultiCell(164,4,'necesarias, de acuerdo con los proyectos que ' , 0, 'J', false);

        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(94, 123);
        $pdf->MultiCell(164,4,'PEMEX', 0, 'J', false);

        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(105, 123);
        $pdf->MultiCell(164,4,'establezca.', 0, 'J', false);






        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10);
        $pdf->SetXY(34, 128);
        $pdf->MultiCell(164,4,'El monto de la ayuda económica otorgada por ', 0, 'J', false);
                                
                                
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10);
        $pdf->SetXY(34, 128);
        $pdf->MultiCell(164,4,'                                                                           PEMEX', 0, 'J', false);

             
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10);
        $pdf->SetXY(34, 128);
        $pdf->MultiCell(164,4,'                                                                                        será por la cantidad de', 0, 'J', false); 


        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10);
        $pdf->SetXY(34, 128);
        $pdf->MultiCell(164,4,'                                                                                                                             3.5 salarios mínimos' , 0, 'J', false);

        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10);
        $pdf->SetXY(34, 128);
        $pdf->MultiCell(164,4,'                                                                                                                                                            mensuales vigentes en la Ciudad de México que se entregarán al/la' , 0, 'J', false);

        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10);
        $pdf->SetXY(34, 132);
        $pdf->MultiCell(164,4,'                                                                      Profesionista en Entrenamiento', 0, 'J', false);


        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10);
        $pdf->SetXY(34, 132);
        $pdf->MultiCell(164,4, '                                                                                                               en el lugar donde se encuentra realizando las actividades para su desarrollo profesional. Dicha cantidad se otorgará por mes vencido, contra la firma del documento expedido para tal fin, y en caso de faltar a sus actividades se descontará la cantidad proporcional correspondiente a los días de inasistencia.', 0, 'J', false);




        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(15, 152);
        $pdf->MultiCell(19,4,'SEXTA.- ', 0, 'J', false);
   
       $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 152);
        $pdf->MultiCell(164,4,'Las partes aceptan y reconocen que el monto de la ayuda económica señalado en la Cláusula QUINTA, no es un salario u honorario, ni asimilado a dichos conceptos, y no le otorga al', 0, 'J', false);


         $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 156);
        $pdf->MultiCell(164,4, '                                                                                                   Profesionista en Entrenamiento', 0, 'J', false);

         $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 156);
        $pdf->MultiCell(164,4,  '                                                                                                                                                     la categoría de trabajador, ya que el presente instrumento no representa un contrato de trabajo ni de prestación de servicios, sino un acuerdo para que', 0, 'J', false);

        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 164);
        $pdf->MultiCell(164,4, 'PEMEX' , 0, 'J', false);

        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 164);
        $pdf->MultiCell(164,4,'         proporcione dentro de sus instalaciones, a solicitud del interesado, el entrenamiento relacionado con su grado profesional que contribuya a su desarrollo profesional, cumpliendo con los requisitos establecidos en las Políticas y Procedimientos de Administración de Recursos Humanos y Relaciones Laborales en el apartado Personas candidatas en Formación por lo que queda expresamente pactado, que este Convenio no implica relación laboral o de intermediación alguna en términos del artículo 13 de la Ley Federal del Trabajo, ni tampoco constituye una promesa o compromisos de contratación entre', 0, 'J', false); 


        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 184);
        $pdf->MultiCell(164,4,'         PEMEX y el Profesionista en Entrenamiento.', 0, 'J', false);


        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(15, 194);
        $pdf->MultiCell(19,4,'SEPTIMA.- ', 0, 'J', false);

        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 194);
        $pdf->MultiCell(164,4,'El horario que deberá cubrir el', 0, 'J', false); 

        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 194);
        $pdf->MultiCell(164,4,'                                                 Profesionista en Entrenamiento', 0, 'J', false);  

        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 194);
        $pdf->MultiCell(164,4,'                                                                                                        durante la realización de sus actividades es de', 0, 'J', false); 

        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 194);
        $pdf->MultiCell(164,4,'                                                                                                                                                                                '.substr($row['Hr_Inicio'],0,-3).' a '.substr($row['Hr_Final'],0,-3).' horas (6 horas diarias), de lunes a viernes.', 0, 'J', false);




        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(15, 208);
        $pdf->MultiCell(19,4,'OCTAVA.- ', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 208);
        $pdf->MultiCell(164,4,'El', 0, 'J', false);

        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 208);
        $pdf->MultiCell(164,4,'       Profesionista   en   Entrenamiento  ', 0, 'J', false);

        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 208);
        $pdf->MultiCell(164,4,'                                                                    recibirá   la   instrucción  y  desarrollará  sus  actividades   en    la   ', 0, 'J', false);


        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 208);
        $pdf->MultiCell(164,4,'                                                                                                                                                                       '.utf8_decode($row['ID_Ger3']).' de la ' .$row['ID_Sub3'].' de la '.$row['ID_Dir3'].', ubicada en '.$row['Ubicacion'].'.', 0, 'J', false);




        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(194, 248);
        $pdf->MultiCell(4,4,'2', 0, 'J', false);

        $pdf->AddPage('P', 'Letter'); //Vertical, Carta
        $pdf->SetXY(15, 20);
        $pdf->MultiCell(19,4,'NOVENA.- ', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 20);
        $pdf->MultiCell(171,4,'El', 0, 'J', false); 


        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 20);
        $pdf->MultiCell(171,4,'    Profesionista en Entrenamiento', 0, 'J', false); 

        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 20);
        $pdf->MultiCell(171,4,'                                                           acepta que durante el tiempo que dure su formación, deberá cumplir con lo siguiente:', 0, 'J', false); 



        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(25, 32);
        $pdf->MultiCell(5,4,'*', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 32);
        $pdf->MultiCell(163,4,'Realizar actividades inherentes a su entrenamiento durante el periodo autorizado, y cumplir con las actividades de formación teórica y práctica, conforme a las instrucciones del Asesor Técnico;', 0, 'J', false); 
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(25, 48);
        $pdf->MultiCell(5,4,'*', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 48);
        $pdf->MultiCell(163,4,'Conocer y cumplir las normas de seguridad industrial, protección ambiental y salud ocupacional establecidas en el lugar en donde realice las actividades correspondientes a su formación profesional;', 0, 'J', false); 
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(25, 64);
        $pdf->MultiCell(5,4,'*', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 64);
        $pdf->MultiCell(163,4,'Guardar estricta confidencialidad respecto a la información de los asuntos y documentos a los que tenga acceso y darles un uso adecuado conforme a lo instruido por su Asesor Técnico, así como custodiar la documentación y evitar su sustracción, destrucción o reproducción para otros fines que no sean los del área en la que desarrolla su entrenamiento.', 0, 'J', false); 
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(25, 84);
        $pdf->MultiCell(5,4,'*', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 84);
        $pdf->MultiCell(163,4,'Cumplir con las indicaciones y recomendaciones de su Asesor Técnico, quien en su ausencia designará a la persona que le asesorará en las actividades a desarrollar en relación con el presente Convenio;', 0, 'J', false); 
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(25, 100);
        $pdf->MultiCell(5,4,'', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 100);
        $pdf->MultiCell(163,4,'Conservar en buen estado los instrumentos que utilice en el Proyecto;', 0, 'J', false); 
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(25, 112);
        $pdf->MultiCell(5,4,'*', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 112);
        $pdf->MultiCell(163,4,'Observar buenas costumbres y tratar con respeto a las personas con quienes se relacione durante su entrenamiento;', 0, 'J', false); 
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(25, 124);
        $pdf->MultiCell(5,4,'*', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 124);
        $pdf->MultiCell(163,4,'Realizar y aprobar los exámenes periódicos que se le practiquen, de conformidad con lo establecido por el área usuaria en la cual desarrolla su entrenamiento;', 0, 'J', false); 
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(25, 140);
        $pdf->MultiCell(5,4,'*', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 140);
        $pdf->MultiCell(163,4,'Dar aviso a la brevedad al Asesor Técnico designado, salvo caso fortuito o fuerza mayor, de las causas justificadas que le impidan asistir a desarrollar las actividades propias del Proyecto en el que participa;', 0, 'J', false); 
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(25, 156);
        $pdf->MultiCell(5,4,'*', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 156);
        $pdf->MultiCell(163,4,'Portar el documento de identificación que le permita el acceso al área usuaria donde participará en su entrenamiento, que para tal efecto le proporcionará la Superintendencia de Vigilancia y Control de Accesos,', 0, 'J', false); 
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(25, 172);
        $pdf->MultiCell(5,4,'*', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 172);
        $pdf->MultiCell(163,4,'Elaborar al término de su entrenamiento, un reporte acerca de las actividades realizadas.', 0, 'J', false); 
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(15, 186);
        $pdf->MultiCell(19,4,'DÉCIMA.- ', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 186);
        $pdf->MultiCell(163,4,'Son causas de cancelación del presente Convenio:', 0, 'J', false); 
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(25, 198);
        $pdf->MultiCell(5,4,'*', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 198);
        $pdf->MultiCell(163,4,'El incumplimiento de lo dispuesto en el presente documento o las normas técnicas, de seguridad o administrativas necesarias para el funcionamiento del área usuaria en la cual desarrolla su entrenamiento;', 0, 'J', false); 
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(25, 214);
        $pdf->MultiCell(5,4,'*', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 214);
        $pdf->MultiCell(163,4,'Poner en peligro su seguridad o la de los trabajadores, o hacer uso indebido de las instalaciones, equipo, maquinaria, materiales, herramientas y bienes propiedad de' , 0, 'J', false); 



         $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 218);
        $pdf->MultiCell(163,4,'                                                                             PEMEX;', 0, 'J', false); 




        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(25, 230);
        $pdf->MultiCell(5,4,'*', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 230);
        $pdf->MultiCell(163,4,'Propiciar o participar en el relajamiento de la disciplina y las buenas costumbres en el lugar donde se encuentre participando en su entrenamiento;', 0, 'J', false); 
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(194, 248);
        $pdf->MultiCell(4,4,'3', 0, 'J', false);

        $pdf->AddPage('P', 'Letter'); //Vertical, Carta
        $pdf->SetXY(25, 20);
        $pdf->MultiCell(5,4,'*', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 20);
        $pdf->MultiCell(163,4,'Obtener un bajo aprovechamiento en las evaluaciones que le aplique el Asesor Técnico', 0, 'J', false); 
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(25, 32);
        $pdf->MultiCell(5,4,'*', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 32);
        $pdf->MultiCell(163,4,'Presentar documentación falsa;', 0, 'J', false); 
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(25, 44);
        $pdf->MultiCell(5,4,'*', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 44);
        $pdf->MultiCell(163,4,'Realizar u omitir algún acto que, a juicio del área usuaria, amerite la cancelación del Convenio de entrenamiento,', 0, 'J', false); 
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(25, 56);
        $pdf->MultiCell(5,4,'*', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 56);
        $pdf->MultiCell(163,4,'Tener 1% de inasistencias injustificadas al mes.', 0, 'J', false); 
        $pdf->SetXY(28, 68);
        $pdf->MultiCell(163,4,'Adicionalmente, las partes podrán terminar anticipadamente este Convenio por así convenir a sus intereses.', 0, 'J', false);
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(15, 80);
        $pdf->MultiCell(30,4,'DÉCIMA PRIMERA.- ', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(46, 80);
        $pdf->MultiCell(163,4,'Son causas de suspensión del presente Convenio de entrenamiento:', 0, 'J', false); 
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(25, 92);
        $pdf->MultiCell(5,4,'*', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 92);
        $pdf->MultiCell(163,4,'La  enfermedad  o  imposibilidad de  poder asistir  a  desarrollar sus actividades. Una vez resuelta la causa que imposibilitó al', 0, 'J', false);  

        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 96);
        $pdf->MultiCell(163,4,'Profesionista en Entrenamiento', 0, 'J', false); 

        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 96);
        $pdf->MultiCell(163,4,'                                           su asistencia, continuará sus actividades hasta por el término de la vigencia del presente instrumento, descontándosele los días que haya faltado, y', 0, 'J', false);



        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(25, 112);
        $pdf->MultiCell(5,4,'*', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 112);
        $pdf->MultiCell(163,4,'La insuficiencia presupuestal', 0, 'J', false); 
        $pdf->SetXY(28, 124);
        $pdf->MultiCell(163,4,'Número   de  Registro    asignado    por la SUBDIRECCIÓN DE RECURSOS HUMANOS DCAS-SRH-GRS-', 0, 'J', false);

        $pdf->SetXY(28, 129);
        $pdf->MultiCell(163,4,'             -CONVENIO/2018.', 0, 'J', false);

        $pdf->SetXY(130, 136);
        $pdf->MultiCell(80,4,''.$fconvenio, 0, 'J', false);
                $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(44, 154);
        $pdf->MultiCell(40,4,'PETRÓLEOS MEXICANOS', 0, 'C', false);
        $pdf->SetXY(116, 154);
        $pdf->MultiCell(60,4,'PROFESIONISTA EN ENTRENAMIENTO', 0, 'C', false);
        $pdf->SetXY(30, 170);
        $pdf->MultiCell(70,4,'LIC. MONICA WATTY URISTA
GERENTE DE RECLUTAMIENTO Y SELECCION', 0, 'C', false);
        $pdf->SetXY(118, 170);
        $pdf->MultiCell(80,4,'C. ' .utf8_decode($row['Nombre_Est']).' '.utf8_decode($row['ApPaterno_Est']).' '.utf8_decode($row['ApMaterno_Est']), 0, 'L', false);
        $pdf->SetXY(90, 190);
        $pdf->MultiCell(30,4,'AREA USUARIA', 0, 'C', false);
        $pdf->SetXY(50, 206);
        $pdf->MultiCell(110,4,''.utf8_decode($row['Nombre_Gerente']).'
'.utf8_decode($row['CargoGerente']), 0, 'C', false);
        $pdf->SetXY(194, 248);
        $pdf->MultiCell(4,4,'4', 0, 'J', false);



        
        $pdf->Output();       
    }
    
    else{
        
        $pdf = new PDF_HTML();
          $pdf->AddPage('P', 'Letter'); //Vertical, Carta
        $pdf->AddFont('narrow');
        $pdf->SetFont('narrow');
    
        $idalumno=$_POST['idalumno'];    
        $anoreg=$_POST['anoreg'];         
                    $consulta="SELECT A.ID_Est, A.Ano_Reg, A.ApPaterno_Est, A.ApMaterno_Est, A.Nombre_Est, A.Egresado, A.Carrera, A.ID_Institucion2, A.Plantel, A.Creditos, A.Doctor, A.Ceduladr, A.Domicilio, A.Colonia, A.Delegacion, A.CP, A.Estado, B.Proyecto, B.ID_Ger3, B.ID_Sub3, B.ID_Dir3, B.Nombre_Asesor, B.Cvedepto, B.F_Inicio, B.F_Final, B.F_Convenio, B.Hr_Inicio, B.Hr_Final, B.Ubicacion, B.Nombre_Gerente, B.CargoGerente FROM datospersonales A, datosarea B WHERE A.ID_Est=$idalumno and B.ID_Estudiante3=$idalumno and A.Ano_Reg=$anoreg";
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

     
    
        

         $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(0, 20);
        $pdf->MultiCell(217,4,'PETRÓLEOS MEXICANOS
DIRECCIÓN CORPORATIVA DE ADMINISTRACIÓN Y SERVICIOS
SUBDIRECCIÓN DE RECURSOS HUMANOS
GERENCIA DE RECLUTAMIENTO Y SELECCIÓN', 0, 'C', false);
        $pdf->SetXY(15, 50);
        $pdf->MultiCell(184,4,'CONVENIO DE ENTRENAMIENTO QUE CELEBRAN POR UNA PARTE PETRÓLEOS MEXICANOS, REPRESENTADO EN ESTE ACTO POR LA LIC. MONICA WATTY URISTA EN SU CARÁCTER DE GERENTE DE RECLUTAMIENTO Y SELECCION, A QUIEN EN LO SUCESIVO SE LE DENOMINARÁ "PEMEX", Y AL C. '.utf8_decode($row['Nombre_Est']).' '.utf8_decode($row['ApPaterno_Est']).' '.utf8_decode($row['ApMaterno_Est']).', QUIEN EN LO SUCESIVO SE LE DENOMINARÁ "PROFESIONISTA EN ENTRENAMIENTO", AL TENOR DE LAS SIGUIENTES DECLARACIONES Y CLÁUSULAS:', 0, 'J', false);

     $pdf->SetXY(15, 70);
        $pdf->MultiCell(184,4,'DECLARACIONES', 0, 'C', false);


      
        
        $pdf->SetXY(15, 80);
        $pdf->WriteHTML('<p align="left">1.   PEMEX DECLARA, A TRAVÉS DE SU APODERADO, QUE: </p> <br>', 0, 'J', false);

        $pdf->SetXY(15, 90);
        $pdf->MultiCell(10,4,'1.1', 0, 'J', false);
             

        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(28, 90);
        $pdf->MultiCell(171,4,"Petróleos Mexicanos es una empresa productiva del Estado con régimen especial, de propiedad exclusiva del Gobierno Federal, con personalidad jurídica y patrimonio propios, que goza de autonomía técnica, operativa y de gestión, cuyo objeto consiste en llevar a cabo la exploración y extracción del petróleo y de los carburos de hidrógeno sólidos, líquidos o gaseosos, así como su recolección, venta y comercialización, y tiene como fin el desarrollo de actividades empresariales, económicas, industriales y comerciales en términos de dicho objeto, generando valor económico y rentabilidad, para lo cual cuenta con la capacidad para celebrar toda clase de actos jurídicos, entre otros, convenios, contratos, alianzas y asociaciones, con personas físicas o morales de los sectores público, privado o social, nacional o internacional, en términos de la Ley de Petróleos Mexicanos, publicada en Diario Oficial de la Federación el 11 de agosto de 2014.", 0, 'J', false);
     
        

        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(15, 126);
        $pdf->MultiCell(10,4,'1.2', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(28, 126);
        $pdf->MultiCell(171,4,'Cuenta con facultades para la firma del presente Convenio, lo cual acredita con el Estatuto Orgánico de Petróleos Mexicanos vigente.', 0, 'J', false);
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(15, 138);
        $pdf->MultiCell(10,4,'1.3', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(28, 138);
        $pdf->MultiCell(171,4,'Para todos los efectos legales del presente instrumento, señala como su domicilio el ubicado en Avenida Marina Nacional Número 329, Edificio "B-2" piso 01, Colonia Petróleos Mexicanos, Delegación Miguel Hidalgo, Código Postal 11311, Ciudad de México.', 0, 'J', false);
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(15, 152);
        $pdf->MultiCell(184,4,'2.   EL "PROFESIONISTA EN ENTRENAMIENTO" DECLARA, QUE:', 0, 'J', false);
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(15, 162);
        $pdf->MultiCell(10,4,'2.1', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(28, 162);
        $pdf->MultiCell(170,4,'Tiene interés de ser entrenado por PEMEX para continuar con su desarrollo profesional, a través de la instrucción teórica y práctica requerida para el Proyecto '.utf8_decode($row['Proyecto']).' y, a la vez, obtener el beneficio de una ayuda económica.', 0, 'J', false);
        
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(15, 180);
        $pdf->MultiCell(10,2,'2.2  ', 0, 'J', false); 


        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(28, 180);
        $pdf->Write(4,' Es ', 0, 'J', false);
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos        
        $pdf->Write(4,utf8_decode($row['Egresado']), 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos        
        $pdf->Write(4,'  en el plan de estudios establecido en la ', 0, 'J', false);
           
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos 
        $pdf->SetXY(28,180);  
        $pdf->MultiCell(171,4,'                                                                                   '.utf8_decode($row['Carrera']).' en el/la '.utf8_decode($row['ID_Institucion2']).'  en el/la  '.utf8_decode($row['Plantel']).', con un '.utf8_decode($row['Creditos']).' de créditos.', 0, 'J', false);



        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 punt        
        $pdf->SetXY(15, 194);
        $pdf->MultiCell(10,4,'2.3', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(28, 194);
        $pdf->MultiCell(171,4,'Entrega una constancia de buena salud expedida por el/la ', 0, 'J', false);
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(104, 194);
        $pdf->MultiCell(171,4,utf8_decode($row['Doctor']), 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(163, 194);
        $pdf->MultiCell(171,4,' que emitió el certificado,', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(28, 198);
        $pdf->MultiCell(171,4,' con ', 0, 'J', false);
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 198);
        $pdf->MultiCell(171,4,'Cédula Profesional No.'.utf8_decode($row['Ceduladr']).'.', 0, 'J', false);
        






        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(15, 206);
        $pdf->MultiCell(10,4,'2.4', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(28, 206);
        $pdf->MultiCell(171,4,'Para los efectos legales del presente instrumento, señala como su domicilio en: ', 0, 'J', false);

        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(131, 206);
        $pdf->MultiCell(171,4,utf8_decode($row['Domicilio']).',', 0, 'J', false);

        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(28, 210);
        $pdf->MultiCell(171,4,'Colonia '.utf8_decode($row['Colonia']).', Delegación '.utf8_decode($row['Delegacion']).', '.utf8_decode($row['Estado']).', '.utf8_decode($row['CP']), 0, 'J', false);

        $pdf->SetXY(28, 226);
        $pdf->MultiCell(171,4,'Las partes convienen las siguientes:', 0, 'J', false);

        
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(194, 248);
        $pdf->MultiCell(4,4,'1', 0, 'J', false);

        $pdf->AddPage('P', 'Letter'); //Vertical, Carta
         $pdf->SetXY(15, 20);
        $pdf->MultiCell(19,4,'PRIMERA.- ', 0, 'J', false);

        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 20);
        $pdf->MultiCell(164,4,'PEMEX' , 0, 'J', false);

        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 20);
        $pdf->MultiCell(164,4,'                proporcionará   al ' , 0, 'J', false);

        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 20);
        $pdf->MultiCell(164,4,'                                                Profesionista   en   Entrenamiento  ', 0, 'J', false);

        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 20);
        $pdf->MultiCell(164,4,',                                                                                                            en    la ', 0, 'J', false);




        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 20);
        $pdf->MultiCell(164,4, '                                                                                                               '.utf8_decode($row['ID_Ger3']).' de la ' .utf8_decode($row['ID_Sub3']).' de la '.utf8_decode($row['ID_Dir3']).' y mediante el personal experto que designe para este propósito, sin detrimento de sus programas de trabajo y funciones básicas, la formación, instrucción, entrenamiento o adiestramiento relacionado con el Proyecto ', 0, 'J', false);

        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 32);
        $pdf->MultiCell(164,4,'                                                                                                                                                      '.utf8_decode($row['Proyecto']).'.', 0, 'J', false);


        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 44);
        $pdf->MultiCell(164,4,'Esta instrucción la recibirá la/el Profesionista en Entrenamiento de manera teórica y práctica, lo que coadyuvará a su formación profesional, designando para tal fin este propósito al (a) '.utf8_decode($row['Nombre_Asesor']).', como Asesor Técnico, con cargo presupuestal aplicable a la '.utf8_decode($row['ID_Ger3']).' de la ' .utf8_decode($row['ID_Sub3']).' de la '.utf8_decode($row['ID_Dir3']).' clave departamental '.utf8_decode($row['Cvedepto']).'', 0, 'J', false);
                 

        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(15, 68);
        $pdf->MultiCell(19,4,'SEGUNDA.- ', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 68);
        $pdf->MultiCell(171,4,'La vigencia del presente Convenio es del ', 0, 'J', false);

        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(88, 68);
        $pdf->MultiCell(171,4,$inicio.' al '.$final.'.', 0, 'J', false);

        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(15, 77);
        $pdf->MultiCell(19,4,'TERCERA.- ', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 77);
        $pdf->MultiCell(164,4,'El/La',0, 'J', false);

         $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(42, 77);
        $pdf->MultiCell(164,4,'Profesionista en Entrenamiento', 0, 'J', false);



        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 77);
        $pdf->MultiCell(164,4,'                                                                 durante  la  vigencia  del  presente  Convenio, dispondrá  del  material  bibliográfico y manuales  técnicos, que en caso de ser necesario  le proporcionará su  Asesor Técnico, que  le  permitan aprovechar  en mejor  manera  la  formación  teórica  y  cumplir  con  sus  actividades,  asimismo,  el', 0, 'J', false);

        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(135, 85);
        $pdf->MultiCell(164,4,'           Profesionista en Entrenamiento', 0, 'J', false);

         $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 85);
        $pdf->MultiCell(164,4,'                                                                                                                                                                                               queda obligado(a) a cumplir con los programas teóricos y prácticos que se le asignen, así como con las indicaciones y disposiciones internas que sean parte de su formación, sometiéndose además a los exámenes previos y periódicos de evaluación de conocimientos y habilidades que se consideren necesarios.', 0, 'J', false);



        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(15, 105);
        $pdf->MultiCell(19,4,'CUARTA.- ', 0, 'J', false);
        
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 105);
        $pdf->MultiCell(164,4,'PEMEX', 0, 'J', false);

        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 105);
        $pdf->MultiCell(164,4, '              no  será  responsable  por  cualquier  situación  que  afecte  al ', 0, 'J', false);

            
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(126, 105);
        $pdf->MultiCell(164,4,' Profesionista  en  Entrenamiento' , 0, 'J', false);



            $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 105);
        $pdf->MultiCell(164,4,  '                                                                                                                                                                en sus intereses, derechos y obligaciones académicas ni laborales que pudiera tener con terceros.', 0, 'J', false);




        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(15, 119);
        $pdf->MultiCell(19,4,'QUINTA.- ', 0, 'J', false);
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 119);
        $pdf->MultiCell(164,4,'PEMEX ', 0, 'J', false);


        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 119);
        $pdf->MultiCell(164,4,'              otorgará una ayuda económica al/la' , 0, 'J', false);

           

        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(92, 119);
        $pdf->MultiCell(164,4,'Profesionista en Entrenamiento', 0, 'J', false);

        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 119);
        $pdf->MultiCell(164,4,'                                                                                                                               como apoyo para desarrollar las actividades', 0, 'J', false);

         $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 123);
        $pdf->MultiCell(164,4,'necesarias, de acuerdo con los proyectos que ' , 0, 'J', false);

        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(94, 123);
        $pdf->MultiCell(164,4,'PEMEX', 0, 'J', false);

        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(105, 123);
        $pdf->MultiCell(164,4,'establezca.', 0, 'J', false);






        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10);
        $pdf->SetXY(34, 128);
        $pdf->MultiCell(164,4,'El monto de la ayuda económica otorgada por ', 0, 'J', false);
                                
                                
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10);
        $pdf->SetXY(34, 128);
        $pdf->MultiCell(164,4,'                                                                           PEMEX', 0, 'J', false);

             
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10);
        $pdf->SetXY(34, 128);
        $pdf->MultiCell(164,4,'                                                                                        será por la cantidad de', 0, 'J', false); 


        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10);
        $pdf->SetXY(34, 128);
        $pdf->MultiCell(164,4,'                                                                                                                             3.5 salarios mínimos' , 0, 'J', false);

        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10);
        $pdf->SetXY(34, 128);
        $pdf->MultiCell(164,4,'                                                                                                                                                            mensuales vigentes en la Ciudad de México que se entregarán al/la' , 0, 'J', false);

        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10);
        $pdf->SetXY(34, 132);
        $pdf->MultiCell(164,4,'                                                                      Profesionista en Entrenamiento', 0, 'J', false);


        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10);
        $pdf->SetXY(34, 132);
        $pdf->MultiCell(164,4, '                                                                                                               en el lugar donde se encuentra realizando las actividades para su desarrollo profesional. Dicha cantidad se otorgará por mes vencido, contra la firma del documento expedido para tal fin, y en caso de faltar a sus actividades se descontará la cantidad proporcional correspondiente a los días de inasistencia.', 0, 'J', false);




        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(15, 152);
        $pdf->MultiCell(19,4,'SEXTA.- ', 0, 'J', false);
   
       $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 152);
        $pdf->MultiCell(164,4,'Las partes aceptan y reconocen que el monto de la ayuda económica señalado en la Cláusula QUINTA, no es un salario u honorario, ni asimilado a dichos conceptos, y no le otorga al', 0, 'J', false);


         $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 156);
        $pdf->MultiCell(164,4, '                                                                                                   Profesionista en Entrenamiento', 0, 'J', false);

         $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 156);
        $pdf->MultiCell(164,4,  '                                                                                                                                                     la categoría de trabajador, ya que el presente instrumento no representa un contrato de trabajo ni de prestación de servicios, sino un acuerdo para que', 0, 'J', false);

        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 164);
        $pdf->MultiCell(164,4, 'PEMEX' , 0, 'J', false);

        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 164);
        $pdf->MultiCell(164,4,'         proporcione dentro de sus instalaciones, a solicitud del interesado, el entrenamiento relacionado con su grado profesional que contribuya a su desarrollo profesional, cumpliendo con los requisitos establecidos en las Políticas y Procedimientos de Administración de Recursos Humanos y Relaciones Laborales en el apartado Personas candidatas en Formación por lo que queda expresamente pactado, que este Convenio no implica relación laboral o de intermediación alguna en términos del artículo 13 de la Ley Federal del Trabajo, ni tampoco constituye una promesa o compromisos de contratación entre', 0, 'J', false); 


        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 184);
        $pdf->MultiCell(164,4,'         PEMEX y el Profesionista en Entrenamiento.', 0, 'J', false);


        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(15, 194);
        $pdf->MultiCell(19,4,'SEPTIMA.- ', 0, 'J', false);

        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 194);
        $pdf->MultiCell(164,4,'El horario que deberá cubrir el', 0, 'J', false); 

        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 194);
        $pdf->MultiCell(164,4,'                                                 Profesionista en Entrenamiento', 0, 'J', false);  

        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 194);
        $pdf->MultiCell(164,4,'                                                                                                        durante la realización de sus actividades es de', 0, 'J', false); 

        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 194);
        $pdf->MultiCell(164,4,'                                                                                                                                                                                '.substr($row['Hr_Inicio'],0,-3).' a '.substr($row['Hr_Final'],0,-3).' horas (6 horas diarias), de lunes a viernes.', 0, 'J', false);




        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(15, 208);
        $pdf->MultiCell(19,4,'OCTAVA.- ', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 208);
        $pdf->MultiCell(164,4,'El', 0, 'J', false);

        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 208);
        $pdf->MultiCell(164,4,'       Profesionista   en   Entrenamiento  ', 0, 'J', false);

        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 208);
        $pdf->MultiCell(164,4,'                                                                    recibirá    la     instrucción  y   desarrollará  sus   actividades   en    la   ', 0, 'J', false);


        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 208);
        $pdf->MultiCell(164,4,'                                                                                                                                                                       '.utf8_decode($row['ID_Ger3']).' de la ' .utf8_decode($row['ID_Sub3']).' de la '.utf8_decode($row['ID_Dir3']).', ubicada en '.utf8_decode($row['Ubicacion']).'.', 0, 'J', false);




        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(194, 248);
        $pdf->MultiCell(4,4,'2', 0, 'J', false);

        $pdf->AddPage('P', 'Letter'); //Vertical, Carta
        $pdf->SetXY(15, 20);
        $pdf->MultiCell(19,4,'NOVENA.- ', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 20);
        $pdf->MultiCell(171,4,'El', 0, 'J', false); 


        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 20);
        $pdf->MultiCell(171,4,'    Profesionista en Entrenamiento', 0, 'J', false); 

        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 20);
        $pdf->MultiCell(171,4,'                                                           acepta que durante el tiempo que dure su formación, deberá cumplir con lo siguiente:', 0, 'J', false); 



        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(25, 32);
        $pdf->MultiCell(5,4,'*', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 32);
        $pdf->MultiCell(163,4,'Realizar actividades inherentes a su entrenamiento durante el periodo autorizado, y cumplir con las actividades de formación teórica y práctica, conforme a las instrucciones del Asesor Técnico;', 0, 'J', false); 
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(25, 48);
        $pdf->MultiCell(5,4,'*', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 48);
        $pdf->MultiCell(163,4,'Conocer y cumplir las normas de seguridad industrial, protección ambiental y salud ocupacional establecidas en el lugar en donde realice las actividades correspondientes a su formación profesional;', 0, 'J', false); 
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(25, 64);
        $pdf->MultiCell(5,4,'*', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 64);
        $pdf->MultiCell(163,4,'Guardar estricta confidencialidad respecto a la información de los asuntos y documentos a los que tenga acceso y darles un uso adecuado conforme a lo instruido por su Asesor Técnico, así como custodiar la documentación y evitar su sustracción, destrucción o reproducción para otros fines que no sean los del área en la que desarrolla su entrenamiento.', 0, 'J', false); 
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(25, 84);
        $pdf->MultiCell(5,4,'*', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 84);
        $pdf->MultiCell(163,4,'Cumplir con las indicaciones y recomendaciones de su Asesor Técnico, quien en su ausencia designará a la persona que le asesorará en las actividades a desarrollar en relación con el presente Convenio;', 0, 'J', false); 
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(25, 100);
        $pdf->MultiCell(5,4,'', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 100);
        $pdf->MultiCell(163,4,'Conservar en buen estado los instrumentos que utilice en el Proyecto;', 0, 'J', false); 
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(25, 112);
        $pdf->MultiCell(5,4,'*', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 112);
        $pdf->MultiCell(163,4,'Observar buenas costumbres y tratar con respeto a las personas con quienes se relacione durante su entrenamiento;', 0, 'J', false); 
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(25, 124);
        $pdf->MultiCell(5,4,'*', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 124);
        $pdf->MultiCell(163,4,'Realizar y aprobar los exámenes periódicos que se le practiquen, de conformidad con lo establecido por el área usuaria en la cual desarrolla su entrenamiento;', 0, 'J', false); 
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(25, 140);
        $pdf->MultiCell(5,4,'*', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 140);
        $pdf->MultiCell(163,4,'Dar aviso a la brevedad al Asesor Técnico designado, salvo caso fortuito o fuerza mayor, de las causas justificadas que le impidan asistir a desarrollar las actividades propias del Proyecto en el que participa;', 0, 'J', false); 
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(25, 156);
        $pdf->MultiCell(5,4,'*', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 156);
        $pdf->MultiCell(163,4,'Portar el documento de identificación que le permita el acceso al área usuaria donde participará en su entrenamiento, que para tal efecto le proporcionará la Superintendencia de Vigilancia y Control de Accesos,', 0, 'J', false); 
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(25, 172);
        $pdf->MultiCell(5,4,'*', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 172);
        $pdf->MultiCell(163,4,'Elaborar al término de su entrenamiento, un reporte acerca de las actividades realizadas.', 0, 'J', false); 
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(15, 186);
        $pdf->MultiCell(19,4,'DÉCIMA.- ', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 186);
        $pdf->MultiCell(163,4,'Son causas de cancelación del presente Convenio:', 0, 'J', false); 
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(25, 198);
        $pdf->MultiCell(5,4,'*', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 198);
        $pdf->MultiCell(163,4,'El incumplimiento de lo dispuesto en el presente documento o las normas técnicas, de seguridad o administrativas necesarias para el funcionamiento del área usuaria en la cual desarrolla su entrenamiento;', 0, 'J', false); 
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(25, 214);
        $pdf->MultiCell(5,4,'*', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 214);
        $pdf->MultiCell(163,4,'Poner en peligro su seguridad o la de los trabajadores, o hacer uso indebido de las instalaciones, equipo, maquinaria, materiales, herramientas y bienes propiedad de' , 0, 'J', false); 



         $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 218);
        $pdf->MultiCell(163,4,'                                                                             PEMEX;', 0, 'J', false); 




        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(25, 230);
        $pdf->MultiCell(5,4,'*', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 230);
        $pdf->MultiCell(163,4,'Propiciar o participar en el relajamiento de la disciplina y las buenas costumbres en el lugar donde se encuentre participando en su entrenamiento;', 0, 'J', false); 
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(194, 248);
        $pdf->MultiCell(4,4,'3', 0, 'J', false);

        $pdf->AddPage('P', 'Letter'); //Vertical, Carta
        $pdf->SetXY(25, 20);
        $pdf->MultiCell(5,4,'*', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 20);
        $pdf->MultiCell(163,4,'Obtener un bajo aprovechamiento en las evaluaciones que le aplique el Asesor Técnico', 0, 'J', false); 
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(25, 32);
        $pdf->MultiCell(5,4,'*', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 32);
        $pdf->MultiCell(163,4,'Presentar documentación falsa;', 0, 'J', false); 
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(25, 44);
        $pdf->MultiCell(5,4,'*', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 44);
        $pdf->MultiCell(163,4,'Realizar u omitir algún acto que, a juicio del área usuaria, amerite la cancelación del Convenio de entrenamiento,', 0, 'J', false); 
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(25, 56);
        $pdf->MultiCell(5,4,'*', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 56);
        $pdf->MultiCell(163,4,'Tener 1% de inasistencias injustificadas al mes.', 0, 'J', false); 
        $pdf->SetXY(28, 68);
        $pdf->MultiCell(163,4,'Adicionalmente, las partes podrán terminar anticipadamente este Convenio por así convenir a sus intereses.', 0, 'J', false);
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(15, 80);
        $pdf->MultiCell(30,4,'DÉCIMA PRIMERA.- ', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(46, 80);
        $pdf->MultiCell(163,4,'Son causas de suspensión del presente Convenio de entrenamiento:', 0, 'J', false); 
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(25, 92);
        $pdf->MultiCell(5,4,'*', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 92);
        $pdf->MultiCell(163,4,'La  enfermedad  o  imposibilidad de  poder asistir  a  desarrollar sus actividades. Una vez resuelta la causa que imposibilitó al', 0, 'J', false);  

        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 96);
        $pdf->MultiCell(163,4,'Profesionista en Entrenamiento', 0, 'J', false); 

        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 96);
        $pdf->MultiCell(163,4,'                                           su asistencia, continuará sus actividades hasta por el término de la vigencia del presente instrumento, descontándosele los días que haya faltado, y', 0, 'J', false);



        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(25, 112);
        $pdf->MultiCell(5,4,'*', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 112);
        $pdf->MultiCell(163,4,'La insuficiencia presupuestal', 0, 'J', false); 
        $pdf->SetXY(28, 124);
        $pdf->MultiCell(163,4,'Número   de  Registro    asignado    por la SUBDIRECCIÓN DE RECURSOS HUMANOS DCAS-SRH-GRS-', 0, 'J', false);

        $pdf->SetXY(28, 129);
        $pdf->MultiCell(163,4,'             -CONVENIO/2018.', 0, 'J', false);

        $pdf->SetXY(130, 136);
        $pdf->MultiCell(80,4,''.$fconvenio, 0, 'J', false);
                $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(44, 154);
        $pdf->MultiCell(40,4,'PETRÓLEOS MEXICANOS', 0, 'C', false);
        $pdf->SetXY(116, 154);
        $pdf->MultiCell(60,4,'PROFESIONISTA EN ENTRENAMIENTO', 0, 'C', false);
        $pdf->SetXY(30, 170);
        $pdf->MultiCell(70,4,'LIC. MONICA WATTY URISTA
GERENTE DE RECLUTAMIENTO Y SELECCION', 0, 'C', false);
        $pdf->SetXY(118, 170);
        $pdf->MultiCell(80,4,'C. ' .utf8_decode($row['Nombre_Est']).' '.utf8_decode($row['ApPaterno_Est']).' '.utf8_decode($row['ApMaterno_Est']), 0, 'L', false);
        $pdf->SetXY(90, 190);
        $pdf->MultiCell(30,4,'AREA USUARIA', 0, 'C', false);
        $pdf->SetXY(50, 206);
        $pdf->MultiCell(110,4,''.utf8_decode($row['Nombre_Gerente']).'
'.utf8_decode($row['CargoGerente']), 0, 'C', false);
        $pdf->SetXY(194, 248);
        $pdf->MultiCell(4,4,'4', 0, 'J', false);



        $pdf->Output();  

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
