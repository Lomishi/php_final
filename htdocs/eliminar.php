<?php
require_once __DIR__ . '/login_ok.php';
session_start();
$nick=$_SESSION["nick_logueado"];

$id =$_POST['id'];

$sqlborrar="DELETE FROM  $nick where id=$id" ;
$resborrar=mysqli_query($con,$sqlborrar);

echo "<script>location.href='http://localhost/planetas.php'</script>";
// header('Location: planetas.php');




?>