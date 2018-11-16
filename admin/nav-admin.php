<?php
    session_start();
if(!isset($_SESSION['perfil'])){
    header('Location: ../autenticacion.php');
}

    $nombres = $_SESSION['nombres'];
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="./index.php" id="">Dashboard</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Noticias
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="./noticias.php">Administrar Noticias</a>
                </div>
            </li>

            <li class="nav-item mmm">
                <a class="nav-link" href="../services/cerrar-sesion.php" id="" role="button">
                    Cerrar sesión <b>(<?= $nombres ?>)</b>
                </a>

            </li>
        </ul>
    </div>
</nav>