<?
session_start();
require("../../../config.php");
require("../../esmeta/security/auth.php");

$auth = auth();

if ($auth == false){
	header ("Location: ../index.php");
}
?>
<?php

$PATH 	= $HTTP_POST_VARS['PATH'];
$FOLDER_NAME = $HTTP_POST_VARS['FOLDER']; 

//echo($PATH . "/". $FOLDER_NAME);

mkdir("../../../" . $PATH . "/". $FOLDER_NAME, 0777);

header("Content-type: application/xhtml+xml");

echo "<esmeta>\n";
echo "	<transaction>1</transaction>\n";
echo "	<path>" . $PATH . "</path>\n";
echo "</esmeta>";
?>
