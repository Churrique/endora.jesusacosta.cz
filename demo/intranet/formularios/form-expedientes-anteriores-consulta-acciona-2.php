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
  <?php
  require_once('../funciones/valida-funciones_ant_expedientes.php');

  if ( isset($_POST['btnRegreso']) ) {
	  header('Location: form-mostrar-tareas-2.php');
	  exit;
  }
  if ( isset($_POST['btnVerTodo']) ) {
	  header('Location: form-expedientes-anteriores-ver-todo-2.php?ORDENACION='.$_POST['rbtOrden']);
	  exit;
  }
  ?>
  <form name="FrmResuDCon" method="post" action="form-expedientes-anteriores-consulta-2.php">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="26%" height="15">&nbsp;</td>
        <td width="48%" height="15">&nbsp;</td>
        <td width="7%" height="15">&nbsp;</td>
        <td width="9%" height="15">&nbsp;</td>
        <td width="10%" height="15">&nbsp;</td>
      </tr>
      <tr>
        <td height="30" colspan="5" class="gradiente_gris2"><span class="texto_decorado_blanco_amarillo">Consulta de Expedientes Anteriores (del SisGrad). Criterio de Búsqueda: &laquo;
        <?php
		  if ( isset($_POST['btnBuscar']) ) {
			  if ( isset($_POST['txtBci']) && $_POST['txtBci'] != '' ) {
				  //buscar por cédula
				  echo $_POST['txtBci'];
			  }
			  if ( isset($_POST['txtNomB']) && $_POST['txtNomB'] != '' ) {
				  //buscar por nombre
				  echo $_POST['txtNomB'];
			  }
			  if ( isset($_POST['txtApeB']) && $_POST['txtApeB'] != '' ) {
				  //buscar por apellido
				  echo $_POST['txtApeB'];
			  }
		  }
		?>
        &raquo;</span></td>
        </tr>
      <tr>
        <td width="26%" height="15">&nbsp;</td>
        <td width="48%" height="15">&nbsp;</td>
        <td width="7%" height="15">&nbsp;</td>
        <td width="9%" height="15">&nbsp;</td>
        <td width="10%" height="15">&nbsp;</td>
      </tr>
      <tr>
        <td height="50" colspan="5" align="center" valign="middle">
        <?php
		  if ( isset($_POST['btnBuscar']) ) {
			  if ( isset($_POST['txtBci']) && $_POST['txtBci'] != '' ) {
				  //buscar por cédula
				  $resultado_de_busqueda = CDe1ExpAnt('cedula',$_POST['txtBci']);
				  echo $resultado_de_busqueda;
			  }
			  if ( isset($_POST['txtNomB']) && $_POST['txtNomB'] != '' ) {
				  //buscar por nombre
				  $resultado_de_busqueda = CDe1ExpAnt('nombre',$_POST['txtNomB']);
				  echo $resultado_de_busqueda;
			  }
			  if ( isset($_POST['txtApeB']) && $_POST['txtApeB'] != '' ) {
				  //buscar por apellido
				  $resultado_de_busqueda = CDe1ExpAnt('apellido',$_POST['txtApeB']);
				  echo $resultado_de_busqueda;
			  }
		  }
		?>
        </td>
        </tr>
      <tr>
        <td width="26%" height="15">&nbsp;</td>
        <td width="48%" height="15">&nbsp;</td>
        <td width="7%" height="15">&nbsp;</td>
        <td width="9%" height="15">&nbsp;</td>
        <td width="10%" height="15">&nbsp;</td>
      </tr>
      <tr>
        <td height="40">&nbsp;</td>
        <td height="40" align="center" valign="middle"><input name="btnRegresar" type="submit" class="glow2" title="Pulse aqu&iacute; para regresar a la pantalla anterior...!" value="Regresar" /></td>
        <td height="40">&nbsp;</td>
        <td height="40">&nbsp;</td>
        <td height="40">&nbsp;</td>
      </tr>
      <tr>
        <td height="20">&nbsp;</td>
        <td height="20">&nbsp;</td>
        <td height="20">&nbsp;</td>
        <td height="20">&nbsp;</td>
        <td height="20">&nbsp;</td>
      </tr>
    </table>
    </form>
  <!-- InstanceEndEditable --></td>
  </tr>
</table>
</div>
</body>
<!-- InstanceEnd --></html>