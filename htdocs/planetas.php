

<?php
    require_once __DIR__ . '/login_ok.php';
	
session_start();


		$nick=$_SESSION["nick_logueado"];
    
        

        
?>
<!DOCTYPE html>
<html lang="en">
     
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Planetas</title>
    <link rel="stylesheet" href="CESS/css3.css">
    

<body>

<?php
    include_once('barras_menu/barra.php');
  ?>
    

<main>






<br>
<br>
    <h1>Nuestra colección</h1>
    <?php
            $response = json_decode(file_get_contents('http://localhost/Api/producto/api_producto.php?tipo=planeta'), true);
            if($response['statuscode'] == 200){
               
                foreach($response['product'] as $item){
                    include('products.php');
                     
                }
            }else{
                
                echo $response['response'];
            }
            
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
               

                      
                     if($_GET['idadd'] == 2){
                        session_start();


                        


                        
                        $sqlborrar="insert into $nick select * from product where id=". $_GET['id'];
                        $resborrar=mysqli_query($con,$sqlborrar);
                         
                        
                        echo "<script>location.href='http://localhost/planetas.php'</script>";
                      
                        }
                        else{}

?>
                 
            

        
        
    


           
    </main>
    <script src="js1.js"></script>
    </body>
    
    </html>