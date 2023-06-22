<?php
//* ********************************
//* Estilo por Procedimiento
//* Valido para PHP version >= 7.x
//* ********************************

include_once '../scripts/php/setting.php';
include_once '../scripts/php/proc.connection.php';
include_once '../scripts/php/proc.consulting.php';
include_once '../scripts/php/proc.insertion.php';

$quickmessage = $_POST['txtNombre']."<br>".$_POST['txtUsuario']."<br>";       //? Para Uso Informativo
$idUser = null;                                                               //! id de Usuario
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
}else {

  $quickmessage .= "No hay conección...!";

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
  <title>&laquo;&nbsp;jesusacosta.cz&copy;&nbsp;&raquo;&nbsp;&nbsp;&laquo;&nbsp;Administración de Usuarios para los Projectos en Ejecución&nbsp;&raquo;&nbsp;</title>
  <link rev="made" href="mailto:kontakt@jesusacosta.cz">
  <link rel="StyleSheet" href="../css/_normalizar.css" type="text/css" />
  <link rel="StyleSheet" href="../css/UsersManagement.css" type="text/css" />
  <link rel="StyleSheet" href="../css/tooltip_der_blue.css" type="text/css" />
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
  //  ! Menú Horizontal
  //  ? ---------------
  -->
  <div id="div-padre">
    <form id="TheForm" name="frmAdmUsuarios" method="post" autocomplete="off" >
      <h1 id="alcentro">Administración Principal de Usuarios</h1>
      <h3 id="alcentro">Elementos del Menú (en Horizontal)</h3>
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
            ArmSelect($connectio, 'usuario_app', 'id_app AS id, detalle_app AS detalle', 'txtApp', 'txtApp', '', 'return false;');
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
      <div id="capados">
        <div><label for="txtItem">Iten:</labe></div>
        <div><input type="text" name="txtItem" id="txtItem" value="" placeholder="Descripción del Item" maxlength="15" onkeyup="cItem(this);"></div>
        <div id="aladerecha" class="lineadegradada margenderecho">
          <span id="chItem" style="margin: 0em -.1875em;">
            <script>
              document.getElementById("chItem").innerHTML = document.getElementById("txtItem").maxLength.toString().trim();
            </script>
          </span>
          <span>/</span><span id="strItem">
            <script>
              document.getElementById("strItem").innerHTML = document.getElementById("txtItem").maxLength;
            </script>
          </span>
        </div>
      </div>
      <div id="capados">
        <div><label for="txtOrden">Orden/Posición:</labe></div>
        <div><input type="number" name="txtOrden" id="txtOrden" maxlength="2" placeholder="Máximo dos dígitos" value=""></div>
      </div>
      <!--
        //! **************************************************
        //?  Colocar la Tabla con los Items de cada App
        //! **************************************************
      -->
      <div id="centrado">
        <div class="tooltipd">
          <button type="submit" formaction="../formulare/PassOneUsersManagement.php" name="btnOUser">Anterior</button>
          <span class="tooltiptext">Pulse para Regresar e Ingresar Otro Usuario...</span>
        </div>
        <div class="tooltipd">
          <button type="submit" name="btnOItem">Otro</button>
          <span class="tooltiptext">Pulse para Ingresar Otro Item del Usuario Actual...</span>
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