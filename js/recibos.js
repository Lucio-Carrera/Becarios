var ccargo = new Array
ccargo[1] = ["Jefa del Departamento de Prestaciones al Personal Unidad de Administracion de Personal"]
ccargo[2] = ["Jefe De la Unidad de Administracion de la Subdireccion de Recursos Humanos"]
ccargo[3] = ["Jefe de la Unidad Administrativa de la Subdirecion de Relaciones Laborales y Servicios al Personal"]
ccargo[4] = ["Jefa de la Unidad Administrativa de la Subdireccion de Administracion Patrimonial"]
ccargo[5] = ["Titular de la Unidad de Administracion de la Direccion Corporativa de Finanzas"]

ccargo[6] = ["Subgerente de Consolidacion de la Gerencia de operaciones de Tesoreria"]
ccargo[7] = ["Titular de la Unidad de Gestion Administrativa de la Subdireccion de Servicios Corporativos"]



var cubicacion = new Array
cubicacion[1] = ["Edificio A Planta Baja"]
cubicacion[2] = ["Edificio B-2 Piso 1"]
cubicacion[3] = ["Edificio EX-ITAM Piso 1"]
cubicacion[4] = ["Torre Ejecutiva Piso 34"]
cubicacion[5] = ["Torre Ejecutiva Piso 30"]

cubicacion[6] = ["Torre Ejecutiva Piso 30"]
cubicacion[7] = ["Edificio C Planta Baja"]




function eligedest(formu)
{	var ccargo2 = formu.nombredest.selectedIndex
	formu.cargodest.length = ccargo[ccargo2].length

	var cubicacion2 = formu.nombredest.selectedIndex
	formu.ubicaciondest.length = cubicacion[cubicacion2].length

	
	for (i=0; i<formu.cargodest.length; i++)
	{	formu.cargodest.options[i].text = ccargo[ccargo2][i]
	}


	for (i=0; i<formu.ubicaciondest.length; i++)
	{	formu.ubicaciondest.options[i].text = cubicacion[cubicacion2][i]
	}

}
