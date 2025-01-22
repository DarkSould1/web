<?php
require 'db_config.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Nombre_completo = $_POST['fullName'];
    $Email = $_POST['registerEmail'];
    $Contraseña = password_hash($_POST['registerPassword'], PASSWORD_DEFAULT);

    // Prepara y ejecuta la consulta SQL para insertar datos
    $sql = "INSERT INTO usuarios (Nombre_completo, Email, Contraseña) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("sss", $Nombre_completo, $Email, $Contraseña);
        if ($stmt->execute()) {
             echo "Registro exitoso!";
              header('Location: index.html?success=1'); // Redirige al index con éxito
              exit();
        } else {
            echo "Error al insertar el registro: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error al preparar la sentencia: " . $conn->error;
    }

    $conn->close();
}

?>