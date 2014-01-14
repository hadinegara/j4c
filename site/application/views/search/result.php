<?php if(isset($result) && is_array($result) && count($result)>0): ?>
    <div class="search-result">
    	<div class="row row-header">
    		<div class="span3"><?php echo $this->lang->line('label_job_title'); ?></div>
    		<div class="span2"><?php echo $this->lang->line('label_company'); ?></div>
    		<div class="span2"><?php echo $this->lang->line('label_location'); ?></div>
    		<div class="span2"><?php echo $this->lang->line('label_date_close'); ?></div>
    		<div class="span3">&nbsp;</div>
    	</div>
    
    	<div class="job-list">
    		<?php $i = 0; ?>
    		<?php foreach($result as $row): ?>
    			<?php 
    			$i++;
    			$muted = (date('Y-m-d') > $row['date_close']) ? TRUE : FALSE; 
    			$url_param = enc($row['job_id']);
    			?>
    			<div class="line line-table"></div>
    			<div class="row <?php echo ($muted?'muted':'').($i==1?' first-child':($i==count($result)?' last-child':'')); ?> ">
    				<div class="span3 job-title">
    					<?php if($muted): ?>
    						<?php echo $row['title']; ?>
    					<?php else: ?>
    						<a href="<?php echo base_url("job/detail/{$row['job_id']}/". url_title($row['title'])); ?>"><?php echo $row['title']; ?></a>
    					<?php endif; ?>
    				</div>
    				<div class="span2 job-company"><?php echo $row['company_name']; ?></div>
    				<div class="span2 job-location">
    					<div class="visible-phone pull-left"><?php echo $this->lang->line('label_location'); ?>:&nbsp;</div>
    					<?php echo $row['location']; ?>
    					<div class="clearfix"></div>
    				</div>
    				<div class="span2 job-date_close">
    					<div class="visible-phone pull-left"><?php echo $this->lang->line('label_date_close'); ?>:&nbsp;</div>
    					<?php echo date('d M Y', strtotime($row['date_close'])); ?>
    					<div class="clearfix"></div>
    				</div>
    				<div class="span3 job-button">
    					<a href="<?php echo base_url("job/detail/{$row['job_id']}/". url_title($row['title'])); ?>" 
    						class="btn btn-small">
    						<?php echo $this->lang->line('btn_job_detail'); ?>
    					</a>
    				</div>
    			</div>
    		<?php endforeach; ?>
    	</div>
    </div>
<?php endif; ?>