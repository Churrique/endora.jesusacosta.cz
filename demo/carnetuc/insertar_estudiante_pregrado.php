<?php
//************************
//Version 0.1 13-04-2007 *
//************************
// nunca olvidar comenzar la sesion
session_start();

$codigo_operacion="ciepr";  //IMPORTANTE ESTE CODIGO Define el nombre de operación asociada a esta interfaz

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

if(isset($_POST['cancelar_insertar_estudiante_pregrado']))
{
    header('Location: menu_usuario.php');
    exit;
}

$conexion=conectar($host_carnet,$usuario_carnet,$clave_carnet,$database_carnet);   

if(isset($_POST['insertar_estudiante_pregrado']))
{
    if(trim($_POST['cedula'])=='')
    {
        $error="Debe introducir una cédula";
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
                
                        if($_POST['listado_facultades']=='')
                        {
                            $error="Debe seleccionar la Facultad que está cursando";
                        }
                        else
                        {
                            if($_POST['listado_carreras']=='')
                            {
                                $error="Debe seleccionar la carrera que está cursando";
                            }
                            else
                            {
                                
                                $conexion=conectar($host_carnet,$usuario_carnet,$clave_carnet,$database_carnet);   
                                $sql="select * from $tabla_estudiante_carnet where cedula=$_POST[cedula]";
                                $result=ejecutar($sql,$conexion);
        
                                $time = time() +9000;
                                $hoy = date("d/m/Y h:i A", $time);
                                $hoy2= fecha_actual();
                                $operador=$_SESSION['usuario']." ".$hoy;

        
                                $primer_nombre=strtoupper(trim($_POST['primer_nombre']));
                                $segundo_nombre= strtoupper(trim($_POST['segundo_nombre']));
                                $primer_apellido=strtoupper(trim($_POST['primer_apellido']));
                                $segundo_apellido= strtoupper(trim($_POST['segundo_apellido']));
                                
                                
                                if (mysql_num_rows($result)>=1)
                                {
                                    $error="Error. Esta persona ya existe en la base de datos";
                                }
                                else
                                {

                                    $sql="insert into $tabla_estudiante_carnet (`cedula`,`nacionalidad`,`primer_nombre`,`segundo_nombre`,`primer_apellido`,`segundo_apellido`,`facultad`,`carrera`,`fecha_registro`,`chequeado_por`) VALUES ($_POST[cedula],'$_POST[nacionalidad]','$primer_nombre','$segundo_nombre','$primer_apellido','$segundo_apellido','$_POST[listado_facultades]','$_POST[listado_carreras]','$hoy2','$operador')";
                                    $result=ejecutar($sql,$conexion);
                                    header('Location: menu_usuario.php');
                                    exit;
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}

include ("formas/header.html");
include ("formas/insertar_estudiante_pregrado.html");
include ("formas/footer.html");
mysql_close($conexion_usuario);
?>
