// Logica transferida de Dennis Salguero, Beridney Computer Services, en su articulo "ASP & JavaScript: Enhancing Applications" de WROX Conferences.
// Logica transferida de International Data Form Validation de Netscape Corporation..
// Reingenieria de Esmeta Secure Systems para objeto de negocio de Subscripciones 1.0.
// 30/09/2002.
// Mejora del sistema universal de validacion con integracion de H.M. e-systems y empleo del mejor Script hasta la fecha de validacion de email.

function warn(what){
	//alert('Disculpe, pero debe indicar correctamente '+what+'.');
	alert(what)
	//alert ('Para poder subscribirse al boletin de\nEsmeta Secure Systems, rellene un Email valido.');
}
function check(obj,what,on){
	if(on){
		if(obj.value==what){
			obj.value=''
		}
	}else{
		if(obj.value==''){
			obj.value=what
		}
	}
}
/*
function validate(obj){
	//var valor = IsValidEMail(obj.subcripcion.value);
	//alert(valor);
	if(IsValidEMail(obj.subcripcion.value) == false){
		warn('Para poder subscribirse al boletin de\nEsmeta Secure Systems, rellene un Email valido.');
		obj.subcripcion.value = '';
		obj.subcripcion.focus();
		return false;
	}else{
		document.subscripciones.action='subscripciones.aspx';
		return true;
	}
}
*/
/*
function validarBusqueda(obj){
	if(((obj.buscador.value) == '') || ((obj.buscador.value) == 'Googlear')){
		warn('Emplee un termino adecuado para la busqueda que desea realizar');
		obj.buscador.value = '';
		obj.buscador.focus();
		return false;
	}else{
		var valor = obj.buscador.value;
		switch(valor.toLowerCase()){
			case"1024":
				ajustar(1024,768)
				obj.buscador.value = '';
				return false;
				break;
			case"800":
				ajustar(800,600)
				obj.buscador.value = '';
				return false;
				break;
			case"prompt":
				launch('esmetaPrompt.htm',560,300);
				obj.buscador.value = '';
				return false;
				break;
			default:
				document.buscadorForm.action='buscador.aspx';
				return true;
				break;
		}
		//document.buscadorForm.action='buscador.aspx';
		//return true;
	}
}
*/
//function to replace text in a string
function replace(target,oldTerm,newTerm,caseSens,wordOnly) {

var work = target;
var ind = 0;
var next = 0;

if (!caseSens) {
	oldTerm = oldTerm.toLowerCase();
	work = target.toLowerCase();
}

while ((ind = work.indexOf(oldTerm, next)) >= 0) {
	if (wordOnly) {
		var before = ind - 1;
		var after = ind + oldTerm.length;
		if (!(space(work.charAt(before)) && space(work.charAt(after)))) {
			next = ind + oldTerm.length;
			continue;
		}
	}
	target = target.substring(0,ind) + newTerm + target.substring(ind+oldTerm.length, target.length);
	work = work.substring(0,ind) + newTerm + work.substring(ind+oldTerm.length, work.length);
	next = ind + newTerm.length;
	if (next >= work.length) { break; }
}
return target;
}
function removeSpaces(networkName)
{
	// remove spaces
	for(i=0;i<networkName.length;i++)
	{
		if(networkName.substr(i,1) == " ")
		{
			networkName = networkName.substr(0,i) + networkName.substr(i+1,100);
		}	
	}
	return networkName;
}
function countryselector(layerName,formName)
	{
		if (is_nav4) {
		document.location=document.layers[layerName].document.forms[formName].select.options[document.layers[layerName].document.forms[formName].select.selectedIndex].value;
		} 
		else {
		document.location=document.forms[formName].select.options[document.forms[formName].select.selectedIndex].value;
		}
	}

//func to generate a random number based on the session id

function getSIDCookie(value,tempValue)
{
var allcookies = document.cookie;
var cookie_name = "sid";
var cookie_pos = allcookies.indexOf(cookie_name);

	//initialise with some default value if no SID exists SID is 32 chars long
	
	//alert("value is:"+ value +":");
	if(value == 'null')
	{
		if(cookie_pos != -1)
		{
			//alert("Doing cookie value is:"+ value +":");
			cookie_pos += cookie_name.length + 1;
			var cookie_end = allcookies.indexOf(";", cookie_pos);
			if (cookie_end == -1)
			{
			cookie_end = allcookies.length;
			}
			value = unescape(allcookies.substring(cookie_pos, cookie_end));
		}
		else //if(value.length == 0)
		{
		//USE JSP TO BUILD A RANDOM 32 CHAR STRING THIS IS SERVER JSP SCRIPT DO NOT GET CONFUSED WITH CLINET SCRIPT
		//alert("Doing time session: value is:"+ value +":");
		value = "tempValue";
		}
	}
	return value;
}