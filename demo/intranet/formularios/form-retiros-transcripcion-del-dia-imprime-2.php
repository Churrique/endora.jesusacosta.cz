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
  <form name="FrmPrin" method="post" action="form-retiros-transcripcion-del-dia-imprime-acciona-2.php" >
  <!--<form name="FrmPrin" method="post" action="form-retiros-transcripcion-del-dia-2.php" >-->
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="10">&nbsp;</td>
      </tr>
      <tr>
        <td height="40" class="gradiente_gris2"><span class="texto_decorado_blanco_amarillo">Reporte para Retiros Transcritos 
        <?php
		if ( isset($_GET['HOY']) ) {
			echo '&laquo;el día de Hoy&raquo;';
			echo '<input type="hidden" name="txt3Hoy" value="'.$_GET['DESDE'].'" />';
		}
		else {
			if ( isset($_GET['DESDE']) && isset($_GET['APARTIRDE']) ) {
				echo '&laquo;Apartir del día '.$_GET['DESDE'].'&raquo;';
				echo '<input type="hidden" name="txt3Desde" value="'.$_GET['DESDE'].'" />';
				echo '<input type="hidden" name="chk3Fecha" value="'.$_GET['APARTIRDE'].'" />';
			}
			else {
				if ( isset($_GET['DESDE']) && isset($_GET['HASTA']) ) {
					echo '&laquo;Desde el día '.$_GET['DESDE'].' Hasta el día '.$_GET['HASTA'].'&raquo;';
					echo '<input type="hidden" name="txt3Desde" value="'.$_GET['DESDE'].'" />';
					echo '<input type="hidden" name="txt3Hasta" value="'.$_GET['HASTA'].'" />';
				}
				else {
					echo '&laquo;Del día '.$_GET['DESDE'].'&raquo;';
					echo '<input type="hidden" name="txt3Desde" value="'.$_GET['DESDE'].'" />';
				}
			}
		}
        ?>
        </span></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="58" align="center" valign="middle"><table width="98%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="28%" height="38" align="center" valign="middle"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Fecha de Transcripci&oacute;n</div></th>
        <td width="38%" height="38" align="center" valign="middle" class="DetalleCeroUno">
		<?php
		if ( isset($_GET['HOY']) ) {
			echo $_GET['HOY'];
		}
		else {
			if ( isset($_GET['DESDE']) && isset($_GET['APARTIRDE']) ) {
				echo 'Apartir del '.$_GET['DESDE'];
			}
			else {
				if ( isset($_GET['DESDE']) && isset($_GET['HASTA']) ) {
					echo 'Desde '.$_GET['DESDE'].' Hasta '.$_GET['HASTA'];
				}
				else {
					echo 'Del '.$_GET['DESDE'];
				}
			}
		}
		?>
        </td>
        <td width="34%" height="38" align="center" valign="middle" class="footer_rojo"><p>&nbsp;</p></td>
      </tr>
    </table></td>
      </tr>
      <tr>
        <td height="162" align="center" valign="middle"><table width="98%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="28%" height="135" align="center" valign="middle"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Observaci&oacute;n para el Reporte</div>
          </th>
        <td width="38%" height="135" align="center" valign="middle"><TEXTAREA NAME="Texto" COLS=40 ROWS=5 class="cuadro_textbox_5"></TEXTAREA></td>
        <td width="34%" height="135" align="center" valign="middle" class="footer_rojo"><p>Si lo desea, puede indicar alguna Observaci&oacute;n al Reporte.</p></td>
      </tr>
    </table></td>
      </tr>
      <tr>
        <td height="45" align="center" valign="middle"><input name="btnRegreso" type="submit" class="glow2" title="Pulse aqu&iacute; para regresar a la pantalla anterior...!" value="Regresar" />&nbsp;<input name="btnImprimo" type="submit" class="glow2" title="Pulse aqu&iacute; para Imprimir esta Consulta...!" value="Imprimir" /></td>
      </tr>
      <tr>
        <td height="45" align="center" valign="middle"><a href="form-retiros-transcripcion-del-dia-2.php" target="_self"><img src="../imagenes/boton-regresar.fw.png" width="90" height="31" alt="regresar" /></a>&nbsp;<a href="reporte-retiros-transcripcion-del-dia.php" target="_blank"><img src="../imagenes/boton-reporte.fw.png" width="80" height="32" alt="reporte" /></a></td>
      </tr>
    </table>
  </form>
  <!-- InstanceEndEditable --></td>
  </tr>
</table>
</div>
</body>
<!-- InstanceEnd --></html>