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
$error = ' ';

if(isset($_POST['cancelar_actualizar_graduando']))
{
    header('Location: form-buscar-graduando-chequeo.php?mensaje=2');
    exit;
}

$cedula=$_SESSION['cedula'];
$link = mysql_connect("localhost",NAME_USER,PASS_USER);
$db_selected = mysql_select_db(BASE_DE_DATOS,$link);
$sql="select * from detalle_chequeo_etyb where cedula='$cedula'";
$result=ejecutar($sql,$link);
$entrega = 0;
$devolucion = 0;
if(isset($_POST['actualizar_graduando'])) 
{ 
    $time= time();
    $hoy= date("d/m/Y h:i A", $time);
    $hoy2= date("Y-m-d H:i:s", $time);
    $operador=$uusuario;
	  
	if(mysql_num_rows($result)>=1)
    {
     $mul=0;
	 
		//bloque de la DEVOLUCION
          if (isset($_POST['ind_solvencia']))
		   {		      
		       $sol=$_POST['ind_solvencia'];
			   $mul=$_POST['valor_multa'];
			   $obs=$_POST['observacion'];
			    if ($sol != $_SESSION['ind_solvencia'] or $obs!=$_SESSION['observacion']) 
				 {
                   if ($_POST['ind_solvencia'] =='S')	{$mul=0;} 						   	  
	               $sql="update detalle_chequeo_etyb set `ind_solvencia`='$sol',`observacion`='$obs',`valor_multa`='$mul',
				   `fecha_devolucion_combo`='$hoy2',`resp_devolucion_combo`='$operador'  WHERE cedula='$cedula'";  
				   $result=ejecutar($sql,$link);				  				  
                   header('Location: form-buscar-graduando-chequeo.php?mensaje=1');   
				   exit; 				  
				 }	
				else
					  {
					   header('Location: form-buscar-graduando-chequeo.php?mensaje=2');   
						exit;
					  } 		   			  	  		 
		  }
	      else 
		  {  
			 //bloque de la ENTREGA
			if (isset($_POST['ind_combo_academico'])) {				  					
					  $fec = $hoy2;
					  $ind = $_POST['ind_combo_academico'];
					  $obs1= $_POST['observacion_combo']; 
					  if ($ind != $_SESSION['ind_combo_academico'] or $obs1!=$_SESSION['observacion_combo']) {
					    $sql="update detalle_chequeo_etyb 
					        set `ind_combo_academico`='$ind',`observacion_combo`='$obs1',
						        `fecha_entrega_combo`='$fec',`resp_entrega_combo`='$operador'  
						    WHERE cedula='$cedula'";  
					    $result=ejecutar($sql,$link);					
					    header('Location: form-buscar-graduando-chequeo.php?mensaje=4');   
						exit; 				  
					  }
					  else
					  {
					   header('Location: form-buscar-graduando-chequeo.php?mensaje=2');   
					exit;
					  }
					  
				}
		  }		 
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
var txt=".: Intranet - Dirección General de Asuntos Estudiatiles - Universidad de Carabobo :.   ";
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
<!-- InstanceEndEditable -->
</head>

<body>
<div align="center" style="margin: 5px 5px 5px 5px">
<table width="80%" border="0" cellspacing="0" cellpadding="0" class="tabla_body">
  <tr>
  <td height="40" align="center" valign="middle"><!-- InstanceBeginEditable name="EditRegion1" -->
  <form name="chequear_graduando" id="chequear_graduando" method="post" action="form-buscar-graduando-chequeo1.php" >
  <table width="90%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="30">&nbsp;</td>
  </tr>
  <tr>
    <td height="40" align="center" class="gradiente_gris1"><span class="texto_decorado_blanco_amarillo">Chequear Graduando (Entrega / Devoluci&oacute;n de Toga y Birrete) </span></td>
  </tr>
  <tr>
    <td height="30" align="center"><table width="90%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="39%" height="34"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Cedula:</div></td>
        <td width="61%" height="34"><input name="cedula" type="text" size="12" maxlength="15" value="<?php echo $_SESSION['cedula']; ?>"/></td>
      </tr>
      <tr>
        <td height="33"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Nombre Completo:</div></td>
        <td height="33"><input name="nombre_completo" type="text" size="45" maxlength="8" value="<?php echo $_SESSION['nombre_completo']; ?>"/></td>
      </tr>
      <tr>
        <td height="30"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Facultad:</div></td>
        <td height="30"><input name="facultad" type="text" size="45" maxlength="8" value="<?php echo $_SESSION['facultad']; ?>"/></td>
      </tr>
      <tr>
        <td height="29"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Titulo Obtenido:</div></td>
        <td height="29"><input name="titulo" type="text" size="60" maxlength="8" value="<?php echo $_SESSION['titulo_obtenido']; ?>"/></td>
      </tr>
      <tr>
        <td height="29"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Fecha Acto Grado:</div></td>
        <td height="29"><input name="fechaacto" type="text" size="10" maxlength="8" value="<?php echo $_SESSION['fecha_acto_grado']; ?>"/></td>
      </tr>
      <tr>
        <td height="29"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Nro de Graduaci&oacute;n:</div></td>
        <td height="29"><input name="numerogradu" type="text" size="8" maxlength="8" value="<?php echo $_SESSION['nro_graduacion']; ?>"/></td>
      </tr>
      <tr>
        <td height="29" colspan="2"><div align="center">
          <table width="690" border="2">
              <tr>
                <td colspan="2" class="texto_decorado_carmesi_amarillo">Entrega de Combo Acad&eacute;mico </td>
                </tr>
              <tr>
                <td width="293"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Entrega Combo Acad&eacute;mico:</div></td>
                <td width="379"><label>
                  <select name="ind_combo_academico" size="1">
				     <option value="S" <?php if ($_SESSION['ind_combo_academico'] == 'S') echo 'selected';?>>SI</option>
				     <option value="N" <?php if ($_SESSION['ind_combo_academico'] == 'N') echo 'selected';?>>NO</option>				     
                  </select>
                </label></td>
              </tr>
              <tr>
                <td><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Observaci&oacute;n en la Entrega:</div></td>
                <td><textarea name="observacion_combo" cols="50" rows="8"><?php echo $_SESSION['observacion_combo'];?></textarea></td>
              </tr>
              <tr>
                <td><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Entregado por:</div></td>
                <td><input name="resp_entrega_combo" type="text" size="25" maxlength="20"  value="<?php echo trim($_SESSION['resp_entrega_combo']);?>" /></td>
              </tr>
              <tr>
                <td><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Fecha Entrega:</div></td>
                <td><input name="fecha_entrega_combo" type="text" size="20" maxlength="18"  value="<?php echo trim($_SESSION['fecha_entrega_combo']);?>" /></td>
              </tr>
                  </table>
        </div></td>
        </tr>
      <tr>
        <td height="21" colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td height="29" colspan="2"><div align="center">
          <table width="686" border="2">
              <tr>
                <td colspan="2" class="texto_decorado_carmesi_amarillo">Devoluci&oacute;n de Combo Acad&eacute;mico </td>
                </tr>
              <tr>
                <td width="343"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;"> Indicador de Solvente: </div></td>
                <td width="325"><input name="ind_solvencia" type="radio" value="S" size="10" maxlength="8" 
		                            <?php if ($_SESSION['ind_solvencia'] == "S") echo " checked = \"checked\" "?> />
                  S&iacute;
                  <input name="ind_solvencia" type="radio" value="N" size="10" maxlength="8" 
								    <?php if ($_SESSION['ind_solvencia'] == "N") echo " checked = \"checked\" "?> />
                  No</td>
              </tr>
              <tr>
                <td><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">
                  <div align="right">Valor Multa:</div>
                </div></td>
                <td><input name="valor_multa" type="text" size="15" maxlength="18"  value="<?php echo trim($_SESSION['valor_multa']);?>" /></td>
              </tr>
              <tr>
                <td height="113"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Observaci&oacute;n en la Devoluci&oacute;n:</div></td>
                <td><textarea name="observacion" cols="50" rows="6"><?php echo $_SESSION['observacion'];?></textarea></td>
              </tr>
              <tr>
                <td height="29"><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Recibido por:</div></td>
                <td><input name="resp_devolucion_combo" type="text" size="25" maxlength="20"  value="<?php echo trim($_SESSION['resp_devolucion_combo']);?>" /></td>
              </tr>
              <tr>
                <td><div align="right" class="texto_decorado_agua_marina" style="margin-right: 9px; line-height: 20px;">Fecha Recibido:</div></td>
                <td><input name="fecha_devolucion_combo" type="text" size="20" maxlength="18"  value="<?php echo trim($_SESSION['fecha_devolucion_combo']);?>" /></td>
              </tr>
                  </table>
        </div></td>
        </tr>
      <tr>
        <td height="27" colspan="2"><div align="center"><?php echo"<div align=\"center\"><input type=\"submit\" name=\"actualizar_graduando\" value=\"Actualizar\" class=\"boton1\" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"submit\" name=\"cancelar_actualizar_graduando\" value=\"Cancelar\" class=\"boton1\" /></div>";?></div></td>
      </tr>
      <tr>
        <td height="27" colspan="2"><div align="center"><?php echo $error; ?></div></td>
      </tr>
      <tr>
        <td height="30" colspan="2"><div align="center"><a href="form-buscar-graduando-chequeo.php" class="link3" style="color:#CC6600"><< Regresar</a></div></td>
      </tr>            
    </table></td>
  </tr>
  
  <tr> <td  width="60%" height="12" align="center">&nbsp;</td>  
  </tr>
  <tr>
    <td height="30" style="-webkit-border-radius: 10px 10px 10px 10px; border-radius: 10px 10px 10px 10px; background: #5b99df; background: -moz-linear-gradient(left,  #5b99df 0%, #a6def0 34%, #70b0e8 69%, #b1d5f1 100%); background: -webkit-gradient(linear, left top, right top, color-stop(0%,#5b99df), color-stop(34%,#a6def0), color-stop(69%,#70b0e8), color-stop(100%,#b1d5f1)); background: -webkit-linear-gradient(left,  #5b99df 0%,#a6def0 34%,#70b0e8 69%,#b1d5f1 100%); background: -o-linear-gradient(left,  #5b99df 0%,#a6def0 34%,#70b0e8 69%,#b1d5f1 100%); background: -ms-linear-gradient(left,  #5b99df 0%,#a6def0 34%,#70b0e8 69%,#b1d5f1 100%); background: linear-gradient(to right,  #5b99df 0%,#a6def0 34%,#70b0e8 69%,#b1d5f1 100%); filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#5b99df', endColorstr='#b1d5f1',GradientType=1 );"></td>
  </tr> 
  </table>
  </form>
  <!-- InstanceEndEditable --></td>
  </tr>
</table>
</div>
</body>
<!-- InstanceEnd --></html>