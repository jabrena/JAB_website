<?php 
//$pdf = $_GET['pdf'];
//$year = $_GET['year'];

$pdf = "LEJOS-EBOOK.pdf";
$year = "2009";

if(preg_match('/^[a-zA-Z0-9_\-]+.pdf$/', $pdf) == 0) {
 print "Illegal name: $pdf";
 return; 
} 

header('Content-type: application/pdf'); 
header('Content-disposition: Attachment; filename=' . $pdf); 

readfile('./docs/'. $year .'/' . $pdf);
//echo '/docs/'. $year .'/' . $pdf;
?>