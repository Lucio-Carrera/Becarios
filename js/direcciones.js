$(document).ready(function(){
	$("#organismo").click(function(){					
		$("#organismo option:selected").each(function(){
			ID_Org=$(this).val();
			$.post("includes/getDireccion.php", {ID_Org: ID_Org}, function(data){
				$("#direccion").html(data);
			});
		});
	});
});


$(document).ready(function(){
	$("#direccion").click(function(){
		$("#direccion option:selected").each(function(){
			ID_Dir=$(this).val();
			$.post("includes/getSubdireccion.php", {ID_Dir: ID_Dir}, function(data){
				$("#subdireccion").html(data);
			});
		});
	});
});


$(document).ready(function(){
	$("#subdireccion").click(function(){
		$("#subdireccion option:selected").each(function(){
			ID_Sub=$(this).val();
			$.post("includes/getGerencia.php", {ID_Sub: ID_Sub}, function(data){
				$("#gerencia").html(data);
			});
		});
	});
});
