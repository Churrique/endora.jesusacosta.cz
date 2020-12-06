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
	if ( isset($_POST['btnMeVoyDeAqui']) ) {
		header('Location: form-transcripcion-de-promedios-promocion-2.php');
		exit;
	}
  ?>
  <form name="FrmResBusca" method="post" action="form-transcripcion-de-promedios-busqueda-2.php" >
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <th height="10" valign="middle" scope="col">&nbsp;</th>
      </tr>
      <tr>
        <td height="40" valign="middle" class="gradiente_gris1"><span class="texto_decorado_blanco_amarillo">Resultado de la B&uacute;squeda de Promedios</span></td>
      </tr>
      <tr>
      <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="40" align="center" valign="middle">
        <?php
		if ( isset($_POST['btnBuscalo']) ) {
			$cadena = trim($_POST['txtValor']);
			if ( $_POST['btnBuscarPor'] == 'cedula' ) $registros = ConsulGenDCT(BASE_FORANEA_DE_DATOS,'_vista_promedios_no_relacionados','ci',$cadena,true);
			if ( $_POST['btnBuscarPor'] == 'nombres' ) $registros = ConsulGenDCT(BASE_FORANEA_DE_DATOS,'_vista_promedios_no_relacionados','nombre',$cadena,true);
			if ( !is_bool($registros) ) {
				$i = 1;
				echo '<table width="70%" border="0" cellspacing="0" cellpadding="0">';
				echo '<tr><td height="30" class="glow2" align="center">C&eacute;dula</td>';
				echo '<td height="30" class="glow2" align="center">Nombre</td>';
				echo '<td height="30" class="glow2" align="center">Promedio</td></tr>';
				while ($filas = mysql_fetch_array($registros, MYSQL_ASSOC)) {
					if ($i % 2) {
						echo '<tr class="glow">';
					}
					else {
						echo '<tr class="glowA">';
					}
					echo '<td height="30" align="center">'.$filas['ci'].'</td>';
					echo '<td height="30">'.$filas['nombre'].'</td>';
					echo '<td height="30" align="center">'.$filas['ipromedio'].'</td></tr>';
					$i++;
				}
				echo '</table>';
			}
		}
        ?>
        </td>
      </tr>
      <tr>
      <td>&nbsp;</td>
      </tr>
	  <tr>
        <td height="60" align="center" valign="middle"><input name="btnChao" type="submit" class="cuadro_textbox_4" value="Regresar" title="Pulse aqu&iacute; para regresar a la pantalla anterior...!" /></td>
      </tr>
    </table>
  </form>
  <!-- InstanceEndEditable --></td>
  </tr>
</table>
</div>
</body>
<!-- InstanceEnd --></html>