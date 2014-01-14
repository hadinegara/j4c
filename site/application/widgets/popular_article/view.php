<div class="widget">
	<div class="widget-header">
		<div class="widget-title"><?php echo $this->lang->line('label_popular_blog'); ?></div>
	</div>
	<div class="widget-body">
		<?php foreach($popular as $row): ?>
			<div class="widget-row">
				<a href="<?php echo base_url("blog/read/{$row['id']}/". url_title($row['title'])); ?>"><?php echo $row['title']; ?></a>
				<div class="small"><?php echo date('d F Y h:i A', strtotime($row['date_create'])); ?></div>
			</div>
		<?php endforeach; ?>
	</div>
</div>