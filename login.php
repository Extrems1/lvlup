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
  <section class="h-100 gradient-form login-bg">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-xl-5">
          <div class="card rounded-3 text-white bg-black">
            <div class="card-body p-md-5 mx-md-4">
              <a href="index.php">
                <img src="img/login/login-flecha.webp" style="width: 50px;">
              </a>
              <div class="text-center">
                <img src="img/logo.webp" style="width: 185px;" alt="logo">
                <h4 class="mt-1 mb-5 pb-1 textogeneral neon-rojo">LevelUp Lounge</h4>
              </div>

              <form action="php/verificador.php" method="POST">
                <p class="textogeneral text-center neon-azul">¡Regístrate para una experiencia más rápida!</p>

                <div class="form-outline mb-4">
                  <input type="email" class="form-control" placeholder="Ingresa tu email" name="email" required>
                  <label class="form-label textogeneral">Email</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="password" class="form-control" placeholder="Ingresa tu contraseña" name="contrasena" required>
                  <label class="form-label textogeneral">Contraseña</label>
                </div>


                <div class="text-center pt-1 mb-3 pb-1">
                  <button class="btn btn-neon-azul btn-block fa-lg gradient-custom-2 mb-3 textogeneral" type="submit">Iniciar Sesión</button>
                </div>

                <?php
                if (isset($_GET['error'])) {
                  echo "<p class='textogeneral text-center error-login'>Error: Email o contraseña incorrectos</p>";
                }
                ?>

                <div class="d-flex align-items-center justify-content-center pb-4">
                  <p class="mb-0 me-2 textogeneral">¿No tienes cuenta? ¡Regístrate!</p>
                  <a href="register.php">
                    <button type="button" class="btn btn-neon-verde textogeneral">Crear Usuario</button>
                  </a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script src=" js/bootstrap.bundle.js"></script>

</body>

</html>