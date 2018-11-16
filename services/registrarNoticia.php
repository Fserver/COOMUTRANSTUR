<?php
session_start();
$json = array();

if(!isset($_SESSION['perfil'])){
    $json["rpta"] = "err"; 
    echo json_encode($json, JSON_UNESCAPED_UNICODE);    
    die();
}

if(isset($_POST["titulo"]) && isset($_POST["contenido"]) && !empty($_FILES['imagen']['name'])){
    include "conexion.php";

    //extensiones permitidas
    $valid_extensions = array("jpeg", "jpg", "png");
    //nombre del archivo
    $nombre_archivo = "img_".date("dHis");
    //arr
    $temp = explode(".", $_FILES["imagen"]["name"]);
    //extensión
    $file_extension = end($temp);
    //si el archivo cumple con las condiciones
    if((($_FILES["imagen"]["type"] == "image/png") || ($_FILES["imagen"]["type"] == "image/jpg") || ($_FILES["imagen"]["type"] == "image/jpeg")) && in_array($file_extension, $valid_extensions)){
        $sourcePath = $_FILES['imagen']['tmp_name'];
        $targetPath = "../img/uploads/".$nombre_archivo.".".$file_extension;
        if(move_uploaded_file($sourcePath,$targetPath)){
            $uploadedFile = $nombre_archivo.".".$file_extension;
            $c = conectar(); 
            $titulo = $_POST["titulo"];  
            $contenido = $_POST["contenido"];  
            $idperfil = $_SESSION['perfil'];
            $sql = "INSERT INTO noticia (titulo, contenido, estado, admin, imagen)VALUES('{$titulo}', '{$contenido}', 'registrada', '{$idperfil}', '{$uploadedFile}');";
            if ($c->query($sql)) {   
                $json["rpta"] = true; 
            }else{
                $json["rpta"] = false; 
            }
            mysqli_close($c);   
        }
    }
    echo json_encode($json, JSON_UNESCAPED_UNICODE);    
}



?>
