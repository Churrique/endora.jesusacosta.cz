<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="language" content="es-ES" />
    <meta name="viewport" content="width=max-device-width, initial-scale=1.0, user-scalable=yes/zoom" />
    <meta name="author" content="Jesús Acosta" />
    <meta name="copyright" content="Jesús Acosta" />
    <meta name="keywords" content="html, css, diseño web, utilidades, crear páginas, curriculum vitae, foro" />
    <meta name="description" content="Página principal del sitio Web" />
    <meta name="revisit-after" content="1 month" />
    <meta name="robots" content="index, follow" />
    <meta name="REPLY-TO" content="kontakt@jesusacosta.cz" />
    <meta name="Resource-type" content="Document" />
    <meta name="DateCreated" content="Tue, 31 March 2020 14:00:00 GMT+1" />
    <meta http-equiv="expires" content="86400" /> <!-- Equivalente a 24 horas -->
    <title>&laquo;&nbsp;Buscando -> Resultado...!&nbsp;&raquo;&nbsp;&laquo;&nbsp;jesusacosta.cz&copy;&nbsp;&raquo;&nbsp;&nbsp;&nbsp;</title>
    <link rev="made" href="mailto:kontakt@jesusacosta.cz" />
    <link rel="StyleSheet" href="../../../css/_normalizar.css" type="text/css" />
    <link rel="StyleSheet" href="../../../demo/academico/css/controles.css" type="text/css" />
    <link rel="stylesheet" href="../../../demo/academico/css/busqueda.css" type="text/css" />
    <link rel="StyleSheet" href="../../../css/tooltip_der_blue.css" type="text/css" />
    <link rel="shortcut icon" href="../../../img/_logo_nube.ico" type="image/x-icon" />
    <script src="../../../scripts/js/titulo.js"></script>
    <script src="../../../scripts/js/trigger_event_click_in_rb_button.js"></script>
    <script src="https://kit.fontawesome.com/82f9d2a72c.js" crossorigin="anonymous"></script>
  </head>
  <?php
    include_once '../../../scripts/php/setting.php';
    include_once '../../../scripts/php/proc.connection.php';
  ?>
  <body>
    <div id="div-padre">
      <form name="frmRBusqueda" id="frmRBusqueda" autocomplete="off" method="POST">
        <?php
          if (! $_POST['txtIUDatPer'] == '') {
            $SqlStatement = "SELECT * FROM vw_consult_m1 WHERE id_dat = '".$_POST['txtIUDatPer']."'; -- Búsqueda por IDENTIFICADOR.";
          } else {
            // NOMBRE
            if (! $_POST['txtNombre'] == '' && $_POST['txtApellido'] == '' && $_POST['txtNValor'] == '') {
              $SqlStatement = "SELECT * FROM vw_consult_m1 WHERE p_nom = '".$_POST['txtNombre']."'; -- Búsqueda por NOMBRE.";
              // NOMBRE y APELLIDO
            } elseif (! $_POST['txtNombre'] == '' && ! $_POST['txtApellido'] == '' && $_POST['txtNValor'] == '') {
              $SqlStatement = "SELECT * FROM vw_consult_m1 WHERE p_nom = '".$_POST['txtNombre']."' AND p_ape = '".$_POST['txtApellido']."'; -- Búsqueda por NOMBRE y APELLIDO.";
              // NOMBRE y DOCUMENTO
            } elseif (! $_POST['txtNombre'] == '' && $_POST['txtApellido'] == '' && ! $_POST['txtNValor'] == '') {
              $SqlStatement = "SELECT * FROM vw_consult_m1 WHERE p_nom = '".$_POST['txtNombre']."' AND doc_num = '".$_POST['txtNValor']."'; -- Búsqueda por NOMBRE y DOCUMENTO.";
              // DOCUMENTO
            } elseif ($_POST['txtNombre'] == '' && $_POST['txtApellido'] == '' && ! $_POST['txtNValor'] == '') {
              $SqlStatement = "SELECT * FROM vw_consult_m1 WHERE doc_num = '".$_POST['txtNValor']."'; -- Búsqueda por DOCUMENTO.";
              // DOCUMENTO y APELLIDO
            } elseif ($_POST['txtNombre'] == '' && ! $_POST['txtApellido'] == '' && ! $_POST['txtNValor'] == '') {
              $SqlStatement = "SELECT * FROM vw_consult_m1 WHERE doc_num = '".$_POST['txtNValor']."' AND p_ape = '".$_POST['txtApellido']."'; -- Búsqueda por DOCUMENTO y APELLIDO.";
              // APELLIDO
            } elseif ($_POST['txtNombre'] == '' && ! $_POST['txtApellido'] == '' && $_POST['txtNValor'] == '') {
              $SqlStatement = "SELECT * FROM vw_consult_m1 WHERE p_ape = '".$_POST['txtApellido']."'; -- Búsqueda por APELLIDO.";
              // NOMBRE y APELLIDO y DOCUMENTO
            } else {
              $SqlStatement = "SELECT * FROM vw_consult_m1 WHERE p_nom = '".$_POST['txtNombre']."' AND p_ape = '".$_POST['txtApellido']."' AND doc_num = '".$_POST['txtNValor']."'; -- Búsqueda por NOMBRE, APELLIDO y DOCUMENTO.";
            }
          }
        ?>
        <h1 id="alcentro">Búsqueda (Resultado)</h1>
        <div id="div-padre">
        <?php
          $Filtro = explode(" -- ", $SqlStatement);
          $RLink = Connection();
          $Result = mysqli_query($RLink,$SqlStatement);
          $RowCount = mysqli_num_rows($Result);
          if ( $RowCount > 1 ) {
            echo '
                <table>
                <caption>'.$Filtro[1].'<br>Se encontraron ['.$RowCount.'] registros...</caption>
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Documento</th>
                    <th>?</th>
                  </tr>
                </thead>
                <tbody>
          ';
          while ( $row = mysqli_fetch_array( $Result, MYSQLI_BOTH ) ) {
            echo '
                <tr>
                  <td class="ConCinco">'.$row['id_dat'].'</td>
                  <td class="ConTreinta">'.$row['p_nom'].'</td>
                  <td class="ConTreinta">'.$row['p_ape'].'</td>
            ';
            if ( is_null( $row['doc_num'] ) ) {
              echo '
                  <td class="ConVeinte" title="No hay referencia de algún número de documento..."><button name="btnFallido" type="button" id="Fallido"></button></td>
              ';
            } else {
              echo '
                  <td class="ConVeinte" title="'.$row['id_doc'].':'.$row['doc_tipo'].'">'.$row['doc_num'].'</td>
              ';
            }
            $auxiliar = "'".$_POST['txtNext_Step']."','".$row['id_dat']."','".$row['p_nom']." ".$row['p_ape']."'";
            echo '
                  <td class="ConQuince" title="Voy a tomar éste registo..."><button name="btnAproB" type="button" id="ChangeIcon" onclick="trigger_click_in_add('.$auxiliar.');"></button></td>
                </tr>
            ';
          }
          echo '
                </tbody>
                <tfoot>
                  <tr>
                    <td colspan="5">
                      PANTALLA FINAL:<br>'.$_POST['txtNext_Step'].'
                    </td>
                  </tr>
                </tfoot>
                </table>
          ';
          } elseif ( $RowCount == 1 ) {
            //
          } else { // X <= 0
            //
          }
          mysqli_free_result( $Result );
          mysqli_close( $RLink );
        ?>
        </div>
        <div id="centrado">
          <div class="tooltipd">
            <button type="button" name="btnCancel"><a href="../../academico" target="_top">Salir</a></button>
            <span class="tooltiptext">Pulse para Salir de este formulario...</span>
          </div>
        </div>
        <div id="div-padre">
          <footer>
            <p><span id="logo"><i class="fas fa-info-circle fa-2x"></i></span>Los tapices usados en esta página son cortesía de:</p>
            <dl>
              <dt>Papel pintado abstracto blanco</dt>
              <dd><a href='https://www.freepik.es/vectores/fondo'>Vector de Fondo creado por freepik - www.freepik.es</a></dd>
              <dt>Acuarela pintada amano con forma de cielo y nube</dt>
              <dd><a href='https://www.freepik.es/fotos/fondo'>Foto de Fondo creado por denamorado - www.freepik.es</a></dd>
            </dl>
          </footer>
        </div>
      </form>
    </div>
  </body>
</html>