<?php
//* ********************************
//* Estilo por Procedimiento
//* Valido para PHP version >= 7.x
//* ********************************

include_once '../scripts/php/setting.php';
include_once '../scripts/php/proc.connection.php';
include_once '../scripts/php/proc.consulting.php';
include_once '../scripts/php/proc.insertion.php';

if (isset($_POST['btnOItem'])) {
  //! Se presume que se ejecuta DESPUES de la primera vez.
  //? It is presumed to be executed AFTER the first time.
  //* Předpokládá se, že bude provedena PO prvním použití.

  $IdUsuario = $_POST['txtIdUser'];
  $Usuario = $_POST['txtUser'];
  $Nombre = $_POST['txtName'];

  $idUserApp = $_POST['txtIdMod'];
  $DetalleApp = $_POST['txtMENU'];
  $Modulo = $_POST['txtMODULO'];

  $quickmessage = $_POST['txtQuickMe'];
  $First_Line = $_POST['txtFirL'];
  $Second_Line = $_POST['txtSecL'];
  $Third_Line = $_POST['txtThiL'];

  $ItemPerm = $_POST['txtPermisoSM'];
  $ItemSubMenu = $_POST['txtItemSubMenu'];
  $ItemURL = $_POST['txtURL'];
  $SubOrderL = $_POST['numOrderL'];

  $connection = Connection();

  if ( is_object($connection) ) {

    $quickmessage .= "<br><br>CALL SP_CREATE_USUBMODULO('$idUserApp', '$ItemPerm', '$SubOrderL', '$ItemSubMenu', '$ItemURL')<br>";

    if ( mysqli_query($connection, "CALL SP_CREATE_USUBMODULO('$idUserApp', '$ItemPerm', '$SubOrderL', '$ItemSubMenu', '$ItemURL', @pds_insertado, @pds_identificador);") ) {

      $StoreProcedure = mysqli_query($connection, "SELECT @pds_insertado AS Record_Inserted, @pds_identificador AS Unique_Identifier;");

      while ( $FirstRow = mysqli_fetch_assoc($StoreProcedure) ) {
        $InsertedInTable = (($FirstRow["Record_Inserted"] == '1') ? true : false);
        $IdModuleUser = $FirstRow["Unique_Identifier"];
      }

      $quickmessage .= ($InsertedInTable ? "Se insertó con éxito...!" : "Hubieron problemas...!")."<br>";
      $quickmessage .= "Identificador Único: $IdModuleUser<br>";

    }else {

      $quickmessage .= "El SP tiene problemas...!<br>" . mysqli_errno($connection) . "<br>" . mysqli_error($connection);

    }

    mysqli_close($connection);

  }else {

    $quickmessage .= "No hay conección...!";

  }
} else {
  //! Se presume que se ejecuta la primera vez.
  //# It is presumed to be executed the first time.
  //| Předpokládá se, že bude provedena poprvé.

  $IdUsuario = $_POST['txtIdUsuario'];
  $Usuario = $_POST['txtUsuario'];
  $Nombre = $_POST['txtNombre'];

  $idUserApp = $_GET['id'];
  $DetalleApp = $_GET['menu'];
  $Modulo = $_GET['modulo'];

  $quickmessage = "Nombre: ".$Nombre."<br>Usuario: ".$Usuario."<br>Menú: ".$_GET['menu']."<br>";
  $First_Line = "Nombre: ".$Nombre."<br>Usuario: ".$Usuario."<br>";
  $Second_Line = "MODULO: ".$Modulo."<br>";
  $Third_Line = "MENÚ: ".$DetalleApp."<br>";

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
  //  ? ---------------------
  //  ! Menú Horizontal
  // # Horizontal Menu
  // | Horizontální nabídka
  //  ? ---------------------
  -->
  <div id="div-padre">
    <form id="TheForm" name="frmAdmUsuarios" method="post" autocomplete="off" >
      <h1 id="alcentro">Administración Principal de Usuarios</h1>
      <h3 id="alcentro">Elementos del Sub-Menú (en Vertical)</h3>
      <div id="capatres">
        <div><span>Referencia:</span></div>
        <div><span id="nota"><?php echo $First_Line ?></span></div>
        <div><span id="notagruesa"><?php echo $Second_Line ?></span></div>
        <div><span id="notagruesa"><?php echo $Third_Line ?></span></div>
        <div><span id="nota">
          <?php
            //! Para hacer seguimiento
            //# echo '<div><span id="nota">'.$quickmessage.'</span></div>';
          ?>
        </span></div>
        <?php
          echo '<input type="hidden" name="txtIdUser" value="'.$IdUsuario.'">';
          echo '<input type="hidden" name="txtUser" value="'.$Usuario.'">';
          echo '<input type="hidden" name="txtName" value="'.$Nombre.'">';
          echo '<input type="hidden" name="txtIdMod" value="'.$idUserApp.'">';
          echo '<input type="hidden" name="txtMENU" value="'.$DetalleApp.'">';
          echo '<input type="hidden" name="txtMODULO" value="'.$Modulo.'">';
          echo '<input type="hidden" name="txtQuickMe" value="'.$quickmessage.'">';
          echo '<input type="hidden" name="txtFirL" value="'.$First_Line.'">';
          echo '<input type="hidden" name="txtSecL" value="'.$Second_Line.'">';
          echo '<input type="hidden" name="txtThiL" value="'.$Third_Line.'">';
        ?>
      </div>
      <div id="capados">
        <div><label for="txtItemMenu">Descripción del Item:</labe></div>
        <div><input type="text" name="txtItemSubMenu" id="txtItemSubMenu" value="" placeholder="Descripción del Item" maxlength="15" onkeyup="cItemSubMenu(this);"></div>
        <div id="aladerecha" class="lineadegradada margenderecho">
          <span id="chItemSubMenu" style="margin: 0em -.1875em;">
            <script>
              document.getElementById("chItemSubMenu").innerHTML = document.getElementById("txtItemSubMenu").maxLength.toString().trim();
            </script>
          </span>
          <span>/</span><span id="strItemSubMenu">
            <script>
              document.getElementById("strItemSubMenu").innerHTML = document.getElementById("txtItemSubMenu").maxLength;
            </script>
          </span>
        </div>
      </div>
      <div id="capados">
        <div><label for="numOrderL">Orden/Posición:</labe></div>
        <div><input type="number" name="numOrderL" id="numOrderL" value="" placeholder="Posición del Item" maxlength="2" onkeyup="cOrderL(this);"></div>
        <div id="aladerecha" class="lineadegradada margenderecho">
          <span id="chOrderL" style="margin: 0em -.1875em;">
            <script>
              document.getElementById("chOrderL").innerHTML = document.getElementById("numOrderL").maxLength.toString().trim();
            </script>
          </span>
          <span>/</span><span id="strOrderL">
            <script>
              document.getElementById("strOrderL").innerHTML = document.getElementById("numOrderL").maxLength;
            </script>
          </span>
        </div>
      </div>
      <div id="capados">
        <div><label for="txtURL">URL a Ejecutar:</labe></div>
        <div><textarea name="txtURL" id="txtURL" placeholder="Indique la URL a Ejecutar..." placeholder="Indique la URL a ejecutar..." maxlength="100" onkeyup="cOrderL(this);"></textarea></div>
        <div id="aladerecha" class="lineadegradada margenderecho">
          <span id="chOrderL" style="margin: 0em -.1875em;">
            <script>
              document.getElementById("chOrderL").innerHTML = document.getElementById("numOrderL").maxLength.toString().trim();
            </script>
          </span>
          <span>/</span><span id="strOrderL">
            <script>
              document.getElementById("strOrderL").innerHTML = document.getElementById("numOrderL").maxLength;
            </script>
          </span>
        </div>
      </div>
      <div id="capados">
        <div><label for="txtPermisoSM'">Qué Tipo de Permiso(s) Tendra?</labe></div>
        <div>
          <div class="select_mate" data-mate-select="active">
            <?php
              $connectio = Connection();
              ArmSelect($connectio, 'usuario_permisos', 'id_permisoitem AS id, detail_permission AS detalle', 'txtPermisoSM', 'txtPermisoSM', '', 'return false;');
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
      <!--
        //! ****************************************************
        //?  Colocar la Tabla con los Items del Menú Vertical
        //#  
        //|  
        //! ****************************************************
      -->
      <?php
        $TheCondition = "WHERE `usuario` = '$Usuario'";
        $theconnect = Connection();
        $FirstRecorset = Consulting( $theconnect, "*", "vw_consult_usuario_submenuv", $TheCondition);
        if (is_object($FirstRecorset)) {
          $TotalItems = mysqli_num_rows($FirstRecorset);
          if ( $TotalItems > 0 ){
            echo '
                  <table>
                  <caption>Módulo/Área/Aplicación {'.$Modulo.'} Menú '.$DetalleApp.'</caption>
                  <thead>
                    <tr>
                    <th style="width:50%">Elementos del Sub-Menú</th>
                    <th style="width:50%">URL a Ejecutar</th>
                    </tr>
                  </thead>
                  <tbody>
            ';
            mysqli_data_seek($FirstRecorset, 0);
            while ( $row = mysqli_fetch_assoc($FirstRecorset) ){
              echo '
                    <tr>
                      <td style="width:50%">'.$row["submenu"].'</td>
                      <td style="width:50%">
                        <button style="padding: 0%;" type="submit" formaction="">
                          <img src="../demo/academico/img/png/places.png" alt="places.png" width="24" height="24">
                        </button>
                      </td>
                    </tr>
              ';
            }
            echo '
                  </tbody>
                  <tfoot>
                    <tr>
                      <td colspan="2" >Total: '.$TotalItems.'</td>
                    </tr>
                  </tfoot>
                </table>
            ';
          }
          mysqli_free_result($FirstRecorset);
        } else {
          $FirstRecorset = FALSE;
          $TotalItems = 0;
        }
        mysqli_close($theconnect);
      ?>
      <div id="centrado">
        <div class="tooltipd">
          <button type="submit" formaction="../formulare/Pass03UsersManagement.php" name="btnO4User">Anterior</button>
          <span class="tooltiptext">Pulse para Regresar e Ingresar Otro Item al Menu...</span>
        </div>
        <div class="tooltipd">
          <button type="submit" name="btnOItem">Adicionar</button>
          <span class="tooltiptext">Pulse para Ingresar Otro Item para el Sub-Menú Vertical...</span>
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