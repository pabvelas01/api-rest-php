<?php

require "conexion.php";

class ModeloCursos{
    public static function index(){
        $tabla="cursos";
        $stmt= Conexion::conectar()->prepare("select * from $tabla");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);

        $stmt->close();
        $stmt=null;
    }
}

?>