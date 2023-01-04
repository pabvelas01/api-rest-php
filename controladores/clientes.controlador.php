<?php 

class ControladorClientes{
 public function create($datos){
    $json=[];
    if (isset ($datos["nombre"]) && !preg_match('/^[a-zA-ZαινσϊΑΙΝΣΪρΡ]+$/',$datos["nombre"])){
        $json=array(
            "status"=>404,
            "detalle"=>"Error en el campo del nombre no permitido, solo letras"
        );
        return;
       
    }
    if (isset ($datos["apellido"]) && !preg_match('/^[a-zA-ZZαινσϊΑΙΝΣΪρΡ]+$/',$datos["apellido"])){
        $json=array(
            "status"=>404,
            "detalle"=>"Error en el campo del apellido no permitido, solo letras"
        );
        return;
       
    }
    // Validar email
    if (isset ($datos["email"]) && !preg_match('/^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/',$datos["email"])){
        $json=array(
            "status"=>404,
            "detalle"=>"Error en el campo del correo no valido, formato incorrecto"
        );
        return;
       
    }

    // Validar existencia de email repetido


    $clientes=ModeloClientes::existeCorreo($datos);
    
    foreach($clientes as $key=>$c){
        if ($datos["email"]==$c["email"]){
            $json=array(
                "status"=>404,
                "detalle"=>"el email esta repetido"
            );
            echo json_encode($json,true);
            return;
        }
    }

    

    /**
     * Generar credenciales del cliente
     */
    $id_cliente= str_replace("$","c",crypt($datos["nombre"].$datos["apellido"].$datos["email"],'2a$dfsdfsdf$$sdfs$'));
    $llave_secreta_cliente= str_replace("$","a",crypt($datos["email"].$datos["apellido"].$datos["nombre"],'2a$dfsdfsdf$$sdfs$'));

    $datos=array("nombre"=>$datos["nombre"],
    "apellido"=>$datos["apellido"],
    "email"=>$datos["email"],
    "id_cliente"=>$id_cliente,
    "create_at"=>date('Y-m-d h:i:s'),
    "update_at"=>date('Y-m-d h:i:s'),
    "llave_cliente"=>$llave_secreta_cliente);

    $create = ModeloClientes::create($datos);
   
    if ($create=="ok"){
        $json=array(
            "detalle"=>"se genero sus credenciales de acceso",
            "credenciales"=>$id_cliente,
            "llave_secreta"=>$llave_secreta_cliente
        );
        echo json_encode($json,true);
    }
 }

 public function index(){
    $json=array(
        "detalle"=>"estas en la vista registros listados "
    );
    echo json_encode($json,true);
 }



}
?>