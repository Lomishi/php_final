<?php

include_once 'producto.php';

if(isset($_GET['tipo'])){
    $tipo = $_GET['tipo'];
    
    if($tipo == ''){
        echo json_encode(['statuscode' => 400, 'response' => 'No existe esa categoria']);
    }else{
       
        $producto = new Producto();
        $product  = $producto->getItemsByCategory($tipo);
       
        echo json_encode(['statuscode' => 200, 'product' => $product]);
       
    }



}else if(isset($_GET['get-item'])){
    $id = $_GET['get-item'];

    if($id == ''){
        echo json_encode(['statuscode' => 400, 'response' => 'no hay valor para id']);
    }else{
        $producto = new Producto();
        $item = $producto->get($id);
        echo json_encode(['statuscode' => 200, 'item' => $item]);
    }
    


}else{
    echo json_encode(['statuscode' => 400, 'response' => 'No hay accion']);
}

?>