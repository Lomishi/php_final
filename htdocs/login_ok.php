<?php

error_reporting(0);
session_start();

$logueado=0;
	
header("Content-Type: text/html;charset=utf-8");



    $serv = "localhost";
	$user = "root";
	$pass = "";
	$bd = "usuariostienda";
	$admin2= "admin";

		$nick = $_POST["nick"];
		$email = $_POST["email"];
		$password = $_POST["password"];

	$con = mysqli_connect($serv, $user,$pass, $bd) or die(mysql_error());
	
	if (!$con)
	{
		die("No se ha podido realizar la corrección ERROR:" . mysqli_connect_error() . "<br>");
	}
	else
	{
		mysqli_set_charset ($con, "utf8");
		
	}
	
	$instruccion = "select count(*) as cuantos from users where nick = '$nick'";
	$resultado = mysqli_query($con, $instruccion);
		while ($fila = $resultado->fetch_assoc()) {
		$numero=$fila["cuantos"];
		
	}
	if($numero==0){
		
	}
	else{
	$instruccion = "select password as cuantos from users where nick = '$nick'";
	$resultado = mysqli_query($con, $instruccion);

	while ($fila = $resultado->fetch_assoc()) {
		$password2=$fila["cuantos"];
	}
	
	/////////////////

	if (!strcmp($password2 , $password) == 0){
			echo "Contraseña incorrecta";
	}
	else if($admin2 == $nick){

		echo "Login OK";
		$_SESSION["nick_logueado"]=$nick;
		

		?> 
		
		<a href="menu_admin.php">Acceder</a>
		
		<?php
		
		
		$logueado=1;



	}
	
	else{

		echo "Login OK";
		$_SESSION["nick_logueado"]=$nick;
		$_SESSION["email_logueado"]=$email;
		$_SESSION["pass_logueado"]=$password;
		$_SESSION["pass2_logueado"]=$password2;
		?> 
		
		<a href="menu_clientes.php">Acceder al menu</a>
		
		<?php
		
		
		$logueado=1;
	}
	}
	
	





?>