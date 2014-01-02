<div class="relative">
	<ul class="breadcrumb breadcrumb-blog">
		<li><a href="<?php echo base_url("blog"); ?>"><?php echo $this->lang->line('label_blog'); ?></a> <span class="divider">/</span></li>
		<li><a href="<?php echo base_url('blog/search?q='.urlencode($keyword)); ?>"><?php echo $keyword; ?></a></li>
	</ul>
</div>

<?php $this->load->view('blog/search'); ?>

<div class="row">
	<div class="span8 blog-list">
		<?php if(is_array($blog) && count($blog)>0): ?>
			<?php foreach($blog as $row): ?>
				<?php $rhref = base_url("blog/read/{$row['id']}/". url_title($row['title'])); ?>
				<div class="blog-item">
					<h3 class="blog-title">
						<a title="<?php echo $row['title']; ?>" href="<?php echo $rhref; ?>"><?php echo $row['title']; ?></a>
					</h3>
					<div class="blog-date">
						<?php echo date('d F Y h:i A', strtotime($row['date_create'])); ?>
					</div>
					<div class="blog-content">
						<?php echo $row['summary']; ?>
					</div>
					<div class="blog-nav">
						<span class="badge"><?php echo $this->lang->line('label_viewed'); ?>: <?php echo (int)$row['view_count']; ?></span>
						<a title="<?php echo $row['title']; ?>" href="<?php echo $rhref; ?>" class="badge badge-info"><?php echo $this->lang->line('label_read_more'); ?> &raquo;</a>
					</div>
				</div>
			<?php endforeach; ?>
		<?php else: ?>
			<div class="alert alert-block">
				<h4><?php echo $this->lang->line('label_no_post_found'); ?></h4>
				<?php echo $this->lang->line('msg_no_post'); ?>
			</div>
		<?php endif; ?>
		
		<?php echo $paging; ?>
	</div>
	<div class="span4">
		<?php $this->load->view('blog/right'); ?>
	</div>
</div>