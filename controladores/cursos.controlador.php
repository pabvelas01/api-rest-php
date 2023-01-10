<?php

class ControladorCursos{
    public function index(){

        $clientes = ModeloClientes::index();
        if (isset($_SERVER["PHP_AUTH_USER"]) && isset($_SERVER["PHP_AUTH_PW"])){
            
            foreach($clientes as $key =>$value){

                if ($_SERVER["PHP_AUTH_USER"] .":". $_SERVER["PHP_AUTH_PW"] ==
                    $value["id_cliente"] . ":" . $value["llave_secreta"]){
                        $cursos= ModeloCursos::index();
                        $json=array(
                            "detalle"=>$cursos
                        );
                        echo json_encode($json,true);
                }

            }
            
          
        }
    }

    public function create(){
        $json=array(
            "detalle"=>"estas en la vista de crear"
        );
        echo json_encode($json,true);
    }

    public function show($id){
        $json=array(
            "detalle"=>"estas en la vista de crear con parametro=" .$id
        );
        echo json_encode($json,true);
    }

    public function update($id){
        $json=array(
            "detalle"=>"estas en la vista de actualizar con parametro=" .$id
        );
        echo json_encode($json,true);
    }
    public function delete($id){
        $json=array(
            "detalle"=>"estas en la vista de eliminacion con parametro..." .$id
        );
        echo json_encode($json,true);
    }
}

?>
