<?php
include('config.php');

// Obtener todas las áreas para el select
$sql = "SELECT * FROM area";
$stmt = $pdo->query($sql);
$areas = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['archivo'])) {
    // Procesar el archivo subido
    $nombre_archivo = $_FILES['archivo']['name'];
    $ruta_temporal = $_FILES['archivo']['tmp_name'];
    $ruta_destino = 'uploads/' . $nombre_archivo;

    if (move_uploaded_file($ruta_temporal, $ruta_destino)) {
        // Insertar en la base de datos
        $area_id = $_POST['area_id'];
        $sql = "INSERT INTO archivo (nombre_archivo, ruta, area_id) VALUES (?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nombre_archivo, $ruta_destino, $area_id]);

        echo "Archivo subido correctamente!";
    } else {
        echo "Error al subir el archivo.";
    }
}
?>

<form method="post" enctype="multipart/form-data">
    <label for="area_id">Área:</label>
    <select name="area_id" required>
        <?php foreach ($areas as $area): ?>
            <option value="<?= $area['id']; ?>"><?= $area['nombre']; ?></option>
        <?php endforeach; ?>
    </select>
    
    <label for="archivo">Archivo:</label>
    <input type="file" name="archivo" required>

    <button class="btn btn-success" type="submit">Subir archivo</button>
</form>


<?php
// Obtener los archivos de la base de datos
$sql = "SELECT a.id, a.nombre_archivo, a.ruta, ar.nombre AS area_nombre 
        FROM archivo a
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
        case 'xls':
        case 'xlsm':
        case 'xlsx':
        case 'xltx':
        case 'xltm':
            return 'excel_icon.png'; // Imagen para archivos de excel
        case 'pptx':
            return 'powerpoint_icon.png'; // Imagen para archivos de powerpoint
        case 'zip':
            return 'zip_icon.png'; // Imagen para archivos comprimidos
        default:
            return 'default_icon.png'; // Imagen por defecto
    }
}

?>

<table class="table table-sm table-striped">
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
                <td><a href="<?= $archivo['ruta']; ?>" download><i class="fas fa-download"></i>Descargar</a></td>
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
