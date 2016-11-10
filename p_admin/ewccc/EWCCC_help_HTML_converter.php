<?
require("r_php/ewccc/securitySession.php");
require("r_php/ewccc/EWCCCFunctions.php");
?>
<html>
	<head>
		<title>
			Esmeta / EWCCC / Admin area / Help / Special HTML characters
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
		<script>
			function trimString(str){
				return str.replace(/^\s+/g, '').replace(/\s+$/g, '');
			};
			BasicControllerClass.prototype.onSubmitConverter = function()
			{
				return false;
			}
			BasicControllerClass.prototype.convert = function()
			{
				var OC = trimString(document.forms[0].HTML_ORIGINAL.value);
				//alert(OC)
				if(OC.length > 0){
					var OCC = convertHTML(OC);
					document.forms[0].HTML_CONVERTED.value = OCC;				
				}else{
					alert("Textarea is empty");
				}
			}
			function convertHTML(DATA)
			{
				var DATA_CONVERTED;
				
				DATA_CONVERTED = DATA.replace(/\+/g,"&#43;");
				DATA_CONVERTED = DATA.replace(/\ñ/g,"&ntilde;");
				
				DATA_CONVERTED = DATA.replace(/Á/g,"&Aacute;");
				DATA_CONVERTED = DATA.replace(/á/g,"&aacute;");
				DATA_CONVERTED = DATA.replace(/É/g,"&Eacute;");
				DATA_CONVERTED = DATA.replace(/é/g,"&éacute;");
				DATA_CONVERTED = DATA.replace(/Í/g,"&Iacute;");
				DATA_CONVERTED = DATA.replace(/í/g,"&iacute;");
				DATA_CONVERTED = DATA.replace(/Ó/g,"&Oacute;");
				DATA_CONVERTED = DATA.replace(/ó/g,"&oacute;");
				DATA_CONVERTED = DATA.replace(/Ú/g,"&Uacute;");
				DATA_CONVERTED = DATA.replace(/ú/g,"&uacute;");
						
				//alert(DATA_CONVERTED);
				
				return DATA_CONVERTED;
			}
			
//http://www.jeffothy.com/weblog/clipboard-copy/			
function copy(inElement) {
  if (inElement.createTextRange) {
    var range = inElement.createTextRange();
    if (range && BodyLoaded==1)
      range.execCommand('Copy');
  } else {
    var flashcopier = 'flashcopier';
    if(!document.getElementById(flashcopier)) {
      var divholder = document.createElement('div');
      divholder.id = flashcopier;
      document.body.appendChild(divholder);
    }
    document.getElementById(flashcopier).innerHTML = '';
    var divinfo = '<embed src="_clipboard.swf" FlashVars="clipboard='+encodeURIComponent(inElement.value)+'" width="0" height="0" type="application/x-shockwave-flash"></embed>';
    document.getElementById(flashcopier).innerHTML = divinfo;
  }
}
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
					EWCCC > Help > Special HTML characters
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
			<h2 class="h2">Special HTML Character Converter</h1>
				<p>Original HTML Content</p>

<form action="#" name="CONVERTER" onsubmit="return WPCObject.onSubmitConverter(this)">
	<table>
		<tr>
			<td colspan="2">
				<textarea name="HTML_ORIGINAL" class="EWCCC_DOCUMENT_TEXTAREA"></textarea>
			</td>
		</tr>
		<tr>
			<td>
				<input type="button" value="Convert" class="LOGIN_SUBMIT" onclick="WPCObject.convert()">
			</td>
			<td>
				<input type="button" value="Copy to Clipboard" class="LOGIN_SUBMIT" onclick="copy(document.forms[0].HTML_CONVERTED);">
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<textarea name="HTML_CONVERTED" class="EWCCC_DOCUMENT_TEXTAREA"></textarea>
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
