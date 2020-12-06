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


include("formas/imprimir_carnet_protocolo3.html"); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Universidad de Carabobo - DICES - Impresión de Carnet Protocolo</title>
</head>
<body>



  






  
