<?php

class ControladorCursos{
    public function index(){
        $json=array(
            "detalle"=>"estas en la vista cursos"
        );
        echo json_encode($json,true);
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
