<?
require("p_admin/ewccc/config.php");
?>
<?
header("Content-type: text/xml;charset=iso-8859-1"); 
echo '<?xml version="1.0" encoding="iso-8859-1"?>'; 
?>

<urlset xmlns="http://www.google.com/schemas/sitemap/0.84"
	xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
	xsi:schemaLocation="http://www.google.com/schemas/sitemap/0.84
	http://www.google.com/schemas/sitemap/0.84/sitemap.xsd">
<?	
	$sql  = "SELECT IDDOCUMENT,TITLE, METADATA_DESCRIPTION,CONTENT, DOC_DATE ";
	$sql .= "FROM ewccc_documents  ";
	$sql .= "WHERE IDDOCUMENT NOT IN (1,2,30) ";
	$sql .=	"ORDER BY DOC_DATE DESC, IDPARENT ASC, TITLE ";
	 
	mysql_connect(DB_HOST, DB_USER, DB_PASS) or die(mysql_error());
	mysql_select_db(DB_NAME) or die(mysql_error());
		
	$result = mysql_query($sql) or die(mysql_error());
		
	while( $row = mysql_fetch_array($result) ) {
		 echo "\n";
		 
   		echo " <url>\n"; 
   		echo " <loc>http://www.juanantonio.info/jab_cms.php?id=".$row['IDDOCUMENT']."</loc>\n";
   		echo "<lastmod>".$row[DOC_DATE]."</lastmod>";
   		echo "<changefreq>weekly</changefreq>";
   		echo " </url>\n";
	}
?>
</urlset>
