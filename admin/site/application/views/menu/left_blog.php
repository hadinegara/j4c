<?php $active_submenu = (isset($active_submenu) && $active_submenu!='') ? $active_submenu : 'list'; ?>
<ul class="nav nav-list use-icon">
    <li class="nav-header">Blog</li>
    <li class="<?php echo ($active_submenu=='list')?'active':''; ?>"><a href="<?php echo base_url('blog'); ?>"><i class="icon-list-alt"></i> List</a></li>
    <li class="<?php echo ($active_submenu=='create')?'active':''; ?>"><a href="<?php echo base_url('blog/create'); ?>"><i class="icon-file-text-alt"></i> Create New</a></li>
    <li class="<?php echo ($active_submenu=='archive')?'active':''; ?>"><a href="<?php echo base_url('blog/archive'); ?>"><i class="icon-paper-clip"></i> Archive</a></li>
</ul>