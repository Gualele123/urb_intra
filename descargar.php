<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $pdo->prepare("SELECT * FROM archivo WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $archivo = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($archivo) {
        $archivo_path = 'uploads/' . $archivo['nombre'];

        if (file_exists($archivo_path)) {
            header('Content-Type: ' . $archivo['tipo']);
            header('Content-Disposition: attachment; filename="' . $archivo['nombre'] . '"');
            header('Content-Length: ' . $archivo['tamano']);
            readfile($archivo_path);
            exit;
        } else {
            echo "Archivo no encontrado.";
        }
    } else {
        echo "Archivo no disponible.";
    }
}
?>
