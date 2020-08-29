<?php
require_once('/scripts/php/funciones.php');

    if (isset($_POST["btnenvia"])) {
        $correo_cc = $_POST["correo"];
        $correo_to = "kontakt@jesusacosta.cz";
        $correo_from = $_POST["correo"];
        $nombre = "Nombre: " . $_POST["nombre"];
        $asunto = "Asunto: " . $_POST["asunto"];
        $mensaje = "Mensaje: " . $_POST["mensaje"];
        $contenido = $nombre . "\n" . $asunto . "\n" . $mensaje;

    // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // More headers
        $headers .= "From: " . $correo_from . "\r\n";
        $headers .= "Cc: " . $correo_cc . "\r\n";

        if (mail($correo_to, $asunto, $mensaje, $headers)) {
            echo "Correo enviado...!";
            //header("Location:https://jesusacosta.cz/forms/kontakt.html");
        } else {
            echo "Hubo problemas al intentar enviar el correo!";
        }
    } else {
        echo "No se ha recibido nada!";
    }
?>