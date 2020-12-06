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
	  $this->Image('../imagenes/escudo_uc_1.jpg',1,1,16,21,'JPG');
	  $this->Image('../imagenes/digaes_transparente_con_rotulo.fw.png',170,1,44,19,'PNG');
	  $this->SetFont('Arial','BI',15);
	  $this->SetXY(17,2);
	  $this->Write(5,'Universidad de Carabobo');
	  $this->SetFont('Arial','BI',13);
	  $this->SetXY(17,7);
	  $this->Write(5,'Secretaría');
	  $this->SetFont('Arial','BI',10);
	  $this->SetXY(17,12);
	  $this->Write(5,'Dirección General de Asuntos Estudiantiles');
	  $this->SetFont('Arial','I',10);
	  $this->SetXY(17,17);
	  $this->Write(5,'Reporte de Promedios (no vinculados)');
	  $this->SetLineWidth(0.4);
	  $this->Line(0,23,216,23);
	  $this->Ln(10);
  }
  function Footer()
  {
	  $this->SetLineWidth(0.4);
	  $this->Line(0,270,216,270);
	  $this->SetFont('Arial','I',8);
	  $this->SetXY(0,-6);
	  $this->Write(5,'Fecha: '.utf8_decode(fecha(false)));
	  $this->SetXY(180,-6);
	  $this->Write(5,'Página '.$this->PageNo().' de {nb}');
	  //con SetXY es hasta 202,Y
  }
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('P','Letter');
$registros = ConsulGenDCT(BASE_FORANEA_DE_DATOS,'_vista_promedios_no_relacionados','id_promocion',$_GET['ID']);
$promocion = true;
$rotulo = true;
$fila = 24;
$columna = 0;
if ( is_bool($registros) ) {
	$registros = ConsulGenDCT(BASE_FORANEA_DE_DATOS,'pnr_datos_promocion','id_promocion',$_GET['ID']);
	while ($rows = mysql_fetch_array($registros, MYSQL_ASSOC)) {
		if ( $promocion ) {
			$pdf->SetFont('Helvetica','I',10);
			$pdf->SetXY($columna,$fila);
			$pdf->Write(5,'Título Obtenido: ');
			$pdf->SetFont('Arial','BI',10);
			$pdf->Write(5,( is_null($rows['titulo_nombre']) || empty($rows['titulo_nombre']) ) ? 'S/Dato' : $rows['titulo_nombre']);
			$fila += 5;
			//----
			$pdf->SetFont('Helvetica','I',10);
			$pdf->SetXY($columna,$fila);
			$pdf->Write(5,'Fecha de Acto: ');
			$pdf->SetFont('Arial','BI',10);
			$pdf->Write(5,( is_null($rows['fecha_acto']) || empty($rows['fecha_acto']) ) ? 'S/Dato' : $rows['fecha_acto']);
			//----
			$columna += 80;
			$pdf->SetFont('Helvetica','I',10);
			$pdf->SetXY($columna,$fila);
			$pdf->Write(5,'Integrante(s): ');
			$pdf->SetFont('Arial','BI',10);
			$pdf->Write(5,( is_null($rows['integrantes']) || empty($rows['integrantes']) ) ? 'S/Dato' : $rows['integrantes']);
			//----
			$columna += 80;
			$pdf->SetFont('Helvetica','I',10);
			$pdf->SetXY($columna,$fila);
			$pdf->Write(5,'Promedio: ');
			$pdf->SetFont('Arial','BI',10);
			$pdf->Write(5,( is_null($rows['promedio_promocion']) || empty($rows['promedio_promocion']) ) ? 'S/Dato' : $rows['promedio_promocion']);
			$promocion = false;
			$fila += 5;
			//----
			$pdf->SetLineWidth(0.4);
			$pdf->Line(0,$fila,216,$fila);
			$fila += 5;
			$columna = 0;
		}
	}
	$pdf->SetLineWidth(2);
	$columna += 10; $fila +=10;
	$pdf->SetFont('Helvetica','BI',15);
	$pdf->SetXY($columna,$fila);
	$pdf->Cell(0,40,'Esta promoción no tiene registros asociados todavía...!',1,1,'C');
	$fila += 43;
	$pdf->SetLineWidth(0.4);
	$pdf->Line(0,$fila,216,($fila+176));
	}
else {
	while ($rows = mysql_fetch_array($registros, MYSQL_ASSOC)) {
		if ( $promocion ) {
			$pdf->SetFont('Helvetica','I',10);
			$pdf->SetXY($columna,$fila);
			$pdf->Write(5,'Título Obtenido: ');
			$pdf->SetFont('Arial','BI',10);
			$pdf->Write(5,( is_null($rows['titulo']) || empty($rows['titulo']) ) ? 'S/Dato' : $rows['titulo']);
			$fila += 5;
			//----
			$pdf->SetFont('Helvetica','I',10);
			$pdf->SetXY($columna,$fila);
			$pdf->Write(5,'Fecha de Acto: ');
			$pdf->SetFont('Arial','BI',10);
			$pdf->Write(5,( is_null($rows['fecha']) || empty($rows['fecha']) ) ? 'S/Dato' : $rows['fecha']);
			//----
			$columna += 80;
			$pdf->SetFont('Helvetica','I',10);
			$pdf->SetXY($columna,$fila);
			$pdf->Write(5,'Integrante(s): ');
			$pdf->SetFont('Arial','BI',10);
			$pdf->Write(5,( is_null($rows['integrantes']) || empty($rows['integrantes']) ) ? 'S/Dato' : $rows['integrantes']);
			//----
			$columna += 80;
			$pdf->SetFont('Helvetica','I',10);
			$pdf->SetXY($columna,$fila);
			$pdf->Write(5,'Promedio: ');
			$pdf->SetFont('Arial','BI',10);
			$pdf->Write(5,( is_null($rows['ppromedio']) || empty($rows['ppromedio']) ) ? 'S/Dato' : $rows['ppromedio']);
			$promocion = false;
			$fila += 5;
			//----
			$pdf->SetLineWidth(0.4);
			$pdf->Line(0,$fila,216,$fila);
			$fila += 5;
			$columna = 0;
		}
		if ( $rotulo ) {
			$pdf->SetLineWidth(1);
			$pdf->Set2DrawColor(0, 0, 0, 50);
			$pdf->Set2FillColor(0, 0, 100, 0);
			$pdf->Set2TextColor(0, 0, 0, 100);
			$pdf->Rect(1, ($fila-4), 25, 5, 'DF');
			$pdf->Set2DrawColor(0, 0, 0, 100);
			$pdf->Text(8, $fila, 'Cédula');
			//----
			$pdf->Set2DrawColor(0, 0, 0, 50);
			$pdf->Rect(28, ($fila-4), 80, 5, 'DF');
			$pdf->Set2DrawColor(0, 0, 0, 100);
			$pdf->Text(55, $fila, 'Nombre(s)');
			//----
			$pdf->Set2DrawColor(0, 0, 0, 50);
			$pdf->Rect(110, ($fila-4), 25, 5, 'DF');
			$pdf->Set2DrawColor(0, 0, 0, 100);
			$pdf->Text(115, $fila, 'Promedio');
			//----
			$pdf->Set2DrawColor(0, 0, 0, 50);
			$pdf->Rect(137, ($fila-4), 25, 5, 'DF');
			$pdf->Set2DrawColor(0, 0, 0, 100);
			$pdf->Text(142, $fila, 'Posición');
			//----
			$pdf->Set2DrawColor(0, 0, 0, 50);
			$pdf->Rect(164, ($fila-4), 50, 5, 'DF');
			$pdf->Set2DrawColor(0, 0, 0, 100);
			$pdf->Text(172, $fila, 'Observación(es)');
			//----
			$pdf->Set2DrawColor(0, 0, 0, 100);
			$pdf->SetLineWidth(0.4);
			$pdf->Line(0,($fila+2),216,($fila+2));
			//----
			$rotulo = false;
			$fila += 2;
			$columna = 0;
		}
		$pdf->SetXY($columna,$fila);
		$pdf->Write(5,$rows['ci']);
		//----
		$columna += 27;
		$pdf->SetX($columna);
		$pdf->Write(5,$rows['nombre']);
		//----
		$columna += 88;
		$pdf->SetX($columna);
		$pdf->Write(5,$rows['ipromedio']);
		//----
		$columna += 30;
		$pdf->SetX($columna);
		$pdf->Write(5,$rows['posicion']);
		$pdf->SetLineWidth(0.4);
		//----
		$fila += 5;
		$pdf->Line(0,$fila,216,$fila);
		$columna = 0;
	}
}
$pdf->Output('reporte_de_promedios.pdf','I');
//$pdf->Output('reporte_de_promedios.pdf','D');
?>

<!--<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=latin1" />
<title>Documento sin título</title>
</head>

<body>
</body>
</html>-->