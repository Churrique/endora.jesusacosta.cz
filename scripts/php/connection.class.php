<?php
namespace ConnectionDB;

include '../../../scripts/php/setting.php';

class ConnectionDataBase {

  protected $my_connection;

  public function Connection() {
    echo "<br>Estoy CONECTANDOME...!<br>";
    $my_connection = new \mysqli(SERVIDOR, USUARIO, CONTRASENIA, BASEDEDATOS);
    if ($my_connection->connect_error) {
      echo "<br>Error de Conexión (".$my_connection->connect_errno .") ". $my_connection->connect_error."<br>";
    }
    else {
      echo "<br>Conecttado a la DataBase...!<br>";
    }
  //$mysqli_connection->close();
  }

  public function __construct() {
    echo "<br>Voy a conectarme...!<br>";
    $this->Connection();
 }

}

?>