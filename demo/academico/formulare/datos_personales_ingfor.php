<?php
//* ********************************
//* Estilo por Procedimiento
//* Valido para PHP version >= 7.x
//* ********************************

include_once '../../../scripts/php/setting.php';
include_once '../../../scripts/php/proc.connection.php';
include_once '../../../scripts/php/proc.consulting.php';
include_once '../../../scripts/php/proc.insertion.php';

$id_dat = $_GET["k1"];
$id_doc = $_GET["k2"];
$numdoc = $_GET["k4"];

$connection = Connection();
$quickmessage = '';

$DesDoc = '';
$Nombre = '';
$Apelli = '';
$NomCom = '';
$idSexo = '';
$FecNac = '';

if ( is_object($connection) ) {

  $FirstCondition = "WHERE iddatospersonales = " . $id_dat;
  $FirstRecordSet = Consulting($connection, "*", "datos_personales", $FirstCondition);
  $number_records = mysqli_num_rows($FirstRecordSet);
  mysqli_data_seek($FirstRecordSet, 0);

  if ($number_records == 1) {

    while ( $row = mysqli_fetch_array($FirstRecordSet, MYSQLI_BOTH) ) {

      $Nombre = $row["nombre"];
      $Apelli = $row["apellido"];
      $NomCom = $row["nombrecompleto"];
      $idSexo = $row["sexo"];
      $FecNac = $row["nacimiento"];

    }

    mysqli_free_result($FirstRecordSet);

    $DesDoc = ReturValue($connection, '_tm_documento_identificacion', 'id_tm_documento_identificacion', $id_doc, 'documento_identificacion');

    if ( mysqli_query($connection, "CALL SP_CREATE_DDI($id_dat, $id_doc, '$numdoc', @pds_insertado, @pds_identificador);") ) {

      $procedure = mysqli_query($connection, "SELECT @pds_insertado AS record_insert, @pds_identificador AS unique_identifier;");

      while ( $SdRow = mysqli_fetch_assoc($procedure) ) {
        $ddi_insert = $SdRow["record_insert"];
        $ddi_lastid = $SdRow["unique_identifier"];
      }

      mysqli_free_result($procedure);
      mysqli_close($connection);

      $interprete = (($ddi_insert == '1') ? 'Insertado' : 'No Inserto');
      $quickmessage .= "Identificadores Únicos para:<br>[Documentos de Identificación {Datos} ] $interprete $ddi_lastid , $id_dat, $id_doc, $numdoc<br>[Datos Personales] $id_dat {IMPORTANTE}<br>[Documento {Tipo y Número} ] $id_doc, $numdoc";

    } else {

      $quickmessage .= 'El "SP" falló por alguna causa desconocida...';

    }
  } else {

    $quickmessage .= 'Los registros devueltos son diferentes a uno...';

    }
} else {

  $quickmessage .= 'La conección devolvió un valor distinto a "Object"...';

}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="language" content="es-ES" />
  <meta name="viewport" content="width=max-device-width, initial-scale=1.0, user-scalable=yes/zoom" />
  <meta name="author" content="Jesús Acosta" />
  <meta name="copyright" content="Jesús Acosta" />
  <meta name="keywords" content="html, css, diseño web, utilidades, crear páginas, curriculum vitae, foro" />
  <meta name="description" content="Página principal del sitio Web" />
  <meta name="revisit-after" content="1 month" />
  <meta name="robots" content="index, follow" />
  <meta name="REPLY-TO" content="kontakt@jesusacosta.cz" />
  <meta name="Resource-type" content="Document" />
  <meta name="DateCreated" content="Tue, 31 March 2020 14:00:00 GMT+1" />
  <meta http-equiv="expires" content="86400" /> <!-- Equivalente a 24 horas -->
  <title>&laquo;&nbsp;Datos Personales Forzado&nbsp;&raquo;&nbsp;&laquo;&nbsp;jesusacosta.cz&copy;&nbsp;&raquo;&nbsp;&nbsp;&nbsp;</title>
  <link rev="made" href="mailto:kontakt@jesusacosta.cz" />
  <link rel="StyleSheet" href="../../../css/_normalizar.css" type="text/css" />
  <link rel="StyleSheet" href="../../../demo/academico/css/controles.css" type="text/css" />
  <link rel="StyleSheet" href="../../../css/tooltip_der_blue.css" type="text/css" />
  <link rel="shortcut icon" href="../../../img/_logo_nube.ico" type="image/x-icon" />
  <script src="../../../scripts/js/titulo.js"></script>
</head>
<body>
<div id="div-padre">
    <form name="frmPDP" id="frmPDP" autocomplete="off" method="post" action="datos_personales.php">
      <h1 id="alcentro">[3]Procesando: Ficha de Datos Personales</h1>
      <div id="capatres">
        <div><span>Documento:</span></div>
        <div><span id="cinput" title="Número del Documento..."><?php echo $numdoc ?></span></div>
        <?php echo '<input type="hidden" name="txtNValor" id="txtNValor" value="'.$numdoc.'">'; ?>
      </div>
      <div id="capatres">
        <div><span>Tipo de Documento:</span></div>
        <div><span id="cinput" title="Tipo de Documento..."><?php echo "$id_doc : $DesDoc" ?></span></div>
        <?php echo '<input type="hidden" name="txtDocumento" value="'.$id_doc.' : '.$DesDoc.'">'; ?>
      </div>
      <div id="capatres">
        <div><span>Nombre:</span></div>
        <div><span id="cinput" title="Primer Nombre..."><?php echo $Nombre ?></span></div>
        <?php echo '<input type="hidden" name="txtNombre" value="'.$Nombre.'">'; ?>
      </div>
      <div id="capatres">
        <div><span>Apellido:</span></div>
        <div><span id="cinput" title="Primer Apellido..."><?php echo $Apelli ?></span></div>
        <?php echo '<input type="hidden" name="txtApellido" value="'.$Apelli.'">'; ?>
      </div>
      <div id="capatres">
        <div><span>Nombre Completo:</span></div>
        <div><span id="cinput" title="Nombre Completo..."><?php echo $NomCom ?></span></div>
        <?php echo '<input type="hidden" name="txtNomCom" value="'.$NomCom.'">'; ?>
      </div>
      <div id="capatres">
        <div><span>Sexo:</span></div>
        <div><span id="cinput" title="Sexo..."><?php echo $idSexo ?></span></div>
        <?php echo '<input type="hidden" name="txtSexo" value="'.$idSexo.'">'; ?>
      </div>
      <div id="capatres">
        <div><span>Fecha de Nacimiento:</span></div>
        <div><span id="cinput" title="Fecha de Nacimiento..."><?php echo $FecNac ?></span></div>
        <?php echo '<input type="hidden" name="txtFechaNac" value="'.$FecNac.'">'; ?>
      </div>
      <div id="capatres">
        <div><span>Comportamiento:</span></div>
        <div><span id="nota"><?php echo $quickmessage ?></span></div>
        <?php echo '<input type="hidden" name="txtQuickmessage" value="'.$quickmessage.'">'; ?>
      </div>
      <div id="centrado">
        <div class="tooltipd">
          <button type="submit" name="btnPOtro">Otro</button>
          <span class="tooltiptext">Pulse para Procesar Otro registro...</span>
        </div>
        <div class="tooltipd">
          <button type="button" name="btnSalir"><a href="../../academico" target="_top">Salir</a></button>
          <span class="tooltiptext">Pulse para Salir al menú principal...</span>
        </div>
      </div>
    </form>
  </div>
</body>
</html>