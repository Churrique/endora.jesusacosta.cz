<?php
if ( isset($_POST['btnRegresame']) ) {
	header('Location: form-retiros-busca-2.php?mensaje=');
	exit;
}
if ( isset($_POST['btnExpTodo']) ) {
	header('Location: form-retiros-exporta-todo-2.php?mensaje=');
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