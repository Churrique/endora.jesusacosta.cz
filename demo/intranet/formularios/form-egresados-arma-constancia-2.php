<?php
  include_once('../funciones/valida-funciones.php');
  require_once('../funciones/valida-funciones_ant_egresados.php');
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
      <div class="texto_decorado_azul3">
      <?php
		EdeU($uusuario,$ucuenta,$uid,$uinicio);
	  ?>
      </div>
      <br />
<div align="center">
<form name="FrmArmaCons" method="post" >
<table width="80%" border="0" cellspacing="0" cellpadding="0">
<!--<tr>
<td height="30">&nbsp;</td>
<td height="30">&nbsp;</td>
<td height="30">&nbsp;</td>
</tr>-->
<tr>
<td height="30">&nbsp;</td>
<td height="30">&nbsp;</td>
<td height="30">&nbsp;</td>
</tr>
</table>
<table width="80%" border="0" cellspacing="0" cellpadding="0" style="color: #FF0000; background-color: #272222; -webkit-border-radius:16.0px; -moz-border-radius:16.0px; -o-border-radius:16.0px; -ms-border-radius:16.0px; border-radius: 16px;">
  <tr>
    <th width="50%" scope="col">&nbsp;</th>
    <th width="2%" scope="col">&nbsp;</th>
    <th width="48%" scope="col">&nbsp;</th>
  </tr>
  <tr>
    <td height="50"><div style="margin-left: 15px; font-weight: normal; text-align: center; background-color: #330000; color: #FF2727; font-size: 19px; line-height: 40px; -webkit-border-radius:16.0px; -moz-border-radius:16.0px; -o-border-radius:16.0px; -ms-border-radius:16.0px; border-radius: 16px;">Constancia Seleccionada</div></td>
    <td height="50">&nbsp;</td>
    <td height="50" style="font-weight: normal; text-align: center; color: #FF2727; font-size: 19px; line-height: 24px;">
    <?php
	  echo $_POST['lstconstancia'];
	?>
    </td>
  </tr>
    <?php
	$items2 = ConsFormu('Egresados',$_POST['lstconstancia']);
	$i1tems = MSPeriodos();
	if (is_string($items2)) echo $items2;
	else {
		while ($rows = mysqli_fetch_array($items2, MYSQLI_ASSOC)) {
			echo '<tr>
					<td width="50%" height="40"><div align="center" style="color: #FFAAAA; font-size: 16px; line-height: 24px;">'.$rows['rotulo_anterior'].'</div></td>
					<td width="3%" height="40">&nbsp;</td>
					<td width="47%" height="40">';
			if ( $rows['rotulo_posterior'] != '<combobox>' ) {
				echo '<input type="text" name="'.$rows['campo'].'" size="'.$rows['size'].'" style="color: #FFAAAA; background-color: #550000; border-color: #D46A6A; font-size: 16px; line-height: 24px;" maxlength="'.$rows['maxlength'].'"  />';
			}
			if ( $rows['rotulo_posterior'] == '<combobox>' ) {
				if (is_string($i1tems)) echo $i1tems;
				else {
					echo '<select style="font-weight: normal; text-align: justify; background-color: #000000; color: #FFA4A4; font-size: 19.0px; line-height: 24px; border-color: #D46A6A;" name="lstconstancia" size="1" lang="es">';
					while ($filas = mysqli_fetch_array($i1tems, MYSQLI_ASSOC)) {
						echo '<option value="'.$filas['periodo'].'">'.$filas['periodo'].'</option>';
					}
					echo '</select>
					</td>
					</tr>';
				}
			}
			if ( !is_null($rows['rotulo_posterior']) && $rows['rotulo_posterior'] != '<combobox>' ) {
				echo '</td>
					  </tr>';
				echo '<tr>
				<td height="40" colspan="3">
				<div align="center" style="color: #FFAAAA; font-size: 16px; line-height: 24px;">'.$rows['rotulo_posterior'].'</div>
				</td>
				</tr>';
			}
		}
	}
	?>
  <tr>
    <td width="50%" scope="col">&nbsp;</td>
    <td width="2%" scope="col">&nbsp;</td>
    <td width="48%" scope="col">&nbsp;</td>
  </tr>
  <tr>
    <td width="50%" scope="col">&nbsp;</td>
    <td width="2%" scope="col">&nbsp;</td>
    <td width="48%" scope="col">&nbsp;</td>
  </tr>
</table>
<table width="80%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td height="30">&nbsp;</td>
<td height="30">&nbsp;</td>
<td height="30">&nbsp;</td>
</tr>
<tr>
<td height="30">&nbsp;</td>
<td height="30"><div align="center"><input name="btnAnterior" type="submit" class="glow2" title="Pulse Anterior para regresar al formulario anterior..." value="Anterior" style="margin-right: 10px;"  /><input name="btnSiguiente" type="submit" class="glow2" title="Pulse Siguiente para ir a la siguiente pantalla..." value="Siguiente" style="margin-left: 10px;"  /></div></td>
<td height="30">&nbsp;</td>
</tr>
<tr>
<td height="30">&nbsp;</td>
<td height="30">&nbsp;</td>
<td height="30">&nbsp;</td>
</tr>
</table>
</form>
</div>
  <!-- InstanceEndEditable --></td>
  </tr>
</table>
</div>
</body>
<!-- InstanceEnd --></html>