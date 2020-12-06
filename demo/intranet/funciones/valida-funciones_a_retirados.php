<?php
//--------------------------------------------------------------------------------------------------------------------
//
//   F U N C I O N E S   C O N   A _ R E T I R A D O S
//
//--------------------------------------------------------------------------------------------------------------------
function DlosRdeR($pCedula=0,$pIURetiro='') {   ///--- Dame los Registros de este Retiro
	$sql_transac = "SELECT * FROM `a_retirados` WHERE `a_ci`=".$pCedula." AND `id_retiro`='".$pIURetiro."'";
	$link = mysqli_connect("localhost",NAME_USER,PASS_USER,BASE_DE_DATOS);
	$result1 = mysqli_query($link,$sql_transac);
	$LaFila = mysqli_fetch_assoc($result1);
	if (mysqli_num_rows($result1) == 1) {
		mysqli_close($link);
		return($LaFila);
	}
	else {
		mysqli_close($link);
		return(false);
	}
}
function BorERetxIDR($pIDRetiro='') {   //--- Borra Este Retiro x ID Retiro
	$sql_transac = "DELETE FROM `a_retirados` WHERE `id_retiro`='".$pIDRetiro."'";
	$link = mysqli_connect("localhost",NAME_USER,PASS_USER,BASE_DE_DATOS);
	$result1 = mysqli_query($link,$sql_transac);
	if (mysqli_num_rows($result1) == 1) {
		mysqli_close($link);
		return($result1);
	}
	else {
		mysqli_close($link);
		return(false);
	}
}
function Decddper($pIDRetiro='',$pCedula=0) {   //--- Da el conjunto de documentos para este retiro
	$sql_transac = "SELECT * FROM `_vista_compuesta_de_retiros` WHERE `idretiro`='".$pIDRetiro."' AND `aci`=".$pCedula;
	$link = mysqli_connect("localhost",NAME_USER,PASS_USER,BASE_DE_DATOS);
	$result1 = mysqli_query($link,$sql_transac);
	if ($result1 && mysqli_num_rows($result1) >= 1) {
		mysqli_close($link);
		return($result1);
	}
	else {
		mysqli_close($link);
		return(false);
	}
}
function Gepmr($pCI=0,$pIDR='0') {   //--- Grid editable para mostrar retiros
	$sql_transac = "SELECT * FROM `_vista_compuesta_de_retiros` WHERE `idretiro`='".$pIDR."' AND `aci`=".$pCI;
	$link = mysqli_connect("localhost",NAME_USER,PASS_USER,BASE_DE_DATOS);
	$result1 = mysqli_query($link,$sql_transac);
	$filas = mysqli_fetch_array($result1, MYSQLI_ASSOC);
	if ($result1 && mysqli_num_rows($result1) >= 1) {
		echo '<table width="70%" border="0" cellspacing="0" cellpadding="0">';
		echo '<tr class="descripcion"><td height="20" align="center">Documento(s) que Retir&oacute;</td></tr>';
		$i = 1;
		mysqli_data_seek($result1, 0);
		while ($rows = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
			echo '<tr height="30" bgcolor="#'.($i % 2 ? 'C0D0F5' : 'A5B1ED').'" class="RotuloTabla1">';
			echo '<td align="center" valign="middle">'.$rows['descripcion_del_documento'].'</td></tr>';
			$i++;
		}
		echo '</table>';
		mysqli_free_result($result1);
		mysqli_close($link);
		return($filas);
	}
	else {
		mysqli_free_result($result1);
		mysqli_close($link);
		return(false);
	}
}
function GGendARet($pPantalla='') {   //--- Grid General de Alumno Retirado
	$sql_transac = "SELECT * FROM `_vista_compuesta_de_retiros` GROUP BY `idretiro` ORDER BY `aci`";
	$link = mysql_connect("localhost",NAME_USER,PASS_USER);
	$db_selected = mysql_select_db(BASE_DE_DATOS,$link);
	$result1 = mysql_query($sql_transac,$link);
	if ($result1 && mysql_num_rows($result1) >= 1) {
		echo '<div align="justify" style="margin: 10px 5px 15px 5px;">';
		echo '<table width="100%" bordercolor="#999999" border="1" cellspacing="0" cellpadding="0" summary="Retiros previos registrados en el sistema.">';
		echo '<tr class="glow2">';
		echo '<th height="18" scope="col" align="center">C&eacute;dula</th>';
		echo '<th height="18" scope="col" align="center">Nombre, Apellido</th>';
		echo '<th height="18" scope="col" align="center">Fecha</th>';
		echo '<th height="18" scope="col" align="center">Escuela</th>';
		echo '<th height="18" colspan="4" scope="col" align="center" title="Aciones posibles: &laquo;Ver &bull; Editar &bull; Exportar &bull; Eliminnar&raquo; los Documentos de cada Retiro registrado...">Acciones</th>';
		echo '</tr>';
		$i = 1;
		while ($rows = mysql_fetch_array($result1, MYSQL_ASSOC)) {
			if ($i % 2) {
				echo '<tr bgcolor="#1D47F1" style="background: -moz-linear-gradient(top,  #f5f6f6 0%, #dbdce2 21%, #b8bac6 49%, #dddfe3 80%, #f5f6f6 100%); font-weight: bold; text-align: center; background-color: rgba(255, 255, 255, 0); color: #661ABD; font-family: Verdana, Geneva, sans-serif; font-size: 11px; line-height: 20px;">';
			}
			else {
				echo '<tr bgcolor="#2271F4" style="background: -moz-linear-gradient(top,  #e0f3fa 0%, #d8f0fc 28%, #b8e2f6 53%, #d8f0fc 74%, #e0f3fa 100%); font-weight: bold; text-align: center; background-color: rgba(255, 255, 255, 0); color: #B81DB2; font-family: Verdana, Geneva, sans-serif; font-size: 11px; line-height: 20px;">';
			}
			echo '<td height="40">'.$rows['aci'].'</td>';
			echo '<td height="40">'.$rows['primernombre'].', '.$rows['primerapellido'].'</td>';
			echo '<td height="40">'.$rows['fecha_del_retiro'].'</td>';
			echo '<td height="40">'.$rows['nombre_de_escuela'].'</td>';
			echo '<td width="3%" height="40" title="Pulse aqu&iacute; para ver los Documentos de este Retiro..."><a href="form-retiros-documentos-que-retiro-2.php?ci='.$rows['aci'].'&id='.$rows['idretiro'].'&pantalla='.$pPantalla.'" title="Pulse aqu&iacute; para ver los Documentos de este Retiro..." target="_body"><img src="../imagenes/ver_documentos_retirados_t2.fw.png" width="30" height="30" alt="documentos" /></a></td>';
			echo '<td width="3%" height="40" title="Pulse aqu&iacute; para Editar los Documentos de este Retiro..."><a href="form-retiros-editar-documentos-que-retiro-2.php?ci='.$rows['aci'].'&id='.$rows['idretiro'].'&pantalla='.$pPantalla.'" title="Pulse aqu&iacute; para Editar los Documentos de este Retiro..." target="_body"><img src="../imagenes/editar.png" width="30" height="30" alt="editar" /></a></td>';
			echo '<td width="3%" height="40" title="Pulse aqu&iacute; para Exportar los Documentos de este Retiro..."><a href="form-retiros-exportar-retiro-2.php?ci='.$rows['aci'].'&id='.$rows['idretiro'].'&pantalla='.$pPantalla.'" title="Pulse aqu&iacute; para Exportar los Documentos de este Retiro..." target="_body"><img src="../imagenes/exportar.png" width="30" height="31" alt="exportar" /></a></td>';
			echo '<td width="3%" height="40" title="Pulse aqui para Eliminar los Documentos de este Retiro..."><a href="form-retiros-eliminar-retiro-2.php?ci='.$rows['aci'].'&id='.$rows['idretiro'].'&pantalla='.$pPantalla.'" title="Pulse aqu&iacute; para Eliminar los Documentos de este Retiro..." target="_body"><img src="../imagenes/eliminar.png" width="30" height="31" alt="eliminar" /></a></td>';
			echo '</tr>';
			$i++;
		}
		echo '</table></div>';
	}
	else {
		echo '<div class="MenBusqueda" style="margin: 10px 5px 15px 5px;">No hay retiros que mostrar...!</div>';
	}
	mysql_free_result($result1);
	mysql_close($link);
	return;
}
function GdARet($pCedula=0,$pPantalla='') {   //--- Grid de Alumno Retirado
	$sql_transac = "SELECT * FROM `_vista_simple_de_retiros` WHERE `a_ci`=".$pCedula;
	$link = mysql_connect("localhost",NAME_USER,PASS_USER);
	$db_selected = mysql_select_db(BASE_DE_DATOS,$link);
	$result1 = mysql_query($sql_transac,$link);
	if ($result1 && mysql_num_rows($result1) >= 1) {
		echo '<div align="justify" style="margin: 10px 5px 15px 5px;">';
		echo '<table width="100%" bordercolor="#999999" border="1" cellspacing="0" cellpadding="0" summary="Retiros previos registrados en el sistema."><tr class="glow2"><th width="8%" height="18" scope="col" align="center">Fecha</th><th width="25%" height="18" scope="col" align="center">Escuela</th>';
		echo '<th width="15%" height="18" scope="col" align="center">Activo?</th><th width="15%" height="18" scope="col" align="center">Pasivo?</th><th width="23%" height="18" scope="col" align="center">Observaci&oacute;n</th><th height="18" colspan="4" scope="col" align="center" title="Aciones posibles: &laquo;Ver &bull; Editar &bull; Exportar &bull; Eliminnar&raquo; los Documentos de cada Retiro registrado...">Acciones</th></tr>';
		$i = 1;
		while ($rows = mysql_fetch_array($result1, MYSQL_ASSOC)) {
			if ($i % 2) {
				echo '<tr bgcolor="#1D47F1" style="font-weight: bold; font-style: italic; text-align: center; color: #FFFF00; font-family: \'Comic Sans MS\', cursive; font-size: 14px; line-height: 20px;">';
			}
			else {
				echo '<tr bgcolor="#2271F4" style="font-weight: bold; font-style: italic; text-align: center; color: #F0FFDB; font-family: \'Comic Sans MS\', cursive; font-size: 14px; line-height: 20px;">';
			}
			echo '<td width="80" height="40">'.$rows['fecha_retiro'].'</td>';
			echo '<td height="40">'.$rows['escuela'].'</td>';
			echo '<td height="40">'.$rows['activo'].'</td>';
			echo '<td height="40">'.$rows['pasivo'].'</td>';
			echo '<td height="40">'.$rows['observacion_retiro'].'</td>';
			echo '<td width="3%" height="40" title="Pulse aqu&iacute; para ver los Documentos de este Retiro..."><a href="form-retiros-documentos-que-retiro-2.php?ci='.$rows['a_ci'].'&id='.$rows['idretiro'].'&pantalla='.$pPantalla.'" title="Pulse aqu&iacute; para ver los Documentos de este Retiro..." target="_body"><img src="../imagenes/ver_documentos_retirados_t2.fw.png" width="30" height="30" alt="documentos" /></a></td>';
			echo '<td width="3%" height="40" title="Pulse aqu&iacute; para Editar los Documentos de este Retiro..."><a href="form-retiros-editar-documentos-que-retiro-2.php?ci='.$rows['a_ci'].'&id='.$rows['idretiro'].'&pantalla='.$pPantalla.'" title="Pulse aqu&iacute; para Editar los Documentos de este Retiro..." target="_body"><img src="../imagenes/editar.png" width="30" height="30" alt="editar" /></a></td>';
			echo '<td width="3%" height="40" title="Pulse aqu&iacute; para Exportar los Documentos de este Retiro..."><a href="form-retiros-exportar-retiro-2.php?ci='.$rows['a_ci'].'&id='.$rows['idretiro'].'&pantalla='.$pPantalla.'" title="Pulse aqu&iacute; para Exportar los Documentos de este Retiro..." target="_body"><img src="../imagenes/exportar.png" width="30" height="31" alt="exportar" /></a></td>';
			echo '<td width="3%" height="40" title="Pulse aqui para Eliminar los Documentos de este Retiro..."><a href="form-retiros-eliminar-retiro-2.php?ci='.$rows['a_ci'].'&id='.$rows['idretiro'].'&pantalla='.$pPantalla.'" title="Pulse aqu&iacute; para Eliminar los Documentos de este Retiro..." target="_body"><img src="../imagenes/eliminar.png" width="30" height="31" alt="eliminar" /></a></td>';
			echo '</tr>';
			$i++;
		}
		echo '</table></div>';
	}
	else {
		echo '<div class="MenBusqueda" style="margin: 10px 5px 15px 5px;">No hay retiros que mostrar...!</div>';
	}
	mysql_free_result($result1);
	mysql_close($link);
	return;
}
function Ins1ReRet($pCI=0,$pFechaRet='',$pEscuela=0,$pMencion='',$pPasivo='',$pActivo='',$pObserv='',$pSemilla='') {   //--- Inserta 1 Registro en Retiro
	$vfRetiro = explode('-',$pFechaRet);
	$FechaRetiro = $vfRetiro[2].'-'.$vfRetiro[1].'-'.$vfRetiro[0];
	$sql_transac = "INSERT INTO `a_retirados` (`a_ci`,`fecha_transcrito`,`fecha_retiro`,`a_escuela`,`a_mencion`,`a_estatus_pasivo`,`a_estatus_activo`,`observacion_retiro`,`id_retiro`) VALUES (".$pCI.",'".date('Y-m-d')."','".$FechaRetiro."',".$pEscuela.",'".$pMencion."','".$pPasivo."','".$pActivo."','".$pObserv."','".$pSemilla."')";
	$link = mysql_connect("localhost",NAME_USER,PASS_USER);
	$db_selected = mysql_select_db(BASE_DE_DATOS,$link);
	if ( mysql_query($sql_transac,$link) ) {
		$operacion = mysql_affected_rows($link).' fila afectada...!';
	}
	else {
		$operacion = '0 fila afectada...!<br />Error<br />'.mysql_errno($link).': '.mysql_error($link).'<br />INSTRUCCION ORIGINAL:<br />'.$sql_transac;
	}
	mysql_close($link);
	return($operacion);
}
function BcSemilla($pCedula=0,$pSemilla='') {   //--- Busca con Semilla
	$sql_transac = "SELECT * FROM `a_retirados` WHERE `a_ci`=".$pCedula." AND `id_retiro`='".$pSemilla."'";
	$link = mysql_connect("localhost",NAME_USER,PASS_USER);
	$db_selected = mysql_select_db(BASE_DE_DATOS,$link);
	$result1 = mysql_query($sql_transac,$link);
	if ($result1 && mysql_num_rows($result1) == 1) {
		$rows = mysql_fetch_array($result1, MYSQL_ASSOC);
		mysql_free_result($result1);
		mysql_close($link);
		return($rows);
	}
	else {
		mysql_close($link);
		return(false);
	}
}
function CR_1er_Paso() {   //--- Consulta Retiro 1er Paso
	$link = mysqli_connect("localhost",NAME_USER,PASS_USER,BASE_DE_DATOS);
	if ( !$link ) {
		return( 'Error de Conexión ('.mysqli_connect_errno().') '.mysqli_connect_error().'<br />' );
	}
	return($link);
}
function CR_2do_Paso($p_enlace=NULL,$p_where) {   //--- Consulta Retiro 2do Paso
	$sql_transac = "SELECT * FROM `_vista_compuesta_de_retiros` ".$p_where;
	if ( $result1 = mysqli_query($p_enlace,$sql_transac) ) {
		if ( mysqli_num_rows($result1) >= 1 ) {
			return($result1);
		}
		if ( mysqli_num_rows($result1) == 0 ) {
			return('El resulset tiene cero filas que mostrar.<br />'.$sql_transac.'<br />');
		}
	}
}
function CR_U_Paso($p_enlace=NULL,$p_where) {   //--- Consulta Retiro Unico Paso
	$sql_transac = "SELECT * FROM `_vista_compuesta_de_retiros_para_reportes` ".$p_where;
	if ( $result1 = mysqli_query($p_enlace,$sql_transac) ) {
		if ( mysqli_num_rows($result1) >= 1 ) {
			return($result1);
		}
		if ( mysqli_num_rows($result1) == 0 ) {
			return('El resulset tiene cero filas que mostrar.<br />'.$sql_transac.'<br />');
		}
	}
}
?>
<!--<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
</body>
</html>-->