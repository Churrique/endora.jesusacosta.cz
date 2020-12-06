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
	  $this->Write(5,'Reporte de Devolución - Apoyo Logístico -  ');
	  $this->SetFont('Arial','I',10);
	  
	  if ($_POST['sol'] == 'S'){
	    $this->Write(5,'   Solventes');
		}
	  else {
        $this->Write(5,'   NO Solventes');	}
		
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
$registros = ConsulGenDCT(BASE_DE_DATOS,'detalle_chequeo_etyb','ind_solvencia',$_POST['sol']);
$rotulo = true;
$fila = 28;
$columna = 1;
if ( is_bool($registros) ) {   
	$pdf->SetLineWidth(2);
	$columna += 10; $fila +=10;
	$pdf->SetFont('Helvetica','BI',15);
	$pdf->SetXY($columna,$fila);
	$pdf->Cell(0,40,'No hay información en el Reporte...!',1,1,'C');
	$fila += 43;
	$pdf->SetLineWidth(0.4);
	$pdf->Line(0,$fila,216,($fila+176));
	}
else {
	while ($rows = mysql_fetch_array($registros, MYSQL_ASSOC)) {
		if ( $rotulo ) {		   
			$pdf->Text(40,  $fila,  'Cédula');
			$pdf->Text(60,  $fila,  'Apellidos y Nombres');
			$pdf->Text(120, $fila, 'Nro Graduación');
			$pdf->Text(150, $fila, 'Fecha Acto Grado');			
			$rotulo = false;
			$fila += 3;
		}
		$columna = 40;
		//----
		$pdf->Set2DrawColor(0, 0, 0, 0);
		$pdf->Set2FillColor(0, 0, 0, 0);
		$pdf->Set2DrawColor(0, 0, 0, 100);
		//----
		$pdf->SetXY($columna,$fila);
		//$pdf->SetX($columna);
		$pdf->Write(5,$rows['cedula']);
		//----
		$columna += 20;
		$pdf->SetX($columna);
		$pdf->Write(5,$rows['nombre_completo']);
		//----
		$columna += 70;
		$pdf->SetX($columna);
		$pdf->Write(5,$rows['nro_graduacion']);
		//----
		$columna += 20;
		$pdf->SetX($columna);
		$pdf->SetFont('Arial','I',8);
		$pdf->Write(5,$rows['fecha_acto_grado']);
		$pdf->SetFont('Arial','I',10);
		//----
		$fila += 5;		
	}
}
$pdf->Output('reporte_AP1.pdf','I');

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