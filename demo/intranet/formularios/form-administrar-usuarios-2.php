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
		//if ( isset($_POST['btnAdicionar']) ) echo MFUsuario('','I',$_POST['txtLogin'],$_POST['txtPass'],$_POST['txtNombre'],$_POST['txtEstatus'],$_POST['txtVector']);
//		if ( isset($_POST['btnAdicionar']) ) echo MFUsuario('','I',$_POST['txtLogin'],$_POST['txtPass'],$_POST['txtNombre'],$_POST['lstEstatus'],$_POST['txtVector']);
	  ?>
      </div>
      <br />
      <form name="FrmAdmUsu" id="FrmAdmUsu" method="post" action="form-administrar-usuarios-2.php">
	  <table width="100%" border="0" cellspacing="0" cellpadding="0">
	    <tr>
	      <td width="4%" height="55">&nbsp;</td>
	      <td width="25%" height="55" align="right" class="texto_decorado_azul1">Login:</td>
	      <td width="1%" height="55">&nbsp;</td>
	      <td width="27%" height="55" align="left">
          <input type="text" name="txtLogin" id="txtLogin" size="20" maxlength="20" class="cuadro_textbox_4" title="Escriba el Login para el Usuario...!" />
          </td>
	      <td width="1%" height="55">&nbsp;</td>
	      <td width="39%" height="55">&nbsp;</td>
	      <td width="3%" height="55">&nbsp;</td>
	      </tr>
	    <tr>
	      <td height="55">&nbsp;</td>
	      <td height="55" align="right" class="texto_decorado_azul1">Pass:</td>
	      <td height="55">&nbsp;</td>
	      <td height="55" align="left">
          <input type="password" name="txtPass" id="txtPass" size="20" maxlength="20" class="cuadro_textbox_4" title="Escriba la Contrase&ntilde;a para el Usuario...!" />
          </td>
	      <td height="55">&nbsp;</td>
	      <td height="55">&nbsp;</td>
	      <td height="55">&nbsp;</td>
	      </tr>
	    <tr>
	      <td height="55">&nbsp;</td>
	      <td height="55" align="right" class="texto_decorado_azul1">Nombre:</td>
	      <td height="55">&nbsp;</td>
	      <td height="55" align="left">
          <input type="text" name="txtNombre" id="txtNombre" size="30" maxlength="100" class="cuadro_textbox_4" title="Escriba el Nombre para el Usuario...!" />
          </td>
	      <td height="55">&nbsp;</td>
	      <td height="55">&nbsp;</td>
	      <td height="55">&nbsp;</td>
	      </tr>
	    <tr>
	      <td height="55">&nbsp;</td>
	      <td height="55" align="right" class="texto_decorado_azul1">Estatus de Cuenta:</td>
	      <td height="55">&nbsp;</td>
	      <td height="55" align="left">
          <!--<input type="text" name="txtEstatus" id="txtEstatus" size="2" maxlength="1" class="cuadro_textbox_4" title="Escriba el Estatus para el Usuario...!" />
          <br />-->
          <select name="lstEstatus" class="cuadro_textbox_4">
          <option value=" ">Indique</option>
          <option value="A">Activa</option>
          <option value="D">Desabilitada</option>
          <option value="L">Limitada</option>
          </select>
          </td>
	      <td height="55">&nbsp;</td>
	      <td height="55">&nbsp;</td>
	      <td height="55">&nbsp;</td>
	      </tr>
	    <tr>
	      <td height="55">&nbsp;</td>
	      <td height="55" align="right">
          <input type="reset" name="btnBorrar" id="btnBorrar" value="Borrar" class="cuadro_textbox_4" title="Pulse aqui para Borrar los datos en todas las casillas de texto...!"  />
          </td>
	      <td height="55">&nbsp;</td>
	      <td height="55" align="center">
          <input type="submit" name="btnAdicionar" id="btnAdicionar" value="Adicionar" class="cuadro_textbox_4" title="Pulse aqui para adicionar este Usuario...!"  />
          </td>
	      <td height="55">&nbsp;</td>
	      <td height="55"><div class="texto_decorado_azul3">
          <?php
		  	if ( isset($_POST['btnAdicionar']) ) echo MFUsuario('Intranet','I',$_POST['txtLogin'],$_POST['txtPass'],$_POST['txtNombre'],$_POST['lstEstatus'],$_POST['txtVector']);
		  ?>
          </div></td>
	      <td height="55">&nbsp;</td>
	      </tr>
	    <tr>
	      <td height="25" colspan="7">&nbsp;</td>
	      </tr>
	    <tr>
	      <td height="30" colspan="7" align="left" class="gradiente_gris1"><span class="texto_decorado_blanco_amarillo">Posibles Procesos</span></td>
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
	      <td height="30" colspan="7" align="center" valign="middle"><?php CGTcFD(); ?></td>
        </tr>
	    <tr>
	      <td height="25" colspan="7">&nbsp;</td>
	      </tr>
	    <tr>
	      <td height="30" colspan="7" align="left" class="gradiente_gris2"><span class="texto_decorado_blanco_amarillo">Usuarios Registrados</span></td>
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
	      <td height="30" colspan="7" align="center"><?php MFUsuario('Intranet','CGcFD'); ?></td>
	      </tr>
	    <tr>
	      <td height="30">&nbsp;</td>
	      <td height="30">&nbsp;</td>
	      <td height="30">&nbsp;</td>
	      <td height="30">&nbsp;</td>
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