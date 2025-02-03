<?php
require 'config.php';

$perPage = 5; // Cantidad de comunicados por página
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;

$search = isset($_GET['search']) ? $_GET['search'] : '';

$stmt = $pdo->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM comunicados WHERE titulo LIKE ? OR descripcion LIKE ? LIMIT {$start}, {$perPage}");
$stmt->execute(["%$search%", "%$search%"]);
$comunicados = $stmt->fetchAll();

$total = $pdo->query("SELECT FOUND_ROWS() as total")->fetch()['total'];
$pages = ceil($total / $perPage);
?>

<input type="text" id="search" placeholder="Buscar comunicados">

<div id="comunicados">
    <?php foreach ($comunicados as $comunicado): ?>
        <div class="card">
            <img src="<?php echo $comunicado['imagen']; ?>" alt="Imagen del Comunicado">
            <h2><?php echo $comunicado['titulo']; ?></h2>
            <p><?php echo substr($comunicado['descripcion'], 0, 64); ?>...</p>
            <p><?php echo $comunicado['fecha']; ?></p>
            <p><?php echo $comunicado['autor']; ?></p>
            <a href="details.php?id=<?php echo $comunicado['id']; ?>">Ver más</a>
        </div>
    <?php endforeach; ?>
</div>

<div>
    <?php if($page > 1): ?>
        <a href="?page=<?php echo $page - 1; ?>">&laquo; Anterior</a>
    <?php endif; ?>
    
    <?php for ($i = 1; $i <= $pages; $i++): ?>
        <a href="?page=<?php echo $i; ?>" <?php if($i == $page) echo 'class="active"'; ?>><?php echo $i; ?></a>
    <?php endfor; ?>
    
    <?php if($page < $pages): ?>
        <a href="?page=<?php echo $page + 1; ?>">Siguiente &raquo;</a>
    <?php endif; ?>
</div>

<script>
    document.getElementById('search').addEventListener('input', function() {
        let search = this.value;
        fetch('search.php?search=' + search)
            .then(response => response.text())
            .then(data => {
                document.getElementById('comunicados').innerHTML = data;
            });
    });
</script>
