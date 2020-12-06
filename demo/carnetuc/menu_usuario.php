<?php
//************************
//Version 0.1 13-04-2007 *
//************************
// nunca olvidar comenzar la sesion
session_start();

// alguien se ha logueado en la pagina o no?
if (!isset($_SESSION['esta_autentificado']))
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

include 'config.php'; //archivo que contiene la configuracion de conexion
include 'funciones.php';
$conexion=conectar($host_usuarios,$usuario_usuarios,$clave_usuarios,$database_usuarios);

if(isset($_POST['enviar_operacion']))
{

    if(trim($_POST['listado_operaciones_usuario']==''))
    {
        $error="Debe seleccionar una opción";
    }
    else
    {
        $link=obtener_link_operacion($conexion,$_POST['listado_operaciones_usuario']);
        header('Location: '.$link.'');
        exit;
    }
}

if(isset($_GET['mensaje']))
{
    switch($_GET['mensaje'])
    {
        case 1:
            $error="Personal insertado exitosamente";
            break;
        case 2:
            $error="Autoridad insertada exitosamente!";
            break;
        case 3:
            $error="Estudiante actualizado exitosamente!";
            break;
        case 4:
            $error="Cargo insertado exitosamente!";
            break;
        case 5:
            $error="Proceso ejecutado exitosamente!";
            break;
        case 6:
            $error="Data importada exitosamente!";
            break;
    }
} 
    
include ("formas/header.html");
include ("formas/menu_usuario.html");
include ("formas/footer.html");
?>
