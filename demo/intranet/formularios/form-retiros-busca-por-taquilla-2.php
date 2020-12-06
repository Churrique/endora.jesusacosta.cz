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
  <link rel="stylesheet" href="../jQuery/jquery-ui.css" />
  <script src="../jQuery/jquery-1.11.1.js"></script>
  <script src="../jQuery/jquery-ui.js"></script>
  <script src="../jQuery/jquery.ui.datepicker-es.js"></script>
  
  <script>
  $(function () {
	$.datepicker.setDefaults($.datepicker.regional["es"]);
	$("#txtFechRet").datepicker({
	  firstDay: 1,
	  closeText: 'Cerrar',
	  prevText: 'Anterior',
	  nextText: 'Siguiente',
	  currentText: 'Hoy',
	  monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
				  'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
	  monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
				  'Jul','Ago','Sep','Oct','Nov','Dic'],
	  dayNames: ['Domingo','Lunes','Martes','Mi&eacute;rcoles','Jueves','Viernes','S&aacute;bado'],
	  dayNamesShort: ['Dom','Lun','Mar','Mi&eacute;','Juv','Vie','S&aacute;b'],
	  dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','S&aacute;'],
	  dateFormat: 'dd-mm-yy',
	  changeMonth: true,
	  changeYear: true
	});

  });
  </script>
  <form name="FrmBusTaQ" method="post" action="form-retiros-busca-por-taquilla-acciona-2.php" >
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="28%" height="10">&nbsp;</td>
        <td width="36%" height="10">&nbsp;</td>
        <td width="36%" height="10">&nbsp;</td>
      </tr>
      <tr>
        <td height="40" colspan="3" class="gradiente_gris1"><span class="texto_decorado_blanco_amarillo">Retiros Taquilla</span></td>
        </tr>
      <tr>
        <td height="10">&nbsp;</td>
        <td height="10">&nbsp;</td>
        <td height="10">&nbsp;</td>
      </tr>
      <tr>
        <td height="40"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">C&eacute;dula de Identidad</div></td>
        <td height="40"><?php echo '<input type="text" name="txtCI" value="'.$_GET['cedula'].'" class="cuadro_textbox_5" size="10" maxlength="8" title="Indique la Cédula de Identidad..." />'; ?></td>
        <td height="40">&nbsp;</td>
      </tr>
      <tr>
        <td height="40"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Nombre</div></td>
        <td height="40"><input type="text" name="txt1ErNom" value="" class="cuadro_textbox_5" size="35" maxlength="30" title="Indique el primer nombre..." /></td>
        <td height="40"><div class="txt_pie" style="margin-left: 9px; margin-right: 9px; line-height: 17px; text-align:center;">Solamente el 1er. Nombre</div></td>
      </tr>
      <tr>
        <td height="40"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Apellido</div></td>
        <td height="40"><input type="text" name="txt1ErApe" value="" class="cuadro_textbox_5" size="35" maxlength="30" title="Indique el primer apellido..." /></td>
        <td height="40"><div class="txt_pie" style="margin-left: 9px; margin-right: 9px; line-height: 17px; text-align:center;">Solamente el 1er. Apellido</div></td>
      </tr>
      <tr>
        <td height="40"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Escuela</div></td>
        <td height="40"><?php echo armselEscue(); ?></td>
        <td height="40">&nbsp;</td>
      </tr>
      <tr>
        <td height="40"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Retiro</div></td>
        <td height="40"><?php echo armselPasiv(); ?></td>
        <td height="40">&nbsp;</td>
      </tr>
      <tr>
        <td height="40"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Fecha del Retiro</div></td>
        <td height="40"><?php echo '<input type="text" id="txtFechRet" name="txtFechRet" style="margin: 0px 0px 10px 0px;" class="cuadro_textbox_5" value="'.date('d-m-Y').'" size="10" maxlength="10" title="Indique la fecha del Retiro..." />'; ?></td>
        <td height="40"><div class="txt_pie" style="margin-left: 9px; margin-right: 9px; line-height: 17px; text-align:center;">Ejemplo para la Fecha dd-mm-aaaa<br />31-12-2000</div></td>
      </tr>
      <tr>
        <td height="40"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Observaci&oacute;n (general)</div></td>
        <td height="40"><textarea name="txtObservacion" class="cuadro_textbox_5" rows="3" cols="60">Registro procesado desde taquilla, se debe completar la informaci&oacute;n posteriormente.</textarea></td>
        <td height="40">&nbsp;</td>
      </tr>
      <tr>
	    <td height="40"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Documentos que retira</div></td>
	    <td height="40" colspan="2"><div style="margin: 10px 5px 0px 5px;"><?php echo DTparaD(); ?></div></td>
      </tr>
      <tr>
        <td height="10">&nbsp;</td>
        <td height="10">&nbsp;</td>
        <td height="10">&nbsp;</td>
      </tr>
      <tr>
        <td height="40" colspan="3" align="center" valign="middle"><input name="btnMeDevuelbo" type="submit" class="glow2" title="Pulse aqu&iacute; para Cancelar y regresar...!" value="Cancelar"  />&nbsp;<input name="btnContinue" type="submit" class="glow2" title="Pulse aqu&iacute; para Buscar, Validar y Guardar...!" value="Continuar"  /></td>
        </tr>
      <tr>
        <td height="10">&nbsp;</td>
        <td height="10">&nbsp;</td>
        <td height="10">&nbsp;</td>
      </tr>
    </table>
    </form>
    <!-- InstanceEndEditable --></td>
  </tr>
</table>
</div>
</body>
<!-- InstanceEnd --></html>