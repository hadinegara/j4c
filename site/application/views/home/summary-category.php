<ul class="list-float">
    <?php foreach($categories as $ctg_name=>$ctg_items): ?>
    
        <?php 
        // count nums of job
        $nums = 0;
        foreach($ctg_items as $item)
        {
            $nums += (int)@$summaries['category'][$item['id']];
        }
        
        $ctg_name_lang = lang('label_'. url_title($ctg_name, '_', TRUE));
        ?>
        
        <?php if($nums != 0): ?>
            <li>
                <a href="<?php echo base_url('job/spec/'. urlencode($ctg_name)); ?>" title="<?php echo $ctg_name_lang; ?>"><?php echo $ctg_name_lang; ?> (<?php echo $nums; ?>)</a>
            </li>
        <?php else: ?>
            <li><?php echo $ctg_name; ?> (<?php echo $nums; ?>)</li>
        <?php endif; ?>
    
    <?php endforeach; ?>
</ul>