<?php
//************************
//Version 0.1 13-04-2007 *
//************************
// nunca olvidar comenzar la sesion
session_start();

$codigo_operacion="cau";  //IMPORTANTE ESTE CODIGO Define el nombre de operación asociada a esta interfaz

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


if(isset($_POST['cancelar_datos_usuario']))
{
    header('Location: administrar_usuarios.php?error=3');
    exit;
}

if(isset($_POST['actualizar_datos_usuario']))
{
    if($_POST['seleccion']=="si")
    {
        setlocale(LC_CTYPE, 'es_VE'); //parametro para activar correcta conversion caracteres latinos
        $nombre=ucwords(trim($_POST['nombre']));
        $apellido=ucwords(trim($_POST['apellido']));
        
        $sql="update $tabla_usuarios set cedula=$_POST[cedula],nombre='$nombre',apellido='$apellido',activo=$_POST[activo] where login='$_SESSION[usuario_login]'";
        $result=ejecutar($sql,$conexion);
        header('Location: administrar_usuarios.php?error=2');
        exit;
        
    }
    else
    {
        $error="Debe seleccionar la opción 'SI' para grabar los cambios";
    }
}
else
{
    if(isset($_GET['usuario_id']))
    {

        $usuario_get=$_GET['usuario_id'];
        $sql="select * from usuarios where login='$usuario_get'";
        $result=ejecutar($sql,$conexion);
        
        if(mysql_num_rows($result)==1)
        {
            $aux=mysql_fetch_array($result);
            $_SESSION['usuario_login']=$aux['login'];
            $_SESSION['usuario_cedula']=$aux['cedula'];
            $_SESSION['usuario_nombre']=$aux['nombre'];
            $_SESSION['usuario_apellido']=$aux['apellido'];
            $_SESSION['usuario_activo']=$aux['activo'];
        }
        else
        {
            header('Location: administrar_usuarios.php?error=1');
            exit;
        }
    }
    else
    {
        header('Location: administrar_usuarios.php?error=1');
        exit;
    }
}

include ("formas/header.html");
include ("formas/modificar_usuario.html");
include ("formas/footer.html");
?>
