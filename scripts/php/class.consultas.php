<?php
namespace QuerysDB;

if ((include '../../../scripts/php/class.connection.class.php') == TRUE) {
  echo 'OK<br>'.$_SERVER['DOCUMENT_ROOT'].'<br>'.$_SERVER['SCRIPT_FILENAME'];
}else {
  echo 'ERROR<br>'.$_SERVER['DOCUMENT_ROOT'].'<br>'.$_SERVER['SCRIPT_FILENAME'];
}

class CRUDDataBase extends \ConnectionDB\ConnectionDataBase {

  protected $sentence;

  public $table;
  public $camps;
  public $entries;

  function __construct($table, $camps, $entries) {
    parent::__construct();
    //* Se establecen las Propiedades para un posible uso posterior
    $this->$table = $table;
    $this->$camps = $camps;
    $this->$entries = $entries;
  }

  //* Para el caso de un SELECT
  //! $record_set = $this->mysqli->query("SELECT * FROM `datos_personales`;");
  //! $record_set->num_rows
  //! $record_set->fetch_all(MYSQLI_ASSOC)

  public function Inserting($table, $camps, $entries) {
    $sentence = "INSERT INTO `" . $table . "` (" . $camps . ") VALUES (" . $entries . ");";
    echo '<br>'.$sentence.'<br>';
    if ($this->my_connection->query($sentence) == TRUE) {
      return "<br>El Registro se inserto<br>";
    }
    else {
      return "<br>Hay Problemas...<br>";
    }
  }

}
?>