<?php
require_once "../modelos/persona.php";

$permiso=new permiso();

$idpersona=isset($_POST["idpersona"])? limpiarCadena($_POST["idpersona"]):"";
$tipo_persona=isset($_POST["tipo_persona"])? limpiarCadena($_POST["tipo_persona"]):"";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$tipo_documento=isset($_POST["tipo_documento"])? limpiarCadena($_POST["tipo_documento"]):"";
$num_documento=isset($_POST["num_documento"])? limpiarCadena($_POST["num_documento"]):"";
$direccion=isset($_POST["direccion"])? limpiarCadena($_POST["direccion"]):"";
$telefono=isset($_POST["telefono"])? limpiarCadena($_POST["telefono"]):"";
$email=isset($_POST["email"])? limpiarCadena($_POST["email"]):"";

switch ($_GET["op"]){

    case 'listarp':

        $respuesta=$persona->listarp();


        $data=Array();


        while($resp=$respuesta->fetch_object()){


                $data[]=array(
                    "0"=>    '<button class="btn btn-warning" onclick="mostrar('.$resp-> idpersona.')"><i class="fa-solid fa-pencil"></i></button>'.
                             '<button class="btn btn-danger" onclick="eliminar('.$resp-> idpersona.')"><i class="fa-solid fa-xmark"></i></button>',
                    "1"=>$resp->nombre,
                    "2"=>$resp->tipo_documento,
                    "3"=>$resp->num_documento,
                    "4"=>$resp->telefono,
                    "5"=>$resp->email,

                );
        }

        $result=array(

            "echo"=>1,
            "totalrecords"=>count($data),
            "iTotalDisplayRecords"=>count($data),
            "aaData"=>$data);

            echo json_encode($result);
    

    break;

    case 'listarc':

        $respuesta=$persona->listarc();


        $data=Array();


        while($resp=$respuesta->fetch_object()){


                $data[]=array(
                    "0"=> '<button class="btn btn-warning" onclick="mostrar('.$resp-> idpersona.')"><i class="fa-solid fa-pencil"></i></button>'.
                          '<button class="btn btn-danger" onclick="eliminar('.$resp-> idpersona.')"><i class="fa-solid fa-xmark"></i></button>',
                    "1"=>$resp->nombre,
                    "2"=>$resp->tipo_documento,
                    "3"=>$resp->num_documento,
                    "4"=>$resp->telefono,
                    "5"=>$resp->email,
                );
        }

        $result=array(

            "echo"=>1,
            "totalrecords"=>count($data),
            "iTotalDisplayRecords"=>count($data),
            "aaData"=>$data);

            echo json_encode($result);
    

    break;

    
}











?>