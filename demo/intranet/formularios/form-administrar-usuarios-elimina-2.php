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
      <div class="texto_decorado_azul3">
      <?php
		EdeU($uusuario,$ucuenta,$uid,$uinicio);
		$vector = MFUsuario('Intranet','CcIDU','','','','',NULL,$_GET['ID']);
	  ?>
      </div>
      <br />
      <form name="FrmAdmUsuEli" id="FrmAdmUsuEli" method="post" action="form-administrar-usuarios-elimina-accion-2.php">
      <?php echo '<input type="hidden" name="txtID_U" value="'.$_GET['ID'].'" />'; ?>
	  <table width="100%" border="0" cellspacing="0" cellpadding="0">
	    <tr>
	      <td width="4%" height="55">&nbsp;</td>
	      <td width="25%" height="55" align="right" class="texto_decorado_azul1">Login:</td>
	      <td width="1%" height="55">&nbsp;</td>
	      <td width="27%" height="55" class="texto_decorado_azul4"><?php echo $vector['login_usuario']; ?></td>
	      <td width="1%" height="55">&nbsp;</td>
	      <td width="39%" height="55">&nbsp;</td>
	      <td width="3%" height="55">&nbsp;</td>
	      </tr>
	    <tr>
	      <td height="55">&nbsp;</td>
	      <td height="55" align="right" class="texto_decorado_azul1">Nombre:</td>
	      <td height="55">&nbsp;</td>
	      <td height="55" class="texto_decorado_azul4"><?php echo $vector['nombre_usuario']; ?></td>
	      <td height="55">&nbsp;</td>
	      <td height="55">&nbsp;</td>
	      <td height="55">&nbsp;</td>
	      </tr>
	    <tr>
	      <td height="55">&nbsp;</td>
	      <td height="55" align="right" class="texto_decorado_azul1">Estatus de Cuenta:</td>
	      <td height="55">&nbsp;</td>
	      <td height="55" class="texto_decorado_azul4"><?php echo $vector['cuenta_usuario']; ?></td>
	      <td height="55">&nbsp;</td>
	      <td height="55" class="texto_decorado_azul3">A : Activa<br />
	        D : Desabilitada<br />L : Limitada</td>
	      <td height="55">&nbsp;</td>
	      </tr>
	    <tr>
	      <td height="70" colspan="7" align="center">
	        <input type="submit" name="btnEliminar" id="btnEliminar" value="Si" class="cuadro_textbox_4" title="Pulse aqui para Eliminar este Usuario...!"  />
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="submit" name="btnNo" id="btnNo" value="No" class="cuadro_textbox_4" title="Pulse aqui para NO Eliminar este Usuario...!"  />
          </td>
        </tr>
	    <tr>
	      <td height="25" colspan="7">&nbsp;</td>
        </tr>
	    <tr>
	      <td height="30" colspan="7" align="left" class="gradiente_gris1"><span class="texto_decorado_blanco_amarillo">Tareas/Procesos Registrados</span></td>
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
	      <td height="30" colspan="7" align="center" valign="middle"><?php MlasT($vector['login_usuario'],'Intranet'); ?></td>
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
	    </table>
      </form>
<!-- InstanceEndEditable --></td>
  </tr>
</table>
</div>
</body>
<!-- InstanceEnd --></html>