<?php
require_once('../funciones/valida-funciones.php');
require_once('../funciones/valida-funciones_inv_xxxxxxxx.php');
if (isset($_POST['btnGuardar']) ) ModEstInv($_POST['txtIDInv'],$_POST['txtInvUC'],$_POST['txtSerial'],$_POST['txtModelo'],$_POST['txtObs'],$_POST['lstMar'],$_POST['lstDes'],$_POST['lstCon'],$_POST['lstDpto'],$_POST['lstUsua']);
//ModEstInv($inv_id=0,$inv_numero='',$inv_serial='',$inv_modelo='',$inv_observacion='',$inv_marca=0,$inv_descripcion=0,$inv_condicion=0,$inv_unidad=0,$inv_usuario=0)
header('Location: form-inventario-x-pieza-full-movimientos-2.php');
exit;
?>