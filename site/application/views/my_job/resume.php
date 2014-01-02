<?php $this->load->view('my_job/tab'); ?>

<div class="row">
	<div class="span3 offset9">
		<div class="resume-photo">
			RIGHT
		</div>
	</div><!-- /.span3 -->
</div>
	
<div class="row">
	<div class="span9">
		<div class="resume-container">
			
			<?php $flash_notice = $this->session->flashdata('notification'); ?>
			<?php if($flash_notice != ''): ?>
				<div class="alert alert-notice">
					<?php echo $flash_notice; ?>
				</div>
			<?php endif; ?>
					
			<!-- personal info -->
			<div class="resume-part personal_info">
				<div class="part-title">
					<div class="pull-left"><strong><?php echo $this->lang->line('label_personal_info'); ?></strong></div>
					<div class="pull-right">
						<a href="#" class="resume-edit" data-modal="personal_info-modal"><?php echo $this->lang->line('label_edit'); ?></a>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="part-body">
					<?php $seeker = @$info['seeker'][0]; ?>
					<?php if(is_array($seeker) && count($seeker)>0): ?>
						<?php foreach($seeker as $k=>$v): ?>
							<?php if(! preg_match('/(_id|password|pics|searchable|status|date_|reg_)/i', $k)): ?>
								<div class="part-item">
									<div class="pull-left w35"><strong><?php echo $this->lang->line('label_'.$k); ?></strong></div>
									<div class="pull-left w65">
										<?php 
										$val = $v;
										if(! $val) $val = '-';
										if(preg_match('/(date|dob)/i', $k)) $val = ($val == '0000-00-00') ? '' : date('d F Y', strtotime($val));
										if(preg_match('/(gender)/i', $k))   $val = $this->lang->line('label_gender_'. strtolower($val));
										echo '<span class="'. $k .'">'.$val.'</span>'; 
										?>
									</div>
									<div class="clearfix"></div>
								</div>
							<?php endif; ?>
						<?php endforeach; ?>
					<?php endif; ?>
				</div>
			</div>
			<!-- end of personal info -->
			
			<!-- preference -->
			<div class="resume-part">
				<div class="part-title">
					<div class="pull-left"><strong><?php echo $this->lang->line('label_preference'); ?></strong></div>
					<div class="pull-right"><?php echo $this->lang->line('label_edit'); ?></div>
					<div class="clearfix"></div>
				</div>
				<div class="part-body">
					<?php $prefs = @$info['preference'][0]; ?>
					<?php if(is_array($prefs) && count($prefs)>0): ?>
						<?php foreach($prefs as $k=>$v): ?>
							<div class="part-item">
								<div class="pull-left w35"><strong><?php echo $this->lang->line('label_'.$k); ?></strong></div>
								<div class="pull-left w65"><?php echo (! $v) ? '-' : $v; ?></div>
								<div class="clearfix"></div>
							</div>
						<?php endforeach; ?>
					<?php else: ?>
						<div class="alert alert-error">
							<?php echo $this->lang->line('msg_no_preference'); ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
			<!-- end of preference -->
		
			<!-- qualification -->
			<div class="resume-part">
				<div class="part-title">
					<div class="pull-left"><strong><?php echo $this->lang->line('label_qualification'); ?></strong></div>
					<div class="pull-right"><?php echo $this->lang->line('label_edit'); ?></div>
					<div class="clearfix"></div>
				</div>
				<div class="part-body">
					<?php $quals = @$info['qualification'][0]; ?>
					<?php if(is_array($quals) && count($quals)>0): ?>
						<?php foreach($quals as $k=>$v): ?>
							<div class="part-item">
								<div class="pull-left w35"><strong><?php echo $this->lang->line('label_'.$k); ?></strong></div>
								<div class="pull-left w65"><?php echo (! $v) ? '-' : $v; ?></div>
								<div class="clearfix"></div>
							</div>
						<?php endforeach; ?>
					<?php else: ?>
						<div class="alert alert-error">
							<?php echo $this->lang->line('msg_no_qualification'); ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
			<!-- end of qualification -->
		
			<!-- experience -->
			<div class="resume-part">
				<div class="part-title">
					<div class="pull-left"><strong><?php echo $this->lang->line('label_experience'); ?></strong></div>
					<div class="pull-right"><?php echo $this->lang->line('label_edit'); ?></div>
					<div class="clearfix"></div>
				</div>
				<div class="part-body">
					<?php $exprs = @$info['experience'][0]; ?>
					<?php if(is_array($exprs) && count($exprs)>0): ?>
						<?php foreach($exprs as $k=>$v): ?>
							<div class="part-item">
								<div class="pull-left w35"><strong><?php echo $this->lang->line('label_'.$k); ?></strong></div>
								<div class="pull-left w65"><?php echo (! $v) ? '-' : $v; ?></div>
								<div class="clearfix"></div>
							</div>
						<?php endforeach; ?>
					<?php else: ?>
						<div class="alert alert-error">
							<?php echo $this->lang->line('msg_no_experience'); ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
			<!-- end of experience -->
		
			<!-- skill -->
			<div class="resume-part skill">
				<div class="part-title">
					<div class="pull-left"><strong><?php echo $this->lang->line('label_skill'); ?></strong></div>
					<div class="pull-right">
						<a href="#" class="resume-edit" data-modal="skill-modal"><?php echo $this->lang->line('label_edit'); ?></a>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="part-body">
					<?php $skills = @$info['skill']; ?>
					<?php if(is_array($skills) && count($skills)>0): ?>
						<div class="part-item">
							<div class="pull-left w10"><strong>No</strong></div>
							<div class="pull-left w35"><strong>Skill</strong></div>
							<div class="pull-left w35"><strong>Level</strong></div>
							<div class="clearfix"></div>
						</div>
						
						<?php $no=0; ?>
						<?php foreach($skills as $skill): ?>
							<?php $no++; ?>
							<div class="part-item">
								<div class="pull-left w10"><?php echo $no; ?></div>
								<div class="pull-left w35"><?php echo $skill['skill']; ?></div>
								<div class="pull-left w35"><?php echo $this->lang->line('label_level_'. $skill['proficiency']); ?></div>
								<div class="clearfix"></div>
							</div>
						<?php endforeach; ?>
					<?php else: ?>
						<div class="alert alert-error">
							<?php echo $this->lang->line('msg_no_skill'); ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
			<!-- end of skill -->
		
			<!-- language -->
			<div class="resume-part language">
				<div class="part-title">
					<div class="pull-left"><strong><?php echo $this->lang->line('label_language'); ?></strong></div>
					<div class="pull-right">
						<a href="#" class="resume-edit" data-modal="language-modal"><?php echo $this->lang->line('label_edit'); ?></a>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="part-body">
					<?php $langs = @$info['language']; ?>
					<?php if(is_array($langs) && count($langs)>0): ?>
						<div class="part-item">
							<div class="pull-left w10"><strong>No</strong></div>
							<div class="pull-left w30"><strong><?php echo $this->lang->line('label_language_name'); ?></strong></div>
							<div class="pull-left w30"><strong><?php echo $this->lang->line('label_language_spoken'); ?></strong> <small>(Score: 10-100)</small></div>
                            <div class="pull-left w30"><strong><?php echo $this->lang->line('label_language_written'); ?></strong> <small>(Score: 10-100)</small></div>
							<div class="clearfix"></div>
						</div>
						
						<?php $no=0; ?>
						<?php foreach($langs as $lang): ?>
							<?php $no++; ?>
							<div class="part-item">
								<div class="pull-left w10"><?php echo $no; ?></div>
								<div class="pull-left w30"><?php echo $lang['language']; ?></div>
								<div class="pull-left w30"><?php echo (int)$lang['spoken']; ?></div>
								<div class="pull-left w30"><?php echo (int)$lang['written']; ?></div>
								<div class="clearfix"></div>
							</div>
						<?php endforeach; ?>
					<?php else: ?>
						<div class="alert alert-error">
							<?php echo $this->lang->line('msg_no_language'); ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
			<!-- end of language -->
		
			<!-- reference -->
			<div class="resume-part reference">
				<div class="part-title">
					<div class="pull-left"><strong><?php echo $this->lang->line('label_reference'); ?></strong></div>
					<div class="pull-right">
						<a href="#" class="resume-edit" data-modal="reference-modal"><?php echo $this->lang->line('label_add'); ?></a>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="part-body">
					<?php $refs = @$info['reference'][0]; ?>
					<?php if(is_array($refs) && count($refs)>0): ?>
						<?php foreach($refs as $k=>$v): ?>
							<div class="part-item">
								<div class="pull-left w35"><strong><?php echo $this->lang->line('label_'.$k); ?></strong></div>
								<div class="pull-left w65"><?php echo (! $v) ? '-' : $v; ?></div>
								<div class="clearfix"></div>
							</div>
						<?php endforeach; ?>
					<?php else: ?>
						<div class="alert alert-error">
							<?php echo $this->lang->line('msg_no_reference'); ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
			<!-- end of reference -->
		
		</div>
	</div><!-- /.span9 -->
</div>

<?php 
$this->load->view('my_job/resume_modal_personal_info');
$this->load->view('my_job/resume_modal_skill');
$this->load->view('my_job/resume_modal_language');
$this->load->view('my_job/resume_modal_reference');
