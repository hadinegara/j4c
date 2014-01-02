$(function(){
	$('#job-detail a').click(function(e){
		e.preventDefault();
		$(this).tab('show');
	});
});