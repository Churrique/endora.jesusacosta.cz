<?php
if (isset($_POST["btnSdConfirm"])) {
  header("Location: https://www.jesusacosta.cz/demo/academico/datos_personales.php");
  exit;
  if ($_POST["numberecords"] != 1) {
    // Hubo mas de un registro de coincidencia y se pulso Confirmar
    echo 'Accion no permitida...!';
  }
}
if (isset($_POST["btnSdCancel"])) {
  header("Location: https://www.jesusacosta.cz/demo/academico");
  exit;
}
?>