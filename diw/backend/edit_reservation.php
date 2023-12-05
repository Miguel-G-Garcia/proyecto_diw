<?php
include_once("config.php");
$conexion = obtenerConexion();

// Recoger datos
$reservation = json_decode($_POST['reservation']);


$sql = "UPDATE reservations
SET client_id = $reservation->client_id , 
check_in_date =  '$reservation->check_in_date' , 
check_out_date = '$reservation->check_out_date' ,
room_number = $reservation->room_number
WHERE reservation_id = $reservation->reservation_id;";

mysqli_query($conexion, $sql);

if (mysqli_errno($conexion) != 0) {
    $numerror = mysqli_errno($conexion);
    $descrerror = mysqli_error($conexion);

    responder(null, true, "Se ha producido un error número $numerror que corresponde a: $descrerror <br>", $conexion);

} else {
    // Prototipo responder($datos,$error,$mensaje,$conexion)
    responder(null, false, "Se ha modificado la reserva", $conexion);
}
?>