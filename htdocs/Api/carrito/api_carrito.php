<?php

include_once 'carrito.php';


error_reporting(0);

//validamos aver si existe



if(isset($_GET['action'])){
//pasamos nuestro get a una variable
$accion = $_GET['action'];
$carrito = new Carrito();

switch($accion){

 case'mostrar':
    mostrar($carrito);
    break;

    case 'add':
    add($carrito);
    break;


    case 'remove':
        remove($carrito);
        break;

        default:


}
}
else{
    echo json_encode(['statuscode' => 404, 
    'response' => 'Nour se puede procesare']);
}


//LAS FUNCIONES



function mostrar($carrito){
    $itemsCarrito = json_decode($carrito->load(), 1);
    $fullItems = [];
    $total = 0;
    $totalItems = 0;


    foreach($itemsCarrito as $itemCarrito){
        $httpRequest = file_get_contents('http://localhost/Api/producto/api_producto.php?get-item=' . $itemCarrito['id']); 
        $itemProducto = json_decode($httpRequest, 1)['item'];
        $itemProducto['cantidad'] = $itemCarrito['cantidad'];
        $itemProducto['subtotal'] = $itemProducto['cantidad'] * $itemProducto['precio'];


        $total += $itemProducto['subtotal'];
        $totalItems += $itemProducto['cantidad'];


        array_push($fullItems, $itemProducto);

    }
    $resArray = array('info' => ['count' => $totalItems, 'total' => $total] ,'product' => $fullItems);
    echo json_encode($resArray);



}

function add($carrito){
    //validamos que existe una id
    if(isset($_GET['id'])){
        $res = $carrito -> add($_GET['id']);
        echo $res;

    }else{

        //fallo

    }
}




function remove($carrito){

    if(isset($_GET['id'])){
        $res = $carrito -> remove($_GET['id']);
       if($res){
           echo json_encode(['statuscode' => 200, 'response' =>'eliminathed']);
       }else{
        echo json_encode(['statuscode' => 400, 'response' => 'no encuentra']);
       }
    }else{

        echo json_encode(['statuscode' => 404, 'response' =>
        'No hay proceso, no id']);

    }
    
}






?>