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
    while ($row = mysqli_fetch_assoc($recorset)) {
      echo $row["id_dat"]." ".$row["id_doc"]." ".$row["p_nom"]." ".$row["p_ape"]." ".$row["sexo"]." ".$row["f_nac"]." ".$row["nom_c"]."<br>";
      echo "<br>";
    }
    mysqli_free_result($recorset);
    mysqli_close($connection);
  }
}
?>