<?php
  include_once('../funciones/valida-funciones.php');
  if (isset($_POST['btnValidalo'])) {
	  $ejecuta_la_funcion = MFUsuario('Intranet','CECUYC',$_POST['txtUsuario'],$_POST['txtContrasena']);
	  if ( is_bool($ejecuta_la_funcion) ) {
		  if ( $ejecuta_la_funcion ) {
			  header("Location: form-mostrar-tareas-2.php");
			  exit;
		  }
		  else {
			  header("Location: form-error-2.php");
			  exit;
		  }
	  }
	  else {
		  header("Location: form-error-con-mensaje-2.php?mensaje=".$ejecuta_la_funcion);
		  exit;
	  }
  }
?>