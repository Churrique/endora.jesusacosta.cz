<?php
require_once('../funciones/valida-funciones.php');
require_once('../funciones/valida-funciones_a_retirados.php');

if ( isset($_GET['pantalla']) == 'AV2' ) {
	echo BorERetxIDR($_GET['id']);
	header('Location: form-retiros-adiciona-v2-2.php?CED='.$_GET['ci']);
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