// View Source function for viewing document.written files (dynduo)
function viewSource(file) {

	var ienswin = ((is.ns && navigator.platform=="Win32") || is.ie)
	var isjs = (file.indexOf(".js")>0)
	if (isjs && !ienswin) {
		alert("Sorry")
		return
	}
	var numbackpart = file.split('../')
	var numback = numbackpart.length-1
	var filename = file.substr((numbackpart.length-1)*3)
	
	alldirs = document.location.href.split('/')
	dirs = new Array()
	for (var i=0;i<alldirs.length-numback-1;i++) {
		dirs[i] = alldirs[i]
	}
	vs = dirs[0]
	for (i=1;i<dirs.length;i++) {
		vs += '/'+dirs[i]
	}
	vs = 'view-source:'+vs+'/'+filename
	document.location.href = vs
}
