<?php
//* ********************************
//* Estilo por Procedimiento
//* Valido para PHP version >= 7.x
//* ********************************

include_once '../../../scripts/php/setting.php';
include_once '../../../scripts/php/proc.connection.php';
include_once '../../../scripts/php/proc.consulting.php';
include_once '../../../scripts/php/proc.insertion.php';

$idDatP = null;                         //! iddatospersonales
$idDocu = $_POST['txtDocumento'];       //! id_tm_documento_identificacion
$DesDoc = null;                         //? Descripción de id_tm_documento_identificacion
$idDatI = null;                         //! iddatosidentificacion
$NumDoc = $_POST['txtNValor'];
$Nombre = $_POST['txtNombre'];
$Apelli = $_POST['txtApellido'];
$NomCom = $_POST['txtNomCom'];
$idSexo = $_POST['txtSexo'];
$FecNac = $_POST['txtFechaNac'];

$QuickMessage = '';
$InsertedInTable = false;
$SndInsertedInTable = false;

$cam = "`id_tm_documento_identificacion`, `nombre`, `apellido`, `nombrecompleto`, `sexo`, `nacimiento`";
$val = "$idDocu,'$Nombre','$Apelli','$NomCom','$idSexo','$FecNac'";
$numberecords = 0;

//! $inserto = new \QuerysDB\CRUDDataBase("datos_personales", $cam, $val);

//! echo $inserto->Inserting("datos_personales", $cam, $val);

$connection = Connection();

if ( is_object($connection) ) {

  //if ( Inserting("datos_personales", $cam, $val, $connection) ) {
  if ( mysqli_query($connection, "CALL SP_CREATE_DP('$Nombre','$Apelli','$NomCom','$idSexo','$FecNac', @pds_insertado, @pds_identificador);") ) {

    $StoreProcedure = mysqli_query($connection, "SELECT @pds_insertado AS Record_Inserted, @pds_identificador AS Unique_Identifier;");

    while ( $FirstRow = mysqli_fetch_assoc($StoreProcedure) ) {
      $InsertedInTable = (($FirstRow["Record_Inserted"] == '1') ? true : false);
      $idDatP = $FirstRow["Unique_Identifier"];
    }

    $FirstCondition = "WHERE TRIM(p_nom) = '" . $Nombre . "' AND TRIM(p_ape) = '" . $Apelli . "'";
    $FirstRecorset = Consulting($connection, "*", "vw_datper", $FirstCondition);
    $numberecords = mysqli_num_rows($FirstRecorset);

    if ($numberecords == 1) {
      //

      if ( mysqli_query($connection, "CALL SP_CREATE_DDI($idDatP, $idDocu, '$NumDoc', @pds_insertado, @pds_identificador);") ) {

        $SndStoreProcedure = mysqli_query($connection, "SELECT @pds_insertado AS record_insert, @pds_identificador AS unique_identifier;");

        while ( $SndRow = mysqli_fetch_assoc($SndStoreProcedure) ) {
          $SndInsertedInTable = (($SndRow["record_insert"] == '1') ? true : false);
          $idDatI = $SndRow["unique_identifier"];
        }

        if ($SndInsertedInTable == 1) {

          $DesDoc = ReturValue($connection, '_tm_documento_identificacion', 'id_tm_documento_identificacion', $idDocu, 'documento_identificacion');

          $FirstInterprete = (($InsertedInTable) ? 'Insertado OK! {1}' : 'No Inserto {1}');
          $SndInterprete = (($SndInsertedInTable) ? 'Insertado OK! {2}' : 'No Inserto {2}');
          $QuickMessage .= "$FirstInterprete $SndInterprete<br>Identificadores Únicos para:<br>[Documentos de Identificación {Datos} ] $idDatI , $idDatP, $idDocu, $NumDoc<br>[Datos Personales] $idDatP {IMPORTANTE}<br>[Documento {Tipo y Número} ] $idDocu, $NumDoc";

          mysqli_free_result($FirstRecorset);
          mysqli_close($connection);

        } else {

          $QuickMessage .= 'No hay confirmación de insersión en la segunda tabla...';

        }

      } else {

        $QuickMessage .= 'El "SP{2}" falló por alguna causa desconocida...';

      }

    } elseif ($numberecords > 1) {
      $DesDoc = ReturValue($connection, '_tm_documento_identificacion', 'id_tm_documento_identificacion', $idDocu, 'documento_identificacion');

    } else {
      // Es cero (0) o menos uno (-1)
      $DesDoc = ReturValue($connection, '_tm_documento_identificacion', 'id_tm_documento_identificacion', null, 'documento_identificacion');
    }

  } else {

    $QuickMessage .= 'El "SP{1}" falló por alguna causa desconocida...';

  }

} else {

  $QuickMessage .= 'No hay conectividad con la "BD"';

}
?>

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
  <title>&laquo;&nbsp;Datos Personales Procesados&nbsp;&raquo;&nbsp;&laquo;&nbsp;jesusacosta.cz&copy;&nbsp;&raquo;&nbsp;&nbsp;&nbsp;</title>
  <link rev="made" href="mailto:kontakt@jesusacosta.cz" />
  <link rel="StyleSheet" href="../../../css/_normalizar.css" type="text/css" />
  <link rel="StyleSheet" href="../../../demo/academico/css/controles.css" type="text/css" />
  <link rel="stylesheet" href="../../../demo/academico/css/tabla.css" type="text/css" />
  <link rel="StyleSheet" href="../../../css/tooltip_der_blue.css" type="text/css" />
  <link rel="shortcut icon" href="../../../img/_logo_nube.ico" type="image/x-icon" />
  <script src="../../../scripts/js/titulo.js"></script>
  <script src="../../../scripts/js/trigger_event_click_in_button.js"></script>
</head>

<body>
  <div id="div-padre">
    <form name="frmPDP" id="frmPDP" autocomplete="off" method="post" action="datos_personales.php">
      <h1 id="alcentro">[2]Procesando: Ficha de Datos Personales</h1>
      <div id="capatres">
        <div><span>Documento:</span></div>
        <div><span id="cinput" title="Número del Documento..."><?php echo $NumDoc ?></span></div>
        <?php echo '<input type="hidden" name="txtNValor" id="txtNValor" value="'.$NumDoc.'">'; ?>
      </div>
      <div id="capatres">
        <div><span>Tipo de Documento:</span></div>
        <div><span id="cinput" title="Tipo de Documento..."><?php echo "$idDocu : $DesDoc" ?></span></div>
        <?php echo '<input type="hidden" name="txtDocumento" value="'.$idDocu.' : '.$DesDoc.'">'; ?>
      </div>
      <div id="capatres">
        <div><span>Nombre:</span></div>
        <div><span id="cinput" title="Primer Nombre..."><?php echo $Nombre ?></span></div>
        <?php echo '<input type="hidden" name="txtNombre" value="'.$Nombre.'">'; ?>
      </div>
      <div id="capatres">
        <div><span>Apellido:</span></div>
        <div><span id="cinput" title="Primer Apellido..."><?php echo $Apelli ?></span></div>
        <?php echo '<input type="hidden" name="txtApellido" value="'.$Apelli.'">'; ?>
      </div>
      <div id="capatres">
        <div><span>Nombre Completo:</span></div>
        <div><span id="cinput" title="Nombre Completo..."><?php echo $NomCom ?></span></div>
        <?php echo '<input type="hidden" name="txtNomCom" value="'.$NomCom.'">'; ?>
      </div>
      <div id="capatres">
        <div><span>Sexo:</span></div>
        <div><span id="cinput" title="Sexo..."><?php echo $idSexo ?></span></div>
        <?php echo '<input type="hidden" name="txtSexo" value="'.$idSexo.'">'; ?>
      </div>
      <div id="capatres">
        <div><span>Fecha de Nacimiento:</span></div>
        <div><span id="cinput" title="Fecha de Nacimiento..."><?php echo $FecNac ?></span></div>
        <?php echo '<input type="hidden" name="txtFechaNac" value="'.$FecNac.'">'; ?>
      </div>
      <?php
        if ($numberecords == 1) {
          //
          echo '
            <div id="capatres">
              <div><span>Comportamiento:</span></div>
              <div><span id="nota">'.$QuickMessage.'</span></div>
              <input type="hidden" name="txtQuickmessage" value="'.$QuickMessage.'">
            </div>
          ';
        }
        if ($numberecords > 1) {
          echo '
            <div id="capatres">
              <div><span id="nota">NOTA IMPORTANTE</span></div>
              <div><span id="nota">De <span id="noteinred">la tabla</span> que se muestra <span id="noteinred">en la parte inferior</span>, Usted <span id="noteinred">debe seleccionar una de las entradas</span> que se muestran <span id="noteinred">para poder completar la incorporación del nuevo registro</span>, esto se debe a que hubo más de una coincidencia. El proceso en sí esta a un 50%, el porcentaje restante, del proceso, lo debe completar Usted, si así lo desea. <span id="noteinred">Considere</span> la opcion de <span id="noteinred">Salir si no esta seguro</span>.<br><span id="noteinred">Para completar el ingreso</span>, posicione el puntero del mouse sobre el dibujo <img src="../../academico/img/png/confirmarque.png" height="18" width="18"> éste cambiará a <img src="../../academico/img/png/confirmarsi.png" height="18" width="18"> y en ese momento puede hacer click para continuar con el proceso de ingreso, pasará a otra pantalla y solamente tiene que seguir la lógica del proceso.<br><span id="noteinred">Tenga presente que, cuando usted selecciona un item, se tomaran los valores de él</span>; es decir, que los valores de: el nombre completo, el tipo de documento presentado, el sexo y la fecha de nacimiento, <span id="noteinred">sustituiran a los valores inicialmente introducidos</span>.<br><span id="noteinred">SI USTED QUIERE EL REGISTRO ACTUAL</span> (el que facilitó en este momento), <span id="noteinred">SELECCIONE EL ÚLTIMO DE LA TABLA</span> o lista presentada abajo.</span></div>
            </div>
               ';
          echo '
              <table>
              <caption>Total de Registros Encontrados ['.$numberecords.']</caption>
              <thead>
                <tr>
                  <th title="Aprobar:?..."></th>
                  <th title="Referencia...">Id</th>
                  <th>Documento</th>
                  <th>Nombre Apellido</th>
                  <th>Sexo</th>
                  <th title="Fecha de Nacimiento...">Fecha</th>
                </tr>
              </thead>
              <tbody>
              ';
          mysqli_data_seek($FirstRecorset, 0);
          while ($row = mysqli_fetch_assoc($FirstRecorset)) {
            echo '<input type="hidden" name="txt_id_dat'.$row["id_dat"].'" id="txt_id_dat'.$row["id_dat"].'" value="'.$row["id_dat"].'">';
            echo '<input type="hidden" name="txt_id_doc'.$row["id_dat"].'" id="txt_id_doc'.$row["id_dat"].'" value="'.$row["id_doc"].'">';
            echo '<input type="hidden" name="txt_doc_num'.$row["id_dat"].'" id="txt_doc_num'.$row["id_dat"].'" value="'.$row["doc_num"].'">';
            echo '
                <tr>
                <td title="Aprobar:Si..."><button name="btnIngFor" id="ChangeIcon" type="button" onclick="trigger_click_in_dp( '.$row["id_dat"].')" ></button></td>
                <td>'.$row["id_dat"].'</td>
                <td title="Identificador: '.$row["id_doc"].'">'.$row["doc"].'</td>
                <td title="Nombre Completo: '.$row["nom_c"].'">'.$row["p_nom"].' '.$row["p_ape"].'</td>
                <td>'.$row["sexo"].'</td>
                <td title="Fecha de Nacimiento...">'.$row["f_nac"].'</td>
                </tr>
                ';
          }
          echo '
              </tbody>
              <tfoot>
                <tr>
                  <th colspan="6">
                    ATENCIÓN...! Se encontro más de una incidencia...
                  </th>
                </tr>
              </tfoot>
            </table>
            ';
          mysqli_free_result($FirstRecorset);
          mysqli_close($connection);
        }
      ?>
      <div id="centrado">
        <?php
          echo '<input type="hidden" name="numberecords" value="'.$numberecords.'">';
          if ($numberecords == 1) {
            echo '
              <div class="tooltipd">
                <button type="submit" name="btnSdOtro">Otro</button>
                <span class="tooltiptext">Pulse para procesar Otro registro...</span>
              </div>
            ';
          } else {
            //
            echo '
              <div class="tooltipd">
                <button type="submit" name="btnSdRegresar">Regresar</button>
                <span class="tooltiptext">Pulse para Regresar al formulario anterior...</span>
              </div>
            ';
          }
        ?>
        <div class="tooltipd">
          <button type="button" name="btnSdCancel"><a href="../../academico" target="_top">Salir</a></button>
          <span class="tooltiptext">Pulse para abandonar este formulario y Salir al menú principal...</span>
        </div>
      </div>
    </form>
  </div>
</body>
</html>
