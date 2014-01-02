<div class="relative">
	<ul class="breadcrumb breadcrumb-blog">
		<li><a href="<?php echo base_url('blog'); ?>"><?php echo $this->lang->line('label_blog'); ?></a> <span class="divider">/</span></li>
		<li class="active"><?php echo $detail['title']; ?></li>
	</ul>
</div>

<?php $this->load->view('blog/search'); ?>

<div class="row blog-read">
	<div class="span8 blog-list">
		<div class="blog-item">
			<h3 class="blog-title"><?php echo $detail['title']; ?></h3>
			<div class="blog-date">
				<span class="d"><?php echo date('d', strtotime($detail['date_create'])); ?></span>
				<span class="m"><?php echo date('M \'y', strtotime($detail['date_create'])); ?></span>
			</div>
			<div class="blog-content" style="padding-top:20px">
				<?php echo $detail['blog_content']; ?>
			</div>			
		</div>
	</div>
	<div class="span4">
		<?php $this->load->view('blog/right'); ?>		
	</div>
</div>
