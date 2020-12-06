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
	  if ( $_POST['txtPantDeOrig'] == 'AV2' ) {
		  header('Location: form-retiros-adiciona-v2-2.php?CED='.$_POST['txtACI']);
		  exit;
	  }
	  if ( $_POST['txtPantDeOrig'] == 'A2') {
		  header('Location: form-retiros-adiciona-2.php');
		  exit;
	  }
	  if ( $_POST['txtPantDeOrig'] == 'AV3' ) {
		  header('Location: form-retiros-todos-2.php');
		  exit;
	  }
  }
  ?>
  <form name="FrmRetExport" method="post" action="form-mostrar-tareas-2.php" >
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="40">&nbsp;</td>
      </tr>
      <tr>
        <td height="40" class="gradiente_gris1"><span class="texto_decorado_blanco_amarillo">Documentos que se Procesaron en este Retiro (Exportar)</span></td>
      </tr>
      <tr>
        <td height="40" align="center" valign="middle"><div style="font-weight: bold; text-align: center; background-color: #FFFFFF; color: #1682E0; font-size: 21.0px; line-height: 24px; text-shadow: 2.0px 2.0px 2.0px rgba(51, 51, 51, 0.6); margin: 20px 0px 20px 0px">Detalle de Documentos</div><div style="border:solid 3px #bcdbf5;-moz-border-radius: 22px;-webkit-border-radius: 22px;border-radius: 22px;margin: 9px 12px 9px 12px;"><table width="90%" border="0" cellpadding="0" cellspacing="0" >
          <tr><td height="30" align="center" valign="middle"><div style="margin: 20px 0px 20px 0px;">
		  <?php
			$vector_retiro = Gepmr($_POST['txtACI'],$_POST['txtAID']);
			if (is_bool($vector_retiro)) echo 'No hay informaci&oacute;n que mostrar...';
		  ?>
          </div></td></tr></table></div></td>
      </tr>
      <tr>
        <td height="40" align="center" valign="middle"><div style="font-weight: bold; text-align: center; background-color: #FFFFFF; color: #1682E0; font-size: 21.0px; line-height: 24px; text-shadow: 2.0px 2.0px 2.0px rgba(51, 51, 51, 0.6); margin: 20px 0px 20px 0px">Informaci&oacute;n Base</div><div style="border:solid 3px #bcdbf5;-moz-border-radius: 22px;-webkit-border-radius: 22px;border-radius: 22px;margin: 9px 12px 9px 12px;"><table width="95%" border="0" cellpadding="0" cellspacing="0" >
          <tr>
            <td width="10%" height="30" align="right" valign="middle"><div style="font-weight: normal; text-align: right; background-color: #FFFFFF; color: #1682E0; font-size: 11px; line-height: 10px; text-shadow: 2px 2px 2px rgba(51, 51, 51, 0.6);">C&eacute;dula</div></td>
            <td width="37%" height="30" valign="middle"><div style="font-weight: normal; text-align:left; margin: 0px 5px 0px 5px; background-color: #FFFFFF; color: #5912FF; font-size: 12px; line-height: 10px; text-shadow: 2px 2px 2px rgba(51, 51, 51, 0.6);"><?php echo $vector_retiro['aci'];?></div></td>
            <td width="15%" height="30" align="right" valign="middle"><div style="font-weight: normal; text-align: right; background-color: #FFFFFF; color: #1682E0; font-size: 11px; line-height: 10px; text-shadow: 2px 2px 2px rgba(51, 51, 51, 0.6);">Apellido(s), Nombre(s)</div></td>
            <td width="38%" height="30" valign="middle"><div style="font-weight: normal; text-align:left; margin: 0px 5px 0px 5px; background-color: #FFFFFF; color: #5912FF; font-size: 12px; line-height: 10px; text-shadow: 2px 2px 2px rgba(51, 51, 51, 0.6);"><?php echo $vector_retiro['primerapellido'].' '.$vector_retiro['segundoapellido'].', '.$vector_retiro['primernombre'].' '.$vector_retiro['segundonombre'];?></div></td>
          </tr>
          <tr>
            <td height="30" align="right" valign="middle"><div style="font-weight: normal; text-align: right; background-color: #FFFFFF; color: #1682E0; font-size: 11px; line-height: 10px; text-shadow: 2px 2px 2px rgba(51, 51, 51, 0.6);">Facultad</div></td>
            <td height="30" valign="middle"><div style="font-weight: normal; text-align:left; margin: 0px 5px 0px 5px; background-color: #FFFFFF; color: #5912FF; font-size: 12px; line-height: 10px; text-shadow: 2px 2px 2px rgba(51, 51, 51, 0.6);"><?php echo $vector_retiro['nombre_de_facultad'];?></div></td>
            <td height="30" align="right" valign="middle"><div style="font-weight: normal; text-align: right; background-color: #FFFFFF; color: #1682E0; font-size: 11px; line-height: 10px; text-shadow: 2px 2px 2px rgba(51, 51, 51, 0.6);">Escuela</div></td>
            <td height="30" valign="middle"><div style="font-weight: normal; text-align:left; margin: 0px 5px 0px 5px; background-color: #FFFFFF; color: #5912FF; font-size: 12px; line-height: 10px; text-shadow: 2px 2px 2px rgba(51, 51, 51, 0.6);"><?php echo $vector_retiro['aescuela'].' | '.$vector_retiro['nombre_de_escuela'];?></div></td>
          </tr>
          <tr>
            <td height="30" align="right" valign="middle"><div style="font-weight: normal; text-align: right; background-color: #FFFFFF; color: #1682E0; font-size: 11px; line-height: 10px; text-shadow: 2px 2px 2px rgba(51, 51, 51, 0.6);">Menci&oacute;n</div></td>
            <td height="30" valign="middle"><div style="font-weight: normal; text-align:left; margin: 0px 5px 0px 5px; background-color: #FFFFFF; color: #5912FF; font-size: 12px; line-height: 10px; text-shadow: 2px 2px 2px rgba(51, 51, 51, 0.6);"><?php echo $vector_retiro['amencion'].' | '.$vector_retiro['nombre_de_mencion'];?></div></td>
            <td height="30" align="right" valign="middle"><div style="font-weight: normal; text-align: right; background-color: #FFFFFF; color: #1682E0; font-size: 11px; line-height: 10px; text-shadow: 2px 2px 2px rgba(51, 51, 51, 0.6);">Fecha de Retiro</div></td>
            <td height="30" valign="middle"><div style="font-weight: normal; text-align:left; margin: 0px 5px 0px 5px; background-color: #FFFFFF; color: #5912FF; font-size: 12px; line-height: 10px; text-shadow: 2px 2px 2px rgba(51, 51, 51, 0.6);"><?php echo $vector_retiro['fecha_del_retiro'];?></div></td>
          </tr>
          <tr>
            <td height="30" align="right" valign="middle"><div style="font-weight: normal; text-align: right; background-color: #FFFFFF; color: #1682E0; font-size: 11px; line-height: 10px; text-shadow: 2px 2px 2px rgba(51, 51, 51, 0.6);">Activo</div></td>
            <td height="30" valign="middle"><div style="font-weight: normal; text-align:left; margin: 0px 5px 0px 5px; background-color: #FFFFFF; color: #5912FF; font-size: 12px; line-height: 10px; text-shadow: 2px 2px 2px rgba(51, 51, 51, 0.6);"><?php echo $vector_retiro['aactivo'].' | '.$vector_retiro['descripcion_del_activo'];?></div></td>
            <td height="30" align="right" valign="middle"><div style="font-weight: normal; text-align: right; background-color: #FFFFFF; color: #1682E0; font-size: 11px; line-height: 10px; text-shadow: 2px 2px 2px rgba(51, 51, 51, 0.6);">Pasivo</div></td>
            <td height="30" valign="middle"><div style="font-weight: normal; text-align:left; margin: 0px 5px 0px 5px; background-color: #FFFFFF; color: #5912FF; font-size: 12px; line-height: 10px; text-shadow: 2px 2px 2px rgba(51, 51, 51, 0.6);"><?php echo $vector_retiro['apasivo'].' | '.$vector_retiro['descripcion_del_pasivo'];?></div></td>
          </tr>
          <tr>
            <td height="30" align="right" valign="middle"><div style="font-weight: normal; text-align: right; background-color: #FFFFFF; color: #1682E0; font-size: 11px; line-height: 10px; text-shadow: 2px 2px 2px rgba(51, 51, 51, 0.6);">Observaci&oacute;n</div></td>
            <td height="30" valign="middle"><div style="font-weight: normal; text-align:left; margin: 0px 5px 0px 5px; background-color: #FFFFFF; color: #5912FF; font-size: 12px; line-height: 10px; text-shadow: 2px 2px 2px rgba(51, 51, 51, 0.6);"><?php echo $vector_retiro['observacion_del_retiro'];?></div></td>
            <td height="30" align="right" valign="middle">&nbsp;</td>
            <td height="30" valign="middle"><?php
			echo '<input type="hidden" name="txtPDO" value="'.$_POST['txtPantDeOrig'].'" />';
			echo '<input type="hidden" name="txtCed" value="'.$vector_retiro['aci'].'" />';
			echo '<input type="hidden" name="txtIRet" value="'.$vector_retiro['idretiro'].'" />';
			?></td>
          </tr>
        </table></div></td>
      </tr>
      <tr>
        <td height="40" align="center" valign="middle"><div style="font-weight: bold; text-align: center; background-color: #FFFFFF; color: #1682E0; font-size: 21.0px; line-height: 24px; text-shadow: 2.0px 2.0px 2.0px rgba(51, 51, 51, 0.6); margin: 20px 0px 20px 0px">Informaci&oacute;n del Archivo a Exportar</div><div style="border:solid 3px #bcdbf5;-moz-border-radius: 22px;-webkit-border-radius: 22px;border-radius: 22px;margin: 9px 12px 9px 12px;"><table width="85%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="19%" height="30" valign="middle"><div style="font-weight: normal; text-align: right; background-color: #FFFFFF; color: #1682E0; font-size: 14px; line-height: 12px; text-shadow: 2px 2px 2px rgba(51, 51, 51, 0.6); margin: 5px 5px 5px 5px;">Nombre del Archivo</div></th>
              <td width="81%" height="30" valign="middle"><div style="font-weight: normal; text-align:left; margin: 0px 5px 0px 5px; background-color: #FFFFFF; color: #5912FF; font-size: 12px; line-height: 10px; text-shadow: 2px 2px 2px rgba(51, 51, 51, 0.6);"><?php echo $_POST['txtFile'].$_POST['optExtension']; ?></div></th>
            </tr>
            <tr>
              <td height="30" valign="middle"><div style="font-weight: normal; text-align: right; background-color: #FFFFFF; color: #1682E0; font-size: 14px; line-height: 12px; text-shadow: 2px 2px 2px rgba(51, 51, 51, 0.6); margin: 5px 5px 5px 5px;">Tipo de Formato</div></td>
              <td height="30" valign="middle"><div style="font-weight: normal; text-align:left; margin: 0px 5px 0px 5px; background-color: #FFFFFF; color: #5912FF; font-size: 12px; line-height: 10px; text-shadow: 2px 2px 2px rgba(51, 51, 51, 0.6);"><?php
			  if ( $_POST['optExtension']=='.xlsx' ) echo 'Ms Office 2007';
			  if ( $_POST['optExtension']=='.xls' ) echo 'Ms Office 95';
			  if ( $_POST['optExtension']=='.csv' ) echo 'Texto plano separado por comas &quot&cedil;&quot;';
			  if ( $_POST['optExtension']=='.dbf' ) echo 'dBase Plus';
			  if ( $_POST['optExtension']=='.xml' ) echo 'Formato XML (Lenguaje de Marcas eXtensible)';
			  ?></div></td>
            </tr>
          </table>
        </div></td>
      </tr>
      <tr>
    <td height="40" align="center" valign="middle"><table width="22%" border="0" cellpadding="0" cellspacing="0" ><tr><td width="34%" height="30" align="center" valign="middle"><input name="btnRegreso" type="submit" class="glow2" id="btnRegreso" title="Pulse aqui para Regresar a la pantalla INICIAL..." value="Regresar"  /></td><td width="66%" height="30" align="center" valign="middle"><?php
	if ( $_POST['rdbComprimir'] == 'Si' ) {
		echo '<a href="../downloads/retiros_exportados/'.$_POST['txtFile'].$_POST['optExtension'].'" target="_blank" title="Pulse aqui para descargar &laquo;'.$_POST['txtFile'].$_POST['optExtension'].'&raquo;..."><img src="../imagenes/boton-descargar.fw.png" width="100" height="30" alt="Descargar_Excel" /></a>';
		echo '<a href="../downloads/retiros_exportados/'.$_POST['txtFile'].'.zip" target="_blank" title="Pulse aqui para descargar &laquo;'.$_POST['txtFile'].'.zip&raquo;..."><img src="../imagenes/boton-descargar2.zip.fw.png" width="100" height="30" alt="Descargar_ZIP" /></a>';
	}
	else {
		echo '<a href="../downloads/retiros_exportados/'.$_POST['txtFile'].$_POST['optExtension'].'" target="_blank" title="Pulse aqui para descargar &laquo;'.$_POST['txtFile'].$_POST['optExtension'].'&raquo;..."><img src="../imagenes/boton-descargar.fw.png" width="100" height="30" alt="Descargar_Excel" /></a>';
	}
	?></td></tr></table></td>
      </tr>
      <tr>
        <td height="40" align="center" valign="middle"><div class="txt_pie" style="margin: 10px 35px 10px 35px;"><?php
		//===============================================================================================================================
		// XML 
		//===============================================================================================================================
		if ( $_POST['optExtension'] == '.xml' ) {
			echo ($_POST['rdbInformar'] == 'Si' ? 'Creando XML...<br />' : '');
			$XML = new DOMDocument("1.0", "UTF-8");
			$XML->formatOutput = true;
			$XML->preserveWhiteSpace = true;
			echo ($_POST['rdbInformar'] == 'Si' ? 'Primera estructura del XML...<br />' : '');
			$XML_raiz = $XML->createElement("Retiros");
			$XML_raiz = $XML->appendChild($XML_raiz);
			$XML_datobase = $XML->createElement("DatosBase");
			$XML_datobase = $XML_raiz->appendChild($XML_datobase);
			$resultset = Decddper($_POST['txtAID'],$_POST['txtACI']);
			mysqli_data_seek($resultset, 0);
			$agregar_cabecera = true;
			echo ($_POST['rdbInformar'] == 'Si' ? 'Segunda estructura (bucle) del XML...<br />' : '');
			while ($estafila = mysqli_fetch_array($resultset, MYSQLI_ASSOC)) {
				if ( $agregar_cabecera ) {
					$agregar_cabecera = false;
					$XML_id = $XML->createElement("Id",$estafila['idretiro']);
					$XML_id = $XML_datobase->appendChild($XML_id);
					$XML_cedula = $XML->createElement("CI",$estafila['aci']);
					$XML_cedula = $XML_datobase->appendChild($XML_cedula);
					$XML_nombre = $XML->createElement("Nombre",$estafila['primernombre'].' '.$estafila['segundonombre']);
					$XML_nombre = $XML_datobase->appendChild($XML_nombre);
					$XML_apellido = $XML->createElement("Apellido",$estafila['primerapellido'].' '.$estafila['segundoapellido']);
					$XML_apellido = $XML_datobase->appendChild($XML_apellido);
					$XML_facultad = $XML->createElement("Facultad",$estafila['nombre_de_facultad']);
					$XML_facultad = $XML_datobase->appendChild($XML_facultad);
					$XML_escuela = $XML->createElement("Escuela",$estafila['aescuela'].' | '.$estafila['nombre_de_escuela']);
					$XML_escuela = $XML_datobase->appendChild($XML_escuela);
					$XML_mencion = $XML->createElement("Mencion",$estafila['amencion'].' | '.$estafila['nombre_de_mencion']);
					$XML_mencion = $XML_datobase->appendChild($XML_mencion);
					$XML_fecha = $XML->createElement("Fecha_Retiro",$estafila['fecha_del_retiro']);
					$XML_fecha = $XML_datobase->appendChild($XML_fecha);
					$XML_observacion = $XML->createElement("Obs",$estafila['observacion_del_documento']);
					$XML_observacion = $XML_datobase->appendChild($XML_observacion);
					$XML_activo = $XML->createElement("Activo",$estafila['aactivo'].' | '.$estafila['descripcion_del_activo']);
					$XML_activo = $XML_datobase->appendChild($XML_activo);
					$XML_pasivo = $XML->createElement("Pasivo",$estafila['apasivo'].' | '.$estafila['descripcion_del_pasivo']);
					$XML_pasivo = $XML_datobase->appendChild($XML_pasivo);
					$XML_retirobase = $XML->createElement("DocumentosRetirados");
					$XML_retirobase = $XML_raiz->appendChild($XML_retirobase);
				}
				$XML_numero_doc = $XML->createElement("Numero",$estafila['iddocumento']);
				$XML_numero_doc = $XML_retirobase->appendChild($XML_numero_doc);
				$XML_nombre_doc = $XML->createElement("Documento",$estafila['descripcion_del_documento']);
				$XML_nombre_doc = $XML_retirobase->appendChild($XML_nombre_doc);
				$XML_observacion_doc = $XML->createElement("Obs_del_Doc",$estafila['observacion_particular_del_documento']);
				$XML_observacion_doc = $XML_retirobase->appendChild($XML_observacion_doc);
			}
			mysqli_free_result($resultset);
			//$XML->formatOutput = true;
			echo ($_POST['rdbInformar'] == 'Si' ? 'Guardando XML...<br />' : '');
			$XML_strings = $XML->saveXML();
			echo ($_POST['rdbInformar'] == 'Si' ? $XML_strings.'...<br />' : '');
			$XML_bytes = $XML->save('../downloads/retiros_exportados/' . $_POST['txtFile'] . $_POST['optExtension']);
			echo ($_POST['rdbInformar'] == 'Si' ? 'Escrito: ' . $XML_bytes . ' bytes...<br />' : '');
		}
		//===============================================================================================================================
		// CSV 
		//===============================================================================================================================
		if ( $_POST['optExtension'] == '.csv' ) {
			$salida_cvs = '';
			$columnas = 0;
			echo ($_POST['rdbInformar'] == 'Si' ? 'Sacando la Información...<br />' : '');
			$resultset = Decddper($_POST['txtAID'],$_POST['txtACI']);
			mysqli_data_seek($resultset, 0);
			echo ($_POST['rdbInformar'] == 'Si' ? 'Colocando Rótulos...<br />' : '');
			while ($finfo = $resultset->fetch_field()) {
				$salida_cvs .= $finfo->name . ",";
				$columnas++;
			}
			$salida_cvs .= "\r\n";
			mysqli_data_seek($resultset, 0);
			echo ($_POST['rdbInformar'] == 'Si' ? 'Vaciando la Información...<br />' : '');
			while ($fila = mysqli_fetch_row($resultset)) {
				for ($j=0;$j<$columnas;$j++) {
					$salida_cvs .= $fila[$j].", ";
				}
				$salida_cvs .= "\r\n";
			}
			$salida_cvs .= "\r\n";
			mysqli_free_result($resultset);
			$ApuntadorDeArchivo = fopen('../downloads/retiros_exportados/' . $_POST['txtFile'] . $_POST['optExtension'], 'w');
			$Ok = fwrite($ApuntadorDeArchivo, $salida_cvs);
			if ( !$Ok ){
				echo ($_POST['rdbInformar'] == 'Si' ? 'No se pudo crear el archivo'.$_POST['txtFile'].$_POST['optExtension'].'...<br />' : '');
			}
			else {
				echo ($_POST['rdbInformar'] == 'Si' ? 'Grabado: '.$Ok.' bytes...<br />' : '');
			}
			if ( fclose($ApuntadorDeArchivo) ) {
				echo ($_POST['rdbInformar'] == 'Si' ? 'Proceso concluido con Éxito...<br />' : '');
			}
			else {
				echo ($_POST['rdbInformar'] == 'Si' ? 'NO se pudo CERRAR el ARCHIVO '.$_POST['txtFile'].$_POST['optExtension'].'...<br />' : '');
			}
		}
		//===============================================================================================================================
		// Dbase 
		//===============================================================================================================================
		  if ( $_POST['optExtension'] == '.dbf' ) {
			  $HayRegistros = false;
			  $arreiglo = array(
			  	array("idretiro",		"C",	20),
				array("id_doc",			"N",	3,	0),
				array("des_doc",		"C",	100),
				array("obsp_doc",		"C",	150),
				array("obs_doc",		"C",	150),
				array("fech_ret",		"D"),
				array("amencion",		"C",	1),
				array("nom_men",		"C",	100),
				array("aescuela",		"C",	3),
				array("nom_esc",		"C",	100),
				array("nom_fac",		"C",	100),
				array("apasivo",		"C",	1),
				array("des_pas",		"C",	100),
				array("aactivo",		"C",	1),
				array("des_act",		"C",	100),
				array("obs_ret",		"C",	150),
				array("aci",			"N",	8,	0),
				array("p_nombre",		"C",	30),
				array("s_nombre",		"C",	30),
				array("p_apellido",		"C",	30),
				array("s_apellido",		"C",	30),
			  );
			  // creación
			  echo ($_POST['rdbInformar'] == 'Si' ? 'Creando Base de Datos...<br />' : '');
			  $database = dbase_create ('../downloads/retiros_exportados/' . $_POST['txtFile'] . $_POST['optExtension'], $arreiglo);
			  if ( !$database ) {
				  echo ($_POST['rdbInformar'] == 'Si' ? 'No se puede crear la base de datos...<br />' : '');
			  }
			  else {
				  echo ($_POST['rdbInformar'] == 'Si' ? 'Base de Datos CREADA...<br />' : '');
				  if ($database) {
					  $resultset = Decddper($_POST['txtAID'],$_POST['txtACI']);
					  mysqli_data_seek($resultset, 0);
					  while ($estafila = mysqli_fetch_array($resultset, MYSQLI_ASSOC)) {
						  $HayRegistros = true;
						  dbase_add_record($database, array(
							  $estafila['idretiro'], 
							  $estafila['iddocumento'], 
							  $estafila['descripcion_del_documento'], 
							  $estafila['observacion_particular_del_documento'],
							  $estafila['observacion_del_documento'],
							  $estafila['fecha_del_retiro'],
							  $estafila['amencion'],
							  $estafila['nombre_de_mencion'],
							  $estafila['aescuela'],
							  $estafila['nombre_de_escuela'],
							  $estafila['nombre_de_facultad'],
							  $estafila['apasivo'],
							  $estafila['descripcion_del_pasivo'],
							  $estafila['aactivo'],
							  $estafila['descripcion_del_activo'],
							  $estafila['observacion_del_retiro'],
							  $estafila['aci'],
							  $estafila['primernombre'],
							  $estafila['segundonombre'],
							  $estafila['primerapellido'],
							  $estafila['segundoapellido'] ));   
					  }
					  if ( $HayRegistros ) echo ($_POST['rdbInformar'] == 'Si' ? 'Base de Datos Lista y con registros...<br />' : '');
					  mysqli_free_result($resultset);
					  dbase_close($database);
				  }
			  }
		  }
		//===============================================================================================================================
		// Excel
		//===============================================================================================================================
		  if ( $_POST['optExtension'] == '.xlsx' || $_POST['optExtension'] == '.xls' ) {
			  if ( $_POST['rdbInformar'] == 'Si' ) {
				  ini_set('display_errors', TRUE);
				  ini_set('display_startup_errors', TRUE);
			  }
			  // ----
			  // Declarando Constante
			  // ----
			  echo ($_POST['rdbInformar'] == 'Si' ? 'Declarando Constante...<br />' : '');
			  define('PHPEXCEL_DOWNLOAD', substr(__DIR__,0,strpos(__DIR__,'formularios')).'downloads\\retiros_exportados\\');
			  // ----
			  // Declarando Variables
			  // ----
			  echo ($_POST['rdbInformar'] == 'Si' ? 'Declarando Variables...<br />' : '');
			  $xCreador = 'Archivo creado desde la aplicación de la IntraNet de la DiGAEs UC.';
			  $xUltimaModificacion = 'Última modificación: '.fecha();
			  $xTitulo = 'Retiros de la Universidad de Carabobo.';
			  $xSubject = 'Dirección General de Asuntos Estudiantiles.';
			  $xDescripcion = 'Nómina de Retiros procesada por la Dirección General de Asuntos Estudiantiles de la Universidad de Carabobo desde la IntraNet por el operador: '.$unombre.' en fecha: '.fecha();
			  $xPalabrasClaves = 'intranet retiros digaes uc universidad carabobo office PHPExcel';
			  $xCategoria = 'Retiros';
			  $xNombreDeHoja = 'Retiro_Individual';
			  $rUC = 'Universidad de Carabobo';
			  $rSecretaria = 'Secretaría';
			  $rDiGAEs = 'Dirección General de Asuntos Estudiantiles';
			  $rTitulo = 'Retiro Individual';
			  $rFacultad = 'Facultad:';
			  $rEscuela = 'Escuela:';
			  $rMencion = 'Mención:';
			  $rCedula = 'Cédula:';
			  $rNombre = 'Nombre:';
			  $rApellido = 'Apellido:';
			  $rDocQueRetiro = 'Documento(s) que Retiró';
			  $rFecha = 'Fecha:';
			  $rBandera = true;
			  $rFila = 12;
			  // ----
			  // Incluyendo Librerías
			  // ----
			  echo ($_POST['rdbInformar'] == 'Si' ? 'Incluyendo Librerías...<br />' : '');
			  require_once '../classes/PHPExcel.php';
			  // ----
			  // Creando Objeto PHPExcel
			  // ----
			  echo ($_POST['rdbInformar'] == 'Si' ? 'Creando Objeto...PHPExcel<br />' : '');
			  $objPHPExcel = new PHPExcel();
			  // ----
			  // Creando Objeto PHPExcel_Worksheet_Drawing
			  // ----
			  echo ($_POST['rdbInformar'] == 'Si' ? 'Creando Objeto...Drawing<br />' : '');
			  $objDrawing = new PHPExcel_Worksheet_Drawing();
			  $objDrawing->setName('Escudo_UC');
			  $objDrawing->setDescription('Escudo de la Universidad de Carabobo');
			  $objDrawing->setPath('../imagenes/escudo_uc_1.jpg');
			  $objDrawing->setCoordinates('A1');
			  $objDrawing->setResizeProportional(true);
			  $objDrawing->setHeight(56);
			  $objDrawing->setOffsetX(13);
			  $objDrawing->setOffsetY(3);
			  $obj2Drawing = new PHPExcel_Worksheet_Drawing();
			  $obj2Drawing->setName('Logo_DiGAEs');
			  $obj2Drawing->setDescription('Dirección General de Asuntos Esudiantiles');
			  $obj2Drawing->setPath('../imagenes/DiGAEs Transparente.png');
			  $obj2Drawing->setCoordinates('H1');
			  $obj2Drawing->setResizeProportional(true);
			  $obj2Drawing->setHeight(56);
			  $obj2Drawing->setOffsetX(1);
			  $obj2Drawing->setOffsetY(3);
			  $obj3Drawing = new PHPExcel_Worksheet_Drawing();
			  $obj3Drawing->setName('Logo_PHPExcel');
			  $obj3Drawing->setDescription('Librería de PHPExcel');
			  $obj3Drawing->setPath('../imagenes/phpexcel_logo.fw.png');
			  $obj3Drawing->setCoordinates('G26');
			  //$obj3Drawing->setCoordinates('G41');
			  $obj3Drawing->setResizeProportional(true);
			  $obj3Drawing->setWidth(150);
			  $obj3Drawing->setOffsetX(1);
			  $obj3Drawing->setOffsetY(1);
			  // ----
			  // Posicionandose en el Libro
			  // ----
			  echo ($_POST['rdbInformar'] == 'Si' ? 'Posicionandose en el Libro...<br />' : '');
			  $objPHPExcel->setActiveSheetIndex(0);
			  // ----
			  // Vinculando la Imagen con la Hoja
			  // ----
			  echo ($_POST['rdbInformar'] == 'Si' ? 'Vinculando la Imagen con la Hoja...<br />' : '');
			  $objDrawing->setWorksheet($objPHPExcel->getActiveSheet());
			  $obj2Drawing->setWorksheet($objPHPExcel->getActiveSheet());
			  $obj3Drawing->setWorksheet($objPHPExcel->getActiveSheet());
			  // ----
			  // Aplicando Propiedades al Libro y Hoja
			  // ----
			  echo ($_POST['rdbInformar'] == 'Si' ? 'Asignado Propiedades...<br />' : '');
			  $objPHPExcel->getProperties()->setCreator($xCreador)
										   ->setLastModifiedBy($xUltimaModificacion)
										   ->setTitle($xTitulo)
										   ->setSubject($xSubject)
										   ->setDescription($xDescripcion)
										   ->setKeywords($xPalabrasClaves)
										   ->setCategory($xCategoria);
			  echo ($_POST['rdbInformar'] == 'Si' ? 'Indicando Tamaño, Orientación y Centrado del Libro...<br />' : '');
			  $objPHPExcel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT)
															->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_LETTER)
															->setFitToPage(false)
															->setHorizontalCentered(true)
															->setVerticalCentered(true);
			  echo ($_POST['rdbInformar'] == 'Si' ? 'Definiendo Márgenes...<br />' : '');
			  $objPHPExcel->getActiveSheet()->getPageMargins()->setTop(1)
															  ->setRight(0.5)
															  ->setLeft(0.5)
															  ->setBottom(1);
			  /* siendo indiferente la primera, pares e impares, daría lo mismo con setEven setFirst ó setOdd */
			  echo ($_POST['rdbInformar'] == 'Si' ? 'Definiendo los Header y Footer...<br />' : '');
			  $objPHPExcel->getActiveSheet()->getHeaderFooter()->setDifferentFirst(false)
															   ->setDifferentOddEven(false)
															   ->setOddHeader('&C&HDocumento de uso confidencial!')
															   ->setOddFooter('&L&B'.$objPHPExcel->getProperties()->getTitle().utf8_encode('&RPágina &P/&N'));
			  echo ($_POST['rdbInformar'] == 'Si' ? 'Dando nombre a la Hoja...<br />' : '');
			  $objPHPExcel->getActiveSheet()->setTitle($xNombreDeHoja);
			  echo ($_POST['rdbInformar'] == 'Si' ? 'Aplicando Fusión de Celdas a la Hoja...<br />' : '');
			  $objPHPExcel->getActiveSheet()->mergeCells('B1:G1')
											->mergeCells('B2:G2')
											->mergeCells('B3:G3')
											->mergeCells('A4:I4')
											->mergeCells('B5:I5')
											->mergeCells('B6:I6')
											->mergeCells('B7:I7')
											->mergeCells('B8:C8')
											->mergeCells('B9:I9')
											->mergeCells('B10:I10')
											->mergeCells('A11:G11')
											->mergeCells('A12:G12')
											->mergeCells('A13:G13')
											->mergeCells('A14:G14')
											->mergeCells('A15:G15')
											->mergeCells('A16:G16')
											->mergeCells('A17:G17')
											->mergeCells('A18:G18')
											->mergeCells('A19:G19')
											->mergeCells('A20:G20')
											->mergeCells('A21:G21')
											->mergeCells('A22:G22')
											->mergeCells('A23:G23')
											->mergeCells('A24:G24')
											->mergeCells('A25:G25');
			  echo ($_POST['rdbInformar'] == 'Si' ? 'Aplicando ALINEANCIÓN GLOBAL a Celdas de la Hoja...<br />' : '');
			  $objPHPExcel->getActiveSheet()->getStyle('A1:I25')->getAlignment()->applyFromArray(
					array(
						'horizontal'	=>	PHPExcel_Style_Alignment::HORIZONTAL_GENERAL,
						'vertical'		=>	PHPExcel_Style_Alignment::VERTICAL_CENTER,
						'rotation'		=>	0,
						'wrap'			=>	TRUE));
			  echo ($_POST['rdbInformar'] == 'Si' ? 'Aplicando ESTILO GLOBAL a Celdas de la Hoja...<br />' : '');
			  $objPHPExcel->getActiveSheet()->getStyle('A1:I25')->applyFromArray(
					array(
						'font'	=>	array(
										'name'		=>	'Calibri',
										'size'		=>	11),
										'bold'		=>	false,
										'italic'	=>	false,
										'underline'	=>	PHPExcel_Style_Font::UNDERLINE_NONE,
										'strike'	=>	false,
										'color'		=>	PHPExcel_Style_Color::COLOR_BLACK));
			  echo ($_POST['rdbInformar'] == 'Si' ? 'Aplicando ALINEACIÓN/CENTRADO INDIVIDUAL a Celdas de la Hoja...<br />' : '');
			  $objPHPExcel->getActiveSheet()->getStyle('A5:A10')->getAlignment()->applyFromArray(
					array(
						'horizontal'	=>	PHPExcel_Style_Alignment::HORIZONTAL_RIGHT,
						'vertical'		=>	PHPExcel_Style_Alignment::VERTICAL_CENTER,
						'rotation'		=>	0,
						'wrap'			=>	FALSE));
			  $objPHPExcel->getActiveSheet()->getStyle('B5:B10')->getAlignment()->applyFromArray(
					array(
						'horizontal'	=>	PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
						'vertical'		=>	PHPExcel_Style_Alignment::VERTICAL_CENTER,
						'rotation'		=>	0,
						'wrap'			=>	FALSE));
			  $objPHPExcel->getActiveSheet()->getStyle('H11')->getAlignment()->applyFromArray(
					array(
						'horizontal'	=>	PHPExcel_Style_Alignment::HORIZONTAL_RIGHT,
						'vertical'		=>	PHPExcel_Style_Alignment::VERTICAL_CENTER,
						'rotation'		=>	0,
						'wrap'			=>	TRUE));
			  $objPHPExcel->getActiveSheet()->getStyle('I11')->getAlignment()->applyFromArray(
					array(
						'horizontal'	=>	PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
						'vertical'		=>	PHPExcel_Style_Alignment::VERTICAL_CENTER,
						'rotation'		=>	0,
						'wrap'			=>	FALSE));
			  $objPHPExcel->getActiveSheet()->getStyle('B1:B3')->getAlignment()->applyFromArray(
					array(
						'horizontal'	=>	PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
						'vertical'		=>	PHPExcel_Style_Alignment::VERTICAL_CENTER,
						'rotation'		=>	0,
						'wrap'			=>	TRUE));
			  $objPHPExcel->getActiveSheet()->getStyle('A4')->getAlignment()->applyFromArray(
					array(
						'horizontal'	=>	PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
						'vertical'		=>	PHPExcel_Style_Alignment::VERTICAL_CENTER,
						'rotation'		=>	0,
						'wrap'			=>	TRUE));
			  $objPHPExcel->getActiveSheet()->getStyle('A11')->getAlignment()->applyFromArray(
					array(
						'horizontal'	=>	PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
						'vertical'		=>	PHPExcel_Style_Alignment::VERTICAL_CENTER,
						'rotation'		=>	0,
						'wrap'			=>	TRUE));
//			  $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(11)
//											->getColumnDimension('H')->setAutoSize(true);
			  echo ($_POST['rdbInformar'] == 'Si' ? 'Aplicando ESTILO INDIVIDUAL a Celdas de la Hoja...<br />' : '');
			  $objPHPExcel->getActiveSheet()->getStyle('B1:B3')->applyFromArray(
					array(
						'font'	=>	array(
										'bold'	=>	true,
										'size'	=>	12),
						'numberformat'	=>	array(
												'code'	=>	PHPExcel_Style_NumberFormat::FORMAT_TEXT)));
			  $objPHPExcel->getActiveSheet()->getStyle('A4')->applyFromArray(
					array(
						'font'	=>	array(
										'bold'	=>	true,
										'size'	=>	16)));
			  $objPHPExcel->getActiveSheet()->getStyle('A5:A10')->applyFromArray(
					array(
						'font'	=>	array(
										'bold'	=>	true,
										'size'	=>	11)));
			  $objPHPExcel->getActiveSheet()->getStyle('A11')->applyFromArray(
					array(
						'font'	=>	array(
										'bold'	=>	true,
										'size'	=>	11)));
			  $objPHPExcel->getActiveSheet()->getStyle('H11')->applyFromArray(
					array(
						'font'	=>	array(
										'bold'	=>	true,
										'size'	=>	11)));
			  echo ($_POST['rdbInformar'] == 'Si' ? 'Aplicando FORMATO INDIVIDUAL a Celdas de la Hoja...<br />' : '');
			  // $objPHPExcel->getActiveSheet()->getStyle('C9')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_YYYYMMDD2);
			  $objPHPExcel->getActiveSheet()->getStyle('A4')->getNumberFormat()->applyFromArray(
					array(
						'code'	=>	PHPExcel_Style_NumberFormat::FORMAT_TEXT));
			  $objPHPExcel->getActiveSheet()->getStyle('A5:A10')->getNumberFormat()->applyFromArray(
					array(
						'code'	=>	PHPExcel_Style_NumberFormat::FORMAT_TEXT));
			  $objPHPExcel->getActiveSheet()->getStyle('B5:B7')->getNumberFormat()->applyFromArray(
					array(
						'code'	=>	PHPExcel_Style_NumberFormat::FORMAT_TEXT));
			  $objPHPExcel->getActiveSheet()->getStyle('B8')->getNumberFormat()->applyFromArray(
					array(
						'code'	=>	PHPExcel_Style_NumberFormat::FORMAT_NUMBER));
			  $objPHPExcel->getActiveSheet()->getStyle('B9:B10')->getNumberFormat()->applyFromArray(
					array(
						'code'	=>	PHPExcel_Style_NumberFormat::FORMAT_TEXT));
			  $objPHPExcel->getActiveSheet()->getStyle('A11:A25')->getNumberFormat()->applyFromArray(
					array(
						'code'	=>	PHPExcel_Style_NumberFormat::FORMAT_TEXT));
			  $objPHPExcel->getActiveSheet()->getStyle('H11')->getNumberFormat()->applyFromArray(
					array(
						'code'	=>	PHPExcel_Style_NumberFormat::FORMAT_TEXT));
			  $objPHPExcel->getActiveSheet()->getStyle('I11')->getNumberFormat()->applyFromArray(
					array(
						'code'	=>	PHPExcel_Style_NumberFormat::FORMAT_DATE_DDMMYYYY));
			  // ----
			  // Incrustando la DATA a la Hoja
			  // ----
			  echo ($_POST['rdbInformar'] == 'Si' ? 'Incrustando Data...<br />' : '');
			  $objPHPExcel->getActiveSheet()->setCellValue('B1', $rUC)
											->setCellValue('B2', utf8_encode($rSecretaria))
											->setCellValue('B3', utf8_encode($rDiGAEs))
											->setCellValue('A4', $rTitulo)
											->setCellValue('A5', $rFacultad)
											->setCellValue('A6', $rEscuela)
											->setCellValue('A7', utf8_encode($rMencion))
											->setCellValue('A8', utf8_encode($rCedula))
											->setCellValue('A9', $rNombre)
											->setCellValue('A10', $rApellido)
											->setCellValue('A11', utf8_encode($rDocQueRetiro))
											->setCellValue('H11', $rFecha);
			  echo ($_POST['rdbInformar'] == 'Si' ? 'Incrustando Data de la Tabla...<br />' : '');
			  $resultset = Decddper($_POST['txtAID'],$_POST['txtACI']);
			  mysqli_data_seek($resultset, 0);
			  while ($estafila = mysqli_fetch_array($resultset, MYSQLI_ASSOC)) {
				  if ( $rBandera ) {
					  $rBandera = false;
					  $objPHPExcel->getActiveSheet()->setCellValue('B5', utf8_encode($estafila['nombre_de_facultad']))
													->setCellValue('B6', utf8_encode($estafila['nombre_de_escuela']))
													->setCellValue('B7', utf8_encode($estafila['nombre_de_mencion']))
													->setCellValue('B8', $estafila['aci'])
													->setCellValue('B9', utf8_encode($estafila['primernombre']))
													->setCellValue('B10', utf8_encode($estafila['primerapellido']))
													->setCellValue('I11', $estafila['fecha_del_retiro']);
				  }
				  $objPHPExcel->getActiveSheet()->setCellValue('A' . $rFila, utf8_encode($estafila['descripcion_del_documento']));
				  $rFila++;
			  }
			  mysqli_free_result($resultset);
			  // ----
			  // Guardando el Archivo
			  // ----
			  echo ($_POST['rdbInformar'] == 'Si' ? 'Guardando Archivo...<br />' : '');
			  //if ( $_POST['optExtension'] == '.xlsx' ) $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, "Excel2007");
			  //if ( $_POST['optExtension'] == '.xls' ) $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, "Excel5");
			  if ( $_POST['optExtension'] == '.xlsx' ) $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
			  if ( $_POST['optExtension'] == '.xls' ) $objWriter = new PHPExcel_Writer_Excel5($objPHPExcel);
			  $objWriter->save(PHPEXCEL_DOWNLOAD . $_POST['txtFile'] . $_POST['optExtension']);
		}
		//===============================================================================================================================
		// Crear ZIP...?
		//===============================================================================================================================
		if ( $_POST['rdbComprimir'] == 'Si' ) {
			$zip = new ZipArchive();
			if ( file_exists('../downloads/retiros_exportados/' . $_POST['txtFile'] . '.zip') ) {
				$zipSePudoAbrir = $zip->open('../downloads/retiros_exportados/' . $_POST['txtFile'] . '.zip', ZipArchive::OVERWRITE);
			}
			else {
				$zipSePudoAbrir = $zip->open('../downloads/retiros_exportados/' . $_POST['txtFile'] . '.zip', ZipArchive::CREATE);
			}
			if ( $zipSePudoAbrir ) {
				echo ($_POST['rdbInformar'] == 'Si' ? 'Creando Archivo ZIP...<br />' : '');
				$zip->addFile('../downloads/retiros_exportados/' . $_POST['txtFile'] . $_POST['optExtension'], $_POST['txtFile'] . $_POST['optExtension']);
				echo ($_POST['rdbInformar'] == 'Si' ? 'Número de Ficheros en el ZIP: ' . $zip->numFiles . ' ...<br />' : '');
				echo ($_POST['rdbInformar'] == 'Si' ? 'Estatus del ZIP: ' . $zip->status . ' ...<br />' : '');
				$zip->close();
				echo ($_POST['rdbInformar'] == 'Si' ? 'SE HA CREADO EL Archivo ZIP...<br />' : '');
			}
			else {
				echo ($_POST['rdbInformar'] == 'Si' ? 'NO SE PUDO CREAR EL Archivo ZIP...<br />' : '');
				echo ZipArchive::ER_OPEN;
			}
		}
        ?></div></td>
      </tr>
    </table>
  </form>
<!-- InstanceEndEditable --></td>
  </tr>
</table>
</div>
</body>
<!-- InstanceEnd --></html>
<!--/**Viene de Style
     * <code>
     * $objPHPExcel->getActiveSheet()->getStyle('B2')->applyFromArray(
     *         array(
     *             'font'    => array(
     *                 'name'      => 'Arial',
     *                 'bold'      => true,
     *                 'italic'    => false,
     *                 'underline' => PHPExcel_Style_Font::UNDERLINE_DOUBLE,
     *                 'strike'    => false,
     *                 'color'     => array(
     *                     'rgb' => '808080'
     *                 )
     *             ),
     *             'borders' => array(
     *                 'bottom'     => array(
     *                     'style' => PHPExcel_Style_Border::BORDER_DASHDOT,
     *                     'color' => array(
     *                         'rgb' => '808080'
     *                     )
     *                 ),
     *                 'top'     => array(
     *                     'style' => PHPExcel_Style_Border::BORDER_DASHDOT,
     *                     'color' => array(
     *                         'rgb' => '808080'
     *                     )
     *                 )
     *             )
     *         )
     * );
     * </code>
**/

	/**Viene de Font
	 * Apply styles from array
	 *
	 * <code>
	 * $objPHPExcel->getActiveSheet()->getStyle('B2')->getFont()->applyFromArray(
	 *		array(
	 *			'name'		=> 'Arial',
	 *			'bold'		=> TRUE,
	 *			'italic'	=> FALSE,
	 *			'underline' => PHPExcel_Style_Font::UNDERLINE_DOUBLE,
	 *			'strike'	=> FALSE,
	 *			'color'		=> array(
	 *				'rgb' => '808080'
	 *			)
	 *		)
	 * );
	 * </code>
	 *
	 * @param	array	$pStyles	Array containing style information
	 * @throws	PHPExcel_Exception
	 * @return PHPExcel_Style_Font
	 */-->
