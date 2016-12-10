<?
/*
 * Created on 17/08/2009
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */

	$message  = "bla bla";
	$to = "tsp44@hotmail.com";
	$deliveryResult = sendEmailBySMTP($subject,$message,$to);
	echo $deliveryResult;
?>
<?

function sendEmailBySMTP($subject,$message,$to){
	$deliveryResult = 0;

	require_once('./r_php/phpmailer/email/class.phpmailer.php');

	$mail = new PHPMailer();

	// Build e-mail
	$mail->CharSet = 'utf-8';
	$mail->From = "bren@juanantonio.info"; // here comes your email address in
	$mail->FromName = "Informes";
	$mail->Host     = "mail.juanantonio.info"; // your SMTP Server
	$mail->Mailer   = "smtp"; // SMTP Method
	$mail->Username = "bren";
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
?>
