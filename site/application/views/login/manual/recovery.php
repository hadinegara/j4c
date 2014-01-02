<?php 
// login key
$private_key = rand(111, 999);
$public_key  = rand(1111, 9999);
$encrypt_key = md5($private_key * $public_key);
$this->session->set_userdata('private_key', $private_key);
?>

<div class="row">
	<div class="span6 offset3">
	
		<form class="form-horizontal" action="<?php echo base_url('login/manual/recovery?save'); ?>" method="post">
			<div class="modal" style="position:relative; top:auto; left:auto; right:auto; margin:0 auto 20px; z-index:1; max-width:100%">
				<div class="modal-header">
					<h3><?php echo $this->lang->line('label_account_recovery'); ?></h3>
				</div>
				<div class="modal-body">
					<?php if(validation_errors() != ''): ?>
					<div class="alert alert-error">
						<ul>
						<?php echo validation_errors('<li>', '</li>'); ?>
						</ul>
					</div>
					<?php endif; ?>
					
					<label for="recovery-email"><?php echo $this->lang->line('label_email_recovery'); ?></label>
					<input class="span3" autocomplete="off" type="text" name="recovery_email" id="recovery-email" placeholder="<?php echo $this->lang->line('label_email'); ?>" />
					
					<div class="clearfix mb20"></div>
					<input type="hidden" name="form_id" value="<?php echo $encrypt_key; ?>" />
					<input type="hidden" name="public_key" value="<?php echo $public_key; ?>" />
					<button type="submit" class="btn btn-primary"><?php echo $this->lang->line('label_get_recovery'); ?></button>
				</div>
			</div>
		</form>
	
	</div>
</div>