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


if(isset($_POST['cancelar_permiso_usuario']))
{
    header('Location: administrar_permisos_usuarios.php?error=3');
    exit;
}

if(isset($_POST['agregar_permiso_usuario']))
{
        if(trim($_POST['listado_operaciones'])=='')
        {
            $error="Error. Si desea agregar un permiso debe seleccionar uno de la lista";
        }
        else
        {
            if(usuario_autorizado($conexion,$_SESSION['usuario_login'],$_POST['listado_operaciones']))
            {
                $error="Error. No se puede agregar el permiso ya que este usuario lo posee";
            }
            else
            {
                $sql="insert into permisos (login,codigo_operacion) VALUES ('$_SESSION[usuario_login]','$_POST[listado_operaciones]')";
                $result=ejecutar($sql,$conexion);                
            }
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
            header('Location: administrar_permisos_usuarios.php?error=1');
            exit;
        }
    }
    else
    {
        if(!isset($_SESSION['usuario_login']))
        {
                header('Location: administrar_permisos_usuarios.php?error=1');
                exit;
        }
    }
}

include ("formas/header.html");
include ("formas/modificar_permisos_usuario.html");
include ("formas/footer.html");
?>
