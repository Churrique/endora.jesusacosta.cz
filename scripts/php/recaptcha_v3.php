<?php
class captcha {
    public function obtenCaptcha($LlaveSecreta) {
        $respuesta = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LeXMaUZAAAAANM15E8SN0vUMf_jsUOUqeUpF6hu&response={$LlaveSecreta}");
        $retorno = json_decode($respuesta);
        return($retorno);
    }
}
function envioEmail() {
        $ObjetoCaptcha = new captcha();
        $retorno = $ObjetoCaptcha->obtenCaptcha($_POST['g-recaptcha-responce']);
        if ($retorno->success == true && $retorno->score > 0.5) {
            return(true);
        } else {
            return(false);
        }
}
/*function envioEmail() {
    if (isset($_POST['email'])) {
        $email = htmlentities($_POST['email'], ENT_QUOTES);
        $ObjetoCaptcha = new captcha();
        $retorno = $ObjetoCaptcha->obtenCaptcha($_POST['g-recaptcha-responce']);
        if ($email === "") {
            echo 'El campo E-mail es obligatorio !';
        } elseif ($retorno->success == true && $retorno->score > 0.5) {
            return(true);
        } else {
            echo 'Eres un robot !';
        }
    }
}*/
?>