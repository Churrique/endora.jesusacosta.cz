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
<form name="FrmListDir" method="post" action="form-mostrar-tareas-2.php" enctype="text/plain" >
<div align="center">
<input name="bntRegreso" type="submit" class="glow2" title="Pulse aqui para regresar...!" value="Regresar" /><br /><br />
<table width="60%" border="2" cellspacing="0" cellpadding="0">
  <tr>
    <td height="40" class="texto_decorado_azul4"><div align="center">ARCHIVO(S) GENERADO(S)</div></td>
  </tr>
  <tr>
    <td height="40" align="center">
    <?php
	  $ruta = '../downloads';
	  if (is_dir($ruta)) {
		if ($dh = opendir($ruta)) {
		   while (($el_archivo = readdir($dh)) !== false) {
			   if ( !is_dir($el_archivo) ) {
				   //echo '**'.$_GET['txtArchDes'].'**';
				   echo "&laquo; $el_archivo &raquo;&nbsp;";
//				   if ( $_POST['txtArchDes'] == $el_archivo ) {
//					   echo '&larr;&nbsp;Este fue el que Ud. gener&oacute;<br />';
//				   }
				   echo '<a href="' . 'form-directorio-recursivo-descarga-2.php?file=' . $el_archivo . '" target="_blank">Descargar archivo SQL</a><br />';
			   }
		   }
		closedir($dh);
		}
		else {
			echo 'No se pudo abrir el directorio';
		}
	  }
	  else {
		 echo "El directorio no es v&aacute;lido<br>";
	  }
	?>
    </td>
  </tr>
</table>
<br /><input name="bntRegreso" type="submit" class="glow2" title="Pulse aqui para regresar...!" value="Regresar" /><br />
</div>
</form>
  <!-- InstanceEndEditable --></td>
  </tr>
</table>
</div>
</body>
<!-- InstanceEnd --></html>