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
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
</head>

<body>
<div align="center" style="margin: 5px 5px 5px 5px">
<table width="80%" border="0" cellspacing="0" cellpadding="0" class="tabla_body">
  <tr>
  <td height="40" align="center" valign="middle"><!-- InstanceBeginEditable name="EditRegion1" -->
  <form name="FrmCUsuario" method="post" >
    <table width="80%" border="0" cellspacing="0" cellpadding="0">
      <!--<tr>
        <th height="40" scope="col">&nbsp;</th>
        <th height="40" scope="col">&nbsp;</th>
        <th height="40" scope="col">&nbsp;</th>
        <th height="40" scope="col">&nbsp;</th>
      </tr>-->
      <tr>
        <td width="30%" height="40">&nbsp;</td>
        <td width="1%" height="40">&nbsp;</td>
        <td width="44%" height="40">&nbsp;</td>
        <td width="25%" height="40">&nbsp;</td>
      </tr>
      <tr>
        <td height="40" align="right" class="ParaModificar">Seleccione una Base de Datos</td>
        <td height="40">&nbsp;</td>
        <td height="40">
          <select name="lstboxDB" class="Edicion_2" id="lstboxDB">
          <option value="BD1">BD 1</option>
          <option value="BD2">BD 2</option>
          <option value="BD3">BD 3</option>
          </select>
         </td>
        <td height="40" class="footer_rojo">* esto implica todas las &quot;Tablas&quot; que contenga la Base de Datos que selecciones...</td>
      </tr>
      <tr>
        <td height="40" align="right" class="ParaModificar">Nombre del Usuario</td>
        <td height="40">&nbsp;</td>
        <td height="40"><input name="txtUser" type="text" class="Edicion_2" title="Indique el nombre del usuario..." size="25" maxlength="30"  /></td>
        <td height="40" class="footer_rojo">* m&aacute;ximo 30 caracteres...</td>
      </tr>
      <tr>
        <td height="40" align="right" class="ParaModificar">Contrase&ntilde;a</td>
        <td height="40">&nbsp;</td>
        <td height="40"><input name="txt1Pass" type="password" class="Edicion_2" title="Indique la contraseña..." size="35" maxlength="14"  /></td>
        <td rowspan="2" class="footer_rojo">* m&aacute;ximo catorce (14) caracteres...</td>
      </tr>
      <tr>
        <td height="40" align="right" class="ParaModificar">Repita la Contrase&ntilde;a</td>
        <td height="40">&nbsp;</td>
        <td height="40"><input name="txt2Pass" type="password" class="Edicion_2" title="Repita la contraseña..." size="35" maxlength="14"  /></td>
        </tr>
      <tr>
        <td height="40" align="right" class="ParaModificar">Desde que host se puede conectar?</td>
        <td height="40">&nbsp;</td>
        <td height="40"><input name="txt1Host" type="text" class="Edicion_2" title="Indique el nombre del host (1) a conectar..." size="25" maxlength="30"  /></td>
        <td rowspan="2" class="footer_rojo"><p>* puede indicar dos adicionales, aparte de &quot;%&quot; y &quot;localhost&quot;...</p>
          <p>* m&aacute;ximo 30 caracteres...</p></td>
      </tr>
      <tr>
        <td height="40">&nbsp;</td>
        <td height="40">&nbsp;</td>
        <td height="40"><input name="txt2Host" type="text" class="Edicion_2" title="Indique el nombre del host (2) a conectar..." size="25" maxlength="30"  /></td>
        </tr>
      <tr>
        <td height="40" align="right" class="ParaModificar">Qu&eacute; privilegios va a conceder?</td>
        <td height="40">&nbsp;</td>
        <td height="40" class="ParaModificar"><input type="checkbox" name="chkAllPriv" id="chkAllPriv" style="margin-right: 8px;" />ALL PRIVILEGES</td>
        <td rowspan="2" class="footer_rojo"><p>* si marca &quot;ALL PRIVILEGES&quot; no es necesario indicar otro(s)...</p>
          <p>* si no marca &quot;ALL PRIVILEGES&quot; tiene c&oacute;mo m&aacute;ximo 100 caracteres</p></td>
      </tr>
      <tr>
        <td height="40">&nbsp;</td>
        <td height="40">&nbsp;</td>
        <td height="40"><input name="txtEspPriv" type="text" class="Edicion_2" title="Indique qué privilegios va a conceder?..." size="40" maxlength="100"  /></td>
        </tr>
      <tr>
        <td height="60" colspan="4" align="center" valign="middle"><input name="btnRegr" type="submit" class="glow2" style="margin-right: 15px;" title="Pulse aquí para regresar a la pantalla anterior..." value="Regresar" /><input name="btnEnv" type="submit" class="glow2" title="Pulse aquí para procesar la información..." value="Enviar" /></td>
        </tr>
      <!--<tr>
        <td height="40">&nbsp;</td>
        <td height="40">&nbsp;</td>
        <td height="40">&nbsp;</td>
        <td height="40">&nbsp;</td>
      </tr>-->
    </table>
  </form>
CREATE USER 'egresados'@'localhost' IDENTIFIED BY 'egresados';
CREATE USER 'egresados'@'%' IDENTIFIED BY 'egresados';
use digaes_egresados;
GRANT ALL PRIVILEGES ON digaes_egresados.* TO 'egresados'@'localhost' IDENTIFIED BY 'egresados' WITH GRANT OPTION;
GRANT ALL PRIVILEGES ON digaes_egresados.* TO 'egresados'@'%' IDENTIFIED BY 'egresados' WITH GRANT OPTION;
use egresados;
GRANT ALL PRIVILEGES ON egresados.* TO 'egresados'@'localhost' IDENTIFIED BY 'egresados' WITH GRANT OPTION;
GRANT ALL PRIVILEGES ON egresados.* TO 'egresados'@'%' IDENTIFIED BY 'egresados' WITH GRANT OPTION;
	<!-- InstanceEndEditable --></td>
  </tr>
</table>
</div>
</body>
<!-- InstanceEnd --></html>