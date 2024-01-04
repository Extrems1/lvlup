<?php
$mensaje = '<div class="textogeneral text-white bg-black text-center py-5 neon-verde">';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  function limpiar_datos($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  $nombre = limpiar_datos($_POST["nombre"]);
  $email = limpiar_datos($_POST["email"]);
  $contacto = limpiar_datos($_POST["contacto"]);
  $mensajeTexto = limpiar_datos($_POST["mensaje"]);

  $errores = array();

  if (empty($nombre)) {
    $errores[] = "El nombre es obligatorio.";
  }

  if (empty($email)) {
    $errores[] = "El correo electrónico es obligatorio.";
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errores[] = "Formato de correo electrónico no válido.";
  }


  if (empty($errores)) {
    $mensaje .= "Mensaje enviado correctamente. Detalles:<br>";
    $mensaje .= "Nombre: $nombre<br>";
    $mensaje .= "Email: $email<br>";
    $mensaje .= "Razón del contacto: $contacto<br>";
    $mensaje .= "Mensaje: $mensajeTexto<br>";
  } else {
    $mensaje = '<div class="errores textogeneral text-white bg-black text-center py-5 neon-rojo"><strong>Errores:</strong><br>';
    foreach ($errores as $error) {
      $mensaje .= "$error<br>";
    }
    $mensaje .= '</div>';
  }
}
?>



<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Level Up Lounge</title>
  <link href="css/normalize.css" rel="stylesheet">
  <link href="css/bootstrap.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link rel="icon" href="img/logo.ico">

</head>

<body>
  <header>
    <nav class="navbar sticky-top navbar-expand-md bg-black text-primary">
      <div class="container-fluid ">
        <a href="index.php">
          <img src="img/logo.webp" alt="Logo" width="130" height="80" class="d-inline-block align-text-top ">
        </a>
        <a class="d-inline-block align-text-top text-white font-local-logo textologo " href="index.php">Level Up
          Lounge</a>
        <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
          <ul class="navbar-nav  ">
            <li class="nav-item">

              <a class="nav-link text-white textogeneral text-end me-4" aria-current="page" href="index.php">Inicio</a>
            </li>
            <li class="nav-item">
            <li class="nav-item">
              <a class="nav-link text-white textogeneral text-end me-4" href="login.php">Reservar</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white textogeneral text-end me-4" href="menu.php">Menu</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-white textogeneral text-end me-4" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">El Bar</a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item text-white textogeneral text-end me-4" href="salon.php">Salon</a></li>
                <li><a class="dropdown-item text-white textogeneral text-end me-4" href="records.php">Records</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white textogeneral text-end me-4" href="nosotros.php">Nosotros</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active text-white textogeneral text-end me-4" href="contacto.php">Contacto</a>
            </li>


          </ul>
        </div>
      </div>
    </nav>


  </header>





  <section class="bg-black">


    <img src="img/contacto/contacto-banner.webp" alt="banner" class="contacto-banner">

  </section>

  <section class="bg-black">
    <h1 class="textogeneral text-white bg-black text-center py-5 neon-amarillo contacto-texto">Nuestro local!</h1>


    <div class="container py-5">
      <div class="row d-flex">

        <div class="col-md d-flex align-items-center justify-content-center">
          <ul class="list-unstyled mb-0">
            <li>
              <img src="img/contacto/contacto-puntero.webp" alt="puntero" width="100" height="50" class=" rounded mx-auto d-block img-fluid py-5">
            </li>
            <li>
              <p class="text-center text-white textogeneral neon-rojo">Corrientes 9999, Capital Federal, Argentina</p>
            </li>

            <li>
              <p class="text-center text-white textogeneral neon-rojo">11-4444-4444</p>
            </li>

            <li>
              <p class="text-center text-white contacto-email neon-rojo">contacto&#64;leveluplounge.com</p>
            </li>
          </ul>
        </div>

        <div class="col-md  d-flex align-items-center justify-content-center">

          <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13136.066850016401!2d-58.3815704!3d-34.6037389!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4aa9f0a6da5edb%3A0x11bead4e234e558b!2sObelisco!5e0!3m2!1ses-419!2sar!4v1686157587655!5m2!1ses-419!2sar" width="700" height="550" style="border:0;" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>


        </div>
      </div>
    </div>

    <section class="bg-black">
      <h2 class="textogeneral text-white bg-black text-center py-5 neon-azul contacto-texto">Contacto</h2>
      <div class="container">
        <div class="row bg-black">
          <form id="contact-form" name="contact-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

            <div class="row">
              <div class="col-md-6">
                <div class="md-form mb-0">
                  <input type="text" id="nombre" name="nombre" class="form-control" required>
                  <label for="nombre" class="textogeneral text-white">Nombre</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="md-form mb-0">
                  <input type="email" id="email" name="email" class="form-control" required>
                  <label for="email" class="textogeneral text-white">Email</label>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="md-form mb-0">
                  <input type="text" id="contacto" name="contacto" class="form-control" required>
                  <label for="contacto" class="textogeneral text-white">¿Por qué nos contactas?</label>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="md-form">
                  <textarea id="mensaje" name="mensaje" rows="2" class="form-control md-textarea" required></textarea>
                  <label for="mensaje" class="textogeneral text-white">Mensaje</label>
                </div>
              </div>
            </div>

            <div class="text-center text-md-left">
              <button type="submit" class="btn btn-primary btn-lg btn-light my-5">Enviar</button>
            </div>
          </form>
        </div>
      </div>
      <?php echo $mensaje; ?>
    </section>


    <section class="bg-black">
      <h2 class="textogeneral text-white bg-black text-center py-5 neon-cielo contacto-texto">Nuestras Redes</h2>

      <div class="container">
        <div class="row">
          <div class="col-md py-5">
            <a href="https://www.whatsapp.com" target="_blank" class="contacto-links">
              <img src="img/contacto/contacto-whatsapp.webp" alt="whatsapp" width="100" class="rounded mx-auto d-block img-fluid ">
              <h5 class=" textogeneral text-center text-white py-5 neon-verde ">Nuestro Whatsapp</h5>
            </a>
          </div>
          <div class="col-md py-5">
            <a href="https://www.facebook.com" target="_blank" class="contacto-links">
              <img src="img/contacto/contacto-facebook.webp" alt="facebook" width="100" class="rounded mx-auto d-block img-fluid ">
              <h5 class=" textogeneral text-center text-white py-5 neon-azul ">Nuestro Facebook</h5>
            </a>

          </div>

          <div class="col-md py-5">
            <a href="http://www.instragram.com" target="_blank" class="contacto-links">
              <img src="img/contacto/contacto-instagram.webp" alt="instagram" width="100" class="rounded mx-auto d-block img-fluid ">
              <h5 class=" textogeneral text-center text-white py-5 neon-rosa ">Nuestro Instagram</h5>
            </a>
          </div>

          <div class="col-md py-5">
            <a href="https://www.twitter.com" target="_blank" class="contacto-links">
              <img src="img/contacto/contacto-twitter.webp" alt="twitter" width="100" class="rounded mx-auto d-block img-fluid ">
              <h5 class=" textogeneral text-center text-white py-5 neon-cielo">Nuestro Twitter</h5>
            </a>
          </div>

        </div>
      </div>



    </section>


    <footer>
      <nav class=" navbar sticky-top navbar-expand-md bg-white text-primary">
        <div class="container justify-content-md-center">
          <div class="row justify-content-md-center">




            <div class="col-md">

              <img src="img/logo.webp" alt="Logo" width="150" height="100" class=" rounded mx-auto d-block img-fluid">


            </div>

            <div class="col-md">

              <h4 class="textologo text-dark text-center">Level Up Lounge</h4>
              <h4 class="textogeneral text-dark footer-texto text-center">Corrientes 9999</h4>
              <h4 class="textogeneral text-dark footer-texto text-center">Buenos Aires, Argentina</h4>
              <h4 class="textogeneral text-dark footer-texto text-center">Telefono:</h4>
              <h4 class="textogeneral text-dark footer-texto text-center">4444-4444</h4>

            </div>

            <div class="col-md ">

              <div class="row">
                <a class="textogeneral text-dark text-center footer-links" href="index.php">Inicio</a>
                <a class="textogeneral text-dark text-center footer-links" href="menu.php">Menu</a>
                <a class="textogeneral text-dark text-center footer-links" href="salon.php">Salon</a>
                <a class="textogeneral text-dark text-center footer-links" href="records.php">Records</a>
                <a class="textogeneral text-dark text-center footer-links" href="nosotros.php">Nosotros</a>
                <a class="textogeneral text-dark text-center footer-links" href="contacto.php">Contacto</a>
              </div>
            </div>




          </div>
        </div>
      </nav>

    </footer>
    <script src="js/bootstrap.bundle.js"></script>

</body>

</html>