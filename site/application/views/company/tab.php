<?php $active_tab = !isset($active_tab) ? 'front' : $active_tab; ?>

<ul class="nav nav-tabs" id="company-tab">
	<li class="<?php echo (($active_tab=='posted_job') 	? 'active' : ''); ?>"><a tabindex="-1" href="<?php echo base_url('company/posted_job'); ?>"><?php echo $this->lang->line('menu_list_posted_jobs'); ?></a></li>
	<li class="<?php echo (($active_tab=='resume') 		? 'active' : ''); ?>"><a tabindex="-1" href="<?php echo base_url('company/resume'); ?>"><?php echo $this->lang->line('menu_applied_resume'); ?></a></li>
	<li class="<?php echo (($active_tab=='posting_job') ? 'active' : ''); ?>"><a tabindex="-1" href="<?php echo base_url('company/posting_job'); ?>"><?php echo $this->lang->line('menu_post_job'); ?></a></li>
</ul>
