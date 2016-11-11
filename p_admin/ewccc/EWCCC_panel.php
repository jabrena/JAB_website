<?
require("r_php/ewccc/securitySession.php");
require("r_php/ewccc/EWCCCFunctions.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html dir="ltr" xml:lang="es" lang="es" xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>
			Esmeta / EWCCC / Admin area / Home Panel
		</title>
		<script src="r_javascript/conio/prototype/prototype.js" type="text/javascript" language="JavaScript"></script>
		<script src="r_javascript/netscape/forms/formCheq.js" type="text/javascript" language="JavaScript"></script>
		<script src="r_javascript/webcuts/misc/Webcuts.js" type="text/javascript" language="JavaScript"></script>



		<link rel="stylesheet" href="r_css/esmeta_admin.css" type="text/css" />

		<!-- This JavaScript Class controls the Interaction of the web document -->
		<script src="r_javascript/esmeta/ewccc/UserPanelControllerClass.js" type="text/javascript" language="JavaScript"></script>
		<script type="text/javascript" language="JavaScript">
				//Web Page Controller Object
				WPCObject = new UserPanelControllerClass();
		</script>
	</head>
	<body>
		<!-- ERT HEADER -->
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
					EWCCC > Home Panel
				</td>
				<td align="right">
					User: <span style="color:green"><? echo $HTTP_SESSION_VARS['authdata']['USER'] ?></span>
				</td>
			</tr>
		</table>
		<table cellpadding="0" cellspacing="0" class="INFO_LINE" width="100%">
			<tr>
				<td valign="top">
							<td class="n2t2f1c1">
			<?
			writeEWCCCMenu()
			?>
				</td>
				<td valign="top" align="left">
					<img src="r_media/images/content_manager.jpg" />
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
   </body>
</html>