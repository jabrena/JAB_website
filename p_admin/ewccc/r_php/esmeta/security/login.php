<?
require("../../../config.php");
require("auth.php");//Functions used in ERT

$IDUSER 	= $_POST['IDUSER'];
$PASSWORD = $_POST['PASSWORD']; 

header("Content-type: application/xhtml+xml");

if (auth($_POST['IDUSER'], $_POST['PASSWORD']) == true) {
	echo "<esmeta>\n";
	echo "	<transaction>1</transaction>\n";
	echo "	<url_redirect>EWCCC_panel.php</url_redirect>\n";
	echo "</esmeta>";
}else{
	echo "<esmeta>\n";
	echo "	<transaction>0</transaction>\n";
	echo "</esmeta>";
}
?>
