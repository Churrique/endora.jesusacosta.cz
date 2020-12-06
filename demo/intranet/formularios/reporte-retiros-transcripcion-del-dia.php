<?php
require_once('../funciones/valida-funciones.php');
require_once('../fpdf/fpdf.php');

class PDF extends FPDF
{
	//--- funciones modificadas de pdf-cymk
	function Set2DrawColor() {
		//Set color for all stroking operations
		switch(func_num_args()) {
			case 1:
				$g = func_get_arg(0);
				$this->DrawColor = sprintf('%.3F G', $g / 100);
				break;
			case 3:
				$r = func_get_arg(0);
				$g = func_get_arg(1);
				$b = func_get_arg(2);
				$this->DrawColor = sprintf('%.3F %.3F %.3F RG', $r / 255, $g / 255, $b / 255);
				break;
			case 4:
				$c = func_get_arg(0);
				$m = func_get_arg(1);
				$y = func_get_arg(2);
				$k = func_get_arg(3);
				$this->DrawColor = sprintf('%.3F %.3F %.3F %.3F K', $c / 100, $m / 100, $y / 100, $k / 100);
				break;
			default:
				$this->DrawColor = '0 G';
		}
		if($this->page > 0)
			$this->_out($this->DrawColor);
	}
	function Set2FillColor() {
		//Set color for all filling operations
		switch(func_num_args()) {
			case 1:
				$g = func_get_arg(0);
				$this->FillColor = sprintf('%.3F g', $g / 100);
				break;
			case 3:
				$r = func_get_arg(0);
				$g = func_get_arg(1);
				$b = func_get_arg(2);
				$this->FillColor = sprintf('%.3F %.3F %.3F rg', $r / 255, $g / 255, $b / 255);
				break;
			case 4:
				$c = func_get_arg(0);
				$m = func_get_arg(1);
				$y = func_get_arg(2);
				$k = func_get_arg(3);
				$this->FillColor = sprintf('%.3F %.3F %.3F %.3F k', $c / 100, $m / 100, $y / 100, $k / 100);
				break;
			default:
				$this->FillColor = '0 g';
		}
		$this->ColorFlag = ($this->FillColor != $this->TextColor);
		if($this->page > 0)
			$this->_out($this->FillColor);
	}
	function Set2TextColor() {
		//Set color for text
		switch(func_num_args()) {
			case 1:
				$g = func_get_arg(0);
				$this->TextColor = sprintf('%.3F g', $g / 100);
				break;
			case 3:
				$r = func_get_arg(0);
				$g = func_get_arg(1);
				$b = func_get_arg(2);
				$this->TextColor = sprintf('%.3F %.3F %.3F rg', $r / 255, $g / 255, $b / 255);
				break;
			case 4:
				$c = func_get_arg(0);
				$m = func_get_arg(1);
				$y = func_get_arg(2);
				$k = func_get_arg(3);
				$this->TextColor = sprintf('%.3F %.3F %.3F %.3F k', $c / 100, $m / 100, $y / 100, $k / 100);
				break;
			default:
				$this->TextColor = '0 g';
		}
		$this->ColorFlag = ($this->FillColor != $this->TextColor);
	}
	//--- FIN de funciones pdf-cymk
  function Header()
  {
	  $this->Image('../imagenes/Tope_Superior_para_Reporte_Modelo_5.jpg',0,0,216,21,'JPG');
	  $this->SetFont('Arial','B',10);
	  $this->SetXY(106.5,1.5);
	  $this->Write(5,'Retiros');
	  $this->SetFont('Arial','I',9);
	  $this->SetXY(120,1.5);
	  if ( isset($_GET['HOY']) ) {
		  $this->Write(5,'Del '.$_GET['HOY']);
	  }
	  else {
		  if ( isset($_GET['DESDE']) && isset($_GET['APARTIRDE']) ) {
			  $this->Write(5,'Apartir del '.$_GET['DESDE']);
		  }
		  else {
			  if ( isset($_GET['DESDE']) && isset($_GET['HASTA']) ) {
				  $this->Write(5,'Desde '.$_GET['DESDE'].' Hasta '.$_GET['HASTA']);
			  }
			  else {
				  $this->Write(5,'Del '.$_GET['DESDE']);
			  }
		  }
	  }
	  $this->SetFont('Arial','',6);
	  $this->SetXY(106.5,9);
	  $this->MultiCell(76,2,utf8_decode('OBSERVACIÓN: ').$_GET['OBS'],0,'J',false);
	  $this->Ln(10);
  }
  function Footer()
  {
	  $this->SetLineWidth(0.4);
	  $this->Line(0,273,216,273);
	  $this->SetFont('Arial','I',8);
	  $this->SetXY(0,-6);
	  $this->Write(5,'Fecha: '.utf8_decode(fecha(false)));
	  $this->SetXY(180,-6);
	  $this->Write(5,utf8_decode('Página ').$this->PageNo().' de {nb}');
	  //con SetXY es hasta 202,Y
  }
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('P','Letter');
$cWHERE = NULL;
if ( isset($_GET['HOY']) ) {
	$cWHERE = "`fecha_de_transcripcion` = '".$_GET['HOY']."' GROUP BY `aescuela`,`aci` ORDER BY `aescuela`,`aci`";
}
else {
	if ( isset($_GET['DESDE']) && isset($_GET['APARTIRDE']) ) {
		$cWHERE = "`fecha_de_transcripcion` >= '".$_GET['DESDE']."' GROUP BY `aescuela`,`aci` ORDER BY `aescuela`,`aci`";
	}
	else {
		if ( isset($_GET['DESDE']) && isset($_GET['HASTA']) && !isset($_GET['APARTIRDE']) ) {
			$cWHERE = "`fecha_de_transcripcion` >= '".$_GET['DESDE']."' AND `fecha_de_transcripcion` <= '".$_GET['HASTA']."' GROUP BY `aescuela`,`aci` ORDER BY `aescuela`,`aci`";
		}
	}
}
$fila = 27;
$columna = 0;
if ( !is_null($cWHERE) ) {
	$registros = CGenDCTv2(BASE_DE_DATOS,'_vista_compuesta_de_retiros_para_reportes',true,$cWHERE);
	mysql_data_seek($registros, 0);
	$filas_temp = mysql_fetch_array($registros, MYSQL_ASSOC);
	$faculta_actual = $filas_temp['nombre_de_facultad'];
	$pdf->SetFont('Arial','IB',9);
	$pdf->SetXY($columna+0.5,$fila-5);
	$pdf->Cell(13,5,utf8_decode('Cédula'),1,0,'C',false);
	$pdf->SetXY($columna+14,$fila-5);
	$pdf->Cell(42,5,'Nombres Apellidos',1,0,'C',false);
	$pdf->SetXY($columna+56.5,$fila-5);
	$pdf->Cell(54,5,'Escuela',1,0,'C',false);
	$pdf->SetXY($columna+110,$fila-5);
	$pdf->Cell(20,5,'Pasivo',1,0,'C',false);
	$pdf->SetXY($columna+130.5,$fila-5);
	$pdf->Cell(18,5,'Retirado',1,0,'C',false);
	$pdf->SetXY($columna+149,$fila-5);
	$pdf->Cell(30.5,5,'Pasivo',1,0,'C',false);
	$pdf->SetXY($columna+180,$fila-5);
	$pdf->Cell(20,5,'Transcrito',1,0,'C',false);
	while ($rows = mysql_fetch_array($registros, MYSQL_ASSOC)) {
		if ( $faculta_actual != $rows['nombre_de_facultad'] ) {
			$faculta_actual = $rows['nombre_de_facultad'];
			$fila = 27;
			$columna = 0;
			$pdf->AliasNbPages();
			$pdf->AddPage('P','Letter');
			$pdf->SetFont('Arial','IB',9);
			$pdf->SetXY($columna+0.5,$fila-5);
			$pdf->Cell(13,5,utf8_decode('Cédula'),1,0,'C',false);
			$pdf->SetXY($columna+14,$fila-5);
			$pdf->Cell(42,5,'Nombres Apellidos',1,0,'C',false);
			$pdf->SetXY($columna+56.5,$fila-5);
			$pdf->Cell(54,5,'Escuela',1,0,'C',false);
			$pdf->SetXY($columna+110,$fila-5);
			$pdf->Cell(20,5,'Pasivo',1,0,'C',false);
			$pdf->SetXY($columna+130.5,$fila-5);
			$pdf->Cell(18,5,'Retirado',1,0,'C',false);
			$pdf->SetXY($columna+149,$fila-5);
			$pdf->Cell(30.5,5,'Pasivo',1,0,'C',false);
			$pdf->SetXY($columna+180,$fila-5);
			$pdf->Cell(20,5,'Transcrito',1,0,'C',false);
		}
		$pdf->SetFont('Arial','IB',8);
		$pdf->SetXY(106.5,4.5);
		$pdf->Write(5,$rows['nombre_de_facultad']);
		$pdf->SetFont('Helvetica','I',8);
		$pdf->SetXY($columna,$fila);
		$pdf->Write(5,$rows['aci']);
		$columna += 13.5;
		$pdf->SetXY($columna,$fila);
		$pdf->Write(5,$rows['nombres'].' '.$rows['apellidos']);
		$columna += 42;
		$pdf->SetXY($columna,$fila);
		$pdf->Write(5,$rows['aescuela'].' | '.$rows['nombre_de_escuela']);
		$columna += 55;
		$pdf->SetXY($columna,$fila);
		$pdf->Write(5,$rows['descripcion_del_pasivo']);
		$columna += 20;
		$pdf->SetXY($columna,$fila);
		$pdf->Write(5,$rows['fecha_del_retiro']);
		$columna += 18;
		$pdf->SetXY($columna,$fila);
		$pdf->Write(5,$rows['descripcion_del_activo']);
		$columna += 33;
		$pdf->SetXY($columna,$fila);
		$pdf->Write(5,$rows['fecha_de_transcripcion']);
//			$columna += 5;
//			$pdf->SetXY($columna,$fila);
//			$pdf->Write(5,$rows['observacion_del_retiro']);
		$columna = 0;
		$fila += 5;
	}
}
else {
	$pdf->SetLineWidth(2);
	$columna += 10; $fila +=10;
	$pdf->SetFont('Helvetica','BI',15);
	$pdf->SetXY($columna,$fila);
	$pdf->Cell(0,40,'No hay registros que mostrar...!',1,1,'C');
	$fila += 43;
	$pdf->SetLineWidth(0.4);
	$pdf->Line(0,$fila,216,($fila+176));
}
$pdf->Output('reporte_de_retiros_transcritos.pdf','I');
?>