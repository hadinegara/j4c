<?php $this->load->view('my_job/tab'); ?>

<div class="row">
    <div class="span8">
        <form method="post" action="<?php echo base_url("my_job/alert/save"); ?>">
            <fieldset>
                <legend>Buat Job Alert Baru</legend>
                
                <?php if(validation_errors() != ''): ?>
                    <div class="alert alert-danger">
                        <?php echo validation_errors('<div>', '</div>'); ?>
                    </div>
                <?php endif; ?>
                
                <div class="row">
                    <div class="span4">
                        <label for="period"><?php echo lang('label_period'); ?></label>
                        <select name="period" id="period">
                            <option value="daily" <?php echo set_select('perion', 'daily', TRUE); ?>><?php echo lang('label_daily'); ?></option>
                            <option value="monthly" <?php echo set_select('perion', 'monthly'); ?>><?php echo lang('label_monthly'); ?></option>
                        </select>
                    </div>
                </div>
                
                
                <div class="row">
                    <div class="span4">
                        <label for="title"><?php echo lang('label_title'); ?></label>
                        <input type="text" name="title" id="title" value="<?php echo set_value('title'); ?>" class="input-block-level" />
                    </div>
                    
                    <div class="span4">
                        <label for="location"><?php echo lang('label_location'); ?></label>
						<select id="location" name="location">
							<option value=""><?php echo lang('label_any_location'); ?></option>
							<?php foreach($locations as $country=>$cities): ?>
								<optgroup label="<?php echo $country; ?>">
									<?php foreach($cities as $row): ?>
										<option value="<?php echo $row['city']; ?>" <?php echo set_select('location', $row['city']); ?>><?php echo $row['city']; ?></option>
									<?php endforeach; ?>
								</optgroup>
							<?php endforeach; ?>
						</select>
                    </div>
                </div>
                
                <div class="row">
                    <div class="span4">
                        <label for="specialization"><?php echo lang('label_specialization'); ?></label>
                        <select name="specialization" id="specialization">
                            <option value=""><?php echo lang('label_any_specialization'); ?></option>
                            <?php foreach($categories as $spc_name=>$spc): ?>
                                <optgroup label="<?php echo lang('label_'. url_title($spc_name, '_', TRUE)); ?>">
                                    <?php foreach($spc as $ctg): ?>
                                        <option value="<?php echo $ctg['id']; ?>" <?php echo set_select('specialization', $ctg['id']); ?>><?php echo lang('label_'. url_title($ctg['name'], '_', TRUE)); ?></option>
                                    <?php endforeach; ?>
                                </optgroup>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <div class="span4">
                        <label for="salary"><?php echo lang('label_month_salary'); ?></label>
                        <input type="text" name="salary" id="salary" value="<?php echo set_value('salary'); ?>" />
                    </div>
                </div>
                
                <div class="row">
                    <div class="span4">
                        <div><?php echo lang('label_job_type'); ?></div>
                        <label class="radio inline">
                            <input type="radio" name="job_type" id="job_type1" value="full_time" <?php echo set_radio('job_type', 'full_time', TRUE); ?> />
                            <?php echo lang('label_full_time'); ?>
                        </label>
                        <label class="radio inline">
                            <input type="radio" name="job_type" id="job_type2" value="part_tile" <?php echo set_radio('job_type', 'part_tile'); ?> />
                            <?php echo lang('label_part_time'); ?>
                        </label>
                        <label class="radio inline">
                            <input type="radio" name="job_type" id="job_type3" value="contract" <?php echo set_radio('job_type', 'contract'); ?> />
                            <?php echo lang('label_contract'); ?>
                        </label>
                    </div>
                </div>
                
                <div style="margin-top: 20px;">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
                
            </fieldset>
        </form>
    </div>
</div>
