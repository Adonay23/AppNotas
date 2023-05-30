<?php 
require_once("../conexion/Modelo_generico .php");
    $modelo = new Modelo_generico();

    if (isset($_POST['eliminar_nota']) && $_POST['eliminar_nota']=="si_eliminala") {
        $array_eliminar = array(
            "table"=>"notas",
            "idnota"=>$_POST['id']

        );
        $resultado = $modelo->eliminar_generica($array_eliminar);
        if($resultado[0]=='1'){
            print json_encode(array("Exito",$_POST,$resultado));
            exit();

        }else {
            print json_encode(array("Error",$_POST,$resultado));
            exit();
        }
        


    }else if (isset($_POST['consultar_info']) && $_POST['consultar_info']=="si_con_este_id") {

        $resultado = $modelo->get_todos("notas","WHERE idnota = '".$_POST['id']."'");
        if($resultado[0]=='1'){
            print json_encode(array("Exito",$_POST,$resultado[2][0]));
            exit();

        }else {
            print json_encode(array("Error",$_POST,$resultado));
            exit();
        }



    }else if (isset($_POST['ingreso_datos']) && $_POST['ingreso_datos']=="si_actualizar") {
        $array_update = array(
            "table" => "notas",
            "idnota" => $_POST['llave_persona'],
            "nombre" => $_POST['nombre'],
            "fecha" => $_POST['fecha'],
            "descripcion" => $_POST['descripcion']
        );
        $resultado = $modelo->actualizar_generica($array_update);

        if($resultado[0]=='1' && $resultado[4]>0){
            print json_encode(array("Exito",$_POST,$resultado));
            exit();

        }else {
            print json_encode(array("Error",$_POST,$resultado));
            exit();
        }


    }else if(isset($_POST['ingreso_datos']) && $_POST['ingreso_datos']=="si_registro"){
		
		$id_insertar = $modelo->retonrar_id_insertar("notas"); 
        $array_insertar = array(
            "table" => "notas",
            "idnota"=>$id_insertar,
            "iduser"=>1,
            "fecha" => $_POST['fecha'],
            "nombre" => $_POST['nombre'],
            "descripcion" => $_POST['descripcion']
           
    
        );
     //   echo "fechaformateada".$modelo->formatear_fecha($_POST['fecha']);
        $result = $modelo->insertar_generica($array_insertar);
        if($result[0]=='1'){
          
        	print json_encode(array("Exito",$_POST,$result));
			exit();

        }else {
        	print json_encode(array("Error",$_POST,$result));
			exit();
        }
		
    }else if (isset($_POST['consultar_datos']) && $_POST['consultar_datos']=="si_consultalos") {
        $sql = "SELECT * FROM notas";
        $resultado = $modelo->get_query($sql);

        $html=$html_tr="";
        $cuanto=0;
        if ($resultado[0]=="1") {
            foreach ($resultado[2] as $row) {
                $html_tr.='<tr>
                            <td>'.$modelo->formatear_fecha($row['fecha']).'</td>
                            <td>'.$row['nombre'].'</td>
                            <td>'.$row['descripcion'].'</td>
                          
                            <td>
                                <div class="dropdown m-b-10">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        Seleccione
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item btn_eliminar" data-id="'.$row['idnota'].'"  href="javascript:void(0)">Eliminar</a>
                                        <a class="dropdown-item btn_editar" data-id="'.$row['idnota'].'"  href="javascript:void(0)" >Actualizar</a>
                                     
                                    </div>
                                </div>
                            </td> 
                        </tr>';
                
            }

            $html.='<table id="tabla_personas" class="table table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Fecha </th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        ';
            $html.=$html_tr;
            $html.='</tbody>
                    </table>';

            print json_encode(array("Exito",$html,$resultado[4]));

        }else{
            print json_decode(array("Error",$resultado));
        }
         
}
     ?>