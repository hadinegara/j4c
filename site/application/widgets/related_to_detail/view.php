<div class="widget">
	<div class="widget-header">
		<div class="widget-title"><?php echo lang('label_related_job'); ?></div>
	</div>
	<div class="widget-body">
		<div class="widget-desc">
			<?php echo str_replace('#in', $related_detail['name'], lang('msg_related_job')); ?>
		</div>
		
        <?php if(isset($jobs) && is_array($jobs)): ?>
        
    		<?php foreach($jobs as $row): ?>
                <?php if($row['job_id'] != @$current): ?>
        			<div class="widget-row">
        				<div class="pull-left">
        					<a href="<?php echo base_url("job/detail/{$row['job_id']}/". url_title($row['title'])); ?>"><?php echo $row['title']; ?></a>
        					<div class="small"><?php echo $row['company_name']; ?></div>
        					<div class="small"><?php echo lang('label_closing_date').': <strong>'.date('d F Y', strtotime($row['date_close'])).'</strong>'; ?></div>
        				</div>
        				<div class="pull-right" style="padding-top:15px">
        					<span title="<?php echo lang('label_number_of_applied'); ?>" class="badge badge-warning"><?php echo $row['seeker_count']; ?></span>
        				</div>
        				<div class="clearfix"></div>
        			</div>
                <?php endif; ?>
    		<?php endforeach; ?>
            
        <?php else: ?>
        
            <div class="alert alert-error">
                <?php echo lang('msg_no_job_found'); ?>
            </div>
            
        <?php endif; ?>
	</div>
</div>
