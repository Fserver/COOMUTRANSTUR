<?php
require('../services/utils.php');
    include "../services/conexion.php"; 
    $con = conectar(); 
    $sql = "SELECT idnoticia, titulo, contenido, fecha_registro, estado FROM noticia ORDER BY estado DESC;";
    $noticias = $con->query($sql); 
?>
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
        <div id="main">
            <div class="row mt-3">
                <div class="col-12">
                    <div class="card noticias">
                        <div class="card-header d-flex align-items-center">
                            <h3 class="h4">Lista de Noticias</h3>
                            <a class="ml-auto btn btn-primary" href="./form-noticia.php">Registrar Noticia</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-sm text-center" id="myTable">
                                <thead class="thead-default">
                                    <tr>
                                        <th>#</th>
                                        <th>Título</th>
                                        <th>Fecha de registro</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="">
                                    <?php
                                    $i = 1;
                                        foreach($noticias as $noticia){
                                    ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= cortar_string($noticia["contenido"], 30) ?></td>
                                        <td><?= fechaCastellano($noticia["fecha_registro"]) ?></td>
                                        <td><?= $noticia["estado"] ?></td>
                                        <td>
                                            <a href="detalle-noticia.php?idnoticia=<?= $noticia["idnoticia"] ?>" id="" data-noticia="<?= $noticia["idnoticia"] ?>"><i class="fas fa-eye"></i></a>
                                            <a href="editar-noticia.php?idnoticia=<?= $noticia["idnoticia"] ?>" id="" data-noticia="<?= $noticia["idnoticia"] ?>"><i class="fas fa-edit"></i></a>
                                        </td>
                                    </tr>
                                    <?php
                                    $i++;
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

    <!-- SCRIPTS -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/datatables.min.js"></script>
    <script src="../js/myDataTable.js"></script>
    <script src="../js/app.js"></script>

</body>
</html>
