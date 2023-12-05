<?php
include_once("config.php");
$conexion = obtenerConexion();

// Recogo los datos del cliente
$client_name = $_POST['client_name'];
$address = $_POST['address'];
$phone_number = $_POST['phone_number'];
$gmail = $_POST['gmail'];

$sql = "INSERT INTO clients VALUES (null,'$client_name','$address','$phone_number','$gmail');";

mysqli_query($conexion, $sql);

if(mysqli_errno($conexion) != 0){
    $numerror = mysqli_errno($conexion);
    $descrerror = mysqli_error($conexion);

    responder(null, true, "Se ha producido un error número $numerror que corresponde a: $descrerror <br>", $conexion);
} else {
    responder(null, false, "Se inserto el cliente con exito", $conexion);
}
?>