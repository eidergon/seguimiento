<?php
require '../php/conexion.php';
$sql = "SELECT * FROM tiempos ORDER BY id DESC LIMIT 9";
$result = $conn->query($sql);

if (isset($_POST['termino_busqueda'])) {
    $termino = $_POST['termino_busqueda'];

    // Consulta SQL para buscar registros del usuario especificado
    $sql = "SELECT * FROM tiempos WHERE user LIKE '%$termino%' ORDER BY id DESC LIMIT 9";
    $result = $conn->query($sql);
}
$conn->close();
?>
<div class="container">
    <table class="table table-dark">
        <thead>
            <tr style="text-align: center;">
                <th scope="col">BackOffice</th>
                <th scope="col">Feha</th>
                <th scope="col">Hora</th>
                <th scope="col">Registro</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($result) && $result->num_rows > 0) {
                while ($fila = $result->fetch_assoc()) {
            ?>
                    <tr scope="row" style="text-align: center;">
                        <td style="text-transform: capitalize;"><?php echo $fila['user']; ?></td>
                        <td><?php echo $fila['fecha']; ?></td>
                        <td><?php echo $fila['hora']; ?></td>
                        <td><?php echo $fila['tipo']; ?></td>
                    </tr>
                <?php
                }
            } else {
                ?>
                <tr scope="row" style="text-align: center;">
                    <td colspan="3">No se encontraron registros para el usuario especificado.</td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>