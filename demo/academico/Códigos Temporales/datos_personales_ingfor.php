<?php
echo "Code to develop";
?>
<!DOCTYPE html>
<html lang="es-ES">
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
</head>
<body>
  <div id="div-padre">
    <form name="frmIFDP" id="frmIFDP" autocomplete="off" method="post" action="">
      <h1 id="alcentro">Procesando: Ficha de Datos Personales</h1>
      <div id="capatres">
        <div><span>Documento:</span></div>
        <div><span id="cinput" title="Número del Documento..."><?php echo $NumDoc ?></span></div>
        <?php echo '<input type="hidden" name="txtNValor" value="'.$NumDoc.'">'; ?>
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
      <div id="centrado">
        <?php echo '<input type="hidden" name="numberecords" value="'.$numberecords.'">'; ?>
        <input type="submit" name="btnSdConfirm" value="Confirmar">
        <input type="submit" name="btnSdCancel" value="Cancelar y Regresar">
      </div>
    </form>
  </div>
</body>
</html>
