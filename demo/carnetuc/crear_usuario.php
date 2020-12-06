<?php
//************************
//Version 0.1 13-04-2007 *
//************************
// nunca olvidar comenzar la sesion
session_start();

$codigo_operacion="cau";  //IMPORTANTE ESTE CODIGO Define el nombre de operación asociada a esta interfaz

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

$conexion=conectar($host_usuarios,$usuario_usuarios,$clave_usuarios,$database_usuarios);


if(isset($_POST['cancelar_crear_usuario']))
{
    header('Location: administrar_usuarios.php?error=3');
    exit;
}

if(isset($_POST['crear_usuario']))
{
    if(trim($_POST['login'])=='')
    {
        $error="Debe escribir el nombre de usuario";
    }
    else
    {
        $sql="select * from $tabla_usuarios where login='$_POST[login]'";
        $result=ejecutar($sql,$conexion);
        
        if (mysql_num_rows($result)>=1)
        {
            $error="El nombre de usuario introducido ya está en uso. Por favor introduzca otro nombre de usuario";
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
                if(trim($_POST['nombre'])=='')
                {
                    $error="Debe ingresar el nombre";
                }
                else
                {
                    if(trim($_POST['apellido']==''))
                    {
                        $error="Debe ingresar el apellido";
                    }
                    else
                    {
                        if($_POST['activo']=='')
                        {
                            $error="Debe seleccionar si desea activar o no a este usuario";
                        }
                        else
                        {
                            if($_POST['clavea']=='' || $_POST['claveb']=='')
                            {
                                $error='Error. Por favor introduzca una clave en ambas casillas';
                            }
                            else
                            {
                                if($_POST['clavea']!==$_POST['claveb'])
                                {
                                    $error='Error. las claves no coinciden. Por favor ingresela de nuevo';
                                }
                                else
                                {
                                    $validacion=validar_clave($_POST['clavea'],$_POST['cedula']);
                                    if($validacion[0]==false)
                                    {
                                        $error=$validacion[1];
                                    }
                                    else
                                    {
                                        setlocale(LC_CTYPE, 'es_VE'); //parametro para activar correcta conversion caracteres latinos
                                        $login=strtolower($_POST['login']);
                                        $nombre=strtoupper(trim($_POST['nombre']));
                                        $apellido=strtoupper(trim($_POST['apellido']));
                                        $sql2="insert into $tabla_usuarios (`cedula`,`nombre`,`apellido`,`login`,`clave`,`clave2`,`activo`) VALUES ($_POST[cedula],'$nombre','$apellido','$login','$_POST[clavea]','$_POST[clavea]','$_POST[activo]')";
                                        $result=ejecutar($sql2,$conexion);
                                        header('Location: administrar_usuarios.php?error=5');
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
}

include ("formas/header.html");
include ("formas/crear_usuario.html");
include ("formas/footer.html");

mysql_close($conexion);
mysql_close($conexion_usuario);
?>
