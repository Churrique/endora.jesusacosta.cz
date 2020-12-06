<?php
//************************
//Version 0.3 10-04-2009 *
//************************
//define('OLD_ERROR_HANDLER',set_error_handler("ErrPer"));
//error_reporting(E_ALL ^ E_NOTICE);
//--------------------------------------------------------------------------------------------------------------------
//
//   F U N C I Ó N   Ú N I C A   D E   E R R O R
//
//--------------------------------------------------------------------------------------------------------------------
//function ErrPer($errno=0, $errstr='', $errfile='', $errline=0) {   //---------- Error Personalizado
//	echo '<hr /><table width="50%" border="1" bgcolor="#000066" bordercolor="#0000CC">';
//	echo '<tr><td height="26" colspan="2" align="center" class="RotuloTablaBlanco">&bull;&nbsp;Error...!&nbsp;&bull;</td></tr>';
//	echo '<tr><td width="12%" height="26" align="center" class="RotuloTablaBlanco">&laquo;N&uacute;mero&raquo;</td>';
//	echo '<td width="88%" height="26" align="center" class="RotuloTablaBlanco">&laquo;Descripci&oacute;n&raquo;</td></tr>';
//	echo '<tr><td height="26" align="center" class="RotuloTablaBlanco">'.$errno.'</td>';
//	echo '<td height="26" class="RotuloTablaBlanco">'.$errstr.'</td></tr>';
//	echo '<tr><td align="center" class="RotuloTablaBlanco">&laquo;L&iacute;nea&raquo;</td>';
//	echo '<td align="center" class="RotuloTablaBlanco">&laquo;Programa/Procedimiento&raquo;</td></tr>';
//	echo '<tr><td align="center" class="RotuloTablaBlanco">'.$errline.'</td>';
//	echo '<td align="center" class="RotuloTablaBlanco">'.$errfile.'</td></tr>';
//	echo '<tr><td height="26" colspan="2" align="center" class="RotuloTablaBlanco">PHP '.phpversion().'</td></tr></table><hr />';
//    /* Don't execute PHP internal error handler */
//    return true;
//}

//función para contrastar la tabla de registro_estudiante con el registro de inscritos en el sitio www.inscripciones.uc.edu.ve
function contrastalo($pnac='', $pCI=0, $p1ern='', $p2don='', $p1era='', $p2doa='', $pEsc='', $pFac='', $pFecha='', $pChek='', &$link) {
	$novedad = '';
	$sql_insert = "INSERT INTO `registro_estudiante` (`cedula`,`nacionalidad`,`primer_nombre`,`segundo_nombre`,`primer_apellido`,`segundo_apellido`,`facultad`,`carrera`,`fecha_registro`,`chequeado_por`,`generado`) VALUES (".$pCI.",'".$pnac."','".$p1ern."','".$p2don."','".$p1era."','".$p2doa."','".$pFac."','".$pEsc."','".$pFecha."','".$pChek."',1)";
	//$link = mysqli_connect("localhost","digaes_carnet","digaes_carnet","digae_carnet");
	if ($resul2t = mysqli_query($link,"SELECT * FROM `registro_estudiante` WHERE `registro_estudiante`.`cedula` = ".$pCI)) {
		if (mysqli_num_rows($resul2t) == 0) {
			if (mysqli_query($link,$sql_insert)) {
				$novedad = 'Insertado';
			}
			else {
				$novedad = 'No insertó';
			}
		}
		else {
			$novedad = 'Se encuentra';
		}
	}
	mysqli_free_result($resul2t);
	//mysqli_close($link);
	return($novedad);
}

//funcion para conectarse a la base de datos
function conectar($host,$usuario,$clave,$database)
{
    $conn = mysql_connect($host, $usuario, $clave) or die ('Error conectandose a mysql');
    mysql_select_db($database,$conn);
    return $conn;
}

//funcion para ejecutar un query especifico
function ejecutar($query,$conexion)
{
    $resultado=mysql_query($query,$conexion) or die('Consulta fallida. ' . mysql_error() . '<br />[función ejecutar]:<br />' . $query);
    return $resultado;
}

//funcion que validad si una cedula es valida y me devuelve un array si $a[0]=false hubo un error y $a[1] indica el mensaje de error
function validar_cedula($cedula)
{
    $a[0]=true;
    if(trim($cedula)=='')
    {
        $a[0]=false;
        $a[1]="Por favor introduzca una cédula";
    }
    else
    {
        if(is_numeric($cedula)==false)
        {
            $a[0]=false;
            $a[1]="La cédula debe ser un valor numérico";
        }
        else
        {
            if(strlen($cedula)<5 or strlen($cedula)>8)
            {
                $a[0]=false;
                $a[1]="La cédula introducida es incorrecta";
            }
        }
    }
    return $a;
}

function validar_deposito($deposito)
{
    $a[0]=true;
    if(trim($deposito)=='')
    {
        $a[0]=false;
        $a[1]="Por favor introduzca el número de depósito";
    }
    else
    {
        if(is_numeric($deposito)==false)
        {
            $a[0]=false;
            $a[1]="El depósito debe contener solo números";
        }
    }
    return $a;
}

//funcion que validad si un correo es valido
function validar_email($email)
{
    $mail_correcto = 0;
    //compruebo unas cosas primeras
    if ((strlen($email) >= 6) && (substr_count($email,"@") == 1) && (substr($email,0,1) != "@") && (substr($email,strlen($email)-1,1) != "@"))
    {
       if ((!strstr($email,"'")) && (!strstr($email,"\"")) && (!strstr($email,"\\")) && (!strstr($email,"\$")) && (!strstr($email," ")))
       {
          //miro si tiene caracter .
          if (substr_count($email,".")>= 1)
          {
             //obtengo la terminacion del dominio
             $term_dom = substr(strrchr ($email, '.'),1);
             //compruebo que la terminación del dominio sea correcta
             if (strlen($term_dom)>1 && strlen($term_dom)<5 && (!strstr($term_dom,"@")) )
             {
                //compruebo que lo de antes del dominio sea correcto
                $antes_dom = substr($email,0,strlen($email) - strlen($term_dom) - 1);
                $caracter_ult = substr($antes_dom,strlen($antes_dom)-1,1);
                if ($caracter_ult != "@" && $caracter_ult != ".")
                {
                   $mail_correcto = 1;
                }
             }
          }
       }
    }
    if($mail_correcto)
    {
       return true;
    }
    else
    {
       return false;
    }
}


//funcion pra validar si una clave es valida
function validar_clave($clave,$cedula)
{
    $a[0]=true;
    if(!ereg("^([A-Za-z0-9]{1,})$", $clave))
    {
        $a[0]=false;
        $a[1]="Error: La clave solo debe contener números y letras";
    }
    else
    {
        if($clave==$cedula)
        {
            $a[0]=false;
            $a[1]="Error: La clave debe ser distinta de su cédula";
        }
        else
        {
            if(strlen($clave)<6)
            {
                $a[0]=false;
                $a[1]="Error: La clave debe contener mas de 5 caracteres";
            }
            else
            {
                $a[0]=true;
                $a[1]="";
            }
        }
    }

    return $a;
}

//funcion para seleccionar los paises
function generaPaises($conn)
{
	$consulta=mysql_query("SELECT * FROM lista_paises order by pais",$conn);

	// Voy imprimiendo el primer select compuesto por los paises
	echo "<select name='pais'>";
    while($registro=mysql_fetch_row($consulta))
	{
        if($_POST['pais']==$registro[0])
        {
            echo "<option value='".$registro[0]."' selected='selected'>".$registro[0]."</option>";
        }
        else
        {
            if(!isset($_POST['pais']) && $registro[0]=="Venezuela")
            {
                echo "<option value='".$registro[0]."' selected='selected'>".$registro[0]."</option>";
            }
            else
            {
                echo "<option value='".$registro[0]."'>".$registro[0]."</option>";
            }
        }
	}
	echo "</select>";
}

//funcion que me retorna el nombre de una modalidad de ingreso dado el codigo de dicha modalidad
function obtener_nombre_modalidad($conexion,$codigo_modalidad)
{
    $sql="SELECT * FROM modalidades WHERE codigo_modalidad= '$codigo_modalidad'";
    $result=mysql_query($sql,$conexion) or die('Consulta fallida. ' . mysql_error() . '<br />[función obtener_nombre_modalidad]:<br />' . $query);
    $aux=mysql_fetch_array($result);
    return $aux['nombre_modalidad'];
}

//funcion que me retorna el nombre de una carrera dado el codigo de dicha carrera
function obtener_nombre_escuela($conexion,$codigo_escuela)
{
    $sql="SELECT * FROM carreras WHERE codigo_escuela= '$codigo_escuela'";
    $result=mysql_query($sql,$conexion) or die('Consulta fallida. ' . mysql_error() . '<br />[función obtener_nombre_escuela]:<br />' . $query);
    $aux=mysql_fetch_array($result);
    return $aux['nombre_escuela'];
}

//funcion que me retorna el nombre de una facultad dado el codigo de dicha facultad
function obtener_nombre_facultad($conexion,$codigo_facultad)
{
    $sql="SELECT * FROM facultades WHERE codigo_facultad= '$codigo_facultad'";
    $result=mysql_query($sql,$conexion) or die('Consulta fallida. ' . mysql_error() . '<br />[función obtener_nombre_facultad]:<br />' . $query);
    $aux=mysql_fetch_array($result);
    return $aux['nombre_facultad'];
}

//funcion que me retorna el nombre del tipo de inscripcion dado el codigo
function obtener_nombre_inscripcion($conexion,$codigo_tipo_inscripcion)
{
    $sql="SELECT * FROM tipo_inscripcion WHERE codigo_tipo_inscripcion= '$codigo_tipo_inscripcion'";
    $result=mysql_query($sql,$conexion) or die('Consulta fallida. ' . mysql_error() . '<br />[función obtener_nombre_inscripcion]:<br />' . $query);
    $aux=mysql_fetch_array($result);
    return $aux['nombre_tipo_inscripcion'];
}

//funcion que me retorna la fecha actual con horas min y seg en formato aaaa-mm-dd hh-mm-ss
function fecha_actual()
{

    $time = time() +9000;
    $fecha = date("Y-m-d H:i:s", $time);

    return($fecha);

}

//estadisticas pai
function cuadro_estadisticas($conexion,$tabla_inscritos,$carrera_consultar)
{
    $i=0;
    while($carrera_consultar[$i]<>NULL)
    {
        $sql="select * from $tabla_inscritos where chequeado=1 and carrera='".$carrera_consultar[$i]."'";
        $sql2="select * from $tabla_inscritos where chequeado=0 and carrera='".$carrera_consultar[$i]."'";
        $result=ejecutar($sql,$conexion);
        $aux=mysql_num_rows($result);
        $result2=ejecutar($sql2,$conexion);
        $aux2=mysql_num_rows($result2);
        $total=$aux+$aux2;

        echo "<tr><td class=\"Estilo8\" align=\"left\">".obtener_nombre_escuela($conexion,$carrera_consultar[$i])."</td><td align=\"center\">".$aux."</td><td align=\"center\">".$aux2."</td><td align=\"center\">".$total."</td></tr>";
        $i=$i+1;
    }
}


//funcion para generar listado de facultades
function lista_facultades($conn,$codigo_facultad)
{

    if($codigo_facultad !="800")
    {
        $consulta=mysql_query("SELECT * FROM facultades where codigo_facultad='$codigo_facultad'",$conn);
        echo "<select name='listado_facultades'>";        
    }
    else
    {
        $consulta=mysql_query("SELECT * FROM facultades where codigo_facultad NOT IN ('800','900')order by nombre_facultad",$conn);
        // Voy imprimiendo el primer select compuesto por las facultades
        echo "<select name='listado_facultades'>";
        echo "<option value=\"\"></option>";
    }


    while($registro=mysql_fetch_row($consulta))
    {
        if(isset($_POST['listado_facultades']) && $_POST['listado_facultades']==$registro[0])
        {
            echo "<option value='".$registro[0]."' selected='selected'>".$registro[1]."</option>";
        }
        else
        {
            echo "<option value='".$registro[0]."'>".$registro[1]."</option>";
        }
    }
    echo "</select>";
}




//funcion para generar listado de carreras
function lista_carreras($conn,$codigo_facultad)  
{
    
    if($codigo_facultad !="800")
    {
        $consulta=mysql_query("SELECT * FROM carreras where codigo_facultad='$codigo_facultad'",$conn);
    }
    else
    {
        $consulta=mysql_query("SELECT * FROM carreras where codigo_facultad NOT IN ('800','900')order by nombre_escuela",$conn);
    }
   
   

    // Voy imprimiendo el primer select compuesto por los paises
    echo "<select name='listado_carreras'>";
    echo "<option value=\"\"></option>";
    while($registro=mysql_fetch_row($consulta))
    {
        if(isset($_POST['listado_carreras']) && $_POST['listado_carreras']==$registro[1])
        {
            echo "<option value='".$registro[1]."' selected='selected'>".$registro[2]."</option>";
        }
        else
        {
            echo "<option value='".$registro[1]."'>".$registro[2]."</option>";
        }
    }
    echo "</select>";
}
//funcion para generar listado de carreras indicando especificamente cual carrera debe estar seleccionada
function lista_carreras2($conn,$codigo_facultad,$codigo_escuela) 
{
    if($codigo_facultad !="800")
    {
        $consulta=mysql_query("SELECT * FROM carreras where codigo_facultad='$codigo_facultad'",$conn);
    }
    else
    {
        $consulta=mysql_query("SELECT * FROM carreras order by nombre_escuela",$conn);
    }
   
   

    // Voy imprimiendo el primer select compuesto por los paises
    echo "<select name='listado_carreras'>";
    echo "<option value=\"\"></option>";
    while($registro=mysql_fetch_row($consulta))
    {
        if($codigo_escuela==$registro[1])
        {
            echo "<option value='".$registro[1]."' selected='selected'>".$registro[2]."</option>";
        }
        else
        {
            echo "<option value='".$registro[1]."'>".$registro[2]."</option>";
        }
    }
    echo "</select>";
}

//funcion para generar listado de modalidades
function lista_modalidades($conn)
{
    $consulta=mysql_query("SELECT * FROM modalidades order by nombre_modalidad",$conn);

    // Voy imprimiendo el primer select compuesto por los paises
    echo "<select name='listado_modalidades'>";
    echo "<option value=\"\"></option>";
    while($registro=mysql_fetch_row($consulta))
    {
        if(isset($_POST['listado_modalidades']) && $_POST['listado_modalidades']==$registro[0])
        {
            echo "<option value='".$registro[0]."' selected='selected'>".$registro[1]."</option>";
        }
        else
        {
            echo "<option value='".$registro[0]."'>".$registro[1]."</option>";
        }
    }
    echo "</select>";
}

//funcion para generar listado de tipos de retiro
function lista_retiros($conn)
{
    $consulta=mysql_query("SELECT * FROM tipo_retiros order by codigo_tipo_retiro",$conn);

    echo "<select name='listado_retiros'>";
    echo "<option value=\"\"></option>";
    while($registro=mysql_fetch_row($consulta))
    {
        if(isset($_POST['listado_retiros']) && $_POST['listado_retiros']==$registro[0])
        {
            echo "<option value='".$registro[0]."' selected='selected'>".$registro[1]."</option>";
        }
        else
        {
            echo "<option value='".$registro[0]."'>".$registro[1]."</option>";
        }
    }
    echo "</select>";
}


//cuadro historial: muestra un cuadro con el historial de inscripcion de un estudiante
function cuadro_historial($conexion,$tabla_historial_inscripciones,$cedula)
{
    $i=0;
    $sql="select * from $tabla_historial_inscripciones where cedula=$cedula order by fecha_inscripcion";
    $result=mysql_query($sql,$conexion) or die('Consulta fallida. ' . mysql_error() . '<br />[función cuadro_historial]:<br />' . $query);
    while($aux=mysql_fetch_array($result))
    {
        $carrera=obtener_nombre_escuela($conexion,$aux['carrera']);
        $modalidad=obtener_nombre_modalidad($conexion,$aux['modalidad_ingreso']);
        $tipo_inscripcion=obtener_nombre_inscripcion($conexion,$aux['tipo_inscripcion']);
        $fecha_inscripcion=implode( '/', array_reverse( explode( '-', $aux['fecha_inscripcion']))) ;
        echo "<tr class=\"Estilo8\"><td align=\"center\">".$fecha_inscripcion."</td><td align=\"center\">".$carrera."</td><td align=\"center\">".$modalidad."</td><td align=\"center\">".$tipo_inscripcion."</td><td align=\"center\">".$aux['codigo_planilla']."</td><td align=\"center\">".$aux['chequeado_por']."</td><td align=\"center\">&nbsp;".$aux['observacion']."</td></tr>";
    }
}

//cuadro usuarios: muestra un cuadro con el listado de usuarios del sistema
function cuadro_usuarios($conexion,$tabla_usuarios)
{
    $i=0;
    $sql="select * from $tabla_usuarios order by login";
    $result=mysql_query($sql,$conexion) or die('Consulta fallida. ' . mysql_error() . '<br />[función cuadro_usuarios]:<br />' . $query);
    while($aux=mysql_fetch_array($result))
    {
        if($aux['activo']==1)
        {
            $esta_activo="SI";
        }
        else
        {
            $esta_activo="NO";
        }
        echo "<tr class=\"Estilo8\"><td align=\"center\">".$aux['login']."</td><td align=\"center\">".$aux['nombre']."</td><td align=\"center\">".$aux['apellido']."</td><td align=\"center\">".$esta_activo."</td><td align=\"center\"><a href=\"modificar_usuario.php?usuario_id=".$aux['login']."\" class=\"link5\">Modificar</a></td><td align=\"center\"><a href=\"eliminar_usuario.php?usuario_id=".$aux['login']."\" class=\"link5\">Eliminar</a></td></tr>";
    }
}

//cuadro autoridad: muestra un cuadro con el listado de cargos autoridad
function cuadro_autoridad($conexion,$tabla_autoridad_carnet)
{
    $i=0;
    $sql="select * from $tabla_autoridad_carnet order by nombre_autoridad";
    $result=mysql_query($sql,$conexion) or die('Consulta fallida. ' . mysql_error() . '<br />[función cuadro_autoridad]:<br />' . $query);
    while($aux=mysql_fetch_array($result))
    {
     
        echo "<tr class=\"Estilo8\"><td align=\"center\">".$aux['nombre_autoridad']."</td><td align=\"center\"><a href=\"modificar_cargo_autoridad.php?cargo_id=".$aux['nombre_autoridad']."\" class=\"link5\">Modificar</a></td><td align=\"center\"><a href=\"eliminar_cargo_autoridad.php?cargo_id=".$aux['nombre_autoridad']."\" class=\"link5\">Eliminar</a></td></tr>";
    }
}

//cuadro dependencias: muestra un cuadro con el listado de dependencias
function cuadro_dependencias($conexion,$tabla_dependencias_carnet)
{
    $i=0;
    $sql="select * from $tabla_dependencias_carnet order by nombre_dependencia";
    $result=mysql_query($sql,$conexion) or die('Consulta fallida. ' . mysql_error() . '<br />[función cuadro_dependencias]:<br />' . $query);
    while($aux=mysql_fetch_array($result))
    {
     
        echo "<tr class=\"Estilo8\"><td align=\"center\">".$aux['nombre_dependencia']."</td><td align=\"center\"><a href=\"modificar_dependencia.php?dependencia_id=".$aux['nombre_dependencia']."\" class=\"link5\">Modificar</a></td></tr>";
    }
}

//cuadro estudiante: muestra un cuadro con el listado de cargos estudiante
function cuadro_estudiante($conexion,$tabla_cargoestudiante_carnet)
{
    $i=0;
    $sql="select * from $tabla_cargoestudiante_carnet order by nombre_cargo";
    $result=mysql_query($sql,$conexion) or die('Consulta fallida. ' . mysql_error(). '<br />[función cuadro_estudiante]:<br />' . $query);
    while($aux=mysql_fetch_array($result))
    {
     
        echo "<tr class=\"Estilo8\"><td align=\"center\">".$aux['nombre_cargo']."</td><td align=\"center\"><a href=\"modificar_cargo_estudiante.php?cargo_id=".$aux['nombre_cargo']."\" class=\"link5\">Modificar</a></td><td align=\"center\"><a href=\"eliminar_cargo_estudiante.php?cargo_id=".$aux['nombre_cargo']."\" class=\"link5\">Eliminar</a></td></tr>";
    }
}


//cuadro prestamos: muestra un cuadro con los prestamos de un estudiante
function cuadro_prestamos($conexion,$cedula)
{
    $sql="select * from prestamos where cedula=$cedula";
    $result=mysql_query($sql,$conexion) or die('Consulta fallida. ' . mysql_error() . '<br />[función cuadro_prestamos]:<br />' . $query);

    if(mysql_num_rows($result)==1)
    {
        $aux=mysql_fetch_array($result);
        $fecha_prestamo=implode( '/', array_reverse( explode( '-', $aux['fecha_prestamo']))) ;
        echo "<tr><td colspan=\"2\" class=\"formalizar\">ESTA PERSONA POSEE LOS SIGUIENTES DOCUMENTOS PRESTADOS:</td></tr>";
        echo "<tr><td colspan=\"2\">&nbsp;</td></tr>";
        if($aux['titulo']==1)
        {
            echo "<tr><td colspan=\"2\" width=\"100%\" align=\"center\">*** TITULO ***</td>";
        }
        if($aux['notas']==1)
        {
            echo "<tr><td colspan=\"2\" width=\"100%\" align=\"center\">*** NOTAS CERTIFICADAS ***</td>";
        }
        if($aux['partida']==1)
        {
            echo "<tr><td colspan=\"2\" width=\"100%\" align=\"center\">*** PARTIDA DE NACIMIENTO ***</td>";
        }
        echo "<tr><td colspan=\"2\" class=\"Estilo18\"><br/>Fecha del Préstamo: ".$fecha_prestamo."</td></tr>";
        echo"<tr><td colspan=\"2\" class=\"Estilo11\"><br/><br/><div align=\"center\">Si la persona ya devolvió los documentos y está solvente presione&nbsp;&nbsp;<input type=\"submit\" name=\"devolver\" value=\"AQUI\" class=\"boton1\" /></td></tr>";


    }
    else
    {
        echo "<tr><td colspan=\"2\" class=\"formalizar\">SELECCIONE LOS DOCUMENTOS A PRESTAR</td></tr>";
        echo "<tr><td colspan=\"2\">&nbsp;</td></tr>";
        echo "<tr><td width=\"50%\" align=\"right\">TITULO</td><td align=\"left\">&nbsp;&nbsp;<input name=\"titulo\" type=\"checkbox\" value=\"1\"></td>";
        echo "<tr><td width=\"50%\" align=\"right\">NOTAS CERTIFICADAS</td><td align=\"left\">&nbsp;&nbsp;<input name=\"notas\" type=\"checkbox\" value=\"1\"></td>";
        echo "<tr><td width=\"50%\" align=\"right\">PARTIDA NACIMIENTO</td><td align=\"left\">&nbsp;&nbsp;<input name=\"partida\" type=\"checkbox\" value=\"1\"></td>";
        echo"<tr><td colspan=\"2\"><br/><div align=\"center\"><input type=\"submit\" name=\"prestar\" value=\"Aceptar\" class=\"boton1\" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"submit\" name=\"no_prestar\" value=\"Cancelar\" class=\"boton1\" /></div></td></tr>";
    }
}

//funcion que me retorna el tipo de regimen de una facultad A=Regimen Anual S=Regimen Semestral
function obtener_regimen_facultad($conexion,$codigo_facultad)
{
    $sql="SELECT * FROM facultades WHERE codigo_facultad= '$codigo_facultad'";
    $result=mysql_query($sql,$conexion) or die('Consulta fallida. ' . mysql_error() . '<br />[función obtener_regimen_facultad]:<br />' . $query);
    $aux=mysql_fetch_array($result);
    return $aux['regimen'];
}

//funcion que me retorna el monto de un arancel específico
function obtener_monto_arancel($conexion,$codigo_arancel)
{
    $sql="SELECT * FROM aranceles WHERE codigo_arancel= '$codigo_arancel'";
    $result=mysql_query($sql,$conexion) or die('Consulta fallida. ' . mysql_error() . '<br />[función obtener_monto_arancel]:<br />' . $query);
    $aux=mysql_fetch_array($result);
    return $aux['monto'];
}

function lista_operaciones_usuario($conn,$usuario)
{
    $consulta=mysql_query("SELECT permisos.login,permisos.codigo_operacion,operaciones.nombre_operacion from permisos join operaciones on permisos.codigo_operacion=operaciones.codigo_operacion where permisos.login='$usuario' order by operaciones.nombre_operacion",$conn);

    // Voy imprimiendo el primer select compuesto por las operaciones de usuario
    echo "<select name='listado_operaciones_usuario'>";
    echo "<option value=\"\"></option>";
    while($registro=mysql_fetch_array($consulta))
    {
        if(isset($_POST['listado_operaciones_usuario']) && $_POST['listado_operaciones_usuario']==$registro[0])
        {
            echo "<option value='".$registro['codigo_operacion']."' selected='selected'>".$registro['nombre_operacion']."</option>";
        }
        else
        {
            echo "<option value='".$registro['codigo_operacion']."'>".$registro['nombre_operacion']."</option>";
        }
    }
    echo "</select>";
}

//funcion que me retorna el link correspondiente a una operacion de usuario
function obtener_link_operacion($conexion,$codigo_operacion)
{
    $sql="SELECT * FROM operaciones WHERE codigo_operacion='$codigo_operacion'";
    $result=mysql_query($sql,$conexion) or die('Consulta fallida. ' . mysql_error() . '<br />[función obtener_link_operacion]:<br />' . $query);
    $aux=mysql_fetch_array($result);
    return $aux['link'];
}

//funcion que me permite saber si un usuario esta autorizado a entrar a una interfaz X  dado el codigo de operacion
function usuario_autorizado($conexion,$usuario,$codigo_operacion)
{
    $sql="SELECT * FROM permisos WHERE login='$usuario' and codigo_operacion='$codigo_operacion'";
    $result=mysql_query($sql,$conexion) or die('Consulta fallida. ' . mysql_error() . '<br />[función usuario_autorizado]:<br />' . $query);
    if(mysql_num_rows($result)==1)
    {
        return 1;  //verdadero
    }
    else
    {
        return 0;  //falso
    }
}

//cuadro usuarios: muestra un cuadro con el listado de usuarios del sistema
function cuadro_usuarios_permisos($conexion,$tabla_usuarios)
{
    $i=0;
    $sql="select * from $tabla_usuarios order by login";
    $result=mysql_query($sql,$conexion) or die('Consulta fallida. ' . mysql_error() . '<br />[función cuadro_usuarios_permisos]:<br />' . $query);
    while($aux=mysql_fetch_array($result))
    {
        if($aux['activo']==1)
        {
            $esta_activo="SI";
        }
        else
        {
            $esta_activo="NO";
        }
        echo "<tr class=\"Estilo8\"><td align=\"center\">".$aux['login']."</td><td align=\"center\">".$aux['nombre']."</td><td align=\"center\">".$aux['apellido']."</td><td align=\"center\">".$esta_activo."</td><td align=\"center\"><a href=\"modificar_permisos_usuario.php?usuario_id=".$aux['login']."\" class=\"link5\">Modificar Permisos</a></td></tr>";
    }
}

//listar permisos usuario: muestra la permisología asociada a un usuario del sistema
function listar_permisos_usuario($conexion,$usuario)
{
    $i=0;
    $sql="select * from permisos join operaciones on permisos.codigo_operacion=operaciones.codigo_operacion where permisos.login='$usuario' order by operaciones.nombre_operacion";
    $result=mysql_query($sql,$conexion) or die('Consulta fallida. ' . mysql_error() . '<br />[función listar_permisos_usuario]:<br />' . $query);

    if(mysql_num_rows($result)==0)
    {
        echo "<div align=\"center\" class=\"Estilo14\">A este usuario aún no se le ha asignado alguna permisología</div>";
    }
    else
    {

        echo "<table width=\"90%\" border=\"1\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#CCCCCC\" bordercolor=\"#666666\">";
        echo "<tr bgcolor=\"#EFB76B\"><td class=\"Estilo9\" width=\"15%\">CODIGO DE OPERACION</td><td class=\"Estilo9\" width=\"65%\">NOMBRE DE OPERACION</td><td class=\"Estilo9\" width=\"20%\" align=\"center\">ACCION</td></tr>";

        while($aux=mysql_fetch_array($result))
        {
            echo "<tr class=\"Estilo8\"><td align=\"center\">".$aux['codigo_operacion']."</td><td align=\"center\">".$aux['nombre_operacion']."</td><td align=\"center\"><a href=\"eliminar_permiso.php?codigo_operacion=".$aux['codigo_operacion']."\" class=\"link5\">Eliminar Permiso</a></td></tr>";
        }
        echo "</table>";
    }
}

//funcion que me retorna la lista completa de operaciones posibles en la base de datos
function lista_operaciones($conn)
{
    $consulta=mysql_query("SELECT * from operaciones order by nombre_operacion",$conn);

    // Voy imprimiendo el primer select compuesto por las operaciones de usuario
    echo "<select name='listado_operaciones'>";
    echo "<option value=\"\"></option>";
    while($registro=mysql_fetch_array($consulta))
    {
        echo "<option value='".$registro['codigo_operacion']."'>".$registro['nombre_operacion']."</option>";
    }
    echo "</select>";
}

//cuadro resumen inscritos: muestra un cuadro con las cuentas de los INSCRITOS
function cuadro_resumen_inscritos($conexion,$tabla_inscritos,$facultad,$escuela,$fecha_inicio,$fecha_final)
{
    if($facultad=='')
    {
        if($escuela=='')
        {
            $sql="select facultad,carrera,modalidad_ingreso,count(modalidad_ingreso) as total from $tabla_inscritos where activo=1 and fecha_ult_inscripcion between '$fecha_inicio' and '$fecha_final' group by facultad,carrera,modalidad_ingreso";
        }
        else
        {
            $sql="select facultad,carrera,modalidad_ingreso,count(modalidad_ingreso) as total from $tabla_inscritos where activo=1 and carrera='$escuela' and fecha_ult_inscripcion between '$fecha_inicio' and '$fecha_final' group by modalidad_ingreso";
        }
    }
    else
    {
        if($escuela=='')
        {
            $sql="select facultad,carrera,modalidad_ingreso,count(modalidad_ingreso) as total from $tabla_inscritos where activo=1 and facultad='$facultad' and fecha_ult_inscripcion between '$fecha_inicio' and '$fecha_final' group by carrera,modalidad_ingreso";
        }
        else
        {
            $sql="select facultad,carrera,modalidad_ingreso,count(modalidad_ingreso) as total from $tabla_inscritos where activo=1 and carrera='$escuela' and fecha_ult_inscripcion between '$fecha_inicio' and '$fecha_final' group by modalidad_ingreso";
        }
    }

    $result=mysql_query($sql,$conexion) or die('Consulta fallida. ' . mysql_error() . '<br />[función cuadro_resumen_inscritos]:<br />' . $query);
    $cerrar=false;
    $facultad_actual="999"; //inicializo valores
    $escuela_actual="999"; //inicializo valores

    while($aux=mysql_fetch_array($result))
    {
        if($facultad_actual !=$aux['facultad'])
        {
            if($cerrar==true)
            {
                echo "</table>";
                $cerrar=false;
            }
            $facultad_actual=$aux['facultad'];
            $nombre_facultad=obtener_nombre_facultad($conexion,$facultad_actual);
            echo "<table width=\"600\" border=\"1\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#CCCCCC\" bordercolor=\"#666666\">";
            echo "<tr bgcolor=\"#C0C0C0\"><td class=\"Estilo18\" height=\"30\" colspan=\"3\" align=\"center\">FACULTAD DE ".$nombre_facultad."</td></tr>";
            $cerrar=true;
        }

        if($escuela_actual !=$aux['carrera'])
        {
            $escuela_actual=$aux['carrera'];
            if($escuela_actual=="")
            {
                $nombre_escuela="TODAS";
            }
            else
            {
                $nombre_escuela=obtener_nombre_escuela($conexion,$escuela_actual);
            }
            echo "<tr bgcolor=\"#EFB76B\"><td class=\"Estilo9\" colspan=\"3\" align=\"center\">".$nombre_escuela."</td></tr>";
            echo "<tr bgcolor=\"#C0E7A5\" align=\"center\"><td class=\"Estilo9\" width=\"45%\">MODALIDAD INGRESO</td><td class=\"Estilo9\" width=\"25%\">TOTAL</td><td class=\"Estilo9\" width=\"20%\">CODIGO ESCUELA</td></tr>";
        }
        $modalidad_ingreso=obtener_nombre_modalidad($conexion,$aux['modalidad_ingreso']);
        echo "<tr bgcolor=\"#EAEAEA\" align=\"center\"><td class=\"Estilo9\" width=\"45%\">".$modalidad_ingreso."</td><td class=\"Estilo9\" width=\"25%\">".$aux['total']."</td><td class=\"Estilo9\" width=\"20%\">".$aux['carrera']."</td></tr>";
    }//fin del while
    if($cerrar==true)
    {
        echo "</table>";
    }
}

//cuadro resumen inscritos: muestra un cuadro con las cuentas de los PRE-INSCRITOS
function cuadro_resumen_preinscritos($conexion,$tabla_inscritos,$facultad,$escuela,$fecha_inicio,$fecha_final)
{
    if($facultad=='')
    {
        if($escuela=='')
        {
            $sql="select facultad,carrera,modalidad_ingreso,count(modalidad_ingreso) as total from $tabla_inscritos where fecha_registro between '$fecha_inicio' and '$fecha_final' group by facultad,carrera,modalidad_ingreso";
        }
        else
        {
            $sql="select facultad,carrera,modalidad_ingreso,count(modalidad_ingreso) as total from $tabla_inscritos where carrera='$escuela' and fecha_registro between '$fecha_inicio' and '$fecha_final' group by modalidad_ingreso";
        }
    }
    else
    {
        if($escuela=='')
        {
            $sql="select facultad,carrera,modalidad_ingreso,count(modalidad_ingreso) as total from $tabla_inscritos where facultad='$facultad' and fecha_registro between '$fecha_inicio' and '$fecha_final' group by carrera,modalidad_ingreso";
        }
        else
        {
            $sql="select facultad,carrera,modalidad_ingreso,count(modalidad_ingreso) as total from $tabla_inscritos where carrera='$escuela' and fecha_registro between '$fecha_inicio' and '$fecha_final' group by modalidad_ingreso";
        }
    }

    $result=mysql_query($sql,$conexion) or die('Consulta fallida. ' . mysql_error() . '<br />[función cuadro_resumen_preinscritos]:<br />' . $query);
    $cerrar=false;
    $facultad_actual="999"; //inicializo valores
    $escuela_actual="999"; //inicializo valores

    while($aux=mysql_fetch_array($result))
    {
        if($facultad_actual !=$aux['facultad'])
        {
            if($cerrar==true)
            {
                echo "</table>";
                $cerrar=false;
            }
            $facultad_actual=$aux['facultad'];
            $nombre_facultad=obtener_nombre_facultad($conexion,$facultad_actual);
            echo "<table width=\"600\" border=\"1\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#CCCCCC\" bordercolor=\"#666666\">";
            echo "<tr bgcolor=\"#C0C0C0\"><td class=\"Estilo18\" height=\"30\" colspan=\"3\">FACULTAD DE ".$nombre_facultad."</td></tr>";
            $cerrar=true;
        }

        if($escuela_actual !=$aux['carrera'])
        {
            $escuela_actual=$aux['carrera'];
            if($escuela_actual=="")
            {
                $nombre_escuela="TODAS";
            }
            else
            {
                $nombre_escuela=obtener_nombre_escuela($conexion,$escuela_actual);
            }
            echo "<tr bgcolor=\"#EFB76B\"><td class=\"Estilo9\" colspan=\"3\">".$nombre_escuela."</td></tr>";
            echo "<tr bgcolor=\"#C0E7A5\"><td class=\"Estilo9\" width=\"45%\">MODALIDAD INGRESO</td><td class=\"Estilo9\" width=\"25%\">TOTAL</td><td class=\"Estilo9\" width=\"20%\">CODIGO ESCUELA</td></tr>";
        }
        $modalidad_ingreso=obtener_nombre_modalidad($conexion,$aux['modalidad_ingreso']);
        echo "<tr bgcolor=\"#EAEAEA\"><td class=\"Estilo9\" width=\"45%\">".$modalidad_ingreso."</td><td class=\"Estilo9\" width=\"25%\">".$aux['total']."</td><td class=\"Estilo9\" width=\"20%\">".$aux['carrera']."</td></tr>";
    }//fin del while
    if($cerrar==true)
    {
        echo "</table>";
    }
}

//cuadro historial: muestra un cuadro con el historial de carnetizacion de un estudiante
function cuadro_historial_carnet($conexion,$tabla_historial_estudiante,$cedula)
{
    $i=0;
    $sql="select * from $tabla_historial_estudiante where cedula=$cedula order by fecha_carnetizacion";
    $result=mysql_query($sql,$conexion) or die('Consulta fallida. ' . mysql_error() . '<br />[función cuadro_historial_carnet]:<br />' . $query);
    while($aux=mysql_fetch_array($result))
    {

        $carrera=obtener_nombre_escuela($conexion,$aux['carrera']);
        $facultad=obtener_nombre_facultad($conexion,$aux['facultad']);
        $fecha=substr($aux[fecha_carnetizacion],0,10);
        $fecha2=substr($aux[fecha_vencimiento],0,10);
        $fecha_carnetizacion=implode( '/', array_reverse( explode( '-', $fecha))) ;
        $fecha_vencimiento=implode( '/', array_reverse( explode( '-', $fecha2))) ;
        echo "<tr class=\"Estilo8\"><td align=\"center\">".$fecha_carnetizacion."</td><td align=\"center\">".$facultad."</td><td align=\"center\">".$carrera."</td><td align=\"center\">".$fecha_vencimiento."</td><td align=\"center\">".$aux['impreso_por']."</td></tr>";
    }
}

//cuadro historial impresion: muestra un cuadro con el historial de carnetizacion de un estudiante
function cuadro_historial_carnet_impresion($conexion,$tabla_historial_estudiante,$cedula)
{
    $i=0;
    $sql="select * from $tabla_historial_estudiante where cedula=$cedula order by fecha_carnetizacion";
    $result=mysql_query($sql,$conexion) or die('Consulta fallida. ' . mysql_error() . '<br />[función cuadro_historial_carnet_impresion]:<br />' . $query);
    while($aux=mysql_fetch_array($result))
    {

        $carrera=obtener_nombre_escuela($conexion,$aux['carrera']);
        $facultad=obtener_nombre_facultad($conexion,$aux['facultad']);
        $fecha=substr($aux[fecha_carnetizacion],0,10);
        $fecha_h=(substr($aux[fecha_carnetizacion],11,19));
        $hora = $fecha_h;
        $hora = strtotime($hora);
        $hora = date("h:i:s:A", $hora);
        $fecha_carnetizacion=implode( '/', array_reverse( explode( '-', $fecha))) ;
        echo "<tr class=\"Estilo8\"><td align=\"center\">".$fecha_carnetizacion."</td><td align=\"center\">".$hora."</td><td align=\"center\">".$carrera."</td><td align=\"center\">".$aux['impreso_por']."</td><td align=\"center\"><a href=\"eliminar_impresion.php?fecha_id=".$aux['fecha_carnetizacion']."\" class=\"link5\">Eliminar</a></td></tr>";
     
    }
}

//cuadro historial: muestra un cuadro con el historial de carnetizacion de personal
function cuadro_historial_carnet_personal($conexion,$tabla_historial_personal,$cedula)
{
    $i=0;
    $sql="select * from $tabla_historial_personal where cedula=$cedula order by fecha_carnetizacion";
    $result=mysql_query($sql,$conexion) or die('Consulta fallida. ' . mysql_error() . '<br />[función cuadro_historial_carnet_personal]:<br />' . $query);
    while($aux=mysql_fetch_array($result))
    {

        $dependencia=obtener_nombre_dependencia($conexion,$aux['dependencia']);
        $tipo=obtener_nombre_tipo($conexion,$aux['tipo_personal']);
        $fecha=substr($aux[fecha_carnetizacion],0,10);
        $fecha2=substr($aux[fecha_vencimiento],0,10);
        $fecha_carnetizacion=implode( '/', array_reverse( explode( '-', $fecha))) ;
        $fecha_vencimiento=implode( '/', array_reverse( explode( '-', $fecha2))) ;
        echo "<tr class=\"Estilo8\"><td align=\"center\">".$fecha_carnetizacion."</td><td align=\"center\">".$dependencia."</td><td align=\"center\">".$tipo."</td><td align=\"center\">".$fecha_vencimiento."</td><td align=\"center\">".$aux['impreso_por']."</td></tr>";
    }
}

//funcion que me retorna el nombre de una dependencia dado el codigo de dicha dependencia
function obtener_nombre_dependencia($conexion,$codigo_dependencia)
{
    $sql="SELECT * FROM dependencias WHERE codigo_dependencia= '$codigo_dependencia'";
    $result=mysql_query($sql,$conexion) or die('Consulta fallida. ' . mysql_error() . '<br />[función obtener_nombre_dependencia]:<br />' . $query);
    $aux=mysql_fetch_array($result);
    return $aux['nombre_dependencia'];
}

//funcion que me retorna el nombre de un tipo_personal dado el codigo de dicho tipo
function obtener_nombre_tipo($conexion,$codigo_tipo)
{
    $sql="SELECT * FROM tipo_personal WHERE codigo_tipo= '$codigo_tipo'";
    $result=mysql_query($sql,$conexion) or die('Consulta fallida. ' . mysql_error() . '<br />[función obtener_nombre_tipo]:<br />' . $query);
    $aux=mysql_fetch_array($result);
    return $aux['nombre_tipo'];
}

//CARNET: funcion para generar listado de tipos de personal
function lista_tipos($conn)
{
    $consulta=mysql_query("SELECT * FROM tipo_personal order by nombre_tipo",$conn);

    // Voy imprimiendo el primer select compuesto por los tipos
    echo "<select name='listado_tipos'>";
    echo "<option value=\"\"></option>";
    while($registro=mysql_fetch_row($consulta))
    {
        if(isset($_POST['listado_tipos']) && $_POST['listado_tipos']==$registro[0])
        {
            echo "<option value='".$registro[0]."' selected='selected'>".$registro[1]."</option>";
        }
        else
        {
            echo "<option value='".$registro[0]."'>".$registro[1]."</option>";
        }
    }
    echo "</select>";
}

//CARNET: funcion para generar listado de tipos de personal con un tipo seleccionado
function lista_tipos_seleccionado($conn,$codigo_tipo)
{
    $consulta=mysql_query("SELECT * FROM tipo_personal order by nombre_tipo",$conn);

    // Voy imprimiendo el primer select compuesto por los tipos
    echo "<select name='listado_tipos'>";
    while($registro=mysql_fetch_row($consulta))
    {
        if($codigo_tipo==$registro[0])
        {
            echo "<option value='".$registro[0]."' selected='selected'>".$registro[1]."</option>";
        }
        else
        {
            echo "<option value='".$registro[0]."'>".$registro[1]."</option>";
        }
    }
    echo "</select>";
}



//CARNET: funcion para generar listado de dependencia
function lista_dependencias($conn)
{
    $consulta=mysql_query("SELECT * FROM dependencias order by nombre_dependencia",$conn);

    // Voy imprimiendo el primer select compuesto por las dependencias
    echo "<select name='listado_dependencias'>";
    echo "<option value=\"\"></option>";
    while($registro=mysql_fetch_row($consulta))
    {
        if(isset($_POST['listado_dependencias']) && $_POST['listado_dependencias']==$registro[0])
        {
            echo "<option value='".$registro[0]."' selected='selected'>".$registro[1]."</option>";
        }
        else
        {
            echo "<option value='".$registro[0]."'>".$registro[1]."</option>";
        }
    }
    echo "</select>";
}

//CARNET: funcion para generar listado de dependencia con una dependencia seleccionada
function lista_dependencias_seleccionada($conn,$codigo_dependencia)
{
    $consulta=mysql_query("SELECT * FROM dependencias order by nombre_dependencia",$conn);

    // Voy imprimiendo el primer select compuesto por las dependencias
    echo "<select name='listado_dependencias'>";
    while($registro=mysql_fetch_row($consulta))
    {
        if($codigo_dependencia==$registro[0])
        {
            echo "<option value='".$registro[0]."' selected='selected'>".$registro[1]."</option>";
        }
        else
        {
            echo "<option value='".$registro[0]."'>".$registro[1]."</option>";                
        }
    }
    echo "</select>";
}

//CARNET: funcion para generar listado de Cargos que puede tener un estudiante
function lista_cargo($conn)
{
    $consulta=mysql_query("SELECT * FROM cargo_estudiante order by nombre_cargo",$conn);

    // Voy imprimiendo el primer select compuesto por los cargos
    echo "<select name='listado_cargos'>";
    echo "<option value=\"\"></option>";
    while($registro=mysql_fetch_row($consulta))
    {
        if(isset($_POST['listado_cargos']) && $_POST['listado_cargos']==$registro[0])
        {
            echo "<option value='".$registro[0]."' selected='selected'>".$registro[1]."</option>";
        }
        else
        {
            echo "<option value='".$registro[0]."'>".$registro[1]."</option>";
        }
    }
    echo "</select>";
}

//CARNET: funcion que me retorna el nombre de un cardo dado el codigo
function obtener_nombre_cargo($conexion,$codigo_cargo)
{
    $sql="SELECT * FROM cargo_estudiante WHERE codigo_cargo= '$codigo_cargo'";
    $result=mysql_query($sql,$conexion) or die('Consulta fallida. ' . mysql_error() . '<br />[función obtener_nombre_cargo]:<br />' . $query);
    $aux=mysql_fetch_array($result);
    return $aux['nombre_cargo'];
}


//CARNET: funcion para generar listado de Autoridades
function lista_autoridad($conn)
{
    $consulta=mysql_query("SELECT * FROM autoridad order by nombre_autoridad",$conn);

    // Voy imprimiendo el primer select compuesto por las autoridades
    echo "<select name='listado_autoridades'>";
    echo "<option value=\"\"></option>";
    while($registro=mysql_fetch_row($consulta))
    {
        if(isset($_POST['listado_autoridades']) && $_POST['listado_autoridades']==$registro[0])
        {
            echo "<option value='".$registro[0]."' selected='selected'>".$registro[1]."</option>";
        }
        else
        {
            echo "<option value='".$registro[0]."'>".$registro[1]."</option>";
        }
    }
    echo "</select>";
}

//CARNET:funcion que me retorna el nombre de una autoridad dado el codigo
function obtener_nombre_autoridad($conexion,$codigo_autoridad)
{
    $sql="SELECT * FROM autoridad WHERE codigo_autoridad= '$codigo_autoridad'";
    $result=mysql_query($sql,$conexion) or die('Consulta fallida. ' . mysql_error() . '<br />[función obtener_nombre_autoridad]:<br />' . $query);
    $aux=mysql_fetch_array($result);
 return $aux['nombre_autoridad'];
}

//CARNET: funcion para obtener iniciales de nombres y apellidos
 function iniciales($nombre) {
$a=strrpos($nombre,"'");    
$trozos = explode(" ",$nombre);
$iniciales=" "; 
$b=count($trozos);
for($i=0;$i<count($trozos);$i++){ 
if ($i==($b-1))
{                                 
    if($a!=false)
    {  
        $z=strrpos($trozos[$i],"'"); 
        if($z!=false)
        {
          $a=substr($trozos[$i],0,($z+2))." ";     
        }
        else
        {
          $a=substr($trozos[$i],0,1)." "; 
        }  
       
    }
    else
    {    
           $a=substr($trozos[$i],0,1)." ";        
    }  
}
else
{
     $c=$trozos[0]." "; 
     $d=$trozos[1]." ";  
     $e=$trozos[2]." ";        
}
}
   if($b==1)
   {
     $iniciales=$a;      
   } 
   else
   {
      if($b==2)
      {
          $iniciales=$c." ".$a;
      }
      else
      {
         if($b==3)
         {
           $iniciales=$c." ".$d." ".$a;      
         } 
         else
         {
             if($b==4)
             {
               $iniciales=$c." ".$d." ".$e." ".$a; 
             }
             else
             {
               $iniciales="(REVISAR CAMPO)"; 
             }
         }
      } 
   }                      
return $iniciales;
}

?>
