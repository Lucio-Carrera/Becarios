<?php

	require('../conexion.php');		
	$ID_Sub=$_POST['ID_Sub'];
	$query2="SELECT ID_Ger, Gerencia FROM gerencias WHERE ID_Sub2='$ID_Sub'";
	$result2=$conexion->query($query2);	
	$html="<option value='0'>DIRECCION</option>";
	while ($row2=$result2->fetch_assoc()) {
		$html="<option value='".$row2['ID_Ger']."'>".utf8_encode($row2['Gerencia'])."</option>";
		echo $html;
	}	


?>