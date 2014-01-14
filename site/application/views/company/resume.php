<?php if(isset($resumes) && is_array($resumes) && count($resumes)): ?>

	<div class="row">
		<div class="span1">#</div>
		<div class="span3"><strong><?php echo $this->lang->line('label_job_title'); ?></strong></div>
		<div class="span3"><strong><?php echo $this->lang->line('label_date_create'); ?></strong></div>
		<div class="span3"><strong><?php echo $this->lang->line('label_date_close'); ?></strong></div>
		<div class="span2"><strong><?php echo $this->lang->line('label_incoming_resumes'); ?></strong></div>
	</div>

	<?php foreach($resumes as $i=>$row): ?>
		<div class="line" style="margin:5px 0"></div>
		<div class="row" style="<?php echo ((int)$row['num_resume']>0?'font-weight:bold':''); ?>">
			<div class="span1"><?php echo ($i+1); ?></div>
			<div class="span3">
				<a title="<?php echo $this->lang->line('label_job_detail'); ?>" href="<?php echo base_url("company/posted_job/detail?id=". enc($row['job_id'])); ?>"><?php echo $row['title']; ?></a></div>
			<div class="span3"><?php echo date('d F Y H:i', strtotime($row['date_create'])); ?></div>
			<div class="span3"><?php echo date('d F Y H:i', strtotime($row['date_close'])); ?></div>
			<div class="span2">
				<?php if((int)$row['num_resume'] > 0): ?>
					<a title="<?php echo $this->lang->line('msg_display_applied_resumes'); ?>" href="<?php echo base_url('company/resume/show_at?id='. enc($row['job_id'])); ?>"><?php echo $row['num_resume']; ?></a>
				<?php else: ?>
					<?php echo $row['num_resume']; ?>
				<?php endif; ?>
			</div>
		</div>
	<?php endforeach; ?>

<?php else: ?>
	<?php echo lang('msg_no_incoming_resume'); ?>
<?php endif; ?>