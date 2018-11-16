<?php
session_start();
$json = array();

if(!isset($_SESSION['perfil']) || $_SESSION["rol"] != "manager"){
    $json["rpta"] = "err"; 
    echo json_encode($json, JSON_UNESCAPED_UNICODE);    
    die();
}

if(isset($_POST["idusuario"]) && isset($_POST["nombres"]) && isset($_POST["apellidos"]) && isset($_POST["cedula"]) && isset($_POST["correo"])  && isset($_POST["estado"])){
    include "conexion.php";
    $c = conectar(); 
    $idusuario = $_POST["idusuario"];  
    $nombres = $_POST["nombres"];  
    $apellidos = $_POST["apellidos"];  
    $cedula = $_POST["cedula"];  
    $correo = $_POST["correo"];  
    $password = $_POST["password"];  
    $estado = $_POST["estado"]; 
    $sql = "";
    if($password === ""){
        $sql = "UPDATE usuario SET nombres = '{$nombres}', apellidos = '{$apellidos}', cedula = '{$cedula}', correo = '{$correo}', estado = '{$estado}' WHERE idusuario = '{$idusuario}';";
        $c->query($sql);

        if($c->affected_rows != 0){    
            $json["rpta"] = true; 
        }else{
            $json["rpta"] = false; 
        }
    }
    if($password != ""){
        //se modifica el pass
        $sql = "UPDATE usuario SET nombres = '{$nombres}', apellidos = '{$apellidos}', cedula = '{$cedula}', correo = '{$correo}', password = sha1('{$password}'), estado = '{$estado}' WHERE idusuario = '{$idusuario}';";
        $c->query($sql);

        if($c->affected_rows != 0){    
            $json["rpta"] = true; 
        }else{
            $json["rpta"] = false; 
        }
    }



    mysqli_close($c);   
    echo json_encode($json, JSON_UNESCAPED_UNICODE);    
}



?>
