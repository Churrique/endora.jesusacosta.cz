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
  <?php
  require_once('../funciones/valida-funciones_ant_promedios.php');
  ?>
  <form name="FrmConProAnt" method="post" action="form-promedios-anteriores-consulta-acciona-2.php">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="26%" height="15">&nbsp;</td>
        <td width="45%" height="15">&nbsp;</td>
        <td width="10%" height="15">&nbsp;</td>
        <td width="9%" height="15">&nbsp;</td>
        <td width="10%" height="15">&nbsp;</td>
      </tr>
      <tr>
        <td height="30" colspan="5" class="gradiente_gris2"><span class="texto_decorado_blanco_amarillo">Consulta de Promedios Anteriores (del SiDICEs)</span></td>
        </tr>
      <tr>
        <td width="26%" height="15">&nbsp;</td>
        <td width="45%" height="15">&nbsp;</td>
        <td width="10%" height="15">&nbsp;</td>
        <td width="9%" height="15">&nbsp;</td>
        <td width="10%" height="15">&nbsp;</td>
      </tr>
      <tr>
        <td height="50"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Por C&eacute;dula</div></td>
        <td height="50"><input name="txtBci" type="text" class="cuadro_textbox_5" title="Indique la C&eacute;dula...!" size="15" maxlength="8" /></td>
        <td rowspan="3" align="center" valign="middle"><input name="btnBuscar" type="submit" class="glow2" title="Pulse aqu&iacute; para Buscar el registro..." value="Buscar"  /></td>
        <td colspan="2" rowspan="3"><div class="txt_pie" style="margin-left: 11px; margin-right: 9px; line-height: 17px; text-align:center;">IMPORTANTE<br />Para &laquo;Buscar&raquo;: Indique solamente un campo a la v&eacute;z, si no encuentra por la C&eacute;dula, intente por Nombre, si no por Apellido...!</div></td>
        </tr>
      <tr>
        <td height="50"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Por Nombre</div></td>
        <td height="50"><input name="txtNomB" type="text" class="cuadro_textbox_5" title="Indique el Nombre...!" size="40" maxlength="100" /></td>
        </tr>
      <tr>
        <td height="50"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Por Apellido</div></td>
        <td height="50"><input name="txtApeB" type="text" class="cuadro_textbox_5" title="Indique el Apellido...!" size="40" maxlength="100" /></td>
        </tr>
      <tr>
        <td height="20">&nbsp;</td>
        <td height="20">&nbsp;</td>
        <td height="20">&nbsp;</td>
        <td height="20">&nbsp;</td>
        <td height="20">&nbsp;</td>
      </tr>
      <tr>
        <td height="80" colspan="2" align="center" valign="middle">
          <table width="62%" border="0" cellspacing="0" cellpadding="0">
          <tr>
          <td width="77%" height="70" align="left" valign="middle" class="texto_decorado_agua_marina">
            <input type="radio" checked="checked" name="rbtOrden" id="botones" value="cedula" /><label for="botones">Ordenado por C&eacute;dula</label><br /><br />
            <input type="radio" name="rbtOrden" id="botones" value="alfabetico"  /><label for="botones">Ordenado por Apellido(s) m&aacute;s Nombre(s)</label>
          </td>
          <td width="23%" height="70" align="center" valign="middle"><input name="btnVerTodo" type="submit" class="glow2" title="Pulse aqu&iacute; para Mostrar todos los registros..." value="Ver Todo"  /></td>
          </tr>
          </table>
        </td>
        <td height="80" colspan="3"><div class="txt_pie" style="margin-left: 11px; margin-right: 9px; line-height: 17px; text-align:center;">IMPORTANTE<br />
        Para &laquo;Ver Todo&raquo;: Indique la ordenaci&oacute;n previa antes de pulsar el bot&oacute;n...!</div></td>
        </tr>
      <tr>
        <td height="20">&nbsp;</td>
        <td height="20">&nbsp;</td>
        <td height="20">&nbsp;</td>
        <td height="20">&nbsp;</td>
        <td height="20">&nbsp;</td>
      </tr>
      <tr>
        <td height="30">&nbsp;</td>
        <td height="30" align="center" valign="middle"><input name="btnRegreso" type="submit" class="glow2" title="Pulse aqu&iacute; para regresar a la pantalla anterior..." value="Regresar"  /></td>
        <td height="30">&nbsp;</td>
        <td height="30">&nbsp;</td>
        <td height="30">&nbsp;</td>
      </tr>
      <tr>
        <td height="20">&nbsp;</td>
        <td height="20">&nbsp;</td>
        <td height="20">&nbsp;</td>
        <td height="20">&nbsp;</td>
        <td height="20">&nbsp;</td>
      </tr>
    </table>
    </form>
  <!-- InstanceEndEditable --></td>
  </tr>
</table>
</div>
</body>
<!-- InstanceEnd --></html>