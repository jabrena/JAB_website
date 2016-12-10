<?
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>
<?

    require("./r_php/phpmailer/email/class.phpmailer.php");
    $mail = new PHPMailer();
    

	$subject = "Probando PHP Mailer con soporte SMTP";
	$message  ="Ay lo llevas chavalito! Me piro a casa";
	$to = "tsp44@hotmail.com";
    // Build e-mail
    $mail->From = "demo@esmeta.es"; // here comes your email address in
    $mail->FromName = "El Divulgador cientifico";
    $mail->Host     = "mail.esmeta.es"; // your SMTP Server
    $mail->Mailer   = "smtp"; // SMTP Method
    $mail->SMTPAuth = true;  // Auth Type
    $mail->Username = "demo@esmeta.es";
    $mail->Password = "123456";
    $mail->AddAddress($to, "");
    $mail->Subject = $subject;
    $mail->Body = $message;
    
    if(!$mail->Send())
        echo "There has been a mail error sending to ".$to." with Error: ".$mail->ErrorInfo;
    $mail->ClearAddresses();
//} 
?>
FIN
