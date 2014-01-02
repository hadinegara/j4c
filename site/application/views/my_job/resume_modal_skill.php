<!-- skill-modal -->
<div class="modal hide" id="skill-modal">
	<form method="post" action="<?php echo base_url('my_job/resume/update/skill'); ?>">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h3><?php echo $this->lang->line('label_skill'); ?></h3>
		</div>
		
		<div class="modal-body">
			<?php if(isset($info['skill']) && is_array($info['skill']) && count($info['skill'])>0): ?>			
				<?php foreach($info['skill'] as $skill): ?>
					<div class="skill-item">
						<div class="w50">
							<div class="item-skill"><input class="input-block-level" type="text" name="skill[]" value="<?php echo $skill['skill']; ?>" /></div>
						</div>
						<div class="w50">
							<div class="item-prof">
								<select class="input-block-level" name="proficiency[]">
									<?php $p = array('beginner','intermediete','advanced'); ?>
									<?php foreach($p as $pro): ?>
										<option value="<?php echo $pro; ?>"<?php echo ($skill['proficiency'] == $pro ? ' selected="selected"' : ''); ?>><?php echo $this->lang->line('label_level_'.$pro); ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				<?php endforeach; ?>			
			<?php endif; ?>
								
			<div class="skill-item">
				<div class="w50">
					<div class="item-skill"><input class="input-block-level" type="text" name="skill[]" /></div>
				</div>
				<div class="w50">
					<div class="item-prof">
						<select class="input-block-level" name="proficiency[]">
							<?php $p = array('beginner','intermediete','advanced'); ?>
							<?php foreach($p as $pro): ?>
								<option value="<?php echo $pro; ?>"><?php echo $this->lang->line('label_level_'.$pro); ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
				
			<div class="text-right">
				<a href="#" class="btn btn-mini btn-add_skill"><?php echo $this->lang->line('btn_add_skill'); ?></a>
				<div class="pull-left"><?php echo $this->lang->line('msg_leave_blank_to_remove') ?></div>
				<div class="clearfix"></div>
			</div>
		</div>
		
		<div class="modal-footer">
			<button class="btn btn-n">Close</button>
			<button class="btn btn-primary btn-y" data-loading-text="Loading...">Save changes</button>
		</div>
	</form>
</div>
<!-- end of skill-modal -->