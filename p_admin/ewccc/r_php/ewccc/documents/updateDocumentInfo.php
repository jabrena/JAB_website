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
$IDDOCUMENT	= $_POST['IDDOCUMENT'];
$TITLE 	= addslashes($_POST['TITLE']);
$CONTENT = addslashes($_POST['CONTENT']); 
$IDPARENT	= $_POST['IDPARENT'];
$DESCRIPTION	= addslashes($_POST['DESCRIPTION']);
$KEYWORDS	= addslashes($_POST['KEYWORDS']);
$NORDER	= $_POST['NORDER'];


	$sql  = "UPDATE ewccc_documents SET TITLE = '" . $TITLE . "', ";
	$sql .= "CONTENT='" . $CONTENT ."' , IDPARENT ='" . $IDPARENT ."' , ";
	$sql .= "METADATA_DESCRIPTION='" . $DESCRIPTION ."' , ";
	$sql .= "METADATA_KEYWORDS='" . $KEYWORDS ."' , ";
	$sql .= "DOC_DATE = CURRENT_DATE(), ";
	$sql .= "NORDER = " . $NORDER;
	
	$sql .= " WHERE IDDOCUMENT = " . $IDDOCUMENT;




mysql_connect(DB_HOST, DB_USER, DB_PASS) or die(mysql_error());
mysql_select_db(DB_NAME) or die(mysql_error());
	
mysql_query($sql) or die(mysql_error());

echo $sql;

echo "<esmeta>\n";
echo "	<transaction>1</transaction>\n";
echo "</esmeta>";
?>
