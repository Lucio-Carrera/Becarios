<?php 
class Ajax
{
	public $busqueda;
	public function Buscar($bus)	
	{
		require('conexion.php');	
		$this->busqueda=$bus;
		$query4="SELECT Organismo FROM organismos WHERE Organismo LIKE '$this->busqueda%' LIMIT 15";
		$result4=mysqli_query($conexion, $query4);		
		if(!$result4)
		{
			echo "error en la consulta".mysqli_error($conexion);
		}
		else
		{		
					
			while ($row4=mysqli_fetch_array($result4)) {						
				$resultado[]=$row4['Organismo'];					
			}				
			return $resultado;	
		}
	}
}	

$buscar=new Ajax();
echo json_encode($buscar->Buscar($_GET['term']));
			
?>