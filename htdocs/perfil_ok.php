<?php
    error_reporting(0);
	
header("Content-Type: text/html;charset=utf-8");
if (isset($_POST["id"]))
{



	$serv = "localhost";
	$user = "root";
	$pass = "";
	$bd = "usuariostienda";


    $id = $_POST["id"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	$password2 = $_POST["imagen"];
	



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
	$instruccion = "select count(*) as cuantos from users where nick = '$nick'";
	$res = mysqli_query($con, $instruccion);
	$datos = mysqli_fetch_assoc($res);


	 
	if ($datos['cuantos'] == 0){
		$instruccion = "update users set nick='$nick',email='$email',password='$password',password2='$password2' where id='$nick';";
		$res = mysqli_query($con, $instruccion);
	}
	else {

		echo "la cosa no pinta bien";
	}
		if (!$res) 
		{
			die("No se ha pordido crear el producto");

			
		}
		else
		{
			echo "perfil modificado";
			//me lleva al login para que pruebe mi contraseña
			echo "<script>alert('perfil modificado correctamente');</script>";
            include_once("planetas.php");
            ?> 

           <a href="../planetas.php">Volver</a>
           <?php
		}
	}
	


else 
{
	echo ("ERROR: No se puedeer introducir un id en blanco");
}
?>