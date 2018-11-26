<?php
// secretKey es la clave secreta q te da google, no se puede compartir con nadie
// token es la clave q google te envía a la hora de enviar el form
define('SECRET_KEY', '6LfZ_XwUAAAAAMvyRhu4WjiwKApQ73Q4KGdjuGul');

    class Captcha{
        
        public function getCaptcha($token){
            $captcha = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".SECRET_KEY."&response={$token}"));
            return $captcha;
        }

    }

?>