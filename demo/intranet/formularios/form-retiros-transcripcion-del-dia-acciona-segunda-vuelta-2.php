<?php
  if ( isset($_POST['btn2Regresar']) ) {
	  header('Location: form-retiros-transcripcion-del-dia-2.php');
	  exit;
  }
  if ( isset($_POST['btn2Imprimir']) ) {
	  if ( isset($_POST['chk2Fecha']) ) {
		  header('Location: form-retiros-transcripcion-del-dia-imprime-2.php?DESDE='.$_POST['txt2Desde'].'&HASTA='.$_POST['txt2Hasta'].'&APARTIRDE='.$_POST['chk2Fecha']);
		  exit;
	  }
	  else {
		  header('Location: form-retiros-transcripcion-del-dia-imprime-2.php?DESDE='.$_POST['txt2Desde'].'&HASTA='.$_POST['txt2Hasta']);
		  exit;
	  }
  }
  if ( isset($_POST['btn2Exporta']) ) {
	  if ( isset($_POST['chk2Fecha']) ) {
		  header('Location: form-retiros-transcripcion-del-dia-consulta-exportada-2.php?DESDE='.$_POST['txt2Desde'].'&HASTA='.$_POST['txt2Hasta'].'&APARTIRDE='.$_POST['chk2Fecha']);
		  exit;
	  }
	  else {
		  header('Location: form-retiros-transcripcion-del-dia-consulta-exportada-2.php?DESDE='.$_POST['txt2Desde'].'&HASTA='.$_POST['txt2Hasta']);
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