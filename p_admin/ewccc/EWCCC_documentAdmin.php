<?
require("r_php/ewccc/securitySession.php");
require("r_php/ewccc/EWCCCFunctions.php");
?>
<html>
	<head>
		<title>
			Esmeta / Admin Area / Document Administration
		</title>
		<script src="r_javascript/conio/prototype/prototype.js" type="text/javascript" language="JavaScript"></script>
		<script src="r_javascript/netscape/forms/formCheq.js" type="text/javascript" language="JavaScript"></script>
		<script src="r_javascript/webcuts/misc/Webcuts.js" type="text/javascript" language="JavaScript"></script>


		<link rel="stylesheet" href="r_css/esmeta_admin.css" type="text/css" />

		<!-- This JavaScript Class controls the Interaction of the web document -->
		<script src="r_javascript/esmeta/ewccc/ContentAdminControllerClass.js" type="text/javascript" language="JavaScript"></script>
		<script type="text/javascript" language="JavaScript">
				//Web Page Controller Object
				WPCObject = new ContentAdminControllerClass();
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
			<h2 class="h2">Document Administration</h1>
			<br />
								<form action="#" name="LOGIN_OPTIONS2" onsubmit="return WPCObject.onSubmitLoginOptions(this)">
									<table cellpadding="0" cellspacing="0">
										<tr>
											<td>
												<input type="button" value="Create document" class="LOGIN_SUBMIT" onclick="WPCObject.createDocument();"/>&nbsp;&nbsp;
											</td>
										</tr>
									</table>
								</form>
								<br />
			<?
			writeDocumentTableList();
			?>
								<form action="#" name="LOGIN_OPTIONS" onsubmit="return WPCObject.onSubmitLoginOptions(this)">
									<table cellpadding="0" cellspacing="0">
										<tr>
											<td>
												<input type="button" value="Create document" class="LOGIN_SUBMIT" onclick="WPCObject.createDocument();"/>&nbsp;&nbsp;
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
		<!-- FORM CREATED TO CREATE AND UPDATE USER INFORMATION -->
		<div id="NEW_DOCUMENT" style="display: none;">
			<form action="#" name="DOCUMENT" onsubmit="return WPCObject.onSubmitCreateAccount(this)">
				<input type="hidden" name="IDDOCUMENT" value="" />
				<table cellpadding="0" cellspacing="0">
					<tr>
						<td class="EWCCC_LABEL">Title:</td>
						<td colspan="2"><input type="text" name="TITLE" class="EWCCC_DOCUMENT_INPUT" /></td>
					</tr>
					<tr>
						<td class="EWCCC_LABEL">Content:</td>
						<td><textarea name="CONTENT" class="EWCCC_DOCUMENT_TEXTAREA"></textarea></td>								
					</tr>
					<tr>
						<td class="EWCCC_LABEL">Parent:</td>
						<td>
							<select class="EWCCC_DOCUMENT_SELECT" name="IDPARENT">
								<?
								writeParentDocuments();
								?>
							</select>
						</td>								
					</tr>
					<tr>
						<td class="EWCCC_LABEL">Description:</td>
						<td><textarea name="DESCRIPTION" class="EWCCC_DOCUMENT_TEXTAREA_METADATA"></textarea></td>								
					</tr>
					<tr>
						<td class="EWCCC_LABEL">Tags:</td>
						<td><textarea name="KEYWORDS" class="EWCCC_DOCUMENT_TEXTAREA_METADATA"></textarea></td>								
					</tr>
					<tr>
						<td class="EWCCC_LABEL">Order:</td>
						<td><input type="text" name="NORDER" class="EWCCC_DOCUMENT_INPUT" /></td>
					</tr>
					<!--
					<tr>
						<td class="EWCCC_LABEL">Is part of another document?:</td>
						<td><checkbox name="ISPART" checked="false" /></td>								
					</tr>
					-->
				</table>
				<div id="CREATE_ACCOUNT_BUTTON">
					<table cellpadding="0" cellspacing="0" class="CREATE_ACCOUNT" width="550">
						<tr>
							<td><img id="INDICATOR_ADD_USER" src="r_media/images/indicator.gif" style="display: none;"/></td>
						</tr>
					</table>
				</div>
				<table cellpadding="0" cellspacing="0" class="CREATE_ACCOUNT" width="550">
					<tr>
						<td align="right" colspan="2"><a href="javascript:WPCObject.closeWebForm()" class="W2_POPUP_OPTIONS">Close</a></td>
					</tr>
				</table>
			</form>
		</div>
   </body>
</html>