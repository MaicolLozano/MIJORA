<?php include 'includes/config.php'; ?>
<?php include 'includes/header.php'; ?>

<div class="container">
    <h2 class="my-4">Registrarse</h2>
    <form action="register.php" method="post">
        <div class="form-group">
            <label for="username">Usuario</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="email">Correo Electronico</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Registrarse</button>
    </form>
    <p>Ya tienes una cuenta?<a href="login.php"> Inicia Sesión</a></p>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

        $stmt = $conn->prepare("INSERT INTO users (username, email, password, role) VALUES (:username, :email, :password, 'user')");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);

        if ($stmt->execute()) {
            echo "<p class='text-success'>Registration successful!</p>";
        } else {
            echo "<p class='text-danger'>Error: " . $stmt->errorInfo() . "</p>";
        }
    }
    ?>
</div>

<?php include 'includes/footer.php'; ?>
