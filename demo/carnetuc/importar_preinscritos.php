<?php
//******************************************
//Version 0.1 03-11-2009 IMPORTAR DEPOSITOS*
//******************************************
// nunca olvidar comenzar la sesion
session_start();

$codigo_operacion="cipre";  //IMPORTANTE ESTE CODIGO Define el nombre de operación asociada a esta interfaz

include 'config.php'; //archivo que contiene la configuracion de conexion
include 'funciones.php';
$conexion_usuario=conectar($host_usuarios,$usuario_usuarios,$clave_usuarios,$database_usuarios);

// alguien se ha logueado en la pagina o no?  y está autorizado o no?
if (!isset($_SESSION['esta_autentificado']) || !usuario_autorizado($conexion_usuario,$_SESSION['usuario'],$codigo_operacion))
{
	// si no se ha logueado ir a la pagina principal
	header('Location: index.php');
	exit;
}

if ($_SESSION['expiracion'] <= time())
{
    header('Location: expiracion.php');
	exit;
}
else
{
    $_SESSION['expiracion']=time() + 900;
}

$error = '';

$conexion=conectar($host_carnet,$usuario_carnet,$clave_carnet,$database_carnet);

if(isset($_POST['importardepositos']))
{

    if($_FILES['archivo_depositos']['name']=="")
    {
        $error="Debe seleccionar el archivo de preinscritos carnet a importar";
    }
    else
    {

    $archivo=fopen($_FILES['archivo_depositos']['tmp_name'],"r");

        $i=0;
        while (( $data = fgetcsv ( $archivo , 400 , ";" )) !== FALSE )
        { // Mientras hay líneas que leer...


                $cedula=(int)$data[0];
                $nacionalidad=$data[1];
                //$primer_nombre=$data[2];
                $primer_nombre=str_replace("'","´",$data[2]);
                //$segundo_nombre=$data[3];
                $segundo_nombre=str_replace("'","´",$data[3]);
                //$primer_apellido=$data[4];
                $primer_apellido=str_replace("'","´",$data[4]);
                //$segundo_apellido=$data[5];
                $segundo_apellido=str_replace("'","´",$data[5]);
                $facultad=$data[6];
                $carrera=$data[7];
                //$fecha_registro=$data[8];
				$fecha_registro = ( is_null($data[8]) || empty($data[8]) || is_bool($data[8]) ) ? ( date("Y-m-d H:i:s",time()) ) : ( $data[8] );
                //$chequeado_por=$data[9];
                $time = time();
                $fecha = date("d-m-Y", $time);
                $chequeado_por="importado por: ".$_SESSION['usuario']." ".$fecha;
                //$generado=$data[10];   //--- en comentario porque los .csv estan viniendo con esta columna con valores cero (0)
                $generado = ( is_null($data[10]) || empty($data[10]) || is_bool($data[10]) ) ? ( 0 ) : ( $data[10] );

                $conexion=conectar($host_carnet,$usuario_carnet,$clave_carnet,$database_carnet);
                $sql="insert into $tabla_estudiante_carnet (`cedula`,`nacionalidad`,`primer_nombre`,`segundo_nombre`,`primer_apellido`,`segundo_apellido`,`facultad`,`carrera`,`fecha_registro`,`chequeado_por`,`generado`) VALUES ($cedula,'$nacionalidad','$primer_nombre','$segundo_nombre','$primer_apellido','$segundo_apellido','$facultad','$carrera','$fecha_registro','$chequeado_por','$generado') ON DUPLICATE KEY UPDATE cedula=$cedula,`nacionalidad`='$nacionalidad',`primer_nombre`='$primer_nombre',`segundo_nombre`='$segundo_nombre',`primer_apellido`='$primer_apellido',`segundo_apellido`='$segundo_apellido',`facultad`='$facultad',`carrera`='$carrera',`fecha_registro`='$fecha_registro',`chequeado_por`='$chequeado_por',`generado`='$generado'";
                $result=ejecutar($sql,$conexion);
				//--
				//-- línea incluida para comprobar posibles errores
				//-- echo $sql.'<br />';

        }
        fclose($archivo);

        header('Location: menu_usuario.php?mensaje=6');
        exit;
        //codigo para usar con el comando LOAD DATA requiere FILE permisions en mysql
        /*$sql = "LOAD DATA INFILE '".@mysql_escape_string($HTTP_POST_FILES['archivo_depositos']['tmp_name']).
                 "' IGNORE INTO TABLE DEPOSITOS FIELDS TERMINATED BY '".@mysql_escape_string(";").
                 "' OPTIONALLY ENCLOSED BY '".@mysql_escape_string('"').
                 "' ESCAPED BY '".@mysql_escape_string("\\").
                 "' IGNORE 1 LINES (@dummy,@fecha_deposito,deposito,concepto,@dummy,@monto,@dummy,@dummy,@dummy) set monto=@monto*0.01,fecha_deposito=concat(substring(@fecha_deposito,5,4),'-',substring(@fecha_deposito,3,2),'-',substring(@fecha_deposito,1,2))";

        echo $sql."<br>";

        $result=ejecutar($sql,$conexion); */
    }
}

include ("formas/header.html");
include ("formas/importar_preinscritos.html");
include ("formas/footer.html");
mysql_close($conexion_usuario);
mysql_close($conexion);
?>
