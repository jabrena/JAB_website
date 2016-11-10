<?
require("../../config.php");
require("auth.php");//Functions used in ERT

$IDUSER 	= $HTTP_POST_VARS['IDUSER'];
$PASSWORD = $HTTP_POST_VARS['PASSWORD']; 

header("Content-type: application/xhtml+xml");

if (auth($HTTP_POST_VARS['IDUSER'], $HTTP_POST_VARS['PASSWORD']) == true){
	

	echo "<esmeta>\n";
	echo "	<transaction>1</transaction>\n";
	echo "	<url_redirect>EWCCCPanel.php</url_redirect>\n";
	echo "</esmeta>";
}else{
	echo "<esmeta>\n";
	echo "	<transaction>0</transaction>\n";
	echo "</esmeta>";
}
?>
