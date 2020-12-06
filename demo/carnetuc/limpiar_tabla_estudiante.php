<?php
//************************
//Version 0.1 05-05-2009 *
//************************
// nunca olvidar comenzar la sesion
session_start();

$codigo_operacion="clt";  //IMPORTANTE ESTE CODIGO Define el nombre de operación asociada a esta interfaz

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


if(isset($_POST['limpiar_tabla']))
{
   $conexion=conectar($host_carnet,$usuario_carnet,$clave_carnet,$database_carnet);      
   $sql="delete from $tabla_estudiante_carnet where `generado`='0'";
   $result=ejecutar($sql,$conexion); 
   header('Location: menu_usuario.php?mensaje=5');
   exit;
}
    
                    
 
include("formas/header.html");
include("formas/limpiar_tabla_estudiante.html");
include("formas/footer.html");
mysql_close($conexion_usuario);
?>
