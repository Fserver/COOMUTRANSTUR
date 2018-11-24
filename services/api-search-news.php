<?php
if(isset($_POST["search"]) && $_POST["search"] != "" && $_POST["search"] != " "){
    include "conexion.php"; 
    $con = conectar(); 
    $json = array(); 
    $value =  $_POST['search']; 
    $sql = "SELECT idnoticia, titulo FROM noticia WHERE estado = 'aprobada' AND titulo LIKE '%{$value}%';"; 
    $resultado = $con->query($sql); 
    if(mysqli_fetch_row($resultado)){
        foreach($resultado as $row){
            $json[] = $row;
        }
        $json['rpta'] = true;
    }else{
        $json['rpta'] = false;
    }
    mysqli_close($con);
    echo json_encode($json, JSON_UNESCAPED_UNICODE); 
}


?>
