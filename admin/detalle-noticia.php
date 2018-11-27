<?php

include "../services/conexion.php"; 
$con = conectar(); 
$idnoticia =  $_GET['idnoticia']; 
$sql = "SELECT idnoticia, titulo, contenido, fecha_registro, estado, imagen FROM noticia WHERE idnoticia = '{$idnoticia}';";
$result = $con->query($sql); 
$noticia = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Administrador</title>
  <link rel="icon" type="image/png" href="../img/logo.png" />

  <link rel="stylesheet" href="../css/datatables.min.css">
  <link rel="stylesheet" href="../css/style.css">
</head>
<body class="text-dark">
    <div class="container-fluid">
        <?= include "nav-admin.php" ?>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./index.php">Inicio</a></li>
                <li class="breadcrumb-item"><a href="./noticias.php">Noticias</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?= $noticia["titulo"] ?></li>
            </ol>
        </nav>
        <div class="row justify-content-start">
            <div class="col-12 col-md-2">
                <!-- Aprobar -->
                <?php
                    if($noticia["estado"] === "registrada"){
                ?>
                    <a href="#" id="status-noticia" data-noticia="<?= $idnoticia ?>" data-status-noticia="aprobada" class="btn btn-success">Aprobar <span class="badge badge-light"><i class="fas fa-clipboard-check"></i></span></a>
                    <!-- Cancelar -->
                    <a href="#" id="status-noticia" data-noticia="<?= $idnoticia ?>" data-status-noticia="cancelada" class="btn btn-danger mt-1">Cancelar <span class="badge badge-light"><i class="fas fa-trash-alt"></i></span></a>
                <?php
                    }
                    if($noticia["estado"] === "aprobada"){
                ?>
                    <a href="#" id="status-noticia" data-noticia="<?= $idnoticia ?>" data-status-noticia="cancelada" class="btn btn-danger mt-1">Cancelar <span class="badge badge-light"><i class="fas fa-trash-alt"></i></span></a>
                <?php 
                    }
                    if($noticia["estado"] === "cancelada"){
                ?>
                    <a href="#" id="status-noticia" data-noticia="<?= $idnoticia ?>" data-status-noticia="aprobada" class="btn btn-success">Aprobar <span class="badge badge-light"><i class="fas fa-clipboard-check"></i></span></a>
                <?php   
                    }
                ?>

                <hr>
                <?php
                    if($noticia["estado"] === "registrada"){
                        echo '<h4><span class="badge badge-pill badge-info">Registrada</span></h4>';
                    }
                    if($noticia["estado"] === "aprobada"){
                        echo '<h4><span class="badge badge-pill badge-success">Aprobada</span></h4>';
                    }
                    if($noticia["estado"] === "cancelada"){
                        echo '<h4><span class="badge badge-pill badge-danger">Cancelada</span></h4>';
                    }
                ?>
                
                
                

            </div>
            <div class="col-12 col-md-10 text-dark">
                Información de guía para aprobar una noticia (que aparezca en la web) o cancelarla. Se supone que las noticias aprobadas por x o y son las que deben salir. Esto srive para poder visualizar la noticia antes de mostrarla al público.</p>
            </div>
        </div>
        <hr>
        <div class="noticias">
            <div class="row">
                <div class="col-12">
                    <img src="../img/uploads/<?= $noticia["imagen"] ?>" class="img-fluid" alt="Responsive image">
                </div>
            </div>
            <div class="row">
                <div class="col-12 text center">
                    <h1><?= $noticia["titulo"] ?></h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <?= $noticia["contenido"] ?>
                </div>
            </div>
        </div>
    </div>
              
    <!-- SCRIPTS -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/datatables.min.js"></script>
    <script src="../js/app.js"></script>

</body>
</html>
