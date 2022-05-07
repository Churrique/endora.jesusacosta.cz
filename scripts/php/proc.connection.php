<?php
//* ********************************
//* Estilo por Procedimiento
//* Valido para PHP version >= 7.x
//* ********************************

function Connection() {
  $the_connection = mysqli_connect(SERVIDOR, USUARIO, CONTRASENIA, BASEDEDATOS);
  if (is_bool($the_connection)) {
    header("Location:https://www.jesusacosta.cz/stranky/error.php?cislo=" . mysqli_connect_errno() . "&popis=" . mysqli_connect_error());
    exit;
  }
  else {
    return $the_connection;
  }
}
