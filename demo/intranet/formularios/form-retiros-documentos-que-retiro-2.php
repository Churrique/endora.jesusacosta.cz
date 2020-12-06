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
    require_once('../funciones/valida-funciones_a_retirados.php');
    ?>
  <form name="FrmRetQueMost" method="post" action="form-retiros-documentos-que-retiro-acciona-2.php" >
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="40">&nbsp;</td>
      </tr>
      <tr>
        <td height="40" class="gradiente_gris1"><span class="texto_decorado_blanco_amarillo">Documentos que se Procesaron en este Retiro (solamente Ver)</span></td>
      </tr>
      <tr>
        <td height="40" align="center" valign="middle"><div style="font-weight: bold; text-align: center; background-color: #FFFFFF; color: #1682E0; font-size: 21.0px; line-height: 24px; text-shadow: 2.0px 2.0px 2.0px rgba(51, 51, 51, 0.6); margin: 20px 0px 20px 0px">Detalle de Documentos</div><div style="border:solid 3px #bcdbf5;-moz-border-radius: 22px;-webkit-border-radius: 22px;border-radius: 22px;margin: 9px 12px 9px 12px;"><table width="90%" border="0" cellpadding="0" cellspacing="0" >
          <tr><td height="30" align="center" valign="middle"><div style="margin: 20px 0px 20px 0px;">
		  <?php
			$elretiro = Gepmr($_GET['ci'],$_GET['id']);
			if (is_bool($elretiro)) echo 'No hay informaci&oacute;n que mostrar...';
		  ?>
          </div></td></tr></table></div></td>
      </tr>
      <tr>
        <td height="40" align="center" valign="middle"><div style="font-weight: bold; text-align: center; background-color: #FFFFFF; color: #1682E0; font-size: 21.0px; line-height: 24px; text-shadow: 2.0px 2.0px 2.0px rgba(51, 51, 51, 0.6); margin: 20px 0px 20px 0px">Informaci&oacute;n Base</div><div style="border:solid 3px #bcdbf5;-moz-border-radius: 22px;-webkit-border-radius: 22px;border-radius: 22px;margin: 9px 12px 9px 12px;"><table width="95%" border="0" cellpadding="0" cellspacing="0" >
          <tr>
            <td width="9%" height="30" align="right" valign="middle"><div style="font-weight: normal; text-align: right; background-color: #FFFFFF; color: #1682E0; font-size: 11px; line-height: 10px; text-shadow: 2px 2px 2px rgba(51, 51, 51, 0.6);">C&eacute;dula</div></td>
            <td width="38%" height="30" valign="middle"><div style="font-weight: normal; text-align:left; margin: 0px 5px 0px 5px; background-color: #FFFFFF; color: #5912FF; font-size: 12px; line-height: 10px; text-shadow: 2px 2px 2px rgba(51, 51, 51, 0.6);"><?php echo $elretiro['aci'];?></div></td>
            <td width="15%" height="30" align="right" valign="middle"><div style="font-weight: normal; text-align: right; background-color: #FFFFFF; color: #1682E0; font-size: 11px; line-height: 10px; text-shadow: 2px 2px 2px rgba(51, 51, 51, 0.6);">Apellido(s), Nombre(s)</div></td>
            <td width="38%" height="30" valign="middle"><div style="font-weight: normal; text-align:left; margin: 0px 5px 0px 5px; background-color: #FFFFFF; color: #5912FF; font-size: 12px; line-height: 10px; text-shadow: 2px 2px 2px rgba(51, 51, 51, 0.6);"><?php echo $elretiro['primerapellido'].' '.$elretiro['segundoapellido'].', '.$elretiro['primernombre'].' '.$elretiro['segundonombre'];?></div></td>
          </tr>
          <tr>
            <td height="30" align="right" valign="middle"><div style="font-weight: normal; text-align: right; background-color: #FFFFFF; color: #1682E0; font-size: 11px; line-height: 10px; text-shadow: 2px 2px 2px rgba(51, 51, 51, 0.6);">Facultad</div></td>
            <td height="30" valign="middle"><div style="font-weight: normal; text-align:left; margin: 0px 5px 0px 5px; background-color: #FFFFFF; color: #5912FF; font-size: 12px; line-height: 10px; text-shadow: 2px 2px 2px rgba(51, 51, 51, 0.6);"><?php echo $elretiro['nombre_de_facultad'];?></div></td>
            <td height="30" align="right" valign="middle"><div style="font-weight: normal; text-align: right; background-color: #FFFFFF; color: #1682E0; font-size: 11px; line-height: 10px; text-shadow: 2px 2px 2px rgba(51, 51, 51, 0.6);">Escuela</div></td>
            <td height="30" valign="middle"><div style="font-weight: normal; text-align:left; margin: 0px 5px 0px 5px; background-color: #FFFFFF; color: #5912FF; font-size: 12px; line-height: 10px; text-shadow: 2px 2px 2px rgba(51, 51, 51, 0.6);"><?php echo $elretiro['aescuela'].' | '.$elretiro['nombre_de_escuela'];?></div></td>
          </tr>
          <tr>
            <td height="30" align="right" valign="middle"><div style="font-weight: normal; text-align: right; background-color: #FFFFFF; color: #1682E0; font-size: 11px; line-height: 10px; text-shadow: 2px 2px 2px rgba(51, 51, 51, 0.6);">Menci&oacute;n</div></td>
            <td height="30" valign="middle"><div style="font-weight: normal; text-align:left; margin: 0px 5px 0px 5px; background-color: #FFFFFF; color: #5912FF; font-size: 12px; line-height: 10px; text-shadow: 2px 2px 2px rgba(51, 51, 51, 0.6);"><?php echo $elretiro['amencion'].' | '.$elretiro['nombre_de_mencion'];?></div></td>
            <td height="30" align="right" valign="middle"><div style="font-weight: normal; text-align: right; background-color: #FFFFFF; color: #1682E0; font-size: 11px; line-height: 10px; text-shadow: 2px 2px 2px rgba(51, 51, 51, 0.6);">Fecha de Retiro</div></td>
            <td height="30" valign="middle"><div style="font-weight: normal; text-align:left; margin: 0px 5px 0px 5px; background-color: #FFFFFF; color: #5912FF; font-size: 12px; line-height: 10px; text-shadow: 2px 2px 2px rgba(51, 51, 51, 0.6);"><?php echo $elretiro['fecha_del_retiro'];?></div></td>
          </tr>
          <tr>
            <td height="30" align="right" valign="middle"><div style="font-weight: normal; text-align: right; background-color: #FFFFFF; color: #1682E0; font-size: 11px; line-height: 10px; text-shadow: 2px 2px 2px rgba(51, 51, 51, 0.6);">Activo</div></td>
            <td height="30" valign="middle"><div style="font-weight: normal; text-align:left; margin: 0px 5px 0px 5px; background-color: #FFFFFF; color: #5912FF; font-size: 12px; line-height: 10px; text-shadow: 2px 2px 2px rgba(51, 51, 51, 0.6);"><?php echo $elretiro['aactivo'].' | '.$elretiro['descripcion_del_activo'];?></div></td>
            <td height="30" align="right" valign="middle"><div style="font-weight: normal; text-align: right; background-color: #FFFFFF; color: #1682E0; font-size: 11px; line-height: 10px; text-shadow: 2px 2px 2px rgba(51, 51, 51, 0.6);">Pasivo</div></td>
            <td height="30" valign="middle"><div style="font-weight: normal; text-align:left; margin: 0px 5px 0px 5px; background-color: #FFFFFF; color: #5912FF; font-size: 12px; line-height: 10px; text-shadow: 2px 2px 2px rgba(51, 51, 51, 0.6);"><?php echo $elretiro['apasivo'].' | '.$elretiro['descripcion_del_pasivo'];?></div></td>
          </tr>
          <tr>
            <td height="30" align="right" valign="middle"><div style="font-weight: normal; text-align: right; background-color: #FFFFFF; color: #1682E0; font-size: 11px; line-height: 10px; text-shadow: 2px 2px 2px rgba(51, 51, 51, 0.6);">Observaci&oacute;n</div></td>
            <td height="30" valign="middle"><div style="font-weight: normal; text-align:left; margin: 0px 5px 0px 5px; background-color: #FFFFFF; color: #5912FF; font-size: 12px; line-height: 10px; text-shadow: 2px 2px 2px rgba(51, 51, 51, 0.6);"><?php echo $elretiro['observacion_del_retiro'];?></div></td>
            <td height="30" align="right" valign="middle">&nbsp;</td>
            <td height="30" valign="middle"><?php
			echo '<input type="hidden" name="txtPantDeOrig" value="'.$_GET['pantalla'].'" />';
			echo '<input type="hidden" name="txtACI" value="'.$elretiro['aci'].'" />';
			?></td>
          </tr>
        </table></div></td>
      </tr>
      <tr>
        <td height="40" align="center" valign="middle"><input name="btnRegresar" type="submit" class="glow2" title="Pulse aqui para Regresar a la pantalla anterior..." value="Regresar"  /></td>
      </tr>
    </table>
  </form>
  <!-- InstanceEndEditable --></td>
  </tr>
</table>
</div>
</body>
<!-- InstanceEnd --></html>