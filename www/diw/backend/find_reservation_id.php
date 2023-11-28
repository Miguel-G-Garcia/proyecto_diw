<?php
require_once('config.php');
$conexion = obtenerConexion();

$reservation_id = $_GET['reservation_id'];

$sql = "SELECT * 
FROM reservations
WHERE reservation_id = $reservation_id;";

$result = mysqli_query($conexion, $sql);

while ($row = mysqli_fetch_assoc($result)){
    $data = $row;
}

responder($data, false, "Dato de reserva $reservation_id", $conexion);
?>