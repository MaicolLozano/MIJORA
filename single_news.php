<?php
include 'includes/config.php';
include 'includes/header.php';

// Obtener el ID de la noticia desde la URL
$news_id = $_GET['id'];

// Consulta para obtener la noticia por ID
$query = "SELECT * FROM news WHERE id = :id";
$stmt = $conn->prepare($query);
$stmt->bindParam(':id', $news_id, PDO::PARAM_INT);
$stmt->execute();
$news = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<style>
    /* Estilo para el formulario de comentarios */
.comment-form {
    margin-top: 20px;
    display: flex;
    flex-direction: column;
}

.comment-form textarea {
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    resize: none;
    font-size: 14px;
    margin-bottom: 10px;
}

.comment-form button {
    padding: 10px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.comment-form button:hover {
    background-color: #0056b3;
}

/* Estilo para la lista de comentarios */
.comment-list {
    list-style-type: none;
    padding: 0;
}

.comment-item {
    background-color: #f9f9f9;
    border: 1px solid #ddd;
    border-radius: 5px;
    padding: 10px;
    margin: 10px 0;
    font-size: 14px;
}


</style>
<div class="container">
    <div class="single-news">
        <h1><?php echo $news['title']; ?></h1>
        <img src="img/<?php echo $news['image']; ?>" alt="<?php echo $news['title']; ?>" class="news-image">
        <p><?php echo $news['content']; ?></p>
        <a href="index.php">Volver a las noticias</a>
        <br>
        <h2>Comentarios</h2>
        <form action="add_comment.php" method="post" class="comment-form">
            <input type="hidden" name="news_id" value="<?php echo $news['id']; ?>">
            <textarea name="content" placeholder="Escribe tu comentario..." required></textarea>
            <button type="submit">Comentar</button>
            <br>
        </form>



        <h3>Comentarios:</h3>
        <ul class="comment-list">
            <?php
            $stmt = $conn->prepare("SELECT comments.*, users.username FROM comments JOIN users ON comments.user_id = users.id WHERE news_id = :news_id");
            $stmt->bindParam(':news_id', $news['id']);
            $stmt->execute();
            $comments = $stmt->fetchAll();
            foreach ($comments as $comment) {
                echo "<li class='comment-item'><strong>{$comment['username']}:</strong> {$comment['content']}</li>";
            }
            ?>
        </ul>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
