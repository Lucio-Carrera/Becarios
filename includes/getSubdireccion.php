<?php

	require('../conexion.php');		
	$ID_Dir=$_POST['ID_Dir'];
	$query1="SELECT ID_Sub, Subdireccion FROM subdirecciones WHERE ID_Dir2='$ID_Dir'";
	$result1=$conexion->query($query1);	
	$html="<option value='0'>DIRECCION</option>";
	while ($row1=$result1->fetch_assoc()) {
		$html="<option value='".$row1['ID_Sub']."'>".utf8_encode($row1['Subdireccion'])."</option>";
		echo $html;
	}	


?>