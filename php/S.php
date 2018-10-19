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

        $consulta="SELECT A.ID_Est, A.Ano_Reg, A.ApPaterno_Est, A.ApMaterno_Est, A.Nombre_Est, A.Egresado, A.Carrera, A.ID_Institucion2, A.Plantel, A.Creditos, A.Doctor, A.Ceduladr, A.Domicilio, A.Colonia, A.Delegacion, A.CP, A.Estado, B.Proyecto, B.ID_Ger3, B.ID_Sub3, B.ID_Dir3, B.Nombre_Asesor, B.Cvedepto, B.F_InicioRen, B.F_FinalRen, B.F_RenConvenio, B.Hr_Inicio, B.Hr_Final, B.Ubicacion, B.Nombre_Gerente, B.CargoGerente FROM datospersonales A, datosarea B WHERE A.ID_Est=$idalumno and B.ID_Estudiante3=$idalumno and A.Ano_Reg=$anoreg";
                    $resid=$conexion->query($consulta);
                    $row=mysqli_fetch_array($resid);
        $date1=explode("-", $row['F_InicioRen']);    
        $date2=explode("-", $row['F_FinalRen']);        
        $date3=explode("-", $row['F_RenConvenio']);  
        $meses = array('01'=>'Enero', '02'=>'Febrero', '03'=>'Marzo', '04'=>'Abril', '05'=>'Mayo', '06'=>'Junio', '07'=>'Julio',
                   '08'=>'Agosto', '09'=>'Septiembre', '10'=>'Octubre', '11'=>'Noviembre', '12'=>'Diciembre');    
        $inicio=$date1[2]." de ".$meses[$date1[1]]." de ".$date1[0];                    
        $final=$date2[2]." de ".$meses[$date2[1]]." de ".$date2[0];              
        $fconvenio="Ciudad de M�xico, a ".$date3[2]." de ".$meses[$date3[1]]." de ".$date3[0]; 

	    $pdf = new PDF_HTML();
	    $pdf->AddPage('P', 'Letter'); //Vertical, Carta
        $pdf->AddFont('narrow','','narrow.php');
        $pdf->SetFont('narrow','',9);
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
    	$pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(0, 20);
        $pdf->MultiCell(217,4,'PETR�LEOS MEXICANOS
DIRECCI�N CORPORATIVA DE ADMINISTRACI�N Y SERVICIOS
SUBDIRECCI�N DE RECURSOS HUMANOS
GERENCIA DE RECLUTAMIENTO Y SELECCI�N', 0, 'C', false);
        $pdf->SetXY(15, 50);
        $pdf->MultiCell(184,4,'CONVENIO DE ENTRENAMIENTO QUE CELEBRAN POR UNA PARTE PETR�LEOS MEXICANOS, REPRESENTADO EN ESTE ACTO POR LA LIC. MONICA WATTY URISTA EN SU CAR�CTER DE GERENTE DE RECLUTAMIENTO Y SELECCION, A QUIEN EN LO SUCESIVO SE LE DENOMINAR� "PEMEX", Y AL C. '.utf8_decode($row['Nombre_Est']).' '.utf8_decode($row['ApPaterno_Est']).' '.utf8_decode($row['ApMaterno_Est']).', QUIEN EN LO SUCESIVO SE LE DENOMINAR� "PROFESIONISTA EN ENTRENAMIENTO", AL TENOR DE LAS SIGUIENTES DECLARACIONES Y CL�USULAS:', 0, 'J', false);
        $pdf->SetXY(15, 70);
        $pdf->MultiCell(184,4,'DECLARACIONES', 0, 'C', false);
        $pdf->SetXY(15, 80);
        $pdf->MultiCell(184,4,'1.   "PEMEX" DECLARA, A TRAV�S DE SU APODERADO, QUE:', 0, 'J', false);
        $pdf->SetXY(15, 90);
        $pdf->MultiCell(10,4,'1.1', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(28, 90);

      $pdf->MultiCell(171,4, "Petr�leos exicanos es una empresa productiva del Estado con r�gimen especial, de propiedad exclusiva del Gobierno Federal, con personalidad jur�dica y patrimonio propios, que goza de autonom�a t�cnica, operativa y de gesti�n, cuyo objeto consiste en llevar a cabo la exploraci�n y extracci�n del petr�leo y de los carburos de hidr�geno s�lidos, l�quidos o gaseosos, as� como su recolecci�n, venta y comercializaci�n, y tiene como fin el desarrollo de actividades empresariales, econ�micas, industriales y comerciales en t�rminos de dicho objeto, generando valor econ�mico y rentabilidad, para lo cual cuenta con la capacidad para celebrar toda clase de actos jur�dicos, entre otros, convenios, contratos, alianzas y asociaciones, con personas f�sicas o morales de los sectores p�blico, privado o social, nacional o internacional, en t�rminos de la Ley de Petr�leos Mexicanos, publicada en Diario Oficial de la Federaci�n el 11 de agosto de 2014.", 0, 'J', false);



        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(15, 126);
        $pdf->MultiCell(10,4,'1.2', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(28, 126);
        $pdf->MultiCell(171,4,'Cuenta con facultades para la firma del presente Convenio, lo cual acredita con el Estatuto Org�nico de Petr�leos Mexicanos vigente.', 0, 'J', false);
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(15, 138);
        $pdf->MultiCell(10,4,'1.3', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(28, 138);
        $pdf->MultiCell(171,4,'Para todos los efectos legales del presente instrumento, se�ala como su domicilio el ubicado en Avenida Marina Nacional N�mero 329, Edificio "B-2" piso 01, Colonia Veronica Anzures, Delegaci�n Miguel Hidalgo, C�digo Postal 11300, Ciudad de M�xico.', 0, 'J', false);
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
        $pdf->MultiCell(171,4,'Tiene inter�s de ser entrenado por PEMEX para continuar con su desarrollo profesional, a trav�s de la instrucci�n te�rica y pr�ctica requerida para el Proyecto '.utf8_decode($row['Proyecto']).". y a la vez, obtener el beneficio de una ayuda econ�mica. ", 0, 'J', false);

        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); 
        $pdf->SetXY(15, 182);
        $pdf->MultiCell(10,4,'2.2', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(28, 180);
        $pdf->Write(4,' Es ', 0, 'J', false);
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos        
        $pdf->Write(4,utf8_decode($row['Egresado']), 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos        
        $pdf->Write(4,'  en  el  plan  de  estudios establecido en la ', 0, 'J', false);
           
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos 
        $pdf->SetXY(28,180);  
        $pdf->MultiCell(171,4,'                                                                                   '.utf8_decode($row['Carrera']).' en el/la '.utf8_decode($row['ID_Institucion2']).'  en el/la  '.utf8_decode($row['Plantel']).', con un '.utf8_decode($row['Creditos']).' de cr�ditos.', 0, 'J', false);

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
        $pdf->MultiCell(171,4,' que emiti� el certificado,', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(28, 198);
        $pdf->MultiCell(171,4,' con ', 0, 'J', false);
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 198);
        $pdf->MultiCell(171,4,'C�dula Profesional No.'.utf8_decode($row['Ceduladr']).'.', 0, 'J', false);


         $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(15, 206);
        $pdf->MultiCell(10,4,'2.4', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(28, 206);
        $pdf->MultiCell(171,4,'Para los efectos legales del presente instrumento, se�ala como su domicilio en: ', 0, 'J', false);

        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(131, 206);
        $pdf->MultiCell(171,4,utf8_decode($row['Domicilio']).',', 0, 'J', false);

        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(28, 210);
        $pdf->MultiCell(171,4,'Colonia '.utf8_decode($row['Colonia']).', Delegaci�n '.utf8_decode($row['Delegacion']).', '.utf8_decode($row['Estado']).', '.utf8_decode($row['CP']), 0, 'J', false);

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
        $pdf->MultiCell(164,4,'                proporcionar�   al ' , 0, 'J', false);

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
        $pdf->MultiCell(164,4, '                                                                                                               '.utf8_decode($row['ID_Ger3']).' de la ' .utf8_decode($row['ID_Sub3']).' de la '.utf8_decode($row['ID_Dir3']).' y mediante el personal experto que designe para este prop�sito, sin detrimento de sus programas de trabajo y funciones b�sicas, la formaci�n, instrucci�n, entrenamiento o adiestramiento relacionado con el Proyecto ', 0, 'J', false);

        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 32);
        $pdf->MultiCell(164,4,'                                                                                                                                                      '.utf8_decode($row['Proyecto']).'.', 0, 'J', false);


        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 44);
        $pdf->MultiCell(164,4,'Esta instrucci�n la recibir� la/el Profesionista en Entrenamiento de manera te�rica y pr�ctica, lo que coadyuvar� a su formaci�n profesional, designando para tal fin este prop�sito al (a) '.utf8_decode($row['Nombre_Asesor']).', como Asesor T�cnico, con cargo presupuestal aplicable a la '.utf8_decode($row['ID_Ger3']).' de la ' .utf8_decode($row['ID_Sub3']).' de la '.utf8_decode($row['ID_Dir3']).' clave departamental '.utf8_decode($row['Cvedepto']).'', 0, 'J', false);

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
        $pdf->MultiCell(164,4,'                                                                 durante  la  vigencia  del  presente  Convenio, dispondr�  del  material  bibliogr�fico y manuales  t�cnicos, que en caso de ser necesario  le proporcionar� su  Asesor T�cnico, que  le  permitan aprovechar  en mejor  manera  la  formaci�n  te�rica  y  cumplir  con  sus  actividades,  asimismo,  el', 0, 'J', false);

        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(135, 85);
        $pdf->MultiCell(164,4,'           Profesionista en Entrenamiento', 0, 'J', false);

         $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 85);
        $pdf->MultiCell(164,4,'                                                                                                                                                                                               queda obligado(a) a cumplir con los programas te�ricos y pr�cticos que se le asignen, as� como con las indicaciones y disposiciones internas que sean parte de su formaci�n, someti�ndose adem�s a los ex�menes previos y peri�dicos de evaluaci�n de conocimientos y habilidades que se consideren necesarios.', 0, 'J', false);



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
        $pdf->MultiCell(164,4, '              no  ser�  responsable  por  cualquier  situaci�n  que  afecte  al ', 0, 'J', false);

            
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(126, 105);
        $pdf->MultiCell(164,4,' Profesionista  en  Entrenamiento' , 0, 'J', false);



            $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 105);
        $pdf->MultiCell(164,4,  '                                                                                                                                                                en sus intereses, derechos y obligaciones acad�micas ni laborales que pudiera tener con terceros.', 0, 'J', false);




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
        $pdf->MultiCell(164,4,'              otorgar� una ayuda econ�mica al/la' , 0, 'J', false);

           

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
        $pdf->MultiCell(164,4,'El monto de la ayuda econ�mica otorgada por ', 0, 'J', false);
                                
                                
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10);
        $pdf->SetXY(34, 128);
        $pdf->MultiCell(164,4,'                                                                           PEMEX', 0, 'J', false);

             
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10);
        $pdf->SetXY(34, 128);
        $pdf->MultiCell(164,4,'                                                                                        ser� por la cantidad de', 0, 'J', false); 


        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10);
        $pdf->SetXY(34, 128);
        $pdf->MultiCell(164,4,'                                                                                                                             3.5 salarios m�nimos' , 0, 'J', false);

        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10);
        $pdf->SetXY(34, 128);
        $pdf->MultiCell(164,4,'                                                                                                                                                            mensuales vigentes en la Ciudad de M�xico que se entregar�n al/la' , 0, 'J', false);

        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10);
        $pdf->SetXY(34, 132);
        $pdf->MultiCell(164,4,'                                                                      Profesionista en Entrenamiento', 0, 'J', false);


        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10);
        $pdf->SetXY(34, 132);
        $pdf->MultiCell(164,4, '                                                                                                               en el lugar donde se encuentra realizando las actividades para su desarrollo profesional. Dicha cantidad se otorgar� por mes vencido, contra la firma del documento expedido para tal fin, y en caso de faltar a sus actividades se descontar� la cantidad proporcional correspondiente a los d�as de inasistencia.', 0, 'J', false);




        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(15, 152);
        $pdf->MultiCell(19,4,'SEXTA.- ', 0, 'J', false);
   
       $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 152);
        $pdf->MultiCell(164,4,'Las partes aceptan y reconocen que el monto de la ayuda econ�mica se�alado en la Cl�usula QUINTA, no es un salario u honorario, ni asimilado a dichos conceptos, y no le otorga al', 0, 'J', false);


         $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 156);
        $pdf->MultiCell(164,4, '                                                                                                   Profesionista en Entrenamiento', 0, 'J', false);

         $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 156);
        $pdf->MultiCell(164,4,  '                                                                                                                                                     la categor�a de trabajador, ya que el presente instrumento no representa un contrato de trabajo ni de prestaci�n de servicios, sino un acuerdo para que', 0, 'J', false);

        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 164);
        $pdf->MultiCell(164,4, 'PEMEX' , 0, 'J', false);

        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 164);
        $pdf->MultiCell(164,4,'         proporcione dentro de sus instalaciones, a solicitud del interesado, el entrenamiento relacionado con su grado profesional que contribuya a su desarrollo profesional, cumpliendo con los requisitos establecidos en las Pol�ticas y Procedimientos de Administraci�n de Recursos Humanos y Relaciones Laborales en el apartado Personas candidatas en Formaci�n por lo que queda expresamente pactado, que este Convenio no implica relaci�n laboral o de intermediaci�n alguna en t�rminos del art�culo 13 de la Ley Federal del Trabajo, ni tampoco constituye una promesa o compromisos de contrataci�n entre', 0, 'J', false); 


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
        $pdf->MultiCell(164,4,'El horario que deber� cubrir el', 0, 'J', false); 

        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 194);
        $pdf->MultiCell(164,4,'                                                 Profesionista en Entrenamiento', 0, 'J', false);  

        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 194);
        $pdf->MultiCell(164,4,'                                                                                                        durante la realizaci�n de sus actividades es de', 0, 'J', false); 

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
        $pdf->MultiCell(164,4,'                                                                    recibir�    la     instrucci�n  y   desarrollar�  sus   actividades   en    la   ', 0, 'J', false);


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
        $pdf->MultiCell(171,4,'                                                           acepta que durante el tiempo que dure su formaci�n, deber� cumplir con lo siguiente:', 0, 'J', false); 



        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(25, 32);
        $pdf->MultiCell(5,4,'*', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 32);
        $pdf->MultiCell(163,4,'Realizar actividades inherentes a su entrenamiento durante el periodo autorizado, y cumplir con las actividades de formaci�n te�rica y pr�ctica, conforme a las instrucciones del Asesor T�cnico;', 0, 'J', false); 
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(25, 48);
        $pdf->MultiCell(5,4,'*', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 48);
        $pdf->MultiCell(163,4,'Conocer y cumplir las normas de seguridad industrial, protecci�n ambiental y salud ocupacional establecidas en el lugar en donde realice las actividades correspondientes a su formaci�n profesional;', 0, 'J', false); 
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(25, 64);
        $pdf->MultiCell(5,4,'*', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 64);
        $pdf->MultiCell(163,4,'Guardar estricta confidencialidad respecto a la informaci�n de los asuntos y documentos a los que tenga acceso y darles un uso adecuado conforme a lo instruido por su Asesor T�cnico, as� como custodiar la documentaci�n y evitar su sustracci�n, destrucci�n o reproducci�n para otros fines que no sean los del �rea en la que desarrolla su entrenamiento.', 0, 'J', false); 
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(25, 84);
        $pdf->MultiCell(5,4,'*', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 84);
        $pdf->MultiCell(163,4,'Cumplir con las indicaciones y recomendaciones de su Asesor T�cnico, quien en su ausencia designar� a la persona que le asesorar� en las actividades a desarrollar en relaci�n con el presente Convenio;', 0, 'J', false); 
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
        $pdf->MultiCell(163,4,'Realizar y aprobar los ex�menes peri�dicos que se le practiquen, de conformidad con lo establecido por el �rea usuaria en la cual desarrolla su entrenamiento;', 0, 'J', false); 
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(25, 140);
        $pdf->MultiCell(5,4,'*', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 140);
        $pdf->MultiCell(163,4,'Dar aviso a la brevedad al Asesor T�cnico designado, salvo caso fortuito o fuerza mayor, de las causas justificadas que le impidan asistir a desarrollar las actividades propias del Proyecto en el que participa;', 0, 'J', false); 
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(25, 156);
        $pdf->MultiCell(5,4,'*', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 156);
        $pdf->MultiCell(163,4,'Portar el documento de identificaci�n que le permita el acceso al �rea usuaria donde participar� en su entrenamiento, que para tal efecto le proporcionar� la Superintendencia de Vigilancia y Control de Accesos,', 0, 'J', false); 
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(25, 172);
        $pdf->MultiCell(5,4,'*', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 172);
        $pdf->MultiCell(163,4,'Elaborar al t�rmino de su entrenamiento, un reporte acerca de las actividades realizadas.', 0, 'J', false); 
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(15, 186);
        $pdf->MultiCell(19,4,'D�CIMA.- ', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 186);
        $pdf->MultiCell(163,4,'Son causas de cancelaci�n del presente Convenio:', 0, 'J', false); 
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(25, 198);
        $pdf->MultiCell(5,4,'*', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 198);
        $pdf->MultiCell(163,4,'El incumplimiento de lo dispuesto en el presente documento o las normas t�cnicas, de seguridad o administrativas necesarias para el funcionamiento del �rea usuaria en la cual desarrolla su entrenamiento;', 0, 'J', false); 
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
        $pdf->MultiCell(163,4,'Obtener un bajo aprovechamiento en las evaluaciones que le aplique el Asesor T�cnico', 0, 'J', false); 
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(25, 32);
        $pdf->MultiCell(5,4,'*', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 32);
        $pdf->MultiCell(163,4,'Presentar documentaci�n falsa;', 0, 'J', false); 
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(25, 44);
        $pdf->MultiCell(5,4,'*', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 44);
        $pdf->MultiCell(163,4,'Realizar u omitir alg�n acto que, a juicio del �rea usuaria, amerite la cancelaci�n del Convenio de entrenamiento,', 0, 'J', false); 
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(25, 56);
        $pdf->MultiCell(5,4,'*', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 56);
        $pdf->MultiCell(163,4,'Tener 1% de inasistencias injustificadas al mes.', 0, 'J', false); 
        $pdf->SetXY(28, 68);
        $pdf->MultiCell(163,4,'Adicionalmente, las partes podr�n terminar anticipadamente este Convenio por as� convenir a sus intereses.', 0, 'J', false);
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(15, 80);
        $pdf->MultiCell(30,4,'D�CIMA PRIMERA.- ', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(46, 80);
        $pdf->MultiCell(163,4,'Son causas de suspensi�n del presente Convenio de entrenamiento:', 0, 'J', false); 
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(25, 92);
        $pdf->MultiCell(5,4,'*', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 92);
        $pdf->MultiCell(163,4,'La  enfermedad  o  imposibilidad de  poder asistir  a  desarrollar sus actividades. Una vez resuelta la causa que imposibilit� al', 0, 'J', false);  

        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 96);
        $pdf->MultiCell(163,4,'Profesionista en Entrenamiento', 0, 'J', false); 

        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 96);
        $pdf->MultiCell(163,4,'                                           su asistencia, continuar� sus actividades hasta por el t�rmino de la vigencia del presente instrumento, descont�ndosele los d�as que haya faltado, y', 0, 'J', false);



        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(25, 112);
        $pdf->MultiCell(5,4,'*', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 112);
        $pdf->MultiCell(163,4,'La insuficiencia presupuestal', 0, 'J', false); 
        $pdf->SetXY(28, 124);
        $pdf->MultiCell(163,4,'N�mero   de  Registro    asignado    por la SUBDIRECCI�N DE RECURSOS HUMANOS DCAS-SRH-GRS-        -CONVENIO/2018.', 0, 'J', false);
        $pdf->SetXY(130, 136);
        $pdf->MultiCell(80,4,''.$fconvenio, 0, 'J', false);
                $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(44, 154);
        $pdf->MultiCell(40,4,'PETR�LEOS MEXICANOS', 0, 'C', false);
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
        $pdf->AddFont('narrow','','narrow.php');
        $pdf->SetFont('narrow','',9);
    
        $idalumno=$_POST['idalumno'];    
        $anoreg=$_POST['anoreg'];         
                    $consulta="SELECT A.ID_Est, A.Ano_Reg, A.ApPaterno_Est, A.ApMaterno_Est, A.Nombre_Est, A.Egresado, A.Carrera, A.ID_Institucion2, A.Plantel, A.Creditos, A.Doctor, A.Ceduladr, A.Domicilio, A.Colonia, A.Delegacion, A.CP, A.Estado, B.Proyecto, B.ID_Ger3, B.ID_Sub3, B.ID_Dir3, B.Nombre_Asesor, B.Cvedepto, B.F_InicioRen, B.F_FinalRen, B.F_RenConvenio, B.Hr_Inicio, B.Hr_Final, B.Ubicacion, B.Nombre_Gerente, B.CargoGerente FROM datospersonales A, datosarea B WHERE A.ID_Est=$idalumno and B.ID_Estudiante3=$idalumno and A.Ano_Reg=$anoreg";
                    $resid=$conexion->query($consulta);
                    $row=mysqli_fetch_array($resid);
        $date1=explode("-", $row['F_InicioRen']);    
        $date2=explode("-", $row['F_FinalRen']);        
        $date3=explode("-", $row['F_RenConvenio']);  
        $meses = array('01'=>'Enero', '02'=>'Febrero', '03'=>'Marzo', '04'=>'Abril', '05'=>'Mayo', '06'=>'Junio', '07'=>'Julio',
                   '08'=>'Agosto', '09'=>'Septiembre', '10'=>'Octubre', '11'=>'Noviembre', '12'=>'Diciembre');    
        $inicio=$date1[2]." de ".$meses[$date1[1]]." de ".$date1[0];                    
        $final=$date2[2]." de ".$meses[$date2[1]]." de ".$date2[0];              
        $fconvenio="Ciudad de M�xico, a ".$date3[2]." de ".$meses[$date3[1]]." de ".$date3[0]; 

        
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
       $pdf->SetXY(0, 20);
        $pdf->MultiCell(217,4,'PETR�LEOS MEXICANOS
DIRECCI�N CORPORATIVA DE ADMINISTRACI�N Y SERVICIOS
SUBDIRECCI�N DE RECURSOS HUMANOS
GERENCIA DE RECLUTAMIENTO Y SELECCI�N', 0, 'C', false);
        $pdf->SetXY(15, 50);
        $pdf->MultiCell(184,4,'CONVENIO DE ENTRENAMIENTO QUE CELEBRAN POR UNA PARTE PETR�LEOS MEXICANOS, REPRESENTADO EN ESTE ACTO POR LA LIC. MONICA WATTY URISTA EN SU CAR�CTER DE GERENTE DE RECLUTAMIENTO Y SELECCION, A QUIEN EN LO SUCESIVO SE LE DENOMINAR� "PEMEX", Y AL C. '.utf8_decode($row['Nombre_Est']).' '.utf8_decode($row['ApPaterno_Est']).' '.utf8_decode($row['ApMaterno_Est']).', QUIEN EN LO SUCESIVO SE LE DENOMINAR� "PROFESIONISTA EN ENTRENAMIENTO", AL TENOR DE LAS SIGUIENTES DECLARACIONES Y CL�USULAS:', 0, 'J', false);

     $pdf->SetXY(15, 70);
        $pdf->MultiCell(184,4,'DECLARACIONES', 0, 'C', false);


      
        
        $pdf->SetXY(15, 80);
        $pdf->WriteHTML('<p align="left">1.   PEMEX DECLARA, A TRAV�S DE SU APODERADO, QUE: </p> <br>', 0, 'J', false);

        $pdf->SetXY(15, 90);
        $pdf->MultiCell(10,4,'1.1', 0, 'J', false);
             

        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(28, 90);
        $pdf->MultiCell(171,4,"Petr�leos Mexicanos es una empresa productiva del Estado con r�gimen especial, de propiedad exclusiva del Gobierno Federal, con personalidad jur�dica y patrimonio propios, que goza de autonom�a t�cnica, operativa y de gesti�n, cuyo objeto consiste en llevar a cabo la exploraci�n y extracci�n del petr�leo y de los carburos de hidr�geno s�lidos, l�quidos o gaseosos, as� como su recolecci�n, venta y comercializaci�n, y tiene como fin el desarrollo de actividades empresariales, econ�micas, industriales y comerciales en t�rminos de dicho objeto, generando valor econ�mico y rentabilidad, para lo cual cuenta con la capacidad para celebrar toda clase de actos jur�dicos, entre otros, convenios, contratos, alianzas y asociaciones, con personas f�sicas o morales de los sectores p�blico, privado o social, nacional o internacional, en t�rminos de la Ley de Petr�leos Mexicanos, publicada en Diario Oficial de la Federaci�n el 11 de agosto de 2014.", 0, 'J', false);
     
        

        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(15, 126);
        $pdf->MultiCell(10,4,'1.2', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(28, 126);
        $pdf->MultiCell(171,4,'Cuenta con facultades para la firma del presente Convenio, lo cual acredita con el Estatuto Org�nico de Petr�leos Mexicanos vigente.', 0, 'J', false);
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(15, 138);
        $pdf->MultiCell(10,4,'1.3', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(28, 138);
        $pdf->MultiCell(171,4,'Para todos los efectos legales del presente instrumento, se�ala como su domicilio el ubicado en Avenida Marina Nacional N�mero 329, Edificio "B-2" piso 01, Colonia Petr�leos Mexicanos, Delegaci�n Miguel Hidalgo, C�digo Postal 11311, Ciudad de M�xico.', 0, 'J', false);
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
        $pdf->MultiCell(170,4,'Tiene inter�s de ser entrenado por PEMEX para continuar con su desarrollo profesional, a trav�s de la instrucci�n te�rica y pr�ctica requerida para el Proyecto '.utf8_decode($row['Proyecto']).' y, a la vez, obtener el beneficio de una ayuda econ�mica.', 0, 'J', false);
        
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
        $pdf->MultiCell(171,4,'                                                                                   '.utf8_decode($row['Carrera']).' en el/la '.utf8_decode($row['ID_Institucion2']).'  en el/la  '.utf8_decode($row['Plantel']).', con un '.utf8_decode($row['Creditos']).' de cr�ditos.', 0, 'J', false);



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
        $pdf->MultiCell(171,4,' que emiti� el certificado,', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(28, 198);
        $pdf->MultiCell(171,4,' con ', 0, 'J', false);
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 198);
        $pdf->MultiCell(171,4,'C�dula Profesional No.'.utf8_decode($row['Ceduladr']).'.', 0, 'J', false);
        






        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(15, 206);
        $pdf->MultiCell(10,4,'2.4', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(28, 206);
        $pdf->MultiCell(171,4,'Para los efectos legales del presente instrumento, se�ala como su domicilio en: ', 0, 'J', false);

        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(131, 206);
        $pdf->MultiCell(171,4,utf8_decode($row['Domicilio']).',', 0, 'J', false);

        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(28, 210);
        $pdf->MultiCell(171,4,'Colonia '.utf8_decode($row['Colonia']).', Delegaci�n '.utf8_decode($row['Delegacion']).', '.utf8_decode($row['Estado']).', '.utf8_decode($row['CP']), 0, 'J', false);

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
        $pdf->MultiCell(164,4,'                proporcionar�   al ' , 0, 'J', false);

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
        $pdf->MultiCell(164,4, '                                                                                                               '.utf8_decode($row['ID_Ger3']).' de la ' .utf8_decode($row['ID_Sub3']).' de la '.utf8_decode($row['ID_Dir3']).' y mediante el personal experto que designe para este prop�sito, sin detrimento de sus programas de trabajo y funciones b�sicas, la formaci�n, instrucci�n, entrenamiento o adiestramiento relacionado con el Proyecto ', 0, 'J', false);

        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 32);
        $pdf->MultiCell(164,4,'                                                                                                                                                      '.utf8_decode($row['Proyecto']).'.', 0, 'J', false);


        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 44);
        $pdf->MultiCell(164,4,'Esta instrucci�n la recibir� la/el Profesionista en Entrenamiento de manera te�rica y pr�ctica, lo que coadyuvar� a su formaci�n profesional, designando para tal fin este prop�sito al (a) '.utf8_decode($row['Nombre_Asesor']).', como Asesor T�cnico, con cargo presupuestal aplicable a la '.utf8_decode($row['ID_Ger3']).' de la ' .utf8_decode($row['ID_Sub3']).' de la '.utf8_decode($row['ID_Dir3']).' clave departamental '.utf8_decode($row['Cvedepto']).'', 0, 'J', false);
                 

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
        $pdf->MultiCell(164,4,'                                                                 durante  la  vigencia  del  presente  Convenio, dispondr�  del  material  bibliogr�fico y manuales  t�cnicos, que en caso de ser necesario  le proporcionar� su  Asesor T�cnico, que  le  permitan aprovechar  en mejor  manera  la  formaci�n  te�rica  y  cumplir  con  sus  actividades,  asimismo,  el', 0, 'J', false);

        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(135, 85);
        $pdf->MultiCell(164,4,'           Profesionista en Entrenamiento', 0, 'J', false);

         $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 85);
        $pdf->MultiCell(164,4,'                                                                                                                                                                                               queda obligado(a) a cumplir con los programas te�ricos y pr�cticos que se le asignen, as� como con las indicaciones y disposiciones internas que sean parte de su formaci�n, someti�ndose adem�s a los ex�menes previos y peri�dicos de evaluaci�n de conocimientos y habilidades que se consideren necesarios.', 0, 'J', false);



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
        $pdf->MultiCell(164,4, '              no  ser�  responsable  por  cualquier  situaci�n  que  afecte  al ', 0, 'J', false);

            
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(126, 105);
        $pdf->MultiCell(164,4,' Profesionista  en  Entrenamiento' , 0, 'J', false);



            $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 105);
        $pdf->MultiCell(164,4,  '                                                                                                                                                                en sus intereses, derechos y obligaciones acad�micas ni laborales que pudiera tener con terceros.', 0, 'J', false);




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
        $pdf->MultiCell(164,4,'              otorgar� una ayuda econ�mica al/la' , 0, 'J', false);

           

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
        $pdf->MultiCell(164,4,'El monto de la ayuda econ�mica otorgada por ', 0, 'J', false);
                                
                                
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10);
        $pdf->SetXY(34, 128);
        $pdf->MultiCell(164,4,'                                                                           PEMEX', 0, 'J', false);

             
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10);
        $pdf->SetXY(34, 128);
        $pdf->MultiCell(164,4,'                                                                                        ser� por la cantidad de', 0, 'J', false); 


        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10);
        $pdf->SetXY(34, 128);
        $pdf->MultiCell(164,4,'                                                                                                                             3.5 salarios m�nimos' , 0, 'J', false);

        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10);
        $pdf->SetXY(34, 128);
        $pdf->MultiCell(164,4,'                                                                                                                                                            mensuales vigentes en la Ciudad de M�xico que se entregar�n al/la' , 0, 'J', false);

        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10);
        $pdf->SetXY(34, 132);
        $pdf->MultiCell(164,4,'                                                                      Profesionista en Entrenamiento', 0, 'J', false);


        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10);
        $pdf->SetXY(34, 132);
        $pdf->MultiCell(164,4, '                                                                                                               en el lugar donde se encuentra realizando las actividades para su desarrollo profesional. Dicha cantidad se otorgar� por mes vencido, contra la firma del documento expedido para tal fin, y en caso de faltar a sus actividades se descontar� la cantidad proporcional correspondiente a los d�as de inasistencia.', 0, 'J', false);




        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(15, 152);
        $pdf->MultiCell(19,4,'SEXTA.- ', 0, 'J', false);
   
       $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 152);
        $pdf->MultiCell(164,4,'Las partes aceptan y reconocen que el monto de la ayuda econ�mica se�alado en la Cl�usula QUINTA, no es un salario u honorario, ni asimilado a dichos conceptos, y no le otorga al', 0, 'J', false);


         $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 156);
        $pdf->MultiCell(164,4, '                                                                                                   Profesionista en Entrenamiento', 0, 'J', false);

         $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 156);
        $pdf->MultiCell(164,4,  '                                                                                                                                                     la categor�a de trabajador, ya que el presente instrumento no representa un contrato de trabajo ni de prestaci�n de servicios, sino un acuerdo para que', 0, 'J', false);

        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 164);
        $pdf->MultiCell(164,4, 'PEMEX' , 0, 'J', false);

        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 164);
        $pdf->MultiCell(164,4,'         proporcione dentro de sus instalaciones, a solicitud del interesado, el entrenamiento relacionado con su grado profesional que contribuya a su desarrollo profesional, cumpliendo con los requisitos establecidos en las Pol�ticas y Procedimientos de Administraci�n de Recursos Humanos y Relaciones Laborales en el apartado Personas candidatas en Formaci�n por lo que queda expresamente pactado, que este Convenio no implica relaci�n laboral o de intermediaci�n alguna en t�rminos del art�culo 13 de la Ley Federal del Trabajo, ni tampoco constituye una promesa o compromisos de contrataci�n entre', 0, 'J', false); 


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
        $pdf->MultiCell(164,4,'El horario que deber� cubrir el', 0, 'J', false); 

        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 194);
        $pdf->MultiCell(164,4,'                                                 Profesionista en Entrenamiento', 0, 'J', false);  

        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 194);
        $pdf->MultiCell(164,4,'                                                                                                        durante la realizaci�n de sus actividades es de', 0, 'J', false); 

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
        $pdf->MultiCell(164,4,'                                                                    recibir�    la     instrucci�n  y   desarrollar�  sus   actividades   en    la   ', 0, 'J', false);


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
        $pdf->MultiCell(171,4,'                                                           acepta que durante el tiempo que dure su formaci�n, deber� cumplir con lo siguiente:', 0, 'J', false); 



        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(25, 32);
        $pdf->MultiCell(5,4,'*', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 32);
        $pdf->MultiCell(163,4,'Realizar actividades inherentes a su entrenamiento durante el periodo autorizado, y cumplir con las actividades de formaci�n te�rica y pr�ctica, conforme a las instrucciones del Asesor T�cnico;', 0, 'J', false); 
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(25, 48);
        $pdf->MultiCell(5,4,'*', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 48);
        $pdf->MultiCell(163,4,'Conocer y cumplir las normas de seguridad industrial, protecci�n ambiental y salud ocupacional establecidas en el lugar en donde realice las actividades correspondientes a su formaci�n profesional;', 0, 'J', false); 
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(25, 64);
        $pdf->MultiCell(5,4,'*', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 64);
        $pdf->MultiCell(163,4,'Guardar estricta confidencialidad respecto a la informaci�n de los asuntos y documentos a los que tenga acceso y darles un uso adecuado conforme a lo instruido por su Asesor T�cnico, as� como custodiar la documentaci�n y evitar su sustracci�n, destrucci�n o reproducci�n para otros fines que no sean los del �rea en la que desarrolla su entrenamiento.', 0, 'J', false); 
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(25, 84);
        $pdf->MultiCell(5,4,'*', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 84);
        $pdf->MultiCell(163,4,'Cumplir con las indicaciones y recomendaciones de su Asesor T�cnico, quien en su ausencia designar� a la persona que le asesorar� en las actividades a desarrollar en relaci�n con el presente Convenio;', 0, 'J', false); 
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
        $pdf->MultiCell(163,4,'Realizar y aprobar los ex�menes peri�dicos que se le practiquen, de conformidad con lo establecido por el �rea usuaria en la cual desarrolla su entrenamiento;', 0, 'J', false); 
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(25, 140);
        $pdf->MultiCell(5,4,'*', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 140);
        $pdf->MultiCell(163,4,'Dar aviso a la brevedad al Asesor T�cnico designado, salvo caso fortuito o fuerza mayor, de las causas justificadas que le impidan asistir a desarrollar las actividades propias del Proyecto en el que participa;', 0, 'J', false); 
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(25, 156);
        $pdf->MultiCell(5,4,'*', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 156);
        $pdf->MultiCell(163,4,'Portar el documento de identificaci�n que le permita el acceso al �rea usuaria donde participar� en su entrenamiento, que para tal efecto le proporcionar� la Superintendencia de Vigilancia y Control de Accesos,', 0, 'J', false); 
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(25, 172);
        $pdf->MultiCell(5,4,'*', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 172);
        $pdf->MultiCell(163,4,'Elaborar al t�rmino de su entrenamiento, un reporte acerca de las actividades realizadas.', 0, 'J', false); 
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(15, 186);
        $pdf->MultiCell(19,4,'D�CIMA.- ', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 186);
        $pdf->MultiCell(163,4,'Son causas de cancelaci�n del presente Convenio:', 0, 'J', false); 
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(25, 198);
        $pdf->MultiCell(5,4,'*', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 198);
        $pdf->MultiCell(163,4,'El incumplimiento de lo dispuesto en el presente documento o las normas t�cnicas, de seguridad o administrativas necesarias para el funcionamiento del �rea usuaria en la cual desarrolla su entrenamiento;', 0, 'J', false); 
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
        $pdf->MultiCell(163,4,'Obtener un bajo aprovechamiento en las evaluaciones que le aplique el Asesor T�cnico', 0, 'J', false); 
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(25, 32);
        $pdf->MultiCell(5,4,'*', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 32);
        $pdf->MultiCell(163,4,'Presentar documentaci�n falsa;', 0, 'J', false); 
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(25, 44);
        $pdf->MultiCell(5,4,'*', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 44);
        $pdf->MultiCell(163,4,'Realizar u omitir alg�n acto que, a juicio del �rea usuaria, amerite la cancelaci�n del Convenio de entrenamiento,', 0, 'J', false); 
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(25, 56);
        $pdf->MultiCell(5,4,'*', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 56);
        $pdf->MultiCell(163,4,'Tener 1% de inasistencias injustificadas al mes.', 0, 'J', false); 
        $pdf->SetXY(28, 68);
        $pdf->MultiCell(163,4,'Adicionalmente, las partes podr�n terminar anticipadamente este Convenio por as� convenir a sus intereses.', 0, 'J', false);
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(15, 80);
        $pdf->MultiCell(30,4,'D�CIMA PRIMERA.- ', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(46, 80);
        $pdf->MultiCell(163,4,'Son causas de suspensi�n del presente Convenio de entrenamiento:', 0, 'J', false); 
        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(25, 92);
        $pdf->MultiCell(5,4,'*', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 92);
        $pdf->MultiCell(163,4,'La  enfermedad  o  imposibilidad de  poder asistir  a  desarrollar sus actividades. Una vez resuelta la causa que imposibilit� al', 0, 'J', false);  

        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 96);
        $pdf->MultiCell(163,4,'Profesionista en Entrenamiento', 0, 'J', false); 

        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 96);
        $pdf->MultiCell(163,4,'                                           su asistencia, continuar� sus actividades hasta por el t�rmino de la vigencia del presente instrumento, descont�ndosele los d�as que haya faltado, y', 0, 'J', false);



        $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(25, 112);
        $pdf->MultiCell(5,4,'*', 0, 'J', false);
        $pdf->AddFont('narrow','','narrow.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrow','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(34, 112);
        $pdf->MultiCell(163,4,'La insuficiencia presupuestal', 0, 'J', false); 
        $pdf->SetXY(28, 124);
        $pdf->MultiCell(163,4,'N�mero   de  Registro    asignado    por la SUBDIRECCI�N DE RECURSOS HUMANOS DCAS-SRH-GRS-        -CONVENIO/2018.', 0, 'J', false);
        $pdf->SetXY(130, 136);
        $pdf->MultiCell(80,4,''.$fconvenio, 0, 'J', false);
                $pdf->AddFont('narrowb','','narrowb.php'); //Arial, negrita, 12 puntos
        $pdf->SetFont('narrowb','',10); //Arial, negrita, 12 puntos
        $pdf->SetXY(44, 154);
        $pdf->MultiCell(40,4,'PETR�LEOS MEXICANOS', 0, 'C', false);
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

        $consulta3="SELECT * FROM OficioGuardado WHERE idalumno='$idalumno' AND anoregistro='$anoreg' AND toficio='RENOVACION DE CONVENIO'";
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
                
                $query ="UPDATE OficioGuardado SET toficio='RENOVACION DE CONVENIO', idalumno='$idalumno', anoregistro='$anoreg' WHERE idalumno='$idalumno' AND anoregistro='$anoreg' AND toficio='RENOVACION DE CONVENIO'";
                $resultado=mysqli_query($conexion, $query);
                if (!$resultado)
                {
                    //echo "datos escolares no insertados".mysqli_error($conexion);             
                    echo "error en la consulta".mysqli_error($conexion);                
                }           
            }
            else
            {
                $query = "INSERT INTO OficioGuardado (toficio, idalumno, anoregistro) values ('RENOVACION DE CONVENIO', '$idalumno', '$anoreg')";
                $resultado=mysqli_query($conexion, $query);
                if (!$resultado)
                {
                    echo mysqli_error($conexion);                
                }
            }
        }             
    }    
?>