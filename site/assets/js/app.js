// Global Counter
APP.GLobalCounter = [];

// app date
APP.date = function(format){
	var od = new Date(),
		format = (typeof format != "undefined") ? format : "d-m-Y";
	
	str_date = format.replace(/(d|m|y|h|i|s)/g, function(a){
		switch(a){
			case 'd':
				return (od.getDate() < 10) ? '0'+od.getDate() : od.getDate();
			break;
			case 'm':
				return ((od.getMonth()+1) < 10) ? '0'+ (od.getMonth()+1) : (od.getMonth()+1);
			break;
			case 'y':
				return od.getFullYear();
			break;
			case 'h':
				return (od.getHours() < 10) ? '0'+od.getHours() : od.getHours();
			break;
			case 'i':
				return (od.getMinutes() < 10) ? '0'+od.getMinutes() : od.getMinutes();
			break;
			case 's':
				return (od.getSeconds() < 10) ? '0'+od.getSeconds() : od.getSeconds();
			break;
		}
		
		return a;
	});
	
	return str_date;
};

// handler global trigger
$(function(){
	$(".btn.disabled").each(function(){
		$(this).bind('click', function(){
			return false;
		});
	});
    
    // global tabs
    $(".global-tabs a").each(function(){
        $(this).bind('click', function(e){
            e.preventDefault();
            $(this).tab('show');
        })
    });
});
