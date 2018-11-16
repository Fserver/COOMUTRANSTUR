<?php
include "conexion.php"; 
$con = conectar(); 
$json = array(); 
if(isset($_POST["correo"]) && isset($_POST["password"])){
    $correo =  $_POST['correo']; 
    $pass = $_POST['password']; 
    $sql = "SELECT idusuario, nombres, apellidos FROM usuario WHERE correo = '{$correo}' AND password = sha1('{$pass}') AND estado = 'activo';"; 
    $resultado = $con->query($sql); 
    if($fila = mysqli_fetch_row($resultado)){
        session_start();
        $_SESSION['nombres'] = $fila[1];
        $_SESSION['apellidos'] = $fila[2];
        $sqlRoles = "SELECT perfil.idperfil as idperfil, rol.nombre as roll FROM rol, perfil WHERE perfil.usuario = '{$fila[0]}' AND rol.idrol = perfil.rol";
        $resultado = $con->query($sqlRoles); 
        $roles = array();
        foreach($resultado as $registro){
            array_push($roles, array('idperfil' => $registro["idperfil"], 'rol' => $registro["roll"]));
        }
        $json['roles'] = $roles;
        $json['rpta'] = true;

    }else{
        $json['rpta'] = false;
    }
    echo json_encode($json, JSON_UNESCAPED_UNICODE); 
    mysqli_close($con);
}


?>
