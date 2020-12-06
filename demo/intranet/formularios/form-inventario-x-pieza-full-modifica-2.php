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
<html xmlns="http://www.w3.org/1999/xhtml" lang="es"><!-- InstanceBegin template="/Templates/plantilla-2.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=latin1">
<!-- InstanceBeginEditable name="doctitle" -->
<title>Direcci&oacute;n General de Asuntos Estudiatiles - Universidad de Carabobo</title>
<!-- InstanceEndEditable -->
<meta name="ROBOTS" content="NOINDEX,NOFOLLOW,NOARCHIVE" />
<link rel="icon" href="../digaes.ico" type="image/x-icon">
<link rel="shortcut icon" href="../digaes.ico" type="image/x-icon">
<link href="../css/hoja_de_estilos.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
var txt=".::    Dirección General de Asuntos Estudiatiles - Universidad de Carabobo     ::.";
var refresco=null;
function titulo() {	document.title=txt;	txt=txt.substring(1,txt.length)+txt.charAt(0); 	refresco=setTimeout("titulo()",500);}
titulo();
</script>
<script type="text/javascript"> 
    $(document).ready(function(){ 
        $(document).pngFix(); 
    }); 
</script>
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
</head>

<body>
<div class="center">
  <p>
  <table width="990" border="0" align="center">
    <tr>
      <td colspan="3" valign="top"><img src="../img/DGAE_banner_new.jpg" alt="DiGAEs" width="990" height="125" border="0" align="middle" /></td>
    </tr>
    <tr>
      <td height="32" colspan="3" valign="top">
        <table width="100%" height="30" border="0" class="menu">
          <tr>
            <td width="50" align="center">
              <table width="100%" height="30" border="0" class="menu">
                <tr>
                  <td width="50" align="center"><a href="../index.php" class="txt_link">Inicio</a></td>
                </tr>
              </table>
            </td>
            <td width="90" align="center">&nbsp;</td>
            <td width="99" align="center">&nbsp;</td>
            <td width="66" align="center">&nbsp;</td>
            <td width="110" align="center">&nbsp;</td>
            <td width="549" align="right"><div class="txt_link" style="padding-right:10px;"><?php echo date("d/m/Y"); ?></div></td>
          </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td width="20%">&nbsp;</td>
      <td width="60%">&nbsp;</td>
      <td width="20%">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3" class="tabla_body">
	  <!-- InstanceBeginEditable name="EdtReg1_menu" -->
      <?php
		EdeU($uusuario,$ucuenta,$uid,$uinicio);
		require_once('../funciones/valida-funciones_inv_xxxxxxxx.php');
		$inventario = BusEsteInv($_GET['ID']);
	  ?>
      <form name="frmInvEdi" method="post" action="form-inventario-x-pieza-full-modifica-direcciona-2.php">
          <?php echo'<input name="txtIDInv" type="hidden" value="'.$inventario['id_inv_piezas'].'" />'; ?>
	  <table width="100%" border="0" cellspacing="0" cellpadding="0">
	    <tr>
	      <td height="40" colspan="3" class="gradiente_gris1"><span class="texto_decorado_blanco_amarillo">Inventario</span></td>
	    </tr>
	    <tr>
	      <td height="20" colspan="3">&nbsp;</td>
	    </tr>
	    <tr>
	      <td height="40" colspan="3" class="texto_decorado_azul5B">COMPONENTE / PIEZA / PARTE</td>
	    </tr>
	    <tr>
	      <td width="40%" height="40">
          <div align="right" class="texto_decorado_agua_marina" style="margin-right: 7px; line-height: 20px;">
          Invcentario UC
          </div>
          </td>
	      <td width="40%" height="40" align="left">
          <?php echo'<input name="txtInvUC" type="text" class="cuadro_textbox_5" title="Inventario UC..." value="'.$inventario['inv_numero'].'" size="12" maxlength="6"  />'; ?>
          </td>
	      <td width="10%" height="40">&nbsp;</td>
	    </tr>
	    <tr>
	      <td width="40%" height="40">
          <div align="right" class="texto_decorado_agua_marina" style="margin-right: 7px; line-height: 20px;">
          Serial
          </div>
          </td>
	      <td width="40%" height="40" align="left">
          <?php echo '<input name="txtSerial" type="text" class="cuadro_textbox_5" title="Serial de la Pieza..." value="'.$inventario['inv_serial'].'" size="30" maxlength="25"  />'; ?>
          </td>
	      <td width="10%" height="40">&nbsp;</td>
	    </tr>
	    <tr>
	      <td width="40%" height="40">
          <div align="right" class="texto_decorado_agua_marina" style="margin-right: 7px; line-height: 20px;">
          Modelo
          </div>
          </td>
	      <td width="40%" height="40" align="left">
          <?php echo '<input name="txtModelo" type="text" class="cuadro_textbox_5" title="Modelo de la Pieza..." value="'.$inventario['inv_modelo'].'" size="30" maxlength="25"  />'; ?>
          </td>
	      <td width="10%" height="40">&nbsp;</td>
	    </tr>
	    <tr>
	      <td width="40%" height="40">
          <div align="right" class="texto_decorado_agua_marina" style="margin-right: 7px; line-height: 20px;">
          Marca
          </div>
          </td>
	      <td width="40%" height="40" align="left">
		  <?php echo V2DarmselMarca($inventario['id_inv_marca']); ?>
          </td>
	      <td width="10%" height="40">&nbsp;</td>
	    </tr>
	    <tr>
	      <td width="40%" height="40">
          <div align="right" class="texto_decorado_agua_marina" style="margin-right: 7px; line-height: 20px;">
          Descripci&oacute;n
          </div>
          </td>
	      <td width="40%" height="40" align="left">
		  <?php echo V2DarmselDescripcio($inventario['id_inv_descripcion']); ?>
          </td>
	      <td width="10%" height="40">&nbsp;</td>
	    </tr>
	    <tr>
	      <td width="40%" height="40">
          <div align="right" class="texto_decorado_agua_marina" style="margin-right: 7px; line-height: 20px;">
          Condici&oacute;n
          </div>
          </td>
	      <td width="40%" height="40" align="left">
		  <?php echo V2DarmselCondicion($inventario['id_inv_condicion']); ?>
          </td>
	      <td width="10%" height="40">&nbsp;</td>
	    </tr>
	    <tr>
	      <td width="40%" height="40">
          <div align="right" class="texto_decorado_agua_marina" style="margin-right: 7px; line-height: 20px;">
          Observaci&oacute;n
          </div>
          </td>
	      <td width="40%" height="40" align="left">
          <?php echo '<textarea name="txtObs" class="cuadro_textbox_5" title="Observaci&oacute;n de la Pieza..." rows="4" cols="50">'.$inventario['inv_observacion'].'</textarea>'; ?>
          </td>
	      <td width="10%" height="135">&nbsp;</td>
	    </tr>
	    <tr>
	      <td height="40" colspan="3" class="texto_decorado_azul5B">ASOCIACI&Oacute;N</td>
	    </tr>
	    <tr>
	      <td width="40%" height="40">
          <div align="right" class="texto_decorado_agua_marina" style="margin-right: 7px; line-height: 20px;">
          Departamento / Unidad
          </div>
          </td>
	      <td width="40%" height="40" align="left">
		  <?php echo V2DarmselDepto($inventario['id_unidad']); ?>
          </td>
	      <td width="10%" height="40">&nbsp;</td>
	    </tr>
	    <tr>
	      <td width="40%" height="40">
          <div align="right" class="texto_decorado_agua_marina" style="margin-right: 7px; line-height: 20px;">
          Personal / Operador
          </div>
          </td>
	      <td width="40%" height="40" align="left">
		  <?php echo V2DarmselUsua($inventario['idusuarios']); ?>
          </td>
	      <td width="10%" height="40">&nbsp;</td>
	    </tr>
	    <tr>
	      <td height="40" colspan="3">
          <input name="btnGuardar" type="submit" class="glow2" id="btnGuardar" title="Pulse aqui si desea Guardar esta modificaci&oacute;n en el Inventario..." value="Guardar" />
          &nbsp;&nbsp;
          <input name="btnOM" type="submit" class="glow2" value="Movimientos" title="Pulse aqui si desea realizar otros movimientos con el Inventario [ESTA ACCI&Oacute;N NO GUARDAR&Aacute; LA MODIFICACI&Oacute;N]..." />
          </td>
	    </tr>
	    </table>
        </form>
      <!-- InstanceEndEditable -->
      </td>
    </tr>
    <tr>
      <td width="20%">&nbsp;</td>
      <td width="60%">&nbsp;</td>
      <td width="20%">&nbsp;</td>
    </tr>
      <td height="21" colspan="3" class="tabla_body">
        <table width="100%" border="0" class="txt_pie">
          <tr>
            <td align="center">
              Universidad de Carabobo<br />Direcci&oacute;n General de Asuntos Estudiantiles<br />Horarios:<br />
              Oficina: 8:00 a.m. - 2:15 p.m.<br />
              Caja: 8:30 a.m. - 1:30 p.m.<br />
              Taquilla: 8:00 a.m. - 2:00 p.m.
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
  </p>
</div>
</body>
<!-- InstanceEnd --></html>
