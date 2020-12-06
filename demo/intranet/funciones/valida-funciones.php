<?php
//
//define('BASE_FORANEA_DE_DATOS','esucdiga_tablas_foraneas');
//define('BASE_DE_DATOS','esucdiga_digaesuc');
//define('NAME_USER','esucdiga_general');
//define('PASS_USER','T3ehX0lgETXH');
//
define('BASE_FORANEA_DE_DATOS','jesusa1585628699');
define('BASE_DE_DATOS','jesusa1585628699');
define('NAME_USER','jesusa1585628699');
define('PASS_USER','KBSfgxlc');
define('FTP_USUARIO','');
define('FTP_CONTRASENA','');
define('FPDF_FONTPATH','../fpdf/font/');
define('OLD_ERROR_HANDLER',set_error_handler("ErrPer"));
define('LLAVE_PUBLICA','6LcxFdcSAAAAAM-I2W-j0R7o1xsCMug7INeLtAAs');
define('LLAVE_PRIVADA','6LcxFdcSAAAAABGaovAhkBJTzTi359QH5FNPCtqu');
//---
error_reporting(E_ALL ^ E_NOTICE);
date_default_timezone_set('America/Caracas');
setlocale(LC_CTYPE,"es_VE");
setlocale(LC_TIME,"es_VE");
//---
// Start - Agregado por Norwis
// funcion que validad si una cedula es valida y me devuelve un array si $a[0]=false hubo un error y $a[1] indica el mensaje de error
function validar_cedula($cedula) {
    $a[0]=true;
    if(trim($cedula)=='')
    {
        $a[0]=false;
        $a[1]="Por favor introduzca una cédula";
    }
    else
    {
        if(is_numeric($cedula)==false)
        {
            $a[0]=false;
            $a[1]="La cédula debe ser un valor numérico";
        }
        else
        {
            if(strlen($cedula)<5 or strlen($cedula)>8)
            {
                $a[0]=false;
                $a[1]="La cédula introducida es incorrecta";
            }
        }
    }
    return $a;
}
//funcion para ejecutar un query especifico
function ejecutar($query,$conexion) {
    $resultado=mysql_query($query,$conexion) or die('Consulta fallida. ' . mysql_error() . '<br />[función ejecutar]:<br />' . $query);
    return $resultado;
}
//funcion que me retorna la fecha actual con horas min y seg en formato aaaa-mm-dd hh-mm-ss
function fecha_actual() {
    $time = time() +9000;
    $fecha = date("Y-m-d H:i:s", $time);
    return($fecha);
}
// End - Agregado por Norwis
function getRealIP() {
	if (!empty($_SERVER['HTTP_CLIENT_IP'])) return($_SERVER['HTTP_CLIENT_IP']);
	if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) return($_SERVER['HTTP_X_FORWARDED_FOR']);
	return($_SERVER['REMOTE_ADDR']);
}
function fecha($convierte = true){
	switch ($convierte) {
		case true:
		  switch (date('w')) {
			  case 0:
				$dia="Domingo";
				break;
			  case 1:
				$dia="Lunes";
				break;
			  case 2:
				$dia="Martes";
				break;
			  case 3:
				$dia="Mi&eacute;rcoles";
				break;
			  case 4:
				$dia="Jueves";
				break;
			  case 5:
				$dia="Viernes";
				break;
			  case 6:
				$dia="S&aacute;bado";
				break;
		  }
		  break;
		case false:
		  switch (date('w')) {
			  case 0:
				$dia="Domingo";
				break;
			  case 1:
				$dia="Lunes";
				break;
			  case 2:
				$dia="Martes";
				break;
			  case 3:
				$dia="Miércoles";
				break;
			  case 4:
				$dia="Jueves";
				break;
			  case 5:
				$dia="Viernes";
				break;
			  case 6:
				$dia="Sábado";
				break;
		  }
		  break;
	}
	switch (date('n')) {
		case 1:
		  $mes="Enero";
		  break;
		case 2:
		  $mes="Febrero";
		  break;
		case 3:
		  $mes="Marzo";
		  break;
		case 4:
		  $mes="Abril";
		  break;
		case 5:
		  $mes="Mayo";
		  break;
		case 6:
		  $mes="Junio";
		  break;
		case 7:
		  $mes="Julio";
		  break;
		case 8:
		  $mes="Agosto";
		  break;
		case 9:
		  $mes="Septiembre";
		  break;
		case 10:
		  $mes="Octubre";
		  break;
		case 11:
		  $mes="Noviembre";
		  break;
		case 12:
		  $mes="Diciembre";
		  break;
	}
	return $dia.", ".date('d')." de ".$mes." de ".date('Y');
}
function numero_aleatorio() {
	$pel_numero = rand(1, 10000000000);
	if (strlen($pel_numero) == 10) {
		$pnuevo_numero = $pel_numero;
	}
	if (strlen($pel_numero) < 10) {
		$pnuevo_numero = str_repeat('0', 10 - strlen($pel_numero)).$pel_numero;
	}
	if (strlen($pel_numero) > 10) {
		$pnuevo_numero = substr($pel_numero, 0, 9);
	}
	return($pnuevo_numero);
}
function texto_aleatorio ($long = 5, $letras_min = true, $letras_max = true, $num = true) {
	$salt = $letras_min?'abchefghijklmnopqrstuvwxyz':'';
	$salt .= $letras_max?'ACDEFGHIJKLMNOPRSTUVWXYZ':'';
	$salt .= $num?(strlen($salt)?'2345679':'0123456789'):'';
	if (strlen($salt) == 0) {
		return('');
	}
	$i = 0;
	$str = '';
	srand((double)microtime()*1000000);
	while ($i < $long) {
		$num = rand(0, strlen($salt)-1);
		$str .= substr($salt, $num, 1);
		$i++;
	}
	return($str);
}
function SacValEnu($pTabla='',$pCampo='',$pNombreDelSelect='',$pClass='') {   //--- Saca Valores Enum
	$sql_transac = "SHOW COLUMNS FROM `".$pTabla."` LIKE '".$pCampo."'";
	$link = mysql_connect("localhost",NAME_USER,PASS_USER);
	$db_selected = mysql_select_db(BASE_DE_DATOS,$link);
	$result = mysql_query($sql_transac,$link);
	$resultado = mysql_fetch_array($result, MYSQL_ASSOC);
	//--- cadena de muestra /([a-z]|[0-9])+@([a-z]|[0-9])+\.[a-z]{2,}/i
	$resultado_final = explode(',' , preg_replace("/(enum|set|\\(|\\)|\\')/i","",$resultado['Type']) );
	echo '<select name="'.$pNombreDelSelect.'" class="'.$pClass.'">';
	foreach ($resultado_final AS $key) echo '<option value="'.$key.'">'.$key.'</option>';
	echo '</select>';
	mysql_close($link);
	return;
}
function ActUnCamp($pTabla='',$pCampo='',$pValor='',$pCampoDBus='',$pValorDBus='') {   // Actualiza Un Campo
	$sql_transac = "UPDATE `".$pTabla."` SET `".$pCampo."`='".$pValor."' WHERE `".$pCampoDBus."`='".$pValorDBus."'";
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
function EdeU($p_usuario='',$p_cuenta='',$p_id='',$p_inicio='') {   // Encabezado de Usuario
	echo '<div align="center" class="tabla_body">';
	echo '<table width="90%" border="0" cellspacing="0" cellpadding="0" class="texto_decorado_azul3">';
	echo '<tr>';
	echo '<td height="35" width="30%" valign="middle" align="left" title="El nombre del Usuario es...">'.$p_usuario.'</td>';
	echo '<td height="35" width="30%" valign="middle" align="center" title="Estatus de la Cuenta - Identificador &Uacute;nico - Hora de Entrada...">'.$p_cuenta.' - '.$p_id.' - '.date('g:i a').'</td>';
	echo '<td height="35" width="30%" valign="middle" align="right" title="El inici&oacute; de la sesi&oacute;n fue el...">'.$p_inicio.'</td>';
	echo '</tr>';
	echo '</table>';
	echo '</div>';
	echo '<br />';
	return(true);
}
// Consulta General De Cualquier Tabla
function ConsulGenDCT($p_DataBase=BASE_DE_DATOS,$p_Tabla='',$p_CampDCond=NULL,$p_ValorDCond=NULL,$p_UsarLIKE=false) {
	if (is_null($p_CampDCond) || is_null($p_ValorDCond)) {
		$sql_transac = "SELECT * FROM `".$p_Tabla."`";
	}
	else {
		if ($p_UsarLIKE) {
			$sql_transac = "SELECT * FROM `".$p_Tabla."` WHERE `".$p_CampDCond."` LIKE '%".$p_ValorDCond."%'";
		}
		else {
			$sql_transac = "SELECT * FROM `".$p_Tabla."` WHERE ".$p_CampDCond."='".$p_ValorDCond."'";
		}
	}
	$link = mysql_connect("localhost",NAME_USER,PASS_USER);
	$db_selected = mysql_select_db($p_DataBase,$link);
	$result1 = mysql_query($sql_transac,$link);
	if ($result1 && mysql_num_rows($result1) >= 1) {
		//$rows = mysql_fetch_array($result1, MYSQL_ASSOC);
		//mysql_free_result($result1);
		mysql_close($link);
		return($result1);
	}
	else {
		mysql_close($link);
		return(false);
	}
}
// Consulta General De Cualquier Tabla versión 2
function CGenDCTv2($p_DataBase=BASE_DE_DATOS,$p_Tabla='',$p_UsarWHERE=false,$p_TextWHERE=NULL,$p_UsarLIKE=false,$p_TextLIKE=NULL) {
	if ( !$p_UsarWHERE && !$p_UsarLIKE ) {
		$sql_transac = "SELECT * FROM `".$p_Tabla."`";
	}
	else {
		if ( $p_UsarLIKE && !$p_UsarWHERE ) {
			$sql_transac = "SELECT * FROM `".$p_Tabla."` LIKE '%".$p_TextLIKE."%'";
		}
		else {
			if ( $p_UsarWHERE && !$p_UsarLIKE ) {
				$sql_transac = "SELECT * FROM `".$p_Tabla."` WHERE ".$p_TextWHERE;
			}
		}
	}
	$link = mysql_connect("localhost",NAME_USER,PASS_USER);
	$db_selected = mysql_select_db($p_DataBase,$link);
	$result1 = mysql_query($sql_transac,$link);
	if ($result1 && mysql_num_rows($result1) >= 1) {
		mysql_close($link);
		return($result1);
	}
	else {
		mysql_close($link);
		return(false);
	}
}
//--------------------------------------------------------------------------------------------------------------------
//
//   F U N C I O N E S   P A R A   E N V I O   D E   C O R R E O S
//
//--------------------------------------------------------------------------------------------------------------------
// cuadro de esquinas redondeadas de color rojo fondo amarillo claro para la nota adiciona
//#cssDisplay {
//  background-color: #FCFFA8;
//  color: #F0371A;
//  border: 4px double #FF0D15;
//  padding: 5px;
//  margin: 5px;
//  font-family: verdana;
//  font-style: normal;
//  font-weight: bold;
//  font-size: 12px;
//  line-height: 15px;
//  text-align: justify;
//  text-decoration: underline;
//  border-radius: 8px;
//}
function eelc_TaqArch($pDe='',$pPara='',$pAsunto='',$pCuerpo='') {   //--- envia el correo Taquilla Archivo
	$header = 'MIME-Version: 1.0' . "\r\n";
	$header .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$header .= "From: DiGAEs <digaesuc@digaesuc.com.ve>"."\r\n";
	$header .= "X-Mailer:PHP/".phpversion()."\r\n";
	$contenido = '<html xmlns="http://www.w3.org/1999/xhtml">
	  <head>
	  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	  <title>.:Correo:.</title>
	  </head>
	  <body style="font-family: Verdana, Geneva, Arial, Helvetica, sans-serif; font-size: 12px; background-color: #EEF2F3; background-image:url(http://www.digaesuc.com.ve/imagenes_para_correos/digae_azul_transparente.png);background-repeat: repeat;">
	  <div align="center">
	  <table width="80%" border="0" cellspacing="0" cellpadding="0">
		<tr>
		  <td height="50" align="center" valign="middle"><table width="90%" border="0" cellpadding="0" cellspacing="0" style="border: 1px solid #CCC; background: #F0F0F0; -moz-border-radius: 10px; border-radius: 10px; border: 0px solid #E1E1E1; background-color: #fdfdfd; border: 0px solid #E1E1E1;">
			<tr>
			  <td width="9%" height="87" align="center" valign="middle"><img src="http://www.digaesuc.com.ve/imagenes_para_correos/Logo_UC_con_sombra.gif" width="60" height="75" alt="logo_uc" /></td>
			  <td width="78%" height="87" align="center" valign="middle"><span style="font-family: Verdana, Geneva, sans-serif; font-size: 12px; font-style: normal; line-height: 14px; font-weight: bold; font-variant: normal; text-transform: none; color: #630; text-decoration: none;">Universidad de Carabobo<br />Secretaría<br />Dirección General de Asuntos Estudiantiles</span></td>
			  <td width="13%" height="87" align="right" valign="middle"><img src="http://www.digaesuc.com.ve/imagenes_para_correos/DiGAEs_Transparente.png" width="100" height="45" alt="logo_digaes" /></td>
			</tr>
		  </table></td>
		</tr>
		<tr>
		  <td height="19">&nbsp;</td>
		</tr>
		<tr>
		  <td height="50" align="center" valign="middle"><table width="80%" border="0" cellspacing="0" cellpadding="0">
			<tr>
			  <td height="30" colspan="3" align="center" valign="middle" style="background-color: #6c96c6; background-repeat: repeat; border: 1px solid #D6D6D6; font-family: Verdana, Geneva, sans-serif; font-size: 14px; font-weight: bold; color: #FFF;"><div style="line-height: 25px; margin: 10px 10px 10px 10px; text-align:justify;">NOTA: Este es una copia del servicio que nos ha solicitado, le sugerimos que mantenga en su buzón esta copia... Le daremos respuesta a la brevedad posible... Gracias y que tenga un Buen Día...!</div></td>
			  </tr>
			<tr>
			  <td height="19" colspan="3">&nbsp;</td>
			  </tr>
			<tr>
			  <td width="22%" height="30" align="right" style="font-family: Tahoma, Geneva, sans-serif; font-size: 18px; font-style: normal; line-height: normal; font-weight: bold; font-variant: normal; text-transform: none; color: #666; text-decoration: none;">De:</td>
			  <td width="1%" height="30">&nbsp;</td>
			  <td width="77%" height="30" style="background: #000; color: #fff; border: 2px solid #777; text-shadow: 1px 1px 6px #fff;">'.$pDe.'</td>
			  </tr>
			<tr>
			  <td width="22%" height="30" align="right" style="font-family: Tahoma, Geneva, sans-serif; font-size: 18px; font-style: normal; line-height: normal; font-weight: bold; font-variant: normal; text-transform: none; color: #666; text-decoration: none;">Para:</td>
			  <td height="30">&nbsp;</td>
			  <td height="30" style="background: #000; color: #fff; border: 2px solid #777; text-shadow: 1px 1px 6px #fff;">'.$pPara.'</td>
			  </tr>
			<tr>
			  <td width="22%" height="30" align="right" style="font-family: Tahoma, Geneva, sans-serif; font-size: 18px; font-style: normal; line-height: normal; font-weight: bold; font-variant: normal; text-transform: none; color: #666; text-decoration: none;">Asunto:</td>
			  <td height="30">&nbsp;</td>
			  <td height="30" style="background: #000; color: #fff; border: 2px solid #777; text-shadow: 1px 1px 6px #fff;">'.$pAsunto.'</td>
			  </tr>
			<tr>
			  <td width="22%" height="30" align="right" style="font-family: Tahoma, Geneva, sans-serif; font-size: 18px; font-style: normal; line-height: normal; font-weight: bold; font-variant: normal; text-transform: none; color: #666; text-decoration: none;">Texto</td>
			  <td height="30">&nbsp;</td>
			  <td height="30"><div style="color: #1B51BF; font-family: verdana; font-style: normal; font-weight: normal; font-size: 14px; font-variant: normal; line-height: 18px; text-align: justify; text-decoration: none; text-shadow: 3px 3px 2px #688EF7; margin: 10px 10px 10px 10px;">'.$pCuerpo.'</div></td>
			  </tr>
			<tr>
			  <td width="22%" height="30" align="right" style="font-family: Tahoma, Geneva, sans-serif; font-size: 18px; font-style: normal; line-height: normal; font-weight: bold; font-variant: normal; text-transform: none; color: #666; text-decoration: none;">Archivo Adjunto</td>
			  <td height="30">&nbsp;</td>
			  <td height="30" style="font: italic bold 10px Verdana, Geneva, sans-serif; color: #00ACBF;">&lt;&lt;click aquí para descargar/ver/abrir&gt;&gt;</td>
			  </tr>
			<tr>
			  <td height="19">&nbsp;</td>
			  <td height="19">&nbsp;</td>
			  <td height="19">&nbsp;</td>
			  </tr>
			<tr>
			  <td height="30" colspan="3" style="border: 1px solid #CCC; background: #F0F0F0; -moz-border-radius: 10px; border-radius: 10px; border: 0px solid #E1E1E1; background-color: #fdfdfd; border: 0px solid #E1E1E1;">
				<table width="100%" border="0" style="color: #06F; border: 1px solid #CED6E3; font: bold 10px Verdana, Geneva, sans-serif; -moz-border-radius: 10px; border-radius: 10px;">
				  <tr>
					<td height="56" align="center">Horarios:<br />
					  Oficina: 8:00 a.m. - 2:15 p.m.<br />
					  Caja: 8:30 a.m. - 1:30 p.m.<br />
					  Taquilla: 8:00 a.m. - 2:00 p.m.
					  </td>
					</tr>
				  </table>
				</td>
			  </tr>
			<tr>
			  <td height="19">&nbsp;</td>
			  <td height="19">&nbsp;</td>
			  <td height="19">&nbsp;</td>
			  </tr>
			</table></td>
		</tr>
		<tr>
		  <td>&nbsp;</td>
		</tr>
	  </table>
	  </div>
	  </body>
	  </html>';
	if (mail($pPara, $pAsunto, $contenido , $header)) {
		$seguimiento = 'Correo enviado...!<br />';
	}
	else {
		$seguimiento = 'Problemas al enviar el correo...!<br />';
	}
	return($seguimiento);
}
//--------------------------------------------------------------------------------------------------------------------
//
//   F U N C I O N E S   P A R A   L O S   D I R E C T O R I O S   R E C U R S I V O S
//
//--------------------------------------------------------------------------------------------------------------------
class MyRecursiveFilterIterator extends RecursiveFilterIterator {
    public static $FILTERS = array(
         '.jpg',
     );
    public function accept() {
         return !in_array(
             $this->current()->getFilename(),
             self::$FILTERS,
             true
         );
     }
}
function volcar() {
	$dir_iterator = new RecursiveDirectoryIterator("../fotoalbun");
	$filtro_iterator = new MyRecursiveFilterIterator($dir_iterator);
	$iterator = new RecursiveIteratorIterator($filtro_iterator, RecursiveIteratorIterator::SELF_FIRST);
	$archivo_de_descarga = 'descarga_' . texto_aleatorio(4) . '.sql';
	 
	$size = 0;
	$omitidos = 0;
	$apuntador_de_archivo = fopen( "../downloads/" . $archivo_de_descarga , "a");
	fputs( $apuntador_de_archivo , "USE `esucdiga_digaesuc`;\n" );
	foreach ($iterator as $file) {
		$nombre_completo = $file->getFilename();
		$partes = explode(".", $nombre_completo);
		$extencion = end($partes);
		$elementos_en_vector = count( $partes );
		if ( $extencion == 'jpg' ) {
			if ($file->isFile()) {
				$size += $file->getSize();
				echo '<tr>';
				echo '<td height="40" class="txt2">' . $file->getPath() . '</td>';
				echo '<td height="40" align="center" class="txt2">' . $file->getFilename() . '</td>';
				echo '<td height="40" align="center" class="txt2"><a href="'. $file->getPathname() .'" target="_blank">Ver</a></td>';
				echo '</tr>';
				if ( strlen($partes[0]) < 9 && $elementos_en_vector < 3 ) {
					fputs( $apuntador_de_archivo , "INSERT INTO `fotos` (`cedula`,`ruta`,`archivo`)VALUES(" . (int)$partes[0] . ",'" . str_replace('\\','/',$file->getPath()) . "','" . $file->getFilename() ."');\n");
				}
				else {
					$omitidos ++;
				}
			}
		}
	}
	fclose( $apuntador_de_archivo );
	echo '<br /><span class="DetalleCeroUno">Total file size: '.$size.' bytes</span><br />';
	if ( $size == 0 ) {
		echo '<br /><span class="DetalleCeroUno">No se encontraron incidencias...!</span><br />';
	}
	else {
		echo '<br /><a href="form-directorio-recursivo-descarga-2.php?file='.$archivo_de_descarga.'" target="_blank" class="DetalleCeroUno">Descargar archivo SQL</a><br />';
	}
	if ( $omitidos > 0 ) echo '<br /><span class="DetalleCeroUno">Se omitieron '.$omitidos.' registros...!</span><br />';
	echo '<br /><input type="submit" name="btnTerminar" class="glow2" title="Pulse aqui para ver todo los archivos que se han generado...!" value="Verlos todos" /><br />';
	echo '<input name="txtArchDes" id="txtArchDes" type="hidden" value="'.$archivo_de_descarga.'"  />';
	echo '<br /><a href="form-mostrar-tareas-2.php" title="Pulse aqui para regresar..." target="_body" class="DetalleCeroUno">&laquo;&nbsp;Regresar&nbsp;&raquo;</a><br /><br />';
}
//--------------------------------------------------------------------------------------------------------------------
//
//   F U N C I O N E S   C O N   U S U A R I O S
//
//--------------------------------------------------------------------------------------------------------------------
function armselUsua() {   //--- arma select Usuarios
	$sql_transac = "SELECT * FROM `usuarios`";
	$link = mysql_connect("localhost",NAME_USER,PASS_USER);
	$db_selected = mysql_select_db(BASE_FORANEA_DE_DATOS,$link);
	$result1 = mysql_query($sql_transac,$link);
	if ($result1 && mysql_num_rows($result1) >= 1) {
		echo '<select name="lstUsua" class="cuadro_textbox_5B">';
		while ($rows = mysql_fetch_array($result1, MYSQL_ASSOC)) {
			echo '<option value="'.$rows['idusuarios'].'">'.$rows['nombre_usuario'].'</option>';
		}
		echo '</select>';
		mysql_free_result($result1);
		mysql_close($link);
		return;
	}
}
function V2DarmselUsua($inv_usuario=0) {   //--- Versión Dos De arma select Usuarios
	$sql_transac = "SELECT * FROM `usuarios`";
	$link = mysql_connect("localhost",NAME_USER,PASS_USER);
	$db_selected = mysql_select_db(BASE_FORANEA_DE_DATOS,$link);
	$result1 = mysql_query($sql_transac,$link);
	if ($result1 && mysql_num_rows($result1) >= 1) {
		echo '<select name="lstUsua" class="cuadro_textbox_5B">';
		while ($rows = mysql_fetch_array($result1, MYSQL_ASSOC)) {
			if ( $inv_usuario == $rows['idusuarios'] ) {
				echo '<option selected="selected" value="'.$rows['idusuarios'].'">'.$rows['nombre_usuario'].'</option>';
			}
			else {
				echo '<option value="'.$rows['idusuarios'].'">'.$rows['nombre_usuario'].'</option>';
			}
		}
		echo '</select>';
		mysql_free_result($result1);
		mysql_close($link);
		return;
	}
}
function BuUsua($ID_Persona=NULL) {   //--- Busca Usuario
	$sql_transac = "SELECT * FROM `usuarios` WHERE `usuarios`.`idusuarios`=".$ID_Persona;
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
//Multi Función para Usuarios
function MFUsuario($p_area='Internet',$p_accion='CG',$p_usuario='',$p_contrasena='',$p_nombre='',$p_estatus='',$p_vector_procesos=NULL,$p_id_usuario=0) {
	if ($p_accion == 'CG') {   //Consulta General
		$sql_transac = "SELECT * FROM `usuarios`";
		$link = mysql_connect("localhost",NAME_USER,PASS_USER);
		$db_selected = mysql_select_db(BASE_FORANEA_DE_DATOS,$link);
		$result1 = mysql_query($sql_transac,$link);
		if ($result1 && mysql_num_rows($result1) > 0) {
			$rows = mysql_fetch_array($result1, MYSQL_ASSOC);
			mysql_free_result($result1);
			mysql_close($link);
			return($rows);
		}
	}
	if ($p_accion == 'CcIDU') {   //Consulta con ID de Usuario
		$sql_transac = "SELECT * FROM `usuarios` WHERE `usuarios`.`idusuarios` = ".$p_id_usuario;
		$link = mysql_connect("localhost",NAME_USER,PASS_USER);
		$db_selected = mysql_select_db(BASE_FORANEA_DE_DATOS,$link);
		$result1 = mysql_query($sql_transac,$link);
		if ($result1 && mysql_num_rows($result1) > 0) {
			$row = mysql_fetch_array($result1, MYSQL_ASSOC);
			mysql_free_result($result1);
			mysql_close($link);
			return($row);
		}
	}
	if ($p_accion == 'CGcFD') {   //Consulta General con Filas Devueltas
		$sql_transac = "SELECT * FROM `usuarios`";
		$link = mysql_connect("localhost",NAME_USER,PASS_USER);
		$db_selected = mysql_select_db(BASE_FORANEA_DE_DATOS,$link);
		$result1 = mysql_query($sql_transac,$link);
		if ($result1 && mysql_num_rows($result1) > 0) {
			echo '<table width="80%" border="0" cellspacing="0" cellpadding="0">';
			echo '<tr><td height="30" class="glow2" align="center">ID</td>';
			echo '<td height="30" class="glow2" align="center">Login</td>';
			echo '<td height="30" class="glow2" align="center">Nombre</td>';
			echo '<td height="30" class="glow2" align="center">Estatus</td>';
			echo '<td height="30" class="glow2" align="center" title="Indique si desea &laquo;Eliminar&raquo; &oacute; &laquo;Modificar&raquo;...">Acci&oacute;n</td>';
			$i = 1;
			while ($rows = mysql_fetch_array($result1, MYSQL_ASSOC)) {
				if ($i % 2) {
					echo '<tr class="glow">';
				}
				else {
					echo '<tr class="glowA">';
				}
				echo '<td height="30" align="center">'.$rows['idusuarios'].'</td>';
				echo '<td height="30" align="center">'.$rows['login_usuario'].'</td>';
				echo '<td height="30" align="center">'.$rows['nombre_usuario'].'</td>';
				echo '<td height="30" align="center">'.$rows['cuenta_usuario'].'</td>';
				echo '<td height="30" align="center">';
				echo strtolower($p_area) == 'internet'?'<a href="form-administrar-usuarios-modifica.php?ID='.$rows['idusuarios'].'" target="_parent" title="Pulse aqu&iacute; si quiere MODIFICAR...!"><img src="../img/editar.png" width="25" height="26" alt="Modificar" /></a>&nbsp;&nbsp;<a href="form-administrar-usuarios-elimina.php" target="_parent" title="Pulse aqu&iacute; si quiere ELIMINAR...!"><img src="../img/eliminar.png" width="25" height="26" alt="Eliminar" /></a>':'<a href="form-administrar-usuarios-modifica-2.php?ID='.$rows['idusuarios'].'" target="_body" title="Pulse aqu&iacute; si quiere MODIFICAR...!"><img src="../imagenes/editar.png" width="25" height="26" alt="Modificar" /></a>&nbsp;&nbsp;<a href="form-administrar-usuarios-elimina-2.php?ID='.$rows['idusuarios'].'" target="_body" title="Pulse aqu&iacute; si quiere ELIMINAR...!"><img src="../imagenes/eliminar.png" width="25" height="26" alt="Eliminar" /></a>';
				echo '</td></tr>';
				$i++;
			}
			echo '</table>';
			mysql_free_result($result1);
			mysql_close($link);
			return;
		}
	}
	if ($p_accion == 'CECUYC') {   //Consulta Específica Con Usuario Y Contraseña
		$p_seguimiento = '';
		$sql_transac = "SELECT * FROM `usuarios` WHERE `login_usuario` = '".$p_usuario."'";
		$sql_transac_vista = "SELECT * FROM `_vista_usuarios_con_tareas` WHERE `_vista_usuarios_con_tareas`.`login_usuario` = '".$p_usuario."'";
		$link = mysql_connect("localhost",NAME_USER,PASS_USER);
		$db_selected = mysql_select_db(BASE_FORANEA_DE_DATOS,$link);
		$result1 = mysql_query($sql_transac,$link);
		if ($result1 && mysql_num_rows($result1) == 1) {
			$row = mysql_fetch_array($result1, MYSQL_ASSOC);
			if ($row["pass_usuario"] == md5($p_contrasena)) {
				$result2 = mysql_query($sql_transac_vista,$link);
				if ($result2 && mysql_num_rows($result2) >= 1) {
					//$rows = mysql_fetch_array($result2, MYSQL_ASSOC);
					session_start();
					$_SESSION['uidusuarios'] = $row["idusuarios"];
					$_SESSION['uusuario'] = $row["login_usuario"];
					$_SESSION['unombre'] = utf8_decode($row["nombre_usuario"]);
					$_SESSION['uinicio'] = fecha(true);
					$_SESSION['ucuenta'] = $row["cuenta_usuario"];
					//$_SESSION['upermisos'] = $rows["permiso_tarea"];
					mysql_free_result($result1);
					mysql_free_result($result2);
					mysql_close($link);
					return(true);
				}
				else {   //El $result2 esta vacio
					$p_seguimiento = mysql_errno($link).'<br />'.mysql_error($link);
					mysql_free_result($result1);
					mysql_free_result($result2);
					mysql_close($link);
					return($p_seguimiento);
				}
			}
			else {   //Contraseña incorrecta
				$p_seguimiento = 'Contrase&ntilde;a Incorrecta...<br />'.mysql_errno($link).'<br />'.mysql_error($link);
				mysql_free_result($result1);
				mysql_close($link);
				return($p_seguimiento);
			}
		}
		else {   //Usuario No Existe
			$p_seguimiento = 'Usuario No Existe...<br />'.$sql_transac.'<br />'.mysql_errno($link).'<br />'.mysql_error($link);
			mysql_free_result($result1);
			mysql_close($link);
			return($p_seguimiento);
		}
	}
	if ($p_accion == 'I') {   //Inserción en tablas Usuarios, Usuarios_Tareas
		$p_hay_error = '<br />';
		$sql_transac_consulta = "SELECT * FROM `usuarios` WHERE `usuarios`.`login_usuario` = '".$p_usuario."'";
		$sql_transac_include = "INSERT INTO `usuarios` (`idusuarios`,`login_usuario`,`pass_usuario`,`nombre_usuario`,`cuenta_usuario`) VALUES (NULL,'".strtoupper($p_usuario)."','".md5($p_contrasena)."','".strtoupper($p_nombre)."','".strtoupper($p_estatus)."')";
		$link = mysql_connect("localhost",NAME_USER,PASS_USER);
		$db_selected = mysql_select_db(BASE_FORANEA_DE_DATOS,$link);
		$result1 = mysql_query($sql_transac_consulta,$link);
		if (mysql_num_rows($result1) == 0) {   //--- OK Usuario NO Existe
			mysql_query("SET AUTOCOMMIT=0;",$link);
			mysql_query("START TRANSACTION",$link);
			mysql_query($sql_transac_include,$link);
			$afectado = mysql_affected_rows($link);
			mysql_query("COMMIT",$link);
			if ( $afectado == 1 ) {   //--- Insersión EXITOSA
				$sql_transac_2da_consulta = "SELECT `usuarios`.`idusuarios` AS `id` FROM `usuarios` WHERE `usuarios`.`login_usuario` = '".$p_usuario."'";
				$result2 = mysql_query($sql_transac_2da_consulta,$link);
				$row = mysql_fetch_array($result2, MYSQL_ASSOC);
				foreach ($p_vector_procesos as $p_arreiglo) {
					if ( isset($p_arreiglo['chkSiAnexar']) ) {
					//if ( $p_arreiglo['chkSiAnexar'] == true ) {
						$sql_transac_inpro = "INSERT INTO `usuarios_tareas` (`idusuarios_tareas`,`idusuarios`,`idtareas`,`permiso_tarea`) VALUES (NULL,".$row['id'].",".$p_arreiglo['IDTareas'].",'C-A-M-E-I-IM-EX')";
						mysql_query("SET AUTOCOMMIT=0;",$link);
						mysql_query("START TRANSACTION",$link);
						mysql_query($sql_transac_inpro,$link);
						$afectado = mysql_affected_rows($link);
						mysql_query("COMMIT",$link);
						if ( $afectado == -1 ) {
							$p_hay_error .= '*****************<br />';
							$p_hay_error .= 'Afectado = ['.$afectado.']<br />';
							$p_hay_error .= '*****************<br />';
							$p_hay_error .= 'Error nº: '.mysql_errno($link).'<br />';
							$p_hay_error .= 'Mensaje: '.mysql_error($link).'<br />';
							$p_hay_error .= 'Instrucci&oacute;n(es) SQL :<br />';
							$p_hay_error .= $sql_transac_consulta.'<br />';
							$p_hay_error .= $sql_transac_include.'<br />';
							$p_hay_error .= $sql_transac_2da_consulta.'<br />';
							$p_hay_error .= $sql_transac_inpro.'<br />';
							mysql_close($link);
							return($p_hay_error);
						}
					}
				}
				mysql_close($link);
				return('<br />Operaci&oacute;n exitosa...!');
			}
			else {   //--- Fallo la insersión
				$p_hay_error .= '*****************<br />';
				$p_hay_error .= 'Afectado = ['.$afectado.']<br />';
				$p_hay_error .= '*****************<br />';
				$p_hay_error .= 'Error nº: '.mysql_errno($link).'<br />';
				$p_hay_error .= 'Mensaje: '.mysql_error($link).'<br />';
				$p_hay_error .= 'Instrucci&oacute;n(es) SQL :<br />';
				$p_hay_error .= $sql_transac_consulta.'<br />';
				$p_hay_error .= $sql_transac_include.'<br />';
				mysql_close($link);
				return($p_hay_error);
			}
		}
		else {   //--- Usuario existe
			mysql_close($link);
			return('<br />Usuario EXISTE...!');
		}
	}
	if ($p_accion == 'U-PASS') {   //--- Actualización de contraseña UPDATE-PASSWORD
		$sql_transac = "UPDATE `usuarios` SET `pass_usuario` = '".md5($p_contrasena)."' WHERE `login_usuario` = '".$p_usuario."'";
		$link = mysql_connect("localhost",NAME_USER,PASS_USER);
		$db_selected = mysql_select_db(BASE_FORANEA_DE_DATOS,$link);
		$p_hay_error= '<br />';
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
			$p_hay_error .= 'Instrucci&oacute;n SQL :<br />';
			$p_hay_error .= $sql_transac.'<br />';
		}
		else {
			$afectado .= '<br />******************<br />';
			$afectado .= 'Error n&deg;: '.mysql_errno($link).'<br />';
			$afectado .= 'Mensaje: '.mysql_error($link).'<br />';
			$afectado .= '******************<br />';
			$afectado .= 'Instrucci&oacute;n SQL :<br />';
			$afectado .= $sql_transac.'<br />';
		}
		echo $p_hay_error;
		mysql_close($link);
		return($afectado);
	}
	if ($p_accion == 'U-NyE') {   //--- Actualización de Nombre y Estatus
		//
	}
	if ($p_accion == 'E') {
		$sql_transac = "DELETE FROM `usuarios` WHERE `usuarios`.`idusuarios` = ".$p_id_usuario;
		$link = mysql_connect("localhost",NAME_USER,PASS_USER);
		$db_selected = mysql_select_db(BASE_FORANEA_DE_DATOS,$link);
		mysql_query("SET AUTOCOMMIT=0;",$link);
		mysql_query("START TRANSACTION",$link);
		if ( mysql_query($sql_transac,$link) ) {
			mysql_query("COMMIT",$link);
			mysql_close($link);
			return(true);
		}
		else {
			$afectado = '<br />'.mysql_errno($link).' : '.mysql_error($link).'<br /><br />'.$sql_transac.'<br /><br />';
			mysql_close($link);
			return($afectado);
		}
	}
}
//--------------------------------------------------------------------------------------------------------------------
//
//   F U N C I O N E S   C O N   U S U A R I O S _ T A R E A S
//
//--------------------------------------------------------------------------------------------------------------------
function MlasT($p_login_usuario='',$p_area='Internet') {   //--- Muestra las Tareas
	$sql_chequeo_vista = "SELECT COUNT(*) AS incidencias FROM information_schema.tables WHERE table_schema = '".BASE_FORANEA_DE_DATOS."' AND table_name = '_vista_usuarios_con_tarea'";
	$link = mysqli_connect("localhost",NAME_USER,PASS_USER,BASE_FORANEA_DE_DATOS);
	$result = mysqli_query($link,$sql_chequeo_vista,MYSQLI_STORE_RESULT);
	if ($result && mysqli_num_rows($result) == 1) {
		while ($filas = mysqli_fetch_array($result, MYSQLI_BOTH)) {
			if ( $filas['incidencias'] == 0 ) {
				$sql = "select `esucdiga_tablas_foraneas`.`usuarios_tareas`.`idusuarios_tareas` AS `idusuarios_tareas`,`esucdiga_tablas_foraneas`.`usuarios_tareas`.`idusuarios` AS `idusuarios`,`esucdiga_tablas_foraneas`.`usuarios`.`nombre_usuario` AS `nombre_usuario`,`esucdiga_tablas_foraneas`.`usuarios`.`login_usuario` AS `login_usuario`,`esucdiga_tablas_foraneas`.`usuarios_tareas`.`idtareas` AS `idtareas`,`esucdiga_tablas_foraneas`.`tareas`.`detalle_tareas` AS `detalle_tareas`,`esucdiga_tablas_foraneas`.`tareas`.`detalle_programa` AS `detalle_programa`,`esucdiga_tablas_foraneas`.`tareas`.`intranet_detalle_programa` AS `intranet_programa`,`esucdiga_tablas_foraneas`.`usuarios_tareas`.`permiso_tarea` AS `permiso_tarea` from ((`esucdiga_tablas_foraneas`.`usuarios_tareas` join `esucdiga_tablas_foraneas`.`usuarios`) join `esucdiga_tablas_foraneas`.`tareas`) where ((`esucdiga_tablas_foraneas`.`usuarios_tareas`.`idusuarios` = `esucdiga_tablas_foraneas`.`usuarios`.`idusuarios`) and (`esucdiga_tablas_foraneas`.`usuarios_tareas`.`idtareas` = `esucdiga_tablas_foraneas`.`tareas`.`idtareas`)) and `login_usuario`='".strtoupper($p_login_usuario)."'";
			}
			else {
				$sql = "SELECT * FROM `_vista_usuarios_con_tareas` WHERE `_vista_usuarios_con_tareas`.`login_usuario` = '".$p_login_usuario."'";
			}
		}
		$result1 = mysqli_query($link,$sql,MYSQLI_STORE_RESULT);
		if ($result1 && mysqli_num_rows($result1) >= 1) {
			echo '<table width="80%" border="0" cellspacing="0" cellpadding="0">';
			echo '<tr><td height="30" class="glow2" align="center"><h4>Tareas Vinculadas/Asignadas</h4></td></tr>';
			$i = 1;
			while ($rows = mysqli_fetch_array($result1, MYSQLI_BOTH)) {
				if ($i % 2) {
					echo '<tr class="glow">';
				}
				else {
					echo '<tr class="glowA">';
				}
				if ( strtolower($p_area)=='intranet' && ( !is_null($rows['intranet_programa']) || !empty($rows['intranet_programa']) ) ) {
					echo '<td height="30" title="Permisos para esta tarea: '.$rows['permiso_tarea'].'..." align="center">';
					echo '<a href="'.$rows['intranet_programa'].'" target="_body" class="txt_link_glow">'.$rows['detalle_tareas'].'</a>';
				}
				if ( strtolower($p_area)=='internet' && ( !is_null($rows['detalle_programa']) || !empty($rows['detalle_programa']) ) ) {
					echo '<td height="30" title="Permisos para esta tarea: '.$rows['permiso_tarea'].'..." align="center">';
					echo '<a href="'.$rows['detalle_programa'].'" target="_blank" class="txt_link_glow">'.$rows['detalle_tareas'].'</a>';
				}
				echo '</td></tr>';
				$i++;
			}
			echo '</table>';
	//			echo strtolower($p_area)=='internet' ? '<a href="'.$rows['detalle_programa'].'" target="_blank" class="txt_link_glow">'.$rows['detalle_tareas'].'</a>' : '<a href="'.$rows['intranet_programa'].'" target="_body" class="txt_link_glow">'.$rows['detalle_tareas'].'</a>';
			$rows = mysqli_fetch_array($result1, MYSQLI_BOTH);
			mysqli_free_result($result);
			mysqli_free_result($result1);
			mysqli_close($link);
			return;
		}
	}
	else {
		//
		echo 'No se encontró ningún Schema para verificar la existencia...!<br />';
	}
}
function MlTcOaE($p_area='Internet',$p_idusuarios = 0) {   //--- Muestra las Tareas con Opción a Eliminar
	$sql_transac_vista = "SELECT * FROM `_vista_usuarios_con_tareas` WHERE `_vista_usuarios_con_tareas`.`idusuarios` = '".$p_idusuarios."'";
	$link = mysql_connect("localhost",NAME_USER,PASS_USER);
	$db_selected = mysql_select_db(BASE_FORANEA_DE_DATOS,$link);
	$result1 = mysql_query($sql_transac_vista,$link);
	if ($result1 && mysql_num_rows($result1) >= 1) {
		echo '<table width="80%" border="0" cellspacing="0" cellpadding="0"><tr>';
		echo '<td height="30" class="glow2" align="center" title="Identificador &Uacute;nico de: &laquo;Usuario con Tarea&raquo;&laquo;Usuario&raquo;&laquo;Tarea&raquo;"><h4>ID</h4></td>';
		echo '<td height="30" class="glow2" align="center"><h4>Tareas Vinculadas/Asignadas</h4></td>';
		echo '<td height="30" class="glow2" align="center"><h4>Acci&oacute;n</h4></td></tr>';
		$i = 1;
		while ($rows = mysql_fetch_array($result1, MYSQL_ASSOC)) {
			if ($i % 2) {
				echo '<tr class="glow">';
			}
			else {
				echo '<tr class="glowA">';
			}
				echo '<td height="30" valign="middle" align="center">&laquo;'.$rows['idusuarios_tareas'].'&raquo;&laquo;'.$rows['idusuarios'].'&raquo;&laquo;'.$rows['idtareas'].'&raquo;</td>';
				echo '<td height="30" valign="middle" align="center" title="Permisos para esta tarea: '.$rows['permiso_tarea'].'...">'.$rows['detalle_tareas'].'</td>';
				echo '<td height="30" valign="middle" align="center">';
//				echo '<a href="form-administrar-usuarios-modifica-eliminatarea-accion.php?ID='.$rows['idusuarios'].'&IDTAREA='.$rows['idusuarios_tareas'].'&TAREA='.$rows['detalle_tareas'].'" target="_parent" class="txt_link_glow">&nbsp;&nbsp;&laquo;&nbsp;Eliminar&nbsp;&raquo;&nbsp;&nbsp;</a>';
				echo strtolower($p_area)=='internet'?'<a href="form-administrar-usuarios-modifica-eliminatarea-accion.php?ID='.$rows['idusuarios'].'&IDTAREA='.$rows['idusuarios_tareas'].'&TAREA='.$rows['detalle_tareas'].'" target="_parent" class="txt_link_glow"><img src="../img/eliminar.png" width="20" height="20" alt="Eliminar" title="Pulse aqu&iacute; para Eliminar esta Tarea..." /></a>':'<a href="form-administrar-usuarios-modifica-eliminatarea-accion-2.php?ID='.$rows['idusuarios'].'&IDTAREA='.$rows['idusuarios_tareas'].'&TAREA='.$rows['detalle_tareas'].'" target="_body" class="txt_link_glow"><img src="../imagenes/eliminar.png" width="20" height="20" alt="Eliminar" title="Pulse aqu&iacute; para Eliminar esta Tarea..." /></a>';
				echo '</td></tr>';
			$i++;
		}
		echo '</table>';
		$rows = mysql_fetch_array($result1, MYSQL_ASSOC);
		mysql_free_result($result1);
		mysql_close($link);
		return;
	}
}
function EliTarDUnUsua($id_tarea=0) {   //--- Eliminar Tarea De Un Usuario
	$sql_transac = "DELETE FROM `usuarios_tareas` WHERE `usuarios_tareas`.`idusuarios_tareas` = ".$id_tarea;
	$link = mysql_connect("localhost",NAME_USER,PASS_USER);
	$db_selected = mysql_select_db(BASE_FORANEA_DE_DATOS,$link);
	mysql_query("SET AUTOCOMMIT=0;",$link);
	mysql_query("START TRANSACTION",$link);
	if ( mysql_query($sql_transac,$link) ) {
		mysql_query("COMMIT",$link);
		mysql_close($link);
		return(true);
	}
	else {
		$afectado = '<br />'.mysql_errno($link).' : '.mysql_error($link).'<br /><br />';
		mysql_close($link);
		return($afectado);
	}
}
function AdiTarPUnUsua($id_usuario=0,$id_tarea=0) {   //--- Adicionar Tarea Para Un Usuario
	$sql_transac = "INSERT INTO `usuarios_tareas` (`idusuarios_tareas`,`idusuarios`,`idtareas`,`permiso_tarea`)VALUES(NULL,".$id_usuario.",".$id_tarea.",'C-A-M-E-I-IM-EX')";
	$link = mysql_connect("localhost",NAME_USER,PASS_USER);
	$db_selected = mysql_select_db(BASE_FORANEA_DE_DATOS,$link);
	mysql_query("SET AUTOCOMMIT=0;",$link);
	mysql_query("START TRANSACTION",$link);
	if ( mysql_query($sql_transac,$link) ) {
		mysql_query("COMMIT",$link);
		mysql_close($link);
		return(true);
	}
	else {
		$afectado = '<br />'.mysql_errno($link).' : '.mysql_error($link).'<br /><br />';
		mysql_close($link);
		return($afectado);
	}
}
//--------------------------------------------------------------------------------------------------------------------
//
//   F U N C I O N E S   C O N   T A R E A S
//
//--------------------------------------------------------------------------------------------------------------------
function CGTcFD() {   //---Consulta General de Tareas con Filas Devueltas
	$sql_transac = "SELECT * FROM `tareas`";
	$link = mysql_connect("localhost",NAME_USER,PASS_USER);
	$db_selected = mysql_select_db(BASE_FORANEA_DE_DATOS,$link);
	$result1 = mysql_query($sql_transac,$link);
	if ($result1 && mysql_num_rows($result1) >= 1) {
		echo '<table width="60%" border="0" cellspacing="0" cellpadding="0">';
		echo '<tr class="glow2"><td height="30">Tarea/Proceso</td><td height="30">Se anexa?</td></tr>';
		$j = 1;
		while ($rows = mysql_fetch_array($result1, MYSQL_ASSOC)) {
			echo '<input type="hidden" name="txtVector['.$j.'][IDTareas]" value="'.$rows['idtareas'].'"  />';
			if ( $j % 2 ) {
				echo '<tr class="glow">';
			}
			else {
				echo '<tr class="glowA">';
			}
			echo '<td height="30">'.$rows['detalle_tareas'].'</td>';
			echo '<td height="30">';
			echo '<input type="checkbox" name="txtVector['.$j.'][chkSiAnexar]" />';
			echo '<label for="chkSiAnexar">Anexar este</label>';
			echo '</td></tr>';
			$j++;
		}
		echo '</table>';
		$rows = mysql_fetch_array($result1, MYSQL_ASSOC);
		mysql_free_result($result1);
		mysql_close($link);
		return;
	}
}
function TFxUs($p_area='Internet',$p_idusuarios = 0) {   //---Tareas Faltantes x Usuarios
	$sql_transac = "SELECT `usuarios`.`idusuarios`,`usuarios`.`login_usuario`,`usuarios`.`nombre_usuario`,`usuarios`.`cuenta_usuario`,`usuarios_tareas`.`idtareas`,`tareas`.`idtareas` AS `idtareasfaltante`,`tareas`.`detalle_tareas`,`tareas`.`detalle_programa`,`usuarios_tareas`.`permiso_tarea` FROM `esucdiga_tablas_foraneas`.`tareas` LEFT JOIN (`esucdiga_tablas_foraneas`.`usuarios_tareas` INNER JOIN `esucdiga_tablas_foraneas`.`usuarios` ON `usuarios_tareas`.`idusuarios`=`usuarios`.`idusuarios` AND `usuarios`.`idusuarios` = ".$p_idusuarios.") ON `tareas`.`idtareas`=`usuarios_tareas`.`idtareas` WHERE `usuarios_tareas`.`idtareas`IS NULL";
	$link = mysql_connect("localhost",NAME_USER,PASS_USER);
	$db_selected = mysql_select_db(BASE_FORANEA_DE_DATOS,$link);
	$result1 = mysql_query($sql_transac,$link);
	if ($result1 && mysql_num_rows($result1) >= 1) {
		echo '<table width="60%" border="0" cellspacing="0" cellpadding="0"><tr class="glow2">';
		echo '<td height="30" align="center">Tarea/Proceso que no tiene</td><td height="30" align="center">Se Adiciona?</td></tr>';
		$j = 1;
		while ($rows = mysql_fetch_array($result1, MYSQL_ASSOC)) {
			echo '<input type="hidden" name="txtVector['.$j.'][IDTareaFaltante]" value="'.$rows['idtareasfaltante'].'"  />';
			echo '<input type="hidden" name="txtVector['.$j.'][IDUsuario]" value="'.$rows['idusuarios'].'"  />';
			if ( $j % 2 ) {
				echo '<tr class="glow">';
			}
			else {
				echo '<tr class="glowA">';
			}
			echo '<td height="30" align="center">'.$rows['detalle_tareas'].'</td>';
			echo '<td height="30" align="center" valign="middle">';
//			echo '<a href="form-administrar-usuarios-modifica-adicionatarea-accion.php?ID='.$p_idusuarios.'&IDTAREA='.$rows['idtareasfaltante'].'&TAREA='.$rows['detalle_tareas'].'" target="_parent" class="txt_link_glow" title="Pulse aqu&iacute; para Adicionar esta Tarea..."><img src="../img/adicionar.png" width="20" height="20" alt="adicionar" /></a>';
			echo strtolower($p_area)=='internet'?'<a href="form-administrar-usuarios-modifica-adicionatarea-accion.php?ID='.$p_idusuarios.'&IDTAREA='.$rows['idtareasfaltante'].'&TAREA='.$rows['detalle_tareas'].'" target="_parent" class="txt_link_glow" title="Pulse aqu&iacute; para Adicionar esta Tarea..."><img src="../img/adicionar.png" width="20" height="20" alt="Adicionar" /></a>':'<a href="form-administrar-usuarios-modifica-adicionatarea-accion-2.php?ID='.$p_idusuarios.'&IDTAREA='.$rows['idtareasfaltante'].'&TAREA='.$rows['detalle_tareas'].'" target="_body" class="txt_link_glow" title="Pulse aqu&iacute; para Adicionar esta Tarea..."><img src="../imagenes/adicionar.png" width="20" height="20" alt="Adicionar" />';
			echo '</td></tr>';
			$j++;
		}
		echo '</table>';
		$rows = mysql_fetch_array($result1, MYSQL_ASSOC);
		mysql_free_result($result1);
		mysql_close($link);
		return;
	}
}
//--------------------------------------------------------------------------------------------------------------------
//
//   F U N C I O N E S   C O N   P O S T
//
//--------------------------------------------------------------------------------------------------------------------
function ConPost() {   //--- Consulta general de los Post
	$sql_transac = "SELECT * FROM `post`";
	$link = mysql_connect("localhost",NAME_USER,PASS_USER);
	$db_selected = mysql_select_db(BASE_FORANEA_DE_DATOS,$link);
	$result1 = mysql_query($sql_transac,$link);
	if ($result1 && mysql_num_rows($result1) >= 1) {
		echo '<table width="80%" border="0" cellspacing="0" cellpadding="0">';
		echo '<tr><td height="30" class="glow2">ID</td>';
		echo '<td height="30" class="glow2">T&iacute;tulo</td>';
		echo '<td height="30" class="glow2">Breve Descripci&oacute;n</td>';
		echo '<td height="30" class="glow2">Contenido</td>';
		echo '<td height="30" class="glow2">Fecha</td>';
		echo '<td height="30" class="glow2" title="Indique si desea &laquo;Eliminar&raquo; &oacute; &laquo;Modificar&raquo;...">Acci&oacute;n</td>';
		$i = 1;
		while ($rows = mysql_fetch_array($result1, MYSQL_ASSOC)) {
			if ($i % 2) {
				echo '<tr class="glow"><td height="30">'.$rows['ID'].'</td>';
				echo '<td height="30">'.utf8_decode($rows['Titulo']).'</td>';
				echo '<td height="30">'.utf8_decode($rows['Descripcion']).'</td>';
				echo '<td height="30">'.utf8_decode($rows['Contenido']).'</td>';
				echo '<td height="30">'.utf8_decode($rows['Fecha']).'</td>';
				echo '<td height="30"><br />';
				echo '<a href="form-administrar-post-elimina.php?ID='.$rows['ID'].'" target="_parent" class="txt_link_glow">&nbsp;&nbsp;&laquo;&nbsp;Eliminar&nbsp;&raquo;&nbsp;&nbsp;</a>';
				echo '<br /><br />';
				echo '<a href="form-administrar-post-modifica.php?ID='.$rows['ID'].'" target="_parent" class="txt_link_glow">&nbsp;&nbsp;&laquo;&nbsp;Modificar&nbsp;&raquo;&nbsp;&nbsp;</a><br /><br /></td>';
				echo '</tr>';
			}
			else {
				echo '<tr class="glowA"><td height="30">'.$rows['ID'].'</td>';
				echo '<td height="30">'.utf8_decode($rows['Titulo']).'</td>';
				echo '<td height="30">'.utf8_decode($rows['Descripcion']).'</td>';
				echo '<td height="30">'.utf8_decode($rows['Contenido']).'</td>';
				echo '<td height="30">'.utf8_decode($rows['Fecha']).'</td>';
				echo '<td height="30"><br />';
				echo '<a href="form-administrar-post-elimina.php?ID='.$rows['ID'].'" target="_parent" class="txt_link_glow">&nbsp;&nbsp;&laquo;&nbsp;Eliminar&nbsp;&raquo;&nbsp;&nbsp;</a>';
				echo '<br /><br />';
				echo '<a href="form-administrar-post-modifica.php?ID='.$rows['ID'].'" target="_parent" class="txt_link_glow">&nbsp;&nbsp;&laquo;&nbsp;Modificar&nbsp;&raquo;&nbsp;&nbsp;</a><br /><br /></td>';
				echo '</tr>';
			}
			$i++;
		}
		echo '</table>';
		$rows = mysql_fetch_array($result1, MYSQL_ASSOC);
		mysql_free_result($result1);
		mysql_close($link);
		return;
	}
}
function BEPost($p_ID = NULL) {   //--- Busca Este Post
	$sql_transac = "SELECT * FROM `post` WHERE `post`.`id`=".$p_ID;
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
function IPost($p_tit='',$p_des='',$p_fec='',$p_con='') {   //--- Inserta este Post
	$sql_transac = "INSERT INTO `post` (`ID`,`Titulo`,`Descripcion`,`Fecha`,`Contenido`,`Categoria`) VALUES (NULL,'".utf8_encode($p_tit)."','".utf8_encode($p_des)."','".utf8_encode($p_fec)."','".utf8_encode($p_con)."',1)";
	$link = mysql_connect("localhost",NAME_USER,PASS_USER);
	$db_selected = mysql_select_db(BASE_FORANEA_DE_DATOS,$link);
	if ( mysql_query($sql_transac,$link) ) {
		$operacion = mysql_affected_rows($link).' fila afectada...!';
	}
	else {
		$operacion = '0 fila afectada...!<br />Error<br />'.mysql_errno($link).': '.mysql_error($link).'<br />INSTRUCCION ORIGINAL:<br />'.$sql_transac;
	}
	mysql_close($link);
	return($operacion);
}
function EPost($p_ID = NULL) {   //--- Elimina este Post
	$sql_transac = "DELETE FROM `post` WHERE `post`.`ID`=".$p_ID;
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
function MPost($p_ID=NULL,$p_tit='',$p_des='',$p_fec='',$p_con='') {   //--- Modifica este Post
	$sql_transac = "UPDATE `post` SET `Titulo`='".utf8_encode($p_tit)."',`Descripcion`='".utf8_encode($p_des)."',`Fecha`='".utf8_encode($p_fec)."',`Contenido`='".utf8_encode($p_con)."' WHERE `ID`=".$p_ID;
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
//--------------------------------------------------------------------------------------------------------------------
//
//   F U N C I O N E S   C O N   C A R R E R A S _ O P S U
//
//--------------------------------------------------------------------------------------------------------------------
function ConCom1dCO() {   //--------------------------------- Construye Combo 1 de Carreras OPSU
	$sql_transac = "SELECT * FROM `carreras_opsu`";
	$link = mysql_connect("localhost",NAME_USER,PASS_USER);
	$db_selected = mysql_select_db(BASE_DE_DATOS,$link);
	$result1 = mysql_query($sql_transac,$link);
	if ($result1 && mysql_num_rows($result1) >= 1) {
		while ($rows = mysql_fetch_array($result1, MYSQL_ASSOC)) {
			echo '<option value="'.$rows['id_carrera_opsu'].'">'.$rows['detalle_carrera'].'</option>';
		}
		mysql_free_result($result1);
		mysql_close($link);
		return;
	}
	mysql_free_result($result1);
	mysql_close($link);
	return;
}
//--------------------------------------------------------------------------------------------------------------------
//
//   F U N C I O N E S   C O N   A L U M N O S
//
//--------------------------------------------------------------------------------------------------------------------
function BEA($pCI=0) {   //------- Busca Este Alumno
	$sql_transac = "SELECT * FROM `alumnos` WHERE `alumnos`.`a_ci`=".$pCI;
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
function IunA($pCI=0,$pActivo='0',$pPasivo='0',$pPeriodo='',$pModIngreso='0',$pEscuela=0,$pMencion='0',$pTDatosPer='No',$pTDocConsig='No',$pTDocReti='No',$pTPresCir='No',$pTExpedAca='No',$pTSolCons='No') {   //---- Inserta un Alumno
	$sql_transac = "INSERT INTO `esucdiga_digaesuc`.`alumnos` (`a_ci`,`a_estatus_activo`,`a_estatus_pasivo`,`a_periodo`,`a_modalidad_ingreso`,`a_escuela`,`a_mencion`,`tiene_datos_personales`,`tiene_documentos_consignados`,`tiene_documentos_retirados`,`tiene_prestamo_circulante`,`tiene_expediente_academico`,`tiene_solicitud_constancia`) VALUES (".$pCI.",'".$pActivo."','".$pPasivo."','".$pPeriodo."','".$pModIngreso."',".$pEscuela.",'".$pMencion."','".$pTDatosPer."','".$pTDocConsig."','".$pTDocReti."','".$pTPresCir."','".$pTExpedAca."','".$pTSolCons."')";
	$link = mysql_connect("localhost",NAME_USER,PASS_USER);
	$db_selected = mysql_select_db(BASE_DE_DATOS,$link);
//	mysql_query("SET AUTOCOMMIT=0;",$link);
//	mysql_query("START TRANSACTION",$link);
//	mysql_query($sql_transac,$link);
//	mysql_query("COMMIT",$link);
//	mysql_close($link);
	if ( mysql_query($sql_transac,$link) ) {
		$operacion = mysql_affected_rows($link).' fila afectada...!';
	}
	else {
		$operacion = '0 fila afectada...!<br />Error<br />'.mysql_errno($link).': '.mysql_error($link).'<br />INSTRUCCION ORIGINAL:<br />'.$sql_transac;
	}
	mysql_close($link);
	return($operacion);
}
//--------------------------------------------------------------------------------------------------------------------
//
//   F U N C I O N E S   C O N   A _ D A T O S _ P E R S O N A L E S
//
//--------------------------------------------------------------------------------------------------------------------
function InsDatPer($pCI=0,$pNac='',$p1Nom='',$p2Nom='',$p3Nom='',$p1Ape='',$p2Ape='',$p3Ape='',$pEdoCiv='Soltero',$pSex='Masculino',$pFechNac='0000-00-00',$pTDir='No',$pTTelef='No',$pTEMail='No') {   //---- Inserta un Alumno
	$sql_transac = "INSERT INTO `a_datos_personales` (`a_ci`,`nacionalidad`,`primer_nombre`,`segundo_nombre`,`tercer_nombre`,`primer_apellido`,`segundo_apellido`,`tercer_apellido`,`estado_civil`,`sexo`,`fecha_nacimiento`,`tiene_direcciones`,`tiene_telefonos`,`tiene_correos`) VALUES (".$pCI.",'".$pNac."',UPPER('".$p1Nom."'),UPPER('".$p2Nom."'),UPPER('".$p3Nom."'),UPPER('".$p1Ape."'),UPPER('".$p2Ape."'),UPPER('".$p3Ape."'),'".$pEdoCiv."','".$pSex."','".$pFechNac."','".$pTDir."','".$pTTelef."','".$pTEMail."')";
	$link = mysql_connect("localhost",NAME_USER,PASS_USER);
	$db_selected = mysql_select_db(BASE_DE_DATOS,$link);
//	mysql_query("SET AUTOCOMMIT=0;",$link);
//	mysql_query("START TRANSACTION",$link);
//	mysql_query($sql_transac,$link);
//	mysql_query("COMMIT",$link);
//	mysql_close($link);
	if ( mysql_query($sql_transac,$link) ) {
		$operacion = mysql_affected_rows($link).' fila afectada...!';
	}
	else {
		$operacion = '0 fila afectada...!<br />Error<br />'.mysql_errno($link).': '.mysql_error($link).'<br />INSTRUCCION ORIGINAL:<br />'.$sql_transac;
	}
	mysql_close($link);
	return($operacion);
}
function BusEnDP($pCed=0) {   //--- Busca En Datos Personales
	$sql_transac = "SELECT * FROM `a_datos_personales` WHERE `a_datos_personales`.`a_ci`=".$pCed;
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
//--------------------------------------------------------------------------------------------------------------------
//
//   F U N C I O N E S   C O N   A _ D I R E C C I O N E S
//
//--------------------------------------------------------------------------------------------------------------------
function InsuDirec($pCI=0,$pPerCont='',$pDirecc='') {   //---- Inserta una Dirección
	$sql_transac = "INSERT INTO `a_direcciones` (`a_ci`, `persona_contacto`, `direccion`) VALUES (".$pCI.",'".$pPerCont."',UPPER('".$pDirecc."'))";
	$link = mysql_connect("localhost",NAME_USER,PASS_USER);
	$db_selected = mysql_select_db(BASE_DE_DATOS,$link);
//	mysql_query("SET AUTOCOMMIT=0;",$link);
//	mysql_query("START TRANSACTION",$link);
//	mysql_query($sql_transac,$link);
//	mysql_query("COMMIT",$link);
//	mysql_close($link);
	if ( mysql_query($sql_transac,$link) ) {
		$operacion = mysql_affected_rows($link).' fila afectada...!';
	}
	else {
		$operacion = '0 fila afectada...!<br />Error<br />'.mysql_errno($link).': '.mysql_error($link).'<br />INSTRUCCION ORIGINAL:<br />'.$sql_transac;
	}
	mysql_close($link);
	return($operacion);
}
//--------------------------------------------------------------------------------------------------------------------
//
//   F U N C I O N E S   C O N   A _ T E L E F O N O S
//
//--------------------------------------------------------------------------------------------------------------------
function InsuTelef($pCI=0,$pPerCont='',$pTelef='') {   //---- Inserta una Teléfono
	$sql_transac = "INSERT INTO `a_telefonos` (`a_ci`, `persona_contacto`, `telefono`) VALUES (".$pCI.",'".$pPerCont."','".$pTelef."')";
	$link = mysql_connect("localhost",NAME_USER,PASS_USER);
	$db_selected = mysql_select_db(BASE_DE_DATOS,$link);
//	mysql_query("SET AUTOCOMMIT=0;",$link);
//	mysql_query("START TRANSACTION",$link);
//	mysql_query($sql_transac,$link);
//	mysql_query("COMMIT",$link);
//	mysql_close($link);
	if ( mysql_query($sql_transac,$link) ) {
		$operacion = mysql_affected_rows($link).' fila afectada...!';
	}
	else {
		$operacion = '0 fila afectada...!<br />Error<br />'.mysql_errno($link).': '.mysql_error($link).'<br />INSTRUCCION ORIGINAL:<br />'.$sql_transac;
	}
	mysql_close($link);
	return($operacion);
}
function armselTefl($p_ci=0) {   //--- arma select Teléfonos
	$sql_transac = "SELECT * FROM `a_telefonos` WHERE `a_telefonos`.`a_ci`=".$p_ci;
	$link = mysql_connect("localhost",NAME_USER,PASS_USER);
	$db_selected = mysql_select_db(BASE_DE_DATOS,$link);
	$result1 = mysql_query($sql_transac,$link);
	if ($result1 && mysql_num_rows($result1) >= 1) {
		echo '<select name="lstTelf" class="cuadro_textbox_5B">';
		while ($rows = mysql_fetch_array($result1, MYSQL_ASSOC)) {
			echo '<option value="'.$rows['telefono'].'">'.$rows['telefono'].' Contacto: '.$rows['persona_contacto'].'</option>';
		}
		echo '</select>';
		mysql_free_result($result1);
		mysql_close($link);
		return;
	}
}
//--------------------------------------------------------------------------------------------------------------------
//
//   F U N C I O N E S   C O N   A _ C O R R E O S
//
//--------------------------------------------------------------------------------------------------------------------
function InsuEmail($pCI=0,$pEmail='') {   //---- Inserta un E-mail
	$sql_transac = "INSERT INTO `a_correos` (`a_ci`, `correo`) VALUES (".$pCI.",'".$pEmail."')";
	$link = mysql_connect("localhost",NAME_USER,PASS_USER);
	$db_selected = mysql_select_db(BASE_DE_DATOS,$link);
//	mysql_query("SET AUTOCOMMIT=0;",$link);
//	mysql_query("START TRANSACTION",$link);
//	mysql_query($sql_transac,$link);
//	mysql_query("COMMIT",$link);
//	mysql_close($link);
	if ( mysql_query($sql_transac,$link) ) {
		$operacion = mysql_affected_rows($link).' fila afectada...!';
	}
	else {
		$operacion = '0 fila afectada...!<br />Error<br />'.mysql_errno($link).': '.mysql_error($link).'<br />INSTRUCCION ORIGINAL:<br />'.$sql_transac;
	}
	mysql_close($link);
	return($operacion);
}
function armselEmail($p_ci=0) {   //--- arma select E-mail
	$sql_transac = "SELECT * FROM `a_correos` WHERE `a_correos`.`a_ci`=".$p_ci;
	$link = mysql_connect("localhost",NAME_USER,PASS_USER);
	$db_selected = mysql_select_db(BASE_DE_DATOS,$link);
	$result1 = mysql_query($sql_transac,$link);
	if ($result1 && mysql_num_rows($result1) >= 1) {
		echo '<select name="lstEmail" class="cuadro_textbox_5B">';
		while ($rows = mysql_fetch_array($result1, MYSQL_ASSOC)) {
			echo '<option value="'.$rows['correo'].'">'.$rows['correo'].'</option>';
		}
		echo '</select>';
		mysql_free_result($result1);
		mysql_close($link);
		return;
	}
}
//--------------------------------------------------------------------------------------------------------------------
//
//   F U N C I O N E S   C O N   A _ E S C U E L A S
//
//--------------------------------------------------------------------------------------------------------------------
function armselV2Escue($p_esc_prev=0) {   //--- arma select Versión 2 Escuela
	//$sql_transac = "SELECT * FROM `a_escuelas`";
	$sql_transac = "SELECT `escu`.`a_escuela`,CONCAT(`escu`.`detalle_escuela`,' - ',`facu`.`detalle_corto2_facultad`) AS `escuela` FROM `a_escuelas` AS `escu`,`a_facultades` AS `facu` WHERE `facu`.`a_facultad` = `escu`.`a_facultad`";
	$link = mysql_connect("localhost",NAME_USER,PASS_USER);
	$db_selected = mysql_select_db(BASE_DE_DATOS,$link);
	$result1 = mysql_query($sql_transac,$link);
	if ($result1 && mysql_num_rows($result1) >= 1) {
		echo '<select name="lstEscu" class="cuadro_textbox_5B">';
		while ($rows = mysql_fetch_array($result1, MYSQL_ASSOC)) {
			if ($p_esc_prev == $rows['a_escuela']) {
				echo '<option value="'.$rows['a_escuela'].'" selected="selected">'.$rows['escuela'].'</option>';
			}
			else {
				echo '<option value="'.$rows['a_escuela'].'">'.$rows['escuela'].'</option>';
			}
		}
		echo '</select>';
		mysql_free_result($result1);
		mysql_close($link);
		return;
	}
}
function armselEscue() {   //--- arma select Escuela
	//$sql_transac = "SELECT * FROM `a_escuelas`";
	$sql_transac = "SELECT `escu`.`a_escuela`,CONCAT(`escu`.`detalle_escuela`,' - ',`facu`.`detalle_corto2_facultad`) AS `escuela` FROM `a_escuelas` AS `escu`,`a_facultades` AS `facu` WHERE `facu`.`a_facultad` = `escu`.`a_facultad`";
	$link = mysql_connect("localhost",NAME_USER,PASS_USER);
	$db_selected = mysql_select_db(BASE_DE_DATOS,$link);
	$result1 = mysql_query($sql_transac,$link);
	if ($result1 && mysql_num_rows($result1) >= 1) {
		echo '<select name="lstEscu" class="cuadro_textbox_5B">';
		while ($rows = mysql_fetch_array($result1, MYSQL_ASSOC)) {
			echo '<option value="'.$rows['a_escuela'].'">'.$rows['escuela'].'</option>';
		}
		echo '</select>';
		mysql_free_result($result1);
		mysql_close($link);
		return;
	}
}
function armCNselEsc($p_name='lstEscu') {   //--- arma Con Nombre select Escuela
	$sql_transac = "SELECT * FROM `a_escuelas`";
	$link = mysql_connect("localhost",NAME_USER,PASS_USER);
	$db_selected = mysql_select_db(BASE_DE_DATOS,$link);
	$result1 = mysql_query($sql_transac,$link);
	if ($result1 && mysql_num_rows($result1) >= 1) {
		echo '<select name="'.$p_name.'" class="cuadro_textbox_5B">';
		while ($rows = mysql_fetch_array($result1, MYSQL_ASSOC)) {
			echo '<option value="'.$rows['a_escuela'].'">'.$rows['detalle_corto1_escuela'].'</option>';
		}
		echo '</select>';
		mysql_free_result($result1);
		mysql_close($link);
		return;
	}
}
function BunaE($pEscuela=0) {   //--- Busca una Escuela
	$sql_transac = "SELECT * FROM `a_escuelas` WHERE `a_escuelas`.`a_escuela`=".$pEscuela;
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
//--------------------------------------------------------------------------------------------------------------------
//
//   F U N C I O N E S   C O N   A _ M E N C I O N E S
//
//--------------------------------------------------------------------------------------------------------------------
function armselMenc($pEscuela=0) {   //--- arma select Mencion
	$sql_transac = "SELECT * FROM `a_menciones` WHERE `a_escuela`=".$pEscuela;
	$link = mysql_connect("localhost",NAME_USER,PASS_USER);
	$db_selected = mysql_select_db(BASE_DE_DATOS,$link);
	$result1 = mysql_query($sql_transac,$link);
	if ($result1 && mysql_num_rows($result1) >= 1) {
		echo '<select name="lstMenc" class="cuadro_textbox_5B">';
		while ($rows = mysql_fetch_array($result1, MYSQL_ASSOC)) {
			echo '<option value="'.$rows['a_mencion'].'">'.$rows['detalle_mencion'].'</option>';
		}
		echo '</select>';
		mysql_free_result($result1);
		mysql_close($link);
		return;
	}
	mysql_close($link);
	return('Esta Escuela no tiene Menciones Registradas');
}
function armselV2Menc($pEscuela=0,$pMencion='') {   //--- arma select Versión 2 Mencion
	$sql_transac = "SELECT * FROM `a_menciones` WHERE `a_escuela`=".$pEscuela;
	$link = mysql_connect("localhost",NAME_USER,PASS_USER);
	$db_selected = mysql_select_db(BASE_DE_DATOS,$link);
	$result1 = mysql_query($sql_transac,$link);
	if ($result1 && mysql_num_rows($result1) >= 1) {
		echo '<select name="lstMenc" class="cuadro_textbox_5B">';
		while ($rows = mysql_fetch_array($result1, MYSQL_ASSOC)) {
			if ($pMencion == $rows['a_mencion'] ) {
				echo '<option selected="selected" value="'.$rows['a_mencion'].'">'.$rows['detalle_mencion'].'</option>';
			}
			else {
				echo '<option value="'.$rows['a_mencion'].'">'.$rows['detalle_mencion'].'</option>';
			}
		}
		echo '</select>';
		mysql_free_result($result1);
		mysql_close($link);
		return;
	}
	mysql_close($link);
	return('Esta Escuela no tiene Menciones Registradas');
}
function armselCdMenc() {   //--- arma select Completo de Mención
	$sql_transac = "SELECT * FROM `a_menciones`";
	$link = mysqli_connect("localhost",NAME_USER,PASS_USER,BASE_DE_DATOS);
	$result1 = mysqli_query($link,$sql_transac);
	if ($result1 && mysqli_num_rows($result1) >= 1) {
		echo '<select name="lstMenc" class="cuadro_textbox_5B">';
		while ($rows = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
			echo '<option value="'.$rows['a_mencion'].'">'.$rows['detalle_mencion'].'</option>';
		}
		echo '</select>';
		mysqli_free_result($result1);
		mysqli_close($link);
		return;
	}
	mysqli_close($link);
	return('Esta Escuela no tiene Menciones Registradas');
}
//--------------------------------------------------------------------------------------------------------------------
//
//   F U N C I O N E S   C O N   A _ A C T I V O
//
//--------------------------------------------------------------------------------------------------------------------
function armselActiv() {   //--- arma select Activo
	$sql_transac = "SELECT * FROM `a_activo`";
	$link = mysql_connect("localhost",NAME_USER,PASS_USER);
	$db_selected = mysql_select_db(BASE_DE_DATOS,$link);
	$result1 = mysql_query($sql_transac,$link);
	if ($result1 && mysql_num_rows($result1) >= 1) {
		echo '<select name="lstActi" class="cuadro_textbox_5B">';
		while ($rows = mysql_fetch_array($result1, MYSQL_ASSOC)) {
			echo '<option value="'.$rows['a_estatus_activo'].'">'.$rows['detalle_activo'].'</option>';
		}
		echo '</select>';
		mysql_free_result($result1);
		mysql_close($link);
		return;
	}
}
function armselV2Activ($pActivo='') {   //--- arma select Versión 2 Activo
	$sql_transac = "SELECT * FROM `a_activo`";
	$link = mysql_connect("localhost",NAME_USER,PASS_USER);
	$db_selected = mysql_select_db(BASE_DE_DATOS,$link);
	$result1 = mysql_query($sql_transac,$link);
	if ($result1 && mysql_num_rows($result1) >= 1) {
		echo '<select name="lstActi" class="cuadro_textbox_5B">';
		while ($rows = mysql_fetch_array($result1, MYSQL_ASSOC)) {
			if ($pActivo == $rows['a_estatus_activo']) {
				echo '<option selected="selected" value="'.$rows['a_estatus_activo'].'">'.$rows['detalle_activo'].'</option>';
			}
			else {
				echo '<option value="'.$rows['a_estatus_activo'].'">'.$rows['detalle_activo'].'</option>';
			}
		}
		echo '</select>';
		mysql_free_result($result1);
		mysql_close($link);
		return;
	}
}
//--------------------------------------------------------------------------------------------------------------------
//
//   F U N C I O N E S   C O N   A _ P A S I V O
//
//--------------------------------------------------------------------------------------------------------------------
function armselPasiv() {   //--- arma select Pasivo
	$sql_transac = "SELECT * FROM `a_pasivo` WHERE `a_estatus_pasivo`='3' OR `a_estatus_pasivo`='A'";
	$link = mysql_connect("localhost",NAME_USER,PASS_USER);
	$db_selected = mysql_select_db(BASE_DE_DATOS,$link);
	$result1 = mysql_query($sql_transac,$link);
	if ($result1 && mysql_num_rows($result1) >= 1) {
		echo '<select name="lstPasi" class="cuadro_textbox_5B">';
		while ($rows = mysql_fetch_array($result1, MYSQL_ASSOC)) {
			echo '<option value="'.$rows['a_estatus_pasivo'].'">'.$rows['detalle_pasivo'].'</option>';
		}
		echo '</select>';
		mysql_free_result($result1);
		mysql_close($link);
		return;
	}
}
function armselV2Pasiv($pPasivo='') {   //--- arma select Pasivo
	$sql_transac = "SELECT * FROM `a_pasivo` WHERE `a_estatus_pasivo`='3' OR `a_estatus_pasivo`='A'";
	$link = mysql_connect("localhost",NAME_USER,PASS_USER);
	$db_selected = mysql_select_db(BASE_DE_DATOS,$link);
	$result1 = mysql_query($sql_transac,$link);
	if ($result1 && mysql_num_rows($result1) >= 1) {
		echo '<select name="lstPasi" class="cuadro_textbox_5B">';
		while ($rows = mysql_fetch_array($result1, MYSQL_ASSOC)) {
			if ($pPasivo == $rows['a_estatus_pasivo']) {
				echo '<option selected="selected" value="'.$rows['a_estatus_pasivo'].'">'.$rows['detalle_pasivo'].'</option>';
			}
			else {
				echo '<option value="'.$rows['a_estatus_pasivo'].'">'.$rows['detalle_pasivo'].'</option>';
			}
		}
		echo '</select>';
		mysql_free_result($result1);
		mysql_close($link);
		return;
	}
}
//--------------------------------------------------------------------------------------------------------------------
//
//   F U N C I O N E S   C O N   A _ M O D A L I D A D _ I N G R E S O
//
//--------------------------------------------------------------------------------------------------------------------
function armselModdIngr() {   //--- arma select Modalidad de Ingreso
	$sql_transac = "SELECT * FROM `a_modalidad_ingreso`";
	$link = mysql_connect("localhost",NAME_USER,PASS_USER);
	$db_selected = mysql_select_db(BASE_DE_DATOS,$link);
	$result1 = mysql_query($sql_transac,$link);
	if ($result1 && mysql_num_rows($result1) >= 1) {
		echo '<select name="lstModIng" class="cuadro_textbox_5B">';
		while ($rows = mysql_fetch_array($result1, MYSQL_ASSOC)) {
			echo '<option value="'.$rows['a_modalidad_ingreso'].'">'.$rows['detalle_modalidad_ingreso'].'</option>';
		}
		echo '</select>';
		mysql_free_result($result1);
		mysql_close($link);
		return;
	}
}
function armselV2ModdIngr($pModIngreso='') {   //--- arma select Versión 2 Modalidad de Ingreso
	$sql_transac = "SELECT * FROM `a_modalidad_ingreso`";
	$link = mysql_connect("localhost",NAME_USER,PASS_USER);
	$db_selected = mysql_select_db(BASE_DE_DATOS,$link);
	$result1 = mysql_query($sql_transac,$link);
	if ($result1 && mysql_num_rows($result1) >= 1) {
		echo '<select name="lstModIng" class="cuadro_textbox_5B">';
		while ($rows = mysql_fetch_array($result1, MYSQL_ASSOC)) {
			if ($pModIngreso == $rows['a_modalidad_ingreso']) {
				echo '<option selected="selected" value="'.$rows['a_modalidad_ingreso'].'">'.$rows['detalle_modalidad_ingreso'].'</option>';
			}
			else {
				echo '<option value="'.$rows['a_modalidad_ingreso'].'">'.$rows['detalle_modalidad_ingreso'].'</option>';
			}
		}
		echo '</select>';
		mysql_free_result($result1);
		mysql_close($link);
		return;
	}
}
//--------------------------------------------------------------------------------------------------------------------
//
//   F U N C I O N E S   C O N   D O C U M E N T O S
//
//--------------------------------------------------------------------------------------------------------------------
function DTparaD() {   //--- Dibuja Tabla para Documentos
	$sql_transac = "SELECT * FROM `documentos`";
	$link = mysql_connect("localhost",NAME_USER,PASS_USER);
	$db_selected = mysql_select_db(BASE_DE_DATOS,$link);
	$result1 = mysql_query($sql_transac,$link);
	if ($result1 && mysql_num_rows($result1) >= 1) {
		echo '<table width="100%" border="0" cellspacing="0" cellpadding="0">';
		echo '<tr class="descripcion"><th height="20" colspan="2" scope="col">Documento a Retirar</th>';
		echo '<th width="44%" height="20" scope="col">Observaci&oacute;n</th></tr>';
		$i = 0;
		while ($rows = mysql_fetch_array($result1, MYSQL_ASSOC)) {
			if ( $i > 0 ) {
				echo '<input type="hidden" name="txtVecDocs['.$i.'][id_documento]" value="'.$rows['id_documento'].'"  />';
				if ($i % 2) {
					echo '<tr height="30" bgcolor="#C0D0F5" class="RotuloTabla1">';
				}
				else {
					echo '<tr height="30" bgcolor="#A5B1ED" class="RotuloTabla1">';
				}
				echo '<td width="4%" valign="middle">';
				echo '<input type="checkbox" checked="checked" name="txtVecDocs['.$i.'][chkAnexar]" value="'.$rows['id_documento'].'" title="'.$rows['id_documento'].'" /></td>';
				echo '<td width="52%" align="left" valign="middle">'.$rows['detalle_documento'].'</td>';
				echo '<td width="44%" valign="middle" align="left">';
				echo '<input type="text" name="txtVecDocs['.$i.'][Observacion]" value="" title="Indique alguna Observaci&oacute;n particular para este documento..." size="35" maxlength="100" style="font-weight: bold; font-style: italic; text-align: justify; color: #262626; font-family: \'Comic Sans MS\', cursive; font-size: 11.0px; line-height: 20px;" /></td></tr>';
			}
			$i++;
		}
		echo '<tr><td colspan="3" height="5" class="description">&nbsp;</td></tr></table>';
	}
	mysql_free_result($result1);
	mysql_close($link);
	return;
}
//--------------------------------------------------------------------------------------------------------------------
//
//   F U N C I O N E S   C O N   A _ D O C U M E N T O S _ R E T I R A D O S
//
//--------------------------------------------------------------------------------------------------------------------
function DocQeRet($pCedula=0,$pIdRetiro=0,$pIdDocumento=0,$pObservacion='') {   //--- Documentos Que Retira
	$sql_transac = "INSERT INTO `a_documentos_retirados` (`a_ci`,`id_retiro`,`id_documento`,`observacion_documento`) VALUES (".$pCedula.",'".$pIdRetiro."',".$pIdDocumento.",'".$pObservacion."')";
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
function DocQRyLosQNo($pCedula=0,$pIdRetiro='') {
	$sql_transac = "SELECT * FROM (`esucdiga_digaesuc`.`documentos` `docu` left join `esucdiga_digaesuc`.`_vista_compuesta_de_retiros` `reti` ON ((`docu`.`id_documento` = `reti`.`iddocumento` AND `reti`.`aci` = ".$pCedula." AND `reti`.`idretiro` = '".$pIdRetiro."'))) ORDER BY `idretiro` DESC";
	$link = mysqli_connect("localhost",NAME_USER,PASS_USER,BASE_DE_DATOS);
	$result1 = mysqli_query($link,$sql_transac);
	mysqli_data_seek($result1, 0);
	if ($result1 && mysqli_num_rows($result1) >= 1) {
		echo '<table width="100%" border="0" cellspacing="0" cellpadding="0">';
		echo '<tr class="descripcion"><th height="20" colspan="2" scope="col">Documento(s) en Retiro</th>';
		echo '<th width="44%" height="20" scope="col">Observaci&oacute;n</th></tr>';
		$i = 1;
		$cabecera = true;
		while ($rows = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
			echo '<input type="hidden" name="txtVecDocs['.$i.'][id_retiro]" value="'.$pIdRetiro.'"  />';
			echo '<input type="hidden" name="txtVecDocs['.$i.'][a_ci]" value="'.$pCedula.'"  />';
			echo '<input type="hidden" name="txtVecDocs['.$i.'][id_documento]" value="'.$rows['id_documento'].'"  />';
			echo '<input type="hidden" name="txtVecDocs['.$i.'][detalle_documento]" value="'.$rows['detalle_documento'].'"  />';
			if ( !is_null($rows['idretiro']) && isset($rows['idretiro']) && !empty($rows['idretiro']) ) {
				if ($i % 2) {
					echo '<tr height="30" bgcolor="#C0D0F5" class="RotuloTabla1">';
				}
				else {
					echo '<tr height="30" bgcolor="#A5B1ED" class="RotuloTabla1">';
				}
				echo '<td width="4%" valign="middle">';
				echo '<input type="checkbox" checked="checked" name="txtVecDocs['.$i.'][chkAnexar]" value="'.$rows['id_documento'].'" /></td>';
				echo '<td width="52%" align="left" valign="middle">'.$rows['detalle_documento'].'</td>';
				echo '<td width="44%" valign="middle" align="left">';
				echo '<input type="text" name="txtVecDocs['.$i.'][Observacion]" value="'.$rows['observacion_del_documento'].'" title="Indique alguna Observaci&oacute;n particular para este documento..." size="35" maxlength="100" style="font-weight: bold; font-style: italic; text-align: justify; color: #262626; font-family: \'Comic Sans MS\', cursive; font-size: 11.0px; line-height: 20px;" /></td></tr>';
			}
			if ( is_null($rows['idretiro']) ) {
				if ( $cabecera ) {
					echo '<tr style="background: linear-gradient(to bottom, rgba(137,0,0,1) 0%,rgba(204,112,112,1) 100%); color: #FFF;"><td height="20" colspan="2"><div style="font-size: 12px; font-weight: bold; font-family: Verdana, Geneva, sans-serif; line-height: 35px; text-align: center;">Documento(s) a Anexar</div></td>';
					echo '<td width="44%" height="20"><div style="font-size: 12px; font-weight: bold; font-family: Verdana, Geneva, sans-serif; line-height: 35px; text-align: center;">Observaci&oacute;n</div></td></tr>';
					$cabecera = false;
				}
				else {
					if ($i % 2) {
						echo '<tr height="30" style="background: linear-gradient(to bottom,  rgba(247,237,247,0.62) 0%,rgba(249,227,244,0.62) 15%,rgba(252,206,237,0.62) 46%,rgba(252,204,236,0.62) 49%,rgba(252,229,249,0.62) 89%,rgba(252,236,252,0.62) 100%);">';
					}
					else {
						echo '<tr height="30" style="background: linear-gradient(to bottom,  rgba(252,229,229,0.63) 0%,rgba(252,229,229,0.63) 11%,rgba(252,219,219,0.63) 15%,rgba(253,182,182,0.63) 30%,rgba(254,144,144,0.79) 45%,rgba(254,146,146,0.8) 46%,rgba(253,185,185,0.63) 66%,rgba(252,219,219,0.63) 84%,rgba(252,229,229,0.63) 89%,rgba(252,229,229,0.63) 100%);">';
					}
					echo '<td width="4%" valign="middle"><input type="checkbox" name="txtVecDocs['.$i.'][chkAnexar]" value="'.$rows['id_documento'].'" /></td>';
					echo '<td width="52%" align="left" valign="middle">'.$rows['detalle_documento'].'</td>';
					echo '<td width="44%" valign="middle" align="left">';
					echo '<input type="text" name="txtVecDocs['.$i.'][Observacion]" value="" title="Indique alguna Observaci&oacute;n particular para este documento..." size="35" maxlength="100" style="font-weight: bold; font-style: italic; text-align: justify; color: #262626; font-family: \'Comic Sans MS\', cursive; font-size: 11.0px; line-height: 20px;" /></td></tr>';
				}
			}
		$i++;
		}
		echo '<tr><td colspan="3" height="5" class="description">&nbsp;</td></tr></table>';
	}
	mysqli_free_result($result1);
	mysqli_close($link);
	return;
}
//--------------------------------------------------------------------------------------------------------------------
//
//   F U N C I O N E S   C O N   M A E S T R O   D E   P A I S E S
//
//--------------------------------------------------------------------------------------------------------------------
function MPaisAM($pInsUpd = false, $pIU = 0, $pPais = ' ', $pRegion = '') {   //---------- Maestro País Actuliza Maestro
	$sql_insert = "INSERT INTO `a_paises` (`pais_nacimiento`,`detalle_pais`,`region_pais`) VALUES (NULL,'".$pPais."','".$pRegion."');";
	$sql_update = "UPDATE `a_paises` SET `detalle_pais`='".$pPais."',`region_pais`='".$pRegion."' WHERE `a_paises`.`pais_nacimiento` =".$pIU;
	$link = mysqli_connect("localhost",NAME_USER,PASS_USER,BASE_DE_DATOS);
	if ($pInsUpd) {
		mysqli_query($link,$sql_insert);
	}
	else {
		mysqli_query($link,$sql_update);
	}
	mysqli_close($link);
}
function MtlPaises() {   //---------- Muestra todos los Paises
	$sql_string = "SELECT * FROM `a_paises`";
	$link = mysqli_connect("localhost",NAME_USER,PASS_USER,BASE_DE_DATOS);
	$result1 = mysqli_query($link,$sql_string);
	mysqli_data_seek($result1, 0);
	if ($result1 && mysqli_num_rows($result1) >= 1) {
		$i = 1;
        echo '<table width="100%" border="0" cellspacing="0" cellpadding="0">';
        echo '<tr class="MenBusqueda">';
        echo '<td width="12%" height="23" align="center" valign="middle" bgcolor="#E9F3FC">#</td>';
        echo '<td width="44%" height="23" align="center" valign="middle" bgcolor="#E9F3FC">PA&Iacute;S</td>';
        echo '<td width="44%" height="23" align="center" valign="middle" bgcolor="#E9F3FC">REGI&Oacute;N</td>';
        echo '</tr>';
		while ($rows = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
			if ($i % 2) {
				echo '<tr height="23" align="center" valign="middle" bgcolor="#BBF7F7">';
			}
			else {
				echo '<tr height="23" align="center" valign="middle" bgcolor="#CDE3F8">';
			}
			echo '<td><strong>'.$rows['pais_nacimiento'].'</strong></td>';
			echo '<td><strong>'.$rows['detalle_pais'].'</strong></td>';
			echo '<td><strong>'.$rows['region_pais'].'</strong></td></tr>';
			$i++;
		}
		echo '</table>';
		mysqli_free_result($result1);
	}
	mysqli_close($link);
	return;
}
//--------------------------------------------------------------------------------------------------------------------
//
//   F U N C I O N E S   S O L I C I T U D E S   P A R A   T A Q U I L L A   D E   A R C H I V O
//
//--------------------------------------------------------------------------------------------------------------------
function CEdSdTdA($pId=0) {	///--- Consulta Especifica de Solicitudes de Taquilla de Archivo
	$sql_string = "SELECT * FROM `sds_taquilla_archivo` WHERE `id_sds_taquilla_archivo` = ".$pId;
	$seguimiento = "";
	$link = mysqli_connect("localhost",NAME_USER,PASS_USER,BASE_FORANEA_DE_DATOS);
	if (mysqli_connect_errno($link)) {
		$seguimiento .= 'Conecci&oacute;n fallida:<br />N&uacute;mero:'.mysqli_connect_errno($link).'<br />Mensaje:'.mysqli_connect_error($link).'<br />';
	}
	else {
		$seguimiento .= 'Conectando y Desplegando...!<br />';
	}
	$result1 = mysqli_query($link,$sql_string);
	if ($result1 && mysqli_num_rows($result1) >= 1) {
		$seguimiento .= 'Seleccionado(s) '.mysqli_num_rows($result1).' registro(s)...<br />';
		$row = mysqli_fetch_array($result1, MYSQLI_ASSOC);
		mysqli_free_result($result1);
		mysqli_close($link);
		return($row);
	}
	else {
		$seguimiento .= 'No hay informaci&oacute;n que mostrar...<br />';
		$seguimiento .= 'Instrucci&oacute;n:<br />'.$sql_string.'<br />';
	}
	mysqli_close($link);
	return($seguimiento);
}
function CGdSdTdA($pFInicial='',$pFFinal='',$pQFecha='') {   ///--- Consulta General de Solicitudes de Taquilla de Archivo
	//Valores posibles: Realizada, Asignada y Solicitada
	$aux1 = ($pQFecha == "Realizada") ? " WHERE `fecha_solicitud` >= '".$pFInicial."' AND `fecha_solicitud` <= '".$pFFinal."'" : ($pQFecha == "Asignada") ? " WHERE `fecha_asignada` >= '".$pFInicial."' AND `fecha_asignada` <= '".$pFFinal."'" : ($pQFecha == "Solicitada") ? " WHERE `fecha_solicitada` >= '".$pFInicial."' AND `fecha_solicitada` <= '".$pFFinal."'" : "";
	$sql_string = "SELECT * FROM `sds_taquilla_archivo`".$aux1;
	$seguimiento = "";
	$link = mysqli_connect("localhost",NAME_USER,PASS_USER,BASE_FORANEA_DE_DATOS);
	if (mysqli_connect_errno($link)) {
		$seguimiento .= 'Conecci&oacute;n fallida:<br />N&uacute;mero:'.mysqli_connect_errno($link).'<br />Mensaje:'.mysqli_connect_error($link).'<br />';
	}
	else {
		$seguimiento .= 'Conectando y Desplegando...!<br />';
	}
	$result1 = mysqli_query($link,$sql_string);
	//mysqli_data_seek($result1, 0);
	if ($result1 && mysqli_num_rows($result1) >= 1) {
		$seguimiento .= 'Seleccionado(s) '.mysqli_num_rows($result1).' registro(s)...<br />';
		$i = 1;
        echo '<table width="100%" border="0" cellspacing="3" cellpadding="2">';
	    echo '<tr><td height="30" bgcolor="#FF8AFF"><strong>CI</strong></td>';
		echo '<td height="30" bgcolor="#FF8AFF"><strong>Nombres</strong></td>';
	    echo '<td height="30" bgcolor="#FF8AFF"><strong>Tel&eacute;fono</strong></td>';
	    echo '<td height="30" bgcolor="#FF8AFF"><strong>E-mail</strong></td>';
	    echo '<td height="30" bgcolor="#FF8AFF"><strong>Servicio</strong></td>';
	    echo '<td height="30" bgcolor="#FF8AFF"><strong>Estatus</strong></td>';
	    echo '<td height="30" bgcolor="#FF8AFF" title="Fecha en que hizo la solicitud..."><strong>Fecha</strong></td>';
	    echo '<td height="30" bgcolor="#FF8AFF" title="Fecha que esta solicitando..."><strong>Solicitada</strong></td>';
	    echo '<td height="30" bgcolor="#FF8AFF" title="Fecha que se le asign&oacute;..."><strong>Asignada</strong></td>';
	    echo '<td height="30" bgcolor="#FF8AFF" title="Acciones posibles: MODIFICAR&bull;ELIMINAR">&nbsp;</td></tr>';
		while ($rows = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
			if ($i % 2) {
				echo '<tr height="30" align="center" valign="middle" bgcolor="#FFD2E9">';
			}
			else {
				echo '<tr height="30" align="center" valign="middle" bgcolor="#FFEEDD">';
			}
			echo '<td>'.$rows['cedula'].'</td>';
			echo '<td>'.$rows['nombre'].'</td>';
			echo '<td>'.$rows['telefono'].'</td>';
			echo '<td>'.$rows['correo'].'</td>';
			echo '<td>'.$rows['servicio_solicitado'].'</td>';
			echo '<td>'.$rows['estatus_solicitud'].'</td>';
			echo '<td title="Fecha en que hizo la solicitud...">'.$rows['fecha_solicitud'].'</td>';
			echo '<td title="Fecha que esta solicitando...">'.$rows['fecha_solicitada'].'</td>';
			echo '<td title="Fecha que se le asign&oacute;...">'.$rows['fecha_atencion'].'</td>';
			echo '<td title="Acciones posibles: MODIFICAR&bull;ELIMINAR"><a href="form-taquilla-archivo-consulta-de-solicitudes-editar.php?ID='.$rows['id_sds_taquilla_archivo'].'" target="_self"><img src="../img/editar.png" width="25" height="26" alt="Editar" /></a><a href="form-taquilla-archivo-consulta-de-solicitudes-eliminar.php?ID='.$rows['id_sds_taquilla_archivo'].'" target="_self"><img src="../img/eliminar.png" width="25" height="26" alt="Eliminar" /></a></td></tr>';
			$i++;
		}
		echo '<tr><td height="10" bgcolor="#FF8AFF">&nbsp;</td>';
	    echo '<td height="10" bgcolor="#FF8AFF">&nbsp;</td>';
	    echo '<td height="10" bgcolor="#FF8AFF">&nbsp;</td>';
	    echo '<td height="10" bgcolor="#FF8AFF">&nbsp;</td>';
	    echo '<td height="10" bgcolor="#FF8AFF">&nbsp;</td>';
	    echo '<td height="10" bgcolor="#FF8AFF">&nbsp;</td>';
	    echo '<td height="10" bgcolor="#FF8AFF">&nbsp;</td>';
	    echo '<td height="10" bgcolor="#FF8AFF">&nbsp;</td>';
	    echo '<td height="10" bgcolor="#FF8AFF">&nbsp;</td>';
	    echo '<td height="10" bgcolor="#FF8AFF">&nbsp;</td></tr></table>';
		mysqli_free_result($result1);
	}
	else {
		$seguimiento .= 'No hay informaci&oacute;n que mostrar...<br />';
		$seguimiento .= 'Instrucci&oacute;n:<br />'.$sql_string.'<br />';
	}
	mysqli_close($link);
	return($seguimiento);
}
function IuSDSTaqDA($pCI=0,$pNom='',$pEmail='',$pTel='',$pServ='',$pFechA='',$pPorQue='') {   ///--- Inserta una Solicitud De Servicio Taquilla De Archivo
	$sql_string = "INSERT INTO `sds_taquilla_archivo` (`cedula`,`nombre`,`correo`,`telefono`,`fecha_solicitada`,`servicio_solicitado`, `motivo_fecha_solicitada`,`estatus_solicitud`,`fecha_solicitud`) VALUES ('".$pCI."','".$pNom."','".$pEmail."','".$pTel."','".$pFechA."','".$pServ."','".$pPorQue."','Solicitud pendiente por realizar',DATE_FORMAT(NOW(),'%Y-%m-%d'))";
	$seguimiento = "";
	$link = mysqli_connect("localhost",NAME_USER,PASS_USER,BASE_FORANEA_DE_DATOS);
	if (mysqli_connect_errno($link)) {
		$seguimiento .= 'Conecci&oacute;n fallida:<br />N&uacute;mero:'.mysqli_connect_errno($link).'<br />Mensaje:'.mysqli_connect_error($link).'<br />';
	}
	else {
		$seguimiento .= 'Conectando e Insertando...!<br />';
	}
	mysqli_query($link,$sql_string);
	if (mysqli_affected_rows($link) == 1){
		$seguimiento .= mysqli_affected_rows($link).' registro insertado...!<br />';
	}
	else {
		$seguimiento .= 'Inserci&oacute;n fallida...!<br />Instrucci&oacute;n:<br />'.$sql_string.'<br>N&uacute;mero:'.mysqli_errno($link).'<br />Mensaje:'.mysqli_error($link);
	}
	mysqli_close($link);
	return($seguimiento);
}
function AFechALaSol($pFechaAsignada='',$pIDUnico=0,$pObs='') {   //---- Asigna Fecha A La Solicitud
	//UPDATE `esucdiga_tablas_foraneas`.`sds_taquilla_archivo` SET `fecha_atencion` = '2014-07-03' WHERE `sds_taquilla_archivo`.`id_sds_taquilla_archivo` = 2;
	return;
}
function EUSol($pIDUnico=0) {   //---- Elimina Una Solicitud
	$sql_string = "DELETE FROM `sds_taquilla_archivo` WHERE `id_sds_taquilla_archivo` = ".$pIDUnico;
	$seguimiento = "";
	$link = mysqli_connect("localhost",NAME_USER,PASS_USER,BASE_FORANEA_DE_DATOS);
	if (mysqli_connect_errno($link)) {
		$seguimiento .= 'Conecci&oacute;n fallida:<br />N&uacute;mero:'.mysqli_connect_errno($link).'<br />Mensaje:'.mysqli_connect_error($link).'<br />';
	}
	else {
		$seguimiento .= 'Conectando y Eliminando...!<br />';
	}
	mysqli_query($link,$sql_string);
	if (mysqli_affected_rows($link) == 1){
		$seguimiento .= mysqli_affected_rows($link).' registro eliminado...!<br />';
	}
	else {
		$seguimiento .= 'Eliminaci&oacute;n fallida...!<br />Instrucci&oacute;n:<br />'.$sql_string.'<br>N&uacute;mero:'.mysqli_errno($link).'<br />Mensaje:'.mysqli_error($link);
	}
	mysqli_close($link);
	return($seguimiento);
}
//--------------------------------------------------------------------------------------------------------------------
//
//   F U N C I Ó N   Ú N I C A   D E   E R R O R
//
//--------------------------------------------------------------------------------------------------------------------
function ErrPer($errno, $errstr, $errfile, $errline) {   //---------- Error Personalizado
	echo '<hr /><table width="50%" border="1" bgcolor="#000066" bordercolor="#0000CC">';
	echo '<tr><td height="26" colspan="2" align="center" class="RotuloTablaBlanco">&bull;&nbsp;Error...!&nbsp;&bull;</td></tr>';
	echo '<tr><td width="12%" height="26" align="center" class="RotuloTablaBlanco">&laquo;N&uacute;mero&raquo;</td>';
	echo '<td width="88%" height="26" align="center" class="RotuloTablaBlanco">&laquo;Descripci&oacute;n&raquo;</td></tr>';
	echo '<tr><td height="26" align="center" class="RotuloTablaBlanco">'.$errno.'</td>';
	echo '<td height="26" class="RotuloTablaBlanco">'.$errstr.'</td></tr>';
	echo '<tr><td align="center" class="RotuloTablaBlanco">&laquo;L&iacute;nea&raquo;</td>';
	echo '<td align="center" class="RotuloTablaBlanco">&laquo;Programa/Procedimiento&raquo;</td></tr>';
	echo '<tr><td align="center" class="RotuloTablaBlanco">'.$errline.'</td>';
	echo '<td align="center" class="RotuloTablaBlanco">'.$errfile.'</td></tr>';
	echo '<tr><td height="26" colspan="2" align="center" class="RotuloTablaBlanco">PHP '.phpversion().'</td></tr></table><hr />';
    /* Don't execute PHP internal error handler */
    return true;
}
?>