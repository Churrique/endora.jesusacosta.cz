<?php
//************************
//Version 0.1 13-04-2007 *
//************************
// nunca olvidar comenzar la sesion
session_start();

$codigo_operacion="cece";  //IMPORTANTE ESTE CODIGO Define el nombre de operación asociada a esta interfaz

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

$conexion=conectar($host_carnet,$usuario_carnet,$clave_carnet,$database_carnet);  

if(isset($_GET['error']))
{
    switch($_GET['error'])
    {
        case 1:
            $error="Error. Cargo no encontrado en la Base de Datos";
            break;
        case 2:
            $error="Cargo Creado Exitosamente!";
            break;
        case 3:
            $error="No se realizó ningún cambio en la Base de Datos";
            break;
        case 4:
            $error="Cargo eliminado exitosamente!";
            break;
        case 5:
            $error="Cargo modificado exitosamente!";
            break;
        case 6:
            $error="Clave de usuario modificada exitosamente!";
            break;
    }
}

include ("formas/header.html");
include ("formas/editar_cargo_estudiante.html");
include ("formas/footer.html");

mysql_close($conexion);
mysql_close($conexion_usuario);
?>
