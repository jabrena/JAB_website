<?
//Include Email Manager & Contact Email Template
include("./EmailManager.php");
include("./ContactEmailTemplate.php");
?>
<?
//Recepcion de variables via post
$fullName = $_POST['fullName'];
$emailFrom = $_POST['email'];
$comments = $_POST['comments'];
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
$company = "";
$phone = "";
$subject = "LeJOS Ebook Contact form";
$emailTo = "tsp44@hotmail.com";

//1. Generación de template de envio de email
$cetObj = new ContactEmailTemplate();
$body = $cetObj->getEmailTemplate($subject,$company,$fullName,$phone,$emailFrom,$comments);

//2. Gestion de clase de envio de email
$emObj = new EmailManager();
$emObj->setTo($emailTo);
$emObj->setFrom($emailFrom);
$emObj->setSubject($subject);
$emObj->setBody($body);
$emailResult = $emObj->sendEmail();

/*
$subject = "Gracias por contactar con Todo Servicio Tecnico";
$body = $cetObj->getEmailTemplate2($subject);
$emObj->setTo($emailFrom);
$emObj->setFrom($emailTo);
$emObj->setSubject($subject);
$emObj->setBody($body);
$emailResult = $emObj->sendEmail();
*/
?>
<?
//XML Output Generation
$process = "Envio de email de contacto a Esmeta";


if($emailResult == 1){
	echo "<esmeta>\n";
	echo "	<processId>" . $seed  . "</processId>\n";
	echo "	<process>" . $process . "</process>\n";
	echo "	<transaction>" . $emailResult . "</transaction>\n";
	echo "</esmeta>\n";
}else{
	echo "<esmeta>\n";
	echo "	<processId>" . $seed  . "</processId>\n";
	echo "	<process>" . $process . "</process>\n";
	echo "	<transaction>" . $emailResult . "</transaction>\n";
	echo "</esmeta>\n";
}
?>




