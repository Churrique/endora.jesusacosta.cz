<?php
  include_once('../funciones/valida-funciones.php');
  session_start();
  if (isset($_SESSION['uidusuarios'])) {
	  $unombre = $_SESSION['unombre'];
	  $ucuenta = $_SESSION['ucuenta'];
	  $uid = $_SESSION['uidusuarios'];
	  $uinicio = $_SESSION['uinicio'];
	  $uusuario = $_SESSION['uusuario'];
  }
  else {
	  header("Location: form-error-2.php");
	  exit;
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/Cuerpo-1.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=latin1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>.: Intranet - Direcci&oacute;n General de Asuntos Estudiatiles - Universidad de Carabobo :.</title>
<!-- InstanceEndEditable -->
<link href="../css/hoja_de_estilos.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="../digaes.ico" />
<script type="text/javascript">
var txt=".: Intranet - Direcci�n General de Asuntos Estudiatiles - Universidad de Carabobo :.   ";
var refresco=null;
function titulo() {	document.title=txt;	txt=txt.substring(1,txt.length)+txt.charAt(0); 	refresco=setTimeout("titulo()",500);}
titulo();
</script>
<script type="text/javascript"> 
    $(document).ready(function(){ 
        $(document).pngFix(); 
    }); 
</script>
<style type="text/css">
body {
	background-image: url(../imagenes/digae_azul_transparente.png);
	background-repeat: repeat;
}
</style>
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
</head>

<body>
<div align="center" style="margin: 5px 5px 5px 5px">
<table width="80%" border="0" cellspacing="0" cellpadding="0" class="tabla_body">
  <tr>
  <td height="40" align="center" valign="middle"><!-- InstanceBeginEditable name="EditRegion1" -->
  <form name="FrmSDT" method="post">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="28%" height="10">&nbsp;</td>
    <td width="33%" height="10">&nbsp;</td>
    <td width="33%" height="10">&nbsp;</td>
  </tr>
  <tr>
    <td height="40" colspan="3" class="gradiente_gris1"><span class="texto_decorado_blanco_amarillo">Taquilla de Archivo. Solicitud de Servicio.</span></td>
  </tr>
  <tr>
    <td height="10">&nbsp;</td>
    <td height="10">&nbsp;</td>
    <td height="10">&nbsp;</td>
  </tr>
  <tr>
    <td height="30"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">C&eacute;dula de Identidad</div></td>
    <td height="30">&nbsp;</td>
    <td height="30">&nbsp;</td>
  </tr>
  <tr>
    <td height="30"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Primer Nombre</div></td>
    <td height="30">&nbsp;</td>
    <td height="30">&nbsp;</td>
  </tr>
  <tr>
    <td height="30"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Primer Apellido</div></td>
    <td height="30">&nbsp;</td>
    <td height="30">&nbsp;</td>
  </tr>
  <tr>
    <td height="30"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Escuela</div></td>
    <td height="30">&nbsp;</td>
    <td height="30">&nbsp;</td>
  </tr>
  <tr>
    <td height="30"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Servicio que solicita</div></td>
    <td height="30">&nbsp;</td>
    <td height="30">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align="center"><input name="btnSiguiente" type="submit" class="glow2" title="Pulse aqui para continuar...!" value="Siguiente" /></td>
  </tr>
  <tr>
    <td height="30">&nbsp;</td>
    <td height="30">&nbsp;</td>
    <td height="30">&nbsp;</td>
  </tr>
</table>
</form>
<!-- InstanceEndEditable --></td>
  </tr>
</table>
</div>
</body>
<!-- InstanceEnd --></html>