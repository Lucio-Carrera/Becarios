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
                <form  method="post" ACTION="php/Devolucion de convenio.php" target="_blank">
                        <h4>DEVOLUCION DE CONVENIO</h4>
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
                            
                        </div>

                           <h4>DATOS PARA LA DEVOLUCION DE CONVENIO</h4>
                        <div class="row">
                            <div class="col">
                                <label>Número de Oficio Remitente:</label>
                                <input type="text" name="ofiremi" class="form-control" onKeyDown="return limitar(event,this.value,10)">
                            </div> 
                             <div class="col">
                                <label>Nombre Destinatario:</label>
                                <input type="text" name="nombredest" id="nombredest" class="form-control" onChange="eligedest(this.form)" required>
                                   
                              
                            </div> 

                        </div>

                        <div class="row">
                            <div class="col">
                                <label>Cargo Destinatario:</label>
                            <input type="text" name="cargodest" id="cargodest" class="form-control"  required >
                                                                </div> 

                              <div class="col">
                                <label>Ubicación Destinatario:</label>
                            <input type="text" name="ubicaciondest" id="ubicaciondest" class="form-control"  required >
                               
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