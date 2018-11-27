<?php
session_start();

if(isset($_SESSION['perfil']) || isset($_SESSION['rol']) ){
    if($_SESSION['rol'] === "administrado"){
        header('Location: admin/index.php');
    }else
    if($_SESSION['rol'] === "manager"){
        header('Location: manager/index.php');
    }
    // header('Location: admin/index.php');
    // die();
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Autenticación</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-light">
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center text-dark">INGRESAR</h5>
                    <hr>
                    <form class="form-signin" id="frm-login">
                        <div class="form-label-group">
                            <label for="inputEmail"><span class="text-dark">Correo electrónico</span></label>
                            <input type="email" id="inputEmail" name="correo" class="form-control" placeholder="Correo electrónico" required autofocus>
                        </div>
                        <div class="form-label-group">
                            <label for="inputPassword text-dark"><span class="text-dark">Password</span></label>
                            <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Contraseña" required>
                        </div>
                        <hr class=>
                        <input class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" value="Ingresar">
                    </form>
                </div>
            </div>
        </div>
    </div>    
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modelTitleId">Mis roles</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center" id="modal-body">
                    <div id="roles"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- http://"+host+"/fserver.github.io/admin/noticias.php -->
    <form  id="redirect" action="services/redireccionar.php" method="post">
        <input type="hidden" name="rol" id="rol">
        <input type="hidden" name="perfil" id="perfil">
    </form>
  <!-- SCRIPTS -->
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/app-login.js"></script>

</body>
</html>