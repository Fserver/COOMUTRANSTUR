<?php
session_start(); //iniciamos sesión

$rol = $_POST['rol'];
$perfil = $_POST['perfil'];
$_SESSION['perfil'] = $perfil;
$_SESSION['rol'] = $rol;

if($rol === "administrador"){
    header('Location: ../admin/index.php');
}else
if($rol === "manager"){
    header('Location: ../manager/index.php');
}else{
    header('Location: ../autenticacion.php');
}

?>
