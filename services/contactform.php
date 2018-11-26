<?php

    $json = array();
    if(isset($_POST['g-recaptcha-response']) && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['message'])){

        include('./captcha.php');

        $token = $_POST["g-recaptcha-response"];
        $objCaptcha = new Captcha();
        $captcha = $objCaptcha->getCaptcha($token);

        if($captcha->success == true && $captcha->score > 0.5){
            $nombre = $_POST['name'];
            $correo = $_POST['email'];
            $telefono = $_POST['phone'];
            $mensaje = $_POST['message'];
            // Datos para el correo
            $destinatario = "iluminacion7@gmail.com";
            $asunto = "Contacto desde nuestra web";
            $carta = "De: $nombre \n";
            $carta .= "Correo: $correo \n";
            $carta .= "Telefono: $telefono \n";
            $carta .= "Mensaje: $mensaje";
            $headers = "From: admin@coomutranstur.com\r\n";
            // Enviando Mensaje
            mail($destinatario, $asunto, $carta, $headers);
            $json["rpta"] = true;
            $json["msg"] = "¡Mensaje enviado exitosamente!";

            }else{
                $json["rpta"] = false;
                $json["msg"] = "No pasó la prueba del captcha MUAJAJAJAAJA";
            }
    }else{
        $json["rpta"] = false;
        $json["msg"] = "Ocurrió un error. Vuelve a intentarlo.";
    }

    echo json_encode($json, JSON_UNESCAPED_UNICODE);
?>
