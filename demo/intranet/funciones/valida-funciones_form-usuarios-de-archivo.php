<?php
function BTareas() {
	$sql_string = "SELECT * FROM archivo.auth_tareas";
	$seguimiento = "";
	$link = mysqli_connect("localhost","archivo","archivo","archivo");
	if (mysqli_connect_errno($link)) {
		$seguimiento .= 'Conección fallida:<br />Número:'.mysqli_connect_errno($link).'<br />Mensaje:'.mysqli_connect_error($link).'<br />';
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
function IncUss($pCedula='',$pTarea='') {
	$sql_string = "INSERT INTO `archivo`.`auth_privilegios` (`login`,`id_tarea`) VALUES ('$pCedula','$pTarea') ON DUPLICATE KEY UPDATE `login`='$pCedula',`id_tarea`='$pTarea'";
	$seguimiento = "";
	$link = mysqli_connect("localhost","archivo","archivo","archivo");
	if ( mysqli_connect_errno($link) ) {
		$seguimiento = 'Conección fallida:<br />Número:'.mysqli_connect_errno($link).'<br />Mensaje:'.mysqli_connect_error($link).'<br />';
	}
	else {
		mysqli_query($link,$sql_string);
		$seguimiento = 'Cantidad de registro(s) insertado(s) '.mysqli_affected_rows($link).'<br />';
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