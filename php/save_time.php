<?php
require 'conexion.php';
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: ../');
    exit();
}
// Recupera el valor seleccionado del formulario
$tipo = $_POST['tipo'];
$nombre = $_SESSION["nombre"];

// Realiza una consulta para insertar el valor en la base de datos
$sql = "INSERT INTO tiempos (user,tipo) VALUES ('$nombre','$tipo')";

if ($conn->query($sql) === TRUE) {
    header("Location: ../view/home.php");
    exit;
} else {
    echo "Error al insertar el registro: " . $conn->error;
}

// Cierra la conexión a la base de datos
$conn->close();
?>