<?php
session_start(); //iniciamos sesión

$rol = $_POST['rol'];
$perfil = $_POST['perfil'];
$_SESSION['perfil'] = $perfil;


if($rol === "administrador"){
    header('Location: ../admin/index.php');
}else{
    header('Location: ../autenticacion.php');
}

?>
