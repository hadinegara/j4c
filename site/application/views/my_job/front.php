<?php $this->load->view('my_job/tab'); ?>

<?php if(isset($applied_jobs) && is_array($applied_jobs) && count($applied_jobs)): ?>

		
	<div class="row hidden-phone">
		<div class="span1"><strong>#</strong></div>
		<div class="span3"><strong><?php echo $this->lang->line('label_title'); ?></strong></div>
		<div class="span2"><strong><?php echo $this->lang->line('label_location'); ?></strong></div>
		<div class="span2"><strong><?php echo $this->lang->line('label_status'); ?></strong></div>
		<div class="span1"><strong><?php echo $this->lang->line('label_viewed'); ?></strong></div>
		<div class="span3"><strong><?php echo $this->lang->line('label_date_apply'); ?></strong></div>
	</div>
		
	<?php foreach($applied_jobs as $i=>$row): ?>
	<div class="line" style="margin:5px 0"></div>
	<div class="row">
		<div class="span1"><?php echo ($i+1); ?></div>
		<div class="span3">
			<a href="<?php echo base_url("job/detail/{$row['job_id']}/". url_title($row['title'])); ?>"><?php echo $row['title']; ?></a>
		</div>
		<div class="span2"><?php echo $row['location']; ?></div>
		<div class="span2"><?php echo $this->lang->line('label_msg_'. $row['status_apply']); ?></div>
		<div class="span1"><?php echo $row['view_count']; ?></div>
		<div class="span3"><?php echo date('d F Y H:i', strtotime($row['date_apply'])); ?></div>
	</div>
	<?php endforeach; ?>

<?php else: ?>

<?php endif; ?>