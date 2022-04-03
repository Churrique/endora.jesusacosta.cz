<?php
//* ********************************
//* Estilo por Procedimiento
//* Valido para PHP version >= 7.x
//* ********************************

function Inserting($table, $camps, $entries, $local_connection) {
  if ( is_object( $local_connection ) ) {
    $sentence = "INSERT INTO `" . $table . "` (" . $camps . ") VALUES (" . $entries . ");";
    if ( mysqli_query($local_connection, $sentence) ) {
      return TRUE;
    }
    else {
      $verror = error_get_last();
      header("Location:https://www.jesusacosta.cz/stranky/error.php?cislo=" . $verror['type'] . "|" . mysqli_connect_errno() . "&popis=" . $verror['message'] . "|" . mysqli_connect_error());
      return FALSE;
    }
  }
  else {
    $verror = error_get_last();
    header("Location:https://www.jesusacosta.cz/stranky/error.php?cislo=" . $verror['type'] . "&popis=" . $verror['message']);
    return FALSE;
  }
}

function Consulting($local_connection, $camps, $table, $condition = null) {
  if ( is_object( $local_connection ) ) {
    $sentence = "SELECT $camps FROM `" . DATABASE . "`.`" . $table . "` " . ( is_null($condition) ? '' : $condition );
    $record_set = mysqli_query($local_connection, $sentence);
    if ( $record_set = mysqli_query($local_connection, $sentence) ) {
      if ( mysqli_fetch_assoc($record_set) > 0 ) {
        return $record_set;
      }
    }
    else {
      header("Location:https://www.jesusacosta.cz/stranky/error.php?cislo=" . mysqli_errno($local_connection) . "&popis=" . mysqli_error($local_connection));
      mysqli_close($local_connection);
      return FALSE;
    }
  }
  else {
    $verror = error_get_last();
    header("Location:https://www.jesusacosta.cz/stranky/error.php?cislo=" . $verror['type'] . "&popis=" . $verror['message']);
    return FALSE;
  }
}
?>