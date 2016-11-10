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
require("../../../config.php");

$USER 	= $HTTP_POST_VARS['USER'];

$sql = "SELECT * FROM ewccc_users WHERE USER='" .$USER . "'";
//echo $sql;

mysql_connect(DB_HOST, DB_USER, DB_PASS) or die(mysql_error());
mysql_select_db(DB_NAME) or die(mysql_error());
	
$result = mysql_query($sql) or die(mysql_error());

$CONTADOR = 0;
		
while( $row = mysql_fetch_array($result) ) {
	$CONTADOR++;
}

//echo $CONTADOR;

header("Content-type: application/xhtml+xml");

if($CONTADOR != 0){
	echo "<esmeta>\n";
	echo "	<transaction>0</transaction>\n";
	echo "</esmeta>";
}else{
	echo "<esmeta>\n";
	echo "	<transaction>1</transaction>\n";
	echo "</esmeta>";
}
?>
