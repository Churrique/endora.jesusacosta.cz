<?php
require_once('../funciones/valida-funciones.php');
require_once('../funciones/valida-funciones_pnr_datos_y_promocion.php');
if ( isset($_POST['btnMeRegreso']) ) {
	header('Location: form-transcripcion-de-promedios-promocion-2.php');
	exit;
}
if ( isset($_POST['btnEdita']) ) {
	echo Actu1delaP($_POST['txtID'],$_POST['txtTitulo'],$_POST['txtFechaActo'],$_POST['txtIntegra'],$_POST['txtPromedioPro']);
	header('Location: form-transcripcion-de-promedios-promocion-2.php');
	exit;
}
?>