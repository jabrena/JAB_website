<?
//tomo el valor de un elemento de tipo texto del formulario
//$cadenatexto = $_POST["cadenatexto"];
//echo "Escribi� en el campo de texto: " . $cadenatexto . "<br><br>";

//datos del arhivo
$nombre_archivo = $HTTP_POST_FILES['userfile']['name'];
$tipo_archivo = $HTTP_POST_FILES['userfile']['type'];
$tamano_archivo = $HTTP_POST_FILES['userfile']['size'];
//compruebo si las caracter�sticas del archivo son las que deseo
if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg")) && ($tamano_archivo < 100000))) {
    echo "La extensi�n o el tama�o de los archivos no es correcta. <br><br><table><tr><td><li>Se permiten archivos .gif o .jpg<br><li>se permiten archivos de 100 Kb m�ximo.</td></tr></table>";
}else{
    if (move_uploaded_file($HTTP_POST_FILES['userfile']['tmp_name'], $nombre_archivo)){
       echo "El archivo ha sido cargado correctamente.";
    }else{
       echo "Ocurri� alg�n error al subir el fichero. No pudo guardarse.";
    }
}
echo $nombre_archivo;
?>
<?php
$file = $nombre_archivo;//"02S2430WorkLounge.jpg";
$newfile = "../../../p_uploads/" .$nombre_archivo; //02S2430WorkLounge.jpg"; // . $nombre_archivo;

if (!copy($file, $newfile)) {
    echo "failed to copy $file...\n";
}else{
	echo "Archivo copiado";
}
?>
<?
$myFile = $nombre_archivo; //"02S2430WorkLounge.jpg";
$fh = fopen($myFile, 'w') or die("can't open file");
fclose($fh);
unlink($myFile);
?>
<a href="../EWCCC_fileManager.php">Ir al Gestor de ficheros</a>

