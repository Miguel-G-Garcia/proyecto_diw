<?php
require_once('config.php');
$conexion = obtenerConexion();

// Recoger datos de entrada
$client_id = $_POST['client_id'];

// SQL
$sql = "DELETE FROM reservations WHERE client_id = $client_id;";

mysqli_query($conexion, $sql);

if (mysqli_errno($conexion) != 0) {
    $numerror = mysqli_errno($conexion);
    $descrerror = mysqli_error($conexion);

    responder(null, true, "Se ha producido un error número $numerror al intentar borrar la reserva que corresponde a: $descrerror", $conexion);

} else {
    $sql = "DELETE FROM clients WHERE client_id = $client_id;";

    mysqli_query($conexion, $sql);
    if (mysqli_errno($conexion) != 0) {
        $numerror = mysqli_errno($conexion);
        $descrerror = mysqli_error($conexion);
    
        responder(null, true, "Se ha producido un error número $numerror al intentar borrar el cliente que corresponde a: $descrerror", $conexion);
    
    } else {
        responder(null, false, "Datos eliminados", $conexion);
    }
    
}
?>