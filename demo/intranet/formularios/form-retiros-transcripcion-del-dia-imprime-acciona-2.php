<?php
  if ( isset($_POST['btnRegreso']) ) {
	  header('Location: form-retiros-transcripcion-del-dia-2.php');
	  exit;
  }
  if ( isset($_POST['btnImprimo']) ) {
	  if ( isset($_POST['txt3Hoy']) ) {
		  header('Location: reporte-retiros-transcripcion-del-dia.php?HOY='.$_POST['txt3Hoy'].'&OBS='.$_POST['Texto']);
		  exit;
	  }
	  else {
		  if ( isset($_POST['txt3Desde']) && isset($_POST['chk3Fecha']) ) {
//			  header('Location: reporte-retiros-transcripcion-del-dia-prueba.php?DESDE='.$_POST['txt3Desde'].'&APARTIRDE='.$_POST['chk3Fecha'].'&OBS='.$_POST['Texto']);
			  header('Location: reporte-retiros-transcripcion-del-dia.php?DESDE='.$_POST['txt3Desde'].'&APARTIRDE='.$_POST['chk3Fecha'].'&OBS='.$_POST['Texto']);
			  exit;
		  }
		  else {
			  if ( isset($_POST['txt3Desde']) && isset($_POST['txt3Hasta']) ) {
				  header('Location: reporte-retiros-transcripcion-del-dia.php?DESDE='.$_POST['txt3Desde'].'&HASTA='.$_POST['txt3Hasta'].'&OBS='.$_POST['Texto']);
				  exit;
			  }
			  else {
				  header('Location: reporte-retiros-transcripcion-del-dia.php?DESDE='.$_POST['txt3Desde'].'&OBS='.$_POST['Texto']);
				  exit;
			  }
		  }
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