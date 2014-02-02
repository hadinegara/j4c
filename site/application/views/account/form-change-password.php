<div style="float: left;">
    <form method="post" action="<?php echo base_url("account/save-password"); ?>">
    
    	<?php if(validation_errors() != ''): ?>
    		<div class="alert alert-error">
    			<ul><?php echo validation_errors('<li>', '</li>'); ?></ul>
    		</div>
        <?php else: ?>
            <?php $flashdata = $this->session->flashdata('password_change'); ?>
            <?php if($flashdata != ''): ?>
                <?php $this->session->set_flashdata('password_change', ''); ?>
        		<div class="alert alert-info">
        			<ul><?php echo $flashdata; ?></ul>
        		</div>
        	<?php endif; ?>
    	<?php endif; ?>
    
        <div style="margin-bottom: 20px;">
            <label for="old_password"><?php echo lang('label_password_old'); ?></label>
            <input type="password" name="old_password" id="old_password" />
        </div>
        
        <div>
            <label for="new_password"><?php echo lang('label_password_new'); ?></label>
            <input type="password" name="new_password" id="new_password" />
        </div>
        
        <div>
            <label for="re_password"><?php echo lang('label_password_re'); ?></label>
            <input type="password" name="re_password" id="re_password" />
        </div>
        
        <div>
            <button type="submit" class="btn btn-primary"><?php echo lang('btn_submit'); ?></button>
        </div>
    </form>
</div>
<div class="clearfix">