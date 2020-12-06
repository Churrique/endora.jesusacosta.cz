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
  <td height="40" align="center" valign="middle"><!-- InstanceBeginEditable name="EditRegion1" --><div align="center">
<br /><a href="form-sacar-foto-2.php" title="Pulse aqui para regresar..." target="_self">&laquo;Regresar&raquo;</a><br />
<table width="50%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td height="40">
<?php
$status = "";
if ( isset( $_POST["btnUpload"] ) ) {
       if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
              $ip=$_SERVER['HTTP_CLIENT_IP'];
       } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
              $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
       }else{
              $ip=$_SERVER['REMOTE_ADDR'];
       }
	   if ( $ip == '::1' ) $ip = '127.0.0.1';
	// ruta de montaje
	// ../fotoalbun/uploads
    // obtenemos los datos del archivo 
    $tamano = $_FILES["file"]['size'];
    $tipo = $_FILES["file"]['type'];
    $archivo = $_FILES["file"]['name'];
    $prefijo = substr(md5(uniqid(rand())),0,6);
    $destino =  "../uploads/" . $archivo . '.' . texto_aleatorio(4);
	$dir_tmp = 'IP'.$ip.'_P'.$prefijo.'_D'.date('d').'M'.date('m').'A'.date('Y').'H'.date('H').'M'.date('i').'S'.date('s');
	$archivozip = '../downloads/' . $dir_tmp . '/' . $prefijo . '.zip';
	$comprimidos = 0;
	$procesados = 0;
	
	echo "Tama&ntilde;o: $tamano bytes<br />";
	echo "Tipo: $tipo <br />";
	echo "Archivo: $archivo <br />";
	echo "ZIP: $archivozip  <br />";
	if ( mkdir( '../downloads/' . $dir_tmp  ) ) {
		echo "Directorio donde se copiaran las fotos y el comprimido: $dir_tmp <br />";
	}
	else {
		echo 'No se pudo crear el directorio &quot; '.$dir_tmp.' &quot;...';
	}
	if ( is_uploaded_file($_FILES['file']['tmp_name']) ) {
		echo "el archivo fue transferido satisfactoriamente...<br />";
	}
	else {
		echo "el archivo NO se transfiri&oacute;...<br />";
	}
	
	echo "Error?:".$_FILES['file']['error']."<br />";
    
    if ($archivo != "") {
		if ( is_uploaded_file($_FILES['file']['tmp_name']) ) {
			echo "Destino: ".$destino."<br />";
			echo "Ubicacion Temporal: ".$_FILES['file']['tmp_name']."<br />";
			if ( move_uploaded_file($_FILES['file']['tmp_name'], $destino ) ) {
				$status = "Archivo montado y en su sitio definitivo...!</b>";
			} else {
				$status = "El archivo no se pudo mover al directorio definitivo...!</b>";
			}
		}
		else {
			echo "El archivo no se pudo montar...!";
		}
    } else {
        $status = "No se puede subir el archivo, no se obtuvo el nombre...!</b>";
    }
}
echo $status."</b>";
?>
</td>
</tr>
<tr>
<td height="40">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<?php
$fila = 0;
$icedula = 0;
$aviso = FALSE;
$se_encontro_el_rotulo = FALSE;
if ( ( $handle = fopen( $destino, "r" ) ) !== FALSE ) {
    while ( ( $data = fgetcsv( $handle, 1000, "," ) ) !== FALSE ) {
        $columnas_totales = count($data);
        //echo 'Columnas totales: '. $columnas_totales . '<br />';
        for ( $columna = 0; $columna < $columnas_totales; $columna++ ) {
			if ( $fila == 0 ) {
				if ( $data[$columna] == "CEDULA" || $data[$columna] == "cedula" ) {
					$icedula = $columna;
					echo "La columna $columna representa la C&eacute;dula<br />\n";
					$se_encontro_el_rotulo = TRUE;
				}
			}
			else {
				if ( $se_encontro_el_rotulo ) {
					if ( $columna == $icedula ) {
						$procesados++;
						//echo '<tr><td height="40" width="100%" align="center" valign="middle">';
						//echo 'FILA: ' . $fila . ' || ' . 'COLUMNA: ' . $columna .' || ' . $data[$icedula] . "</td></tr>";
						// llamar aqui la función para buscar el directorio en la tabla y copiarlo
						$registro_de_fotos = ConsuFoto( $data[$icedula] );
						if ( is_bool($registro_de_fotos) ) {
							echo '<tr><td height="20" width="100%" align="center" valign="middle" bgcolor="#FFE6FF">';
							echo 'C&eacute;dula NO ENCONTRADA...! ==> ' . $data[$icedula] .'</td></tr>';
						}
						else {
							if ( copy( $registro_de_fotos['ruta'] . '/' . $registro_de_fotos['archivo'] , '../downloads/' . $dir_tmp . '/' . $registro_de_fotos['archivo'] ) ) {
								echo '<tr><td height="20" width="100%" align="center" valign="middle" bgcolor="#FFFFEA">';
								echo 'Archivo copaido...!</td></tr>';
							}
							else {
								echo '<tr><td height="20" width="100%" align="center" valign="middle" bgcolor="#FF7575">';
								echo 'No se pudo copiar el archivo...!</td></tr>';
							}
						}
					}
				}
			}
        }   //--- for ( $columna = 0; $columna < $columnas_totales; $columna++ )
		$fila++;
		if ( $fila > 1 && !$se_encontro_el_rotulo && !$aviso) {
			echo "No se ha determinado la columna correspondiente a la C&eacute;dula...<br />";
			$aviso = TRUE;
		}
    }   //--- while ( ( $data = fgetcsv( $handle, 1000, "," ) ) !== FALSE )
    fclose($handle);
	echo $procesados . ' registros procesados...<br />';
							//Creamos el archivo  
							$zip = new ZipArchive();
							//Si lo abre, es porque no existe ningun zip con ese nombre
							if ($zip->open($archivozip, ZIPARCHIVE::CREATE)==TRUE) {
								//Por cada elemento dentro del directorio
								foreach (scandir('../downloads/' . $dir_tmp) as $item) {
									//Evitamos la carpeta actual y la anterior
									if ($item == '.' || $item == '..') continue;
									$zip->addFile('../downloads/' . $dir_tmp . '/' . $item);
									//echo 'Comprimiendo ' . $item . ' ...<br />';
									$comprimidos++;
								}
								//Cerramos el archivo
								$zip->close();
								echo $comprimidos . ' archivos comprimidos <br />';
							}
							else {
								echo 'No se pudo crear ' . $archivozip . ' ...!<br />';
							}
							echo '<a href="' . $archivozip . '" target="_new">Descargar el ZIP</a>';
}
else {
	echo "No se puede abrir el archivo...!";
}
?>
</table>
</td>
</tr>
</table>
<br /><a href="form-sacar-foto-2.php" title="Pulse aqui para regresar..." target="_self">&laquo;Regresar&raquo;</a>
</div><!-- InstanceEndEditable --></td>
  </tr>
</table>
</div>
</body>
<!-- InstanceEnd --></html>