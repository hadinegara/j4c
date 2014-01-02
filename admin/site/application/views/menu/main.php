<?php $active_menu = (isset($active_menu) && $active_menu!='') ? $active_menu : 'home'; ?>
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <ul class="nav">
            <li class="<?php echo ($active_menu=='home')?'active':''; ?>"><a href="<?php echo base_url(); ?>">Home</a></li>
            <li class="<?php echo ($active_menu=='blog')?'active':''; ?>"><a href="<?php echo base_url('blog'); ?>">Blog</a></li>
        </ul>
    </div>
</div>