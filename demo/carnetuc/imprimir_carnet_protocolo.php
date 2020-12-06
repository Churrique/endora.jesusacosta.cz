<?php
//************************
//Version 0.1 05-05-2009 *
//************************
// nunca olvidar comenzar la sesion
session_start();

$codigo_operacion="cicp";  //IMPORTANTE ESTE CODIGO Define el nombre de operación asociada a esta interfaz   

if (!isset($_SESSION['esta_autentificado']))
{
    header('Location: index.php');
    exit;
}

if ($_SESSION['expiracion'] <= time())
{
    header('Location: expiracion.php');
	exit;
}
else
{
    $_SESSION['expiracion']=time() + 900;
}


include("formas/header.html");
include("formas/imprimir_carnet_protocolo.html");
include("formas/footer.html");
?>
