<?
require("p_admin/ewccc/config.php");
//Load EWCCC Front-end Library
require("r_php/ewccc/front-end/front-end_API.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html dir="ltr" xml:lang="es" lang="es" xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<?
		writeMetadata($IDDOCUMENT);
		?>
		<meta name="verify-v1" content="WIaS7oITIXqokH+Rg8hDQcTHJyriPqxFgOd9OAgT1lk=" />
		<!-- JAVASCRIPT -->
		<script src="r_javascript/esmeta/loader/LoaderClass_c.js" type="text/javascript" language="JavaScript"></script>
		<script language="JavaScript" type="text/javascript">
			<!--
				// LoaderClass esta basado en la tecnologia Dynapi 2.
				LoaderClass.setLibraryPath('r_javascript/');
				LoaderClass.include('esmeta.helpers.HelperClass.js');
				LoaderClass.include('esmeta.http.requestHttpClass.js');
				LoaderClass.include('esmeta.mvc.WebPageControllerClass.js');
				LoaderClass.include('esmeta.misc.ticker.js');
				LoaderClass.include('webcuts.misc.Webcuts.js');
				LoaderClass.include('deconcept.flash.swfobject.js');
			// -->
		</script>
		<!-- CARGA DE CLASE QUE MANEJA PAGINA -->
		<script src="HomeControllerClass.js" type="text/javascript" language="JavaScript"></script>
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
		<link rel="stylesheet" href="r_css/jab6_home.css" type="text/css" />

		<!-- ICONO -->
		<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
		
<script type="text/javascript">

/*Example message arrays for the two demo scrollers*/

var tickercontent=new Array()
tickercontent[tickercontent.length]='<b>Winston Churchill</b><br />A pessimist sees the difficulty in every opportunity; an optimist sees the opportunity in every difficulty.';
tickercontent[tickercontent.length]='<b>Winston Churchill</b><br />All the great things are simple, and many can be expressed in a single word: freedom, justice, honor, duty, mercy, hope.';
tickercontent[tickercontent.length]='<b>Winston Churchill</b><br />Difficulties mastered are opportunities won.';
tickercontent[tickercontent.length]='<b>Winston Churchill</b><br />Never worry about action, but only inaction.';
tickercontent[tickercontent.length]='<b>Winston Churchill</b><br />Never, never, never give up.';
tickercontent[tickercontent.length]='<b>Aristotle</b><br />All human actions have one or more of these seven causes: chance, nature, compulsion, habit, reason, passion, and desire.';
tickercontent[tickercontent.length]='<b>Aristotle</b><br />Education is the best provision for the journey to old age.';
tickercontent[tickercontent.length]='<b>Aristotle</b><br />Man perfected by society is the best of all animals; he is the most terrible of all when he lives without law, and without justice.';
tickercontent[tickercontent.length]='<b>Confucius</b><br />I hear and I forget. I see and I remember. I do and I understand.';
tickercontent[tickercontent.length]='<b>Confucius</b><br />Respect yourself and others will respect you.';
tickercontent[tickercontent.length]='<b>Albert Einstein</b><br />It is a miracle that curiosity survives formal education.';
tickercontent[tickercontent.length]='<b>Albert Einstein</b><br />The important thing is not to stop questioning.';
tickercontent[tickercontent.length]='<b>Albert Einstein</b><br />The most beautiful thing we can experience is the mysterious. It is the source of all true art and science.';
tickercontent[tickercontent.length]='<b>Lao-tzu</b><br />A journey of a thousand miles begins with a single step.';
tickercontent[tickercontent.length]='<b>Lao-tzu</b><br />People are difficult to govern because they have too much knowledge.';
tickercontent[tickercontent.length]='<b>Abraham Lincoln</b><br />Better to remain silent and be thought a fool than to speak out and remove all doubt.';
tickercontent[tickercontent.length]='<b>Abraham Lincoln</b><br />When I do good, I feel good; when I do bad, I feel bad, and that is my religion.';
tickercontent[tickercontent.length]='<b>Abraham Lincoln</b><br />When I do good, I feel good; when I do bad, I feel bad, and that is my religion.';
tickercontent[tickercontent.length]='<b>Seneca</b><br />All art is an imitation of nature.';
tickercontent[tickercontent.length]='<b>Seneca</b><br />Difficulties strengthen the mind, as labour the body.';
tickercontent[tickercontent.length]='<b>Seneca</b><br />If one does not know to which port one is sailing, no wind is favorable.';
tickercontent[tickercontent.length]='<b>Socrates</b><br />The only good is knowledge and the only evil is ignorance.';
tickercontent[tickercontent.length]='<b>Socrates</b><br />I know nothing except the fact of my ignorance.';
tickercontent[tickercontent.length]='<b>German Proverb</b><br />Never give advice unless asked.';
tickercontent[tickercontent.length]='<b>Patricia Neal</b><br />A strong positive mental attitude will create more miracles than any wonder drug.';
tickercontent[tickercontent.length]='<b>Gottingen</b><br />We have to know and we are going to know.';
tickercontent[tickercontent.length]='<b>Socrates</b><br />There is a unique good, The knowledge; There is a unique evil, the ignorance.';
tickercontent[tickercontent.length]='<b>Juan Antonio Breña Moral</b><br />Life is similar to Jazz Music, apparent improvisation.';
tickercontent[tickercontent.length]='<b>Donald Knuth</b><br />Premature optimization is the root of all evil.';
tickercontent[tickercontent.length]='<b>Unknown</b><br />In vino veritas.';
tickercontent[tickercontent.length]='<b>Theodore Roosevelt</b><br />Be practical as well as generous in your ideals. Keep your eyes on the stars, but remember to keep your feet on the ground.';
tickercontent[tickercontent.length]='<b>Theodore Roosevelt</b><br />I wish to preach, not the doctrine of ignoble ease, but the doctrine of the strenuous life.';
tickercontent[tickercontent.length]='<b>Abraham Lincoln </b><br />Give me six hours to chop down a tree and I will spend the first four sharpening the axe.';
tickercontent[tickercontent.length]='<b>Seneca</b><br />A happy life is one which is in accordance with its own nature.';
tickercontent[tickercontent.length]='<b>Seneca</b><br />Brave men rejoice in adversity, just as brave soldiers triumph in war.';
tickercontent[tickercontent.length]='<b>Seneca</b><br />Difficulties strengthen the mind, as labor does the body.';
tickercontent[tickercontent.length]='<b>Seneca</b><br />Genius always gives its best at first; prudence, at last.';
tickercontent[tickercontent.length]='<b>Seneca</b><br />If you judge, investigate.';
tickercontent[tickercontent.length]='<b>Seneca</b><br />If you wished to be loved, love.';
tickercontent[tickercontent.length]='<b>Seneca</b><br />Love in its essence is spiritual fire.';
tickercontent[tickercontent.length]='<b>Seneca</b><br />The heart is great which shows moderation in the midst of prosperity.';
tickercontent[tickercontent.length]='<b>Seneca</b><br />Time discovers truth.';
tickercontent[tickercontent.length]='<b>Napoleon</b><br />Ability is nothing without opportunity.';
tickercontent[tickercontent.length]='<b>Napoleon</b><br />If you want a thing done well, do it yourself.';
tickercontent[tickercontent.length]='<b>Napoleon</b><br />Imagination rules the world.';
tickercontent[tickercontent.length]='<b>Napoleon</b><br />Impossible is a word to be found only in the dictionary of fools.';
tickercontent[tickercontent.length]='<b>Napoleon</b><br />One must change one s tactics every ten years if one wishes to maintain one s superiority.';
tickercontent[tickercontent.length]='<b>Napoleon</b><br />Victory belongs to the most persevering.';


tickercontent.sort(randOrd);

//Funcion created to sort with Random criteria
function randOrd(){
	return (Math.round(Math.random())-0.5);
}

</script>
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
      feed.setNumEntries(6)
      feed.load(function(result) {
        if (!result.error) {
          var container = document.getElementById("feed");
          var title = "<b>Latest News:</b><br />";
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
 
    </script>		
	</head>
	<body>
		<form name="frmNavigationHelper" id="frmNavigationHelper" action="#">
			<input type="hidden" name="wpSite" id="wpSite" value="Juanantonio.info" />
			<input type="hidden" name="wpArea" id="wpArea" value="Home" />
			<input type="hidden" name="wpTitle" id="wpTitle" value="Industrial Consultant Services." />
		</form>
		<div id="frame">
			<!-- NIVEL 1: Logo -->
			<table cellpadding="0" cellspacing="0" class="n1t1">
				<tr>
					<td bgcolor="#B22222"><img src="r_media/images/pixel_transparente.gif" width="1" height="5" /></td>
				</tr>
			</table>
			<table cellpadding="0" cellspacing="0" class="n1t1">
				<tr>
					<td><img src="r_media/images/pixel_transparente.gif" width="1" height="270" /></td>
					<td valign="top">

<script type="text/javascript">

//new domticker(name_of_message_array, CSS_ID, CSS_classname, pause_in_miliseconds, optionalfadeswitch)

new domticker(tickercontent, "domticker", "someclass", 10000, "fadeit") 
</script>

					</td>
				</tr>
			</table>
			<!-- NIVEL 2: Title & Menu System 1 -->
			<table cellpadding="0" cellspacing="0" class="n2t1">
				<tr>
					<td class="n2t1r1c1">
						<script type="text/javascript" language="JavaScript">
							var helperObject = new HelperClass();
							helperObject.writeTitle();
						</script>
					</td>
					<td class="n2t1r1c2">
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
			<!-- NIVEL 3: Contents -->
			<table cellpadding="0" cellspacing="0" class="n3t1">
				<tr>
					<td class="n3t1c1">
					<a href="jab_cms.php?id=28">
					<img src="r_media/images/robotics1.jpg" name="robotics" />
					</a>
					</td>
					<td class="n3t1c2">
					<a href="jab_cms.php?id=46">
					<img src="r_media/images/web1.jpg" name="web" /></a></td>
					<td class="n3t1c3">
					<a href="jab_cms.php?id=39">
					<img src="r_media/images/businessIntelligence1.jpg" name="businessIntelligence"  /></a></td>
					<td class="n3t1c4">
					<a href="jab_cms.php?id=115">
					<img src="r_media/images/dataMining1.jpg"  name="dataMining" /></a></td>
					<td class="n3t1c5">
			<!--
Skype 'My status' button
http://www.skype.com/go/skypebuttons
-->
<br />
&nbsp;&nbsp;&nbsp;
<script type="text/javascript" src="http://download.skype.com/share/skypebuttons/js/skypeCheck.js"></script><!-- http://mystatus.skype.com/bigclassic/juanantoniobm -->
<a href="skype:juanantoniobm?call" onclick="javascript:urchinTracker('/JAB_TOOLS/SKYPE')"><img src="r_media/images/skypeStatus.gif" style="border: none;" width="182" height="44" alt="My status" /></a>
<br /><br /><br />


<div id="feed"></div>
					</td>
				</tr>
				<tr>
					<td colspan="2"><img src="r_media/images/pixel_transparente.gif" width="1" height="1" alt="" /></td>
				</tr>
			</table>
		<div id="footer">
				<div id="lbFooter">
					<table width="720" cellpadding="0" cellspacing="0" border="0">
						<tr>
							<td align="left" valign="top" class="t6">
								<script type="text/javascript" language="JavaScript">
									WPCObject.writeFooter();
								</script>							
							</td>
							<td align="right">
								<a href="jab_cms.php?id=133" target="_black" onclick="javascript:urchinTracker('/JAB_TOOLS/RSS')"><img src="r_media/images/icons/rss2.png" /></a>
								<a href="jab_cms.php?id=134" target="_black" onclick="javascript:urchinTracker('/JAB_TOOLS/ATOM')"><img src="r_media/images/icons/atom-icon.png" /></a>
								<br />					
								<p id="player1"><a href="http://www.macromedia.com/go/getflashplayer">Get the Flash Player</a> to see this player.</p>
								<script type="text/javascript">
									var podCasts =new Array();
									podCasts[podCasts.length] = "http://media.switchpod.com/users/lasterk/ftp/creative_keys.mp3";
									podCasts[podCasts.length] = "http://www.dhpmixes.com/mixes/larryheard040803.mp3";
									podCasts[podCasts.length] = "http://dhpmixes.com/mixes/DHP_101.mp3";
									podCasts[podCasts.length] = "http://libsyn.com/media/blogspain/nfs15_13sept05.MP3";
									
									podCasts.sort(randOrd);									
									var podCastUrl = podCasts[0] + "&autostart=true";
												
									var s1 = new SWFObject("r_media/flash/mp3/mp3player.swf", "line", "170", "20", "7");
									s1.addVariable("file",podCastUrl);
									s1.addVariable("repeat","true");
									s1.addVariable("width","170");
									s1.addVariable("height","20");
									s1.addVariable("autostart","true");
									
									s1.write("player1");
								</script>			
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
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