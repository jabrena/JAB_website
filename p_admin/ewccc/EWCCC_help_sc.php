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
			<h2 class="h2">Special HTML Characters</h1>
			<p>When you are editing your contents, it is necesary to use in some cases, 
			the following Scpecial Characters:</p>
<table cellspacing="0" cellpadding="2" class="t6">

  <tr>
    <td>&amp;lt;</td>
    <td>&lt;</td>
    <td>&amp;gt;</td>
    <td>&gt;</td>
  </tr>
  <tr>
    <td>&amp;amp;</td>

    <td>&amp;</td>
    <td>&amp;quot;</td>
    <td>&quot;</td>
  </tr>
</table>
<br>
<br>
     
<B>HTML 2.0 Special Characters</B>
<br>
<br>

<table cellspacing="0" cellpadding="2" class="t6">
  <tr> 
    <td>&amp;Aacute;</td>
    <td>&Aacute;</td>
    <td>&amp;Agrave;</td>
    <td>&Agrave;</td>
  </tr>
  <tr> 
    <td>&amp;Eacute;</td>

    <td>&Eacute;</td>
    <td>&amp;Egrave;</td>
    <td>&Egrave;</td>
  </tr>
  <tr> 
    <td>&amp;Iacute;</td>
    <td>&Iacute;</td>
    <td>&amp;Igrave;</td>

    <td>&Igrave;</td>
  </tr>
  <tr> 
    <td>&amp;Oacute;</td>
    <td>&Oacute;</td>
    <td>&amp;Ograve;</td>
    <td>&Ograve;</td>
  </tr>

  <tr> 
    <td>&amp;Uacute;</td>
    <td>&Uacute;</td>
    <td>&amp;Ugrave;</td>
    <td>&Ugrave;</td>
  </tr>
  <tr> 
    <td>&amp;aacute;</td>

    <td>&aacute;</td>
    <td>&amp;agrave;</td>
    <td>&agrave;</td>
  </tr>
  <tr> 
    <td>&amp;eacute;</td>
    <td>&eacute;</td>
    <td>&amp;egrave;</td>

    <td>&egrave;</td>
  </tr>
  <tr> 
    <td>&amp;iacute;</td>
    <td>&iacute;</td>
    <td>&amp;igrave;</td>
    <td>&igrave;</td>
  </tr>

  <tr> 
    <td>&amp;oacute;</td>
    <td>&oacute;</td>
    <td>&amp;ograve;</td>
    <td>&ograve;</td>
  </tr>
  <tr> 
    <td>&amp;uacute;</td>

    <td>&uacute;</td>
    <td>&amp;ugrave;</td>
    <td>&ugrave;</td>
  </tr>
  <tr> 
    <td>&amp;Auml;</td>
    <td>&Auml;</td>
    <td>&amp;Acirc;</td>

    <td>&Acirc;</td>
  </tr>
  <tr> 
    <td>&amp;Euml;</td>
    <td>&Euml;</td>
    <td>&amp;Ecirc;</td>
    <td>&Ecirc;</td>
  </tr>

  <tr> 
    <td>&amp;Iuml;</td>
    <td>&Iuml;</td>
    <td>&amp;Icirc;</td>
    <td>&Icirc;</td>
  </tr>
  <tr> 
    <td>&amp;Ouml;</td>

    <td>&Ouml;</td>
    <td>&amp;Ocirc;</td>
    <td>&Ocirc;</td>
  </tr>
  <tr> 
    <td>&amp;Uuml;</td>
    <td>&Uuml;</td>
    <td>&amp;Ucirc;</td>

    <td>&Ucirc;</td>
  </tr>
  <tr> 
    <td>&amp;auml;</td>
    <td>&auml;</td>
    <td>&amp;acirc;</td>
    <td>&acirc;</td>
  </tr>

  <tr> 
    <td>&amp;euml;</td>
    <td>&euml;</td>
    <td>&amp;ecirc;</td>
    <td>&ecirc;</td>
  </tr>
  <tr> 
    <td>&amp;iuml;</td>

    <td>&iuml;</td>
    <td>&amp;icirc;</td>
    <td>&icirc;</td>
  </tr>
  <tr> 
    <td>&amp;ouml;</td>
    <td>&ouml;</td>
    <td>&amp;ocirc;</td>

    <td>&ocirc;</td>
  </tr>
  <tr> 
    <td>&amp;uuml;</td>
    <td>&uuml;</td>
    <td>&amp;ucirc;</td>
    <td>&ucirc;</td>
  </tr>

  <tr> 
    <td>&amp;Atilde;</td>
    <td>&Atilde;</td>
    <td>&amp;aring;</td>
    <td>&aring;</td>
  </tr>
  <tr> 
    <td>&amp;Ntilde;</td>

    <td>&Ntilde;</td>
    <td>&amp;Aring;</td>
    <td>&Aring;</td>
  </tr>
  <tr> 
    <td>&amp;Otilde;</td>
    <td>&Otilde;</td>
    <td>&amp;Ccedil;</td>

    <td>&Ccedil;</td>
  </tr>
  <tr> 
    <td>&amp;atilde;</td>
    <td>&atilde;</td>
    <td>&amp;ccedil;</td>
    <td>&ccedil;</td>
  </tr>

  <tr> 
    <td>&amp;ntilde;</td>
    <td>&ntilde;</td>
    <td>&amp;Yacute;</td>
    <td>&Yacute;</td>
  </tr>
  <tr> 
    <td>&amp;otilde;</td>

    <td>&otilde;</td>
    <td>&amp;yacute;</td>
    <td>&yacute;</td>
  </tr>
  <tr> 
    <td>&amp;Oslash;</td>
    <td>&Oslash;</td>
    <td>&amp;yuml;</td>

    <td>&yuml;</td>
  </tr>
  <tr> 
    <td>&amp;oslash;</td>
    <td>&oslash;</td>
    <td>&amp;THORN;</td>
    <td>&THORN;</td>
  </tr>

  <tr> 
    <td>&amp;ETH;</td>
    <td>&ETH;</td>
    <td> &amp;thorn;</td>
    <td>&thorn;</td>
  </tr>
  <tr>
    <td>&amp;eth;</td>

    <td>&eth;</td>
    <td>&amp;AElig;</td>
    <td>&AElig;</td>
  </tr>
  <tr>
    <td>&amp;szlig;</td>
    <td>&szlig;</td>
    <td>&amp;aelig;</td>

    <td>&aelig;</td>
  </tr>
</table>
<br>
<br>
<B>HTML 3.2 Special Characters</B>
<br>
<br>
<table cellspacing="0" cellpadding="2" class="t6">
  <tr> 
    <td>&amp;frac14;</td>
    <td>&frac14;</td>

    <td>&amp;nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr> 
    <td>&amp;frac12;</td>
    <td>&frac12;</td>
    <td>&amp;iexcl;</td>
    <td>&iexcl;</td>

  </tr>
  <tr> 
    <td>&amp;frac34;</td>
    <td>&frac34;</td>
    <td>&amp;pound;</td>
    <td>&pound;</td>
  </tr>
  <tr> 
    <td>&amp;copy;</td>

    <td>&copy;</td>
    <td>&amp;yen;</td>
    <td>&yen;</td>
  </tr>
  <tr> 
    <td>&amp;reg;</td>
    <td>&reg;</td>
    <td>&amp;sect;</td>

    <td>&sect;</td>
  </tr>
  <tr> 
    <td>&amp;ordf;</td>
    <td>&ordf;</td>
    <td>&amp;curren;</td>
    <td>&curren;</td>
  </tr>

  <tr> 
    <td>&amp;sup2;</td>
    <td>&sup2;</td>
    <td>&amp;brvbar;</td>
    <td>&brvbar;</td>
  </tr>
  <tr> 
    <td>&amp;sup3;</td>

    <td>&sup3;</td>
    <td>&amp;laquo;</td>
    <td>&laquo;</td>
  </tr>
  <tr> 
    <td>&amp;sup1;</td>
    <td>&sup1;</td>
    <td>&amp;not;</td>

    <td>&not;</td>
  </tr>
  <tr> 
    <td>&amp;macr;</td>
    <td>&macr;</td>
    <td>&amp;shy;</td>
    <td>&shy;</td>
  </tr>

  <tr> 
    <td>&amp;micro;</td>
    <td>&micro;</td>
    <td>&amp;ordm;</td>
    <td>&ordm;</td>
  </tr>
  <tr> 
    <td>&amp;para;</td>

    <td>&para;</td>
    <td>&amp;acute;</td>
    <td>&acute;</td>
  </tr>
  <tr> 
    <td>&amp;middot;</td>
    <td>&middot;</td>
    <td>&amp;uml;</td>

    <td>&uml;</td>
  </tr>
  <tr> 
    <td>&amp;deg;</td>
    <td>&deg;</td>
    <td>&amp;plusmn;</td>
    <td>&plusmn;</td>
  </tr>

  <tr>
    <td>&amp;cedil;</td>
    <td>&cedil;</td>
    <td>&amp;raquo;</td>
    <td>&raquo;</td>
  </tr>
  <tr>
    <td>&amp;iquest;</td>

    <td>&iquest;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<br>
<br>
<B>Others Special HTML Characters</B>
<br>
<br>
<table cellspacing="0" cellpadding="2" class="t6">
  <tr> 
    <td>&amp;times;</td>

    <td>&times;</td>
    <td>&amp;cent;</td>
    <td>&cent;</td>
  </tr>
  <tr> 
    <td>&amp;divide;</td>
    <td>&divide;</td>
    <td>&amp;euro;</td>

    <td>&euro;</td>
  </tr>
  <tr> 
    <td>&amp;#147;</td>
    <td>&#147;</td>
    <td>&amp;#153;</td>
    <td>&#153;</td>
  </tr>

  <tr> 
    <td>&amp;#148;</td>
    <td>&#148;</td>
    <td>&amp;#137;</td>
    <td>&#137;</td>
  </tr>
  <tr>
    <td>&amp;#140;</td>

    <td>&#140;</td>
    <td>&amp;#131;</td>
    <td>&#131;</td>
  </tr>
  <tr>
    <td>&amp;#135;</td>
    <td>&#135;</td>
    <td>&amp;#134;</td>

    <td>&#134;</td>
  </tr>
</table>
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