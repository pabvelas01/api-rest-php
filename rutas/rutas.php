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
        case 'cursos':  $json=array(
                            "detalle"=>"estas en la vista cursos"
                        );
                        break;
        case 'registro':  $json=array(
                            "detalle"=>"estas en la vista registros"
                        );
                        break;
        
        default:return;
    }
    
     echo json_encode($json,true);
     return;
 }


?>