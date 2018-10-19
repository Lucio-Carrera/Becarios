<?php  
    require('conexion.php');        
    require("navegacion.php");  
?>

    <div class="container">
        <div style="width:700px;margin:10px auto;">
        <h4>PASE DE ACCESO</h4>
         <form  method="post" ACTION="php/PaseDeAcceso_PDF.php" target="_blank">                        
            <div class="row">                    
                <div class="col">
                    <label>Numero Oficio Salida:</label>
                    <input type="text" class="form-control" name="oficio" required>
                </div>
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
                        <option>2017</option>
                        <option>2018</option>
                        <option>2019</option>
                        <option>2020</option>
                        <option>2021</option>
                        <option>2022</option>
                    </select>
                </div>
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
                    <label>P.E:</label>
                    <input type="text" class="form-control" name="PE" required>
                </div>
            </div>

                <br>

            <div class="row">
                <div class="div">
                    <button type="submit" name="generar" class="btn btn-success">Generar PDF</button>
                    <button type="reset" value="Borrar" class="btn btn-success generarBorrar">Borrar</button>                    
                </div>
            </div>
            </div>  
        </form>                    
            
        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
        <script src="js/jquery-3.2.1.min.js"></script>              
        <script src="js/jquery.mayus.js"></script>
        <script src="js/mayusculas.js"></script>            
        <script src="js/cargo.js"></script>         
    </body>
</html>