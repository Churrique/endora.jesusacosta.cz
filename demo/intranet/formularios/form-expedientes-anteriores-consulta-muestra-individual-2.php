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
  require_once('../funciones/valida-funciones_ant_expedientes.php');
  $elresultado = ConEspDeExpAnt($_GET['CI'],$_GET['TIT']);
  $encabezado = true;
  ?>
  <form name="FrmDetExp" method="post" action="form-expedientes-anteriores-consulta-2.php">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <th width="13%" height="20" scope="col">&nbsp;</th>
        <th width="37%" height="20" scope="col">&nbsp;</th>
        <th width="1%" height="20" scope="col">&nbsp;</th>
        <th width="23%" height="20" scope="col">&nbsp;</th>
        <th width="26%" height="20" scope="col">&nbsp;</th>
      </tr>
      <tr>
        <td height="40" colspan="5" class="gradiente_gris2"><span class="texto_decorado_blanco_amarillo">R&eacute;cord Individual de Notas (Data Importada del SisGrad2006)</span></td>
        </tr>
      <tr>
        <td height="20">&nbsp;</td>
        <td height="20">&nbsp;</td>
        <td height="20">&nbsp;</td>
        <td height="20">&nbsp;</td>
        <td height="20">&nbsp;</td>
      </tr>
      <?php
	  $fila =0;
      while ($vector = mysqli_fetch_array($elresultado, MYSQLI_ASSOC)) {
		  $fila++;
		  if ($encabezado) {
			  echo'
				  <tr>
					<td height="40" colspan="2" style="background:#CA206E; color:#F59DC5;"><div style="font-size:14px; font-weight:bold; text-align:left; line-height:22px; margin:3px 5px 3px 5px;"><!--Facultad-->'.$vector['facultad'].'</div></td>
					<td height="40" colspan="3" style="background:#CA206E; color:#F59DC5;"><div style="font-size:14px; font-weight:bold; text-align:left; line-height:22px; margin:3px 5px 3px 5px;"><!--Escuela-->'.$vector['escuela'].'</div></td>
					</tr>
				  <tr>
					<td height="40" colspan="2" style="background:#6E0657; color:#F59DC5;"><div style="font-size:14px; font-weight:bold; text-align:left; line-height:22px; margin:3px 5px 3px 5px;"><!--Menci&oacute;n-->'.$vector['mencion'].'</div></td>
					<td height="40" colspan="3" style="background:#6E0657; color:#F59DC5;"><div style="font-size:14px; font-weight:bold; text-align:left; line-height:22px; margin:3px 5px 3px 5px;"><!--T&iacute;tulo-->'.$vector['titulo'].'</div></td>
					</tr>
				  <tr>
					<td height="40" colspan="2" style="background:#340018; color:#FF0074;"><div style="font-size:14px; font-weight:bold; text-align:left; line-height:22px; margin:3px 5px 3px 5px;"><!--C&eacute;dula-->'.$vector['cedula'].'</div></td>
					<td height="40" colspan="3" style="background:#340018; color:#FF0074;"><div style="font-size:14px; font-weight:bold; text-align:left; line-height:22px; margin:3px 5px 3px 5px;"><!--Nombre-->'.trim($vector['nombres']).', '.trim($vector['apellidos']).'</div></td>
					</tr>
				  <tr>
					<td height="40" colspan="5"><div style="background:#011922; color:#FF0074; font-size:14px; font-weight:bold; text-align:center; line-height:22px; margin:3px 5px 3px 5px;">Detalle del Expediente</div></td>
					</tr>
				  <tr>
					<td height="40" colspan="5" align="center" valign="middle"><table width="100%" border="1" cellspacing="0" cellpadding="0">
					  <tr style="background:#011922; color:#A8E1FF; border-color:#A8E1FF;">
						<th height="25" align="center" scope="col" title="...Clave de la Materia...">Clave</th>
						<th height="25" align="center" scope="col" title="...Nombre de la Materia...">Materia</th>
						<th height="25" align="center" scope="col" title="...Secci&oacute;n...">S</th>
						<th height="25" align="center" scope="col">Nota(s)</th>
						<th height="25" align="center" scope="col" title="...Unidad Cr&eacute;dito...">UC</th>
						<th height="25" align="center" scope="col" title="...Per&iacute;odo...">P</th>
						<th height="25" align="center" scope="col" title="...Veces Cursadas...">Vc</th>
						<th width="14%" height="25" align="center" scope="col" title="...Observaci&oacute;n...">Obs</th>
						<th height="25" align="center" scope="col" title="...Materia Chequeada...">Ok</th>
						<th width="5%" height="25" align="center" scope="col" title="...Editar&bull;Eliminar...">?</th>
					  </tr>';
			  $encabezado = false;
		  }
		  if ( $fila % 2 ) {
			  echo '<tr style="color:#00456A; background-color:#09C2FB; font-size:10px; font-weight:bold; text-align:center; line-height:15px; margin:3px 5px 3px 5px;">';
		  }
		  else {
			  echo '<tr style="color:#F3FAFE; background-color:#54A4BE; font-size:10px; font-weight:bold; text-align:center; line-height:15px; margin:3px 5px 3px 5px;">';
		  }
		  echo '
            <td height="63" align="center" title="...Clave de la Materia...">'.$vector['clave_materia'].'</td>
            <td height="63" align="center" title="...Nombre de la Materia...">'.$vector['nombre_materia'].'</td>
            <td height="63" align="center" title="...Secci&oacute;n...">'.$vector['seccion_materia'].'</td>
            <td height="63" align="center"><table width="90%" border="1" cellspacing="0" cellpadding="0">
              <tr style="background:#011922; color:#A8E1FF; border-color:#A8E1FF;">
                <th width="30%" height="20" scope="col" title="...NOTA 1...">N1</th>
                <th width="20%" height="20" scope="col" title="...C&oacute;digo de NOTA 1...">C1</th>
                <th width="30%" height="20" scope="col" title="...NOTA 2...">N2</th>
                <th width="20%" height="20" scope="col" title="...C&oacute;digo de NOTA 2...">C2</th>
              </tr>
              <tr>
                <th height="30" scope="col" title="...NOTA 1...">'.$vector['nota_1'].'</th>
                <th height="30" scope="col" title="...C&oacute;digo de NOTA 1...">'.$vector['cod_nota_1'].'</th>
                <th height="30" scope="col" title="...NOTA 2...">'.$vector['nota_2'].'</th>
                <th height="30" scope="col" title="...C&oacute;digo de NOTA 2...">'.$vector['cod_nota_2'].'</th>
              </tr>
            </table></td>
            <td height="63" align="center" title="...Unidad Cr&eacute;dito...">'.$vector['unidades_credito'].'</td>
            <td height="63" align="center" title="...Per&iacute;odo...">'.$vector['periodo_lectivo'].'</td>
			<td height="25" align="center" title="...Veces Cursadas...">'.$vector['veces_cursadas'].'</td>
            <td align="center" title="...Observaci&oacute;n...">'.trim($vector['documento']).'</td>
            <td height="63" align="center" title="...Materia Chequeada...">'.$vector['ok_materia'].'</td>
			<td align="center" title="...Editar&bull;Eliminar..."><a href="form-expedientes-anteriores-edicion-individual-2.php?ID='.$vector['id_ant_expedientes'].'" target="_self" title="...Pulse aqu&iacute; para EDITAR este EXPEDIENTE..."><img src="../imagenes/exp-editar.fw.png" width="20" height="20" alt="editar" /></a><a href="form-expedientes-anteriores-eliminacion-individual-2.php?ID='.$vector['id_ant_expedientes'].'" target="_self" title="...Pulse aqu&iacute; para ELIMINAR este EXPEDIENTE..."><img src="../imagenes/exp-eliminar.fw.png" width="20" height="20" alt="eliminar" /></a></td>
          </tr>';
		  }
		  ?>
          <tr style="background:#011922; color:#A8E1FF; border-color:#A8E1FF; font-weight:bold;">
            <td height="25" colspan="10" align="center">&laquo; F&iacute;n del Expediente &raquo;</td>
            </tr>
        </table></td>
        </tr>
      <tr>
        <td height="30" colspan="5"><div style="background:#2767BA; color:#FFFFFF; font-size:12px; font-weight:bold; text-align:left; text-indent:10px; line-height:21px; margin:3px 5px 3px 5px;">Total de Materias Encontradas:<?php echo $_GET['MAT']; ?></div></td>
      </tr>
      <tr>
        <td height="40" colspan="5"><div style="background:#03446D; color:#FFFFFF; font-size:14px; font-weight:bold; text-align:center; line-height:40px; margin:3px 5px 3px 5px;">Si desea puede IMPRIMIR &laquo;<a href="imprimir.php" target="_parent" title="...Pulse aqu&iacute; para IMPRIMIR este EXPEDIENTE..."><img src="../imagenes/exp-imprimir.fw.png" width="20" height="22" alt="imprimir" /></a>&raquo; o EXPORTAR &laquo;<a href="exportar.php" target="_parent" title="...Pulse aqu&iacute; para EXPORTAR este EXPEDIENTE..."><img src="../imagenes/exp-exportar.fw.png" width="20" height="21" alt="exportar" /></a>&raquo; este EXPEDIENTE.</div></td>
        </tr>
      <tr>
        <td height="10">&nbsp;</td>
        <td height="10">&nbsp;</td>
        <td height="10">&nbsp;</td>
        <td height="10">&nbsp;</td>
        <td height="10">&nbsp;</td>
      </tr>
      <tr>
        <td height="40" colspan="5" align="center"><input name="btnRegresar" type="submit" class="glow2" title="Pulse aquí para regresar a la pantalla anterior..." value="Regresar"  /></td>
        </tr>
      <tr>
        <td height="10">&nbsp;</td>
        <td height="10">&nbsp;</td>
        <td height="10">&nbsp;</td>
        <td height="10">&nbsp;</td>
        <td height="10">&nbsp;</td>
      </tr>
    </table>
  </form>
  <!-- InstanceEndEditable --></td>
  </tr>
</table>
</div>
</body>
<!-- InstanceEnd --></html>