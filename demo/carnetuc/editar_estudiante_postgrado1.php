<?php
//************************
//Version 0.1 05-05-2009 *
//************************
// nunca olvidar comenzar la sesion

session_start();

$codigo_operacion="ceep";  //IMPORTANTE ESTE CODIGO Define el nombre de operación asociada a esta interfaz

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

if(isset($_POST['cancelar_actualizar_estudiante']))
{
    header('Location: editar_estudiante_postgrado.php?mensaje=2');
    exit;
}

$conexion=conectar($host_carnet,$usuario_carnet,$clave_carnet,$database_carnet); 

if(isset($_POST['actualizar_estudiante'])) 
{            
     if($_POST['nacionalidad']=='')
     {
       $error="Error. Debe seleccionar la nacionalidad";
     }
     else
     {
        if(trim($_POST['primer_nombre']==''))
        {
            $error="Debe introducir el primer nombre";  
        }
        else
        {
             if(trim($_POST['primer_apellido']==''))
             {
                 $error="Debe introducir el primer apellido";
             }
             else
             {

               $time= time() +9000;
               $hoy= date("d/m/Y h:i A", $time);
               $hoy2= fecha_actual();
               $operador=$_SESSION['usuario']." ".$hoy;

               
               $cedula=$_SESSION['cedula'];
               
               $primer_nombre=strtoupper(trim($_POST['primer_nombre']));
               $segundo_nombre= strtoupper(trim($_POST['segundo_nombre']));
               $primer_apellido=strtoupper(trim($_POST['primer_apellido']));
               $segundo_apellido= strtoupper(trim($_POST['segundo_apellido']));

               $sql="update $tabla_estudiante_postgrado set `nacionalidad`='$_POST[nacionalidad]',`primer_nombre`='$primer_nombre',`segundo_nombre`='$segundo_nombre',`primer_apellido`='$primer_apellido',`segundo_apellido`='$segundo_apellido',`carrera`='$_POST[listado_carreras]',`fecha_registro`='$hoy2',`chequeado_por`='$operador' WHERE cedula='$cedula'";
      
               $result=ejecutar($sql,$conexion);
               header('Location: editar_estudiante_postgrado.php?mensaje=1');   
               exit;
             }
        }
     }
}
include ("formas/header.html");
include ("formas/editar_estudiante_postgrado1.html");
include ("formas/footer.html");
mysql_close($conexion_usuario);
?>
