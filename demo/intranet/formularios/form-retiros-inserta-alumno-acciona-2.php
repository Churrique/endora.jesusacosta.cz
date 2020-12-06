<?php
	  require_once('../funciones/valida-funciones.php');
	  require_once('../funciones/valida-funciones_a_retirados.php');
	  if ( isset($_POST['bntCancelar']) ) {
		  header('Location: form-retiros-busca-2.php?mensaje=Canceló la adición del registro...!');
		  exit;
	  }
	echo '<input type="hidden" name="txtCed" value="'.$_POST['txtCI'].'" />';
	echo '<input type="hidden" name="txtLaEscuela" value="'.$_POST['lstEscu'].'" />';
	// insertar en alumnos
	echo IunA($_POST['txtCI'],$_POST['lstActi'],$_POST['lstPasi'],$_POST['txtPerLec'],$_POST['lstModIng'],$_POST['lstEscu'],'0','Si','Si','Si');
	//--- resto de la función IunA(...$pTPresCir='No',$pTExpedAca='No',$pTSolCons='No')
	$partes = explode('-',$_POST['txtFechNac']);
	$fecha = $partes[2].'-'.$partes[1].'-'.$partes[0];
	// insertar en a_datos_personales
	echo InsDatPer($_POST['txtCI'],$_POST['sltNac'],$_POST['txt1ErNom'],$_POST['txt2DoNom'],$_POST['txt3ErNom'],$_POST['txt1ErApe'],$_POST['txt2DoApe'],$_POST['txt3ErApe'],$_POST['sltEdoCiv'],$_POST['sltSex'],$fecha);
	//--- resto de la funcion InsDatPer(...$pTDir='No',$pTTelef='No',$pTEMail='No')
	//--- Incluir si hay Dirección
	if ( $_POST['txtDireccion'] != '' || $_POST['txtDireccion'] != ' ' ) {
		// insertar en a_direcciones
		echo InsuDirec($_POST['txtCI'],$_POST['txtPerDir'],$_POST['txtDireccion']).'<br />';
		//--- actualizar a_datos_personales el campo tiene_direcciones con Si
		echo ActUnCamp('a_datos_personales','tiene_direcciones','Si','a_ci',$_POST['txtCI']);
	}
	else {
		echo 'No se indic&oacute; ninguna direcci&oacute;n...';
	}
	//--- Incluir si hay Teléfono
	if ( $_POST['txtTelf'] != '' || $_POST['txtTelf'] != ' ' ) {
		// insertar en a_telefonos
		echo InsuTelef($_POST['txtCI'],$_POST['txtPerTel'],$_POST['txtTelf']).'<br />';
		//--- actualizar a_datos_personales el campo tiene_telefonos con Si
		echo ActUnCamp('a_datos_personales','tiene_telefonos','Si','a_ci',$_POST['txtCI']);
	}
	else {
		echo 'No se indic&oacute; ning&uacute;n tel&eacute;fono...';
	}
	//--- Incluir si hay E-mail
	if ( $_POST['txtCorreo'] != '' || $_POST['txtCorreo'] != ' ' ) {
		// insertar en a_correos
		echo InsuEmail($_POST['txtCI'],$_POST['txtCorreo']).'<br />';
		//--- actualizar a_datos_personales el campo tiene_correos con Si
		echo ActUnCamp('a_datos_personales','tiene_correos','Si','a_ci',$_POST['txtCI']);
	}
	else {
		echo 'No se indic&oacute; ning&uacute;n correo...';
	}
	//--- Incluir en a_retirados
	$semilla = texto_aleatorio(20);
	$documentos = $_POST['txtVecDocs'];
	// Insertar en "a_retirados"
	echo Ins1ReRet($_POST['txtCI'],$_POST['txtFechRet'],$_POST['lstEscu'],$_POST['lstMenc'],$_POST['lstPasi'],$_POST['lstActi'],$_POST['txtObservacion'],$semilla);
	$identificador = BcSemilla($_POST['txtCI'],$semilla);
	if ( is_bool($identificador) ) {
		//--- Fallo la inserción de este retiro por lo que no se puede asociar ningún documento...!
		echo 'Fallo la inserción de este retiro por lo que no se puede asociar ningún documento...!<br />';
	}
	else {
//		$elementos=$_POST['txtVecDocs'];
//		reset($documentos);
		$nroDfilas=count($documentos);
		echo '<br />Nº de filas: '.$nroDfilas.'<br />';
		for ($l=0; $l<=$nroDfilas; $l++) {
			// de esta forma daba error -> if ($elementos[$l]['chkAnexar'] == true) echo '%23'.$l.'%23-'.$elementos[$l]['chkAnexar'].'-<br />';
			if ( isset($documentos[$l]['chkAnexar']) ) {
				// Insertar en "a_documentos_retirados"
				echo DocQeRet($_POST['txtCI'],$identificador['id_retiro'],$l,$documentos[$l]['Observacion'])."<br />";
			}
//			else {
//				//
//				echo $documentos[$l]['chkAnexar'].'<br />';
//			}
		}
	}
	header('Location: form-retiros-adiciona-2.php?CED='.$_POST['txtCI']);
	exit;
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