<?php
/*file_exists("conexion.php")
require_once 'conexion.php';
*/
class ModeloClientes{
    
    public static function crear($datos){

    }

    public static function existeCorreo($datos){
        $tabla="clientes";
        $stmt=Conexion::conectar()->prepare("select * from $tabla");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt=null;
    }
}
?>