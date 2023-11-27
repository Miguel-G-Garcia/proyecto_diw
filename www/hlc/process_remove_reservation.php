<?php
require_once("funcionesBD.php");
$conexion = obtenerConexion();

// Recoger datos de entrada
$reservation_id = $_POST['reservation_id'];

// SQL
$sql = "DELETE FROM reservations WHERE reservation_id = $reservation_id;";

mysqli_query($conexion, $sql);

if (mysqli_errno($conexion) != 0) {
    $numerror = mysqli_errno($conexion);
    $descrerror = mysqli_error($conexion);

    $message="<h2>Se ha producido un error número $numerror que corresponde a: $descrerror </h2>";

} else {
    // Prototipo responder($datos,$error,$mensaje,$conexion)
    $message="<h2>Datos eliminados</h2>";
}

header( "refresh:5;url=index.php" );

include_once("menu.php");

echo $message;

?>