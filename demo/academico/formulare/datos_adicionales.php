<!DOCTYPE html>
<html lang="es-ES">

<head>
  <meta charset="UTF-8" />
  <meta name="language" content="es-es" />
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
  <title>&laquo;&nbsp;Ficha Datos Adicionales&nbsp;&raquo;&nbsp;&laquo;&nbsp;jesusacosta.cz&copy;&nbsp;&raquo;&nbsp;&nbsp;&nbsp;</title>
  <link rev="made" href="mailto:kontakt@jesusacosta.cz" />
  <link rel="StyleSheet" href="../../../css/_normalizar.css" type="text/css" />
  <link rel="StyleSheet" href="../../../demo/academico/css/controles.css" type="text/css" />
  <link rel="StyleSheet" href="../../../css/tooltip_der_blue.css" type="text/css" />
  <link rel="shortcut icon" href="../../../img/_logo_nube.ico" type="image/x-icon" />
  <script src="../../../scripts/js/elemento_select.js"></script>
  <script src="../../../scripts/js/cuenta_caracteres.js"></script>
  <script src="../../../scripts/js/trigger_event_click_in_da_button.js"></script>
  <script src="../../../scripts/js/titulo.js"></script>
  <script src="https://kit.fontawesome.com/82f9d2a72c.js" crossorigin="anonymous"></script>
</head>

<body>
<?php
    include_once '../../../scripts/php/setting.php';
    include_once '../../../scripts/php/proc.connection.php';
?>
  <div id="div-padre">
    <form name="frmBDP" id="frmBDP" autocomplete="off" method="GET">
      <h1 id="alcentro">Ficha de Datos Adicionales</h1>
      <div id="capatres">
        <div><label>¿Algún Documento de Identificación Adicional?</label></div>
        <div id="centrado">
          <div class="tooltipd">
            <button name="btnDocumentoI" id="btnDocumentoI" type="button" onclick="trigger_click_in_add('add_identification_document.php','Usted se dispone a adicionar un documento nuevo de identificación, por lo que primero deberá buscar a la persona.');">Registrar</button>
            <span class="tooltiptext">Pulse para Registrar alguna Identificación adicional...</span>
          </div>
        </div>
      </div>
      <div id="capatres">
        <div><label>¿Alguna Dirección Adicional?</label></div>
        <div id="centrado">
          <div class="tooltipd">
            <button name="btnDireccion" id="btnDireccion" type="button" onclick="trigger_click_in_add('add_address.html','Usted se dispone a adicionar una dirección nueva, por lo que primero deberá buscar a la persona.');">Registrar</button>
            <span class="tooltiptext">Pulse para Registrar alguna Dirección adicional...</span>
          </div>
        </div>
      </div>
      <div id="capatres">
        <div><label>¿Algún E-mail Adicional?</label></div>
        <div id="centrado">
          <div class="tooltipd">
            <button name="btnEmail" id="btnEmail" type="button" onclick="trigger_click_in_add('add_mail.html','Usted se dispone a adicionar un E-mail nuevo, por lo que primero deberá buscar a la persona.');">Registrar</button>
            <span class="tooltiptext">Pulse para Registrar algún E-mail adicional...</span>
          </div>
        </div>
      </div>
      <div id="capatres">
        <div><label>¿Algún Teléfono Adicional?</label></div>
        <div id="centrado">
          <div class="tooltipd">
            <button name="btnPhone" id="btnPhone" type="button" onclick="trigger_click_in_add('add_phone.html','Usted se dispone a adicionar un teléfono nuevo, por lo que primero deberá buscar a la persona.');">Registrar</button>
            <span class="tooltiptext">Pulse para Registrar algún Teléfono adicional...</span>
          </div>
        </div>
      </div>
      <div id="centrado">
        <div class="tooltipd">
          <button type="button" name="btnSdCancel"><a href="../../academico" target="_top">Salir</a></button>
          <span class="tooltiptext">Pulse para abandonar esta pantalla y Salir al menú principal...</span>
        </div>
      </div>
      <div id="div-padre">
        <iframe src="foot_note.html" name="ifootnote"></iframe>
      </div>
    </form>
  </div>
</body>

</html>