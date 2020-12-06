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
      <form name="Form-TPro" method="post" id="Form-TPro" action="form-transcripcion-de-promedios-individuo-elimina-accion-2.php" >
      <?php
		require_once('../funciones/valida-funciones_pnr_datos_y_promocion.php');
		EdeU($uusuario,$ucuenta,$uid,$uinicio);
		$vector = BEenDP($_GET['ID']);
		$individuo = BeIenlaP($_GET['IU']);
		echo '<input type="hidden" name="txtID" value="'.$vector['id_promocion'].'" />';
		echo '<input type="hidden" name="txtIU" value="'.$individuo['id_unico'].'" />';
	  ?>
	  <table width="100%" border="0" cellspacing="0" cellpadding="0">
	    <tr>
	      <td width="2%" height="15">&nbsp;</td>
	      <td width="23%" height="15">&nbsp;</td>
	      <td width="2%" height="15">&nbsp;</td>
	      <td width="34%" height="15">&nbsp;</td>
	      <td width="1%" height="15">&nbsp;</td>
	      <td width="36%" height="15">&nbsp;</td>
	      <td width="2%" height="15">&nbsp;</td>
	      </tr>
	    <tr>
	      <td height="30" colspan="7" align="left" class="gradiente_gris1"><span class="texto_decorado_blanco_amarillo">En cuanto a la Graduaci&oacute;n</span></td>
	      </tr>
	    <tr>
	      <td height="15">&nbsp;</td>
	      <td height="15">&nbsp;</td>
	      <td height="15">&nbsp;</td>
	      <td height="15">&nbsp;</td>
	      <td height="15">&nbsp;</td>
	      <td height="15">&nbsp;</td>
	      <td height="15">&nbsp;</td>
	      </tr>
	    <tr>
	      <td height="35">&nbsp;</td>
	      <td height="35" class="texto_decorado_azul2">T&iacute;tulo</td>
	      <td height="35">&nbsp;</td>
	      <td height="35" align="left" class="texto_decorado_azul5"><?php echo $vector['titulo_nombre']; ?></td>
	      <td height="35">&nbsp;</td>
	      <td height="35" align="center">&nbsp;</td>
	      <td height="35">&nbsp;</td>
	      </tr>
	    <tr>
	      <td height="35">&nbsp;</td>
	      <td height="35" class="texto_decorado_azul2">Fecha de Acto</td>
	      <td height="35">&nbsp;</td>
	      <td height="35" align="left" class="texto_decorado_azul5"><?php echo $vector['fecha_acto']; ?></td>
	      <td height="35">&nbsp;</td>
	      <td height="35" align="center">&nbsp;</td>
	      <td height="35">&nbsp;</td>
	      </tr>
	    <tr>
	      <td height="15">&nbsp;</td>
	      <td height="15">&nbsp;</td>
	      <td height="15">&nbsp;</td>
	      <td height="15">&nbsp;</td>
	      <td height="15">&nbsp;</td>
	      <td height="15">&nbsp;</td>
	      <td height="15">&nbsp;</td>
	      </tr>
	    <tr>
	      <td height="30" colspan="7" align="left" class="gradiente_gris2"><span class="texto_decorado_blanco_amarillo">En cuanto a este Integrante</span></td>
	      </tr>
	    <tr>
	      <td height="15">&nbsp;</td>
	      <td height="15">&nbsp;</td>
	      <td height="15">&nbsp;</td>
	      <td height="15">&nbsp;</td>
	      <td height="15">&nbsp;</td>
	      <td height="15">&nbsp;</td>
	      <td height="15">&nbsp;</td>
	      </tr>
	    <tr>
	      <td height="45">&nbsp;</td>
	      <td height="45" class="texto_decorado_azul1">C&eacute;dula</td>
	      <td height="45">&nbsp;</td>
	      <td height="45" align="left" class="ParaEliminar"><?php echo $individuo['cedula']; ?></td>
	      <td height="45">&nbsp;</td>
	      <td height="45">&nbsp;</td>
	      <td height="45">&nbsp;</td>
	      </tr>
	    <tr>
	      <td height="45">&nbsp;</td>
	      <td height="45" class="texto_decorado_azul1">Nombre Completo</td>
	      <td height="45">&nbsp;</td>
	      <td height="45" align="left" class="ParaEliminar"><?php echo $individuo['nombre_completo']; ?></td>
	      <td height="45">&nbsp;</td>
	      <td height="45">&nbsp;</td>
	      <td height="45">&nbsp;</td>
	      </tr>
	    <tr>
	      <td height="45">&nbsp;</td>
	      <td height="45" class="texto_decorado_azul1">Promedio</td>
	      <td height="45">&nbsp;</td>
	      <td height="45" align="left" class="ParaEliminar"><?php echo $individuo['promedio_individual']; ?></td>
	      <td height="45">&nbsp;</td>
	      <td height="45">&nbsp;</td>
	      <td height="45">&nbsp;</td>
	      </tr>
	    <tr>
	      <td height="45">&nbsp;</td>
	      <td height="45" class="texto_decorado_azul1">Puesto</td>
	      <td height="45">&nbsp;</td>
	      <td height="45" align="left" class="ParaEliminar"><?php echo $individuo['posicion']; ?></td>
	      <td height="45">&nbsp;</td>
	      <td height="45">&nbsp;</td>
	      <td height="45">&nbsp;</td>
	      </tr>
	    <tr>
	      <td height="10">&nbsp;</td>
	      <td height="10">&nbsp;</td>
	      <td height="10">&nbsp;</td>
	      <td height="10">&nbsp;</td>
	      <td height="10">&nbsp;</td>
	      <td height="10">&nbsp;</td>
	      <td height="10">&nbsp;</td>
	      </tr>
	    <tr>
	      <td height="55">&nbsp;</td>
	      <td height="55">&nbsp;</td>
	      <td height="55">&nbsp;</td>
	      <td height="55" align="center">
          <input type="submit" name="btnMeRegreso" id="btnMeRegreso" value="Regresar" class="cuadro_textbox_4" />
          &nbsp;&nbsp;&nbsp;
          <input type="submit" name="btnEliminar" id="btnEliminar" value="Eliminar" title="Click aquí para confirmar que desea Eliminar este registro..." class="cuadro_textbox_4" />
          </td>
	      <td height="55">&nbsp;</td>
	      <td height="55">&nbsp;</td>
	      <td height="55">&nbsp;</td>
	      </tr>
	    </table>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
	    <tr>
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