<?php
//************************
//Version 0.1 05-05-2009 *
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

if(isset($_POST['cancelar_insertar_dependencia']))
{
    header('Location: editar_dependencia.php?error=3');
    exit;
}

if(isset($_POST['nombre']))
{
    if(trim($_POST['nombre'])=="")
    {
        $error="Debe introducir el Nombre de la Dependencia";
    }
    else
    {   
        $conexion=conectar($host_carnet,$usuario_carnet,$clave_carnet,$database_carnet);
        $nombre_dependencia=strtoupper($_POST['nombre']);
		$codigo_dependencia=strtoupper($_POST['cod_dep']);
        $sql="select * from $tabla_dependencias_carnet where nombre_dependencia='$nombre_autoridad'";
        $result=ejecutar($sql,$conexion);
        
        if(mysql_num_rows($result)>=1) 
        { 
            $error="Este Nombre ya se encuentra en la tabla DEPENDENCIA";         
        }
        else
        {
            //$time = time() +9000;
            //$hoy = date("d/m/Y h:i A", $time);
            //$operador=$_SESSION['usuario']." ".$hoy;
            $sql="insert into $tabla_dependencias_carnet (`codigo_dependencia`,`nombre_dependencia`) VALUES ('$codigo_dependencia','$nombre_dependencia')";
            $result=ejecutar($sql,$conexion);
            header('Location: editar_dependencia.php?error=2');
            exit;
        }
    }
}

include ("formas/header.html");
include ("formas/insertar_dependencia.html");
include ("formas/footer.html");

?>
