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

              <a class="nav-link  text-white textogeneral text-end me-4" aria-current="page"
                href="index.php">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white textogeneral text-end me-4" href="login.php">Reservar</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white textogeneral text-end me-4" href="menu.php">Menu</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-white textogeneral text-end me-4 active" href="#" role="button"
                data-bs-toggle="dropdown" aria-expanded="false">El Bar</a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item active text-white textogeneral text-end me-4" href="salon.php">Salon</a>
                </li>
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

  <img src="img/salon/salon-banner.webp" alt="banner" class="salon-banner">


  <section class="bg-black">

    <div class="container">
      <h1 class="text-center text-white textogeneral salon-subtexto py-5 neon-rojo"> Nuestros Bar</h1>

      <h5 class="text-center text-white textogeneral salon-subtexto py-5">

        ¡Bienvenidos a Level Up Lounge! Aquí encontrarás una combinación perfecta de arcades, cerveza artesanal y un
        ambiente increíble. Nuestros arcades de alta calidad te transportarán a épocas nostálgicas, con títulos
        seleccionados cuidadosamente para brindarte la mejor experiencia de juego. Además, disfruta de nuestra variedad
        de cervezas artesanales, seleccionadas para satisfacer los paladares más exigentes. En Level Up Lounge nos
        esforzamos por crear un ambiente acogedor y amigable, donde puedas pasar momentos inolvidables. Nuestro personal
        estará encantado de atenderte y asegurarse de que disfrutes de cada momento. Ven y vive la emoción de nuestros
        arcades, saborea una buena cerveza artesanal y déjate llevar por el ambiente único que ofrecemos en Level Up
        Lounge. ¡Te esperamos para vivir una experiencia de juego y diversión inigualable!
      </h5>
    </div>

  </section>


  <section class="bg-black">

    <div class="container">
      <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
            aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
            aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
            aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="img/salon/Carousel/salon-barcade-bar.webp" class="d-block w-100" alt="foto-salon-arcade-1">
          </div>
          <div class="carousel-item">
            <img src="img/salon/Carousel/salon-barcade.webp" class="d-block w-100" alt="foto-salon-arcade-2">
          </div>
          <div class="carousel-item">
            <img src="img/salon/Carousel/salon-barra.webp" class="d-block w-100" alt="foto-salon-arcade-3">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
          data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
          data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Siguiente</span>
        </button>
      </div>
    </div>

    
    <h2 class="text-center text-white textogeneral py-5 neon-azul"> Algunos de nuestros juegos </h2>

    <div class="container bg-black arcades-cards ">
      <div class="row ">
        <div class="col-md py-5 ">
          <div class="card h-100">
            <img src="img/salon/salon-Autos.webp" class="card-img-top " alt="Automovilismo">
            <div class="card-body d-flex align-items-center">
              <p class="card-text text-center">
                Arcades Automovilismo.
                Disfruta de las mejores carreras con tus amigos
              </p>
            </div>
          </div>
        </div>
        <div class="col-md py-5 ">
          <div class="card h-100 ">
            <img src="img/salon/salon-PinBalls.webp" class="card-img-top " alt="Pin Ball">
            <div class="card-body d-flex align-items-center">
              <p class="card-text text-center">

                Juega al Pinballs de Jurassic Park, Los Simpsons, Los Locos Adams, entre otros.
              </p>
            </div>
          </div>
        </div>
        <div class="col-md py-5 ">
          <div class="card h-100">
            <img src="img/salon/salon-arcade.webp" class="card-img-top " alt="arcade pacman">
            <div class="card-body d-flex align-items-center">
              <p class="card-text text-center">
                Favoritos de la gente
                Pacman - Bomberman - Mortal Kombta y mas...
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>

  </section>

  <section class="bg-black">

    <h2 class="text-center text-white textogeneral neon-amarillo"> Galeria </h2>


    <div class="container bg-black ">
      <div class="row ">
        <div class="col-md py-5 ">
          <div class="rounded mx-auto d-block img-fluid">
            <img src="img/salon/1.webp" class="card-img-top " alt="mesas">
          </div>
        </div>
        <div class="col-md py-5 ">
          <div class="rounded mx-auto d-block img-fluid ">

            <img src="img/salon/2.webp" class="card-img-top " alt="Mesas">

          </div>
        </div>
        <div class="col-md py-5">
          <div class="rounded mx-auto d-block img-fluid ">

            <img src="img/salon/3.webp" class="card-img-top " alt="mesas y arc">


          </div>
        </div>
      </div>
      <div class="container bg-black ">
        <div class="row ">
          <div class="col-md py-5 ">
            <div class="rounded mx-auto d-block img-fluid">
              <img src="img/salon/4.webp" class="card-img-top " alt="mesas">
            </div>
          </div>
          <div class="col-md py-5 ">
            <div class="rounded mx-auto d-block img-fluid ">

              <img src="img/salon/5.webp" class="card-img-top " alt="Mesas">

            </div>
          </div>
          <div class="col-md py-5">
            <div class="rounded mx-auto d-block img-fluid ">

              <img src="img/salon/6.webp" class="card-img-top " alt="mesas y arc">


            </div>
          </div>
        </div>

        <div class="container bg-black ">
          <div class="row ">
            <div class="col-md py-5 ">
              <div class="rounded mx-auto d-block img-fluid">
                <img src="img/salon/7.webp" class="card-img-top " alt="mesas">
              </div>
            </div>
            <div class="col-md py-5 ">
              <div class="rounded mx-auto d-block img-fluid ">

                <img src="img/salon/8.webp" class="card-img-top " alt="Mesas">

              </div>
            </div>
            <div class="col-md py-5">
              <div class="rounded mx-auto d-block img-fluid ">

                <img src="img/salon/9.webp" class="card-img-top " alt="mesas y arc">


              </div>
            </div>
          </div>
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