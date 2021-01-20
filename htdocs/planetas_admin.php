
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Planetas</title>
    <link rel="stylesheet" href="CESS/css3.css">


<body >
<?php
    
    include_once('barras_menu/barra_Admin.php');
  ?>
    

<main>


<br>
<br>
    <h1>Nuestra colección</h1>
    <?php

            $response = json_decode(file_get_contents('http://localhost/Api/producto/api_producto.php?tipo=planeta'), true);
            if($response['statuscode'] == 200){
                
                foreach($response['product'] as $item){

                    ?>
                    <div class="articulo">
                      <input type="hidden" id="id" value="<?php echo $item['id'];  ?>">
                       <div class="imagen"><img src="img/<?php echo $item['imagen'];  ?>" /></div>
                       <div class="titulo"><?php echo $item['nombre'];  ?></div>
                       <div class="precio"><?php echo $item['precio'];  ?> €</div>
                       <div class="hidden"><?php echo $item['tipo'];  ?> </div>


                       
                       <a class="ea" href="http://localhost/planetas_admin.php?id=<?php echo $item['id']?>&idborrar=2">Borrar</a>
                       <br><br>
                       <a class="e" href="http://localhost/Modificar/modificar.php?id=<?php echo $item['id']?>&idmodificar=<?php echo $item['id'] ?>
                       &nombremodificar=<?php echo $item['nombre'] ?>
                       &precio=<?php echo $item['precio'] ?>
                       &imagen=<?php echo $item['imagen'] ?>
                       &tipo=<?php echo $item['tipo'] ?>
                       ">Modificar</a>
                       <br>
                       <?php
                       $serv = "localhost";
                       $user = "root";
                       $pass = "";
                       $bd = "usuariostienda";

                       $con = mysqli_connect($serv, $user, $pass, $bd) or die(mysql_error());
	
	                  if (!$con)
	            {
		        die("No se ha podido realizar la corrección ERROR:" . mysqli_connect_error() . "<br>");
	            }
	
               	else
	           {
	            	mysqli_set_charset ($con, "utf8");
		       
	           }

               error_reporting(0);
                     if( $_GET['idborrar'] == 2){
                       
                        $sqlborrar="DELETE FROM product WHERE id=". $_GET['id'] ;
                        $resborrar=mysqli_query($con,$sqlborrar);
                        echo '<script>alert("ELIMINADO")</script> ';
                        echo "<script>location.href='http://localhost/planetas_admin.php'</script>";
                      
                        }
                        else{}

?>

                      
                    

                    

                    </div>

                    

                    
                    <?php
                }
                
            }else{
                
                echo $response['response'];
            }


        ?>





        
    </main>
    
    </body>

    </html>