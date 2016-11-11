<?
/**************************
***** EWCCC FUNCTIONS *****
**************************/

function writeUserTableList(){
	echo "		<table cellpadding=\"0\" cellspacing=\"0\">\n";
	echo "			<tr>\n";
	echo "				<td class=\"EWCCC_TABLE_HEADER\">#</td>\n";
	echo "				<td class=\"EWCCC_TABLE_HEADER\">User</td>\n";
	echo "				<td class=\"EWCCC_TABLE_HEADER\">Password</td>\n";
	echo "				<td class=\"EWCCC_TABLE_HEADER\">Email</td>\n";
	echo "				<td class=\"EWCCC_TABLE_HEADER\">User Level</td>\n";
	echo "				<td class=\"EWCCC_TABLE_HEADER\" colspan='2'>Options</td>\n";
	echo "			</tr>\n";

//Show the reports

	$sql = "SELECT U.IDUSER,U.USER,U.EMAIL,UL.USER_LEVEL FROM ewccc_users U, ewccc_user_levels UL ";
	$sql .= "WHERE U.IDUSER_LEVEL= UL.IDUSER_LEVEL ";
	$sql .= "ORDER BY U.IDUSER ASC";
	//echo $sql;
	
	mysql_connect(DB_HOST, DB_USER, DB_PASS) or die(mysql_error());
	mysql_select_db(DB_NAME) or die(mysql_error());
		
	$result = mysql_query($sql) or die(mysql_error());
		
	while( $row = mysql_fetch_array($result) ) {
		echo "			<tr>\n";
		echo "				<td valign=\"top\" class='EWCCC_TABLE_ROW'>" . $row["IDUSER"]. "</td>\n";
		echo "				<td valign=\"top\" class='EWCCC_TABLE_ROW'>" . $row["USER"] . "</td>\n";
		echo "				<td valign=\"top\" class='EWCCC_TABLE_ROW'>********</td>\n";
		echo "				<td valign=\"top\" class='EWCCC_TABLE_ROW'><a href='mailto:" . $row["EMAIL"] ."' />" . $row["EMAIL"] . "</a></td>\n";
		echo "				<td valign=\"top\" class='EWCCC_TABLE_ROW'>" . $row["USER_LEVEL"] . "</td>\n";
		echo "				<td valign=\"top\" class='EWCCC_TABLE_ROW'>\n";
		echo "					<a href='javascript:WPCObject.updateUserInfo(" . $row["IDUSER"] . ")'><img src='r_media/images/icons/b_edit.png' /></a>\n";
		echo "					<a href=\"javascript:WPCObject.deleteUser(" . $row["IDUSER"] .")\" ><img src='r_media/images/icons/b_drop.png' /><a>\n";
		echo "				</td>\n";
		echo "				<td><img id=\"INDICATOR_" . $row["IDUSER"] . "\" src=\"r_media/images/indicator.gif\" style=\"display: none;\"/></td>\n";
		echo "			<tr>\n";
	}

	echo "</table>\n";	
}

function writeExtranetUserTableList(){
	echo "		<table cellpadding=\"0\" cellspacing=\"0\">\n";
	echo "			<tr>\n";
	echo "				<td class=\"EWCCC_TABLE_HEADER\">#</td>\n";
	echo "				<td class=\"EWCCC_TABLE_HEADER\">User</td>\n";
	echo "				<td class=\"EWCCC_TABLE_HEADER\">Email</td>\n";
	echo "				<td class=\"EWCCC_TABLE_HEADER\">User Level</td>\n";
	echo "				<td class=\"EWCCC_TABLE_HEADER\">Extranet document</td>\n";
	echo "				<td class=\"EWCCC_TABLE_HEADER\" colspan='2'>Options</td>\n";
	echo "			</tr>\n";

//Show the reports

	$sql = "SELECT U.IDUSER,U.USER,U.EMAIL,UL.USER_LEVEL FROM ewccc_users U, ewccc_user_levels UL ";
	$sql .= "WHERE U.IDUSER_LEVEL= UL.IDUSER_LEVEL AND U.IDUSER_LEVEL = 3 ";
	$sql .= "ORDER BY U.IDUSER ASC";
	//echo $sql;
	
	mysql_connect(DB_HOST, DB_USER, DB_PASS) or die(mysql_error());
	mysql_select_db(DB_NAME) or die(mysql_error());
		
	$result = mysql_query($sql) or die(mysql_error());
		
	while( $row = mysql_fetch_array($result) ) {
		echo "			<tr>\n";
		echo "				<td valign=\"top\" class='EWCCC_TABLE_ROW'>" . $row["IDUSER"]. "</td>\n";
		echo "				<td valign=\"top\" class='EWCCC_TABLE_ROW'>" . $row["USER"] . "</td>\n";
		echo "				<td valign=\"top\" class='EWCCC_TABLE_ROW'><a href='mailto:" . $row["EMAIL"] ."' />" . $row["EMAIL"] . "</a></td>\n";
		echo "				<td valign=\"top\" class='EWCCC_TABLE_ROW'>" . $row["USER_LEVEL"] . "</td>\n";
		echo "				<td valign=\"top\" class='EWCCC_TABLE_ROW'>" . getExtranetDocument($row["IDUSER"]) . "</td>\n";
		echo "				<td valign=\"top\" class='EWCCC_TABLE_ROW'>\n";
		echo "					<a href='javascript:WPCObject.getExtranetInfo(" . $row["IDUSER"] . ")'><img src='r_media/images/icons/b_edit.png' /></a>\n";
		echo "				</td>\n";
		echo "				<td><img id=\"INDICATOR_" . $row["IDUSER"] . "\" src=\"r_media/images/indicator.gif\" style=\"display: none;\"/></td>\n";
		echo "			<tr>\n";
	}

	echo "</table>\n";	
}

function getExtranetDocument($IDUSER){
	$sql  = "SELECT D.TITLE ";
	$sql .= "FROM ewccc_extranet_users_documents EUD, ewccc_documents D ";
	$sql .=	"WHERE EUD.IDUSER =" . $IDUSER . " AND ";
	$sql .=	"EUD.IDDOCUMENT = D.IDDOCUMENT;";	

	//echo $sql;
	
	mysql_connect(DB_HOST, DB_USER, DB_PASS) or die(mysql_error());
	mysql_select_db(DB_NAME) or die(mysql_error());
		
	$result = mysql_query($sql) or die(mysql_error());

	$COUNT = 0;
	$TITLE = '';
	
	while( $row = mysql_fetch_array($result) ) {
		$COUNT++;
		$TITLE = $row["TITLE"];
		//echo($TITLE);
	}
	
	if($COUNT == 0){
		return("Not edited");
	}else{
		return ($TITLE);
	}
}

function writeDocumentTableList(){
	echo "		<table cellpadding=\"0\" cellspacing=\"0\">\n";
	echo "			<tr>\n";
	echo "				<td class=\"EWCCC_TABLE_HEADER\">#</td>\n";
	echo "				<td class=\"EWCCC_TABLE_HEADER\">Title</td>\n";
	echo "				<td class=\"EWCCC_TABLE_HEADER\">Parent</td>\n";
	echo "				<td class=\"EWCCC_TABLE_HEADER\">Order</td>\n";
	echo "				<td class=\"EWCCC_TABLE_HEADER\">Date</td>\n";	
	echo "				<td class=\"EWCCC_TABLE_HEADER\" colspan='2'>Options</td>\n";
	echo "			</tr>\n";

//Show the reports

	$sql  = "SELECT IDDOCUMENT, TITLE, IDPARENT, DOC_DATE, NORDER ";
	$sql .= "FROM ewccc_documents ";
	$sql .=	"WHERE IDDOCUMENT NOT IN (1,2) ";
	
	//$IDPARENT = $HTTP_GET_VARS['IDPARENT'];
	$IDPARENT = $_GET['IDPARENT'];

	if($IDPARENT != ""){
		$sql .=	" AND IDPARENT =" . $IDPARENT;
	}
	
	$sql .=	" ORDER BY DOC_DATE DESC, NORDER ASC, IDPARENT ASC, TITLE ";


	// $sql;
	
	mysql_connect(DB_HOST, DB_USER, DB_PASS) or die(mysql_error());
	mysql_select_db(DB_NAME) or die(mysql_error());
		
	$result = mysql_query($sql) or die(mysql_error());

if($IDPARENT == ""){
	//SHOW ROOT
	echo "			<tr>\n";
	echo "				<td valign=\"top\" class='EWCCC_TABLE_ROW'><a href='#'>1</a></td>\n";
	echo "				<td valign=\"top\" class='EWCCC_TABLE_ROW'><a href='#'>ROOT</a></td>\n";
	echo "				<td valign=\"top\" class='EWCCC_TABLE_ROW'>-</td>\n";
	echo "				<td valign=\"top\" class='EWCCC_TABLE_ROW'>-</td>\n";
	//echo "				<td valign=\"top\" class='EWCCC_TABLE_ROW'>" . $row["USER_LEVEL"] . "</td>\n";
	echo "				<td valign=\"top\" class='EWCCC_TABLE_ROW'>-</td>\n";
	echo "				<td valign=\"top\" class='EWCCC_TABLE_ROW'>\n";
	echo "					<a href='http://www.juanantonio.info/' target='_blank'><img src='r_media/images/icons/eye.jpg' /></a>\n";
	echo "					<a href='#'><img src='r_media/images/icons/b_edit.png' /></a>\n";
	echo "					<a href='#'><img src='r_media/images/icons/tinymce.gif' /></a>\n";
	echo "					<a href='#'><img src='r_media/images/icons/copy_icon.gif' /></a>\n";
	echo "					<a href=\"#\" ><img src='r_media/images/icons/b_drop.png' /><a>\n";
	echo "					<a href=\"javascript:WPCObject.showChildren(1)\" ><img src='r_media/images/icons/down.png' /><a>\n";
	echo "				</td>\n";
	echo "				<td><img id=\"INDICATOR_" . $row["IDDOCUMENT"] . "\" src=\"r_media/images/indicator.gif\" style=\"display: none;\"/></td>\n";
	echo "			<tr>\n";
}
	
	while( $row = mysql_fetch_array($result) ) {
		echo "			<tr>\n";
		echo "				<td valign=\"top\" class='EWCCC_TABLE_ROW'><a href='javascript:WPCObject.updateDocumentInfo(" . $row["IDDOCUMENT"] . ")'>" . $row["IDDOCUMENT"]. "</a></td>\n";
		echo "				<td valign=\"top\" class='EWCCC_TABLE_ROW'><a href='javascript:WPCObject.updateDocumentInfo(" . $row["IDDOCUMENT"] . ")'>" . stripslashes($row["TITLE"]) . "</a></td>\n";
		echo "				<td valign=\"top\" class='EWCCC_TABLE_ROW'>" . getTitle($row["IDPARENT"]) . "</td>\n";
		echo "				<td valign=\"top\" class='EWCCC_TABLE_ROW'>" . $row["NORDER"] . "</td>\n";
		//echo "				<td valign=\"top\" class='EWCCC_TABLE_ROW'>" . $row["USER_LEVEL"] . "</td>\n";
		echo "				<td valign=\"top\" class='EWCCC_TABLE_ROW'>" . $row["DOC_DATE"] . "</td>\n";
		echo "				<td valign=\"top\" class='EWCCC_TABLE_ROW'>\n";
		echo "					<a href='http://www.juanantonio.info/jab_cms.php?id=" . $row["IDDOCUMENT"] . "' target='_blank'><img src='r_media/images/icons/eye.jpg' /></a>\n";
		echo "					<a href='javascript:WPCObject.updateDocumentInfo(" . $row["IDDOCUMENT"] . ")'><img src='r_media/images/icons/b_edit.png' /></a>\n";
		echo "					<a href='updateContent.php?id=" . $row["IDDOCUMENT"] . "'><img src='r_media/images/icons/tinymce.gif' /></a>\n";
		echo "					<a href='javascript:WPCObject.copyDocument(" . $row["IDDOCUMENT"] . ")'><img src='r_media/images/icons/copy_icon.gif' /></a>\n";
		echo "					<a href=\"javascript:WPCObject.deleteDocument(" . $row["IDDOCUMENT"] .")\" ><img src='r_media/images/icons/b_drop.png' /><a>\n";
		echo "					<a href=\"javascript:WPCObject.showChildren(" . $row["IDDOCUMENT"] .")\" ><img src='r_media/images/icons/down.png' /><a>\n";
		echo "				</td>\n";
		echo "				<td><img id=\"INDICATOR_" . $row["IDDOCUMENT"] . "\" src=\"r_media/images/indicator.gif\" style=\"display: none;\"/></td>\n";
		echo "			<tr>\n";
	}

	echo "</table>\n";	
}


function getTitle($IDDOCUMENT){
	$sql = "SELECT TITLE ";
	$sql .= "FROM ewccc_documents WHERE IDDOCUMENT = " . $IDDOCUMENT;
	
	//echo $sql;
	
	mysql_connect(DB_HOST, DB_USER, DB_PASS) or die(mysql_error());
	mysql_select_db(DB_NAME) or die(mysql_error());
		
	$result = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_array($result);

	return($row["TITLE"]);
}

function writeEWCCCMenu(){
	echo '<a href="EWCCC_panel.php" class="EWCCC_MAIN_MENU">Home Panel</a><br/>';
	echo '<a href="EWCCC_userAdmin.php" class="EWCCC_MAIN_MENU">Users</a><br/>';
	echo '<a href="EWCCC_documentAdmin.php" class="EWCCC_MAIN_MENU">Documents</a><br/>';
	echo '<a href="EWCCC_metadata.php" class="EWCCC_MAIN_MENU">Metadata</a><br/>';
	echo '<a href="EWCCC_extranet.php" class="EWCCC_MAIN_MENU">Extranet</a><br/>';
	echo '<a href="EWCCC_fileManager.php" class="EWCCC_MAIN_MENU">File Manager</a><br/>';
	echo '<a href="EWCCC_help.php" class="EWCCC_MAIN_MENU">EWCCC Help</a><br/>';	
	echo '<a href="EWCCC_about.php" class="EWCCC_MAIN_MENU">About EWCCC</a><br/>';
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

function writeUserLevels(){
	
	$sql = "SELECT IDUSER_LEVEL, USER_LEVEL ";
	$sql .= "FROM ewccc_user_levels ORDER BY 1;";
	
	//echo $sql;
	
	mysql_connect(DB_HOST, DB_USER, DB_PASS) or die(mysql_error());
	mysql_select_db(DB_NAME) or die(mysql_error());
		
	$result = mysql_query($sql) or die(mysql_error());
		
	while( $row = mysql_fetch_array($result) ) {
		echo "			<option value=" . $row["IDUSER_LEVEL"] .">" . $row["USER_LEVEL"]. "</option>\n";
	}
}

function writeExtranetDocuments(){
	
	$sql = "SELECT IDDOCUMENT, TITLE ";
	$sql .= "FROM ewccc_documents WHERE IDPARENT = 2;";
	
	//echo $sql;
	
	mysql_connect(DB_HOST, DB_USER, DB_PASS) or die(mysql_error());
	mysql_select_db(DB_NAME) or die(mysql_error());
		
	$result = mysql_query($sql) or die(mysql_error());
		
	while( $row = mysql_fetch_array($result) ) {
		echo "			<option value=" . $row["IDDOCUMENT"] .">" . $row["TITLE"]. "</option>\n";
	}
}

?>