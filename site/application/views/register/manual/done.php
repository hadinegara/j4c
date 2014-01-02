<div class="container">
	<div class="row">
		<div class="span8">
			<legend><?php echo $this->lang->line('label_register'); ?></legend>
			
			<div class="alert alert-success">
				<?php
				$message = $this->lang->line('msg_register_done');
				echo str_replace('{name}', $name, $message);
				?>
			</div>
		</div>
		
		<div class="span4">R</div>
	</div>
</div>