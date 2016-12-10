<?
//Include Email Manager & Contact Email Template
//include("./EmailManager.php");
//include("./ContactEmailTemplate.php");
?>
<?
//Recepcion de variables via post
//$fullName = $_POST['fullName'];
$from = $_POST['email'];
//$comments = $_POST['comments'];
$seed = $_POST['seed'];
?>
<?
/*
echo $company . "\n";
echo $fullName . "\n";
echo $phone . "\n";
echo $emailFrom . "\n";
echo $comments . "\n";
*/
?>
<?
	function generateMessageID($prefix="40ftrq") {
	    $message_id = "<$prefix." 
	        . base_convert((double)microtime(), 10, 36) 
	        . "." . base_convert(time(), 10, 36) 
	        . "@" . $_SERVER['HTTP_HOST'] . ">";
	    return $message_id;
	}	

	//Funcion que genera las cabeceras del email
	function getEmailHeaders($from,$charset){
		$xtraheaders  = "";
		$headers ="";
		$headers  = "";
		$headers .= "From: {$from} \n";
		$headers .= "Date: " . date("r") . "\n";
		$headers .= "Message-ID: " . generateMessageID() . "\n";
		$headers .= "MIME-Version: 1.0\n";
		$headers .= "Content-type: text/html; charset=\"$charset\"\n";
		//$headers .= "Content-Type: text/plain; charset=\"$charset\"\n";
		$headers .= "Content-Transfer-Encoding: 8bit\n";
		$headers .= $xtraheaders;
		$headers .= "\n";
		
		return $headers;
	}
	
	function sendEmail($from,$to,$subject,$body){

		$charset = "UTF-8";
		$headers = getEmailHeaders($from,$charset);
		$returnSending = mail($to, $subject, $body, $headers);

		//echo "Email sent" . "\n";
		
		return $returnSending;
	}
?>
<?
$subject = "LeJOS Ebook Newsletter form";
$to = "tsp44@hotmail.com";

//1. Generación de template de envio de email
/*
$cetObj = new ContactEmailTemplate();
$body = $cetObj->getEmailTemplate($subject,$company,$fullName,$phone,$emailFrom,$comments);

//2. Gestion de clase de envio de email
$emObj = new EmailManager();
$emObj->setTo($emailTo);
$emObj->setFrom($emailFrom);
$emObj->setSubject($subject);
$emObj->setBody($body);
$emailResult = $emObj->sendEmail();
*/

/*
$subject = "Gracias por contactar con Todo Servicio Tecnico";
$body = $cetObj->getEmailTemplate2($subject);
$emObj->setTo($emailFrom);
$emObj->setFrom($emailTo);
$emObj->setSubject($subject);
$emObj->setBody($body);
$emailResult = $emObj->sendEmail();
*/
$emailResult = sendEmail($from,$to,$subject,$body);
?>
<?

//XML Output Generation
$process = "Envio de email de contacto a Esmeta";

if($emailResult == 1){
	echo "<esmeta>\n";
	echo "	<processId>" . $seed  . "</processId>\n";
	echo "	<process>" . $process . "</process>\n";
	echo "	<transaction>" . $emailResult . "</transaction>\n";
	echo "	<urlRedirect>" . "index.php" . "</urlRedirect>\n";
	echo "</esmeta>\n";
}else{
	echo "<esmeta>\n";
	echo "	<processId>" . $seed  . "</processId>\n";
	echo "	<process>" . $process . "</process>\n";
	echo "	<transaction>" . $emailResult . "</transaction>\n";
	echo "</esmeta>\n";
}
?>




