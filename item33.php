<?php
require 'config.php';

$stmt = $pdo->query('SELECT * FROM comunicados');
$comunicados = $stmt->fetchAll();
?>

<?php foreach ($comunicados as $comunicado): ?>
    <div class="card">
        <img src="<?php echo $comunicado['imagen']; ?>" alt="Imagen del Comunicado" width="200">
        <h2><?php echo $comunicado['titulo']; ?></h2>
        <p><?php echo $comunicado['descripcion_corta']; ?></p>
        <button onclick="mostrarDetalles(<?php echo $comunicado['id']; ?>)">Ver más</button>
    </div>
<?php endforeach; ?>

<div id="detalles"></div>

<script>
    function mostrarDetalles(id) {
        fetch('detallecomunicado.php?id=' + id)
            .then(response => response.text())
            .then(data => {
                document.getElementById('detalles').innerHTML = data;
            });
    }
</script>