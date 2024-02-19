<?php
  $servername = "10.206.69.138:11059";
  $username = "root";
  $password = "171819.L05";
  $database = "prueba";

  // Crear la conexión
  $conn = mysqli_connect($servername, $username, $password, $database);

  // Verificar la conexión
  if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
  } else {
  }