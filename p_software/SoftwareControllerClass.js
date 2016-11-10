/*
Class: ServicesControllerClass
Description: Clase que controla la interaccion de la pagina web: default.htm
Author: JAB
Info: bren@juanantonio.info
Date of Creation: 2006.04.23
*/
function SoftwareControllerClass(){
	this.error = false;
	
	//Encapsule HELPER DATA
	this.title;
	this.X 
};
// Heredamos de FormControllerClass;
SoftwareControllerClass.prototype = new WebPageControllerClass();

/***********************************
***** PROGRAMACION DE LOGO JAB *****
************************************/

SoftwareControllerClass.prototype.logo_onClick = function(){
	if(!this.error){
		URL ="../p_home/home.htm";
		this.redirect(URL);
	}
};

/*********************************************
***** PROGRAMACION DE EVENTOS DE VENTANA *****
*********************************************/

SoftwareControllerClass.prototype.window_onLoad = function(){
	var helperObject = new HelperClass();
	helperObject.setTitle();

	var cbmObject = new ComboManagerClass("frmNavigation","cbNavigation");
	cbmObject.sort();
	cbmObject.selectByName('Software');
};

SoftwareControllerClass.prototype.window_onError = function(msg,url,ln){
	alert(msg,url,ln);
	return true;
};

SoftwareControllerClass.prototype.writeTitle = function(){
	//alert(this.title)
	document.write(WEB_TITLE)
	return true;
};

SoftwareControllerClass.prototype.writeRMenu = function(){
	document.write('<a href="#PROJECT">Project management</a><br />');
	document.write('<a href="#DATANALYSIS">Data analysis</a><br />');
	document.write('<a href="#ERP">ERP / Groupware</a><br />');
	document.write('<a href="#ENGINEERING">Engineering</a><br />');
	document.write('<a href="#DB">Database</a><br />');
	document.write('<a href="#WEB">Web development</a><br />');
	document.write('<a href="#MKONLINE">Marketing On-line</a><br />');
	document.write('<a href="#PIM">Personal Information Management</a><br />');

		
	return true;
};
