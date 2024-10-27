<?php
include 'includes/config.php';
include 'includes/header.php';

// Consulta para obtener la noticia principal
$stmt = $conn->prepare("SELECT * FROM news ORDER BY created_at DESC LIMIT 1");
$stmt->execute();
$hero_news = $stmt->fetch();

// Consulta para obtener las noticias destacadas
$stmt = $conn->prepare("SELECT * FROM news ORDER BY created_at DESC LIMIT 1, 3");
$stmt->execute();
$featured_news = $stmt->fetchAll();

// Consulta para obtener el resto de noticias
$stmt = $conn->prepare("SELECT * FROM news ORDER BY created_at DESC LIMIT 4, 10");
$stmt->execute();
$other_news = $stmt->fetchAll();
?>

<style>

.news-grid a, .featured-news a, .hero-section a {
    text-decoration: none;
    color: #000;
}

.news-grid a:hover, .featured-news a:hover, .hero-section a:hover {
    color: #333;
}

.hero-section .hero-title {
    font-weight: 700; 
}

.hero-section .hero-title a {
    font-weight: inherit; 
}

.hero-section .btn-primary {
    color: #fff;
}
.hero-section .btn-primary:hover {
color: #fff;
}
</style>

<div class="">
    <section class="hero-section">
        <div class="row">
            <div class="col-md-6">
                <h1 class="hero-title"><a href="single_news.php?id=<?php echo $hero_news['id']; ?>"><?php echo $hero_news['title']; ?></a></h1>
                <p><?php echo substr($hero_news['content'], 0, 200); ?>...</p>
                <a href="single_news.php?id=<?php echo $hero_news['id']; ?>" class="btn btn-primary">Leer más</a>
            </div>
            <div class="col-md-6">
                <img src="img/<?php echo $hero_news['image']; ?>" alt="<?php echo $hero_news['title']; ?>" class="hero-image">
            </div>
        </div>
    </section>

    <section class="featured-news">
        <?php foreach ($featured_news as $news): ?>
            <div class="featured-news-item">
                <img src="img/<?php echo $news['image']; ?>" alt="<?php echo $news['title']; ?>">
                <div class="featured-news-item-content">
                    <h3><a href="single_news.php?id=<?php echo $news['id']; ?>"><?php echo $news['title']; ?></a></h3>
                    <p><?php echo substr($news['content'], 0, 100); ?>...</p>
                </div>
            </div>
        <?php endforeach; ?>
    </section>

    <section class="news-grid">
        <?php foreach ($other_news as $news): ?>
            <div class="news-item">
                <h3><a href="single_news.php?id=<?php echo $news['id']; ?>"><?php echo $news['title']; ?></a></h3>
                <p><?php echo substr($news['content'], 0, 150); ?>...</p>
                <span class="news-date"><?php echo date('d M Y', strtotime($news['created_at'])); ?></span>
            </div>
        <?php endforeach; ?>
    </section>
</div>

<?php include 'includes/footer.php'; ?>
