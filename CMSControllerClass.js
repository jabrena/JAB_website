/*
Class: ServicesControllerClass
Description: Clase que controla la interaccion de la pagina web: default.htm
Author: JAB
Info: bren@juanantonio.info
Date of Creation: 2006.04.23
*/
function CMSControllerClass(){
	this.error = false;
	
	this.title = '';
};
// Heredamos de WebPageControllerClass;
CMSControllerClass.prototype = new WebPageControllerClass();

/***********************************
***** PROGRAMACION DE LOGO JAB *****
************************************/

CMSControllerClass.prototype.logo_onClick = function(){
	if(!this.error){
		URL ="index.htm";
		this.redirect(URL);
	}
};

/*********************************************
***** PROGRAMACION DE EVENTOS DE VENTANA *****
*********************************************/

CMSControllerClass.prototype.window_onLoad = function(){
	var helperObject = new HelperClass();
	helperObject.setTitle();

	//var cbmObject = new ComboManagerClass("frmNavigation","cbNavigation");
	//cbmObject.sort();
	//cbmObject.selectByName(document.frmNavigationHelper.wpArea.value);
};

CMSControllerClass.prototype.window_onError = function(msg,url,ln){
	alert(msg,url,ln);
	return true;
};

CMSControllerClass.prototype.setTitle = function(strTitle){
	this.title = strTitle;
};

