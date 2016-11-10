<?php
function auth($login = '', $passwd = ''){
	session_start();
	//global $HTTP_SESSION_VARS;
	$authdata = $_SESSION['authdata'];
	
	if (!empty($login)){
		$username = $login;
		$pw = $passwd;
		$register = true;
	}elseif (!empty($authdata['USER'])){
		$username = $authdata['USER'];
		$pw = $authdata['PASSWORD'];
		$register = false;
	}else{
		$auth = 0;
	}
	
	if (!empty($username)) {
		mysql_connect(DB_HOST, DB_USER, DB_PASS) or die(mysql_error());
		mysql_select_db(DB_NAME) or die(mysql_error());
		
		$sql = "SELECT * FROM ewccc_users WHERE USER = '" . $username . "'";
		$result = mysql_query($sql) or die(mysql_error());
		$row = mysql_fetch_assoc($result);
		if ( $row["PASSWORD"] == $pw ) {
			if ($register) {
				$_SESSION['authdata'] = array('USER'=>$row['USER'], 'PASSWORD'=>$row['PASSWORD'], 'IDUSER'=>$row['IDUSER']);
			}
			$auth = 1;
		} else {
			unset($_SESSION['authdata']);
			$auth = 0;
		}
	}
   	return $auth;
}


function isExtranetUser($IDUSER){
	$sql = "SELECT IDUSER_LEVEL FROM ewccc_users WHERE IDUSER = " . $IDUSER . "'";
}
?>
