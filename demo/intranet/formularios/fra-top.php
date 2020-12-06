<?php
require_once('../funciones/valida-funciones.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=latin1" />
<title>.: Intranet - Direcci&oacute;n General de Asuntos Estudiatiles - Universidad de Carabobo :.</title>
<link href="../css/hoja_de_estilos.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="../digaes.ico" />

<style type="text/css">
body {
	background-image: url(../imagenes/digae_azul_transparente.png);
	background-repeat: repeat;
}
</style>
</head>
<script language="javascript" type="text/javascript">
var RelojID12 = null
var RelojEjecutandose12 = false

function DetenerReloj12 () {
	if(RelojEjecutandose12)
		clearTimeout(RelojID12)
	RelojEjecutandose12 = false
}

function MostrarHora12 () {
	var ahora = new Date()
	var horas = ahora.getHours()
	var minutos = ahora.getMinutes()
	var segundos = ahora.getSeconds()
	var meridiano

	//ajusta las horas
	if (horas > 12) {
		horas -= 12
		meridiano = " P.M."
	} else {
		meridiano = " A.M."
      	}
        	
   	//establece las horas
	if (horas < 10)
		ValorHora = "0" + horas
	else
		ValorHora = "" + horas

	//establece los minutos
	if (minutos < 10)
		ValorHora += ":0" + minutos
	else
		ValorHora += ":" + minutos
        	
	//establece los segundos
	if (segundos < 10)
		ValorHora += ":0" + segundos
	else
		ValorHora += ":" + segundos
        
	ValorHora += meridiano
 	document.reloj12.digitos.value = ValorHora

	//si se desea tener el reloj en la barra de estado, reemplazar la anterior por esta
  	//window.status = ValorHora

   	RelojID12 = setTimeout("MostrarHora12()",1000)
  	RelojEjecutandose12 = true
}

function IniciarReloj12 () {
   	DetenerReloj12()
  	MostrarHora12()
}

window.onload = IniciarReloj12;
if (document.captureEvents) {			//N4 requiere invocar la funcion captureEvents
	document.captureEvents(Event.LOAD)
}
</script>

<body>
<div align="center">
<table width="80%" border="0" cellspacing="0" cellpadding="0">
  <tr bgcolor="#FFFFFF">
    <td width="5%" height="40" align="left"><img src="../imagenes/Logo_UC_con_sombra.gif" width="74" height="92" alt="logo_uc" /></td>
    <td width="90%" height="40" align="center" class="GradeGris">Universidad de Carabobo<br />Secretar&iacute;a<br />Direcci&oacute;n General de Asuntos Estudiantiles<br />Intranet</td>
    <td width="5%" height="40" align="right"><img src="../imagenes/DiGAEs Transparente.png" width="124" height="55" alt="logo_digaes" /></td>
  </tr>
</table>
<table width="80%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="50%" height="30" align="left" valign="top">
    <form name="reloj12">
    <input type="text" size="10" name="digitos" class="ETinto1" style="background-color: transparent; margin: 4px 2px 2px 2px;">
    </form>
    </td>
    <td width="50%" height="30" align="right" valign="top" class="ETinto1"><?php echo fecha(); ?></td>
  </tr>
</table>
</div>
</body>
</html>
