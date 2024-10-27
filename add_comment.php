<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include 'includes/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $news_id = $_POST['news_id'];
    $content = $_POST['content'];
    $user_id = $_SESSION['user_id']; // Asegúrate de que el usuario esté logueado

    $stmt = $conn->prepare("INSERT INTO comments (news_id, user_id, content) VALUES (:news_id, :user_id, :content)");
    $stmt->bindParam(':news_id', $news_id);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':content', $content);

    if ($stmt->execute()) {
        header("Location: single_news.php?id=$news_id");
    } else {
        echo "Error: " . $stmt->errorInfo();
    }
}
?>
