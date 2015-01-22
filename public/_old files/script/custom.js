$(document).ready(function() {
	$('.sessionMessage').fadeIn(1500);
    setTimeout(hideSessionMessage, 10000);
});

function hideSessionMessage(){
	$('.sessionMessage').fadeOut(2000);
	
	}