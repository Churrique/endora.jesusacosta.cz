<!DOCTYPE html>
<html lang="es-ES">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="UTF-8" />
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
  <meta http-equiv="expires" content="86400" />
  <title>&laquo;&nbsp;jesusacosta.cz&copy;&nbsp;&raquo;&nbsp;&nbsp;&laquo;&nbsp;Administración de Usuarios para los Projectos en Ejecución&nbsp;&raquo;&nbsp;</title>
  <link rev="made" href="mailto:kontakt@jesusacosta.cz" />
  <link rel="StyleSheet" href="../css/_normalizar.css" type="text/css" />
  <link rel="StyleSheet" href="../css/UsersManagement.css" type="text/css" />
  <link rel="StyleSheet" href="../css/tooltip_der_blue.css" type="text/css" />
  <link rel="shortcut icon" href="../img/_logo_nube.ico" type="image/x-icon" />
  <link rel="StyleSheet" href="../css/elemento_select.css" type="text/css" />
  <script src="../scripts/js/elemento_select.js"></script>
  <script src="../scripts/js/titulo.js"></script>
  <script src="../scripts/js/cuenta_caracteres.js"></script>
  <script src="https://kit.fontawesome.com/82f9d2a72c.js" crossorigin="anonymous"></script>
</head>
<body>
  <?php
    include_once '../scripts/php/setting.php';
    include_once '../scripts/php/proc.connection.php';
    include_once '../scripts/php/proc.consulting.php';
  ?>
  <div id="div/padre">
    <form id="frmAdmUsuarios" name="frmAdmUsuarios" method="post" autocomplete="off" >
      <h1 id="alcentro">Administración Principal de Usuarios</h1>
      <div id="capados">
        <div><label for="txtNombre">Nombre y Apellido:</labe></div>
        <div><input type="text" name="txtNombre" id="txtNombre" value="" placeholder="Nombre y Apellido" maxlength="30" onkeyup="cNombre(this);"></div>
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
        <div><label for="txtUsuario">Usuario:</labe></div>
        <div><input type="text" name="txtUsuario" id="txtUsuario" value="" placeholder="Usuario" maxlength="20" onkeyup="cUsuario(this);"></div>
        <div id="aladerecha" class="lineadegradada margenderecho">
          <span id="chUsuario" style="margin: 0em -.1875em;">
            <script>
              document.getElementById("chUsuario").innerHTML = document.getElementById("txtUsuario").maxLength.toString().trim();
            </script>
          </span>
          <span>/</span><span id="strUsuario">
            <script>
              document.getElementById("strUsuario").innerHTML = document.getElementById("txtUsuario").maxLength;
            </script>
          </span>
        </div>
      </div>
      <div id="capados">
        <div><label for="txtPass">Contraseña:</labe></div>
        <div><input type="password" name="txtPass" id="txtPass" value="" placeholder="Contraseña" maxlength="20" onkeyup="cPass(this);"></div>
        <div id="aladerecha" class="lineadegradada margenderecho">
          <span id="chPass" style="margin: 0em -.1875em;">
            <script>
              document.getElementById("chPass").innerHTML = document.getElementById("txtPass").maxLength.toString().trim();
            </script>
          </span>
          <span>/</span><span id="strPass">
            <script>
              document.getElementById("strPass").innerHTML = document.getElementById("txtPass").maxLength;
            </script>
          </span>
        </div>
      </div>
      <div id="capados">
        <div><label for="txtExpira">Expira:</labe></div>
        <div><input type="datetime-local" name="txtExpira" id="txtExpira" value=""></div>
      </div>
      <hr>
      <!--
      //  ? ---------------
      //  ! Menú Horizontal
      //  ? ---------------
      -->
      <h3 id="alcentro">Elementos del Menú (en Horizontal)</h3>
      <div id="capados">
        <div><label for="txtItem">Iten:</labe></div>
        <div><input type="text" name="txtItem" id="txtItem" value="" placeholder="Descripción del Item" maxlength="15" onkeyup="cItem(this);"></div>
        <div id="aladerecha" class="lineadegradada margenderecho">
          <span id="chItem" style="margin: 0em -.1875em;">
            <script>
              document.getElementById("chItem").innerHTML = document.getElementById("txtItem").maxLength.toString().trim();
            </script>
          </span>
          <span>/</span><span id="strItem">
            <script>
              document.getElementById("strItem").innerHTML = document.getElementById("txtItem").maxLength;
            </script>
          </span>
        </div>
      </div>
      <div id="capados">
        <div><label for="txtOrden">Orden/Posición:</labe></div>
        <div><input type="text" name="txtOrden" id="txtOrden" maxlength="2" placeholder="Máximo dos dígitos" value=""></div>
      </div>
      <hr>
      <!--
      //  ? ---------------
      //  ! Menú Vertical
      //  ? ---------------
      -->
      <h5 id="alcentro">Elementos del Sub-Menú (en Vertical)</h5>
      <div id="capados">
        <div><label for="txtSubItem">Sub-Iten:</labe></div>
        <div><input type="text" name="txtSubItem" id="txtSubItem" value="" placeholder="Descripción del Sub-Item" maxlength="15" onkeyup="cSubItem(this);"></div>
        <div id="aladerecha" class="lineadegradada margenderecho">
          <span id="chSubItem" style="margin: 0em -.1875em;">
            <script>
              document.getElementById("chSubItem").innerHTML = document.getElementById("txtSubItem").maxLength.toString().trim();
            </script>
          </span>
          <span>/</span><span id="strSubItem">
            <script>
              document.getElementById("strSubItem").innerHTML = document.getElementById("txtSubItem").maxLength;
            </script>
          </span>
        </div>
      </div>
      <div id="capados">
        <div><label for="txtOrden">Orden/Posición:</labe></div>
        <div><input type="text" name="txtOrden" id="txtOrden" maxlength="2" placeholder="Máximo dos dígitos" value=""></div>
      </div>
      <div id="capados">
        <div><label for="txtPermiso">Permisología:</labe></div>
        <div>
          <div class="select_mate" data-mate-select="active">
            <?php
            $connectio = Connection();
            ArmSelect($connectio, 'usuario_permisos', 'idpermisoitem AS id, detail_permission AS detalle', 'txtPermiso', 'txtPermiso', '', 'return false;', 'permission_item AS titulo');
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
        <div><label for="txtUrl">Usuario:</labe></div>
        <div><input type="url" name="txtUrl" id="txtUrl" value="" placeholder="Url a Ejecutar" maxlength="100" onkeyup="cUrl(this);"></div>
        <div id="aladerecha" class="lineadegradada margenderecho">
          <span id="chUrl" style="margin: 0em -.1875em;">
            <script>
              document.getElementById("chUrl").innerHTML = document.getElementById("txtUrl").maxLength.toString().trim();
            </script>
          </span>
          <span>/</span><span id="strUrl">
            <script>
              document.getElementById("strUrl").innerHTML = document.getElementById("txtUrl").maxLength;
            </script>
          </span>
        </div>
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
            <dt>Fondo de pintura de acuarela rosa vibrante</dt>
            <dd><a href='https://www.freepik.es/vectores/fondo'>Vector de Fondo creado por rawpixel.com - www.freepik.es</a></dd>
          </dl>
        </footer>
      </div>
    </form>
  </div>
</body>
</html>