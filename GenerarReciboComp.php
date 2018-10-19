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

                <form  method="post" ACTION="php/ReciboComp.php" target="_blank">

                        <h4>RECIBO COMPLETARIO</h4>
                        <div class="row">                   
                            <div class="col">
                                <label>Fecha Elaboración Recibo:</label>
                                <input type="date"  class="form-control text-upper" name="felaboracion">
                            </div> 
                            <div class="col">
                                <label>Folio Alumno:</label>
                                <input type="number" min="1" max="1000" name="idalumno" class="form-control" onKeyDown="return limitar(event,this.value,4)">
                            </div>
                            <div class="col">
                                <label>Año Registro:</label>
                                <input type="number" min="2018" max="2100" name="anoreg" class="form-control" onKeyDown="return limitar(event,this.value,4)">
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
                                    <option>RECIBO No. 1</option>
                                    <option>RECIBO No. 2</option>
                                    <option>RECIBO No. 3</option>
                                    <option>RECIBO No. 4</option>
                                    <option>RECIBO No. 5</option>
                                    <option>RECIBO No. 6</option>
                                    <option>RECIBO No. 7</option>
                                    <option>RECIBO No. 8</option>
                                    <option>RECIBO No. 9</option>
                                    <option>RECIBO No. 10</option>
                                    <option>RECIBO No. 11</option>
                                    <option>RECIBO No. 12</option>
                                    <option>RECIBO No. 13</option>
                                    <option>RECIBO No. 14</option>
                                    <option>RECIBO No. 15</option>
                                    <option>RECIBO No. 16</option>
                                    <option>RECIBO No. 17</option>
                                    <option>RECIBO No. 18</option>
                                </select>
                            </div> 
                            <div class="col">
                                <label>Bruto:</label>
                                <select name="bruto" id="bruto" class="form-control text-upper" onChange="eligebruto(this.form)" required>
                                    <option label="Días Trabajados"></option>
                                    <option>$ 309.26</option>
                                    <option>$ 618.52</option>
                                    <option>$ 927.78</option>
                                    <option>$ 1,237.04</option>
                                    <option>$ 1,546.30</option>
                                    <option>$ 1,855.56</option>
                                    <option>$ 2,164.82</option>
                                    <option>$ 2,474.08</option>
                                    <option>$ 2,783.34</option>
                                    <option>$ 3,092.60</option>
                                    <option>$ 3,401.86</option>
                                    <option>$ 3,711.12</option>
                                    <option>$ 4,020.38</option>
                                    <option>$ 4,329.64</option>
                                    <option>$ 4,638.90</option>
                                    <option>$ 4,948.16</option>
                                    <option>$ 5,257.42</option>
                                    <option>$ 5,566.68</option>
                                    <option>$ 5,875.94</option>
                                    <option>$ 6,185.20</option>
                                    <option>$ 6,494.46</option>
                                    <option>$ 6,803.72</option>
                                    <option>$ 7,112.98</option>
                                    <option>$ 7,422.24</option>
                                    <option>$ 7,731.50</option>
                                    <option>$ 8,040.76</option>
                                    <option>$ 8,350.02</option>
                                    <option>$ 8,659.28</option>
                                    <option>$ 8,968.54</option>
                                    <option>$ 9,277.80</option>
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
                                <select name="neto" id="neto" class="form-control text-upper" onChange="eligeneto(this.form)" required>
                                    <option label="Neto"></option>
                                    <option>$ 303.32</option>
                                    <option>$ 601.16</option>
                                    <option>$ 890.63</option>
                                    <option>$ 1,180.10</option>
                                    <option>$ 1,469.57</option>
                                    <option>$ 1,759.03</option>
                                    <option>$ 2,048.50</option>
                                    <option>$ 2,337.97</option>
                                    <option>$ 2,627.44</option>
                                    <option>$ 2,916.90</option>
                                    <option>$ 3,206.37</option>
                                    <option>$ 3,495.84</option>
                                    <option>$ 3,785.30</option>
                                    <option>$ 4,069.43</option>
                                    <option>$ 4,345.04</option>
                                    <option>$ 4,620.65</option>
                                    <option>$ 4,896.27</option>
                                    <option>$ 5,171.88</option>
                                    <option>$ 5,447.49</option>
                                    <option>$ 5,723.10</option>
                                    <option>$ 5,998.72</option>
                                    <option>$ 6,274.33</option>
                                    <option>$ 6,549.94</option>
                                    <option>$ 6,824.38</option>
                                    <option>$ 7,084.16</option>
                                    <option>$ 7,343.94</option>
                                    <option>$ 7,603.72</option>
                                    <option>$ 7,863.49</option>
                                    <option>$ 8,123.27</option>
                                    <option>$ 8,370.07</option>
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
                                <label>Número de Acreedor:</label>
                                <input type="number" min="0" max="9999999999" name="acreedor" class="form-control" onKeyDown="return limitar(event,this.value,10)">
                            </div>
                            <div class="col">
                                <label>Mes de Pago:</label>
                                <input type="date"  class="form-control text-upper" name="mespago">
                            </div> 
                        </div> 

                        <div class="row">    
                            <div class="col">
                                <label>Fecha Inicial del Periodo Trabajado:</label>
                                <input type="date"  class="form-control text-upper" name="ftrab1">
                            </div>
                            <div class="col">
                                <label>Fecha Final del Periodo Trabajado:</label>
                                <input type="date"  class="form-control text-upper" name="ftrab2">
                            </div> 
                        </div> 

                        <div class="row">    
                            <div class="col">
                                <label>Centro Coste Beneficio:</label>
                                <input type="number" min="0" max="9999999999" name="ccosto" class="form-control" onKeyDown="return limitar(event,this.value,10)">
                            </div>
                            <div class="col">
                                <label>Posición Financiera:</label>
                                <input type="number" min="0" max="9999999999" name="pfinanciera" class="form-control" onKeyDown="return limitar(event,this.value,10)">
                            </div> 
                            <div class="col">
                                <label>Programa Presupuestario:</label>
                                <input type="text" name="ppresupuestario" class="form-control text-upper">
                            </div>
                        </div> 

                        <div class="row">   
                            <div class="col">
                                <label>Fondo:</label>
                                <input type="text" name="fondo" class="form-control text-upper">
                            </div> 
                            <div class="col">
                                <label>Cuenta Mayor:</label>
                                <input type="number" min="0" max="9999999999" name="cmayor" class="form-control" onKeyDown="return limitar(event,this.value,10)">
                            </div> 
                            <div class="col">
                                <label>Fecha Elaboración Convenio:</label>
                                <input type="date"  class="form-control text-upper" name="felacon">
                            </div>
                            </div> 

                        <div class="row">  
                             <div class="col">
                                <label>Centro Gestor:</label>
                                <input type="number" min="0" max="9999999999" name="CcBen" class="form-control" onKeyDown="return limitar(event,this.value,10)">
                            </div> 
                             <div class="col">
                                <label>Division:</label>
                                <input type="text" min="0" max="9999999999" name="division" class="form-control" onKeyDown="return limitar(event,this.value,10)">
                            </div> 
                              <div class="col">
                                <label>EPS:</label>
                                <input type="text" min="0" max="9999999999" name="eps" class="form-control" onKeyDown="return limitar(event,this.value,10)">
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
                                <input type="text" name="nombredest" class="form-control" onKeyDown="return limitar(event,this.value,1000)">
                            </div> 
                        </div>

                        <div class="row">
                            <div class="col">
                                <label>Cargo Destinatario:</label>
                                <input type="text" name="cargodest" class="form-control" onKeyDown="return limitar(event,this.value,1000)">
                            </div>
                            <div class="col">
                                <label>Ubicación Destinatario:</label>
                                <input type="text" name="ubicaciondest" class="form-control" onKeyDown="return limitar(event,this.value,1000)">
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
        <script src="js/cargo.js"></script> 
    </body>
</html>