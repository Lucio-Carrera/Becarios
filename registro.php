<?php  

	$registrado="";
	require('conexion.php');		
		$query="SELECT ID_Org, Organismo FROM organismos";
		$result=$conexion->query($query);						
	require("inserReg.php");
	require("navegacion.php");
	if (isset($_GET['registrado'])) {
		$registrado=$_GET['registrado'];
	}

?>



		<div class="container">			
			<div id="error">
				<?php echo $error; echo $registrado;?>
			</div>
			<form method="POST" id="registro">
				<h4>Datos personales</h4>		  		
		  		<div class="row">		  			
		  			<div class="col">		  			
		      			<input type="text" class="form-control text-upper" name="ap-pat" placeholder="Apellido Paterno" onKeyDown="return limitar(event,this.value,30)"  required>
		      			
		    		</div>
		    		<div class="col">
		      			<input type="text" class="form-control text-upper" name="ap-mat" placeholder="Apellido Materno" onKeyDown="return limitar(event,this.value,30)" required>
		    		</div>		
		    	<div class="col">
		      			<input type="text" class="form-control text-upper" name="nombre" placeholder="Nombre" onKeyDown="return limitar(event,this.value,50)" required>
		    		</div>		    			    			    
		  		</div>

		  		<div class="row">
		  			<div class="col">
		      			<input type="text" class="form-control text-upper" name="rfc" placeholder="RFC" onKeyDown="return limitar(event,this.value,15)" required>
		    		</div>
		  			<div class="col">
		      			<input type="text" class="form-control text-upper" name="domicilio" placeholder="Domicilio" onKeyDown="return limitar(event,this.value,200)" required>
		    		</div>
		    		<div class="col">
		      			<input type="text" class="form-control text-upper" name="colonia" placeholder="Colonia" onKeyDown="return limitar(event,this.value,80)" required>
		    		</div>				    			    			    			    
		  		</div>

		  		<div class="row">
		  			<div class="col">
		      			<input type="text" class="form-control text-upper" name="delegacion" placeholder="Delegación" onKeyDown="return limitar(event,this.value,80)" required>
		    		</div>
		    		<div class="col">
		      			<input type="number" class="form-control" name="cp" placeholder="Código Postal" onKeyDown="return limitar(event,this.value,5)" required>
		    		</div>
		    		<div class="col">
		      			<input type="text" class="form-control" name="estado" placeholder="Estado" onKeyDown="return limitar(event,this.value,100)" required>
		    		</div>				    			    			    			    
		  		</div>


		  		<div class="row">
		  			
		  			<div class="col">
		    			<input type="text" id="Curp" class="form-control text-upper" name="Curp" placeholder="Curp" onKeyDown="return limitar(event,this.value,25)" required>													
		    		</div>		  			
		    		<div class="col">
		      			<input type="text" class="form-control" name="Correo" placeholder="Correo" onKeyDown="return limitar(event,this.value,50)" required>
		    		</div>
		    	</div>	

		  		<div class="row">
		  			
		  			<div class="col">
		    			<input type="text" id="instituto" class="form-control " name="institucion" placeholder="Institucion" onKeyDown="return limitar(event,this.value,150)" required>													
		    		</div>		  			
		    		<div class="col">
		      			<input type="text" class="form-control " name="plantel" placeholder="Plantel" onKeyDown="return limitar(event,this.value,1000)" required>
		    		</div>				    			    			    			    
		  		</div>

		  		<div class="row">
		  			
		  			<div class="col">
		    			<select class="form-control" name="egresado" placeholder="Nivel de Estudios" required>
		    				<option label="Nivel de Estudios"></option>
		    				<option value="EGRESADO">EGRESADO</option>
		    				<option value="ESTUDIANTE">ESTUDIANTE</option>
		    			</select>								
		    		</div>		  			
		    		<div class="col">
		      			<input type="text" class="form-control " name="carrera" placeholder="Carrera" onKeyDown="return limitar(event,this.value,200)" required>
		    		</div>				    			    			    			    
		    		<div class="col">
		      			<input type="text" class="form-control" name="creditos" placeholder="Porcentaje de Créditos" onKeyDown="return limitar(event,this.value,5)" required>
		    		</div>				    			    			    			    
		  		</div>

		  		<div class="row">
		  			
		  			<div class="col">
		    			<input type="text" class="form-control text-upper" name="doctor" placeholder="Nombre del Doctor" onKeyDown="return limitar(event,this.value,200)" required>							
		    		</div>		  			
		    		<div class="col">
		      			<input type="text" class="form-control text-upper" name="ceduladr" placeholder="Cedula del Doctor" onKeyDown="return limitar(event,this.value,20)" required>
		    		</div>				    			    			    			    
		  		</div>
		  		<h4>Depto. donde prestara su servicio</h4>

		  		<div class="row">		  			
					<div class="col">						
						<input type="text" id="organo" class="form-control text-upper" name="organismo" placeholder="Organismo" onKeyDown="return limitar(event,this.value,150)" required>									   			
		    		</div>		    			    			    			    		    		

		    		<div class="col">
						<input type="text" class="form-control " name="direccion" placeholder="Direccion" onKeyDown="return limitar(event,this.value,150)" required>									
		    		</div>		    		

		    		<div class="col">
						<input type="text" class="form-control " name="subdireccion" placeholder="Subdireccion" onKeyDown="return limitar(event,this.value,150)" required>									
		    		</div>

		    		<div class="col">		    			
						<input type="text" class="form-control " name="gerencia" placeholder="Gerencia" onKeyDown="return limitar(event,this.value,150)" required>										    			
		    		</div>
		  		</div>

		  		<div class="row">		  			
				
		    		<div class="col">
		      			<input type="text" class="form-control text-upper" name="nombreAsesor" placeholder="Nombre del Asesor" onKeyDown="return limitar(event,this.value,100)" required>
		    		</div>
		    		<div class="col">
		      			<input type="text" class="form-control text-upper" name="cargoAsesor" placeholder="Cargo del Asesor técnico" onKeyDown="return limitar(event,this.value,150)" required>
		    		</div>		    		
		  		</div>

		  		<div class="row">		  			

					<div class="col">
		      			<input type="text" class="form-control text-upper" name="extension" placeholder="Extensión"   onKeyDown="return limitar(event,this.value,9)" required>
		    		</div>
		    		<div class="col">
		      			<input type="number" class="form-control" name="cvedepto" placeholder="Clave del Departamento" onKeyDown="return limitar(event,this.value,10)" required>
		    		</div>
		  		</div>

		  		<div class="row">
		  			<div class="col">
                               
                                <input type="number" min="0" max="9999999999" name="acreedor" class="form-control" placeholder="Número de Acreedor" onKeyDown="return limitar(event,this.value,10)">
                            </div> 
                            <div class="col">
                             
                                <input type="text" min="0" max="9999999999" name="ccosto" class="form-control" placeholder="Centro Coste Beneficio" onKeyDown="return limitar(event,this.value,10)">
                            </div>
                            <div class="col">
                               
                                <input type="number" min="0" max="9999999999" name="pfinanciera" class="form-control" placeholder="Posición Financiera" onKeyDown="return limitar(event,this.value,10)">
                            </div> 
						</div>	

						<div class="row">
							<div class="col">
                                
                                <input type="text" name="ppresupuestario" class="form-control text-upper" placeholder="Programa Presupuestario" onKeyDown="return limitar(event,this.value,50)">
                            </div>
                            <div class="col">
                                
                                <input type="text" name="fondo" class="form-control text-upper" placeholder="Fondo" onKeyDown="return limitar(event,this.value,10)">
                            </div> 
                            <div class="col">
                               
                                <input type="text"  name="cmayor" class="form-control text-upper" placeholder="Cuenta Mayor" onKeyDown="return limitar(event,this.value,50)">
                            </div> 
                            <
						</div>

						<div class="row">
							<div class="col">
                                
                                <input type="number" min="0" max="9999999999" name="CcGen" class="form-control" placeholder="Centro Gestor" onKeyDown="return limitar(event,this.value,10)">
                            </div> 
                             <div class="col">
                                
                                <input type="text" min="0" max="9999999999" name="division" class="form-control" placeholder="Division" onKeyDown="return limitar(event,this.value,10)">
                            </div> 
                              <div class="col">
                                
                                <input type="text" min="0" max="9999999999" name="eps" class="form-control" placeholder="EPS" onKeyDown="return limitar(event,this.value,10)">
                            </div> 


						</div>









		  		
		  		<div class="row">	

					<div class="col">
						<input type="textarea" class="form-control" name="ubicacion" id="ubicacion" placeholder="Ubicación" onKeyDown="return limitar(event,this.value,1000)" required>		
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
		      			<label>Fecha de inicio<input type="date" class="form-control text-upper" name="fechaInicio" placeholder="Fecha de inicio" required></label>
		    		</div>		    		
		    		<div class="col">
		      			<label>Fecha de término<input type="date" class="form-control text-upper" name="fechaTermino" placeholder="Fecha de término" required></label>
		    		</div>
		    		<div class="col">
		      			<label>Hora de inicio<input type="time"  class="form-control text-upper" name="horaInicio" required></label>
		    		</div>		    		
		    		<div class="col">
		      			<label>Hora de salida<input type="time" class="form-control text-upper" name="horaSalida" required></label>
		    		</div>		    		
		  		</div>

		  		<div class="row">		  			
					<div class="col">
						<label>Horario Especifico</label>
						<input type="text" class="form-control" name="H_Especifico" placeholder="Horario Especifico" onKeyDown="return limitar(event,this.value,200)"> 
					</div>
	    		</div>

		  		<div class="row">		  			
		    		<div class="col">
						<label>Nombre del Proyecto</label><textarea type="text"  class="form-control" id="area"  value="" name="proyecto" onKeyDown="return limitar(event,this.value,1000)" required></textarea>
		    		</div>    				    		
		  		</div>

		  		<div class="row">		  			
		    		<div class="col">
		      			<input type="text" class="form-control text-upper" name="nombreGerente" placeholder="Nombre del Gerente (Area Usuaria)" onKeyDown="return limitar(event,this.value,100)" required>
		    		</div>
		    		<div class="col">
		      			<input type="text" class="form-control text-upper" name="cargoGerente" placeholder="Cargo del Gerente (Area Usuaria)" onKeyDown="return limitar(event,this.value,150)" required>
		    		</div>			
		    	</div>

		    	

		    	<div class="row">
		    		<div class="col">
		      			<label>Fecha de Elaboración del Convenio<input type="date" class="form-control text-upper" name="fconvenio" placeholder="Fecha del Convenio" required></label>
		    		</div>
		    	</div>

		    	<h4>Registro Complemantario</h4>
		  		<div class="row">		  	
		  						

					<div class="col">
		      			<input type="text" class="form-control text-upper" name="FuncionarioNombre" placeholder="Nombre del Funcionario Titular" onKeyDown="return limitar(event,this.value,100)">
		    		</div>
		    		<div class="col">
		      			<input type="text" class="form-control text-upper" name="FuncionarioCargo" placeholder="Cargo del Funcionario Titular" onKeyDown="return limitar(event,this.value,150)">
		    		</div>
		  		</div>

		    	<h4>Datos para Renovación de Convenio</h4>

		    	<div class="row">
		    		<div class="col">
		      			<label>Fecha Inicial Renovación del Convenio<input type="date" class="form-control text-upper" name="finiren" required readonly></label>
		    		</div>
		    		<div class="col">
		      			<label>Fecha Final Renovación del Convenio<input type="date" class="form-control text-upper" name="ffinren" required readonly></label>
		    		</div>
		    		<div class="col">
		      			<label>Fecha de Elaboración del Convenio<input type="date" class="form-control text-upper" name="frenconvenio"  required readonly></label>
		    		</div>
		    	</div>

		  			  			

		  		<button type="submit" name="regis" class="btn btn-primary">Registrar</button>

			</form>					
		</div>		
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