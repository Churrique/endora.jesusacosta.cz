<?php
require_once('../funciones/valida-funciones.php');
//require_once('../funciones/valida-funciones_a_retirados.php');
if ( isset($_POST['btnRegresame']) ) {
	header('Location: form-mostrar-tareas-2.php');
	exit;
}
if ( isset($_POST['btnDiario']) ) {
	header('Location: form-retiros-transcripcion-del-dia-2.php');
	exit;
}
if ( isset($_POST['btnListar']) ) {
	header('Location: form-retiros-todos-2.php');
	exit;
}
if ( isset($_POST['btnExportar']) ) {
	header('Location: form-retiros-exporta-todo-2.php');
	exit;
}
if ( isset($_POST['btnXTaqui']) ) {
	$registro = BEA($_POST['txtBuscaCI']);
	if ( is_bool($registro) ) {
		header('Location: form-retiros-busca-por-taquilla-2.php?cedula='.$_POST['txtBuscaCI']);
		exit;
	}
	else {
		header('Location: form-retiros-adiciona-2.php?CED='.$_POST['txtBuscaCI']);
		exit;
	}
}
if ( isset($_POST['btnBusCI']) && $_POST['txtBuscaCI'] != '' ) {
	$registro = BEA($_POST['txtBuscaCI']);
	if ( is_bool($registro) ) {
		header('Location: form-retiros-inserta-alumno-2.php?cedula='.$_POST['txtBuscaCI']);
		exit;
	}
	else {
		header('Location: form-retiros-adiciona-2.php?CED='.$_POST['txtBuscaCI']);
		exit;
	}
}
else {
	header('Location: form-retiros-busca-2.php?mensaje='.utf8_decode('Debe indicar un número de cédula...!'));
	exit;
}
?>