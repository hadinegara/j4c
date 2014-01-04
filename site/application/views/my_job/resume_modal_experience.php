<!-- experience-modal -->
<div class="modal hide" id="experience-modal">
	<form method="post" action="<?php echo base_url('my_job/resume/update/experience'); ?>">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h3><?php echo $this->lang->line('label_experience'); ?></h3>
		</div>
		
		<div class="modal-body">
            <?php 
            $fields = array('name','phone','email','company','position','relationship');
            ?>
            <?php foreach($fields as $field): ?>
                <div class="row">
                    <div class="span2">
                        <div style="padding-top:5px"><?php echo $this->lang->line('label_'. $field); ?></div>
                    </div>
                    <div class="span3">
                        <input type="text" name="<?php echo $field; ?>" value="" class="input-block-level" />
                    </div>
                    <div class="clearfix"></div>
                </div>
            <?php endforeach; ?>
				
			<div class="text-right">
				<a href="#" class="btn btn-mini btn-add_experience"><?php echo $this->lang->line('btn_add_experience'); ?></a>
				<div class="pull-left"><?php echo $this->lang->line('msg_leave_blank_to_remove') ?></div>
				<div class="clearfix"></div>
			</div>
		</div>
		
		<div class="modal-footer">
			<button class="btn btn-n">Close</button>
			<button class="btn btn-primary btn-y" data-loading-text="Loading...">Save changes</button>
		</div>
	</form>
</div>
<!-- end of experience-modal -->