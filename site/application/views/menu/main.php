<?php $all_sess = $this->session->all_userdata(); ?>
<div class="navbar navbar-j4c">
	<div class="navbar-inner">
	
		<!-- .btn-navbar is used as the toggle for collapsed navbar content -->
		<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</a>

		<!-- Be sure to leave the brand out there if you want it shown -->
		<a class="brand" href="<?php echo base_url(); ?>"><img src="<?php echo assets_url('images/logo-white.png'); ?>" alt="ZzZZ" class="img-responsive" /></a>

		<!-- Everything you want hidden at 940px or less, place within here -->
		<div class="nav-collapse collapse">
			<ul class="nav">
				<li class="<?php echo ($active_menu == 'home' || $active_menu == '') ? 'active' : ''; ?> menu-home"><a href="<?php echo base_url(); ?>"><?php echo $this->lang->line('menu_home'); ?></a></li>
				
				<?php if(! isset($all_sess['company_login_id'])): ?>
				    <li class="<?php echo ($active_menu == 'my_job') ? 'active' : ''; ?>"><a href="<?php echo base_url('my_job'); ?>"><?php echo $this->lang->line('menu_my_job'); ?></a></li>
                <?php endif; ?>
                
                <?php if(! isset($all_sess['login_id'])): ?>
                    <?php if(! isset($all_sess['company_login_id'])): ?>
        				<li class="dropdown <?php echo ($active_menu == 'register' ? 'active' : ''); ?>">
        					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
        						<?php echo $this->lang->line('menu_free_register'); ?>
        						<span class="caret"></span>
        					</a>
        					<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
        						<li><a tabindex="-1" href="<?php echo base_url("oauth/facebook"); ?>"><i class="icon-facebook-sign"></i> <?php echo $this->lang->line('menu_by_facebook'); ?></a></li>
        						<li><a tabindex="-1" href="<?php echo base_url("oauth/googleplus"); ?>"><i class="icon-google-plus-sign"></i> <?php echo $this->lang->line('menu_by_googleplus'); ?></a></li>
        						<li><a tabindex="-1" href="<?php echo base_url("oauth/linkedin"); ?>"><i class="icon-linkedin-sign"></i> <?php echo $this->lang->line('menu_by_linkedin'); ?></a></li>
        						<li class="<?php echo (($active_menu=='register' && $active_submenu=='manual') ? 'active' : ''); ?>"><a tabindex="-1" href="<?php echo base_url('register/manual'); ?>"><i class="icon-pencil"></i> <?php echo $this->lang->line('menu_by_manual'); ?></a></li>
        					</ul>
        				</li>
                    <?php endif; ?>
                    
    				<li class="dropdown <?php echo ($active_menu == 'company') ? 'active' : ''; ?>">
    					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
    						<?php echo $this->lang->line('menu_company'); ?>
    						<span class="caret"></span>
    					</a>
    					<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
    						<?php if((isset($all_sess['company_login_id']) && $all_sess['company_login_id'] != '') && (isset($all_sess['company_name']) && $all_sess['company_name'] != '')): ?>
    							<li class="<?php echo (($active_menu=='company' && $active_submenu=='posted_job')  ? 'active' : ''); ?>"><a tabindex="-1" href="<?php echo base_url('company/posted_job'); ?>"><i class="icon-list-ul"></i><?php echo $this->lang->line('menu_list_posted_jobs'); ?></a></li>
    							<li class="<?php echo (($active_menu=='company' && $active_submenu=='resume') 	   ? 'active' : ''); ?>"><a tabindex="-1" href="<?php echo base_url('company/resume'); ?>"><i class="icon-envelope-alt"></i><?php echo $this->lang->line('menu_applied_resume'); ?></a></li>
    							<li class="<?php echo (($active_menu=='company' && $active_submenu=='posting_job') ? 'active' : ''); ?>"><a tabindex="-1" href="<?php echo base_url('company/posting_job'); ?>"><i class="icon-plus-sign"></i><?php echo $this->lang->line('menu_post_job'); ?></a></li>
    						<?php else: ?>
    							<li class="<?php echo (($active_menu=='company' && $active_submenu=='login') ? 'active' : ''); ?>"><a tabindex="-1" href="<?php echo base_url('company/login'); ?>"><?php echo $this->lang->line('menu_login'); ?></a></li>
    							<li class="<?php echo (($active_menu=='company' && $active_submenu=='register') ? 'active' : ''); ?>"><a tabindex="-1" href="<?php echo base_url('company/register'); ?>"><?php echo $this->lang->line('menu_register'); ?></a></li>
    						<?php endif; ?>
    					</ul>
    				</li>
				<?php endif; ?>
                
				<li class="<?php echo ($active_menu == 'blog') ? 'active' : ''; ?>"><a href="<?php echo base_url('blog'); ?>"><?php echo $this->lang->line('menu_blog'); ?></a></li>
			</ul>
			<ul class="nav pull-right">
				<?php if((isset($all_sess['company_login_id']) && $all_sess['company_login_id'] != '') && (isset($all_sess['company_name']) && $all_sess['company_name'] != '')): ?>
					<li class="dropdown <?php echo ($active_menu == 'login' ? 'active' : ''); ?>">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="line-height:1em;padding:4px 15px 3px;">
							<?php echo $all_sess['registrant_name']; ?><br />
							<span style="font-size:11px;font-weight:normal"><?php echo $all_sess['company_name']; ?></span>
							<span class="caret" style="margin-top:-3px"></span>
						</a>
						<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
							<li><a tabindex="-1" href="<?php echo base_url('company/my_account'); ?>"><i class="icon-edit"></i> <?php echo $this->lang->line('menu_edit_account'); ?></a></li>
							<li><a tabindex="-1" href="<?php echo base_url('logout'); ?>"><i class="icon-signout"></i> <?php echo $this->lang->line('menu_logout'); ?></a></li>
						</ul>
					</li>
				<?php elseif((isset($all_sess['login_id']) && $all_sess['login_id'] != '') && (isset($all_sess['first_name']) && $all_sess['first_name'] != '')): ?>
					<li class="dropdown <?php echo ($active_menu == 'login' ? 'active' : ''); ?>">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<?php echo trim($all_sess['first_name'] .' '. $all_sess['last_name']); ?>
							<span class="caret"></span>
						</a>
						<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
							<li class="<?php echo ($active_submenu == 'account' ? 'active' : ''); ?>"><a tabindex="-1" href="<?php echo base_url('account'); ?>"><i class="icon-user"></i> <?php echo $this->lang->line('menu_my_account'); ?></a></li>
							<li><a tabindex="-1" href="<?php echo base_url('logout'); ?>"><i class="icon-signout"></i> <?php echo $this->lang->line('menu_logout'); ?></a></li>
						</ul>
					</li>
				<?php else: ?>
					<li class="dropdown <?php echo ($active_menu == 'login' ? 'active' : ''); ?>">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<?php echo $this->lang->line('menu_login'); ?>
							<span class="caret"></span>
						</a>
						<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
							<li><a tabindex="-1" href="<?php echo base_url("oauth/facebook?opt=login"); ?>"><i class="icon-facebook-sign"></i> <?php echo $this->lang->line('menu_by_facebook'); ?></a></li>
							<li><a tabindex="-1" href="<?php echo base_url("oauth/googleplus?opt=login"); ?>"><i class="icon-google-plus-sign"></i> <?php echo $this->lang->line('menu_by_googleplus'); ?></a></li>
							<li><a tabindex="-1" href="<?php echo base_url("oauth/linkedin?opt=login"); ?>"><i class="icon-linkedin-sign"></i> <?php echo $this->lang->line('menu_by_linkedin'); ?></a></li>
							<li class="<?php echo (($active_menu=='login' && $active_submenu=='manual') ? 'active' : ''); ?>"><a tabindex="-1" href="<?php echo base_url('login/manual'); ?>"><i class="icon-pencil"></i> <?php echo $this->lang->line('menu_by_manual_login'); ?></a></li>
						</ul>
					</li>
				<?php endif; ?>
			</ul>
		</div>
		
	</div>
</div>