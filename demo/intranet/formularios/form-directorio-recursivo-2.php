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
<form name="FrmReoFot" method="post" action="form-directorio-recursivo-acciona-2.php" enctype="text/plain" >
<div align="center"><br /><span class="Inportant"><?php echo 'Directorios actualizados al **'.$_GET['ACTUALIZADO'].'**'; ?></span><br /><br />
<table width="60%" border="2" cellspacing="0" cellpadding="0">
  <tr>
    <td width="71%" height="40" align="center" class="barra_t_post">RUTA</td>
    <td width="10%" height="40" align="center" class="barra_t_post">ARCHIVO</td>
    <!--<td width="10%" height="40" align="center">MUESTRA</td>-->
    <td width="9%" height="40" align="center" class="barra_t_post">ACCI&Oacute;N</td>
  </tr>
  <?php volcar(); ?>
</table>
<table width="60%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="100%" height="40" align="center"><a href="form-mostrar-tareas-2.php" title="Pulse aqui para regresar..." target="_body" class="DetalleCeroUno">&laquo;&nbsp;Regresar&nbsp;&raquo;</a></td>
  </tr>
</table>
</div>
</form>
  <!-- InstanceEndEditable --></td>
  </tr>
</table>
</div>
</body>
<!-- InstanceEnd --></html>