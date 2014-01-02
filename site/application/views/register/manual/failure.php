<div class="container">
	<div class="row">
		<div class="span8">
			<legend><?php echo $this->lang->line('label_register'); ?></legend>
			
			<div class="alert alert-error">
				<?php echo isset($error_message) ? $error_message : $this->lang->line('msg_register_failure'); ?>
			</div>
		</div>
		
		<div class="span4">R</div>
	</div>
</div>