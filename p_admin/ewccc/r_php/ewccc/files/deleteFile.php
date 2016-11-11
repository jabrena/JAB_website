<?
$path = $HTTP_POST_VARS["PATH"];
$file = $HTTP_POST_VARS["FILE"];
//echo $path;
//echo $file;
$fullPath = "../../../" . $path . "/" . $file;
echo $fullPath;
?>
<?
$fh = fopen($fullPath, 'w') or die("can't open file");
fclose($fh);
unlink($fullPath);
?>
<?
echo "<esmeta>\n";
echo "	<transaction>1</transaction>\n";
echo "</esmeta>";
?>