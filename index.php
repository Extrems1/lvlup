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
        <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
          aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active text-white textogeneral text-end me-4" aria-current="page"
                href="index.php">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white textogeneral text-end me-4" href="login.php">Reservar</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white textogeneral text-end me-4" href="menu.php">Menu</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-white textogeneral text-end me-4" href="#" role="button"
                data-bs-toggle="dropdown" aria-expanded="false">El Bar</a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item text-white textogeneral text-end me-4" href="salon.php">Salon</a></li>
                <li><a class="dropdown-item text-white textogeneral text-end me-4" href="records.php">Records</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white textogeneral text-end me-4" href="nosotros.php">Nosotros</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white textogeneral text-end me-4" href="contacto.php">Contacto</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

  </header>


  <section>
    <div class="contenedor">
      <img src="img/fondo-inico.webp" alt="bar" class="img-inicio">
      <h1 class=" textologo texto-inicio neon-blanco">Level up Lounge</h1>
      <h3 class=" textogeneral subtexto-incio my-5 neon-blanco ">Un paraíso de juegos te espera en nuestro bar arcade.
        </h3>
    </div>

  </section>


  <section class="fichas">
    <h3 class="fichas-nosotros textogeneral neon-rojo">Un poco del bar</h3>
    <div class="container">
      <div class=" bg-black row justify-content-md-center fichas-row ">
        <div class="col-md">
          <img src="img/icon-arcade.webp" alt="bar" class="ficha-imagen rounded mx-auto d-block img-fluid">
          <h3 class="text-center textogeneral fichas-inicio text-white">Déjate llevar por la magia de los arcades y
            redescubre la
            emoción de clásicos como Pac-Man, Street Fighter y Space Invaders,Marvel vs Capcom, Daytona y muchos mas...
          </h3>
        </div>
        <div class="col-md">
          <img src="img/icon-beer.webp" alt="bar" class="ficha-imagen rounded mx-auto d-block img-fluid">
          <h3 class="text-center textogeneral fichas-inicio text-white">Descubre el sabor único de nuestra cerveza
            artesanal. ¡Elige calidad, elige nuestra cerveza!...
          </h3>
        </div>
        <div class="col-md">
          <img src="img/icon-music.webp" alt="bar" class="ficha-imagen rounded mx-auto d-block img-fluid">
          <h3 class="text-center textogeneral fichas-inicio text-white">Disfruta de los mejores ritmos , melodías y
            arcades mientras saboreas nuestra cerveza. ¡La combinación perfecta para una noche llena de buena música,
            arcades y buena cerveza...
          </h3>
        </div>
      </div>
    </div>

  </section>



  <section class="menu">
    <div class="container-fluid menu-section">
      <div class="row">
        <div class="col-md">
          <img src="img/menu-beer.webp" alt="bar" class="rounded mx-auto d-block img-fluid">
        </div>
        <div class="col-md">
          <h3 class="text-center textogeneral menu-textoinicio text-white neon-amarillo">La calidad de nuestras cervezas
          </h3>
          <h5 class="text-center textogeneral menu-textoh5 text-white">En nuestro establecimiento, hemos creado un
            espacio donde la pasión por la cerveza artesanal y la diversión de los arcades se fusionan para brindarte
            una experiencia inigualable. Nos enorgullece presentarte una selección de cervezas de la más alta calidad,
            cuidadosamente elaboradas por nuestros expertos cerveceros.Cada gota de nuestras cervezas es el resultado de
            un proceso meticuloso y apasionado. Utilizamos ingredientes seleccionados con esmero, combinados con
            técnicas tradicionales y un toque de creatividad.</h5>
            <form style="display: inline" action="menu.php" method="get">
            <button class="btn btn-light mx-auto d-block btn-lg"> Ver nuestra carta</button>
            </form>

        </div>
      </div>
    </div>
  </section>

  <section class="arcades">

    <h3 class="arcades-titulo textogeneral text-center neon-rojo">Algunos de nuestros arcades!</h3>

    <div class="container bg-black arcades-cards ">
      <div class="row ">
        <div class="col-md py-5 ">
          <div class="card h-100">
            <img src="img/arcades-mk.webp" class="card-img-top " alt="arcade mortal kombat">
            <div class="card-body d-flex align-items-center text-center">
              <p class="card-text text-center">
                Mortal Kombat: Intensa lucha con movimientos letales y gráficazos.
              </p>
            </div>
          </div>
        </div>
        <div class="col-md py-5 ">
          <div class="card h-100">
            <img src="img/arcade-tetris.webp" class="card-img-top " alt="arcade tetris">
            <div class="card-body d-flex align-items-center text-center">
              <p class="card-text text-center">
                Tetris: Clásico juego de puzzle con rapidez mental y encaje de formas.
              </p>
            </div>
          </div>
        </div>
        <div class="col-md py-5 ">
          <div class="card h-100">
            <img src="img/arcades-pacman.webp" class="card-img-top " alt="arcade pacman">
            <div class="card-body d-flex align-items-center text-center">
              <p class="card-text text-center">
                Pacman: Come puntos en laberintos, evita fantasmas.
              </p>
            </div>
          </div>
        </div>


        <div class="col-md py-5">
          <div class="card h-100 ">
            <img src="img/arcades-sunset.webp" class="card-img-top" alt="arcade pacman">
            <div class="card-body d-flex align-items-center text-center">
              <p class="card-text text-center">
                Sunset Riders: Disparos en el salvaje oeste contra forajidos despiadados.

              </p>
            </div>

          </div>

        </div>


      </div>


    </div>
    <div class="d-grid gap-2 d-md-flex justify-content-md-center py-5">
      <form style="display: inline" action="salon.php" method="get">
        <button class="btn btn-light mx-auto d-block btn-lg">Ver imagenes de nuestra sala!</button>
      </form>
    </div>

  </section>

  <section class="pedi">
    <h3 class="arcades-titulo textogeneral text-center neon-azul">Pedi por:</h3>

    <div class="container">
      <div class=" bg-black row justify-content-md-center  ">
        <div class="col-md py-5">
          <img src="img/pedi-py.webp" alt="bar" class="pedi-imagen rounded mx-auto d-block img-fluid">

        </div>
        <div class="col-md py-5">
          <img src="img/pedi-ra.webp" alt="bar" class="pedi-imagen rounded mx-auto d-block img-fluid">

        </div>
        <div class="col-md py-5">
          <img src="img/pedi-ue.webp" alt="bar" class="pedi-imagen rounded mx-auto d-block img-fluid">

        </div>
      </div>
    </div>
  </section>
  <footer>
    <nav class="navbar sticky-top navbar-expand-md bg-white text-primary">
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