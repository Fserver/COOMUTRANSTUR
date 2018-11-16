<?php
session_start();
$json = array();

if(!isset($_SESSION['perfil'])){
    $json["rpta"] = "err"; 
    echo json_encode($json, JSON_UNESCAPED_UNICODE);    
    die();
}


if(isset($_POST["titulo"]) && isset($_POST["contenido"]) && isset($_POST["id"]) && isset($_POST["bandera"])){
    include "conexion.php";
    $bandera = $_POST["bandera"];
    $id = $_POST["id"];
    $titulo = $_POST["titulo"];  
    $contenido = $_POST["contenido"];  
    $idperfil = $_SESSION['perfil'];
    $c = conectar();
    $sql = "UPDATE noticia SET titulo = '{$titulo}', contenido = '{$contenido}', admin = '{$idperfil}' WHERE idnoticia = '{$id}';";
    $c->query($sql);
    if($c->affected_rows != 0){    
        $json["rpta"] = true; 
    }else{
        $json["rpta"] = false; 
    }
    mysqli_close($c);   

    if($bandera === "true"){
        //VALIDAR QUE LLEGUE UNA IMAGEN
        if(!empty($_FILES['imagen']['name'])){
            $nombreImagen = $_POST["nombreImagen"];  
            $temp1 = explode(".", $nombreImagen);
            $nombre_solo = $temp1[0];
            $extension_img_bd = end($temp1);
    
            $valid_extensions = array("jpeg", "jpg", "png");
            //arr
            $temp = explode(".", $_FILES["imagen"]["name"]);
            //extensión
            $file_extension = end($temp);
                //si el archivo cumple con las condiciones
                
            if((($_FILES["imagen"]["type"] == "image/png") || ($_FILES["imagen"]["type"] == "image/jpg") || ($_FILES["imagen"]["type"] == "image/jpeg")) && in_array($file_extension, $valid_extensions)){
                $sourcePath = $_FILES['imagen']['tmp_name'];
                $targetPath = "../img/uploads/".$nombre_solo.".".$file_extension;
                if($extension_img_bd != $file_extension){
                    unlink('../img/uploads/'.$nombreImagen);
                }
                if(move_uploaded_file($sourcePath,$targetPath)){
                    $img_upload = $nombre_solo.".".$file_extension;
                    $c = conectar();
                    $sql = "UPDATE noticia SET imagen = '{$img_upload}' WHERE idnoticia = '{$id}';";
                    $c->query($sql);
                    $json["rpta"] = true; 
                }   
            }        
        }

    }
    echo json_encode($json, JSON_UNESCAPED_UNICODE);    
}

?>
