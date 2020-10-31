<!DOCTYPE html>
<html lang="es">
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
  <link rel="StyleSheet" href="../css/kontakt-omyl.css" type="text/css" />
  <script src="https://www.google.com/recaptcha/api.js"></script>
  <script>
    function onSubmit(token) {
      document.getElementById("demo-form").submit();
    }
  </script>
  </head>

  <body>
  <div id="div-padre">
    <div id="div-contenido-form">
      <form name="frmErrContac" id="frmErrContac" action="../forms/kontakt.html" method="post">
      <div id="div-entrada">
          <p><?php echo $_GET['aae']; ?></p>
        </div>
        <?php
        if (!empty($_GET['mde'])) {
          echo '
          <div id="div-error">
          <p>' . $_GET['mde'] . '</p>
        </div>
        ';
        }
        ?>
        <div id="div-submit">
          <?php echo '<input name="btnenvia" type="submit" id="_envia_" value="' . $_GET['meeb'] . '" title="...' . $_GET['meeb'] . '..." />'; ?>
        </div>
      </form>
    </div>
  </div>
</body>
</html>