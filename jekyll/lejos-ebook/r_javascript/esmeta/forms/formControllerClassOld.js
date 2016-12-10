function formControllerClass(){
	//Properties.
	this.formObject = null;//Nombre del formulario.
	this.formIndexObject = null;//Indice del formulario.
	this.formChildObject = null;//Objeto que realiza procesos de introspeccion.
	this.blValidation = false;
	this.error = false;
	this.esmetaTagsObject = null;
};
// Funcion que permite realizar procesos de introspeccion para manejar objetos superiores.
// Ejemplo: Super.submit();
formControllerClass.prototype.getParentForm = function(){
	if(!this.error){
		var arg = arguments;
		this.formChildObject = arg[0] || this.formChildObject;
		var i,j;
		var foundForm = false;
		with(document){
			for(i=0;i<forms.length;i++){
				for(j=0;j<forms[i].elements.length;j++){
					if (forms[i].elements[j] == this.formChildObject){
						foundForm = true;
					}
					if(foundForm){
						break;
					}
				}
				if(foundForm){
					break;
				}
			}
		}
		if(foundForm){
			this.formObject = document.forms[i].name;
			this.formIndexObject = i;
		}else{
			alert("El objeto proporcionado, no tiene Formulario. Revise el codigo.")
			this.error = true;
		}
	}
}
// Establezco todos los eventos de los formularios al sistema de validacion.
formControllerClass.prototype.setEvents = function(){
	if(!this.error){
		var i;
		with(document){
			for(i=0; i< forms.length;i++){
				//alert(forms[i].name)
				var obj = this.getObject(forms[i].name);
				obj.addEventListener("onSubmit",this.validate(),false);
			}
		}
		this.blValidation = true;
	}
}
// Cuando se produce se dispara el evento del objeto.
formControllerClass.prototype.validate = function(){
	if(!this.error){
		if(document.getElementById){
			if(this.hasFormDescriptor()){
				alert("El sistema ha encontrado el sistema EsmetaTags")
			}
		}else{
			alert("El navegador, no puede validar los datos.");
			this.submit();
		}
	}
}
// Obligo a realizar el submit al objeto que tengo en el puntero.
formControllerClass.prototype.submit = function(){
	if(!this.error){
		document.forms[this.formIndexObject].submit();
	}
}

// Frena el evento de validacion.
formControllerClass.prototype.stopEvent = function(){
	return false;
}

formControllerClass.prototype.hasFormDescriptor = function(){
	var blFormDescriptor = false;
	esmetaTags = document.getElementsByTagName('ESMETATAGS');
	el = document.getElementById("ESMETATAGS");
	alert(el.hasChildNodes())
	alert(el.childNodes.length);
	if(esmetaTags){
		if(esmetaTags.length == 1){
			var x = "";
			for(var propname in this){
				x += propname + ": " + this[propname] + "\n"
			}
			alert(x);

			/*
			alert(document.getElementById('ESMETATAGS').firstChild.nodeValue)
			validationForms = esmetaTags.item(0).getElementsByTagName("VALIDATIONFORMS")//.item(0)
			alert(validationForms)
			alert(validationForms.length)
			if(validationForms){
				if(validationForms.length == 1){
					alert("")
				}else{
					alert("No puede haber mas que un modulo VALIDATIONFORMS");
					this.error = true;
				}
			}else{
				alert("No se ha encontrado el modulo VALIDATIONFORMS");
				this.error = true;
			}
			*/
		}else{
			alert("No pueden existir mas que\nuna extension web ESMETATAGS");
			this.error = true;
		}
	}else{
		alert("El sistema no ha encontrado\nla extension web ESMETATAGS")
		this.error = true;
	}
	return blFormDescriptor;
}

formControllerClass.prototype.getObject = function(objectForm){
	return document.getElementById(objectForm);
}

formControllerClass.prototype.findOwner = function(evt){
	var node = evt.target;
	while (node){
		if (node.nodeType == Node.ELEMENT_NODE && node.nodeName == "form"){
		return node;
		}
		node = node.parentNode;
	}
	return null;
}
