<?
session_start();
require("config.php");//EWCCC Configuration
require("r_php/esmeta/security/auth.php");//Functions used in EWCCC

$auth = auth();

if ($auth == false){
	header ("Location: index.php");
}
?>
