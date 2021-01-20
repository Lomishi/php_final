<?php

include_once '../../lib/session.php';

error_reporting(0);

class Carrito extends Session{
    function __construct(){
        parent::__construct('carrito');
         
    }



public function load(){

    if($this->getValue() == NULL){

        return [];
    }


    return $this->getValue();

}



//la funcion para añadir
public function add($id){
  //validamos que si nuestrro carrito está nullo creamos un nuevo arrgelo
    if ($this->getValue() == NULL){
        $product = [];

    }
    //si no es nullo 
    else{
        $product = json_decode($this->getValue(),1);

        //un ciclo para ver si existe la id en nuestro carrito, si ya existe,
        //añadira un +1 en vez de añadir otro producto.
        for ($i=0; $i<sizeof($product); $i++ ){


            if($product[$i]['id']== $id){
                $product[$i]['cantidad']++;
                $this->setValue(json_encode($product));

                return $this->getValue();
            }


        }
    }


    //Para cuando el carrito tiene que añadir un nuevo elemento


    $item = ['id' => (int)$id, 'cantidad' => 1];

    array_push($product,$item);

      
    $this->setValue(json_encode($product));

     return $this->getValue();

}



//para eliminar

public function remove($id){
    if ($this->getValue() == NULL){
        $product = [];

    }
    else{
        $product = json_decode($this->getValue(),1);

        for ($i=0; $i<sizeof($product); $i++ ){
            if($product[$i]['id']== $id){
            
                $product[$i]['cantidad']--;


                if ($product[$i]['cantidad']==0){
                    unset($product[$i]);

                    $product = array_values($product);

                }
                $this->setValue(json_encode($product));
                return true;

            }
        }

    }



}

}



?>