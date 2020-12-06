<?php
include_once('../funciones/valida-funciones.php');
if (isset($_POST['btnGuardar'])) {
	MPaisAM(true,NULL,$_POST['txtPais'],$_POST['txtRegion']);
	header('Location: form-maestro-paises-2.php');
	exit;
}
if (isset($_POST['btnRegresar'])) {
	header('Location: form-mostrar-tareas-2.php');
	exit;
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