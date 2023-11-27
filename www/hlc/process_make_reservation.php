<?php

require_once("funcionesBD.php");
$conexion = obtenerConexion();

// Recoger datos
$client_id = $_POST['txtClientId'];
$checkIn = $_POST['txtCheckIn'];
$checkOut = $_POST['txtCheckOut'];
$roomNmb = $_POST['txtRoomNmb'];

$sql = "SELECT c.* FROM clients c WHERE c.client_id = $client_id;";

$result = mysqli_query($conexion, $sql);

$row = mysqli_fetch_assoc($result);

if($row){ // Devuelve el cliente
    
    $sql = "INSERT INTO reservations VALUES (null,'$client_id','$checkIn','$checkOut','$roomNmb');";

    mysqli_query($conexion, $sql);

    if(mysqli_errno($conexion) != 0){
        $numerror = mysqli_errno($conexion);
        $descrerror = mysqli_error($conexion);
    
        $message = "<h2>Se ha producido un error número $numerror que corresponde a: $descrerror<h2>";
    } else {
        $message = "<h2>Se inserto la reserva con exito<h2>";
    }

} else { // No hay datos
    $message = "<h2>No existe el cliente insertado<h2>";
}

header( "refresh:5;url=index.php" );

include_once("menu.php");

echo $message;

?>