<?php
//************************
//Version 0.1 05-05-2009 *
//************************
// nunca olvidar comenzar la sesion
session_start();

$codigo_operacion="cip";  //IMPORTANTE ESTE CODIGO Define el nombre de operación asociada a esta interfaz

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

if(isset($_POST['cancelar_insertar_personal']))
{
    header('Location: menu_usuario.php');
    exit;
}

$conexion=conectar($host_carnet,$usuario_carnet,$clave_carnet,$database_carnet);

if(isset($_POST['insertar_personal']))
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
                        if($_POST['listado_dependencias']=='')
                        {
                            $error="Debe seleccionar la Dependencia a la cual pertenece";
                        }
                        else
                        {
                            if($_POST['listado_tipos']=='')
                            {
                                $error="Debe seleccionar el Tipo de Personal del Empleado";
                            }
                            else
                            {
                                
                                $sql="select * from $tabla_personal_carnet where cedula=$_POST[cedula]";
                                $result=ejecutar($sql,$conexion);
                                
                                $time = time() +9000;
                                $hoy = date("d/m/Y h:i A", $time);
                                $hoy2=fecha_actual();
                                $operador=$_SESSION['usuario']." ".$hoy;

                                $primer_nombre=strtoupper(trim($_POST['primer_nombre']));
                                $segundo_nombre= strtoupper(trim($_POST['segundo_nombre']));
                                $primer_apellido=strtoupper(trim($_POST['primer_apellido']));
                                $segundo_apellido= strtoupper(trim($_POST['segundo_apellido']));
                                
                                if (mysql_num_rows($result)>=1)
                                {
                                   $error="Esta persona ya se encuentra en la base de datos"; 
                                    //$sql="update $tabla_personal_carnet set `cedula`='$_POST[cedula]',`nacionalidad`='$_POST[nacionalidad]',`primer_nombre`='$primer_nombre',`segundo_nombre`='$segundo_nombre',`primer_apellido`='$primer_apellido',`segundo_apellido`='$segundo_apellido',`tipo_personal`='$_POST[listado_tipos]',`dependencia`='$_POST[listado_dependencias]',`fecha_registro`='$hoy2',`chequeado_por`='$operador' WHERE cedula='$_POST[cedula]'";
                                }
                                else
                                {
                                    $sql="insert into $tabla_personal_carnet (`cedula`,`nacionalidad`,`primer_nombre`,`segundo_nombre`,`primer_apellido`,`segundo_apellido`,`tipo_personal`,`dependencia`,`fecha_registro`,`chequeado_por`) VALUES ($_POST[cedula],'$_POST[nacionalidad]','$primer_nombre','$segundo_nombre','$primer_apellido','$segundo_apellido','$_POST[listado_tipos]','$_POST[listado_dependencias]','$hoy2','$operador')";
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
include ("formas/insertar_personal_carnet.html");
include ("formas/footer.html");
mysql_close($conexion_usuario);
mysql_close($conexion);
?>
