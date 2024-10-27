<?php include '../includes/config.php'; ?>
<?php include '../includes/functions.php'; ?>
<?php redirectIfNotAdmin(); ?>

<?php
$id = $_GET['id'];

// Get the current image for deletion
$stmt = $conn->prepare("SELECT image FROM news WHERE id = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();
$news = $stmt->fetch();

if ($news['image']) {
    unlink("../img/" . $news['image']);
}

$stmt = $conn->prepare("DELETE FROM news WHERE id = :id");
$stmt->bindParam(':id', $id);

if ($stmt->execute()) {
    header("Location: manage_news.php");
} else {
    echo "Error: " . $stmt->errorInfo();
}
?>
