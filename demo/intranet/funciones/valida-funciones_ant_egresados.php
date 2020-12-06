<?php
//--------------------------------------------------------------------------------------------------------------------
//
//   F U N C I O N E S  P A R A   L A S   T A B L A S   M O D U L O S
//
//--------------------------------------------------------------------------------------------------------------------
function MueContDMod($pCdeM = '') {   /// Muestra Contenido De Módulos
	$sql_string = "SELECT * FROM _vista_modulos_con_contenido_agrupado WHERE `detalle_modulo` = '".$pCdeM."'";
	$seguimiento = "";
	$link = mysqli_connect("localhost",NAME_USER,PASS_USER,BASE_FORANEA_DE_DATOS);
	if (mysqli_connect_errno($link)) {
		$seguimiento .= 'Conecci&oacute;n fallida:<br />N&uacute;mero:'.mysqli_connect_errno($link).'<br />Mensaje:'.mysqli_connect_error($link).'<br />';
	}
	else {
		$seguimiento .= 'Conectando y Desplegando...!<br />';
	}
	$result1 = mysqli_query($link,$sql_string);
	if ($result1 && mysqli_num_rows($result1) >= 1) {
		$seguimiento .= 'Seleccionado(s) '.mysqli_num_rows($result1).' registro(s)...<br />';
//		$row = mysqli_fetch_array($result1, MYSQLI_ASSOC);
//		mysqli_free_result($result1);
		mysqli_close($link);
//		return($row);
		return($result1);
	}
	else {
		$seguimiento .= 'No hay informaci&oacute;n que mostrar...<br />';
		$seguimiento .= 'Instrucci&oacute;n:<br />'.$sql_string.'<br />';
	}
	mysqli_close($link);
	return($seguimiento);
}
function MueAgruDMod() {   /// Muestra Agrupación De Módulos
	$sql_string = "SELECT * FROM _vista_modulos_agrupado";
	$seguimiento = "";
	$link = mysqli_connect("localhost",NAME_USER,PASS_USER,BASE_FORANEA_DE_DATOS);
	if (mysqli_connect_errno($link)) {
		$seguimiento .= 'Conecci&oacute;n fallida:<br />N&uacute;mero:'.mysqli_connect_errno($link).'<br />Mensaje:'.mysqli_connect_error($link).'<br />';
	}
	else {
		$seguimiento .= 'Conectando y Desplegando...!<br />';
	}
	$result1 = mysqli_query($link,$sql_string);
	if ($result1 && mysqli_num_rows($result1) >= 1) {
		$seguimiento .= 'Seleccionado(s) '.mysqli_num_rows($result1).' registro(s)...<br />';
//		$row = mysqli_fetch_array($result1, MYSQLI_ASSOC);
//		mysqli_free_result($result1);
		mysqli_close($link);
//		return($row);
		return($result1);
	}
	else {
		$seguimiento .= 'No hay informaci&oacute;n que mostrar...<br />';
		$seguimiento .= 'Instrucci&oacute;n:<br />'.$sql_string.'<br />';
	}
	mysqli_close($link);
	return($seguimiento);
}
function ConsFormu($pUnidad='',$pConstancia='') {   /// Construye el Formulario
	$sql_string = "SELECT * FROM _vista_modulos_con_contenido_y_estructuras WHERE `modulo`='".$pUnidad."' AND `contenido`='".$pConstancia."'";
	$seguimiento = "";
	$link = mysqli_connect("localhost",NAME_USER,PASS_USER,BASE_FORANEA_DE_DATOS);
	if (mysqli_connect_errno($link)) {
		$seguimiento .= 'Conecci&oacute;n fallida:<br />N&uacute;mero:'.mysqli_connect_errno($link).'<br />Mensaje:'.mysqli_connect_error($link).'<br />';
	}
	else {
		$seguimiento .= 'Conectando y Desplegando...!<br />';
	}
	$result1 = mysqli_query($link,$sql_string);
	if ($result1 && mysqli_num_rows($result1) >= 1) {
		$seguimiento .= 'Seleccionado(s) '.mysqli_num_rows($result1).' registro(s)...<br />';
		mysqli_close($link);
		return($result1);
	}
	else {
		$seguimiento .= 'No hay informaci&oacute;n que mostrar...<br />';
		$seguimiento .= 'Instrucci&oacute;n:<br />'.$sql_string.'<br />';
	}
	mysqli_close($link);
	return($seguimiento);
}
function MSModConst($pUnidad='') {   /// Muestra el Select del Módulo de Constancia
	$sql_string = "SELECT mo.id_modulo,mo.detalle_modulo AS modulo,mc.id_modulo_contenido,mc.detalle_contenido AS contenido FROM modulos mo,modulos_contenido mc WHERE mo.id_modulo = mc.id_modulo AND mo.detalle_modulo = '".$pUnidad."'";
	$seguimiento = "";
	$link = mysqli_connect("localhost",NAME_USER,PASS_USER,BASE_FORANEA_DE_DATOS);
	if (mysqli_connect_errno($link)) {
		$seguimiento .= 'Conecci&oacute;n fallida:<br />N&uacute;mero:'.mysqli_connect_errno($link).'<br />Mensaje:'.mysqli_connect_error($link).'<br />';
	}
	else {
		$seguimiento .= 'Conectando y Desplegando...!<br />';
	}
	$result1 = mysqli_query($link,$sql_string);
	if ($result1 && mysqli_num_rows($result1) >= 1) {
		$seguimiento .= 'Seleccionado(s) '.mysqli_num_rows($result1).' registro(s)...<br />';
		mysqli_close($link);
		return($result1);
	}
	else {
		$seguimiento .= 'No hay informaci&oacute;n que mostrar...<br />';
		$seguimiento .= 'Instrucci&oacute;n:<br />'.$sql_string.'<br />';
	}
	mysqli_close($link);
	return($seguimiento);
}
function MSPeriodos($pUnidad='') {   /// Muestra el Select de Periodos de Autoridades
	$sql_string = "SELECT * FROM `modulos_autoridades_por_periodos`";
	$seguimiento = "";
	$link = mysqli_connect("localhost",NAME_USER,PASS_USER,BASE_FORANEA_DE_DATOS);
	if (mysqli_connect_errno($link)) {
		$seguimiento .= 'Conecci&oacute;n fallida:<br />N&uacute;mero:'.mysqli_connect_errno($link).'<br />Mensaje:'.mysqli_connect_error($link).'<br />';
	}
	else {
		$seguimiento .= 'Conectando y Desplegando...!<br />';
	}
	$result1 = mysqli_query($link,$sql_string);
	if ($result1 && mysqli_num_rows($result1) >= 1) {
		$seguimiento .= 'Seleccionado(s) '.mysqli_num_rows($result1).' registro(s)...<br />';
		mysqli_close($link);
		return($result1);
	}
	else {
		$seguimiento .= 'No hay informaci&oacute;n que mostrar...<br />';
		$seguimiento .= 'Instrucci&oacute;n:<br />'.$sql_string.'<br />';
	}
	mysqli_close($link);
	return($seguimiento);
}
//--------------------------------------------------------------------------------------------------------------------
//
//   F U N C I O N E S  P A R A   L A   T A B L A   A N T _ E G R E S A D O S
//
//--------------------------------------------------------------------------------------------------------------------
function ConEspDeEgrAnt($pId_U=0) {   /// Consulta Específica de Egresado Anterior
	$sql_string = "SELECT * FROM `ant_egresados` WHERE `id_ant_egresado` = ".$pId_U;
	$seguimiento = "";
	$link = mysqli_connect("localhost",NAME_USER,PASS_USER,BASE_FORANEA_DE_DATOS);
	if (mysqli_connect_errno($link)) {
		$seguimiento .= 'Conecci&oacute;n fallida:<br />N&uacute;mero:'.mysqli_connect_errno($link).'<br />Mensaje:'.mysqli_connect_error($link).'<br />';
	}
	else {
		$seguimiento .= 'Conectando y Desplegando...!<br />';
	}
	$result1 = mysqli_query($link,$sql_string);
	if ($result1 && mysqli_num_rows($result1) >= 1) {
		$seguimiento .= 'Seleccionado(s) '.mysqli_num_rows($result1).' registro(s)...<br />';
		$row = mysqli_fetch_array($result1, MYSQLI_ASSOC);
		mysqli_free_result($result1);
		mysqli_close($link);
		return($row);
	}
	else {
		$seguimiento .= 'No hay informaci&oacute;n que mostrar...<br />';
		$seguimiento .= 'Instrucci&oacute;n:<br />'.$sql_string.'<br />';
	}
	mysqli_close($link);
	return($seguimiento);
}
function CDe1EgrAnt($pCampoDeBus='cedula',$pValorDeBus='0') {   /// Consulta De 1(Un) Egresado Anterior
	//Valores posibles: cedula, nombre o apellido
	$sql_string = ($pCampoDeBus == 'cedula' ? "SELECT * FROM `ant_egresados` WHERE `cedula` LIKE '%".trim($pValorDeBus)."%'" : ($pCampoDeBus == 'nombre' ? "SELECT * FROM `ant_egresados` WHERE `nombres` LIKE '".trim(strtoupper($pValorDeBus))."%'" : "SELECT * FROM `ant_egresados` WHERE `apellidos` LIKE '".trim(strtoupper($pValorDeBus))."%'"));
	$seguimiento = "";
	$link = mysqli_connect("localhost",NAME_USER,PASS_USER,BASE_FORANEA_DE_DATOS);
	if (mysqli_connect_errno($link)) {
		$seguimiento .= 'Conecci&oacute;n fallida:<br />N&uacute;mero:'.mysqli_connect_errno($link).'<br />Mensaje:'.mysqli_connect_error($link).'<br />';
	}
	else {
		$seguimiento .= 'Conectando y Desplegando...!<br />';
	}
	$result1 = mysqli_query($link,$sql_string);
	if ($result1 && mysqli_num_rows($result1) >= 1) {
		$seguimiento .= 'Seleccionado(s) '.mysqli_num_rows($result1).' registro(s)...<br />';
		$i = 1;
		echo '<table width="100%" border="0" cellspacing="0" cellpadding="0">
			  <tr class="glow2">
			  <td width="7%" height="30" align="center" valign="middle"><strong>C&eacute;dula</strong></td>
			  <td width="25%" height="30" align="center" valign="middle"><strong>Nombre(s), Apellido(s)</strong></td>
			  <td width="25%" height="30" align="center" valign="middle"><strong>T&iacute;tulo</strong></td>
			  <td width="15%" height="30" align="center" valign="middle"><strong>Acto</strong></td>
			  <td width="8%" height="30" align="center" valign="middle"><strong>Fecha</strong></td>
			  <td width="6%" height="30" align="center" valign="middle" title="Pulse aqu&iacute; para ver individualmente...!"><strong>&bull;</strong></td>
			  </tr>';
		while ($rows = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
			if ($i % 2) {
				echo '<tr height="40" align="center" valign="middle" bgcolor="#FFFFE6">';
			}
			else {
				echo '<tr height="40" align="center" valign="middle" bgcolor="#E8FFFF">';
			}
			echo '<td><strong>'.$rows['cedula'].'</strong></td>';
			echo '<td><strong>'.trim($rows['nombres']).', '.trim($rows['apellidos']).'</strong></td>';
			echo '<td><strong>'.trim($rows['titulo']).'</strong></td>';
			echo '<td><strong>'.trim($rows['tipo_de_acto']).'</strong></td>';
			echo '<td><strong>'.trim($rows['fecha_grado']).'</strong></td>';
			echo '<td><a href="form-egresados-anteriores-consulta-muestra-individual-2.php?ID='.$rows['id_ant_egresado'].'" title="Pulse aqu&iacute; para ver este registro individualmente...!" target="_self">&laquo;Ver&raquo;</a></td></tr>';
			$i++;
		}
		echo '<tr class="glow2">
			  <td height="20" colspan="7" align="center" valign="middle">&laquo;<strong> F&iacute;n de la Tabla </strong>&raquo;</td>
			  </tr></table>';
		mysqli_free_result($result1);
	}
	else {
		$seguimiento .= 'No hay informaci&oacute;n que mostrar...<br />';
		$seguimiento .= 'Instrucci&oacute;n:<br />'.$sql_string.'<br />';
	}
	mysqli_close($link);
	return($seguimiento);
}
function ConsuGenDeEA($pOrdem='cedula') {   /// Consulta General De Inscripciones Anteriores
	$sql_string = ($pOrdem == 'cedula' ? "SELECT * FROM `ant_egresados` ORDER BY `cedula`" : "SELECT *,CONCAT(`apellidos`,`nombres`) AS `alfabetico` FROM `ant_egresados` ORDER BY `alfabetico`");
	$seguimiento = "";
	$link = mysqli_connect("localhost",NAME_USER,PASS_USER,BASE_FORANEA_DE_DATOS);
	if (mysqli_connect_errno($link)) {
		$seguimiento .= 'Conecci&oacute;n fallida:<br />N&uacute;mero:'.mysqli_connect_errno($link).'<br />Mensaje:'.mysqli_connect_error($link).'<br />';
	}
	else {
		$seguimiento .= 'Conectando y Desplegando...!<br />';
	}
	$result1 = mysqli_query($link,$sql_string);
	if ($result1 && mysqli_num_rows($result1) >= 1) {
		$seguimiento .= 'Seleccionado(s) '.mysqli_num_rows($result1).' registro(s)...<br />';
		$i = 1;
		echo '<table width="100%" border="0" cellspacing="0" cellpadding="0">
			  <tr class="glow2">
			  <td width="7%" height="30" align="center" valign="middle"><strong>C&eacute;dula</strong></td>
			  <td width="25%" height="30" align="center" valign="middle"><strong>Nombre(s), Apellido(s)</strong></td>
			  <td width="25%" height="30" align="center" valign="middle"><strong>T&iacute;tulo</strong></td>
			  <td width="15%" height="30" align="center" valign="middle"><strong>Acto</strong></td>
			  <td width="8%" height="30" align="center" valign="middle"><strong>Fecha</strong></td>
			  <td width="6%" height="30" align="center" valign="middle" title="Valores de Otros campos/Observaci&oacute;n(es)"><strong>O/O</strong></td>
			  </tr>';
		while ($rows = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
			if ($i % 2) {
				echo '<tr height="40" align="center" valign="middle" bgcolor="#FFFFE6">';
			}
			else {
				echo '<tr height="40" align="center" valign="middle" bgcolor="#E8FFFF">';
			}
			echo '<td><strong>'.$rows['cedula'].'</strong></td>';
			echo '<td><strong>'.trim($rows['nombres']).', '.trim($rows['apellidos']).'</strong></td>';
			echo '<td><strong>'.trim($rows['titulo']).'</strong></td>';
			echo '<td><strong>'.trim($rows['tipo_de_acto']).'</strong></td>';
			echo '<td><strong>'.trim($rows['fecha_grado']).'</strong></td>';
			echo '<td title="'.trim($rows['valores_de_otras_columnas']).'/'.trim($rows['observacion']).'"><strong>?/?</strong></td></tr>';
			$i++;
		}
		echo '<tr class="glow2">
			  <td height="20" colspan="7" align="center" valign="middle">&laquo;<strong> F&iacute;n de la Tabla </strong>&raquo;</td>
			  </tr></table>';
		mysqli_free_result($result1);
	}
	else {
		$seguimiento .= 'No hay informaci&oacute;n que mostrar...<br />';
		$seguimiento .= 'Instrucci&oacute;n:<br />'.$sql_string.'<br />';
	}
	mysqli_close($link);
	return($seguimiento);
}
?>
<!--<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
</body>
</html>-->