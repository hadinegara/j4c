<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>ZzZZ</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="stylesheet" type="text/css" href="<?php echo assets_url('libs/bootstrap/css/bootstrap.css'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo assets_url('libs/bootstrap/css/bootstrap-responsive.css'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo assets_url('libs/bootstrap/css/todc-bootstrap.css'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo assets_url('libs/bootstrap/js/google-code-prettify/prettify.css'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo assets_url('libs/font-awesome/css/font-awesome.min.css'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo assets_url('css/app.css'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo assets_url('css/app-responsive.css'); ?>" />
	<?php if(isset($addcss)): ?>
	<?php foreach($addcss as $css): ?>
	<link rel="stylesheet" type="text/css" href="<?php echo $css; ?>" />
	<?php endforeach; ?>
	<?php endif; ?>

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
</head>

<body>

<div class="container">
	<div class="header">
		<div class="hd1">
			<div class="pull-left">
				<a class="logo" href="<?php echo base_url(); ?>"><img src="<?php echo assets_url('images/logo.png'); ?>" alt="ZzZZZ" class="img-responsive" /></a>
			</div>
			<div class="pull-right">
				<div class="lang-bar">
					<?php 
					$href_id = (LANG_ACTIVE == 'bahasa')  ? '#' : full_url('?lang=id');
					$href_en = (LANG_ACTIVE == 'english') ? '#' : full_url();
					?>
					<a class="<?php echo ((LANG_ACTIVE=='bahasa')?'active':''); ?>" href="<?php echo $href_id; ?>">Bahasa</a> - 
					<a class="<?php echo ((LANG_ACTIVE=='english')?'active':''); ?>" href="<?php echo $href_en; ?>">English</a>
				</div>
			</div>
			<div class="pull-left"></div>
			<div class="clearfix"></div>
		</div>
		<div class="hd2"><?php Menu::main(); ?></div>
	</div>
	
	<div class="body">
		<?php echo $content; ?>
	</div>
</div>

<script type="text/javascript" src="<?php echo assets_url('libs/bootstrap/js/jquery.js'); ?>"></script>
<script type="text/javascript" src="<?php echo assets_url('libs/bootstrap/js/bootstrap.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo assets_url('libs/bootstrap/js/holder/holder.js'); ?>"></script>
<script type="text/javascript" src="<?php echo assets_url('libs/bootstrap/js/google-code-prettify/prettify.js'); ?>"></script>
<script type="text/javascript" src="<?php echo assets_url('js/app.lang-'. LANG_ACTIVE .'.js'); ?>"></script>
<script type="text/javascript" src="<?php echo assets_url('js/app.js'); ?>"></script>
<?php if(isset($addjs)): ?>
<?php foreach($addjs as $js): ?>
<script type="text/javascript" src="<?php echo $js; ?>"></script>
<?php endforeach; ?>
<?php endif; ?>
</body>
</html>