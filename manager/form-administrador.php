<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Manager</title>
  <link rel="stylesheet" href="../css/normalize.css">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/datatables.min.css">
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
        <?= include "nav-manager.php" ?>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./index.php">Inicio</a></li>
                <li class="breadcrumb-item"><a href="./gestion-administradores.php">Administradores</a></li>
                <li class="breadcrumb-item active" aria-current="page">Registrar Nuevo Administrador</li>
            </ol>
        </nav>
        <div id="main">
            <form id="form-administrador" class="text-dark">
                <div class="form-group">
                    <label for="">Nombres</label>
                    <input type="text" name="nombres" id="nombres" class="form-control" placeholder="Ingresa los nombres" required>
                </div>
                <div class="form-group">
                    <label for="">Apellidos</label>
                    <input type="text" name="apellidos" id="apellidos" class="form-control" placeholder="Ingresa los apellidos" required>
                </div>
                <div class="form-group">
                    <label for="">Cédula</label>
                    <input type="number" name="cedula" id="cedula" class="form-control" placeholder="Ingresa la cédula" required>
                </div>
                <div class="form-group">
                    <label for="">Correo Electrónico</label>
                    <input type="email" name="correo" id="correo" class="form-control" placeholder="Ingresa el correo electrónico" required>
                </div>
                <div class="form-group">
                    <label for="">Contraseña</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Ingresa la contraseña" required>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Registrar" id="sbmButton">
                </div>
            </form>
        </div>
    </div>
    
    <?= include "footer-manager.php" ?>
    <!-- SCRIPTS -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/datatables.min.js"></script>

    <script src="../js/app.js"></script>

</body>
</html>