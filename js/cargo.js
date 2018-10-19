var puesto = new Array
puesto[1] = ["COORDINADORA"]
puesto[2] = ["GERENTE"]
puesto[3] = ["SUBGERENTE"]

function eligepuesto(formu)
{	var puesto2 = formu.firma.selectedIndex
	formu.cargo.length = puesto[puesto2].length
	for (i=0; i<formu.cargo.length; i++)
	{	formu.cargo.options[i].text = puesto[puesto2][i]
	}
	

}