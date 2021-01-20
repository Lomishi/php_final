<?php

include_once 'productoC.php';
require_once __DIR__ . '/../../login_ok.php';
session_start();
$nick=$_SESSION["nick_logueado"];
if(isset($_GET['tipo'])){
    $tipo = $_GET['tipo'];
    
    if($tipo == ''){
        echo json_encode(['statuscode' => 400, 'response' => 'No existe esa categoria']);
    }else{
       
        $productoC = new productoC();
        $product  = $productoC->getItemsByCategory($tipo);
       
        echo json_encode(['statuscode' => 200, 'product' => $product]);
       
    }



}else if(isset($_GET['get-item'])){
    $id = $_GET['get-item'];

    if($id == ''){
        echo json_encode(['statuscode' => 400, 'response' => 'no hay valor para id']);
    }else{
        $productoC = new productoC();
        $item = $productoC->get($id);
        echo json_encode(['statuscode' => 200, 'item' => $item]);
    }
    


}

//eliminar
else if($_GET['idborrare'] == 2){
    
    $nick=$_SESSION["nick_logueado"];
    $sqlborrar="DELETE FROM  $nick id=". $_GET['id'] ;
    $resborrar=mysqli_query($con,$sqlborrar);
    echo '<script>alert("ELIMINADO")</script> ';
    echo "<script>location.href='http://localhost/planetas_admin.php'</script>";

    
}
else{
    echo json_encode(['statuscode' => 400, 'response' => 'No hay accion']);
}

?>