<?php
  
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
    header('Location:/index.html');
    echo "Mail Sent.";
?>
