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
  <title>&laquo;&nbsp;Ficha Datos Personales&nbsp;&raquo;&nbsp;&laquo;&nbsp;jesusacosta.cz&copy;&nbsp;&raquo;&nbsp;&nbsp;&nbsp;</title>
  <link rev="made" href="mailto:kontakt@jesusacosta.cz" />
  <link rel="StyleSheet" href="../../../css/_normalizar.css" type="text/css" />
  <link rel="StyleSheet" href="../../../demo/academico/css/controles.css" type="text/css" />
  <link rel="StyleSheet" href="../../../css/elemento_select.css" type="text/css" />
  <link rel="shortcut icon" href="../../../img/_logo_nube.ico" type="image/x-icon" />
  <script src="../../../scripts/js/elemento_select.js"></script>
  <script src="../../../scripts/js/cuenta_caracteres.js"></script>
  <script src="../../../scripts/js/titulo.js"></script>
  <script src="https://kit.fontawesome.com/82f9d2a72c.js" crossorigin="anonymous"></script>
</head>

<body>
  <?php
  include_once('../../../scripts/php/variables.php');
  include_once('../../../scripts/php/basededatos.php');
  ?>
  <div id="div-padre">
    <form name="frmDP" id="frmDP" autocomplete="off">
      <h1 id="alcentro">Ficha de Datos Adicionales</h1>
      <div id="capatres">
        <div><label>¿Algún Documento de Identificación Adicional?</label></div>
        <div></div>
        <div id="centrado"><button name="btnDocumentoI" id="btnDocumentoI">Registrar Identificación</button></div>
      </div>
      <div id="capatres">
        <div><label>¿Tiene Dirección?</label></div>
        <div id="centrado"><button name="btnDireccion" id="btnDireccion">Registrar Dirección</button></div>
      </div>
      <div id="capatres">
        <div><label>¿Tiene E-mail?</label></div>
        <div id="centrado"><button name="btnDireccion" id="btnDireccion">Registrar E-mail</button></div>
      </div>
      <div id="capatres">
        <div><label>¿Tiene Teléfono?</label></div>
        <div id="centrado"><button name="btnDireccion" id="btnDireccion">Registrar Teléfono</button></div>
      </div>
      <div id="div-padre">
        <footer>
          <p><span id="logo" class="fas fa-info-circle fa-2x"></span>Los tapices usados en esta página son cortesía de:</p>
          <dl>
            <dt>Papel pintado abstracto blanco</dt>
            <dd><a href='https://www.freepik.es/vectores/fondo'>Vector de Fondo creado por freepik - www.freepik.es</a>
            </dd>
            <dt>Acuarela pintada amano con forma de cielo y nube</dt>
            <dd><a href='https://www.freepik.es/fotos/fondo'>Foto de Fondo creado por denamorado - www.freepik.es</a>
            </dd>
          </dl>
        </footer>
      </div>
    </form>
  </div>
</body>

</html>