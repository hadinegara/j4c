<!-- language-modal -->
<div class="modal hide" id="language-modal">
	<form method="post" action="<?php echo base_url('my_job/resume/update/language'); ?>">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h3><?php echo $this->lang->line('label_language'); ?></h3>
		</div>
		
		<div class="modal-body">
			<div class="language-item">
				<div class="pull-left w33">
                    <div class="mr10"><strong><?php echo $this->lang->line('label_language_name'); ?></strong></div>
				</div>
				<div class="pull-left w34">
                    <div class="mr05"><strong><?php echo $this->lang->line('label_language_spoken'); ?></strong> <small>(Score: 10-100)</small></div>
				</div>
				<div class="pull-left last w33">
					<div class="ml05"><strong><?php echo $this->lang->line('label_language_written'); ?></strong> <small>(Score: 10-100)</small></div>
				</div>
				<div class="clearfix"></div>
			</div>
            
			<?php if(isset($info['language']) && is_array($info['language']) && count($info['language'])>0): ?>			
				<?php foreach($info['language'] as $lang): ?>
                    <div class="language-item">
                        <div class="pull-left w33">
                            <div class="mr10"><input class="input-block-level" type="text" name="language[]" value="<?php echo $lang['language']; ?>" /></div>
                        </div>
                        <div class="pull-left w34">
                            <div class="mr05"><input class="input-block-level" type="text" name="spoken[]" value="<?php echo (int)$lang['spoken']; ?>" /></div>
                        </div>
                        <div class="pull-left last w33">
                            <div class="ml05"><input class="input-block-level" type="text" name="written[]" value="<?php echo (int)$lang['written']; ?>" /></div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
				<?php endforeach; ?>			
			<?php endif; ?>
            
            
			<div class="language-item">
				<div class="pull-left w33">
					<div class="mr10"><input class="input-block-level" type="text" name="language[]" /></div>
				</div>
				<div class="pull-left w34">
					<div class="mr05"><input class="input-block-level" type="text" name="spoken[]" /></div>
				</div>
				<div class="pull-left last w33">
					<div class="ml05"><input class="input-block-level" type="text" name="written[]" /></div>
				</div>
				<div class="clearfix"></div>
			</div>
			
			<div class="text-right">
				<a href="#" class="btn btn-mini btn-add_language"><?php echo $this->lang->line('btn_add_language'); ?></a>
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
<!-- end of language-modal -->