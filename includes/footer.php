 </div> <!-- Cierre del contenedor principal -->


 <style>

* {
    font-family: "Outfit", sans-serif;
}

.container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
}

.news-menu {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.news-item {
    border: 1px solid #ddd;
    padding: 15px;
    border-radius: 5px;
    transition: background-color 0.3s;
    display: flex;
    align-items: center;
    gap: 15px;
}

.news-item:hover {
    background-color: #f9f9f9;
}

.news-item img {
    width: 150px;
    height: 100px;
    object-fit: cover;
    border-radius: 5px;
}

.news-item h2 a {
    text-decoration: none;
    color: #333;
}

.news-item h2 a:hover {
    text-decoration: underline;
}

.single-news h1 {
    font-size: 2em;
    margin-bottom: 20px;
}

.single-news img {
    width: 100%;
    height: auto;
    object-fit: cover;
    border-radius: 5px;
    margin-bottom: 20px;
}

.single-news p {
    font-size: 1.2em;
    line-height: 1.6;
}


.navbar .navbar-brand {
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
}

.navbar .navbar-nav.ml-auto {
    margin-left: auto;
}

.navbar .navbar-nav.mr-auto {
    margin-right: auto;
}

.navbar {
    height: 80px;
}


</style>







<!-- Separador -->
<ul class="nav nav-tabs"id="navId"role="tablist"></ul>
  <footer class="bg-white  text-center text-black">

<footer class="bg-white text-dark py-5 mt-5">




  <div class="footer-container">
    <div class="row">
      <div class="col-md-4">

        <h5>Acerca de MIJORA</h5>
        <p>MIJORA es tu fuente confiable de noticias y actualidad. Nos dedicamos a proporcionar información precisa y oportuna sobre los temas que más te interesan.</p>
      </div>
      <div class="col-md-4">
        <h5>Enlaces de interés</h5>
        <ul class="list-unstyled">
          <li><a href="index.php" class="text-dark">Inicio</a></li>
          <li><a href="news.php" class="text-dark">Noticias</a></li>
          <li><a href="contact.php" class="text-dark">Contacto</a></li>
          <li><a href="privacy-policy.php" class="text-dark">Política de privacidad</a></li>
          <li><a href="terms-of-service.php" class="text-dark">Términos de servicio</a></li>
        </ul>
      </div>
      <div class="col-md-4">
        <h5>Síguenos en redes sociales</h5>
        <ul class="list-inline">
          <li class="list-inline-item"><a href="#" class="text-dark"><i class="bi bi-facebook fs-3"></i></a></li>
          <li class="list-inline-item"><a href="#" class="text-dark"><i class="bi bi-twitter fs-3"></i></a></li>
          <li class="list-inline-item"><a href="#" class="text-dark"><i class="bi bi-instagram fs-3"></i></a></li>
          <li class="list-inline-item"><a href="#" class="text-dark"><i class="bi bi-linkedin fs-3"></i></a></li>
        </ul>
      </div>
    </div>
    <hr class="my-4">
    <div class="row">
      <div class="col-md-6">
        <p>&copy; 2024 MIJORA SAS. Todos los derechos reservados.</p>
      </div>
      <div class="col-md-6 text-md-end">
        <p>Diseñado y desarrollado por <a href="#" class="text-dark">MIJORA SAS.</a></p>
      </div>
    </div>
  </div>
</footer>

<style>
.footer-container {
    max-width: 1140px;
    margin-right: auto;
    margin-left: auto;
    padding-right: 15px;
    padding-left: 15px;
}

@media (max-width: 1200px) {
    .footer-container {
        max-width: 960px;
    }
}

@media (max-width: 992px) {
    .footer-container {
        max-width: 720px;
    }
}

@media (max-width: 768px) {
    .footer-container {
        max-width: 540px;
    }
}

@media (max-width: 576px) {
    .footer-container {
        max-width: 100%;
        padding-right: 15px;
        padding-left: 15px;
    }
}
</style>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.10/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
