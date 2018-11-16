<?php
session_start();

session_destroy();
session_unset();

unset($_SESSION['nombres']);
unset($_SESSION['apellidos']);
unset($_SESSION['perfil']);
unset($_SESSION['rol']);
header('Location: ../autenticacion.php');
?>