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
  <form name="FrmDiploma2" method="post" action="form-mostrar-tareas-2.php">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="30">&nbsp;</td>
      </tr>
      <tr>
        <td height="40" colspan="3" class="gradiente_gris1"><span class="texto_decorado_blanco_amarillo">Diplomas</span></td>
      </tr>
      <tr>
        <td height="30">&nbsp;</td>
      </tr>
      <tr>
        <td height="421" align="center" valign="middle"><table width="98%" border="0" cellspacing="0" cellpadding="0">
        <tr>
        <td align="center" valign="middle" bgcolor="#F3F7F8"><a href="form-diplomas-graduado-con-honores-2.php" target="_body"><img src="../imagenes/graduado-con-honores-argorgot.fw.png" width="400" height="118" alt="graduado_con_honores" /></a></td>
        </tr>
        <tr>
        <td height="166" align="center" valign="middle" bgcolor="#F3F7F8"><a href="form-diplomas-alejo-zuloaga-2.php" target="_body"><img src="../imagenes/Alejo-Zuloaga-argorgot.fw.png" width="363" height="157" alt="alejo_zuloaga" /></a></td>
        </tr>
        <tr>
        <td align="center" valign="middle" bgcolor="#F3F7F8"><a href="form-diplomas-braulio-salazar-2.php" target="_body"><img src="../imagenes/braulio-salazar-argorgot.fw.png" width="350" height="120" alt="braulio_salazar" /></a></td>
        </tr>
        </table></td>
      </tr>
      <tr>
        <td height="50" align="center" valign="bottom"><input name="btnRegresar" type="submit" class="glow2" title="Pulse aquí para Regresar a la pantalla principal..." value="Regresar" /></td>
      </tr>
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