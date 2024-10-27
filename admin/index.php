<?php include '../includes/config.php'; ?>
<?php include '../includes/functions.php'; ?>
<?php redirectIfNotAdmin(); ?>
<?php include '../includes/header.php'; ?>

<div class="container">
    <h1 class="my-4 text-center">Bienvenido al Panel de Administración</h1>

    <div class="card">
        <img class="card-img-top" src="holder.js/100x180/" alt="Título" />
        <div class="card-body">
            <h4 class="card-title">Gestionar Noticias</h4>
            <p class="card-text">Aquí puedes gestionar las noticias.</p>
            <a href="manage_news.php" class="btn btn-primary">Gestionar Noticias</a>
        </div>
    </div>

    <br>

    <div class="card">
        <img class="card-img-top" src="holder.js/100x180/" alt="Título" />
        <div class="card-body">
            <h4 class="card-title">Gestionar Usuarios</h4>
            <p class="card-text">Aquí puedes gestionar los usuarios.</p>
            <a href="manage_users.php" class="btn btn-primary">Gestionar Usuarios</a>
        </div>
    </div>

    <br>

    <div class="card">
        <img class="card-img-top" src="holder.js/100x180/" alt="Título" />
        <div class="card-body">
            <h4 class="card-title">Noticias</h4>
            <p class="card-text">Ver todas las noticias aquí.</p>
            <a href="../index.php" class="btn btn-primary">Ver Noticias</a>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>
