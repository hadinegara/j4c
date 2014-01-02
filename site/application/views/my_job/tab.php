<?php $active_tab = (! isset($active_tab) || $active_tab == '') ? 'front' : $active_tab; ?>
<ul class="nav nav-tabs" id="my-job">
	<li class="<?php echo ($active_tab == 'front'  ? 'active' : ''); ?>"><a href="<?php echo base_url('my_job/front'); ?>"><?php echo $this->lang->line('label_my_jobs'); ?></a></li>
	<li class="<?php echo ($active_tab == 'resume' ? 'active' : ''); ?>"><a href="<?php echo base_url('my_job/resume'); ?>"><?php echo $this->lang->line('label_my_resumes'); ?></a></li>
	<li class="<?php echo ($active_tab == 'alert'  ? 'active' : ''); ?>"><a href="<?php echo base_url('my_job/alert'); ?>"><?php echo $this->lang->line('label_my_alerts'); ?></a></li>
</ul>
