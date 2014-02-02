<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Photo</title>
	<meta name="viewport" content="initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,width=device-width,user-scalable=no" />
	
	<link rel="stylesheet" type="text/css" href="<?php echo assets_url('libs/bootstrap/css/bootstrap.css'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo assets_url('libs/bootstrap/css/bootstrap-responsive.css'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo assets_url('libs/bootstrap/css/todc-bootstrap.css'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo assets_url('libs/bootstrap/js/google-code-prettify/prettify.css'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo assets_url('libs/font-awesome/css/font-awesome.min.css'); ?>" />

	<!--[if IE 7]>
		<link rel="stylesheet" type="text/css" href="<?php echo assets_url('libs/font-awesome/css/font-awesome-ie7.min.css'); ?>" />
	<![endif]-->
	<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
		<script src="<?php echo assets_url('libs/bootstrap/js/html5shiv.js'); ?>"></script>
	<![endif]-->
	<script type="text/javascript">
		var APP = {
				base_url: '<?php echo base_url(); ?>',
				lang: '<?php echo LANG_ACTIVE; ?>',
				langLine: []
			};
	</script>
	<script type="text/javascript" src="<?php echo assets_url('libs/bootstrap/js/jquery.js'); ?>"></script>
</head>

<body>

<div style="padding: 30px 20px">
    <div style="border: 1px solid #CCC; padding: 10px;">
        <?php if(isset($photo_url) && $photo_url != ''): ?>
            <div class="pull-left">
                <div style="margin-right:20px">
                    <div style="width: 150px; text-align: center;">
                        <img id="photo-preview" src="<?php echo $photo_url; ?>" alt="Photo" style="min-width: 100%; height: auto;" />
                    </div>
                </div>
            </div>
        <?php endif; ?>
    
        <div class="pull-left">
            <form method="post" enctype="multipart/form-data">
                <label><?php echo lang('label_pick_photo'); ?></label>
                
                <?php if(isset($error)): ?>
                    <div class="alert alert-error">
                        <?php echo $error; ?>
                    </div>
                <?php endif; ?>
                
                <input type="file" name="userfile" />
                <div style="margin-top: 20px;">
                    <button type="submit" class="btn btn-primary">Upload!</button>
                </div>
            </form>
        </div>
        <div class="clearfix"></div>
    </div>
    
    <div style="margin-top: 20px;">
        <button type="button" class="btn btn-close"><?php echo lang('btn_close'); ?></button>
    </div>
</div>

<script type="text/javascript" src="<?php echo assets_url('libs/bootstrap/js/bootstrap.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo assets_url('libs/bootstrap/js/holder/holder.js'); ?>"></script>
<script type="text/javascript" src="<?php echo assets_url('libs/bootstrap/js/google-code-prettify/prettify.js'); ?>"></script>
<script type="text/javascript">
$(function(){
    $(".btn-close").bind('click', function(){
        if($("#photo-preview").length > 0){
            var img_src = $("#photo-preview").attr("src");
            window.opener.$("#photo").find("img").attr("src", img_src);
        }
        window.close();
    });
});
</script>
</body>
</html>