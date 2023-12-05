<?php
require_once('config.php');
$conexion = obtenerConexion();

// Recoger datos de entrada
$reservation_id = $_POST['reservation_id'];

// SQL
$sql = "DELETE FROM reservations WHERE reservation_id = $reservation_id;";

mysqli_query($conexion, $sql);

if (mysqli_errno($conexion) != 0) {
    $numerror = mysqli_errno($conexion);
    $descrerror = mysqli_error($conexion);

    responder(null, true, "Se ha producido un error número $numerror que corresponde a: $descrerror <br>", $conexion);

} else {
    // Prototipo responder($datos,$error,$mensaje,$conexion)
    responder(null, false, "Datos eliminados", $conexion);
}
?>