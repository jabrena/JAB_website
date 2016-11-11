<?
require("r_php/ewccc/securitySession.php");
require("r_php/ewccc/EWCCCFunctions.php");
?>
<html>
	<head>
		<title>
			Esmeta / EWCCC / Admin area / Extranet Administration
		</title>
		<script src="r_javascript/conio/prototype/prototype.js" type="text/javascript" language="JavaScript"></script>
		<script src="r_javascript/netscape/forms/formCheq.js" type="text/javascript" language="JavaScript"></script>
		<script src="r_javascript/webcuts/misc/Webcuts.js" type="text/javascript" language="JavaScript"></script>


		<link rel="stylesheet" href="r_css/esmeta_admin.css" type="text/css" />

		<!-- This JavaScript Class controls the Interaction of the web document -->
		<script src="r_javascript/esmeta/ewccc/ExtranetAdminControllerClass.js" type="text/javascript" language="JavaScript"></script>
		<script type="text/javascript" language="JavaScript">
				//Web Page Controller Object
				WPCObject = new ExtranetAdminControllerClass();
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
					EWCCC > Extranet Administration
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
			<h2 class="h2">Extranet Administration</h1>
			<?
			writeExtranetUserTableList();
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
		<!-- FORM CREATED TO CREATE AND UPDATE USER INFORMATION -->
		<div id="EXTRANET" style="display: none;">
			<form action="#" name="EXTRANET" onsubmit="return WPCObject.onSubmitAssociateDocument(this)">
				<input type="hidden" name="IDUSER" value="" />
				<table cellpadding="0" cellspacing="0">
					<tr>
						<td class="ERT_CREATE_ACCOUNT">Extranet Documents:</td>
						<td>
							<select class="EWCCC_DOCUMENT_SELECT2" name="IDDOCUMENT">
								<option value="*">Select a Extranet Document</option>
								<?
								writeExtranetDocuments();
								?>
								<option value="-1">Not associate with any document</option>
							</select>
						</td>								
					</tr>
					<tr>
						<td><input type="button" value="Associate Document" class="LOGIN_SUBMIT" onclick="WPCObject.onClickAssociateDocument()" /></td>
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