<?php

	session_start();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
<title>Contabilidad Notaria</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="imagetoolbar" content="no" />
<link rel="stylesheet" href="styles/layout.css" type="text/css" />
<script type="text/javascript" src="scripts/jquery-1.4.1.min.js"></script>
<script type="text/javascript" src="scripts/jquery.defaultvalue.js"></script>
<script type="text/javascript" src="scripts/jquery-ui-1.8.13.custom.min.js"></script>
<script type="text/javascript" src="scripts/jquery.scrollTo-min.js"></script>
<script type="text/javascript">
$(document).ready(function () {
    $("#fullname, #validemail, #message").defaultvalue("Full Name", "Email Address", "Message");
    $('#shout a').click(function () {
        var to = $(this).attr('href');
        $.scrollTo(to, 1200);
        return false;
    });
    $('a.topOfPage').click(function () {
        $.scrollTo(0, 1200);
        return false;
    });
    $("#tabcontainer").tabs({
        event: "click"
    });
});
</script>
</head>
<body id="top">
<div class="wrapper col1">
  <div id="topbar" class="clear">
    <form action="#" method="post" id="search">
      <fieldset>
      </fieldset>
    </form>
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col2">
  <div id="header" class="clear">
    <div class="fl_left">
      <h1><a href="index_235.php">Not'In One Caja</a></h1>
      <p>Programa de Control de Caja y Contabilidad</p>
    </div>
    <div id="topnav">
      <ul>
      	<li><a href="#">Utilerias</a><span>control</span>
          <ul>
            <li><a href="seleccionar_num_cuentas.php">Insercion Cuentas</a></li>
            <li><a href="seleccionar_num_catalogo_operaciones.php">Insercion de Operaciones</a></li>
            <li><a href="seleccionar_num_catalogo_operaciones_concepto.php">Insercion de Conceptos</a></li>
          </ul>
        </li>
        <li class="active"><a href="reportes_seleccion.php">Contabilidad</a><span>control</span>
        </li>
        <li><a href="index_235.php">Pagos</a><span>control</span>
        <ul>
            <li><a href="seleccionar_num_operaciones.php">Creacion Pagos</a></li>
            <li><a href="seleccionar_folio_pago.php">Revision Pagos</a></li>
            <li><a href="seleccionar_folio_pago_cancel.php">Cancelacion de Cheques</a></li>
          </ul>
          </li>
        <li><a href="index_235.php">Recibos</a><span>control</span>
        <ul>
            <li><a href="seleccionar_otor_exp_recibo.php">Creacion Recibos</a></li>
            <li><a href="revision_de_recibos.php">Revision Recibos</a></li>
            <li><a href="seleccionar_comp_not_exp.php">Complemento Notario</a></li>
          </ul>
          </li>
        <li class="last"><a href="index_235.php">Expedientes &nbsp;&nbsp;&nbsp;&nbsp;</a><span>control</span>
          <ul>
            <li><a href="otorgantes_alta.php">Alta de Otorgantes</a></li>
            <li><a href="seleccionar_otorgante.php">Modificar Otorgantes</a></li>
            <li><a href="seleccionar_otor_exp.php">Crear Expedientes</a></li>
            <li><a href="seleccionar_otor_exp_mod.php">Modificar Expedientes</a></li>
          </ul>
          </li>
      </ul>
    </div>
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col4">
  <div id="container" class="clear">
    <!-- ####################################################################################################### -->
    <div id="shout" class="clear">
      <div class="fl_left">
        <h2>Programa de Caja y Contable</h2>
      </div>
    </div>
    <!-- ####################################################################################################### -->
    <h1>Inicio</h1>
    <div id="portfolio">
      <ul>
        <li>
          <div class="imgholder"><img src="images/balanza2.jpg" alt="" /></div>
          <p class="title">Informacion que pongamos de inicio</p>
          <p class="projectdescription">&nbsp;</p>
          <p class="readmore"><a href="#"><strong>Ir a &raquo;</strong></a></p>
        </li>
        
    </div>
    <!-- ####################################################################################################### -->
    <div class="pagination">
      
    </div>
    <!-- ####################################################################################################### -->
    <div class="clear"></div>
  </div>
</div>
<!-- ####################################################################################################### -->

<!-- ####################################################################################################### -->
<div class="wrapper">
  <div id="copyright" class="clear">
    <p class="fl_left">Copyright &copy; 2014 - All Rights Reserved - <a href="#">Global Micro</a></p>
  </div>
</div>
</body>
</html>