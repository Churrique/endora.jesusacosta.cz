<?php
//************************************/
//*  Valido para PHP versión >= 7.x  */
//************************************/

function conecta($p_ser=SERVIDOR, $p_user=USUARIO, $p_pass=CONTRASENIA, $p_bdd=BASEDEDATOS, $p_puer=PUERTO) {
    $enlace = mysqli_connect($p_ser, $p_user, $p_pass, $p_bdd, $p_puer);
    if (!$enlace) {
        $cadena_del_error = 'Error de Conexión (' . mysqli_connect_errno() . ') ' . mysqli_connect_error();
    }
    if (is_object($enlace)) {
        return($enlace);
    }
    else {
        return($cadena_del_error);
    }
}
function consulta($p_sql = "") {
    $link = conecta();
    if(is_object($link)){
        $resultado = mysqli_query($link, $p_sql);
    }
    elseif(is_string($link)) {
        echo $link;
    }
    else {
        echo 'Cuidado! Error No Depurado...';
    }
    // if ($resultado = mysqli_query($enlace, $consulta)) {

    //     /* obtener array asociativo */
    //     while ($row = mysqli_fetch_assoc($resultado)) {
    //         printf ("%s (%s)\n", $row["Name"], $row["CountryCode"]);
}
?>