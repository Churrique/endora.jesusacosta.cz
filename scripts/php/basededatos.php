<?php
//************************************/
//*  Valido para PHP versión >= 7.x  */
//************************************/

function conecta($p_ser = SERVIDOR, $p_user = USUARIO, $p_pass = CONTRASENIA, $p_bdd = BASEDEDATOS, $p_puer = PUERTO) {
    $enlace = mysqli_connect($p_ser, $p_user, $p_pass, $p_bdd, $p_puer);
    if (!$enlace) {
        header("Location: https://www.jesusacosta.cz/stranky/error.php?cislo=".mysqli_connect_errno()."&popis=".mysqli_connect_error());
        exit;
    }
    if (is_object($enlace)) {
        return($enlace);
    }
    else {
        header("Location: https://www.jesusacosta.cz/stranky/error.php?cislo=0&popis= Cuidado! Error No Depurado...");
        exit;
        //return(false);
      }
}

function consulta( $p_conexion = null, $p_sql = null ) {
   $resultado = mysqli_query( $p_conexion, $p_sql );
   if ( is_object( $resultado ) ) {
      return ( $resultado );
   } elseif ( is_string( $resultado ) ) {
      $error_en_instruccion = 'Error número: ' . mysqli_errno( $p_conexion ) . '<br>Descripción: ' . mysqli_error( $p_conexion );
      return ( $error_en_instruccion );
   }
   else {
      return ( '<br>Cuidado! Error No Depurado...<br>' );
   }
}

function CrtSelect( $p_la_tabla = null, $p_el_campo = null, $p_valor_name = null, $p_valor_id = null, $p_valor_onchange = null, $p_valor_onclick = null ) {
   // mysqli_fetch_assoc($el_resultado)
   // es igual a
   // mysql_fetch_array($el_resultado, MYSQL_ASSOC)
   // Este crea asociativo y por número
   // --> mysql_fetch_array($el_resultado, MYSQLI_BOTH)
   $sql_query = "SELECT column_type AS enumeracion FROM information_schema.COLUMNS WHERE table_schema = '" . constant( "BASEDEDATOS" ) . "' AND TABLE_NAME = '" . $p_la_tabla . "' AND column_name = '" . $p_el_campo . "';";
   $link = conecta();
   $resultado = consulta( $link, $sql_query );
   while ( $row = mysqli_fetch_array( $resultado, MYSQLI_BOTH ) )$unica_fila = $row[ "enumeracion" ];
   $vector_final = explode( ',', preg_replace( "/(enum|set|\\(|\\)|\\')/i", "", $unica_fila ) );
   echo '<select id="' . $p_valor_id . '" name="' . $p_valor_name . '" onchange="' . $p_valor_onchange . '" onclick="'. $p_valor_onclick . '">';
   foreach ( $vector_final as $el_valor )echo '<option value="' . $el_valor . '">' . $el_valor . '</option>';
   echo '</select>';
   mysqli_free_result( $resultado );
   mysqli_close( $link );
}

?>