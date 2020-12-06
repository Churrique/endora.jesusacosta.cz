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
  ?>
  <form name="FrmExpOk" method="post" action="form-retiros-exporta-todo-2.php">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="10" colspan="2">&nbsp;</td>
    </tr>
  <tr>
    <td height="40" colspan="2" class="gradiente_gris2"><span class="texto_decorado_blanco_amarillo">Exportando los Retiros</span></td>
    </tr>
  <tr>
    <td height="5" colspan="2">&nbsp;</td>
    </tr>
  <tr>
    <td height="10" colspan="2" align="center" valign="middle" class="Inportant"><?php
	$xConeccion = CR_1er_Paso();
	if ( is_object($xConeccion) ) {
		//==============================================================================================================================//
		// Comparaciones previas para armar el WHERE...
		//==============================================================================================================================//
		//******************************//
		//****** CEDULA >=X<=
		//******************************//
		if ( !empty($_POST['txtCIDesde']) && !empty($_POST['txtCIHasta']) ) {
			$xResultado = CR_2do_Paso($xConeccion,'WHERE `aci` >= '.$_POST['txtCIDesde'].' AND `aci` <= '.$_POST['txtCIHasta']); 
			if ( !is_object($xResultado) ) {
				echo $xResultado;
			}
		}
		//******************************//
		//****** CEDULA =
		//******************************//
		if ( !empty($_POST['txtCIDesde']) && empty($_POST['txtCIHasta']) && !isset($_POST['chkApartir']) ) {
			$xResultado = CR_2do_Paso($xConeccion,'WHERE `aci` = '.$_POST['txtCIDesde']); 
			if ( !is_object($xResultado) ) {
				echo $xResultado;
			}
		}
		//******************************//
		//****** CEDULA >=
		//******************************//
		if ( !empty($_POST['txtCIDesde']) && empty($_POST['txtCIHasta']) && isset($_POST['chkApartir']) ) {
			$xResultado = CR_2do_Paso($xConeccion,'WHERE `aci` >= '.$_POST['txtCIDesde']); 
			if ( !is_object($xResultado) ) {
				echo $xResultado;
			}
		}
		//******************************//
		//****** FECHA TRANSCRIPCIÓN >=X<=
		//******************************//
		if ( !empty($_POST['txtTFechDesde']) && !empty($_POST['txtTFechHasta']) ) {
			$xResultado = CR_2do_Paso($xConeccion,"WHERE `fecha_de_transcripcion` >= '".$_POST['txtTFechDesde']."' AND `fecha_del_retiro` <= '".$_POST['txtTFechHasta']."'"); 
			if ( !is_object($xResultado) ) {
				echo $xResultado;
			}
		}
		//******************************//
		//****** FECHA TRANSCRIPCIÓN =
		//******************************//
		if ( !empty($_POST['txtTFechDesde']) && empty($_POST['txtTFechHasta']) && !isset($_POST['chkATFecha']) ) {
			$xResultado = CR_2do_Paso($xConeccion,"WHERE `fecha_de_transcripcion` = '".$_POST['txtTFechDesde']."'"); 
			if ( !is_object($xResultado) ) {
				echo $xResultado;
			}
		}
		//******************************//
		//****** FECHA TRANSCRIPCIÓN >=
		//******************************//
		if ( !empty($_POST['txtTFechDesde']) && empty($_POST['txtTFechHasta']) && isset($_POST['chkATFecha']) ) {
			$xResultado = CR_2do_Paso($xConeccion,"WHERE `fecha_de_transcripcion` >= '".$_POST['txtTFechDesde']."'"); 
			if ( !is_object($xResultado) ) {
				echo $xResultado;
			}
		}
		//******************************//
		//****** FECHA RETIRO >=X<=
		//******************************//
		if ( !empty($_POST['txtRFechDesde']) && !empty($_POST['txtRFechHasta']) ) {
			$xResultado = CR_2do_Paso($xConeccion,"WHERE `fecha_del_retiro` >= '".$_POST['txtRFechDesde']."' AND `fecha_del_retiro` <= '".$_POST['txtRFechHasta']."'"); 
			if ( !is_object($xResultado) ) {
				echo $xResultado;
			}
		}
		//******************************//
		//****** FECHA RETIRO =
		//******************************//
		if ( !empty($_POST['txtRFechDesde']) && empty($_POST['txtRFechHasta']) && !isset($_POST['chkARFecha']) ) {
			$xResultado = CR_2do_Paso($xConeccion,"WHERE `fecha_del_retiro` = '".$_POST['txtRFechDesde']."'"); 
			if ( !is_object($xResultado) ) {
				echo $xResultado;
			}
		}
		//******************************//
		//****** FECHA RETIRO >=
		//******************************//
		if ( !empty($_POST['txtRFechDesde']) && empty($_POST['txtRFechHasta']) && isset($_POST['chkARFecha']) ) {
			$xResultado = CR_2do_Paso($xConeccion,"WHERE `fecha_del_retiro` >= '".$_POST['txtRFechDesde']."'"); 
			if ( !is_object($xResultado) ) {
				echo $xResultado;
			}
		}
	}
	else {
		echo $xConeccion;
	}
	?></td>
  <tr>
    <td height="10" colspan="2" align="center" valign="middle" class="Inportant">
    <?php
	//*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
	//*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
	//  MOSTRAR EL GRID  -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
	//*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
	//*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
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
	//*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
	//*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
	//  FIN DEL GRID  *-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
	//*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
	//*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
	?>
    </td>
    </tr>
  <tr>
    <td height="10" colspan="2" align="center" valign="middle" class="Inportant"><?php
	//:-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-)
	//:-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-)
	//   CREANDO LOS ARCHIVOS SEGÚN LA EXTENCIÓN  ):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-)
	//:-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-)
	//:-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-):-)
	if ( is_object($xConeccion) && is_object($xResultado) ) {
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
			mysqli_data_seek($xResultado, 0);
			$anterior = mysqli_fetch_assoc($xResultado);
			$aci_anterior = $anterior['aci'];
			$agregar_cabecera = true;
			echo ($_POST['rdbInformar'] == 'Si' ? 'Segunda estructura (bucle) del XML...<br />' : '');
			while ($estafila = mysqli_fetch_array($xResultado, MYSQLI_ASSOC)) {
				if ( $estafila['aci'] != $aci_anterior ) {
					$aci_anterior = $estafila['aci'];
					$agregar_cabecera = true;
				}
				if ( $agregar_cabecera ) {
					$agregar_cabecera = false;
					$XML_dato = $XML->createElement("Dato-ID:".$estafila['idretiro']);
					$XML_dato = $XML_raiz->appendChild($XML_dato);
					$XML_datobase = $XML->createElement("DatosBase");
					$XML_datobase = $XML_dato->appendChild($XML_datobase);
					$XML_id = $XML->createElement("Id",$estafila['idretiro']);
					$XML_id = $XML_datobase->appendChild($XML_id);
					$XML_cedula = $XML->createElement("CI",$estafila['aci']);
					$XML_cedula = $XML_datobase->appendChild($XML_cedula);
					$XML_nombre = $XML->createElement("Nombre",utf8_encode($estafila['primernombre'].' '.$estafila['segundonombre']));
					$XML_nombre = $XML_datobase->appendChild($XML_nombre);
					$XML_apellido = $XML->createElement("Apellido",utf8_encode($estafila['primerapellido'].' '.$estafila['segundoapellido']));
					$XML_apellido = $XML_datobase->appendChild($XML_apellido);
					$XML_facultad = $XML->createElement("Facultad",utf8_encode($estafila['nombre_de_facultad']));
					$XML_facultad = $XML_datobase->appendChild($XML_facultad);
					$XML_escuela = $XML->createElement("Escuela",$estafila['aescuela'].' | '.utf8_encode($estafila['nombre_de_escuela']));
					$XML_escuela = $XML_datobase->appendChild($XML_escuela);
					$XML_mencion = $XML->createElement("Mencion",$estafila['amencion'].' | '.utf8_encode($estafila['nombre_de_mencion']));
					$XML_mencion = $XML_datobase->appendChild($XML_mencion);
					$XML_fecha = $XML->createElement("Fecha_Retiro",$estafila['fecha_del_retiro']);
					$XML_fecha = $XML_datobase->appendChild($XML_fecha);
					$XML_tfecha = $XML->createElement("Fecha_Transcrito",$estafila['fecha_de_transcripcion']);
					$XML_tfecha = $XML_datobase->appendChild($XML_tfecha);
					$XML_observacion = $XML->createElement("Obs",$estafila['observacion_del_documento']);
					$XML_observacion = $XML_datobase->appendChild($XML_observacion);
					$XML_activo = $XML->createElement("Activo",$estafila['aactivo'].' | '.utf8_encode($estafila['descripcion_del_activo']));
					$XML_activo = $XML_datobase->appendChild($XML_activo);
					$XML_pasivo = $XML->createElement("Pasivo",$estafila['apasivo'].' | '.utf8_encode($estafila['descripcion_del_pasivo']));
					$XML_pasivo = $XML_datobase->appendChild($XML_pasivo);
					$XML_retirobase = $XML->createElement("DocumentosRetirados");
					$XML_retirobase = $XML_dato->appendChild($XML_retirobase);
				}
				$XML_numero_doc = $XML->createElement("Numero",$estafila['iddocumento']);
				$XML_numero_doc = $XML_retirobase->appendChild($XML_numero_doc);
				$XML_nombre_doc = $XML->createElement("Documento",utf8_encode($estafila['descripcion_del_documento']));
				$XML_nombre_doc = $XML_retirobase->appendChild($XML_nombre_doc);
				$XML_observacion_doc = $XML->createElement("Obs_del_Doc",utf8_encode($estafila['observacion_particular_del_documento']));
				$XML_observacion_doc = $XML_retirobase->appendChild($XML_observacion_doc);
			}
			echo ($_POST['rdbInformar'] == 'Si' ? 'Guardando XML...<br />' : '');
			$XML_strings = $XML->saveXML();
			echo ($_POST['rdbInformar'] == 'Si' ? utf8_decode($XML_strings).'...<br />' : '');
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
			mysqli_data_seek($xResultado, 0);
			echo ($_POST['rdbInformar'] == 'Si' ? 'Colocando Rótulos...<br />' : '');
			while ($finfo = $xResultado->fetch_field()) {
				$salida_cvs .= $finfo->name . ",";
				$columnas++;
			}
			$salida_cvs .= "\r\n";
			mysqli_data_seek($xResultado, 0);
			echo ($_POST['rdbInformar'] == 'Si' ? 'Vaciando la Información...<br />' : '');
			while ($fila = mysqli_fetch_row($xResultado)) {
				for ($j=0;$j<$columnas;$j++) {
					$salida_cvs .= $fila[$j].",";
				}
				$salida_cvs .= "\r\n";
			}
			$salida_cvs .= "\r\n";
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
		// CSV Punto y Coma 
		//===============================================================================================================================
		if ( $_POST['optExtension'] == '.csvPyC' ) {
			$salida_cvs = '';
			$columnas = 0;
			echo ($_POST['rdbInformar'] == 'Si' ? 'Sacando la Información...<br />' : '');
			mysqli_data_seek($xResultado, 0);
			echo ($_POST['rdbInformar'] == 'Si' ? 'Colocando Rótulos...<br />' : '');
			while ($finfo = $xResultado->fetch_field()) {
				$salida_cvs .= $finfo->name . ";";
				$columnas++;
			}
			$salida_cvs .= "\r\n";
			mysqli_data_seek($xResultado, 0);
			echo ($_POST['rdbInformar'] == 'Si' ? 'Vaciando la Información...<br />' : '');
			while ($fila = mysqli_fetch_row($xResultado)) {
				for ($j=0;$j<$columnas;$j++) {
					$salida_cvs .= $fila[$j].";";
				}
				$salida_cvs .= "\r\n";
			}
			$salida_cvs .= "\r\n";
			$ApuntadorDeArchivo = fopen('../downloads/retiros_exportados/' . $_POST['txtFile'] . '.csv', 'w');
			$Ok = fwrite($ApuntadorDeArchivo, $salida_cvs);
			if ( !$Ok ){
				echo ($_POST['rdbInformar'] == 'Si' ? 'No se pudo crear el archivo'.$_POST['txtFile'].'.csv'.'...<br />' : '');
			}
			else {
				echo ($_POST['rdbInformar'] == 'Si' ? 'Grabado: '.$Ok.' bytes...<br />' : '');
			}
			if ( fclose($ApuntadorDeArchivo) ) {
				echo ($_POST['rdbInformar'] == 'Si' ? 'Proceso concluido con Éxito...<br />' : '');
			}
			else {
				echo ($_POST['rdbInformar'] == 'Si' ? 'NO se pudo CERRAR el ARCHIVO '.$_POST['txtFile'].'.csv'.'...<br />' : '');
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
				array("fech_tra",		"D"),
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
					  mysqli_data_seek($xResultado, 0);
					  while ($estafila = mysqli_fetch_array($xResultado, MYSQLI_ASSOC)) {
						  $HayRegistros = true;
						  dbase_add_record($database, array(
							  $estafila['idretiro'], 
							  $estafila['iddocumento'], 
							  $estafila['descripcion_del_documento'], 
							  $estafila['observacion_particular_del_documento'],
							  $estafila['observacion_del_documento'],
							  $estafila['fecha_del_retiro'],
							  $estafila['fecha_de_transcripcion'],
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
			  $xNombreDeHoja = 'Retiros al '.date('d-m-Y');
			  $rUC = 'Universidad de Carabobo';
			  $rSecretaria = 'Secretaría';
			  $rDiGAEs = 'Dirección General de Asuntos Estudiantiles';
			  $rTitulo = 'Retiro(s)';
			  $rFacultad = 'Facultad:';
			  $rEscuela = 'Escuela:';
			  $rMencion = 'Mención:';
			  $rCedula = 'Cédula:';
			  $rNombre = 'Nombre(s):';
			  $rApellido = 'Apellido(s):';
			  $rDocQueRetiro = 'Documento(s) que Retiró:';
			  $rRFecha = 'Fecha de Retiro:';
			  $rTFecha = 'Fecha de Transcripción:';
			  $rFila = 6;
			  $rFinDeLista = '~~~Fin de la Lista~~~';
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
			  //$obj3Drawing->setCoordinates('G26');
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
											->mergeCells('A4:I4');
			  echo ($_POST['rdbInformar'] == 'Si' ? 'Aplicando ALINEACIÓN/CENTRADO INDIVIDUAL a Celdas de la Hoja...<br />' : '');
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
			  $objPHPExcel->getActiveSheet()->mergeCells('B5:C5')
											->mergeCells('D5:E5')
											->mergeCells('F5:I5')
											->mergeCells('L5:Q5')
											->mergeCells('R5:W5')
											->mergeCells('X5:AC5');
			  $objPHPExcel->getActiveSheet()->getStyle('A5:AF5')->getAlignment()->applyFromArray(
					array(
						'horizontal'	=>	PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
						'vertical'		=>	PHPExcel_Style_Alignment::VERTICAL_CENTER,
						'rotation'		=>	0,
						'wrap'			=>	TRUE));
			  $objPHPExcel->getActiveSheet()->getStyle('A5:AF5')->applyFromArray(
					array(
						'font'	=>	array(
										'size'		=>	10,
										'bold'		=>	true,
										'italic'	=>	true)));
			  echo ($_POST['rdbInformar'] == 'Si' ? 'Aplicando FORMATO INDIVIDUAL a Celdas de la Hoja...<br />' : '');
			  $objPHPExcel->getActiveSheet()->getStyle('A4')->getNumberFormat()->applyFromArray(
					array(
						'code'	=>	PHPExcel_Style_NumberFormat::FORMAT_TEXT));
//			  $objPHPExcel->getActiveSheet()->getStyle('A5:A10')->getNumberFormat()->applyFromArray(
//					array(
//						'code'	=>	PHPExcel_Style_NumberFormat::FORMAT_TEXT));
//			  $objPHPExcel->getActiveSheet()->getStyle('B5:B7')->getNumberFormat()->applyFromArray(
//					array(
//						'code'	=>	PHPExcel_Style_NumberFormat::FORMAT_TEXT));
//			  $objPHPExcel->getActiveSheet()->getStyle('B8')->getNumberFormat()->applyFromArray(
//					array(
//						'code'	=>	PHPExcel_Style_NumberFormat::FORMAT_NUMBER));
//			  $objPHPExcel->getActiveSheet()->getStyle('B9:B10')->getNumberFormat()->applyFromArray(
//					array(
//						'code'	=>	PHPExcel_Style_NumberFormat::FORMAT_TEXT));
//			  $objPHPExcel->getActiveSheet()->getStyle('A11:A25')->getNumberFormat()->applyFromArray(
//					array(
//						'code'	=>	PHPExcel_Style_NumberFormat::FORMAT_TEXT));
//			  $objPHPExcel->getActiveSheet()->getStyle('H11')->getNumberFormat()->applyFromArray(
//					array(
//						'code'	=>	PHPExcel_Style_NumberFormat::FORMAT_TEXT));
//			  $objPHPExcel->getActiveSheet()->getStyle('I11')->getNumberFormat()->applyFromArray(
//					array(
//						'code'	=>	PHPExcel_Style_NumberFormat::FORMAT_DATE_DDMMYYYY));
			  // ----
			  // Incrustando la DATA a la Hoja
			  // ----
			  echo ($_POST['rdbInformar'] == 'Si' ? 'Incrustando Data...<br />' : '');
			  $objPHPExcel->getActiveSheet()->setCellValue('B1', $rUC)
											->setCellValue('B2', utf8_encode($rSecretaria))
											->setCellValue('B3', utf8_encode($rDiGAEs))
											->setCellValue('A4', $rTitulo)
											->setCellValue('A5', utf8_encode($rCedula))
											->setCellValue('B5', $rNombre)
											->setCellValue('D5', $rApellido)
											->setCellValue('F5', $rEscuela)
											->setCellValue('J5', $rRFecha)
											->setCellValue('K5', utf8_encode($rTFecha))
											->setCellValue('L5', utf8_encode($rDocQueRetiro))
											->setCellValue('R5', $rFacultad)
											->setCellValue('X5', utf8_encode($rMencion));
			  echo ($_POST['rdbInformar'] == 'Si' ? 'Dándole Autoajuste a las Columnas de la Hoja...<br />' : '');
			  $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
			  $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
			  $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
			  echo ($_POST['rdbInformar'] == 'Si' ? 'Incrustando Data de la Tabla...<br />' : '');
			  mysqli_data_seek($xResultado, 0);
			  while ($estafila = mysqli_fetch_array($xResultado, MYSQLI_ASSOC)) {
				  $objPHPExcel->getActiveSheet()->mergeCells('B'.$rFila.':C'.$rFila)
												->mergeCells('D'.$rFila.':E'.$rFila)
												->mergeCells('F'.$rFila.':I'.$rFila)
												->mergeCells('L'.$rFila.':Q'.$rFila)
												->mergeCells('R'.$rFila.':W'.$rFila)
												->mergeCells('X'.$rFila.':AC'.$rFila);
				  $objPHPExcel->getActiveSheet()->setCellValue('A'.$rFila, $estafila['aci'])
												->setCellValue('B'.$rFila, utf8_encode($estafila['primernombre'].' '.$estafila['segundonombre']))
												->setCellValue('D'.$rFila, utf8_encode($estafila['primerapellido'].' '.$estafila['segundoapellido']))
												->setCellValue('F'.$rFila, $estafila['aescuela'].' | '.utf8_encode($estafila['nombre_de_escuela']))
												->setCellValue('J'.$rFila, $estafila['fecha_del_retiro'])
												->setCellValue('K'.$rFila, $estafila['fecha_de_transcripcion'])
												->setCellValue('L'.$rFila, $estafila['iddocumento'].' | '.utf8_encode($estafila['descripcion_del_documento']))
												->setCellValue('R'.$rFila, utf8_encode($estafila['nombre_de_facultad']))
												->setCellValue('X'.$rFila, $estafila['amencion'].' | '.utf8_encode($estafila['nombre_de_mencion']));
				  $rFila++;
			  }
			  echo ($_POST['rdbInformar'] == 'Si' ? 'Efectuando Ajustes Finales a la Hoja...<br />' : '');
			  $objPHPExcel->getActiveSheet()->getStyle('A6:A'.($rFila - 1))->getAlignment()->applyFromArray(
					array(
						'horizontal'	=>	PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
						'vertical'		=>	PHPExcel_Style_Alignment::VERTICAL_CENTER,
						'rotation'		=>	0,
						'wrap'			=>	TRUE));
			  $objPHPExcel->getActiveSheet()->getStyle('B6:B'.($rFila - 1))->getAlignment()->applyFromArray(
					array(
						'horizontal'	=>	PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
						'vertical'		=>	PHPExcel_Style_Alignment::VERTICAL_CENTER,
						'rotation'		=>	0,
						'wrap'			=>	TRUE));
			  $objPHPExcel->getActiveSheet()->getStyle('D6:D'.($rFila - 1))->getAlignment()->applyFromArray(
					array(
						'horizontal'	=>	PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
						'vertical'		=>	PHPExcel_Style_Alignment::VERTICAL_CENTER,
						'rotation'		=>	0,
						'wrap'			=>	TRUE));
			  $objPHPExcel->getActiveSheet()->getStyle('J6:J'.($rFila - 1))->getAlignment()->applyFromArray(
					array(
						'horizontal'	=>	PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
						'vertical'		=>	PHPExcel_Style_Alignment::VERTICAL_CENTER,
						'rotation'		=>	0,
						'wrap'			=>	TRUE));
			  $objPHPExcel->getActiveSheet()->getStyle('K6:K'.($rFila - 1))->getAlignment()->applyFromArray(
					array(
						'horizontal'	=>	PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
						'vertical'		=>	PHPExcel_Style_Alignment::VERTICAL_CENTER,
						'rotation'		=>	0,
						'wrap'			=>	TRUE));
			  $obj3Drawing->setCoordinates('G'.($rFila + 1));
			  $objPHPExcel->getActiveSheet()->mergeCells('B'.($rFila + 1).':F'.($rFila + 1));
			  $objPHPExcel->getActiveSheet()->setCellValue('B'.($rFila + 1), utf8_encode($rFinDeLista));
			  $objPHPExcel->getActiveSheet()->getStyle('B'.($rFila + 1).':F'.($rFila + 1))->getAlignment()->applyFromArray(
					array(
						'horizontal'	=>	PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
						'vertical'		=>	PHPExcel_Style_Alignment::VERTICAL_CENTER,
						'rotation'		=>	0,
						'wrap'			=>	TRUE));
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
				$zip->addFile('../downloads/retiros_exportados/' . $_POST['txtFile'] . ($_POST['optExtension'] == '.csvPyC' ? '.csv' : $_POST['optExtension']), $_POST['txtFile'] . ($_POST['optExtension'] == '.csvPyC' ? '.csv' : $_POST['optExtension']));
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
		mysqli_free_result($xResultado);
		mysqli_close($xConeccion);
	}
	?>	
    </td>
    </tr>
  <tr>
    <td height="10" colspan="2" align="center" valign="middle" class="Inportant"><?php
	$ftp_servidor = '190.170.68.31';
	$ftp_usuario = 'usuario.de.ftp';
	$ftp_contrasenia = 'Digaes2014';
	$ftp_conn_id = NULL;
	$ftp_log_res = NULL;
	$ftp_upload = NULL;
	if ( $_POST['rdbFTP'] == 'Si' ) {
		$ftp_conn_id = ftp_connect($ftp_servidor); 
		$ftp_log_res = ftp_login($ftp_conn_id, $ftp_usuario, $ftp_contrasenia); 
		if ((!$ftp_conn_id) || (!$ftp_log_res)) {  
			echo "¡La conexión FTP ha fallado!<br/ >";
			echo "Se intentó conectar al $ftp_servidor por el usuario $ftp_usuario<br/ >"; 
			exit; 
		} else {
			echo "Conexión a $ftp_servidor realizada con éxito, por el usuario $ftp_usuario<br/ >";
		}
		if ( file_exists('../downloads/retiros_exportados/' . $_POST['txtFile'] . '.zip') ) {
			$ftp_upload = ftp_put( $ftp_conn_id, $_POST['txtFile'].'.zip', '../downloads/retiros_exportados/'.$_POST['txtFile'].'.zip', FTP_BINARY);
		}
		else {
			$ftp_upload = ftp_put( $ftp_conn_id, $_POST['txtFile'].($_POST['optExtension'] == '.csvPyC' ? '.csv' : $_POST['optExtension']), '../downloads/retiros_exportados/'.$_POST['txtFile'].($_POST['optExtension'] == '.csvPyC' ? '.csv' : $_POST['optExtension']), FTP_BINARY);
		}
		if ( !$ftp_upload && (!file_exists('../downloads/retiros_exportados/'.$_POST['txtFile'].'.zip') || !file_exists('../downloads/retiros_exportados/'.($_POST['optExtension'] == '.csvPyC' ? '.csv' : $_POST['optExtension']))) ) {
			echo "¡La subida FTP ha fallado!<br/ >";
		}
		else {
			if ( file_exists('../downloads/retiros_exportados/' . $_POST['txtFile'] . '.zip') ) {
				echo "Subida de ../downloads/retiros_exportados/".$_POST['txtFile'].".zip a ".$ftp_servidor." como ".$_POST['txtFile'].".zip<br/ >";
			}
			else {
				echo "Subida de ../downloads/retiros_exportados/".$_POST['txtFile'].($_POST['optExtension'] == '.csvPyC' ? '.csv' : $_POST['optExtension'])." a ".$ftp_servidor." como ".$_POST['txtFile'].($_POST['optExtension'] == '.csvPyC' ? '.csv' : $_POST['optExtension'])."<br/ >";
			}
		}
		ftp_close($ftp_conn_id);
	}
	?></td>
    </tr>
  <tr>
    <td height="5">&nbsp;</td>
    <td height="5">&nbsp;</td>
  </tr>
  <tr>
    <td height="40" colspan="2" align="center" valign="middle"><table width="22%" border="0" cellpadding="0" cellspacing="0" ><tr><td width="34%" height="30" align="center" valign="middle"><input name="btnRegreso" type="submit" class="glow2" id="btnRegreso" title="Pulse aqui para Regresar a la pantalla INICIAL..." value="Regresar"  /></td><td width="66%" height="30" align="center" valign="middle"><?php
	echo '<a href="../downloads/retiros_exportados/'.$_POST['txtFile'].($_POST['optExtension'] == '.csvPyC' ? '.csv' : $_POST['optExtension']).'" target="_blank" title="Pulse aqui para descargar &laquo;'.$_POST['txtFile'].($_POST['optExtension'] == '.csvPyC' ? '.csv' : $_POST['optExtension']).'&raquo;..."><img src="../imagenes/boton-descargar.fw.png" width="100" height="30" alt="Descargar" /></a>';
	if ( $_POST['rdbComprimir'] == 'Si' ) {
		echo '<a href="../downloads/retiros_exportados/'.$_POST['txtFile'].'.zip" target="_blank" title="Pulse aqui para descargar &laquo;'.$_POST['txtFile'].'.zip&raquo;..."><img src="../imagenes/boton-descargar2.zip.fw.png" width="100" height="30" alt="Descargar_ZIP" /></a>';
	}
	?></td></tr></table></td>
    </tr>
</table>
</form>
  <!-- InstanceEndEditable --></td>
  </tr>
</table>
</div>
</body>
<!-- InstanceEnd --></html>