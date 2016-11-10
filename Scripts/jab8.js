//Initial divStatus
$(document).ready(function(){
	$(".expandDiv").hide();
});

// Show/Hide panels
$(function() {
	$('.expand').click(function() {		
		$(this).parent().next('div').slideToggle('slow');
		return false;
	});
});
