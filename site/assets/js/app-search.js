$(function(){
	// parse location
	var src = location.search.replace(/(\?|q=|l=|&)/gi, function(a){
			return (a == "&") ? "+" : "";
		});
	
	$.each(src.split("+"), function(i, text){
		$(".search-result").highlight(text);
	});
});
