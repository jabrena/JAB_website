/*਀䌀䰀䄀匀匀㨀 瀀愀礀瀀愀氀䔀洀愀椀氀䈀甀椀氀搀攀爀䌀氀愀猀猀 
DESCRIPTION: paypalEmailBuilderClass is a class to generate a valid Email. It is useful to avoid Spambots and Spiders.਀䄀唀吀䠀伀刀㨀 䨀甀愀渀 䄀渀琀漀渀椀漀 䈀爀攀愀 䴀漀爀愀氀 
DATE: 21/01/06਀䰀䄀匀吀 唀倀䐀䄀吀䔀㨀 ㈀㄀⼀　㘀⼀　㘀 
*/਀ 
paypalEmailBuilderClass = function(){਀  ऀ瘀愀爀 愀 㴀 愀爀最甀洀攀渀琀猀㬀 
	this.user = a[0] || null;਀ऀ琀栀椀猀⸀搀漀洀愀椀渀一愀洀攀 㴀 愀嬀㄀崀 簀簀 渀甀氀氀㬀 
	this.domainExtension = a[2] || null;  ਀紀 
਀⼀⨀⨀⨀⨀⨀⨀⨀⨀⨀⨀⨀⨀⨀⨀⨀⨀⨀⨀⨀⨀⨀⨀⨀⨀⨀ 
***** PUBLIC METHODS *****਀⨀⨀⨀⨀⨀⨀⨀⨀⨀⨀⨀⨀⨀⨀⨀⨀⨀⨀⨀⨀⨀⨀⨀⨀⨀⼀ 
਀瀀愀礀瀀愀氀䔀洀愀椀氀䈀甀椀氀搀攀爀䌀氀愀猀猀⸀瀀爀漀琀漀琀礀瀀攀⸀最攀琀䔀洀愀椀氀  㴀 昀甀渀挀琀椀漀渀⠀⤀笀 
  	var email = this.user + '@' + this.domainName + '.' + this.domainExtension;਀ऀ爀攀琀甀爀渀 攀洀愀椀氀㬀 
}਀ 
/****************************਀⨀⨀⨀⨀⨀ 䜀䔀吀 ⼀ 匀䔀吀 䴀䔀吀䠀伀䐀匀 ⨀⨀⨀⨀⨀ 
****************************/਀ 
// GET/SET Methods to user propertie਀瀀愀礀瀀愀氀䔀洀愀椀氀䈀甀椀氀搀攀爀䌀氀愀猀猀⸀瀀爀漀琀漀琀礀瀀攀⸀猀攀琀唀猀攀爀 㴀 昀甀渀挀琀椀漀渀⠀琀砀琀唀猀攀爀⤀笀 
	this.user  = txtUser;਀紀 
਀瀀愀礀瀀愀氀䔀洀愀椀氀䈀甀椀氀搀攀爀䌀氀愀猀猀⸀瀀爀漀琀漀琀礀瀀攀⸀最攀琀唀猀攀爀 㴀 昀甀渀挀琀椀漀渀⠀⤀笀 
	return this.user;਀紀 
਀⼀⼀ 䜀䔀吀⼀匀䔀吀 䴀攀琀栀漀搀猀 琀漀 搀漀洀愀椀渀一愀洀攀 瀀爀漀瀀攀爀琀椀攀 
paypalEmailBuilderClass.prototype.setDomainName = function(txtDomainName){਀ऀ琀栀椀猀⸀搀漀洀愀椀渀一愀洀攀  㴀 琀砀琀䐀漀洀愀椀渀一愀洀攀㬀 
}਀ 
paypalEmailBuilderClass.prototype.getDomainName = function(){਀ऀ爀攀琀甀爀渀 琀栀椀猀⸀搀漀洀愀椀渀一愀洀攀㬀 
}਀ 
// GET/SET Methods to domainExtension propertie਀瀀愀礀瀀愀氀䔀洀愀椀氀䈀甀椀氀搀攀爀䌀氀愀猀猀⸀瀀爀漀琀漀琀礀瀀攀⸀猀攀琀䐀漀洀愀椀渀䔀砀琀攀渀猀椀漀渀 㴀 昀甀渀挀琀椀漀渀⠀搀戀匀栀椀瀀瀀椀渀最⤀笀 
	this.domainExtension  = dbShipping;਀紀 
਀瀀愀礀瀀愀氀䔀洀愀椀氀䈀甀椀氀搀攀爀䌀氀愀猀猀⸀瀀爀漀琀漀琀礀瀀攀⸀最攀琀䐀漀洀愀椀渀䔀砀琀攀渀猀椀漀渀 㴀 昀甀渀挀琀椀漀渀⠀⤀笀 
	return this.domainExtension;਀紀 
਀�