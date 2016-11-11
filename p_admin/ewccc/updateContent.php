<?
session_start();
require("config.php");
require("r_php/esmeta/security/auth.php");
require("r_php/ewccc/EWCCCFunctions.php");

$auth = auth();

if ($auth == false){
	header ("Location: ../index.php");
}
?>
<?
$IDDOCUMENT = $HTTP_GET_VARS['id'];

mysql_connect(DB_HOST, DB_USER, DB_PASS) or die(mysql_error());
mysql_select_db(DB_NAME) or die(mysql_error());

$sql = "SELECT * FROM ewccc_documents WHERE IDDOCUMENT=" . $IDDOCUMENT;
//echo $sql;
$result = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_array($result);

	//echo "<esmeta>\n";
	//echo "	<transaction>1</transaction>\n";
	//echo "	<iddocument>" . $row["IDDOCUMENT"] . "</iddocument>\n";
	//echo "	<idparent>" . $row["IDPARENT"] . "</idparent>\n";
	//echo "	<idcreator>" . $row["IDCREATOR"] . "</idcreator>\n";
	//echo "	<title>" . stripslashes($row["TITLE"]) . "</title>\n";
	//echo "	<metadata_description>" . stripslashes($row["METADATA_DESCRIPTION"]) . "</metadata_description>\n";
	//echo "	<metadata_keywords>" . stripslashes($row["METADATA_KEYWORDS"]) . "</metadata_keywords>\n";
	//echo "	<content>" . stripslashes($row["CONTENT"]) . "</content>\n";
	//echo "</esmeta>";

?>
<html>
<head>
		<link rel="stylesheet" href="r_css/esmeta_admin.css" type="text/css" />

		<script src="r_javascript/conio/prototype/prototype.js" type="text/javascript" language="JavaScript"></script>
		
		<!-- This JavaScript Class controls the Interaction of the web document -->
		<script src="r_javascript/esmeta/ewccc/tinyMCEAdminControllerClass.js" type="text/javascript" language="JavaScript"></script>
		<script type="text/javascript" language="JavaScript">
				//Web Page Controller Object
				WPCObject = new tinyMCEAdminControllerClass();
		</script>		
		<!-- ICONO -->
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<!-- tinyMCE -->
<script language="javascript" type="text/javascript" src="r_javascript/tiny_mce/tiny_mce.js"></script>
<script language="javascript" type="text/javascript">
	// Notice: The simple theme does not use all options some of them are limited to the advanced theme
	tinyMCE.init({
		mode : "textareas",
		theme : "advanced",
    	mode: "exact",
    	elements : "CONTENT",		
		plugins : "table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,zoom,media,searchreplace,print,contextmenu,paste,directionality,fullscreen",
		theme_advanced_buttons1_add_before : "save,newdocument,separator",
		theme_advanced_buttons1_add : "fontselect,fontsizeselect",
		theme_advanced_buttons2_add : "separator,insertdate,inserttime,preview,zoom,separator,forecolor,backcolor",
		theme_advanced_buttons2_add_before: "cut,copy,paste,pastetext,pasteword,separator,search,replace,separator",
		theme_advanced_buttons3_add_before : "tablecontrols,separator",
		theme_advanced_buttons3_add : "emotions,iespell,media,advhr,separator,print,separator,ltr,rtl,separator,fullscreen",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		content_css : "example_word.css",
	    plugi2n_insertdate_dateFormat : "%Y-%m-%d",
	    plugi2n_insertdate_timeFormat : "%H:%M:%S",
		external_link_list_url : "example_link_list.js",
		external_image_list_url : "example_image_list.js",
		media_external_list_url : "example_media_list.js",
		file_browser_callback : "fileBrowserCallBack",
		paste_use_dialog : false,
		theme_advanced_resizing : true,
		theme_advanced_resize_horizontal : false,
		theme_advanced_link_targets : "_something=My somthing;_something2=My somthing2;_something3=My somthing3;",
		paste_auto_cleanup_on_paste : true,
		paste_convert_headers_to_strong : false,
		paste_strip_class_attributes : "all",
		paste_remove_spans : false,
		paste_remove_styles : false		
	});
	
	function fileBrowserCallBack(field_name, url, type, win) {
		// This is where you insert your custom filebrowser logic
		alert("Filebrowser callback: field_name: " + field_name + ", url: " + url + ", type: " + type);

		// Insert new URL, this would normaly be done in a popup
		win.document.forms[0].elements[field_name].value = "someurl.htm";
	}	
</script>
<!-- /tinyMCE -->
</head>

<body>
		<!-- N1 -->
		<table width="100%" cellpadding="0" cellspacing="0">
			<tr>
				<td class="logo"><img src="r_media/images/esmetaLogo.jpg" /></td>
				<td class="esmeta_header_options">
					<a href="r_php/ewccc/system/logout.php" class="esmeta_header_option">Logout</a></td>
			</tr>
		</table>
		<table width="100%" cellpadding="0" cellspacing="0" class="INFO_LINE">
			<tr>
				<td>
					EWCCC > Document Administration
				</td>
				<td align="right">
					User: <span style="color:green"><? echo $HTTP_SESSION_VARS['authdata']['USER'] ?></span>
				</td>
			</tr>
		</table>
		<!-- N2 -->
		<table cellpadding="0" cellspacing="0" width="100%" class="n2t1">
			<tr>
				<td class="n2t1f1c1">
					<table cellpadding="0" cellspacing="0" class="n2t2">
						<tr>
							<td class="n2t2f1c1">
			<?
			writeEWCCCMenu()
			?>
							</td>
							<td valign="top" align="left">
							
							<!-- CONTENTS TINY MCE EDITOR -->
							
							

		<form action="r_php/ewccc/documents/updateDocumentTINY.php" method="post" name="DOCUMENT" ><!-- onsubmit="return WPCObject.onSubmitUpdateDocument(this)" -->
			<input type="hidden" name="IDDOCUMENT" value="<?= $row["IDDOCUMENT"] ?>" />
			<table cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td><input type="text" name="TITLE" class="EWCCC_DOCUMENT_INPUT_TINY" value="<?= stripslashes($row["TITLE"]) ?>" /></td>
				</tr>
				<tr>
					<td><textarea name="CONTENT" class="EWCCC_DOCUMENT_TEXTAREA" rows="15" cols="80" style="width: 100%">
					<?= stripslashes($row["CONTENT"]) ?>
					</textarea></td>								
				</tr>
				<tr>
					<td><img src="r_media/images/pixel_transparente.gif" width="1" height="5" /></td>
				</tr>
				<tr>
					<td>
						<select class="EWCCC_DOCUMENT_SELECT_TINY" name="IDPARENT">
							<?
							writeParentDocuments();
							?>
						</select>
						<script>
							var FORM_OBJECT = document.forms["DOCUMENT"];
							FORM_OBJECT.IDPARENT.value = <?= $row["IDPARENT"] ?>;
						</script>
					</td>								
				</tr>
				<tr>
					<td>
					<input type="text" name="DESCRIPTION" class="EWCCC_DOCUMENT_INPUT_TINY" value="<?= stripslashes($row["METADATA_DESCRIPTION"]) ?>" />
				</tr>
				<tr>
					<td>
						<input type="button" value="Update document" class="LOGIN_SUBMIT" onclick="detectObj()"/>&nbsp;&nbsp;
						<img id="INDICATOR" src="r_media/images/indicator.gif" style="display: none;"/><!-- WPCObject.onClickUpdateDocument(); -->
						<input type="submit" name="save" value="Submit" />
					</td>
					
				</tr>
			</table>
		</form>
		<script>
			function detectObj(){
				alert(document.forms[0].CONTENT.value)
				//alert(document.forms[0].sContent.value)
				//alert(tinyMCE.getData("CONTENT"))
			}
		</script>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>		
		<!-- N3 -->
		<table width="100%" cellpadding="0" cellspacing="0" class="n3t1">
			<tr>
				<td align="left">
					<script type="text/javascript" language="JavaScript">
						WPCObject.writeFooter();
					</script>
				</td>
			</tr>
		</table>		
	</body>
</html>

