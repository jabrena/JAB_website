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
mysql_connect(DB_HOST, DB_USER, DB_PASS) or die(mysql_error());
mysql_select_db(DB_NAME) or die(mysql_error());

$sql = "SELECT * FROM ewccc_metadata";
//echo $sql;
$result = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_array($result);

header("Content-type: application/xhtml+xml");

echo "<esmeta>\n";
echo "	<transaction>1</transaction>\n";
echo "	<title>" . $row["METADATA_TITLE"] . "</title>\n";
echo "	<description>" . $row["METADATA_DESCRIPTION"] . "</description>\n";
echo "	<keywords>" . $row["METADATA_KEYWORDS"] . "</keywords>\n";
echo "</esmeta>";
?>
