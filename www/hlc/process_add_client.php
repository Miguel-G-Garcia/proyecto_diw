<?php
require_once("funcionesBD.php");
$conexion = obtenerConexion();

// Recogo los datos del cliente
$client_name = $_POST['txtClientName'];
$address = $_POST['txtAddress'];
$phone_number = $_POST['txtPhone'];
$gmail = $_POST['txtGmail'];

$sql = "INSERT INTO clients VALUES (null,'$client_name','$address','$phone_number','$gmail');";

mysqli_query($conexion, $sql);

if(mysqli_errno($conexion) != 0){
    $numerror = mysqli_errno($conexion);
    $descrerror = mysqli_error($conexion);

    $message = "<h2>Se ha producido un error número $numerror que corresponde a: $descrerror</h2>";
} else {
    $message = "<h2>Se inserto el cliente con exito</h2>";
}

header( "refresh:5;url=index.php" );

include_once("menu.php");

echo $message;

?>