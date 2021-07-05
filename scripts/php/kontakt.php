<?php
//require_once('/scripts/php/funciones.php');
if (isset($_POST["btnenvia"])) {
  $cpara = 'kontakt@jesusacosta.cz';
  $cpara .= (isset($_POST['copia']) && $_POST['copia'] == 'on') ? (', ' . $_POST["correo"]) : ('');
  //$cpara = 'kontakt@jesusacosta.cz' . ', ';
  //$cpara .= $_POST["correo"];
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
  $ccabecera .= 'To: Kontakt <kontakt@jesusacosta.cz>' . "\r\n";
  $ccabecera .= 'From: ' . $_POST['nombre'] . ' <' . $_POST["correo"] . '>' . "\r\n";
  $ccabecera .= (isset($_POST['copia']) && $_POST['copia'] == 'on') ? ('Cc: ' . $_POST["correo"] . "\r\n") : ('');
  //$ccabecera .= 'From: Kontakt <kontakt@jesusacosta.cz>' . "\r\n";
  //$ccabecera .= 'Cc: jesuseacosta@email.cz' . "\r\n";
  //$ccabecera .= 'Bcc: jesuseacosta@gmail.com' . "\r\n";
  //Enviar copia
  //if (isset($_POST['copia']) && $_POST['copia'] == 'on') {
  //  $copia_enviada = mail($_POST['correo'], $c2titulo, $cmensaje, $ccabecera);
  //  if (!$copia_enviada) {
  //    $que_paso_con_la_copia = 'la copia no se pudo enviar.';
  //  } else {
  //    $que_paso_con_la_copia = 'La copia la envie.';
  //  }
  //} else {
  //  $que_paso_con_la_copia = 'No se selecciono enviar copia al remitente.';
  //}
  // Enviarlo
  $no_hay_problema = mail($cpara, $ctitulo, $cmensaje, $ccabecera);
  if ($no_hay_problema) {
    $aae = 'El Correo Electrónico fue enviado satisfactoriamente...!';
    $meeb = 'Enviar Otro';
    header("Location:https://www.jesusacosta.cz/formulare/kontakt-omyl.php?aae=$aae&meeb=$meeb&mde=");
  } else {
    $cmde = error_get_last();
    header("Location:https://www.jesusacosta.cz/stranky/error.php?cislo=" . $cmde['type'] . "&popis=" . $cmde['message']);
  }
} else {
  header("Location:https://www.jesusacosta.cz/forms/kontakt-omyl.php?aae=No se ha recibido nada...!&meeb=Reintentar");
}
