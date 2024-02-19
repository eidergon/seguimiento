<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recuperar los datos del formulario
    $nombreBackOffice = $_POST['username'];
    $usuario = $_POST['user'];
    $contrasena = $_POST['password'];
    $newContrasena = $_POST['newPassword'];

    require 'conexion.php';

    if (!empty($newContrasena)) {
        // Cambiar la contraseña de un usuario existente
        $sql = "UPDATE seguimiento SET pass = '$newContrasena' WHERE user = '$usuario'";

        if ($conn->query($sql) === TRUE) {
            echo "Contraseña cambiada con éxito.";
        } else {
            echo "Error al cambiar la contraseña: " . $conn->error;
        }
    } else {
        // Crear un nuevo usuario
        $sql = "INSERT INTO seguimiento (nombre, user, pass, cargo) VALUES ('$nombreBackOffice', '$usuario', '$contrasena', 'back')";

        if ($conn->query($sql) === TRUE) {
            echo "Usuario creado con éxito.";
        } else {
            echo "Error al crear el usuario: " . $conn->error;
        }
    }

    $conn->close();
}
?>

