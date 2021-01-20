
<?php
    require_once __DIR__ . '/login_ok.php';
	
session_start();


		$nick=$_SESSION["nick_logueado"];
		$email="SELECT `email` FROM `users` WHERE nick=$nick";
		$password=$_SESSION["pass_logueado"];
		$password2=$_SESSION["pass2_logueado"];
    
        
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
    
    <link rel="stylesheet" href="CESS/css3.css">
</head>
<body>
<?php
    
   
  
  
  ?>

<?php
    include_once('barras_menu/barra.php');
  ?>

<h1 align="center">Hola <?php echo $nick?></h1>

<br>
<br>

<h2 align="center">Tu información</h2>

<div class="container">
	
		<div class="row">
		  <div class="col-3"></div>
			  <div class="col-6">
				  <br>
	
		<br>
		<form  action="perfil_ok.php" method = "post" >
		<table  class="table table-hover">
		
	
		<tr>
			<td>nombre: </td>
			<td><input type="text" name="name"  value="<?php echo $nick?>" /></td>
			<td></td>
		</tr>	
		<tr>
			<td>correo: </td>
			<td><input type="text" name="precio"  value="<?php echo $email?>"/></td>
			<td></td>
		 </tr>	
		<tr>
			<td>password: </td>
			<td><input type="password" name="pass" value="<?php  echo $password?>" /></td>
			<td></td>
         </tr>
         <tr>
			<td>confirm password: </td>
			<td><input type="password" name="tipo" value="<?php echo $password2?>" /></td>
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

<script src="js.js"></script>
</html>