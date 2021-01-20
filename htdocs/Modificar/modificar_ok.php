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

	if ($precio<0){
		echo ("ERROR: No se puedeer introducir un valor negativo");
		
		?> 
           <a href="../planetas_admin.php">Volver</a>
           <?php
	}

	 else {
		$instruccion = "update product set nombre='$nick',precio='$precio',imagen='$imagen',tipo='$tipo' where id='$id';";
		$res = mysqli_query($con, $instruccion);
	 }
		if (!$res) 
		{
			die("No se ha pordido crear el producto");

			
		}
		else
		{
			echo "producto modificado";
			//me lleva al login para que pruebe mi contraseña
			echo "<script>alert('producto modificado correctamente');</script>";
            include_once("planetas_admin.php");
            ?> 
           <a href="../planetas_admin.php">Volver</a>
           <?php
		}
	}
	


else 
{
	echo ("ERROR: No se puedeer introducir un id en blanco");
	?> 

	<a href="../planetas_admin.php">Volver</a>
	<?php
}
?>