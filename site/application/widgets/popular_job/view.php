<div class="widget">
	<div class="widget-header">
		<div class="widget-title"><?php echo lang('label_popular_job'); ?></div>
	</div>
	<div class="widget-body">
		<div class="widget-desc">
			<?php echo lang('msg_popular_job'); ?>
		</div>
		
		<?php foreach($popular as $row): ?>
			<div class="widget-row">
				<div class="pull-left">
					<a href="<?php echo base_url("job/detail/{$row['job_id']}/". url_title($row['title'])); ?>"><?php echo $row['title']; ?></a>
					<div class="small"><?php echo $row['company_name']; ?></div>
					<div class="small"><?php echo lang('label_closing_date').': <strong>'.date('d F Y', strtotime($row['date_close'])).'</strong>'; ?></div>
				</div>
				<div class="pull-right" style="padding-top:15px">
					<span class="badge badge-warning"><?php echo $row['nums_apply']; ?></span>
				</div>
				<div class="clearfix"></div>
			</div>
		<?php endforeach; ?>
	</div>
</div>