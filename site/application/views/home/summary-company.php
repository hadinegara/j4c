<ul class="list-float">

    <?php foreach($companies as $row): ?>
        
        <?php 
        $nums = (int)$summaries['company'][$row['company_id']];
        ?>
        
        <?php if($nums != 0): ?>
            <li>
                <a href="<?php echo base_url('job/at/'. url_title($row['name']) .'-'. $row['company_id']); ?>" title="<?php echo $row['name']; ?>"><?php echo $row['name']; ?> (<?php echo $nums; ?>)</a>
            </li>
        <?php else: ?>
            <li><?php echo $row['name']; ?> (<?php echo $nums; ?>)</li>
        <?php endif; ?>
            
    <?php endforeach; ?>
    
    <li class="clearfix"></li>
    
</ul>
