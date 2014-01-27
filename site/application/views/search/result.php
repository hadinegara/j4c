<fieldset>

    <?php if(isset($company_detail)): ?>
        <legend style="margin-bottom: 5px;"><?php echo $company_detail['name']; ?></legend>
        <div style="margin-bottom: 20px;"><strong><?php echo str_replace('#company', $company_detail['name'], lang('label_list_job_from_company')); ?></strong></div>
    <?php elseif(isset($location)): ?>
        <legend style="margin-bottom: 5px;"><?php echo $location; ?></legend>
        <div style="margin-bottom: 20px;"><strong><?php echo str_replace('#location', $location, lang('label_list_job_from_location')); ?></strong></div>
    <?php elseif(isset($spec_detail)): ?>
        <?php $spec_name = lang('label_'. url_title($spec_detail['name'], '_', TRUE)); ?>
        <legend style="margin-bottom: 5px;"><?php echo $spec_name; ?></legend>
        <div style="margin-bottom: 20px;"><strong><?php echo str_replace('#category', $spec_name, lang('label_list_job_from_category')); ?></strong></div>
    <?php else: ?>
        <legend style="margin-bottom: 5px;"><?php echo lang('label_search_result'); ?></legend>
        <div style="margin-bottom: 20px;"><strong><?php echo str_replace('#keyword', $keyword, lang('label_list_job_from_keyword')); ?></strong></div>
    <?php endif; ?>

    <?php if(isset($result) && is_array($result) && count($result)>0): ?>
        <div class="search-result">
        	<div class="row row-header">
                <div class="span1">&nbsp;</div>
        		<div class="span3"><?php echo $this->lang->line('label_job_title'); ?></div>
        		<div class="span2"><?php echo $this->lang->line('label_company'); ?></div>
        		<div class="span2"><?php echo $this->lang->line('label_location'); ?></div>
        		<div class="span2"><?php echo $this->lang->line('label_date_close'); ?></div>
        		<div class="span2">&nbsp;</div>
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
        				<div class="span1"><?php echo $i; ?></div>
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
        				<div class="span2 job-button">
        					<a href="<?php echo base_url("job/detail/{$row['job_id']}/". url_title($row['title'])); ?>" 
        						class="btn btn-small">
        						<?php echo $this->lang->line('btn_job_detail'); ?>
        					</a>
        				</div>
        			</div>
        		<?php endforeach; ?>
        	</div>
        </div>
    
    <?php else: ?>
        
        <div class="alert alert-danger">
            <?php echo lang('msg_no_job_found'); ?>
        </div>
    
    <?php endif; ?>
    
</fieldset>