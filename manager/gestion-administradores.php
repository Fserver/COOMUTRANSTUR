<?php
    include "../services/conexion.php"; 
    $con = conectar(); 
    $sql = "SELECT idusuario, nombres, apellidos, cedula, correo, usuario.fecha_registro as fecha_registro, usuario.estado as estado FROM usuario, perfil, rol WHERE usuario.idusuario = perfil.usuario AND rol.idrol = perfil.rol AND rol.nombre = 'administrador';";
    $administradores = $con->query($sql); 
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Manager</title>
  <link rel="icon" type="image/png" href="../img/logo.png" />

  <link rel="stylesheet" href="../css/datatables.min.css">
  <link rel="stylesheet" href="../css/style.css">
</head>
<body class="text-dark">
    <div class="container-fluid">
        <?php include "nav-manager.php" ?>
        <div>
            <div class="row mt-3">
                <div class="col-12">
                    <div class="card noticias">
                        <div class="card-header d-flex align-items-center">
                            <h3 class="h4">Lista de Administradores</h3>
                            <a class="ml-auto btn btn-primary" href="./form-administrador.php">Registrar Administrador</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-sm text-center" id="myTableManager">
                                <thead class="thead-default">
                                    <tr>
                                        <th>#</th>
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th>Cédula</th>
                                        <th>Correo</th>
                                        <th>Fecha de registro</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="">
                                    <?php
                                    $i = 1;
                                        foreach($administradores as $administrador){
                                    ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $administrador["nombres"] ?></td>
                                        <td><?= $administrador["apellidos"] ?></td>
                                        <td><?= $administrador["cedula"] ?></td>
                                        <td><?= $administrador["correo"] ?></td>
                                        <td><?= $administrador["fecha_registro"] ?></td>
                                        <td><?= $administrador["estado"] ?></td>
                                        <td>
                                            <a href="editar-administrador.php?id=<?= $administrador["idusuario"] ?>" id="" data-usuario="<?= $administrador["idusuario"] ?>"><i class="fas fa-edit"></i></a>
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
