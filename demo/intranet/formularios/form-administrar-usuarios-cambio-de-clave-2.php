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
  <form name="FrmCambDeClav" method="post" action="form-administrar-usuarios-cambio-de-clave-acciona-2.php" >
  <table width="90%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="30">&nbsp;</td>
  </tr>
  <tr>
    <td height="40" class="gradiente_gris1"><span class="texto_decorado_blanco_amarillo">Cambio de Clave</span></td>
  </tr>
  <tr>
    <td height="30" align="center"><table width="90%" border="0" cellspacing="0" cellpadding="0">
    <tr>
    <td width="40%" height="70"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Nueva Contrase&ntilde;a</div></td>
    <td width="60%" height="70"><input type="password" name="txt1Pass" value="" size="20" maxlength="20" class="cuadro_textbox_5" title="Indique la Nueva Contrase&ntilde;a..."  /></td>
    </tr>
    <tr>
    <td height="70"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Repita la Contrase&ntilde;a para confirmarla</div></td>
    <td height="70"><input type="password" name="txt2Pass" value="" size="20" maxlength="20" class="cuadro_textbox_5" title="Indique NUEVAMENTE la Nueva Contrase&ntilde;a PARA CONFIRMARLA..."  /></td>
    </tr>
    </table></td>
  </tr>
  <tr>
    <td height="30" style="-webkit-border-radius: 10px 10px 10px 10px; border-radius: 10px 10px 10px 10px; background: #5b99df; background: -moz-linear-gradient(left,  #5b99df 0%, #a6def0 34%, #70b0e8 69%, #b1d5f1 100%); background: -webkit-gradient(linear, left top, right top, color-stop(0%,#5b99df), color-stop(34%,#a6def0), color-stop(69%,#70b0e8), color-stop(100%,#b1d5f1)); background: -webkit-linear-gradient(left,  #5b99df 0%,#a6def0 34%,#70b0e8 69%,#b1d5f1 100%); background: -o-linear-gradient(left,  #5b99df 0%,#a6def0 34%,#70b0e8 69%,#b1d5f1 100%); background: -ms-linear-gradient(left,  #5b99df 0%,#a6def0 34%,#70b0e8 69%,#b1d5f1 100%); background: linear-gradient(to right,  #5b99df 0%,#a6def0 34%,#70b0e8 69%,#b1d5f1 100%); filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#5b99df', endColorstr='#b1d5f1',GradientType=1 );"><table border="0" cellspacing="0" cellpadding="0">
    <tr>
    <td height="67" colspan="2"><div style="margin: 3px 10px 3px 10px; font-weight: normal; text-align: justify; background-color: rgba(255, 255, 255, 0); color: #FBFF87; font-family: Verdana, Geneva, sans-serif; font-size: 16px; line-height: 25px; text-shadow: 5px 5px 5px #ABAB00; -webkit-border-radius: 10px 10px 20px 20px; border-radius: 10px 10px 20px 20px;">Recuerde que la Contrase&ntilde;a es cifrada y enviada a la Base de Datos, por tanto, s&oacute;lo usted sabr&aacute; de ella.</div></td>
    </tr>
    <tr>
    <td height="86" colspan="2"><div style="margin: 3px 10px 3px 10px; font-weight: normal; text-align: justify; background-color: rgba(255, 255, 255, 0); color: #FBFF87; font-family: Verdana, Geneva, sans-serif; font-size: 16px; line-height: 25px; text-shadow: 5px 5px 5px #ABAB00; -webkit-border-radius: 10px 10px 20px 20px; border-radius: 10px 10px 20px 20px;">Puede usar una combinaci&oacute;n de letras may&uacute;sculas y min&uacute;sculas &quot;a..z&quot;|&quot;A..Z&quot;, n&uacute;meros &quot;0..9&quot; y caracteres especiales como asterisco &quot;*&quot;, corchetes &quot;[]&quot;, llaves &quot;{}&quot;, parentesis &quot;()&quot;, gui&oacute;n &quot;-&quot;, piso &quot;_&quot;, punto &quot;.&quot; y el numeral &quot;#&quot;.</div></td>
    </tr>
    <tr>
    <td width="369" height="30"><div style="margin: 3px 10px 3px 10px; font-weight: normal; text-align: justify; background-color: rgba(255, 255, 255, 0); color: #FBFF87; font-family: Verdana, Geneva, sans-serif; font-size: 16px; line-height: 25px; text-shadow: 5px 5px 5px #ABAB00; -webkit-border-radius: 10px 10px 20px 20px; border-radius: 10px 10px 20px 20px;">No puede usar los siguientes caracteres:</div></td>
    <td width="505" height="30"><div style="margin: 3px 10px 3px 10px; font-weight: normal; text-align: justify; background-color: rgba(255, 255, 255, 0); color: #FBFF87; font-family: Verdana, Geneva, sans-serif; font-size: 16px; line-height: 25px; text-shadow: 5px 5px 5px #ABAB00; -webkit-border-radius: 10px 10px 20px 20px; border-radius: 10px 10px 20px 20px;">+ / \ @ : ; , | &euro; &quot; ' &iquest; ? &iexcl; ! = &amp; % $ &ordm; &ordf; &ccedil; &Ccedil; &aacute; &auml; &agrave; &acirc; &Aacute; &Auml; &Agrave; &Acirc; &eacute; &euml; &egrave; &ecirc; &Eacute; &Euml; &Egrave; &Ecirc; &iacute; &iuml; &igrave; &icirc; &Iacute; &Iuml; &Igrave; &Icirc; &oacute; &ouml; &ograve; &ocirc; &Oacute; &Ouml; &Ograve; &Ocirc; &uacute; &uuml; &ugrave; &ucirc; &Uacute; &Uuml; U &Ucirc; &lt; &gt;</div></td>
    </tr>
    </table></td>
  </tr>
  <tr>
    <td height="20"><?php
	echo '<input type="hidden" name="txtIDU" value="'.$uid.'" />';
	echo '<input type="hidden" name="txtUSER" value="'.$uusuario.'" />';
	?></td>
  </tr>
  <tr>
    <td height="30" align="center"><input name="btnRegreso" type="submit" class="glow2" title="Pulse aqu&iacute; para regresar a la pantalla anterior.." value="Regresar" />&nbsp;<input name="btnCambiaPass" type="submit" class="glow2" title="Pulse aqu&iacute; para procesasr el cambio de la contrase&ntilde;a.." value="Cambiar" /></td>
  </tr>
  <tr>
    <td height="20"><input type="hidden" name="txtIDU" value="" />&nbsp;</td>
  </tr>
</table>
  </form>
  <!-- InstanceEndEditable --></td>
  </tr>
</table>
</div>
</body>
<!-- InstanceEnd --></html>