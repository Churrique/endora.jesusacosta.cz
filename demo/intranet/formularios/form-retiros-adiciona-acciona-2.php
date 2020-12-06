<?php
require_once('../funciones/valida-funciones.php');
require_once('../funciones/valida-funciones_a_retirados.php');
//
// Si se Cancela en cualquiera de las dos... actua este IF
//
if (isset($_POST['btnLoCancelo'])) {
	header("Location: form-retiros-busca-2.php?mensaje=");
	exit;
}
//
// Si se Guarda una vez que EXISTA PREVIAMENTE... actua este IF
//
if ( isset($_POST['btnV2Guarda']) ) {
	$semilla = texto_aleatorio(20);
	$documentos = $_POST['txtVecDocs'];
	// Insertar en "a_retirados"
	echo Ins1ReRet($_POST['txtCedDIde'],$_POST['txtFechRet'],$_POST['lstEscu'],$_POST['lstMenc'],$_POST['lstPasi'],$_POST['lstActi'],$_POST['txtObservacion'],$semilla);
	$identificador = BcSemilla($_POST['txtCedDIde'],$semilla);
	if ( is_bool($identificador) ) {
		//--- Fallo la inserción de este retiro por lo que no se puede asociar ningún documento...!
	}
	else {
		$elementos=$_POST['txtVecDocs'];
		$nroDfilas=count($documentos);
		echo '<br />Nº de filas: '.$nroDfilas.'<br />';
		for ($l=2; $l<=($nroDfilas+1); $l++) {
			// de esta forma daba error -> if ($elementos[$l]['chkAnexar'] == true) echo '#'.$l.'#-'.$elementos[$l]['chkAnexar'].'-<br />';
			if ( isset($documentos[$l]['chkAnexar']) ) {
				// Insertar en "a_documentos_retirados"
				echo DocQeRet($_POST['txtCedDIde'],$identificador['id_retiro'],$l,$documentos[$l]['Observacion'])."<br />";
			}
		}
	}
	header('Location: form-retiros-adiciona-2.php?CED='.$_POST['txtCedDIde']);
	exit;
}
//
// Si se Guarda en el caso que se adicione uno NUEVO COMPLETAMENTE... actua este IF
//
if ( isset($_POST['btnGuarda']) ) {
	$semilla = texto_aleatorio(20);
	$documentos = $_POST['txtVecDocs'];
	// Insertar en "a_retirados"
	echo Ins1ReRet($_POST['txtCedDIde'],$_POST['txtFechRet'],$_POST['lstEscu'],$_POST['lstMenc'],$_POST['lstPasi'],$_POST['lstActi'],$_POST['txtObservacion'],$semilla);
	$identificador = BcSemilla($_POST['txtCedDIde'],$semilla);
	if ( is_bool($identificador) ) {
		//--- Fallo la inserción de este retiro por lo que no se puede asociar ningún documento...!
	}
	else {
		$elementos=$_POST['txtVecDocs'];
		$nroDfilas=count($documentos);
		echo '<br />Nº de filas: '.$nroDfilas.'<br />';
		for ($l=2; $l<=($nroDfilas+1); $l++) {
			// de esta forma daba error -> if ($elementos[$l]['chkAnexar'] == true) echo '#'.$l.'#-'.$elementos[$l]['chkAnexar'].'-<br />';
			if ( isset($documentos[$l]['chkAnexar']) ) {
				// Insertar en "a_documentos_retirados"
				echo DocQeRet($_POST['txtCedDIde'],$identificador['id_retiro'],$l,$documentos[$l]['Observacion'])."<br />";
			}
		}
	}
	header('Location: form-retiros-adiciona-2.php?CED='.$_POST['txtCedDIde']);
	exit;
}
// sólo para chequeo
//echo '<br /><br /><br />SÓLO PARA CHEQUEO<br /><br />';
//echo 'Cédula de Identidad: '.$_POST['txtCedDIde'].'<br />';
//echo 'Fecha de Retiro: '.$_POST['txtFechRet'].'<br />';
//echo 'Escuela: '.$_POST['lstEscu'].'<br />';
//echo 'Mención: '.$_POST['lstMenc'].'<br />';
//echo 'Activo: '.$_POST['txtActivo'].'<br />';
//echo 'Pasivo: '.$_POST['txtPasivo'].'<br />';
//echo 'Observación: '.$_POST['txtObservacion'].'<br />';
?>