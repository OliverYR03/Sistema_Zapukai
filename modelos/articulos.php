<?php


require_once "../config/conexion.php";


class Articulo{



    public function __construct(){


    }




    public function insertar($idarticulo,$idcategoria,$codigo,$stock,$nombre,$descripcion, $imagen, $condicion){

        $sql="INSERT INTO articulo(idarticulo, idcategoria, codigo, nombre, stock, descripcion, imagen, condicion) VALUES('$idarticulo','$idcategoria','$codigo',
        '$stock','$nombre','$descripcion', '$imagen', '1')";
        return ejecutarConsulta($sql);

    }

    public function editar($idarticulo,$idcategoria,$codigo,$stock,$nombre,$descripcion, $imagen){

        $sql="UPDATE articulo SET idcategoria='$idcategoria', codigo='$codigo', nombre='$nombre', stock='$stock',
         descripcion='$descripcion', imagen='$imagen' WHERE idarticulo='$idarticulo'";
        return ejecutarConsulta($sql);

    }

    public function desactivar($idarticulo){

        $sql="UPDATE articulo SET condicion='0' WHERE idarticulo='$idarticulo'";
        return ejecutarConsulta($sql);
    }

    public function activar($idarticulo){

        $sql="UPDATE articulo SET condicion='1' WHERE idarticulo='$idarticulo'";
        return ejecutarConsulta($sql);
    }


    public function mostrar($idarticulo){

        $sql="SELECT * FROM articulo WHERE idarticulo ='$idarticulo'";
        return ejecutarconsultaUnica($sql);
    }

    public function listar(){
        $sql="SELECT * FROM articulo";
        return ejecutarConsulta($sql);
    }



}

?>