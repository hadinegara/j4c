<?php $this->load->view('my_job/tab'); ?>

<?php if(isset($alerts) && is_array($alerts) && count($alerts)>0): ?>

	<div class="row hidden-phone">
		<div class="span1"><strong>#</strong></div>
		<div class="span2"><strong><?php echo $this->lang->line('label_period'); ?></strong></div>
		<div class="span3"><strong><?php echo $this->lang->line('label_name'); ?></strong></div>
		<div class="span6"><strong><?php echo $this->lang->line('label_criteria'); ?></strong></div>
	</div>
    
    <?php foreach($alerts as $i=>$row): ?>
        <div class="line" style="margin:5px 0"></div>
    	<div class="row">
    		<div class="span1"><?php echo ($i+1); ?></div>
    		<div class="span2"><?php echo lang('label_'. $row['period']); ?></div>
    		<div class="span3 hidden-phone"><?php echo $row['name']; ?></div>
    		<div class="span5">
                <span class="visible-phone" style="float: left; font-weight: bold"><?php echo lang('label_criteria'); ?>: </span>
                <?php 
                $vals = array();
                $criteria = json_decode($row['criteria'], TRUE);
                foreach($criteria as $k=>$v)
                {
                    if($k == 'specialization')
                    {
                        $v = $this->job_model->get_specialization_by_id($v);
                    }
                    elseif($k == 'job_type')
                    {
                        $v = lang('label_'. $v);
                    }
                    elseif($k == 'salary')
                    {
                        $v = number_format($v, 0, ',', '.');
                    }
                    $vals[] = $v;
                } 
                echo implode(', ', $vals);
                ?>
                <div class="clearfix"></div>
            </div>
            <div class="span1">
                <a class="btn btn-small" href="<?php echo base_url("my_job/alert/delete?id=". str_replace('=', '', base64_encode($row['id']))); ?>"><?php echo lang('btn_delete'); ?></a>
            </div>
    	</div>        
    <?php endforeach; ?>
    
    <div class="line" style="margin:5px 0"></div>
    <div class="mt10">
        <a href="<?php echo base_url("my_job/alert/create"); ?>" class="btn btn-small btn-primary"><?php echo lang('btn_create_job_alert'); ?></a>
    </div>


<?php else: ?>

    <div class="alert alert-info">
        <div><?php echo lang('label_alert_not_found'); ?></div>
        <div class="mt10">
            <a href="<?php echo base_url("my_job/alert/create"); ?>" class="btn btn-small btn-primary"><?php echo lang('btn_create_job_alert'); ?></a>
        </div>
    </div>

<?php endif; ?>