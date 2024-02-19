<?php
require '../php/conexion.php';
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: ../index.php');
    exit();
}
$nombre = $_SESSION["nombre"];
$sql = "SELECT * FROM tiempos WHERE user = '$nombre' ORDER BY id DESC LIMIT 9";
$result = $conn->query($sql);
$conn->close();
?>
<div class="container">
    <table class="table table-dark">
        <thead>
            <tr style="text-align: center;">
                <th scope="col">Registro</th>
                <th scope="col">Feha</th>
                <th scope="col">Hora</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($fila = $result->fetch_assoc()) { ?>
                <tr scope="row" style="text-align: center;">
                    <td><?php echo $fila['tipo']; ?></td>
                    <td><?php echo $fila['fecha']; ?></td>
                    <td><?php echo $fila['hora']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>