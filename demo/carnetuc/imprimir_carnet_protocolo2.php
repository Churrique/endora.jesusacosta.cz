<?php
//************************
//Version 0.1 05-05-2009 *
//************************
// nunca olvidar comenzar la sesion
session_start();
$codigo_operacion="cicp";  //IMPORTANTE ESTE CODIGO Define el nombre de operación asociada a esta interfaz     

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
                    
  echo "<script>javascript:openwindow('imprimir_carnet_protocolo3.php',800,400)</script>"; 
 
include("formas/header.html");
include("formas/imprimir_carnet_protocolo.html");
include("formas/footer.html");
?>
