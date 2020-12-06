<?php
require_once('../funciones/valida-funciones.php');
require_once('../funciones/valida-funciones_inv_xxxxxxxx.php');
EliInv($_GET['ID']);
header('Location: form-inventario-x-pieza-full-movimientos-2.php');
exit;
?>