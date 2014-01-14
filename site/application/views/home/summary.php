<ul class="nav nav-tabs global-tabs">
    <li class="brand"><span>Index</span></li>
    <li><a href="#sum-loc"><?php echo lang('label_location'); ?></a></li>
    <li class="active"><a href="#sum-com"><?php echo lang('label_company'); ?></a></li>
    <li><a href="#sum-spc"><?php echo lang('label_specialization'); ?></a></li>
</ul>
 
<div class="tab-content">
    <div class="tab-pane" id="sum-loc">
        <?php $this->load->view('home/summary-location'); ?>
    </div>
    <div class="tab-pane active" id="sum-com">
        <?php $this->load->view('home/summary-company'); ?>
    </div>
    <div class="tab-pane" id="sum-spc">
        Specialization
    </div>
</div>