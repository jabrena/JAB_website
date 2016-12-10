function ventana(url,ww,wh,titulo){
	var XHTML;
	var win = window.open('','win','width=' + ww +',height='+ wh);

	var NewX = (screen.availWidth/2)-(ww/2);
	var NewY = (screen.availHeight/2)-(wh/2);
	win.moveTo(NewX, NewY);
	NewX = null;
	NewY = null;

	var x = win.document;
	
	XHTML = "<style>body{margin : 0px 0px 0px 0px}</style>";
	XHTML += "<img SRC='r_media/proyectos/" + url + "' border='0' />";
	x.write(XHTML)
	x.close();
	win.focus();
}

function ajustar(ww,wh){
	this.resizeTo(ww, wh);
	var NewX = (screen.availWidth/2)-(ww/2);
	var NewY = (screen.availHeight/2)-(wh/2);
	this.moveTo(NewX, NewY);
	NewX = null;
	NewY = null;
}

function openWindow2(URL, width, height) {
	OpenedWin = window.open(URL, "demo_window", "width="+width+",height="+height+",status=no,menubar=no,location=no,toolbar=no,directories=no,scrollbars=yes");
	//if (! is_aol){
		var NewX = (screen.availWidth/2)-(width/2);
		var NewY = (screen.availHeight/2)-(height/2);
		OpenedWin.moveTo(NewX, NewY);
		NewX = null;
		NewY = null;
	//}
	OpenedWin.focus();
}

//Animated Window- By Rizwan Chand (rizwanchand@hotmail.com)
//Modified by DD for NS compatibility
//Visit http://www.dynamicdrive.com for this script

esmetaClass.prototype.openWindow = function(website){
	var windowprops='width=100,height=100,scrollbars=yes,status=no,resizable=no,fullscreen=no'
	var heightspeed = 2; // vertical scrolling speed (higher = slower)
	var widthspeed = 7;  // horizontal scrolling speed (higher = slower)
	var leftdist = 10;    // distance to left edge of window
	var topdist = 10;     // distance to top edge of window
if (window.resizeTo&&navigator.userAgent.indexOf("Opera")==-1) {
	var winwidth = window.screen.availWidth - leftdist;
	var winheight = window.screen.availHeight - topdist;
	var sizer = window.open("","","left=" + leftdist + ",top=" + topdist +","+ windowprops);
	for (sizeheight = 1; sizeheight < winheight; sizeheight += heightspeed)
		sizer.resizeTo("1", sizeheight);
	for (sizewidth = 1; sizewidth < winwidth; sizewidth += widthspeed)
		sizer.resizeTo(sizewidth, sizeheight);
		sizer.location = website;
}
else
	window.open(website,'mywindow');
}