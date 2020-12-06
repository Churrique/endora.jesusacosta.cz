<?php
//************************
//Version 0.1 05-05-2009 *
//************************
// nunca olvidar comenzar la sesion
session_start();

$codigo_operacion="cbie";  //IMPORTANTE ESTE CODIGO Define el nombre de operación asociada a esta interfaz

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

if(isset($_GET['error']))
{
    switch($_GET['error'])
    {
        case 1:
            $error="Error. Impresión no encontrado en la Base de Datos";
            break;
        case 2:
            $error="Impresión Creada Exitosamente!";
            break;
        case 3:
            $error="No se realizó ningún cambio en la Base de Datos";
            break;
        case 4:
            $error="Impresión eliminada exitosamente!";
            break;
        case 5:
            $error="Impresión modificada exitosamente!";
            break;
        case 6:
            $error="Clave de usuario modificada exitosamente!";
            break;
    }
}
//$conexion=conectar($host_inscripciones,$usuario_inscripciones,$clave_inscripciones,$database_inscripciones);
$conexion=conectar($host_carnet,$usuario_carnet,$clave_carnet,$database_carnet);   
include("formas/header.html");
include("formas/borrar_estudiante_impresion2.html");
include("formas/footer.html");
?>
