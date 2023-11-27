<?php
include_once("config.php");
$conexion = obtenerConexion();

// Recoger datos
$client = json_decode($_POST['client']);


$sql = "UPDATE clients
SET client_name = '$client->client_name',
address =  '$client->address ', 
phone_number = $client->phone_number ,
gmail = '$client->gmail'   
WHERE client_id = $client->client_id;";

mysqli_query($conexion, $sql);

if (mysqli_errno($conexion) != 0) {
    $numerror = mysqli_errno($conexion);
    $descrerror = mysqli_error($conexion);

    responder(null, true, "Se ha producido un error número $numerror que corresponde a: $descrerror <br>", $conexion);

} else {
    // Prototipo responder($datos,$error,$mensaje,$conexion)
    responder(null, false, "Se ha modificado el cliente", $conexion);
}
?>