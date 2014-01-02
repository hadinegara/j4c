<form method="post" action="<?php echo base_url('blog/save'); ?>">
    <fieldset>
        <legend>Create New Post</legend>
        
		<?php if(isset($error) && $error != ''): ?>
			<div class="alert alert-error">
				<?php echo $error; ?>
			</div>
		<?php endif; ?>
		
        <div class="row-fluid">
            <div class="span6">
				<div>
					<label for="title">Title:</label>
					<input class="input-block-level" type="text" name="title" id="title" value="<?php echo set_value('title'); ?>" />
					<?php echo form_error('title'); ?>
				</div>				
				<div>
					<label for="tag">Tags: <small>Separate with comma (,)</small></label>
					<input style="width:75%" type="text" name="tag" id="tag" value="<?php echo set_value('tag'); ?>" />
				</div>
            </div>
            <div class="span6">
                <label for="summary">Summary: <small>As of SEO Descriptions</small></label>
                <textarea name="summary" id="summary" rows="4" class="input-block-level" style="height:95px"><?php echo set_value('summary'); ?></textarea>
            </div>
        </div>
        
        <div class="clearfix"></div>
        
        <div>
			<textarea rows="13" class="input-block-level" id="blog_content" name="blog_content"><?php echo set_value('blog_content'); ?></textarea>
			<?php echo form_error('blog_content'); ?>
		</div>
        <div class="mt20"><button type="submit" class="btn btn-primary">Submit</button></div>
    </fieldset>
</form>