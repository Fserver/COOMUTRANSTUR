<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Administrador</title>
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
                <li class="breadcrumb-item active" aria-current="page">Registrar Nueva Noticia</li>
            </ol>
        </nav>
        <div id="main">
            <form id="form-noticia" class="text-dark" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Título</label>
                    <input type="text" name="titulo" id="" class="form-control" placeholder="Ingresa el título" aria-describedby="helpId" required>
                </div>
                <div class="form-group">
                    <label for="">Contenido</label>
                    <textarea name="contenido" class="form-control" rows="10" placeholder="Ingresa el contenido de la noticia" autofocus required></textarea>
                </div>
                <div class="form-group">
                    <label for="">Imagen de portada</label>
                    <input type="file" name="imagen" id="fileImage" class="form-control-file"  accept='.jpg,.png,.jpeg' required>
                    <small id="fileHelpId" class="form-text text-muted">Solo se permite subir archivos de extensión (JPEG/JPG/PNG)</small>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Registrar" id="sbmButton">
                </div>
            </form>
        </div>
    </div>
    <!-- SCRIPTS -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/datatables.min.js"></script>
    <script src="../js/app.js"></script>

</body>
</html>
