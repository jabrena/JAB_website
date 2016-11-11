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
$IDUSER 	=  $_SESSION['authdata']['IDUSER'];
$TITLE 	= addslashes($_POST['TITLE']);
$CONTENT = addslashes($_POST['CONTENT']); 
$IDPARENT	= $_POST['IDPARENT'];
$DESCRIPTION	= addslashes($_POST['DESCRIPTION']);
$KEYWORDS	= addslashes($_POST['KEYWORDS']);
$NORDER	= $_POST['NORDER'];

$sql = "INSERT INTO `ewccc_documents` ( `TITLE` , `CONTENT` , `IDPARENT` , `METADATA_DESCRIPTION` , `METADATA_KEYWORDS`, `IDCREATOR`,DOC_DATE,NORDER) "; 
$sql .= "VALUES ('" . $TITLE . "', '" . $CONTENT . "'," . $IDPARENT . ", '" . $DESCRIPTION . "' ,'" . $KEYWORDS . "'," . $IDUSER . ",CURRENT_DATE()," . $NORDER .")";

//echo $sql;

mysql_connect(DB_HOST, DB_USER, DB_PASS) or die(mysql_error());
mysql_select_db(DB_NAME) or die(mysql_error());
	
mysql_query($sql) or die(mysql_error());

echo "<esmeta>\n";
echo "	<transaction>1</transaction>\n";
echo "</esmeta>";
?>
