<?php
//************************
//Version 0.1 13-04-2007 *
//************************
// nunca olvidar comenzar la sesion
session_start();

$codigo_operacion="capu";  //IMPORTANTE ESTE CODIGO Define el nombre de operación asociada a esta interfaz

include 'config.php'; //archivo que contiene la configuracion de conexion
include 'funciones.php';
$conexion_usuario=conectar($host_usuarios,$usuario_usuarios,$clave_usuarios,$database_usuarios);

// alguien se ha logueado en la pagina o no?  y está autorizado o no?
if (!isset($_SESSION['esta_autentificado']) || !usuario_autorizado($conexion_usuario,$_SESSION['usuario'],$codigo_operacion))
{
    // si no se ha logueado ir a la pagina principal
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

$error = '';
$conexion=conectar($host_usuarios,$usuario_usuarios,$clave_usuarios,$database_usuarios);


if(isset($_SESSION['usuario_login']) and isset($_GET['codigo_operacion']))
{
        $sql="delete from permisos where login='$_SESSION[usuario_login]' and codigo_operacion='$_GET[codigo_operacion]'";
        $result=ejecutar($sql,$conexion);
        header("Location: modificar_permisos_usuario.php");
        exit;
}
else
{
    header("Location: modificar_permisos_usuario.php");
    exit;
}

mysql_close($conexion);
mysql_close($conexion_usuario);
?>
