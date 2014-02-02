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
		
			<form id="form-register" method="post" action="<?php echo base_url('company/register/save'); ?>">
			<fieldset>
				
				<legend><?php echo $this->lang->line('label_company_registration'); ?></legend>
				
				<?php if(form_error('form_id', '', '') != ''): ?>
					<div class="alert alert-error">
						<?php echo form_error('form_id', '&bull; ', '&nbsp;'); ?>
					</div>
					<div class="clearfix"></div>
				<?php endif; ?>

				<div class="row">
					
					<div class="span8"><h4>Company Info</h4></div>
					
					<div class="span4">
						<label for="company_name"><?php echo $this->lang->line('label_company_name'); ?></label>
						<input class="input-block-level" type="text" name="company_name" id="company_name" value="<?php echo set_value('company_name'); ?>" />
						<?php echo form_error('company_name'); ?>
					</div>				
					<div class="span4">
						<label for="phone"><?php echo $this->lang->line('label_phone'); ?></label>
						<input class="input-block-level" type="text" name="phone" id="phone" value="<?php echo set_value('phone'); ?>" />
						<?php echo form_error('phone'); ?>
					</div>
					
					<div class="clearfix"></div>
					
					<div class="span4">
						<label for="description"><?php echo $this->lang->line('label_description'); ?></label>
						<textarea class="input-block-level" name="description" id="description" rows="4"><?php echo set_value('description'); ?></textarea>
						<?php echo form_error('description'); ?>
					</div>				
					<div class="span4">
						<label for="address"><?php echo $this->lang->line('label_address'); ?></label>
						<textarea class="input-block-level" name="address" id="address" rows="4"><?php echo set_value('address'); ?></textarea>
						<?php echo form_error('address'); ?>
					</div>
					
					<div class="clearfix"></div>
					
					<div class="span4">
						<label for="city"><?php echo $this->lang->line('label_city'); ?></label>
						<select name="city" id="city">
							<option>&nbsp;</option>
							<?php foreach($locations as $country=>$cities): ?>
								<optgroup label="<?php echo $country; ?>">
									<?php foreach($cities as $city): ?>
										<option data-country="<?php echo $country; ?>" value="<?php echo $city['city']; ?>"><?php echo $city['city']; ?></option>
									<?php endforeach; ?>
								</optgroup>
							<?php endforeach; ?>
						</select>
						<?php echo form_error('city'); ?>
					</div>
					<div class="span4">
						<label for="country"><?php echo $this->lang->line('label_country'); ?></label>
						<input class="input-block-level" type="text" name="country" id="country" value="<?php echo set_value('country'); ?>" />
						<?php echo form_error('country'); ?>
					</div>
					
					<div class="clearfix"></div>
					
					<div class="span4">
						<label for="industry_name"><?php echo $this->lang->line('label_industry_name'); ?></label>
						<input class="input-block-level" type="text" name="industry_name" id="industry_name" value="<?php echo set_value('industry_name'); ?>" />
						<?php echo form_error('industry_name'); ?>
					</div>
					
					<div class="clearfix"></div>					
					
					
					<div class="span8"><div class="line"></div></div>
					
					
					<div class="span8"><h4>Registrant</h4></div>
					<div class="clearfix"></div>
					
					<div class="span4">
						<label for="registrant_name"><?php echo $this->lang->line('label_registrant_name'); ?></label>
						<input class="input-block-level" type="text" name="registrant_name" id="registrant_name" value="<?php echo set_value('registrant_name'); ?>" />
						<?php echo form_error('registrant_name'); ?>
					</div>
					<div class="span4">
						<label for="registrant_email"><?php echo $this->lang->line('label_registrant_email'); ?></label>
						<input class="input-block-level" type="text" name="registrant_email" id="registrant_email" value="<?php echo set_value('registrant_email'); ?>" />
						<?php echo form_error('registrant_email'); ?>
					</div>
					
					<div class="clearfix"></div>
					
					<div class="span4">
						<label for="registrant_password"><?php echo $this->lang->line('label_password'); ?></label>
						<input class="input-block-level" type="password" name="registrant_password" id="registrant_password" autocomplete="off" />
						<?php echo form_error('registrant_password'); ?>
					</div>
					<div class="span4">
						<label for="registrant_re_password"><?php echo $this->lang->line('label_password_re'); ?></label>
						<input class="input-block-level" type="password" name="registrant_re_password" id="registrant_re_password" />
						<?php echo form_error('registrant_re_password'); ?>
					</div>
					
					<div class="clearfix"></div>					
				</div>
				
				<div class="clearfix"></div>
				<div class="mt20">
					<input type="hidden" name="form_id" value="<?php echo $encrypt_key; ?>" />
					<input type="hidden" name="public_key" value="<?php echo $public_key; ?>" />
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
				
			</fieldset>  
			</form>
		
		</div>
		<div class="span4">&nbsp;</div>
	</div>
</div>

<script type="text/javascript">
$(function(){
	$("#city").bind('change', function(){
		var c = $(this).find("option:selected").attr("data-country");
		$("#country").val(c);
	});
});
</script>