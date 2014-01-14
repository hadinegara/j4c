<fieldset>
    <legend style="border-bottom:none;margin-bottom:0">Indonesia</legend>
    <ul class="list-float">
        
        <?php foreach($locations['Indonesia'] as $city): ?>
        
            <?php 
            $nums = (int)@$summaries['location'][$city['city']];
            ?>
            <?php if($nums != 0): ?>
                <li>
                    <a href="<?php echo base_url('job/in/'. url_title($city['city'])); ?>" title="<?php echo $city['city']; ?>"><?php echo $city['city']; ?> (<?php echo $nums; ?>)</a>
                </li>
            <?php else: ?>
                <li><?php echo $city['city']; ?> (<?php echo $nums; ?>)</li>
            <?php endif; ?>
            
        <?php endforeach; ?>
        
        <li class="clearfix"></li>
        
    </ul>
</fieldset>

<div class="mb20"></div>
<fieldset>
    <legend style="border-bottom:none;margin-bottom:0">Australia</legend>
    <ul class="list-float">
    
        <?php foreach($locations['Australia'] as $city): ?>
            <?php 
            $nums = (int)@$summaries['location'][$city['city']];
            ?>        
            <li><?php echo $city['city']; ?> (<?php echo $nums; ?>)</li>
        <?php endforeach; ?>
        
        <li class="clearfix"></li>
        
    </ul>
</fieldset>