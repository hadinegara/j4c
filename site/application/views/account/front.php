<fieldset>
    <legend><?php echo lang('label_account_info'); ?></legend>
    
    <div class="account-info">
        <div class="panel">
            <div class="row">
            
                <div class="span3">
                    <ul class="nav nav-list">
                        <li class="nav-header"><?php echo lang('label_account_setting'); ?></li>
                        <li class="active"><a href="#"><?php echo lang('label_change_password'); ?></a></li>
                    </ul>
                </div>
                
                <div class="span9">
                    <?php $this->load->view('account/form-change-password'); ?>
                </div>
                
            </div>
        </div>
    </div>
    
</fieldset>