<div class="row show-grids">
	<div class="span8">

		<form method="post" action="<?php echo base_url('search/advanced?do=true'); ?>">
			<fieldset>
				<legend><?php echo lang('label_advanced_search'); ?></legend>
		
				
				<?php if(isset($errmsg)): ?>
					<div class="alert alert-error">
						<?php echo $errmsg; ?>
					</div>
				<?php endif; ?>
				
				<div class="row">
					<div class="span8">
						<div>
							<label for="keyword"><?php echo lang('label_keyword'); ?></label>
							<input type="text" name="keyword" id="keyword" class="span6" />
						</div>
						<div>
							<div class="pull-left mr10"><?php echo lang('label_search_in'); ?>:</div>
							<div class="pull-left mr10">
								<label class="radio">
									<input type="radio" name="search_in" value="all" checked="checked"  /> 
									<?php echo lang('label_search_in_all'); ?>
								</label>
							</div>
							<div class="pull-left mr10">
								<label class="radio">
									<input type="radio" name="search_in" value="title"  /> 
									<?php echo lang('label_search_in_title'); ?>
								</label>
							</div>
							<div class="pull-left mr10">
								<label class="radio">
									<input type="radio" name="search_in" value="company_name"  /> 
									<?php echo lang('label_search_in_company_name'); ?>
								</label>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
				
				<div class="line"></div>
				
				<div class="row">
					<div class="span4">
						<label><?php echo lang('label_location'); ?></label>
						<select name="location">
							<option value=""><?php echo lang('label_any_location'); ?></option>
							<?php foreach($locations as $country=>$cities): ?>
								<optgroup label="<?php echo $country; ?>">
									<?php foreach($cities as $row): ?>
										<option value="<?php echo $row['city']; ?>"><?php echo $row['city']; ?></option>
									<?php endforeach; ?>
								</optgroup>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="span4">
						<label><?php echo lang('label_specialization'); ?></label>
						<select name="specialization">
							<option value=""><?php echo lang('label_any_specialization'); ?></option>
							<?php foreach($categories as $ctg=>$sub): ?>
								<optgroup label="<?php echo $ctg; ?>">
									<?php foreach($sub as $row): ?>
										<option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
									<?php endforeach; ?>
								</optgroup>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
				
				<div class="line"></div>
				
				<div class="row">
					<div class="span8">
						<label><?php echo lang('label_month_salary'); ?></label>
					</div>
					<div class="clearfix"></div>
					<div class="span4">
						<label for="salary_min"><?php echo lang('label_minimum'); ?></label>
						<input type="text" name="salary_min" id="salary_min" />
					</div>
					<div class="span4">
						<label for="salary_max"><?php echo lang('label_maximum'); ?></label>
						<input type="text" name="salary_max" id="salary_max" />
					</div>
				</div>
				
				<div class="line"></div>
				
				<div class="row">
					<div class="span8">
						<label for="keyword"><?php echo lang('label_job_type'); ?></label>
						<div>
							<div class="pull-left mr10">
								<label class="checkbox">
									<input type="checkbox" name="job_type[]" value="full_time"  /> 
									<?php echo lang('label_job_type_full'); ?>
								</label>
							</div>
							<div class="pull-left mr10">
								<label class="checkbox">
									<input type="checkbox" name="job_type[]" value="pert_time"  /> 
									<?php echo lang('label_job_type_part'); ?>
								</label>
							</div>
							<div class="pull-left mr10">
								<label class="checkbox">
									<input type="checkbox" name="job_type[]" value="contract"  /> 
									<?php echo lang('label_job_type_contract'); ?>
								</label>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
				
				<div class="line"></div>
				
				<div class="row">
					<div class="span8">
						<label><?php echo lang('label_job_experience'); ?></label>
						<select name="job_experience">
							<option value="0"><?php echo lang('label_beginner'); ?></option>
							<option value="1-3"><?php echo lang('label_job_experience_13'); ?></option>
							<option value="4-5"><?php echo lang('label_job_experience_45'); ?></option>
							<option value="g5"><?php echo lang('label_job_experience_g5'); ?></option>
						</select>
					</div>
				</div>
				
				<div class="line"></div>
				
				<div class="row">
					<div class="span8">
						<label for="keyword"><?php echo lang('label_job_time'); ?></label>
						<div>
							<div class="pull-left mr10">
								<label class="radio">
									<input type="radio" name="job_time" value="3d" checked="checked" /> 
									<?php echo lang('label_job_time_3d'); ?>
								</label>
							</div>
							<div class="pull-left mr10">
								<label class="radio">
									<input type="radio" name="job_time" value="1w"  /> 
									<?php echo lang('label_job_time_1w'); ?>
								</label>
							</div>
							<div class="pull-left mr10">
								<label class="radio">
									<input type="radio" name="job_time" value="2w"  /> 
									<?php echo lang('label_job_time_2w'); ?>
								</label>
							</div>
							<div class="pull-left mr10">
								<label class="radio">
									<input type="radio" name="job_time" value="1m"  /> 
									<?php echo lang('label_job_time_1m'); ?>
								</label>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
				
				<div class="line"></div>
				
				<div class="row">
					<div class="span8">
						<button type="submit" class="btn btn-primary"><?php echo lang('btn_search'); ?></button>
					</div>
				</div>
				
			</fieldset>
		</form>
		
	</div>
</div>