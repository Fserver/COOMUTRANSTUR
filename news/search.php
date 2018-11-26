<?php

if(!isset($_GET["value"]) || empty($_GET["value"]) || $_GET["value"] === null){
    header('Location: index.php');
}

$value = $_GET["value"];

require('../services/utils.php');
include "../services/conexion.php"; 
$con = conectar(); 

$sql = "SELECT idnoticia, titulo, contenido, fecha_registro, imagen FROM noticia WHERE titulo LIKE '%{$value}%' AND estado = 'aprobada' ORDER BY fecha_registro DESC;";
$noticias = $con->query($sql); 
$num_noticias = $noticias->num_rows;

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
    <script src="../js/jquery.min.js"></script>

</head>

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
                            <li class="nav-item active">
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



    <div class="container-fluid pl-0 pr-0 text-dark pb-5" id="">
        <div class="container">
            <div class="row d-flex justify-content-between align-items-center">
                <div class="col-12 col-md-6 mt-3 font-weight-bold">
                    <p>RESULTADOS DE LA BÚSQUEDA</p>
                </div>
                <div class="col-3 col-md-3 mt-3 font-weight-bold text-right">
                    <label>Buscar noticia</label>
                </div>
                <div class="col-9 col-md-3 mt-3 font-weight-bold text-right">
                <form action="search.php" method="GET" autocomplete="off">
                        <input type="search" name="value" id="input-search" value="<?= $value ?>" class="form-control" list="search-suggestions" required/>
                        <datalist id="search-suggestions">
                        </datalist>
                    </form>
                </div>
            </div>
            <hr class="">
            <div class="row mb-3">
                <div class="col-12"><?= $num_noticias  ?> noticias encontrada(s)</div>
            </div>
            <div class="row card-group">
            <?php
                foreach($noticias as $noticia){
            ?>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card shadow p-3 mb-3 bg-white rounded">
                        <img class="card-img-top" src="../img/uploads/<?=$noticia["imagen"] ?>" alt="Card image cap">
                        <div class="card-body">
                            <a href="./noticia.php?id=<?= $noticia["idnoticia"] ?>" class=""><h5 class="card-title"><?= $noticia["titulo"] ?></h5></a>
                            <p class="card-text"><?= cortar_string($noticia["contenido"], 30) ?>...</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted"><?= fechaCastellano($noticia["fecha_registro"]) ?></small>
                        </div>
                    </div>
                </div>
            <?php
                }
            ?>
            </div>
        </div>

    </div>




    <!-- Scripts -->
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/app.js"></script>

</body>

</html>