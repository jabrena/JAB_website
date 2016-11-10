<?
/**************************
***** HEADER FUNCTIONS *****
**************************/

function existDocument($IDDOCUMENT){
	$sql = "SELECT COUNT(*) AS CONTADOR ";
	$sql .= "FROM ewccc_documents WHERE IDDOCUMENT = " . $IDDOCUMENT . ";";

	mysql_connect(DB_HOST, DB_USER, DB_PASS) or die(mysql_error());
	mysql_select_db(DB_NAME) or die(mysql_error());
		
	$result = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_array($result);
	
	//echo($row["CONTADOR"]);
	
	if($row["CONTADOR"] != 0){
		return(true);
	}else{
		return(false);
	}
}

function isExtranetDocument($IDDOCUMENT){
	$IDPARENT = $IDDOCUMENT;
	while($IDPARENT != 2){
		$IDPARENT = getIdparent($IDPARENT);
		if($IDPARENT == 1){
			break;
		}
	}
	if($IDPARENT == 2){
		return true;
	}else{
		return false;
	}
}

function writeMetadata($IDDOCUMENT){

	$sql = "SELECT * ";
	$sql .= "FROM ewccc_metadata;";
	
	//echo $sql;
	
	mysql_connect(DB_HOST, DB_USER, DB_PASS) or die(mysql_error());
	mysql_select_db(DB_NAME) or die(mysql_error());

	$result = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_array($result);

	echo("\n		<!-- ESMETA METADATA SCRIPT 1.0 -->\n");
	echo("		<!-- TITLE -->\n");
	echo("		<title>" . $row["METADATA_TITLE"] . "</title>\n");
	echo("		<meta name='title' content='" . $row["METADATA_TITLE"] . "' />\n");
	echo("		<meta name='DC.Title' content='" . $row["METADATA_TITLE"] . "' />\n");
	echo("		<meta http-equiv='title' content='" . $row["METADATA_TITLE"] . "' />\n\n");
	
	echo("		<!-- KEYWORDS -->\n");
	echo("		<meta name='keywords' content='" . $row["METADATA_DESCRIPTION"] . "' />\n");
	echo("		<meta http-equiv='keywords' content='" . $row["METADATA_DESCRIPTION"] . "' />\n\n");
	
	echo("		<!-- DESCRIPCION -->\n");
	echo("		<meta name='description' content='" . $row["METADATA_KEYWORDS"] . "' />\n");
	echo("		<meta http-equiv='description' content='" . $row["METADATA_KEYWORDS"] . "' />\n");
	echo("		<meta http-equiv='DC.Description' content='" . $row["METADATA_KEYWORDS"] . "' />\n\n");
	
	//echo("		" . $row["METADATA_OTHERS"] ."\n\n");
	//echo("		" . $row["METADATA_ROBOTS"] ."\n\n");
	
	echo("		<!-- OTROS METADATOS -->\n");
	echo("		<meta name='VW96.objecttype' content='Document' />\n\n");

	echo("		<META NAME='DC.Language' SCHEME='RFC1766' CONTENT='Spanish' />\n");
	echo("		<meta name='distribution' content='global' />\n");
	echo("		<meta name='resource-type' content='document' />\n\n");

	echo("		<!-- SEARCH ENGINE -->\n");
	echo("		<meta name='robots' content='all' />\n\n");

	echo("		<!-- CACHE -->\n");
	echo("		<meta http-equiv='cache-control' content='no-cache' />\n");
	echo("		<meta http-equiv='pragma' content='no-cache' />\n\n");

	echo("		<meta http-equiv='expires' content='0' />\n\n");
	
	//echo("		<meta name='verify-v1' content='WIaS7oITIXqokH+Rg8hDQcTHJyriPqxFgOd9OAgT1lk=' />\n");	
};


/*************************
***** BODY FUNCTIONS *****
*************************/

/* LEVEL1 */
function getLevel1($IDDOCUMENT){
	$IDPARENT = $IDDOCUMENT;
	$IDPARENT_OLD = $IDPARENT;
	while($IDPARENT != 1){
		$IDPARENT = getIdparent($IDPARENT);
		if($IDPARENT == 1){
			return(getLevel2($IDPARENT_OLD));
		}else{
			$IDPARENT_OLD = $IDPARENT;
		}
	}
	;
}

function getIdparent($IDDOCUMENT){
	$sql = "SELECT IDPARENT ";
	$sql .= "FROM ewccc_documents WHERE IDDOCUMENT = " . $IDDOCUMENT . ";";
	
	//echo $sql;
	
	mysql_connect(DB_HOST, DB_USER, DB_PASS) or die(mysql_error());
	mysql_select_db(DB_NAME) or die(mysql_error());
		
	$result = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_array($result);
	return($row["IDPARENT"]);
}

function getLevel2($IDDOCUMENT){
	$sql = "SELECT TITLE ";
	$sql .= "FROM ewccc_documents WHERE IDDOCUMENT = " . $IDDOCUMENT;
	
	//echo $sql;
	
	mysql_connect(DB_HOST, DB_USER, DB_PASS) or die(mysql_error());
	mysql_select_db(DB_NAME) or die(mysql_error());
		
	$result = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_array($result);

	return($row["TITLE"]);
}



//Function to write
function writeNavigationSystem(){
	
	$sql = "SELECT IDDOCUMENT, TITLE ";
	$sql .= "FROM ewccc_documents WHERE IDPARENT = 1 ";
	$sql .= "ORDER BY NORDER DESC;";
		
	//echo $sql;
	
	mysql_connect(DB_HOST, DB_USER, DB_PASS) or die(mysql_error());
	mysql_select_db(DB_NAME) or die(mysql_error());
		
	$result = mysql_query($sql) or die(mysql_error());
	
	echo(			"<option value='@' >Go</option>");
	while( $row = mysql_fetch_array($result) ) {
		//. ${_SERVER["PHP_SELF"]} . 
		echo "			<option value=" . CMS_URL . "?id=" . $row["IDDOCUMENT"] .">" . $row["TITLE"]. "</option>\n";
	}
}

/* LEVEL 3 */
function getChildren($IDDOCUMENT){
	$sql = "SELECT IDDOCUMENT, TITLE ";
	$sql .= "FROM ewccc_documents WHERE IDPARENT = " . $IDDOCUMENT . " ORDER BY NORDER ASC,TITLE ASC;";
	
	//echo $sql;
	
	mysql_connect(DB_HOST, DB_USER, DB_PASS) or die(mysql_error());
	mysql_select_db(DB_NAME) or die(mysql_error());
		
	$result = mysql_query($sql) or die(mysql_error());
	$CONTADOR  = 0;
	while( $row = mysql_fetch_array($result) ) {
		//. ${_SERVER["PHP_SELF"]} . 
		echo "			+&nbsp;<a href='" . CMS_URL . "?id=" . $row["IDDOCUMENT"] ."' class='childrenContents'>" . $row["TITLE"]. "</a><br />\n";
		$CONTADOR++;
	}
	if($CONTADOR != 0){
		echo("<br />");
	}
}
function writeGoback($IDDOCUMENT){
	$IDPARENT = getIdparent($IDDOCUMENT);
	if($IDPARENT ==1){
		echo("<a href='" . HOME_URL . "' class='goBack'>Go back</a>");
	}else{
		echo("<a href='" . CMS_URL . "?id=" . $IDPARENT . "' class='goBack'>Go Back</a>");
	}
}

function getContent($IDDOCUMENT){
	$sql = "SELECT CONTENT ";
	$sql .= "FROM ewccc_documents WHERE IDDOCUMENT = " . $IDDOCUMENT . ";";
	
	//echo $sql;
	
	mysql_connect(DB_HOST, DB_USER, DB_PASS) or die(mysql_error());
	mysql_select_db(DB_NAME) or die(mysql_error());
		
	$result = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_array($result);
	return($row["CONTENT"]);
}

function writeParentDocuments(){
	
	$sql = "SELECT IDDOCUMENT, TITLE, IDPARENT ";
	$sql .= "FROM ewccc_documents ORDER BY IDPARENT, TITLE;";
	
	//echo $sql;
	
	mysql_connect(DB_HOST, DB_USER, DB_PASS) or die(mysql_error());
	mysql_select_db(DB_NAME) or die(mysql_error());
		
	$result = mysql_query($sql) or die(mysql_error());
		
	while( $row = mysql_fetch_array($result) ) {
		echo "			<option value=" . $row["IDDOCUMENT"] .">" . $row["TITLE"]. "</option>\n";
	}
}






?>