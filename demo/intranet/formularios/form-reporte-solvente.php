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
  
 $error = '';
 
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
var txt=".: Intranet - Dirección General de Asuntos Estudiatiles - Universidad de Carabobo :.   ";
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
<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
</head>

<body>
<div align="center" style="margin: 5px 5px 5px 5px">
<table width="80%" border="0" cellspacing="0" cellpadding="0" class="tabla_body">
  <tr>
  <td height="40" align="center" valign="middle"><!-- InstanceBeginEditable name="EditRegion1" -->
  <form action="reporte-apoyo-log1.php" method="post" enctype="multipart/form-data" name="form_reporte" id="form_reporte">
  <table width="90%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="30">&nbsp;</td>
  </tr>
  <tr>
    <td height="40" class="gradiente_gris1"><span class="texto_decorado_blanco_amarillo">Reporte de Solvencia </span></td>
  </tr>
  <tr>
    <td height="30" align="center"><table width="65%" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
      <tr>
        <td height="37" colspan="2"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">
          <div align="center">Emite Reporte de los Graduandos (Solventes o No Solventes)</div>
        </div></td>
        </tr>
      <tr>
        <td width="41%" height="19" bordercolor="#F0F0F0" class="DetalleCeroCero">
          
            <div align="center" class="DetalleCeroDos"><strong>Solvente </strong>:</div></td>
        <td width="59%" height="19" bordercolor="#F0F0F0" class="DetalleCeroCero"><label>
           <select name="sol" size="1">
             <option value="S" <?php if (isset($_SESSION['seleccion']) == 'S') echo 'selected';?>>Si</option>
			 <option value="N" <?php if (isset($_SESSION['seleccion']) == 'N') echo 'selected';?>>No</option>
            </select>
        </label></td>
        </tr>       
    </table></td>
  </tr>
    <td height="50" align="center" valign="bottom"><input name="btnGconH" type="submit" class="glow2" title="Pulse aqu� para Imprimir el Reporte..." value="Imprimir" /> </td>      
  </tr>
  <tr>
    <td height="30" style="-webkit-border-radius: 10px 10px 10px 10px; border-radius: 10px 10px 10px 10px; background: #5b99df; background: -moz-linear-gradient(left,  #5b99df 0%, #a6def0 34%, #70b0e8 69%, #b1d5f1 100%); background: -webkit-gradient(linear, left top, right top, color-stop(0%,#5b99df), color-stop(34%,#a6def0), color-stop(69%,#70b0e8), color-stop(100%,#b1d5f1)); background: -webkit-linear-gradient(left,  #5b99df 0%,#a6def0 34%,#70b0e8 69%,#b1d5f1 100%); background: -o-linear-gradient(left,  #5b99df 0%,#a6def0 34%,#70b0e8 69%,#b1d5f1 100%); background: -ms-linear-gradient(left,  #5b99df 0%,#a6def0 34%,#70b0e8 69%,#b1d5f1 100%); background: linear-gradient(to right,  #5b99df 0%,#a6def0 34%,#70b0e8 69%,#b1d5f1 100%); filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#5b99df', endColorstr='#b1d5f1',GradientType=1 );"></td>
  </tr> 
  </table>
  </form>  
  <form action="form-mostrar-tareas-2.php" method="post" name="regresar">
      <table width="200" border="0">
  <tr>
    <td height="50" align="center" valign="bottom"><input name="btnRegresar" type="submit" class="glow2" title="Pulse aqu� para Regresar al Men� Principal..." value="<-- Regresar Men� Principal" /> </td>
  </tr>
      </table>
  </form>
  <!-- InstanceEndEditable --></td>
  </tr>
</table>
</div>
</body>
<!-- InstanceEnd --></html>