<?php
//************************
//Version 0.1 05-05-2009 *
//************************
// nunca olvidar comenzar la sesion
session_start();

$codigo_operacion="cir";  //IMPORTANTE ESTE CODIGO Define el nombre de operación asociada a esta interfaz

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


if(isset($_POST['imprimir_reverso']))
{
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
  echo "<script>javascript:openwindow('imprimir_reverso2.php',800,400)</script>"; 
}
                    
 
include("formas/header.html");
include("formas/imprimir_reverso.html");
include("formas/footer.html");
mysql_close($conexion_usuario);
?>
