<?
session_start();
require("../../../config.php");
require("../../esmeta/security/auth.php");

$auth = auth();

if ($auth == false){
	header ("Location: ../index.php");
}
?>
<?
$TITLE 	= addslashes($HTTP_POST_VARS['TITLE']);
$DESCRIPTION	= addslashes($HTTP_POST_VARS['DESCRIPTION']);
$KEYWORDS	= addslashes($HTTP_POST_VARS['KEYWORDS']);


	$sql  = "UPDATE ewccc_metadata SET METADATA_TITLE = '" . $TITLE . "', ";
	$sql .= "METADATA_DESCRIPTION='" . $DESCRIPTION ."' , ";
	$sql .= "METADATA_KEYWORDS='" . $KEYWORDS ."' ";


//echo $sql;

mysql_connect(DB_HOST, DB_USER, DB_PASS) or die(mysql_error());
mysql_select_db(DB_NAME) or die(mysql_error());
	
mysql_query($sql) or die(mysql_error());

echo "<esmeta>\n";
echo "	<transaction>1</transaction>\n";
echo "</esmeta>";
?>
