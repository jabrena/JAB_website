<?
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>
<?

class EmailManager{

	function __construct( /*...*/ ) {

    } 

/*
    public function __construct() {

    }


	//Properties
	private $charset = "UTF-8";
	private $from = "";
	private $to = "";
	private $subject = "";
	private $body = "";

    public function setFrom( $strFrom){
        $this->from = $strFrom;
    }

    public function setTo( $strTo){
        $this->to = $strTo;
    }
	
    public function setSubject( $strSubject){
        $this->subject = $strSubject;
    }

    public function setBody( $strBody){
        $this->body = $strBody;
    }
	
	private function generateMessageID($prefix="40ftrq") {
	    $message_id = "<$prefix." 
	        . base_convert((double)microtime(), 10, 36) 
	        . "." . base_convert(time(), 10, 36) 
	        . "@" . $_SERVER['HTTP_HOST'] . ">";
	    return $message_id;
	}	

	//Funcion que genera las cabeceras del email
	private function getEmailHeaders($from,$charset){
		$xtraheaders  = "";
		$headers ="";
		$headers  = "";
		$headers .= "From: {$this->from} \n";
		$headers .= "Date: " . date("r") . "\n";
		$headers .= "Message-ID: " . $this->generateMessageID() . "\n";
		$headers .= "MIME-Version: 1.0\n";
		$headers .= "Content-type: text/html; charset=\"$charset\"\n";
		//$headers .= "Content-Type: text/plain; charset=\"$charset\"\n";
		$headers .= "Content-Transfer-Encoding: 8bit\n";
		$headers .= $xtraheaders;
		$headers .= "\n";
		
		return $headers;
	}
	
	public function sendEmail(){

		$headers = $this->getEmailHeaders($this->from,$this->charset);
		$returnSending = mail($this->to, $this->subject, $this->body, $headers);

		//echo "Email sent" . "\n";
		
		return $returnSending;
	}
	*/
}

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

echo "Testing Email Manager" . "\n";


$dObj = new EmailManager();
/*
$dObj->setTo("tsp44@hotmail.com");
$dObj->setFrom("bren@juanantonio.info");
$dObj->setSubject("Testing Email Manager");
$dObj->setBody("TEST DEMO");
echo $dObj->sendEmail();
*/
$from ="bren@juananotnio.info";
$to ="tsp44@hotmail.com";
$subject ="DEMO SUBJECT";
$body = "DEMO";
sendEmail($from,$to,$subject,$body);

echo "End Process" . "\n";

echo phpinfo();

?>