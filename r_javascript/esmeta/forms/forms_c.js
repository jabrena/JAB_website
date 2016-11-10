// Compressed with JSCruncher.
function getRadioGroupValue(radioObj){rgValue=-1;t=null;t=document.getElementsByTagName('INPUT');for(var i=t.length;i--;){if(t[i].type=='radio'){if(t[i].name==radioObj){if(t[i].checked==true){rgValue=t[i].value;break}}}}return rgValue};function trimString(str){return str.replace(/^\s+/g,'').replace(/\s+$/g,'')};
