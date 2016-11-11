<html>
	<head>
		<title>
			Esmeta / Admin Area / Home
		</title>
		<script src="r_javascript/conio/prototype/prototype.js" type="text/javascript" language="JavaScript"></script>
		<script src="r_javascript/netscape/forms/formCheq.js" type="text/javascript" language="JavaScript"></script>

		<link rel="stylesheet" href="r_css/esmeta_admin.css" type="text/css" />

		<!-- This JavaScript Class controls the Interaction of the web document -->
		<script src="r_javascript/esmeta/ewccc/IndexControllerClass.js" type="text/javascript" language="JavaScript"></script>
		<script type="text/javascript" language="JavaScript">
				//Web Page Controller Object
				WPCObject = new IndexControllerClass();
		</script>
		
		<!-- ICONO -->
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	</head>
	<body>
		<!-- ERT HEADER -->
		<table width="100%" cellpadding="0" cellspacing="0">
			<tr>
				<td class="logo"><img src="r_media/images/esmetaLogo.jpg" /></td>
				<td class="esmeta_header_options"><a href="javascript:WPCObject.login()" class="esmeta_header_option">Login</a></td>
			</tr>
		</table>
		<table width="100%" cellpadding="0" cellspacing="0" bgcolor="#ffffff">
			<tr>
				<td align="left">
					<div id="MAIN">
						<table cellpadding="0" cellspacing="0">
							<tr>
								<td valign="top"><img src="r_media/images/world.gif"" /></td>
								<td valign="top">
									<div id="ESMETA_DESCRIPTION">
										<b>Esmeta Web Channel Control Center 1.0</b>
										<br/>
										<p>
											Web application to control:
										</p>
										<p>
											<ul>
												<li>Web Channel contents</li>
												<li>Web Channel Metadata</li>
											</ul>
										</p>
									</div>
								</>
							</tr>
						</table>
					</div>
				</td>
			</tr>
		</table>
		<table width="100%" cellpadding="0" cellspacing="0" class="TABLE_FOOTER">
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
		<div id="LOGIN" style="display:none;">
			<form action="#" name="RBOX_LOGIN" onsubmit="return WPCObject.onSubmitLogin(this)">
				<table cellpadding="0" cellspacing="0">
					<tr>
						<td><img src="r_media/images/login-welcome.gif" /></td>
						<td>
							<table>
								<tr>
									<td class="LOGIN_ERT">User:</td>
									<td><input type="text" name="ERT_USER" class="LOGIN" /></td>
								</tr>
								<tr>
									<td class="LOGIN_ERT">Password:</td>
									<td><input type="password" name="ERT_USER_PASSWORD" class="LOGIN" /></td>
								</tr>
								<tr>
									<td><input type="submit" value="Login" class="LOGIN_SUBMIT" /></td>
									<td><img id="INDICATOR_LOGIN" src="r_media/images/indicator.gif" style="display: none;"/></td>
								</tr>
								<tr>
									<td align="right" colspan="2"><a href="javascript:WPCObject.closeExtranetLogin()" class="W2_POPUP_OPTIONS">Close</a></td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</form>
		</div>
		<script type="text/javascript">
			// Manejo de evento de carga.
			window.onload = WPCObject.login();
		</script>
<script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
</script>
<script type="text/javascript">
_uacct = "UA-343143-5";
urchinTracker();
</script>
   </body>
</html>