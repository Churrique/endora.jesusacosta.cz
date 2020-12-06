<?php
  require_once('../funciones/valida-funciones.php');
  require_once('../funciones/valida-funciones_pnr_datos_y_promocion.php');
  if (isset($_POST['btnBorra'])) B1RePNRdp($_POST['txtID']);
  header('Location: form-transcripcion-de-promedios-promocion-2.php');
  exit;
?>