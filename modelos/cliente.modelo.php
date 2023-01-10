<?php
/*file_exists("conexion.php")
require_once 'conexion.php';
*/
class ModeloClientes{
    
    public static function index(){
        $tabla="clientes";
        $stmt= Conexion::conectar()->prepare("select * from $tabla");
        $stmt->execute();

        return $stmt->fetchAll();

        $stmt->close();
        $stmt=null;
    }

    public static function existeCorreo($datos){
        $tabla="clientes";
        $stmt=Conexion::conectar()->prepare("select * from $tabla");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt=null;
    }

    public static function create($datos){
        $tabla="clientes";
        
        $stmt=Conexion::conectar()->prepare("INSERT INTO clientes (primer_nombre,primer_apellido,email,id_cliente,llave_secreta,
        create_at,update_at)
        VALUES ( :nombre ,:apellidos, :email, :id_cliente, :llave_secreta, :create_at, :update_at) ");
        
      /*
      $stmt=Conexion::conectar()->prepare("INSERT INTO clientes (primer_nombre,primer_apellido)
        VALUES ( :nombre , :apellidos ) ");
     */

        $stmt -> bindParam(":nombre",$datos["nombre"], PDO::PARAM_STR);
        $stmt -> bindParam(":apellidos",$datos["apellido"], PDO::PARAM_STR);
     
        $stmt -> bindParam(":id_cliente",$datos["id_cliente"], PDO::PARAM_STR);
        $stmt -> bindParam(":email",$datos["email"], PDO::PARAM_STR);
        $stmt -> bindParam(":llave_secreta",$datos["llave_cliente"], PDO::PARAM_STR);
        $stmt -> bindParam(":create_at",$datos["create_at"], PDO::PARAM_STR);
        $stmt -> bindParam(":update_at",$datos["update_at"], PDO::PARAM_STR);
        
        
        if($stmt->execute()){
            return "ok";
        }
        else{
            print_r(Conexion::conectar()->errorInfo());
        }
        $stmt->close();
        $stmt=null;

    }
}
?>