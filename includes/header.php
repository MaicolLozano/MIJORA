<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MIJORA</title>
    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet">


    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">


<style>
    .navbar-nav .nav-item .nav-link:hover {
    background-color: #fff;
    border-radius: 5px;
    transition: background-color 0.3s ease;

}
</style>


</head>
<body>
<nav class="navbar navbar-expand-lg navbar-white bg-white">
    <div class="navbar-nav mr-auto">
        <a class="nav-item nav-link text-dark" href="index.php">Inicio</a>
        <a class="nav-item nav-link text-dark" href="news.php">Noticias</a>
        <a class="nav-item nav-link text-dark" href="contact.php">Contacto</a>
    </div>
    <a class="navbar-brand mx-auto font-weight-bold text-dark" href="index.php">MIJORA</a>
    <div class="navbar-nav ml-auto">
        <form class="form-inline my-2 my-lg-0" action="search.php" method="GET">
            <input class="form-control mr-sm-2" type="search" name="q" placeholder="Buscar noticias" aria-label="Buscar">
            <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Buscar</button>
        </form>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="bi bi-person"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <?php if (isset($_SESSION['user_id'])): ?>
                    <a class="dropdown-item" href="profile.php">Perfil</a>
                    <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                        <a class="dropdown-item" href="admin/index.php">Panel de Administrador</a>
                        <a class="dropdown-item" href="admin/manage_news.php">Administrar Noticias</a>
                        <a class="dropdown-item" href="admin/manage_users.php">Administrar Usuarios</a>
                    <?php endif; ?>
                    <a class="dropdown-item" href="logout.php">Cerrar Sesión</a>
                <?php else: ?>
                    <a class="dropdown-item" href="register.php">Registrarse</a>
                    <a class="dropdown-item" href="login.php">Iniciar Sesión</a>
                <?php endif; ?>
            </div>
        </li>
    </div>
</nav>



<div class="container mt-4">



