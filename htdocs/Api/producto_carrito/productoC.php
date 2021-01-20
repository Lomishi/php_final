




<?php
include_once '../../lib/db.php';
require_once __DIR__ . '/../../login_ok.php';
	
session_start();
$nick=$_SESSION["nick_logueado"];

class productoC extends DB{
  
    function __construct(){
        
        
        parent::__construct();
       
    }

    public function get($id){
        $nick=$_SESSION["nick_logueado"];
        
        $query = $this->connect()->prepare("SELECT * FROM $nick WHERE id = :id LIMIT 0,12");
        $query->execute(['id' => $id]);

        $row = $query->fetch();

        return [
            'id'        => $row['id'],
            'nombre'    => $row['nombre'],
            'precio'    => $row['precio'],
            'imagen'    => $row['imagen'],
            'tipo'      => $row['tipo'],
        ];
    }

    public function getItemsByCategory($tipo){
        $nick=$_SESSION["nick_logueado"];
        
        
        
        $query = $this->connect()->prepare( "select * from $nick where tipo = :tip limit 0,12");
        $query->execute(['tip' => $tipo]);
         
        $product = [];

        while($row = $query->fetch(PDO::FETCH_ASSOC)){

            $item = [
              'id'        => $row['id'],
              'nombre'    => $row['nombre'],
              'precio'    => $row['precio'],
              'imagen'    => $row['imagen'],
              'tipo'      => $row['tipo'],
            ];

            array_push($product, $item);
        }
        return $product;
    }
}

?>