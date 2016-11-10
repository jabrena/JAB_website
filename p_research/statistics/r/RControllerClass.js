/*
Class: ServicesControllerClass
Description: Clase que controla la interaccion de la pagina web: default.htm
Author: JAB
Info: bren@juanantonio.info
Date of Creation: 2006.04.23
*/
function RControllerClass(){
	this.error = false;
	
	//Encapsule HELPER DATA
	this.title;
	this.X 
};
// Heredamos de WebPageControllerClass;
RControllerClass.prototype = new WebPageControllerClass();

/***********************************
***** PROGRAMACION DE LOGO JAB *****
************************************/

RControllerClass.prototype.logo_onClick = function(){
	if(!this.error){
		URL ="../../../p_home/home.htm";
		this.redirect(URL);
	}
};

/*********************************************
***** PROGRAMACION DE EVENTOS DE VENTANA *****
*********************************************/

RControllerClass.prototype.window_onLoad = function(){
	var helperObject = new HelperClass();
	helperObject.setTitle();

	var cbmObject = new ComboManagerClass("frmNavigation","cbNavigation");
	cbmObject.sort();
	cbmObject.selectByName('Research');
};

RControllerClass.prototype.window_onError = function(msg,url,ln){
	alert(msg,url,ln);
	return true;
};

RControllerClass.prototype.writeTitle = function(){
	//alert(this.title)
	document.write(WEB_TITLE)
	return true;
};

RControllerClass.prototype.writeRMenu = function(){
	document.write('<a href="r.htm">Introduction</a><br />');
	document.write('<a href="links.htm">Links</a><br />');
	document.write('<a href="scripts.htm">Scripts</a><br />');
	document.write('<a href="projects.htm">Projects</a><br />');
	document.write('<a href="r_php.htm">R & PHP</a><br />');
	document.write('<a href="forecasting.htm">Time Series Forecasting</a><br />');
	document.write('<a href="ts.htm">ARIMA</a><br />');
	return true;
};
