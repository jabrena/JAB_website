/*਀䴀伀䐀䤀䘀䤀䌀䄀䌀䤀伀一 䐀䔀䰀 䌀伀䐀䤀䜀伀 䐀䔀 䈀爀攀渀琀 䄀猀栀氀攀礀 
਀䔀渀瘀椀愀 攀氀 挀漀渀琀攀渀椀搀漀 搀攀 甀渀 昀漀爀洀甀氀愀爀椀漀 瀀漀爀 洀攀琀漀搀漀 䠀吀吀倀 倀伀匀吀 
਀䰀愀 椀搀攀愀 攀猀 氀愀 攀洀瀀氀攀愀爀 攀猀琀愀 琀攀挀渀漀氀漀最椀愀 瀀愀爀愀 攀渀瘀椀愀爀 攀氀 挀漀渀琀攀渀椀搀漀 搀攀 甀渀 昀漀爀洀甀氀愀爀椀漀 愀 琀爀愀瘀攀猀 
del servicio gratuito de RESPONSE-O-MATIC਀ 
Para conseguir dicho fin, lo que se hace es reescribir una funcion, añadiendo la nueva.਀⨀⼀ 
਀⼀⼀ 挀漀渀猀琀爀甀挀琀漀爀 昀漀爀 挀漀渀琀攀砀琀 漀戀樀攀挀琀 
function jsrsContextObj( contextID ){਀   
  // properties਀  琀栀椀猀⸀椀搀 㴀 挀漀渀琀攀砀琀䤀䐀㬀 
  this.busy = true;਀  琀栀椀猀⸀挀愀氀氀戀愀挀欀 㴀 渀甀氀氀㬀 
  this.container = contextCreateContainer( contextID );਀   
  // methods਀  琀栀椀猀⸀䜀䔀吀 㴀 挀漀渀琀攀砀琀䜀䔀吀㬀 
  this.POST = contextPOST2;਀  琀栀椀猀⸀最攀琀倀愀礀氀漀愀搀 㴀 挀漀渀琀攀砀琀䜀攀琀倀愀礀氀漀愀搀㬀 
  this.setVisibility = contextSetVisibility;਀紀 
਀⼀⼀㄀㜀⼀　㄀⼀㈀　　㔀 
//Funcion que permite enviar datos a RESPONSE-O-MATIC਀昀甀渀挀琀椀漀渀 挀漀渀琀攀砀琀倀伀匀吀㈀⠀ 爀猀倀愀最攀Ⰰ 昀甀渀挀Ⰰ 瀀愀爀洀猀 ⤀笀 
਀  瘀愀爀 搀 㴀 渀攀眀 䐀愀琀攀⠀⤀㬀 
  var unique = d.getTime() + '' + Math.floor(1000 * Math.random());਀  瘀愀爀 搀漀挀 㴀 ⠀樀猀爀猀䈀爀漀眀猀攀爀 㴀㴀 ∀䤀䔀∀ ⤀ 㼀 琀栀椀猀⸀挀漀渀琀愀椀渀攀爀⸀搀漀挀甀洀攀渀琀 㨀 琀栀椀猀⸀挀漀渀琀愀椀渀攀爀⸀挀漀渀琀攀渀琀䐀漀挀甀洀攀渀琀㬀 
  doc.open();਀  搀漀挀⸀眀爀椀琀攀⠀✀㰀栀琀洀氀㸀㰀戀漀搀礀㸀✀⤀㬀 
  doc.write('<form name="jsrsForm" method="post" target="" ');਀  搀漀挀⸀眀爀椀琀攀⠀✀ 愀挀琀椀漀渀㴀∀✀ ⬀ 爀猀倀愀最攀 ⬀ ✀㼀唀㴀✀ ⬀ 甀渀椀焀甀攀 ⬀ ✀∀㸀✀⤀㬀 
  doc.write('<input type="hidden" name="C" value="' + this.id + '">');਀ 
  // func and parms are optional਀  椀昀 ⠀昀甀渀挀 ℀㴀 渀甀氀氀⤀笀 
  doc.write('<input type="hidden" name="F" value="' + func + '">');਀   
//Introducimos los HIDDEN obligatorios਀搀漀挀⸀眀爀椀琀攀⠀✀㰀䤀一倀唀吀 吀夀倀䔀㴀∀栀椀搀搀攀渀∀ 一䄀䴀䔀㴀∀礀漀甀爀开攀洀愀椀氀开愀搀搀爀攀猀猀∀ 嘀䄀䰀唀䔀㴀∀戀爀攀渀䀀樀甀愀渀愀渀琀漀渀椀漀⸀椀渀昀漀∀㸀✀⤀㬀 
doc.write('<INPUT TYPE="hidden" NAME="your_name" VALUE="Customer Service Department">');਀搀漀挀⸀眀爀椀琀攀⠀✀㰀䤀一倀唀吀 吀夀倀䔀㴀∀栀椀搀搀攀渀∀ 一䄀䴀䔀㴀∀攀洀愀椀氀开猀甀戀樀攀挀琀开氀椀渀攀∀ 嘀䄀䰀唀䔀㴀∀樀甀愀渀愀渀琀漀渀椀漀⸀椀渀昀漀 挀漀渀琀愀挀琀 昀漀爀洀∀㸀✀⤀㬀 
doc.write('<INPUT TYPE="hidden" NAME="required_fields" VALUE="your_email_address">');਀搀漀挀⸀眀爀椀琀攀⠀✀㰀䤀一倀唀吀 吀夀倀䔀㴀∀栀椀搀搀攀渀∀ 一䄀䴀䔀㴀∀琀栀愀渀欀开礀漀甀开琀椀琀氀攀∀ 嘀䄀䰀唀䔀㴀∀琀栀愀渀欀猀∀㸀✀⤀㬀 
doc.write('<INPUT TYPE="hidden" NAME="return_link_url" VALUE="http://www.juanantonio.info">');਀搀漀挀⸀眀爀椀琀攀⠀✀㰀䤀一倀唀吀 吀夀倀䔀㴀∀栀椀搀搀攀渀∀ 一䄀䴀䔀㴀∀爀攀琀甀爀渀开氀椀渀欀开渀愀洀攀∀ 嘀䄀䰀唀䔀㴀∀䈀愀挀欀 琀漀 䨀甀愀渀愀渀琀漀渀椀漀⸀椀渀昀漀∀㸀✀⤀㬀 
਀    椀昀 ⠀瀀愀爀洀猀 ℀㴀 渀甀氀氀⤀笀 
      if (typeof(parms) == "string"){਀        ⼀⼀ 猀椀渀最氀攀 瀀愀爀愀洀攀琀攀爀 
        doc.write( '<input type="hidden" name="P0" '਀                 ⬀ ✀瘀愀氀甀攀㴀∀嬀✀ ⬀ 樀猀爀猀䔀猀挀愀瀀攀儀儀⠀瀀愀爀洀猀⤀ ⬀ ✀崀∀㸀✀⤀㬀 
      } else {਀        ⼀⼀ 愀猀猀甀洀攀 瀀愀爀洀猀 椀猀 愀爀爀愀礀 漀昀 猀琀爀椀渀最猀 
        for( var i=0; i < parms.length; i++ ){਀          搀漀挀⸀眀爀椀琀攀⠀ ✀㰀椀渀瀀甀琀 琀礀瀀攀㴀∀栀椀搀搀攀渀∀ 渀愀洀攀㴀∀倀✀ ⬀ 椀 ⬀ ✀∀ ✀ 
                   + 'value="[' + jsrsEscapeQQ(parms[i]) + ']">');਀        紀 
      } // parm type਀    紀 ⼀⼀ 瀀愀爀洀猀 
  } // func਀ 
  doc.write('</form></body></html>');਀  搀漀挀⸀挀氀漀猀攀⠀⤀㬀 
  doc.forms['jsrsForm'].submit();਀紀�