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
$IDUSER 	= $HTTP_POST_VARS['IDUSER'];
$USER 	= $HTTP_POST_VARS['USER'];
$PASSWORD = $HTTP_POST_VARS['PASSWORD']; 
$IDUSER_LEVEL = $HTTP_POST_VARS['IDUSER_LEVEL']; 
$FIRST_NAME	= $HTTP_POST_VARS['FIRST_NAME'];
$LAST_NAME	= $HTTP_POST_VARS['LAST_NAME'];
$EMAIL	= $HTTP_POST_VARS['EMAIL'];


	$sql  = "UPDATE ewccc_users SET PASSWORD = '" . $PASSWORD . "', IDUSER_LEVEL = " . $IDUSER_LEVEL . ", ";
	$sql .= "FIRST_NAME='" . $FIRST_NAME ."' , LAST_NAME='" . $LAST_NAME ."' , ";
	$sql .= "EMAIL='" . $EMAIL ."' ";
	$sql .= "WHERE IDUSER = " . $IDUSER;


//echo $sql;

mysql_connect(DB_HOST, DB_USER, DB_PASS) or die(mysql_error());
mysql_select_db(DB_NAME) or die(mysql_error());
	
mysql_query($sql) or die(mysql_error());

header("Content-type: application/xhtml+xml");

echo "<esmeta>\n";
echo "	<transaction>1</transaction>\n";
echo "</esmeta>";
?>
