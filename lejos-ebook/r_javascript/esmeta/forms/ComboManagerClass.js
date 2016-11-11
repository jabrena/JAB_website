function ComboManagerClass(){
	var args = arguments;
	this.form = args[0] || null;
	this.combo = args[1] || null;
	this.error = false;
};
ComboManagerClass.prototype.selectByName = function(strName){
	if(!this.error){
		if(strName != '' && strName != undefined){
			var i;
			var key = strName.toLowerCase();
			var cbElement = '';
			with(document.forms[this.form].elements[this.combo]){
				for(i=0;i<length;i++){
					cbElement = item(i).text;
					cbElement = cbElement.toLowerCase();
					if(key == cbElement)value = item(i).value;
				}
			}
		}else{
			this.error = true;
		}
	}
};
ComboManagerClass.prototype.selectByValue = function(intValue){
	if(!this.error){
		if(strName != '' && strName != undefined){
			document.forms[this.form].elements[this.combo].value = intValue;
		}else{
			this.error = true;
		}
	}
};
ComboManagerClass.prototype.sort = function(){
	if(!this.error){
		//1. Inicializacion.
		var arrFbox = new Array();
		var arrLookup = new Array();
		var i;
		//2. Carga de datos en array();
		with(document.forms[this.form]){
			with(elements[this.combo]){
				for (i = 0; i < length; i++){
					//alert(item(i).text);
					arrLookup[item(i).text] = item(i).value;
					arrFbox[i] = item(i).text;
				}
			}
		}

		//3.Ordenacion.
		arrFbox.sort();

		//4.Establecemos de nuevo datos.
		document.forms[this.form].elements[this.combo].length = 0;

		var c;
		for(c = 0; c < arrFbox.length; c++){
			var no = new Option();
			no.value = arrLookup[arrFbox[c]];
			no.text = arrFbox[c];
			document.forms[this.form].elements[this.combo].options[c] = no;
		}
	}
};
