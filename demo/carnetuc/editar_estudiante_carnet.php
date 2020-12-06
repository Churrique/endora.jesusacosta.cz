<?php
//************************
//Version 0.1 05-05-2009 *
//************************
// nunca olvidar comenzar la sesion
session_start();

$codigo_operacion="cee";  //IMPORTANTE ESTE CODIGO Define el nombre de operaci�n asociada a esta interfaz

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

if(isset($_POST['buscar_estudiante']))
{    
     if(trim($_POST['cedula'])=='')
    {
        $error="Debe introducir una c�dula";
    }
    else
    {
        $validacion=validar_cedula($_POST['cedula']);

        if($validacion[0]==false)
        {
            $error=$validacion[1]; //asigno el mensaje de error a la variable error
        }
        else
        {
    
            $conexion=conectar($host_carnet,$usuario_carnet,$clave_carnet,$database_carnet); 
            $sql="select * from $tabla_estudiante_carnet where cedula=$_POST[cedula]";
            $result=ejecutar($sql,$conexion);
    
    
               if (mysql_num_rows($result)>=1)
               {
                  $aux=mysql_fetch_array($result);
                  $_SESSION['cedula']=$aux[cedula];      
                  $_SESSION['nacionalidad']=$aux[nacionalidad];
                  $_SESSION['primer_nombre']=$aux[primer_nombre]; 
                  $_SESSION['segundo_nombre']=$aux[segundo_nombre]; 
                  $_SESSION['primer_apellido']=$aux[primer_apellido];
                  $_SESSION['segundo_apellido']=$aux[segundo_apellido];                    
                  $_SESSION['listado_facultades']=obtener_nombre_facultad($conexion,$aux['facultad']);  
                  $_SESSION['listado_carreras']=obtener_nombre_escuela($conexion,$aux['carrera']);  
                  $_SESSION['codigo_carrera']=$aux['carrera'];
                  $_SESSION['facultad']=$aux['facultad']; 
                  header('Location: editar_estudiante_carnet1.php');
                  exit;  
                 
               }
               else
               {
                    $sql="select * from $tabla_msince_carnet where cedula=$_POST[cedula]";
                    $result=ejecutar($sql,$conexion);
            
                    if (mysql_num_rows($result)>=1)
                    {
                       $aux=mysql_fetch_array($result);  
                       $_SESSION['cedula']=$aux[cedula];      
                       $_SESSION['nacionalidad']= $aux[nacionalidad];       
                       $_SESSION['primer_nombre']=$aux[primer_nombre];
                       $_SESSION['segundo_nombre']=$aux[segundo_nombre];
                       $_SESSION['primer_apellido']=$aux[primer_apellido];
                       $_SESSION['segundo_apellido']=$aux[segundo_apellido];
                       $_SESSION['listado_facultades']=obtener_nombre_facultad($conexion,$aux['facultad']);  
                       $_SESSION['listado_carreras']=obtener_nombre_escuela($conexion,$aux['carrera']); 
                       $_SESSION['codigo_carrera']=$aux['carrera'];
                       $_SESSION['facultad']=$aux['facultad']; 
                       header('Location: editar_estudiante_carnet1.php');
                       exit;  
                    }   
                    else
                    {
                        $error="Error. Esta c�dula no se encuentra en la Base de Datos";   
                    }
            
               }
          }     
      }
}  

if(isset($_GET['mensaje']))
{
    switch($_GET['mensaje'])
    {
        case 1:
            $error="Estudiante actualizado exitosamente!";
            break;
        case 2:
            $error="No se ha realiz� ning�n cambio en la base de datos";
            break;   
    }
} 



include ("formas/header.html");
include ("formas/editar_estudiante_carnet.html");
include ("formas/footer.html");
mysql_close($conexion_usuario);
?>
