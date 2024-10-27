<?php include '../includes/config.php'; ?>
<?php include '../includes/functions.php'; ?>
<?php redirectIfNotAdmin(); ?>
<?php include '../includes/header.php'; ?>

<div class="container">
    <h2 class="my-4">Editar Noticia</h2>

    <?php
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM news WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $news = $stmt->fetch();
    ?>

    <form action="edit_news.php?id=<?= $id ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="csrf_token" value="<?= generateCSRFToken() ?>">
        <div class="form-group">
            <label for="title">Titulo</label>
            <input type="text" class="form-control" id="title" name="title" value="<?= $news['title'] ?>" required>
        </div>

        <div class="form-group">
            <label for="content">Contenido</label>
            <textarea class="form-control" id="content" name="content" rows="5" required><?= $news['content'] ?></textarea>
        </div>
        <div class="form-group">
            <label for="image">Imagen</label>
            <input type="file" class="form-control" id="image" name="image">
            <?php if ($news['image']): ?>

                <img src="../img/<?= $news['image'] ?>" alt="Current Image" width="100">
            <?php endif; ?>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar Noticia</button>
    </form>
</div>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!verifyCSRFToken($_POST['csrf_token'])) {
        die('CSRF token validation failed');
    }

    $title = $_POST['title'];
    $content = $_POST['content'];
    $image = $_FILES['image'];

    $imageName = $news['image']; // Keep the current image if no new one is uploaded

    if ($image['error'] == UPLOAD_ERR_OK) {
        if ($newImageName = uploadImage($image)) {
            $imageName = $newImageName;
        } else {
            echo "Invalid image.";
            exit();
        }
    }

    $stmt = $conn->prepare("UPDATE news SET title = :title, content = :content, image = :image WHERE id = :id");
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':content', $content);
    $stmt->bindParam(':image', $imageName);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        header("Location: manage_news.php");
    } else {
        echo "Error: " . $stmt->errorInfo();
    }
}
?>

<?php include '../includes/footer.php'; ?>
