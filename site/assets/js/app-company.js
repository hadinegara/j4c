$(function(){

	/**
	 * Posted Job
	 */
	// preview
	$(".btn-preview").each(function(){
		$(this).bind('click', function(e){
			e.preventDefault();
			
			var me = $(this),
				parent_td = me.closest('td'),
				data_preview = parent_td.find(".data-preview:first");
			
			APP.modal.Alert(data_preview.attr("data-title"), data_preview.html());			
			return false;
		});
	});
	
	// delete job
	$(".btn-delete").each(function(){
		$(this).bind('click', function(e){
			e.preventDefault();
			
			var me = $(this),
				confirm_message = me.attr('data-confirm-message');
			
			APP.modal.Confirm(confirm_message, function(a, b){
				console.log(a);
				console.log(b);
			});
			return false;
		});
	});	
	/** End of Posted Job */
	
	/**
	 * Posting Job
	 */
	// border red for input error
	$(".form-error").each(function(){
		$(this).siblings("input, textarea").css({borderColor: 'red'});
	});
	
	// job type change
	$("#job_type").bind('change', function(){
		var me = $(this),
			other_input = $("#contract-duration");
		
		if(/contract/i.test(me.val())){
			if(other_input.length == 0){
				var tag = '<input placeholder="'+ APP.langLine['duration'] +'..." type="text" name="contract_duration" id="contract-duration">';
				me.parent().append(tag);
			}
		} else {
			$("#contract-duration").remove();
		}
	});	
	
	// add requirement field
	$("#add-requirement").bind('click', function(e){
		e.preventDefault();
		
		var me = $(this),
			parent = me.parent(),
			row = parent.siblings(".rrow:last"),
			tag = $('<div>').html(row.clone()).html();
		
		// update id
		var tmp_id = "";
		tag = tag.replace(/requirement\-\d+/i, function(a){
			var str = a.split("-");
			if(parseInt(str[1])+2 <= 20){
				tmp_id = str[0] +"-"+ (parseInt(str[1])+1);
				return tmp_id;
			} else {
				tmp_id = false;
				return false;
			}
		});
		
		if(tmp_id != false){
			tag = tag.replace(/value="(.*?)"/i, '');
			parent.before(tag);
			$("#"+ tmp_id).focus();
		}
	});
	
	// category on change
	$("#category").bind('change', function(){
		var me = $(this),
			other_input = $("#category-other");
		
		if(/others?/i.test(me.val())){
			if(other_input.length == 0){
				me.parent().append('<input type="text" name="category_other" id="category-other">');
			}
		} else {
			$("#category-other").remove();
		}
	});
	
	// location on change
	$("#location").bind('change', function(){
		var me = $(this),
			other_input = $("#location-other");
		
		if(/others?/i.test(me.val())){
			if(other_input.length == 0){
				me.parent().append('<input type="text" name="location_other" id="location-other">');
			}
		} else {
			$("#location-other").remove();
		}
	});
	
	// date picker
    var BtnPick = $("#date_close"),
        StrVal = (BtnPick.val() != "") ? BtnPick.val() : APP.date("d-m-y");
	
	if(BtnPick.length > 0){
		$.selected_date = StrVal;
		BtnPick.DatePicker({
			eventName: 'focus',
			format:'d-m-Y',
			date: StrVal,
			current: StrVal,
			starts: 1,
			position: 'r',
			onBeforeShow: function(){
				BtnPick.DatePickerSetDate($.selected_date, true);
			},
			onShow: function(){
				var top = $(".datepicker").offset().top,
					height = BtnPick.outerHeight();
				$(".datepicker").css({top: (top+height)});
			},
			onChange: function(formated){
				BtnPick.val(formated);
				if($.selected_date != formated){
					BtnPick.DatePickerHide();
					$.selected_date = formated;
				}
			}
		});	
	}
	/** End of Posting Job */
		
});