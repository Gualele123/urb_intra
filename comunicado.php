<?php
include('conexion.php');

// Obtener los archivos de la base de datos
$sql = "SELECT a.id, a.nombre_archivo, a.ruta, ar.nombre AS area_nombre 
        FROM archivos a
        JOIN area ar ON a.area_id = ar.id";
$stmt = $pdo->query($sql);
$archivos = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Función para determinar el ícono del archivo basado en la extensión
function obtenerIcono($extension) {
    switch ($extension) {
        case 'pdf':
            return 'pdf_icon.png'; // Asegúrate de tener una imagen pdf_icon.png en tu carpeta de imágenes
        case 'jpg':
        case 'jpeg':
        case 'png':
        case 'gif':
            return 'image_icon.png'; // Imagen para archivos de imagen
        case 'doc':
        case 'docx':
            return 'word_icon.png'; // Imagen para archivos de Word
        case 'zip':
            return 'zip_icon.png'; // Imagen para archivos comprimidos
        default:
            return 'default_icon.png'; // Imagen por defecto
    }
}

?>

<table border="1">
    <thead>
        <tr>
            <th>Nombre del archivo</th>
            <th>Área</th>
            <th>Acción</th>
            <th>Vista previa</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($archivos as $archivo): ?>
            <tr>
                <td><?= htmlspecialchars($archivo['nombre_archivo']); ?></td>
                <td><?= htmlspecialchars($archivo['area_nombre']); ?></td>
                <td><a href="<?= $archivo['ruta']; ?>" download>Descargar</a></td>
                <td>
                    <?php
                    // Obtener la extensión del archivo
                    $extension = pathinfo($archivo['nombre_archivo'], PATHINFO_EXTENSION);
                    $icono = obtenerIcono(strtolower($extension));
                    ?>
                    <img src="icons/<?= $icono; ?>" alt="Icono" width="32" height="32">
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
