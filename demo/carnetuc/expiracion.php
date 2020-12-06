<?php
//************************
//Version 0.1 19-05-2007 *
//************************
// Nunca olvidar iniciar la sesion
session_start();

//si el usuario esta logueado desloguearlo de la sesion
if (isset($_SESSION['esta_autentificado']))
{
	session_unset();
    session_destroy();
}

include("formas/expiracion.html");
?>
