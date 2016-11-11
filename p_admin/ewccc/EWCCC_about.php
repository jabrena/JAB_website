<?
require("r_php/ewccc/securitySession.php");
require("r_php/ewccc/EWCCCFunctions.php");
?>
<html>
	<head>
		<title>
			Esmeta / EWCCC / Admin area / About Esmeta Web Channel Control Center, EWCCC
		</title>
		<script src="r_javascript/conio/prototype/prototype.js" type="text/javascript" language="JavaScript"></script>
		<script src="r_javascript/netscape/forms/formCheq.js" type="text/javascript" language="JavaScript"></script>
		<script src="r_javascript/webcuts/misc/Webcuts.js" type="text/javascript" language="JavaScript"></script>


		<link rel="stylesheet" href="r_css/esmeta_admin.css" type="text/css" />

		<!-- This JavaScript Class controls the Interaction of the web document -->
		<script src="r_javascript/esmeta/ewccc/BasicControllerClass.js" type="text/javascript" language="JavaScript"></script>
		<script type="text/javascript" language="JavaScript">
				//Web Page Controller Object
				WPCObject = new BasicControllerClass();
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
					EWCCC > About Esmeta Web Channel Control Center, EWCCC
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
			<h2 class="h2">About Esmeta web channel control center, EWCCC</h1>
<p>
<b>EWCCC Version:</b> 1.0.20071104
</p>
<p>
<b>EWCCC</b> is a software developed by <a href="http://www.esmeta.es/" target="blank">Esmeta</a> 
to control any Web Channel.
</p>
<p>
<b>EWCCC</b> give the companies the opportunity to execute any Internet Strategy.<br />
<b>EWCCC</b> allows to develop and maintain:
<ol>
	<li>Corporative Web Site</li>
	<li>Extranet systems</li>
	<li>Intranet systems</li>
</ol>
</p>
<p>
<b>EWCCC</b> helps the companies which they wants to begin to have a Internet presence or if 
the company wants to improve the control of its Web systems using a Web Control Platform.
</p>
<p>
<b>EWCCC</b> has been developed using Latest Web Technologies:
<ul>
	<li>Apache</li>
	<li>PHP</li>
	<li>MySQL</li>
	<li>AJAX, using Prototype Framework</li>
	<li>XML</li>
	<li>Esmeta Web repository</li>
</ul>	
</p>
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