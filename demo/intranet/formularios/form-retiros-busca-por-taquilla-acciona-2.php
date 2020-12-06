<?php
  if ( isset($_POST['btnMeDevuelbo']) ) {
	  header('Location: form-retiros-busca-2.php?mensaje=Proceso cancelado...!');
	  exit;
  }
  require_once('../funciones/valida-funciones.php');
  require_once('../funciones/valida-funciones_a_retirados.php');

  // insertar en alumnos
  echo 'Insertar en `alumnos`<br />';
  //echo IunA($_POST['txtCI'],$_POST['lstActi'],$_POST['lstPasi'],$_POST['txtPerLec'],$_POST['lstModIng'],$_POST['lstEscu'],'0','Si','Si','Si');
  echo IunA($_POST['txtCI'],'0',$_POST['lstPasi'],'00/0000','0',$_POST['lstEscu'],'0','Si','Si','Si').'<br />';
  //--- resto de la función IunA(...$pTPresCir='No',$pTExpedAca='No',$pTSolCons='No')

  // insertar en a_datos_personales
  echo 'Insertar en `a_datos_personales`<br />';
  //echo InsDatPer($_POST['txtCI'],$_POST['sltNac'],$_POST['txt1ErNom'],$_POST['txt2DoNom'],$_POST['txt3ErNom'],$_POST['txt1ErApe'],$_POST['txt2DoApe'],$_POST['txt3ErApe'],$_POST['sltEdoCiv'],$_POST['sltSex'],$fecha);
  echo InsDatPer($_POST['txtCI'],'V',$_POST['txt1ErNom'],' ',' ',$_POST['txt1ErApe'],' ',' ','Soltero','Masculino').'<br />';
  //--- resto de la funcion InsDatPer(...$_POST['txtFechNac'],$pTDir='No',$pTTelef='No',$pTEMail='No')

  //--- insertar en a_direcciones
  echo 'Insertar en `a_direcciones` con valores en vacio...<br />';
  //echo InsuDirec($_POST['txtCI'],$_POST['txtPerDir'],$_POST['txtDireccion']).'<br />';
  echo InsuDirec($_POST['txtCI'],' ',' ').'<br />';

  //--- actualizar a_datos_personales el campo tiene_direcciones con No
  echo 'Actualizar `a_datos_personales` el campo `tiene_direcciones` con No...<br />';
  //echo ActUnCamp('a_datos_personales','tiene_direcciones','No','a_ci',$_POST['txtCI']);
  echo ActUnCamp('a_datos_personales','tiene_direcciones','No','a_ci',$_POST['txtCI']).'<br />';

  //--- insertar en a_telefonos
  echo 'Insertar en `a_telefonos` con valores en vacio...<br />';
  //echo InsuTelef($_POST['txtCI'],$_POST['txtPerTel'],$_POST['txtTelf']).'<br />';
  echo InsuTelef($_POST['txtCI'],' ',' ').'<br />';

  //--- actualizar a_datos_personales el campo tiene_telefonos con No
  echo 'Actualizar `a_datos_personales` el campo `tiene_telefonos` con No...<br />';
  //echo ActUnCamp('a_datos_personales','tiene_telefonos','No','a_ci',$_POST['txtCI']);
  echo ActUnCamp('a_datos_personales','tiene_telefonos','No','a_ci',$_POST['txtCI']).'<br />';

  //--- insertar en a_correos
  echo 'Insertar en `a_correos` con valores en vacio...<br />';
  //echo InsuEmail($_POST['txtCI'],$_POST['txtCorreo']).'<br />';
  echo InsuEmail($_POST['txtCI'],' ').'<br />';

  //--- actualizar a_datos_personales el campo tiene_correos con No
  echo 'Actualizar `a_datos_personales` el campo `tiene_correos` con No...<br />';
  echo ActUnCamp('a_datos_personales','tiene_correos','No','a_ci',$_POST['txtCI']).'<br />';

  //--- insertar en a_retirados
  echo 'insertar en `a_retirados`<br />';
  $semilla = texto_aleatorio(20);
  $documentos = $_POST['txtVecDocs'];
  //echo Ins1ReRet($_POST['txtCI'],$_POST['txtFechRet'],$_POST['txtEscuela'],$_POST['lstMenc'],$_POST['lstPasi'],'0',$_POST['txtObservacion'],$semilla);
  echo Ins1ReRet($_POST['txtCI'],$_POST['txtFechRet'],$_POST['lstEscu'],'0',$_POST['lstPasi'],'0',$_POST['txtObservacion'],$semilla).'<br />';
  echo 'Insertar en `a_documentos_retirados`<br />';
  $identificador = BcSemilla($_POST['txtCI'],$semilla).'<br />';
  //echo 'identificador = '.$identificador['id_retiro'].'<br />';
  if ( is_bool($identificador) ) {
	  //--- Fallo la inserción de este retiro por lo que no se puede asociar ningún documento...!
  }
  else {
	  $nroDfilas=count($documentos);
	  for ($l=1; $l<=($nroDfilas); $l++) {
		  // de esta forma daba error -> if ($elementos[$l]['chkAnexar'] == true) echo '#'.$l.'#-'.$elementos[$l]['chkAnexar'].'-<br />';
		  if ( isset($documentos[$l]['chkAnexar']) ) {
			  // Insertar en "a_documentos_retirados"
			  echo DocQeRet($_POST['txtCI'],$semilla,$l,$documentos[$l]['Observacion'])."<br />";
			  //echo DocQeRet($_POST['txtCI'],$identificador['id_retiro'],$l,$documentos[$l]['Observacion'])."<br />";
		  }
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