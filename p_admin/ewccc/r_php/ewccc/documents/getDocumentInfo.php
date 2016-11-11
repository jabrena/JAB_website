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
$IDDOCUMENT = $_POST['IDDOCUMENT'];

mysql_connect(DB_HOST, DB_USER, DB_PASS) or die(mysql_error());
mysql_select_db(DB_NAME) or die(mysql_error());

$sql = "SELECT * FROM ewccc_documents WHERE IDDOCUMENT=" . $IDDOCUMENT;
//echo $sql;
$result = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_array($result);

	echo "<esmeta>\n";
	echo "	<transaction>1</transaction>\n";
	echo "	<iddocument>" . $row["IDDOCUMENT"] . "</iddocument>\n";
	echo "	<idparent>" . $row["IDPARENT"] . "</idparent>\n";
	echo "	<idcreator>" . $row["IDCREATOR"] . "</idcreator>\n";
	echo "	<title>" . stripslashes($row["TITLE"]) . "</title>\n";
	echo "	<metadata_description>" . stripslashes($row["METADATA_DESCRIPTION"]) . "</metadata_description>\n";
	echo "	<metadata_keywords>" . stripslashes($row["METADATA_KEYWORDS"]) . "</metadata_keywords>\n";
	echo "	<content>" . stripslashes($row["CONTENT"]) . "</content>\n";
	echo "	<norder>" . $row["NORDER"] . "</norder>\n";
	echo "</esmeta>";

?>
