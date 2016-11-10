<?
require("p_admin/ewccc/config.php");
//Load EWCCC Front-end Library
require("r_php/ewccc/front-end/front-end_API.php");
?>
<?
//Default Web Page is ROOT
$IDDOCUMENT = 1;
updateCounter($IDDOCUMENT);
?>
<? 
echo '<?xml version="1.0" encoding="UTF-8"?>'; 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html dir="ltr" xml:lang="en" lang="en" xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta content='text/html; charset=UTF-8' http-equiv='Content-Type'/>
		<meta name="verify-v1" content="WIaS7oITIXqokH+Rg8hDQcTHJyriPqxFgOd9OAgT1lk=" />
		<!-- <meta http-equiv="refresh" content="300" /> -->
		<meta content='true' name='MSSmartTagsPreventParsing'/>
		<link rel="me" href="http://www.juanantonio.info/jab_cms.php?id=29" />
		<meta name="generator" content="Esmeta EWCCC" />

		<?
		writeMetadata($IDDOCUMENT);
		?>
		<!-- JAVASCRIPT -->
		<script src="r_javascript/esmeta/loader/LoaderClass_c.js" type="text/javascript" language="JavaScript"></script>
		<script language="JavaScript" type="text/javascript">
			<!--
				// LoaderClass esta basado en la tecnologia Dynapi 2.
				LoaderClass.setLibraryPath('r_javascript/');
				LoaderClass.include('esmeta.http.requestHttpClass.js');
				LoaderClass.include('esmeta.mvc.WebPageControllerClass.js');
				LoaderClass.include('esmeta.misc.ticker.js');
				LoaderClass.include('webcuts.misc.Webcuts.js');
				LoaderClass.include('deconcept.flash.swfobject.js');
			// -->
		</script>
		<!-- CARGA DE CLASE QUE MANEJA PAGINA -->
		<script src="quotes.js" type="text/javascript" language="JavaScript"></script>
		<script src="HomeControllerClass2.js" type="text/javascript" language="JavaScript"></script>
		<script type="text/javascript" language="JavaScript">
			<!--
				//Web Page Controller Object
				WPCObject = new HomeControllerClass();
				// Manejo de evento de carga.
				window.onload = WPCObject.window_onLoad;
				// Manejo de evento de errores.
				//window.onerror = WPCObject.window_onError;
			// -->
		</script>
		<link rel="stylesheet" href="r_css/jab7_home.css" type="text/css" />

		<!-- ICONO -->
		<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
	</head>
	<body>
		<!-- NIVEL 1: Logo -->
		<table cellpadding="0" cellspacing="0" class="n1t1">
			<tr>
				<td class="n1t1r1c1"><img src="r_media/images/pixel_transparente.gif" width="1" height="5" /></td>
			</tr>
		</table>	
		<!-- NIVEL 1.1 : Logo, Opciones, Tickker, Skype & Banner -->
		<table cellpadding="0" cellspacing="0" class="n1t2">
			<tr>
				<td class="n1t2r1c1">
					<div id="logo">
						<img src="r_media/images/jabLogo2003.gif" />
					</div>
					<div id="cbNavigation">
						<form action="#" method="post" name="frmNavigation" onsubmit="return WPCObject.frmNavigation_onSubmit(this)">
							<select class="cbNavigation" onchange="WPCObject.cbNavigation_onChange(this)" name="cbNavigation" id="cbNavigation">
								<?
								writeNavigationSystem();
								?>
							</select>
						</form>
					</div>
					<div id="ticker">
						<script type="text/javascript">
							//new domticker(name_of_message_array, CSS_ID, CSS_classname, pause_in_miliseconds, optionalfadeswitch)
							new domticker(tickercontent, "domticker", "someclass", 10000, "fadeit") 
						</script>
					</div>
					<div id="skype">
<!--
Skype 'My status' button
http://www.skype.com/go/skypebuttons
-->
<script type="text/javascript" src="http://download.skype.com/share/skypebuttons/js/skypeCheck.js"></script><!-- http://mystatus.skype.com/bigclassic/juanantoniobm -->
<a href="skype:juanantoniobm?call" onclick="javascript:urchinTracker('/JAB_TOOLS/SKYPE')"><img src="r_media/images/skypeStatus.gif" style="border: none;" width="182" height="44" alt="My status" /></a>
						<br /><img src="r_media/images/pixel_transparente.gif" width="1" height="7" /><br />
						&nbsp;&nbsp;&nbsp;<a href="http://www.linkedin.com/in/juanantoniobrenamoral" target="_blank" onclick="javascript:urchinTracker('/JAB/LINKEDIN')"><img src="r_media/images/home_linkedin.jpg" /></a>
						<br /><img src="r_media/images/pixel_transparente.gif" width="1" height="7" /><br />
						
						<table cellpadding="0" cellspacing="0" style="margin-left:10px;">
							<tr>
								<td>
									<!-- AddThis Button BEGIN -->
									<script type="text/javascript">var addthis_pub = "esmetaman";</script>
									<a href="http://www.addthis.com/bookmark.php" onmouseover="return addthis_open(this, '', '[URL]', '[TITLE]')" onmouseout="addthis_close()" onclick="return addthis_sendto()"><img src="http://s7.addthis.com/static/btn/lg-share-en.gif" width="125" height="16" border="0" alt="" /></a><script type="text/javascript" src="http://s7.addthis.com/js/152/addthis_widget.js"></script>
									<!-- AddThis Button END -->
								</td>
							</tr>
						</table>
						
						

					</div>
					
				</td>
				<!-- 
				MARKETING-ONLINE
				 -->
				<!--<td class="n1t2r1c2">-->
				<?
				$fcontents = join ('', file ('banners.txt'));
				$s_con = split("~",$fcontents);

				$banner_no = rand(0,(count($s_con)-1));
				echo $s_con[$banner_no];
				?>
				<!--</td>-->
			</tr>
		</table>	
		<table cellpadding="0" cellspacing="0" class="n2t1">
			<tr>
				<td class="n2t1r1c1"><img src="r_media/images/home_message2.jpg"/></td>
				<td class="n2t1r1c2"><img src="r_media/images/home_sections.jpg" /></td>
			</tr>
			<tr>
				<td class="n2t1r1c1"><img src="r_media/images/home_news.jpg" /></td>
				<td class="n2t1r1c2Plus"><a href="jab_cms.php?id=29"><img src="r_media/images/home_sections_industry.jpg" /></a></td>
			</tr>
			<tr>
				<td class="n2t1r2c1">
					<div id="feed"></div>
				</td>
				<td class="n2t1r2c2">
					<a href="jab_cms.php?id=29"><img src="r_media/images/home_section_resume.jpg" class="section" /></a>		

					<a href="jab_cms.php?id=29"><img src="r_media/images/home_section_management.jpg" class="section" /></a>

					<a href="jab_cms.php?id=277"><img src="r_media/images/home_section_java.jpg" class="section" /></a>

					<a href="jab_cms.php?id=277"><img src="r_media/images/home_section_android.jpg" class="section" /></a>

					<a href="jab_cms.php?id=29"><img src="r_media/images/home_section_about.jpg" class="section" /></a>
					
				</td>
			</tr>
			<tr>
				<td class="n2t1r1c1"><a href="/blog/" target="_blank"><img src="r_media/images/home_news_blog.jpg" /></a></td>
				<td class="n2t1r1c2Plus"><a href="jab_cms.php?id=5"><img src="r_media/images/home_sections_research.jpg" /></a></td>
			</tr>			
			<tr>
				<td class="n2t1r2c1">
					<div id="feed2"></div>
				</td>
				<td class="n2t1r2c2">
					<a href="jab_cms.php?id=28"><img src="r_media/images/home_section_robotics.jpg" class="section" /></a>
					
					<a href="#"><img src="r_media/images/home_section_ros.jpg" class="section" /></a>

					<a href="jab_cms.php?id=69"><img src="r_media/images/home_section_lejos.jpg" class="section" /></a>

					<a href="jab_cms.php?id=115"><img src="r_media/images/home_section_statistics.jpg" class="section" /></a>
				</td>
			</tr>
			<tr>
				<td class="n2t1r1c1"><a href="http://www.roboticaenlaescuela.es/blog/" target="_blank"><img src="r_media/images/home_news_classes.jpg" /></a></td>
				<td class="n2t1r1c2Plus"><a href="jab_cms.php?id=275"><img src="r_media/images/home_sections_education.jpg" /></a></td>
			</tr>				
			<tr>
				<td class="n2t1r2c1">
					<div id="feed3"></div>
				</td>
				<td class="n2t1r2c2">
					
					<a href="#"><img src="r_media/images/home_section_peac.jpg" class="section" /></a>

					<a href="jab_cms.php?id=206"><img src="r_media/images/home_section_ebook.jpg" class="section" /></a>

					<a href="http://mindstorms.lego.com/en-us/community/books/default.aspx" target="_blank"><img src="r_media/images/home_section_book.jpg" class="section" /></a>
				</td>
			</tr>						
		</table>
		<table width="1000" cellpadding="0" cellspacing="0" class="footer">
			<tr>
				<td align="left" valign="top" class="footer">
					<script type="text/javascript" language="JavaScript">
						WPCObject.writeFooter();
					</script>
				</td>
				<td align="right">
					<a href="jab_cms.php?id=133" target="_black" onclick="javascript:urchinTracker('/JAB_TOOLS/RSS')"><img src="r_media/images/icons/rss2.png" /></a>
					<a href="jab_cms.php?id=134" target="_black" onclick="javascript:urchinTracker('/JAB_TOOLS/ATOM')"><img src="r_media/images/icons/atom-icon.png" /></a>
				</td>
			</tr>
		</table>
		<!-- FEED SCRIPT -->
		<script type="text/javascript" src="http://www.google.com/jsapi?key=ABQIAAAAR1zDMKGhcecfu70AeJS9aBTvTSPBm7YhKP40dQd-HrUYKxPRTRTkozRzXSSRILpzbxAk0JpJdh9tDA"></script>
	    <script type="text/javascript">
			function write(text,id){
				if (document.getElementById)
				{
					x = document.getElementById(id);
					x.innerHTML = '';
					x.innerHTML = text;
				}
				else if (document.all)
				{
					x = document.all[id];
					x.innerHTML = text;
				}
				else if (document.layers)
				{
					x = document.layers[id];
					text2 = '<P CLASS="testclass">' + text + '</P>';
					x.document.open();
					x.document.write(text2);
					x.document.close();
				}
			};

		    google.load("feeds", "1");

		    function initialize() {
		      var feed = new google.feeds.Feed("http://www.juanantonio.info/rss.php");
		      feed.setNumEntries(8);
		      feed.load(function(result) {
		        if (!result.error) {
		          var container = document.getElementById("feed");
		          var title = "";//"<b>Latest updates in web site:</b><br />";
		          //write(title,"feed");
		          var links = ""
		          for (var i = 0; i < result.feed.entries.length; i++) {
		            var entry = result.feed.entries[i];
		            links += "<a href='" + entry.link + "' class='rss'>" + entry.title + "</a><br />"; 
		          }
		          write(title+links,"feed");
		        }
		      });
		    }
		    
		    google.setOnLoadCallback(initialize);
		    
		   	//google.load("feeds", "1");

		    function initialize2() {
		      var feed = new google.feeds.Feed("http://www.juanantonio.info/blog/feed/");
		      feed.setNumEntries(8);
		      feed.load(function(result) {
		        if (!result.error) {
		          var container = document.getElementById("feed");
		          var title = "";//"<b>Latest updates in web site:</b><br />";
		          //write(title,"feed");
		          var links = ""
		          for (var i = 0; i < result.feed.entries.length; i++) {
		            var entry = result.feed.entries[i];
		            links += "<a href='" + entry.link + "' class='rss'>" + entry.title + "</a><br />"; 
		          }
		          write(title+links,"feed2");
		        }
		      });
		    }
		    google.setOnLoadCallback(initialize2);
		    
		    function initialize3() {
		      var feed = new google.feeds.Feed("http://www.roboticaenlaescuela.es/blog/feed/");
		      feed.setNumEntries(8);
		      feed.load(function(result) {
		        if (!result.error) {
		          var container = document.getElementById("feed");
		          var title = "";//"<b>Latest updates in web site:</b><br />";
		          //write(title,"feed");
		          var links = ""
		          for (var i = 0; i < result.feed.entries.length; i++) {
		            var entry = result.feed.entries[i];
		            links += "<a href='" + entry.link + "' class='rss'>" + entry.title + "</a><br />"; 
		          }
		          write(title+links,"feed3");
		        }
		      });
		    }
		    google.setOnLoadCallback(initialize3);		    
	    </script>
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
	</body>
</html>
