<?php
require_once "../modelos/articulos.php";

$articulo=new Articulo();

$idarticulo=isset($_POST["idarticulo"])? limpiarCadena($_POST["idarticulo"]):"";
$idcategoria=isset($_POST["idcategoria"])? limpiarCadena($_POST["idcategoria"]):"";
$codigo=isset($_POST["codigo"])? limpiarCadena($_POST["codigo"]):"";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$stock=isset($_POST["stock"])? limpiarCadena($_POST["stock"]):"";
$descripcion=isset($_POST["descripcion"])? limpiarCadena($_POST["descripcion"]):"";
$imagen=isset($_POST["imagen"])? limpiarCadena($_POST["imagen"]):"";
$condicion=isset($_POST["condicion"])? limpiarCadena($_POST["condicion"]):"";

switch ($_GET["op"]){
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

        if(empty($idarticulo)){

            $respuesta=$articulo->insertar($idarticulo,$idcategoria,$codigo,$stock,$nombre,$descripcion,$imagen,$condicion);
            echo $respuesta? "Articulo registrada" : "Articulo no se pudo registrar";

        
        }else{

            $respuesta=$articulo->editar($idarticulo,$idcategoria,$codigo,$stock,$nombre,$descripcion,$imagen);
            echo $respuesta? "Articulo actualizada" : "Articulo no se pudo actualizar";

        }

    

    break;
    

    case 'desactivar':

        $respuesta=$articulo->desactivar($idarticulo);
        echo $respuesta? "Articulo desactivada" : "Articulo no se pudo desactivar";


    break;


    case 'activar':

        $respuesta=$articulo->activar($idarticulo);
        echo $respuesta? "Articulo activada" : "Articulo no se pudo activar";


    break;


    case 'mostrar':


        $respuesta=$articulo->mostrar($idarticulo);

        echo json_encode($respuesta);
        break;


    break;


    case 'listar':

        $respuesta=$articulo->listar();


        $data=Array();


        while($resp=$respuesta->fetch_object()){


                $data[]=array(

                    "0"=>($resp->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$resp->idarticulo.')"><i class="fa-solid fa-pencil"></i></button>'.
                            '<button class="btn btn-danger" onclick="desactivar('.$resp->idarticulo.')"><i class="fa-solid fa-xmark"></i></button>':
                            '<button class="btn btn-warning" onclick="mostrar('.$resp->idarticulo.')"><i class="fa-solid fa-pencil"></i></button>'.
                            '<button class="btn btn-success" onclick="activar('.$resp->idarticulo.')"><i class="fa-solid fa-plus"></i></button>', 
                    "1"=>$resp->nombre,
                    "2"=>$resp->idcategoria,
                    "3"=>$resp->codigo,
                    "4"=>$resp->stock,
                    "5"=>"<img src='../files/articulos/".$resp->imagen."'height='50px' width='50px' >",
                    "6"=>$resp->condicion?'<span class="label bg-green">Activado</span>':
                                          '<span class="label bg-danger">Desactivado</span>',
                );
        }

        $result=array(

            "echo"=>1,
            "totalrecords"=>count($data),
            "iTotalDisplayRecords"=>count($data),
            "aaData"=>$data);

            echo json_encode($result);
    

    break;

    case 'selectCategoria':

        require_once "../modelos/categoria.php";

        $categoria = new Categoria();

        $rspta = $categoria->select();

        	while ($reg = $rspta->fetch_object())
            {
                echo '<option value="' . $reg->idcategoria . '">' . $reg->nombre . '</option>';
            }


    break;






    
}











?>