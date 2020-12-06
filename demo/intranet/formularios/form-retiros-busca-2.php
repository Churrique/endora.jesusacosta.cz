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
  <form name="frmBusRet" method="post" action="form-retiros-busca-acciona-2.php" >
  <table width="100%" border="0" cellspacing="0" cellpadding="0" summary="Consignaci&oacute;n de Retiros en la Universidad de Carabobo">
    <tr>
      <td height="10">&nbsp;</td>
      <td height="10">&nbsp;</td>
      <td height="10">&nbsp;</td>
      </tr>
    <tr>
      <td height="40" colspan="3" class="gradiente_gris2"><span class="texto_decorado_blanco_amarillo">Retiros</span></td>
      </tr>
    <tr>
      <td height="40" colspan="3">&nbsp;</td>
      </tr>
    <tr>
      <td width="21%" height="67"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">C&eacute;dula</div></td>
      <td width="38%" height="67" align="left"><input type="text" name="txtBuscaCI" size="10" maxlength="8" class="cuadro_textbox_5" title="Indique la C&eacute;dula a buscar..."  /></td>
      <td width="41%" rowspan="2" align="left" valign="middle"><div align="center"><input name="btnBusCI" type="submit" class="glow2" title="Pulse aqu&iacute; para buscar esta C&eacute;dula, Nombre y/o Apellido..." value="Buscar"  />&nbsp;<input name="btnRegresame" type="submit" class="glow2" title="Pulse aqu&iacute; para regresar a la pantalla anterior..." value="Regresar"  /></div></td>
      </tr>
    <tr>
      <td height="40"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Nombre y/o Apellido</div></td>
      <td height="40"><input type="text" name="txtBusKNomApe" size="50" maxlength="25" class="cuadro_textbox_5" title="Indique el Nombre y/o Apellido a buscar..."  /></td>
      </tr>
    <tr>
      <td height="155" colspan="2" align="center" valign="middle" class="texto_decorado_agua_marina"><?php echo $_GET['mensaje']; ?></td>
      <td height="155"><table width="98%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="37%" height="40" align="center" valign="middle" bgcolor="#FFFFCC"><input name="btnListar" type="submit" class="glow2" title="Pulse aqu&iacute; para Listar todos los Retiros..." value="Listar Todo"  /></td>
            <td width="63%" height="40" align="center" valign="middle" bgcolor="#FFFFCC" class="footer_rojo">Puede posteriormente exportarlos...!</td>
              </tr>
        <tr>
          <td height="40" align="center" valign="middle"><input name="btnExportar" type="submit" class="glow2" title="Pulse aqu&iacute; para Exportar Retiros..." value="Exportar"  /></td>
          <td height="40" align="center" valign="middle" class="footer_rojo">Cuenta con opciones de filtrado previo para exportar...!</td>
          </tr>
        <tr>
          <td height="40" align="center" valign="middle" bgcolor="#FFFFCC"><input name="btnDiario" type="submit" class="glow2" title="Pulse aqu&iacute; para Consultar las Transcripciones de los Retiros por día(s)..." value="Transcripciones"  /></td>
          <td height="40" align="center" valign="middle" bgcolor="#FFFFCC" class="footer_rojo">Cuenta con opciones de filtrado previo para la Consulta, adem&aacute;s cuenta con la posibilidad de exportar...!</td>
          </tr>
        <tr>
          <td height="40" align="center" valign="middle"><input name="btnXTaqui" type="submit" class="glow2" title="Pulse aqu&iacute; para Consultar por m&eacute;todo abreviado o resumido de los Retiros..." value="B&uacute;squeda Resumida"  /></td>
          <td height="40" align="center" valign="middle" class="footer_rojo">Para buscar y realizar un Retiro por m&eacute;todo abreviado, cuenta con menos campos que transcribir...!</td>
          </tr>
  </table></td>
    </tr>
    </table></form>
  <!-- InstanceEndEditable --></td>
  </tr>
</table>
</div>
</body>
<!-- InstanceEnd --></html>