<?
/*
SCRIPT NAME: dbConnection.inc.php
DESCRIPTION:
Sistema de conexion centralizado
para toda operacion de bases de datos
AUTHOR: Juan Antonio Bre�a Moral
EMAIL: juanantonio.brena@esmeta.es
WEB: www.esmeta.es
*/
$conn = @mysql_connect("localhost", "ebookUser", "123456") or die("Could not connect: " . mysql_error());
@mysql_select_db("ebook");
//Permite guardar datos en UTF8
@mysql_query("SET NAMES 'utf8'");
//echo "conectado";
?>