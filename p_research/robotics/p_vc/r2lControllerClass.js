/*
Class: ServicesControllerClass
Description: Clase que controla la interaccion de la pagina web: default.htm
Author: JAB
Info: bren@juanantonio.info
Date of Creation: 2006.04.23
*/
function r2lControllerClass(){
	
};
// Heredamos de WebPageControllerClass;
r2lControllerClass.prototype = new roboticsControllerClass();

/***********************************
***** PROGRAMACION DE LOGO JAB *****
************************************/

r2lControllerClass.prototype.logo_onClick = function(){
	if(!this.error){
		URL ="../../../p_home/home.htm";
		this.redirect(URL);
	}
};


