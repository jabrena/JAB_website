var cssLoaderClass = new Object();

// CssClass >>> Class Variables.
cssLoaderClass.cssRel = 'stylesheet';
cssLoaderClass.cssType = 'text/css';
cssLoaderClass.cssPath = '';
cssLoaderClass.error = false;
cssLoaderClass.version = "1.1";
cssLoaderClass.name = "cssLoaderClass";

// CssClass >>> Public Class Methods.
cssLoaderClass.setPath = _setPath;
cssLoaderClass.getPath = _getPath;
cssLoaderClass.setCss = _setCss;
//24/08/2003
cssLoaderClass.loadCss = _setCss;


// CssPath >>> Implementation of Public Static Methods.
function _setPath(_path){
	if(this.error== false){
		if((typeof _path == 'string') && (_path != null) && (_path != ' ') && (_path != '')){
			this.cssPath = _path;
		}
		else{
			this.esmError(0,'setPath');
		}
	}
};
function _getPath(){return this.cssPath;};

function _setCss(file){
	if(this.error== false){
		//24/08/2003
		if(this.cssPath != ''){
			var startTag = '<link ';
			var rel ='rel="stylesheet" ';
			var type = 'type="text/css" ';
			var charset = 'charset="iso-8859-1" ';
			var url_1 = 'href="';
			var url_2 = '" ';
			var title = ' title="Esmeta Component '+ this.name + this.version+'"';
			var endTag = ' />';
			var tag = startTag+rel+type+charset+url_1+this.cssPath+ file+ url_2+ title+endTag;
			//alert(tag)
			document.write(tag);
		}else{
			//this.esmError(0,'_setCss');
		}
	}
};

// EsmError Lite 1.1 (24/06/2002);
function _esmError(id,obj){// Proximamente soluciones genericas basadas en esmErrorManager 1.0
	var errorArray = [];
	var header = 'EsmError Report: \n\n    ';
	var footer = '\n\nEsmeta Systems.';
	errorArray[0] = 'No ha establecido correctamente el metodo: '+obj+' .';
	errorArray[1] = 'Algun parametro de esto no esta soportado por el componente.';
	errorArray[2] = 'Se han definido los parametros fuera del rango.';
	errorArray[3] = 'No se ha definido el path de los ficheros CSS.';
	errorMessage = errorArray[id];
	if (errorArray.length >= id){
		alert(header+errorArray[id]+footer);
	}
	this.error=true;
};

/*
CSS Loader Class
1.0 03/02/2002
1.1 24/06/2002
1.2 24/08/2003 Increase Security of Web Client Component.
*/