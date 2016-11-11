<?php
$file = "02S2430WorkLounge.jpg";
$newfile = "../../../p_uploads/02S2430WorkLounge.jpg"; // . $nombre_archivo;

if (!copy($file, $newfile)) {
    echo "failed to copy $file...\n";
}else{
	echo "Archivo copiado";
}
?>
<?
$myFile = "02S2430WorkLounge.jpg";
$fh = fopen($myFile, 'w') or die("can't open file");
fclose($fh);
unlink($myFile);
?>