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
//Email Functions
function sendEmailBySMTP($subject,$message,$to){
	$deliveryResult = 0;

	require_once('../../phpmailer/email/class.phpmailer.php');

	$mail = new PHPMailer();

	// Build e-mail
	$mail->CharSet = 'utf-8';
	$mail->From = "bren@juanantonio.info"; // here comes your email address in
	$mail->FromName = "Juan Antonio Breña Moral";
	$mail->Host     = "mail.juanantonio.info"; // your SMTP Server
	$mail->Mailer   = "smtp"; // SMTP Method
	$mail->Username = "bren@juanantonio.info";
	$mail->Password = "campeon";
	$mail->SMTPAuth = true;  // Auth Type
	$mail->Port       = 25;
	//$mail->SMTPDebug  = 2;  

	$mail->AddAddress($to, "");
	$mail->Subject = $subject;
	$mail->MsgHTML($message);

	//Envio del informe
	//$mail->AddAttachment("../docs/report1/2009/5/PR_80211_20090430.PDF");      // attachment

	if(!$mail->Send()){
		echo "There has been a mail error sending to ".$to." with Error: ".$mail->ErrorInfo;
		$mail->ClearAddresses();
	}else{
		$deliveryResult = 1;
	}

	return $deliveryResult;
}

function getTemplate1(){

	$TEXTO = "";
	$TEXTO .= "<p>Dear Reader,\n\n</p>";
	$TEXTO .= "<p>";
	$TEXTO .= "Many thanks for download this eBook about leJOS Project. ";
	$TEXTO .= "</p>\n\n";
	$TEXTO .= "<p>";
 	$TEXTO .= "I would like to receive your comments, critics and ideas to improve this ebook.<br />\n";
 	$TEXTO .= "When I update the ebook, I will notify the new release. \n\n";
	$TEXTO .= "</p>";
	$TEXTO .= "<p>";
	$TEXTO .= "Cheers.";
	$TEXTO .= "</p>\n\n";	
	$TEXTO .= "<p>";
	$TEXTO .= "<b>Juan Antonio Breña Moral</b><br/>\n";
	$TEXTO .= "Email: bren@juanantonio.info<br />\n";
	$TEXTO .= "Skype: juanantoniobm<br />\n";
	$TEXTO .= "Web:   www.juanantonio.info<br />\n";
	$TEXTO .= "</p>";

	return $TEXTO;
}
?>
<?
if(existEmail($from) == -1){
	$addResult = addCustomer($from);
	
	$subject = "Welcome to LeJOS-Ebook download Service";
	$message  = getTemplate1();
	$to = $from;
	$deliveryResult = sendEmailBySMTP($subject,$message,$to);
	$emailResult = $deliveryResult;
}else{
	$emailResult = 1;	
}

//Enviar Log
$subject = "[lejos-ebook] Alguien se ha bajado el ebook";
$message  = "";
$to = "bren@juanantonio.info";
$deliveryResult = sendEmailBySMTP($subject,$message,$to);
?>

<?
//XML Output Generation
$process = "Envio de email de contacto a Esmeta";


if($emailResult == 1){
	echo "<esmeta>\n";
	echo "	<processId>" . $seed  . "</processId>\n";
	echo "	<process>" . $process . "</process>\n";
	echo "	<transaction>" . $emailResult . "</transaction>\n";
	echo "	<urlRedirect>" . "downloadEbook.php" . "</urlRedirect>\n";
	echo "</esmeta>\n";
}else{
	echo "<esmeta>\n";
	echo "	<processId>" . $seed  . "</processId>\n";
	echo "	<process>" . $process . "</process>\n";
	echo "	<transaction>" . $emailResult . "</transaction>\n";
	echo "</esmeta>\n";
}
?>




