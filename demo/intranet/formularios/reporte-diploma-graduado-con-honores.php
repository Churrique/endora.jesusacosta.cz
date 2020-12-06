<?php
require_once('../funciones/valida-funciones.php');
require_once('../fpdf/fpdf.php');

//class PDF extends FPDF
//{
//	//--- funciones modificadas de pdf-cymk
//	function Set2DrawColor() {
//		//Set color for all stroking operations
//		switch(func_num_args()) {
//			case 1:
//				$g = func_get_arg(0);
//				$this->DrawColor = sprintf('%.3F G', $g / 100);
//				break;
//			case 3:
//				$r = func_get_arg(0);
//				$g = func_get_arg(1);
//				$b = func_get_arg(2);
//				$this->DrawColor = sprintf('%.3F %.3F %.3F RG', $r / 255, $g / 255, $b / 255);
//				break;
//			case 4:
//				$c = func_get_arg(0);
//				$m = func_get_arg(1);
//				$y = func_get_arg(2);
//				$k = func_get_arg(3);
//				$this->DrawColor = sprintf('%.3F %.3F %.3F %.3F K', $c / 100, $m / 100, $y / 100, $k / 100);
//				break;
//			default:
//				$this->DrawColor = '0 G';
//		}
//		if($this->page > 0)
//			$this->_out($this->DrawColor);
//	}
//	function Set2TextColor() {
//		//Set color for text
//		switch(func_num_args()) {
//			case 1:
//				$g = func_get_arg(0);
//				$this->TextColor = sprintf('%.3F g', $g / 100);
//				break;
//			case 3:
//				$r = func_get_arg(0);
//				$g = func_get_arg(1);
//				$b = func_get_arg(2);
//				$this->TextColor = sprintf('%.3F %.3F %.3F rg', $r / 255, $g / 255, $b / 255);
//				break;
//			case 4:
//				$c = func_get_arg(0);
//				$m = func_get_arg(1);
//				$y = func_get_arg(2);
//				$k = func_get_arg(3);
//				$this->TextColor = sprintf('%.3F %.3F %.3F %.3F k', $c / 100, $m / 100, $y / 100, $k / 100);
//				break;
//			default:
//				$this->TextColor = '0 g';
//		}
//		$this->ColorFlag = ($this->FillColor != $this->TextColor);
//	}
//	//--- FIN de funciones pdf-cymk
//}


$linea = 'En virtud de haber obtenido un promedio sobresaliente en los cursos que integran los estudios de Post-Grado como '.$_GET['titulo'].'.  Por lo cual lo hace acreedor del Premio Especial de Graduación';
//----
$linea_2 = 'Conforme a lo dispuesto en el Reglamento de Menciones Honoríficas aprobado por el Consejo Universitario. En Valencia, '.fecha(false).'.';
//----
$pos_X = 1;
$pos_Y = 90;
//----
$pdf = new FPDF('P','mm',array(310,310));
$pdf->SetMargins(1,1);
$pdf->AddFont('ArgorGotScaqh','','arggotsc.php');
$pdf->AddPage();
//----
$pdf->Image('../imagenes/diploma-argorgot.fw.png',60,1,200);
//----
$pdf->SetFont('ArgorGotScaqh','',18);
$pdf->Text($pos_X,$pos_Y,'Que se otorga al egresado:');
$pos_Y = $pos_Y + 16;
//----
$pdf->SetFont('ArgorGotScaqh','',38);
$pdf->SetXY($pos_X,$pos_Y);
$pdf->Cell(0,22,$_GET["nombre"],1,0,'C');
$pos_Y += 20;
//----
$pdf->SetFont('ArgorGotScaqh','',20);
$pdf->SetXY($pos_X,$pos_Y);
$pdf->Cell(0,15,'C.I.: '.$_GET["cedula"],1,0,'C');
$pos_Y = $pos_Y + 20;
//----
$pdf->SetXY($pos_X,$pos_Y);
$pdf->MultiCell(0,15,$linea,0,'J',false);
$pos_Y = $pos_Y + 130;
//----
$pdf->Image('../imagenes/graduado-con-honores-argorgot.fw.png',20,192,267,90);
//----
$pdf->SetXY($pos_X,$pos_Y);
$pdf->Write(15,$linea_2);
//----
$nombre_de_archivo = '../downloads/diplomas_generados/graduado_con_honores/'.$_GET['cedula'].'_F_'.date('Y-m-d').'_H_'.date('H-i-s').'.pdf';
$pdf->Output($nombre_de_archivo,'F');
$pdf->Output('diploma_GcH_'.$_GET["cedula"].'.pdf','I');
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