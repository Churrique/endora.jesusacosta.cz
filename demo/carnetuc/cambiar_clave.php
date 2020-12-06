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


if(isset($_POST['cancelar_cambiar_clave']))
{
    header('Location: administrar_usuarios.php?error=3');
    exit;
}

if(isset($_POST['cambiar_clave']))
{
    if($_POST['clavea']=='' || $_POST['claveb']=='')
    {
        $error='Error. Por favor introduzca una clave en ambas casillas';
    }
    else
    {
        if($_POST['clavea']!==$_POST['claveb'])
        {
            $error='Error. las claves no coinciden. Por favor ingresela de nuevo';
        }
        else
        {
            $validacion=validar_clave($_POST['clavea'],$_SESSION['usuario_cedula']);
            if($validacion[0]==false)
            {
                $error=$validacion[1];
            }
            else
            {
                $sql="update $tabla_usuarios set clave='$_POST[clavea]',clave2='$_POST[clavea]' where login='$_SESSION[usuario_login]'";
                $result=ejecutar($sql,$conexion);
                header('Location: administrar_usuarios.php?error=6');
                exit;
            }
        }
    }
}

include ("formas/header.html");
include ("formas/cambiar_clave.html");
include ("formas/footer.html");

mysql_close($conexion);
mysql_close($conexion_usuario);
?>
