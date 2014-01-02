$(function(){
	// lang line
	function LangLib(){
		this.DB = {
			'english': {
				'fill_required': 'Please fill all required fields!',
				'password_match': 'Password doesn\'t match'
			},
			'bahasa': {
				'fill_required': 'Silahkan isi semua isian yang berwarna merah.',
				'password_match': 'Password tidak sama.'
			}
		};
		
		this.line = function(key){
			var db = this.DB[APP.lang] || null;
			return (db != null && typeof db[key] != "undefined") ? db[key] : "";
		};
	}
	var Lang = new LangLib();
	
	// register
	$("#form-register").bind('submit', function(){
		var required = ['first_name','email','password', 're_password'],
			pswd = $("#password").val(),
			re_pswd = $("#re_password").val();
		
		var cerror = 0;
		for(var i=0; i<required.length; i++){
			if($("#"+ required[i]).val() == ""){
				$("#"+ required[i]).css({borderColor: 'red'});
				cerror++;
			} else {
				$("#"+ required[i]).removeAttr("style");
			}
		}
		
		if(cerror == 0){
			if(pswd == "" || pswd!=re_pswd){
				cerror++;
				var legend = $("legend"),
					tpl = '<div class="error-message"><div class="alert alert-error">'+ 
							Lang.line('password_match') +'</div></div>';
				
				$("#password, #re_password").css({borderColor: 'red'});
				if($(".error-message").length == 0){
					legend.after(tpl);
				} else {
					$(".error-message > .alert").html(Lang.line('password_match'));
				}
			}
		} else {
			var legend = $("legend"),
				tpl = '<div class="error-message"><div class="alert alert-error">'+ 
						Lang.line('fill_required') +'</div></div>';
			
			if($(".error-message").length == 0){
				legend.after(tpl);
			}
		}
		return (cerror == 0);
	});
});