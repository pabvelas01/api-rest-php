<?php 

$arrayRutas=explode("/",$_SERVER["REQUEST_URI"]);
/*
echo "<pre>";
 print_r( $arrayRutas);
 echo  "</pre>";
*/


# arry_filter quita los indices que cuyo valor tengan vacio solo, se queda con los llenitos
 if (count(array_filter($arrayRutas))==1){
    $json=array(
        "detalle"=>"No encontrado"
     );
    
     echo json_encode($json,true);
     return;
 }
 else if (count(array_filter($arrayRutas))==2){
    
    switch (strtolower(array_filter($arrayRutas)[2])){
        case 'cursos':  if(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"]=='GET')
                        {
                            $cursos = new ControladorCursos();
                            $cursos->index();
                        }
                        else  if(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"]=='POST')
                        {
                            $cursos = new ControladorCursos();
                            $cursos->create();
                        }
                        break;
        case 'registro': if(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"]=='POST')
                        {
                            $datos= array("nombres"=> isset($_POST["nombre"])?$_POST["nombre"]:"",
                            "apellidos"=>isset($_POST["apellido"])?$_POST["apellido"]:"",
                            "email"=>isset($_POST["email"])?$_POST["email"]:"");

                            $clientes = new ControladorClientes();
                            $clientes->create($datos);
                        }
                        else if(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"]=='GET'){
                            $clientes = new ControladorClientes();
                            $clientes->index();
                        }
                        break;
        
        default:return;
    }
    
     
     return;
 }
 else if (count(array_filter($arrayRutas))==3){
    switch (strtolower(array_filter($arrayRutas)[2])){
        case 'cursos':  if(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"]=='GET'
                        && is_numeric(array_filter($arrayRutas)[3] ) ) 
                        {
                            $cursos = new ControladorCursos();
                            $cursos->show(array_filter($arrayRutas)[3]);
                        }
                        if(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"]=='PUT'
                        && is_numeric(array_filter($arrayRutas)[3] ) ) 
                        {
                            $cursos = new ControladorCursos();
                            $cursos->update(array_filter($arrayRutas)[3]);
                        }
                        if(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"]=='DELETE'
                        && is_numeric(array_filter($arrayRutas)[3] ) ) 
                        {
                            $cursos = new ControladorCursos();
                            $cursos->delete(array_filter($arrayRutas)[3]);
                        }
                        break;
        
        default:return;
    }
 }


?>