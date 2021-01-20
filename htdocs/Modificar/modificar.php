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

                      
            
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Planetas</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-theme.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../CESS/css3.css">
</head>

<body >
<?php
    
    include_once('../barras_menu/modify.php');
    $id= $_GET['id'];
    
   $name= $_GET['nombremodificar'];

    $precio= $_GET['precio'];
    $imagen= $_GET['imagen'];
    $tipo= $_GET['tipo']
  
  ?>



<div class="container">
	
		<div class="row">
		  <div class="col-3"></div>
			  <div class="col-6">
				  <br>
		<h1 class="registro"> Modificar productos</h1>
		<br>
		<form  action="modificar_ok.php" method = "post">
		<table  class="table table-hover">
		
		<tr>
			
			<td><input type="hidden" name="id"  value="<?php echo $id?>" /></td>
			<td></td>
		</tr>	
		<tr>
			<td>nombre: </td>
			<td><input type="name" name="name"  value="<?php echo $name?>" /></td>
			<td></td>
		</tr>	
		<tr>
			<td>precio: </td>
			<td><input type="text" name="precio"  value="<?php echo $precio?>"/></td>
			<td></td>
		 </tr>	
		<tr>
			<td>Url Imagen: </td>
			<td><input type="text" name="imagen" value="<?php echo $imagen?>" /></td>
			<td></td>
         </tr>
         <tr>
			<td>tipo: </td>
			<td><input type="text" name="tipo" value="<?php echo $tipo?>" /></td>
			<td></td>
		 </tr>
			<td></td>
			 <td><input class="btonu" type="submit" value="Enviar"/></td>
		</table>
		</form>
				</div>
			<div class="col-3"></div>
		</div>
	</div>







</body>

</html>
    