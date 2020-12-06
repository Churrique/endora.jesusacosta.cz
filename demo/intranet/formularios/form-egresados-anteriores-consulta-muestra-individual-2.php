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
  <?php
  require_once('../funciones/valida-funciones_ant_egresados.php');

  $recor = ConEspDeEgrAnt($_GET['ID']);
  if (is_string($recor) ) {
	  echo $recor;
  }
  ?>
  <form name="FrmMuestraIndi" method="post" action="form-egresados-anteriores-consulta-2.php">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="26%" height="15">&nbsp;</td>
        <td width="48%" height="15">&nbsp;</td>
        <td width="7%" height="15">&nbsp;</td>
        <td width="9%" height="15">&nbsp;</td>
        <td width="10%" height="15">&nbsp;</td>
      </tr>
      <tr>
        <td height="30" colspan="5" class="gradiente_gris2"><span class="texto_decorado_blanco_amarillo">Consulta Individual de Egresados Anteriores (del SiDICEs)</span></td>
        </tr>
      <tr>
        <td width="26%" height="15">&nbsp;</td>
        <td width="48%" height="15">&nbsp;</td>
        <td width="7%" height="15">&nbsp;</td>
        <td width="9%" height="15">&nbsp;</td>
        <td width="10%" height="15">&nbsp;</td>
      </tr>
      <tr>
        <td height="50"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">C&eacute;dula</div></td>
        <td height="50">
        <?php
        echo '<input name="txtCI" type="text" value="'.$recor['cedula'].'" class="cuadro_textbox_5" title="Indique la C&eacute;dula...!" size="8" maxlength="8" />';
		?>
        </td>
        <td height="50">&nbsp;</td>
        <td height="50">&nbsp;</td>
        <td height="50">&nbsp;</td>
      </tr>
      <tr>
        <td height="50"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Nombre(s)</div></td>
        <td height="50">
        <?php
        echo '<input name="txtNombre" type="text" value="'.$recor['nombres'].'" class="cuadro_textbox_5" title="Indique el Nombre...!" size="50" maxlength="100" />';
		?>
        </td>
        <td height="50">&nbsp;</td>
        <td height="50">&nbsp;</td>
        <td height="50">&nbsp;</td>
      </tr>
      <tr>
        <td height="50"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Apellido(s)</div></td>
        <td height="50">
        <?php
        echo '<input name="txtApellido" type="text" value="'.$recor['apellidos'].'" class="cuadro_textbox_5" title="Indique el Apellido...!" size="50" maxlength="100" />';
		?>
        </td>
        <td height="50">&nbsp;</td>
        <td height="50">&nbsp;</td>
        <td height="50">&nbsp;</td>
      </tr>
      <tr>
        <td height="50"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Sexo</div></td>
        <td height="50">
        <?php
        echo '<input name="txtSexo" type="text" value="'.$recor['sexo'].'" class="cuadro_textbox_5" title="Indique el Sexo...!" size="1" maxlength="1" />';
		?>
        </td>
        <td height="50">&nbsp;</td>
        <td height="50">&nbsp;</td>
        <td height="50">&nbsp;</td>
      </tr>
      <tr>
        <td height="50"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Fecha de Nacimiento</div></td>
        <td height="50">
        <?php
        echo '<input name="txtFechNac" type="text" value="'.$recor['fecha_nacimiento'].'" class="cuadro_textbox_5" title="Indique la Fecha de Nacimiento...!" size="10" maxlength="10" />';
		?>
        </td>
        <td height="50">&nbsp;</td>
        <td height="50">&nbsp;</td>
        <td height="50">&nbsp;</td>
      </tr>
      <tr>
        <td height="50"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Estado Civil</div></td>
        <td height="50">
        <?php
        echo '<input name="txtEdoCivil" type="text" value="'.$recor['estado_civil'].'" class="cuadro_textbox_5" title="Indique el Estado Civil...!" size="1" maxlength="1" />';
		?>
        </td>
        <td height="50">&nbsp;</td>
        <td height="50">&nbsp;</td>
        <td height="50">&nbsp;</td>
      </tr>
      <tr>
        <td height="50"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">T&iacute;tulo</div></td>
        <td height="50">
        <?php
        echo '<input name="txtFacultad" type="text" value="'.$recor['titulo'].'" class="cuadro_textbox_5" title="Indique el T&iacute;tulo...!" size="50" maxlength="100" />';
		?>
        </td>
        <td height="50">&nbsp;</td>
        <td height="50">&nbsp;</td>
        <td height="50">&nbsp;</td>
      </tr>
      <tr>
        <td height="50"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Tipo de Acto</div></td>
        <td height="50">
        <?php
        echo '<input name="txtEscuela" type="text" value="'.$recor['tipo_de_acto'].'" class="cuadro_textbox_5" title="Indique el Tipo de Acto...!" size="50" maxlength="100" />';
		?>
        </td>
        <td height="50">&nbsp;</td>
        <td height="50">&nbsp;</td>
        <td height="50">&nbsp;</td>
      </tr>
      <tr>
        <td height="50"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Fecha de Grado</div></td>
        <td height="50">
          <?php
        echo '<input name="txtFechIns" type="text" value="'.$recor['fecha_grado'].'" class="cuadro_textbox_5" title="Indique la Fecha de Grado...!" size="10" maxlength="10" />';
		?>
          </td>
        <td height="50">&nbsp;</td>
        <td height="50">&nbsp;</td>
        <td height="50">&nbsp;</td>
      </tr>
      <tr>
        <td height="127"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Otros Valores</div></td>
        <td height="127">
          <?php
        echo '<textarea name="txtOValores" class="cuadro_textbox_5" rows="3" cols="60">'.$recor['valores_de_otras_columnas'].'</textarea>';
		?>
          </td>
        <td height="127">&nbsp;</td>
        <td height="127">&nbsp;</td>
        <td height="127">&nbsp;</td>
      </tr>
      <tr>
        <td height="127"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Observaci&oacute;n(es)</div></td>
        <td height="127">
        <?php
        echo '<textarea name="txtObs" class="cuadro_textbox_5" rows="3" cols="60">'.$recor['observacion'].'</textarea>';
		?>
        </td>
        <td height="127">&nbsp;</td>
        <td height="127">&nbsp;</td>
        <td height="127">&nbsp;</td>
      </tr>
      <tr>
        <td height="60">&nbsp;</td>
        <td height="60" align="center" valign="middle"><input name="btnRegresar" type="submit" class="glow2" title="Pulse aqu&iacute; para regresar a la pantalla anterior...!" value="Regresar" /></td>
        <td height="60">&nbsp;</td>
        <td height="60">&nbsp;</td>
        <td height="60">&nbsp;</td>
      </tr>
      <tr>
        <td height="20">&nbsp;</td>
        <td height="20">&nbsp;</td>
        <td height="20">&nbsp;</td>
        <td height="20">&nbsp;</td>
        <td height="20">&nbsp;</td>
      </tr>
    </table>
    </form>
  <!-- InstanceEndEditable --></td>
  </tr>
</table>
</div>
</body>
<!-- InstanceEnd --></html>