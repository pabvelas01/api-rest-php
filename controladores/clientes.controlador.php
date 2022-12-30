<?php 

class ControladorClientes{
 public function create($datos){
    $json=[];
    if (isset ($datos["nombres"]) && !preg_match('/^[a-zA-ZαινσϊΑΙΝΣΪρΡ]+$/',$datos["nombres"])){
        $json=array(
            "status"=>404,
            "detalle"=>"Error en el campo del nombre no permitido, solo letras"
        );
       
    }
    if (isset ($datos["apellidos"]) && !preg_match('/^[a-zA-ZαινσϊΑΙΝΣΪρΡ]+$/',$datos["apellidos"])){
        $json=array(
            "status"=>404,
            "detalle"=>"Error en el campo del apellido no permitido, solo letras"
        );
       
    }
    // Validar email
    if (isset ($datos["email"]) && !preg_match('/^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/',$datos["email"])){
        $json=array(
            "status"=>404,
            "detalle"=>"Error en el campo del correo no valido, formato incorrecto"
        );
       
    }

    // Validar existencia de email repetido


    $clientes=ModeloClientes::existeCorreo($datos);
    
    foreach($clientes as $key=>$c){
        if ($datos["email"]==$c["email"]){
            $json=array(
                "status"=>404,
                "detalle"=>"el email esta repetido"
            );
        }
    }

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