<?php
//************************
//Version 0.1 13-04-2007 *
//************************
// nunca olvidar comenzar la sesion
session_start();

$codigo_operacion="ced";  //IMPORTANTE ESTE CODIGO Define el nombre de operación asociada a esta interfaz

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
$conexion=conectar($host_carnet,$usuario_carnet,$clave_carnet,$database_carnet);  


if(isset($_POST['cancelar_dependencia']))
{
    header('Location: editar_dependencia.php?error=3');
    exit;
}

if(isset($_POST['actualizar_dependencia']))
{
    if($_POST['seleccion']=="si")
    {
        setlocale(LC_CTYPE, 'es_VE'); //parametro para activar correcta conversion caracteres latinos
        $nombre=ucwords(strtoupper(trim($_POST['nombre'])));
       
        
        $sql="update $tabla_dependencias_carnet set nombre_dependencia='$nombre' where nombre_dependencia='$_SESSION[dependencia_nombre]'";
        $result=ejecutar($sql,$conexion);
        header('Location: editar_dependencia.php?error=5');
        exit;
        
    }
    else
    {
        $error="Debe seleccionar la opción 'SI' para grabar los cambios";
    }
}
else
{
    if(isset($_GET['dependencia_id']))
    {

        $dependencia_get=$_GET['dependencia_id'];
        $sql="select * from $tabla_dependencias_carnet where nombre_dependencia='$dependencia_get'";
        $result=ejecutar($sql,$conexion);
        
        if(mysql_num_rows($result)==1)
        {
            $aux=mysql_fetch_array($result);
            
            $_SESSION['dependencia_nombre']=$aux['nombre_dependencia'];
           
        }
        else
        {
            header('Location: editar_dependencia.php?error=1');
            exit;
        }
    }
    else
    {
        header('Location: editar_dependencia.php?error=1');
        exit;
    }
}

include ("formas/header.html");
include ("formas/modificar_dependencia.html");
include ("formas/footer.html");
?>
