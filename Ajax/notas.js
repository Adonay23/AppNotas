	$(function(){
	console.log("Esta funcionando");
	cargar_datos();

	$(document).on("submit","#form-notas",function(e){
		e.preventDefault();

	  /*	mostrar_cargando("Procesando solicitud","Espere mientras se almacenan los datos")*/


		let datos = $("#form-notas").serialize();
		console.log(datos);
		$.ajax({
			dataType:"json",
			method:"POST",
			url:"../controlador/controladorNotas.php",
			data:datos
		}).done(function(json){
			//Swal.close();
			console.log("datos consuldos: ",json);
			if (json[0]=="Exito") {
			//	console.log("hola exito");
		   $("#form-notas")[0].reset();
				cargar_datos();
			}
		}).fail(function(json){
            console.log("dio Error:",json);
		}).always(function(){

		})
     });


	$(document).on("click",".btn_eliminar",function(e){
		e.preventDefault();
		//console.log("Entra en eliminar");
		var id = $(this).attr("data-id");
		var datos = {"eliminar_nota":"si_eliminala","id":id}
		$.ajax({
	        dataType: "json",
	        method: "POST",
	        url:'../controlador/controladorNotas.php',
	        data : datos,
	    }).done(function(json) {
			if(json[0]=="Exito"){
			//	console.log(json);
				cargar_datos();
			}
	    	

	    }).fail(function(json){
	     // console.log("ERROR: ",json);
	});
	});


	$(document).on("click",".btn_editar",function(e){

		e.preventDefault(); 
		var id = $(this).attr("data-id");
		//console.log("El id es: ",id);
		var datos = {"consultar_info":"si_con_este_id","id":id}
		$.ajax({
	        dataType: "json",
	        method: "POST",
	        url:'../controlador/controladorNotas.php',
	        data : datos,
	    }).done(function(json) {
	    	//console.log("EL consultar especifico",json);
	    	if (json[0]=="Exito") {
	    		/*var fecHA_string = json[2]['fecha_nacimiento'];
				var porciones = fecHA_string.split('-');
				var fecha = porciones[2]+"/"+porciones[1]+"/"+porciones[0]*/

	    		$('#llave_persona').val(id);
	    		$('#ingreso_datos').val("si_actualizar");
	    		$('#nombre').val(json[2]['nombre']);
	    		$('#fecha').val(json[2]['fecha']);
	    		$('#descripcion').val(json[2]['descripcion']);
				cargar_datos();
	    	}
	    	 
	    }).fail(function(){

	    }).always(function(){

	    });


	});


	});


function cargar_datos(){
	
	var datos = {"consultar_datos":"si_consultalos"};
	$.ajax({
		dataType:"json",
		method:"POST",
		url:"../controlador/controladorNotas.php",
		data:datos
	}).done(function(json){
		//Swal.close();
		//console.log("datos consuldos: ",json);
		if (json[0]=="Exito") {
			$("#aqui_tabla").empty().html(json[1]);
			$('#tabla_personas').dataTable();
			$("#personas_registras").empty().html(json[2]);
		}
	}).fail(function(json){
	//console.log("ERROR: ",json);
	}).always(function(){

	})
}