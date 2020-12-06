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
  <form name="FrmEdiRetPrev" method="post" action="form-retiros-editar-documentos-que-retiro-acciona-2.php" >
	  <table width="100%" border="0" cellspacing="0" cellpadding="0" summary="Consignaci&oacute;n de Retiros en la Universidad de Carabobo">
	    <tr>
	      <td height="40">&nbsp;</td>
	      <td height="40">&nbsp;</td>
	      <td height="40">&nbsp;</td>
	      </tr>
	    <tr>
	      <td height="40" colspan="3" class="gradiente_gris1"><span class="texto_decorado_blanco_amarillo"><div style="margin-left: 10px;">Editando Documentos Retirados</div></span></td>
	      </tr>
	    <tr>
	      <td width="23%" height="40"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">C&eacute;dula</div></td>
	      <td width="48%" height="40" align="left" valign="middle" class="texto_decorado_azul5"><?php echo $_GET['ci']; ?></td>
	      <td width="29%" height="40"><?php echo '<input type="hidden" name="txtCedDIde" value="'.$_GET['ci'].'"  />'; ?></td>
	      </tr>
	    <tr>
	      <td height="40"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Nombre, Apellido</div></td>
	      <td height="40" align="left" valign="middle" class="texto_decorado_azul5"><?php
		  $fRetiros=DlosRdeR($_GET['ci'],$_GET['id']);
		  if ( is_bool($fRetiros) ) echo 'Esta C&eacute;dula de Identidad NO SE ENCUENTRA...!';
		  else {
			  $fDatosPer = BusEnDP($_GET['ci']);
			  echo $fDatosPer['primer_nombre'].', '.$fDatosPer['primer_apellido'];
			  echo '<input type="hidden" name="txtCI" value="'.$_GET['ci'].'"  />';
			  echo '<input type="hidden" name="txtID" value="'.$_GET['id'].'"  />';
			  echo '<input type="hidden" name="txtPA" value="'.$_GET['pantalla'].'"  />';
		  }
		  ?></td>
	      <td height="40">&nbsp;</td>
	      </tr>
          <tr>
          <td height="40" colspan="3"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
          <td width="12%" height="40"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Correo</div></td>
          <td width="25%" height="40" align="left" valign="middle"><?php echo armselEmail($_GET['ci']); ?></td>
          <td width="11%" height="40"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Tel&eacute;fono</div></td>
          <td width="52%" height="40" align="left" valign="middle"><?php echo armselTefl($_GET['ci']); ?></td>
          </tr>
          </table></td>
          </tr>
	    <tr>
	      <td height="20" colspan="3">&nbsp;</td>
	      </tr>
	    <tr>
	      <td height="40" colspan="3" class="gradiente_gris1"><span class="texto_decorado_blanco_amarillo"><div style="margin-left: 10px;">Informaci&oacute;n Base del Retiro</div></span></td>
	      </tr>
	    <tr>
	      <td height="40"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Escuela en la que se retira</div></td>
	      <td height="40" align="left"><?php echo armselV2Escue($fRetiros['a_escuela']); ?></td>
	      <td rowspan="6"><div class="txt_pie" style="margin-left: 11px; margin-right: 9px; line-height: 17px; text-align:center;">Modif&iacute;quese de acuerdo a la necesidad y correcci&oacute;n necesaria...</div></td>
	      </tr>
	    <tr>
	      <td height="40"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Menci&oacute;n (si aplica)</div></td>
	      <td height="40" align="left" valign="middle"><?php
		  echo armselCdMenc();
		  //echo armselV2Menc($fAlumnos['a_escuela'],$fAlumnos['a_mencion']);
		  ?></td>
	      </tr>
	    <tr>
	      <td height="40"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Modalidad de Ingreso</div></td>
	      <td height="40" align="left"><?php echo armselV2ModdIngr($fRetiros['a_modalidad_ingreso']); ?></td>
	      </tr>
	    <tr>
	      <td height="40"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Activo</div></td>
	      <td height="40" align="left"><?php echo armselV2Activ($fRetiros['a_estatus_activo']); ?></td>
	      </tr>
	    <tr>
	      <td height="40"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Per&iacute;odo Lectivo</div></td>
	      <td height="40" align="left"><?php echo '<input type="text" name="txtPerLec" value="'.$fRetiros['a_periodo'].'" class="cuadro_textbox_5" size="8" maxlength="7" title="Indique el &uacute;ltimo per&iacute;odo lectivo que curso (si aplica)..." />'; ?></td>
	      </tr>
	    <tr>
	      <td height="40"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Pasivo</div></td>
	      <td height="40" align="left"><?php echo armselV2Pasiv($fRetiros['a_estatus_pasivo']); ?></td>
	      </tr>
	    <tr>
	      <td height="50"><div align="right" class="texto_decorado_agua_marina" style="margin: 0px 9px 10px 0px; line-height: 20px;">Fecha</div></td>
	      <td height="50" align="left"><?php echo '<input type="text" name="txtFechRet" style="margin: 0px 0px 10px 0px;" class="cuadro_textbox_5" value="'.date('d-m-Y').'" size="10" maxlength="10" title="Indique la fecha del Retiro..." />'; ?></td>
	      <td height="50" align="center" valign="middle"><div class="txt_pie" style="margin-left: 11px; margin-right: 9px; line-height: 17px; text-align:center;">El formato de la Fecha es dd-mm-aaaa<br />&laquo;dd = D&iacute;a&raquo;&nbsp;&laquo;mm = Mes&raquo;&nbsp;&laquo;aaaa = A&ntilde;o&raquo;</div></td>
	      </tr>
	    <tr>
	      <td height="40"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Observaci&oacute;n (general)</div></td>
	      <td height="40" align="left"><?php echo '<textarea name="txtObservacion" class="cuadro_textbox_5" rows="3" cols="60">'.$fRetiros['observacion_retiro'].'</textarea>'; ?></td>
	      <td height="40">&nbsp;</td>
	      </tr>
	    <tr>
	      <td height="35" colspan="3">&nbsp;</td>
	      </tr>
	    <tr>
	      <td height="40" colspan="3" class="gradiente_gris1"><span class="texto_decorado_blanco_amarillo"><div style="margin-left: 10px;">Documentos de este Retiro</div></span></td>
	      </tr>
          <tr>
          <td height="40" colspan="2" align="center" valign="middle"><div style="margin: 10px 15px 10px 15px;"><?php echo DocQRyLosQNo($_GET['ci'],$_GET['id']); ?></div></td>
          <td height="40" align="center" valign="middle"><div class="txt_pie" style="margin: 15px 15px 15px 15px;"><div style="margin: 10px 10px 10px 10px; line-height: 30px;">Solo los documentos tildados se encuentran en el expediente.<br /><br />Para los que se encuentran:<br /><span class="txt_err">Des-Tilde</span> para ELIMINAR.<br /><br />Para incluir los nuevos<br />(coloreados en degrado de rojo):<br /><span class="txt_err">Tilde</span> para ADICIONAR.<br /><br /></div></div></td>
          </tr>
          <tr>
          <td height="25" align="center" valign="middle">&nbsp;</td>          
          <td height="25" align="center" valign="middle">&nbsp;</td>          
          <td height="25" align="center" valign="middle">&nbsp;</td>
          </tr>
          <tr>
          <td height="40" colspan="3" align="center" valign="middle"><input type="submit" name="btnRegresar" class="glow2" title="Pulse aqu&iacute; para regresar a la pantalla anterior..." value="Regresar" />&nbsp;<input type="submit"  name="btnProcesar"class="glow2" title="Pulse aqu&iacute; para realizar las modificaciones (si aplica)..." value="Procesar" /></td>          
          </tr>
          <tr>
          <td height="25" align="center" valign="middle">&nbsp;</td>          
          <td height="25" align="center" valign="middle">&nbsp;</td>          
          <td height="25" align="center" valign="middle">&nbsp;</td>
          </tr>
       </table>
  </form>
  <!-- InstanceEndEditable --></td>
  </tr>
</table>
</div>
</body>
<!-- InstanceEnd --></html>