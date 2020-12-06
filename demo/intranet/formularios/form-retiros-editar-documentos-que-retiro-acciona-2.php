<?php
require_once('../funciones/valida-funciones.php');
require_once('../funciones/valida-funciones_a_retirados.php');

if ( isset($_POST['btnRegresar']) ) {
	if ( $_POST['txtPA'] == 'AV2' ) {
		header('Location: form-retiros-adiciona-v2-2.php?CED='.$_POST['txtCI']);
		exit;
	}
	elseif ( $_POST['txtPA'] == 'AV3' ) {
		header('Location: form-retiros-todos-2.php');
		exit;
	}
	else {
		header('Location: form-mostrar-tareas-2.php');
		exit;
	}
}
if ( isset($_POST['btnProcesar']) ) {
	//
	echo 'estoy en procesar...';
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