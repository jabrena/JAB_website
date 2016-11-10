<?
require("r_php/ewccc/securitySession.php");
require("r_php/ewccc/EWCCCFunctions.php");
?>
<html>
	<head>
		<title>
			Esmeta / EWCCC / Admin area / Metadata
		</title>
		<script src="r_javascript/conio/prototype/prototype.js" type="text/javascript" language="JavaScript"></script>
		<script src="r_javascript/netscape/forms/formCheq.js" type="text/javascript" language="JavaScript"></script>
		<script src="r_javascript/webcuts/misc/Webcuts.js" type="text/javascript" language="JavaScript"></script>


		<link rel="stylesheet" href="r_css/esmeta_admin.css" type="text/css" />

		<!-- This JavaScript Class controls the Interaction of the web document -->
		<script src="r_javascript/esmeta/ewccc/MetadataAdminControllerClass.js" type="text/javascript" language="JavaScript"></script>
		<script type="text/javascript" language="JavaScript">
				//Web Page Controller Object
				WPCObject = new MetadataAdminControllerClass();
		</script>
		
		<!-- ICONO -->
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	</head>
	<body>
		<!-- N1 -->
		<table width="100%" cellpadding="0" cellspacing="0">
			<tr>
				<td class="logo"><img src="r_media/images/esmetaLogo.jpg" /></td>
				<td class="esmeta_header_options">
					<a href="r_php/esmeta/security/logout.php" class="esmeta_header_option">Logout</a></td>
			</tr>
		</table>
		<table width="100%" cellpadding="0" cellspacing="0" class="INFO_LINE">
			<tr>
				<td>
					EWCCC > Metadata
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
					<table cellpadding="0" cellspacing="0" width="760" class="n2t2">
						<tr>
							<td class="n2t2f1c1">
			<?
			writeEWCCCMenu()
			?>
							</td>
							<td valign="top" align="left">
								<h2 class="h2">Metadata Manager</h1>	
<p class="t6">
<b>Metadata Manager</b> is a EWCCC module designed to update metadata in your website. 
</p>
<p>
It is a good practice, to use a External services as Google Analytics, Double Click, Omniture & Web Trends to check the status of your Web site in relation to Web traffic and other factors.
</p>
<p>
Update metadata is a critic task to sucess with your Internet Strategy.
</p>
<form>
<table>
	<tr>
		<td>
			<input type="button" value="Search Engine Metadata" class="LOGIN_SUBMIT" onclick="WPCObject.uploadMetadata()" />
		</td>
	</tr>
</table>
</form>

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
		<!-- WEB 2.0 WINDOWS & EFFECTS -->
		<div id="overlay" style="display:none;"></div>
		<!-- FORM CREATED TO UPDATE TITLE, DESCRIPTION & KEYWORDS -->
		<div id="METADATA1" style="display: none;">
			<form action="#" name="METADATA1" onsubmit="return WPCObject.onSubmitCreateAccount(this)">
				<table cellpadding="0" cellspacing="0">
					<tr>
						<td class="EWCCC_LABEL">Title:</td>
						<td colspan="2"><textarea name="TITLE" class="EWCCC_METADATA_TEXTAREA"></textarea></td>
					</tr>
					<tr>
						<td class="EWCCC_LABEL">Description:</td>
						<td><textarea name="DESCRIPTION" class="EWCCC_METADATA_TEXTAREA"></textarea></td>								
					</tr>
					<tr>
						<td class="EWCCC_LABEL">Tags:</td>
						<td><textarea name="KEYWORDS" class="EWCCC_METADATA_TEXTAREA"></textarea></td>								
					</tr>
				</table>
				<table cellpadding="0" cellspacing="0" class="CREATE_ACCOUNT" width="550">
					<tr>
						<td><input type="button" value="Update Search Engine Metadata" class="LOGIN_SUBMIT" onclick="WPCObject.onClickUpdateMetadata()" /></td>
						<td><img id="INDICATOR_UPDATE_METADATA" src="r_media/images/indicator.gif" style="display: none;"/></td>
						</tr>
				</table>
				<table cellpadding="0" cellspacing="0" class="CREATE_ACCOUNT" width="550">
					<tr>
						<td align="right" colspan="2"><a href="javascript:WPCObject.closeWebForm()" class="W2_POPUP_OPTIONS">Close</a></td>
					</tr>
				</table>
			</form>
		</div>
		<!-- FORM CREATED TO UPDATE OTHERS DOCUMENT'S METADATA -->
		<div id="METADATA2" style="display: none;">
			<form action="#" name="METADATA2" onsubmit="return WPCObject.onSubmitCreateAccount(this)">
				<table cellpadding="0" cellspacing="0">
					<tr>
						<td class="EWCCC_LABEL">Others Metadata:</td>
						<td colspan="2"><textarea name="TITLE" class="EWCCC_METADATA_TEXTAREA"></textarea></td>
					</tr>
				</table>
				<table cellpadding="0" cellspacing="0" class="CREATE_ACCOUNT" width="550">
					<tr>
						<td><input type="button" value="Update Others Document's Metadata" class="LOGIN_SUBMIT" onclick="WPCObject.onClickUpdateMetadata()" /></td>
						<td><img id="INDICATOR_UPDATE_METADATA" src="r_media/images/indicator.gif" style="display: none;"/></td>
						</tr>
				</table>
				<table cellpadding="0" cellspacing="0" class="CREATE_ACCOUNT" width="550">
					<tr>
						<td align="right" colspan="2"><a href="javascript:WPCObject.closeWebForm()" class="W2_POPUP_OPTIONS">Close</a></td>
					</tr>
				</table>
			</form>
		</div>
   </body>
</html>