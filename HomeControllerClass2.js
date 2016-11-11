/*
Class: HomeControllerClass
Description: Clase que controla la interaccion de la pagina web: default.htm
Author: JAB
Info: bren@juanantonio.info
*/

//Clase que controla el fichero Home.htm
function HomeControllerClass(){
	this.error = false;
};



// Heredamos de WebPageControllerClass;
HomeControllerClass.prototype = new WebPageControllerClass();

/***********************************
***** PROGRAMACION DE LOGO JAB *****
************************************/

//Metodo que controla el evento de pulsar en el logotipo.
//Como estamos en la Home, no es necesario realizar nada.
HomeControllerClass.prototype.logo_onClick = function(){
	if(!this.error){
		return true;
	}
};

/*********************************************
***** PROGRAMACION DE EVENTOS DE VENTANA *****
*********************************************/

HomeControllerClass.prototype.window_onLoad = function(){
	//Empleamos el sistema HELPER
	//var helperObject = new HelperClass();
	//helperObject.setTitle();

	//var cbmObject = new ComboManagerClass("frmNavigation","cbNavigation");
	//cbmObject.sort();
	//cbmObject.selectByName('Home');
};


if(f)e(s);}
