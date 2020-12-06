<?php
  include_once('../funciones/valida-funciones.php');
  session_start();
  if (isset($_SESSION['uidusuarios'])) {
	  $unombre = $_SESSION['unombre'];
	  $ucuenta = $_SESSION['ucuenta'];
	  $uid = $_SESSION['uidusuarios'];
	  $uinicio = $_SESSION['uinicio'];
	  $uusuario = $_SESSION['uusuario'];
  }
  else {
	  header("Location: form-error-2.php");
	  exit;
  }
$error = ' ';
if(isset($_POST['buscar_graduando']))
{    
     if(trim($_POST['cedula'])=='')
    {
        $error="Debe introducir una cÈdula";
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
		    $ced = $_POST['cedula'];
            $link = mysql_connect("localhost",NAME_USER,PASS_USER);
	        $db_selected = mysql_select_db(BASE_DE_DATOS,$link);
            //$conexion=conectar($host_carnet,$usuario_carnet,$clave_carnet,$database_carnet);             
			$sql="select * from detalle_chequeo_etyb where cedula=$ced";
			 
			$result=ejecutar($sql, $link);           
            $nro_filas = mysql_num_rows($result);            		
               if ($nro_filas>=1)
               {
                  $aux=mysql_fetch_array($result);
                  $_SESSION['cedula']=$aux['cedula'];      
                  $_SESSION['nombre_completo']=$aux['nombre_completo'];
                  $_SESSION['facultad']=$aux['facultad']; 
                  $_SESSION['titulo_obtenido']=$aux['titulo_obtenido']; 
				  $_SESSION['nro_graduacion']=$aux['nro_graduacion']; 
				  $_SESSION['fecha_acto_grado']=$aux['fecha_acto_grado'];
				  $_SESSION['ind_combo_academico']=$aux['ind_combo_academico'];
				  $_SESSION['fecha_entrega_combo']=$aux['fecha_entrega_combo'];
				  $_SESSION['resp_entrega_combo']=$aux['resp_entrega_combo'];
				  $_SESSION['observacion_combo']=$aux['observacion_combo'];
                  $_SESSION['ind_solvencia']=$aux['ind_solvencia'];
                  $_SESSION['observacion']=$aux['observacion'];
				  $_SESSION['valor_multa']=$aux['valor_multa'];	
				  $_SESSION['resp_devolucion_combo']=$aux['resp_devolucion_combo'];	
				  $_SESSION['fecha_devolucion_combo']=$aux['fecha_devolucion_combo'];				 			  
                 header('Location: form-buscar-graduando-chequeo1.php');
                 exit;                   
               }
               else
                {
                      
				    header('Location: form-buscar-graduando-chequeo.php?mensaje=3');
                    exit; 
                }                          
         }     
	}
}	
  if(isset($_GET['mensaje']))
{
    switch($_GET['mensaje'])
    {
        case 1:
            $error="Proceso de DevoluciÛn --> Granduando Actualizado Exitosamente!";
            break;
        case 2:
            $error="No se ha realiza ning˙n cambio el graduando consultado";
            break;
		case 3:
			$error="Error. Esta cÈdula no se encuentra registrada"; 
			break; 
	    case 4:
		    $error="Proceso de Entrega   --> Granduando Actualizado Exitosamente!"; 
			break;
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/Cuerpo-1.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=latin1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>.: Intranet - Direcci&oacute;n General de Asuntos Estudiatiles - Universidad de Carabobo :.</title>
<!-- InstanceEndEditable -->
<link href="../css/hoja_de_estilos.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="../digaes.ico" />
<script type="text/javascript">
var txt=".: Intranet - Direcci√≥n General de Asuntos Estudiatiles - Universidad de Carabobo :.   ";
var refresco=null;
function titulo() {	document.title=txt;	txt=txt.substring(1,txt.length)+txt.charAt(0); 	refresco=setTimeout("titulo()",500);}
titulo();
</script>
<script type="text/javascript"> 
    $(document).ready(function(){ 
        $(document).pngFix(); 
    }); 
</script>
<style type="text/css">
body {
	background-image: url(../imagenes/digae_azul_transparente.png);
	background-repeat: repeat;
}
</style>
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
</head>

<body>
<div align="center" style="margin: 5px 5px 5px 5px">
<table width="80%" border="0" cellspacing="0" cellpadding="0" class="tabla_body">
  <tr>
  <td height="40" align="center" valign="middle"><!-- InstanceBeginEditable name="EditRegion1" -->
  <form name="buscar_graduando" id="buscar_graduando" method="post" action="form-buscar-graduando-chequeo.php" >
  <table width="90%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="30">&nbsp;</td>
  </tr>
  <tr>
    <td height="40" align="center" class="gradiente_gris1"><span class="texto_decorado_blanco_amarillo">Buscar Graduando </span></td>
  </tr>
  <tr>
    <td height="30" align="center"><table width="42%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td height="70"><div align="left" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">
        <div align="right">Cedula:</div>
      </div></td>
      <td width="55%" height="70" align="left" ><input  name="cedula" type="text" size="14" maxlength="8" value="<?php if(isset($_POST['cedula'])){ echo $_POST['cedula'];} ?>"/></td>
    </tr>
    <tr>
      <td height="33" colspan="2"><div align="center"><?php echo"<div align=\"center\">&nbsp;&nbsp;<input type=\"submit\" name=\"buscar_graduando\" value=\"Buscar\" class=\"boton1\" /></div>";?></div></td>
    </tr>
    <tr>
      <td height="33" colspan="2"><div align="center"><?php echo $error; ?></div></td>
    </tr>    
  <tr> <td  width="45%" height="12" align="center">&nbsp;</td>  
  </tr> 
  </table>  </td>
  </tr>
  <script type="text/javascript">
	 document.buscar_graduando.cedula.focus();
  </script> 
  <tr>
    <td height="30" style="-webkit-border-radius: 10px 10px 10px 10px; border-radius: 10px 10px 10px 10px; background: #5b99df; background: -moz-linear-gradient(left,  #5b99df 0%, #a6def0 34%, #70b0e8 69%, #b1d5f1 100%); background: -webkit-gradient(linear, left top, right top, color-stop(0%,#5b99df), color-stop(34%,#a6def0), color-stop(69%,#70b0e8), color-stop(100%,#b1d5f1)); background: -webkit-linear-gradient(left,  #5b99df 0%,#a6def0 34%,#70b0e8 69%,#b1d5f1 100%); background: -o-linear-gradient(left,  #5b99df 0%,#a6def0 34%,#70b0e8 69%,#b1d5f1 100%); background: -ms-linear-gradient(left,  #5b99df 0%,#a6def0 34%,#70b0e8 69%,#b1d5f1 100%); background: linear-gradient(to right,  #5b99df 0%,#a6def0 34%,#70b0e8 69%,#b1d5f1 100%); filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#5b99df', endColorstr='#b1d5f1',GradientType=1 );"></td>
  </tr>    
  </table>
  </form>
  
  <form id="regresar" name="regresar" method="post" action="form-mostrar-tareas-2.php">
  <table width="200" border="0">
  <tr>
    <td height="50" align="center" valign="bottom"><input name="btnRegresar" type="submit" class="glow2" title="Pulse aquÌ para Regresar al Men˙ Principal..." value="<-- Regresar Men˙ Principal" /> </td>
  </tr>
</table>

  </form>
  <!-- InstanceEndEditable --></td>
  </tr>
</table>
</div>
</body>
<!-- InstanceEnd --></html>