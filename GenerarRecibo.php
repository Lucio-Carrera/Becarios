<?php  
    require('conexion.php');        
    require("navegacion.php");  
?>
<!DOCTYPE html>
<html lang="es">
    <body>
        <div class="wrap">
            <section id="formulario">
                    <div style="width:700px;margin:10px auto;">
                <form  method="post" ACTION="php/Recibo_PDF.php" target="_blank">
                        <h4>RECIBO</h4>
                        <div class="row">                   
                            <div class="col">
                                <label>Fecha Elaboración Recibo:</label>
                                <input type="date"  class="form-control text-upper" name="felaboracion" required>
                            </div> 
                            <div class="col">
                                <label>Folio Alumno:</label>
                                <input type="number" min="1" max="1000" name="idalumno" class="form-control" onKeyDown="return limitar(event,this.value,4)">
                            </div>
                            <div class="col">
                                <label>Año Registro:</label>
                                <input type="number" min="2017" max="2100" name="anoreg" class="form-control" onKeyDown="return limitar(event,this.value,4)">
                            </div>
                            <div class="col">
                                <label>Recibo No:</label>
                                <input type="text" name="numrecibo" class="form-control" onKeyDown="return limitar(event,this.value,10)">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <label>Tipo de Oficio:</label>
                                <select name="toficio" id="toficio" class="form-control text-upper" required>
                                    <option label="Tipo de Oficio"></option>
                                    <option>RECIBO 1</option>
                                    <option>RECIBO 2</option>
                                    <option>RECIBO 3</option>
                                    <option>RECIBO 4</option>
                                    <option>RECIBO 5</option>
                                    <option>RECIBO 6</option>
                                    <option>RECIBO 7</option>
                                    <option>RECIBO 8</option>
                                    <option>RECIBO 9</option>
                                    <option>RECIBO 10</option>
                                    <option>RECIBO 11</option>
                                    <option>RECIBO 12</option>
                                   
                                </select>
                            </div> 
                          
                            
                   
                         <div class="col">
                                <label>Dias:</label>
                                <select name="dias" id="dias" class="form-control text-upper" onChange="eligedias(this.form)" required>
                                    <option label="Días Trabajados"></option>
                                    <option>1</option>
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
                                  
                                </select>
                            </div> 

                            <div class="col">
                                <label>Bruto:</label>
                            <select name="bruto" id="bruto" class="form-control text-upper" required >
                                          <option ></option>                     
                                </select>
                            
                            </div> 

                            <div class="col">
                                <label>Impuesto:</label>
                                <select name="impuesto"  class="form-control text-upper" required>
                                    <option ></option>
                                </select>
                            </div>
                        </div>
                         <div class="row">
                            <div class="col">

                                <label>Neto:</label>
                                <select name="neto" id="neto" class="form-control text-upper" required>
                         <option ></option>
                                </select>
                            </div> 



                            <div class="col">
                                <label>Cantidad:</label>
                                <select name="cantidad"  class="form-control text-upper" required>
                                    <option ></option>
                                </select>
                            </div>


                        </div>

                        <div class="row">    
                            <div class="col">
                                <label>Mes de Pago:</label>
                                <input type="date"  class="form-control text-upper" name="mespago">
                            </div> 
                         
                            <div class="col">
                                <label>Fecha Inicial del Periodo:</label>
                                <input type="date"  class="form-control text-upper" name="ftrab1">
                            </div>
                            <div class="col">
                                <label>Fecha Final del Periodo:</label>
                                <input type="date"  class="form-control text-upper" name="ftrab2">
                            </div> 
                        </div> 
                           <h4>DATOS PARA EL RECIBO DE PAGO</h4>
                        <div class="row">
                            <div class="col">
                                <label>Número de Oficio Remitente:</label>
                                <input type="text" name="ofiremi" class="form-control" onKeyDown="return limitar(event,this.value,10)">
                            </div> 
                             <div class="col">
                                <label>Nombre Destinatario:</label>
                                <select name="nombredest" id="nombredest" class="form-control text-upper" onChange="eligedest(this.form)" required>
                                    <option label="Nombre Destinatario"></option>
                                    <option>Lic. Beatriz Vega Benitez</option>
                                    <option>Lic. Rocio Flores Rodriguez</option>
                                    <option>Lic. Ignacio Soberanes Cortes</option>
                                    <option>Lic. Sofia Mireya Gonzalez Arroyo</option>
                                    <option>Lic. Angelica Gonzalez Paz y Puente</option>
                                   
                                    <option>Mtro. Rodolfo A. Muñoz Palos</option>
                                    <option>Lic. Martha Trinidad Guerrero Vazquez</option> 
                                </select>
                            </div> 

                        </div>

                        <div class="row">
                            <div class="col">
                                <label>Cargo Destinatario:</label>
                            <select name="cargodest" id="cargodest" class="form-control text-upper"  required >
                                          <option ></option>                     
                                </select>
                            </div> 

                              <div class="col">
                                <label>Ubicación Destinatario:</label>
                            <select name="ubicaciondest" id="ubicaciondest" class="form-control text-upper"  required >
                                          <option ></option>                     
                                </select>
                            </div> 
                        </div>

                        <div class="row">
                            <div class="col">
                                <label>Número Oficio Destinatario:</label>
                                <input type="text" name="numante" class="form-control" onKeyDown="return limitar(event,this.value,100)">
                            </div> 
                            <div class="col">
                                <label>Número Único de Expediente:</label>
                                <input type="text" name="numexp" class="form-control" onKeyDown="return limitar(event,this.value,100)">
                            </div>
                            <div class="col">
                                <label>Fecha Antecedente:</label>
                                <input type="date"  class="form-control text-upper" name="fante">
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

                        <input name="buscar" type="submit" class="generarBorrar btn btn-success" value="Generar PDF">
                        <input type="reset" value="Borrar" class="generarBorrar btn btn-success">
 
                </form>
                    </div>
            </section>
        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
        <script src="js/jquery-3.2.1.min.js"></script>              
        <script src="js/jquery.mayus.js"></script>
        <script src="js/mayusculas.js"></script>    
        <script src="js/pago.js"></script>            
        <script src="js/pago2.js"></script>
        <script src="js/pago3.js"></script>  
        <script src="js/cargo.js"></script> 
        <script src="js/recibos.js"></script>
    </body>
</html>