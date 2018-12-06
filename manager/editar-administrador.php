<?php

include "../services/conexion.php"; 
$con = conectar(); 
$id =  $_GET['id']; 
$sql = "SELECT idusuario, nombres, apellidos, cedula, password, correo, estado FROM usuario WHERE idusuario = '{$id}';";
$result = $con->query($sql); 
$administrador = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Editar administrador</title>
  <link rel="icon" type="image/png" href="../img/logo.png" />

  <link rel="stylesheet" href="../css/datatables.min.css">
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container-fluid">
        <?php include "nav-manager.php" ?>
        <nav aria-label="breadcrumb" class="mt-2">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./index.php">Inicio</a></li>
                <li class="breadcrumb-item"><a href="./gestion-administradores.php">Administradores</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?= $administrador["nombres"] ?></li>
            </ol>
        </nav>
            <h3 class="text-dark">Editar administrador</h3>
        <hr>
        <div>
            <form id="form-editar-administrador" class="text-dark">
                <input type="hidden" name="idusuario" value="<?= $administrador["idusuario"] ?>">
                <div class="form-group">
                    <label for="">Nombres</label>
                    <input type="text" name="nombres" id="nombres" class="form-control" placeholder="Ingresa los nombres" value="<?= $administrador["nombres"] ?>" required>
                </div>
                <div class="form-group">
                    <label for="">Apellidos</label>
                    <input type="text" name="apellidos" id="apellidos" class="form-control" placeholder="Ingresa los apellidos" value="<?= $administrador["apellidos"] ?>" required>
                </div>
                <div class="form-group">
                    <label for="">Cédula</label>
                    <input type="number" name="cedula" id="cedula" class="form-control" placeholder="Ingresa la cédula" value="<?= $administrador["cedula"] ?>" required>
                </div>
                <div class="form-group">
                    <label for="">Correo electrónico</label>
                    <input type="email" name="correo" id="correo" class="form-control" placeholder="Ingresa el correo electrónico" value="<?= $administrador["correo"] ?>" required>
                </div>
                <div class="form-group">
                    <label for="">Contraseña</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Ingresa la contraseña">
                    <small id="fileHelpId" class="form-text text-muted">Es opcional editar la contraseña. </small>

                </div>
                <div class="form-group">
                    <label for="selectEstado">Estado</label>
                    <select class="form-control" id="selectEstado" name="estado">
                    <?php   
                        if($administrador["estado"] == "activo"){
                    ?>
                        <option value="activo" selected>Activo</option>
                        <option value="inactivo">Inactivo</option>
                    <?php        
                        }else{
                    ?>
                        <option value="activo">Activo</option>
                        <option value="inactivo" selected>Inactivo</option>        
                    <?php        
                        }
                    ?>
                        
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Editar" id="sbmButton">
                </div>
            </form>
        </div>
    </div>


              
    <!-- SCRIPTS -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/datatables.min.js"></script>
    <script src="../js/app.js"></script>

</body>
</html>
