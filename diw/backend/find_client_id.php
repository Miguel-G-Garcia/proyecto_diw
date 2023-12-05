<?php
require_once('config.php');
$conexion = obtenerConexion();

$client_id = $_GET['client_id'];

$sql = "SELECT * 
FROM clients
WHERE client_id = $client_id;";

$result = mysqli_query($conexion, $sql);


while ($row = mysqli_fetch_assoc($result)){
    $data = $row;
}

responder($data, false, "Dato de cliente $client_id", $conexion);
?>