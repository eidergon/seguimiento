<?php
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
  header('Location: ../');
  exit();
}

$nombre = $_SESSION["nombre"];
?>

<nav class="navbar navbar-light bg-light">
  <a class="navbar-brand" style="text-transform: capitalize;"><?php echo $nombre; ?></a>
    <form action="../php/save_time.php" method="post">
      <select name="tipo" id="tipo" required>
        <option value="">Selecciona</option>
        <option value="entrada">ENTRADA</option>
        <option value="break">BREAK</option>
        <option value="fin_break">FIN BREAK</option>
        <option value="salida">SALIDA</option>
      </select>
      <input type="submit" value="Marcar">
    </form>
  <a href="../php/cerrar_sesion.php" style="text-decoration: none;">Cerrar Sesión</a>
</nav>