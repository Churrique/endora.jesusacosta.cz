<?php
require_once('../funciones/valida-funciones.php');
require_once('../funciones/valida-funciones_pnr_datos_y_promocion.php');
if ( isset($_POST['btnMeRegreso']) ) {
	header('Location: form-transcripcion-de-promedios-individuo-2.php?ID='.$_POST['txtID']);
	exit;
}
if ( isset($_POST['btnModificar']) ) {
	EeRenPNR($_POST['txtIU'],$_POST['txtNombre'],$_POST['txtID'],$_POST['txtCI'],$_POST['txtPromedio'],$_POST['txtPuesto']);
	header('Location: form-transcripcion-de-promedios-individuo-2.php?ID='.$_POST['txtID']);
	exit;
}
?>