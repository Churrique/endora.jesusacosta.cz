<!DOCTYPE html>
<html lang="en-ES">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>

<body>
   <?php
   require_once( '../scripts/php/variables.php' );
   require_once( '../scripts/php/basededatos.php' );
   $serv = (empty($_GET['txtSer'])) ? $_GET['txtServidor'] : $_GET['txtSer'];
   $data = (empty($_GET['txtBdd'])) ? $_GET['txtBaseDatos'] : $_GET['txtBdd'];
   $puer = (empty($_GET['txtPue'])) ? $_GET['txtPuerto'] : $_GET['txtPue'];
   $usua = (empty($_GET['txtUsu'])) ? $_GET['txtUsuario'] : $_GET['txtUsu'];
   $pass = (empty($_GET['txtCon'])) ? $_GET['txtContrasenia'] : $_GET['txtCon'];
   if ( isset( $_GET[ 'btnEnviar' ] ) ) {
      $conexion = conecta($serv, $usua, $pass, $data, $puer);
      if ( is_object( $conexion ) ) {
         echo 'Conexción establecida con éxito...!';
      }
      if ( is_string( $conexion ) ) {
         echo '
            <iframe name="ifmError" sandbox="allow-scripts" src="../stranky/error.html" frameborder="0" style="width: 31.25em; height: 20em;"></iframe>
            <br>
            ';
      }
   }
   ?>
   <form name="frmPrueba" id="frmPrueba">
      <h1>Valores iniciales de conexión.</h1>
      <?php
      echo '
        <label>Servidor</label>
        <input type="text" size="25" value="' . constant( "SERVIDOR" ) . '" name="txtServidor">
        <br />
        <label>Base de Datos</label>
        <input type="text" size="25" value="' . constant( "BASEDEDATOS" ) . '" name="txtBaseDatos">
        <br />
        <label>Puerto</label>
        <input type="text" size="25" value="' . constant( "PUERTO" ) . '" name="txtPuerto">
        <br />
        <label>Usuario</label>
        <input type="text" size="25" value="' . constant( "USUARIO" ) . '" name="txtUsuario">
        <br />
        <label>Contraseña</label>
        <input type="text" size="25" value="' . constant( "CONTRASENIA" ) . '" name="txtContrasenia">
        ';
      ?>
      <h1>Valores alternos de conexión.</h1>
      <label>Servidor</label>
      <input type="text" size="25" value="" name="txtSer">
      <br/>
      <label>Base de Datos</label>
      <input type="text" size="25" value="" name="txtBdd">
      <br/>
      <label>Puerto</label>
      <input type="text" size="25" value="" name="txtPue">
      <br/>
      <label>Usuario</label>
      <input type="text" size="25" value="" name="txtUsu">
      <br/>
      <label>Contraseña</label>
      <input type="text" size="25" value="" name="txtCon">

      <br><input type="submit" value="Enviar" name="btnEnviar">
   </form>
</body>
</html>