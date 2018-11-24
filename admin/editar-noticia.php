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
  <title>Editar noticia</title>
  <link rel="icon" type="image/png" href="../img/logo.png" />

  <link rel="stylesheet" href="../css/normalize.css">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/datatables.min.css">
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container-fluid">
        <?= include "nav-admin.php" ?>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./index.php">Inicio</a></li>
                <li class="breadcrumb-item"><a href="./noticias.php">Noticias</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?= $noticia["titulo"] ?></li>
            </ol>
        </nav>
            <h3 class="text-dark">Editar noticia</h3>
        <hr>
        <div id="main">
            <form id="form-editar-noticia" class="text-dark" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $noticia["idnoticia"] ?>">
                <input type="hidden" name="nombreImagen" value="<?= $noticia["imagen"] ?>">

                <div class="form-group">
                    <label for="">Título</label>
                    <input type="text" name="titulo" id="" class="form-control" placeholder="Ingresa el título" value="<?= $noticia["titulo"] ?>" required>
                </div>
                <div class="form-group">
                    <label for="">Contenido</label>
                    <textarea name="contenido" class="form-control" rows="10" placeholder="Ingresa el contenido de la noticia" required><?= $noticia["contenido"] ?></textarea>
                </div>
                <div class="row pl-0 pr-0">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <img src="../img/uploads/<?= $noticia["imagen"] ?>" class="img-fluid myImage" alt="">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label class="form-text text-mute">Si deseas reemplazar la imagen, selecciona otra de tu biblioteca.</label>
                            <input type="file" name="imagen" id="fileImage" class="form-control-file"  accept='.jpg,.png,.jpeg'>
                            <small id="fileHelpId" class="form-text text-muted">Solo se permite subir archivos de extensión (JPEG/JPG/PNG)</small>
                        </div>
                    </div>
                </div>
                <!-- <div class="form-group">

                </div> -->
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Editar" id="sbmButton">
                </div>
            </form>
        </div>
    </div>


    <?= include "footer-admin.php" ?>
              
    <!-- SCRIPTS -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/datatables.min.js"></script>
    <script src="../js/app.js"></script>

</body>
</html>
