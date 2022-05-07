<?php
namespace Conection;
/* Clase encargada de gestionar las conexiones a la base de datos */
class DataBase {
   private $server=SERVIDOR;
   private $user=USUARIO;
   private $pass=CONTRASENIA;
   private $database=BASEDEDATOS;
   private $link;
   private $stmt;
   private $array;
   static $_instance;
   /*La función construct es privada para evitar que el objeto pueda ser creado mediante new*/
   private function __construct() {
      $this->connecting();
   }
   /*Evitamos el clonaje del objeto. Patrón Singleton*/
   private function __clone() { }
   /*Función encargada de crear, si es necesario, el objeto. Esta es la función que debemos llamar desde fuera de la clase para instanciar el objeto, y así, poder utilizar sus métodos*/
   public static function getInstance(){
      if ( !( self::$_instance instanceof self ) ){
         self::$_instance = new self();
      }
      return self::$_instance;
   }
   /*Realiza la conexión a la base de datos.*/
   private function connecting(){
      //Parámetros: host, user, pass, db, port, sock
      $this->link = mysqli_connect( $this->server, $this->user, $this->pass );
      mysqli_select_db( $this->link, $this->database );
      mysqli_query($this->link, "SET NAMES 'utf8'");
   }
   /*Método para ejecutar una sentencia sql*/
   public function running($sql) {
      $this->stmt = mysqli_query( $this->link, $sql );
      return $this->stmt;
   }
   /*Método para obtener una fila de resultados de la sentencia sql*/
   public function getting($stmt,$fila) {
      if ( $fila == 0 ) {
         $this->array = mysqli_fetch_array($stmt, MYSQLI_BOTH);
      }else {
         mysqli_data_seek($stmt,$fila);
         $this->array = mysqli_fetch_array($stmt, MYSQLI_BOTH);
      }
      return $this->array;
   }
}
// /* Cómo usar */
// /*Incluimos el fichero de la clase*/
// require 'Db.class.php';
// /*Creamos la instancia del objeto. Ya estamos conectados*/
// $bd = DataBase::getInstance();
// /*Ejecutamos un query sencillo*/
// $rs = $bd->running( 'SELECT NOMBRE FROM CLIENTES' );
// /*Realizamos un bucle para ir obteniendo los resultados*/
// while ( $row = mysqli_fetch_array( $rs, MYSQLI_BOTH ) ) {
//    echo $row['NOMBRE'].'<br />';
// }
?>