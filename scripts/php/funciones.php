<?php
function se_envio_el_correo($pDe='',$pPara='',$pAsunto='',$pCuerpo='') {
    $header = 'MIME-Version: 1.0' . "\r\n";
	$header .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$header .= "From: DiGAEs <digaesuc@digaesuc.com.ve>"."\r\n";
	$header .= "X-Mailer:PHP/".phpversion()."\r\n";
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
			  <td width="77%" height="30" style="background: #000; color: #fff; border: 2px solid #777; text-shadow: 1px 1px 6px #fff;">'.$pDe.'</td>
			  </tr>
			<tr>
			  <td width="22%" height="30" align="right" style="font-family: Tahoma, Geneva, sans-serif; font-size: 18px; font-style: normal; line-height: normal; font-weight: bold; font-variant: normal; text-transform: none; color: #666; text-decoration: none;">Para:</td>
			  <td height="30">&nbsp;</td>
			  <td height="30" style="background: #000; color: #fff; border: 2px solid #777; text-shadow: 1px 1px 6px #fff;">'.$pPara.'</td>
			  </tr>
			<tr>
			  <td width="22%" height="30" align="right" style="font-family: Tahoma, Geneva, sans-serif; font-size: 18px; font-style: normal; line-height: normal; font-weight: bold; font-variant: normal; text-transform: none; color: #666; text-decoration: none;">Asunto:</td>
			  <td height="30">&nbsp;</td>
			  <td height="30" style="background: #000; color: #fff; border: 2px solid #777; text-shadow: 1px 1px 6px #fff;">'.$pAsunto.'</td>
			  </tr>
			<tr>
			  <td width="22%" height="30" align="right" style="font-family: Tahoma, Geneva, sans-serif; font-size: 18px; font-style: normal; line-height: normal; font-weight: bold; font-variant: normal; text-transform: none; color: #666; text-decoration: none;">Texto</td>
			  <td height="30">&nbsp;</td>
			  <td height="30"><div style="color: #1B51BF; font-family: verdana; font-style: normal; font-weight: normal; font-size: 14px; font-variant: normal; line-height: 18px; text-align: justify; text-decoration: none; text-shadow: 3px 3px 2px #688EF7; margin: 10px 10px 10px 10px;">'.$pCuerpo.'</div></td>
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
	if (mail($pPara, $pAsunto, $contenido , $header)) {
		$seguimiento = 'Correo enviado...!<br />';
	}
	else {
		$seguimiento = 'Problemas al enviar el correo...!<br />';
	}
	return($seguimiento);
}
?>