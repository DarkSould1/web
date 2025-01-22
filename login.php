<?php
require 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Email = $_POST['loginEmail'];
    $Contraseña = $_POST['loginPassword'];

    // Prepara y ejecuta la consulta SQL para obtener los datos del usuario
    $sql = "SELECT id, Contraseña FROM usuarios WHERE Email = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("s", $Email);
        $stmt->execute();
        $stmt->bind_result($userId, $hashedPassword);
        if ($stmt->fetch()) {
             if (password_verify($Contraseña, $hashedPassword)) {
                echo "Inicio de sesión exitoso!";
                header('Location: index.html?login=1'); // Redirige al index con inicio de sesión
                exit();
             } else {
                 echo "Contraseña incorrecta.";
             }
        } else {
            echo "Usuario no encontrado.";
        }
        $stmt->close();
    } else {
        echo "Error al preparar la sentencia: " . $conn->error;
    }
   $conn->close();
}

?>