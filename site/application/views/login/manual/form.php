<?php 
// login key
$private_key = rand(111, 999);
$public_key  = rand(1111, 9999);
$encrypt_key = md5($private_key * $public_key);
$this->session->set_userdata('private_key', $private_key);
?>

<div class="row">
	<div class="span6 offset3">
	
		<form class="form-horizontal" action="<?php echo base_url('login/manual/test'); ?>" method="post">
			<div class="modal" style="position:relative; top:auto; left:auto; right:auto; margin:0 auto 20px; z-index:1; max-width:100%">
				<div class="modal-header">
					<h3><?php echo $this->lang->line('label_login'); ?></h3>
				</div>
				<div class="modal-body">
					<?php if(@$login_message != ''): ?>
						<div class="alert alert-error">
							<ul><li><?php echo $login_message; ?></li></ul>
						</div>
					<?php endif; ?>
					
					<?php if(validation_errors() != ''): ?>
						<div class="alert alert-error">
							<ul>
							<?php echo validation_errors('<li>', '</li>'); ?>
							</ul>
						</div>
					<?php endif; ?>
					
					<div class="control-group">
						<label class="control-label" for="login-email"><?php echo $this->lang->line('label_email'); ?></label>
						<div class="controls">
							<input type="text" name="login_email" id="login-email" placeholder="<?php echo $this->lang->line('label_email'); ?>" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="login-password"><?php echo $this->lang->line('label_password'); ?></label>
						<div class="controls">
							<input type="password" name="login_password" id="login-password" placeholder="<?php echo $this->lang->line('label_password'); ?>" />
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<div class="pull-right">
						<input type="hidden" name="form_id" value="<?php echo $encrypt_key; ?>" />
						<input type="hidden" name="public_key" value="<?php echo $public_key; ?>" />
						<button type="submit" class="btn btn-primary"><?php echo $this->lang->line('label_login'); ?></button>
					</div>
					<div class="pull-left">
						<a href="<?php echo base_url('login/manual/recovery'); ?>"><?php echo $this->lang->line('label_cannot_access_account'); ?></a>
					</div>
				</div>
			</div>
		</form>
	
	</div>
</div>