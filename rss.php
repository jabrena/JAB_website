<?
require("p_admin/ewccc/config.php");
?>
<?
	$sql = "SELECT * ";
	$sql .= "FROM ewccc_metadata;";
	
	//echo $sql;
	
	mysql_connect(DB_HOST, DB_USER, DB_PASS) or die(mysql_error());
	mysql_select_db(DB_NAME) or die(mysql_error());

	$result = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_array($result);


$db_campo_fecha = 'DOC_DATE'; 
$db_campo_titulo = 'TITLE'; 
$db_campo_texto = 'METADATA_DESCRIPTION'; 
$db_campo_url = 'IDDOCUMENT'; 
$pg_titulo = 'Juan Antonio Breña Moral, RSS Channel'; 
$pg_link = 'http://www.juanantonio.info';
$pg_descripcion = "" . $row["METADATA_KEYWORDS"] . "";
$pg_keywords = "" .$row["METADATA_DESCRIPTION"] . "";
//$pg_descripcion = 'Juan Antonio Breña Moral, JAB, Breña,Ingeniero en Organizacion Industrial, Organizacion Industrial, ICAI, ICADE, Universidad Pontificia de Comillas, Madrid, Cuenca, Marketing, R, Stat Engine, Desarrollo Web, Consultoria Web, XML, LAMP, J2EE, .NET, Data Mining, Mineria de Datos, Analisis de datos, SAS, SPSS, Web, Paginas web, Direccion de empresas, Industrial Organizational Engineering, Technical Computer Programming Engineering, Web Development, Consultant Services, Data Analysis, Analysis Services, Reporting Services, MDX, Olap Solutions, Olap Cubes'; 


$pg_idioma = 'en'; 
 
if ( isset ($_REQUEST['perPage']) ){ 
 $perPage = $_REQUEST['perPage']; 
} else { 
 $perPage = 10; 
} 
header("Content-type: text/xml;charset=iso-8859-1"); 
echo '<?xml version="1.0" encoding="iso-8859-1"?>'; 


?>

<rss version="2.0">
 
 <channel>
  
 <title><?=$pg_titulo?></title> 
 <link><?=$pg_link?></link> 
 <description><![CDATA['<?=$pg_descripcion?>']]></description> 
 <language><?=$pg_idioma?></language>
 <generator>Esmeta RSS Generator 1.0</generator>
 <category><![CDATA['<?=$pg_keywords?>']]></category>
<webMaster>bren@juanantonio.info</webMaster> 
<?	
	$sql  = "SELECT IDDOCUMENT,TITLE, METADATA_DESCRIPTION,CONTENT, DOC_DATE ";
	$sql .= "FROM ewccc_documents  ";
	$sql .= "WHERE IDDOCUMENT NOT IN (1,2,30) ";
	$sql .=	"ORDER BY DOC_DATE DESC, IDDOCUMENT DESC, IDPARENT ASC, TITLE ";
	 
	mysql_connect(DB_HOST, DB_USER, DB_PASS) or die(mysql_error());
	mysql_select_db(DB_NAME) or die(mysql_error());
		
	$result = mysql_query($sql) or die(mysql_error());
		
	while( $row = mysql_fetch_array($result) ) {
		 echo "\n"; 
		 echo " <item>\n"; 
	 
		 echo " <title><![CDATA[".$row[$db_campo_titulo]."]]></title>\n"; 
		 $desc = str_replace("\n",'',$row[$db_campo_texto]); 
		 $desc = str_replace("\r",'',$desc); 
		 $desc = substr($desc,0,230); 
		 $desc = htmlentities($desc); 
		 echo " <description><![CDATA[".$desc."]]></description>\n"; 
		 echo " <link>http://www.juanantonio.info/jab_cms.php?id=".$row['IDDOCUMENT']."</link>\n";
		 echo " <comments>http://www.juanantonio.info/jab_cms.php?id=".$row['IDDOCUMENT']."</comments>\n"; 

		echo "<pubDate>".$row[DOC_DATE]."</pubDate>";
		//echo "<category>CMS Content</category>";
		echo "<author>Juan Antonio Breña Moral</author>";
		 echo " </item>\n";
	}
?>
 </channel> 
</rss>
