<?php
session_start();
$json = array();

if(!isset($_SESSION['perfil']) || $_SESSION["rol"] != "manager"){
    $json["rpta"] = "err"; 
    echo json_encode($json, JSON_UNESCAPED_UNICODE);    
    die();
}

if(isset($_POST["nombres"]) && isset($_POST["apellidos"]) && isset($_POST["cedula"]) && isset($_POST["correo"]) && isset($_POST["password"])){
    include "conexion.php";
    $c = conectar(); 
    $nombres = $_POST["nombres"];  
    $apellidos = $_POST["apellidos"];  
    $cedula = $_POST["cedula"];  
    $correo = $_POST["correo"];  
    $password = $_POST["password"];  
    $sql = "INSERT INTO usuario (nombres, apellidos, cedula, correo, password)VALUES('{$nombres}', '{$apellidos}', '{$cedula}', '{$correo}', sha1('{$password}'));";
    if ($c->query($sql)) {   
        $sql2 = "INSERT INTO perfil (usuario, rol)VALUES('{$c->insert_id}', 1);";
        $c->query($sql2);
        $json["rpta"] = true; 
        // $c->insert_id;
    }else{
        $json["rpta"] = false; 
    }
    mysqli_close($c);   
    echo json_encode($json, JSON_UNESCAPED_UNICODE);    
}



?>
