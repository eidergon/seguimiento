<?php
    session_start();

    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
        header('Location: ../');
        exit();
    }
    $nombre = $_SESSION["nombre"];
    $cargo = $_SESSION["cargo"];

    if ($_SESSION['cargo'] == 'back') {
        header('Location: home.php');
        exit();
    } 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php include "ventana.php"; ?>
</head>
<body>
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" style="text-transform: capitalize;"><?php echo $nombre; ?></a>
        <form action="" method="post">
            <input type="text" name="termino_busqueda" placeholder="Buscar BackOffice">
            <input type="submit" value="Buscar">
        </form>
        <form action="../php/excel.php" method="post">
            <input type="date" name="exporte" required>
            <input type="date" name="exporte_2" >
            <input type="submit" value="Descargar">
        </form>
        <?php include "modal.php"; ?>
        <a href="../php/cerrar_sesion.php" style="text-decoration: none;">Cerrar Sesión</a>
    </nav>
    <?php include "buscar.php"; ?>
</body>
</html>
