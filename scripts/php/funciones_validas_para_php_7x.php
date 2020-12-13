<?php
define("SERVIDOR", "localhost");
define("BASEDEDATOS", "mi_base_de_datos");
define("PUERTO", "3306");
define("USUARIO", "nombre_del_usuario");
define("CONTRASENIA", "la_contraseña");

function conecta() {
    $enlace = mysqli_connect(SERVIDOR, USUARIO, CONTRASENIA, BASEDEDATOS, PUERTO);
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