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
$IDDOCUMENT = $HTTP_POST_VARS['IDDOCUMENT'];
$IDUSER = $HTTP_POST_VARS['IDUSER'];

if($IDDOCUMENT == '-1'){
	//Se borra el registro de relacion.
	$sql = "DELETE FROM `ewccc_extranet_users_documents` WHERE IDUSER=" . $IDUSER;

	//echo $sql;

	mysql_connect(DB_HOST, DB_USER, DB_PASS) or die(mysql_error());
	mysql_select_db(DB_NAME) or die(mysql_error());
		
	mysql_query($sql) or die(mysql_error());
}else{
	$sql = "DELETE FROM `ewccc_extranet_users_documents` WHERE IDUSER=" . $IDUSER;

	//echo $sql;

	mysql_connect(DB_HOST, DB_USER, DB_PASS) or die(mysql_error());
	mysql_select_db(DB_NAME) or die(mysql_error());
		
	mysql_query($sql) or die(mysql_error());

	$sql = "INSERT INTO `ewccc_extranet_users_documents` VALUES (". $IDUSER ."," . $IDDOCUMENT .");";

	//echo $sql;

	mysql_connect(DB_HOST, DB_USER, DB_PASS) or die(mysql_error());
	mysql_select_db(DB_NAME) or die(mysql_error());
		
	mysql_query($sql) or die(mysql_error());	
}

header("Content-type: application/xhtml+xml");

echo "<esmeta>\n";
echo "	<transaction>1</transaction>\n";
echo "</esmeta>";
?>
