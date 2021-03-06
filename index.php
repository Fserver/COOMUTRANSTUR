<?php

include "./services/conexion.php";
require('./services/utils.php');

$con      = conectar();
//consultamos las últimas 3 noticias
$sql      = "SELECT idnoticia, titulo, contenido, fecha_registro, imagen FROM noticia WHERE estado = 'aprobada' ORDER BY fecha_registro DESC LIMIT 3;";
$noticias = $con->query($sql);
// $noticia = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <meta property="fb:app_id" content="642215239509270" />
  <meta name="Coomutranstur" content=" Empresa líder en ecoturismo a sancipriano ">


  <link rel="icon" type="image/png" href="img/logo.png" />

  <title>COOMUTRANSTUR</title>

  <link rel="stylesheet" href="css/my-slider.css" />
  <link rel="stylesheet" href="css/aos.css">
  <link rel="stylesheet" href="css/style.css">

  <script src='https://www.google.com/recaptcha/api.js?render=6LfZ_XwUAAAAAH1B7CAUoVgMcctrgSNqRmbJHoQL'></script>

</head>

<!-- <div class="js"> -->

<body>

  <div id="preloader"></div>

  <div id="fb-root"></div>

  <!-- INDEX -->
  <section class="container-fluid pl-0 pr-0" id="main">
    <div class="bg-index">
      <div class="bg-color">
        <header class="">
          <div class="">
            <!-- menu -->
            <nav class="row navbar navbar-expand-sm bg-white">
              <div class="col">
                <a class="navbar-brand ml-3 d-none d-md-block" href="#!"><span class="title font-weight-bold">Coomutranstur</span><br></a>
                <a class="title2 navbar-brand ml-3 d-block d-md-none" href="#!"><span class="title2 font-weight-bold">Coomutranstur</span><br></a>

              </div>
              <div class="col d-none d-sm-inline-block">
                <ul class="navbar-nav mt-2 float-right">
                  <li class="nav-item">
                    <a href="https://www.facebook.com/coomutranstur/" target="_blank"><i class="fab fa-facebook fa-2x"></i></a>
                  </li>
                  <li class="nav-item">
                    <a href="https://www.instagram.com/coomutranstur/" target="_blank"><i class="fab fa-instagram fa-2x"></i></a>
                  </li>
                  <li class="nav-item">
                    <a href="https://twitter.com/coomutranstur" target="_blank"><i class="fab fa-twitter-square fa-2x"></i></a>
                  </li>
                </ul>
              </div>
            </nav>
            <nav class="row navbar navbar-expand-lg bg-nav-menu">
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
                ria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">
                  <i class="fas fa-bars"></i>
                </span>
              </button>
              <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav mt-2 mt-lg-0 mr-auto">
                  <li class="nav-item">
                    <a class="nav-link" href="turismo">Guía turística</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="acerca">Nosotros</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="alianzas">Alianzas Estratégicas</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="angeles">Angeles Inversores</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="educacion">Educación y formación ciudadana</a>
                  </li>

                </ul>
              </div>
            </nav>
          </div>
        </header>
        <!-- texto main -->
        <br>
        <br>
        <br>
        <div class="container mt-3">
          <div class="row justify-content-center align-items-center">

            <div class="col-sm-12 col-md-6 col-xl-6 logo-index d-none d-sm-block" data-aos="zoom-in-right">
              <img class="img-fluid" src="img/logo.gif" alt="logo Coomutranstur">

            </div>
            <div class="col-sm-12 col-md-6 col-xl-6 text-center">
              <h3 class="text-white text-center">Empresa líder en ecoturísmo a</h3>
              <span class="title sancipriano text-white text-center d-none d-xl-block">sancipriano</span>
              <h1><span class="sancipriano text-white text-center d-block d-xl-none">sancipriano</span></h1>
              <a name="" id="" class="btn btn-lg mt-5 text-center btn-contacto" href="#contacto" role="button">Contáctanos</a>
            </div>
          </div>
        </div>
        <!-- fin texto main -->
      </div>
    </div>

    <div class="row justify-content-center">
      <div class="flecha-abajo">
        <a href="#noticias"><i class="fa fa-angle-down"></i></a>
      </div>
    </div>
  </section>
  <!-- FIN INDEX -->

  <section id="emprendimiento" class="mt-5 mb-5">
    <div>
      <div class="row text-dark">

        <div class="col-12 col-md-6 text-center m-auto">
          <h2 class="title">Córdoba - San Cipriano</h2>
          <p>Amir Murber</p>
          <p>Joven Etno-emprendedor del territorio.</p>
        </div>
        <div class="col-12 col-md-6">
          <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" width="560" height="315" src="https://www.youtube.com/embed/ip4Sg84vBzA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Contenido interactivo -->
  <main>
    <section id="noticias" class="container-fluid">

      <div class="row justify-content-center">

        <div class="col-12">
          <div class="col mb-3 text-center title font-weight-bold">
            <p class="text-uppercase">¿Qué esta ocurriendo?</p>
          </div>
        </div>

        <div class="col col-sm-10 col-lg-6 col-xl-6 tarjeta2 mb-4">
          <a class="float-right" href="./news/index.php">Ver todas las noticias</a>
          <h3 class="green">Noticias</h3>

            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <!-- <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li> -->
                <!-- <li data-target="#carouselExampleIndicators" data-slide-to="1"></li> -->
                <!-- <li data-target="#carouselExampleIndicators" data-slide-to="2"></li> -->
              </ol>
              <div class="carousel-inner">
              <?php
$i = true;
foreach ($noticias as $noticia) {
    if ($i) {
?>
            <div class="carousel-item active">
                  <!-- <img class="d-block w-100 pb-3 " data-src="holder.js/900x300?auto=yes"> -->
                  <img src="./img/uploads/<?= $noticia["imagen"] ?>" class="d-block w-100 img-carousel-index" alt="">
                  <div class="carousel-caption d-md-block img-carousel">
                    <a href="./news/noticia.php?id=<?= $noticia["idnoticia"] ?>"><h5><?= cortar_string($noticia["titulo"], 300) ?></h5></a>
                    <p><?= cortar_string($noticia["contenido"], 30) ?></p>
                  </div>
                </div>  
              <?php
    } else {
?>
            <div class="carousel-item">
                  <!-- <img class="d-block w-100 pb-3 " data-src="holder.js/900x300?auto=yes"> -->
                  <img src="./img/uploads/<?= $noticia["imagen"] ?>" class="d-block w-100 img-carousel-index" alt="">
                  <div class="carousel-caption d-md-block img-carousel">
                    <a href="./news/noticia.php?id=<?= $noticia["idnoticia"] ?>"><h5><?= cortar_string($noticia["titulo"], 300) ?></h5></a>
                    <p><?= cortar_string($noticia["contenido"], 30) ?></p>
                  </div>
                </div>
              <?php
    }
?>
          <?php
    $i = false;
}
?>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Anterior</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Siguiente</span>
              </a>
              </div>
</div>

        </div>


        <div class="col-sm-12 col-lg-4 col-xl-4">

          <div class="row d-flex align-items-center">
            <div class="col-sm-6 col-md-6 col-lg-12"> <a class="twitter-timeline" data-height="400" data-theme="light"
                href="https://twitter.com/coomutranstur?ref_src=twsrc%5Etfw">Tweets by coomutranstur</a>
              <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
            </div>
            <div class="d-none d-sm-block d-md-block d-lg-none col-sm-6 col-md-6 ">
              <img id="img_twitter" src="img/index/twitter-1848505_640.png" alt="">
            </div>

          </div>
        </div>

      </div>

      <div id="comentarios" class="row justify-content-center">
        <div class="col-12 text-center tarjeta3">
          <h3>Permítanos saber de usted</h3>
          <p id="facebook_text" class="d-inline"></p>
        </div>
        <div class="w-100"></div>
        <div class="col mb-3">
        <div class="fb-comments float-right" data-href="https://www.facebook.com/coomutranstur/" data-width="400px"
            data-height="400" data-numposts="5"></div>
        </div>
        <div class="col mb-3">
          <div class="fb-page" data-href="https://www.facebook.com/coomutranstur/" data-tabs="timeline" data-width="400px"
            data-height="400" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false"
            data-show-facepile="true">
            <blockquote cite="https://www.facebook.com/coomutranstur/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/coomutranstur/">Coomutranstur</a></blockquote>
          </div>
        </div>
      </div>
    </section>

    <section id="biodiversidad">
      <div class="container-fluid p-0">

      <div class="row text-center justify-content-around mt-5">

          <div class="col-12 mb-3 text-center title font-weight-bold">
            <p class="text-uppercase">Rincón de Biodiversidad en el Pacífico Colombiano</p>
          </div>

          <div class='container'>

            <div class="ism-slider" data-transition_type="zoom" data-interval="3000" id="my-slider">
              <ol>
                <!-- <li>
                  <img src="img/index/biodiversidad/img1.jpg">
                  <!-- <div class="ism-caption ism-caption-0">My slide caption text</div> -->
                </li>  -->
                <li>
                  <img src="img/index/biodiversidad/img2.jpg">
                </li>
                <!-- <li>
                  <img src="img/index/biodiversidad/img3.jpg">
                </li>
                <li>
                  <img src="img/index/biodiversidad/img4.jpg">
                </li> -->
              </ol>
            </div>
          </div>
          <p class="d-none ism-badge" id="my-slider-ism-badge"><a class="ism-link" href="http://imageslidermaker.com"
              rel="nofollow">generated with ISM</a></p>
        </div>
      </div>
    </section>

    <section id="gastronomia">
      <div id="parallax1"></div>
      <div class="d-flex justify-content-center justify-content-center">
        <img class="cabecita2 d-none d-sm-block" src="img/index/gastronomia.png" alt="">
      </div>
      <div class="container-fluid contenido-parallax d-flex align-items-center p-0">

        <div class="row text-center">

          <div class="col-12 mb-3 title  font-weight-bold">
            <p class="text-uppercase">Gastronomía</p>
          </div>

          <div class="col">
            <p class="text-justify">
              Entre sus platos más reconocidos se encuentran los aborrajados de pescado, ensalada de calamar, camarón o
              langostinos; empanadas de jaiba; sopa de lentejas, gazapo, almejas y cangrejo; pusandao (caldo de bagre);
              quebrao (sancocho de carne serrana salada en cecina); pargo o corvina, cazuela de mariscos; chaupiza
              (pescado pequeño) y huevos de piando, entre otros.
            </p>
          </div>
          <div class="col-12">
            <a name="" id="" class="btn botoncito btn-success" href="gastronomia.html" role="button">Ver más</a>
          </div>
        </div>
      </div>
    </section>




    <section id="cultura" class="">
      <div id="parallax2"></div>
      <div class="d-flex justify-content-center justify-content-center">
        <img class="cabecita2 d-none d-sm-block" src="img/index/cultura.png" alt="">
      </div>
      <div class="container-fluid contenido-parallax d-flex align-items-center p-0">


        <div class="row text-center">

          <div class="col-12 mb-3 title  font-weight-bold">
            <p class="text-uppercase">Cultura del pacífico</p>
          </div>

          <div class="col">
            <p class="text-justify">
              La cultura de la región Pacífica de Colombia se destaca por ser afrocolombiana. Es una cultura muy
              difundida en el litoral y expresada a través de su folclor e historia.

              Las danzas, la música, la gastronomía e incluso la forma de vestir del chocoano, el valle caucano, el
              nariñense y el caucano, se ven fuertemente marcadas por esta afrocolombianidad.
            </p>
          </div>
          <div class="col-12">
            <a name="" id="" class="btn botoncito btn-success" href="cultura.html" role="button">Ver más</a>
          </div>
        </div>
      </div>
    </section>

  </main>

  <!-- Contacto  -->
  <section id="contacto">

    <div class="container-fluid">
      <div class="row justify-content-around">

        <div class="col-12 mb-3 text-center title font-weight-bold">
          <p class="text-uppercase">Contáctenos</p>
        </div>

        <div class="col d-flex align-items-center ml-5 mr-5">

          <div id="escrito" class="d-none d-md-block">
            <div class="d-none d-md-block" data-aos="fade-right" data-aos-duration="1000">
              <h3 class="title">¡Hola!</h3>
            </div>

            <p id="typed" class="d-inline text-justify text-info"></p>
          </div>

        </div>

        <div class="col-lg-6">
          <div class="tarjeta row">
            <div class="col-md-12">
              <div class="well well-sm">
                <form id="form-contacto" class="form-horizontal" role="form">
                  <fieldset>
                    <legend class="text-center header title2">Formulario de Contacto</legend>
                    <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response">
                    <div class="form-group">
                      <input required id="fname" name="name" type="text" placeholder="Nombre completo" class="form-control">
                    </div>

                    <div class="form-group">
                      <input required id="email" name="email" type="text" placeholder="Correo electrónico" class="form-control">
                    </div>

                    <div class="form-group">
                      <input id="phone" name="phone" type="text" placeholder="Teléfono" class="form-control">
                    </div>

                    <div class="form-group">
                      <textarea required class="form-control" id="message" name="message" placeholder="Introduzca su mensaje para nosotros, le responderemos via email lo más pronto posible."
                        rows="7"></textarea>
                    </div>

                    <div class="form-group">
                      <div class="text-center">
                        <button type="submit" class="btn btn-success btn-lg" id="btn-contact">Enviar</button>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="text-center">
                      <span id="rptaContact" class="text-dark"></span>
                      </div>
                    </div>
                  </fieldset>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="container-fluid mb-4">
    <div class="row">
      <div class="col-12 col-sm-6 d-flex align-items-center justify-content-center">
        <h3 class="title text-center">Apoyos institucionales:</h3>
      </div>
      <div class="col">
        <div class="w-100 d-flex align-items-center justify-content-center">
          <img class="img-fluid" src="img/index/acompañantes.jpg" alt="">
        </div>
      </div>

    </div>
  </section>

  <!-- Footer  -->
  <section class="footer">
    <div class="row d-flex align-items-center justify-content-center p-0">

      <div class="order-1 col-md-6">
        <div class="row">
          <!-- clase tajerta -->
          <div class="col-md-2">
            <i class="fas fa-phone-square fa-2x align-self-center mr-1"></i>
          </div>
          <div class="col">
            (57) 3148340811 <br>
            (57) 3148302152 <br>
            (57) 3155777327 <br>
            <span><small>Todos los dias de 6:00 - 18:00</small></span>
          </div>

          <div class="w-100">
            <hr>
          </div>
          <div class="col-md-2">
            <i class="fas fa-envelope fa-2x align-self-center mr-1"></i>
          </div>
          <div class="col">
          directivoscoomutranstur@gmail.com
          </div>
        </div>
      </div>

      <div class="order-0 col-md-6 p-0">
        <iframe id="mapa" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3980.692860584939!2d-76.93038208467371!3d3.875888349334545!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e373bfac0c11d7d%3A0xa41564121f3506cb!2sCooperativa+Multiactiva+de+Transportadores+Turisticos+de+Cordoba+y+San+Cipriano+-+COOMUTRANSTUR!5e0!3m2!1ses-419!2sco!4v1540246532405"
          width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
      </div>

    </div>


    <div id="footer" class="row">
      <div class="col-12 text-center">
        <p>COOPERATIVA MULTIACTIVA DE TRANSPORTE TURISTICO EN EL CORREGIMIENTO DE CORDOBA Y SAN CIPRIANO</p>
      </div>
      <div class="col-12 text-center">
        <p>Buenaventura / Valle del Cauca / Colombia</p>
      </div>
      <div class="col-6 d-flex align-items-center justify-content-end">
        <p class="d-inline">
          <em>NIT: 830.500.789-9</em>
        </p>
      </div>
      <div class="col-6 d-flex align-items-center justify-content-start">
        <span style="font-size: 2em;">
          <a href="https://www.facebook.com/coomutranstur/" target="_blank"><i class="fab fa-facebook"></i></a>
          <a href="https://www.instagram.com/coomutranstur/" target="_blank"><i class="fab fa-instagram"></i></a>
          <a href="https://twitter.com/coomutranstur" target="_blank"><i class="fab fa-twitter-square"></i></a>
        </span>
      </div>
    </div>
  </section>


  <!-- Scripts -->

  <script src="js/chaport.js"></script>
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/scrollreveal.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/facebook.js"></script>
  <script src="js/holder.js"></script>
  <script src="js/parallax.min.js"></script>
  <script src="js/parallax.js"></script>
  <script src="js/ism-2.2.min.js"></script>
  <script src="js/typed.js"></script>
  <script src="js/in-view.min.js"></script>
  <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
  <script src="js/app.js"></script>

  <div id="google_translate_element" class="d-flex d-inline justify-content-end fixed-top"></div>

  <script>
    AOS.init({
      once: true
    });
    inView('#typed').once('enter', function () {
      var texto = "Si aun no quedas satisfecho puedes probar en enviaros un mensaje por nuestros diversos medios de comunicacion:",
        lista = ["<ol> <li>Formulario de contacto</li> <li>Chat en línea</li> <li>Mensaje de Whatsapp</li> </ol>"];
      new Typed('#typed', {
        strings: [texto + '<br><br>' + lista],
        startDelay: 1500,
        typeSpeed: 20,
        cursorChar: '_',
        smartBackspace: false,
        loop: false
      });
    });
    inView("#comentarios").once('enter', function () {
      new Typed('#facebook_text', {
        strings: ['Sus opiniones', 'Sus comentarios', 'Su experiencia', 'Nosotros los valoramos ;)'],
        startDelay: 1000,
        typeSpeed: 30,
        backDelay: 1500,
        cursorChar: '_',
        smartBackspace: true,
        loop: true
      });
    });
  </script>

  <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>


</body>
</div>

</html>