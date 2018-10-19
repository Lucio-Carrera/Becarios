<?php  
	require('conexion.php');		
	$query="SELECT ID_Org, Organismo FROM organismos";
	$result=$conexion->query($query);		
	require("navegacion.php");	
	require("editReg.php");

?>
	<body>
		<?php  
			if(isset($_GET['ID_alumno'])) 
			{
				require("conexion.php");
				$ID_alumno=$_GET['ID_alumno'];	
				$anoreg=$_GET['anoreg'];	        
		        $consulta="SELECT A.ID_Est, A.Ano_Reg, A.ApPaterno_Est, A.ApMaterno_Est, A.Nombre_Est, A.RFC, A.Domicilio, A.Colonia, A.Delegacion, A.CP, A.Estado, A.ID_Institucion2, A.Plantel, A.Egresado, A.Carrera, A.Creditos, A.Doctor, A.Ceduladr, A.Curp, A.Correo, B.ID_Org3, B.ID_Dir3, B.ID_Sub3, B.ID_Ger3, B.Nombre_Asesor, B.CargoAsesor, B.Extension, B.Cvedepto, B.Ubicacion, B.F_Inicio, B.F_Final, B.Hr_Inicio, B.Hr_Final, B.Proyecto, B.F_Convenio, B.Nombre_Gerente, B.CargoGerente, B.FuncionarioNombre,B.FuncionarioCargo, B.F_InicioRen, B.F_FinalRen, B.F_RenConvenio, B.acreedor, B.ccosto, B.pfinanciera, B.ppresupuestario, B.fondo, B.cmayor, B.CcGen, B.division, B.eps,B.H_Especifico FROM datospersonales A, datosarea B WHERE A.ID_Est=$ID_alumno and A.Ano_Reg=$anoreg and B.ID_Estudiante3=$ID_alumno and B.Ano_Reg=$anoreg";
				$resBol=$conexion->query($consulta);	
				if (!$resBol) {
					echo "consulta no ejecutada".mysqli_error($conexion);
				}	
				else
				{ 	
					$numReg=mysqli_num_rows($resBol);
					if ($numReg==0) {
						?>						
						<div style="width:300px;margin:10px auto;">
						<div class='alert alert-danger error' role='alert'>
							<strong>El estudiante no existe</strong>
						</div>
						<form method="POST">	
							<div class="row">
								<div class="col">
									<input style="width: 200px;" class="form-control" type="text" name="boleta" placeholder="Ingresa la boleta" required>				
								</div>
								<div class="col">
									<input class="btn btn-info" type="submit" name="enviar">
								</div>	
							</div>						
						</form>			
					</div>

						<?php
					}	
					else
					{										
						$row=mysqli_fetch_array($resBol);
						
							?>
				<div class="container">		
							<div id="error">
							<?php echo $error; echo $registrado;?>
							</div>														
							<form method="POST">
						<h4>Datos personales</h4>		  		
				  		<div class="row">
				  			<div class="col">
				  				<label>Número de folio</label>
				      			<input type="text" class="form-control text-upper" name="ID_Est" value="<?php echo $row['ID_Est']; ?>" readonly>
				    		</div>		  			
				  			<div class="col">
				  				<label>Año de registro</label>
				      			<input type="number" class="form-control text-upper" name="anoReg" value="<?php echo $row['Ano_Reg']; ?>" onKeyDown="return limitar(event,this.value,4)" required readonly>
				    		</div>
				    		<div class="col">
				    			<label>Apellido Paterno</label>
				      			<input type="text" class="form-control text-upper" name="ap-pat" value="<?php echo $row['ApPaterno_Est']; ?>" onKeyDown="return limitar(event,this.value,30)" required>
				    		</div>		
				    		<div class="col">
				    			<label>Apellido Materno</label>
				      			<input type="text" class="form-control text-upper" name="ap-mat" value="<?php echo $row['ApMaterno_Est'] ?>" onKeyDown="return limitar(event,this.value,30)" required>
				    		</div>
				    		<div class="col">			    			
				    			<label>Nombre</label>
				      			<input type="text" class="form-control text-upper" name="nombre" value="<?php echo $row['Nombre_Est'] ?>" onKeyDown="return limitar(event,this.value,50)" required>
				    		</div>
				  		</div>

				  		<div class="row">
				  			<div class="col">
				  				<label>RFC</label>
				      			<input type="text" class="form-control text-upper" name="rfc" value="<?php echo $row['RFC'] ?>" onKeyDown="return limitar(event,this.value,15)" required>
				    		</div>
				  			<div class="col">
				  				<label>Domicilio</label>
				      			<input type="text" class="form-control" name="domicilio" value="<?php echo $row['Domicilio'] ?>" onKeyDown="return limitar(event,this.value,200)" required>
				    		</div>
				    		<div class="col">
				    			<label>Colonia</label>
				      			<input type="text" class="form-control " name="colonia" value="<?php echo $row['Colonia'] ?>" onKeyDown="return limitar(event,this.value,80)" required>
				    		</div>				    			    			    			    
				  		</div>

				  		<div class="row">
				  			<div class="col">
				  				<label>Delegación</label>
				      			<input type="text" class="form-control" name="delegacion" value="<?php echo $row['Delegacion'] ?>" onKeyDown="return limitar(event,this.value,80)" required>
				    		</div>
				    		<div class="col">
				    			<label>C.P.</label>
				      			<input type="number" class="form-control" name="cp" value="<?php echo $row['CP'] ?>" onKeyDown="return limitar(event,this.value,5)" required>
				    		</div>	
				    		<div class="col">
				  				<label>Estado</label>
				      			<input type="text" class="form-control" name="estado" value="<?php echo $row['Estado'] ?>" onKeyDown="return limitar(event,this.value,100)" required>
				    		</div>			    			    			    			    
				  		</div>

				  		<div class="row">
				  			
				  			<div class="col">
				  				<label>Curp</label>
								<input type="text" class="form-control" id="Curp" name="Curp" value="<?php echo $row['Curp']?>" onKeyDown="return limitar(event,this.value,200)" required>	
				    		</div>		  			
				    		<div class="col">
				    			<label>Correo</label>
				      			<input type="text" class="form-control" name="Correo" value="<?php echo $row['Correo'] ?>" onKeyDown="return limitar(event,this.value,50)" required>
				    		</div>				    			    			    			    
				  		</div>

				  		<div class="row">
				  			
				  			<div class="col">
				  				<label>Insitución Educativa</label>
								<input type="text" class="form-control" id="instituto" name="institucion" value="<?php echo $row ['ID_Institucion2']?>" required>	
				    		</div>		  			
				    		<div class="col">
				    			<label>Plantel</label>
				      			<input type="text" class="form-control" name="plantel" value="<?php echo $row['Plantel'] ?>" onKeyDown="return limitar(event,this.value,1000)" required>
				    		</div>				    			    			    			    
				  		</div>

				  		<div class="row">
		  			
		  			<div class="col">
		  				<label>Nivel de Estudios</label>
		    			<select class="form-control" name="egresado" required>
		    				<option value="<?php echo $row['Egresado'];?>" selected><?php echo $row['Egresado'];?></option>
		    				<option value="EGRESADO">EGRESADO</option>
		    				<option value="ESTUDIANTE">ESTUDIANTE</option>
		    			</select>						

		    		</div>		  			
		    		<div class="col">
		    			<label>Carrera</label>
		      			<input type="text" class="form-control" name="carrera" value="<?php echo $row['Carrera']?>" onKeyDown="return limitar(event,this.value,200)" required>
		    		</div>				    			    			    			    
		    		<div class="col">
		    			<label>Creditos</label>
		      			<input type="text" class="form-control" name="creditos" value="<?php echo $row['Creditos']?>" onKeyDown="return limitar(event,this.value,5)" required>
		    		</div>				    			    			    			    
		  		</div>

				  		<div class="row">
				  			<div class="col">
				  				<label>Nombre del Doctor</label>
				      			<input type="text" class="form-control text-upper" name="doctor" value="<?php echo $row['Doctor'] ?>" onKeyDown="return limitar(event,this.value,200)" required>
				    		</div>
				    		<div class="col">
				    			<label>Cédula del Doctor</label>
				      			<input type="text" class="form-control text-upper" name="ceduladr" value="<?php echo $row['Ceduladr'] ?>" onKeyDown="return limitar(event,this.value,20)" required>
				    		</div>	
				  		</div>

				  		<h4>Depto. donde prestara su servicio</h4>
								  	
				  		<div class="row">		  			
							<div class="col">
								<label>Organismo</label>							
								<input type="text" id="organo" class="form-control " name="organismo" value="<?php echo $row['ID_Org3'] ?>" onKeyDown="return limitar(event,this.value,150)">   	
				    		</div>		    			    			    			    		    		
				    		<div class="col">
				    			<label>Dirección</label>							
								<input type="text" class="form-control  " name="direccion" value="<?php echo $row['ID_Dir3'] ?>" onKeyDown="return limitar(event,this.value,150)">   	
				    		</div>		    		
				    		<div class="col">
				    			<label>Subdirección</label>
				    			<input type="text" class="form-control " name="subdireccion" value="<?php echo $row['ID_Sub3'] ?>" onKeyDown="return limitar(event,this.value,150)">   	
				    		</div>
				    		<div class="col">
				    			<label>Gerencia</label>
				    			<input type="text" class="form-control " name="gerencia" value="<?php echo $row['ID_Ger3'] ?>" onKeyDown="return limitar(event,this.value,150)">   	   	
				    		</div>
				  		</div>
						
				  		<div class="row">		  			
				    		<div class="col">
				    			<label>Nombre del Asesor Técnico</label>
				      			<input type="text" class="form-control text-upper" name="nombreAsesor" value="<?php echo $row['Nombre_Asesor']; ?>" onKeyDown="return limitar(event,this.value,100)" required>
				    		</div>
				    		<div class="col">
								<label>Cargo de Asesor Técnico</label>
				      			<input type="text" class="form-control text-upper" name="cargoAsesor" value="<?php echo $row['CargoAsesor'] ?>" onKeyDown="return limitar(event,this.value,150)" required>
				    		</div>
				  		</div>

				  		<div class="row">		  					    		
				    		<div class="col">
				    			<label>Extensión</label>
				      			<input type="text" class="form-control text-upper" name="extension" value="<?php echo $row['Extension'] ?>" onKeyDown="return limitar(event,this.value,9)" required>
				    		</div>
				    		<div class="col">
				    			<label>Clave del Departamento</label>
				      			<input type="text" class="form-control text-upper" name="cvedepto" value="<?php echo $row['Cvedepto'] ?>" onKeyDown="return limitar(event,this.value,10)" required>
				    		</div>
				  		</div>

				  		<div class="row">
		  			<div class="col">
                               <label>Número de Acreedor</label>
                                <input type="number" min="0" max="9999999999" name="acreedor" class="form-control" value="<?php echo $row['acreedor'] ?>" onKeyDown="return limitar(event,this.value,10)">
                            </div> 
                            <div class="col">
                             <label>Centro Coste Beneficio</label>
                                <input type="text" min="0" max="9999999999" name="ccosto" class="form-control" value="<?php echo $row['ccosto'] ?>" onKeyDown="return limitar(event,this.value,10)">
                            </div>
                            <div class="col">
                               <label>Posicion Financiera</label>
                                <input type="number" min="0" max="9999999999" name="pfinanciera" class="form-control" value="<?php echo $row['pfinanciera'] ?>" onKeyDown="return limitar(event,this.value,10)">
                            </div> 
						</div>	

						<div class="row">
							<div class="col">
                                <label>Programa Presupuestario</label>
                                <input type="text" name="ppresupuestario" class="form-control text-upper" value="<?php echo $row['ppresupuestario'] ?>" onKeyDown="return limitar(event,this.value,50)">
                            </div>
                            <div class="col">
                                <label>Fondo</label>
                                <input type="text" name="fondo" class="form-control text-upper" value="<?php echo $row['fondo'] ?>" onKeyDown="return limitar(event,this.value,10)">
                            </div> 
                            <div class="col">
                               <label>Cuenta Mayor</label>
                                <input type="text"  name="cmayor" class="form-control text-upper" value="<?php echo $row['cmayor'] ?>" onKeyDown="return limitar(event,this.value,50)">
                            </div> 

						</div>

						<div class="row">
							<div class="col">
                                <label>Centro Gestor</label>
                                <input type="number" min="0" max="9999999999" name="CcGen" class="form-control" value="<?php echo $row['CcGen'] ?>" onKeyDown="return limitar(event,this.value,10)">
                            </div> 
                             <div class="col">
                                <label>Division</label>
                                <input type="text" class="form-control text-upper" name="division" class="form-control" value="<?php echo $row['division'] ?>" onKeyDown="return limitar(event,this.value,10)">
                            </div> 
                              <div class="col">
                                <label>EPS</label>
                                <input type="text" min="0" max="9999999999" name="eps" class="form-control" value="<?php echo $row['eps'] ?>" onKeyDown="return limitar(event,this.value,50)">
                            </div> 

						</div>


				  		<div class="row">		  			
							<div class="col">	
								<!--<input type="text" class="form-control" name="ubicacion" value="<?php //echo $row['Ubicacion'] ?>" id="ubicacion">    
								  									-->
								<label>Ubicación</label>
								<textarea class="form-control" name="ubicacion" value="<?php echo $row['Ubicacion'] ?>" id="ubicacion" onKeyDown="return limitar(event,this.value,1000)" required><?php echo $row['Ubicacion']?>
								</textarea>	
				    		</div>		    								
				  		</div>

				  		<div class="row">		  	
		  			
					<div class="col">
                        <label><input type="checkbox" id="A" value='EDIF "A" P.B., '>A</label>
                    </div>                  
                    <div class="col">
                        <label><input type="checkbox" id="B-1" value='"EDIF B-1" P.B., '>B-1</label>
                    </div>                                      
                    <div class="col">
                        <label><input type="checkbox" id="B-2" value='EDIF "B-2" P.B, '>B-2</label>
                    </div>                  
                    <div class="col">
                        <label><input type="checkbox" id="C" value='EDIF "C" P.B., '>C</label>
                    </div>                                                 
                    <div class="col">
                        <label><input type="checkbox" id="D" checked value=',Y EDIF "D" PISO 8'>D</label>
                    </div> 
                    
                     <div class="col">
                        <label><input type="checkbox" id="EX-I" value='"EXITAM" P.B, '>EX-I</label>
                    </div> 

                    <div class="col">
                        <label><input type="checkbox" id="BAHIA" value='BAHIA DE SAN HIPOLITO NO. 56, '>S.HIPOLITO</label>
                    </div>
                   
                     <div class="col">
                        <label><input type="checkbox" id="EX-B" value='EDIF "EX-BLANCO" P.B., '>EX-B</label>
                    </div>  


                    <div class="col">
                        <label><input type="checkbox" id="TE" value="TORRE EJECUTIVA P.B, ">T.E.</label>
                    </div>  

                    <div class="col">
                        <label><input type="checkbox" id="TI" value='"TORRE TITANO" P.B., '>TITANO</label>
                    </div>
                    <div class="col">
                        <label><input type="checkbox" id="PUENTE1" value='"PUENTE PEATONAL DEL EDIF. "D" AL CENTRO ADMINISTRATIVO", '>PTE. C.A.</label>
                    </div>
                    <div class="col">
                        <label><input type="checkbox" id="PUENTE2" value='"PUENTE PEATONAL DEL CENTRO ADMINISTRATIVO AL EDIF. "EXITAM", '>PTE. EX-I</label>
                    </div>
                 

		    		<div class="col">
		      			<button type="button" class="btn btn-success" id="botonEdif" onclick="edificio()">Aceptar</button>
		    		</div>		    				    				    		
		  		</div>

				  		<div class="row">		  			
							<div class="col">
				      			<label>Fecha de Inicio<input type="date" class="form-control text-upper" name="fechaInicio" value="<?php echo $row['F_Inicio'] ?>" required></label>
				    		</div>		    		
				    		<div class="col">
				      			<label>Fecha de Término<input type="date" class="form-control text-upper" name="fechaTermino" value="<?php echo $row['F_Final'] ?>" required></label>
				    		</div>
				    		<div class="col">
				      			<label>Hora de Inicio<input type="time"  class="form-control text-upper" name="horaInicio" value="<?php echo $row['Hr_Inicio'] ?>" required></label>
				    		</div>		    		
				    		<div class="col">
				      			<label>Hora de Salida<input type="time" class="form-control text-upper" name="horaSalida" value="<?php echo $row['Hr_Final'] ?>"required></label>
				    		</div>		    		
				  		</div>
				  		<div class="row">		  			
					<div class="col">

				  			<label>Horario Especifico</label>
						<input type="text" class="form-control" name="H_Especifico" value="<?php echo $row['H_Especifico'] ?>" onKeyDown="return limitar(event,this.value,200)"></div>
		    		</div>
		    		<div class="row">		  			
				    		<div class="col">
								<label>Nombre del Proyecto</label> <textarea type="text"  class="form-control" id="area" name="proyecto" onKeyDown="return limitar(event,this.value,500)" required><?php echo$row['Proyecto'];?> </textarea>		      			
				    		</div>		   		    				    		
				  		</div>

				  		<div class="row">		  			
				    		<div class="col">
				    			<label>Nombre del Gerente (Area Usuaria)</label>
				      			<input type="text" class="form-control text-upper" name="nombreGerente" value="<?php echo $row['Nombre_Gerente']; ?>" onKeyDown="return limitar(event,this.value,100)" required>
				    		</div>
				    		<div class="col">
								<label>Cargo del Gerente (Area Usuaria)</label>
				      			<input type="text" class="form-control text-upper" name="cargoGerente" value="<?php echo $row['CargoGerente'] ?>" onKeyDown="return limitar(event,this.value,150)" required>
				    		</div>
				  		</div>

				  	



				  		<div class="row">		  			
				    		<div class="col">
				    			<label>Fecha de Elaboración del Convenio<input type="date" class="form-control text-upper" name="fconvenio" value="<?php echo $row['F_Convenio'] ?>" required></label>
				    		</div>
				  		</div>

				  		<h4>Registro Complemantario</h4>
		  		<div class="row">		  	
		  
						<div class="col">
				    			<label>Nombre del Funcionario Titular</label>
				      			<input type="text" class="form-control text-upper" name="FuncionarioNombre" value="<?php echo $row['FuncionarioNombre']; ?>" onKeyDown="return limitar(event,this.value,100)">
				    		</div>
				    		<div class="col">
								<label>Cargo del Funcionario Titular</label>
				      			<input type="text" class="form-control text-upper"  name="FuncionarioCargo" value="<?php echo $row['FuncionarioCargo'];?>" onKeyDown="return limitar(event,this.value,150)">
			    		</div>

		  		</div>


				  		<h4>Datos para Renovación de Convenio</h4>

		    			<div class="row">
		      				<div class="col">
		      					<label>Fecha Inicial Renovación del Convenio<input type="date" class="form-control text-upper" name="finiren" value="<?php echo $row['F_InicioRen'] ?>"></label>
		    				</div>
		    				<div class="col">
		      					<label>Fecha Final Renovación del Convenio<input type="date" class="form-control text-upper" name="ffinren" value="<?php echo $row['F_FinalRen'] ?>"></label>
		    				</div>
		    				<div class="col">
				    			<label>Fecha de Renovación del Convenio<input type="date" class="form-control text-upper" name="frenconvenio" value="<?php echo $row['F_RenConvenio'] ?>"></label>
				    		</div>
		    			</div>

				  		
				  		<button type="submit" name="editar" class="btn btn-primary">Editar</button>

					</form>			
				</div>						
							
						<?php 
					}
				}
			}
	    		
			?>		


		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
		<script src="js/jquery-3.2.1.min.js"></script>
		<script src="js/jquery-ui.js"></script>					
		<script src="js/jquery.mayus.js"></script>
		<script src="js/mayusculas.js"></script>	
		<script src="js/direcciones.js"></script>
		<script src="js/ubicacion.js"></script>	
		<script src="js/instituto.js"></script>		
		<script src="js/departamento.js"></script>		
		<script src="js/organo.js"></script>	
	</body>
</html>