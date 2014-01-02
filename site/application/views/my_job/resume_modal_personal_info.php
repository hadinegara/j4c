<!-- personal_info-modal -->
<div class="modal hide" id="personal_info-modal">
	<form method="post" action="<?php echo base_url('my_job/resume/update/personal_info'); ?>">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h3><?php echo $this->lang->line('label_personal_info'); ?></h3>
		</div>
		
		<div class="modal-body">
			<?php $seeker = @$info['seeker'][0]; ?>
			<?php if(is_array($seeker) && count($seeker)>0): ?>
				<?php foreach($seeker as $k=>$v): ?>
					<?php if(! preg_match('/(_id|password|pics|searchable|status|date_|reg_)/i', $k)): ?>
						<div class="row">
							<div class="span2"><div style="padding-top:5px"><?php echo $this->lang->line('label_'.$k); ?></div></div>
							<div class="span3">
								<?php 
								$val = $v;
								if(! $val) $val = '-';
								?>
								
								<?php if(preg_match('/(date|dob)/i', $k)): ?> 
								
									<?php $val = ($val == '0000-00-00') ? '' : date('d-m-Y', strtotime($val)); ?>
									<input class="input-block-level datepicker" type="text" name="<?php echo $k; ?>" value="<?php echo $val; ?>" />
								
								<?php elseif(preg_match('/(email)/i', $k)): ?> 
								
									<input class="input-block-level" readonly="readonly" type="text" name="<?php echo $k; ?>" value="<?php echo $val; ?>" />
								
								<?php elseif(preg_match('/(gender)/i', $k)): ?>
								
									<?php $val = strtoupper($val); ?>
									<select name="gender">
										<option value="M"<?php echo ('M' == $val ? ' selected="selected"' : ''); ?>><?php echo $this->lang->line('label_gender_m'); ?></option>
										<option value="F"<?php echo ('F' == $val ? ' selected="selected"' : ''); ?>><?php echo $this->lang->line('label_gender_f'); ?></option>
									</select>
								
								<?php else: ?>
								
									<input class="input-block-level" type="text" name="<?php echo $k; ?>" value="<?php echo $val; ?>" />
								
								<?php endif; ?>
							</div>
							<div class="clearfix"></div>
						</div>
					<?php endif; ?>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
		
		<div class="modal-footer">
			<button class="btn btn-n">Close</button>
			<button class="btn btn-primary btn-y" data-loading-text="Loading...">Save changes</button>
		</div>
	</form>
</div>
<!-- end of personal_info-modal -->