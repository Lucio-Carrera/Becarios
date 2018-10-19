<?php

	require('../conexion.php');		
	$ID_Org=$_POST['ID_Org'];
	$query="SELECT ID_Dir, Direccion FROM direcciones WHERE ID_Org2='$ID_Org'";
	$result=$conexion->query($query);		
	while ($row=$result->fetch_assoc()) {
		$html="<option value='".$row['ID_Dir']."'>".utf8_encode($row['Direccion'])."</option>";
		echo $html;
	}	


?>