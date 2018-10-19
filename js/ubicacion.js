function edificio()
{	
	var edif="";

	if (document.getElementById('A').checked)
	{
		edif=edif + $('#A:checked').val();
	}

	if (document.getElementById('B-1').checked)
	{
		edif=edif + $('#B-1:checked').val();
	}

	if (document.getElementById('B-2').checked)
	{
		edif=edif + $('#B-2:checked').val();
	}

	if (document.getElementById('C').checked)
	{
		edif=edif + $('#C:checked').val();
	}
	if (document.getElementById('BAHIA').checked)
	{
		edif=edif + $('#BAHIA:checked').val();
	}					

	if (document.getElementById('TE').checked)
	{
		edif=edif + $('#TE:checked').val();
	}

	if (document.getElementById('EX-I').checked)
	{
		edif=edif + $('#EX-I:checked').val();
	}
	
	if (document.getElementById('TI').checked)
	{
		edif=edif + $('#TI:checked').val();
	}
	if (document.getElementById('PUENTE1').checked)
	{
		edif=edif + $('#PUENTE1:checked').val();
	}
	if (document.getElementById('PUENTE2').checked)
	{
		edif=edif + $('#PUENTE2:checked').val();
	}
	if (document.getElementById('EX-B').checked)
	{
		edif=edif + $('#EX-B:checked').val();
	}

	if (document.getElementById('D').checked)
	{
		edif=edif + $('#D:checked').val();
	}
	document.getElementById("ubicacion").value = edif;     			
}