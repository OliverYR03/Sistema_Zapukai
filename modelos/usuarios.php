<?php


require_once "../config/conexion.php";


class usuario{



    public function __construct(){


    }




    public function insertar($nombre,$tipo_documento,$num_documento,$direccion,$telefono,$email,$cargo,$login,$clave,$imagen,$permisos,$condicion){

        $sql="INSERT INTO usuario(nombre,tipo_documento,num_documento,direccion,telefono,email,cargo,login,clave,imagen,permisosm condicion) VALUES
        ('$nombre','$tipo_documento','$num_documento','$direccion','$telefono','$email','$cargo','$login','$clave','$imagen','$permisos','1')";
        // return ejecutarConsulta($sql);
        $idusuarionew=ejecutarConsulta_retornarID($sql);

        $num_elementos=0;
        $sw=true;


        while ($num_elementos < count ($permisos)) {
            
                $sql_detalle = "INSERT INTO usuario_permiso(idusuario, idpermiso) VALUES ('$idusuarionew', '$permisos[$num_elementos]')";
                ejecutarConsulta($sql_detalle) or $sw = false;
                $num_elementos=$num_elementos + 1;


        }

        return $sw;



    }

    public function editar($idusuario,$nombre,$tipo_documento,$num_documento,$direccion,$telefono,$email,$cargo,$login,$clave,$imagen,$permisos){

        $sql="UPDATE usuario SET nombre='$nombre',,tipo_documento='$tipo_documento',num_documento='$num_documento',
        direccion='$direccion',telefono='$telefono',email='$email',carggo='$cargo',login='$login',clave='$clave',imagen='$imagen' WHERE idusuario='$idusuario'";
        return ejecutarConsulta($sql);

        $sqldel="DELETE FROM usuario_permiso WHERE idusuario='$idusuario'";
        ejecutarConsulta($sqldel);

        $num_elementos=0;
        $sw=true;

        while ($num_elementos < count ($permisos)) 
        {
            $sql_detalle = "INSERT INTO usuario_permiso(idusuario, idpermiso) VALUES ('$idusuarionew', '$permisos[$num_elementos]')";
            ejecutarConsulta($sql_detalle) or $sw = false;
            $num_elementos=$num_elementos + 1;
        }

            return $sw;


    }

    public function desactivar($idusuario){

        $sql="UPDATE usuario SET condicion='0' WHERE idusuario='$idusuario'";
        return ejecutarConsulta($sql);
    }

    public function activar($idusuario){

        $sql="UPDATE usuario SET condicion='1' WHERE idusuario='$idusuario'";
        return ejecutarConsulta($sql);
    }

    public function mostrar($idusuario){

        $sql="SELECT * FROM usuario WHERE idusuario ='$idusuario'";
        return ejecutarconsultaUnica($sql);
    }

    public function listar(){
        $sql="SELECT * FROM usuario";
        return ejecutarConsulta($sql);
    }

    public function listarmarcados(){
        $sql="SELECT * FROM usuario_permiso WHERE idusuaario='$idusuario'";
        return ejecutarConsulta($sql);
    }

    public function verificar($login,$clave)
    {
        $sql="SELECT idusuario, nombre, tipo_documento,num_documento,telefono,email,cargo,imagen,login FROM usuarios WERE login='login' AND 
        clave='$clave' AND condicion='1'";
        return ejecutarConsulta($sql);
    }

   
}

?>