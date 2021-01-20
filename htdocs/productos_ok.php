<?php
    
	
header("Content-Type: text/html;charset=utf-8");
if (isset($_POST["id"]))
{



	$serv = "localhost";
	$user = "root";
	$pass = "";
	$bd = "usuariostienda";


    $id = $_POST["id"];
	$nick = $_POST["name"];
	$precio = $_POST["precio"];
	$imagen = $_POST["imagen"];
	$tipo = $_POST["tipo"];



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
	
	//Primero compruebo si el id existe
	$instruccion = "select count(*) as cuantos from product where id = '$id'";
	$res = mysqli_query($con, $instruccion);
	$datos = mysqli_fetch_assoc($res);


	error_reporting(0);
	if ($_POST["password"] !== $_POST["password2"]) { 
		echo "La contraseña no coincide con confirmar contraseña <br>";
		?> 

           <a href="register.html">Volver</a>
       <?php
	  } 
	
	else if ($datos['cuantos'] == 0)
	{
		$instruccion = "insert into product values ('$id','$nick','$precio','$imagen','$tipo')";
		$res = mysqli_query($con, $instruccion);
		if (!$res) 
		{
			die("No se ha pordido crear el producto");

			
		}
		else
		{
			echo "producto creado";
			//me lleva al login para que pruebe mi contraseña
			echo "<script>alert('producto creado correctamente');</script>";
			include_once("newproduct.php");
		}
	}
	else
	{
		echo "El id $id no está disponible";
		?> 

           <a href="newproduct.php">Volver</a>
           <?php
	}

}
else 
{
	echo ("ERROR: No se puede introducir un id en blanco");
}
?>