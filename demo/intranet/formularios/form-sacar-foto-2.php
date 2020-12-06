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
  <td height="40" align="center" valign="middle"><!-- InstanceBeginEditable name="EditRegion1" --><div align="center">
<form name="FrmSacaFoto" method="post" action="form-sacar-foto-acciona-2.php" enctype="multipart/form-data" >
<br /><br /><a href="form-mostrar-tareas-2.php" title="Pulse aqui para regresar..." target="_self">&laquo;Regresar&raquo;</a><br /><br />
  <table width="65%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td height="40" class="GrisMedioGrande">Por Favor Seleccione el archivo:</td>
    </tr>
    <tr>
      <td height="40"><input name="file" type="file" title="Seleccione el archivo a cargar..." class="GrisMedioGrande" id="file" size="70"  /></td>
    </tr>
    <tr>
      <td height="40" class="GrisMGrandeCAltura">
      <br />Tenga en cuenta al generar el archivo que:...<br />
      <ul>
      <li>El archivo debe ser de texto plano y mejor a&uacute;n si es del tipo &ldquo;.csv&rdquo;</li>
      <li>Los campos pueden estar separados por coma &ldquo;,&rdquo; &oacute; punto y coma &quot;;&quot;</li>
      <li>No coloque caracteres de marca entre los valores de los campos, como por ejemplo las comillas simples (') &oacute; dobles (")</li>
      <li>La primera l&iacute;nea debe contener los r&oacute;tulos de los campos respectivos</li>
      <li>La columna que corresponde a la c&eacute;dula, rot&uacute;lela como &ldquo;CEDULA&rdquo;&nbsp;&oacute;&nbsp;&ldquo;cedula&rdquo;</li>
      <li>No se exceda de los 2 Mb. por archivo</li>
      <li>Incluya un registro por linea</li>
      <li>Recuerde que lo que interesa es la c&eacute;dula, lo dem&aacute;s esta de sobra</li>
      </ul>
      </td>
    </tr>
    <tr>
      <td align="center"><br /><br /><input name="btnUpload" type="submit" class="GradeGris" title="Pulse aqui cuando este listo para enviar el archivo..." value="Enviar"  /><br /><br /></td>
    </tr>
    </table>
</form>
</div><!-- InstanceEndEditable --></td>
  </tr>
</table>
</div>
</body>
<!-- InstanceEnd --></html>