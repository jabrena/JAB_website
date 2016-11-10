<?
session_start();
require("../../../config.php");
require("../../esmeta/security/auth.php");

$auth = auth();

if ($auth == false){
	header ("Location: ../index.php");
}
?>
<?
$IDDOCUMENT	= $HTTP_POST_VARS['IDDOCUMENT'];

/*
INSERT INTO tbl_temp2 (fld_id)
  SELECT tbl_temp1.fld_order_id
  FROM tbl_temp1 WHERE tbl_temp1.fld_order_id > 100;
  */
  
	$sql  = " INSERT INTO `ewccc_documents` ( `TITLE` , `CONTENT` , `IDPARENT` , `METADATA_DESCRIPTION` , `METADATA_KEYWORDS`, `IDCREATOR`,DOC_DATE) "; 
	$sql .= " SELECT `Copy_` + `TITLE`, `CONTENT`,`IDPARENT`,`METADATA_DESCRIPTION`,`METADATA_KEYWORDS`,`IDCREATOR`,`DOC_DATE` ";
	$sql .= " FROM `ewccc_documents` "; 
	$sql .= "WHERE IDDOCUMENT = " . $IDDOCUMENT;



echo $sql;

mysql_connect(DB_HOST, DB_USER, DB_PASS) or die(mysql_error());
mysql_select_db(DB_NAME) or die(mysql_error());
	
mysql_query($sql) or die(mysql_error());

echo "<esmeta>\n";
echo "	<transaction>1</transaction>\n";
echo "</esmeta>";
?>
