<?php
//* ********************************
//* Estilo por Procedimiento
//* Valido para PHP version >= 7.x
//* ********************************

include_once '../scripts/php/setting.php';
include_once '../scripts/php/proc.connection.php';
include_once '../scripts/php/proc.consulting.php';
include_once '../scripts/php/proc.insertion.php';

if (isset($_POST['btnOApp'])) {
  //! Se presume que se ejecuta DESPUES de la primera vez.

  $InsertedInTable = null;
  $idApp = $_POST['txtApp'];
  $idUser = $_POST['txtIdUser'];
  $p_User = $_POST['txtUser'];
  $p_Name = $_POST['txtName'];
  $quickmessage = $_POST['txtQuickmessage'];

  $connect = Connection();

  if ( is_object($connect) ) {

    if ( mysqli_query($connect, "CALL SP_CREATE_UAPLICACE('$idUser','$idApp', @pds_insertado, @pds_identificador);") ) {

      $StoreProcedure = mysqli_query($connect, "SELECT @pds_insertado AS Record_Inserted, @pds_identificador AS Unique_Identifier;");

      while ( $FirstRow = mysqli_fetch_assoc($StoreProcedure) ) {
        $InsertedInTable = (($FirstRow["Record_Inserted"] == '1') ? true : false);
        $idApp = $FirstRow["Unique_Identifier"];
      }

      $quickmessage .= ($InsertedInTable ? "Se insertó con éxito...!" : "Hubieron problemas...!")."<br>";
      $quickmessage .= "Identificador Único (de aplicación): $idApp<br>";

    }else {

      $quickmessage .= "El SP tiene problemas...!<br>" . mysqli_errno($connect) . "<br>" . mysqli_error($connect);

    }

    mysqli_close($connect);

  }else {

    $quickmessage .= "No hay conección...!";

  }

}else {
  //! Se presume que se ejecuta la primera vez.

  $quickmessage = $_POST['txtNombre']."<br>".$_POST['txtUsuario']."<br>";       //? Para Uso Informativo
  $idUser = null;                                                               //! id de Usuario
  $InsertedInTable = null;
  $p_Name = $_POST['txtNombre'];                                                //? Nombre del Usuario Cómo Referencia
  $p_User = $_POST['txtUsuario'];
  $p_Pass = $_POST['txtPass'];
  $p_KeyP = $_POST['txtKeyPass'];
  $p_HExp = $_POST['txtTExpira'];
  $p_WExp = $_POST['txtExpira'];
  $p_DExp = $_POST['txtDelUser'];
  $p_Sess = $_POST['txtSession'];
  $p_Menu = $_POST['txtMenu'];
  $p_EMai = $_POST['txtEMail'];

  $pos = strripos($p_WExp, "T", 0);
  $len = strlen($p_WExp);
  $par1 = substr($p_WExp, 0, $pos );
  $par2 = substr($p_WExp, ($pos + 1), ($len - $pos) );
  $p_NuevoDateTime = $par1." ".$par2.":00";

  $connection = Connection();

  if ( is_object($connection) ) {

    if ( mysqli_query($connection, "CALL SP_CREATE_USERALONG('$p_Pass','$p_KeyP','$p_User','$p_Name','$p_HExp','$p_NuevoDateTime','$p_Sess','$p_Menu','$p_DExp','$p_EMai', @pds_insertado, @pds_identificador);") ) {

      $StoreProcedure = mysqli_query($connection, "SELECT @pds_insertado AS Record_Inserted, @pds_identificador AS Unique_Identifier;");

      while ( $FirstRow = mysqli_fetch_assoc($StoreProcedure) ) {
        $InsertedInTable = (($FirstRow["Record_Inserted"] == '1') ? true : false);
        $idUser = $FirstRow["Unique_Identifier"];
      }

      $quickmessage .= ($InsertedInTable ? "Se insertó con éxito...!" : "Hubieron problemas...!")."<br>";
      $quickmessage .= "Identificador Único: $idUser<br>";

    }else {

      $quickmessage .= "El SP tiene problemas...!<br>" . mysqli_errno($connection) . "<br>" . mysqli_error($connection);

    }

    mysqli_close($connection);

  }else {

    $quickmessage .= "No hay conección...!";

  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta http-equiv="content-type" content="text/html; charset=ANSI">
  <meta name="language" content="es-ES" />
  <meta name="viewport" content="width=max-device-width, initial-scale=1, maximum-scale=1" />
  <meta name="author" content="Jesús Acosta" />
  <meta name="copyright" content="Jesús Acosta" />
  <meta name="keywords" content="html, css, académico, identificación, contabilidad, contable, diseño web, utilidades, crear páginas, curriculum vitae, foro" />
  <meta name="description" content="Página principal del sitio Web" />
  <meta name="revisit-after" content="1 month" />
  <meta name="robots" content="index, follow" />
  <meta name="REPLY-TO" content="kontakt@jesusacosta.cz">
  <meta name="Resource-type" content="Document">
  <meta name="DateCreated" content="Tue, 31 March 2020 14:00:00 GMT+1">
  <meta http-equiv="expires" content="86400" /> <!-- Equivalente a 24 horas -->
  <meta http-equiv="Cache-Control" content="no-store" />
  <title>&laquo;&nbsp;jesusacosta.cz&copy;&nbsp;&raquo;&nbsp;&nbsp;&laquo;&nbsp;Administración de Usuarios para los Projectos en Ejecución : Registro de Aplicación&nbsp;&raquo;&nbsp;</title>
  <link rev="made" href="mailto:kontakt@jesusacosta.cz">
  <link rel="StyleSheet" href="../css/_normalizar.css" type="text/css" />
  <link rel="StyleSheet" href="../css/UsersManagement.css" type="text/css" />
  <link rel="StyleSheet" href="../css/tooltip_der_blue.css" type="text/css" />
  <link rel="StyleSheet" href="../css/tabla_azul.css" type="text/css" />
  <link rel="shortcut icon" href="../img/_logo_nube.ico" type="image/x-icon" />
  <link rel="StyleSheet" href="../css/elemento_select.css" type="text/css" />
  <script src="../scripts/js/elemento_select.js"></script>
  <script src="../scripts/js/titulo.js"></script>
  <script src="../scripts/js/cuenta_caracteres.js"></script>
  <script src="https://kit.fontawesome.com/82f9d2a72c.js" crossorigin="anonymous"></script>
  <script src="../scripts/js/send_and_close.js"></script>
</head>
<body>
  <!--
  //  ? ---------------
  //  ! Ingresando App
  //  ? ---------------
  -->
  <div id="div-padre">
    <form id="TheForm" name="frmAdmUsuarios" method="post" autocomplete="off" >
      <h1 id="alcentro">Administración Principal de Usuarios</h1>
      <h3 id="alcentro">Elementos del Menú (en Horizontal)</h3>
      <?php
       echo '<input type="hidden" name="txtIdUser" value="'.$idUser.'" >';
       echo '<input type="hidden" name="txtUser" value="'.$p_User.'" >';
       echo '<input type="hidden" name="txtName" value="'.$p_Name.'" >';
      ?>
      <div id="capatres">
        <div><span>Referencia:</span></div>
        <div><span id="nota"><?php echo $quickmessage ?></span></div>
        <?php echo '<input type="hidden" name="txtQuickmessage" value="'.$quickmessage.'">'; ?>
      </div>
      <div id="capados">
        <div><label for="txtApp">Qué Aplicación Incorpora?</labe></div>
        <div>
          <div class="select_mate" data-mate-select="active">
            <?php
            $connectio = Connection();
            ArmSelect($connectio, '_tm_app', 'id_tm_app AS id, detalle_app AS detalle', 'txtApp', 'txtApp', '', 'return false;');
            mysqli_close($connectio);
            ?>
            <p class="selecionado_opcion" onclick="open_select(this)"></p>
            <span onclick="open_select(this)" class="icon_select_mate">
              <svg fill="#000000" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                <path d="M7.41 7.84L12 12.42l4.59-4.58L18 9.25l-6 6-6-6z" />
                <path d="M0-.75h24v24H0z" fill="none" />
              </svg>
            </span>
            <div class="cont_list_select_mate">
              <ul class="cont_select_int"></ul>
            </div>
          </div>
        </div>
      </div>
      <?php
        $TheCondition = "WHERE `usuario` = '$p_User'";
        $theconnect = Connection();
        $FirstRecorset = Consulting( $theconnect, "*", "vw_consult_app_x_user", $TheCondition);
        $TotalItems = mysqli_num_rows($FirstRecorset);
        if ( $TotalItems > 0 ){
          echo '
                <table>
                <caption>Aplicaciones Registradas</caption>
                <thead>
                  <tr>
                    <th>Aplicación/Módulo</th>
                  </tr>
                </thead>
                <tbody>
          ';
          mysqli_data_seek($FirstRecorset, 0);
          while ( $row = mysqli_fetch_assoc($FirstRecorset) ){
            //
            echo '
                  <tr>
                  <td'.$row["modulo"].'</td>
                  </tr>
            ';
          }
          echo '
                </tbody>
                <tfoot>
                  <tr>
                    <td>Total: '.$TotalItems.'</td>
                  </tr>
                </tfoot>
              </table>
          ';
        }
        mysqli_free_result($FirstRecorset);
        mysqli_close($theconnect);
      ?>
      <div id="centrado">
        <div class="tooltipd">
          <button type="submit" formaction="../formulare/PassOneUsersManagement.php" name="btnOUser">Anterior</button>
          <span class="tooltiptext">Pulse para Regresar e Ingresar Otro Usuario...</span>
        </div>
        <div class="tooltipd">
          <button type="submit" name="btnOApp">Otro</button>
          <span class="tooltiptext">Pulse para Ingresar Otro Módulo de Aplicación...</span>
        </div>
        <div class="tooltipd">
          <button type="button" name="btnCancelar" onclick="s_and_c();">Salir</button>
          <span class="tooltiptext">Pulse para Salir de este formulario...</span>
        </div>
      </div>
      <div id="div-padre">
        <iframe src="../stranky/foot_note.html" name="ifootnote"></iframe>
      </div>
    </form>
  </div>
</body>
</html>