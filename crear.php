<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['archivo']) && isset($_POST['area_id'])) {
    $area_id = $_POST['area_id'];
    $nombre_archivo = $_FILES['archivo']['name'];
    $tipo_archivo = $_FILES['archivo']['type'];
    $tamano_archivo = $_FILES['archivo']['size'];
    $archivo_temporal = $_FILES['archivo']['tmp_name'];

    // Directorio donde se guardarán los archivos
    $directorio = 'uploads/';
    $ruta_final = $directorio . basename($nombre_archivo);

    if (move_uploaded_file($archivo_temporal, $ruta_final)) {
        $stmt = $pdo->prepare("INSERT INTO archivo (nombre, tipo, tamano, area_id) VALUES (:nombre, :tipo, :tamano, :area_id)");
        $stmt->bindParam(':nombre', $nombre_archivo);
        $stmt->bindParam(':tipo', $tipo_archivo);
        $stmt->bindParam(':tamano', $tamano_archivo);
        $stmt->bindParam(':area_id', $area_id);
        $stmt->execute();

        echo "Archivo subido correctamente.";
    } else {
        echo "Error al subir el archivo.";
    }
}
?>

<form method="POST" enctype="multipart/form-data">
    <label for="area_id">Seleccionar área:</label>
    <select name="area_id" required>
        <?php
        $stmt = $pdo->query("SELECT * FROM area");
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<option value='" . $row['id'] . "'>" . $row['nombre'] . "</option>";
        }
        ?>
    </select>

    <label for="archivo">Seleccionar archivo:</label>
    <input type="file" name="archivo" required>
    <button type="submit">Subir Archivo</button>
</form>
