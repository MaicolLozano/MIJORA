<?php include 'includes/config.php'; ?>
<?php include 'includes/header.php'; ?>

<div class="container">
    <h2 class="my-4">Iniciar Sesión</h2>
    <form action="login.php" method="post">
        <div class="form-group">
            <label for="username">Usuario</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Iniciar Sesión</button>

    </form>
    <p>No tienes una cuenta?<a href="register.php"> Registrate</a></p>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];
            header('Location: index.php');
        } else {
            echo '<p class="text-danger">Invalid username or password</p>';
        }
    }
    ?>
</div>

<?php include 'includes/footer.php'; ?>
