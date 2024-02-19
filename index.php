<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Login seguimiento</title>
  <link rel="stylesheet" href="./css/styles.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="shortcut icon" href="./img/logo-removebg-preview.ico" type="image/x-icon">
</head>

<body>
  <form class="box" action="" method="post">
    <h1>Login</h1>
    <input type="text" name="user" placeholder="Username" required>
    <input type="password" name="pass" placeholder="Password" required>
    <input type="submit" name="login" value="Login">
  </form>
</body>

</html>

<?php
require 'php/conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Obtener los datos enviados de forma segura
  $nombreUsuario = mysqli_real_escape_string($conn, $_POST['user']);
  $contrasena = mysqli_real_escape_string($conn, $_POST['pass']);

  // Consultar la base de datos para verificar los datos de forma segura
  $consulta = "SELECT nombre, cargo FROM seguimiento WHERE user = ? AND pass = ?";
  $stmt = mysqli_prepare($conn, $consulta);
  mysqli_stmt_bind_param($stmt, "ss", $nombreUsuario, $contrasena);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_store_result($stmt);

  // Verificar si se encontró un registro con los datos proporcionados
  if (mysqli_stmt_num_rows($stmt) === 1) {
    mysqli_stmt_bind_result($stmt, $nombre, $cargo);
    mysqli_stmt_fetch($stmt);

    session_start();
    $_SESSION["nombre"] = $nombre;
    $_SESSION["cargo"] = $cargo;
    $_SESSION['logged_in'] = true;

    if ($cargo === 'admin') {
      header('Location: ./view/admin.php');
      exit();
    } else {
      header('Location: ./view/home.php');
      exit();
    }
  } else {
    // Datos inválidos, mostrar un mensaje de error con SweetAlert2
    echo "<script>Swal.fire({
            icon: 'error',
            title: 'ERROR',
            text: 'Datos inválidos',
            allowOutsideClick: false,
          }).then(function () {
            window.location.href = ''; // Redirigir después de cerrar la alerta
          });</script>";
  }

  // Liberar el statement
  mysqli_stmt_close($stmt);
}

// Cerrar la conexión a la base de datos
mysqli_close($conn);
?>