<?php
//************************
//Version 0.1 05-05-2009 *
//************************

session_start();
header( "Content-type: image/jpeg" );
$im = imagecreatetruecolor(192,45);

// Create some colors
//$black = imagecolorallocate($im, 0, 0, 0);
$white = imagecolorallocate($im, 255, 255, 255);
$red = imagecolorallocate($im, 254, 0, 0); 

imagefilledrectangle($im, 0, 0, 192,45,$white);

$text=$_SESSION['codigo_barra'];
//$text ='*12609131*';
// Replace path by your own font path
$font ='font/FRE3OF9X.TTF';

// Add the text
imagettftext($im, 37, 0, 5, 40, $black, $font, $text);

//imagettftext ( resource image, float size, float angle, int x, int y, int color, string fontfile, string text )


imagejpeg($im); 


  
?>