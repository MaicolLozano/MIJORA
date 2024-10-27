<?php include '../includes/config.php'; ?>
<?php include '../includes/functions.php'; ?>
<?php redirectIfNotAdmin(); ?>
<?php include '../includes/header.php'; ?>

<div class="container">
    <h2 class="my-4">Add News</h2>
    <form action="add_news.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="csrf_token" value="<?= generateCSRFToken() ?>">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control" id="image" name="image" required>
        </div>
        <button type="submit" class="btn btn-primary">Add News</button>
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

    if ($imageName = uploadImage($image)) {
        $author_id = $_SESSION['user_id'];

        $stmt = $conn->prepare("INSERT INTO news (title, content, image, author_id) VALUES (:title, :content, :image, :author_id)");
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':image', $imageName);
        $stmt->bindParam(':author_id', $author_id);

        if ($stmt->execute()) {
            header("Location: manage_news.php");
        } else {
            echo "Error: " . $stmt->errorInfo();
        }
    } else {
        echo "Invalid image.";
    }
}
?>

<?php include '../includes/footer.php'; ?>
