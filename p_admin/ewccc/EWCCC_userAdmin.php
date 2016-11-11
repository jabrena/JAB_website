<?
require("r_php/ewccc/securitySession.php");
require("r_php/ewccc/EWCCCFunctions.php");
?>
<html>
	<head>
		<title>
			Esmeta / EWCCC / Admin area / User Administration
		</title>
		<script src="r_javascript/conio/prototype/prototype.js" type="text/javascript" language="JavaScript"></script>
		<script src="r_javascript/netscape/forms/formCheq.js" type="text/javascript" language="JavaScript"></script>
		<script src="r_javascript/webcuts/misc/Webcuts.js" type="text/javascript" language="JavaScript"></script>


		<link rel="stylesheet" href="r_css/esmeta_admin.css" type="text/css" />

		<!-- This JavaScript Class controls the Interaction of the web document -->
		<script src="r_javascript/esmeta/ewccc/UserAdminControllerClass.js" type="text/javascript" language="JavaScript"></script>
		<script type="text/javascript" language="JavaScript">
				//Web Page Controller Object
				WPCObject = new UserAdminControllerClass();
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
					EWCCC > User Administration
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
			<h2 class="h2">User Administration</h1>
			<?
			writeUserTableList();
			?>
<!-- USER ADMIN OPTIONS -->
								<form action="#" name="LOGIN_OPTIONS" onsubmit="return WPCObject.onSubmitLoginOptions(this)">
									<table cellpadding="0" cellspacing="0">
										<tr>
											<td>
												<input type="button" value="Create account" class="LOGIN_SUBMIT" onclick="WPCObject.createAccount();"/>&nbsp;&nbsp;
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
		<div id="NEW_ACCOUNT" style="display: none;">
			<form action="#" name="CREATE_ACCOUNT" onsubmit="return WPCObject.onSubmitCreateAccount(this)">
				<input type="hidden" name="BLUSERNAMECHECKED" value="0" />
				<input type="hidden" name="IDUSER" value="" />
				<table cellpadding="0" cellspacing="0">
					<tr>
						<td class="ERT_CREATE_ACCOUNT">User:</td>
						<td colspan="2"><input type="text" name="USER" class="LOGIN" /></td>
					</tr>
				</table>
				<div id="CREATE_ACCOUNT_AVAILABLE">
					<table cellpadding="0" cellspacing="0">
						<tr>
							<td class="ERT_CREATE_ACCOUNT">&nbsp;</td>
							<td><input type="button" value="Check available" class="LOGIN_SUBMIT" onclick="WPCObject.onclickCheckAvailable()"></td>
							<td><img id="INDICATOR_AVAILABLE" src="r_media/images/indicator.gif" style="display: none;"/></td>							
						</tr>
					</table>
				</div>
				<table cellpadding="0" cellspacing="0">
					<tr>
						<td class="ERT_CREATE_ACCOUNT">Password:</td>
						<td><input type="password" name="USER_PASSWORD" class="LOGIN" /></td>								
					</tr>
					<tr>
						<td class="ERT_CREATE_ACCOUNT">Rewrite Password:</td>
						<td><input type="password" name="USER_PASSWORD2" class="LOGIN" /></td>								
					</tr>
					<tr>
						<td class="ERT_CREATE_ACCOUNT">User Level:</td>
						<td>
							<select class="EWCCC_USER_SELECT" name="IDUSER_LEVEL">
								<?
								writeUserLevels();
								?>
							</select>
						</td>								
					</tr>
					<tr>
						<td class="ERT_CREATE_ACCOUNT">First Name:</td>
						<td><input type="text" name="FIRST_NAME" class="LOGIN" /></td>								
					</tr>
					<tr>
						<td class="ERT_CREATE_ACCOUNT">Last Name:</td>
						<td><input type="text" name="LAST_NAME" class="LOGIN" /></td>								
					</tr>
					<tr>
						<td class="ERT_CREATE_ACCOUNT">Email:</td>
						<td><input type="text" name="EMAIL" class="LOGIN" /></td>								
					</tr>
				</table>
				<div id="CREATE_ACCOUNT_BUTTON">
					<table cellpadding="0" cellspacing="0" class="CREATE_ACCOUNT" width="300">
						<tr>
							<td><input type="button" value="Create Account" class="LOGIN_SUBMIT" onclick="WPCObject.onClickCreateUser()" /></td>
							<td><img id="INDICATOR_ADD_USER" src="r_media/images/indicator.gif" style="display: none;"/></td>
						</tr>
					</table>
				</div>
				<table cellpadding="0" cellspacing="0" class="CREATE_ACCOUNT" width="300">
					<tr>
						<td align="right" colspan="2"><a href="javascript:WPCObject.closeExtranetLogin()" class="W2_POPUP_OPTIONS">Close</a></td>
					</tr>
				</table>
			</form>
		</div>
   </body>
</html>