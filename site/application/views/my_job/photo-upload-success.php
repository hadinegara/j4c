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
    <form method="post" enctype="multipart/form-data">
        <div style="border: 1px solid #CCC; padding: 10px;">
            <label><?php echo lang('label_pick_photo'); ?></label>
            <input type="file" name="photo" />
        </div>
        
        <div style="margin-top: 20px;">
            <button type="submit" class="btn">Upload!</button>
        </div>
    </form>
</div>

<script type="text/javascript" src="<?php echo assets_url('libs/bootstrap/js/bootstrap.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo assets_url('libs/bootstrap/js/holder/holder.js'); ?>"></script>
<script type="text/javascript" src="<?php echo assets_url('libs/bootstrap/js/google-code-prettify/prettify.js'); ?>"></script>
</body>
</html>