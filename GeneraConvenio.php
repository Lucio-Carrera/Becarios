<?php  
    require('conexion.php');        
    require("navegacion.php");  
?>
            <div class="container">
                <div style="width:700px;margin:10px auto;">
                    <h4>CONVENIO</h4>
                    <form  method="post" ACTION="php/Convenio_PDF.php" target="_blank">
                        <div class="row">                   
                            <div class="col">
                                <label>Folio Alumno</label>
                                <input type="number" min="1" max="1000" name="idalumno" class="form-control" onKeyDown="return limitar(event,this.value,4)">
                            </div>
                            <div class="col">
                                <label>Año Registro</label>
                                <input type="number" min="2018" max="2100" name="anoreg" class="form-control" onKeyDown="return limitar(event,this.value,4)">
                            </div>
                        </div>
                        <br>
                        <input name="buscar" type="submit" class="btn btn-success generarBorrar" value="Generar PDF">
                        <input type="reset" value="Borrar" class="btn btn-success generarBorrar">
 
                </form>
                    </div>
            </section>
       <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
        <script src="js/jquery-3.2.1.min.js"></script>              
        <script src="js/jquery.mayus.js"></script>
        <script src="js/mayusculas.js"></script>           
    </body>
</html>