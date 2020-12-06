<?php
//************************
//Version 0.1 05-05-2009 *
//************************
// nunca olvidar comenzar la sesion
session_start();

$codigo_operacion="cccm";  //IMPORTANTE ESTE CODIGO Define el nombre de operaci�n asociada a esta interfaz

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

 if ( (isset($_POST['fechad'])) || (isset($_POST['fechah'])) == TRUE)
 { 
        $conexion=conectar($host_carnet,$usuario_carnet,$clave_carnet,$database_carnet); 
		$fechad=$_POST['fechad'];
        $fechah=$_POST['fechah']; 
  		
        $fechad1 = explode('/',$_POST['fechad']);
		$fechah1 = explode('/',$_POST['fechah']);
		
		if ($fechah1 < $fechad1) {
          $error='La Fecha Hasta debe ser MAYOR a la Fecha Desde';
		} 
		elseif ( (trim($_POST['fechad']) == '') || (trim($_POST['fechah']) == '') )
		{
		  $error='Introduzca las Fechas a Consultar';
		}
		else 
		{
		  $_SESSION['fechad']=$fechad;
		  $_SESSION['fechah']=$fechah;		 
		  header('Location: consultar_cantidad_carnet_motivos1.php');
		  exit; 
		}
} 

include("formas/header.html");
include("formas/consultar_cantidad_carnet_motivos.html");
include("formas/footer.html");
?>
