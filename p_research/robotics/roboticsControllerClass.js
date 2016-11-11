/*
Class: ServicesControllerClass
Description: Clase que controla la interaccion de la pagina web: default.htm
Author: JAB
Info: bren@juanantonio.info
Date of Creation: 2006.04.23
*/
function roboticsControllerClass(){
	this.error = false;
};

// Heredamos de WebPageControllerClass;
roboticsControllerClass.prototype = new WebPageControllerClass();

/***********************************
***** PROGRAMACION DE LOGO JAB *****
************************************/

roboticsControllerClass.prototype.logo_onClick = function(){
	if(!this.error){
		URL ="../../p_home/home.htm";
		this.redirect(URL);
	}
};

/*********************************************
***** PROGRAMACION DE EVENTOS DE VENTANA *****
*********************************************/

roboticsControllerClass.prototype.window_onLoad = function(){
	/*
	var helperObject = new HelperClass();
	helperObject.setTitle();

	var cbmObject = new ComboManagerClass("frmNavigation","cbNavigation");
	cbmObject.sort();
	cbmObject.selectByName('Research');
	*/
	document.location.href="http://www.juanantonio.info/jab_cms.php?id=28";
};

roboticsControllerClass.prototype.window_onError = function(msg,url,ln){
	alert(msg,url,ln);
	return true;
};

roboticsControllerClass.prototype.writeMenu = function(){
	document.write('<a href="robotics.htm">Introduction</a><br />');
	document.write('<a href="p_bots/bots.htm">Bots</a><br />');	
	document.write('<a href="p_lejos/lejos.htm">iCommand</a><br />');
	document.write('<a href="p_lejos/nxj.htm">leJOS NXJ</a><br />');
	document.write('<a href="p_nxtsharp/nxtsharp.htm">NXT#</a><br />');
	document.write('<a href="p_ai/ai.htm">AI</a><br />');	
	document.write('<a href="p_vc/vc.htm">Vision Command</a><br />');
	document.write('<a href="p_mechanics/mechanics.htm">Mechanics</a><br />');
	document.write('<a href="links.htm">Links</a><br />');
	return true;
};

roboticsControllerClass.prototype.writeMenuLevel2 = function(){
	document.write('<a href="../robotics.htm">Introduction</a><br />');
	document.write('<a href="../p_bots/bots.htm">Bots</a><br />');
	document.write('<a href="../p_lejos/lejos.htm">iCommand</a><br />');	
	document.write('<a href="../p_lejos/nxj.htm">leJOS NXJ</a><br />');
	document.write('<a href="../p_nxtsharp/nxtsharp.htm">NXT#</a><br />');
	document.write('<a href="../p_ai/ai.htm">AI</a><br />');
	document.write('<a href="../p_vc/vc.htm">Vision Command</a><br />');
	document.write('<a href="../p_mechanics/mechanics.htm">Mechanics</a><br />');
	document.write('<a href="../links.htm">Links</a><br />');
	return true;
};
