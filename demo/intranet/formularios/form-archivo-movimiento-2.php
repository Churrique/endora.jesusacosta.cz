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
      <form name="InDPenR" method="post" action="form-retiros-inserta-alumno-acciona-2.php" >
	  <table width="100%" border="0" cellspacing="0" cellpadding="0">
	    <tr>
	      <td height="10">&nbsp;</td>
	      <td height="10">&nbsp;</td>
	      <td height="10">&nbsp;</td>
	      </tr>
	    <tr>
	      <td height="40" colspan="3" class="gradiente_gris1"><span class="texto_decorado_blanco_amarillo">Insertando Datos Personales del Alumno</span></td>
	      </tr>
	    <tr>
	      <td height="10" colspan="3" align="right" class="txt_pie_2">form-archivo-movimiento-2.php</td>
	      </tr>
	    <tr>
	      <td width="36%" height="40">
          <div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">
          C&eacute;dula de Identidad
          </div>
          </td>
	      <td width="32%" height="40" align="left"><?php echo '<input type="text" name="txtCI" value="'.$_GET['cedula'].'" class="cuadro_textbox_5" size="10" maxlength="8" title="Indique la Cédula de Identidad..." />'; ?></td>
	      <td width="32%" height="40" align="left" class="asteriscoR">*</td>
	      </tr>
	    <tr>
	      <td height="40"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Nacionalidad</div></td>
	      <td height="40" align="left" class="texto_decorado_am"><?php echo SacValEnu('a_datos_personales','nacionalidad','sltNac','cuadro_textbox_5B'); ?></td>
	      <td height="40" align="left"><span class="ParaIncluir_3">*</span></td>
	      </tr>
	    <tr>
	      <td height="40"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Primer Nombre</div></td>
	      <td height="40" align="left"><input type="text" name="txt1ErNom" value="" class="cuadro_textbox_5" size="35" maxlength="30" title="Indique el primer nombre..." /></td>
	      <td height="40" align="left"><span class="ParaIncluir_3">*</span></td>
	      </tr>
	    <tr>
	      <td height="40"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Segundo Nombre</div></td>
	      <td height="40" align="left"><input type="text" name="txt2DoNom" value="" class="cuadro_textbox_5" size="35" maxlength="30" title="Indique el segundo nombre..." /></td>
	      <td height="40" align="left">&nbsp;</td>
	      </tr>
	    <tr>
	      <td height="40"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Tercer Nombre</div></td>
	      <td height="40" align="left"><input type="text" name="txt3ErNom" value="" class="cuadro_textbox_5" size="35" maxlength="30" title="Indique el tercer nombre..." /></td>
	      <td height="40" align="left">&nbsp;</td>
	      </tr>
	    <tr>
	      <td height="40"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Primer Apellido</div></td>
	      <td height="40" align="left"><input type="text" name="txt1ErApe" value="" class="cuadro_textbox_5" size="35" maxlength="30" title="Indique el primer apellido..." /></td>
	      <td height="40" align="left"><span class="ParaIncluir_3">*</span></td>
	      </tr>
	    <tr>
	      <td height="40"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Segundo Apellido</div></td>
	      <td height="40" align="left"><input type="text" name="txt2DoApe" value="" class="cuadro_textbox_5" size="35" maxlength="30" title="Indique el segundo apellido..." /></td>
	      <td height="40" align="left">&nbsp;</td>
	      </tr>
	    <tr>
	      <td height="40"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Tercer Apellido</div></td>
	      <td height="40" align="left"><input type="text" name="txt3ErApe" value="" class="cuadro_textbox_5" size="35" maxlength="30" title="Indique el tercer apellido..." /></td>
	      <td height="40" align="left">&nbsp;</td>
	      </tr>
	    <tr>
	      <td height="40"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Sexo</div></td>
	      <td height="40" align="left"><?php echo SacValEnu('a_datos_personales','sexo','sltSex','cuadro_textbox_5B'); ?></td>
	      <td height="40" align="left"><span class="ParaIncluir_3">*</span></td>
	      </tr>
	    <tr>
	      <td height="40"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Fecha de Nacimiento</div></td>
	      <td height="40" align="left"><input type="text" name="txtFechNac" id="txtFechNac" value="" class="cuadro_textbox_5" size="10" maxlength="10" title="Indique la fecha de nacimiento..." /></td>
	      <td height="40"><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td><span class="ParaIncluir_3">*</span></td><td><div class="txt_pie" style="margin-left: 9px; margin-right: 9px; line-height: 17px; text-align:center">&nbsp;Ejemplo para la Fecha<br /> 
	      &quot;d&iacute;a-mes-a&ntilde;o&quot;</div></td></tr></table></td>
	      </tr>
	    <tr>
	      <td height="40"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Estado Civil</div></td>
	      <td height="40" align="left"><?php echo SacValEnu('a_datos_personales','estado_civil','sltEdoCiv','cuadro_textbox_5B'); ?></td>
	      <td height="40" align="left"><span class="ParaIncluir_3">*</span></td>
	      </tr>
	    <tr>
	      <td height="99"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Direcci&oacute;n</div></td>
	      <td height="99" align="left"><textarea name="txtDireccion" class="cuadro_textbox_5" rows="3" cols="40"></textarea></td>
	      <td height="99" align="left">&nbsp;</td>
	      </tr>
	    <tr>
	      <td height="40"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Persona de contacto para esta Direcci&oacute;n</div></td>
	      <td height="40" align="left"><input type="text" name="txtPerDir" value="" class="cuadro_textbox_5" size="35" maxlength="100" title="Indique la persona a contactar en esta direcci&oacute;n..." /></td>
	      <td height="40" align="left">&nbsp;</td>
	      </tr>
	    <tr>
	      <td height="40"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Tel&eacute;fono</div></td>
	      <td height="40" align="left"><input type="text" name="txtTelf" value="" class="cuadro_textbox_5" size="25" maxlength="19" title="Indique el tel&eacute;fono..." /></td>
	      <td height="40"><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td><span class="ParaIncluir_3">*</span></td><td><div class="txt_pie" style="margin-left: 9px; margin-right: 9px; line-height: 17px; text-align:center">Ejemplo para el Tel&eacute;fono<br />+58-241-1234567</div></td></tr></table></td>
	      </tr>
	    <tr>
	      <td height="40"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Persona de contacto para este Tel&eacute;fono</div></td>
	      <td height="40" align="left"><input type="text" name="txtPerTel" value="" class="cuadro_textbox_5" size="35" maxlength="100" title="Indique la persona a contactar en este tel&eacute;fono..." /></td>
	      <td height="40" align="left">&nbsp;</td>
	      </tr>
	    <tr>
	      <td height="40"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;"> Correo Electr&oacute;nico</div></td>
	      <td height="40" align="left"><input type="text" name="txtCorreo" value="" class="cuadro_textbox_5" size="35" maxlength="100" title="Indique el correo electr&oacute;nico..." /></td>
	      <td height="40" align="left"><span class="ParaIncluir_3">*</span></td>
	      </tr>
	    <tr>
	      <td height="40"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">N&uacute;mero de Rusnies</div></td>
	      <td height="40">&nbsp;</td>
	      <td height="40">&nbsp;</td>
	      </tr>
	    <tr>
	      <td height="40"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Fecha de Ingreso a la UC</div></td>
	      <td height="40" align="left">&nbsp;</td>
	      <td height="40"><span class="ParaIncluir_3">*</span></td>
	      </tr>
	    <tr>
	      <td height="40"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Modalidad de Ingreso</div></td>
	      <td height="40" align="left"><?php echo armselModdIngr(); ?></td>
	      <td height="40"><div class="txt_pie" style="margin-left: 11px; margin-right: 9px; line-height: 17px; text-align:center;">Tiene informaci&oacute;n de la Modalidad de Ingreso?, de ser as&iacute; por favor ind&iacute;quela</div></td>
	      </tr>
	    <tr>
	      <td height="40"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Activo</div></td>
	      <td height="40" align="left"><?php echo armselActiv(); ?></td>
	      <td height="40"><div class="txt_pie" style="margin-left: 11px; margin-right: 9px; line-height: 17px; text-align:center;">En que condici&oacute;n de Activo se encuentra o se encontraba el alumno?</div></td>
	      </tr>
	    <tr>
	      <td height="40"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Per&iacute;odo Lectivo</div></td>
	      <td height="40" align="left"><input type="text" name="txtPerLec" value="" class="cuadro_textbox_5" size="8" maxlength="7" title="Indique el &uacute;ltimo per&iacute;odo lectivo que curso (si aplica)..." /></td>
	      <td height="40"><div class="txt_pie" style="margin-left: 11px; margin-right: 9px; line-height: 17px; text-align:center;">Estaba cursando estudios?, de ser as&iacute; por favor indique el &uacute;ltimo per&iacute;odo lectivo</div></td>
	      </tr>
	    <tr>
	      <td height="40"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Fecha de &Uacute;ltima Inscripci&oacute;n</div></td>
	      <td height="40" align="left">&nbsp;</td>
	      <td height="40">&nbsp;</td>
	      </tr>
	    <tr>
	      <td height="40"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Turno</div></td>
	      <td height="40" align="left">&nbsp;</td>
	      <td height="40">&nbsp;</td>
	      </tr>
	    <tr>
	      <td height="40"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Nivel de Estudio</div></td>
	      <td height="40" align="left">&nbsp;</td>
	      <td height="40">&nbsp;</td>
	      </tr>
	    <tr>
	      <td height="40"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">R&eacute;gimen de Estudio</div></td>
	      <td height="40" align="left">&nbsp;</td>
	      <td height="40">&nbsp;</td>
	      </tr>
	    <tr>
	      <td height="40"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Pasivo</div></td>
	      <td height="40" align="left"><?php echo armselPasiv(); ?></td>
	      <td height="40"><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td><span class="ParaIncluir_3">*</span></td><td><div class="txt_pie" style="margin-left: 11px; margin-right: 9px; line-height: 17px; text-align:center;">Se trata de un &quot;Retirado&quot;<br />&oacute; &quot;Retiro Interno&quot;?</div></td></tr></table></td>
	      </tr>
	    <tr>
	      <td height="40"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Facultad <span class="txt_pie">[DE]</span></div></td>
	      <td height="40" align="left">&nbsp;</td>
	      <td height="40">&nbsp;</td>
	      </tr>
	    <tr>
	      <td height="40"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Facultad <span class="txt_pie">[PARA]</span></div></td>
	      <td height="40" align="left">&nbsp;</td>
	      <td height="40">&nbsp;</td>
	      </tr>
	    <tr>
	      <td height="40"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Escuela <span class="txt_pie">[DE]</span></div></td>
	      <td height="40" align="left">&nbsp;</td>
	      <td height="40">&nbsp;</td>
	      </tr>
	    <tr>
	      <td height="40"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Escuela <span class="txt_pie">[PARA]</span></div></td>
	      <td height="40" align="left">&nbsp;</td>
	      <td height="40">&nbsp;</td>
	      </tr>
	    <tr>
	      <td height="40"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Menci&oacute;n <span class="txt_pie">[DE]</span></div></td>
	      <td height="40" align="left">&nbsp;</td>
	      <td height="40">&nbsp;</td>
	      </tr>
	    <tr>
	      <td height="40"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Menci&oacute;n <span class="txt_pie">[PARA]</span></div></td>
	      <td height="40" align="left">&nbsp;</td>
	      <td height="40">&nbsp;</td>
	      </tr>
	    <tr>
	      <td height="40"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Escuela</div></td>
	      <td height="40" align="left"><?php echo armselEscue(); ?></td>
	      <td height="40"><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td><span class="ParaIncluir_3">*</span></td><td><div class="txt_pie" style="margin-left: 11px; margin-right: 9px; line-height: 17px; text-align:center;">Para el momento del Retiro, en que Escuela se encontraba el alumno?</div></td></tr></table></td>
	      </tr>
	    <tr>
	      <td height="40"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Menci&oacute;n (si aplica)</div></td>
	      <td height="40" align="left" valign="middle"><?php echo armselCdMenc(); ?></td>
	      <td height="40"><div class="txt_pie" style="margin-left: 11px; margin-right: 9px; line-height: 17px; text-align:center;">Indique la &quot;Menci&oacute;n&quot;... si aplica, caso contrario &oacute;bviela...!</div></td>
	      </tr>
	    <tr>
	      <td height="40"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Documentos que retira <span class="txt_pie">[si aplica]</span></div></td>
	      <td height="40" colspan="2"><div style="margin: 10px 5px 0px 5px;"><?php echo DTparaD(); ?></div></td>
	      </tr>
	    <tr>
	      <td height="40"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Observaci&oacute;n</div></td>
	      <td height="40" align="left"><textarea name="txtObservacion" class="cuadro_textbox_5" rows="3" cols="60"></textarea></td>
	      <td height="40">&nbsp;</td>
	      </tr>
	    <tr>
	      <td height="60"><div align="right" class="texto_decorado_agua_marina" style="margin: 0px 9px 10px 0px; line-height: 20px;">Fecha del Movimiento</div></td>
	      <td height="60" align="left"><?php echo '<input type="text" name="txtFechRet" style="margin: 0px 0px 10px 0px;" class="cuadro_textbox_5" value="'.date('d-m-Y').'" size="10" maxlength="10" title="Indique la fecha del Retiro, seg&uacute;n la planilla..." />'; ?></td>
	      <td height="60"><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td><span class="ParaIncluir_3">*</span></td><td><div class="txt_pie" style="margin-left: 9px; margin-right: 9px; line-height: 17px; text-align:center">&nbsp;Ejemplo para la Fecha<br /> &quot;dd-mm-aaaa&quot;<br />31-12-2015</div></td></tr></table></td>
	      </tr>
	    <tr>
	      <td height="25" align="center" valign="middle">&nbsp;</td>
	      <td height="25" colspan="2" align="left" valign="middle" class="ParaIncluir_3">
	        * <span class="ParaIncluir_3B">ESTOS CAMPOS SON OBLIGATORIOS Y NO SE PUEDEN OBVIAR</span>
	        </td>
	      </tr>
	    <tr>
	      <td height="10" align="center" valign="middle">&nbsp;</td>
	      <td height="10" align="center" valign="middle">&nbsp;</td>
	      <td height="10" align="center" valign="middle">&nbsp;</td>
	      </tr>
	    <tr>
	      <td height="40" colspan="3" align="center"><input name="bntGuardarA" type="submit" class="glow2" title="Pulse aquí cuando este listo para guardar y seguir..." value="Guardar" />&nbsp;&nbsp;&nbsp;<input name="bntCancelar" type="submit" class="glow2" title="Pulse aquí para no guardar y regresar..." value="Cancelar" /></td>
	      </tr>
	    </table>
        </form>
  <!-- InstanceEndEditable --></td>
  </tr>
</table>
</div>
</body>
<!-- InstanceEnd --></html>