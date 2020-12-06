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
		$vector = MFUsuario('','CcIDU','','','','',NULL,$_GET['ID']);
	  ?>
      </div>
      <br />
      <form name="FrmAdmUsuMod" id="FrmAdmUsuMod" method="post" action="form-administrar-usuarios-modifica-redirecciona-2.php">
      <?php echo '<input type="hidden" name="txtID" value="'.$vector['idusuarios'].'"  />'; ?>
	  <table width="100%" border="0" cellspacing="0" cellpadding="0">
	    <tr>
	      <td width="4%" height="55">&nbsp;</td>
	      <td width="25%" height="55" align="right" class="texto_decorado_azul1">Login:</td>
	      <td width="1%" height="55">&nbsp;</td>
	      <td width="27%" height="55" align="left">
          <?php
		  echo '<input type="text" name="txtLogin" id="txtLogin" size="20" maxlength="20" value="'.$vector['login_usuario'].'" class="cuadro_textbox_4" title="Escriba el Login para el Usuario...!" />';
          ?>
          <!--<input type="text" name="txtLogin" id="txtLogin" size="20" maxlength="20" value="" class="cuadro_textbox_4" title="Escriba el Login para el Usuario...!" />-->
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
          <?php
		  echo '<input type="password" name="txtPass" id="txtPass" size="20" maxlength="20" value="" class="cuadro_textbox_4" title="Escriba la Contrase&ntilde;a para el Usuario...!" />';
          ?>
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
          <?php
		  echo '<input type="text" name="txtNombre" id="txtNombre" size="30" maxlength="100" value="'.$vector['nombre_usuario'].'" class="cuadro_textbox_4" title="Escriba el Nombre para el Usuario...!" />';
          ?>
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
          <?php
		  echo '<input type="text" name="txtEstatus" id="txtEstatus" size="2" maxlength="1" value="'.$vector['cuenta_usuario'].'" class="cuadro_textbox_4" title="Escriba el Estatus para el Usuario...!" />';
          ?>
          </td>
	      <td height="55">&nbsp;</td>
	      <td height="55" class="texto_decorado_azul3">A : Activa<br />D : Desabilitada<br />L : Limitada</td>
	      <td height="55">&nbsp;</td>
	      </tr>
	    <tr>
	      <td height="55" colspan="4" align="center">
          <input type="submit" name="btnModifica" id="btnModifica" value="Si" class="cuadro_textbox_4" title="Pulse aqui para Modificar los datos de este Usuario...!"  />
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input type="submit" name="btnNoMod" id="btnNoMod" value="No" class="cuadro_textbox_4" title="Pulse aqui para NO MODIFICAR los datos de este Usuario...!"  />
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input type="reset" name="btnBorrar" id="btnBorrar" value="Borrar" class="cuadro_textbox_4" title="Pulse aqui para Borrar los datos que estan escrito en las casillas de texto...!"  />
	        </td>
	      <td height="55">&nbsp;</td>
	      <td height="55"><input name="btnRegreso" type="submit" class="glow2" title="Pulse aqu&iacute; para regresar a la pantalla anterior..." value="Regresar"  />
          </td>
	      <td height="55">&nbsp;</td>
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
	      <td height="30" colspan="7" align="center" valign="middle"><?php MlTcOaE('Intranet',$vector['idusuarios']); ?></td>
        </tr>
	    <tr>
	      <td height="25" colspan="7">&nbsp;</td>
	      </tr>
	    <tr>
	      <td height="30" colspan="7" align="left" class="gradiente_gris2"><span class="texto_decorado_blanco_amarillo">Tareas/Procesos que se pueden Agregar</span></td>
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
	      <td height="30" colspan="7" align="center"><?php TFxUs('Intranet',$vector['idusuarios']); ?></td>
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