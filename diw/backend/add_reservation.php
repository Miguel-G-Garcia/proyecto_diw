<?php
include_once("config.php");
$conexion = obtenerConexion();

// Recoger datos
$client_id = $_POST['client_id'];
$checkIn = $_POST['checkIn'];
$checkOut = $_POST['checkOut'];
$roomNmb = $_POST['roomNmb'];

$sql = "SELECT c.* FROM clients c WHERE c.client_id = $client_id;";

$result = mysqli_query($conexion, $sql);

$row = mysqli_fetch_assoc($result);

if($row){ // Devuelve el cliente
    
    $sql = "INSERT INTO reservations VALUES (null,'$client_id','$checkIn','$checkOut','$roomNmb');";

    mysqli_query($conexion, $sql);

    if(mysqli_errno($conexion) != 0){
        $numerror = mysqli_errno($conexion);
        $descrerror = mysqli_error($conexion);
    
        responder(null, true, "Se ha producido un error número $numerror que corresponde a: $descrerror <br>", $conexion);
    } else {
        responder(null, false, "Se inserto la reserva con exito", $conexion);
    }

} else { // No hay datos
    responder(null, true, "No existe el cliente insertado", $conexion);
}



?>