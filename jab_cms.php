<?
require("p_admin/ewccc/config.php");
//Load EWCCC Front-end Library
require("r_php/ewccc/front-end/front-end_API.php");
?>
<?
$IDDOCUMENT = $_GET['id'];
?>
<?
//Script designed to know the content to load
if($IDDOCUMENT == ''){
	die('No hay nada');
	//header("location: http://www.juanantonio.info/"); 
}else{
	if(($IDDOCUMENT == 1) || ($IDDOCUMENT == 2)){ 
		die('');	
	}else{
		if(existDocument($IDDOCUMENT)){
			if(isExtranetDocument($IDDOCUMENT)){
				die('No hay nada');	
				//header("location: http://www.juanantonio.info/"); 
			}else{
				$LEVEL1 = getLevel1($IDDOCUMENT);
				$LEVEL2 = getLevel2($IDDOCUMENT);
				$CONTENT = getContent($IDDOCUMENT);
			}
		}else{
			//die('No hay nada');
			header("location: http://www.juanantonio.info/"); 
		}
	}
}
?>
<?
//Counter for Marketing Purposes
updateCounter($IDDOCUMENT);
?>
<?
//Web Template
?>
<? 
/*
echo '<?xml version="1.0" encoding="UTF-8"?>'; 
*/
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html dir="ltr" xml:lang="en" lang="en" xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta content='text/html; charset=UTF-8' http-equiv='Content-Type'/>

		<link rel="me" href="http://www.juanantonio.info/jab_cms.php?id=29" />
		<meta name="generator" content="Esmeta EWCCC" />

		<?
		writeMetadataCMS($IDDOCUMENT);
		?>

		<!-- JAVASCRIPT -->
		<script src="r_javascript/esmeta/helpers/HelperClass.js" type="text/javascript" language="JavaScript"></script>
		<script src="r_javascript/esmeta/http/requestHttpClass.js" type="text/javascript" language="JavaScript"></script>
		<script src="r_javascript/esmeta/mvc/WebPageControllerClass.js" type="text/javascript" language="JavaScript"></script>
		<!-- CARGA DE CLASE QUE MANEJA PAGINA -->
		<script src="CMSControllerClass.js" type="text/javascript" language="JavaScript"></script>
		<script type="text/javascript" language="JavaScript">
			<!--
				//Web Page Controller Object
				WPCObject = new CMSControllerClass();
				WPCObject.setTitle('<? echo($LEVEL1) ?>');
				// Manejo de evento de carga.
				window.onload = WPCObject.window_onLoad;
			// -->
		</script>

		<link rel="stylesheet" href="r_css/jab6_cms.css" type="text/css" />
		<link rel="stylesheet" href="r_css/typography.css" type="text/css" />

		<!-- ICONO -->
		<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
	</head>
	<body>
<!-- GOOGLE ANALYTICS -->
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
var pageTracker = _gat._getTracker("UA-343143-1");
pageTracker._initData();
pageTracker._trackPageview();
</script>	
		<form name="frmNavigationHelper" id="frmNavigationHelper" action="#">
			<input type="hidden" name="wpSite" id="wpSite" value="Juanantonio.info" />
			<input type="hidden" name="wpArea" id="wpArea" value="<? echo($LEVEL1) ?>" />
			<input type="hidden" name="wpTitle" id="wpTitle" value="<? echo($LEVEL2) ?>" />
		</form>
		<div align="center" id="frame">
			<!-- LEVEL 1: Logo -->
			<table cellpadding="0" cellspacing="0" class="n1t1">
				<tr>
					<td class="n1t1f1c1">
						<a href="<? echo(HOME_URL) ?>" name="top">
							<img src="r_media/images/jabLogo2003.gif" width="207" height="60" alt="" border="0" />
						</a>
					</td>
					<td><img src="r_media/images/pixel_transparente.gif" width="1" height="150" alt="" /></td>
				</tr>
			</table>
			<!-- LEVEL 2: NAVIGATION SYSTEM & LEVEL 1 TITLE -->
			<table width="100%" cellpadding="0" cellspacing="0" class="n2t1">
				<tr>
					<td class="n2t1f1c1">
						<? echo($LEVEL1) ?>
					</td>
					<td class="n2t1f1c2">
						<form action="#" method="post" name="frmNavigation" onsubmit="return WPCObject.frmNavigation_onSubmit(this)">
							<select class="cbNavigation" onchange="WPCObject.cbNavigation_onChange(this)" name="cbNavigation" id="cbNavigation">
								<?
								writeNavigationSystem();
								?>
							</select>
						</form>
					</td>
				</tr>
			</table>
			<!-- LEVEL 3: CONTENTS -->
			<table cellpadding="0" cellspacing="0">
				<tr>
					<td><img src="r_media/images/pixel_transparente.gif" width="1" height="1" alt="" /></td>
				</tr>
			</table>			
			<table cellpadding="0" cellspacing="0" class="n3t1" width="990">
					<tr>
						<!-- MENU DE NAVEGACION -->
						<td class="n3t1f1c1">
								<h2 class="t2">Contents</h2>
								
								<?
								getChildren($IDDOCUMENT);
								?>
								<? writeGoback($IDDOCUMENT) ?>
						
<!-- WEB SYNDICATION -->
<p>
<A href="http://digg.com/submit?phase=2&amp;url=http://www.juantonio.info/jab_cms.php?id=<?=$IDDOCUMENT?>&amp;title=<?=$LEVEL2?>&amp;bodytext=<?=$LEVEL2?>"><IMG 
alt="Digg this page" 
src="r_media/images/syndication/digg.gif" border=0> 
</A><br>
<A href="http://www.google.com/bookmarks/mark?op=add&amp;title=<?=$LEVEL2?>&amp;labels=&amp;annotation=<?=$LEVEL2?>&amp;bkmk=http://www.juantonio.info/jab_cms.php?id=<?=$IDDOCUMENT?>"><IMG 
alt="Bookmark this page on Google" 
src="r_media/images/syndication/google.gif" border=0> 
</A><br>
<A href="http://reddit.com/submit?url=http://www.juantonio.info/jab_cms.php?id=<?=$IDDOCUMENT?>&amp;title=<?=$LEVEL2?>"><IMG 
alt="Submit this page to Reddit" 
src="r_media/images/syndication/reddit.gif" border=0> 
</A><br>
<A href="http://www.stumbleupon.com/submit?url=http://www.juantonio.info/jab_cms.php?id=<?=$IDDOCUMENT?>&amp;title=<?=$LEVEL2?>"><IMG 
alt="Stumble Upon this page" 
src="r_media/images/syndication/stumble.gif" border=0> 
</A><br>
<A href="http://del.icio.us/post?url=http://www.juantonio.info/jab_cms.php?id=<?=$IDDOCUMENT?>&amp;title=<?=$LEVEL2?>"><IMG 
alt="This page is del.icio.us!" 
src="r_media/images/syndication/delicious.gif" border=0> 
</A><br>
<A href="http://technorati.com/faves?add=http://www.juantonio.info/jab_cms.php?id=<?=$IDDOCUMENT?>"><IMG 
alt="Fave this page on Technorati" 
src="r_media/images/syndication/technorati.gif" 
border=0>
</A><br>
<A href="http://myweb2.search.yahoo.com/myresults/bookmarklet?u=http://www.juantonio.info/jab_cms.php?id=<?=$IDDOCUMENT?>&amp;title=<?=$LEVEL2?>"><IMG 
alt="Bookmark this page on Yahoo" 
src="r_media/images/syndication/yahoo.gif" border=0> 
</A><br>
</p>								
						</td>
						<td class="n3t1f1c2">
							<h2 class="t2"><? echo($LEVEL2) ?></h2>
<?
echo($CONTENT);
?>
<!-- GO TOP -->
<div align="right"><b><a href="#top">Top</a></b></div>
						</td>
					</tr>
				</table>
			<div id="footer">
				<div id="lbFooter">
					<table width="720" cellpadding="0" cellspacing="0" border="0">
						<tr>
							<td align="left" class="t6">
								<script type="text/javascript" language="JavaScript">
									WPCObject.writeFooter();
								</script>							
							</td>
							<td align="right" class="t6">
								<a href="jab_cms.php?id=133" target="_black" onclick="javascript:urchinTracker('/JAB_TOOLS/RSS')"><img src="r_media/images/icons/rss2.png" /></a>
								<a href="jab_cms.php?id=134" target="_black" onclick="javascript:urchinTracker('/JAB_TOOLS/ATOM')"><img src="r_media/images/icons/atom-icon.png" /></a>					
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</body>
</html>
