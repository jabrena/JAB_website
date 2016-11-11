<?
require("r_php/ewccc/securitySession.php");
require("r_php/ewccc/EWCCCFunctions.php");
?>
<html>
	<head>
		<title>
			Esmeta / EWCCC / Admin area / File Manager
		</title>
		<script src="r_javascript/conio/prototype/prototype.js" type="text/javascript" language="JavaScript"></script>
		<script src="r_javascript/netscape/forms/formCheq.js" type="text/javascript" language="JavaScript"></script>
		<script src="r_javascript/webcuts/misc/Webcuts.js" type="text/javascript" language="JavaScript"></script>


		<link rel="stylesheet" href="r_css/esmeta_admin.css" type="text/css" />

		<!-- This JavaScript Class controls the Interaction of the web document -->
		<script src="r_javascript/esmeta/ewccc/FileManagerControllerClass.js" type="text/javascript" language="JavaScript"></script>
		<script type="text/javascript" language="JavaScript">
				//Web Page Controller Object
				WPCObject = new FileManagerControllerClass();
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
					EWCCC > File Manager
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
								<h2 class="h2">File Manager Utility</h1>	
<form>
<table>
	<tr>
		<td><input type="button" value="Upload File" class="LOGIN_SUBMIT" onclick="WPCObject.uploadFile()" />&nbsp;</td>
		<td class="LOGIN_ERT"><b>Path:</b></td>
		<td><div id="PATH" class="t6"></div></td>
	</trC
</table>
</form>
<br />
<?
require("r_php/ewccc/files/fileNavigator.php");
?>
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
		<!-- FORM CREATED TO UPLOAD FILES -->
		<div id="FORM_UPLOADER" style="display: none;">
			<form ENCTYPE="multipart/form-data" action="r_php/ewccc/files/uploadFile.php" method="post" name="UPLOAD_FILE" ><!-- onsubmit="return WPCObject.onSubmitUploadFile(this)" -->
				<input type="hidden" name="MAX_FILE_SIZE" value="100000">
				<table cellpadding="0" cellspacing="0">
					<tr>
						<td class="ERT_CREATE_ACCOUNT">File:</td>
						<td><input type="file" name="userfile" class="LOGIN" /></td>								
					</tr>
					<tr>
						<td><input type="submit" value="Upload File" class="LOGIN_SUBMIT" onclick="WPCObject.onClickUploadFile()" /></td>
						<td><img id="INDICATOR" src="r_media/images/indicator.gif" style="display: none;"/></td>
					</tr>
				</table>
				<table cellpadding="0" cellspacing="0" class="CREATE_ACCOUNT" width="400">
					<tr>
						<td align="right" colspan="2"><a href="javascript:WPCObject.closeExtranetLogin()" class="W2_POPUP_OPTIONS">Close</a></td>
					</tr>
				</table>
			</form>
		</div>
   </body>
</html>