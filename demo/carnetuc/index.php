<?php

//************************

//Version 0.2 10-04-2009 *

//************************

// nunca olvidar comenzar la sesion

session_start();



if (isset($_SESSION['esta_autentificado']))

{

	// si ya esta logueado

	session_unset();

    session_destroy();

}



include 'config.php'; //archivo que contiene la configuracion de conexion

$error = '';

if(isset($_POST['verificar']))

{

    include 'funciones.php';





        if(trim($_POST['usuario'])=='')

        {

            $error="Por favor introduzca su usuario";

        }

        else

        {

            if(trim($_POST['clave'])=='')

            {

                $error="Por favor introduzca su clave";

            }

            else

            {

                $conexion=conectar($host_usuarios,$usuario_usuarios,$clave_usuarios,$database_usuarios);

                $usuario_post=$_POST['usuario'];

                $clave_post=$_POST['clave'];

                $sql="select * from usuarios where login='$usuario_post' and clave='$clave_post'";

                $result=ejecutar($sql,$conexion);

                //if(mysql_num_rows($result)==1)
                if(mysqli_num_rows($result)==1)

                {        

                    //$aux=mysql_fetch_array($result);
                    $aux=mysqli_fetch_array($result);

                    if($aux['activo']==1)

                    {

                        $_SESSION['usuario']=$aux['login'];

                        $_SESSION['nombre']= $aux['nombre'];

                        $_SESSION['apellido']=$aux['apellido'];

                        $_SESSION['esta_autentificado'] = true;

                        $_SESSION['expiracion']=time() + 900;



                        // despues que hace login vamos a la pantalla menu usuario

                            header('Location: menu_usuario.php');

		                    exit;

                    }

                    else

                    {

                        $error="El usuario introducido se encuentra temporalmente inactivo en el sistema";

                    }

                }

                else

                {

                    $error = 'Error. Usuario o clave incorrecta.<br>Por favor intente de nuevo';

                }

        }

    }

}



include("formas/header.html");

include("formas/login_usuarios.html");

include("formas/footer.html");

?>

