<?php
session_start();

// Database configuration
$host = 'localhost';
$db = 'news_website';
$user = 'root';
$pass = '';

// Create a new PDO instance
try {
    $conn = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// CSRF Token generation
function generateCSRFToken() {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

// CSRF Token verification
function verifyCSRFToken($token) {
    return $token === $_SESSION['csrf_token'];
}

// Image upload function
function uploadImage($image) {
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
    $uploadDir = '../img/';
    $fileName = basename($image['name']);
    $targetFile = $uploadDir . $fileName;
    

if (in_array($image['type'], $allowedTypes)) {
    if ($image['size'] > 2000000) {
        die("El archivo es demasiado grande.");
    }
    if (move_uploaded_file($image['tmp_name'], $targetFile)) {
        return $fileName;
    }
}


    return false;
}

// Redirect if not logged in
function redirectIfNotLoggedIn() {
    if (!isset($_SESSION['user_id'])) {
        header('Location: login.php');
        exit();
    }
}

// Redirect if not admin
function redirectIfNotAdmin() {
    if (isset($_SESSION['role']) && $_SESSION['role'] !== 'admin') {
        header('Location: index.php');
        exit();
    }
}

// Función para agregar un comentario
function addComment($news_id, $user_id, $content) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO comments (news_id, user_id, content) VALUES (?, ?, ?)");
    $stmt->bind_param("iis", $news_id, $user_id, $content);
    return $stmt->execute();
}

// Función para obtener comentarios de una noticia
function getComments($news_id) {
    global $conn;
    $stmt = $conn->prepare("SELECT c.*, u.username FROM comments c JOIN users u ON c.user_id = u.id WHERE c.news_id = ? ORDER BY c.created_at DESC");
    $stmt->bind_param("i", $news_id);
    $stmt->execute();
    return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
}

?>
