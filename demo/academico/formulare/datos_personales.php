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
  <link rel="StyleSheet" href="../../../css/tooltip_der_blue.css" type="text/css" />
  <link rel="shortcut icon" href="../../../img/_logo_nube.ico" type="image/x-icon" />
  <script src="../../../scripts/js/elemento_select.js"></script>
  <script src="../../../scripts/js/cuenta_caracteres.js"></script>
  <script src="../../../scripts/js/titulo.js"></script>
  <script src="../../../scripts/js/join_textboxs.js"></script>
  <script src="https://kit.fontawesome.com/82f9d2a72c.js" crossorigin="anonymous"></script>
</head>

<body>
  <?php
    include_once '../../../scripts/php/setting.php';
    include_once '../../../scripts/php/proc.connection.php';
    include_once '../../../scripts/php/proc.consulting.php';
  ?>
  <div id="div-padre">
    <form name="frmDP" id="frmDP" autocomplete="off" method="post" action="datos_personales_procesados.php">
      <h1 id="alcentro">Ficha de Datos Personales</h1>
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
        <div><label for="txtSexo">Tipo de Documento:</labe></div>
        <div>
          <div class="select_mate" data-mate-select="active">
            <?php
            $connectio = Connection();
            ArmSelect($connectio, '_tm_documento_identificacion', 'id_tm_documento_identificacion AS id, documento_identificacion AS documento', 'txtDocumento', 'txtDocumento', '', 'return false;');
            mysqli_close($connectio);
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
        <div><label for="txtNomCom">Nombre Completo:</labe></div>
        <div class="tooltipd">
        <div><input type="text" name="txtNomCom" id="txtNomCom" placeholder="Nombre Completo" maxlength="100" onkeyup="cNomCom(this);" ondblclick="JoinTextBoxs();"></div>
        <span class="tooltiptext">No es necesario escribir tanto, haga doble-click para unir el nombre y el apellido...</span>
        </div>
        <div id="aladerecha" class="lineadegradada margenderecho">
          <span id="chNomCom" style="margin: 0em -.1875em;">
            <script>
              document.getElementById("chNomCom").innerHTML = document.getElementById("txtNomCom").maxLength.toString().trim();
            </script>
          </span>
          <span>/</span><span id="strNomCom">
            <script>
              document.getElementById("strNomCom").innerHTML = document.getElementById("txtNomCom").maxLength;
            </script>
          </span>
        </div>
      </div>
      <div id="capados">
        <div><label for="txtSexo">Sexo:</labe></div>
        <div>
          <div class="select_mate" data-mate-select="active">
            <?php
            $connectio = Connection();
            CrtSelect($connectio, 'datos_personales', 'sexo', 'txtSexo', 'txtSexo', '', 'return false;');
            mysqli_close($connectio);
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
      <div id="capados">
        <div><label for="txtFechaNac">Fecha de Nacimiento:</labe></div>
        <div><input type="date" name="txtFechaNac" id="txtFechaNac" value=""></div>
      </div>
      <div id="centrado">
        <div class="tooltipd">
          <button type="submit" name="btnEnviar" value="Enviar" formmethod="post">Enviar</button>
          <span class="tooltiptext">Pulse para enviar la información al siguiente paso...</span>
        </div>
        <div class="tooltipd">
          <button type="reset" name="btnLimpiar" value="Limpiar">Limpiar</button>
          <span class="tooltiptext">Pulse para limpiar los campos del formulario...</span>
        </div>
        <div class="tooltipd">
          <button type="button" name="btnCancelar"><a href="../../academico" target="_top">Cerrar</a></button>
          <span class="tooltiptext">Pulse para salir de este formulario...</span>
        </div>
      </div>
      <div id="div-padre">
        <footer>
          <p><span id="logo" class="fas fa-info-circle fa-2x"></span>Los tapices usados en esta página son cortesía de:</p>
          <dl>
            <dt>Papel pintado abstracto blanco</dt>
            <dd><a href='https://www.freepik.es/vectores/fondo'>Vector de Fondo creado por freepik - www.freepik.es</a></dd>
            <dt>Acuarela pintada amano con forma de cielo y nube</dt>
            <dd><a href='https://www.freepik.es/fotos/fondo'>Foto de Fondo creado por denamorado - www.freepik.es</a></dd>
          </dl>
        </footer>
      </div>
    </form>
  </div>
</body>

</html>