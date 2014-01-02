$(function(){
	
	// border red for input error
	$(".form-error").each(function(){
		$(this).siblings("input, textarea").css({borderColor: 'red'});
	});

});