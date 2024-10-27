<?php include 'includes/config.php'; ?>
<?php include 'includes/header.php'; ?>

<div class="container">
    <h2 class="my-4">Contacto</h2>
    
    <div class="row">
        <div class="col-md-6">
            <form action="contact.php" method="post" class="mb-4">
                <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="Nombre" required>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Correo electrónico" required>
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="message" rows="4" placeholder="Mensaje" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>
        
        <div class="col-md-6">
            <h4>Información de contacto</h4>
            <p><strong>Correo electrónico:</strong> lozanomichael430@gmail.com</p>
            <p><strong>WhatsApp:</strong> <a href="https://wa.me/+573002974064">+57 300 297 4064</a></p>
        </div>
    </div>
</div>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    
    $stmt = $conn->prepare("INSERT INTO contacts (name, email, message) VALUES (:name, :email, :message)");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':message', $message);
    
    if ($stmt->execute()) {
        echo "<div class='alert alert-success'>Mensaje enviado con éxito.</div>";
    } else {
        echo "<div class='alert alert-danger'>Error al enviar el mensaje.</div>";
    }
}
?>

<?php include 'includes/footer.php'; ?>
