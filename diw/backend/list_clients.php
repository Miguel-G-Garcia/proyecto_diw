<?php
require_once('config.php');
$conexion = obtenerConexion();

$sql = "SELECT * FROM clients;";

$result = mysqli_query($conexion, $sql);

while ($row = mysqli_fetch_assoc($result)){
    $data[] = $row;
}

responder($data, false, "Datos de clientes", $conexion);
?>