<?
	//Destruir los ficheros temporales de la carpeta del usuario

	session_start();
	session_destroy();
	header ("Location: ../../../index.php");
?>
