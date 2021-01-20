
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
    <link rel="stylesheet" href="CESS/css3.css">
    </head>

<body>
<?php
    include_once('barras_menu/barra_Admin.php');
  ?>
<div class="container">
	
		<div class="row">
		  <div class="col-3"></div>
			  <div class="col-6">
				  <br>
		<h1 class="registro"> Registro de productos</h1>
		<br>
		<form  action="productos_ok.php" method = "post">
		<table  class="table table-hover">
		<tr>
			<td>id: </td>
			<td><input type="number" name="id" /></td>
			<td></td>
		</tr>	
	
		<tr>
			<td>nombre: </td>
			<td><input type="name" name="name" /></td>
			<td></td>
		</tr>	
		<tr>
			<td>precio: </td>
			<td><input type="number" name="precio" /></td>
			<td></td>
		 </tr>	
		<tr>
			<td>Url Imagen: </td>
			<td><input type="text" name="imagen" /></td>
			<td></td>
         </tr>
         <tr>
			<td>tipo: </td>
			<td><input type="text" name="tipo" /></td>
			<td></td>
		 </tr>
			<td></td>
			 <td><input class="btonu"type="submit" value="Crear"/></td>
		</table>
		</form>
				</div>
			<div class="col-3"></div>
		</div>
	</div>
	
    

<main>





</main>



</body>

</html>

