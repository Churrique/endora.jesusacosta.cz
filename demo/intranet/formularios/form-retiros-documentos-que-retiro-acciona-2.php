<?php
if ( isset($_POST['btnRegresar']) ) {
	if ($_POST['txtPantDeOrig'] == 'AV2') {
		header('Location: form-retiros-adiciona-v2-2.php?CED='.$_POST['txtACI']);
		exit;
	}
	if ($_POST['txtPantDeOrig'] == 'A2') {
		header('Location: form-retiros-adiciona-2.php');
		exit;
	}
	if ($_POST['txtPantDeOrig'] == 'AV3') {
		header('Location: form-retiros-todos-2.php');
		exit;
	}
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