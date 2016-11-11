<html>
	<head>
		<title>
			Esmeta / EWCCC / Admin area / Installation
		</title>
		<script src="r_javascript/conio/prototype/prototype.js" type="text/javascript" language="JavaScript"></script>
		<script src="r_javascript/netscape/forms/formCheq.js" type="text/javascript" language="JavaScript"></script>


		<link rel="stylesheet" href="r_css/esmeta_admin.css" type="text/css" />

		<!-- This JavaScript Class controls the Interaction of the web document -->
		<script src="r_javascript/esmeta/ewccc/InstallationControllerClass.js" type="text/javascript" language="JavaScript"></script>
		<script type="text/javascript" language="JavaScript">
				//Web Page Controller Object
				WPCObject = new InstallationControllerClass();
		</script>
		
		<!-- ICONO -->
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	</head>
	<body>
		<!-- N1 -->
		<table width="100%" cellpadding="0" cellspacing="0">
			<tr>
				<td class="logo"><img src="r_media/images/esmetaLogo.jpg" /></td>
				<td class="esmeta_header_options">&nbsp;
				</td>					
			</tr>
		</table>
		<table width="100%" cellpadding="0" cellspacing="0" class="INFO_LINE">
			<tr>
				<td>
					EWCCC > Installation Process
				</td>
				<td align="right">
					User: <span style="color:green">EWCCC Installer</span>
				</td>
			</tr>
		</table>
		<!-- N2 -->
		<table cellpadding="0" cellspacing="0" width="100%" class="n2t1">
			<tr>
				<td class="n2t1f1c1">
					<table cellpadding="0" cellspacing="0" width="760" class="n2t2">
						<tr>
							<td valign="top" align="left">
								<h2 class="h2">EWCCC, Esmeta Web Channel Control Center, Installation Process</h1>
								<p>
								Install EWCCC, is very easy. Follow the steps.
								</p>
								<h3>Step 1: Edit Edit the file, <i>"config.php"</i></h3>
								<p>
								Edit the file, <i>"config.php"</i> and edit the following parameters:
								</p>
								<ol>
									<li>define("DB_NAME", "your DB name");</li>
									<li>define("DB_USER", "your DB user");</li>
									<li>define("DB_PASS", "your DB user password");</li>
									<li>define("DB_HOST", "Where your DB is located. Normally, 'localhost' if you install in your LAMP Hosting");</li>
								</ol>
								<p>
								You should care very well this file, because it is used by the whole application
								</p>
								<h3>Step 2: Create EWCCC Data Structure</h3>
								<p>
								Create EWCCC Data Structure. Click in the button.
								</p>
								<form action="#" name="DATA_STRUCTURE" onsubmit="return WPCObject.onSubmitDataStructure(this)">
									<table cellpadding="0" cellspacing="0">
										<tr>
											<td>
												<input type="button" value="Create EWCCC Data Structure" class="LOGIN_SUBMIT" onclick="WPCObject.createDataStructure();"/>&nbsp;&nbsp;
											</td>
											<td><img id="INDICATOR" src="r_media/images/indicator.gif" style="display: none;"/></td>
										</tr>
										<tr>
											<td colspan="2"><div id="AJAX_MESSAGE"></div></td>
										</tr>
										<tr>
											<td>
												<input type="button" value="Log in" class="LOGIN_SUBMIT" onclick="WPCObject.goToLogin();" style="display:none;" id="GOTO"/>&nbsp;&nbsp;
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
   </body>
</html>