<!DOCTYPE html>
<html>
<head>
	<title><?php echo $page_title; ?></title>
	<meta charset="UTF-8" />
	<link rel="stylesheet" type="text/css" href="<?php echo assets_url(); ?>libs/bootstrap/css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo assets_url(); ?>libs/bootstrap/css/bootstrap-responsive.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo assets_url(); ?>libs/bootstrap/css/todc-bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo assets_url(); ?>libs/font-awesome/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo assets_url(); ?>css/stylesheet.css" />

	<!--[if IE]>
	<link rel="stylesheet" type="text/css" href="<?php echo assets_url(); ?>libs/font-awesome/css/font-awesome-ie7.min.css" />    
	<script type="text/javascript" src="<?php echo assets_url(); ?>libs/bootstrap/js/html5shiv.js"></script>
	<![endif]-->
	<script type="text/javascript">
		var App = {
				base_url: "<?php echo base_url(); ?>", 
				assets_url: "<?php echo assets_url(); ?>"
			};
	</script>
	<script type="text/javascript" src="<?php echo assets_url(); ?>js/jquery-1.9.1.min.js"></script>
</head>
<body>
    
    <?php Menu::main(); ?>
    
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span2"><?php Menu::left(@$menu_left_name); ?></div>
            <div class="span10"><?php echo $content; ?></div>
        </div>        
    </div>
    
<script type="text/javascript" src="<?php echo assets_url(); ?>libs/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo assets_url(); ?>libs/bootstrap/js/html5shiv.js"></script>
<script type="text/javascript" src="<?php echo assets_url(); ?>js/application.js"></script>
<?php if(isset($addjs) && is_array($addjs)): ?>
<?php foreach($addjs as $f): ?>
<script type="text/javascript" src="<?php echo $f; ?>"></script>
<?php endforeach; ?>
<?php endif; ?>

</body>
</html>