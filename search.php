<?php
include 'includes/header.php';
include 'includes/config.php'; // Asumiendo que aquí está tu conexión a la base de datos

// Verificar si la conexión está establecida
if (!isset($conn) || !$conn) {
    die("Error: No se pudo establecer la conexión con la base de datos.");
}

$busqueda = isset($_GET['q']) ? $_GET['q'] : '';

// Preparar la consulta con marcadores de posición
$sql = "SELECT * FROM news WHERE title LIKE :busqueda OR content LIKE :busqueda ORDER BY created_at DESC";
$stmt = $conn->prepare($sql);

// Bind del parámetro
$busquedaParam = "%$busqueda%";
$stmt->bindParam(':busqueda', $busquedaParam, PDO::PARAM_STR);

// Ejecutar la consulta
$stmt->execute();

?>

<div class="container mt-4">
    <h2>Resultados de la búsqueda</h2>
    <?php if ($busqueda): ?>
        <p>Resultados para: "<?php echo htmlspecialchars($busqueda); ?>"</p>
        <?php if ($stmt->rowCount() > 0): ?>
            <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($row['title']); ?></h5>
                        <p class="card-text"><?php echo substr(htmlspecialchars($row['content']), 0, 200) . '...'; ?></p>
                        <p class="card-text"><small class="text-muted">Publicado el: <?php echo date('d/m/Y', strtotime($row['created_at'])); ?></small></p>
                        <a href="single_news.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Leer más</a>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No se encontraron resultados para tu búsqueda.</p>
        <?php endif; ?>
    <?php else: ?>
        <p>Por favor, introduce un término de búsqueda.</p>
    <?php endif; ?>
</div>

<?php
include 'includes/footer.php';
?>
