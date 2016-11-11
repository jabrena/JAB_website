/*
Class: WebPageControllerClass
Description: Clase generica que maneja las operaciones basicas que debe emplear todas las 
clases que gestionan la interacion con el cliente.
Author: JAB
Info: bren@juanantonio.info
Fecha: 05/09/2003
Actualizaci?n: 15/01/2006
*/

// Clase que heredan todas las clases que controlan las interacciones Javascript de todos los ficheros
// del proyecto JAB 5.0 
function WebPageControllerClass(){
	//Empty
};

/*******************
***** HERENCIA *****
********************/

//Heredamos de la clase httpRequestClass que controla el protocolo http
WebPageControllerClass.prototype = new httpRequestClass();

/***************************
***** METODOS PUBLICOS *****
***************************/

WebPageControllerClass.prototype.writeNavigationSystem = function(){
	//document.write('<option value="@">Select Jab area</option>');
	document.write('<option value="http://www.juanantonio.info/p_resume/resume.htm">Resume</option>');
	document.write('<option value="http://www.juanantonio.info/p_contact/contact.htm">Contact</option>');
	document.write('<option value="http://www.juanantonio.info/p_services/services.htm">Services</option>');
	document.write('<option value="http://www.juanantonio.info/p_articles/articles.htm">Articles</option>');
	document.write('<option value="http://www.juanantonio.info/p_donations/donations.htm">Donations</option>');
	//document.write('<option value="http://www.juanantonio.info/p_customers/customers.htm">Customers</option>');
	//document.write('<option value="http://www.juanantonio.info/p_library/library.htm">Library</option>');
	document.write('<option value="http://www.juanantonio.info/p_home/home.htm">Home</option>');
	document.write('<option value="http://www.juanantonio.info/p_research/research.htm">Research</option>');
	//document.write('<option value="http://www.juanantonio.info/sitemap.htm">Site Map</option>');
	document.write('<option value="http://www.juanantonio.info/p_photos/photos.htm">Photos</option>');
	document.write('<option value="http://www.juanantonio.info/p_software/software.htm">Software</option>');
	//document.write('<option value="http://www.juanantonio.info/p_films/films.htm">Films</option>');
	
	return true;
};

WebPageControllerClass.prototype.writeFooter = function(){
  	var FECHA = new Date();
  	var ANHO = FECHA.getYear();
  	if(ANHO < 2000) { ANHO = ANHO + 1900; }
 
	//CSS STYLE
	document.write('<style type="text/css">')
	document.write('a.esmeta{text-decoration: none;	color: #000000;}')
	document.write('a.esmeta:link{text-decoration: none;}')
	document.write('a.esmeta:visited{text-decoration: none;}') 
	document.write('a.esmeta:hover{text-decoration: underline;}')
	document.write('</style>')

	document.write('<a href="http://www.esmeta.es" class="esmeta" target="_blank">Esmeta</a> &reg; 1997-'+ ANHO);
	return true;
};

//The origin of the code.
//http://www.quirksmode.org/js/lastmod.html

WebPageControllerClass.prototype.lastMod = function(){
	var x = new Date (document.lastModified);
	Modif = new Date(x.toGMTString());
	Year = this.takeYear(Modif);
	Month = Modif.getMonth();
	Day = Modif.getDate();
	Mod = (Date.UTC(Year,Month,Day,0,0,0))/86400000;
	x = new Date();
	today = new Date(x.toGMTString());
	Year2 = this.takeYear(today);
	Month2 = today.getMonth();
	Day2 = today.getDate();
	now = (Date.UTC(Year2,Month2,Day2,0,0,0))/86400000;
	daysago = now - Mod;
	if (daysago < 0) return '';
	unit = 'days';
	if (daysago > 730)
	{
		daysago = Math.floor(daysago/365);
		unit = 'years';
	}
	else if (daysago > 60)
	{
		daysago = Math.floor(daysago/30);
		unit = 'months';
	}
	else if (daysago > 14)
	{
		daysago = Math.floor(daysago/7);
		unit = 'weeks'
	}
	var towrite = 'Page last changed ';
	if (daysago == 0) towrite += 'today';
	else if (daysago == 1) towrite += 'yesterday';
	else towrite += daysago + ' ' + unit + ' ago';
	return towrite;
}


WebPageControllerClass.prototype.takeYear = function(theDate){
	x = theDate.getYear();
	var y = x % 100;
	y += (y < 38) ? 2000 : 1900;
	return y;
}


WebPageControllerClass.prototype.writeLastModified = function(){
	document.write(this.lastMod())
	return true;
};

/********************************
***** EVENTOS EN DOCUMENTOS *****
********************************/

//Metodo que bloquea el envio de datos a traves del formulario de navegacion
WebPageControllerClass.prototype.frmNavigation_onSubmit = function(){
	return false;
};

//Metodo que controla el evento de seleccionar un 
WebPageControllerClass.prototype.cbNavigation_onChange = function(obj){
	if(!this.error){
		if(obj.value != "@"){
			if(obj.value != "*"){
				this.actionTarget = obj.value;
				this.redirect(obj.value)
			}else{
				alert('Sorry, this Jab Area isn?t available.');
			}
		}
	}
};

//Metodo publico que controla los errores en pagina
WebPageControllerClass.prototype.window_onError = function(msg,url,ln){
	alert(msg,url,ln);
	return true;
};