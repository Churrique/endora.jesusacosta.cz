<?php
if ( isset($_POST['btnRegreso']) ) {
	header('Location: form-administrar-usuarios-2.php');
	exit;
}
if ( isset($_POST['btnNoMod']) ) {
	header('Location: form-administrar-usuarios-2.php');
	exit;
}
if ( isset($_POST['btnModifica']) ) {
	header('Location: form-administrar-usuarios-modifica-acciona-2.php?USUARIO='.$_POST['txtLogin'].'&CONTRASENIA='.$_POST['txtPass'].'&NOMBRE='.$_POST['txtNombre'].'&ESTATUS='.$_POST['txtEstatus']);
	exit;
}
?>