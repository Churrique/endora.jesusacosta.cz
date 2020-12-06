<?php
  include_once('../funciones/valida-funciones.php');
  session_start();
  if (isset($_SESSION['uidusuarios'])) {
	  $unombre = $_SESSION['unombre'];
	  $ucuenta = $_SESSION['ucuenta'];
	  $uid = $_SESSION['uidusuarios'];
	  $uinicio = $_SESSION['uinicio'];
	  $uusuario = $_SESSION['uusuario'];
	  
  }
  else {
	  header("Location: form-error-2.php");
	  exit;
  }
  
 $error = '';

$link = mysql_connect("localhost",NAME_USER,PASS_USER);
 $db_selected = mysql_select_db(BASE_DE_DATOS,$link);

if(isset($_POST['importardepositos']))
{

    if($_FILES['archivo_depositos']['name']=="")
    {
        $error="Debe seleccionar el archivo de Graduandos a importar";		
    }
    else
    {

    $archivo=fopen($_FILES['archivo_depositos']['tmp_name'],"r");

        $i=0;
        while (( $data = fgetcsv ( $archivo , 400 , ";" )) !== FALSE )
        { // Mientras hay lÌneas que leer...


                $cedula=(int)$data[0];
                $nombre=str_replace("'","¥",$data[1]);
                //$primer_nombre=$data[2];
                $nrograd=$data[2];
                //$segundo_nombre=$data[3];
               // $segundo_nombre=str_replace("'","¥",$data[3]);
                //$primer_apellido=$data[4];
                $facultad=$data[3];
                //$segundo_apellido=$data[5];
                $titulo=str_replace("'","¥",$data[4]);
                $fechacto=$data[5];
				$time = time();
				$fechareg = date("Y-m-d", $time);
                
                                
                
    $link = mysql_connect("localhost",NAME_USER,PASS_USER);
    $db_selected = mysql_select_db(BASE_DE_DATOS,$link);
                $sql="insert into detalle_chequeo_etyb(`cedula`,`nombre_completo`,`nro_graduacion`,`facultad`,`titulo_obtenido`,`fecha_acto_grado`,`fecha_registro`,`chequeado`) VALUES ($cedula,'$nombre','$nrograd','$facultad','$titulo','$fechacto','$fechareg','$uusuario') ON DUPLICATE KEY UPDATE cedula=$cedula,`nombre_completo`='$nombre',`nro_graduacion`='$nrograd',`facultad`='$facultad',`titulo_obtenido`='$titulo',`fecha_acto_grado`='$fechacto',`fecha_registro`='$fechareg',`chequeado`='$uusuario'";
                $result=ejecutar($sql,$link);
				//--
				//-- lÌnea incluida para comprobar posibles errores
				//-- echo $sql.'<br />';
        $error="Archivo Cargado Satisfactoriamente!...";
    	
        }
        fclose($archivo);

        
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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/Cuerpo-1.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=latin1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>.: Intranet - Direcci&oacute;n General de Asuntos Estudiatiles - Universidad de Carabobo :.</title>
<!-- InstanceEndEditable -->
<link href="../css/hoja_de_estilos.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="../digaes.ico" />
<script type="text/javascript">
var txt=".: Intranet - Direcci√≥n General de Asuntos Estudiatiles - Universidad de Carabobo :.   ";
var refresco=null;
function titulo() {	document.title=txt;	txt=txt.substring(1,txt.length)+txt.charAt(0); 	refresco=setTimeout("titulo()",500);}
titulo();
</script>
<script type="text/javascript"> 
    $(document).ready(function(){ 
        $(document).pngFix(); 
    }); 
</script>
<style type="text/css">
body {
	background-image: url(../imagenes/digae_azul_transparente.png);
	background-repeat: repeat;
}
</style>
<!-- InstanceBeginEditable name="head" -->
<style type="text/css">
<!--
.Estilo9 {color: #000000}
-->
</style>
<!-- InstanceEndEditable -->
</head>

<body>
<div align="center" style="margin: 5px 5px 5px 5px">
<table width="80%" border="0" cellspacing="0" cellpadding="0" class="tabla_body">
  <tr>
  <td height="40" align="center" valign="middle"><!-- InstanceBeginEditable name="EditRegion1" -->
  <form action="lectura-archivo-csv-separado-por-comas.php" method="post" enctype="multipart/form-data" name="form_importar_depositos" id="form_importar_depositos">
  <table width="90%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="30">&nbsp;</td>
  </tr>
  <tr>
    <td height="40" class="gradiente_gris1"><span class="texto_decorado_blanco_amarillo">Cargar Archivo de Listado de Verificacion </span></td>
  </tr>
  <tr>
    <td height="30" align="center"><table width="90%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="48" colspan="2"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">
          <div align="center">Seleccione la ruta del archivo a importar</div>
        </div></td>
        </tr>
      <tr>
        <td height="47" colspan="2">
          
            <div align="center">
             <input type="file" name="archivo_depositos" id="archivo_depositos" size="60" />
            </div></td>
      </tr>
      <tr>
        <td height="18" colspan="2"><div align="center"><?php echo "<div align=\"center\"><input type=\"submit\" name=\"importardepositos\" value=\"IMPORTAR\" class=\"boton1\" /></div>";?></div></td>
      </tr>
      <tr>
        <td height="18" colspan="2" class="Estilo9"><div align="center"><?php echo $error; ?></div></td>
        </tr>
     
      <tr>
        <td height="12" align="center">&nbsp;</td>
      </tr>
      <tr>
        <td height="50" align="center" valign="bottom">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
   
  <tr>
    <td height="30" style="-webkit-border-radius: 10px 10px 10px 10px; border-radius: 10px 10px 10px 10px; background: #5b99df; background: -moz-linear-gradient(left,  #5b99df 0%, #a6def0 34%, #70b0e8 69%, #b1d5f1 100%); background: -webkit-gradient(linear, left top, right top, color-stop(0%,#5b99df), color-stop(34%,#a6def0), color-stop(69%,#70b0e8), color-stop(100%,#b1d5f1)); background: -webkit-linear-gradient(left,  #5b99df 0%,#a6def0 34%,#70b0e8 69%,#b1d5f1 100%); background: -o-linear-gradient(left,  #5b99df 0%,#a6def0 34%,#70b0e8 69%,#b1d5f1 100%); background: -ms-linear-gradient(left,  #5b99df 0%,#a6def0 34%,#70b0e8 69%,#b1d5f1 100%); background: linear-gradient(to right,  #5b99df 0%,#a6def0 34%,#70b0e8 69%,#b1d5f1 100%); filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#5b99df', endColorstr='#b1d5f1',GradientType=1 );"></td>
  </tr> 
  </table>
  </form>
  <form action="form-mostrar-tareas-2.php" method="post" name="regresar">
      <table width="200" border="0">
  <tr>
    <td height="50" align="center" valign="bottom"><input name="btnRegresar" type="submit" class="glow2" title="Pulse aquÌ para Regresar al Men˙ Principal..." value="<-- Regresar Men˙ Principal" /> </td>
  </tr>
</table>
  </form>
  <!-- InstanceEndEditable --></td>
  </tr>
</table>
</div>
</body>
<!-- InstanceEnd --></html>