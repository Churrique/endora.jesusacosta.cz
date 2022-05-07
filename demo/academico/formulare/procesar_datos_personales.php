<?php
//* ********************************
//* Estilo por Procedimiento
//* Valido para PHP version >= 7.x
//* ********************************

include '../../../scripts/php/setting.php';
include '../../../scripts/php/connection.proc.php';
include '../../../scripts/php/consultas.proc.php';

$idDocu = $_POST['txtDocumento'];
$NumDoc = $_POST['txtNValor'];
$Nombre = $_POST['txtNombre'];
$Apelli = $_POST['txtApellido'];
$NomCom = $_POST['txtNomCom'];
$idSexo = $_POST['txtSexo'];
$FecNac = $_POST['txtFechaNac'];

$cam = "`id_tm_documento_identificacion`, `nombre`, `apellido`, `nombrecompleto`, `sexo`, `nacimiento`";
$val = "$idDocu,'$Nombre','$Apelli','$NomCom','$idSexo','$FecNac'";

//! $inserto = new \QuerysDB\CRUDDataBase("datos_personales", $cam, $val);

//! echo $inserto->Inserting("datos_personales", $cam, $val);

if ( $connection = Connection() ) {
  if ( Inserting("datos_personales", $cam, $val, $connection) ) {
    echo "<br>Registro insertado...!<br>";
    $the_condition = "WHERE TRIM(p_nom) = '" . $Nombre . "' AND TRIM(p_ape) = '" . $Apelli . "'";
    $recorset = Consulting($connection, "*", "vw_datper", $the_condition);
    $numberecords = mysqli_num_rows($recorset);
    echo '
          <table>
          <caption>Total de Registros Encontrados ['.$numberecords.']</caption>
          <thead>
            <tr>
              <th title="Referencia...">Id</th>
              <th>Documento</th>
              <th>Número/Serie...</th>
              <th>Nombre y Apellido</th>
              <th>Sexo</th>
              <th title="Fecha de Nacimiento...">Fecha</th>
            </tr>
          </thead>
          <tbody>
        ';
    while ($row = mysqli_fetch_assoc($recorset)) {
     echo '
          <tr>
          <td>'.$row["id_dat"].'</td>
          <td title="Identificador: '.$row["id_doc"].'">'.$row["doc"].'</td>
          <td>'.$row["doc_num"].'</td>
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
    mysqli_free_result($recorset);
    mysqli_close($connection);
  }
}
?>
