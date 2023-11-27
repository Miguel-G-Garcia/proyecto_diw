<?php 
require_once("funcionesBD.php");
$conexion = obtenerConexion();


$table = "<form action='process_delete_reservation.php' method='post'><table class='table table-striped'>";
$table .= "<thead><tr><th>ID RESERVA</th><th>ID CLIENTE</th><th>CHECK IN</th><th>CHECK OUT</th><th>ROOM NUMBER</th><th>OPCIONES</th></tr></thead>";
$table .= "<tbody>";



    
$sql = "SELECT * FROM reservations;";

$result = mysqli_query($conexion, $sql);

while ($row = mysqli_fetch_assoc($result)){

    $table .= "<tr><td>" . $row['reservation_id'] . "</td>";
    $table .= "<td>" . $row['client_id'] . "</td>";
    $table .= "<td>" . $row['check_in_date'] . "</td>";
    $table .= "<td>" . $row['check_out_date'] . "</td>";
    $table .= "<td>" . $row['room_number'] . "</td>";


    $table .= "<td><form class='d-inline me-1' action='edit_reservation.php' method='post'>";
    $table .= "<input type='hidden' name='reservation' value='" . htmlspecialchars(json_encode($row),ENT_QUOTES) . "' />";
    $table .= "<button name='Editar' class='btn btn-primary'><i class='bi bi-pencil-square'></i></button></form>";


    $table .= "<form class='d-inline' action='process_remove_reservation.php' method='post'>";
    $table .= "<input type='hidden' name='reservation_id' value='" . $row['reservation_id']  . "'/>";
    $table .= "<button name='Borrar' class='btn btn-danger'><i class='bi bi-trash'></i></button></form>";
    $table .= "</td></tr>";

}

$table .= "</tbody></table>";

include_once("menu.php");

echo $table;

?>