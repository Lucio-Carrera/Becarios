var ccantidad = new Array
ccantidad[1] = ["(Trescientos tres pesos 32/100 M.N.)"]  
ccantidad[2] = ["(Seiscientos un pesos 16/100 M.N.)"]  
ccantidad[3] = ["(Ochocientos noventa pesos 63/100 M.N.)"]  
ccantidad[4] = ["(Mil ciento ochenta pesos 10/100 M.N.)"]  
ccantidad[5] = ["(Mil cuatrocientos sesenta y nueve pesos 57/100 M.N.)"]  
ccantidad[6] = ["(Mil setecientos cincuenta y nueve pesos 03/100 M.N.)"] 
ccantidad[7] = ["(Dos mil cuarenta y ocho pesos 50/100 M.N.)"]    
ccantidad[8] = ["(Dos mil trescientos treinta y siete pesos 97/100 M.N.)"] 
ccantidad[9] = ["(Dos mil seiscientos veintisiete pesos 44/100 M.N.)"] 
ccantidad[10] = ["(Dos mil novecientos dieciseis pesos 90/100 M.N.)"]  
ccantidad[11] = ["(Tres mil doscientos seis pesos 37/100 M.N.)"]  
ccantidad[12] = ["(Tres mil cuatrocientos noventa y cinco pesos 97/100 M.N.)"] 
ccantidad[13] = ["(Tres mil setecientos ochenta y cinco pesos 30/100 M.N.)"]  
ccantidad[14] = ["(Cuatro mil sesenta y nueve pesos 43/100 M.N.)"]  
ccantidad[15] = ["(Cuatro mil trescientos cuarenta y cinco pesos 04/100 M.N.)"]  
ccantidad[16] = ["(Cuatro mil seiscientos veinte pesos 65/100 M.N.)"]  
ccantidad[17] = ["(Cuatro mil ochocientos noventa y seis pesos 27/100 M.N.)"] 
ccantidad[18] = ["(Cinco mil ciento setenta y un pesos 88/100 M.N.)"]  
ccantidad[19] = ["(Cinco mil cuatrocientos cuarenta y siete pesos 49/100 M.N.)"]  
ccantidad[20] = ["(Cinco mil setecientos veintitres pesos 10/100 M.N.)"]  
ccantidad[21] = ["(Cinco mil novecientos noventa y ocho pesos 72/100 M.N.)"] 
ccantidad[22] = ["(Seis mil doscientos setenta y cuatro pesos 33/100 M.N.)"]  
ccantidad[23] = ["(Seis mil quinientos cuarenta y nueve pesos 94/100 M.N.)"]  
ccantidad[24] = ["(Seis mil ochocientos veinticuatro pesos 38/100 M.N.)"]  
ccantidad[25] = ["(Siete mil ochenta y cuatro pesos 16/100 M.N.)"]  
ccantidad[26] = ["(Siete mil trecientos cuarenta y tres pesos 94/100 M.N.)"]  
ccantidad[27] = ["(Siete mil seiscientos tres pesos 72/100 M.N.)"]  
ccantidad[28] = ["(Siete mil ochocientos sesenta y tres pesos 49/100 M.N.)"] 
ccantidad[29] = ["(Ocho mil ciento veintitres pesos 27/100 M.N.)"]  
ccantidad[30] = ["(Ocho mil trescientos setenta pesos 07/100 M.N.)"]  
 
/*function eligeneto(formu)
{	var ccantidad2 = formu.neto.selectedIndex
	formu.cantidad.length = ccantidad[ccantidad2].length
	for (i=0; i<formu.cantidad.length; i++)
	{	formu.cantidad.options[i].text = ccantidad[ccantidad2][i]
	}
}*/

function eligeneto(formu) /* PRUEBA*/
{	var ccantidad2 = formu.neto.selectedIndex
	formu.cantidad.length = ccantidad[ccantidad2].length
	for (i=0; i<formu.cantidad.length; i++)
	{	formu.cantidad.options[i].text = ccantidad[ccantidad2][i]
	}
}

 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
