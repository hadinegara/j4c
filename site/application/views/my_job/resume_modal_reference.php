<!-- reference-modal -->
<div class="modal hide" id="reference-modal">
	<form method="post" action="<?php echo base_url('my_job/resume/update/reference'); ?>">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h3><span id="mode"><?php echo $this->lang->line('label_add'); ?></span> <?php echo $this->lang->line('label_reference'); ?></h3>
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
		</div>
		
		<div class="modal-footer">
			<button class="btn btn-n">Close</button>
			<button class="btn btn-primary btn-y" data-loading-text="Loading...">Save changes</button>
		</div>
	</form>
</div>
<!-- end of reference-modal -->
