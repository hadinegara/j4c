<?php 
// login key
$private_key = rand(111, 999);
$public_key  = rand(1111, 9999);
$encrypt_key = md5($private_key * $public_key);
$this->session->set_userdata('private_key', $private_key);
?>

<div class="container">
	<div class="row">
		<div class="span8">
		
			<form id="form-register" method="post" action="<?php echo base_url('register/manual/save'); ?>">
			<fieldset>
				
				<legend><?php echo $this->lang->line('label_register'); ?></legend>
				
				<?php if(validation_errors() != ''): ?>
				<div class="alert alert-error">
					<?php echo validation_errors('<div>&bull; ', '</div>'); ?>
				</div>
				<?php endif; ?>
				
				<div class="row">
					<div class="span4">
						<label for="first_name"><?php echo $this->lang->line('label_first_name'); ?></label>
						<input class="input-block-level" type="text" name="first_name" id="first_name" value="<?php echo set_value('first_name'); ?>" />
					</div>
				
					<div class="span4">
						<label for="last_name"><?php echo $this->lang->line('label_last_name'); ?></label>
						<input class="input-block-level" type="text" name="last_name" id="last_name" value="<?php echo set_value('last_name'); ?>" />
					</div>
					
					<div class="clearfix"></div>
					
					<div class="span4">
						<label for="gender"><?php echo $this->lang->line('label_gender'); ?></label>
						<select name="gender" id="gender" class="span2">
							<option value="M" <?php echo set_select('gender', 'M', TRUE); ?>><?php echo $this->lang->line('label_gender_m'); ?></option>
							<option value="F" <?php echo set_select('gender', 'F'); ?>><?php echo $this->lang->line('label_gender_f'); ?></option>
						</select>
					</div>
					
					<div class="span4">
						<label><?php echo $this->lang->line('label_dob'); ?></label>
						<select name="dob_date" style="width:auto">
							<?php for($i=1; $i<=31; $i++): ?>
								<option value="<?php echo $i; ?>" <?php echo set_select('dob_date', $i); ?>><?php echo ($i<10 ? '0'.$i : $i); ?></option>
							<?php endfor; ?>
						</select>
						<select name="dob_month" style="width:auto">
							<?php for($i=1; $i<=12; $i++): ?>
								<?php echo $month_name = $this->lang->line('month_'. $i); ?>
								<option value="<?php echo $i; ?>" <?php echo set_select('dob_month', $i); ?>><?php echo $month_name; ?></option>
							<?php endfor; ?>
						</select>
						<select name="dob_year" style="width:auto">
							<?php for($i=((int)date('Y')-10); $i>=((int)date('Y')-50); $i--): ?>
								<option value="<?php echo $i; ?>" <?php echo set_select('dob_year', $i); ?>><?php echo $i; ?></option>
							<?php endfor; ?>
						</select>
					</div>
					
					<div class="clearfix mb20"></div>
					
					<div class="span4">
						<label for="email"><?php echo $this->lang->line('label_email'); ?></label>
						<input class="input-block-level" type="text" name="email" id="email" value="<?php echo set_value('email'); ?>" autocomplete="off" />
					</div>
				
					<div class="clearfix"></div>
					
					<div class="span4">
						<label for="password"><?php echo $this->lang->line('label_password'); ?></label>
						<input class="input-block-level" type="password" name="password" id="password" autocomplete="off" />
					</div>
				
					<div class="span4">
						<label for="re_password"><?php echo $this->lang->line('label_password_re'); ?></label>
						<input class="input-block-level" type="password" name="re_password" id="re_password" />
					</div>
					
					<div class="clearfix"></div>					
				</div>
				
				<div class="clearfix"></div>
				<div class="mt20">
					<input type="hidden" name="form_id" value="<?php echo $encrypt_key; ?>" />
					<input type="hidden" name="public_key" value="<?php echo $public_key; ?>" />
					<button type="submit" class="btn">Submit</button>
				</div>
				
			</fieldset>  
			</form>
		
		</div>
		<div class="span4">R</div>
	</div>
</div>