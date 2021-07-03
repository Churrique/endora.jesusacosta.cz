<?php
//require_once('/scripts/php/funciones.php');
    if (isset($_POST["btnenvia"])) {
        $cpara = 'kontakt@jesusacosta.cz' . ', ';
        $cpara .= $_POST["correo"];
        $ctitulo = $_POST["asunto"];
        $cmensaje = '
        <!DOCTYPE html>
        <html lang="es-ES">
        <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=<device-width>, initial-scale=1.0">
        <title>Copia de contacto.</title>
        <link rel="StyleSheet" href="https://www.jesusacosta.cz/css/fuenteslocales.css" type="text/css" />
        <link rel="shortcut icon" href="https://www.jesusacosta.cz/img/_logo_nube.ico" type="image/x-icon" />
        </head>
        <body>
        <div style="width: 100%;">
          <div style="text-align: justify;">
            <table width="80%" border="0" cellspacing="0" cellpadding="0">
              <tbody>
                <tr>
                  <td width="10%"><img src="https://www.jesusacosta.cz/img/_logo_nube.png" alt="Logo" width="95" height="95"/></td>
                  <td width="81%"><p style="margin-left: 1.18em; padding: 1.35em; font-family: \'Shrikhand\', cursive; font-size: 1.5em; color: #C93909;">Esta es una copia del contacto/correo enviado por usted, si es de su preferencia, mantenga esta copia en su buzón.</p></td>
                  <td width="9%">&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td style="padding: 1.25em; font-family: \'Shrikhand\', cursive; font-size: 1em; color: #40EC0D; background-color: rgba(13, 72, 121, 0.726); border-radius: 1em 1em 0em 0em; text-align: right;"><p>#Inicio del texto</p></td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td style="padding: 1.25em; font-family: \'Spicy Rice\', cursive; font-size: 1.5em; background-color: rgba(13, 72, 121, 0.726); color: #E7D6D7"><p>' . $_POST['mensaje'] . '</p></td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td style="padding: 1.25em; font-family: \'Shrikhand\', cursive; font-size: 1em; color: #40EC0D; background-color: rgba(13, 72, 121, 0.726); border-radius: 0em 0em 1em 1em; text-align: right;"><p>#Fin del texto</p></td>
                  <td>&nbsp;</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        </body>
        </html>
        ';
        // Para enviar un correo HTML, debe establecerse la cabecera Content-type
        $ccabecera  = 'MIME-Version: 1.0' . "\r\n";
        $ccabecera .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        // Cabeceras adicionales
        $ccabecera .= 'To: Kontakt <kontakt@jesusacosta.cz>, <' . $_POST["correo"] . '>' . "\r\n";
        $ccabecera .= 'From: Remitente <' . $_POST["correo"] . '>' . "\r\n";
        //$ccabecera .= 'From: Kontakt <kontakt@jesusacosta.cz>' . "\r\n";
        //$ccabecera .= 'Cc: jesuseacosta@email.cz' . "\r\n";
        //$ccabecera .= 'Bcc: jesuseacosta@gmail.com' . "\r\n";
        // Enviarlo
        $hay_problema = mail($cpara, $ctitulo, $cmensaje, $ccabecera);
        if ($hay_problema) {
            header("Location:https://www.jesusacosta.cz/forms/kontakt-omyl.php?aae=El Correo Electrónico fue enviado satisfactoriamente...!&meeb=Enviar Otro&mde=");
        } else {
            $cmde = error_get_last()['message'];
            header("Location:https://www.jesusacosta.cz/forms/kontakt-omyl.php?aae=Hubo problemas al intentar enviar el correo...!&meeb=Reintentar&mde=" . $cmde);
        }
    } else {
       header("Location:https://www.jesusacosta.cz/forms/kontakt-omyl.php?aae=No se ha recibido nada...!&meeb=Reintentar");
    }
?>