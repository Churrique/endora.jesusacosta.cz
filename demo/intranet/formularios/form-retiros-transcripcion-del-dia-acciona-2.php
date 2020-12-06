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
	require_once('../funciones/valida-funciones_a_retirados.php');
	  if ( isset($_POST['btnRegresar']) ) {
		  header('Location: form-retiros-busca-2.php?mensaje=');
		  exit;
	  }
	  if ( isset($_POST['btnImprimir']) ) {
		  header('Location: form-retiros-transcripcion-del-dia-imprime-2.php?HOY='.date('d-m-Y'));
		  exit;
	  }
	  if ( isset($_POST['btnExporta']) ) {
		  header('Location: form-retiros-transcripcion-del-dia-exporta-2.php?HOY='.date('d-m-Y'));
		  exit;
	  }
  ?>
  <form name="FrmOConsu" method="post" action="form-retiros-transcripcion-del-dia-acciona-segunda-vuelta-2.php" >
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="10">&nbsp;</td>
      </tr>
      <tr>
        <td height="40" class="gradiente_gris2"><span class="texto_decorado_blanco_amarillo"><?php
		//------ PARA EL TÍTULO --------//
		//******************************//
		//****** FECHA TRANSCRIPCIÓN >=X<=
		//******************************//
		if ( !empty($_POST['txtDesde']) && !empty($_POST['txtHasta']) ) {
			echo "Retiros Transcritos del Día &laquo;".$_POST['txtDesde']."&raquo; hasta el &laquo;".$_POST['txtHasta']."&raquo;";
		}
		//******************************//
		//****** FECHA TRANSCRIPCIÓN =
		//******************************//
		if ( !empty($_POST['txtDesde']) && empty($_POST['txtHasta']) && !isset($_POST['chkFecha']) ) {
			echo "Retiros Transcritos del Día &laquo;".$_POST['txtDesde']."&raquo;";
		}
		//******************************//
		//****** FECHA TRANSCRIPCIÓN >=
		//******************************//
		if ( !empty($_POST['txtDesde']) && empty($_POST['txtHasta']) && isset($_POST['chkFecha']) ) {
			echo "Retiros Transcritos a partir del Día &laquo;".$_POST['txtDesde']."&raquo;";
		}
		?></span></td>
      </tr>
      <tr>
        <td height="15">&nbsp;</td>
      </tr>
      <tr>
        <td height="30" align="center" valign="middle">
		  <?php
			$xConeccion = CR_1er_Paso();
			if ( is_object($xConeccion) ) {
				//******************************//
				//****** FECHA TRANSCRIPCIÓN >=X<=
				//******************************//
				if ( !empty($_POST['txtDesde']) && !empty($_POST['txtHasta']) ) {
					$xResultado = CR_U_Paso($xConeccion,"WHERE `fecha_de_transcripcion` >= '".$_POST['txtDesde']."' AND `fecha_del_retiro` <= '".$_POST['txtHasta']."' GROUP BY `aescuela`,`aci` ORDER BY `aescuela`,`aci`"); 
					if ( !is_object($xResultado) ) {
						echo $xResultado;
					}
				}
				//******************************//
				//****** FECHA TRANSCRIPCIÓN =
				//******************************//
				if ( !empty($_POST['txtDesde']) && empty($_POST['txtHasta']) && !isset($_POST['chkFecha']) ) {
					$xResultado = CR_U_Paso($xConeccion,"WHERE `fecha_de_transcripcion` = '".$_POST['txtDesde']."' GROUP BY `aescuela`,`aci` ORDER BY `aescuela`,`aci`"); 
					if ( !is_object($xResultado) ) {
						echo $xResultado;
					}
				}
				//******************************//
				//****** FECHA TRANSCRIPCIÓN >=
				//******************************//
				if ( !empty($_POST['txtDesde']) && empty($_POST['txtHasta']) && isset($_POST['chkFecha']) ) {
					$xResultado = CR_U_Paso($xConeccion,"WHERE `fecha_de_transcripcion` >= '".$_POST['txtDesde']."' GROUP BY `aescuela`,`aci` ORDER BY `aescuela`,`aci`"); 
					if ( !is_object($xResultado) ) {
						echo $xResultado;
					}
				}
				if ( is_object($xResultado) ) {
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
						<td height="25" align="center" valign="middle">Observaci&oacute;n</td>
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
						<td height="25" align="center" valign="middle">'.$rows['nombres'].' '.$rows['apellidos'].'</td>
						<td height="25" align="center" valign="middle">'.$rows['fecha_del_retiro'].'</td>
						<td height="25" align="center" valign="middle">'.$rows['observacion_del_retiro'].'</td>
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
					echo '<input type="hidden" name="txt2Desde" value="'.$_POST['txtDesde'].'" />';
					echo '<input type="hidden" name="txt2Hasta" value="'.$_POST['txtHasta'].'" />';
					if ( isset($_POST['chkFecha']) ) {
						echo '<input type="hidden" name="chk2Fecha" value="'.$_POST['chkFecha'].'" />';
					}
					mysqli_free_result($xResultado);
					mysqli_close($xConeccion);
				}
			}
			else {
				echo $xConeccion;
			}
		  ?>
        </td>
      </tr>
      <tr>
        <td height="15">&nbsp;</td>
      </tr>
      <tr>
        <td height="30" align="center" valign="middle"><input name="btn2Regresar" type="submit" class="glow2" title="Pulse aqu&iacute; para regresar a la pantalla anterior...!" value="Regresar" />&nbsp;<input name="btn2Imprimir" type="submit" class="glow2" title="Pulse aqu&iacute; para Imprimir esta Consulta...!" value="Imprimir" /></td>
      </tr>
      <tr>
        <td height="15">&nbsp;</td>
      </tr>
      <tr>
        <td height="40"><div style="font-weight: bold; text-align: center; background-color: #FFFFFF; color: #1682E0; font-size: 21.0px; line-height: 24px; text-shadow: 2.0px 2.0px 2.0px rgba(51, 51, 51, 0.6); margin: 20px 0px 20px 0px">Informaci&oacute;n del Archivo a Exportar</div><div style="border:solid 3px #bcdbf5;-moz-border-radius: 22px;-webkit-border-radius: 22px;border-radius: 22px;margin: 9px 12px 9px 12px;"><table width="95%" border="0" cellspacing="0" cellpadding="0">
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
        <td height="15">&nbsp;</td>
      </tr>
      <tr>
        <td height="15" align="center" valign="middle"><input name="btn2Regresar" type="submit" class="glow2" title="Pulse aqu&iacute; para regresar a la pantalla anterior...!" value="Regresar" />&nbsp;<input name="btn2Exporta" type="submit" class="glow2" title="Pulse aqu&iacute; para Exportar esta Consulta...!" value="Exportar" /></td>
      </tr>
      <tr>
        <td height="15">&nbsp;</td>
      </tr>
    </table>
  </form>
  <!-- InstanceEndEditable --></td>
  </tr>
</table>
</div>
</body>
<!-- InstanceEnd --></html>