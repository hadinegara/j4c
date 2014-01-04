$(function(){

	$(".resume-container").css('margin-top', function(){
		return -($(".resume-photo").outerHeight());
	});
	
	// edit button
	var $modal_trigger = null;
	$(".resume-edit").each(function(){
		$(this).bind('click', function(e){
			e.preventDefault();
			var me = $(this),
				modal_id = me.attr("data-modal"),
				modal = $("#"+ modal_id);
			
			// save trigger
			$modal_trigger = me;
			
			// modal shown
			modal.on('shown', function(){				
				modal.find('.btn-n').bind('click', function(e){
					e.preventDefault();
					modal.modal('hide');
				});
			});
			modal.modal({backdrop: 'static'});
		});
	});
	
	
	
	/**
	 * Personal Info
	 */
	if($("#personal_info-modal").length>0){
		var modalPI = $("#personal_info-modal");
		
		// setup datepicker for dob
		$(".datepicker").datepicker({
			format: 'dd-mm-yyyy'
		});
		
		// btn primary click
		modalPI.find(".btn-primary").bind('click', function(e){
			e.preventDefault();
			
			var me = $(this),
				form = modalPI.find("form:first"),
				container = $(".resume-part.personal_info").find(".part-body");
			
			me.button('loading');
			$.ajax({
				type: form.attr("method"),
				url: form.attr("action"),
				data: form.serialize(),
				dataType: "json",
				success: function(r){
					me.button('reset');
					if(r.success == true){
						for(var k in r.data){
							container.find("."+ k).html(r.data[k]);
						}
						modalPI.modal('hide');
					} else {						
						alert(r.message);
					}
				},
				error: function(e){
					me.button('reset');
					alert(e.statusText);
				}				
			});
		});
	}
	/** End of Personal Info */
	
	
	
	/**
	 * Edit Skills
	 */
	if($("#skill-modal").length > 0){
		var modalSK = $("#skill-modal"),
			skill_first = modalSK.find(".skill-item:last").html(), 
			skill_tpl = '<div class="skill-item">'+ skill_first +'</div>';
		
		// button add skill
		modalSK.find(".btn-add_skill").bind('click', function(e){
			e.preventDefault();
			
			APP.GLobalCounter++;
			if(APP.GLobalCounter < 20){
				var btn_container = $(this).parent();
				$(skill_tpl).insertBefore(btn_container);
				modalSK.find("input[type='text']:last").focus();
			}
		});
		
		// submit
		modalSK.find(".btn-primary").bind('click', function(e){
			e.preventDefault();
			
			var me = $(this),
				form = modalSK.find("form:first"),
				skills = form.find('input[name^=skill]'),
				container = $(".resume-part.skill").find(".part-body");
			
			me.button('loading');
			if($.trim($(skills[0]).val()) == ""){
				$(skills[0]).css({borderColor: 'red'});
				me.button('reset');
				return false;
			}
			
			// update container
			container.html("Updating...");
			
			// save data
			$.ajax({
				type: form.attr("method"),
				url: form.attr("action"),
				data: form.serialize(),
				dataType: "json",
				success: function(r){
					me.button('reset');
					if(r.success == true){
						var tpl1 = '<div class="part-item">'+
								   '<div class="pull-left w10"><strong>No</strong></div>'+
								   '<div class="pull-left w35"><strong>Skill</strong></div>'+
								   '<div class="pull-left w35"><strong>Level</strong></div>'+
							       '<div class="clearfix"></div>'+
						           '</div>';
						var tpl2 = '<div class="part-item">'+
						   		   '<div class="pull-left w10">{no}</div>'+
					   			   '<div class="pull-left w35">{skill}</div>'+
					   			   '<div class="pull-left w35">{proficiency}</div>'+
					   			   '<div class="clearfix"></div>'+
					   			   '</div>';
						
						var tpln = '';
						$.each(r.data, function(i, o){
							var t = tpl2.replace("{no}", (i+1));
							for(var k in o){
								t = t.replace("{"+ k +"}", o[k]);
							}
							tpln += t;
						});
						
						// apply to page
						container.html(tpl1+tpln);
						modalSK.modal('hide');
						
					} else {
						alert(r.message);
						container.html(r.message);
					}
				},
				error: function(e){
					me.button('reset');
					alert(e.statusText);
					container.html(e.statusText);
				}
			});
		});
	}
	/** end of Edit Skills */
    
    
    /**
     * Edit Languages
     */
    if($("#language-modal").length>0){
		var modalLANG = $("#language-modal"),
			lang_first = modalLANG.find(".language-item:last").html(), 
			lang_tpl = '<div class="language-item">'+ lang_first +'</div>';
		
		// button add skill
        APP.GLobalCounter = parseInt(modalLANG.find('input[name^=language]').length);
		modalLANG.find(".btn-add_language").bind('click', function(e){
			e.preventDefault();
			
			APP.GLobalCounter++;
			if(APP.GLobalCounter <= 5){
				var btn_container = $(this).parent();
				$(lang_tpl).insertBefore(btn_container);
				modalLANG.find(".language-item:last").find("input[type='text']:first").focus();
			}
		});
        
		// submit
		modalLANG.find(".btn-primary").bind('click', function(e){
			e.preventDefault();
			
			var me = $(this),
				form = modalLANG.find("form:first"),
                langs = form.find('input[name^=language]'),
				container = $(".resume-part.language").find(".part-body");
			
            // loading
			me.button('loading');
			if($.trim($(langs[0]).val()) == ""){
				$(langs[0]).css({borderColor: 'red'});
				me.button('reset');
				return false;
			}
            
			// update container
			container.html("Updating...");
			
			// save data
			$.ajax({
				type: form.attr("method"),
				url: form.attr("action"),
				data: form.serialize(),
				dataType: "json",
				success: function(r){
					me.button('reset');
					if(r.success == true){
						var tpl1 = '<div class="part-item">'+
								   '<div class="pull-left w10"><strong>No</strong></div>'+
								   '<div class="pull-left w30"><strong>Language Name</strong></div>'+
								   '<div class="pull-left w30"><strong>Spoken</strong> <small>(Score: 10-100)</small></div>'+
								   '<div class="pull-left w30"><strong>Written</strong> <small>(Score: 10-100)</small></div>'+
							       '<div class="clearfix"></div>'+
						           '</div>';
						var tpl2 = '<div class="part-item">'+
						   		   '<div class="pull-left w10">{no}</div>'+
					   			   '<div class="pull-left w30">{language}</div>'+
					   			   '<div class="pull-left w30">{spoken}</div>'+
					   			   '<div class="pull-left w30">{written}</div>'+
					   			   '<div class="clearfix"></div>'+
					   			   '</div>';
						
						var tpln = '';
						$.each(r.data, function(i, o){
							var t = tpl2.replace("{no}", (i+1));
							for(var k in o){
								t = t.replace("{"+ k +"}", o[k]);
							}
							tpln += t;
						});
						
						// apply to page
						container.html(tpl1+tpln);
						modalLANG.modal('hide');
						
					} else {
						alert(r.message);
						container.html(r.message);
					}                    
                },
                error: function(e){
					me.button('reset');
					alert(e.statusText);
					container.html(e.statusText);                    
                }
            });
        });        
        
    }
    /** End of Edit Languages */
    
    
    /**
     * Add Reference
     */
    if($("#reference-modal").length>0){
		var modalREF = $("#reference-modal");
        
		// submit
		modalREF.find(".btn-primary").bind('click', function(e){
			e.preventDefault();
			
			var me = $(this),
				form = modalREF.find("form:first"),
				container = $(".resume-part.reference").find(".part-body");
            
            var mode = (modalREF.find("#mode").html()).toLowerCase(),
				init_param = {mode: mode};
				
			if(mode == "edit"){
				init_param['id'] = $modal_trigger.attr("data-id");
			}
			
			// grab form data
			var data = {},
				empty_el = [];
			$.each(form.find("input[type='text']"), function(i, el){
				var name = $(el).attr("name"),
					value = $.trim($(el).val());
					
				data[name] = value;
				if(value == "" && /(required)/i.test($(el).attr("class"))){
					empty_el.push(el);
					$(el).css({borderColor: 'red'});
				} else if(value != "") {
					$(el).removeAttr("style");
				}
			});				
			if(empty_el.length === 0){
			
				me.button('loading');
				$.ajax({
					type: "post",
					url: form.attr("action"),
					data: $.extend({}, init_param, data),
					dataType: "json",
					success: function(r){
						me.button('reset');
						if(r.success == true){
							var tpl = $('<div class="part-item bd01 p10 mbm1 relative">');
							
							// append edit button to tpl
							tpl.append([
								'<div class="resume-edit-part">',
									'<a class="btn-edit-reference" href="#" data-id="'+ r.id +'">Edit</a>',
								'</div>',
							].join(""));
							
							// append data to tpl
							$.each(data, function(k, v){
								tpl.append([
									'<div class="part-item-row" data-field="'+ k +'" data-value="'+ v +'">',
										'<div class="pull-left w35"><strong>'+ (k[0].toUpperCase())+(k.substring(1)) +'</strong></div>',
										'<div class="pull-left w65">'+ v +'</div>',
										'<div class="clearfix"></div>',
									'</div>'
								].join(""));
							});
							
							// append clearfix to tpl
							tpl.append('<div class="clearfix"></div>');
							
							// apply tpl to container
							if(container.find(".part-item").length === 0){
								container.html("");
								container.append(tpl);
							} else {
								var old_data_id = container.find("[data-id='"+ r.id +"']");
								if(old_data_id.length !== 0){
									var tpl_wrap = old_data_id.closest(".part-item");
									tpl_wrap.html(tpl.html());
								} else {
									container.append(tpl);
								}
							}
							modalREF.modal('hide');
						} else {
							alert(r.message);
							container.html(r.message);
						}
					},
					error: function(e){
						me.button('reset');
						alert(e.statusText);
						container.html(e.statusText);
					}
				});
			}
        });
    }
    /** End of Add Reference */
	
    /** Edit Reference */
	var $ref_mode = "";
	$(document.body).on('click', '.btn-edit-reference', function(e){	
		e.preventDefault();
		var modal = $("#reference-modal"),
			form = modal.find("form:first");
		
		// save trigger & mode
		$modal_trigger = $(this);
		$ref_mode = modal.find("#mode").html();
		
		modal.on('shown', function(){
			if($modal_trigger.attr("class") == "btn-edit-reference"){
				modal.find("#mode").html("Edit");				
				// load record
				var db = $modal_trigger.closest(".part-item"),
					rows = db.find(".part-item-row");
					
				$.each(rows, function(i, el){
					var f = $(el).attr("data-field"),
						v = $(el).attr("data-value");					
					form.find("input[name='"+ f +"']").val(v);
				});
			} else {
				// clear field
				form.find("input[type='text']").val("");
			}
			
			modal.find('.btn-n').bind('click', function(e){
				e.preventDefault();
				modal.modal('hide');
			});
		});
		modal.on('hide', function(){
			modal.find("#mode").html($ref_mode);
		});
		modal.modal({backdrop: 'static'});
	});
    /** End of Edit Reference */
});