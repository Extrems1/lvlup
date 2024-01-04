<!DOCTYPE html>
<html lang="en">

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
  <section class="h-80 gradient-form login-bg">
    <div class="container h-80 pt-5" >
      <div class="row d-flex justify-content-center align-items-center h-80">
        <div class="col-xl-5">
          <div class="card rounded-3  text-white bg-black">
            <div class="card-body  mx-md-4">
              <a href="login.php">
                <img src="img/login/login-flecha.webp" style="width: 50px;">
              </a>
              <div class="text-center">
                <img src="img/logo.webp" style="width: 185px;" alt="logo">
                <h4 class="mt-1 mb-5 pb-1 textogeneral neon-rojo">LevelUp Lounge</h4>
              </div>

              <form action="php/creacion-usuario.php" method="POST">
                <p class="textogeneral text-center neon-azul">Ingresa tus datos</p>

                <div class="form-outline mb-4">
                  <input type="text" class="form-control" placeholder="Ingresa tu Nombre" name="nombre" required>
                  <label class="form-label textogeneral">Nombre</label>
                </div>
                <div class="form-outline mb-4">
                  <input type="text" class="form-control" placeholder="Ingresa tu Apellido" name="apellido" required>
                  <label class="form-label textogeneral">Apellido</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="email" class="form-control" placeholder="Ingresa tu email" name="correo" required>
                  <label class="form-label textogeneral">Email</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="number" class="form-control" placeholder="Ingresa tu telefono" name="telefono" required>
                  <label class="form-label textogeneral">Numero de telefono</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="password" class="form-control" placeholder="Ingresa tu contraseña" name="contrasena" required>
                  <label class="form-label textogeneral">Contraseña</label>
                </div>

                <div class="text-center pt-1 mb-5 pb-1">
                  <button class="btn btn-neon-verde btn-block fa-lg gradient-custom-2 mb-3 textogeneral" type="submit">Registrarse</button>
                </div>

                <?php
                if (isset($_GET['error']) && $_GET['error'] == 1) {
                  echo "<p class='textogeneral text-center error-login'>Error: El Email ya se encuentra registrado</p>";
                } elseif (isset($_GET['error']) && $_GET['error'] == 2) {
                  echo "<p class='textogeneral text-center error-login'>Error: Error de conexión</p>";
                } elseif (isset($_GET['error']) && $_GET['error'] == 3) {
                  echo "<p class='textogeneral text-center error-login'>Error: Por favor, complete todos los campos del formulario.</p>";
                }
                ?>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script src="js/bootstrap.bundle.js"></script>

</body>

</html>