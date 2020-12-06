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
  <form name="FrmMPaises" method="post" action="form-maestro-paises-acciona-2.php" >
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td height="40">&nbsp;</td>
      <td height="40">&nbsp;</td>
      <td height="40">&nbsp;</td>
      </tr>
    <tr>
      <td height="40" colspan="3" class="gradiente_gris2"><span class="texto_decorado_blanco_amarillo">Maestro de Paises</span></td>
      </tr>
    <tr>
      <td height="40">&nbsp;</td>
      <td height="40">&nbsp;</td>
      <td height="40">&nbsp;</td>
      </tr>
      <tr>
      <td colspan="3" align="center">
    <table width="80%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="14%" height="50" class="texto_decorado_azul5B">Pa&iacute;s</th>
        <td width="60%" height="50"><input name="txtPais" type="text" class="cuadro_textbox_5" title="Indique el Nombre del Pa&iacute;s" value="" size="40" maxlength="40"  /></th>
        <td width="26%" height="50">&nbsp;</th>
      </tr>
      <tr>
        <td height="50" class="texto_decorado_azul5B">Regi&oacute;n</td>
        <td height="50"><input name="txtRegion" type="text" class="cuadro_textbox_5" title="Indique el Nombre del Pa&iacute;s" value="" size="60" maxlength="50"  /></td>
        <td height="50">&nbsp;</td>
      </tr>
      <tr>
        <td height="16">&nbsp;</td>
        <td height="16">&nbsp;</td>
        <td height="16">&nbsp;</td>
      </tr>
      <tr>
        <td height="40" colspan="3" align="center" valign="middle"><input name="btnRegresar" type="submit" class="glow2" title="Pulse aqu&iacute; para regresar a la pantalla anterior..." value="Regresar" />&nbsp;&nbsp;<input name="btnGuardar" type="submit" class="glow2" title="Pulse aqu&iacute; para guardar..." value="Guardar" /></td>
        </tr>
      <tr>
        <td height="16">&nbsp;</td>
        <td height="16">&nbsp;</td>
        <td height="16">&nbsp;</td>
      </tr>
      <tr>
        <td height="50" colspan="3">
        <?php echo MtlPaises(); ?>
        <!--<table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr class="MenBusqueda">
        <td width="12%" height="23" align="center" valign="middle" bgcolor="#E9F3FC">#</td>
        <td width="44%" height="23" align="center" valign="middle" bgcolor="#E9F3FC">PA&Iacute;S</td>
        <td width="44%" height="23" align="center" valign="middle" bgcolor="#E9F3FC">REGI&Oacute;N</td>
        </tr>
        <tr>
        <td height="23" align="center" valign="middle" bgcolor="#BBF7F7"><strong>1</strong></td>
        <td height="23" align="center" valign="middle" bgcolor="#BBF7F7">Venezuela</td>
        <td height="23" align="center" valign="middle" bgcolor="#BBF7F7">Sur Am&eacute;rica</td>
        </tr>
        <tr>
        <td height="23" align="center" valign="middle" bgcolor="#CDE3F8">2</td>
        <td height="23" align="center" valign="middle" bgcolor="#CDE3F8">Colombia</td>
        <td height="23" align="center" valign="middle" bgcolor="#CDE3F8">Sur Am&eacute;rica</td>
        </tr>
        <tr>
        <td height="23" align="center" valign="middle" bgcolor="#BBF7F7">3</td>
        <td height="23" align="center" valign="middle" bgcolor="#BBF7F7">Cuba</td>
        <td height="23" align="center" valign="middle" bgcolor="#BBF7F7">Sur Am&eacute;rica</td>
        </tr>
        </table>-->
        </td>
      </tr>
      <tr>
        <td height="16">&nbsp;</td>
        <td height="16">&nbsp;</td>
        <td height="16">&nbsp;</td>
      </tr>
        </table>
</td>
    </table>
    </form>
	<!-- InstanceEndEditable --></td>
  </tr>
</table>
</div>
</body>
<!-- InstanceEnd --></html>