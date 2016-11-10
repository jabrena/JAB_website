/*
Class: DefaultControllerClass
Description: Clase que controla la interaccion de la pagina web: default.htm
Author: JAB
Info: bren@juanantonio.info
*/

function DefaultControllerClass(){
	this.error = false;
	this.actionTarget = "";
	this.webControllerUrl = "r_controller/webController.htm";
};

/*******************
***** HERENCIA *****
********************/

DefaultControllerClass.prototype = new WebPageControllerClass();

/***************************
***** METODOS INTERNOS *****
***************************/

DefaultControllerClass.prototype.init = function(){
	// Instanciamos objeto de la clase UJBS, Ultimate Javascript Browser Sniffer.
	sniffer = new ujbsClass();
	sniffer.moduloNavegador();

	var blValido = false;

	var navegadorBeta = 'Firebird'
	//Restricciones
	if((sniffer.is_gecko) && (sniffer.is_major >= 1)) blValido = true;
	if(sniffer.is_nav6up) blValido = true;
	if(sniffer.is_opera5up) blValido = true;
	if(sniffer.is_ie5up) blValido = true;
	if(sniffer.agt.indexOf(navegadorBeta) != -1) blValido = false;

	if(blValido){
		this.actionTarget = "do.Default";
	}else{
		this.actionTarget = "500";
	}
	this.send(this.actionTarget);
};

/*********************************************
***** PROGRAMACION DE EVENTOS DE VENTANA *****
*********************************************/

DefaultControllerClass.prototype.window_onLoad = function(){
	this.init();
};

DefaultControllerClass.prototype.window_onError = function(msg,url,ln){
	alert(msg,url,ln);
	return true;
};
