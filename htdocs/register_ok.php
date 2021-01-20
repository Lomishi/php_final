<?php
    
	
header("Content-Type: text/html;charset=utf-8");
if (isset($_POST["nick"]))
{



	$serv = "localhost";
	$user = "root";
	$pass = "";
	$bd = "usuariostienda";



	$nick = $_POST["nick"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	$password2 = $_POST["password2"];



	$con = mysqli_connect($serv, $user, $pass, $bd) or die(mysql_error());
	
	if (!$con)
	{
		die("No se ha podido realizar la corrección ERROR:" . mysqli_connect_error() . "<br>");
	}
	
	else
	{
		mysqli_set_charset ($con, "utf8");
		echo "Se ha conectado a la base de datos"."<br>";
	}
	//////////////////////////////////////
	
	//Inserción de datos
	
	//Primero compruebo si el nick existe
	$instruccion = "select count(*) as cuantos from users where nick = '$nick'";
	$res = mysqli_query($con, $instruccion);
	$datos = mysqli_fetch_assoc($res);



	if ($_POST["password"] !== $_POST["password2"]) { 
		echo "La contraseña no coincide con confirmar contraseña <br>";
		?> 

           <a href="register.html">Volver</a>
       <?php
	  } 
	
	else if ($datos['cuantos'] == 0)
	{
		$instruccion = "insert into users values ('$nick','$email' ,'$password','$password2')";
		$res = mysqli_query($con, $instruccion);
		if (!$res) 
		{
			die("No se ha pordido crear el usuario");

			
		}
		else
		{
			echo "Usuario creado";
			//me lleva al login para que pruebe mi contraseña
			echo "<script>alert('Usuario creado correctamente');</script>";
			$instruccion = "create table `".$_POST['nick'] ."` (
				id int(30),
				nombre varchar(30),
				precio int(30),
				imagen varchar(30),
				tipo enum('planeta', '', '', '')
			   
			);";
			$res = mysqli_query($con, $instruccion);
			if (!$res) 
			{
				die("No se ha pordido crear la tabla");
	                 mysql_error();
				
			}
			include_once("login.html");


			
		}
	}
	else
	{
		echo "El nick $nick no está disponible";
		?> 

           <a href="register.html">Volver</a>
           <?php
	}

}
else 
{
	echo ("ERROR: No se puede introducir un nick en blanco");
}
?>