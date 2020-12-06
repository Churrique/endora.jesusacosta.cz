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
  <form name="FrmPT" method="post" action="form-mostrar-tareas-2.php">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="20%" height="40">&nbsp;</td>
      <td width="41%" height="40">&nbsp;</td>
      <td width="39%" height="40">&nbsp;</td>
      </tr>
    <tr>
      <td height="40" colspan="3" class="gradiente_gris2"><span class="texto_decorado_blanco_amarillo">Movimiento de las Tablas Maestras</span></td>
      </tr>
    <tr>
      <td height="40">&nbsp;</td>
      <td height="40">&nbsp;</td>
      <td height="40">&nbsp;</td>
      </tr>
      <tr>
        <td height="50">&nbsp;</td>
        <td height="50" class="GradeAzul1"><a href="form-maestro-paises-2.php" target="_body">PAISES</a></td>
        <td height="50" class="Inportant">Rutinas b&aacute;sicas para el Maestro de Paises.</td>
      </tr>
      <tr>
        <td height="50">&nbsp;</td>
        <td height="50">&nbsp;</td>
        <td height="50">&nbsp;</td>
      </tr>
      <tr>
        <td height="50" colspan="3" align="center"><input type="submit" class="glow2" title="Pulse aqu&iacute; para regresar a la pantalla anterior..." value="Regresar" /></td>
        </tr>
    </table>
    </form>
    <!-- InstanceEndEditable --></td>
  </tr>
</table>
</div>
</body>
<!-- InstanceEnd --></html>