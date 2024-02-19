<?php
require 'conexion.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fecha_inicio = $_POST["exporte"];
    $fecha_fin = $_POST["exporte_2"];
 
    
    if ($fecha_fin) {
        // Si se proporciona una fecha de fin, se exportará un rango de fechas.
        $consulta = mysqli_query($conn, "SELECT * FROM tiempos WHERE fecha BETWEEN '$fecha_inicio' AND '$fecha_fin'");
        $docu = "seguimiento_{$fecha_inicio}_to_{$fecha_fin}.xls";
    } else {
        // Si no se proporciona una fecha de fin, se exportará solo la fecha específica.
        $consulta = mysqli_query($conn, "SELECT * FROM tiempos WHERE fecha = '$fecha_inicio'");
        $docu = "seguimiento_{$fecha_inicio}.xls";
    }
    
    header("Content-type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=".$docu);
    header("Pragma: no-cache");
    header('Expires: 0');
    echo '<table border=1>';
    echo '<tr><th>Back</th><th>Seguimiento</th><th>Fecha</th><th>Hora</th></tr> ';
    while ($row = mysqli_fetch_assoc($consulta)){
        echo '<tr>';
        echo '<td>'.$row['user'].'</td>';
        echo '<td>'.$row['tipo'].'</td>';
        echo '<td>'.$row['fecha'].'</td>';
        echo '<td>'.$row['hora'].'</td>';
        echo '</tr>';   
    }
    echo '</table>';
 
}
 
?>