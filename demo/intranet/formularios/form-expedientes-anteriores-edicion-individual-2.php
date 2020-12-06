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
var txt=".: Intranet - Dirección General de Asuntos Estudiatiles - Universidad de Carabobo :.   ";
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
  <form name="FrmEdiInd" method="post">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="30" colspan="4" class="gradiente_gris2"><span class="texto_decorado_blanco_amarillo">Edici&oacute;n Individual de Notas (Data Importada del SisGrad2006)</span></td>
  </tr>
  <tr>
    <td width="19%" height="16">&nbsp;</td>
    <td width="48%" height="16">&nbsp;</td>
    <td width="18%" height="16">&nbsp;</td>
    <td width="15%" height="16">&nbsp;</td>
  </tr>
  <tr>
    <td height="30" colspan="4"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="40" colspan="2" style="background:#CA206E; color:#F59DC5;"><div style="font-size:14px; font-weight:bold; text-align:left; line-height:22px; margin:3px 5px 3px 5px;">Facultad</div></td>
        <td height="40" colspan="3" style="background:#CA206E; color:#F59DC5;"><div style="font-size:14px; font-weight:bold; text-align:left; line-height:22px; margin:3px 5px 3px 5px;">Escuela</div></td>
        </tr>
      <tr>
        <td height="40" colspan="2" style="background:#6E0657; color:#F59DC5;"><div style="font-size:14px; font-weight:bold; text-align:left; line-height:22px; margin:3px 5px 3px 5px;">Menci&oacute;n</div></td>
        <td height="40" colspan="3" style="background:#6E0657; color:#F59DC5;"><div style="font-size:14px; font-weight:bold; text-align:left; line-height:22px; margin:3px 5px 3px 5px;">T&iacute;tulo</div></td>
        </tr>
      <tr>
        <td height="40" colspan="2" style="background:#340018; color:#FF0074;"><div style="font-size:14px; font-weight:bold; text-align:left; line-height:22px; margin:3px 5px 3px 5px;">C&eacute;dula</div></td>
        <td height="40" colspan="3" style="background:#340018; color:#FF0074;"><div style="font-size:14px; font-weight:bold; text-align:left; line-height:22px; margin:3px 5px 3px 5px;">Nombre</div></td>
        </tr>
        <tr>
          <td height="40" colspan="5"><div style="background:#011922; color:#FF0074; font-size:14px; font-weight:bold; text-align:center; line-height:22px; margin:3px 5px 3px 5px;">Detalle de este Registro</div></td>
          </tr>
    </table></td>
  </tr>
  <tr>
    <td height="30"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Nivel de la Materia</div></td>
    <td height="30">&nbsp;</td>
    <td height="30">&nbsp;</td>
    <td height="30">&nbsp;</td>
  </tr>
  <tr>
    <td height="30"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Clave</div></td>
    <td height="30">&nbsp;</td>
    <td height="30">&nbsp;</td>
    <td height="30">&nbsp;</td>
  </tr>
  <tr>
    <td height="30"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Nombre de la Materia</div></td>
    <td height="30">&nbsp;</td>
    <td height="30">&nbsp;</td>
    <td height="30">&nbsp;</td>
  </tr>
  <tr>
    <td height="30"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Secci&oacute;n</div></td>
    <td height="30">&nbsp;</td>
    <td height="30">&nbsp;</td>
    <td height="30">&nbsp;</td>
  </tr>
  <tr>
    <td height="30"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Unidad Cr&eacute;dito</div></td>
    <td height="30">&nbsp;</td>
    <td height="30">&nbsp;</td>
    <td height="30">&nbsp;</td>
  </tr>
  <tr>
    <td height="30"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Nota 1</div></td>
    <td height="30">&nbsp;</td>
    <td height="30">&nbsp;</td>
    <td height="30">&nbsp;</td>
  </tr>
  <tr>
    <td height="30"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">C&oacute;digo 1</div></td>
    <td height="30">&nbsp;</td>
    <td height="30">&nbsp;</td>
    <td height="30">&nbsp;</td>
  </tr>
  <tr>
    <td height="30"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Nota 2</div></td>
    <td height="30">&nbsp;</td>
    <td height="30">&nbsp;</td>
    <td height="30">&nbsp;</td>
  </tr>
  <tr>
    <td height="30"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">C&oacute;digo 2</div></td>
    <td height="30">&nbsp;</td>
    <td height="30">&nbsp;</td>
    <td height="30">&nbsp;</td>
  </tr>
  <tr>
    <td height="30"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Per&iacute;odo</div></td>
    <td height="30">&nbsp;</td>
    <td height="30">&nbsp;</td>
    <td height="30">&nbsp;</td>
  </tr>
  <tr>
    <td height="30"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Veces Cursadas</div></td>
    <td height="30">&nbsp;</td>
    <td height="30">&nbsp;</td>
    <td height="30">&nbsp;</td>
  </tr>
  <tr>
    <td height="30"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Observaci&oacute;n</div></td>
    <td height="30">&nbsp;</td>
    <td height="30">&nbsp;</td>
    <td height="30">&nbsp;</td>
  </tr>
  <tr>
    <td height="30"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Otros Valores</div></td>
    <td height="30">&nbsp;</td>
    <td height="30">&nbsp;</td>
    <td height="30">&nbsp;</td>
  </tr>
  <tr>
    <td height="14">&nbsp;</td>
    <td height="14">&nbsp;</td>
    <td height="14">&nbsp;</td>
    <td height="14">&nbsp;</td>
  </tr>
  <tr>
    <td height="30" colspan="4" align="center"><input name="btnGuardar" type="submit" class="glow2" id="btnGuardar" value="Guardar" /></td>
    </tr>
  <tr>
    <td height="14">&nbsp;</td>
    <td height="14">&nbsp;</td>
    <td height="14">&nbsp;</td>
    <td height="14">&nbsp;</td>
  </tr>
</table>
</form>
<!-- InstanceEndEditable --></td>
  </tr>
</table>
</div>
</body>
<!-- InstanceEnd --></html>