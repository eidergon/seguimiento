<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recuperar el nombre de usuario a eliminar
    $usuarioAEliminar = $_POST['deleteUser'];

    require 'conexion.php';

    // Verificar si el usuario existe antes de eliminarlo
    $verificarUsuario = "SELECT user FROM seguimiento WHERE user = '$usuarioAEliminar'";
    $resultadoVerificacion = $conn->query($verificarUsuario);

    if ($resultadoVerificacion->num_rows > 0) {
        // El usuario existe, proceder a eliminarlo
        $eliminarUsuario = "DELETE FROM seguimiento WHERE user = '$usuarioAEliminar'";

        if ($conn->query($eliminarUsuario) === TRUE) {
            echo "Usuario eliminado";
        } else {
            echo "Error al eliminar el usuario: " . $conn->error;
        }
    } else {
        echo "El usuario no existe en la base de datos.";
    }

    $conn->close();
}
?>
