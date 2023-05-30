<?php 
	@session_start();
	require_once("../conexion/Modelo_generico .php");
	$modelo = new Modelo_generico();

	 if (isset($_POST['consultar_login']) && $_POST['consultar_login']=="si_consultalo") {
	$correo = $_POST['correo'];
	$contra= $_POST['contrasena'];
		$sql = "SELECT * FROM usuarios AS us
				WHERE  us.user='$correo' AND us.password= '$contra'
				";

		$resultado = $modelo->get_query($sql);
		if ($resultado[0]==1 && $resultado[4]==1) {
			
				
				$_SESSION['logueado']="si";
			//Hacer consulta con join para que muestra tambien el nombre de la persona logueada
			//	$_SESSION['nombre']=$resultado[2][0]['nombre'];
				$_SESSION['usuario']=$resultado[2][0]['user'];

				$array = array("Exito","Bienvenido al sistema ".$resultado[2][0]['user'],$resultado,$_SESSION);
				print json_encode($array);
				exit();
			
		}else{
			$array = array("Error","Datos no existen",$resultado);
			print json_encode($array);
			exit();
		}

		 

	}



?>