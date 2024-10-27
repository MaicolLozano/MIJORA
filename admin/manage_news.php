<?php include '../includes/config.php'; ?>
<?php include '../includes/functions.php'; ?>
<?php redirectIfNotAdmin(); ?>
<?php include '../includes/header.php'; ?>

<div class="container">
    <h2 class="my-4">Gestionar Noticias</h2>
    <a href="add_news.php" class="btn btn-primary mb-4">Agregar Noticias</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Contenido</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $stmt = $conn->prepare("SELECT * FROM news");
            $stmt->execute();
            while ($news = $stmt->fetch()) {
                echo "<tr>";
                echo "<td>{$news['id']}</td>";
                echo "<td>{$news['title']}</td>";
                echo "<td>{$news['content']}</td>";
                echo "<td><img src='../img/{$news['image']}' alt='Imagen' width='100'></td>";
                echo "<td>
                        <a href='edit_news.php?id={$news['id']}' class='btn btn-warning'>Editar</a>
                        <a href='delete_news.php?id={$news['id']}' class='btn btn-danger'>Eliminar</a>
                      </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php include '../includes/footer.php'; ?>
