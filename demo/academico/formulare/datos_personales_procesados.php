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
$DesDoc = null;
$idDatI = null;                         //! iddatosidentificacion
$NumDoc = $_POST['txtNValor'];
$Nombre = $_POST['txtNombre'];
$Apelli = $_POST['txtApellido'];
$NomCom = $_POST['txtNomCom'];
$idSexo = $_POST['txtSexo'];
$FecNac = $_POST['txtFechaNac'];

$cam = "`id_tm_documento_identificacion`, `nombre`, `apellido`, `nombrecompleto`, `sexo`, `nacimiento`";
$val = "$idDocu,'$Nombre','$Apelli','$NomCom','$idSexo','$FecNac'";
$numberecords = 0;

//! $inserto = new \QuerysDB\CRUDDataBase("datos_personales", $cam, $val);

//! echo $inserto->Inserting("datos_personales", $cam, $val);

$connection = Connection();

if ( is_object($connection) ) {

  if ( Inserting("datos_personales", $cam, $val, $connection) ) {

    $FirstCondition = "WHERE TRIM(p_nom) = '" . $Nombre . "' AND TRIM(p_ape) = '" . $Apelli . "'";
    $FirstRecorset = Consulting($connection, "*", "vw_datper", $FirstCondition);
    $numberecords = mysqli_num_rows($FirstRecorset);

    if ($numberecords == 1) {

      while ($row = mysqli_fetch_assoc($FirstRecorset)) {

        $idDatP = $row["id_dat"];
        $camps = "`iddatospersonales`, `id_tm_documento_identificacion`, `numeracion`";
        $value = $row["id_dat"] . "," . $idDocu . ",'" . $NumDoc . "'";

        if ( Inserting("datos_documentos_identificacion", $camps, $value, $connection) ) {

          $SecondCondition = "WHERE `iddatospersonales` = $idDatP AND `id_tm_documento_identificacion` = $idDocu";
          $SecondRecorset = Consulting($connection, $camps, 'datos_documentos_identificacion', $SecondCondition);
          $SecondNumberRecords = mysqli_num_rows($SecondRecorset);

          if ($SecondNumberRecords == 1) {

            while ($SecondRow = mysqli_fetch_assoc($SecondRecorset)) {
              $idDatI = $SecondRow["iddatosidentificacion"];
            }

            $DesDoc = ReturValue($connection, '_tm_documento_identificacion', 'id_tm_documento_identificacion', $idDocu, 'documento_identificacion');

            mysqli_free_result($FirstRecorset);
            mysqli_free_result($SecondRecorset);
            mysqli_close($connection);

          }

        }

      }

    } elseif ($numberecords > 1) {
      $DesDoc = ReturValue($connection, '_tm_documento_identificacion', 'id_tm_documento_identificacion', $idDocu, 'documento_identificacion');

    } else {
      // Es cero (0) o menos uno (-1)
      $DesDoc = ReturValue($connection, '_tm_documento_identificacion', 'id_tm_documento_identificacion', null, 'documento_identificacion');
    }

  }

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
  <link rel="shortcut icon" href="../../../img/_logo_nube.ico" type="image/x-icon" />
  <script src="../../../scripts/js/titulo.js"></script>
  <script src="../../../scripts/js/trigger_event_click_in_button.js"></script>
</head>

<body>
  <div id="div-padre">
    <form name="frmPDP" id="frmPDP" autocomplete="off" method="post" action="datos_personales_add.php">
      <h1 id="alcentro">Procesando: Ficha de Datos Personales</h1>
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
      <div id="capatres">
        <div><span title="Único para este registro...">Identificadores Únicos de Tablas:</span></div>
        <!-- //? Explícitamente la tabla: DATOS_PERSONALES.iddatospersonales -->
        <div><span id="cinput" title="Tabla:Datos Personales..."><?php echo "Ref. Interna: " . ( $numberecords == 1 ? $idDatP : 'Por definir...'); ?></span></div>
        <!-- //? Explícitamente la tabla: DATOS_DOCUMENTOS_IDENTIFICACION.iddatosidentificacion -->
        <div><span id="cinput" title="Tabla:Documento de Identificación..."><?php echo "Ref. Interna: " . ( $numberecords == 1 ? $idDatI : 'Por definir...'); ?></span></div>
        <!-- //? Explícitamente la tabla: _TM_DOCUMENTO_IDENTIFICACION.id_tm_documento_identificacion -->
        <div><span id="cinput" title="Tabla:Maestro de Documento..."><?php echo "Ref. Interna: $idDocu : $DesDoc " ?></span></div>
      </div>
      <div id="capatres">
        <div><span id="nota">NOTA IMPORTANTE</span></div>
        <div><span id="nota">De <span id="noteinred">la tabla</span> que se muestra <span id="noteinred">en la parte inferior</span>, Usted <span id="noteinred">debe seleccionar una de las entradas</span> que se muestran <span id="noteinred">para poder completar la incorporación del nuevo registro</span>, esto se debe a que hubo más de una coincidencia. El proceso en sí esta a un 50%, el porcentaje restante, del proceso, lo debe completar Usted, si así lo desea. <span id="noteinred">Considere</span> la opcion de <span id="noteinred">Cancelar si no esta seguro</span>.</span></div>
      </div>
      <?php
        if ($numberecords > 1) {
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
            echo '<input type="submit" name="btnSdConfirm" value="Procesar Otro">';
          }
        ?>
        <input type="submit" name="btnSdCancel" value="Cancelar y Regresar">
      </div>
    </form>
  </div>
</body>
</html>
