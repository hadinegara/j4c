// message box
APP.modal = {};

// alert
APP.modal.Alert = function(title, msg, callback){
	var title = title || "Modal Header",
		message = msg || "Modal Content";

	// tpl
	var mid = 'modal-'+ Math.floor((Math.random()*1000)+1);
		tpl = ''+
				'<div id="'+ mid +'"  class="modal hide" style="position:absolute;">'+
				'	<div class="modal-header">'+
				'		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>'+
				'		<h3>'+ title +'</h3>'+
				'	</div>'+
				'	<div class="modal-body">'+ message +'</div>'+
				'	<div class="modal-footer">'+
				'		<a href="#" class="btn btn-primary">'+ APP.langLine['btn_ok'] +'</a>'+
				'	</div>'+
				'</div>';
		
		
	// apend to body
	$('body').append(tpl);
	
	// modal
	var bmodal = $("#"+ mid);
	
	// hide event
	bmodal.on('hide', function(){
		bmodal.unbind();
		bmodal.remove();
	});
	
	// shown event
	bmodal.on('shown', function(){
		bmodal.find(".btn").each(function(){
			$(this).bind("click", function(e){
				e.preventDefault();
				var className = $(this).attr("class");
				if(/(btn-primary)/i.test(className)){
					// call callback
					//callback.call(this, bmodal);
					bmodal.modal('hide');
				}
			});
		});
	});
	
	// show modal
	bmodal.modal({
		backdrop: 'static'
	});	
};
// end of box

// box
APP.modal.Box = function(title, msg, callback){
	var title = title || "Modal Header",
		message = msg || "Modal Content";

	// tpl
	var mid = 'modal-'+ Math.floor((Math.random()*1000)+1);
		tpl = ''+
				'<div id="'+ mid +'"  class="modal hide" style="position:absolute;">'+
				'	<div class="modal-header">'+
				'		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>'+
				'		<h3>'+ title +'</h3>'+
				'	</div>'+
				'	<div class="modal-body">'+ message +'</div>'+
				'	<div class="modal-footer">'+
				'		<a href="#" class="btn btn-cancel">'+ APP.langLine['btn_cancel'] +'</a>'+
				'		<a href="#" class="btn btn-primary">'+ APP.langLine['btn_ok'] +'</a>'+
				'	</div>'+
				'</div>';
		
		
	// apend to body
	$('body').append(tpl);
	
	// modal
	var bmodal = $("#"+ mid);
	
	// hide event
	bmodal.on('hide', function(){
		bmodal.unbind();
		bmodal.remove();
	});
	
	// shown event
	bmodal.on('shown', function(){
		bmodal.find(".btn").each(function(){
			$(this).bind("click", function(e){
				e.preventDefault();
				var className = $(this).attr("class");
				if(/(btn-primary)/i.test(className)){
					// call callback
					callback.call(this, bmodal);
				}else if(/(btn-cancel)/i.test(className)){
					bmodal.modal('hide');
				}
			});
		});
	});
	
	// show modal
	bmodal.modal({
		backdrop: 'static'
	});	
};
// end of box

// confirm
APP.modal.Confirm = function(msg, callback){
	var message = msg || "Confirm!",
		width = (message.length)*10;

	// tpl
	var mid = 'modal-'+ Math.floor((Math.random()*1000)+1);
		tpl = ''+
			'<div id="'+ mid +'" class="modal hide" style="width:'+ width +'px;min-width:150px;max-width:550px;">'+
				'<div class="modal-body">'+
					'<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>'+
					'<div style="padding:10px;">'+ message +'</div>'+
				'</div>'+
				'<div class="modal-footer">'+
					'<button class="btn btn-cancel">'+ APP.langLine['btn_cancel'] +'</button>&nbsp;'+
					'<button class="btn btn-primary">'+ APP.langLine['btn_ok'] +'</button>'+
				'</div>'+
			'</div>';

	// apend to body
	$('body').append(tpl);
	
	// modal
	var bmodal = $("#"+ mid);
	
	// hide event
	bmodal.on('hide', function(){
		bmodal.unbind();
		bmodal.remove();
	});
	
	// shown event
	bmodal.on('shown', function(){
		bmodal.find(".btn").each(function(){
			$(this).bind("click", function(e){
				e.preventDefault();
				var className = $(this).attr("class");
				if(/(btn-primary)/i.test(className)){
					// call callback
					callback.call(this, bmodal);
				}else if(/(btn-cancel)/i.test(className)){
					bmodal.modal('hide');
				}
			});
		});
	});
	
	// show modal
	bmodal.modal({
		backdrop: 'static'
	});	
};
// end of confirm