<?php
$db_host = "sql303.infinityfree.com"; // Tu host
$db_user = "if0_38152353"; // Tu nombre de usuario
$db_pass = "3tm1ehTXthZNgy"; // Tu contraseña
$db_name = "if0_38152353_if0_38152353"; // Tu nombre de la base de datos

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("La conexión falló: " . $conn->connect_error);
}
?>