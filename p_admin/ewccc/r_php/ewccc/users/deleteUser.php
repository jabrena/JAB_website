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
$IDUSER = $HTTP_POST_VARS['IDUSER'];

mysql_connect(DB_HOST, DB_USER, DB_PASS) or die(mysql_error());
mysql_select_db(DB_NAME) or die(mysql_error());

$sql = "DELETE FROM ewccc_users WHERE IDUSER=" . $IDUSER;
//echo $sql;

$result = mysql_query($sql) or die(mysql_error());
//$row = mysql_fetch_array($result);


header("Content-type: application/xhtml+xml");

echo "<esmeta>\n";
echo "	<transaction>1</transaction>\n";
echo "</esmeta>";
?>
