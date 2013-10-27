$(document).ready(function(){
	$("#contactmelink").bind("click", function(event){
		$("#overlay").fadeIn('fast');
		$("#contact-me-form").css('opacity', 0).slideDown('fast').animate(
		{ opacity: 1 },
		{ queue: false, duration: 'fast' }
		);	
		return false;
	});	
});