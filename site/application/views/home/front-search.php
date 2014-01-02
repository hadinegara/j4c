<div class="home-search">
	<form method="post" action="<?php echo base_url('search'); ?>" class="form-search">
		<div>
			<label for="search"><?php echo $this->lang->line('label_type_keyword'); ?></label>
		</div>
		<div class="controls controls-row">
			<input type="text" name="search" id="search" class="span4" />
			<select name="location" id="location" class="span2">
				<option value=""><?php echo $this->lang->line('label_location'); ?></option>
				<?php foreach($locations as $country=>$cities): ?>
					<optgroup label="<?php echo $country; ?>">
						<?php foreach($cities as $c): ?>
							<option value="<?php echo $c['city']; ?>"><?php echo $c['city']; ?></option>
						<?php endforeach; ?>
					</optgroup>							
				<?php endforeach; ?>
			</select>
			<button type="submit" class="btn btn-primary span1"><?php echo $this->lang->line('btn_search'); ?></button>
			<div class="advanced-link">
				<a href="<?php echo base_url('search/advanced'); ?>"><?php echo $this->lang->line('label_advanced_search'); ?></a>
			</div>
		</div>
	</form>
</div>