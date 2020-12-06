<?php
require_once('funciones.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=latin1" />
<link href="css/estilo.css" rel="stylesheet" type="text/css" />
<title>Revisión del Registro de Inscripciones</title>
</head>

<body>
<div align="center"><div align="center" style="margin: 30px 5px 30px 5px;"><a href="menu_usuario.php" class="link3">&lt;&lt;Regresar</a></div>
<?php
$link1 = mysqli_connect("www.inscripciones.uc.edu.ve","carnets","c4rn3tus3r","dices");

$link2 = mysqli_connect("localhost","digaes_carnet","digaes_carnet","digae_carnet");

if (!$link1) die('Error de Conexión (' . mysqli_connect_errno($link1) . ') ');

if (!$link2) die('Error de Conexión (' . mysqli_connect_errno($link2) . ') ');

if ($result = mysqli_query($link1,"SELECT * FROM view_carnets")) {
	$row_cnt = mysqli_num_rows($result);
	$linea = 0;
	echo '<table width="80%" border="0" cellspacing="0" cellpadding="0">';
	echo '<tr style="color:#FFF; font-family:Verdana, Geneva, sans-serif; font-size:10px; font-weight:bold;">';
	echo '<td width="4%" height="30" align="center" valign="middle" bgcolor="#005E5E">Nac.</td>';
	echo '<td width="6%" height="30" align="center" valign="middle" bgcolor="#005E5E">C&eacute;dula</td>';
	echo '<td width="11%" height="30" align="center" valign="middle" bgcolor="#005E5E">1Er. Nombre</td>';
	echo '<td width="11%" height="30" align="center" valign="middle" bgcolor="#005E5E">2Do. Nombre</td>';
	echo '<td width="11%" height="30" align="center" valign="middle" bgcolor="#005E5E">1Er. Apellido</td>';
	echo '<td width="11%" height="30" align="center" valign="middle" bgcolor="#005E5E">2Do. Apellido</td>';
	echo '<td width="6%" height="30" align="center" valign="middle" bgcolor="#005E5E">Facultad</td>';
	echo '<td width="5%" height="30" align="center" valign="middle" bgcolor="#005E5E">Escuela</td>';
	echo '<td width="6%" height="30" align="center" valign="middle" bgcolor="#005E5E" title="Fecha de Registro...">Fecha</td>';
	echo '<td width="7%" height="30" align="center" valign="middle" bgcolor="#005E5E" title="Insertado...">I.</td>';
	echo '</tr>';
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		// el campo $row["generado"] no se usa
		// el campo $row["fecha_registro"] siempre sale null
		$linea++;
		$pAuxEsc = ($pEsc == '118') ? '114' : $pEsc;
		echo '<tr style="font-family:Verdana, Geneva, sans-serif; font-size:10px;  font-weight:bold;">';
		echo '<td bgcolor="'.((($linea%2) == 0)?'#DDFFFF':'#CEFFE7').'" height="30" align="center" valign="middle">'.$row["nacionalidad"].'</td>';
		echo '<td bgcolor="'.((($linea%2) == 0)?'#DDFFFF':'#CEFFE7').'" height="30" align="center" valign="middle">'.$row["cedula"].'</td>';
		echo '<td bgcolor="'.((($linea%2) == 0)?'#DDFFFF':'#CEFFE7').'" height="30" align="center" valign="middle">'.$row["primer_nombre"].'</td>';
		echo '<td bgcolor="'.((($linea%2) == 0)?'#DDFFFF':'#CEFFE7').'" height="30" align="center" valign="middle">'.$row["segundo_nombre"].'</td>';
		echo '<td bgcolor="'.((($linea%2) == 0)?'#DDFFFF':'#CEFFE7').'" height="30" align="center" valign="middle">'.$row["primer_apellido"].'</td>';
		echo '<td bgcolor="'.((($linea%2) == 0)?'#DDFFFF':'#CEFFE7').'" height="30" align="center" valign="middle">'.$row["segundo_apellido"].'</td>';
		echo '<td bgcolor="'.((($linea%2) == 0)?'#DDFFFF':'#CEFFE7').'" height="30" align="center" valign="middle">'.$row["facultad"].'</td>';
		echo '<td bgcolor="'.((($linea%2) == 0)?'#DDFFFF':'#CEFFE7').'" height="30" align="center" valign="middle">'.$row["carrera"].'</td>';
		echo '<td bgcolor="'.((($linea%2) == 0)?'#DDFFFF':'#CEFFE7').'" height="30" align="center" valign="middle">'.date('j-n-Y').'</td>';
		echo '<td bgcolor="'.((($linea%2) == 0)?'#DDFFFF':'#CEFFE7').'" height="30" align="center" valign="middle">'.contrastalo($row["nacionalidad"],$row["cedula"],$row["primer_nombre"],$row["segundo_nombre"],$row["primer_apellido"],$row["segundo_apellido"],$pAuxEsc,$row["facultad"],date("Y-m-d H:i:s",time()),'sistema'.date('j-n-Y'),$link2).'</td>';
		echo '</tr>';
	}
	echo '</table>';
}
mysqli_free_result($result);
mysqli_close($link1);
mysqli_close($link2);
?>
<div align="center" style="margin: 30px 5px 30px 5px;"><a href="menu_usuario.php" class="link3">&lt;&lt;Regresar</a></div></div>
</body>
</html>