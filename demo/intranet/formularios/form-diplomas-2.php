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
var txt=".: Intranet - Direcci�n General de Asuntos Estudiatiles - Universidad de Carabobo :.   ";
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
  <form name="FrmDiploma2" method="post" >
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="30">&nbsp;</td>
      </tr>
      <tr>
        <td align="center" valign="middle"><table width="98%" border="0" cellspacing="0" cellpadding="0">
        <tr>
        <td align="center" valign="middle" bgcolor="#F3F7F8"><img src="../imagenes/fuentes/diploma-argorgot.fw.png" width="403" height="146" alt="diploma" /></td>
        </tr>
        </table></td>
      </tr>
      <tr>
        <td height="30" align="center"><table width="80%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td height="50"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 7px; line-height: 20px;">Tipo de Diploma ?</div></td>
            <td height="50"><select name="lstTDiploma" class="cuadro_textbox_5B" >
            <option value="A">Alejo Zuloaga</option>
            <option value="G">Graduado con Honores</option>
            </select></td>
            <td rowspan="2" class="texto_decorado_azul3">Necesario para cualquiera de los casos</td>
          </tr>
          <tr>
            <td height="50"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 7px; line-height: 20px;">Nombre ?</div></td>
            <td height="50"><input name="txtNom" type="text" class="cuadro_textbox_5" title="Indique el Nombre..." size="58" maxlength="30"  /></td>
            </tr>
          <tr>
            <td width="25%" height="50"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 7px; line-height: 20px;">C&eacute;dula ?</div></td>
            <td width="54%" height="50"><input name="txtCI" type="text" class="cuadro_textbox_5" title="Indique la C&eacute;dula de Identidad..." size="10" maxlength="8"  /></td>
            <td width="21%" height="50" class="texto_decorado_azul3">Esto aplica si es Graduado con Honores</td>
          </tr>
          <tr>
            <td height="50"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 7px; line-height: 20px;">T&iacute;tulo/Carera ?</div></td>
            <td height="50"><input name="txtTit" type="text" class="cuadro_textbox_5" title="Indique el T&iacute;tulo obtenido..." size="58" maxlength="50"  /></td>
            <td height="50" class="texto_decorado_azul3">Esto aplica si es Graduado con Honores</td>
          </tr>
          <tr>
            <td height="50"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 7px; line-height: 20px;">En que Orden ?</div></td>
            <td height="50"><select name="lstOrdenAZ" class="cuadro_textbox_5B" >
            <option value="U">�nico</option>
            <option value="1">Primero</option>
            <option value="2">Segundo</option>
            <option value="3">Tercero</option>
            </select></td>
            <td height="50" class="texto_decorado_azul3">Esto aplica si es Alejo Zuloaga</td>
          </tr>
          <tr>
            <td height="50"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 7px; line-height: 20px;">N&deg; de Folio ?</div></td>
            <td height="50"><input name="txtFolio" type="text" class="cuadro_textbox_5" title="Indique el N&uacute;mero de Folio..." size="10" maxlength="10"  /></td>
            <td height="50" class="texto_decorado_azul3">Esto aplica si es Graduado con Honores</td>
          </tr>
          <tr>
            <td height="50"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 7px; line-height: 20px;">A&ntilde;os de Federaci&oacute;n ?</div></td>
            <td height="50"><input name="txtAFed" type="text" class="cuadro_textbox_5" title="Indique el A&ntilde;o de Federaci&oacute;n..." size="6" maxlength="3"  /></td>
            <td height="50" class="texto_decorado_azul3">Esto aplica si es Alejo Zuloaga</td>
          </tr>
          <tr>
            <td height="50"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 7px; line-height: 20px;">A&ntilde;os de Independencia ?</div></td>
            <td height="50"><input name="txtAInd" type="text" class="cuadro_textbox_5" title="Indique el A&ntilde;o de Independencia..." size="6" maxlength="3"  /></td>
            <td height="50" class="texto_decorado_azul3">Esto aplica si es Alejo Zuloaga</td>
          </tr>
          <!--<tr>
            <td height="50">&nbsp;</td>
            <td height="50">&nbsp;</td>
            <td height="50">&nbsp;</td>
          </tr>-->
          <tr>
            <td height="50" colspan="3" align="center" valign="middle"><input name="btnImprimir" type="submit" class="glow2" title="Pulse aqu� para Imprimir el Diploma..." value="Imprimir" /></td>
            </tr>
        </table></td>
      </tr>
      <tr>
        <td height="30">&nbsp;</td>
      </tr>
    </table>
  </form>
  <!-- InstanceEndEditable --></td>
  </tr>
</table>
</div>
</body>
<!-- InstanceEnd --></html>