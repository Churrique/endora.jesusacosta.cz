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
	$("#txtDesde").datepicker({
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
	  dateFormat: 'yy-mm-dd',
	  changeMonth: true,
	  changeYear: true,
	  onClose: function( selectedDate ) {
		  $( "#txtHasta" ).datepicker( "option", "minDate", selectedDate );
	  }
	});
	$("#txtHasta").datepicker({
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
	  dateFormat: 'yy-mm-dd',
	  changeMonth: true,
	  changeYear: true,
	  onClose: function( selectedDate ) {
		  $( "#txtDesde" ).datepicker( "option", "maxDate", selectedDate );
	  }
	});

  });
  </script>
  <?php
	require_once('../funciones/valida-funciones_a_retirados.php');
  ?>
  <form name="FrmTraRetDia" method="post" action="form-retiros-transcripcion-del-dia-acciona-2.php" >
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="10">&nbsp;</td>
  </tr>
  <tr>
    <td height="40" class="gradiente_gris2"><span class="texto_decorado_blanco_amarillo">Retiros Transcritos por el Día de Hoy</span></td>
  </tr>
  <tr>
    <td height="15">&nbsp;</td>
  </tr>
  <tr>
    <td height="40" align="center"><?php
	$xConeccion = CR_1er_Paso();
	if ( is_object($xConeccion) ) {
		//******************************//
		//****** FECHA TRANSCRIPCIÓN =
		//******************************//
		$xResultado = CR_2do_Paso($xConeccion,"WHERE `fecha_de_transcripcion` = '".date('d-m-Y')."'"); 
		if ( !is_object($xResultado) ) {
//			echo $xResultado;
			echo '<span class="GrisMGrandeCAltura">No hay registros que mostrar...!</span>';
		}
		else {
			//*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
			//  MOSTRAR EL GRID  -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
			//*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
			$relleno = 0;
			echo '
			<table width="90%" border="0" cellspacing="0" cellpadding="0">
			  <tr class="glow2">
				<td height="25" align="center" valign="middle">Escuela</td>
				<td height="25" align="center" valign="middle">C&eacute;dula</td>
				<td height="25" align="center" valign="middle">Nombres</td>
				<td height="25" align="center" valign="middle" title="Fecha en que se realiz&oacute; el Retiro...">Retiro</td>
				<td height="25" align="center" valign="middle">Documento</td>
				<td height="25" align="center" valign="middle" title="Fecha en que se realiz&oacute; la Transcripci&oacute;n...">Transcrito</td>
			  </tr>';
			while ($rows = mysqli_fetch_array($xResultado,  MYSQLI_BOTH)) {
				$relleno += 1;
				if ( $relleno % 2 == 0 ) {
					echo '<tr class="RotuloTabla1A" bgcolor="#FFFFCC">';
				}
				else {
					echo '<tr class="RotuloTabla1" bgcolor="#FFCCCC">';
				}
				echo '
				<td height="25" align="center" valign="middle">'.$rows['nombre_de_escuela'].'</td>
				<td height="25" align="center" valign="middle">'.$rows['aci'].'</td>
				<td height="25" align="center" valign="middle">'.$rows['primernombre'].' '.$rows['primerapellido'].'</td>
				<td height="25" align="center" valign="middle">'.$rows['fecha_del_retiro'].'</td>
				<td height="25" align="center" valign="middle">'.$rows['descripcion_del_documento'].'</td>
				<td height="25" align="center" valign="middle">'.$rows['fecha_de_transcripcion'].'</td>
			  </tr>';
			}
			echo '
			  <tr class="glow2">
				<td height="15" align="center" colspan="6" valign="middle">&nbsp;</td>
			  </tr>
			</table>';
			//*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
			//  FIN DEL GRID  *-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
			//*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
			mysqli_free_result($xResultado);
			mysqli_close($xConeccion);
		}
	}
	else {
		echo '<span class="GrisMGrandeCAltura">'.$xConeccion.'</span>';
	}
	?></td>
  </tr>
  <tr>
    <td height="15">&nbsp;</td>
  </tr>
  <tr>
    <td height="40" align="center" valign="middle"><input name="btnRegresar" type="submit" class="glow2" id="btnRegresar" title="Pulse aqu&iacute; para regresar a la pantalla anterior..." value="Regresar" />&nbsp;<input name="btnImprimir" type="submit" class="glow2" value="Imprimir" title="Pulse aqu&iacute; para Imprimir estos registros..."  /></td>
  </tr>
  <!--<tr>
    <td height="15">&nbsp;</td>
  </tr>-->
  <tr>
    <td height="15"><div style="font-weight: bold; text-align: center; background-color: #FFFFFF; color: #1682E0; font-size: 21.0px; line-height: 24px; text-shadow: 2.0px 2.0px 2.0px rgba(51, 51, 51, 0.6); margin: 20px 0px 20px 0px">Informaci&oacute;n del Archivo a Exportar</div><div style="border:solid 3px #bcdbf5;-moz-border-radius: 22px;-webkit-border-radius: 22px;border-radius: 22px;margin: 9px 12px 9px 12px;"><table width="95%" border="0" cellspacing="0" cellpadding="0">
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
  <!--<tr>
    <td height="5">&nbsp;</td>
  </tr>-->
  <tr>
    <td height="15" align="center" valign="middle"><input name="btnExporta" type="submit" class="glow2" value="Exportar" title="Pulse aqu&iacute; para Exportar estos registros..." /></td>
  </tr>
  <tr>
    <td height="15">&nbsp;</td>
  </tr>
  <tr>
    <td height="148" align="center" valign="middle"><table width="98%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="28%" height="144" align="center" valign="middle" bgcolor="#FFFFCC"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Fecha de Transcripci&oacute;n</div></th>
        <td width="38%" height="144" align="center" valign="middle" bgcolor="#FFFFCC"><table width="80%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="64%" height="24" align="center" valign="middle"><strong>DESDE</strong></td>
            <td width="36%" height="24" align="center" valign="middle"><strong>HASTA</strong></td>
          </tr>
          <tr>
            <td height="42" align="center" valign="top"><input type="text" id="txtDesde" name="txtDesde" maxlength="10" size="10" class="cuadro_textbox_5" title="Indique la Fecha Inicial de Transcripci&oacute;n..."  /></td>
            <td rowspan="2" align="center" valign="top"><input type="text" id="txtHasta" name="txtHasta" maxlength="10" size="10" class="cuadro_textbox_5" title="Indique la Fecha Final de Transcripci&oacute;n..."  /></td>
          </tr>
          <tr>
            <td height="56" align="center" valign="middle"><div class="DetalleCeroUno" style="line-height: 50px; vertical-align: middle;"><input type="checkbox" name="chkFecha" value="APDEFDT" class="cuadro_textbox_5" />&nbsp;&nbsp;A partir de esta Fecha</div></td>
            </tr>
        </table></td>
        <td width="34%" height="144" align="center" valign="middle" bgcolor="#FFFFCC" class="footer_rojo"><p>Si desea una Fecha distinta a la de hoy, use estos campos.<br />Si desea solamente una Fecha, indique s&oacute;lo DESDE.<br />Adicionalmente puede indicar si es a partir de esta Fecha.</p></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="40" align="center" valign="middle"><input name="btnRegresar" type="submit" class="glow2" id="btnRegresar" title="Pulse aqu&iacute; para regresar a la pantalla anterior..." value="Regresar" />&nbsp;<input name="btnConsultar" type="submit" class="glow2" title="Pulse aqu&iacute; para efectuar esta colsulta..." value="Consultar" /></td>
  </tr>
</table>
  </form>
  <!-- InstanceEndEditable --></td>
  </tr>
</table>
</div>
</body>
<!-- InstanceEnd --></html>