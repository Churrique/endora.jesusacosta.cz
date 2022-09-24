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
  <meta http-equiv="expires" content="86400" />
  <!-- Equivalente a 24 horas -->
  <title>&laquo;&nbsp;Ficha Datos Personales Complementarios&nbsp;&raquo;&nbsp;&laquo;&nbsp;jesusacosta.cz&copy;&nbsp;&raquo;&nbsp;&nbsp;&nbsp;</title>
  <link rev="made" href="mailto:kontakt@jesusacosta.cz" />
  <!-- <link rel="StyleSheet" href="../../../css/_normalizar.css" type="text/css" /> -->
  <link rel="StyleSheet" href="/css/_normalizar.css" type="text/css" />
  <!-- <link rel="StyleSheet" href="../../../demo/academico/css/controles.css" type="text/css" /> -->
  <link rel="StyleSheet" href="/demo/academico/css/controles.css" type="text/css" />

  <link rel="StyleSheet" href="/css/elemento_select.css" type="text/css" />
  <script src="/scripts/js/elemento_select.js"></script>


  <!-- <link rel="shortcut icon" href="../../../img/_logo_nube.ico" type="image/x-icon" /> -->
  <link rel="shortcut icon" href="/img/_logo_nube.ico" type="image/x-icon" />
  <!-- <script src="../../../scripts/js/cuenta_caracteres.js"></script> Script que Hace el Conteo de los Caracteres Disponibles en el Campo -->
  <script src="/scripts/js/cuenta_caracteres.js"></script>
  <!-- Script que Hace el Conteo de los Caracteres Disponibles en el Campo -->
  <!-- <script src="../../../scripts/js/titulo.js"></script> Script que hace mover el Título del Documento -->
  <script src="/scripts/js/titulo.js"></script>
  <!-- Librería de fontawesome -->
  <script src="https://kit.fontawesome.com/82f9d2a72c.js" crossorigin="anonymous"></script>
</head>

<body>
  <?php
    include_once('../../../scripts/php/variables.php');
    include_once('../../../scripts/php/basededatos.php');
  ?>
  <div id="div-padre">
    <form name="frmDP" id="frmDP" autocomplete="off">
      <h1 id="alcentro">Ficha de Datos Complementarios</h1>
      <div id="capatres">
        <div><label for="txtBuscar">Buscar:</labe></div>
        <div><input type="text" name="txtBuscar" id="txtBuscar" value="" placeholder="Información a buscar" maxlength="20" onkeyup="cBuscar(this);"></div>
        <div id="div-padre">
          <button name="btnBuscar" id="btnBuscar" style="margin-right: 9em;"><span id="logo" class="fas fa-search"></span>Buscar Información</button>
          <div class="lineadegradada margenderecho">
            <span id="chBuscar" style="margin: 0em -.1875em 0em 0em;">
              <script>document.getElementById("chBuscar").innerHTML = document.getElementById("txtBuscar").maxLength.toString().trim();</script>
            </span>
            <span>/</span>
            <span id="strBuscar">
              <script>document.getElementById("strBuscar").innerHTML = document.getElementById("txtBuscar").maxLength;</script>
            </span>
          </div>
        </div>
      </div>
      <div id="capatres">
        <div><label>¿Algún Documento de Identificación?</label></div>
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
      <div id="centrado">
        <input type="submit" value="Enviar">
        <input type="reset" value="Limpiar">
      </div>
      <div id="div-padre">
        <footer style="bottom: 14.7em;">
          <p><span id="logo" class="fas fa-info-circle fa-2x"></span>Los tapices usados en esta página son cortesía de:</p>
          <dl>
            <!-- El archivo de imagen es capa-01.svg -->
            <dt>Papel pintado abstracto blanco</dt>
            <dd><a href='https://www.freepik.es/vector-gratis/papel-pintado-abstracto-blanco_11798728.htm' target="_blank">Vector de Fondo creado por freepik - www.freepik.es</a></dd>
            <!-- El archivo de imagen es capa-02.svg -->
            <dt>Acuarela pintada amano con forma de cielo y nube</dt>
            <dd><a href='https://www.freepik.es/foto-gratis/fondo-acuarela-pintada-mano-forma-cielo-nubes_9728603.htm' target="_blank">Foto de Fondo creado por denamorado - www.freepik.es</a></dd>
          </dl>
        </footer>
      </div>
    </form>
  </div>
</body>

</html>