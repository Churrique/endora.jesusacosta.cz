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
  <title>&laquo;&nbsp;Reservar Ficha&nbsp;&raquo;&nbsp;&laquo;&nbsp;jesusacosta.cz&copy;&nbsp;&raquo;&nbsp;&nbsp;&nbsp;</title>
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
      <h1 id="alcentro">Creación de Ficha Personal</h1>
      <div id="capados">
        <div><label for="txtNValor">Documento:</labe></div>
        <div><input type="text" name="txtNValor" id="txtNValor" value="" placeholder="Nuevo Valor a Ingresar" maxlength="20" onkeyup="cNValor(this);"></div>
        <div id="aladerecha" class="lineadegradada margenderecho">
          <span id="chNValor" style="margin: 0em -.1875em;">
            <script>document.getElementById("chNValor").innerHTML = document.getElementById("txtNValor").maxLength.toString().trim();</script>
          </span>
          <span>/</span><span id="strNValor">
            <script>document.getElementById("strNValor").innerHTML = document.getElementById("txtNValor").maxLength;</script>
          </span>
        </div>
      </div>
      <div id="capados">
        <div><label for="txtSexo">Tipo de Documento:</labe></div>
        <div>
          <div class="select_mate" data-mate-select="active">
            <?php
              ArmSelect('_tm_documento_identificacion', 'id_tm_documento_identificacion AS id, documento_identificacion AS documento', 'txtDocumento', 'txtDocumento', '', 'return false;');
            ?>
            <p class="selecionado_opcion" onclick="open_select(this)"></p>
            <span onclick="open_select(this)" class="icon_select_mate">
              <svg fill="#000000" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                <path d="M7.41 7.84L12 12.42l4.59-4.58L18 9.25l-6 6-6-6z" />
                <path d="M0-.75h24v24H0z" fill="none" />
              </svg>
            </span>
            <div class="cont_list_select_mate">
              <ul class="cont_select_int"></ul>
            </div>
          </div>
        </div>
      </div>
      <div id="centrado">
        <input type="submit" value="Enviar">
        <input type="reset" value="Limpiar">
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