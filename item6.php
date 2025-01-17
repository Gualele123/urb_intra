<?php
include 'config.php';

$stmt = $pdo->query("SELECT a.id, a.nombre, a.tipo, a.tamano, a.fecha_subida, ar.nombre AS area
                     FROM archivo a
                     INNER JOIN area ar ON a.area_id = ar.id");

echo "<table border='1'>
        <tr>
            <th>Nombre</th>
            <th>Tipo</th>
            <th>Tamaño</th>
            <th>Área</th>
            <th>Fecha de subida</th>
            <th>Acciones</th>
        </tr>";

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>
            <td>" . $row['nombre'] . "</td>
            <td>" . $row['tipo'] . "</td>
            <td>" . $row['tamano'] . " bytes</td>
            <td>" . $row['area'] . "</td>
            <td>" . $row['fecha_subida'] . "</td>
            <td><a href='descargar.php?id=" . $row['id'] . "'>Descargar</a></td>
        </tr>";
}

echo "</table>";
?>
