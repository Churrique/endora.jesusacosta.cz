<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="UTF-8" />
  <meta name="language" content="es" />
  <meta name="viewport" content="width=max-device-width, initial-scale=1.0, user-scalable=yes/zoom" />
  <meta name="author" content="Jesús Acosta" />
  <meta name="copyright" content="Jesús Acosta" />
  <meta name="keywords" content="html, css, diseño web, utilidades, crear páginas, curriculum vitae, foro" />
  <meta name="description" content="Página principal del sitio Web" />
  <meta name="revisit-after" content="1 month" />
  <meta name="robots" content="index, follow" />
  <title>jesusacosta.cz</title>
  <link rel="StyleSheet" href="../css/kontakt.css" type="text/css" />
  <script src="https://www.google.com/recaptcha/api.js"></script>
  <script>
    function onSubmit(token) {
      document.getElementById("frmDeContacto").submit();
    }
  </script>
  </head>

  <body>
    <?php
    echo("HOLA");
    ?>
    <div id="div-padre">
      <div id="div-contenido-form">
        <form name="frmDeContacto" id="frmDeContacto" action="../scripts/php/kontakt.php" method="post" autocomplete="off">
          <div id="div-entrada">
          <label for="_correo_" data-help="Ejemplo: un.nombre_cualquiera@MasCaracteres.com">
              Correo Electrónico:
            </label>
          <input type="email" name="correo" id="_correo_" size="40" maxlength="50" placeholder="* Correo Electrónico:"
              pattern="[a-z0-9._]+@[a-z0-9.-]+\.[a-z]{2,}$" tabindex="1" title="...completa este campo..." required
              autofocus />
          </div>
          <div id="div-entrada">
          <label for="_nombre_" data-help="un nombre corto para referencia">
              Nombre:
            </label>
          <input type="text" name="nombre" id="_nombre_" size="40" maxlength="30" placeholder="* Nombre:"
              pattern="[a-zA-Z ]{3,30}" tabindex="2" title="...completa este campo..." />
          </div>
          <div id="div-entrada">
          <label for="_asunto_" data-help="dale un título a tu mensaje para referencia">
              Asunto:
            </label>
          <input type="text" name="asunto" id="_asunto_" size="40" maxlength="30" placeholder="* Asunto:"
              pattern="[a-zA-Z*-_ ]{3,30}" tabindex="3" title="...completa este campo..." />
          </div>
          <div id="div-entrada-textarea">
          <label for="_mensaje_" data-help="trata de ser claro y puntual en lo que expones">
              Mensaje:
            </label>
          <textarea name="mensaje" id="_mensaje_" placeholder="* Mensaje:" cols="43" rows="5" maxlength="2000"
              tabindex="4" required></textarea>
          </div>
          <div class="g-recaptcha" data-sitekey="6LeXMaUZAAAAAMqx3xwaJ5zZl8wpw1t7CuGi0gZx"></div

          <div id="div-submit">
          <input name="btnenvia" type="submit" id="_envia_" value="Enviar" tabindex="5"
              title="...enviar solicitud de contacto..." />
          </div>
        </form>
      </div>
    </div>
  </body>
</html>