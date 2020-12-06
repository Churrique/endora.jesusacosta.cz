<?php
//************************
//Version 0.1 13-04-2007 *
//************************
// nunca olvidar comenzar la sesion
session_start();

$codigo_operacion="ceca";  //IMPORTANTE ESTE CODIGO Define el nombre de operaci�n asociada a esta interfaz

include 'config.php'; //archivo que contiene la configuracion de conexion
include 'funciones.php';
$conexion_usuario=conectar($host_usuarios,$usuario_usuarios,$clave_usuarios,$database_usuarios);

// alguien se ha logueado en la pagina o no?  y est� autorizado o no?
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

$conexion=conectar($host_carnet,$usuario_carnet,$clave_carnet,$database_carnet);  


if(isset($_POST['no_eliminar_cargo']))
{
    header('Location: editar_cargo_autoridad.php?error=3');
    exit;
}

if(isset($_POST['eliminar_cargo']))
{
    if($_POST['seleccion']=="si")
    {
        $sql="delete from $tabla_autoridad_carnet where nombre_autoridad='$_SESSION[cargo_nombre]'";
        $result=ejecutar($sql,$conexion);
        header('Location: editar_cargo_autoridad.php?error=4');
        exit;
        
    }
    else
    {
        $error="Debe seleccionar la opci�n 'SI' para eliminar el cargo";
    }
}
else
{
    if(isset($_GET['cargo_id']))
    {

        $cargo_get=$_GET['cargo_id'];
        $sql="select * from $tabla_autoridad_carnet where nombre_autoridad='$cargo_get'";
        $result=ejecutar($sql,$conexion);
        
        if(mysql_num_rows($result)==1)
        {
            $aux=mysql_fetch_array($result);
            
            $_SESSION['cargo_nombre']=$aux['nombre_autoridad'];
        }
        else
        {
            header('Location: editar_cargo_autoridad.php?error=1');
            exit;
        }
    }
    else
    {
        header('Location: editar_cargo_autoridad.php?error=1');
        exit;
    }
}

include ("formas/header.html");
include ("formas/eliminar_cargo_autoridad.html");
include ("formas/footer.html");

mysql_close($conexion);
mysql_close($conexion_usuario);
?>
