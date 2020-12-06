<?php
//************************
//Version 0.1 13-04-2007 *
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

$error = '';

$conexion=conectar($host_carnet,$usuario_carnet,$clave_carnet,$database_carnet);  


if(isset($_POST['no_eliminar_impresion']))
{
    header('Location: borrar_estudiante_impresion2.php?error=3');
    exit;
}

if(isset($_POST['eliminar_impresion']))
{
    if($_POST['seleccion']=="si")
    {
        $sql="delete from $tabla_historial_estudiante where fecha_carnetizacion='$_SESSION[fecha]'";
        $result=ejecutar($sql,$conexion);
        header('Location: borrar_estudiante_impresion2.php?error=4');
        exit;
        
    }
    else
    {
        $error="Debe seleccionar la opción 'SI' para eliminar la impresión";
    }
}
else
{
    if(isset($_GET['fecha_id']))
    {

        $fecha_get=$_GET['fecha_id'];
        $sql="select * from $tabla_historial_estudiante where fecha_carnetizacion='$fecha_get'";
        $result=ejecutar($sql,$conexion);
        
        if(mysql_num_rows($result)==1)
        {
            $aux=mysql_fetch_array($result);
            
            $fecha=substr($aux[fecha_carnetizacion],0,10);
            $fecha_h=(substr($aux[fecha_carnetizacion],11,19));
            $hora = $fecha_h;
            $hora = strtotime($hora);
            $hora = date("h:i:s:A", $hora);
            $fecha_carnetizacion=implode( '/', array_reverse( explode( '-', $fecha)))." ".$hora;
            $_SESSION['fecha']=$aux['fecha_carnetizacion'];
            $_SESSION['fecha1']=$fecha_carnetizacion;
        }
        else
        {
            header('Location: borrar_estudiante_impresion2.php?error=1');
            exit;
        }
    }
    else
    {
        header('Location: borrar_estudiante_impresion2.php?error=1');
        exit;
    }
}

include ("formas/header.html");
include ("formas/eliminar_impresion.html");
include ("formas/footer.html");

mysql_close($conexion);
mysql_close($conexion_usuario);
?>
