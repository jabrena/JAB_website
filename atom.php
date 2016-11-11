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

<feed xmlns="http://www.w3.org/2005/Atom">

   <updated>2007-03-27</updated>
  <author> 
    <name>Juan Antonio B. Moral</name>
  </author> 
 <title><?=$pg_titulo?></title> 
 <link><?=$pg_link?></link> 

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

		 echo " <entry>\n"; 
		 echo " <title><![CDATA['".$row[$db_campo_titulo]."']]></title>\n"; 
		 echo " <link>http://www.juanantonio.info/jab_cms.php?id=".$row['IDDOCUMENT']."</link>\n";
		echo "<id>".$row['IDDOCUMENT']."</id>\n";
		echo "<updated>".$row[DOC_DATE]."</updated>";
		 $desc = str_replace("\n",'',$row[$db_campo_texto]); 
		 $desc = str_replace("\r",'',$desc); 
		 $desc = substr($desc,0,230); 
		 $desc = htmlentities($desc);		
		 echo " <summary><![CDATA['".$desc."']]></summary>\n"; 
		 echo " </entry>\n";
	}
?>
</feed>
