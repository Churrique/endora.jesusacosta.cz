<?php
//* ********************************
//* Estilo por Procedimiento
//* Valido para PHP version >= 7.x
//* ********************************

function Consulting($local_connection, $camps, $table, $condition = null) {
  if ( is_object( $local_connection ) ) {
    $sentence = "SELECT $camps FROM `" . DATABASE . "`.`" . $table . "` " . ( is_null($condition) ? '' : $condition );
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

function ReturValue($local_connection, $table, $camp, $key, $filter = null) {
  $sentence = "SELECT " . ( is_null($filter) ? '*' : $filter ) . " FROM `" . DATABASE . "`.`" . $table . "` WHERE $camp = $key";
  if ( $record_set = mysqli_query($local_connection, $sentence) ) {
    if ( mysqli_num_rows($record_set) == 1 ) {
      $uvalue = null;
      while ( $urow = mysqli_fetch_assoc($record_set) ) {
        $uvalue = $urow["$filter"];
      }
      mysqli_free_result($record_set);
      return ( is_null($filter) ? "No hay info" : $uvalue );
    }
  }
  else {
    mysqli_close($local_connection);
    header("Location:https://www.jesusacosta.cz/stranky/error.php?cislo=" . mysqli_errno($local_connection) . "&popis=" . mysqli_error($local_connection));
    exit;
  }
}

function CrtSelect($the_connection, $p_la_tabla = null, $p_el_campo = null, $p_valor_name = null, $p_valor_id = null, $p_valor_onchange = null, $p_valor_onclick = null) {
  $sql_query = "SELECT column_type AS enumeracion FROM information_schema.COLUMNS WHERE table_schema = '" . constant( "BASEDEDATOS" ) . "' AND TABLE_NAME = '" . $p_la_tabla . "' AND column_name = '" . $p_el_campo . "';";
  $resultado = mysqli_query($the_connection, $sql_query );
  while ( $row = mysqli_fetch_array( $resultado, MYSQLI_BOTH ) )$unica_fila = $row[ "enumeracion" ];
  $vector_final = explode( ',', preg_replace( "/(enum|set|\\(|\\)|\\')/i", "", $unica_fila ) );
  echo '<select id="' . $p_valor_id . '" name="' . $p_valor_name . '" onchange="' . $p_valor_onchange . '" onclick="'. $p_valor_onclick . '">';
  foreach ( $vector_final as $el_valor )echo '<option value="' . $el_valor . '">' . $el_valor . '</option>';
  echo '</select>';
  mysqli_free_result($resultado);
}

function ArmSelect($the_connection, $p_la_tabla = null, $p_el_campo = null, $p_valor_name = null, $p_valor_id = null, $p_valor_onchange = null, $p_valor_onclick = null, $p_tercer_campo = null) {
  $sql_query = ( is_null($p_tercer_campo) ? ("SELECT " . $p_el_campo . " FROM " . $p_la_tabla . ";") : ("SELECT " . $p_el_campo . "," . $p_tercer_campo . " FROM " . $p_la_tabla . ";") );
  $resultado = mysqli_query($the_connection, $sql_query);
  echo '<select id="' . $p_valor_id . '" name="' . $p_valor_name . '" onchange="' . $p_valor_onchange . '" onclick="'. $p_valor_onclick . '">';
  while ( $fila = mysqli_fetch_array( $resultado, MYSQLI_BOTH ) ) {
    if ( is_null($p_tercer_campo) ) {
      echo '<option value="'.$fila['id'].'">'.$fila['detalle'].'</option>';
    }
    else {
        echo '<option value="'.$fila['id'].'" title="'.$fila['titulo'].'">'.$fila['detalle'].'</option>';
      }
  }
  echo '</select>';
  mysqli_free_result($resultado);
}

  // mysqli_fetch_assoc($el_resultado)
  // es igual a
  // mysql_fetch_array($el_resultado, MYSQL_ASSOC)
  // Este crea asociativo y por número
  // --> mysql_fetch_array($el_resultado, MYSQLI_BOTH)

?>