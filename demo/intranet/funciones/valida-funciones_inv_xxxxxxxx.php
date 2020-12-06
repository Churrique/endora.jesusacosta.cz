<?php
//--------------------------------------------------------------------------------------------------------------------
//
//   F U N C I O N E S   C O N   I N V _ X X X X X X X   ( I N V E N T A R I O )
//
//--------------------------------------------------------------------------------------------------------------------
function ModEstInv($inv_id=0,$inv_numero='',$inv_serial='',$inv_modelo='',$inv_observacion='',$inv_marca=0,$inv_descripcion=0,$inv_condicion=0,$inv_unidad=0,$inv_usuario=0) {   //--- Modifica Este Inventario
	$sql_transac = "UPDATE `inv_piezas` SET `inv_numero`='".$inv_numero."',`inv_serial`='".$inv_serial."',`inv_modelo`='".$inv_modelo."',`inv_observacion`='".$inv_observacion."',`id_inv_descripcion`=".$inv_descripcion.",`id_inv_condicion`=".$inv_condicion.",`id_inv_marca`=".$inv_marca.",`id_unidad`=".$inv_unidad.",`idusuarios`=".$inv_usuario." WHERE `inv_piezas`.`id_inv_piezas` =".$inv_id;
	$link = mysql_connect("localhost",NAME_USER,PASS_USER);
	$db_selected = mysql_select_db(BASE_FORANEA_DE_DATOS,$link);
	mysql_query("SET AUTOCOMMIT=0;",$link);
	mysql_query("START TRANSACTION",$link);
	mysql_query($sql_transac,$link);
	$afectado = mysql_affected_rows($link);
	mysql_query("COMMIT",$link);
	mysql_close($link);
	return($afectado);
}
function BusEsteInv($inv_id=0) {   //--- Busca Este Inventario
	$sql_transac = "SELECT * FROM `inv_piezas` WHERE `id_inv_piezas` =".$inv_id;
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
function InserPieza($inv_uc='',$inv_serial='',$inv_modelo='',$inv_id_des=0,$inv_id_con=0,$inv_id_mar=0,$inv_obs='',$inv_id_dpto=0,$inv_id_usua=0) {   //--- Inserta Pieza
	$sql_transac = "INSERT INTO `inv_piezas` (`id_inv_piezas`,`inv_numero`,`inv_serial`,`inv_modelo`,`id_inv_descripcion`,`id_inv_condicion`,`id_inv_marca`,`inv_observacion`,`id_unidad`,`idusuarios`) VALUES (NULL,'".$inv_uc."','".$inv_serial."','".$inv_modelo."',".$inv_id_des.",".$inv_id_con.",".$inv_id_mar.",'".$inv_obs."',".$inv_id_dpto.",".$inv_id_usua.")";
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
function EliInv($inv_id=0) {   //--- Elimina Inventario
	$sql_transac = "DELETE FROM `inv_piezas` WHERE `inv_piezas`.`id_inv_piezas` = ".$inv_id;
	$link = mysql_connect("localhost",NAME_USER,PASS_USER);
	$db_selected = mysql_select_db(BASE_DE_DATOS,$link);
	mysql_query($sql_transac,$link);
	mysql_close($link);
	return(true);
}
function MueVisGen($p_Area='Internet') {   //--- Muestra Vista General
	$sql_transac = "SELECT * FROM `_vista_inventario_con_asociacion_con_rotulos_personalizados`";
	$link = mysql_connect("localhost",NAME_USER,PASS_USER);
	$db_selected = mysql_select_db(BASE_FORANEA_DE_DATOS,$link);
	$result1 = mysql_query($sql_transac,$link);
	if ($result1 && mysql_num_rows($result1) >= 1) {
		echo '<table width="100%" border="0" cellspacing="0" cellpadding="0" summary="Contenido General del Inventario">';
		echo '<caption  class="gradiente_ocre"><span class="texto_decorado_azul6">Contenido General</span></caption>';
		echo '<tr class="gradiente_ocre_inverso">';
		echo '<th scope="col" class="texto_decorado_azul6B" title="Inventario de la Universidad de Carabobo...">INV</th>';
		echo '<th scope="col" class="texto_decorado_azul6B">SERIAL</th>';
		echo '<th scope="col" class="texto_decorado_azul6B">MODELO</th>';
		echo '<th scope="col" class="texto_decorado_azul6B">DESCRIPCI&Oacute;N</th>';
		echo '<th scope="col" class="texto_decorado_azul6B">CONDICI&Oacute;N</th>';
		echo '<th scope="col" class="texto_decorado_azul6B">MARCA</th>';
		echo '<th scope="col" class="texto_decorado_azul6B">USUARIO</th>';
		echo '<th scope="col" class="texto_decorado_azul6B">UNIDAD</th>';
		echo '<th scope="col" class="texto_decorado_azul6B" title="Editar &oacute; Eliminar...">&nbsp;</th>';
		echo '</tr>';
		$i = 1;
		while ($rows = mysql_fetch_array($result1, MYSQL_ASSOC)) {
			if ($i % 2) {
				echo '<tr class="gradiente_ocre">';
			}
			else {
				echo '<tr class="gradiente_ocre_inverso">';
			}
			$i++;
			echo '<td align="center"><span align="center" class="texto_decorado_azul6B">'.$rows['nro_inv_uc'].'</span></td>';
			echo '<td align="center"><span align="center" class="texto_decorado_azul6B">'.$rows['serial'].'</span></td>';
			echo '<td align="center"><span align="center" class="texto_decorado_azul6B">'.$rows['modelo'].'</span></td>';
			echo '<td align="center"><span align="center" class="texto_decorado_azul6B">'.$rows['descripcion'].'</span></td>';
			echo '<td align="center"><span align="center" class="texto_decorado_azul6B">'.$rows['condicion'].'</span></td>';
			echo '<td align="center"><span align="center" class="texto_decorado_azul6B">'.$rows['marca'].'</span></td>';
			echo '<td align="center"><span align="center" class="texto_decorado_azul6B">'.$rows['nombre'].'</span></td>';
			echo '<td align="center"><span align="center" class="texto_decorado_azul6B">'.$rows['unidad'].'</span></td>';
			echo '<td width="5%">';
			echo (strtolower($p_Area)=='internet')?'<a href="form-inventario-x-pieza-full-modifica.php?ID='.$rows['id'].'" title="Pulse aqu&iacute; para Modificar..." target="_self"><img src="../img/editar.png" width="20" height="20" alt="editar" /></a>':'<a href="form-inventario-x-pieza-full-modifica-2.php?ID='.$rows['id'].'" title="Pulse aqu&iacute; para Modificar..." target="_self"><img src="../imagenes/editar.png" width="20" height="20" alt="editar" /></a>&nbsp;';
			echo (strtolower($p_Area)=='internet')?'<a href="form-inventario-x-pieza-full-elimina.php?ID='.$rows['id'].'" title="Pulse aqu&iacute; para Eliminar..." target="_self"><img src="../img/eliminar.png" width="20" height="20" alt="eliminar" /></a>':'<a href="form-inventario-x-pieza-full-elimina-2.php?ID='.$rows['id'].'" title="Pulse aqu&iacute; para Eliminar..." target="_self"><img src="../imagenes/eliminar.png" width="20" height="20" alt="eliminar" /></a>';
			echo '</td></tr>';
		}
		echo '</table>';
		$rows = mysql_fetch_array($result1, MYSQL_ASSOC);
		mysql_free_result($result1);
		mysql_close($link);
		return;
	}
}
function armselDescripcio() {   //--- arma select Descripción
	$sql_transac = "SELECT * FROM `inv_descripcion`";
	$link = mysql_connect("localhost",NAME_USER,PASS_USER);
	$db_selected = mysql_select_db(BASE_FORANEA_DE_DATOS,$link);
	$result1 = mysql_query($sql_transac,$link);
	if ($result1 && mysql_num_rows($result1) >= 1) {
		echo '<select name="lstDes" class="cuadro_textbox_5B">';
		while ($rows = mysql_fetch_array($result1, MYSQL_ASSOC)) {
			echo '<option value="'.$rows['id_inv_descripcion'].'">'.$rows['inv_descripcion'].'</option>';
		}
		echo '</select>';
		mysql_free_result($result1);
		mysql_close($link);
		return;
	}
}
function V2DarmselDescripcio($inv_descripcion=0) {   //--- Versión Dos De arma select Descripción
	$sql_transac = "SELECT * FROM `inv_descripcion`";
	$link = mysql_connect("localhost",NAME_USER,PASS_USER);
	$db_selected = mysql_select_db(BASE_FORANEA_DE_DATOS,$link);
	$result1 = mysql_query($sql_transac,$link);
	if ($result1 && mysql_num_rows($result1) >= 1) {
		echo '<select name="lstDes" class="cuadro_textbox_5B">';
		while ($rows = mysql_fetch_array($result1, MYSQL_ASSOC)) {
			if ( $inv_descripcion == $rows['id_inv_descripcion'] ) {
				echo '<option selected="selected" value="'.$rows['id_inv_descripcion'].'">'.$rows['inv_descripcion'].'</option>';
			}
			else {
				echo '<option value="'.$rows['id_inv_descripcion'].'">'.$rows['inv_descripcion'].'</option>';
			}
		}
		echo '</select>';
		mysql_free_result($result1);
		mysql_close($link);
		return;
	}
}
function BuDes($ID_Descripcion=NULL) {   //--- Busca Descripción
	$sql_transac = "SELECT * FROM `inv_descripcion` WHERE `inv_descripcion`.`id_inv_descripcion`=".$ID_Descripcion;
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
function armselMarca() {   //--- arma select Marcas
	$sql_transac = "SELECT * FROM `inv_marcas`";
	$link = mysql_connect("localhost",NAME_USER,PASS_USER);
	$db_selected = mysql_select_db(BASE_FORANEA_DE_DATOS,$link);
	$result1 = mysql_query($sql_transac,$link);
	if ($result1 && mysql_num_rows($result1) >= 1) {
		echo '<select name="lstMar" class="cuadro_textbox_5B">';
		while ($rows = mysql_fetch_array($result1, MYSQL_ASSOC)) {
			echo '<option value="'.$rows['id_inv_marca'].'">'.$rows['inv_marca'].'</option>';
		}
		echo '</select>';
		mysql_free_result($result1);
		mysql_close($link);
		return;
	}
}
function V2DarmselMarca($inv_marca=0) {   //--- Versión Dos De arma select Marcas
	$sql_transac = "SELECT * FROM `inv_marcas`";
	$link = mysql_connect("localhost",NAME_USER,PASS_USER);
	$db_selected = mysql_select_db(BASE_FORANEA_DE_DATOS,$link);
	$result1 = mysql_query($sql_transac,$link);
	if ($result1 && mysql_num_rows($result1) >= 1) {
		echo '<select name="lstMar" class="cuadro_textbox_5B">';
		while ($rows = mysql_fetch_array($result1, MYSQL_ASSOC)) {
			if ( $inv_marca == $rows['id_inv_marca'] ) {
				echo '<option selected="selected" value="'.$rows['id_inv_marca'].'">'.$rows['inv_marca'].'</option>';
			}
			else {
				echo '<option value="'.$rows['id_inv_marca'].'">'.$rows['inv_marca'].'</option>';
			}
		}
		echo '</select>';
		mysql_free_result($result1);
		mysql_close($link);
		return;
	}
}
function BuMar($ID_Marca=NULL) {   //--- Busca Marcas
	$sql_transac = "SELECT * FROM `inv_marcas` WHERE `inv_marcas`.`id_inv_marca`=".$ID_Marca;
	$link = mysql_connect("localhost",NAME_USER,PASS_USER);
	$db_selected = mysql_select_db(BASE_FORANEA_DE_DATOS,$link);
	$result1 = mysql_query($sql_transac,$link);
	if ($result1 && mysql_num_rows($result1) == 1) {
		$rows = mysql_fetch_array($result1, MYSQL_ASSOC);
		mysql_free_result($result1);
		mysql_close($link);
		return($rows);
	}
	else {
		return('Filas no igual a uno (1)');
	}
}
function armselCondicion() {   //--- arma select Condición
	$sql_transac = "SELECT * FROM `inv_condicion`";
	$link = mysql_connect("localhost",NAME_USER,PASS_USER);
	$db_selected = mysql_select_db(BASE_FORANEA_DE_DATOS,$link);
	$result1 = mysql_query($sql_transac,$link);
	if ($result1 && mysql_num_rows($result1) >= 1) {
		echo '<select name="lstCon" class="cuadro_textbox_5B">';
		while ($rows = mysql_fetch_array($result1, MYSQL_ASSOC)) {
			echo '<option value="'.$rows['id_inv_condicion'].'">'.$rows['inv_condicion'].'</option>';
		}
		echo '</select>';
		mysql_free_result($result1);
		mysql_close($link);
		return;
	}
}
function V2DarmselCondicion($inv_condicion=0) {   //--- Versión Dos De arma select Condición
	$sql_transac = "SELECT * FROM `inv_condicion`";
	$link = mysql_connect("localhost",NAME_USER,PASS_USER);
	$db_selected = mysql_select_db(BASE_FORANEA_DE_DATOS,$link);
	$result1 = mysql_query($sql_transac,$link);
	if ($result1 && mysql_num_rows($result1) >= 1) {
		echo '<select name="lstCon" class="cuadro_textbox_5B">';
		while ($rows = mysql_fetch_array($result1, MYSQL_ASSOC)) {
			if ( $inv_condicion == $rows['id_inv_condicion'] ) {
				echo '<option selected="selected" value="'.$rows['id_inv_condicion'].'">'.$rows['inv_condicion'].'</option>';
			}
			else {
				echo '<option value="'.$rows['id_inv_condicion'].'">'.$rows['inv_condicion'].'</option>';
			}
		}
		echo '</select>';
		mysql_free_result($result1);
		mysql_close($link);
		return;
	}
}
function BuCond($ID_Condicion=NULL) {   //--- Busca Condición
	$sql_transac = "SELECT * FROM `inv_condicion` WHERE `inv_condicion`.`id_inv_condicion`=".$ID_Condicion;
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
function armselDepto() {   //--- arma select Departamento
	$sql_transac = "SELECT * FROM `unidades`";
	$link = mysql_connect("localhost",NAME_USER,PASS_USER);
	$db_selected = mysql_select_db(BASE_FORANEA_DE_DATOS,$link);
	$result1 = mysql_query($sql_transac,$link);
	if ($result1 && mysql_num_rows($result1) >= 1) {
		echo '<select name="lstDpto" class="cuadro_textbox_5B">';
		while ($rows = mysql_fetch_array($result1, MYSQL_ASSOC)) {
			echo '<option value="'.$rows['id_unidad'].'">'.$rows['detalle'].'</option>';
		}
		echo '</select>';
		mysql_free_result($result1);
		mysql_close($link);
		return;
	}
}
function V2DarmselDepto($inv_departamento=0) {   //--- Versión Dos De arma select Departamento
	$sql_transac = "SELECT * FROM `unidades`";
	$link = mysql_connect("localhost",NAME_USER,PASS_USER);
	$db_selected = mysql_select_db(BASE_FORANEA_DE_DATOS,$link);
	$result1 = mysql_query($sql_transac,$link);
	if ($result1 && mysql_num_rows($result1) >= 1) {
		echo '<select name="lstDpto" class="cuadro_textbox_5B">';
		while ($rows = mysql_fetch_array($result1, MYSQL_ASSOC)) {
			if ( $inv_departamento == $rows['id_unidad'] ) {
				echo '<option selected="selected" value="'.$rows['id_unidad'].'">'.$rows['detalle'].'</option>';
			}
			else {
				echo '<option value="'.$rows['id_unidad'].'">'.$rows['detalle'].'</option>';
			}
		}
		echo '</select>';
		mysql_free_result($result1);
		mysql_close($link);
		return;
	}
}
function BuDept($ID_Departamento=NULL) {   //--- Busca Departamento
	$sql_transac = "SELECT * FROM `unidades` WHERE `unidades`.`id_unidad`=".$ID_Departamento;
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
?>