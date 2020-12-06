<?php
//************************
//Version 0.1 13-04-2007 *
//************************
// nunca olvidar comenzar la sesion  
session_start();
$codigo_operacion="cic";  //IMPORTANTE ESTE CODIGO Define el nombre de operaci�n asociada a esta interfaz    

if (!isset($_SESSION['esta_autentificado']))
{
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

include 'config.php'; //archivo que contiene la configuracion de conexion
include 'funciones.php';


if(isset($_POST['imprimir'])or isset($_POST['imprimir2']))
{
    if($_POST['dia']=="")
    {
       $error="Error. Debe seleccionar el d�a de vencimiento";
    }
    else
    {
        if($_POST['mes']=="")
        {
            $error="Error. Debe seleccionar el mes de vencimiento";
        }
        else
        {
           if($_POST['ano']=="")
           {
                $error="Error. Debe seleccionar el a�o de vencimiento";
           }
           else
           {
                if (checkdate($_POST['mes'],$_POST['dia'],$_POST['ano'])==false)
                {
                    $error="La fecha introducida es inv�lida.Por favor verifique";
                }
                else
                {
                    $conexion=conectar($host_carnet,$usuario_carnet,$clave_carnet,$database_carnet);   
                    $_SESSION['dia']=$_POST['dia'];
                    $_SESSION['mes']=$_POST['mes'];
                    $_SESSION['ano']=$_POST['ano'];
                    $codigo=$_POST['listado_autoridades'];
                    $_SESSION['nombre_autoridad']=obtener_nombre_autoridad($conexion,$codigo);
                    $_SESSION['num_caracter_autoridad']=strlen($_SESSION['nombre_autoridad']);
                    $hoy=fecha_actual();
                    $_SESSION['fecha_vencimiento']=$_POST['ano']."-".$_POST['mes']."-".$_POST['dia']." 23:59:59";    
                    $sql = "INSERT INTO $tabla_historial_personal(`cedula`,`fecha_carnetizacion`,`fecha_vencimiento`,`tipo_personal`,`dependencia`,`impreso_por`) VALUES ('$_SESSION[cedula]','$hoy','$_SESSION[fecha_vencimiento]','$_SESSION[tipo_personal]','$_SESSION[dependencia]','$_SESSION[usuario]')";
                    $result = ejecutar($sql,$conexion);
                    
                    ?>
                    <script language=javascript> 
                    function openwindow(url, width, height)
                    {
                    var win;
                    var windowName;
                    var params;
                    x=(screen.width - 800)/2
                    y=(screen.height -400)/2

                    var d = new Date();
                    var t = d.getTime();

                    params = "toolbar=0,";
                    params += "location=0,";
                    params += "directories=0,";
                    params += "status=0,";
                    params += "menubar=0,";
                    params += "titlebar=1,";
                    params += "scrollbars=1,";
                    params += "resizable=1,";
                    params += "top="+y+",";
                    params += "left="+x+",";
                    params += "width="+width+",";
                    params += "height="+height;

                    win = window.open(url,t, params);
                    }
                    </script>
                    </body>
                    </html>
                    <?php
                    if(isset($_POST['imprimir']))
                    {
                      echo "<script>javascript:openwindow('imprimir_carnet_personal3.php',800,400)</script>"; 
                    }
                    else
                    {
                      echo "<script>javascript:openwindow('imprimir_carnet_personal4.php',800,400)</script>";     
                    }  
                } 
            }    
          }
      }  
}    

$conexion=conectar($host_carnet,$usuario_carnet,$clave_carnet,$database_carnet);    


include("formas/header.html");
include("formas/imprimir_carnet_personal2.html");
include("formas/footer.html");
?>
