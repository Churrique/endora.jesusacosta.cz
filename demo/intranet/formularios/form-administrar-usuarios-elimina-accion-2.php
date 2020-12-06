<?php
require_once('../funciones/valida-funciones.php');
echo '<link href="../css/hoja_de_estilos.css" rel="stylesheet" type="text/css" />';
if ( isset($_POST['btnEliminar']) ) {
	$respuesta = MFUsuario('','E','','','','',NULL,$_POST['txtID_U']);
	if ( is_bool($respuesta) === true ) {
		header('Location: form-administrar-usuarios-2.php');
		exit;
	}
	else {
		echo '<div class="texto_decorado_azul4"><p>'.$respuesta.'</p></div>';
	}
}
else {
	header('Location: form-administrar-usuarios-2.php');
	exit;
}
?>