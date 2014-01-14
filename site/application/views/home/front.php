<div class="row">
	<div class="span8">
		<div class="mb20">
            <?php $this->load->view('home/front-search'); ?>
        </div>
        
        <div class="mb20">
            <?php $this->load->view('home/summary'); ?>
        </div>
	</div>
	
	<div class="span4">
		<div class="mb20"><?php Widget::run('popular_job'); ?></div>
		<div><?php Widget::run('popular_article'); ?></div>
	</div>
</div>