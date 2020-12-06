<?php
//--------------------------------------------------------------------------------------------------------------------
//
//   F U N C I O N E S   C O N   P N R _ D A T O S _ P R O M O C I O N
//
//--------------------------------------------------------------------------------------------------------------------
function B1RePNRdp($p_Id=0) {   //--- Borra 1 Registro en Promedios No Relacionados datos promoción
	$sql_transac = "DELETE FROM `pnr_datos_promocion` WHERE `pnr_datos_promocion`.`id_promocion`=".$p_Id;
	$link = mysql_connect("localhost",NAME_USER,PASS_USER);
	$db_selected = mysql_select_db(BASE_FORANEA_DE_DATOS,$link);
	mysql_query("SET AUTOCOMMIT=0;",$link);
	mysql_query("START TRANSACTION",$link);
	mysql_query($sql_transac,$link);
	mysql_query("COMMIT",$link);
	mysql_close($link);
	return;
}
function Actu1delaP($p_ID=0,$p_titnom='',$p_fechacto=NULL,$p_integra=NULL,$p_propro=NULL) {   //--- Acualiza 1 de la Promoción
	if (!is_null($p_fechacto)) {
		$partes = explode('-',$p_fechacto);
		$p_fechaacto = $partes[2].'-'.$partes[1].'-'.$partes[0];
	}
	else {
		$p_fechaacto = NULL;
	}
	$sql_transac = "UPDATE `pnr_datos_promocion` SET `titulo_nombre`='".$p_titnom."',`fecha_acto`='".$p_fechaacto."',`integrantes`=".$p_integra.",`promedio_promocion`=".$p_propro." WHERE `pnr_datos_promocion`.`id_promocion`=".$p_ID;
	$link = mysql_connect("localhost",NAME_USER,PASS_USER);
	$db_selected = mysql_select_db(BASE_FORANEA_DE_DATOS,$link);
	mysql_query("SET AUTOCOMMIT=0;",$link);
	mysql_query("START TRANSACTION",$link);
	mysql_query($sql_transac,$link);
	mysql_query("COMMIT",$link);
	mysql_close($link);
	return;
}
function Ins1Promocion($p_titnom='',$p_fechacto=NULL,$p_integra=NULL,$p_propro=NULL) {
	if (!is_null($p_fechacto)) {
		$partes = explode('-',$p_fechacto);
		$p_fechaacto = $partes[2].'-'.$partes[1].'-'.$partes[0];
	}
	else {
		$p_fechaacto = 'NULL';
	}
	$sql_transac = "INSERT INTO `pnr_datos_promocion` (`titulo_nombre`,`fecha_acto`,`integrantes`,`promedio_promocion`) VALUES ('".$p_titnom."','".$p_fechaacto."',".$p_integra.",".$p_propro.")";
	$link = mysql_connect("localhost",NAME_USER,PASS_USER);
	$db_selected = mysql_select_db(BASE_FORANEA_DE_DATOS,$link);
	mysql_query("SET AUTOCOMMIT=0;",$link);
	mysql_query("START TRANSACTION",$link);
	if ( mysql_query($sql_transac,$link) ) {
		$afectado = 'Fila(s) Afectada(s):'.mysql_affected_rows($link);
		mysql_query("COMMIT",$link);
		mysql_close($link);
		return($afectado);
	}
	else {
		$el_error_es = 'Mensaje del error: '.mysql_error($link).'<br />N&uacute;mero del error: '.mysql_errno($link).'<br />Instrucci&oacute;n original: '.$sql_transac;
		mysql_query("ROLLBACK",$link);
		mysql_close($link);
		return($el_error_es);
	}
}
function ConGenDP($p_area='Internet') {   //--- Consulta General en Datos Promocion
	$sql_transac = "SELECT `id_promocion`,`titulo_nombre`,DATE_FORMAT(`fecha_acto`,'%d-%m-%Y') AS `fecha_acto`,`integrantes`,`promedio_promocion` FROM `pnr_datos_promocion`";
	$link = mysql_connect("localhost",NAME_USER,PASS_USER);
	$db_selected = mysql_select_db(BASE_FORANEA_DE_DATOS,$link);
	$result1 = mysql_query($sql_transac,$link);
	if ($result1 && mysql_num_rows($result1) >= 1) {
		echo '<table width="80%" border="0" cellspacing="0" cellpadding="0">';
		echo '<tr><td height="30" class="glow2" align="center">ID</td>';
		echo '<td height="30" class="glow2" align="center">T&iacute;tulo</td>';
		echo '<td height="30" class="glow2" title="Esta informaci&oacute;n aparecer&aacute; si se tiene..." align="center">Fecha</td>';
		echo '<td height="30" class="glow2" title="Esta informaci&oacute;n aparecer&aacute; si se tiene..." align="center">Promedio</td>';
		echo '<td height="30" class="glow2" title="Esta informaci&oacute;n aparecer&aacute; si se tiene..." align="center">Integrantes</td>';
		echo '<td height="30" class="glow2" title="Indique si desea agregar registros a la n&oacute;mina de esta promoci&oacute;n..." align="center">V&iacute;nculo</td>';
		$i = 1;
		while ($rows = mysql_fetch_array($result1, MYSQL_ASSOC)) {
			if ($i % 2) {
				echo '<tr class="glow">';
			}
			else {
				echo '<tr class="glowA">';
			}
			echo '<td height="30" align="center">'.$rows['id_promocion'].'</td>';
			echo '<td height="30">'.$rows['titulo_nombre'].'</td>';
			echo '<td height="30" align="center">'.$rows['fecha_acto'].'</td>';
			echo '<td height="30" align="center">'.$rows['promedio_promocion'].'</td>';
			echo '<td height="30" align="center">'.$rows['integrantes'].'</td>';
			echo '<td height="30" align="center">';
			echo (strtolower($p_area)=='internet')?'<a href="form-transcripcion-de-promedios-individuo.php?ID='.$rows['id_promocion'].'" title="Click aqu&iacute; para Adicionar registros a esta promoci&oacute;n..." target="_self">':'<a href="form-transcripcion-de-promedios-individuo-2.php?ID='.$rows['id_promocion'].'" title="Click aqu&iacute; para Adicionar registros a esta promoci&oacute;n..." target="_body">';
			echo (strtolower($p_area)=='internet')?'<img src="../img/adicionar.png" width="25" height="26" alt="adicionar" /></a>&nbsp;':'<img src="../imagenes/adicionar.png" width="25" height="26" alt="adicionar" /></a>&nbsp;';

			echo (strtolower($p_area)=='internet')?'<a href="form-transcripcion-de-promedios-promocion-edita.php?ID='.$rows['id_promocion'].'" title="Click aqu&iacute; para Editar la informaci&oacute;n de esta promoci&oacute;n..." target="_self">':'<a href="form-transcripcion-de-promedios-promocion-edita-2.php?ID='.$rows['id_promocion'].'" title="Click aqu&iacute; para Editar la informaci&oacute;n de esta promoci&oacute;n..." target="_body">';
			echo (strtolower($p_area)=='internet')?'<img src="../img/editar.png" width="25" height="26" alt="editar" /></a>&nbsp;':'<img src="../imagenes/editar.png" width="25" height="26" alt="editar" /></a>&nbsp;';

			echo (strtolower($p_area)=='internet')?'<a href="form-transcripcion-de-promedios-promocion-elimina.php?ID='.$rows['id_promocion'].'" title="Click aqu&iacute; para Eliminar esta promoción..." target="_self">':'<a href="form-transcripcion-de-promedios-promocion-elimina-2.php?ID='.$rows['id_promocion'].'" title="Click aqu&iacute; para Eliminar esta promoción..." target="_body">';
			echo (strtolower($p_area)=='internet')?'<img src="../img/eliminar.png" width="25" height="26" alt="eliminar" /></a>&nbsp;':'<img src="../imagenes/eliminar.png" width="25" height="26" alt="eliminar" /></a>&nbsp;';

			echo (strtolower($p_area)=='internet')?'<a href="form-transcripcion-de-promedios-promocion-exporta.php?ID='.$rows['id_promocion'].'" title="Click aqu&iacute; para Exportar esta promoci&oacute;n..." target="_self">':'<a href="form-transcripcion-de-promedios-promocion-exporta-2.php?ID='.$rows['id_promocion'].'" title="Click aqu&iacute; para Exportar esta promoci&oacute;n..." target="_body">';
			echo (strtolower($p_area)=='internet')?'<img src="../img/exportar.png" width="25" height="26" alt="exportar" /></a>&nbsp;':'<img src="../imagenes/exportar.png" width="25" height="26" alt="exportar" /></a>&nbsp;';

			echo (strtolower($p_area)=='internet')?'<a href="reporte-promedios-pnr.php?ID='.$rows['id_promocion'].'" title="Click aqu&iacute; para Imprimir esta promoci&oacute;n..." target="_blank">':'<a href="reporte-promedios-pnr.php?ID='.$rows['id_promocion'].'" title="Click aqu&iacute; para Imprimir esta promoci&oacute;n..." target="_blank">';
			echo (strtolower($p_area)=='internet')?'<img src="../img/printer.fw.png" width="25" height="26" alt="imprimir" /></a></td></tr>':'<img src="../imagenes/printer.fw.png" width="25" height="26" alt="imprimir" /></a></td></tr>';
			$i++;
		}
		echo '</table>';
	}
	else {
		echo 'Instrucción: ' . $sql_transac . '<br />'. mysql_errno($link) . ' : ' . mysql_error($link);
	}
	mysql_free_result($result1);
	mysql_close($link);
	return;
}
function BEenDP($p_ID = NULL) {   //--- Busca Este en Datos Promocion
	$sql_transac = "SELECT `id_promocion`,`titulo_nombre`,DATE_FORMAT(`fecha_acto`,'%d-%m-%Y') AS `fecha_acto`,`integrantes`,`promedio_promocion` FROM `pnr_datos_promocion` WHERE `pnr_datos_promocion`.`id_promocion`=".$p_ID;
	$link = mysql_connect("localhost",NAME_USER,PASS_USER);
	$db_selected = mysql_select_db(BASE_FORANEA_DE_DATOS,$link);
	$result1 = mysql_query($sql_transac,$link);
	if ($result1 && mysql_num_rows($result1) == 1) {
		$rows = mysql_fetch_array($result1, MYSQL_ASSOC);
		mysql_free_result($result1);
		mysql_close($link);
		return($rows);
	}
}
//--------------------------------------------------------------------------------------------------------------------
//
//   F U N C I O N E S   C O N   P N R _ D A T O S _ P E R S O N A L E S
//
//--------------------------------------------------------------------------------------------------------------------
function EenPNR($p_IU=0) {   //--- Elimina en Promedio No Relacionado
	$sql_transac = "DELETE FROM `pnr_datos_personales` WHERE `pnr_datos_personales`.`id_unico`=".$p_IU;
	$link = mysql_connect("localhost",NAME_USER,PASS_USER);
	$db_selected = mysql_select_db(BASE_FORANEA_DE_DATOS,$link);
	mysql_query("SET AUTOCOMMIT=0;",$link);
	mysql_query("START TRANSACTION",$link);
	mysql_query($sql_transac,$link);
	mysql_query("COMMIT",$link);
	mysql_close($link);
}
function EeRenPNR($p_IU=0,$p_nombre='',$p_ID=0,$p_cedula=0,$p_promedio=0,$p_puesto=0) {   //--- Edita este Registro en Promedio No Relacionado
	$sql_transac = "UPDATE `pnr_datos_personales` SET `id_promocion`=".$p_ID.",`cedula`=".$p_cedula.",`nombre_completo`='".$p_nombre."',`promedio_individual`=".$p_promedio.",`posicion`=".$p_puesto." WHERE `pnr_datos_personales`.`id_unico`=".$p_IU;
	$link = mysql_connect("localhost",NAME_USER,PASS_USER);
	$db_selected = mysql_select_db(BASE_FORANEA_DE_DATOS,$link);
	mysql_query("SET AUTOCOMMIT=0;",$link);
	mysql_query("START TRANSACTION",$link);
	mysql_query($sql_transac,$link);
	mysql_query("COMMIT",$link);
	mysql_close($link);
}
function In1RenPNR($p_idpro=0,$p_cedula=0,$p_nom_com='',$p_promedio=0,$p_posicion=0) {   //--- Inserta 1 Registro en Promedios No Relacionados
	$sql_transac = "INSERT INTO `pnr_datos_personales` (`id_promocion`,`cedula`,`nombre_completo`,`promedio_individual`,`posicion`) VALUES (".$p_idpro.",".$p_cedula.",'".$p_nom_com."',".$p_promedio.",".$p_posicion.")";
	$link = mysql_connect("localhost",NAME_USER,PASS_USER);
	$db_selected = mysql_select_db(BASE_FORANEA_DE_DATOS,$link);
	mysql_query("SET AUTOCOMMIT=0;",$link);
	mysql_query("START TRANSACTION",$link);
	if ( mysql_query($sql_transac,$link) ) {
		$afectado = 'Fila(s) Afectada(s):'.mysql_affected_rows($link);
		mysql_query("COMMIT",$link);
		mysql_close($link);
		return($afectado);
	}
	else {
		$el_error_es = 'Mensaje del error: '.mysql_error($link).'<br />N&uacute;mero del error: '.mysql_errno($link).'<br />Instrucci&oacute;n original: '.$sql_transac;
		mysql_query("ROLLBACK",$link);
		mysql_close($link);
		return($el_error_es);
	}
}
function BeIenlaP($p_IU=0) {   //--- Busca este Individuo en la Promoción
	$sql_transac = "SELECT * FROM `pnr_datos_personales` WHERE `pnr_datos_personales`.`id_unico`=".$p_IU;
	$link = mysql_connect("localhost",NAME_USER,PASS_USER);
	$db_selected = mysql_select_db(BASE_FORANEA_DE_DATOS,$link);
	$result1 = mysql_query($sql_transac,$link);
	if ($result1 && mysql_num_rows($result1) == 1) {
		$rows = mysql_fetch_array($result1, MYSQL_ASSOC);
		mysql_free_result($result1);
		mysql_close($link);
		return($rows);
	}
}
function AlatdeP($p_ID=0,$p_Area='Internet') {   //--- Arma la tabla de esta Promoción
	$sql_transac = "SELECT * FROM `pnr_datos_personales` WHERE `pnr_datos_personales`.`id_promocion`=".$p_ID;
	$link = mysql_connect("localhost",NAME_USER,PASS_USER);
	$db_selected = mysql_select_db(BASE_FORANEA_DE_DATOS,$link);
	$result1 = mysql_query($sql_transac,$link);
	if ($result1 && mysql_num_rows($result1) >= 1) {
		echo '<table width="100%" border="0" cellspacing="0" cellpadding="0">';
		echo '<tr class="glow2"><th width="12%" height="25" scope="col" title="C&eacute;dula de Identidad..." align="center">C&eacute;dula</th>';
		echo '<th width="60%" height="25" scope="col" title="Nombre(s)..." align="center">Nombre</th>';
		echo '<th width="8%" height="25" scope="col" title="Promedio..." align="center">Promedio</th>';
		echo '<th width="7%" height="25" scope="col" title="Puesto..." align="center">Puesto</th>';
		echo '<th width="13%" height="25" scope="col" title="Movimientos..." align="center">Movimientos</th></tr>';
		$i = 1;
		while ($rows = mysql_fetch_array($result1, MYSQL_ASSOC)) {
			if ($i % 2) {
				echo '<tr class="Edicion_1">';
			}
			else {
				echo '<tr class="Edicion_2">';
			}
			echo '<td height="20" align="center">'.$rows['cedula'].'</td>';
			echo '<td height="20" align="center">'.$rows['nombre_completo'].'</td>';
			echo '<td height="20" align="center">'.$rows['promedio_individual'].'</td>';
			echo '<td height="20" align="center">'.$rows['posicion'].'</td>';
			echo '<td height="20" align="center">';
			echo (strtolower($p_Area)=='internet')?'<a href="form-transcripcion-de-promedios-individuo-edita.php?IU='.$rows['id_unico'].'&ID='.$p_ID.'&CI='.$rows['cedula'].'" title="Click aqu&iacute; para Editar este registro..." target="_self">':'<a href="form-transcripcion-de-promedios-individuo-edita-2.php?IU='.$rows['id_unico'].'&ID='.$p_ID.'&CI='.$rows['cedula'].'" title="Click aqu&iacute; para Editar este registro..." target="_body">';

			echo (strtolower($p_Area)=='internet')?'<img src="../img/editar.png" width="25" height="26" alt="editar" /></a>&nbsp;':'<img src="../imagenes/editar.png" width="25" height="26" alt="editar" /></a>&nbsp;';

			echo (strtolower($p_Area)=='internet')?'<a href="form-transcripcion-de-promedios-individuo-elimina.php?IU='.$rows['id_unico'].'&ID='.$p_ID.'&CI='.$rows['cedula'].'" title="Click aqu&iacute; para Eliminar este registro..." target="_self">':'<a href="form-transcripcion-de-promedios-individuo-elimina-2.php?IU='.$rows['id_unico'].'&ID='.$p_ID.'&CI='.$rows['cedula'].'" title="Click aqu&iacute; para Eliminar este registro..." target="_body">';

			echo (strtolower($p_Area)=='internet')?'<img src="../img/eliminar.png" width="25" height="26" alt="eliminar" /></a></td></tr>':'<img src="../imagenes/eliminar.png" width="25" height="26" alt="eliminar" /></a></td></tr>';
			$i++;
		}
		echo '<tr class="glow2"><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>';
		echo '<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>';
		echo '</table>';
	}
	mysql_free_result($result1);
	mysql_close($link);
}
function AlatdePsm($p_ID=0) {   //--- Arma la tabla de esta Promoción sin movimientos
	$sql_transac = "SELECT * FROM `pnr_datos_personales` WHERE `pnr_datos_personales`.`id_promocion`=".$p_ID;
	$link = mysql_connect("localhost",NAME_USER,PASS_USER);
	$db_selected = mysql_select_db(BASE_FORANEA_DE_DATOS,$link);
	$result1 = mysql_query($sql_transac,$link);
	if ($result1 && mysql_num_rows($result1) >= 1) {
		echo '<table width="100%" border="0" cellspacing="0" cellpadding="0">';
		echo '<tr class="glow2"><th width="12%" height="25" scope="col" title="C&eacute;dula de Identidad..." align="center">C&eacute;dula</th>';
		echo '<th width="60%" height="25" scope="col" title="Nombre(s)..." align="center">Nombre</th>';
		echo '<th width="8%" height="25" scope="col" title="Promedio..." align="center">Promedio</th>';
		echo '<th width="7%" height="25" scope="col" title="Puesto..." align="center">Puesto</th></tr>';
		$i = 1;
		while ($rows = mysql_fetch_array($result1, MYSQL_ASSOC)) {
			if ($i % 2) {
				echo '<tr class="Edicion_1">';
			}
			else {
				echo '<tr class="Edicion_2">';
			}
			echo '<td height="20" align="center">'.$rows['cedula'].'</td>';
			echo '<td height="20" align="center">'.$rows['nombre_completo'].'</td>';
			echo '<td height="20" align="center">'.$rows['promedio_individual'].'</td>';
			echo '<td height="20" align="center">'.$rows['posicion'].'</td></tr>';
			$i++;
		}
		echo '<tr class="glow2"><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>';
		echo '<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>';
		echo '</table>';
	}
	mysql_free_result($result1);
	mysql_close($link);
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