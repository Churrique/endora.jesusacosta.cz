<?php
//--------------------------------------------------------------------------------------------------------------------
//
//   F U N C I O N E S  P A R A   L A   T A B L A   A N T _ E X P E D I E N T E S
//
//--------------------------------------------------------------------------------------------------------------------
function ConEspDeExpAnt($pCi_U=0, $pTit_U='') {   /// Consulta Específica de Expediente Anterior
	$sql_string = "SELECT * FROM `ant_expedientes` WHERE `cedula` = ".$pCi_U." AND `titulo` = '".$pTit_U."' ORDER BY `nombre_materia`";
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
		//$row = mysqli_fetch_array($result1, MYSQLI_ASSOC);
		//mysqli_free_result($result1);
		mysqli_close($link);
		//return($row);
		return($result1);
	}
	else {
		$seguimiento .= 'No hay informaci&oacute;n que mostrar...<br />';
		$seguimiento .= 'Instrucci&oacute;n:<br />'.$sql_string.'<br />';
	}
	mysqli_close($link);
	return($seguimiento);
}
function CDe1ExpAnt($pCampoDeBus='cedula',$pValorDeBus='0') {   /// Consulta De 1(Un) Expediente Anterior
	//Valores posibles: cedula, nombre o apellido
	$sql_string = ($pCampoDeBus == 'cedula' ? "SELECT CONCAT_WS(', ',`apellidos`,`nombres`) AS `alfabetico`,`fecha_grado`,`escuela`,`titulo`,`cedula`,COUNT(`cedula`) AS `sub_total` FROM `ant_expedientes` WHERE `cedula` LIKE '%".trim($pValorDeBus)."%' GROUP BY `titulo`,`cedula` ORDER BY `cedula`" : ($pCampoDeBus == 'nombre' ? "SELECT CONCAT_WS(', ',`nombres`,`apellidos`) AS `alfabetico`,`fecha_grado`,`escuela`,`titulo`,`cedula`,COUNT(`cedula`) AS `sub_total` FROM `ant_expedientes` WHERE `nombres` LIKE '".trim(strtoupper($pValorDeBus))."%' GROUP BY `titulo`,`cedula` ORDER BY `alfabetico`" : "SELECT CONCAT_WS(', ',`apellidos`,`nombres`) AS `alfabetico`,`fecha_grado`,`escuela`,`titulo`,`cedula`,COUNT(`cedula`) AS `sub_total` FROM `ant_expedientes` WHERE `apellidos` LIKE '".trim(strtoupper($pValorDeBus))."%' GROUP BY `titulo`,`cedula` ORDER BY `alfabetico`"));
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
			  <td height="30" align="center" valign="middle"><strong>C&eacute;dula</strong></td>';
		if ($pCampoDeBus == 'nombre') echo '<td height="30" align="center" valign="middle"><strong>Nombre(s), Apellido(s)</strong></td>';
		if ($pCampoDeBus == 'apellido') echo '<td height="30" align="center" valign="middle"><strong>Apellido(s), Nombre(s)</strong></td>';
		echo '<td height="30" align="center" valign="middle" title="Fecha de Grado..."><strong>Fecha</strong></td>
			  <td height="30" align="center" valign="middle"><strong>Escuela</strong></td>
			  <td height="30" align="center" valign="middle"><strong>T&iacute;tulo</strong></td>
			  <td height="30" align="center" valign="middle" title="N&uacute;mero de Materias..."><strong>#</strong></td>
			  <td height="30" align="center" valign="middle" title="Expediente..."><strong>Ver</strong></td>
			  </tr>';
		while ($rows = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
			if ($i % 2) {
				echo '<tr height="40" align="center" valign="middle" bgcolor="#FFFFE6">';
			}
			else {
				echo '<tr height="40" align="center" valign="middle" bgcolor="#E8FFFF">';
			}
			echo '<td><strong>'.$rows['cedula'].'</strong></td>';
			echo '<td><strong>'.trim($rows['alfabetico']).'</strong></td>';
			echo '<td><strong>'.trim($rows['fecha_grado']).'</strong></td>';
			echo '<td><strong>'.trim($rows['escuela']).'</strong></td>';
			echo '<td><strong>'.trim($rows['titulo']).'</strong></td>';
			echo '<td><strong>'.$rows['sub_total'].'</strong></td>';
			if ($rows['sub_total'] > 0) {
				echo '<td><a href="form-expedientes-anteriores-consulta-muestra-individual-2.php?CI='.$rows['cedula'].'&TIT='.$rows['titulo'].'&MAT='.$rows['sub_total'].'" target="_self"><img src="../imagenes/ConExpediente.fw.png" width="50" height="33" alt="Ver" /></a><a href="form-expedientes-anteriores-eliminacion-expediente-individual-2.php?CI='.$rows['cedula'].'&TIT='.$rows['titulo'].'&MAT='.$rows['sub_total'].'" target="_self"><img src="../imagenes/EliminarExpediente.fw.png" width="50" height="33" alt="Eliminar" /></a></td></tr>';
			}
			else {
				echo '<td><img src="../imagenes/SinExpediente.fw.png" width="50" height="33" alt="SinExpediente" /></td></tr>';
			}
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
function ConsuGenDeEA($pOrdem='cedula') {   /// Consulta General De Promedios Anteriores
	$sql_string = ($pOrdem == 'cedula' ? "SELECT CONCAT_WS(', ',`apellidos`,`nombres`) AS `alfabetico`,`fecha_grado`,`escuela`,`titulo`,`cedula`,COUNT(`cedula`) AS `sub_total` FROM `ant_expedientes` GROUP BY `titulo`,`cedula` ORDER BY `cedula`" : "SELECT CONCAT_WS(', ',`apellidos`,`nombres`) AS `alfabetico`,`fecha_grado`,`escuela`,`titulo`,`cedula`,COUNT(`cedula`) AS `sub_total` FROM `ant_expedientes` GROUP BY `titulo`,`cedula` ORDER BY `alfabetico`");
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
			  <td height="30" align="center" valign="middle"><strong>C&eacute;dula</strong></td>
			  <td height="30" align="center" valign="middle"><strong>Nombre(s), Apellido(s)</strong></td>
			  <td height="30" align="center" valign="middle" title="Fecha de Grado..."><strong>Fecha</strong></td>
			  <td height="30" align="center" valign="middle"><strong>Escuela</strong></td>
			  <td height="30" align="center" valign="middle"><strong>T&iacute;tulo</strong></td>
			  <td height="30" align="center" valign="middle" title="N&uacute;mero de Materias..."><strong>#</strong></td>
			  <td height="30" align="center" valign="middle" title="Expediente..."><strong>Ver</strong></td>
			  </tr>';
		while ($rows = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
			if ($i % 2) {
				echo '<tr height="40" align="center" valign="middle" bgcolor="#FFFFE6">';
			}
			else {
				echo '<tr height="40" align="center" valign="middle" bgcolor="#E8FFFF">';
			}
			echo '<td><strong>'.$rows['cedula'].'</strong></td>';
			echo '<td><strong>'.trim($rows['alfabetico']).'</strong></td>';
			echo '<td><strong>'.trim($rows['fecha_grado']).'</strong></td>';
			echo '<td><strong>'.trim($rows['escuela']).'</strong></td>';
			echo '<td><strong>'.trim($rows['titulo']).'</strong></td>';
			echo '<td><strong>'.$rows['sub_total'].'</strong></td>';
			if ($rows['sub_total'] > 0) {
				echo '<td><a href="form-expedientes-anteriores-consulta-muestra-individual-2.php?CI='.$rows['cedula'].'&TIT='.$rows['titulo'].'&MAT='.$rows['sub_total'].'" target="_self"><img src="../imagenes/ConExpediente.fw.png" width="47" height="30" alt="Ver" /></a><a href="form-expedientes-anteriores-eliminacion-expediente-individual-2.php?CI='.$rows['cedula'].'&TIT='.$rows['titulo'].'&MAT='.$rows['sub_total'].'" target="_self"><img src="../imagenes/EliminarExpediente.fw.png" width="47" height="30" alt="Eliminar" /></a></td></tr>';
			}
			else {
				echo '<td><img src="../imagenes/SinExpediente.fw.png" width="50" height="33" alt="SinExpediente" /></td></tr>';
			}
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