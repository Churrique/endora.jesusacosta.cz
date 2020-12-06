<?php
include('../funciones/valida-funciones.php');
require_once('../funciones/valida-funciones_inv_xxxxxxxx.php');
if ( isset($_POST['btnAniadir']) ) {
	$Mar = BuMar($_POST['lstMar']);     //['inv_marca']
	$Des = BuDes($_POST['lstDes']);     //['inv_descripcion']
	$Con = BuCond($_POST['lstCon']);    //['inv_condicion']
	$Dep = BuDept($_POST['lstDpto']);   //['detalle']
	$Per = BuUsua($_POST['lstUsua']);   //['nombre_usuario']

	$txtInv = $_POST['txtInvUC'];
	$txtSer = $_POST['txtSerial'];
	$txtMod = $_POST['txtModelo'];
	$txtMar = $Mar['inv_marca'];
	$txtDes = $Des['inv_descripcion'];
	$txtCon = $Con['inv_condicion'];
	$txtObs = $_POST['txtObs'];
	$txtDep = $Dep['detalle'];
	$txtPer = $Per['nombre_usuario'];
	header('Location: form-inventario-x-pieza-full-adiciona-2.php?inv_uc='.$txtInv.'&inv_serial='.$txtSer.'&inv_modelo='.$txtMod.'&inv_marca='.$Mar['id_inv_marca'].'&inv_marca_des='.$txtMar.'&inv_descripcion_cod='.$Des['id_inv_descripcion'].'&inv_descripcion_des='.$txtDes.'&inv_condicion='.$Con['id_inv_condicion'].'&inv_condicion_des='.$txtCon.'&observacion='.$txtObs.'&inv_departamento='.$Dep['id_unidad'].'&inv_departamento_des='.$txtDep.'&inv_usuario='.$Per['idusuarios'].'&inv_usuario_des='.$txtPer);
	exit;
}
if ( isset($_POST['btnOM']) ) {
	header('Location: form-inventario-x-pieza-full-movimientos-2.php');
	exit;
}
//if ( isset($_POST['btnPRI']) ) header('Location: reporte-inventario.php');
?>