<?php
//* ********************************
//* Estilo por Procedimiento
//* Valido para PHP version >= 7.x
//* ********************************

function se_envio_el_correo( $pDe = '', $pPara = '', $pAsunto = '', $pCuerpo = '' ) {
   $header = 'MIME-Version: 1.0' . "\r\n";
   $header .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
   $header .= "From: DiGAEs <digaesuc@digaesuc.com.ve>" . "\r\n";
   $header .= "X-Mailer:PHP/" . phpversion() . "\r\n";
   $contenido = '<html xmlns="http://www.w3.org/1999/xhtml">
	  <head>
	  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	  <title>.:Correo:.</title>
	  </head>
	  <body style="font-family: Verdana, Geneva, Arial, Helvetica, sans-serif; font-size: 12px; background-color: #EEF2F3; background-image:url(http://www.digaesuc.com.ve/imagenes_para_correos/digae_azul_transparente.png);background-repeat: repeat;">
	  <div align="center">
	  <table width="80%" border="0" cellspacing="0" cellpadding="0">
		<tr>
		  <td height="50" align="center" valign="middle"><table width="90%" border="0" cellpadding="0" cellspacing="0" style="border: 1px solid #CCC; background: #F0F0F0; -moz-border-radius: 10px; border-radius: 10px; border: 0px solid #E1E1E1; background-color: #fdfdfd; border: 0px solid #E1E1E1;">
			<tr>
			  <td width="9%" height="87" align="center" valign="middle"><img src="http://www.digaesuc.com.ve/imagenes_para_correos/Logo_UC_con_sombra.gif" width="60" height="75" alt="logo_uc" /></td>
			  <td width="78%" height="87" align="center" valign="middle"><span style="font-family: Verdana, Geneva, sans-serif; font-size: 12px; font-style: normal; line-height: 14px; font-weight: bold; font-variant: normal; text-transform: none; color: #630; text-decoration: none;">Universidad de Carabobo<br />Secretaría<br />Dirección General de Asuntos Estudiantiles</span></td>
			  <td width="13%" height="87" align="right" valign="middle"><img src="http://www.digaesuc.com.ve/imagenes_para_correos/DiGAEs_Transparente.png" width="100" height="45" alt="logo_digaes" /></td>
			</tr>
		  </table></td>
		</tr>
		<tr>
		  <td height="19">&nbsp;</td>
		</tr>
		<tr>
		  <td height="50" align="center" valign="middle"><table width="80%" border="0" cellspacing="0" cellpadding="0">
			<tr>
			  <td height="30" colspan="3" align="center" valign="middle" style="background-color: #6c96c6; background-repeat: repeat; border: 1px solid #D6D6D6; font-family: Verdana, Geneva, sans-serif; font-size: 14px; font-weight: bold; color: #FFF;"><div style="line-height: 25px; margin: 10px 10px 10px 10px; text-align:justify;">NOTA: Este es una copia del servicio que nos ha solicitado, le sugerimos que mantenga en su buzón esta copia... Le daremos respuesta a la brevedad posible... Gracias y que tenga un Buen Día...!</div></td>
			  </tr>
			<tr>
			  <td height="19" colspan="3">&nbsp;</td>
			  </tr>
			<tr>
			  <td width="22%" height="30" align="right" style="font-family: Tahoma, Geneva, sans-serif; font-size: 18px; font-style: normal; line-height: normal; font-weight: bold; font-variant: normal; text-transform: none; color: #666; text-decoration: none;">De:</td>
			  <td width="1%" height="30">&nbsp;</td>
			  <td width="77%" height="30" style="background: #000; color: #fff; border: 2px solid #777; text-shadow: 1px 1px 6px #fff;">' . $pDe . '</td>
			  </tr>
			<tr>
			  <td width="22%" height="30" align="right" style="font-family: Tahoma, Geneva, sans-serif; font-size: 18px; font-style: normal; line-height: normal; font-weight: bold; font-variant: normal; text-transform: none; color: #666; text-decoration: none;">Para:</td>
			  <td height="30">&nbsp;</td>
			  <td height="30" style="background: #000; color: #fff; border: 2px solid #777; text-shadow: 1px 1px 6px #fff;">' . $pPara . '</td>
			  </tr>
			<tr>
			  <td width="22%" height="30" align="right" style="font-family: Tahoma, Geneva, sans-serif; font-size: 18px; font-style: normal; line-height: normal; font-weight: bold; font-variant: normal; text-transform: none; color: #666; text-decoration: none;">Asunto:</td>
			  <td height="30">&nbsp;</td>
			  <td height="30" style="background: #000; color: #fff; border: 2px solid #777; text-shadow: 1px 1px 6px #fff;">' . $pAsunto . '</td>
			  </tr>
			<tr>
			  <td width="22%" height="30" align="right" style="font-family: Tahoma, Geneva, sans-serif; font-size: 18px; font-style: normal; line-height: normal; font-weight: bold; font-variant: normal; text-transform: none; color: #666; text-decoration: none;">Texto</td>
			  <td height="30">&nbsp;</td>
			  <td height="30"><div style="color: #1B51BF; font-family: verdana; font-style: normal; font-weight: normal; font-size: 14px; font-variant: normal; line-height: 18px; text-align: justify; text-decoration: none; text-shadow: 3px 3px 2px #688EF7; margin: 10px 10px 10px 10px;">' . $pCuerpo . '</div></td>
			  </tr>
			<tr>
			  <td width="22%" height="30" align="right" style="font-family: Tahoma, Geneva, sans-serif; font-size: 18px; font-style: normal; line-height: normal; font-weight: bold; font-variant: normal; text-transform: none; color: #666; text-decoration: none;">Archivo Adjunto</td>
			  <td height="30">&nbsp;</td>
			  <td height="30" style="font: italic bold 10px Verdana, Geneva, sans-serif; color: #00ACBF;">&lt;&lt;click aquí para descargar/ver/abrir&gt;&gt;</td>
			  </tr>
			<tr>
			  <td height="19">&nbsp;</td>
			  <td height="19">&nbsp;</td>
			  <td height="19">&nbsp;</td>
			  </tr>
			<tr>
			  <td height="30" colspan="3" style="border: 1px solid #CCC; background: #F0F0F0; -moz-border-radius: 10px; border-radius: 10px; border: 0px solid #E1E1E1; background-color: #fdfdfd; border: 0px solid #E1E1E1;">
				<table width="100%" border="0" style="color: #06F; border: 1px solid #CED6E3; font: bold 10px Verdana, Geneva, sans-serif; -moz-border-radius: 10px; border-radius: 10px;">
				  <tr>
					<td height="56" align="center">Horarios:<br />
					  Oficina: 8:00 a.m. - 2:15 p.m.<br />
					  Caja: 8:30 a.m. - 1:30 p.m.<br />
					  Taquilla: 8:00 a.m. - 2:00 p.m.
					  </td>
					</tr>
				  </table>
				</td>
			  </tr>
			<tr>
			  <td height="19">&nbsp;</td>
			  <td height="19">&nbsp;</td>
			  <td height="19">&nbsp;</td>
			  </tr>
			</table></td>
		</tr>
		<tr>
		  <td>&nbsp;</td>
		</tr>
	  </table>
	  </div>
	  </body>
	  </html>';
   if ( mail( $pPara, $pAsunto, $contenido, $header ) ) {
      $seguimiento = 'Correo enviado...!<br />';
   } else {
      $seguimiento = 'Problemas al enviar el correo...!<br />';
   }
   return ( $seguimiento );
}
function kontak() {
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
			exit;
		} else {
			$cmde = error_get_last();
			header("Location:https://www.jesusacosta.cz/stranky/error.php?cislo=" . $cmde['type'] . "&popis=" . $cmde['message']);
			exit;
		}
	} else {
		header("Location:https://www.jesusacosta.cz/forms/kontakt-omyl.php?aae=No se ha recibido nada...!&meeb=Reintentar");
		exit;
	}
	return true;
}

function number_random ($initial_value = 0, $final_value = LARGESTNUMBER) {
  $final_value = mt_getrandmax();
  $max = ($initial_value > $final_value ? $initial_value : $final_value);
  $min = ($final_value <= $initial_value ? $final_value : $initial_value);
  $max = ($final_value == LARGESTNUMBER ? $initial_value : $final_value);
  $min = ($max == $initial_value ? 1 : $initial_value);
  return mt_rand($min, $max);
}

?>
