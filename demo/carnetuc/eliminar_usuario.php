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


if(isset($_POST['no_eliminar_usuario']))
{
    header('Location: administrar_usuarios.php?error=3');
    exit;
}

if(isset($_POST['eliminar_usuario']))
{
    if($_POST['seleccion']=="si")
    {
        $sql="delete from $tabla_usuarios where login='$_SESSION[usuario_login]'";
        $result=ejecutar($sql,$conexion);
        header('Location: administrar_usuarios.php?error=4');
        exit;
        
    }
    else
    {
        $error="Debe seleccionar la opción 'SI' para eliminar el usuario";
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
include ("formas/eliminar_usuario.html");
include ("formas/footer.html");

mysql_close($conexion);
mysql_close($conexion_usuario);
?>
