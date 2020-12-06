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
  <form name="FrmDefineMod" method="post" >
    <table width="80%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="139" height="30" scope="col">&nbsp;</td>
        <td width="8" height="30" scope="col">&nbsp;</td>
        <td width="428" height="30" scope="col">&nbsp;</td>
        <td width="202" height="30" scope="col">&nbsp;</td>
      </tr>
      <tr>
        <td height="30" colspan="4" align="center" class="Edicion_2" scope="col">M&oacute;dulo de <?php echo $_GET['modulo']; ?></td>
        </tr>
      <tr>
        <td height="30" scope="col">&nbsp;</td>
        <td width="8" height="30" scope="col">&nbsp;</td>
        <td height="30" scope="col">&nbsp;</td>
        <td height="30" scope="col">&nbsp;</td>
      </tr>
      <tr>
        <td height="45" align="right" class="DetalleCeroUno">Documento:</td>
        <td width="8" height="45">&nbsp;</td>
        <td height="45"><input name="txtDocumento" type="text" class="Edicion_2" id="txtDocumento" title="Escriba aquí el nombre para el nuevo módulo..." size="35" maxlength="25"  /></td>
        <td height="45"><input name="btnAdiDocu" type="submit" class="glow2" title="Pulse aquí para adicionar este documento...!" value="Adicionar"  /></td>
      </tr>
      <tr>
        <td height="30">&nbsp;</td>
        <td width="8" height="30">&nbsp;</td>
        <td height="30">&nbsp;</td>
        <td height="30">&nbsp;</td>
      </tr>
      <tr>
        <td height="30" colspan="4" align="center" class="Edicion_2">Documentos Existentes para el M&oacute;dulo de <?php echo $_GET['modulo']; ?></td>
        </tr>
      <tr>
        <td height="30" colspan="4" align="center"><p>&nbsp;</p>
        <?php
		$registros = MueContDMod($_GET['modulo']);
		if (is_string($registros)) {
			echo $registros;
		}
		else {
			$i = 1;
			echo '<table width="70%" border="0" cellspacing="0" cellpadding="0">';
			while ($rows = mysqli_fetch_array($registros, MYSQLI_ASSOC)) {
				if ($i % 2) {
					echo '<tr bgcolor="#FFEAFF">';
				}
				else {
					echo '<tr bgcolor="#F2F2FF">';
				}
				echo '<td height="50" align="center" class="DetalleCeroDos">'.$rows['detalle_contenido'].'</td>
					  <td width="60" height="50" align="center" valign="middle"><a href="form-administrar-egresados-constancias-estructura-modifica-2.php" title="Editar...!" target="_self"><img src="../imagenes/editar.png" width="46" height="46" alt="editar" /></a></td>
					  <td width="60" height="50" align="center" valign="middle"><a href="form-administrar-egresados-constancias-estructura-elimina-2.php" title="Eliminar...!" target="_self"><img src="../imagenes/eliminar.png" width="43" height="43" alt="eliminar" /></a></td>';
				if ( !is_null($rows['id_modulo_estructura']) ) {
					echo '<td width="60" height="50" align="center" valign="middle"><a href="form-administrar-egresados-constancias-estructura-define-2.php" title="Ver Estructura...!" target="_self"><img src="../imagenes/con_documentos_definidos.fw.png" width="56" height="45" alt="con_doc_def" /></a></td>';
				}
				else {
					echo '<td width="60" height="50" align="center" valign="middle">&bull;</td>';
				}
				echo '</tr>';
				$i++;
			}
			echo '</table>';
		}
		?>
          <!--<table width="70%" border="0" cellspacing="0" cellpadding="0">
            <tr bgcolor="#FFEAFF">
              <td height="50" align="center" class="DetalleCeroDos">Archivo</td>
              <td width="60" height="50" align="center" valign="middle"><a href="" title="Editar...!" target="_self"><img src="../imagenes/editar.png" width="46" height="46" alt="editar" /></a></td>
              <td width="60" height="50" align="center" valign="middle"><a href="" title="Eliminar...!" target="_self"><img src="../imagenes/eliminar.png" width="43" height="43" alt="eliminar" /></a></td>
              <td width="60" height="50" align="center" valign="middle"><a href="" title="Ver Definición...!" target="_self"><img src="../imagenes/con_documentos_definidos.fw.png" width="56" height="45" alt="con_doc_def" /></a></td>
            </tr>
            <tr bgcolor="#F2F2FF">
              <td height="50" align="center" class="DetalleCeroDos">Egresados</td>
              <td width="60" height="50" align="center" valign="middle"><img src="../imagenes/editar.png" width="46" height="46" alt="editar" /></td>
              <td width="60" height="50" align="center" valign="middle"><img src="../imagenes/eliminar.png" width="43" height="43" alt="eliminar" /></td>
              <td width="60" height="50" align="center" valign="middle"><img src="../imagenes/con_documentos_definidos.fw.png" width="56" height="45" alt="con_doc_def" /></td>
            </tr>
          </table>-->
          <p>&nbsp;</p></td>
        </tr>
      <tr>
        <td height="45" colspan="4" align="center"><input name="btnReg" type="submit" class="glow2" title="Pulse aquí para regresar a la pantalla anterior..." value="Regresar" /></td>
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