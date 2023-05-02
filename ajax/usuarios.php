<?php
require_once "../modelos/usuarios.php";

$usuario=new usuario();

$idusuario=isset($_POST["idusuario"])? limpiarCadena($_POST["idusuario"]):"";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$tipo_documento=isset($_POST["tipo_documento"])? limpiarCadena($_POST["tipo_documento"]):"";
$num_documento=isset($_POST["num_documento"])? limpiarCadena($_POST["num_documento"]):"";
$direccion=isset($_POST["direccion"])? limpiarCadena($_POST["direccion"]):"";
$telefono=isset($_POST["telefono"])? limpiarCadena($_POST["telefono"]):"";
$email=isset($_POST["email"])? limpiarCadena($_POST["email"]):"";
$cargo=isset($_POST["cargo"])? limpiarCadena($_POST["cargo"]):"";
$login=isset($_POST["login"])? limpiarCadena($_POST["login"]):"";
$clave=isset($_POST["clave"])? limpiarCadena($_POST["clave"]):"";
$cargo=isset($_POST["imagen"])? limpiarCadena($_POST["imagen"]):"";

switch($_GET["op"]){
    case 'guardareditar':

        if (!file_exists($_FILES['imagen']['tmp_name']) || !is_uploaded_file($_FILES['imagen']['tmp_name']))
        {
            $imagen=$_POST["imagenactual"];
        }
        else
        {
            $ext = explode(".", $_FILES["imagen"]["name"]);
            if ($_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg" || $_FILES['imagen']['type'] == "image/png")
            {
                $imagen = round(microtime(true)) . '.' . end($ext);
                move_uploaded_file($_FILES["imagen"]["tmp_name"], "../files/articulos/" . $imagen);
            }
        }

        if(empty($idusuario)){

            $respuesta=$usuario->insertar($nombre,$tipo_documento,$num_documento,$direccion,$telefono,$email,$cargo,$login,
            $clavehash,$imagen,$_POST['permiso']);
            echo $respuesta? "usuario registrado" : "usuario no se pudo registrar";

        
        }else{

            $respuesta=$usuario->insertar($nombre,$tipo_documento,$num_documento,$direccion,$telefono,$email,$cargo,$login,
            $clavehash,$imagen,$_POST['permiso']);
            echo $respuesta? "usuario actualizada" : "usuario no se pudo actualizar";

        }

    

    break;
    

    case 'desactivar':

        $respuesta=$usuario->desactivar($idusuario);
        echo $respuesta? "usuario desactivada" : "usuario no se pudo desactivar";


    break;


    case 'activar':

        $respuesta=$usuario->activar($idusuario);
        echo $respuesta? "usuario activada" : "usuario no se pudo activar";


    break;


    case 'mostrar':


        $respuesta=$usuario->mostrar($idusuario);

        echo json_encode($respuesta);
        break;


    break;


    case 'listar':

        $respuesta=$usuario->listar();


        $data=Array();


        while($reg=$respuesta->fetch_object()){


                $data[]=array(
                    "0"=> ($reg->condicion)? '<button class="btn btn-warning" onclick="mostrar('.$reg-> idusuario.')"><i class="fa-solid fa-pencil"></i></button>'.
                          '<button class="btn btn-danger" onclick="eliminar('.$reg-> idusuario.')"><i class="fa-solid fa-xmark"></i></button>':
                          '<button class="btn btn-danger" onclick="mostrar('.$reg-> idusuario.')"><i class="fa-solid fa-xmark"></i></button>'.
                          '<button class="btn btn-danger" onclick="activar('.$reg-> idusuario.')"><i class="fa-solid fa-xmark"></i></button>',
                    "1"=>$reg->nombre,
                    "2"=>$reg->tipo_documento,
                    "3"=>$reg->num_documento,
                    "4"=>$reg->telefono,
                    "5"=>$reg->email,
                    "6"=>$reg->login,
                    "7"=>"<img src='../files/usuarios/".$reg->imagen."' height='50px' width='50px' >",
                    "8"=>($reg->condicion)?'<span class="label bg-green">Activado</span>':
                    '<span class="label bg-red"> Desactivado</span>',
                    
                );
        }

        $result = array(

            "echo"=>1,
            "totalrecords"=>count($data),
            "iTotalDisplayRecords"=>count($data),
            "aaData"=>$data);

            echo json_encode($result);
    

    break;

    case 'permisos':

        require_once "../modelos/permiso.php";

        $permiso = new permiso();

        $rspta = $permiso->listar();

        $id=$_GET['id'];

        $marcados = $usuario->listarmarcados($id);

        $valores= array();

        while ($per = $marcados->fetch_object())
        {
            array_push($valores, $per->idpermiso);
        }

            while ($reg = $rspta ->fetch_object())
                {
                    $sw=in_array($reg->idpermiso,$valores)?'checked':'';

                    echo '<li> <input type="checkbox" '.$sw.' name ="permiso[]" value="'.$reg->idpermiso.'">',reg->nombre.'</li>';
                }


    break;






    
}











?>