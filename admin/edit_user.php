<?php
include '../includes/config.php';
include '../includes/functions.php';
redirectIfNotAdmin();
include '../includes/header.php';

$user_id = isset($_GET['id']) ? $_GET['id'] : null;

if (!$user_id) {
    $_SESSION['error'] = "ID de usuario no proporcionado.";
    header('Location: manage_users.php');
    exit();
}

$stmt = $conn->prepare("SELECT * FROM users WHERE id = :id");
$stmt->bindParam(':id', $user_id);
$stmt->execute();
$user = $stmt->fetch();

if (!$user) {
    $_SESSION['error'] = "Usuario no encontrado.";
    header('Location: manage_users.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    $stmt = $conn->prepare("UPDATE users SET username = :username, email = :email, role = :role WHERE id = :id");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':role', $role);
    $stmt->bindParam(':id', $user_id);

    if ($stmt->execute()) {
        $_SESSION['success'] = "Usuario actualizado con éxito.";
        header('Location: manage_users.php');
        exit();
    } else {
        $_SESSION['error'] = "Error al actualizar el usuario.";
    }
}
?>

<div class="container">
    <h2 class="my-4">Editar Usuario</h2>
    <form action="edit_user.php?id=<?= $user_id ?>" method="post">
        <div class="form-group">
            <label for="username">Nombre de usuario</label>
            <input type="text" class="form-control" id="username" name="username" value="<?= $user['username'] ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Correo electrónico</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= $user['email'] ?>" required>
        </div>
        <div class="form-group">
            <label for="role">Rol</label>
            <select class="form-control" id="role" name="role">
                <option value="user" <?= $user['role'] == 'user' ? 'selected' : '' ?>>Usuario</option>
                <option value="admin" <?= $user['role'] == 'admin' ? 'selected' : '' ?>>Administrador</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar Usuario</button>
    </form>
</div>

<?php include '../includes/footer.php'; ?>
