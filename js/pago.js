var cimpuesto = new Array
cimpuesto[1] = ["$ 5.94"]
cimpuesto[2] = ["$ 17.36"]
cimpuesto[3] = ["$ 37.15"]
cimpuesto[4] = ["$ 56.94"]
cimpuesto[5] = ["$ 76.73"]
cimpuesto[6] = ["$ 96.53"]
cimpuesto[7] = ["$ 116.32"]
cimpuesto[8] = ["$ 136.11"]
cimpuesto[9] = ["$ 155.90"]
cimpuesto[10] = ["$ 175.70"]
cimpuesto[11] = ["$ 195.49"]
cimpuesto[12] = ["$ 215.28"]
cimpuesto[13] = ["$ 235.08"]
cimpuesto[14] = ["$ 260.21"]
cimpuesto[15] = ["$ 293.86"]
cimpuesto[16] = ["$ 327.51"]
cimpuesto[17] = ["$ 361.15"]
cimpuesto[18] = ["$ 394.80"]
cimpuesto[19] = ["$ 428.45"]
cimpuesto[20] = ["$ 462.10"]
cimpuesto[21] = ["$ 495.74"]
cimpuesto[22] = ["$ 529.39"]
cimpuesto[23] = ["$ 563.04"]
cimpuesto[24] = ["$ 597.86"]
cimpuesto[25] = ["$ 647.34"]
cimpuesto[26] = ["$ 696.82"]
cimpuesto[27] = ["$ 746.30"]
cimpuesto[28] = ["$ 795.79"]
cimpuesto[29] = ["$ 845.27"]
cimpuesto[30] = ["$ 907.73"]

function eligebruto(formu)
{	var cimpuesto2 = formu.bruto.selectedIndex
	formu.impuesto.length = cimpuesto[cimpuesto2].length
	for (i=0; i<formu.impuesto.length; i++)
	{	formu.impuesto.options[i].text = cimpuesto[cimpuesto2][i]
	}
	
}

 
 
 
 
 
 
 
 
 
 
 
 
 
 

 
 
 
 
 
 
 
 
 
 
 
 
 
