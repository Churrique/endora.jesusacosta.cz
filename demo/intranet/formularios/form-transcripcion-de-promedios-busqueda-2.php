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
  <form name="FrmBuscaEnPro" method="post" action="form-transcripcion-de-promedios-busqueda-acciona-2.php" >
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <th height="10" colspan="6" valign="middle" scope="col">&nbsp;</th>
      </tr>
      <tr>
        <td height="40" colspan="6" valign="middle" class="gradiente_gris1"><span class="texto_decorado_blanco_amarillo">B&uacute;squeda de Promedios</span></td>
      </tr>
      <tr>
        <td height="40" valign="middle">&nbsp;</td>
        <td height="40" align="center" valign="middle">&nbsp;</td>
        <td height="40" valign="middle" class="texto_decorado_azul3">&nbsp;</td>
        <td height="40" valign="middle">&nbsp;</td>
        <td height="40" valign="middle">&nbsp;</td>
        <td height="40" valign="middle">&nbsp;</td>
      </tr>
      <tr>
        <td width="2%" height="60" valign="middle">&nbsp;</td>
        <td width="53%" height="60" align="center" valign="middle"><input name="txtValor" type="text" class="cuadro_textbox_2" value="" size="60" maxlength="100"  /></td>
        <td width="31%" height="60" valign="middle" class="texto_decorado_azul3">Indique el valor a buscar:<br />N&uacute;merico si es la c&eacute;dula<br />Alafab&eacute;tico si es el Nombre o Apellido</td>
        <td width="5%" height="60" valign="middle">&nbsp;</td>
        <td width="5%" height="60" valign="middle">&nbsp;</td>
        <td width="4%" height="60" valign="middle">&nbsp;</td>
      </tr>
      <tr>
        <td height="20" valign="middle">&nbsp;</td>
        <td height="20" align="center" valign="middle">&nbsp;</td>
        <td height="20" valign="middle">&nbsp;</td>
        <td height="20" valign="middle">&nbsp;</td>
        <td height="20" valign="middle">&nbsp;</td>
        <td height="20" valign="middle">&nbsp;</td>
      </tr>
      <tr>
        <td height="60" valign="middle">&nbsp;</td>
        <td height="60" valign="middle" class="texto_decorado_azul5"><div align="center"><input type="radio" name="btnBuscarPor" value="cedula" />Buscar por C&eacute;dula<br /><br /><br /><br />
        <input type="radio" name="btnBuscarPor" value="nombres" />Buscar por Nombres</div>
        <td height="60" valign="middle" class="texto_decorado_azul3">Para que la B&uacute;squeda tenga resultado, debe indicar la clave por la cual se buscar&aacute; la informaci&oacute;n.<br />Tilde &laquo;Buscar por C&eacute;dula&raquo; si lo que indic&oacute; fue la C&eacute;dula de Identidad o &laquo;Buscar por Nombre&raquo; si fue el Nombre o el Apellido.</td>
        <td height="60" valign="middle">&nbsp;</td>
        <td height="60" valign="middle">&nbsp;</td>
        <td height="60" valign="middle">&nbsp;</td>
      </tr>
      <tr>
        <td height="60" valign="middle">&nbsp;</td>
        <td height="60" align="center" valign="bottom"><input name="btnMeVoyDeAqui" type="submit" class="cuadro_textbox_4" value="Regresar" title="Pulse aqu&iacute; para regresar a la pantalla anterior...!" style="margin-right: 15px;" /><input name="btnBuscalo" type="submit" class="cuadro_textbox_4" value="Buscar" title="Pulse aqu&iacute; para proceder a buscar la informaci&oacute; suministrada...!" /></td>
        <td height="60">&nbsp;</td>
        <td height="60" valign="middle">&nbsp;</td>
        <td height="60" valign="middle">&nbsp;</td>
        <td height="60" valign="middle">&nbsp;</td>
      </tr>
      <tr>
        <td height="20" valign="middle">&nbsp;</td>
        <td height="20" valign="middle">&nbsp;</td>
        <td height="20" valign="middle">&nbsp;</td>
        <td height="20" valign="middle">&nbsp;</td>
        <td height="20" valign="middle">&nbsp;</td>
        <td height="20" valign="middle">&nbsp;</td>
      </tr>
    </table>
    </form>
    <!-- InstanceEndEditable --></td>
  </tr>
</table>
</div>
</body>
<!-- InstanceEnd --></html>