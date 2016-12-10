<?
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>
<?
//Include Email Manager & Contact Email Template
//include("EmailManager.php");
//include("./ContactEmailTemplate.php");
?>
<?
//Recepcion de variables via post
$from = $_POST['email'];
$seed = $_POST['seed'];
?>
<?
function existEmail($email){
	$idUser = -1;

	require("../../../dbConnection.inc.php");

	$SQL = "";
	$SQL .= "SELECT * ";
	$SQL .= "FROM  `users` c ";
	// Solo se muestran los activos
	$SQL .= "WHERE  email = '" . $email . "'; ";

	$result = mysql_query($SQL,$conn);
	$num_rows = mysql_num_rows($result);

	$row = mysql_fetch_array($result);

	if($num_rows > 0){
		$idUser = $row['iduser'];
	}

	//Close connection
	mysql_free_result($result);
	mysql_close($conn);

	return $idUser;
}

function getTime(){
	// Create the UNIX Timestamp, using the current system time
	$tUnixTime = time();
	// Convert that UNIX Timestamp into a string (GMT), safe for MySql
	$sGMTMySqlString = gmdate("Y-m-d H:i:s", $tUnixTime);
	//echo $sGMTMySqlString;
	// Create a String showing the DateTime in CCYY-MM-DD Format in a Specified Zone
	$fUTCOffset = 1.00; // GMT/UTC Offset in Hours (2.50 = 2 hours 30 minutes)
	//echo gmdate("Y-m-d H:i:s", $tUnixTime + $fUTCOffset * 3600);
	$time = gmdate("Y-m-d H:i:s", $tUnixTime + $fUTCOffset * 3600);
	//echo $time;
	
	return $time;
}

function addCustomer($email){
	require("../../../dbConnection.inc.php");

	$creationDate = getTime();
	$lastupdate = getTime();

	$SQL = "";
	$SQL .= "INSERT INTO `users` ( `iduser` , `email` , `status`, `creationdate` , `lastupdate` ) ";
	$SQL .= " VALUES (	NULL , '" .  $email . "', '1', '" . $creationDate . "', '" . $lastupdate . "'); ";
	//echo $SQL;

	$result = mysql_query($SQL,$conn);
	
	//Close connection
	//mysql_free_result($result);
	mysql_close($conn);

	return $result;
}
?>

<?
if(existEmail($from) == -1){
	$addResult = addCustomer($from);
	$emailResult = 1;	
}else{
	$emailResult = 1;	
}

?>

<?
//XML Output Generation
$process = "Envio de email de contacto a Esmeta";


if($emailResult == 1){
	echo "<esmeta>\n";
	echo "	<processId>" . $seed  . "</processId>\n";
	echo "	<process>" . $process . "</process>\n";
	echo "	<transaction>" . $emailResult . "</transaction>\n";
	echo "	<urlRedirect>" . "addReader.php" . "</urlRedirect>\n";
	echo "</esmeta>\n";
}else{
	echo "<esmeta>\n";
	echo "	<processId>" . $seed  . "</processId>\n";
	echo "	<process>" . $process . "</process>\n";
	echo "	<transaction>" . $emailResult . "</transaction>\n";
	echo "</esmeta>\n";
}
?>




