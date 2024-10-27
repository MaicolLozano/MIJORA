<?php include 'includes/config.php'; ?>
<?php include 'includes/header.php'; ?>

<div class="container"> 
    <h2 class="my-4">News</h2>
    <?php
    $stmt = $conn->prepare("SELECT * FROM news");
    $stmt->execute();
    while ($news = $stmt->fetch()) {
        echo "<div class='news-item mb-4'>";
        echo "<h3>{$news['title']}</h3>";
        echo "<img src='img/{$news['image']}' alt='Image' width='300'>";
        echo "<p>{$news['content']}</p>";
        echo "</div>";
    }
    ?>
</div>

<?php include 'includes/footer.php'; ?>
