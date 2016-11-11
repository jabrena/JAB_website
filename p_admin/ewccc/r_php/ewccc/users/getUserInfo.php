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

$sql = "SELECT * FROM ewccc_users WHERE IDUSER=" . $IDUSER;
//echo $sql;
$result = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_array($result);

header("Content-type: application/xhtml+xml");

echo "<esmeta>\n";
echo "	<transaction>1</transaction>\n";
echo "	<iduser>" . $row["IDUSER"] . "</iduser>\n";
echo "	<user>" . $row["USER"] . "</user>\n";
echo "	<password>" . $row["PASSWORD"] . "</password>\n";
echo "	<first_name>" . $row["FIRST_NAME"] . "</first_name>\n";
echo "	<last_name>" . $row["LAST_NAME"] . "</last_name>\n";
echo "	<email>" . $row["EMAIL"] . "</email>\n";
echo "	<userlevel>" . $row["IDUSER_LEVEL"] . "</userlevel>\n";
echo "</esmeta>";
?>
