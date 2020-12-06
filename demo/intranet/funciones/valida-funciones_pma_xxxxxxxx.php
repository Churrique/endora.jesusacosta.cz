<?php
//--------------------------------------------------------------------------------------------------------------------
//
//   F U N C I O N E S   C O N   P M A _ C O L E G I O S _ C O D I F I C A D O S
//
//--------------------------------------------------------------------------------------------------------------------
function ConColCod ($p_cod_col_cod='') {   //Consulta del Colegio Codificado
	$sql_transac = "SELECT * FROM `pma_colegios_codificados` WHERE `codigo_colegio`='".$p_cod_col_cod."'";
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
		return(false);
	}
}
function IelCol($p_cod_col='',$p_otro_cod='',$p_edo_col='',$p_nom_col='',$p_matri_col=0,$p_email_col='') {   //Inserta el Colegio
	$p_hay_error = '<br />';
	$sql_transac = "INSERT INTO  `pma_colegios_codificados`(`codigo_colegio`,`codigo_colegio_otro_1`,`estado_colegio`,`nombre_colegio`,`matricula_colegio`,`correo_colegio`,`fecha_registro_colegio`) VALUES ('".$p_cod_col."','".$p_otro_cod."','".$p_edo_col."','".utf8_encode($p_nom_col)."',".$p_matri_col.",'".$p_email_col."','".date('Y-m-d H:i:s')."')";
	$link = mysql_connect("localhost",NAME_USER,PASS_USER);
	$db_selected = mysql_select_db(BASE_DE_DATOS,$link);
	mysql_query("SET AUTOCOMMIT=0;",$link);
	mysql_query("START TRANSACTION",$link);
	mysql_query($sql_transac,$link);
	$afectado = mysql_affected_rows($link);
	mysql_query("COMMIT",$link);
	if ( $afectado == -1 ) {
		$p_hay_error .= '*****************<br />';
		$p_hay_error .= 'Afectado = ['.$afectado.']<br />';
		$p_hay_error .= '*****************<br />';
		$p_hay_error .= 'Error nº: '.mysql_errno($link).'<br />';
		$p_hay_error .= 'Mensaje: '.mysql_error($link).'<br />';
		$p_hay_error .= 'Instrucci&oacute;n(es) SQL :<br />';
		$p_hay_error .= $sql_transac.'<br />';
		mysql_close($link);
		return($p_hay_error);
	}
	else {
		mysql_close($link);
		return('INCLUSI&Oacute;N EN TABLA &laquo;verificado&raquo; &radic;');
	}
}
function MelC($p_cc='',$p_oc='',$p_ed='',$p_no='',$p_ma=0,$p_em='',$p_tn='No') {   // Modifica el Colegio
	$p_hay_error = '<br />';
	$sql_transac = "UPDATE `pma_colegios_codificados` SET `codigo_colegio_otro_1`='".$p_oc."',`estado_colegio`='".$p_ed."',`nombre_colegio`='".$p_no."',`matricula_colegio`=".$p_ma.",`correo_colegio`='".$p_em."',`tiene_nomina_opcion`='".$p_tn."' WHERE `codigo_colegio`='".$p_cc."'";
	$link = mysql_connect("localhost",NAME_USER,PASS_USER);
	$db_selected = mysql_select_db(BASE_DE_DATOS,$link);
	mysql_query("SET AUTOCOMMIT=0;",$link);
	mysql_query("START TRANSACTION",$link);
	mysql_query($sql_transac,$link);
	$afectado = mysql_affected_rows($link);
	mysql_query("COMMIT",$link);
	if ( $afectado == -1 ) {
		$p_hay_error .= '*****************<br />';
		$p_hay_error .= 'Afectado = ['.$afectado.']<br />';
		$p_hay_error .= '*****************<br />';
		$p_hay_error .= 'Error nº: '.mysql_errno($link).'<br />';
		$p_hay_error .= 'Mensaje: '.mysql_error($link).'<br />';
		$p_hay_error .= 'Instrucci&oacute;n(es) SQL :<br />';
		$p_hay_error .= $sql_transac.'<br />';
		mysql_close($link);
		return($p_hay_error);
	}
	else {
		mysql_close($link);
		return('MODIFICACI&Oacute;N EN TABLA &laquo;verificado&raquo; &radic;');
	}
}
function ElielCo($p_cc='') {   //Eliminame el Colegio
	$p_hay_error = '<br />';
	$sql_transac = "DELETE FROM `pma_colegios_codificados` WHERE `codigo_colegio`='".$p_cc."'";
	$link = mysql_connect("localhost",NAME_USER,PASS_USER);
	$db_selected = mysql_select_db(BASE_DE_DATOS,$link);
	mysql_query("SET AUTOCOMMIT=0;",$link);
	mysql_query("START TRANSACTION",$link);
	mysql_query($sql_transac,$link);
	$afectado = mysql_affected_rows($link);
	mysql_query("COMMIT",$link);
	if ( $afectado == -1 ) {
		$p_hay_error .= '*****************<br />';
		$p_hay_error .= 'Afectado = ['.$afectado.']<br />';
		$p_hay_error .= '*****************<br />';
		$p_hay_error .= 'Error nº: '.mysql_errno($link).'<br />';
		$p_hay_error .= 'Mensaje: '.mysql_error($link).'<br />';
		$p_hay_error .= 'Instrucci&oacute;n(es) SQL :<br />';
		$p_hay_error .= $sql_transac.'<br />';
		mysql_close($link);
		return($p_hay_error);
	}
	else {
		mysql_close($link);
		return('ELIMINACI&Oacute;N EN TABLA &laquo;verificado&raquo; &radic;');
	}
}
function MlaTabTlosR() {   //Muestra la Tabla Todos los Registros
	$sql_transac = "SELECT * FROM `pma_colegios_codificados`";
	$link = mysql_connect("localhost",NAME_USER,PASS_USER);
	$db_selected = mysql_select_db(BASE_DE_DATOS,$link);
	$result1 = mysql_query($sql_transac,$link);
	if ($result1 && mysql_num_rows($result1) > 0) {
		echo '<table width="80%" border="0" cellspacing="0" cellpadding="0">';
		echo '<tr>';
		echo '<td height="30" class="glow2">COLEGIO</td>';
		echo '<td height="30" class="glow2">ESTADO</td>';
		echo '<td height="30" class="glow2">C&Oacute;D. ASIG.</td>';
		echo '<td height="30" class="glow2">OPCIONES</td>';
		echo '<td height="30" class="glow2" title="Indique si desea &laquo;Eliminar&raquo; &oacute; &laquo;Modificar&raquo;...">ACCI&Oacute;N</td>';
		echo '</tr>';
		$i = 1;
		while ($rows = mysql_fetch_array($result1, MYSQL_ASSOC)) {
			if ($i % 2) {
				echo '<tr class="glow"><td height="30">'.$rows['nombre_colegio'].'</td>';
				echo '<td height="30">'.$rows['estado_colegio'].'</td>';
				echo '<td height="30">'.$rows['codigo_colegio'].'</td>';
				if ( $rows['tiene_nomina_opcion'] == 'Si' ) {
					echo '<td height="30">';
					echo '<a href="form-administrar-pma-colegios-ver-opciones.php?ID='.$rows['codigo_colegio'].'" title="Hay Opciones... Pulse aqui para ver..." target="_parent" class="txt_link_glow">&nbsp;&nbsp;&laquo;&nbsp;Ver Opciones&nbsp;&raquo;&nbsp;&nbsp;</a></td>';
				}
				else {
					echo '<td height="30" title="No hay Opciones que mostrar...">'.$rows['tiene_nomina_opcion'].'</td>';
				}
				echo '<td height="30"><br />';
				echo '<a href="form-administrar-pma-colegios-elimina.php?ID='.$rows['codigo_colegio'].'" title="Pulse aqui para Eliminar este Colegio..." target="_parent" class="txt_link_glow">&nbsp;&nbsp;&laquo;&nbsp;Eliminar&nbsp;&raquo;&nbsp;&nbsp;</a>';
				echo '<br /><br />';
				echo '<a href="form-administrar-pma-colegios-modifica.php?ID='.$rows['codigo_colegio'].'" title="Pulse aqui para Modificar este Colegio..." target="_parent" class="txt_link_glow">&nbsp;&nbsp;&laquo;&nbsp;Modificar&nbsp;&raquo;&nbsp;&nbsp;</a><br /><br /></td>';
				echo '</tr>';
			}
			else {
				echo '<tr class="glowA"><td height="30">'.$rows['nombre_colegio'].'</td>';
				echo '<td height="30">'.$rows['estado_colegio'].'</td>';
				echo '<td height="30">'.$rows['codigo_colegio'].'</td>';
				if ( $rows['tiene_nomina_opcion'] == 'Si' ) {
					echo '<td height="30">';
					echo '<a href="form-administrar-pma-colegios-ver-opciones.php?ID='.$rows['codigo_colegio'].'" title="Hay Opciones... Pulse aqui para ver..." target="_parent" class="txt_link_glow">&nbsp;&nbsp;&laquo;&nbsp;Ver Opciones&nbsp;&raquo;&nbsp;&nbsp;</a></td>';
				}
				else {
					echo '<td height="30" title="No hay Opciones que mostrar...">'.$rows['tiene_nomina_opcion'].'</td>';
				}
				echo '<td height="30"><br />';
				echo '<a href="form-administrar-pma-colegios-elimina.php?ID='.$rows['codigo_colegio'].'" title="Pulse aqui para Eliminar este Colegio..." target="_parent" class="txt_link_glow">&nbsp;&nbsp;&laquo;&nbsp;Eliminar&nbsp;&raquo;&nbsp;&nbsp;</a>';
				echo '<br /><br />';
				echo '<a href="form-administrar-pma-colegios-modifica.php?ID='.$rows['codigo_colegio'].'" title="Pulse aqui para Modificar este Colegio..." target="_parent" class="txt_link_glow">&nbsp;&nbsp;&laquo;&nbsp;Modificar&nbsp;&raquo;&nbsp;&nbsp;</a><br /><br /></td>';
				echo '</tr>';
			}
			$i++;
		}
		echo '</table>';
		mysql_free_result($result1);
		mysql_close($link);
		return;
	}
}
//--------------------------------------------------------------------------------------------------------------------
//
//   F U N C I O N E S   C O N   P M A _ C O L E G I O S _ N O M I N A _ O P C I O N E S
//
//--------------------------------------------------------------------------------------------------------------------
function MlNdeCysO( $p_codigo_colegio='') {   //Muestra la Nómina de ese Colegio y sus Opciones
	$sql_transac = "SELECT * FROM `pma_colegios_nomina_opciones` WHERE `codigo_colegio`='".$p_codigo_colegio."'";;
	$link = mysql_connect("localhost",NAME_USER,PASS_USER);
	$db_selected = mysql_select_db(BASE_DE_DATOS,$link);
	$result1 = mysql_query($sql_transac,$link);
	if ($result1 && mysql_num_rows($result1) > 0) {
		echo '<table width="97%" border="0" cellspacing="0" cellpadding="0">';
		echo '<tr>';
		echo '<td height="30" class="glow2">C&Eacute;DULA</td>';
		echo '<td height="30" class="glow2">NOMBRE(S)</td>';
		echo '<td height="30" class="glow2">APELLIDO(S)</td>';
		echo '<td height="30" class="glow2" title="Promedio de Notas...">PN</td>';
		echo '<td height="30" class="glow2" title="Opci&oacute;n 1...">Op. 1</td>';
		echo '<td height="30" class="glow2" title="Opci&oacute;n 2...">Op. 2</td>';
		echo '<td height="30" class="glow2" title="Opci&oacute;n 3...">Op. 3</td>';
		echo '<td height="30" class="glow2" title="Posee Notas transcritas...">NOTAS</td>';
		echo '<td height="30" class="glow2" title="Indique si desea &laquo;Eliminar&raquo; &oacute; &laquo;Modificar&raquo;...">ACCI&Oacute;N</td>';
		echo '</tr>';
		$i = 1;
		while ($rows = mysql_fetch_array($result1, MYSQL_ASSOC)) {
			if ($i % 2) {
				echo '<tr class="glow"><td height="30">'.$rows['ci_alum'].'</td>';
				echo '<td height="30">'.$rows['nombre_alum'].'</td>';
				echo '<td height="30">'.$rows['apellido_alum'].'</td>';
				echo '<td height="30">'.$rows['promedio_alum'].'</td>';
				echo '<td height="30">'.$rows['opcion1_alum'].'</td>';
				echo '<td height="30">'.$rows['opcion2_alum'].'</td>';
				echo '<td height="30">'.$rows['opcion3_alum'].'</td>';
				if ( $rows['tiene_nomina_nota'] == 'Si' ) {
					echo '<td height="30">';
					echo '<a href="form-administrar-pma-colegios-ver-notas.php?ID='.$p_codigo_colegio.'&CI='.$rows['ci_alum'].'" title="Hay Notas que mostrar... Pulse aqui para ver..." target="_parent"><img src="../img/con_nota.png" width="25" height="25" alt="Con_Notas" title="Pulse sobre la im&aacute;gen para ver las Notas..." /></a></td>';
				}
				else {
					echo '<td height="30" title="No hay Notas que mostrar..."><img src="../img/sin_nota.png" width="25" height="25" alt="Sin_Notas" /></td>';
				}
				echo '<td height="30">';
				echo '<a href="form-administrar-pma-colegios-ver-opciones-elimina.php?ID='.$p_codigo_colegio.'&CI='.$rows['ci_alum'].'" target="_parent" title="Pulse aqui para Eliminar..."><img src="../img/eliminar.png" width="25" height="25" alt="Eliminar" title="Pulse sobre la im&aacute;gen para Eliminar..." /></a>';
				echo '<a href="form-administrar-pma-colegios-ver-opciones-modifica.php?ID='.$p_codigo_colegio.'&CI='.$rows['ci_alum'].'" target="_parent" title="Pulse aqui para Editar..."><img src="../img/editar.png" width="25" height="25" alt="Editar" title="Pulse sobre la im&aacute;gen para Editar..." /></a>';
				echo '</td></tr>';
			}
			else {
				echo '<tr class="glowA"><td height="30">'.$rows['ci_alum'].'</td>';
				echo '<td height="30">'.$rows['nombre_alum'].'</td>';
				echo '<td height="30">'.$rows['apellido_alum'].'</td>';
				echo '<td height="30">'.$rows['promedio_alum'].'</td>';
				echo '<td height="30">'.$rows['opcion1_alum'].'</td>';
				echo '<td height="30">'.$rows['opcion2_alum'].'</td>';
				echo '<td height="30">'.$rows['opcion3_alum'].'</td>';
				if ( $rows['tiene_nomina_nota'] == 'Si' ) {
					echo '<td height="30">';
					echo '<a href="form-administrar-pma-colegios-ver-notas.php?ID='.$p_codigo_colegio.'&CI='.$rows['ci_alum'].'" title="Hay Notas que mostrar... Pulse aqui para ver..." target="_parent" class="txt_link_glow">&nbsp;&nbsp;&laquo;&nbsp;Ver Notas&nbsp;&raquo;&nbsp;&nbsp;</a></td>';
				}
				else {
					echo '<td height="30" title="No hay Notas que mostrar...">'.$rows['tiene_nomina_nota'].'</td>';
				}
				echo '<td height="30">';
				echo '<a href="form-administrar-pma-colegios-ver-opciones-elimina.php?ID='.$p_codigo_colegio.'&CI='.$rows['ci_alum'].'" target="_parent" title="Pulse aqui para Eliminar..."><img src="../img/eliminar.png" width="25" height="25" alt="Eliminar" title="Pulse sobre la im&aacute;gen para Eliminar..." /></a>';
				echo '<a href="form-administrar-pma-colegios-ver-opciones-modifica.php?ID='.$p_codigo_colegio.'&CI='.$rows['ci_alum'].'" target="_parent" title="Pulse aqui para Editar..."><img src="../img/editar.png" width="25" height="25" alt="Editar" title="Pulse sobre la im&aacute;gen para Editar..." /></a>';
				echo '</td></tr>';
			}
			$i++;
		}
		echo '</table>';
		mysql_free_result($result1);
		mysql_close($link);
		return;
	}
}
function DlosVdeO($par_codigo_colegio = '',$par_cedula = 0) {   //Dame los Valores de Opciones
	$sql_transac = "SELECT * FROM `pma_colegios_nomina_opciones` WHERE `codigo_colegio`='".$par_codigo_colegio."' AND `ci_alum`=".$par_cedula;
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
function AlasO($p_ci=0,$p_no='',$p_ap='',$p_pn=0,$p_o1='',$p_o2='',$p_o3='',$p_em='',$p_tn='No') {   //Actualiza las Opciones
	$p_hay_error = '<br />';
	$sql_transac = "UPDATE `pma_colegios_nomina_opciones` SET `ci_alum`=".$p_ci.",`nombre_alum`='".$p_no."',`apellido_alum`='".$p_ap."',`promedio_alum`=".$p_pn.",`opcion1_alum`='".$p_o1."',`opcion2_alum`='".$p_o2."',`opcion3_alum`='".$p_o3."',`correo_alum`='".$p_em."',`tiene_nomina_nota`='".$p_tn."' WHERE `ci_alum`=".$p_ci;
	$link = mysql_connect("localhost",NAME_USER,PASS_USER);
	$db_selected = mysql_select_db(BASE_DE_DATOS,$link);
	mysql_query("SET AUTOCOMMIT=0;",$link);
	mysql_query("START TRANSACTION",$link);
	mysql_query($sql_transac,$link);
	$afectado = mysql_affected_rows($link);
	mysql_query("COMMIT",$link);
	if ( $afectado == -1 ) {
		$p_hay_error .= '*****************<br />';
		$p_hay_error .= 'Afectado = ['.$afectado.']<br />';
		$p_hay_error .= '*****************<br />';
		$p_hay_error .= 'Error nº: '.mysql_errno($link).'<br />';
		$p_hay_error .= 'Mensaje: '.mysql_error($link).'<br />';
		$p_hay_error .= 'Instrucci&oacute;n(es) SQL :<br />';
		$p_hay_error .= $sql_transac.'<br />';
		mysql_close($link);
		return($p_hay_error);
	}
	else {
		mysql_close($link);
		return('INCLUSI&Oacute;N EN TABLA &laquo;verificado&raquo; &radic;');
	}
}
function ElasO($p_ced=0) {   //Elimina las Opciones
	$p_hay_error = '<br />';
	$sql_transac = "DELETE FROM `pma_colegios_nomina_opciones` WHERE `ci_alum`=".$p_ced;
	$link = mysql_connect("localhost",NAME_USER,PASS_USER);
	$db_selected = mysql_select_db(BASE_DE_DATOS,$link);
	mysql_query("SET AUTOCOMMIT=0;",$link);
	mysql_query("START TRANSACTION",$link);
	mysql_query($sql_transac,$link);
	$afectado = mysql_affected_rows($link);
	mysql_query("COMMIT",$link);
	if ( $afectado == -1 ) {
		$p_hay_error .= '*****************<br />';
		$p_hay_error .= 'Afectado = ['.$afectado.']<br />';
		$p_hay_error .= '*****************<br />';
		$p_hay_error .= 'Error nº: '.mysql_errno($link).'<br />';
		$p_hay_error .= 'Mensaje: '.mysql_error($link).'<br />';
		$p_hay_error .= 'Instrucci&oacute;n(es) SQL :<br />';
		$p_hay_error .= $sql_transac.'<br />';
		mysql_close($link);
		return($p_hay_error);
	}
	else {
		mysql_close($link);
		return('ELIMINACI&Oacute;N EN TABLA &laquo;verificado&raquo; &radic;');
	}
}
//--------------------------------------------------------------------------------------------------------------------
//
//   F U N C I O N E S   C O N   P M A _ C O L E G I O S _ N O M I N A _ N O T A S
//
//--------------------------------------------------------------------------------------------------------------------
function CondNotas($par_ci =0) {
	$sql_transac = "SELECT `ci_alum`,`nivel_mat`,`nota_mat`,`nombre_mat` FROM `pma_colegios_nomina_notas` WHERE `ci_alum`=".$par_ci." ORDER BY 2,4";
	$link = mysql_connect("localhost",NAME_USER,PASS_USER);
	$db_selected = mysql_select_db(BASE_DE_DATOS,$link);
	$result1 = mysql_query($sql_transac,$link);
	if ($result1 && mysql_num_rows($result1) >= 1) {
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
function DlasNdeEA($p_cedula=0) {
	$sql_transac = "SELECT `ci_alum`,`nivel_mat`,`nota_mat`,`nombre_mat` FROM `pma_colegios_nomina_notas` WHERE `ci_alum`=".$p_cedula." ORDER BY 2,4";
	$link = mysql_connect("localhost",NAME_USER,PASS_USER);
	$db_selected = mysql_select_db(BASE_DE_DATOS,$link);
	$result1 = mysql_query($sql_transac,$link);
	if ($result1 && mysql_num_rows($result1) > 0) {
		echo '<table width="90%" border="0" cellspacing="0" cellpadding="0">';
		echo '<tr>';
		echo '<td height="20" width="5%" class="glow2">NIVEL</td>';
		echo '<td height="20" width="70%" class="glow2">MATERIA</td>';
		echo '<td height="20" width="5%" class="glow2">NOTA</td>';
		echo '<td height="20" width="20%" class="glow2" title="Indique si desea &laquo;Eliminar&raquo; &oacute; &laquo;Modificar&raquo;...">ACCI&Oacute;N</td>';
		echo '</tr>';
		$i = 1;
		$nivel = 0;
		while ($rows = mysql_fetch_array($result1, MYSQL_ASSOC)) {
			if ( $i == 1 ) $nivel = $rows['nivel_mat'];
			if ( $nivel != $rows['nivel_mat'] ) {
				$nivel = $rows['nivel_mat'];
				echo '<tr class="gentitle"><td height="5" colspan="4"></td></tr>';
			}
			if ($i % 2) {
				echo '<tr class="glow">';
				echo '<td height="20">'.$rows['nivel_mat'].'</td>';
				echo '<td height="20">'.$rows['nombre_mat'].'</td>';
				echo '<td height="20">'.$rows['nota_mat'].'</td>';
				echo '<td height="20"><br />';
				echo '<a href="form-administrar-pma-colegios-ver-notas-elimina.php?CI='.$rows['ci_alum'].'" target="_parent" class="txt_link_glow">&nbsp;&nbsp;&laquo;&nbsp;Eliminar&nbsp;&raquo;&nbsp;&nbsp;</a>';
				echo '<br /><br />';
				echo '<a href="form-administrar-pma-colegios-ver-notas-modifica.php?CI='.$rows['ci_alum'].'" target="_parent" class="txt_link_glow">&nbsp;&nbsp;&laquo;&nbsp;Modificar&nbsp;&raquo;&nbsp;&nbsp;</a><br /><br /></td>';
				echo '</tr>';
			}
			else {
				echo '<tr class="glowA">';
				echo '<td height="20">'.$rows['nivel_mat'].'</td>';
				echo '<td height="20">'.$rows['nombre_mat'].'</td>';
				echo '<td height="20">'.$rows['nota_mat'].'</td>';
				echo '<td height="20"><br />';
				echo '<a href="form-administrar-pma-colegios-ver-notas-elimina.php?CI='.$rows['ci_alum'].'" target="_parent" class="txt_link_glow">&nbsp;&nbsp;&laquo;&nbsp;Eliminar&nbsp;&raquo;&nbsp;&nbsp;</a>';
				echo '<br /><br />';
				echo '<a href="form-administrar-pma-colegios-ver-notas-modifica.php?CI='.$rows['ci_alum'].'" target="_parent" class="txt_link_glow">&nbsp;&nbsp;&laquo;&nbsp;Modificar&nbsp;&raquo;&nbsp;&nbsp;</a><br /><br /></td>';
				echo '</tr>';
			}
			$i++;
		}
		echo '</table>';
		mysql_free_result($result1);
		mysql_close($link);
		return;
	}
}
?>