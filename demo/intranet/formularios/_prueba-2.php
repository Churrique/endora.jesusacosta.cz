<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php require_once('../funciones/valida-funciones.php'); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<form name="FrmPrueba" method="post">
<br /><?php

// Si la base de datos tiene muchos datos habilitar esto
// set_time_limit(0);


//header('Content-type: text/plain');

//$clocal = mysql_connect('localhost', NAME_USER, PASS_USER);
$cremoto = mysql_connect('190.170.68.234', NAME_USER, PASS_USER);

// De que base de datos vamos a tomar las tablas
$db_from = BASE_FORANEA_DE_DATOS;
// A que base de datos vamos a migrar las tablas
$db_to = BASE_FORANEA_DE_DATOS;
// Con los datos o no
$data = true;


// Leemos todas las tablas de db_from
$sql = "SHOW TABLES FROM $db_from";

$result = mysql_query($sql);

$list_tables = array();
while ($row = mysql_fetch_assoc($result))
{
   $list_tables[] = current($row);
   echo '<input name="chkTablas" type="checkbox" dir="ltr" lang="es" value="'.current($row).'" checked="checked" />'.current($row).'<br />';
}

//// Migramos las estructuras de las tablas
//foreach ($list_tables as $tbname)
//{
//   $sql = "CREATE TABLE IF NOT EXISTS $db_to.$tbname LIKE $db_from.$tbname";
//   $result = mysql_query($sql);
//   if ($result)
//   {
//      echo "Migrada la estructura de la tabla $db_from.$tbname a $db_to.$tbname \n";
//   }
//
//}
//
//// Si data es true pasamos los datos de cada tabla vieja a la nueva
//if ($data)
//{
//   echo "Comienza la migracion de datos \n";
//   foreach ($list_tables as $tbname)
//   {
//      $sql = "INSERT INTO $db_to.$tbname SELECT * FROM $db_from.$tbname";
//      $result = mysql_query($sql);
//      if ($result)
//      {
//         echo "Migrados datos de la tabla $db_from.$tbname a $db_to.$tbname \n";
//      }
//   }
//   echo "Termina la migracion de datos \n";
//}
mysql_free_result($result);
//mysql_close($clocal);
mysql_close($cremoto);

?>
<input name="chkTablas" type="checkbox" dir="ltr" lang="es" value="En Blanco" checked="checked" />En Blanco<br />
<input name="chkTablas" type="checkbox" dir="ltr" lang="es" value="En Blanco"  />En Blanco<br />
<input name="chkTablas" type="checkbox" dir="ltr" lang="es" value="En Blanco"  />En Blanco<br />
<input name="chkTablas" type="checkbox" dir="ltr" lang="es" value="En Blanco"  />En Blanco<br />
</form>
</body>
</html>