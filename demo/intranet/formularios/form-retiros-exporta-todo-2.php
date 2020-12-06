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
  <!--<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/redmond/jquery-ui.css" />
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>-->
  <link rel="stylesheet" href="../jQuery/jquery-ui.css" />
  <script src="../jQuery/jquery-1.11.1.js"></script>
  <script src="../jQuery/jquery-ui.js"></script>
  <script src="../jQuery/jquery.ui.datepicker-es.js"></script>
  
  <script>
  $(function () {
	$.datepicker.setDefaults($.datepicker.regional["es"]);
	$("#txtTFechDesde").datepicker({
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
	  changeYear: true,
	  onClose: function( selectedDate ) {
		  $( "#txtTFechHasta" ).datepicker( "option", "minDate", selectedDate );
	  }
	});
	$("#txtTFechHasta").datepicker({
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
	  changeYear: true,
	  onClose: function( selectedDate ) {
		  $( "#txtTFechDesde" ).datepicker( "option", "maxDate", selectedDate );
	  }
	});

	$("#txtRFechDesde").datepicker({
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
	  changeYear: true,
	  onClose: function( selectedDate ) {
		  $( "#txtRFechHasta" ).datepicker( "option", "minDate", selectedDate );
	  }
	});
	$("#txtRFechHasta").datepicker({
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
	  changeYear: true,
	  onClose: function( selectedDate ) {
		  $( "#txtRFechDesde" ).datepicker( "option", "maxDate", selectedDate );
	  }
	});

  });
  </script>
  <form name="FrmET" method="post" action="form-retiros-exporta-todo-acciona-2.php">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td height="10">&nbsp;</td>
    </tr>
    <tr>
      <td height="40" class="gradiente_gris2"><span class="texto_decorado_blanco_amarillo">Retiros - Proceso de Exportaci&oacute;n</span></td>
    </tr>
    <tr>
    <td><div style="font-weight: bold; text-align: center; background-color: #FFFFFF; color: #1682E0; font-size: 21.0px; line-height: 24px; text-shadow: 2.0px 2.0px 2.0px rgba(51, 51, 51, 0.6); margin: 20px 0px 20px 0px">Filtro a Aplicar</div></td>
    </tr>
    <tr>
      <td height="40" align="center" valign="middle">
      <table width="98%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="22%" height="70"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">C&eacute;dula</div></td>
          <td width="38%" height="70" align="center" valign="middle"><table width="98%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="62%" height="20" align="center" valign="middle"><strong>DESDE</strong></td>
              <td width="38%" height="20" align="center" valign="middle"><strong>HASTA</strong></td>
            </tr>
            <tr>
              <td height="40" align="center" valign="middle"><input type="text" name="txtCIDesde" size="10" maxlength="8" class="cuadro_textbox_5" title="Indique la C&eacute;dula Inicial..."  /><br /><div class="DetalleCeroUno" style="line-height: 50px; vertical-align: middle;"><input type="checkbox" name="chkApartir" value="APDEC" class="cuadro_textbox_5" />&nbsp;&nbsp;A partir de esta C&eacute;dula</div></td>
              <td height="40" align="center" valign="top"><input type="text" name="txtCIHasta" size="10" maxlength="8" class="cuadro_textbox_5" title="Indique la C&eacute;dula Final..."  /></td>
            </tr>
          </table></td>
          <td width="40%" height="70" align="center" valign="middle" class="footer_rojo">Si desea solamente una C&eacute;dula, indique s&oacute;lo DESDE. Adicionalmente puede indicar si es a partir de esta C&eacute;dula.</td>
        </tr>
        <tr>
          <td height="70"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Fecha de Transcripci&oacute;n</div></td>
          <td height="70" align="center" valign="middle"><table width="98%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td height="20" align="center" valign="middle"><strong>DESDE</strong></td>
              <td height="20" align="center" valign="middle"><strong>HASTA</strong></td>
            </tr>
            <tr>
              <td height="40" align="center" valign="middle"><input type="text" id="txtTFechDesde" name="txtTFechDesde" maxlength="10" size="10" class="cuadro_textbox_5" title="Indique la Fecha Inicial de Transcripci&oacute;n..."  /><br /><div class="DetalleCeroUno" style="line-height: 50px; vertical-align: middle;"><input type="checkbox" name="chkATFecha" value="APDEFDT" class="cuadro_textbox_5" />&nbsp;&nbsp;A partir de esta Fecha</div></td>
              <td height="40" align="center" valign="top"><input type="text" id="txtTFechHasta" name="txtTFechHasta" maxlength="10" size="10" class="cuadro_textbox_5" title="Indique la Fecha Final de Transcripci&oacute;n..."  /></td>
            </tr>
          </table></td>
          <td rowspan="2" align="center" valign="middle" class="footer_rojo">Si desea solamente una Fecha, indique s&oacute;lo DESDE. Adicionalmente puede indicar si es a partir de esta Fecha.</td>
        </tr>
        <tr>
          <td height="70"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Fecha de Retiro</div></td>
          <td height="70" align="center" valign="middle"><table width="98%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td height="20" align="center" valign="middle"><strong>DESDE</strong></td>
              <td height="20" align="center" valign="middle"><strong>HASTA</strong></td>
              </tr>
            <tr>
              <td height="40" align="center" valign="middle"><input type="text" id="txtRFechDesde" name="txtRFechDesde" maxlength="10" size="10" class="cuadro_textbox_5" title="Indique la Fecha Inicial de Retiro..."  /><br /><div class="DetalleCeroUno" style="line-height: 50px; vertical-align: middle;"><input type="checkbox" name="chkARFecha" value="APDEFDR" class="cuadro_textbox_5" />&nbsp;&nbsp;A partir de esta Fecha</div></td>
              <td height="40" align="center" valign="top"><input type="text" id="txtRFechHasta" name="txtRFechHasta" maxlength="10" size="10" class="cuadro_textbox_5" title="Indique la Fecha Final de Retiro..."  /></td>
              </tr>
          </table></td>
          </tr>
        <tr>
          <td height="70"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Escuela</div></td>
          <td height="70" align="center" valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td height="20" align="center" valign="middle" scope="col"><strong>DESDE</strong></td>
            </tr>
            <tr>
              <td height="40" align="center" valign="middle"><?php echo armCNselEsc('lst1Escu'); ?></td>
            </tr>
            <tr>
              <td height="20" align="center" valign="middle"><strong>HASTA</strong></td>
            </tr>
            <tr>
              <td height="40" align="center" valign="middle"><?php echo armCNselEsc('lst2Escu'); ?></td>
            </tr>
          </table></td>
          <td height="70" align="center" valign="middle" class="footer_rojo">Si desea solamente una Escuela, indique s&oacute;lo DESDE.</td>
        </tr>
      </table>
</td>
    </tr>
    <tr>
    <td height="40" align="center" valign="middle"><div style="font-weight: bold; text-align: center; background-color: #FFFFFF; color: #1682E0; font-size: 21.0px; line-height: 24px; text-shadow: 2.0px 2.0px 2.0px rgba(51, 51, 51, 0.6); margin: 20px 0px 20px 0px">Informaci&oacute;n del Archivo a Exportar</div><div style="border:solid 3px #bcdbf5;-moz-border-radius: 22px;-webkit-border-radius: 22px;border-radius: 22px;margin: 9px 12px 9px 12px;"><table width="95%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="25%" height="30" valign="middle"><div style="font-weight: normal; text-align: right; background-color: #FFFFFF; color: #1682E0; font-size: 14px; line-height: 12px; text-shadow: 2px 2px 2px rgba(51, 51, 51, 0.6); margin: 5px 5px 5px 5px;">Nombre del Archivo</div></td>
              <td width="75%" height="30" valign="middle"><input type="text" name="txtFile" size="100" maxlength="100" value="" title="Indique el nombre de archivo..." style="font-weight: normal; text-align:left; margin: 8px 5px 8px 5px; background-color:#FEFAC2; color: #5912FF; font-size: 14px; line-height: 12px; text-shadow: 2px 2px 2px rgba(51, 51, 51, 0.6);" /></th>
            </tr>
            <tr>
              <td height="30" valign="middle"><div style="font-weight: normal; text-align: right; background-color: #FFFFFF; color: #1682E0; font-size: 14px; line-height: 12px; text-shadow: 2px 2px 2px rgba(51, 51, 51, 0.6); margin: 5px 5px 5px 5px;">Tipo de Formato</div></td>
              <td height="30" valign="middle"><select name="optExtension" style="font-weight: normal; text-align:left; margin: 8px 5px 8px 5px; background-color:#FEFAC2; color: #5912FF; font-size: 14px; line-height: 12px; text-shadow: 2px 2px 2px rgba(51, 51, 51, 0.6);">
              <option value=".xlsx" title="...recomendado para versiones de Office 2007-2013-2015-365...!">Ms Office 2007 &laquo;XLSX&raquo;</option>
              <option value=".xls" selected="selected" title="...recomendado para versiones inferiores a Office 2007...!">Ms Office 95 &laquo;XLS&raquo;</option>
              <option value=".csv" title="...recomendado para LibreOffice Calc...!">Texto plano separado por comas &quot&cedil;&quot;  &laquo;CSV&raquo;</option>
              <option value=".csvPyC" title="...recomendado para Microsoft Office Excel...!">Texto plano separado por punto y coma &quot ; &quot;  &laquo;CSV&raquo;</option>
              <option value=".dbf" title="...recomendado para Microsoft Visual FoxPro...!">dBase Plus  &laquo;DBF&raquo;</option>
              <option value=".xml">Formato XML (Lenguaje de Marcas eXtensible)  &laquo;XML&raquo;</option>
              </select></td>
            </tr>
            <tr>
              <td height="30" valign="middle"><div style="font-weight: normal; text-align: right; background-color: #FFFFFF; color: #1682E0; font-size: 14px; line-height: 12px; text-shadow: 2px 2px 2px rgba(51, 51, 51, 0.6); margin: 5px 5px 5px 5px;" title="..nos da un detalle de lo que la aplicaci&oacute;n va haciendo...!">Secuencia</div></td>
              <td height="30" valign="middle" title="Informar de la Secuencia de Comandos en la Generación del Archivo..."><div style="font-weight: normal; text-align:left; margin: 8px 5px 8px 5px; color: #5912FF; font-size: 14px; line-height: 12px; text-shadow: 2px 2px 2px rgba(51, 51, 51, 0.6);"><input type="radio" name="rdbInformar" value="Si" title="SI se le informar&aacute; del detalle de las acciones..." />Si<input type="radio" name="rdbInformar" value="No" checked="checked" title="NO se le informar&aacute; del detalle de las acciones..." />No</div></td>
            </tr>
            <tr>
              <td height="30" valign="middle"><div style="font-weight: normal; text-align: right; background-color: #FFFFFF; color: #1682E0; font-size: 14px; line-height: 12px; text-shadow: 2px 2px 2px rgba(51, 51, 51, 0.6); margin: 5px 5px 5px 5px;">Comprimir</div></td>
              <td height="30" valign="middle" title="Comprimir el archivo que se va a generar en &laquo;.ZIP&raquo;..."><div style="font-weight: normal; text-align:left; margin: 8px 5px 8px 5px; color: #5912FF; font-size: 14px; line-height: 12px; text-shadow: 2px 2px 2px rgba(51, 51, 51, 0.6);"><input type="radio" name="rdbComprimir" value="Si" checked="checked" title="SI se proceder&aacute; a COMPRIMIR el archivo en &laquo;.ZIP&raquo;..." />Si<input type="radio" name="rdbComprimir" value="No" title="NO se proceder&aacute; a COMPRIMIR el archivo en &laquo;.ZIP&raquo;..." />No</div></td>
            </tr>
            <tr>
              <td height="30" valign="middle"><div style="font-weight: normal; text-align: right; background-color: #FFFFFF; color: #1682E0; font-size: 14px; line-height: 12px; text-shadow: 2px 2px 2px rgba(51, 51, 51, 0.6); margin: 5px 5px 5px 5px;">Colocar en el Servidor de FTP</div></td>
              <td height="30" valign="middle" title="Comprimir el archivo que se va a generar en &laquo;.ZIP&raquo;..."><div style="font-weight: normal; text-align:left; margin: 8px 5px 8px 5px; color: #5912FF; font-size: 14px; line-height: 12px; text-shadow: 2px 2px 2px rgba(51, 51, 51, 0.6);"><input type="radio" name="rdbFTP" value="Si" checked="checked" title="SI se copiar&aacute; al Servidor de FTP......" />Si<input type="radio" name="rdbFTP" value="No" title="NO se copiar&aacute; al Servidor de FTP..." />No</div></td>
            </tr>
          </table>
        </div></td>
    </tr>
    <tr>
      <td height="40" align="center" valign="middle"><input name="btnRegresar" type="submit" class="glow2" title="Pulse aqu&iacute; para regresar a la pantalla anterior..." value="Regresar" />&nbsp;<input name="btnProcesar" type="submit" class="glow2" title="Pulse aqu&iacute; para procesar su solicitud..." value="Procesar" /></td>
    </tr>
  </table>
  </form>
  <!-- InstanceEndEditable --></td>
  </tr>
</table>
</div>
</body>
<!-- InstanceEnd --></html>