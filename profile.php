<?php include 'includes/config.php'; ?>
<?php include 'includes/header.php'; ?>

<div class="container">
    <h2 class="my-4">Perfil</h2>
    <?php
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
        $stmt = $conn->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->bindParam(':id', $user_id);
        $stmt->execute();
        $user = $stmt->fetch();

        echo "<p><strong>Nombre de usuario:</strong> {$user['username']}</p>";
        echo "<p><strong>Correo electrónico:</strong> {$user['email']}</p>";
    } else {
        echo "<p>Por favor, inicia sesión para ver tu perfil.</p>";
    }
    ?>
</div>

<?php include 'includes/footer.php'; ?>
