<?php
session_start();
$json = array();

if(!isset($_SESSION['perfil'])){
    $json["rpta"] = "err"; 
    echo json_encode($json, JSON_UNESCAPED_UNICODE);    
    die();
}

if(isset($_POST["id"]) && isset($_POST["estado"]) && isset($_SESSION['perfil'])){
    include "conexion.php";
    $c = conectar(); 
    $id = $_POST["id"];  
    $estado = $_POST["estado"];  

    $sql = "UPDATE noticia SET estado = '{$estado}' WHERE idnoticia = '{$id}';";
    $c->query($sql);
    if($c->affected_rows != 0){    
        $json["rpta"] = true; 
    }else{
        $json["rpta"] = false; 
    }
    mysqli_close($c);   
    echo json_encode($json, JSON_UNESCAPED_UNICODE);    
}




?>
