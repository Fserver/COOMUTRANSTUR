<?php

if(!isset($_GET["id"]) || empty($_GET["id"]) || $_GET["id"] === null){
    header('Location: ../index.php');
}

require('../services/utils.php');
include "../services/conexion.php"; 
$con = conectar(); 

$idnoticia =  $_GET['id']; 

$sql = "SELECT titulo, contenido, fecha_registro, imagen FROM noticia WHERE estado = 'aprobada' AND idnoticia = '{$idnoticia}';";
$result = $con->query($sql); 
$noticia = $result->fetch_assoc();


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" type="image/png" href="../img/logo.png" />

    <title>COOMUSTRANSTUR</title>


    <link rel="stylesheet" href="../css/style.css">

</head>

<style>
    img.lazy {
        width: 700px; 
        height: 467px; 
        display: block;

        background-image: url("../img/load.gif");
        background-repeat: no-repeat;
        background-position: 50% 50%;
    }
</style>

<body>
    <!-- INDEX -->
    <section class="container-fluid pl-0 pr-0">
        <header class="">
            <div class="">
                <!-- menu -->
                <nav class="row navbar navbar-expand-sm bg-white">
                    <div class="col">
                        <a class="navbar-brand ml-3 text-green d-none d-sm-block" href="../index.php"><span class="title font-weight-bold">Coomutranstur</span><br></a>
                        <a class="navbar-brand ml-3 text-green d-block d-sm-none" href="../index.php"><span class="title2 font-weight-bold">Coomutranstur</span><br></a>
                    </div>
                    <div class="col d-none d-md-inline-block">
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
                            <li class="nav-item active">
                                <a class="nav-link" href="../turismo.html">Guía turística</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../acerca.html">Nosotros</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../alianzas.html">Alianzas Estratégicas</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
        <!-- texto main -->
    </section>

    <section id="img_intro_turismo">
        <main id="main_turismo" class="pt-4 d-flex justify-content-center align-items-center text-dark text-center">
            <h1><?=  $noticia["titulo"] ?></h1>
        </main>
    </section>

    <main class="mt-5 mb-5 text-dark">
        <div class="container">
            <div class="row d-flex justify-content-end">
                <div class="col-12 text-right">                    
                    <p><?= fechaCastellano($noticia["fecha_registro"]) ?></p>
                </div>
            </div>
            <hr>
            <div class="row d-flex align-items-center">
                <div class="col-12 text-justify">
                    <p><?=  $noticia["contenido"] ?></p>
                </div>
            </div>
        </div>

    </main>

    <section class="mt-4 mb-4">
        <div class="container-fluid pl-0 pr-0">
            <div id="elemento1" class="row d-flex justify-content-center">
                <img src="../img/uploads/<?=  $noticia["imagen"] ?>" class="img_adaptada2 lazy swipebox">
            </div>
        </div>
    </section>

    <!-- Footer  -->
    <div id="footer" class="row bg-light">
        <div class="col-12 text-center">
            <p>COOPERATIVA MULTIATIVA DE TRANSPORTE TURISTICO EN EL CORREGIMIENTO DE CORDOBA Y SAN CIPRIANO</p>
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

    <div id="google_translate_element" class="d-flex d-inline justify-content-end fixed-top"></div>

    <script src="../js/chaport.js"></script>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/jquery.lazy.min.js"></script>
    <!-- <script src="../js/carga.js"></script> -->
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/holder.js"></script>
    <script src="../js/in-view.min.js"></script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    <script src="../js/app.js"></script>

    <script>
        inView('#elemento1').once('enter', function () {
            $('.lazy').lazy({
                placeholder: "data:img/load.gif;",
                threshold: 0,
                visibleOnly: true
            });
        });
</script>
</body>

</html>