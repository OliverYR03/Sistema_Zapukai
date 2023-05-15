<?php
require_once "../modelos/permiso.php";

$permiso=new permiso();


switch ($_GET["op"]){

    case 'listar':
        $respuesta=$permiso->listar();
        
        $data=Array();
        
        while ($reg=$respuesta->fetch_object()){
            $data[]=array(
                
                "0"=>$reg->nombre,


                );
        }
        $results = array(
            "sEcho"=>1,
            "iTotalRecords"=>count($data),
            "iTotalDisplayRecords"=>count($data),
            "aaData"=>$data);
        echo json_encode($results);   

    break;
  
    





    
}
?>