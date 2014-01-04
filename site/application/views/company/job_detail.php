<div class="row">

	<div class="span8">
		<div style="padding:10px 20px">
	
			<?php if(isset($error_message) && $error_message != ''): ?>
				<div class="alert alert-error">
					<?php echo $error_message; ?>
				</div>
			<?php endif; ?>
			
			<div class="job-pre">
				<div class="title"><?php echo $detail['title'] ?></div>
				<div class="company"><?php echo $detail['cp_name'] ?></div>
				<div class="date-location">
					<div class="pull-left">
						<i class="icon-time"></i>
						<span><?php echo date('d-m-Y', strtotime($detail['date_close'])); ?></span>
					</div>
					<div class="pull-left">
						<i class="icon-map-marker"></i>
						<span><?php echo $detail['location']; ?></span>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			
			<ul class="nav nav-tabs" id="job-detail">
				<li class="active"><a href="#jdetail"><?php echo $this->lang->line('label_job_detail'); ?></a></li>
				<li><a href="#cdetail"><?php echo $this->lang->line('label_company_details'); ?></a></li>
			</ul>
			
			<div class="tab-content">
				<div class="tab-pane active" id="jdetail">
					<div class="desc">
						<strong><?php echo $this->lang->line('label_description'); ?></strong>
						<div><?php echo $detail['description'] ?></div>
					</div>
					<div class="requirement">
						<?php 
						$reqs = json_decode($detail['requirement']);
						if(is_array($reqs) && count($reqs)>0)
						{
							?>
							<strong><?php echo $this->lang->line('label_requirement'); ?></strong>
							<div>
								<ul>
									<?php foreach($reqs as $req): ?>
										<li><?php echo $req; ?></li>
									<?php endforeach; ?>
								</ul>
							</div>
							<?php 
						}
						?>
					</div>
					<div class="salary">
						<strong><?php echo $this->lang->line('label_additional_information'); ?></strong>
						<div>
							<?php echo $this->lang->line('label_month_salary'); ?>:
							<?php echo $detail['month_salary']; ?>
						</div>
						<div>
							<?php 
							echo $this->lang->line('label_job_type') .': ';
							echo $this->lang->line('label_'. $detail['job_type']);
							
							if($detail['job_type'] == 'contract')
								echo " ({$detail['contract_duration']})";
							
							$exps = json_decode($detail['experience']);
							if(is_array($exps) && count($exps)>0)
							{
								$label = $this->lang->line('label_number_experience');
								$str_s = $exps[1]. ((preg_match('/(year|month)/i', $exps[1]) && $exps[0]>1) ? 's' : '');
								$label = str_replace(array('#n', '#s'), array($exps[0], $str_s), $label);
								echo '<br />'. $label;
							}
							?>
						</div>
					</div>
				</div>
				<div class="tab-pane" id="cdetail">
					<div class="company-detail">
						<div class="company-name"><strong><?php echo $detail['cp_name']; ?></strong></div>
						<div class="company-address">
							<?php
							echo $detail['cp_address'] .'<br />'. 
								 $detail['cp_city'] .', '. 
								 $detail['cp_country'];
								 
							if($detail['cp_phone'] != '')
								echo ", <span><i class='icon-phone-sign'></i> {$detail['cp_phone']}</span>";
							?>
						</div>
						<div class="company-description"><?php echo $detail['cp_description']; ?></div>
					</div>
				</div>
			</div>
			
			<a href="#" class="btn btn-default" onclick="self.history.back()"><i class="icon-chevron-left"></i> <?php echo $this->lang->line('btn_back'); ?></a>
		
		</div><!-- /.style:padding-10px -->
	</div><!-- /.span8 -->
	
</div>
