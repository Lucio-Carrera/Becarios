<?php  
    require('conexion.php');        
    require("navegacion.php");  
?>
            <div class="container">
                    <div style="width:100%;margin:10px auto;">
                        <h4>PASE DE AMPLIACION DE UBICACION</h4>
                <form  method="post" ACTION="php/PaseAmpliacionUbi_PDF.php" target="_blank">
                        <div class="row">                   
                    <div class="col">
                        <label>Numero Oficio Remite:<input type="text" class="form-control" name="oficio"></label>
                    </div>
                    <div class="col">
                        <label>Fecha Oficio Remitente:<input type="date"  class="form-control text-upper" name="foficio"></label>
                    </div>
						<div class="col">
                        <label>Numero Oficio Salida:<input type="text" class="form-control" name="numoficio" required></label>
                    </div>					
                </div>
                
                 <div class="row">                   
                    <div class="col">
                        <label>Fecha de Inicio:<input type="date" class="form-control text-upper" name="finicio" required></label>
                    </div>

                    <div class="col">
                        <label>Fecha de Termino:<input type="date" class="form-control text-upper" name="ftermino" required></label>
                    </div>
               
                    <div class="col">
                    <label>P.E:<input type="text" class="form-control" name="PE" required></label>
                    </div>

					
					</div>
				 <div class="row">                   
                    
                    <div class="col">
                                <label>Firma Oficio:</label>
                                <select name="firma" id="firma" class="form-control text-upper" onChange="eligepuesto(this.form)" required>
                                    <option label="ELIGE COORDINADOR"></option>
                                    <option>CLAUDIA MIRIAM RIVERA MINAYA</option>
                                    <option>LIC. AIDA VARGAS GUZMAN</option>
                                    <option>ING. ALEJANDRO EDUARDO SERRALDE VARGAS</option>
                                </select>
                            </div>
                            <div class="col">
                                <label>Cargo:</label>
                                <select name="cargo"  class="form-control text-upper" required>
                                    <option ></option>
                                </select>
                            </div>
                 </div>
                       <div class="row">
                            <div class="col">
                                <label>Fecha</label>                            
 
                            <select name="dia" id="dia" class="form-control" required>
                            <option selected>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                            <option>11</option>
                            <option>12</option>
                            <option>13</option>
                            <option>14</option>
                            <option>15</option>
                            <option>16</option>
                            <option>17</option>
                            <option>18</option>
                            <option>19</option>
                            <option>20</option>
                            <option>21</option>
                            <option>22</option>
                            <option>23</option>
                            <option>24</option>
                            <option>25</option>
                            <option>26</option>
                            <option>27</option>
                            <option>28</option>
                            <option>29</option>
                            <option>30</option>
                            <option>31</option>
                            </select>
                            </div>

                            <div class="col">
                                <label>Mes</label>
                            <select name="mes" id="mes" class="form-control">
                            <option>Enero</option>
                            <option>Febrero</option>
                            <option>Marzo</option>
                            <option>Abril</option>
                            <option>Mayo</option>
                            <option>Junio</option>
                            <option>Julio</option>
                            <option>Agosto</option>
                            <option>Septiembre</option>
                            <option>Octubre</option>
                            <option>Noviembre</option>
                            <option>Diciembre</option>
                          </select>
                            </div>
                            <div class="col">
                            <label>Año</label>
                          <select name="anio" id="anio" class="form-control">
                            <option>2018</option>
                            <option>2019</option>
                            <option>2020</option>
                            <option>2021</option>
                            <option>2022</option>
                          </select>
                          </div>
                       
                        </div>
							<div class="row"> 
						   <div class="col">
                            <label>Folio Alumno</label>
                            <input type="text" name="idalumno" class="form-control">
                        </div>

                        <div class="col">
                            <label>Año Registro</label>
                            <input type="text" name="anoreg" class="form-control">
                        </div>
						</div>
						
						
						
						<div class="row">		  			
					<div class="col">
					<input type="textarea" class="form-control" name="Nubicacion" id="ubicacion" placeholder="Nueva Ubicación" onKeyDown="return limitar(event,this.value,300)" required>		
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
                        <label><input type="checkbox" id="D" checked value='EDIF "D" PISO 8'>D</label>
                    </div> 
                    
                     <div class="col">
                        <label><input type="checkbox" id="EX-I" value='"EXITAM" P.B, '>EX-I</label>
                    </div> 

                    <div class="col">
                        <label><input type="checkbox" id="BAHIA" value='BAHIA DE SAN HIPOLITO NO. 56, '>SAN HIPOLITO</label>
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
                        <label><input type="checkbox" id="PUENTE2" value='"PUENTE PEATONAL DEL CENTRO ADMINISTRATIVO AL EDIF. "EXITAM"  ", '>PTE. EX-I</label>
                    </div>
                  
                				   		    		
		    		<div class="col">
		      			<button type="button" class="btn btn-success" id="botonEdif" onclick="edificio()">Aceptar</button>
		    		</div>		    				    				    		
		  		</div>

                        <br>
                        <input name="buscar" type="submit" class="btn btn-success generarBorrar" value="Generar PDF">
                        <input type="reset" value="Borrar" class="btn btn-success generarBorrar">
 
                </form>
                    </div>
					</div>
            </section>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
        <script src="js/jquery-3.2.1.min.js"></script>              
        <script src="js/jquery.mayus.js"></script>
		<script src="js/ubicacion.js"></script>
        <script src="js/mayusculas.js"></script>           
        <script src="js/cargo.js"></script>       
    </body>
</html>