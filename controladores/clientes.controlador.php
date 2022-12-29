<?php 

class ControladorClientes{
 public function create(){
    $json=array(
        "detalle"=>"estas en la vista registros"
    );
    echo json_encode($json,true);
 }

 public function index(){
    $json=array(
        "detalle"=>"estas en la vista registros listados "
    );
    echo json_encode($json,true);
 }



}
?>