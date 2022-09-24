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
  <title>&laquo;&nbsp;Buscando...!&nbsp;&raquo;&nbsp;&laquo;&nbsp;jesusacosta.cz&copy;&nbsp;&raquo;&nbsp;&nbsp;&nbsp;</title>
  <link rev="made" href="mailto:kontakt@jesusacosta.cz" />
  <link rel="StyleSheet" href="../../../css/_normalizar.css" type="text/css" />
  <link rel="StyleSheet" href="../../../demo/academico/css/controles.css" type="text/css" />
  <link rel="StyleSheet" href="../../../css/tooltip_der_blue.css" type="text/css" />
  <link rel="shortcut icon" href="../../../img/_logo_nube.ico" type="image/x-icon" />
  <script src="../../../scripts/js/cuenta_caracteres.js"></script>
  <script src="../../../scripts/js/titulo.js"></script>
  <script src="https://kit.fontawesome.com/82f9d2a72c.js" crossorigin="anonymous"></script>
</head>

<body>
  <div id="div-padre">
    <form name="frmBuscar" id="frmBuscar" autocomplete="off" method="POST" action="../formulare/resultado_busqueda.php">
      <?php
        if (isset($_GET['ns'])) {
          echo '
          <input type="hidden" name="txtNext_Step" value="'.$_GET['ns'].'">
          ';
        } else {
          echo '
          <input type="hidden" name="txtNext_Step" value="">
          ';
        }
        if (isset($_GET['message'])) {
          echo '
          <input type="hidden" name="txtMessage" value="'.$_GET['message'].'">
          ';
        } else {
          echo '
          <input type="hidden" name="txtMessage" value="">
          ';
        }
      ?>
      <h1 id="alcentro">Buscar por:</h1>
      <?php
        if (isset($_GET['message'])) {
          echo '
          <div id="div-padre">
            <div id="capacuatro">
              <div><span id="oswald">MENSAJE:</span></div>
              <div><span id="oswald">'.$_GET['message'].'</span></div>
              <div><span id="anaheim">Puede buscar por alguno de los campos indicados en la parte inferior (Nombre | Apellido | Documento | Identificador). Si busca por el <strong>&ldquo;Identificador&rdquo;</strong>, no se tomará en cuenta los demás valores suministrados (si aplica).</span></div>
            </div>
          </div>
          ';
        }
      ?>
      <div id="capados">
        <div><label for="txtNombre">Nombre:</labe></div>
        <div><input type="text" name="txtNombre" id="txtNombre" value="" placeholder="Primer Nombre" maxlength="30" onkeyup="cNombre(this);"></div>
        <div id="aladerecha" class="lineadegradada margenderecho">
          <span id="chNombre" style="margin: 0em -.1875em;">
            <script>
              document.getElementById("chNombre").innerHTML = document.getElementById("txtNombre").maxLength.toString().trim();
            </script>
          </span>
          <span>/</span><span id="strNombre">
            <script>
              document.getElementById("strNombre").innerHTML = document.getElementById("txtNombre").maxLength;
            </script>
          </span>
        </div>
      </div>
      <div id="capados">
        <div><label for="txtApellido">Apellido:</labe></div>
        <div><input type="text" name="txtApellido" id="txtApellido" value="" placeholder="Primer Apellido" maxlength="30" onkeyup="cApellido(this);"></div>
        <div id="aladerecha" class="lineadegradada margenderecho">
          <span id="chApellido" style="margin: 0em -.1875em;">
            <script>
              document.getElementById("chApellido").innerHTML = document.getElementById("txtApellido").maxLength.toString().trim();
            </script>
          </span>
          <span>/</span><span id="strApellido">
            <script>
              document.getElementById("strApellido").innerHTML = document.getElementById("txtApellido").maxLength;
            </script>
          </span>
        </div>
      </div>
      <div id="capados">
        <div><label for="txtNValor">Documento:</labe></div>
        <div><input type="text" name="txtNValor" id="txtNValor" value="" placeholder="Nuevo Valor a Ingresar" maxlength="20" onkeyup="cNValor(this);"></div>
        <div id="aladerecha" class="lineadegradada margenderecho">
          <span id="chNValor" style="margin: 0em -.1875em;">
            <script>
              document.getElementById("chNValor").innerHTML = document.getElementById("txtNValor").maxLength.toString().trim();
            </script>
          </span>
          <span>/</span><span id="strNValor">
            <script>
              document.getElementById("strNValor").innerHTML = document.getElementById("txtNValor").maxLength;
            </script>
          </span>
        </div>
      </div>
      <div id="capados">
        <div><label for="txtIUDatPer">Identificador:</labe></div>
        <div><input type="number" name="txtIUDatPer" id="txtIUDatPer" value="" placeholder="Nuevo Valor a Ingresar" ondrop="return false;" onpaste="return false;" onkeypress="return event.keyCode>=48 && event.keyCode<=57" onkeyup="cIUDatP(this);" maxlength="12"></div>
        <div id="aladerecha" class="lineadegradada margenderecho">
          <span id="chIUDatPer" style="margin: 0em -.1875em;">
            <script>
              document.getElementById("chIUDatPer").innerHTML = document.getElementById("txtIUDatPer").maxLength.toString().trim();
            </script>
          </span>
          <span>/</span><span id="strIUDatPer">
            <script>
              document.getElementById("strIUDatPer").innerHTML = document.getElementById("txtIUDatPer").maxLength;
            </script>
          </span>
        </div>
      </div>
      <?php
        if (isset($_GET['ns'])) {
          echo '
          <div id="div-padre">
            <div id="capacuatro">
            <div><span id="oswald">Uste puede conbinar la búsqueda con:</span></div>
            <div><span id="oswald">Nombre y Apellido | Nombre y Documento | Apellido y Documento | Nombre, Apellido y Documento</span></div>
            <div><span id="anaheim">PANTALLA FINAL:</span></div>
            <div><span id="anaheim">'.$_GET['ns'].'</span></div>
            </div>
          </div>
          ';
        }
      ?>
      <div id="centrado">
        <div class="tooltipd">
          <button type="submit" name="btnEnviar" value="Enviar" formmethod="post">Buscar</button>
          <span class="tooltiptext">Pulse para Buscar la información e ir al siguiente paso...</span>
        </div>
        <div class="tooltipd">
          <button type="reset" name="btnLimpiar" value="Limpiar">Limpiar</button>
          <span class="tooltiptext">Pulse para limpiar los campos del formulario...</span>
        </div>
        <div class="tooltipd">
          <button type="button" name="btnCancelar"><a href="../../academico" target="_top">Salir</a></button>
          <span class="tooltiptext">Pulse para Salir de este formulario...</span>
        </div>
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