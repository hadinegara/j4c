<fieldset>
    <legend style="border-bottom:none;margin-bottom:0">Indonesia</legend>
    <ul class="list-float">
        <?php foreach($locations['Indonesia'] as $city): ?>
            <li><?php echo $city['city']; ?></li>
        <?php endforeach; ?>
        
        <li class="clearfix"></li>
    </ul>
</fieldset>

<div class="mb20"></div>
<fieldset>
    <legend style="border-bottom:none;margin-bottom:0">Australia</legend>
    <ul class="list-float">
        <?php foreach($locations['Australia'] as $city): ?>
            <li><?php echo $city['city']; ?></li>
        <?php endforeach; ?>
        
        <li class="clearfix"></li>
    </ul>
</fieldset>