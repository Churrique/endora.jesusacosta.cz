<?php
require_once('../funciones/valida-funciones.php');
require_once('../funciones/valida-funciones_pnr_datos_y_promocion.php');
if ( isset($_POST['btnMeRegreso']) ) {
	header('Location: form-transcripcion-de-promedios-promocion-2.php');
	exit;
}
if ( isset($_POST['btnAnexar']) ) {
	$resultado = In1RenPNR($_POST['txtID'],$_POST['txtCI'],$_POST['txtNombre'],$_POST['txtPromedio'],$_POST['txtPuesto']);
	header('Location: form-transcripcion-de-promedios-individuo-2.php?ID='.$_POST['txtID'].'&RESULTADO='.$resultado);
	exit;
}
?>