<?php
//* ********************************
//* Estilo por Procedimiento
//* Valido para PHP version >= 7.x
//* ********************************

include_once '../../../scripts/php/setting.php';
  include_once '../../../scripts/php/proc.connection.php';
  include_once '../../../scripts/php/proc.consulting.php';

  $_conn = Connection();
  $interprete = '';
  $quickmessage = '';
  $DesDoc = '';

  $_idat = $_POST['txtHID'];
  $_docu = $_POST['txtNValor'];
  $_tipo = $_POST['txtDocumento'];
  $_nomb = $_POST['txtNombre'];

  if ( is_object($_conn) ) {
    if ( mysqli_query($_conn, "CALL SP_CREATE_DDI($_idat, $_tipo, '$_docu', @pds_insertado, @pds_identificador);") ) {

      $DesDoc = ReturValue($_conn, '_tm_documento_identificacion', 'id_tm_documento_identificacion', $_tipo, 'documento_identificacion');

      $procedure = mysqli_query($_conn, "SELECT @pds_insertado AS record_insert, @pds_identificador AS unique_identifier;");

      while ( $SdRow = mysqli_fetch_assoc($procedure) ) {
        $ddi_insert = $SdRow["record_insert"];
        $ddi_lastid = $SdRow["unique_identifier"];
      }

      mysqli_free_result($procedure);
      mysqli_close($_conn);

      $interprete = (($ddi_insert == '1') ? 'Insertado' : 'No Inserto');
      $quickmessage .= "Identificadores Únicos para:<br>[Documentos de Identificación {Datos} ] $interprete $ddi_lastid , $_idat, $_tipo, $_docu<br>[Datos Personales] $_idat {IMPORTANTE}<br>[Documento {Tipo y Número} ] $_tipo, $_docu";

    } else {

      $quickmessage .= 'El "SP" falló por alguna causa desconocida...';

    }
  } else {

    $quickmessage .= 'La conección devolvió un valor distinto a "Object"...';

  }
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="language" content="es-es" />
  <meta name="viewport" content="width=max-device-width, initial-scale=1.0, user-scalable=yes/zoom" />
  <meta name="author" content="Jesús Acosta" />
  <meta name="copyright" content="Jesús Acosta" />
  <meta name="keywords" content="html, css, académico, identificación, contabilidad, contable, diseño web, utilidades, crear páginas, curriculum vitae, foro" />
  <meta name="description" content="Página principal del sitio Web" />
  <meta name="revisit-after" content="1 month" />
  <meta name="robots" content="index, follow" />
  <meta name="REPLY-TO" content="kontakt@jesusacosta.cz">
  <meta name="Resource-type" content="Document">
  <meta name="DateCreated" content="Tue, 31 March 2020 14:00:00 GMT+1">
  <meta http-equiv="expires" content="86400" /> <!-- Equivalente a 24 horas -->
  <meta http-equiv="refresh" content="30">
  <meta http-equiv="Cache-Control" content="no-store" />
  <title>&laquo;&nbsp;Adicionar un Documento de Identificación&nbsp;&raquo;&nbsp;&laquo;&nbsp;jesusacosta.cz&copy;&nbsp;&raquo;&nbsp;&nbsp;&nbsp;</title>
  <link rev="made" href="mailto:kontakt@jesusacosta.cz">
  <link rel="StyleSheet" href="../../../css/_normalizar.css" type="text/css" />
  <link rel="StyleSheet" href="../../../demo/academico/css/controles.css" type="text/css" />
  <link rel="StyleSheet" href="../../../css/tooltip_der_blue.css" type="text/css" />
  <link rel="shortcut icon" href="/img/_logo_nube.ico" type="image/x-icon" />
  <script src="/scripts/js/titulo.js"></script>
  <script src="https://kit.fontawesome.com/82f9d2a72c.js" crossorigin="anonymous"></script>
</head>
<body>
<div id="div-padre">
    <form name="frmNextAddIDoc" id="frmNextAddIDoc" autocomplete="off" method="post" action="../formulare/datos_adicionales.php">
      <h1 id="alcentro">Ficha para Adicionar un Documento</h1>
      <div id="capatres">
        <div><span>Identificador Único:</span></div>
        <div><?php echo '<span id="cinput" title="Identificador Único: '.$_idat.'...">'.$_nomb.'</span>';?></div>
      </div>
      <div id="capatres">
        <div><span>Documento:</span></div>
        <div><span id="cinput" title="Numero de Documento..."><?php echo $_docu ?></span></div>
      </div>
      <div id="capatres">
        <div><span>Tipo de Documento:</span></div>
        <div><span id="cinput"><?php echo $_tipo.' : '.$DesDoc ?></span></div>
      </div>
      <div id="capatres">
        <div><span>Comportamiento:</span></div>
        <div><span id="nota"><?php echo $quickmessage ?></span></div>
      </div>
      <div id="centrado">
        <div class="tooltipd">
          <button type="button" name="btnOtro" value="Otro" formmethod="post">Otro</button>
          <span class="tooltiptext">Pulse para procesar Otro documento de identificación a la misma persona...</span>
        </div>
        <div class="tooltipd">
          <button type="submit" name="btnFicha" value="Ficha" formmethod="post">Ficha</button>
          <span class="tooltiptext">Pulse para ir a la Ficha de Datos Adicionales...</span>
        </div>
        <div class="tooltipd">
          <button type="button" name="btnCancelar"><a href="../../academico" target="_top">Salir</a></button>
          <span class="tooltiptext">Pulse para Salir de esta pantalla...</span>
        </div>
      </div>
      <div id="div-padre">
        <iframe src="foot_note.html" name="ifootnote"></iframe>
      </div>
    </form>
  </div>
</body>
</html>