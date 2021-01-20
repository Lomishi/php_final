<?php
include_once '../../lib/db.php';

class Producto extends DB{

    function __construct(){
        parent::__construct();
    }

    public function get($id){
        $query = $this->connect()->prepare('SELECT * FROM product WHERE id = :id LIMIT 0,12');
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
        $query = $this->connect()->prepare('SELECT * FROM product WHERE tipo = :tip LIMIT 0,12');
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