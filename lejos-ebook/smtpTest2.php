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
    $mail->From = "bren@juanantonio.info"; // here comes your email address in
    $mail->FromName = "El Divulgador cientifico";
    $mail->Host     = "mail.juanantonio.info"; // your SMTP Server
    $mail->Mailer   = "smtp"; // SMTP Method
    $mail->SMTPAuth = true;  // Auth Type
    $mail->Username = "bren@juanantonio.info";
    $mail->Password = "campeon";
    $mail->AddAddress($to, "");
    $mail->Subject = $subject;
    $mail->Body = $message;
    
    if(!$mail->Send())
        echo "There has been a mail error sending to ".$to." with Error: ".$mail->ErrorInfo;
    $mail->ClearAddresses();
//} 
?>
FIN
