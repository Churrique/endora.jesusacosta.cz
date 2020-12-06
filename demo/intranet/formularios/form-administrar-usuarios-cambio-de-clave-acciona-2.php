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
  <form name="FrmCamb2Clav" method="post" action="form-mostrar-tareas-2.php" >
  <table width="90%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="30">&nbsp;</td>
  </tr>
  <tr>
    <td height="40" class="gradiente_gris1"><span class="texto_decorado_blanco_amarillo">Cambio de Clave</span></td>
  </tr>
  <tr>
    <td height="30" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td height="50" align="center"><div style="border:solid 3px #bcdbf5;-moz-border-radius: 22px;-webkit-border-radius: 22px;border-radius: 22px;margin: 9px 12px 9px 12px;"><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td height="50" align="center"><div style="font-weight: normal; text-align:center; background-color: #FFFFFF; color: #1682E0; font-size: 14px; line-height: 25px; text-shadow: 2px 2px 2px rgba(51, 51, 51, 0.6); margin: 5px 5px 5px 5px;">&nbsp;
	<?php
	  if ( isset($_POST['btnRegreso']) ) {
		  header('Location: form-mostrar-tareas-2.php');
		  exit;
	  }
	  if ( isset($_POST['btnCambiaPass']) ) {
		  $char_valid = "abcdefghijklmnñopqrstuwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ0123456789-_*#()[]{}.";
		  $el_pass = '';
		  $pass_ok = true;
		  $char_ok = true;
		  for ( $k = 0; $k < strlen($_POST['txt1Pass']); $k++ ) {
			  if ( $pass_ok ) {
				  if ( substr($_POST['txt1Pass'], $k, 1) == substr($_POST['txt2Pass'], $k, 1) ) {
					  $el_pass += substr($_POST['txt1Pass'], $k, 1);
					  for ( $m = 0; $m < strlen($char_valid); $m++) {
						  if ( $char_valid ) {
							  if ( substr($_POST['txt1Pass'], $k, 1) == substr($char_valid, $m, 1) ) {
								  $char_valid = false;
							  }
						  }
					  }
				  }
				  else {
					  $pass_ok = false;
				  }
			  }
		  }
//MFUsuario($p_area='Internet',$p_accion='CG',$p_usuario='',$p_contrasena='',$p_nombre='',$p_estatus='',$p_vector_procesos=NULL,$p_id_usuario=0)
		  if ( $pass_ok && $char_ok) {
			  echo MFUsuario('Intranet','U-PASS',$_POST['txtUSER'],$_POST['txt1Pass']);
			  echo '<br />El cambio de contrase&ntilde;a fue satisfactorio...<br />';
		  }
		  else {
			  if ( !$pass_ok ) {
				  echo '<br />Las contrase&ntilde;as no concuerdan...<br />';
			  }
			  if ( !$char_ok ) {
				  echo '<br />Utiliz&oacute; uno o varios caracteres no v&aacute;lido...<br />';
			  }
		  }
	  }
	?>
    &nbsp;</div></td></tr></table></div></td>
  </tr>
  <tr>
    <td height="30" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td height="60" align="center" valign="middle"><input name="btnContinuar" type="submit" class="glow2" title="Pulse aqu&iacute; para Continuar.." value="Continuar" /></td>
  </tr>
</table>
  </form>
  <!-- InstanceEndEditable --></td>
  </tr>
</table>
</div>
</body>
<!-- InstanceEnd --></html>