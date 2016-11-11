/*
Class: UserAdminControllerClass
Description: Clase que controla la interaccion de la pagina web: Index.htm
Author: JAB
Info: bren@juanantonio.info
*/

//Clase que controla el fichero Home.htm
function BasicControllerClass(){
	this.error = false;
};

/*************************
***** FOOTER METHODS *****
*************************/

BasicControllerClass.prototype.writeFooter = function(){
  	var FECHA = new Date();
  	var ANHO = FECHA.getYear();
  	if(ANHO < 2000) { ANHO = ANHO + 1900; }
 
	//CSS STYLE
	document.write('<style type="text/css">');
	document.write('p.esmeta_footer{font-family: Verdana, Geneva, Arial, Helvetica, sans-serif;	font-size: 10px;}')
	document.write('p.esmeta_footer{margin-left: 20px; text-align: left;}')
	document.write('a.esmeta{text-decoration: none;	color: #000000;	}');
	document.write('a.esmeta:link{text-decoration: none;}');
	document.write('a.esmeta:visited{text-decoration: none;}'); 
	document.write('a.esmeta:hover{text-decoration: underline;}');
	document.write('</style>');

	document.write('<p class="esmeta_footer"><a href="http://www.esmeta.es" class="esmeta" target="_blank">Esmeta</a> &reg; 1997-'+ ANHO + '</p><br />');
	return true;
};

/*********************
***** LOAD EVENT *****
*********************/

BasicControllerClass.prototype.window_onLoad = function(){
	//Empty
};