<?php 
// login key
$private_key = rand(111, 999);
$public_key  = rand(1111, 9999);
$encrypt_key = md5($private_key * $public_key);
$this->session->set_userdata('private_key', $private_key);
?>

<div class="container">
	<div class="row">
		<div class="span7">
		
			<fieldset>
			<legend><?php echo $this->lang->line('label_edit_job'); ?> &rsaquo; <?php echo $job_detail['title']; ?></legend>
			</fieldset>
			
			<form class="form-horizontal" id="form-posting-job" method="post" action="<?php echo base_url('company/posted_job/save_edited'); ?>">
				<?php if(form_error('form_id', '', '') != ''): ?>
					<div class="alert alert-error">
						<?php echo form_error('form_id', '&bull; ', '&nbsp;'); ?>
					</div>
					<div class="clearfix"></div>
				<?php endif; ?>

				<div class="control-group">
					<label class="control-label" for="title"><?php echo $this->lang->line('label_job_title'); ?></label>
					<div class="controls">
						<input type="text" name="title" id="title" value="<?php echo set_value('title', $job_detail['title']); ?>" class="input-block-level" />
						<?php echo form_error('title'); ?>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="job_type"><?php echo $this->lang->line('label_job_type'); ?></label>
					<div class="controls">
						<select name="job_type" id="job_type">
							<?php foreach(array('full_time','part_time','contract') as $type): ?>
							<option <?php echo set_select('job_type', $type, ($type == $job_detail['job_type'])); ?> value="<?php echo $type; ?>"><?php echo $this->lang->line('label_'. $type); ?></option>
							<?php endforeach; ?>
						</select>
						
						<?php if(isset($_POST['contract_duration']) || @$_POST['job_type']=='contract' || (isset($job_detail['job_type']) && $job_detail['job_type']=='contract')): ?>
							<input type="text" placeholder="<?php echo $this->lang->line('label_duration'); ?>..." name="contract_duration" id="contract-duration" value="<?php echo set_value('contract_duration', $job_detail['contract_duration']); ?>" />
							<?php echo form_error('contract_duration'); ?>
						<?php endif; ?>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="description"><?php echo $this->lang->line('label_description'); ?></label>
					<div class="controls">
						<textarea name="description" id="description" rows="7" class="input-block-level"><?php echo set_value('description', $job_detail['description']); ?></textarea>
						<?php echo form_error('description'); ?>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="requirement-0"><?php echo $this->lang->line('label_requirement'); ?></label>
					<div class="controls">
						<?php if(isset($_POST['requirement'])): ?>
							<?php $tmp_value = ''; ?>
							<?php foreach($_POST['requirement'] as $i=>$req_value): ?>
								<?php if($req_value != ''): ?>
									<?php $tmp_value .= $req_value; ?>
									<div class="rrow mb01"><input type="text" name="requirement[]" value="<?php echo $req_value; ?>" id="requirement-<?php echo $i; ?>" class="input-block-level" /></div>
								<?php endif; ?>
							<?php endforeach; ?>
							
							<?php if(form_error('requirement') != '' && $tmp_value == ''): ?>
								<div class="rrow mb01"><input type="text" name="requirement[]" id="requirement-0" class="input-block-level" /></div>
								<div class="rrow mb01"><input type="text" name="requirement[]" id="requirement-1" class="input-block-level" /></div>
								<div class="rrow mb01"><input type="text" name="requirement[]" id="requirement-2" class="input-block-level" /></div>
								<div class="rrow mb01"><input type="text" name="requirement[]" id="requirement-3" class="input-block-level" /></div>
								<div class="rrow mb01"><input type="text" name="requirement[]" id="requirement-4" class="input-block-level" /></div>
								<?php echo form_error('requirement'); ?>
							<?php endif; ?>
						<?php elseif(isset($job_detail['requirement'])): ?>
							<?php $reqs = json_decode($job_detail['requirement']); ?>
							<?php foreach($reqs as $i=>$req_value): ?>
								<div class="rrow mb01"><input type="text" name="requirement[]" value="<?php echo $req_value; ?>" id="requirement-<?php echo $i; ?>" class="input-block-level" /></div>
							<?php endforeach; ?>
						<?php else: ?>
							<div class="rrow mb01"><input type="text" name="requirement[]" id="requirement-0" class="input-block-level" /></div>
							<div class="rrow mb01"><input type="text" name="requirement[]" id="requirement-1" class="input-block-level" /></div>
							<div class="rrow mb01"><input type="text" name="requirement[]" id="requirement-2" class="input-block-level" /></div>
							<div class="rrow mb01"><input type="text" name="requirement[]" id="requirement-3" class="input-block-level" /></div>
							<div class="rrow mb01"><input type="text" name="requirement[]" id="requirement-4" class="input-block-level" /></div>
						<?php endif; ?>
						<div><a id="add-requirement" class="btn btn-small" href="#"><?php echo $this->lang->line('btn_add_requirement'); ?></a></div>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="date_close"><?php echo $this->lang->line('label_date_close'); ?></label>
					<div class="controls">
						<input type="text" name="date_close" id="date_close" value="<?php echo set_value('date_close', date('d-m-Y', strtotime($job_detail['date_close']))); ?>" class="span3" />
						<span class="help-inline">dd-mm-yyyy</span>
						<?php echo form_error('date_close'); ?>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="month_salary"><?php echo $this->lang->line('label_month_salary'); ?> (Rp.)</label>
					<div class="controls">
						<input type="text" name="month_salary" id="month_salary" value="<?php echo set_value('month_salary', $job_detail['month_salary']); ?>" class="span3" />
						<?php echo form_error('month_salary'); ?>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="category"><?php echo $this->lang->line('label_category'); ?></label>
					<div class="controls">
						<select name="category" id="category">
							<?php $tmp_categories = array(); ?>
							<?php foreach($categories as $parent_name=>$ctg): ?>
								<?php $tmp_categories[] = $parent_name; ?>
								<?php if(! preg_match('/others?/i', $parent_name)): ?>
									<?php $plabel = $this->lang->line('label_'. url_title($parent_name, '_', TRUE)); ?>
									<optgroup label="<?php echo $plabel; ?>">
										<?php foreach($ctg as $c): ?>
											<?php $tmp_categories[] = $c['id']; ?>
											<?php $clabel = $this->lang->line('label_'. url_title($c['name'], '_', TRUE)); ?>
											<option <?php echo set_select('category', $c['id'], ($c['id'] == $job_detail['category'])) ?> value="<?php echo $c['id']; ?>"><?php echo $clabel; ?></option>
										<?php endforeach; ?>
									</optgroup>
								<?php endif; ?>
							<?php endforeach; ?>
							<option <?php echo set_select('category', 'others', ('others' == $job_detail['category'] || !in_array($job_detail['category'], $tmp_categories))); ?> value="others"><?php echo $this->lang->line('label_others'); ?></option>
						</select>
						
						<?php if(isset($_POST['category_other']) || @$_POST['category']=='others' || !in_array($job_detail['category'], $tmp_categories)): ?>
							<input type="text" name="category_other" id="category-other" value="<?php echo set_value('category_other', $job_detail['category']); ?>" />
							<?php echo form_error('category_other'); ?>
						<?php endif; ?>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="location"><?php echo $this->lang->line('label_location'); ?></label>
					<div class="controls">
						<select name="location" id="location">
							<?php $tmp_locations = array(); ?>
							<?php foreach($locations as $country=>$cities): ?>
								<?php $tmp_locations[] = $country; ?>
								<optgroup label="<?php echo $country; ?>">
									<?php foreach($cities as $c): ?>
										<?php $tmp_locations[] = $c['city']; ?>
										<option <?php echo set_select('location', $c['city'], ($c['city'] == $job_detail['location'])); ?> value="<?php echo $c['city']; ?>"><?php echo $c['city']; ?></option>
									<?php endforeach; ?>
								</optgroup>							
							<?php endforeach; ?>
							<option <?php echo set_select('location', 'others', ('others' == $job_detail['location'] || !in_array($job_detail['location'], $tmp_locations))); ?> value="others"><?php echo $this->lang->line('label_others'); ?></option>
						</select>
						
						<?php if(isset($_POST['location_other']) || @$_POST['location']=='others' || !in_array($job_detail['location'], $tmp_locations)): ?>
							<input type="text" name="location_other" id="location-other" value="<?php echo set_value('location_other', $job_detail['location']); ?>" />
							<?php echo form_error('location_other'); ?>
						<?php endif; ?>
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="noj"><?php echo $this->lang->line('label_number_of_jobs'); ?></label>
					<div class="controls">
						<input type="text" name="noj" id="noj" value="<?php echo set_value('noj', $job_detail['noj']); ?>" class="span3" />
						<?php echo form_error('noj'); ?>
					</div>
				</div>
				
				<div class="control-group">
					<div class="controls">
						<input type="hidden" name="form_id" value="<?php echo $encrypt_key; ?>" />
						<input type="hidden" name="public_key" value="<?php echo $public_key; ?>" />
						<input type="hidden" name="job_id" value="<?php echo $job_id; ?>" />
						<input type="submit" value="<?php echo $this->lang->line('btn_save_job'); ?>" class="btn btn-primary" />
					</div>
				</div>
				
			</form>
		
		</div>
	</div>
</div>

<script type="text/javascript">
APP.langLine['duration'] = '<?php echo $this->lang->line('label_duration'); ?>';
</script>