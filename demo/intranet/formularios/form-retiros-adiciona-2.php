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
    require_once('../funciones/valida-funciones_a_retirados.php');
    ?>
      <form name="FrmRetAdi" method="post" action="form-retiros-adiciona-acciona-2.php" >
	  <table width="100%" border="0" cellspacing="0" cellpadding="0" summary="Consignaci&oacute;n de Retiros en la Universidad de Carabobo">
	    <tr>
	      <td height="10">&nbsp;</td>
	      <td height="10">&nbsp;</td>
	      <td height="10">&nbsp;</td>
	      </tr>
	    <tr>
	      <td height="40" colspan="3" class="gradiente_gris1"><span class="texto_decorado_blanco_amarillo">Retiros</span></td>
	      </tr>
	    <tr>
	      <td width="23%" height="40"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">C&eacute;dula</div></td>
	      <td width="48%" height="40" align="left" valign="middle" class="texto_decorado_azul5">
		  <?php
			if ( isset($_GET['CED']) ) echo $_GET['CED'];
			if ( isset($_POST['txtCed']) ) echo $_POST['txtCed'];
		  ?>
          </td>
	      <td width="29%" height="40">
		  <?php
		  if ( isset($_GET['CED']) ) echo '<input type="hidden" name="txtCedDIde" value="'.$_GET['CED'].'"  />';
		  if ( isset($_POST['txtCed']) ) echo '<input type="hidden" name="txtCedDIde" value="'.$_POST['txtCed'].'"  />';
		  ?>
          </td>
	      </tr>
	    <tr>
	      <td height="40"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Nombre, Apellido</div></td>
	      <td height="40" align="left" valign="middle" class="texto_decorado_azul5">
		  <?php
			if ( isset($_GET['CED']) ) $fAlumnos=BEA($_GET['CED']);
			if ( isset($_POST['txtCed']) ) $fAlumnos=BEA($_POST['txtCed']);
			if ( is_bool($fAlumnos) ) echo 'Esta C&eacute;dula de Identidad NO SE ENCUENTRA...!';
			else {
				if ( isset($_GET['CED']) ) $fDatosPer = BusEnDP($_GET['CED']);
				if ( isset($_POST['txtCed']) ) $fDatosPer = BusEnDP($_POST['txtCed']);
				echo $fDatosPer['primer_nombre'].', '.$fDatosPer['primer_apellido'];
				//echo '<input type="hidden" name="txtActivo" value="'.$fAlumnos['a_estatus_activo'].'"  />';
				//echo '<input type="hidden" name="txtPasivo" value="'.$fAlumnos['a_estatus_pasivo'].'"  />';
			}
		  ?>
          </td>
	      <td height="40">&nbsp;</td>
	      </tr>
          <tr>
          <td height="40" colspan="3"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
          <td width="12%" height="40"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Correo</div></td>
          <td width="25%" height="40" align="left" valign="middle">
		  <?php
			if ( isset($_GET['CED']) ) echo armselEmail($_GET['CED']);
			if ( isset($_POST['txtCed']) ) echo armselEmail($_POST['txtCed']);
		  ?>
          </td>
          <td width="11%" height="40"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Tel&eacute;fono</div></td>
          <td width="52%" height="40" align="left" valign="middle">
		  <?php
			if ( isset($_GET['CED']) ) echo armselTefl($_GET['CED']);
			if ( isset($_POST['txtCed']) ) echo armselTefl($_POST['txtCed']);
		  ?>
          </td>
          </tr>
          </table></td>
          </tr>
	    <tr>
	      <td height="20" colspan="3" align="right">&nbsp;</td>
	      </tr>
	    <tr>
	      <td height="40" colspan="3" class="gradiente_gris1"><span class="texto_decorado_blanco_amarillo">Retiros Previos</span></td>
	      </tr>
	    <tr>
	      <td height="40" colspan="3" align="center" valign="middle"><div style="margin: 10px 5px 15px 5px;">
		  <?php
			if ( isset($_GET['CED']) ) echo GdARet($_GET['CED'],'AV2');
			if ( isset($_POST['txtCed']) ) echo GdARet($_POST['txtCed'],'AV2');
		  ?>
          </div></td>
	      </tr>
	    <tr>
	      <td height="40" colspan="3" class="gradiente_gris1"><span class="texto_decorado_blanco_amarillo">Documentos a Procesar e Informaci&oacute;n para Completar Otro Retiro</span></td>
	      </tr>
	    <tr>
	      <td height="40"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Escuela en la que se retira</div></td>
	      <td height="40" align="left"><?php echo armselV2Escue($fAlumnos['a_escuela']); ?></td>
	      <td height="40"><div class="txt_pie" style="margin-left: 11px; margin-right: 9px; line-height: 17px; text-align:center;">Seg&uacute;n el maestro de &quot;Alumnos&quot; esta es la escuela que registra...!</div></td>
	      </tr>
	    <tr>
	      <td height="40"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Menci&oacute;n (si aplica)</div></td>
	      <td height="40" align="left" valign="middle"><?php
		  echo armselCdMenc();
		  //echo armselV2Menc($fAlumnos['a_escuela'],$fAlumnos['a_mencion']);
		  ?></td>
	      <td height="40"><div class="txt_pie" style="margin-left: 11px; margin-right: 9px; line-height: 17px; text-align:center;">Indique la &quot;Menci&oacute;n&quot;... si aplica, caso contrario &oacute;bviela...!</div></td>
	      </tr>
	    <tr>
	      <td height="40"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Documentos que retira</div></td>
	      <td height="40" colspan="2"><div style="margin: 10px 5px 0px 5px;"><?php echo DTparaD(); ?></div></td>
	      </tr>
	    <tr>
	      <td height="40"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Modalidad de Ingreso</div></td>
	      <td height="40" align="left"><?php echo armselV2ModdIngr($fAlumnos['a_modalidad_ingreso']); ?></td>
	      <td height="40"><div class="txt_pie" style="margin-left: 11px; margin-right: 9px; line-height: 17px; text-align:center;">Tiene informaci&oacute;n de la Modalidad de Ingreso?, de ser as&iacute; por favor ind&iacute;quela</div></td>
	      </tr>
	    <tr>
	      <td height="40"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Activo</div></td>
	      <td height="40" align="left"><?php echo armselV2Activ($fAlumnos['a_estatus_activo']); ?></td>
	      <td height="40"><div class="txt_pie" style="margin-left: 11px; margin-right: 9px; line-height: 17px; text-align:center;">En que condici&oacute;n de Activo se encontraba el alumno?</div></td>
	      </tr>
	    <tr>
	      <td height="40"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Per&iacute;odo Lectivo</div></td>
	      <td height="40" align="left"><?php echo '<input type="text" name="txtPerLec" value="'.$fAlumnos['a_periodo'].'" class="cuadro_textbox_5" size="8" maxlength="7" title="Indique el &uacute;ltimo per&iacute;odo lectivo que curso (si aplica)..." />'; ?></td>
	      <td height="40"><div class="txt_pie" style="margin-left: 11px; margin-right: 9px; line-height: 17px; text-align:center;">Estaba cursando estudios?, de ser as&iacute; por favor indique el &uacute;ltimo per&iacute;odo lectivo</div></td>
	      </tr>
	    <tr>
	      <td height="40"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Pasivo</div></td>
	      <td height="40" align="left"><?php echo armselV2Pasiv($fAlumnos['a_estatus_pasivo']); ?></td>
	      <td height="40"><div class="txt_pie" style="margin-left: 11px; margin-right: 9px; line-height: 17px; text-align:center;">Se trata de un &quot;Retirado&quot;<br />&oacute; &quot;Retiro Interno&quot;?</div></td>
	      </tr>
	    <tr>
	      <td height="50"><div align="right" class="texto_decorado_agua_marina" style="margin: 0px 9px 10px 0px; line-height: 20px;">Fecha</div></td>
	      <td height="50" align="left"><?php echo '<input type="text" name="txtFechRet" style="margin: 0px 0px 10px 0px;" class="cuadro_textbox_5" value="'.date('d-m-Y').'" size="10" maxlength="10" title="Indique la fecha del Retiro..." />'; ?></td>
	      <td height="50">&nbsp;</td>
	      </tr>
	    <tr>
	      <td height="40"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Observaci&oacute;n (general)</div></td>
	      <td height="40" align="left"><textarea name="txtObservacion" class="cuadro_textbox_5" rows="3" cols="60"></textarea></td>
	      <td height="40">&nbsp;</td>
	      </tr>
	    <tr>
	      <td height="50">&nbsp;</td>
	      <td height="50" align="center"><input name="btnLoCancelo" type="submit" class="glow2" title="Pulse aqu&iacute; para Regresar ..." value="Regresar"  />&nbsp;&nbsp;<input name="btnV2Guarda" type="submit" class="glow2" id="btnV2Guarda" title="Pulse aqu&iacute; para Adicionar otro Retiro a este Alumno..." value="Adicionar"  /></td>
	      <td height="50" class="footer_rojo">Si desea adicionar otro Retiro o Retiro Interno, complete la informaci&oacute;n arriba y pulse guardar...</td>
	      </tr>
	    </table>
        </form>
  <!-- InstanceEndEditable --></td>
  </tr>
</table>
</div>
</body>
<!-- InstanceEnd --></html>