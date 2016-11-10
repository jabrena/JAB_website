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
$IDUSER 	=  $HTTP_SESSION_VARS['authdata']['IDUSER'];
$IDDOCUMENT	= $HTTP_POST_VARS['IDDOCUMENT'];
$TITLE 	= addslashes($HTTP_POST_VARS['TITLE']);
$CONTENT = trim(addslashes($HTTP_POST_VARS['CONTENT'])); 
$IDPARENT	= $HTTP_POST_VARS['IDPARENT'];
$DESCRIPTION	= trim(addslashes($HTTP_POST_VARS['DESCRIPTION']));
$KEYWORDS	= addslashes($HTTP_POST_VARS['KEYWORDS']);


	$sql  = "UPDATE ewccc_documents SET TITLE = '" . $TITLE . "', ";
	$sql .= "CONTENT='" . $CONTENT ."' , IDPARENT ='" . $IDPARENT ."' , ";
	$sql .= "METADATA_DESCRIPTION='" . $DESCRIPTION ."' , ";
	$sql .= "METADATA_KEYWORDS='" . $KEYWORDS ."' , ";
	$sql .= "DOC_DATE = CURRENT_DATE() ";
	$sql .= "WHERE IDDOCUMENT = " . $IDDOCUMENT;




mysql_connect(DB_HOST, DB_USER, DB_PASS) or die(mysql_error());
mysql_select_db(DB_NAME) or die(mysql_error());
	
mysql_query($sql) or die(mysql_error());

//echo $sql;

//echo "<esmeta>\n";
//echo "	<transaction>1</transaction>\n";
//echo "</esmeta>";
echo "<script>document.location.href='../../../EWCCC_documentAdmin.php';</script>"
?>
