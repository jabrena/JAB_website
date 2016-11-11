<?php
//Recepcion de variables via post
$EMAIL = $_POST['email'];
$FIRSTNAME = $_POST['firstName'];
$LASTNAME = $_POST['lastName'];
$COUNTRY = $_POST['country'];
$TEXTO = $_POST['comment'];


$TEXTO_EMAIL ="";

$TEXTO_EMAIL .= "<html>";
$TEXTO_EMAIL .= "<head>";
$TEXTO_EMAIL .= "<title>Esmeta Email 1.0</title>";
$TEXTO_EMAIL .= "<meta http-equiv=\"\" content=\"text/html; charset=iso-8859-1\">";
$TEXTO_EMAIL .= "</head>";
$TEXTO_EMAIL .= "<body>";

$TEXTO_EMAIL .= "<h1>Request</h1>";
$TEXTO_EMAIL .= "<table>";
$TEXTO_EMAIL .= "<tr><td><b>First name:</b> " . $FIRSTNAME . "</td></tr>\n";
$TEXTO_EMAIL .= "<tr><td><b>Last name:</b> " . $LASTNAME . "</td></tr>\n";
$TEXTO_EMAIL .= "<tr><td><b>Country:</b> " . $COUNTRY . "</td></tr>\n";
$TEXTO_EMAIL .= "<tr><td><b>Email:</b> " . $EMAIL . "</td></tr>\n";
$TEXTO_EMAIL .= "<tr><td><b>Comments:</b> " . $TEXTO . "</td></tr>\n";
$TEXTO_EMAIL .= "</table>";
$TEXTO_EMAIL .= "</body>";
$TEXTO_EMAIL .= "</html>";

$to = "bren@juanantonio.info";
$subject = "Formulario de contacto www.juanantonio.info";

$body = $TEXTO_EMAIL;
$headers  = "MIME-Version: 1.0\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\n";
$headers .= "From: bren@juanantonio.info\r\n";
$headers .= "X-Mailer: php";
    
if (mail($to, $subject, $body, $headers)) {
	echo("<script>alert('Your request has been sent.');</script>");
	echo("<script>document.location.href='http://www.juanantonio.info/';</script>");
} else {
	echo("<p>Message delivery failed...</p>");
}
?>




