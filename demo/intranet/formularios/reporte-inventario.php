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
	  $this->Write(5,'Reporte de Inventario');
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
	  $this->Write(5,'Fecha: '.fecha(false));
	  $this->SetXY(180,-6);
	  $this->Write(5,'Página '.$this->PageNo().' de {nb}');
	  //con SetXY es hasta 202,Y
  }
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('P','Letter');
$registros = ConsulGenDCT('_vista_inventario_con_asociacion_con_rotulos_personalizados');
$rotulo = true;
$fila = 28;
$columna = 1;
if ( is_bool($registros) ) {
	$pdf->SetLineWidth(2);
	$columna += 10; $fila +=10;
	$pdf->SetFont('Helvetica','BI',15);
	$pdf->SetXY($columna,$fila);
	$pdf->Cell(0,40,'No hay información en el inventario todavía...!',1,1,'C');
	$fila += 43;
	$pdf->SetLineWidth(0.4);
	$pdf->Line(0,$fila,216,($fila+176));
	}
else {
	while ($rows = mysql_fetch_array($registros, MYSQL_ASSOC)) {
		if ( $rotulo ) {
			$pdf->SetLineWidth(1);
			$pdf->Set2DrawColor(0, 0, 0, 50);
			$pdf->Set2FillColor(0, 100, 100, 0);
			$pdf->Set2TextColor(0, 0, 0, 0);
			$pdf->Rect(1, ($fila-4), 15, 5, 'DF');
			$pdf->Set2DrawColor(0, 0, 0, 100);
			$pdf->SetFont('Arial','BI',10);
			$pdf->Text(3, $fila, 'Inv.');
			$pdf->SetFont('Arial','I',10);
			//----
			$pdf->Set2DrawColor(0, 0, 0, 50);
			$pdf->Set2FillColor(0, 0, 100, 0);
			$pdf->Set2TextColor(0, 0, 0, 100);
			$pdf->Rect(18, ($fila-4), 110, 5, 'DF');
			$pdf->Set2DrawColor(0, 0, 0, 100);
			$pdf->Text(63, $fila, 'Descripción');
			//----
			$pdf->Set2DrawColor(0, 0, 0, 50);
			$pdf->Rect(130, ($fila-4), 85, 5, 'DF');
			$pdf->Set2DrawColor(0, 0, 0, 100);
			$pdf->Text(160, $fila, 'Condición');
			//----
			$fila += 6.5;
			//----
			$pdf->Set2DrawColor(0, 0, 0, 50);
			$pdf->Set2FillColor(50, 0, 0, 0);
			$pdf->Rect(18, ($fila-4), 45, 5, 'DF');
			$pdf->Set2DrawColor(0, 0, 0, 100);
			$pdf->Text(37, $fila, 'Serial');
			//----
			$pdf->Set2DrawColor(0, 0, 0, 50);
			$pdf->Rect(65, ($fila-4), 35, 5, 'DF');
			$pdf->Set2DrawColor(0, 0, 0, 100);
			$pdf->Text(78, $fila, 'Marca');
			//----
			$pdf->Set2DrawColor(0, 0, 0, 50);
			$pdf->Rect(102, ($fila-4), 40, 5, 'DF');
			$pdf->Set2DrawColor(0, 0, 0, 100);
			$pdf->Text(116, $fila, 'Modelo');
			//----
			$pdf->Set2DrawColor(0, 0, 0, 50);
			$pdf->Rect(144, ($fila-4), 71, 5, 'DF');
			$pdf->Set2DrawColor(0, 0, 0, 100);
			$pdf->Text(156, $fila, 'Unidad - Operador');
			//----
			$fila += 6.5;
			//----
			$pdf->Set2DrawColor(0, 0, 0, 50);
			$pdf->Set2FillColor(50, 40, 0, 0);
			$pdf->Rect(18, ($fila-4), 197, 5, 'DF');
			$pdf->Set2DrawColor(0, 0, 0, 100);
			$pdf->Text(97, $fila, 'Observación');
			//----
			$pdf->Set2DrawColor(0, 0, 0, 100);
			$pdf->SetLineWidth(0.4);
			$pdf->Line(0,($fila+2),216,($fila+2));
			//----
			$rotulo = false;
			$fila += 2.5;
		}
		//----
		$pdf->Set2DrawColor(0, 0, 0, 0);
		$pdf->Set2FillColor(0, 100, 100, 0);
		$pdf->Rect($columna, $fila, 15, 5, 'DF');
		$pdf->Set2FillColor(0, 0, 0, 0);
		//----		
		$pdf->SetFont('Arial','BI',10);
		$pdf->SetXY($columna,$fila);
		$pdf->Set2TextColor(0, 0, 0, 0);
		$pdf->Write(5,$rows['nro_inv_uc']);
		$pdf->SetFont('Arial','I',10);
		//----
		$pdf->Set2FillColor(0, 0, 50, 0);
		$pdf->Rect(17, $fila, 198, 5, 'DF');
		$pdf->Set2FillColor(0, 0, 0, 0);
		$pdf->Set2TextColor(0, 0, 0, 100);
		//----
		$columna += 16;
		$pdf->SetX($columna);
		$pdf->Write(5,$rows['descripcion']);
		//----
		$columna += 113;
		$pdf->SetX($columna);
		$pdf->Write(5,$rows['condicion']);
		//----
		$fila += 5;
		$columna = 17;
		//----
		$pdf->Set2DrawColor(0, 0, 0, 0);
		$pdf->Set2FillColor(50, 0, 0, 0);
		$pdf->Rect($columna, $fila, 198, 5, 'DF');
		$pdf->Set2FillColor(0, 0, 0, 0);
		$pdf->Set2DrawColor(0, 0, 0, 100);
		//----
		$pdf->SetXY($columna,$fila);
		$pdf->Write(5,$rows['serial']);
		//----
		$columna += 48;
		$pdf->SetX($columna);
		$pdf->Write(5,$rows['marca']);
		//----
		$columna += 37;
		$pdf->SetX($columna);
		$pdf->Write(5,$rows['modelo']);
		//----
		$columna += 42;
		$pdf->SetX($columna);
		$pdf->SetFont('Arial','I',8);
		$pdf->Write(5,$rows['unidad'].' - '.$rows['nombre']);
		$pdf->SetFont('Arial','I',10);
		//----
		$fila += 5;
		$columna = 17;
		//----
		$pdf->Set2DrawColor(0, 0, 0, 0);
		$pdf->Set2FillColor(50, 40, 0, 0);
		$pdf->Rect($columna, $fila, 198, 5, 'DF');
		$pdf->Set2FillColor(0, 0, 0, 0);
		$pdf->Set2DrawColor(0, 0, 0, 100);
		//----
		$pdf->SetXY($columna,$fila);
		$pdf->Write(5,$rows['observacion']);
		//----
		$fila += 5;
		$pdf->SetLineWidth(0.4);
		$pdf->Line(0,$fila,216,$fila);
		$columna = 1;
		$fila += 0.5;
	}
}
$pdf->Output('reporte_de_inventario.pdf','I');
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