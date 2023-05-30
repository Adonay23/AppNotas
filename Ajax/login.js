$(function(){
	console.log("Esta funcionando");
	


	$("#formulario_login").submit(function(e){
		e.preventDefault();
	
			$.ajax({
				dataType: "json",
				method:"POST",
				url:"../controlador/controladorLogin.php",
				data:{"consultar_login":"si_consultalo","correo":$("#correo").val(),"contrasena":$("#contrasena").val()}
			}).done(function (json){
				console.log("el json: ",json);
				if (json[0]=="Exito") {
	    	 	$(location).attr('href','../vistas/agregarNotas.php');
						
		    	 }else{
		    	 		console.log("Error aqui: ", 	json[1]);
		    	 }

			}).fail(function(json){
            console.log("dio Error:",json);
		});


		
	})
});



 function soloLetras(e) {
    var key = e.keyCode || e.which,
      tecla = String.fromCharCode(key).toLowerCase(),
      letras = " abcdefghijklmnñopqrstuvwxyz",
      especiales = [8, 37, 39, 46],
      tecla_especial = false;

    for (var i in especiales) {
      if (key == especiales[i]) {
        tecla_especial = true;
        break;
      }
    }

    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
      return false;
    }
  }