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
		EdeU($uusuario,$ucuenta,$uid,$uinicio);
		require_once('../funciones/valida-funciones_inv_xxxxxxxx.php');
	  ?>
      <form name="frmInv" method="post" action="form-inventario-direcciona-2.php">
	  <table width="100%" border="0" cellspacing="0" cellpadding="0">
	    <tr>
	      <td height="40" colspan="3" class="gradiente_gris1"><span class="texto_decorado_blanco_amarillo">Inventario</span></td>
	    </tr>
	    <tr>
	      <td height="20" colspan="3">&nbsp;</td>
	    </tr>
	    <tr>
	      <td height="40" colspan="3" class="texto_decorado_azul5B">COMPONENTE / PIEZA / PARTE</td>
	    </tr>
	    <tr>
	      <td width="40%" height="40">
          <div align="right" class="texto_decorado_agua_marina" style="margin-right: 7px; line-height: 20px;">
          Invcentario UC
          </div>
          </td>
	      <td width="40%" height="40" align="left">
          <input name="txtInvUC" type="text" class="cuadro_textbox_5" title="Inventario UC..." size="12" maxlength="6"  />
          </td>
	      <td width="10%" height="40">&nbsp;</td>
	    </tr>
	    <tr>
	      <td width="40%" height="40">
          <div align="right" class="texto_decorado_agua_marina" style="margin-right: 7px; line-height: 20px;">
          Serial
          </div>
          </td>
	      <td width="40%" height="40" align="left">
          <input name="txtSerial" type="text" class="cuadro_textbox_5" title="Serial de la Pieza..." size="30" maxlength="25"  />
          </td>
	      <td width="10%" height="40">&nbsp;</td>
	    </tr>
	    <tr>
	      <td width="40%" height="40">
          <div align="right" class="texto_decorado_agua_marina" style="margin-right: 7px; line-height: 20px;">
          Modelo
          </div>
          </td>
	      <td width="40%" height="40" align="left">
          <input name="txtModelo" type="text" class="cuadro_textbox_5" title="Modelo de la Pieza..." size="30" maxlength="25"  />
          </td>
	      <td width="10%" height="40">&nbsp;</td>
	    </tr>
	    <tr>
	      <td width="40%" height="40">
          <div align="right" class="texto_decorado_agua_marina" style="margin-right: 7px; line-height: 20px;">
          Marca
          </div>
          </td>
	      <td width="40%" height="40" align="left">
		  <?php echo armselMarca(); ?>
          </td>
	      <td width="10%" height="40">&nbsp;</td>
	    </tr>
	    <tr>
	      <td width="40%" height="40">
          <div align="right" class="texto_decorado_agua_marina" style="margin-right: 7px; line-height: 20px;">
          Descripci&oacute;n
          </div>
          </td>
	      <td width="40%" height="40" align="left">
		  <?php echo armselDescripcio(); ?>
          </td>
	      <td width="10%" height="40">&nbsp;</td>
	    </tr>
	    <tr>
	      <td width="40%" height="40">
          <div align="right" class="texto_decorado_agua_marina" style="margin-right: 7px; line-height: 20px;">
          Condici&oacute;n
          </div>
          </td>
	      <td width="40%" height="40" align="left">
		  <?php echo armselCondicion(); ?>
          </td>
	      <td width="10%" height="40">&nbsp;</td>
	    </tr>
	    <tr>
	      <td width="40%" height="40">
          <div align="right" class="texto_decorado_agua_marina" style="margin-right: 7px; line-height: 20px;">
          Observaci&oacute;n
          </div>
          </td>
	      <td width="40%" height="40" align="left">
          <textarea name="txtObs" class="cuadro_textbox_5" title="Observaci&oacute;n de la Pieza..." rows="4" cols="50"> </textarea>
          </td>
	      <td width="10%" height="135">&nbsp;</td>
	    </tr>
	    <tr>
	      <td height="40" colspan="3" class="texto_decorado_azul5B">ASOCIACI&Oacute;N</td>
	    </tr>
	    <tr>
	      <td width="40%" height="40">
          <div align="right" class="texto_decorado_agua_marina" style="margin-right: 7px; line-height: 20px;">
          Departamento / Unidad
          </div>
          </td>
	      <td width="40%" height="40" align="left">
		  <?php echo armselDepto(); ?>
          </td>
	      <td width="10%" height="40">&nbsp;</td>
	    </tr>
	    <tr>
	      <td width="40%" height="40">
          <div align="right" class="texto_decorado_agua_marina" style="margin-right: 7px; line-height: 20px;">
          Personal / Operador
          </div>
          </td>
	      <td width="40%" height="40" align="left">
		  <?php echo armselUsua(); ?>
          </td>
	      <td width="10%" height="40">&nbsp;</td>
	    </tr>
	    <tr>
	      <td height="40" colspan="3" align="center"><table width="30%" border="0" cellspacing="0" cellpadding="0"><tr>
          <td width="67%" height="50" align="center"><input name="btnAniadir" type="submit" class="glow2" value="Añadir" title="Pulse aqui si desea Añadir este Inventario..." />
          &nbsp;&nbsp;
          <input name="btnOM" type="submit" class="glow2" value="Movimientos" title="Pulse aqui si desea realizar otros movimientos con el Inventario..." />
          <!--&nbsp;&nbsp;
          <input name="btnPRI" type="submit" class="glow2" value="Reporte" title="Pulse aqui si desea generar el Reporte del Inventario..." />--></td>
          <td width="33%" height="50" align="center"><a href="reporte-inventario.php" target="new"><img style="margin-top: 5px; position:" src="../imagenes/boton-reporte.fw.png" width="85" height="33" alt="Reporte(s)" /></a></td></tr></table></td>
	    </tr>
	    </table>
        </form>
  <!-- InstanceEndEditable --></td>
  </tr>
</table>
</div>
</body>
<!-- InstanceEnd --></html>