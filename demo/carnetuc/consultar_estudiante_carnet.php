<?php
//************************
//Version 0.1 05-05-2009 *
//************************
// nunca olvidar comenzar la sesion
session_start();

$codigo_operacion="cce";  //IMPORTANTE ESTE CODIGO Define el nombre de operación asociada a esta interfaz

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
if(trim($_POST['cedula'])<>'')
{
    
        $conexion=conectar($host_carnet,$usuario_carnet,$clave_carnet,$database_carnet);
        $cedula=$_POST['cedula'];
        //buscamos en registro estudiante 
        $sql="select * from $tabla_estudiante_carnet where cedula='$cedula'";
        $result=ejecutar($sql,$conexion);
        
        if(mysql_num_rows($result)==1)
        {
            
                  $aux=mysql_fetch_array($result); 
                  
                  $_SESSION['cedula']=$aux['cedula'];
                  $_SESSION['primer_nombre']=$aux['primer_nombre'];
                  $_SESSION['segundo_nombre']=$aux['segundo_nombre'];
                  $_SESSION['primer_apellido']=$aux['primer_apellido'];
                  $_SESSION['segundo_apellido']= $aux['segundo_apellido'];
                  $_SESSION['codigo_carrera']=$aux['carrera'];
                  $_SESSION['carrera']=obtener_nombre_escuela($conexion,$aux['carrera']);
                  $_SESSION['facultad']=$aux['facultad'];  
                  $_SESSION['nombre_facultad']=obtener_nombre_facultad($conexion,$aux['facultad']);    
                  $sql="select * from $tabla_historial_estudiante where cedula='$cedula' order by fecha_carnetizacion desc";   
                  $result=ejecutar($sql,$conexion); 
                  $nfilas=mysql_num_rows($result); 

                  if($nfilas>=1)
                  {
                    $aux=mysql_fetch_array($result);
                    $_SESSION['cantidad_carnet']=$nfilas;
                    $fecha=substr($aux[fecha_carnetizacion],0,10);
                    $fecha=implode( '/', array_reverse( explode( '-', $fecha)));
                    $_SESSION['fecha_carnetizacion']=$fecha;
                  }
                  else
                  {
                    $_SESSION['cantidad_carnet']=0;
                    $_SESSION['fecha_carnetizacion']="No se ha carnetizado";
                  }

                  header('Location: consultar_estudiante_carnet2.php');
                  exit;  
        }
        else
        {
            
            $conexion=conectar($host_carnet,$usuario_carnet,$clave_carnet,$database_carnet);
            $cedula=$_POST['cedula'];
            //buscamos en registro estudiante 
            $sql="select * from $tabla_msince_carnet where cedula='$cedula'";
            $result=ejecutar($sql,$conexion);
            
            if(mysql_num_rows($result)==1)
            {
            
                  $aux=mysql_fetch_array($result); 
                  
                  $_SESSION['cedula']=$aux['cedula'];
                  $_SESSION['primer_nombre']=$aux['primer_nombre'];
                  $_SESSION['segundo_nombre']=$aux['segundo_nombre'];
                  $_SESSION['primer_apellido']=$aux['primer_apellido'];
                  $_SESSION['segundo_apellido']= $aux['segundo_apellido'];
                  $_SESSION['codigo_carrera']=$aux['carrera'];
                  $_SESSION['carrera']=obtener_nombre_escuela($conexion,$aux['carrera']);
                  $_SESSION['facultad']=$aux['facultad'];  
                  $_SESSION['nombre_facultad']=obtener_nombre_facultad($conexion,$aux['facultad']);    
                  $sql="select * from $tabla_historial_estudiante where cedula='$cedula'";   
                  $result=ejecutar($sql,$conexion); 
                  $nfilas=mysql_num_rows($result); 

                  if($nfilas>=1)
                  {
                    $aux=mysql_fetch_array($result);
                    $_SESSION['cantidad_carnet']=$nfilas;
                    $fecha=substr($aux[fecha_carnetizacion],0,10);
                    $fecha=implode( '/', array_reverse( explode( '-', $fecha)));
                    $_SESSION['fecha_carnetizacion']=$fecha;
                  }
                  else
                  {
                    $_SESSION['cantidad_carnet']=0;
                    $_SESSION['fecha_carnetizacion']="No se ha carnetizado";
                  }

                  header('Location: consultar_estudiante_carnet2.php');
                  exit;  
            
              }
              else
              { 
                 $error = 'Error. Cédula inválida, no existe en la Base de Datos';
              }  
        }
   
}
else
{
    if(isset($_POST['cedula']))
    {
        $error="Introduzca la cédula a consultar";
    }
}

include("formas/header.html");
include("formas/consultar_estudiante_carnet.html");
include("formas/footer.html");

mysql_close($conexion_usuario);
?>
